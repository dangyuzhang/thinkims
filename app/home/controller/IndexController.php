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

use app\home\exception\TestException;
use app\home\validate\IdValidate;
use ims\controller\HomeController;

class IndexController extends HomeController
{

    public function index(){
        $this->assign('demo_time',time());
        return $this->fetch();
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }

    /**
     *  参数效验
     * @throws \think\Exception
     */
    public function check()
    {
        (new IdValidate())->goCheck();
    }

    /**
     * 异常处理
     */
    public function err(){
        throw new TestException();
    }

    /** 返回json数据
     * @return \think\response\Json
     */
    public function ajax(){
        return $this->ajaxSuccess();
    }

    /**
     *  测试自定义函数
     */
    public function func(){
        ims_test_function();
    }
}
