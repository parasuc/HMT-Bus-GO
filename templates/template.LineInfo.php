				<div class="page-header">
					<h3><span class="fa fa-bus"></span> 线路详情</h3>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="fa fa-bus"></span> 线路信息</h3>
					</div>
					<div class="panel-body">
						<p><strong><?php print $this->data['line'][0]['line_name']; ?> [ <?php print $this->data['line'][0]['line_start']; ?> 至 <?php print $this->data['line'][0]['line_end']; ?> ]</strong></p>
						<span class="fa fa-clock-o"></span> <?php print $this->data['line'][0]['first_bus']; ?> ~ <?php print $this->data['line'][0]['last_bus']; ?>
					</div>
				</div>

				<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="fa fa-road"></span> 途径站点（顺序从上到下）</h3>
					</div>
					<div class="list-group">
					<?php for ($i = 0; $i < $this->data['totalStops']; $i++): ?>
						<a href="./index.php?mod=stopinfo&id=<?php print $this->data['stops'][$i]['stop_id']; ?>" class="list-group-item"><span class="fa fa-map-marker"></span> <?php print $this->data['stops'][$i]['stop_name']; ?></a>
					<?php endfor; ?>
					</div>
				</div>