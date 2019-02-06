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

namespace app\home\controller;


use ims\controller\HomeController;

class ErrorController extends HomeController
{
    /**
     * pc端异常提示页面
     * @param $msg
     * @return mixed
     */
    public function pc($msg){
        $this->assign('msg',$msg);
        return $this->fetch();
    }

    /**
     * 手机端异常提示页面
     * @param $msg
     * @return mixed
     */
    public function mobile($msg){
        $this->assign('msg',$msg);
        return $this->fetch();
    }

}