<?php
/**
 *	SCAU Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note 站点参数封装基类
 *	@package Options
 */

class Options {

	/**
	 *	版本信息
	 *
	 *	@var string
	 */

	public $sysVersion = '1.0';

	/**
	 *	程序名称
	 *
	 *	@var string
	 */

	public $sysName = 'SCAU Bus GO!';

	/**
	 *	程序作者
	 *
	 *	@var string
	 */

	public $sysAuthor = 'CRH380A-2722';

	/**
	 *	页面标题
	 *
	 *	@var string
	 */

	public $pageTitle = NULL;

	/**
	 *	Site Url
	 *
	 *	@var string
	 */

	public $siteUrl = BASE_URL;

	/**
	 *	Source Url
	 *
	 *	@var string
	 */

	public $sourceUrl = BASE_URL . 'source';

	/**
	 *	Template Root
	 *
	 *	@var string
	 */

	public $templateRoot = BASE_ROOT . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR;

	/**
	 *	输出基于Source Url的资源路径
	 *
	 *	@param string $pathInfo [路径/资源名]
	 *	@return void
	 */

	public function sourceUrl($pathInfo = NULL) {
		print $this->sourceUrl . '/' . $pathInfo;
	}

	/**
	 *	输出基于Site Url的资源路径
	 *
	 *	@param string $pathInfo [路径/资源名]
	 *	@return void
	 */

	public function siteUrl($pathInfo = NULL) {
		print $this->siteUrl . $pathInfo;
	}

	/**
	 *	输出程序名称
	 *
	 *	@return void
	 */

	public function sysName() {
		print $this->sysName;
	}

	/**
	 *	输出页面标题
	 *
	 *
	 *	@return void
	 */

	public function pageTitle() {
		if ($this->pageTitle == NULL) {
			print $this->sysName;
		} else {
			print $this->pageTitle . ' - ' . $this->sysName;
		}
	}

	/**
	 *	设置页面标题
	 *
	 *	@param string $title [页面标题]
	 *	@return void
	 */

	public function setPageTitle($title) {
		if (empty($title)) {
			throw new Error('页面标题不能为空。');
		} else {
			$this->pageTitle = $title;
		}
	}

	/**
	 *	输出版权信息
	 *
	 *	@return void
	 */

	public function copyright() {
		print $this->sysName . ' v' . $this->sysVersion . ' by ' . $this->sysAuthor . '.';
	}

}
