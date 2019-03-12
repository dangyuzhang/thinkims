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


namespace app\common\maps\status;


class LockStatus
{
    const LOCK_STATUS_NO = 0;
    const LOCK_STATUS_OK = 1;

    const LOCK_STATUS_ARR = [
        0=>'未锁定',
        1=>'已锁定'
    ];

}