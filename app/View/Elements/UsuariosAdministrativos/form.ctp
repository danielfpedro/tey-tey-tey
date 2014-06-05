<div class="form-group">
	<?php echo $this->Form->input('name', array('label'=> 'Login', 'class'=> 'form-control')); ?>
</div>
<div class="form-group">
	<?php echo $this->Form->input('fake_password', array('label'=> 'Senha', 'type'=> 'password', 'class'=> 'form-control', 'value'=> '')); ?>
</div>
<div class="form-group">
	<button type="submit" class="btn btn-primary">
		<span class="glyphicon glyphicon-ok"></span> Salvar
	</button>
</div>	