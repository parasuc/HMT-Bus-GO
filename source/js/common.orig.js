/*!
 *	HMT Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note 通用JavaScript
 */

(function($) {

	/**
	 *	在线设备HTML存储变量
	 *
	 *	@var string
	 */

	var online = "";

	/**
	 *	在线设备HTML存储变量
	 *
	 *	@var string
	 */

	var offline = "";

	/**
	 *	实时站点HTML存储变量
	 *
	 *	@var string
	 */

	var stopList = "";

	/**
	 *	定义实时站点自动刷新Flag
	 *
	 *	@var bool
	 */

	var autoRefreshStopFlag = 0;

	/**
	 *	定义工作日时刻表展开Flag
	 *
	 *	@var bool
	 */

	var timetableWeekdayFlag = 0;

	/**
	 *	定义周末时刻表展开Flag
	 *
	 *	@var bool
	 */

	var timetableWeekendFlag = 0;

	/**
	 *	定义计时器
	 *
	 *	@var object
	 */
	var stopListInterval, deviceInterval, getBusLocationInterval;

	/**
	 *	线路ID存储变量
	 *
	 *	@var int
	 */

	var lineId;

	/**
	 *	定义Ajax对象
	 *
	 *	@var Object
	 */

	var ajax = null;

	/**
	 *	定义点标记
	 *
	 *	@var Object
	 */

	var busOnline = busOffline = [];

	/**
	 *	定义地图实例存储变量
	 *
	 *	@var object
	 */

	var map;

	/**
	 *	线路路径存储变量
	 *
	 *	@var array
	 */

	var polyline;

	/**
	 *	绑定所有的事件处理器
	 *
	 *	@return void
	 */

	function doActions() {
		$("#stopName").autocomplete({
			source: "./ajax/ajax.StopName.php"
		});
		NProgress.configure({
			showSpinner: false,
			parent: "#progress-embeded"
		});
		$("#device-refresh-btn").on("click", function() {
			$("#device-refresh-btn").html("刷新中...");
			$("#device-refresh-btn").addClass("disabled");
			$("#loader").fadeIn("fast");
			NProgress.start();
			refreshDevice();
		});
		$("#device-auto-refresh-btn").on("click", function() {
			autoRefreshDevice();
		});
		$("#stop-refresh-btn").on("click", function() {
			lineId = $("#line-id").val();
			$("#stop-refresh-btn").html("刷新中...");
			$("#stop-refresh-btn").addClass("disabled");
			$("#loader").fadeIn("fast");
			NProgress.start();
			refreshStopList();
		});
		$("#stop-auto-refresh-btn").on("click", function() {
			autoRefreshStopList();
		});
		$('#toggle-timetable-weekday').on('click', function() {
			timetableWeekendFlag = 0;
			$('#timetable-weekend').fadeOut('fast');
			if (timetableWeekdayFlag) {
				$('#toggle-timetable-weekday').html('<span class="fa fa-expand"></span> 展开工作日时刻表');
				$('#timetable-weekday').fadeOut('fast');
				timetableWeekdayFlag = 0;

			} else {
				$('#toggle-timetable-weekday').html('<span class="fa fa-compress"></span> 收起工作日时刻表');
				$('#timetable-weekday').fadeIn('fast');
				timetableWeekdayFlag = 1;
			}
		});
		$('#toggle-timetable-weekend').on('click', function() {
			timetableWeekdayFlag = 0;
			$('#timetable-weekday').fadeOut('fast');
			if (timetableWeekendFlag) {
				$('#toggle-timetable-weekend').html('<span class="fa fa-expand"></span> 展开周末节假日时刻表');
				$('#timetable-weekend').fadeOut('fast');
				timetableWeekendFlag = 0;

			} else {
				$('#toggle-timetable-weekend').html('<span class="fa fa-compress"></span> 收起周末节假日时刻表');
				$('#timetable-weekend').fadeIn('fast');
				timetableWeekendFlag = 1;
			}
		});
		$('#toggle-wxss-qrcode').on('click', function() {
			$('#wxss-qrcode').modal('show');
		});
		
		if (document.getElementById('busmap')) {
			map = new AMap.Map('busmap',{
				resizeEnable: true,
				zoom: 15,
				center: [113.359423, 23.157328]
			});
			AMap.plugin(['AMap.Scale'], function() {
				var scale = new AMap.Scale();
				map.addControl(scale);
			});
			AMap.plugin('AMap.Geolocation', function() {
				var geolocation = new AMap.Geolocation({
					enableHighAccuracy: true,
					timeout: 60000,
					buttonOffset: new AMap.Pixel(10, 20),
					zoomToAccuracy: true,
					buttonPosition: 'RB',
					markerOptions: {
						icon: './source/img/map-marker/marker-you.png',
						offset: new AMap.Pixel(-18, -18)
					}
				});
				map.addControl(geolocation);
				geolocation.getCurrentPosition();
			});

			getStopLocation();
			getBusLocation();
			refreshDevice();

			getBusLocationInterval = setInterval(function() {
				getBusLocation();
				refreshDevice();
			}, cacheTimeout);

			$('a[class="list-group-item get-polyline-link"]').on('click', function(e) {
				var lineId = e.currentTarget.id;
				getPolyline(lineId);
			});

		}
	}

	/**
	 *	刷新设备状态
	 *
	 *	@return void
	 */

	function refreshDevice() {
		var timeout;
		online = "";
		offline = "";
		ajax = $.get("./ajax/ajax.GetDevice.php", function(r) {
			for (a = 0; a < r["ONLINE"].length; a++) {
				online += '<div class="col-sm-4"><div class="panel panel-success"><div class="panel-heading"><h3 class="panel-title"><span class="fa fa-bus"></span> ' + r["ONLINE"][a]["BUS_NUM"] + '</h3></div><ul class="list-group"><li class="list-group-item"><strong>终端状态:</strong> <span class="text-success">在线</span></li><li class="list-group-item"><strong>执行线路:</strong> ' + r["ONLINE"][a]["LINE_NAME"] + '</li><li class="list-group-item"><strong>当前站:</strong> ' + r["ONLINE"][a]["CURRENT_STOP_NAME"] + '</li><li class="list-group-item"><strong>下一站:</strong> ' + r["ONLINE"][a]["NEXT_STOP_NAME"] + '</li><li class="list-group-item"><strong>GPS最后更新时间:</strong> ' + r["ONLINE"][a]["UPDATE_TIME"] + "</li></ul></div></div>"
			}
			for (b = 0; b < r["OFFLINE"].length; b++) {
				offline += '<div class="col-sm-4"><div class="panel panel-danger"><div class="panel-heading"><h3 class="panel-title"><span class="fa fa-bus"></span> ' + r["OFFLINE"][b]["BUS_NUM"] + '</h3></div><ul class="list-group"><li class="list-group-item"><strong>终端状态:</strong> <span class="text-danger">离线</span></li><li class="list-group-item"><strong>GPS最后更新时间:</strong> ' + r["OFFLINE"][b]["UPDATE_TIME"] + "</li></ul></div></div>"
			}
			$("#online-list").html(online);
			$("#offline-list").html(offline);
			NProgress.done();
			ajax = null;
			clearTimeout(timeout);
		});
		timeout = setTimeout(function() {
			if (ajax) {
				ajax.abort();
				ajax = null;
				refreshDevice();
			}
		}, 4000);
	}

	/**
	 *	刷新实时站点列表
	 *
	 *	@return void
	 */

	function refreshStopList() {
		var timeout;
		stopList = "";
		ajax = $.post("./ajax/ajax.GetStop.php", {lineId: lineId}, function(r) {
			for (i = 0; i < r.length; i++) {
				stopList += '<a href="./index.php?mod=stopinfo&id=' + r[i]["stop_id"] + '" class="list-group-item">';
				if (r[i]["have_bus"]) {
					stopList += '<span class="badge"><span class="fa fa-bus"></span> ' + r[i]["have_bus"] + "</span>"
				}
				stopList += '<span class="fa fa-map-marker"></span> ' + r[i]["stop_name"] + "</a>"
			}
			$("#stop-list").html(stopList);
			$("#stop-refresh-btn").html('<span class="fa fa-refresh"></span> 刷新数据');
			$("#stop-refresh-btn").removeClass("disabled");
			$("#loader").fadeOut("fast");
			NProgress.done();
			ajax = null;
			clearTimeout(timeout);
		});
		timeout = setTimeout(function() {
			if (ajax) {
				ajax.abort();
				ajax = null;
				$('#timeout').modal('show');
				$("#stop-refresh-btn").html('<span class="fa fa-refresh"></span> 刷新数据');
				$("#stop-refresh-btn").removeClass("disabled");
				$("#loader").fadeOut("fast");
				NProgress.done();
				$("#status").html("OFF");
				$("#auto-refresh-logo").removeClass("fa-spin");
				autoRefreshStopFlag = 0;
				clearInterval(stopListInterval);
				$("#auto-refresh-flag").prop("checked", false);
				$('#stop-auto-refresh-btn').removeClass('active');
			}
		}, 10000);
	}

	/**
	 *	自动刷新实时站点列表
	 *
	 *	@return void
	 */

	function autoRefreshStopList() {
		setTimeout(function() {
			if ($("#auto-refresh-flag").prop("checked")) {
				$("#status").html("ON");
				$("#auto-refresh-logo").addClass("fa-spin");
				autoRefreshStopFlag = 1;
			} else {
				$("#status").html("OFF");
				$("#auto-refresh-logo").removeClass("fa-spin");
				autoRefreshStopFlag = 0;
			}
			if (autoRefreshStopFlag) {
				stopListInterval = setInterval(function() {
					$("#stop-refresh-btn").addClass("disabled");
					$("#stop-refresh-btn").html("刷新中...");
					$("#loader").fadeIn("fast");
					NProgress.start();
					refreshStopList();
				}, cacheTimeout);
			} else {
				clearInterval(stopListInterval);
			}
		}, 5);
	}

	/**
	 *	加载校巴位置
	 *
	 *	@return void
	 */

	function getBusLocation() {
		var timeout;
		var aj = $.get('./ajax/ajax.GetBusLocation.php', function(r) {
			map.remove(busOnline);
			map.remove(busOffline);
			var online = r.online;
			var offline = r.offline;
			for (i = 0; i < online.length; i++) {
				onlineMarker = new AMap.Marker({
					icon: './source/img/map-marker/marker-bus-online.png',
					position: online[i].position,
					offset: new AMap.Pixel(-18, -18),
					extData: {
						busNum: online[i].busNum,
						line: online[i].line,
						currentStop: online[i].currentStop,
						nextStop: online[i].nextStop,
						lastUpdate: online[i].lastUpdate
					}
				});
				onlineMarker.setMap(map);
				busOnline.push(onlineMarker);
				AMap.event.addListener(onlineMarker, 'click', function(e) {
					var data = e.target.G.extData;
					var title = '<span class="fa fa-bus"></span> ' + data.busNum;
					var content = '<ul class="list-group">';
					content += '<li class="list-group-item"><strong>终端状态:</strong> <span class="text-success">在线</span></li>'; 
					content += '<li class="list-group-item"><strong>执行线路:</strong> ' + data.line + '</li>';
					content += '<li class="list-group-item"><strong>当前站:</strong> ' + data.currentStop + '</li>';
					content += '<li class="list-group-item"><strong>下一站:</strong> ' + data.nextStop + '</li>';
					content += '<li class="list-group-item"><strong>GPS最后更新时间:</strong> ' + data.lastUpdate + '</li>';
					content += '</ul>';
					showMarkerDetail(title, content);
				});

			}
			for (k = 0; k < offline.length; k++) {
				offlineMarker = new AMap.Marker({
					icon: './source/img/map-marker/marker-bus-offline.png',
					position: offline[k].position,
					offset: new AMap.Pixel(-18, -18),
					extData: {
						busNum: offline[k].busNum,
						lastUpdate: offline[k].lastUpdate
					}
				});
				offlineMarker.setMap(map);
				busOffline.push(offlineMarker);
				AMap.event.addListener(offlineMarker, 'click', function(e) {
					var data = e.target.G.extData;
					var title = '<span class="fa fa-bus"></span> ' + data.busNum;
					var content = '<ul class="list-group">';
					content += '<li class="list-group-item"><strong>终端状态:</strong> <span class="text-danger">离线</span></li>'; 
					content += '<li class="list-group-item"><strong>GPS最后更新时间:</strong> ' + data.lastUpdate + '</li>';
					content += '</ul>';
					showMarkerDetail(title, content);
				});
			}
			aj = null;
			clearTimeout(timeout);
		});

		timeout = setTimeout(function() {
			if (aj) {
				aj.abort();
				aj = null;
				getBusLocation();
			}
		}, 4000);
	}

	/**
	 *	加载站点位置
	 *
	 *	@return void
	 */

	function getStopLocation() {
		var timeout;
		var aj = $.get('./ajax/ajax.GetStopLocation.php', function(r) {
			for (i = 0; i < r.length; i++) {
				marker = new AMap.Marker({
					icon: './source/img/map-marker/marker-stop.png',
					position: r[i].position,
					offset: new AMap.Pixel(-18, -18),
					extData: {stopId: r[i].stopId}
				});
				marker.setMap(map);
				AMap.event.addListener(marker, 'click', function(e) {
					var stopId = e.target.G.extData.stopId;
					loadStopDetail(stopId);
				});
			}
			aj = null;
			clearTimeout(timeout);
		});
		timeout = setTimeout(function() {
			if (aj) {
				aj.abort();
				aj = null;
				getStopLocation();
			}
		}, 4000);
	}

	/**
	 *	加载校巴线路路径
	 *
	 *	@param int lineId [线路ID]
	 *	@return void
	 */

	function getPolyline(lineId) {
		if (polyline) {
			polyline.setMap(null);
		}
		var timeout;
		var aj = $.post('./ajax/ajax.GetPolyline.php', {id: lineId}, function(r) {
			polyline = new AMap.Polyline({
				path: r[0].poly_path,
				strokeColor: r[0].poly_color,
				strokeOpacity: 0.8,
				strokeWeight: 5,
				strokeStyle: 'soild',
				strokeDasharray: [10, 5]
			});
			polyline.setMap(map);
			aj = null;
			clearTimeout(timeout);
		});
		timeout = setTimeout(function() {
			if (aj) {
				aj.abort();
				aj = null;
				getPolyline(lineId);
			}
		}, 4000);
	}

	/**
	 *	设置marker-detail模态框并调出
	 *
	 *	@param string title [模态框标题]
	 *	@param string content [模态框正文]
	 *	@return void
	 *	@note 标题和正文都支持HTML
	 */

	function showMarkerDetail(title, content) {
		$('#marker-title').html(title);
		$('#marker-content').html(content);
		$('#marker-detail').modal('show');
	}

	/**
	 *	加载站点详情
	 *
	 *	@param int stopId [站点ID]
	 *	@return void
	 */

	function loadStopDetail(stopId) {
		var timeout;
		NProgress.start();
		$("#loader").fadeIn("fast");
		var aj = $.post('./ajax/ajax.GetStopDetail.php', {id: stopId}, function(r) {
			var stop = r.stop[0];
			var lineList = r.lineList;
			var title = '<span class="fa fa-map-marker"></span> ' + stop.stop_name;
			var content = '<div class="alert alert-info">有 <strong>' + lineList.length + '</strong> 条线路经过此站</div>';
			content += '<div class="list-group">';
			for (i = 0; i < lineList.length; i++) {
				content += '<a data-pjax="no-pjax" href="./index.php?mod=lineinfo&id=' + lineList[i].line_id + '" class="list-group-item"><span class="fa fa-bus"></span> ' + lineList[i].line_name + ' [ ' + lineList[i].line_start + ' 开往 ' + lineList[i].line_end + ' ]</a>';
			}
			content += '</div>';
			showMarkerDetail(title, content);
			$("#loader").fadeOut("fast");
			NProgress.done();
			aj = null;
			clearTimeout(timeout);
		});
		timeout = setTimeout(function() {
			if (aj) {
				aj.abort();
				$('#timeout').modal('show');
				$("#loader").fadeOut("fast");
				NProgress.done();
				aj = null;
			}
		}, 10000);
	}

	/**
	 *	jQuery Events
	 */

	$(document).ready(function() {
		doActions();
		$(document).pjax('a[data-pjax!="no-pjax"]', "#pjax", {
			fragment: "#pjax",
			timeout: 60000
		});
		$(document).on("submit", "#stopSearch", function(r) {
			$.pjax.submit(r, "#pjax", {
				fragment: "#pjax",
				timeout: 60000
			});
		});
		$(document).on("pjax:send", function() {
			clearInterval(deviceInterval);
			clearInterval(stopListInterval);
			clearInterval(getBusLocationInterval);
			ajax = null;
			$("#loader").fadeIn("fast");
			$("#navbar-collapse").collapse({
				toggle: false
			});
			$("#navbar-collapse").collapse("hide");
			NProgress.start();
		});
		$(document).on("pjax:complete", function() {
			$("body,html").animate({
				scrollTop: 0
			}, 0);
			$("#loader").fadeOut("fast");
			NProgress.done();
			doActions();
		});
	});

})(jQuery);