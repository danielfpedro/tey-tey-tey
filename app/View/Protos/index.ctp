<div class="protos index">

	
	<br>

	<div class="breadcrumb" style="margin-left: -15	px;">
		<li class="active">
			Protos		</li>
	</div>

	<div class="row">
		<div class="col-lg-5">
			<div class="input-group">
				<span class="input-group-btn">	
					<button class="btn btn-default">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
				<form method="GET">
					<input type="text" class="form-control" placeholder="Pesquisar" name="q" value="<?php echo $this->request->query['q']; ?>">
				</form>
			</div>
		</div>
		<div class="col-lg-4">
		</div>
		<div class="col-lg-3">
			<?php
	$label = 'Novo proto';
	$path = array('action'=> 'add');
	$options = array('class'=> 'btn btn-success btn-block');
	echo $this->Html->link($label, $path, $options);
?>
		</div>
	</div>

	<br>

	<div class="table-responsive clearfix">
		<table class="table table-condensed table-bordered table-hover table-striped">
			<tr>
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('name'); ?></th>
							<th><?php echo $this->Paginator->sort('created'); ?></th>
							<th><?php echo $this->Paginator->sort('modified'); ?></th>
							<th class=""></th>
			</tr>
			<?php foreach ($protos as $proto): ?>
	<tr>
		<td style='vertical-align: middle;'><?php echo h($proto['Proto']['id']); ?>&nbsp;</td>
		<td style='vertical-align: middle;'><?php echo h($proto['Proto']['name']); ?>&nbsp;</td>
		<td style='vertical-align: middle;'><?php echo h($proto['Proto']['created']); ?>&nbsp;</td>
		<td style='vertical-align: middle;'><?php echo h($proto['Proto']['modified']); ?>&nbsp;</td>
		<td class="text-center" style="width: 90px;vertical-align: middle;">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $proto['Proto']['id'])); ?>
			<?php echo $this->Html->link('<span class=\'glyphicon glyphicon-pencil\'></span>', array('action' => 'edit', $proto['Proto']['id']), array('class'=> 'btn btn-sm btn-primary','escape'=> false)); ?>
			<?php echo $this->Form->postLink('<span class=\'glyphicon glyphicon-remove\'></span>', array('action' => 'delete', $proto['Proto']['id']), array('class'=> 'btn btn-sm btn-danger','escape'=> false), __('Are you sure you want to delete # %s?', $proto['Proto']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
		</table>
	</div>
	<p>
		<?php
			echo $this->Paginator->counter(array(
			'format' => __('Página {:page} de {:pages}, mostrando {:current} registro(s) de um total de {:count} , começando no registro {:start} e terminando no registro {:end}')
			));
			?>	</p>
	
	<?php echo $this->element('Admin/paginator_numbers'); ?>
</div>
