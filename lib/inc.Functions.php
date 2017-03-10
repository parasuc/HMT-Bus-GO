<?php
/**
 *	SCAU Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note 函数库
 */

/**
 *	自动加载类
 *
 *	@param string $classname [类名称]
 *	@return void
 */

function __autoload($classname) {
	$filename = LIB_ROOT . 'class.' . $classname . '.php';
	require_once $filename;
}

/**
 *	判断是否为pjax请求
 *
 *	@return bool
 */

function isPjax() {
	return array_key_exists('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX'];
}
