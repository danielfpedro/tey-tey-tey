<div class="breadcrumb breadcrumb-admin">
	<li>
		<?php echo $this->Html->link('Estabelecimentos', array('action'=> 'index')) ?>
	</li>
	<li class="active">
		Estabelecimento
	</li>
</div>

<div class="wrap-internal-page">
	<div class="row">
		<div class="col-md-11">
			<?php echo $this->Form->create('Estabelecimento'); ?>
				
		<div class="form-group">
			<?php echo $this->Form->input('name', array('empty'=> 'Selecione:','class'=> 'form-control')); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->input('Comentario', array('class'=> 'form-control')); ?>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">
				<span class="glyphicon glyphicon-ok"></span> Salvar
			</button>
		</div>		</div>
		

	<?php echo $this->Form->end(); ?>
	</div>
</div>