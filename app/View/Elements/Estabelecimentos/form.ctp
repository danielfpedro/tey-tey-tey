<?php echo $this->Html->script('Site/admin_estabelecimentos', array('inline'=> false)); ?>
<?php echo $this->Html->script('../lib/maskedinput-1.3.1/jquery.maskedinput.min', array('inline'=> false)); ?>

<div class="form-group">
	<?php echo $this->Form->input('categoria_id', array('empty'=> 'Selecione:','class'=> 'form-control')); ?>
</div>
<div class="form-group">
	<?php echo $this->Form->input('cliente_id', array('class'=> 'form-control', 'empty'=> 'Selecione:')); ?>
</div>
<div class="form-group">
	<?php echo $this->Form->input('imagem', array('type'=> 'file','class'=> 'form-control', 'accept'=> 'image/*')); ?>
</div>
<div class="form-group">
	<?php echo $this->Form->input('name', array('label'=> 'Nome', 'class'=> 'form-control')); ?>
</div>
<div class="form-group">
	<?php echo $this->Form->input('descricao', array('label'=> 'Descrição', 'class'=> 'form-control')); ?>
</div>
<div class="form-group">
	<?php echo $this->Form->input('endereco', array('label'=> 'Endereço', 'class'=> 'form-control')); ?>
</div>
<div class="form-group">
	<?php echo $this->Form->input('cidade', array('class'=> 'form-control')); ?>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<?php echo $this->Form->input('telefone',
				array(
					'class'=> 'form-control telefone')); ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<?php echo $this->Form->input('horario_funcionamento',
				array(
					'label'=> 'Horário de funcionamento',
					'type'=> 'text',
					'class'=> 'form-control hora')); ?>
		</div>
	</div>
</div>

<div class="form-group">
	<?php echo $this->Form->input('tipo_comida', array('label'=> 'Tipo de comida', 'class'=> 'form-control')); ?>
</div>
<div class="form-group">
	<?php echo $this->Form->input('Subcategoria', array('class'=> 'form-control')); ?>
</div>

<div class="form-group">
	<?php
		echo $this->Form->input('tipo_cadastro',
			array('label'=> 'Tipo de cadastro', 'options'=> array(1=> 'Simples', 2=> 'Completo'),'class'=> 'form-control')); ?>
</div>

<div id="cont-completo" style="display: none;">
	<hr>

	<div class="form-group">
		<?php echo $this->Form->input('site', array('class'=> 'form-control')); ?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('area_fumantes', array('type'=> 'checkbox')); ?>
		<?php echo $this->Form->input('ar_livre', array('type'=> 'checkbox')); ?>
		<?php echo $this->Form->input('ar_condicionado', array('type'=> 'checkbox')); ?>
		<?php echo $this->Form->input('faz_reserva', array('type'=> 'checkbox')); ?>
		<?php echo $this->Form->input('estacionamento', array('type'=> 'checkbox')); ?>
		<?php echo $this->Form->input('faz_entrega', array('type'=> 'checkbox')); ?>
		<?php echo $this->Form->input('wifi', array('type'=> 'checkbox')); ?>				
		<?php echo $this->Form->input('acesso_deficiente', array('type'=> 'checkbox')); ?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('Cartao', array('class'=> 'form-control', 'label'=> 'Cartões')); ?>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<?php echo $this->Form->input('inaugurado',
					array(
						'label'=> 'Data de inauguração',
						'type'=> 'text',
						'class'=> 'form-control data')); ?>
			</div>	
		</div>
	</div>	
</div>

<div class="form-group" style="margin: 40px 0 60px 0;">
	<button type="submit" class="btn btn-primary">
		<span class="glyphicon glyphicon-ok"></span> Salvar
	</button>
</div>