<div class="breadcrumb breadcrumb-admin">
	<li>
		<?php echo $this->Html->link('Comentarios', array('action'=> 'index')) ?>	</li>
	<li class="active">
		Adicionar Comentario	</li>
</div>

<div class="wrap-internal-page">
	<div class="comentarios form">
	<?php
			echo $this->Form->create('Comentario',
				array('inputDefaults'=>
					array(
						'div'=> array('class'=> 'form-group')
						)
					)
				);
		?>
		<fieldset>
				<?php
		echo $this->Form->input('id', array('empty'=> 'Selecione:','class'=> 'form-control'));
		echo $this->Form->input('name', array('empty'=> 'Selecione:','class'=> 'form-control'));
		echo $this->Form->input('usuario_id', array('empty'=> 'Selecione:','class'=> 'form-control'));
		echo $this->Form->input('Estabelecimento', array('class'=> 'form-control'));
	?>
		</fieldset>

		<div class="row">
			<div class="col-md-2 col-sm-2">
				<?php //echo $this->Html->link('<span class=\'glyphicon glyphicon-ban-circle\'></span> Cancelar', array('controller'=> 'comentarios', 'action'=> 'index'), array('escape'=> false, 'class'=> 'btn btn-danger')); ?>

				<button type="submit" class="btn btn-block btn-primary"><span class='glyphicon glyphicon-saved'></span> Salvar</button>
	
			</div>
			
		</div>
	<?php echo $this->Form->end(); ?>
	</div>
</div>