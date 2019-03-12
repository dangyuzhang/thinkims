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


use think\App;
use think\facade\Request;
use think\facade\Session;

class AdminController extends IMSController
{

    function __construct(App $app = null)
    {
        parent::__construct($app);
        $path = Request::path();
        if ($path != 'admin/login' && $path != 'admin/ajax/login'){
            if (empty(Session::get('ADMIN_ID'))){
                $this->error('登录失效,请重新登录！','/admin/login');
            }
        }
    }
}