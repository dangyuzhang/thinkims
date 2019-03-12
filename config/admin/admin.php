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

return [
    // Redis 前缀配置
    'redis_prefix'      => [
        'setting'       => 'admin:config:',
        'login_error'   => 'admin:login:error:'
    ],
    'login'             => [
        // 登录错误次数
        'error_count'         => 6,
        // 锁定时间
        'lock_time'          => 600
    ]
];