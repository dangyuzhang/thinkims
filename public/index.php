<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
namespace think;

// IMS根目录
define('IMS_ROOT', dirname(__DIR__));

// 定义应用目录
define('APP_PATH', IMS_ROOT . '/app');

// 定义IMS核心包目录
define('IMS_PATH', IMS_ROOT . '/simpleboot/thinkims');

// 定义扩展目录
define('EXTEND_PATH', IMS_ROOT . '/simpleboot/extend');
define('VENDOR_PATH', IMS_ROOT . '/simpleboot/vendor');

// 定义IMS核心包目录
define('IMS_TEMPLATE_PATH', IMS_ROOT . '/templates');

// 定义IMS 版本号
define('THINKIMS_VERSION', '1.5.5.26');

// 加载基础文件
require IMS_ROOT . '/simpleboot/thinkphp/base.php';

// 执行应用并响应
Container::get('app')->run()->send();
