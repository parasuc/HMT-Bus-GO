<?php
/**
 *	HMT Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note Ajax获取线路路径
 */

header("Content-Type: application/json; charset=utf-8\n");

require_once '../inc.Config.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	die();
} elseif (!Verifier::isNumber($_POST['id'])) {
	throw new Error('传入线路ID有误');
}

$id = $_POST['id'];

$data = $SCAUBus->BusData->getPolylineByLineId($id);

print json_encode($data);

die();
