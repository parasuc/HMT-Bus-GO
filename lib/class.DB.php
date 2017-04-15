<?php
/**
 *	HMT Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note 数据库操作基类
 *	@package DB
 */

class DB {

	/**
	 *	数据库连接存储对象
	 *
	 *	@var resource
	 */

	private $conn;

	/**
	 *	数据库查询结果存储对象
	 *
	 *	@var resource
	 */

	private $result;
	
	/**
	 *	构造函数
	 *
	 *	@return void
	 */

	public function __construct() {

		if ( $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) ) {

			//若能连接数据库服务器，则设置正确的字符集
			mysqli_set_charset($this->conn, 'utf8');

		} else {

			//若不能连接数据库服务器，则报错
			$error = $this->connectError();

			//不同的环境显示不同的错误信息
			if (DEVMODE) {
				throw new Error('不能连接到数据库服务器，原因是：' . $error);
			} else {
				throw new Error('不能连接到数据库服务器');
			}

		}

	}

	/**
	 *	执行一个查询
	 *
	 *	@param string $sql [SQL语句]
	 *
	 *	@return void
	 */

	public function query($sql) {

		if (!$this->result = mysqli_query($this->conn, $sql)) {

			//若查询失败，则报错
			$error = $this->error();

			//不同的环境显示不同的错误信息
			if (DEVMODE) {
				new Error('数据库查询失败，原因是：' . $error);
			} else {
				new Error('数据库查询失败');
			}

		}

	}

	/**
	 *	统计返回的记录数目
	 *
	 *	@return int
	 */

	public function numRows() {
		return mysqli_num_rows($this->result);
	}

	/**
	 *	统计数据库影响行数
	 *
	 *	@return int
	 */

	public function affectedRows() {
		return mysqli_affected_rows($this->conn);
	}

	/**
	 *	MySQLi Real Escape String
	 *
	 *	@param string $string [需要进行安全处理的字符串]
	 *	@return string
	 */

	public function realEscapeString($string) {
		return mysqli_real_escape_string($this->conn, $string);
	}

	/**
	 *	MySQLi Fetch Array
	 *
	 *	@return mixed
	 */

	public function fetchArray() {
		return mysqli_fetch_array($this->result, MYSQLI_ASSOC);
	}

	/**
	 *	MySQLi Fetch Row
	 *
	 *	@return mixed
	 */

	public function fetchRow() {
		return mysqli_fetch_row($this->result);
	}

	/**
	 *	关闭数据库连接
	 *
	 *	@return void
	 */

	public function close() {
		mysqli_close($this->conn);
		$this->conn = NULL;
		$this->result = NULL;
	}

	/**
	 *	获取数据库连接错误信息
	 *
	 *	@return string
	 */

	public function connectError() {
		return mysqli_connect_error($this->conn);
	}

	/**
	 *	获取数据库错误信息
	 *
	 *	@return string
	 */

	public function error() {
		return mysqli_error($this->conn);
	}

	/**
	 *	获取数据库错误代码
	 *
	 *	@return int
	 */

	public function errno() {
		return mysqli_errno($this->conn);
	}

}
