<div class="estabelecimentos index">

	
	<br>

	<div class="breadcrumb" style="margin-left: -15	px;">
		<li class="active">
			Estabelecimentos		</li>
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
	$label = 'Novo estabelecimento';
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
			<?php foreach ($estabelecimentos as $estabelecimento): ?>
	<tr>
		<td style='vertical-align: middle;'><?php echo h($estabelecimento['Estabelecimento']['id']); ?>&nbsp;</td>
		<td style='vertical-align: middle;'><?php echo h($estabelecimento['Estabelecimento']['name']); ?>&nbsp;</td>
		<td style='vertical-align: middle;'><?php echo h($estabelecimento['Estabelecimento']['created']); ?>&nbsp;</td>
		<td style='vertical-align: middle;'><?php echo h($estabelecimento['Estabelecimento']['modified']); ?>&nbsp;</td>
		<td class="text-center" style="width: 90px;vertical-align: middle;">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $estabelecimento['Estabelecimento']['id'])); ?>
			<?php echo $this->Html->link('<span class=\'glyphicon glyphicon-pencil\'></span>', array('action' => 'edit', $estabelecimento['Estabelecimento']['id']), array('class'=> 'btn btn-sm btn-primary','escape'=> false)); ?>
			<?php echo $this->Form->postLink('<span class=\'glyphicon glyphicon-remove\'></span>', array('action' => 'delete', $estabelecimento['Estabelecimento']['id']), array('class'=> 'btn btn-sm btn-danger','escape'=> false), __('Are you sure you want to delete # %s?', $estabelecimento['Estabelecimento']['id'])); ?>
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
