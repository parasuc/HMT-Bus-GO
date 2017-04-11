				<div class="page-header">
					<h3><span class="fa fa-bus"></span> 校巴站点检索</h3>
				</div>

				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">站点检索</h3>
					</div>
					<div class="panel-body">
						<form id="stopSearch" action="./index.php?mod=stopsearch" method="get">
							<p>
								<div class="input-group">
									<span class="input-group-addon">站点名称</span>
									<input type="text" id="stopName" class="form-control" name="name" value="<?php @print urldecode($_GET['name']); ?>" placeholder="请键入车站名称..." required>
								</div>
							</p>
							<p>
								<button type="submit" id="submitBtn" class="btn btn-primary form-control"><span class="fa fa-search"></span> 查询</button>
							</p>
						</form>
					</div>
				</div>

			<?php if ($this->data['total'] == 0): ?>
				<div class="alert alert-danger">
					<p><span class="fa fa-exclamation-circle"></span> 未检索到站点 <strong>"<?php @print urldecode($_GET['name']); ?>"</strong></p>
					<p>请更换关键字重试。</p>
				</div>
			<?php else: ?>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="fa fa-search"></span> 检索结果</h3>
					</div>
					<div class="panel-body">
						共检索到 <strong><?php print $this->data['total']; ?></strong> 个校巴站点：
					</div>
					<div class="list-group">
					<?php for ($i = 0; $i < $this->data['total']; $i++): ?>
						<a href="./index.php?mod=stopinfo&id=<?php print $this->data['rows'][$i]['stop_id']; ?>" class="list-group-item"><span class="fa fa-map-marker"></span> <?php print $this->data['rows'][$i]['stop_name']; ?></a>
					<?php endfor; ?>
					</div>
				</div>
			<?php endif; ?>