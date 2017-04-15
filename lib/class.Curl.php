<?php
/**
 *	HMT Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note cURL操作基类
 *	@package Curl
 */

class Curl {

	/**
	 *	cURL句柄存储对象
	 *
	 *	@var resource
	 */

	private $ch;

	/**
	 *	cURL抓取结果存储对象
	 *
	 *	@var mixed
	 */

	private $r;

	/**
	 *	执行一个cURL会话 (GET方式)
	 *
	 *	@param string $url [要抓取的URL]
	 *	@return mixed
	 */

	protected function get($url) {
		$this->ch = NULL;
		$this->ch = curl_init();
		curl_setopt($this->ch, CURLOPT_URL, $url);
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($this->ch, CURLOPT_HEADER, 0);
		curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, 0);
		$this->r = curl_exec($this->ch);
		if ($this->error()) {
			throw new Error('cURL错误：' . $this->error());
		} else {
			return $this->r;
		}
	}

	/**
	 *	执行一个cURL会话 (POST方式)
	 *
	 *	@param string $url [要抓取的URL]
	 *	@param array $data [要POST的数据 (以数组方式) ]
	 *	@return mixed
	 */

	protected function post($url, $data) {
		$this->ch = NULL;
		$this->ch = curl_init();
		curl_setopt($this->ch, CURLOPT_URL, $url);
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($this->ch, CURLOPT_HEADER, 0);
		curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($this->ch, CURLOPT_POST, 1);
		curl_setopt($this->ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, 0);
		$this->r = curl_exec($this->ch);
		if ($this->error()) {
			throw new Error('cURL错误：' . $this->error());
		} else {
			return $this->r;
		}
	}

	/**
	 *	返回cURL错误信息
	 *
	 *	@return string
	 */

	protected function error() {
		return curl_error($this->ch);
	}

}
