<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="zh_CN">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="theme-color" content="#0099ff">
		<meta name="viewport" content="width=device-width, inital-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta http-equiv="Expires" content="0">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-transform">
		<meta http-equiv="Cache-Control" content="no-siteapp">
		<title><?php $this->pageTitle(); ?></title>
		<link rel="icon" type="image/x-icon" href="<?php $this->sourceUrl('img/favicon.jpg'); ?>">
		<link rel="stylesheet" href="//fonts.lug.ustc.edu.cn/css?family=Work+Sans:300,400,700">
		<link rel="stylesheet" href="<?php $this->sourceUrl('css/bootstrap.css'); ?>">
		<link rel="stylesheet" href="<?php $this->sourceUrl('css/icons.css'); ?>">
		<link rel="stylesheet" href="<?php $this->sourceUrl('css/jqui.css'); ?>">
		<link rel="stylesheet" href="<?php $this->sourceUrl('css/nprogress.css'); ?>">
		<link rel="stylesheet" href="<?php $this->sourceUrl('css/common.css'); ?>">
		<!--[if lt IE 9]>
			<script src="<?php $this->sourceUrl('js/html5.js'); ?>"></script>
			<script src="<?php $this->sourceUrl('js/respond.js'); ?>"></script>
		<![endif]-->
	</head>

	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div id="progress-embeded" class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="./index.php"><?php $this->sysName(); ?></a>
				</div>
				<div class="collapse navbar-collapse" id="navbar-collapse">
					<nav class="nav navbar-nav">
						<li><a href="./index.php"><span class="fa fa-home"></span> 首页</a></li>
						<li><a href="./index.php?mod=lineindex"><span class="fa fa-bus"></span> 实时校巴查询</a></li>
						<li><a href="./index.php?mod=stopindex"><span class="fa fa-map-marker"></span> 校巴站点查询</a></li>
						<li><a href="./index.php?mod=busmap"><span class="fa fa-map"></span> 校巴地图</a></li>
						<li><a href="http://hometown.scau.edu.cn:8081/advice/bus" target="_blank"><span class="fa fa-envelope"></span> 意见反馈</a></li>
					</nav>
				</div>
			</div>
		</nav>

		<div id="pjax">
			<style type="text/css">.footer{background-color:#222222;color:#999}.footer a{color:#999}.footer a:hover{color:#999}.footer a:visited{color:#999}</style>
			<div class="homepage">
				<div class="homepage-banner">
					<div class="homepage-banner-text">
						<h1>校巴，我们走</h1>
						<p>&nbsp;</p>
						<p>校巴信息实时更新，随时随地掌握校巴动态</p>
						<p>让您更便捷地搭乘校巴</p>
						<div class="wrap-s"></div>
						<p><a href="./index.php?mod=lineindex" class="btn btn-lg btn-success"><span class="fa fa-play"></span> 开始使用！</a></p>
					</div>
				</div>

				<div class="homepage-feature">
					<div class="container">
						<h1>功能一览</h1>
						<div class="wrap"></div>
						<div class="row">
							<div class="col-sm-4">
								<div class="wrap"></div>
								<span class="feature fa fa-clock-o"></span>
								<h2>实时校巴查询</h2>
								<div class="wrap-s"></div>
								<p>校巴的位置一览无遗</p>
								<p>再也不用在车站里瞎等了</p>
								<div class="wrap"></div>
							</div>
							<div class="col-sm-4">
								<div class="wrap"></div>
								<span class="feature fa fa-calendar"></span>
								<h2>时刻表</h2>
								<div class="wrap-s"></div>
								<p>校巴发车时刻掌握在手</p>
								<p>赶车无压力</p>
								<div class="wrap"></div>
							</div>
							<div class="col-sm-4">
								<div class="wrap"></div>
								<span class="feature fa fa-map"></span>
								<h2>校巴地图</h2>
								<div class="wrap-s"></div>
								<p>校巴，车站，线路... 全在一张地图上</p>
								<p>规划路线更机动</p>
								<div class="wrap"></div>
							</div>
						</div>
						<div class="wrap"></div>
					</div>
				</div>

				<div class="homepage-wxss">
					<div class="container">
						<div class="row">
							<div class="col-sm-1 hidden-xs"></div>
							<div class="col-sm-5">
								<div class="wrap"></div>
								<img src="<?php $this->sourceUrl('img/wxss.png'); ?>" width="155" height="219">
								<div class="wrap"></div>
							</div>
							<div class="col-sm-5">
								<div class="wrap-s"></div>
								<div class="wrap-s"></div>
								<h2>微信小程序已投入使用</h2>
								<div class="wrap-s"></div>
								<p>小程序在手机端体验更好</p>
								<p>定位更精确</p>
								<p><button id="toggle-wxss-qrcode" type="button" class="btn btn-warning" style="color: #993300;">点击获取小程序二维码</button></p>
							</div>
							<div class="col-sm-1 hidden-xs"></div>
						</div>
					</div>
				</div>
			</div>
			<div id="wxss-qrcode" class="modal fade" tabindex="-1" role="dialog">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">扫描二维码添加小程序</h4>
						</div>
						<div class="modal-body">
							<img src="<?php $this->sourceUrl('img/wxss-qrcode.jpg'); ?>" width="100%" height="100%">
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
		<script src="<?php $this->sourceUrl('js/jquery.js'); ?>"></script>
		<script src="<?php $this->sourceUrl('js/bootstrap.js'); ?>"></script>
		<script src="<?php $this->sourceUrl('js/jqui.js'); ?>"></script>
		<script src="<?php $this->sourceUrl('js/pjax.js'); ?>"></script>
		<script src="<?php $this->sourceUrl('js/nprogress.js'); ?>"></script>
		<script src="https://webapi.amap.com/maps?v=1.3&key=95a3e9c0b7e3422648da350e5227882e"></script>
		<script src="<?php $this->sourceUrl('js/common.js'); ?>"></script>
		<!-- /scripts -->
	</body>
</html>
<?php ob_end_flush(); ?>
