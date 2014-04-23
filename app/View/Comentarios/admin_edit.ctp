<div class="breadcrumb breadcrumb-admin">
	<li>
		<?php echo $this->Html->link('Comentarios', array('action'=> 'index')) ?>
	</li>
	<li class="active">
		Comentario
	</li>
</div>

<div class="wrap-internal-page">
	<?php echo $this->Form->create('Comentario'); ?>
		
		<div class="form-group">
			<?php echo $this->Form->input('id', array('empty'=> 'Selecione:','class'=> 'form-control')); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->input('name', array('empty'=> 'Selecione:','class'=> 'form-control')); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->input('usuario_id', array('empty'=> 'Selecione:','class'=> 'form-control')); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->input('Estabelecimento', array('class'=> 'form-control')); ?>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">
				Salvar
			</button>
		</div>

	<?php echo $this->Form->end(); ?>
</div>