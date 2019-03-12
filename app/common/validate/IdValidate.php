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

/**
 * Id 效验
 * Class IdValidate
 * @package app\common\validate
 */
class IdValidate extends IMSValidate
{
    protected $rule = [
        'id' => 'require|number|length:1,8',
    ];

    protected $message = [
        'id.require'         =>  'ID不存在！',
        'id.number'         =>  'ID必须是数字',
        'id.length'         =>  'ID不正确',
    ];
}