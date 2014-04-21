<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('../lib/bootstrap/dist/css/bootstrap');

		echo $this->Html->script('../lib/jquery/dist/jquery');

		echo $this->Html->script('../lib/bootstrap/dist/js/bootstrap');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<style type="text/css">
		.btn{
			border: 0;
		}
		.btn-search{
			border: 1px solid #CCC;
		}
		.btn-success{
			background-color: #2ecc71;
		}
		.btn-success:hover{
			background-color: #27ae60;
		}

		.btn-default{
			/*background-color: #ecf0f1;*/
			border: 1px solid #CCC;
		}
		.btn-default:hover{
			background-color: #EEE;
		}

		.btn-primary{
			background-color: #3498db;
		}
		.btn-primary:hover{
			background-color: #2980b9;
		}

		.btn-danger{
			background-color: #e74c3c;
		}
		.btn-danger:hover{
			background-color: #c0392b;
		}

		.navbar-brand{
			color: #FFF!important;
		}
		.breadcrumb-admin{
			padding: 10px 15px;
			font-size: 15px;
			opacity: 0.95;
			z-index: 10;
			position: fixed;
			width: 100%;
			margin-left: -15px;
			margin-top: 1px;
			background-color: #F8F8F8;
			/*background-color: red;*/
			border-bottom: 1px solid #E7E7E7;
			border-radius: 0;
		}
		thead{
/*			background: rgb(255,255,255);
			background: -moz-linear-gradient(top,  rgba(255,255,255,1) 0%, rgba(229,229,229,1) 100%);
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,1)), color-stop(100%,rgba(229,229,229,1)));
			background: -webkit-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%);
			background: -o-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%);
			background: -ms-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%);
			background: linear-gradient(to bottom,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#e5e5e5',GradientType=0 );*/
		}
		ul.nav-custom li a{
			color: #555;
			font-size: 15px;
		}
		ul.nav-custom li.active a, ul.nav-custom li.active a .icon-menu{
			color: #FFF;
		}
		ul.nav-custom li.active, ul.nav-custom li.active a:hover{
			background-color: #3498DB;
		}
		.icon-menu{
			font-size: 16px;
			color: #3498DB;
			margin-right: 10px;
		}
		a.navbar-admin-user{
			color: #FFF!important;
		}

		html, body {
		  height: 100%;
		}
		.page-wrap {
		  min-height: 100%;
		}
		.page-wrap:after {
		  content: "";
		  display: block;
		}
		.side-menu{
			z-index: 1;
			background-color: #F8F8F8;
			border-right: 1px solid #E7E7E7;
			position: fixed;
			height: 100%;
			padding: 0;
			display: block;
		}
		.menu-navbar .icon-menu{
			color: #FFF;
		}
		@media (max-width: 768px) {
			.btn-novo{
				width: 100%;
			}
		}
		@media (min-width: 769px) and (max-width: 992px) {

		}
		@media (min-width: 993px) and (max-width: 1200px) {

		}
		@media (min-width: 1201px) {

		}
	</style>
</head>
<body>

	<?php echo $this->element('BootstrapAdmin.navbar'); ?>

	<div class="page-wrap">
		<div class="container-fluid" style="margin-top: 50px;">
			<div class="row">
				<div class="col-md-2 col-sm-2 hidden-xs side-menu" style="">
					<?php echo $this->element('BootstrapAdmin.side_menu'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-10 col-sm-10 col-sm-offset-2 col-md-offset-2">
					<?php echo $this->fetch('content'); ?>
				</div>
			</div>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
