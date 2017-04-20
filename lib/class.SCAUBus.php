<?php
/**
 *	HMT Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note SCAUBus总类
 *	@package SCAUBus
 */

class SCAUBus {

	/**
	 *	为所有类的实例化做准备
	 *
	 *	@var object
	 */

	public $BusData, $Options, $Template, $RealTimeBus;

	/**
	 *	构造函数
	 *
	 *	@return void
	 */

	public function __construct() {
		$this->getInstance();
		if (!MAINTENANCE) {
			$this->BusData->realTimeBus = $this->RealTimeBus->getData();
		}
	}

	/**
	 *	获取必须的实例
	 *
	 *	@return void
	 */

	private function getInstance() {
		//实例化也是有优先级的
		if (!MAINTENANCE) {
			$this->BusData = new BusData();
			$this->RealTimeBus = new RealTimeBus();
		}
		$this->Template = new Template();
	}

	/**
	 *	根据QueryString的值给出相对应的页面
	 *
	 *	@return void
	 */

	private function router() {
		if (MAINTENANCE) {
			require_once BASE_ROOT . DIRECTORY_SEPARATOR . 'page.OnMaintenance.php';
		} else {
			switch(@$_GET['mod']) {
				case 'lineinfo': require_once BASE_ROOT . DIRECTORY_SEPARATOR . 'page.LineInfo.php'; break;
				case 'stopinfo': require_once BASE_ROOT . DIRECTORY_SEPARATOR . 'page.StopInfo.php'; break;
				case 'stopsearch': require_once BASE_ROOT . DIRECTORY_SEPARATOR . 'page.StopSearch.php'; break;
				case 'lineindex': require_once BASE_ROOT . DIRECTORY_SEPARATOR . 'page.LineIndex.php'; break;
				case 'stopindex': require_once BASE_ROOT . DIRECTORY_SEPARATOR . 'page.StopIndex.php'; break;
				case 'realtimestatus': require_once BASE_ROOT . DIRECTORY_SEPARATOR . 'page.RealTimeStatus.php'; break;
				default: require_once BASE_ROOT . DIRECTORY_SEPARATOR . 'page.Homepage.php'; break;
			}
		}
	}

	/**
	 *	转动命运之轮吧, SCAU Bus GO!
	 *
	 *	@return void
	 */

	public function run() {
		$this->router();
	}

}
