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