<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>

	<?php
		$btn_novo = "<?php\n";
			$btn_novo .= "\t\$label = '<span class=\'glyphicon glyphicon-plus\'></span> Novo ".strtolower($singularHumanName)."';\n";
			$btn_novo .= "\t\$path = array('action'=> 'add');\n";
			$btn_novo .= "\t\$options = array('escape'=> false,'class'=> 'btn btn-success');\n";

			$btn_novo .= "\techo \$this->Html->link(\$label, \$path, \$options);\n";
		$btn_novo .= "?>\n";

		//echo $btn_novo;
	?>

	<div class="breadcrumb breadcrumb-admin">
		<li class="active">
			<?php echo ucfirst($pluralVar); ?>
		</li>
	</div>

<div class="" style="margin-top: 50px;">
<!-- 	<h3><?php echo ucfirst($pluralVar); ?></h3>
	<hr> -->

	<div class="row">

		<div class="col-md-3 col-sm-6">
			<form method="GET">
				<button type="submit" style="position: absolute; margin: 5px 0 0 5px;border:0;background-color: #FFF;">
					<span class="text-muted glyphicon glyphicon-search">
					</span>
				</button>
				<input type="text" class="form-control" style="padding-left: 30px;" placeholder="Pesquisar" name="q" value="<?php echo "<?php echo \$this->request->query['q']; ?>"?>">
			</form>
		</div>

		<div style="margin-top: 15px;" class="visible-xs"></div>

		<div class="col-sm-6 col-md-3 col-xs-12 col-md-offset-6 text-right">
			<?php echo $btn_novo ?>
		</div>
	</div>

	<br>

	<div class="table-responsive clearfix">
		<table class="table table-condensed table-bordered table-hover table-striped">
			<thead>
				<tr>
					<?php foreach ($fields as $field): ?>
						<th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
					<?php endforeach; ?>
					<th class=""></th>
				</tr>
			</thead>
			<tbody>
				<?php
				echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
					echo "\t<tr>\n";
						foreach ($fields as $field) {
							$isKey = false;
							if (!empty($associations['belongsTo'])) {
								foreach ($associations['belongsTo'] as $alias => $details) {
									if ($field === $details['foreignKey']) {
										$isKey = true;
										echo "\t\t<td style='vertical-align: middle;'>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
										break;
									}
								}
							}
							if ($isKey !== true) {
								echo "\t\t<td style='vertical-align: middle;'><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
							}
						}

						echo "\t\t<td class=\"text-center\" style=\"width: 90px;vertical-align: middle;\">\n";
						echo "\t\t\t<?php //echo \$this->Html->link(__('View'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
						echo "\t\t\t<?php echo \$this->Html->link('<span class=\'glyphicon glyphicon-pencil\'></span>', array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class'=> 'btn btn-sm btn-primary', 'title'=> 'Editar', 'escape'=> false)); ?>\n";
						echo "\t\t\t<?php echo \$this->Form->postLink('<span class=\'glyphicon glyphicon-remove\'></span>', array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class'=> 'btn btn-sm btn-danger', 'title'=> 'Remover','escape'=> false), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
						echo "\t\t</td>\n";
					echo "\t</tr>\n";
				echo "<?php endforeach; ?>\n";
				?>
			</tbody>
		</table>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<?php echo "<?php
				echo \$this->Paginator->counter(array(
				'format' => __('Página {:page} / {:pages} de {:count} registros')
				));
				?>";
			?>	
		</div>
	</div>
	<?php echo "<?php echo \$this->element('Admin/paginator_numbers'); ?>"; ?>
</div>