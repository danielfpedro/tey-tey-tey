
	
	<div class="breadcrumb breadcrumb-admin">
		<li class="active">
			Protos		</li>
	</div>

<div class="" style="margin-top: 55px;">
<!-- 	<h3>Protos</h3>
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
	$label = '<span class=\'glyphicon glyphicon-plus\'></span> Novo proto';
	$path = array('action'=> 'add');
	$options = array('escape'=> false,'class'=> 'btn btn-default btn-novo');
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
				<?php foreach ($protos as $proto): ?>
	<tr>
		<td style='vertical-align: middle;'><?php echo h($proto['Proto']['id']); ?>&nbsp;</td>
		<td style='vertical-align: middle;'><?php echo h($proto['Proto']['name']); ?>&nbsp;</td>
		<td style='vertical-align: middle;'><?php echo h($proto['Proto']['created']); ?>&nbsp;</td>
		<td style='vertical-align: middle;'><?php echo h($proto['Proto']['modified']); ?>&nbsp;</td>
		<td class="text-center" style="width: 90px;vertical-align: middle;">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $proto['Proto']['id'])); ?>
			<?php echo $this->Html->link('<span class=\'glyphicon glyphicon-pencil\'></span>', array('action' => 'edit', $proto['Proto']['id']), array('class'=> 'btn btn-sm btn-primary', 'title'=> 'Editar', 'escape'=> false)); ?>
			<?php echo $this->Form->postLink('<span class=\'glyphicon glyphicon-remove\'></span>', array('action' => 'delete', $proto['Proto']['id']), array('class'=> 'btn btn-sm btn-danger', 'title'=> 'Remover','escape'=> false), __('Are you sure you want to delete # %s?', $proto['Proto']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	
	<div class="">
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-8">
			<?php
				echo $this->Paginator->counter(array(
				'format' => __('Página {:page} / {:pages} de {:count} registro(s)')
				));
				?>	
		</div>
		<div class="col-md-6 col-sm-6 col-xs-4 text-right">
			<?php echo $this->element('BootstrapAdmin.paginator_numbers'); ?>		</div>
	</div>
	</div>
</div>