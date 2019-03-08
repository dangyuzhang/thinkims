<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\facade\Route;

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});
Route::get('/check', 'index/Index/check');
Route::get('/err', 'index/Index/err');
Route::get('/ajax', 'index/Index/ajax');

Route::get('/','index/Index/index');
Route::get('/hello/:name','index/Index/hello');
Route::get('/error/pc','index/Error/pc');
Route::get('/error/mobile','index/Error/mobile');

return [

];
