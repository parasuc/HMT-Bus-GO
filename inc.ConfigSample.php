<?php
/**
 *	HMT Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note 站点配置文件
 */

//############## 数据库账户信息 ##############//

//这里请根据你的数据库配置来填写

//数据库服务器地址
define("DB_HOST", '');
//数据库用户名
define("DB_USER", '');
//数据库登录密码
define("DB_PASS", '');
//数据库名称
define("DB_NAME", '');

//##########################################//

//############## 实时校巴设置 ################//

//实时校巴数据获取地址
define("RTB_DATA_URL", 'http://120.55.243.109/MapMonitor/GetCarInfo');
//需要获取实时数据的校巴ID (多个ID用逗号隔开)
define('RTB_DATA_BUSID', '2,3,7,9,10,15,207883300,654408972,1484614871,1736548547,1863789157,2053060190');

//##########################################//


//################ 杂项设置 #################//

//是否启用开发者模式? (1=是, 0=否)
define("DEVMODE", 0);
//定义根网址
define("BASE_URL", ''); //这里填上你要放置这个程序的地址。地址后面要加上"/"符号
//定义系统管理员Email地址
define("ADMIN_EMAIL", ''); //请填写你的电子邮箱，以便用户反馈信息

//##########################################//


//################ 以下内容请勿修改 #################//

define("BASE_ROOT", dirname(__FILE__));

define("LIB_ROOT", BASE_ROOT . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR);

error_reporting(0);

require LIB_ROOT . 'inc.Functions.php';

$SCAUBus = new SCAUBus();

//################################################//
