<?php
/**
 *	HMT Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note 线路详情页
 */

$this->Template->setPageTitle('线路详情');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	throw new Error('传入线路ID有误');
	die();
}

/* 加载线路数据 */
$id = $_GET['id'];
$line = $this->BusData->getLineDetail($id);
$stops = $this->RealTimeBus->getDataByLineId($id);
$totalStops = count($stops);

/* 把数据挂载到data数组上 */
$this->Template->data['line'] = $line;
$this->Template->data['stops'] = $stops;
$this->Template->data['totalStops'] = $totalStops;

$this->Template->need('Header');
$this->Template->need('LineInfo');
$this->Template->need('Footer');
