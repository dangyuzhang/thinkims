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


class DeleteStatus
{
    const DELETE_STATUS_NO = 0;
    const DELETE_STATUS_OK = 1;

    const DELETE_STATUS_ARR = [
        0=>'未删除',
        1=>'已删除'
    ];

}