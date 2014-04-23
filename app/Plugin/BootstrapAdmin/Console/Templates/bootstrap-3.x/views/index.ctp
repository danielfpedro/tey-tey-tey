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
				<input
					type="text"
					class="form-control"
					style="padding-left: 30px;"
					placeholder="Pesquisar"
					name="q"
					value="<?php echo "<?php echo \$this->request->query['q']; ?>"?>">
			</form>
		</div>

		<div style="margin-top: 15px;" class="visible-xs"></div>

		<div class="col-sm-6 col-md-3 col-xs-12 col-md-offset-6 text-right">
			<?php echo "<?php
			echo \$this->Html->link(
				\"<span class='glyphicon glyphicon-plus'></span> Novo ".strtolower($singularHumanName)."\",
				array('action'=> 'add'),
				array('class'=> 'btn btn-success btn-novo',
					'escape'=> false
				));
			?>\n";
			?>
		</div>
	</div>

	<br>

	<div class="table-responsive clearfix">
		<table class="table table-condensed table-bordered table-hover table-striped">
			<thead>
				<?php 
					echo "<tr>\n";
					foreach ($fields as $field) {
						echo "\t\t\t\t\t<th>\n\t\t\t\t\t\t<?php echo \$this->Paginator->sort('{$field}'); ?>\n\t\t\t\t\t</th>\n";
					}
					echo "\t\t\t\t\t<th></th>\n";
					echo "\t\t\t\t</tr>\n";
				?>
			</thead>
			<tbody>
				<?php echo "<?php if (!empty(\${$pluralVar})): ?>\n"; ?>
					<?php echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>"; ?>
						<?php
							echo "\n\t\t\t\t\t\t<tr>";
							foreach ($fields as $field) {
								$isKey = false;
								if (!empty($associations['belongsTo'])) {
									foreach ($associations['belongsTo'] as $alias => $details) {
										if ($field === $details['foreignKey']) {
											$isKey = true;
											echo "
												<?php
													echo \$this->Html->link(
														\${$singularVar}['{$alias}']['{$details['displayField']}'],
														array(
															'controller' => '{$details['controller']}',
															'action' => 'view',
															\${$singularVar}['{$alias}']['{$details['primaryKey']}']
														));
												?>
											";
											break;
										}
									}
								}
								if ($isKey !== true) {
									echo "\n\t\t\t\t\t\t\t<td>\n\t\t\t\t\t\t\t\t<?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>\n\t\t\t\t\t\t\t</td>";
								}
							}
						?>
						<?php
						echo "
							<td class=\"text-center\" style=\"width:90px; vertical-align: middle;\">
								<?php
									echo \$this->Html->link(
										\"<span class='glyphicon glyphicon-pencil'></span>\",
										array(
											'action' => 'edit',
											\${$singularVar}['{$modelClass}']['{$primaryKey}']),
										array(
											'class'=> 'btn btn-sm btn-primary tt',
											'title'=> 'Editar',
											'escape'=> false
										)
									);
									echo \$this->Html->link(
										\"<span class='glyphicon glyphicon-remove'></span>\",
										array(
											'action' => 'edit',
											\${$singularVar}['{$modelClass}']['{$primaryKey}']),
										array(
											'class'=> 'btn btn-sm btn-danger tt',
											'title'=> 'Remover',
											'escape'=> false
										),
											'Você tem certeza que deseja deletar # %s?'
											, \${$singularVar}['{$modelClass}']['{$primaryKey}']
									);
								?>
							</td>";
						echo "\n\t\t\t\t\t\t<tr>";
						?>
					<?php echo "\n\t\t\t\t\t<?php endforeach; ?>\n"; ?>
				<?php echo "<?php else: ?>\n"; ?>
					<td colspan="<?php echo count($fields) + 1; ?>">Nenhuma informação encontrada.</td>
				<?php echo "<?php endif; ?>\n"; ?>
			</tbody>
		</table>
	</div>
	
	<div class="row">
		<?php echo "<div class=\"col-md-6 col-sm-6 col-xs-8\">
			<?php
				echo \$this->Paginator->counter(
					array(
						'format'=> 'Página {:page}/{:pages} de {:count} registro(s)'
					));
			?>";
		?>	
		</div>
		<div class="col-md-6 col-sm-6 col-xs-4 text-right">
			<?php echo "<?php echo \$this->element('BootstrapAdmin.paginator_numbers'); ?>\n"; ?>
		</div>
	</div>
</div>