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
    /**
     *  效验器
     * @return bool
     * @throws Exception
     */
    public function goCheck(){
        $params = Request::param();
        if ($this->check($params)){
            return true;
        }
        throw new ParamException($this->error);
    }

}