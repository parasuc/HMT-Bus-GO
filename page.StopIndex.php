<?php
/**
 *	HMT Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note 站点搜索及列表页
 */

$this->Template->setPageTitle('校巴站点查询');

/* 加载站点数据 */
$rows = $this->BusData->getStopList();
$total = count($rows);

/* 把数据挂载到data数组上 */
$this->Template->data['rows'] = $rows;
$this->Template->data['total'] = $total;

$this->Template->need('Header');
$this->Template->need('StopIndex');
$this->Template->need('Footer');
