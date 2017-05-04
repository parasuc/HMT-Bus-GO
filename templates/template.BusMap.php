<div class="wrap"></div>
<div class="container">
	<div class="page-header">
		<h2><span class="fa fa-map"></span> 校巴地图</h2>
	</div>
	<div class="row">
		<div class="col-sm-8">
			<div class="map-border">
				<div id="busmap"></div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">图例</h3>
				</div>
				<ul class="list-group">
					<li class="list-group-item"><img src="<?php $this->sourceUrl('img/map-marker/marker-bus-online.png'); ?>"> 校巴所在位置</li>
					<li class="list-group-item"><img src="<?php $this->sourceUrl('img/map-marker/marker-bus-offline.png'); ?>"> 校巴终端已离线</li>
					<li class="list-group-item"><img src="<?php $this->sourceUrl('img/map-marker/marker-stop.png'); ?>"> 校巴站点位置</li>
					<li class="list-group-item"><img src="<?php $this->sourceUrl('img/map-marker/marker-you.png'); ?>"> 您所在的位置</li>
				</ul>
			</div>
			<div class="alert alert-info">
				<strong><span class="fa fa-info-circle"></span> 提示：</strong> 数据自动刷新间隔：<?php print RTB_CACHE_EXPIRES; ?>秒
			</div>
			<!--<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">线路颜色</h3>
				</div>
				<ul class="list-group">
					<li class="list-group-item"><span class="fa fa-minus" style="color: #0099ff;"></span>&nbsp;&nbsp;1号线</li>
				</ul>
			</div>-->
		</div>
	</div>
	<div class="page-header">
		<h3><span class="fa fa-check-circle"></span> 在线终端</h3>
	</div>
	<div class="row" id="online-list">
	<?php for ($i = 0; $i < count($this->data['online']); $i++): ?>
		<div class="col-sm-4">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="fa fa-bus"></span> <?php print $this->data['online'][$i]['BUS_NUM']; ?></h3>
				</div>
				<ul class="list-group">
					<li class="list-group-item"><strong>终端状态:</strong> <span class="text-success">在线</span></li>
					<li class="list-group-item"><strong>执行线路:</strong> <?php print $this->data['online'][$i]['LINE_NAME']; ?></li>
					<li class="list-group-item"><strong>当前站:</strong> <?php print $this->data['online'][$i]['CURRENT_STOP_NAME']; ?></li>
					<li class="list-group-item"><strong>下一站:</strong> <?php print $this->data['online'][$i]['NEXT_STOP_NAME']; ?></li>
					<li class="list-group-item"><strong>GPS最后更新时间:</strong> <?php print $this->data['online'][$i]['UPDATE_TIME']; ?></li>
				</ul>
			</div>
		</div>
	<?php endfor; ?>
	</div>
	<div class="page-header">
		<h3><span class="fa fa-times-circle"></span> 离线终端</h3>
	</div>
	<div class="row" id="offline-list">
	<?php for ($j = 0; $j < count($this->data['offline']); $j++): ?>
		<div class="col-sm-4">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="fa fa-bus"></span> <?php print $this->data['offline'][$j]['BUS_NUM']; ?></h3>
				</div>
				<ul class="list-group">
					<li class="list-group-item"><strong>终端状态:</strong> <span class="text-danger">离线</span></li>
					<li class="list-group-item"><strong>GPS最后更新时间:</strong> <?php print $this->data['offline'][$j]['UPDATE_TIME']; ?></li>
				</ul>
			</div>
		</div>
	<?php endfor; ?>
	</div>
</div>