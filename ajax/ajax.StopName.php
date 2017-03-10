<?php
/**
 *	SCAU Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note Ajax获取站点列表
 */

header("Content-Type: application/json; charset=utf-8\n");

require_once '../inc.Config.php';

$rows = $SCAUBus->BusData->getStopName();

$total = count($rows);

$total--;


if (isset($_GET['term'])) {

	$a = array();

	for($i = 0; $i <= $total; $i++) {
		$a[] = $rows[$i]['stop_name'];
	}

	$data = array();

	foreach ($a as $member) {

		if ( stripos($member, $_GET['term']) !== false ) $data[] = $member;

	}

	print json_encode($data);

	die();

}
