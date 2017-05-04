			<div class="container">
				<div class="row">
					<div class="col-sm-1 hidden-xs"></div>
					<div class="col-sm-10">
				<div class="page-header">
					<h3><span class="fa fa-bus"></span> 实时校巴查询</h3>
				</div>
				<div class="alert alert-info">
					<strong><span class="fa fa-exclamation-circle"></span> 注意！</strong> 部分车辆尚未安装GPS终端，或者GPS终端失灵，导致显示不出实时位置。所以实时位置仅供参考，一切以实际情况为准。
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h3 class="panel-title"><span class="fa fa-bus"></span> 1号线</h3>
							</div>
							<div class="list-group">
							<?php foreach($this->data['line1'] as $line1): ?>
								<a href="./index.php?mod=lineinfo&id=<?php print $line1['line_id']; ?>" class="list-group-item"><span class="fa fa-bus"></span> <?php print $line1['line_name']; ?> [ <?php print $line1['line_start']; ?> 至 <?php print $line1['line_end']; ?> ]</a>
							<?php endforeach; ?>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="panel panel-warning">
							<div class="panel-heading">
								<h3 class="panel-title"><span class="fa fa-bus"></span> 2号线</h3>
							</div>
							<div class="list-group">
							<?php foreach($this->data['line2'] as $line2): ?>
								<a href="./index.php?mod=lineinfo&id=<?php print $line2['line_id']; ?>" class="list-group-item"><span class="fa fa-bus"></span> <?php print $line2['line_name']; ?> [ <?php print $line2['line_start']; ?> 至 <?php print $line2['line_end']; ?> ]</a>
							<?php endforeach; ?>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title"><span class="fa fa-bus"></span> 3号线</h3>
							</div>
							<div class="list-group">
							<?php foreach($this->data['line3'] as $line3): ?>
								<a href="./index.php?mod=lineinfo&id=<?php print $line3['line_id']; ?>" class="list-group-item"><span class="fa fa-bus"></span> <?php print $line3['line_name']; ?> [ <?php print $line3['line_start']; ?> 至 <?php print $line3['line_end']; ?> ]</a>
							<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
					</div>
					<div class="col-sm-1 hidden-xs"></div>
				</div>
			</div>