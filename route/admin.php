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

use think\facade\Route;
// 后台模块路由注册
Route::group('admin', function () {
    Route::get('/','admin/Index/index');
    Route::get('/login','admin/User/login');
    Route::get('/logout','admin/User/logout');

















});