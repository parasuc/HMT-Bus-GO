<?php
/**
 *	HMT Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note 站点详情页
 */

$this->Template->setPageTitle('站点详情');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	throw new Error('传入站点ID有误');
	die();
}

/* 加载线路数据 */
$id = $_GET['id'];
$stop = $this->BusData->getStopDetail($id);
$lineList = $this->BusData->getLineByStopId($id);
$totalLine = count($lineList);

/* 把数据挂载到data数组上 */
$this->Template->data['stop'] = $stop;
$this->Template->data['lineList'] = $lineList;
$this->Template->data['totalLine'] = $totalLine;

$this->Template->need('Header');
$this->Template->need('StopInfo');
$this->Template->need('Footer');
