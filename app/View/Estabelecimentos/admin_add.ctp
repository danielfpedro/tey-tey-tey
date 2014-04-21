<div class="breadcrumb breadcrumb-admin">
	<li>
		<?php echo $this->Html->link('Estabelecimentos', array('action'=> 'index')) ?>	</li>
	<li class="active">
		Adicionar Estabelecimento	</li>
</div>

<div class="wrap-internal-page">
	<div class="estabelecimentos form">
	<?php
			echo $this->Form->create('Estabelecimento',
				array('inputDefaults'=>
					array(
						'div'=> array('class'=> 'form-group')
						)
					)
				);
		?>
		<fieldset>
				<?php
		echo $this->Form->input('name', array('empty'=> 'Selecione:','class'=> 'form-control'));
		echo $this->Form->input('Comentario', array('class'=> 'form-control'));
	?>
		</fieldset>

		<div class="row">
			<div class="col-md-2 col-sm-2">
				<?php //echo $this->Html->link('<span class=\'glyphicon glyphicon-ban-circle\'></span> Cancelar', array('controller'=> 'estabelecimentos', 'action'=> 'index'), array('escape'=> false, 'class'=> 'btn btn-danger')); ?>

				<button type="submit" class="btn btn-block btn-primary"><span class='glyphicon glyphicon-saved'></span> Salvar</button>
	
			</div>
			
		</div>
	<?php echo $this->Form->end(); ?>
	</div>
</div>