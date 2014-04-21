<?php
	$items = array(
		array(
			'label'=> 'Destaque home',
			'icon'=> 'th-large',
			'url'=> array('controller'=> 'destaques_home')
			),
		array(
			'label'=> 'Estabelecimentos',
			'icon'=> 'th',
			'url'=> array('controller'=> 'estabelecimentos')
			),
		array(
			'label'=> 'Comentários',
			'icon'=> 'comment',
			'url'=> array('controller'=> 'comentarios')
			),
		array(
			'label'=> 'Usuários',
			'icon'=> 'user',
			'url'=> array('controller'=> 'usuarios')
			),
		array(
			'label'=> 'Contatos',
			'icon'=> 'envelope',
			'url'=> array('controller'=> 'contatos')
			),
		);
?>
<!-- <div style="height: 37px; background-color: #F8F8F8;border-bottom: 1px solid #E7E7E7;">
	
</div> -->
<ul class="nav nav-custom" style="">
	<?php foreach ($items as $item): ?>
		<li class="<?php echo ($this->params['controller'] == $item['url']['controller'])? 'active': ''; ?>">
			<?php
				echo $this->Html->link(
					"<span class='glyphicon glyphicon-" .$item['icon']. " icon-menu'></span>" . $item['label'],
					$item['url'],
					array('escape'=> false)
				)
			?>
		</li>
	<?php endforeach ?>
</ul>