<?php
// +----------------------------------------------------------------------
// | ThinkIMS [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015-2019 http://www.thinkims.cn/ All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +---------------------------------------------------------------------
// | Author: dangyuzhang <2085@163.com>
// +----------------------------------------------------------------------   


namespace ims\library\exception;


use think\exception\Handle;
use think\exception\HttpException;
use think\facade\Log;
use think\facade\Request;

class IMSHandler extends Handle
{
    private $status     = 500;
    private $message    = 'error';
    private $code       = 1;

    public function render(\Exception $e)
    {
        // 自定义返回错误
        if ($e instanceof IMSException) {
            $this->status   = $e->status;
            $this->message  = $e->message;
            $this->code     = $e->code;
        } else {
            // 如果开启debug那就使用默认的异常处理
            if (config('app_debug')) {
                return parent::render($e);
            }
            $this->status = 500;
            $this->message = '服务器内部异常！';
        }
        // 记录错误日记
        Log::error($e->getMessage());

        // 如果是请求异常(ajax)就返回json
        if ((Request::isAjax() && $e instanceof HttpException) || strpos(Request::header('accept'), 'html') == '') {
            return json(['code' => $this->code, 'msg' => $this->message], $this->status);
        }
        // 如果是手机访问就转到手机端的自定义错误页面
        if (Request::isMobile()) {
            return redirect('/mobile/error?msg=' . $this->message)->remember();
        }
        // pc端的自定义错误页面
        return redirect('/error?msg=' . $this->message)->remember();
    }

}