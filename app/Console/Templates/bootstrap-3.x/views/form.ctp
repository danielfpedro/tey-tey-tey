<div class="breadcrumb breadcrumb-admin">
	<li>
		<?php 
			echo "<?php echo \$this->Html->link('".ucfirst($pluralVar)."', array('action'=> 'index')) ?>";
		?>
	</li>
	<li class="active">
		Adicionar <?php echo $singularHumanName; ?>
	</li>
</div>

<div style="margin-top: 50px;">
	<div class="<?php echo $pluralVar; ?> form">
	<?php
		echo "<?php
			echo \$this->Form->create('{$modelClass}',
				array('inputDefaults'=>
					array(
						'div'=> array('class'=> 'form-group')
						)
					)
				);
		?>\n"; ?>
		<fieldset>
			<?php
					echo "\t<?php\n";
					foreach ($fields as $field) {
						if (strpos($action, 'add') !== false && $field == $primaryKey) {
							continue;
						} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
							echo "\t\techo \$this->Form->input('{$field}', array('empty'=> 'Selecione:','class'=> 'form-control'));\n";
						}
					}
					if (!empty($associations['hasAndBelongsToMany'])) {
						foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
							echo "\t\techo \$this->Form->input('{$assocName}', array('class'=> 'form-control'));\n";
						}
					}
					echo "\t?>\n";
			?>
		</fieldset>

		<div class="row">
			<div class="col-md-2 col-xs-6">
				<?php echo "<button type=\"submit\" class=\"btn btn-block btn-success\"><span class='glyphicon glyphicon-saved'></span> Salvar</button>\n"; ?>	
			</div>
			<div class="col-md-2 col-md-offset-8 col-xs-6">
				<?php echo "<?php echo \$this->Html->link('<span class=\'glyphicon glyphicon-ban-circle\'></span> Cancelar', array('controller'=> '".$pluralVar."', 'action'=> 'index'), array('escape'=> false, 'class'=> 'btn btn-block btn-danger')); ?>\n";
				?>
			</div>
			
		</div>
	<?php

		echo "<?php echo \$this->Form->end(); ?>\n";
	?>
	</div>
</div>