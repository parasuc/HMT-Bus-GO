			<div class="container">
				<div class="row">
					<div class="col-sm-1 hidden-xs"></div>
					<div class="col-sm-10">
				<div class="page-header">
					<h3><span class="fa fa-bus"></span> 校巴站点查询</h3>
				</div>

				<div class="row">
					<div class="col-sm-4">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title"><span class="fa fa-search"></span> 站点检索</h3>
							</div>
							<div class="panel-body">
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
					</div>

					<div class="col-sm-8">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title"><span class="fa fa-map-marker"></span> 站点列表</h3>
							</div>
							<div class="panel-body">
								亦可点击下面的站点查看详细信息：
							</div>
							<div class="list-group">
							<?php for ($i = 0; $i < $this->data['total']; $i++): ?>
								<a href="./index.php?mod=stopinfo&id=<?php print $this->data['rows'][$i]['stop_id']; ?>" class="list-group-item"><span class="fa fa-map-marker"></span> <?php print $this->data['rows'][$i]['stop_name']; ?></a>
							<?php endfor; ?>
							</div>
						</div>
					</div>
				</div>
					</div>
					<div class="col-sm-1 hidden-xs"></div>
				</div>
			</div>