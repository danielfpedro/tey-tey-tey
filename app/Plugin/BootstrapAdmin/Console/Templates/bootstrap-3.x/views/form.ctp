<div class="breadcrumb breadcrumb-admin">
	<li>
		<?php echo "<?php echo \$this->Html->link('".ucfirst($pluralVar)."', array('action'=> 'index')) ?>\n"; ?>
	</li>
	<?php echo "<li class=\"active\">\n\t\t".$singularHumanName."\n\t</li>\n"; ?>
</div>

<div class="wrap-internal-page">
	<?php echo "<?php echo \$this->Form->create('{$modelClass}'); ?>\n"; ?>
		<?php
			foreach ($fields as $field) {
				if (strpos($action, 'add') !== false && $field == $primaryKey) {
					continue;
				} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
					echo "\n\t\t<div class=\"form-group\">\n\t\t\t<?php echo \$this->Form->input('{$field}', array('empty'=> 'Selecione:','class'=> 'form-control')); ?>\n\t\t</div>";
				}
			}
			if (!empty($associations['hasAndBelongsToMany'])) {
				foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
					echo "\n\t\t<div class=\"form-group\">\n\t\t\t<?php echo \$this->Form->input('{$assocName}', array('class'=> 'form-control')); ?>\n\t\t</div>";
				}
			}
			echo "\n\t\t<div class=\"form-group\">\n\t\t\t<button type=\"submit\" class=\"btn btn-primary\">\n\t\t\t\tSalvar\n\t\t\t</button>\n\t\t</div>";
		echo "\n\n\t<?php echo \$this->Form->end(); ?>\n";
	?>
</div>