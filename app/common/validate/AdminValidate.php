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


namespace app\common\validate;


use ims\library\validate\IMSValidate;

class AdminValidate extends IMSValidate
{
    protected $rule = [
        'username' => 'require|isNotEmpty|alphaDash|length:4,20',
        'password' => 'require|isNotEmpty|alphaDash|length:6,30',
    ];

    protected $message = [
        'username'                 =>  '用户名或密码错误！',
        'password'                 =>  '用户名或密码错误！',
    ];

    protected $scene = [
        'login'  =>  ['username','password'],
    ];

}