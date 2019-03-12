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


namespace app\admin\controller;


use app\admin\service\SettingService;
use app\common\maps\type\SettingType;
use app\common\validate\SettingValidate;
use ims\controller\AdminController;
use think\facade\Request;

class SettingController extends AdminController
{

    /**
     * 系统设置页面
     * @return mixed
     */
    public function index(){
        // 输出到模版
        // 获取系统配置
        $this->assign("system",get_setting(SettingType::SETTING_TYPE_SYSTEM));
        // 获取业务配置
        $this->assign("operation",get_setting(SettingType::SETTING_TYPE_OPERATION));
        // 获取站点配置
        $this->assign("website",get_setting(SettingType::SETTING_TYPE_WEBSITE));
        // 获取邮箱配置
        $this->assign("email",get_setting(SettingType::SETTING_TYPE_EMAIL));
        // 获取其他配置
        $this->assign("social",get_setting(SettingType::SETTING_TYPE_SOCIAL));
        return $this->fetch();
    }

    /**
     * 保存数据
     * @return \think\response\Json
     * @throws \ims\library\exception\ParamException
     */
    public function add(){
        // 效验参数
        (new SettingValidate())->checkParam();
        // 保存数据
        $param  = Request::post();
        $result = (new SettingService())->save($param);
        if (!empty($result)){
            return $this->ajaxSuccess();
        }
        return $this->ajaxError();
    }

}