<?php
/**
 *	HMT Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note 实时校巴查询类
 *	@package Curl
 */

class RealTimeBus extends Curl {

	/**
	 *	实时校巴原始数据存储对象
	 *
	 *	@var string
	 */

	private $raw;

	/**
	 *	实时校巴处理后数据存储对象
	 *
	 *	@var array
	 */

	private $computed = array();

	/**
	 *	内部数据库实例存储对象
	 *
	 *	@var object
	 */

	private $db;

	/**
	 *	构造函数
	 *
	 *	@return void
	 */

	public function __construct() {
		$this->db = new DB();
		/* 判断实时数据缓存是否过期 */
		if ($this->cacheIsExpired()) {
			$this->putCache();
		} else {
			$this->getCache();
		}
		$this->compute();
	}

	/**
	 *	获取实时校巴原始数据
	 *
	 *	@return void
	 */

	private function getRawData() {
		$this->raw = parent::get(RTB_DATA_URL);
	}

	/**
	 *	处理实时校巴数据，保留所需的部分
	 *
	 *	@return void
	 */

	private function compute() {
		$raw = json_decode($this->raw, true);
		for ($i = 0; $i < count($raw['data']); $i++) {
			$this->computed[] = array(
				'IS_ONLINE' => $raw['data'][$i]['isol'],
				'BUS_NUM' => $raw['data'][$i]['carnum'],
				'LINE_NAME' => $raw['data'][$i]['linename'],
				'LINE_ID' => $this->getLineId($raw['data'][$i]['linename']),
				'CURRENT_STOP_NAME' => $raw['data'][$i]['cursname'],
				'CURRENT_STOP_ID' => $this->getStopId($raw['data'][$i]['cursname']),
				'NEXT_STOP_NAME' => $raw['data'][$i]['nextsname'],
				'POSITION_LNG' => $raw['data'][$i]['lng'],
				'POSITION_LAT' => $raw['data'][$i]['lat'],
				'UPDATE_TIME' => $raw['data'][$i]['gtime']
			);
		}
	}

	/**
	 *	获取处理过的实时校巴数据
	 *
	 *	@return array
	 */

	public function getData() {
		return $this->computed;
	}

	/**
	 *	获取当前站点ID
	 *
	 *	@param string $stopName [当前站点名称]
	 *	@return int
	 */

	private function getStopId($stopName) {
		$this->db->query("SELECT stop_id FROM bus_stop WHERE stop_name = '{$stopName}' LIMIT 1;");
		if ($this->db->numRows() != 0) {
			$row = $this->db->fetchArray();
			return $row['stop_id'];
		} else {
			return 0;
		}
	}

	/**
	 *	获取当前线路ID
	 *
	 *	@param string $lineName [当前线路名称]
	 *	@return int
	 */

	private function getLineId($lineName) {
		$this->db->query("SELECT line_id FROM bus_keywords WHERE key_name = '{$lineName}' LIMIT 1;");
		if ($this->db->numRows() != 0) {
			$row = $this->db->fetchArray();
			return $row['line_id'];
		} else {
			return 0;
		}
	}

	/**
	 *	根据线路ID获取实时数据
	 *
	 *	@param int $lineId [线路ID]
	 *	@return array
	 */

	public function getDataByLineId($lineId) {
		if (!is_numeric($lineId)) {
			throw new Error('传入线路ID有误');
		}
		$this->db->query("SELECT s.stop_id, s.stop_name, s.stop_alias, r.stop_sort FROM bus_stop AS s LEFT JOIN bus_relationship AS r USING (stop_id) LEFT JOIN bus_line AS l USING (line_id) WHERE line_id = {$lineId} ORDER BY stop_sort ASC;");
		$rows = array();
		$i = 0;
		while( $row = $this->db->fetchArray() ) {
			$rows[$i] = $row;
			$rows[$i]['have_bus'] = 0;
			$i++;
		}
		$online = array();
		foreach ($this->computed as $ol) {
			if ($ol['IS_ONLINE']) {
				$online[] = $ol;
			}
		}
		foreach ($online as $online) {
			$lid = $online['LINE_ID'];
			$sid = $online['CURRENT_STOP_ID'];
			$name = $online['CURRENT_STOP_NAME'];
			if ($lid == $lineId) {
				/* 对于站点ID ($sid) 为0的终端，首先确定其sid */
				if ($sid == 0) {
					foreach ($rows as $row) {
						if ( stripos($row['stop_alias'], $name) !== false ) {
							$sid = $row['stop_id'];
						}
					}
				}
				for ($k = 0; $k < count($rows); $k++) {
					if ($rows[$k]['stop_id'] == $sid) {
						$rows[$k]['have_bus']++;
					}
				}
			}
		}
		return $rows;
	}

	/**
	 *	筛选在线/离线终端
	 *
	 *	@param bool $status [终端状态 (1=在线, 0=离线)]
	 *	@return array
	 */

	public function getDevice($status) {
		$devices = array();
		if ($status) {
			for ($a = 0; $a < count($this->computed); $a++) {
				if ($this->computed[$a]['IS_ONLINE']) {
					$devices[] = $this->computed[$a];
				}
			}
		} else {
			for ($b = 0; $b < count($this->computed); $b++) {
				if (!$this->computed[$b]['IS_ONLINE']) {
					$devices[] = $this->computed[$b];
				}
			}
		}
		return $devices;
	}

	/**
	 *	把实时校巴原始数据缓存到数据库
	 *
	 *	@return void
	 */

	private function putCache() {
		$this->getRawData();
		$this->db->query(sprintf("UPDATE bus_realtime_cache SET `cache_data` = '%s', `cache_expires` = %d LIMIT 1;", $this->raw, time() + RTB_CACHE_EXPIRES));
	}

	/**
	 *	获取缓存数据
	 *
	 *	@return void
	 */

	private function getCache() {
		$this->db->query("SELECT cache_data FROM bus_realtime_cache LIMIT 1;");
		$row = $this->db->fetchArray();
		$this->raw = $row['cache_data'];
	}

	/**
	 *	判断缓存数据是否过期
	 *
	 *	@return bool
	 */

	private function cacheIsExpired() {
		$this->db->query("SELECT cache_expires FROM bus_realtime_cache LIMIT 1;");
		$row = $this->db->fetchArray();
		if (time() > $row['cache_expires']) {
			return true;
		} else {
			return false;
		}
	}

}
