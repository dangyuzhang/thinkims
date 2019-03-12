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


use app\common\maps\type\SettingType;
use ims\library\validate\IMSValidate;

/**
 *  配置参数效验
 * Class SettingValidate
 * @package app\common\validate
 */
class SettingValidate extends IMSValidate
{
    protected $rule = [
        'title' => 'require|isNotEmpty',
        'name' => 'require|isNotEmpty|alpha|isNameNotEmpty',
        'value' => 'require|isNotEmpty|array',
    ];

    protected $message = [
        'title'                 =>  '标题不能为空！',
        'name.require'          =>  '名称不能为空！',
        'name.isNotEmpty'       =>  '名称不能为空！',
        'name.alpha'            =>  '名称不正确！',
        'name.isNameNotEmpty'   =>  '名称错误，该名称在系统中不被支持！',
        'value.require'         =>  '数据不能为空！',
        'value.isNotEmpty'      =>  '数据不能为空！',
        'value.array'           =>  '数据不正确！',
    ];

    protected $scene = [
        'add'  =>  ['title','name','value'],
    ];

    /**
     * 判断客户端传上来的名字是否合法并存在
     * @param $value
     * @return bool
     */
    protected function isNameNotEmpty($value)
    {
        if (isset(SettingType::SETTING_ARR[$value])){
            return true;
        }
        return false;
    }

}