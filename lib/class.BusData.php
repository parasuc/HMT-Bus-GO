<?php
/**
 *	HMT Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note 校巴数据获取类
 *	@package DB
 */

class BusData extends DB {

	/**
	 *	输出校巴线路列表
	 *
	 *	@return array
	 */

	public function getLineList() {
		parent::query("SELECT line_id, line_name, line_start, line_end FROM bus_line ORDER BY line_id ASC;");
		$rows = array();
		$i = 0;
		while( $row = parent::fetchArray() ) {
			$rows[$i] = $row;
			$i++;
		}
		return $rows;
	}

	/**
	 *	根据校巴线路ID检索该线路详细信息
	 *
	 *	@param int $lineId [校巴线路ID]
	 *	@return array
	 */

	public function getLineDetail($lineId) {
		if (!is_numeric($lineId)) {
			throw new Error('传入线路ID有误');
		}
		parent::query("SELECT * FROM bus_line WHERE line_id = {$lineId} LIMIT 1;");
		$rows = array();
		$i = 0;
		while( $row = parent::fetchArray() ) {
			$rows[$i] = $row;
			$i++;
		}
		return $rows;
	}

	/**
	 *	根据校巴线路ID检索该线路的途径站点
	 *
	 *	@param int $lineId [校巴线路ID]
	 *	@return array
	 */

	public function getStopByLineId($lineId) {
		if (!is_numeric($lineId)) {
			throw new Error('传入线路ID有误');
		}
		parent::query("SELECT s.stop_id, s.stop_name, r.stop_sort FROM bus_stop AS s LEFT JOIN bus_relationship AS r USING (stop_id) LEFT JOIN bus_line AS l USING (line_id) WHERE line_id = {$lineId} ORDER BY stop_sort ASC;");
		$rows = array();
		$i = 0;
		while( $row = parent::fetchArray() ) {
			$rows[$i] = $row;
			$i++;
		}
		return $rows;
	}

	/**
	 *	根据校巴站点ID查询该站点详细信息
	 *
	 *	@param int $stopId [校巴站点ID]
	 *	@return array
	 */

	public function getStopDetail($stopId) {
		if (!is_numeric($stopId)) {
			throw new Error('传入站点ID有误');
		}
		parent::query("SELECT * FROM bus_stop WHERE stop_id = {$stopId} LIMIT 1;");
		$rows = array();
		$i = 0;
		while( $row = parent::fetchArray() ) {
			$rows[$i] = $row;
			$i++;
		}
		return $rows;
	}

	/**
	 *	根据校巴站点名称查询站点简表
	 *
	 *	@param string $stopName [校巴站点名称 (部分字符)]
	 *	@return array
	 */

	public function getStopListByName($stopName) {
		$stopName = parent::realEscapeString($stopName);
		parent::query("SELECT stop_id, stop_name FROM bus_stop WHERE stop_name = '{$stopName}' ORDER BY stop_id ASC;");
		$rows = array();
		$i = 0;
		while( $row = parent::fetchArray() ) {
			$rows[$i] = $row;
			$i++;
		}
		return $rows;
	}

	/**
	 *	输出校巴站点列表
	 *
	 *	@return array
	 */

	public function getStopList() {
		parent::query("SELECT stop_id, stop_name FROM bus_stop;");
		$rows = array();
		$i = 0;
		while( $row = parent::fetchArray() ) {
			$rows[$i] = $row;
			$i++;
		}
		return $rows;

	}

	/**
	 *	输出校巴站点名称 (供jQuery.autocomplete匹配站点名称使用)
	 *
	 *	@return array
	 */

	public function getStopName() {
		parent::query("SELECT stop_name FROM bus_stop;");
		$rows = array();
		$i = 0;
		while( $row = parent::fetchArray() ) {
			$rows[$i] = $row;
			$i++;
		}
		return $rows;

	}

	/**
	 *	根据站点ID查询途径该站点的校巴线路
	 *
	 *	@param int $stopId [校巴站点ID]
	 *	@return array
	 */

	public function getLineByStopId($stopId) {
		if (!is_numeric($stopId)) {
			throw new Error('传入站点ID有误');
		}
		parent::query("SELECT l.line_id, l.line_name, l.line_start, l.line_end FROM bus_stop AS s LEFT JOIN bus_relationship as r USING (stop_id) LEFT JOIN bus_line AS l USING (line_id) WHERE stop_id = {$stopId} ORDER BY line_id ASC;");
		$rows = array();
		$i = 0;
		while( $row = parent::fetchArray() ) {
			$rows[$i] = $row;
			$i++;
		}
		return $rows;
	}

}
