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


namespace app\admin\controller;


use app\admin\service\AdminService;
use app\common\validate\AdminValidate;
use ims\controller\AdminController as AdminIMSController;
use think\facade\Request;

class AdminController extends AdminIMSController
{
    /**
     * 登录界面显示
     * @return mixed
     */
    public function login(){
        return $this->fetch();
    }

    /**
     * 登录请求
     */
    public function ajaxLogin(){
        // 参数效验
        (new AdminValidate())->checkParam('login');
        // 获取参数
        $username = Request::post("username");
        $password = Request::post("password");
        // 登录
        $result = (new AdminService())->loginByUsernamePassword($username,$password);
        if ($result){
            return $this->ajaxSuccess("登录成功");
        }
        return $this->ajaxError("登录失败");
    }

}