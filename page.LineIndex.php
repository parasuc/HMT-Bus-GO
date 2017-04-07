<?php
/**
 *	SCAU Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note 线路列表页
 */

$this->Template->setPageTitle('校巴线路查询');

/* 加载线路数据 */
$rows = $this->BusData->getLineList();
$total = count($rows);

/* 把数据挂载到data数组上 */
$this->Template->data['rows'] = $rows;
$this->Template->data['total'] = $total;

$this->Template->need('Header');
$this->Template->need('LineIndex');
$this->Template->need('Footer');
