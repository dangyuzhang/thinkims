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


namespace app\common\maps\type;


class SettingType
{
    const SETTING_TYPE_SYSTEM = 'system';
    const SETTING_TYPE_OPERATION = 'operation';
    const SETTING_TYPE_WEBSITE = 'website';
    const SETTING_TYPE_SOCIAL = 'social';
    const SETTING_TYPE_EMAIL = 'email';

    const SETTING_ARR = [
        'system'    =>0,
        'operation' =>1,
        'website'   =>2,
        'social'    =>3,
        'email'     =>4,
    ];
}