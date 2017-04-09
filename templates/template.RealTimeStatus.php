			<div class="jumbotron">
				<h1>注意 <small>Notice</small></h1>
				<p>此页面为实时校巴的接口的测试页面。</p>
				<p>部分校巴的实时数据回传会出现延迟，所以数据仅供参考。</p>
				<p data-toggle="buttons"><button id="device-refresh-btn" type="button" class="btn btn-primary"><span class="fa fa-refresh"></span></span> 刷新数据</button> <label class="btn btn-success" id="device-auto-refresh-btn"><input id="auto-refresh-flag" type="checkbox" autocomplete="off"><span id="auto-refresh-logo" class="fa fa-refresh"></span> 自动刷新 (<span id="status">OFF</span>)</label></p>
			</div>
			<div class="page-header">
				<h3><span class="fa fa-check-circle"></span> 在线终端 <small>Online Device</small></h3>
			</div>

			<div class="row" id="online-list">
			<?php for ($i = 0; $i < count($this->data['online']); $i++): ?>
				<div class="col-sm-6">
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
				<h3><span class="fa fa-times-circle"></span> 离线终端 <small>Offline Device</small></h3>
			</div>

			<div class="row" id="offline-list">
			<?php for ($j = 0; $j < count($this->data['offline']); $j++): ?>
				<div class="col-sm-6">
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