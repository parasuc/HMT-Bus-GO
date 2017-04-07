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
	 *	Data Provider
	 *
	 *	@var string
	 */

	public $dataProvider = '佳华利道公司';

	/**
	 *	Server Provider
	 *
	 *	@var string
	 */

	public $serverProvider = '红满堂工作室';

}
