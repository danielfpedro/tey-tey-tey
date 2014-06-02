<div class="breadcrumb breadcrumb-admin">
	<li>
		<?php echo $this->Html->link('Subcategorias', array('action'=> 'index')) ?>
	</li>
	<li class="active">
		Subcategoria
	</li>
</div>

<div class="wrap-internal-page">
	<div class="row">
		<div class="col-md-12">
			<?php echo $this->Form->create('Subcategoria'); ?>
				
			<div class="form-group">
				<?php echo $this->Form->input('id', array('class'=> 'form-control')); ?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('name', array('class'=> 'form-control')); ?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('Estabelecimento', array('class'=> 'form-control')); ?>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">
					<span class="glyphicon glyphicon-ok"></span> Salvar
				</button>
			</div>			

			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>