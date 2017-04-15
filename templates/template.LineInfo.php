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
						<input type="hidden" id="line-id" value="<?php @print $_GET['id']; ?>">
					</div>
				</div>

				<div class="row">
					<div class="col-sm-8">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h3 class="panel-title"><span class="fa fa-road"></span> 途经站点（顺序从上到下）</h3>
							</div>
							<div class="list-group" id="stop-list">
							<?php for ($i = 0; $i < $this->data['totalStops']; $i++): ?>
								<a href="./index.php?mod=stopinfo&id=<?php print $this->data['stops'][$i]['stop_id']; ?>" class="list-group-item">
								<?php if ($this->data['stops'][$i]['have_bus']): ?>
									<span class="badge"><span class="fa fa-bus"></span> <?php print $this->data['stops'][$i]['have_bus']; ?></span> 
								<?php endif; ?>
									<span class="fa fa-map-marker"></span> <?php print $this->data['stops'][$i]['stop_name']; ?></a>
							<?php endfor; ?>
							</div>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title"><span class="fa fa-cog"></span> 操作</h3>
							</div>
							<div class="panel-body" data-toggle="buttons">
								<button id="stop-refresh-btn" type="button" class="btn btn-primary"><span class="fa fa-refresh"></span></span> 刷新数据</button> 
								<label class="btn btn-success" id="stop-auto-refresh-btn"><input id="auto-refresh-flag" type="checkbox" autocomplete="off"><span id="auto-refresh-logo" class="fa fa-refresh"></span> 自动刷新 (<span id="status">OFF</span>)</label>
							</div>
						</div>
					</div>
				</div>