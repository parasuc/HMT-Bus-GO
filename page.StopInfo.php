<?php
/**
 *	SCAU Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note 站点详情页
 */

$SCAUBus->Options->setPageTitle('站点详情');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	throw new Error('传入站点ID有误');
	die();
}

/* 加载线路数据 */
$id = $_GET['id'];
$stop = $SCAUBus->BusData->getStopDetail($id);
$lineList = $SCAUBus->BusData->getLineByStopId($id);
$totalLine = count($lineList);

/* 把数据挂载到data数组上 */
$SCAUBus->Template->data['stop'] = $stop;
$SCAUBus->Template->data['lineList'] = $lineList;
$SCAUBus->Template->data['totalLine'] = $totalLine;

$SCAUBus->Template->need('Header');
$SCAUBus->Template->need('StopInfo');
$SCAUBus->Template->need('Footer');
