<?php
/**
 *	SCAU Bus GO -- 华农校巴查询程序
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

	public $BusData, $DB, $Options, $Template;

	/**
	 *	构造函数
	 *
	 *	@note 实例化所有对象
	 *	@return void
	 */

	public function __construct() {
		//实例化也是有优先级的
		$this->Options = new Options();
		$this->DB = new DB();
		$this->BusData = new BusData();
		$this->Template = new Template();
	}

	/**
	 *	根据QueryString的值给出相对应的页面
	 *
	 *	@return void
	 */

	public function router() {
		global $SCAUBus;
		switch(@$_GET['mod']) {
			case 'lineinfo': require_once BASE_ROOT . DIRECTORY_SEPARATOR . 'page.LineInfo.php'; break;
			case 'stopinfo': require_once BASE_ROOT . DIRECTORY_SEPARATOR . 'page.StopInfo.php'; break;
			case 'stopsearch': require_once BASE_ROOT . DIRECTORY_SEPARATOR . 'page.StopSearch.php'; break;
			case 'lineindex': require_once BASE_ROOT . DIRECTORY_SEPARATOR . 'page.LineIndex.php'; break;
			case 'stopindex': require_once BASE_ROOT . DIRECTORY_SEPARATOR . 'page.StopIndex.php'; break;
			default: require_once BASE_ROOT . DIRECTORY_SEPARATOR . 'page.Homepage.php'; break;
		}
	}

	/**
	 *	运转吧，校巴查询程序！
	 *
	 *	@return void
	 */

	public function run() {
		$this->router();
	}

}
