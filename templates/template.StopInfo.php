				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><?php print $this->data['stop'][0]['stop_name']; ?>站</h3>
					</div>
					<div class="panel-body">
						共有以下 <strong><?php print $this->data['totalLine']; ?></strong> 条校巴线路经过本站：
					</div>
					<div class="list-group">
					<?php for ($i = 0; $i < $this->data['totalLine']; $i++): ?>
						<a href="./index.php?mod=lineinfo&id=<?php print $this->data['lineList'][$i]['line_id']; ?>" class="list-group-item"><span class="fa fa-bus"></span> <?php print $this->data['lineList'][$i]['line_name']; ?> [ <?php print $this->data['lineList'][$i]['line_start']; ?> 至 <?php print $this->data['lineList'][$i]['line_end']; ?> ]</a>
					<?php endfor; ?>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="fa fa-map-marker"></span> 站点位置</h3>
					</div>
					<div class="panel-body">
						<p>//Tencent Map Canvas</p>
					</div>
				</div>