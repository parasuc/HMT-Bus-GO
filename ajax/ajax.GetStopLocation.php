<?php
/**
 *	HMT Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note Ajax获取站点位置
 */

header("Content-Type: application/json; charset=utf-8\n");

require_once '../inc.Config.php';

$stops = $SCAUBus->BusData->getStopLocation();

print json_encode($stops);

die();
