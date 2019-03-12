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


use ims\library\exception\DataException;
use think\facade\Request;

/**
 * 密码加密
 * @param $password 原始密码
 * @param string $authCode 加密字符串
 * @return string 加密后的密码
 */
function ims_password($password, $authCode = '')
{
    if (empty($authCode)) {
        $authCode = config('database.authcode');
    }
    return md5(md5($authCode . $password));
}

/**
 * 判断密码是否匹配
 * @param $password 用户密码
 * @param $passwordInDb 数据密码
 * @return bool 是否匹配
 */
function ims_compare_password($password, $passwordInDb)
{
    if (empty($password) || empty($passwordInDb)){
        return false;
    }
    return ims_password($password) == $passwordInDb;
}

/**
 * 获取随机字符串
 * @param int $len 长度
 * @return string 返回字符串
 */
function ims_random_string($len = 6)
{
    $chars    = [
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
        "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
        "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
        "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
        "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",
        "3", "4", "5", "6", "7", "8", "9"
    ];
    $charsLen = count($chars) - 1;
    shuffle($chars);    // 将数组打乱
    $output = "";
    for ($i = 0; $i < $len; $i++) {
        $output .= $chars[mt_rand(0, $charsLen)];
    }
    return $output;
}

/**
 * 字符串转数组
 * @param $arr
 * @return false|string
 * @throws DataException
 */
function ims_array_to_json($arr){
    if (is_array($arr)){
        return json_encode($arr);
    }
    throw new DataException("参数错误，不是数组");
}

/**
 * json 转 数组
 * @param $json
 * @return mixed
 */
function ims_json_to_array($json){
    return json_decode($json,true);
}

/**
 * 获取客户端IP地址
 * @param integer $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
 * @param boolean $adv  是否进行高级模式获取（有可能被伪装）
 * @return string
 */
function ims_get_client_ip($type = 0, $adv = true)
{
    return Request::ip($type,$adv);
}


/**
 * 获取ThinkIMS版本
 * @return string
 */
function ims_version()
{
    return THINKIMS_VERSION;
}