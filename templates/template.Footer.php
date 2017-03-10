			</div>
			<div class="col-sm-2 hidden-xs"></div>
		</div>
		<!-- /.container -->

		<!-- .footer -->
		<div class="footer">
			<p><?php $SCAUBus->Options->copyright(); ?></p>
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

		<!-- scripts -->
		<script src="<?php $SCAUBus->Options->sourceUrl('js/jquery.js'); ?>"></script>
		<script src="<?php $SCAUBus->Options->sourceUrl('js/bootstrap.js'); ?>"></script>
		<script src="<?php $SCAUBus->Options->sourceUrl('js/jqui.js'); ?>"></script>
		<script src="<?php $SCAUBus->Options->sourceUrl('js/pjax.js'); ?>"></script>
		<script src="<?php $SCAUBus->Options->sourceUrl('js/nprogress.js'); ?>"></script>
		<script src="<?php $SCAUBus->Options->sourceUrl('js/common.php'); ?>"></script>
		<!-- /scripts -->
	</body>
</html>
<?php ob_end_flush(); ?>