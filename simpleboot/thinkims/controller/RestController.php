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


namespace ims\controller;


use think\exception\HttpResponseException;
use think\facade\Response;

class RestController
{
    //token
    protected $token = '';

    //设备类型 （mobile，android，iphone，ipad，web，pc，mac，wxapp）
    protected $deviceType = '';

    // Api 版本
    protected $apiVersion = '';

    //用户 id
    protected $userId = 0;

    //用户
    protected $user;

    //用户类型 （0账号，1邮箱，2手机，3qq，4微信，5微博）
    protected $userType;

    // 设备
    protected $allDeviceTypes = ['mobile', 'android', 'iphone', 'ipad', 'web', 'pc', 'mac', 'wxapp'];

    /**
     * 操作成功
     * @access protected
     * @param mixed $msg 提示信息
     * @param mixed $data 返回的数据
     * @param array $header 发送的Header信息
     * @return void
     */
    protected function success($msg = '操作成功！', $data = '', array $header = [])
    {
        $result = [
            'code' => 0,
            'msg' => $msg
        ];
        if (!empty($data)) {
            $result['data'] = $data;
        }
        $type                                   = 'json';
        $header['Access-Control-Allow-Origin']  = '*';
        $header['Access-Control-Allow-Headers'] = 'X-Requested-With,Content-Type,XX-Device-Type,XX-Token,XX-Api-Version';
        $header['Access-Control-Allow-Methods'] = 'GET,POST,PATCH,PUT,DELETE,OPTIONS';
        $response                               = Response::create($result, $type,200)->header($header);
        throw new HttpResponseException($response);
    }

    /**
     * 操作错误
     * @access protected
     * @param mixed $msg 提示信息
     * @param mixed $data 返回的数据
     * @param array $header 发送的Header信息
     * @return void
     */
    protected function error($msg = '操作失败！', $code = 1, $data = [], array $header = [])
    {
        $result = [
            'code' => $code,
            'msg' => $msg
        ];
        if (!empty($data)) {
            $result['data'] = $data;
        }
        $type                                   = 'json';
        $header['Access-Control-Allow-Origin']  = '*';
        $header['Access-Control-Allow-Headers'] = 'X-Requested-With,Content-Type,XX-Device-Type,XX-Token';
        $header['Access-Control-Allow-Methods'] = 'GET,POST,PATCH,PUT,DELETE,OPTIONS';
        $response                               = Response::create($result, $type,400)->header($header);
        throw new HttpResponseException($response);
    }

}