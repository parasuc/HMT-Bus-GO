<?php
/**
 *	HMT Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note 线路列表页
 */

$this->Template->setPageTitle('校巴线路查询');

/* 加载线路数据 */
$rows = $this->BusData->getLineList();

/* 把数据分配到相应线路的数组内 */
$line1 = $line2 = $line3 = array();
foreach ($rows as $row) {
	if (stripos($row['line_name'], '1号线') !== false) {
		$line1[] = $row;
	} elseif (stripos($row['line_name'], '2号线') !== false) {
		$line2[] = $row;
	} elseif (stripos($row['line_name'], '3号线') !== false) {
		$line3[] = $row;
	}
}

/* 把数据挂载到data数组上 */
$this->Template->data['line1'] = $line1;
$this->Template->data['line2'] = $line2;
$this->Template->data['line3'] = $line3;

$this->Template->need('Header');
$this->Template->need('LineIndex');
$this->Template->need('Footer');
