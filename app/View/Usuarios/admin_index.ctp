
	
	<div class="breadcrumb breadcrumb-admin">
		<li class="active">
			Usuarios		</li>
	</div>

<div class="" style="margin-top: 50px;">
<!-- 	<h3>Usuarios</h3>
	<hr> -->

	<div class="row">

		<div class="col-md-3 col-sm-6">
			<form method="GET">
				<button type="submit" style="position: absolute; margin: 5px 0 0 5px;border:0;background-color: #FFF;">
					<span class="text-muted glyphicon glyphicon-search">
					</span>
				</button>
				<input type="text" class="form-control" style="padding-left: 30px;" placeholder="Pesquisar" name="q" value="<?php echo $this->request->query['q']; ?>">
			</form>
		</div>

		<div style="margin-top: 15px;" class="visible-xs"></div>

		<div class="col-sm-6 col-md-3 col-xs-12 col-md-offset-6 text-right">
			<?php
	$label = '<span class=\'glyphicon glyphicon-plus\'></span> Novo usuario';
	$path = array('action'=> 'add');
	$options = array('escape'=> false,'class'=> 'btn btn-success');
	echo $this->Html->link($label, $path, $options);
?>
		</div>
	</div>

	<br>

	<div class="table-responsive clearfix">
		<table class="table table-condensed table-bordered table-hover table-striped">
			<thead>
				<tr>
											<th><?php echo $this->Paginator->sort('id'); ?></th>
											<th><?php echo $this->Paginator->sort('name'); ?></th>
											<th><?php echo $this->Paginator->sort('created'); ?></th>
											<th><?php echo $this->Paginator->sort('modified'); ?></th>
										<th class=""></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($usuarios as $usuario): ?>
	<tr>
		<td style='vertical-align: middle;'><?php echo h($usuario['Usuario']['id']); ?>&nbsp;</td>
		<td style='vertical-align: middle;'><?php echo h($usuario['Usuario']['name']); ?>&nbsp;</td>
		<td style='vertical-align: middle;'><?php echo h($usuario['Usuario']['created']); ?>&nbsp;</td>
		<td style='vertical-align: middle;'><?php echo h($usuario['Usuario']['modified']); ?>&nbsp;</td>
		<td class="text-center" style="width: 90px;vertical-align: middle;">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $usuario['Usuario']['id'])); ?>
			<?php echo $this->Html->link('<span class=\'glyphicon glyphicon-pencil\'></span>', array('action' => 'edit', $usuario['Usuario']['id']), array('class'=> 'btn btn-sm btn-primary', 'title'=> 'Editar', 'escape'=> false)); ?>
			<?php echo $this->Form->postLink('<span class=\'glyphicon glyphicon-remove\'></span>', array('action' => 'delete', $usuario['Usuario']['id']), array('class'=> 'btn btn-sm btn-danger', 'title'=> 'Remover','escape'=> false), __('Are you sure you want to delete # %s?', $usuario['Usuario']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<?php
				echo $this->Paginator->counter(array(
				'format' => __('Página {:page} / {:pages} de {:count} registros')
				));
				?>	
		</div>
	</div>
	<?php echo $this->element('Admin/paginator_numbers'); ?></div>