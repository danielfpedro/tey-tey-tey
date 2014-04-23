<div class="breadcrumb breadcrumb-admin">
	<li>
		<?php echo $this->Html->link('Protos', array('action'=> 'index')) ?>
	</li>
	<li class="active">
		Proto
	</li>
</div>

<div class="wrap-internal-page">
	<?php echo $this->Form->create('Proto'); ?>
		
		<div class="form-group">
			<?php echo $this->Form->input('name', array('empty'=> 'Selecione:','class'=> 'form-control')); ?>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">
				Salvar
			</button>
		</div>

	<?php echo $this->Form->end(); ?>
</div>