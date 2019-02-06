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

namespace ims\controller;


use think\Controller;

class IMSController extends Controller
{

    /**
     * ajax 成功
     * @param string $msg
     * @param array $data
     * @param int $count
     * @param array $header
     * @param array $options
     * @return \think\response\Json
     */
    protected function ajaxSuccess($msg = '操作成功！', $data = [], $header = [], $options = []){
        $result = [
            'code' => 0,
            'msg'  => $msg
        ];
        if (!empty($data)){
            $result['data'] = $data;
        }
        return json($result,200,$header,$options);
    }

    /**
     * ajax 失败
     * @param string $msg
     * @param int $code
     * @param array $data
     * @param array $header
     * @param array $options
     * @return \think\response\Json
     */
    protected function ajaxError($msg = '操作失败！',$code = 1, $data = [], array $header = [], $options = []){
        $result = [
            'code' => $code,
            'msg'  => $msg
        ];
        if (!empty($data)){
            $result['data'] = $data;
        }
        return json($result,400,$header,$options);
    }
}