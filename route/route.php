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
Route::get('/check', 'portal/Index/check');
Route::get('/err', 'portal/Index/err');
Route::get('/ajax', 'portal/Index/ajax');

Route::get('/','portal/Index/index');
Route::get('/hello/:name','portal/Index/hello');
Route::get('/cache','portal/Index/cache');
Route::get('/error','portal/Error/index');

return [

];
