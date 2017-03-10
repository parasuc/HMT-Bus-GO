				<div class="page-header">
					<h3><span class="fa fa-bus"></span> 校巴线路查询</h3>
				</div>

				<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="fa fa-code-fork"></span> 线路列表</h3>
					</div>
					<div class="panel-body">
						请选择下面的一条线路：
					</div>
					<div class="list-group">
					<?php for ($i = 0; $i < $this->data['total']; $i++): ?>
						<a href="./index.php?mod=lineinfo&id=<?php print $this->data['rows'][$i]['line_id']; ?>" class="list-group-item"><span class="fa fa-bus"></span> <?php print $this->data['rows'][$i]['line_name']; ?> [ <?php print $this->data['rows'][$i]['line_start']; ?> 至 <?php print $this->data['rows'][$i]['line_end']; ?> ]</a>
					<?php endfor; ?>
					</div>
				</div>
