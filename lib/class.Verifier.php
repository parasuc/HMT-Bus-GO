<?php
/**
 *	HMT Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note 数据验证类
 *	@package Verifier
 */

class Verifier {

	/**
	 *	验证数据是否为数字
	 *
	 *	@param mixed $toVerify [验证对象]
	 *
	 *	@return bool
	 */

	public function isNumber($toVerify) {
		return is_numeric($toVerify);
	}

	/**
	 *	验证数据是否为空值
	 *
	 *	@param mixed $toVerify [验证对象]
	 *
	 *	@return bool
	 */

	public function isEmpty($toVerify) {
		return empty($toVerify);
	}

	/**
	 *	验证JSON格式是否有效
	 *
	 *	@param mixed $toVerify [验证对象]
	 *
	 *	@return bool
	 */

	public function isValidJSON($toVerify) {
		json_decode($toVerify);
		if (json_last_error() == JSON_ERROR_NONE) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 *	验证是否为一个有效的URL链接
	 *
	 *	@param mixed $toVerify [验证对象]
	 *
	 *	@return bool
	 */

	public function isValidUrl($toVerify) {
		if (preg_match('/^http[s]?:\/\/(([0-9]{1,3}\.){3}[0-9]{1,3}|([0-9a-z_!~*\'()-]+\.)*([0-9a-z][0-9a-z-]{0,61})?[0-9a-z]\.[a-z]{2,6})(:[0-9]{1,4})?((\/\?)|(\/[0-9a-zA-Z_!~\'\(\)\[\]\.;\?:@&=\+\$,%#-\/^\*\|]*)?)$/', $toVerify)) {
			return true;
		} else {
			return false;
		}
	}

}
