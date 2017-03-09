				<div class="alert alert-info fade in">
					<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
					<p>欢迎使用华农校巴查询程序！</p>
					<p>选择一种查询方式，然后开始检索校巴信息吧！</p>
				</div>

				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#line" aria-controls="line" role="tab" data-toggle="tab">校巴线路列表</a></li>
					<li role="presentation"><a href="#stop" aria-controls="stop" role="tab" data-toggle="tab">校巴站点查询</a></li>
				</ul>

				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="line">
						<div class="list-group">
						<?php for ($i = 0; $i < $this->data['total']; $i++): ?>
							<a href="./index.php?mod=lineinfo&id=<?php print $this->data['rows'][$i]['line_id']; ?>" class="list-group-item"><?php print $this->data['rows'][$i]['line_name']; ?> [ <?php print $this->data['rows'][$i]['line_start']; ?> 至 <?php print $this->data['rows'][$i]['line_end']; ?> ]</a>
						<?php endfor; ?>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="stop">
						<form id="stopSearch" action="./index.php?mod=stopsearch" method="get">
							<p>
								<div class="input-group">
									<span class="input-group-addon">站点名称</span>
									<input type="text" id="stopName" class="form-control" name="name" placeholder="请键入车站名称..." required>
								</div>
							</p>
							<p>
								<button type="submit" id="submitBtn" class="btn btn-primary form-control"><span class="fa fa-search"></span> 查询</button>
							</p>
						</form>
					</div>
				</div>