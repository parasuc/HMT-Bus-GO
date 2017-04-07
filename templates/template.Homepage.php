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
		<link rel="stylesheet" href="<?php $this->sourceUrl('css/homepage.css'); ?>">
		<!--[if lt IE 9]>
			<script src="<?php $this->sourceUrl('js/html5.js'); ?>"></script>
			<script src="<?php $this->sourceUrl('js/respond.js'); ?>"></script>
		<![endif]-->
	</head>

	<body>
		<div class="site-wrapper">
			<div class="site-wrapper-inner">
				<div id="container" class="cover-container">

					<div class="masthead clearfix">
						<div class="inner">
							<h3 class="masthead-brand"><span class="fa fa-bus"></span> <?php $this->sysName(); ?></h3>
							<nav>
								<ul class="nav masthead-nav">
									<li class="active"><a href="javascript:;"><span class="fa fa-home"></span> 首页</a></li>
									<li><a href="./index.php?mod=lineindex"><span class="fa fa-code-fork"></span> 线路查询</a></li>
									<li><a href="./index.php?mod=stopindex"><span class="fa fa-map-marker"></span> 站点查询</a></li>
									<li><a href="./index.php?mod=realtimestatus"><span class="fa fa-clock-o"></span> 实时状态</a></li>
								</ul>
							</nav>
						</div>
					</div>

					<div class="inner cover">
						<h1 class="cover-heading">校巴信息了如执掌！</h1>
						<p class="lead"></p>
						<p class="lead">校巴信息实时更新，随时随地掌握校巴动态，</p>
						<p class="lead">让您更便捷地搭乘校巴。</p>
					</div>

					<br><br>

					<div class="inner cover">
						<div class="col-sm-4">
							<p class="lead"><a href="./index.php?mod=lineindex" class="btn btn-lg btn-default"><span class="fa fa-code-fork"></span> 查询校巴线路</a></p>
						</div>
						<div class="col-sm-4">
							<p class="lead"><a href="./index.php?mod=stopindex" class="btn btn-lg btn-default"><span class="fa fa-map-marker"></span> 查询校巴站点</a></p>
						</div>
						<div class="col-sm-4">
							<p class="lead"><a href="./index.php?mod=realtimestatus" class="btn btn-lg btn-default"><span class="fa fa-clock-o"></span> 实时校巴状态</a></p>
						</div>
					</div>

					<div class="mastfoot">
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
		<script src="<?php $this->sourceUrl('js/homepage.js'); ?>"></script>
		<!-- /scripts -->
	</body>
</html>
<?php ob_end_flush(); ?>