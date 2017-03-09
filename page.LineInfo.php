<?php
/**
 *	SCAU Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note 线路详情页
 */

$SCAUBus->Options->setPageTitle('线路详情');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	throw new Error('传入线路ID有误');
	die();
}

/* 加载线路数据 */
$id = $_GET['id'];
$line = $SCAUBus->BusData->getLineDetail($id);
$stops = $SCAUBus->BusData->getStopByLineId($id);
$totalStops = count($stops);

/* 把数据挂载到data数组上 */
$SCAUBus->Template->data['line'] = $line;
$SCAUBus->Template->data['stops'] = $stops;
$SCAUBus->Template->data['totalStops'] = $totalStops;

$SCAUBus->Template->need('Header');
$SCAUBus->Template->need('LineInfo');
$SCAUBus->Template->need('Footer');
