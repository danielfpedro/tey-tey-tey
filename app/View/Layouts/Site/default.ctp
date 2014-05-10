<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('Site/style');
		echo $this->Html->css('Site/cake-style');
		// Estilo dos plugin jquery, estou apenas seguinte como estava
		echo $this->Html->css('Site/plugins');

		echo $this->Html->script('../lib/jquery/dist/jquery.min');
		
		// Não faço ideia oq faz, provavelmente instruçoes para alguns plugins
		// echo $this->Html->script('Site/plugins');
		// Não faço ideia oq faz
		// echo $this->Html->script('Site/custom');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>

<body style="background-repeat: no-repeat;"> 	

	<?php echo $this->Session->flash(); ?>

	<?php echo $this->fetch('content'); ?>	

	<?php //echo $this->element('sql_dump'); ?>
</body>

</html>
