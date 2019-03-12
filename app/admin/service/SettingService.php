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


use app\admin\model\Setting;
use app\common\maps\type\SettingType;
use ims\library\exception\DataException;
use ims\library\exception\IMSException;
use think\facade\Cache;

class SettingService
{

    /**
     * 保存数据
     * @param $data
     * @return Setting|bool|string
     */
    public function save($data){

        // 查询数据库是否存在
        $settingInfo = Setting::where('name',$data['name'])->find();

        // 如果不存在，就新增
        if (empty($settingInfo)){
            $result = Setting::create([
                'title'     => $data['title'],
                'name'      => $data['name'],
                'value'     => $data['value'],
                'group'     => SettingType::SETTING_ARR[$data['name']],
            ]);
        }else{
            // 存在就修改
            $settingInfo->title = $data['title'];
            $settingInfo->name  = $data['name'];
            $settingInfo->value = $data['value'];
            $settingInfo->group = SettingType::SETTING_ARR[$data['name']];
            $result = $settingInfo->save();
        }

        // 保存一份到缓存里面
        if (!empty($result)){
            $this->saveRedis($data['name'],$data['value']);
        }

        return $result;
    }


    /**
     * 获取配置信息
     * @param $name
     * @return array|mixed
     */
    public function getByName($name){
        // 先看看Redis有没有
        $resultRedis = $this->getRedisByName($name);
        if (empty($resultRedis)){
            // 没有就从数据库拿
            $resultData = $this->getDataByName($name);
            return is_array($resultData) ? $resultData : ims_json_to_array($resultData);
        }
        return $resultRedis;
    }

    /**
     * 从缓存中获取配置信息
     * @param $name
     * @return mixed
     */
    protected function getRedisByName($name){
        return Cache::get(config('admin.redis_prefix.setting').$name);
    }

    /**
     * 从数据中获取配置信息，并且保存到reids
     * @param $name
     * @return array
     */
    protected function getDataByName($name){
        $settingInfo = Setting::where('name',$name)->find();
        $this->saveRedis($name,$settingInfo['value']);
        return $settingInfo['value'];
    }

    /**
     * 保存数据到缓存
     * @param $data
     * @throws IMSException
     */
    protected function saveRedis($name,$data){
        $res = Cache::set(config('admin.redis_prefix.setting').$name,$data);
        if (!$res){
            throw new DataException("Redis 保存失败，请重新保存。");
        }
    }
}