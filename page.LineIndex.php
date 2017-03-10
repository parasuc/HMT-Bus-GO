<?php
/**
 *	SCAU Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note 线路列表页
 */

/* 加载线路数据 */
$rows = $SCAUBus->BusData->getLineList();
$total = count($rows);

/* 把数据挂载到data数组上 */
$SCAUBus->Template->data['rows'] = $rows;
$SCAUBus->Template->data['total'] = $total;

$SCAUBus->Template->need('Header');
$SCAUBus->Template->need('LineIndex');
$SCAUBus->Template->need('Footer');
