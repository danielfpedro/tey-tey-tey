<div class="breadcrumb breadcrumb-admin">
	<li>
		<?php echo $this->Html->link('Protos', array('action'=> 'index')) ?>	</li>
	<li class="active">
		Adicionar Proto	</li>
</div>

<div style="margin-top: 55px;">
	<div class="protos form">
	<?php
			echo $this->Form->create('Proto',
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
	?>
		</fieldset>

		<div class="row">
			<div class="col-md-2 col-sm-2">
				<?php //echo $this->Html->link('<span class=\'glyphicon glyphicon-ban-circle\'></span> Cancelar', array('controller'=> 'protos', 'action'=> 'index'), array('escape'=> false, 'class'=> 'btn btn-danger')); ?>

				<button type="submit" class="btn btn-block btn-primary"><span class='glyphicon glyphicon-saved'></span> Salvar</button>
	
			</div>
			
		</div>
	<?php echo $this->Form->end(); ?>
	</div>
</div>