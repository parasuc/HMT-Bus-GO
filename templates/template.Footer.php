			<div class="wrap"></div>
			<div id="timeout" class="modal fade" tabindex="-1" role="dialog">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">连接超时！</h4>
						</div>
						<div class="modal-body">
							<p>可能是您的网络连接较慢，亦或者是服务端出现了故障。</p>
							<p>您可以再一次刷新数据重试。</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">我知道了</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- .footer -->
		<div class="footer">
			<?php print '<img src="' . cnzzTrackPageView(1261727231) . '" width="0" height="0">'; ?>
			<p><?php $this->copyright(); ?></p>
		</div>
		<!-- /.footer -->

		<!-- noscript -->
		<noscript>
			<div class="noscript">
				<div class="alert alert-warning">
					<p><span class="fa fa-exclamation-circle"></span> 似乎您的浏览器没开启JavaScript呢。。。</p>
					<p>校巴查询程序需要JavaScript才能正常运作哦~</p>
					<p>请允许您的浏览器使用JavaScript，再重新载入此页面。</p>
				</div>
			</div>
		</noscript>
		<!-- /nosciprt -->

		<!-- #loader -->
		<div id="loader">
			<div class="loader-body">
				<h1><span class="loader-spinner fa fa-refresh"></span></h1>
				<p>Now Loading</p>
			</div>
		</div>
		<!-- /#loader -->

		<!-- scripts -->
		<script type="text/javascript">cacheTimeout = <?php print (RTB_CACHE_EXPIRES * 1000); ?>;</script>
		<script src="<?php $this->sourceUrl('js/jquery.js'); ?>"></script>
		<script src="<?php $this->sourceUrl('js/bootstrap.js'); ?>"></script>
		<script src="<?php $this->sourceUrl('js/jqui.js'); ?>"></script>
		<script src="<?php $this->sourceUrl('js/pjax.js'); ?>"></script>
		<script src="<?php $this->sourceUrl('js/nprogress.js'); ?>"></script>
		<script src="//webapi.amap.com/maps?v=1.3&key=95a3e9c0b7e3422648da350e5227882e"></script>
		<script src="<?php $this->sourceUrl('js/common.js'); ?>"></script>
		<!-- /scripts -->
	</body>
</html>
<?php ob_end_flush(); ?>