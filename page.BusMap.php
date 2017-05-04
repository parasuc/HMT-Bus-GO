<?php
/**
 *	HMT Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note 校巴地图
 */

$this->Template->setPageTitle('校巴地图');

/* 把数据挂载到data数组上 */
$this->Template->data['online'] = $this->RealTimeBus->getDevice(1);
$this->Template->data['offline'] = $this->RealTimeBus->getDevice(0);

$this->Template->need('Header');
$this->Template->need('BusMap');
$this->Template->need('Footer');
