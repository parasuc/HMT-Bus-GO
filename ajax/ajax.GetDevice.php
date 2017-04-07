<?php
/**
 *	SCAU Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note Ajax获取终端状态
 */

header("Content-Type: application/json; charset=utf-8\n");

require_once '../inc.Config.php';

$online = $SCAUBus->RealTimeBus->getDevice(1);

$offline = $SCAUBus->RealTimeBus->getDevice(0);

$data = array(
	'ONLINE' => $online,
	'OFFLINE' => $offline,
);

print json_encode($data);

die();
