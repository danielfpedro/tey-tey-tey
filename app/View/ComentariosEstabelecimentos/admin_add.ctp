<div class="breadcrumb breadcrumb-admin">
	<li>
		<?php echo $this->Html->link('ComentariosEstabelecimentos', array('action'=> 'index')) ?>
	</li>
	<li class="active">
		Comentarios Estabelecimento
	</li>
</div>

<div class="wrap-internal-page">
	<?php echo $this->Form->create('ComentariosEstabelecimento'); ?>
		
		<div class="form-group">
			<?php echo $this->Form->input('estabelecimento_id', array('empty'=> 'Selecione:','class'=> 'form-control')); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->input('comentario_id', array('empty'=> 'Selecione:','class'=> 'form-control')); ?>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">
				Salvar
			</button>
		</div>

	<?php echo $this->Form->end(); ?>
</div>