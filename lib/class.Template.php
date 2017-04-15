<?php
/**
 *	HMT Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note 网页模板封装类
 *	@package Options
 */

class Template extends Options {

	/**
	 *	模板数据挂载对象
	 *
	 *	@var array
	 */

	public $data = array();

	/**
	 *	包含模板文件
	 *
	 *	@param string $template [模板名称]
	 *	@return void
	 */

	public function need($template) {
		$file = $this->templateRoot . 'template.' . $template . '.php';
		if (!file_exists($file)) {
			throw new Error('未找到模板"' . $template . '"，请检查模板文件是否存在。');
		} else {
			include_once $file;
		}
	}

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
		print '<p>' . $this->sysName . ' ' . $this->sysVersion . '.</p>';
		print '<p><a href="' . $this->sysAuthorUrl . '" target="_blank">' . $this->sysAuthor . '</a> × <a href="' . $this->serverProviderUrl . '" target="_blank">' . $this->serverProvider . '</a> 联合制作.</p>';
	}

}
