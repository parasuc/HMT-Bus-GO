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
		<title><?php $SCAUBus->Options->pageTitle(); ?></title>
		<link rel="stylesheet" href="//fonts.lug.ustc.edu.cn/css?family=Work+Sans:300,400,700">
		<link rel="stylesheet" href="<?php $SCAUBus->Options->sourceUrl('css/bootstrap.css'); ?>">
		<link rel="stylesheet" href="<?php $SCAUBus->Options->sourceUrl('css/icons.css'); ?>">
		<link rel="stylesheet" href="<?php $SCAUBus->Options->sourceUrl('css/jqui.css'); ?>">
		<link rel="stylesheet" href="<?php $SCAUBus->Options->sourceUrl('css/nprogress.css'); ?>">
		<link rel="stylesheet" href="<?php $SCAUBus->Options->sourceUrl('css/bus.css'); ?>">
		<!--[if lt IE 9]>
			<script src="<?php $SCAUBus->Options->sourceUrl('js/html5.js'); ?>"></script>
			<script src="<?php $SCAUBus->Options->sourceUrl('js/respond.js'); ?>"></script>
		<![endif]-->
	</head>

	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div id="progress-embeded" class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="./index.php"><?php $SCAUBus->Options->sysName(); ?></a>
				</div>
			</div>
		</nav>

		<div class="container">
			<div class="col-sm-2 hidden-xs"></div>
			<div class="col-sm-8" id="pjax">