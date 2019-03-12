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

use app\admin\service\SettingService;

/**
 * 获取配置文件，admin模块可用
 * @param $name
 * @return array|mixed
 */
function get_setting($name)
{
    return (new SettingService())->getByName($name);
}

/**
 * 获取管理员Id
 * @return mixed
 */
function get_admin_id()
{
    return session('ADMIN_ID');
}