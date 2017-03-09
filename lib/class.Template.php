<?php
/**
 *	SCAU Bus GO -- 华农校巴查询程序
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
		global $SCAUBus;
		$file = $this->templateRoot . 'template.' . $template . '.php';
		if (!file_exists($file)) {
			throw new Error('未找到模板"' . $template . '"，请检查模板文件是否存在。');
		} else {
			include_once $file;
		}
	}

}
