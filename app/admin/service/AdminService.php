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


namespace app\admin\service;


use app\admin\model\Admin;
use app\common\exception\AdminException;
use app\common\maps\status\DeleteStatus;
use app\common\maps\status\LockStatus;
use ims\service\IMSService;
use think\facade\Cache;
use think\facade\Session;

class AdminService extends IMSService
{
    /**
     * 用户密码登录
     * @param $username
     * @param $password
     * @return bool
     * @throws AdminException
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function loginByUsernamePassword($username,$password){

        // 判断是否是恶意登录
        $usernameRedis = config('admin.redis_prefix.login_error').$username;
        $loginErrorCount = Cache::get($usernameRedis);
        if (!empty($loginErrorCount) && $loginErrorCount >= config('admin.login.error_count')){
            throw new AdminException("登录错误次数太多，请稍后再试！");
        }

        // 判断用户和密码是否正确
        $adminInfo = Admin::where(['username'=>$username,'password'=>ims_password($password)])->find();
        if (empty($adminInfo)){
            if (empty($loginErrorCount)){
                // 记录登录错误次数 第一次错误设置初始值
                Cache::set($usernameRedis,1,config('admin.login.lock_time'));
            }else{
                // 每次加一
                Cache::inc($usernameRedis);
            };
            return false;
        }

        // 判断管理员是否被锁定
        if ($adminInfo->status_lock == LockStatus::LOCK_STATUS_OK){
            throw new AdminException("该管理员已被锁定！");
        }

        // 判断改管理员是否已经被删除
        if ($adminInfo->status_delete == DeleteStatus::DELETE_STATUS_OK){
            throw new AdminException("该管理员不存在，请重新注册！");
        }

        // 更新登录用户IP
        $adminInfo->login_ip = ims_get_client_ip();
        $adminInfo->save();

        // 登录成功 处理
        // 删除登录错误记录
        Cache::rm($usernameRedis);

        //todo 记录登录日记，没建表暂时没加
        // 存入session
        Session::set("ADMIN_ID",$adminInfo->id);
        return true;
    }

}