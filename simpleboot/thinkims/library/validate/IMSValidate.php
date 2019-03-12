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


namespace ims\library\validate;


use ims\library\exception\ParamException;
use think\facade\Request;
use think\Validate;

class IMSValidate extends Validate
{
    /** 效验器
     * @param null $scene 效验场景
     * @return bool 通过返回true
     * @throws ParamException 参数错误异常
     */
    public function checkParam($scene = null)
    {
        $params = Request::param();
        if (empty($scene)) {
            if ($this->check($params)){
                return true;
            }
        } else {
            if ($this->scene($scene)->check($params)){
                return true;
            }
        }
        throw new ParamException($this->error);
    }

    public function getDataByRule($arrays)
    {
        if (array_key_exists('user_id', $arrays) | array_key_exists('uid', $arrays)) {
            // 不允许包含user_id或者uid，防止恶意覆盖user_id外键
            throw new ParamException("参数中包含有非法的参数!");
        }
        $newArray = [];
        foreach ($this->rule as $key => $value) {
            $newArray[$key] = $arrays[$key];
        }
        return $newArray;
    }

    /**
     * 判断是否为空
     * @param $value
     * @param string $rule
     * @param string $data
     * @param string $field
     * @return bool
     */
    protected function isNotEmpty($value, $rule='', $data='', $field='')
    {
        if (empty($value)) {
            return false;
        } else {
            return true;
        }
    }


    /**
     * 判断是否是手机号码
     * @param $value
     * @return bool
     */
    protected function isMobile($value)
    {
        $rule = '^1(3|4|5|7|8)[0-9]\d{8}$^';
        $result = preg_match($rule, $value);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


}