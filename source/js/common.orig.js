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
	 *	线路路径存储变量
	 *
	 *	@var array
	 */

	var linePath = '';

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
			var map = new AMap.Map('busmap',{
				resizeEnable: true,
				zoom: 16,
				center: [113.354573, 23.155394]
			});
			AMap.plugin(['AMap.Scale'], function() {
				var scale = new AMap.Scale();
				map.addControl(scale);
			});

			getStopLocation(map);
			getBusLocation(map);
			refreshDevice();

			getBusLocationInterval = setInterval(function() {
				getBusLocation(map);
				refreshDevice();
			}, 15000);

		}
	}

	/**
	 *	刷新设备状态
	 *
	 *	@return void
	 */

	function refreshDevice() {
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
		});
		setTimeout(function() {
			if (ajax) {
				ajax.abort();
				ajax = null;
				refreshDevice();
			}
		}, 10000);
	}

	/**
	 *	刷新实时站点列表
	 *
	 *	@return void
	 */

	function refreshStopList() {
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
		});
		setTimeout(function() {
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
				}, 15000);
			} else {
				clearInterval(stopListInterval);
			}
		}, 5);
	}

	/**
	 *	加载校巴位置
	 *
	 *	@param object mapa [地图实例]
	 *	@return void
	 */

	function getBusLocation(map) {
		var aj = $.get('./ajax/ajax.GetBusLocation.php', function(r) {
			map.remove(busOnline);
			map.remove(busOffline);
			var online = r.online;
			var offline = r.offline;
			for (i = 0; i < online.length; i++) {
				marker = new AMap.Marker({
					icon: './source/img/map-marker/marker-bus-online.png',
					position: online[i].position,
					title: online[i].title + '（终端在线）'
				});
				marker.setMap(map);
				busOnline.push(marker);

			}
			for (k = 0; k < offline.length; k++) {
				marker = new AMap.Marker({
					icon: './source/img/map-marker/marker-bus-offline.png',
					position: offline[k].position,
					title: offline[k].title + '（终端离线）'
				});
				marker.setMap(map);
				busOffline.push(marker);
			}
			aj = null;
		});

		setTimeout(function() {
			if (aj) {
				aj.abort();
				aj = null;
				getBusLocation(map);
			}
		}, 10000);
	}

	/**
	 *	加载站点位置
	 *
	 *	@param object map [地图实例]
	 *	@return void
	 */

	function getStopLocation(map) {
		var aj = $.get('./ajax/ajax.GetStopLocation.php', function(r) {
			for (i = 0; i < r.length; i++) {
				marker = new AMap.Marker({
					icon: './source/img/map-marker/marker-stop.png',
					position: r[i].position,
					title: r[i].title
				});
				marker.setMap(map);
			}
			aj = null;
		});
		setTimeout(function() {
			if (aj) {
				aj.abort();
				aj = null;
				getStopLocation();
			}
		}, 10000);
	}

	/**
	 *	加载校巴线路路径
	 *
	 *	@param object map [地图实例]
	 *	@return void
	 */

	function getLinePath(map) {
		var line = [ 
				[113.346806, 23.158857],
				[113.34614, 23.158975],
				[113.347085,23.158482],
				[113.347278,23.158482],
				[113.347557,23.158403],
				[113.347578,23.158383],
				[113.348072,23.158995],
				[113.348683,23.158975],
				[113.349617,23.158798],
				[113.35011,23.15866],
				[113.352599,23.15861],
				[113.352599,23.159271],
				[113.352717,23.159202],
				[113.35306,23.159163],
				[113.353318,23.159182],
				[113.353618,23.159232],
				[113.354123,23.159182],
				[113.354112,23.159172],
				[113.354466,23.157683],
				[113.35453,23.154783],
				[113.354638,23.154694],
				[113.357062,23.154674],
				[113.357127,23.153086],
				[113.366225,23.153086],
				[113.366439,23.153106],
				[113.366439,23.151439],
				[113.366783,23.151675],
				[113.369701,23.151715],
				[113.369744,23.153106],
				[113.372008,23.154013],
				[113.372093,23.154615],
				[113.371418,23.155256],
				[113.370087,23.156854],
				[113.369411,23.157426],
				[113.368328,23.158018],
				[113.368338,23.160524]
			];

			var polyline = new AMap.Polyline({
				path: line,
				strokeColor: '#0099ff',
				strokeOpacity: 0.8,
				strokeWeight: 5,
				strokeStyle: 'soild',
				strokeDasharray: [10, 5]
			});

			polyline.setMap(map);
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