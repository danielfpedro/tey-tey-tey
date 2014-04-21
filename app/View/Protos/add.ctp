<br>

<div class="breadcrumb" style="margin-left: -15	px;">
	<li>
		<?php echo $this->Html->link('Protos', array('action'=> 'index')) ?>	</li>
	<li class="active">
		Adicionar Proto	</li>
</div>

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
<button type="submit" class="btn btn-success">Salvar</button>
&nbsp;<?php echo $this->Html->link('Cancelar', array('controller'=> '', 'action'=> ''), array('class'=> 'btn btn-danger btn-sm')); ?>
<?php echo $this->Form->end(); ?>
</div>