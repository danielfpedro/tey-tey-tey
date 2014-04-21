<div class="breadcrumb breadcrumb-admin">
	<li class="active">
		<?php echo ucfirst($pluralVar)."\n"; ?>
	</li>
</div>

<div class="wrap-internal-page">
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
			<?php echo "<?php \n\t\t\t\techo \$this->Html->link(
				\t'<span class=\'glyphicon glyphicon-plus\'></span> Novo ".strtolower($singularHumanName)."',
				\tarray('action'=> 'add'),
				\tarray('class'=> 'btn btn-success btn-novo','escape'=> false)); \n
			?>\n"; ?>
		</div>
	</div>

	<br>

	<div class="table-responsive clearfix">
		<table class="table table-condensed table-bordered table-hover table-striped">
			<thead>
				<tr>
					<?php foreach ($fields as $field): ?>
						<th>
							<?php echo "\t<?php echo \$this->Paginator->sort('{$field}'); ?>\n"; ?>
						</th>
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
										echo "
											<td style='vertical-align: middle;'>
												<?php
													echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'],
														array(\n
															'controller' => '{$details['controller']}',
															'action' => 'view',
															\${$singularVar}['{$alias}']['{$details['primaryKey']}']
														)
														); ?>
											</td>\n
										";
										break;
									}
								}
							}
							if ($isKey !== true) {
								echo "\t\t<td style='vertical-align: middle;'><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?></td>\n";
							}
						}
?>
<td class="text-center" style="width:90px; vertical-align: middle;">
	<?php
		echo "
			<?php
				echo \$this->Html->link(
						'<span class=\'glyphicon glyphicon-pencil\'></span>',
						array(
							'action' => 'edit',
							\${$singularVar}['{$modelClass}']['{$primaryKey}']),
						array(
							'class'=> 'btn btn-sm btn-primary tt',
							'title'=> 'Editar',
							'escape'=> false
						)
					);
			?>\n
		";
	?>
</td>
<?php
						echo "<td class=\"text-center\" style=\"width: 90px;vertical-align: middle;\">\n";
							echo "\t\t\t<?php echo \$this->Html->link('<span class=\'glyphicon glyphicon-pencil\'></span>', array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class'=> 'btn btn-sm btn-primary tt', 'title'=> 'Editar', 'escape'=> false)); ?>\n";
						echo "\t\t\t<?php echo \$this->Form->postLink('<span class=\'glyphicon glyphicon-remove\'></span>', array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class'=> 'btn btn-sm btn-danger tt', 'title'=> 'Remover','escape'=> false), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
						echo "\t\t</td>\n";
					echo "\t</tr>\n";
				echo "<?php endforeach; ?>\n";
				?>
			</tbody>
		</table>
	</div>
	
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-8">
			<?php echo "<?php
				echo \$this->Paginator->counter(array(
				'format' => __('Página {:page}/{:pages} de {:count} registro(s)')
				));
				?>";
			?>	
		</div>
		<div class="col-md-6 col-sm-6 col-xs-4 text-right">
			<?php echo "<?php echo \$this->element('BootstrapAdmin.paginator_numbers'); ?>"; ?>
		</div>
	</div>
</div>