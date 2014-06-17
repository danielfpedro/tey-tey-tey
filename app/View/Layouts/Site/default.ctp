<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->css('Site/cake-style');
		echo $this->Html->css('Site/style');
		// Estilo dos plugin jquery, estou apenas seguinte como estava
		echo $this->Html->css('Site/js');
	?>
		<!--[if IE 7]>
			<?php echo $this->Html->css('Site/ie7'); ?>
		<![endif]-->
		<!--[if IE 8]>
			<?php echo $this->Html->css('Site/ie8'); ?>
		<![endif]-->
		<!--[if gt IE 8]>
			<?php echo $this->Html->css('Site/ie9'); ?>
		<![endif]-->
	<?php
		//echo $this->Html->script('../lib/jquery/dist/jquery.min');
		echo $this->Html->script('jquery-1.3.min');
		
		echo $this->Html->script('../lib/raty-2.5.2/lib/jquery.raty.min');

		// Não faço ideia oq faz, provavelmente instruçoes para alguns plugins
		// echo $this->Html->script('Site/plugins');
		// Não faço ideia oq faz
		// echo $this->Html->script('Site/custom');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script type="text/javascript">
		var webroot = "<?php echo $this->webroot; ?>";
		
		$(function(){
			var hints = ['Ruim', 'Fraco', 'Regular', 'Bom', 'Excelente'];

			$('#set-estrelas').raty({
				hints: hints,
				scoreName: 'data[Comentario][rate]',
				score: 1,
				path: webroot + 'lib/raty-2.5.2/lib/img',
			});

			$('div#estrelas-readonly').raty({
				noRatedMsg: 'Ainda não recebeu avaliações!',
				hints: hints,
				score: function() {
					return $(this).attr('data-score');
				},		
				path: webroot + 'lib/raty-2.5.2/lib/img',
				readOnly: true,
			});
		});
	</script>
</head>

<body style="background-repeat: no-repeat;"> 	

	<?php echo $this->element('Site/navbar'); ?>

	<?php echo $this->fetch('content'); ?>	

	<?php //echo $this->element('sql_dump'); ?>

	<?php
		echo $this->Html->script('Site/plugins');
		echo $this->Html->script('Site/custom');
	?>

</body>

</html>
