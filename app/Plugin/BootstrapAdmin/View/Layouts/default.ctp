<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?> - Painel administrativo
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('/BootstrapAdmin/css/bootstrap.min');

		echo $this->Html->css('/BootstrapAdmin/css/style');

		echo $this->Html->script('/BootstrapAdmin/js/jquery.min');

		echo $this->Html->script('/BootstrapAdmin/js/bootstrap.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script type="text/javascript">
		var webroot = "<?php echo $this->webroot; ?>";

		$(function(){
			$('.tt').tooltip();
		});
	</script>
</head>
<body>
	
	<?php echo $this->element('BootstrapAdmin.navbar'); ?>

	<div id="container-flash" class="container-flash">
		<?php echo $this->Session->flash(); ?>
	</div>

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
