				<div class="page-header">
					<h3><span class="fa fa-bus"></span> 校巴线路查询</h3>
				</div>

				<div class="row">
					<div class="col-sm-4">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h3 class="panel-title">1号线</h3>
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
								<h3 class="panel-title">2号线</h3>
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
								<h3 class="panel-title">3号线</h3>
							</div>
							<div class="list-group">
							<?php foreach($this->data['line3'] as $line3): ?>
								<a href="./index.php?mod=lineinfo&id=<?php print $line3['line_id']; ?>" class="list-group-item"><span class="fa fa-bus"></span> <?php print $line3['line_name']; ?> [ <?php print $line3['line_start']; ?> 至 <?php print $line3['line_end']; ?> ]</a>
							<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
