<?php
/**
 *	HMT Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note 站点搜索页
 */

$this->Template->setPageTitle('站点检索');

/* 加载线路数据 */
$rows = $this->BusData->getStopListByName(urldecode($_GET['name']));
$total = count($rows);

/* 把数据挂载到data数组上 */
$this->Template->data['rows'] = $rows;
$this->Template->data['total'] = $total;

$this->Template->need('Header');
$this->Template->need('StopSearch');
$this->Template->need('Footer');
