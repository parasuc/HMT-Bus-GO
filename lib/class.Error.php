<?php
/**
 *	SCAU Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note 异常处理类
 *	@package Exception
 */

class Error extends Exception {

	/**
	 *	异常消息存储数组
	 *
	 *	@var $array
	 */

	protected $error = array();

	/**
	 *	构造函数
	 *
	 *	@return void
	 */

	public function __construct($message) {
		$this->error['message'] = $message;
		$this->error['code'] = $this->getCode();
		$this->error['file'] = $this->getFile();
		$this->error['line'] = $this->getLine();
		$this->printErrorMsg();
	}

	/**
	 *	输出异常信息
	 *
	 *	@return void
	 */

	protected function printErrorMsg() {

		if (DEVMODE) {
			print '<div class="panel panel-danger"><div class="panel-heading"><h3 class="panel-title"><span class="fa fa-times"></span> 出现异常！</h3></div><div class="panel-body"><p><strong>错误信息：</strong>' . $this->error['message'] . '</p><p><strong>错误代码：</strong>' . $this->error['code'] . '</p><p><strong>错误所处脚本：</strong>' . $this->error['file'] . '</p><p><strong>错误所处行号：</strong>' . $this->error['line'] . '</p></div></div>';
		} else {
			print '<div class="panel panel-danger"><div class="panel-heading"><h3 class="panel-title"><span class="fa fa-times"></span> 出现异常！</h3></div><div class="panel-body"><p><strong>错误信息：</strong>' . $this->error['message'] . '</p><p><strong>错误代码：</strong>' . $this->error['code'] . '</p><p>请联系该系统的管理员：<strong>' . ADMIN_EMAIL . '</strong> 以解决这个问题。</p></div></div>';
		}
		
	}

}
