<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="zh_CN">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, inital-scale=1, minimum-scale=1">
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
		<link rel="stylesheet" href="<?php $this->sourceUrl('css/onmaintenance.css'); ?>">
		<!--[if lt IE 9]>
			<script src="<?php $this->sourceUrl('js/html5.js'); ?>"></script>
			<script src="<?php $this->sourceUrl('js/respond.js'); ?>"></script>
		<![endif]-->
	</head>

	<body>
		<div class="site-wrapper">
			<div class="site-wrapper-inner">
				<div id="container" class="cover-container">

					<div class="inner cover">
						<p class="wrench-icon"><span class="fa fa-wrench"></span></p>
						<p class="lead"></p>
						<p class="lead"></p>
						<h1 class="cover-heading">- 站 点 维 护 中 -</h1>
						<p class="lead">- ON MAINTENANCE -</p>
					</div>

					<div class="mastfoot">
						<?php print '<img src="' . cnzzTrackPageView(1261727231) . '" width="0" height="0">'; ?>
						<div class="inner">
							<p><?php $this->copyright(); ?></p>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div id="mask"></div>

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
		<script src="<?php $this->sourceUrl('js/jquery.js'); ?>"></script>
		<script src="<?php $this->sourceUrl('js/bootstrap.js'); ?>"></script>
		<script src="<?php $this->sourceUrl('js/onmaintenance.js'); ?>"></script>
		<!-- /scripts -->
	</body>
</html>
<?php ob_end_flush(); ?>