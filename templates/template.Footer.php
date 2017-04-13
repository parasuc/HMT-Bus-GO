				</div>
				<div class="col-sm-2 hidden-xs"></div>
			</div>
		</div>
		<!-- /.container -->

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
		<script src="<?php $this->sourceUrl('js/jquery.js'); ?>"></script>
		<script src="<?php $this->sourceUrl('js/bootstrap.js'); ?>"></script>
		<script src="<?php $this->sourceUrl('js/jqui.js'); ?>"></script>
		<script src="<?php $this->sourceUrl('js/pjax.js'); ?>"></script>
		<script src="<?php $this->sourceUrl('js/nprogress.js'); ?>"></script>
		<script src="<?php $this->sourceUrl('js/common.js'); ?>"></script>
		<!-- /scripts -->
	</body>
</html>
<?php ob_end_flush(); ?>