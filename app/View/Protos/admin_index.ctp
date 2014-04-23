<div class="breadcrumb breadcrumb-admin">
	<li class="active">
		Protos
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
					value="<?php echo $this->request->query['q']; ?>">
			</form>
		</div>

		<div style="margin-top: 15px;" class="visible-xs"></div>

		<div class="col-sm-6 col-md-3 col-xs-12 col-md-offset-6 text-right">
			<?php
			echo $this->Html->link(
				"<span class='glyphicon glyphicon-plus'></span> Novo proto",
				array('action'=> 'add'),
				array('class'=> 'btn btn-success btn-novo',
					'escape'=> false
				));
			?>
		</div>
	</div>

	<br>

	<div class="table-responsive clearfix">
		<table class="table table-condensed table-bordered table-hover table-striped">
			<thead>
				<tr>
					<th>
						<?php echo $this->Paginator->sort('id'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('name'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('created'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('modified'); ?>
					</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($protos)): ?>
					<?php foreach ($protos as $proto): ?>						
						<tr>
							<td>
								<?php echo h($proto['Proto']['id']); ?>
							</td>
							<td>
								<?php echo h($proto['Proto']['name']); ?>
							</td>
							<td>
								<?php echo h($proto['Proto']['created']); ?>
							</td>
							<td>
								<?php echo h($proto['Proto']['modified']); ?>
							</td>						
							<td class="text-center" style="width:90px; vertical-align: middle;">
								<?php
									echo $this->Html->link(
										"<span class='glyphicon glyphicon-pencil'></span>",
										array(
											'action' => 'edit',
											$proto['Proto']['id']),
										array(
											'class'=> 'btn btn-sm btn-primary tt',
											'title'=> 'Editar',
											'escape'=> false
										)
									);
									echo $this->Html->link(
										"<span class='glyphicon glyphicon-remove'></span>",
										array(
											'action' => 'edit',
											$proto['Proto']['id']),
										array(
											'class'=> 'btn btn-sm btn-danger tt',
											'title'=> 'Remover',
											'escape'=> false
										),
											'Você tem certeza que deseja deletar # %s?'
											, $proto['Proto']['id']
									);
								?>
							</td>
						<tr>					
					<?php endforeach; ?>
				<?php else: ?>
					<td colspan="5">Nenhuma informação encontrada.</td>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
	
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-8">
			<?php
				echo $this->Paginator->counter(
					array(
						'format'=> 'Página {:page}/{:pages} de {:count} registro(s)'
					));
			?>	
		</div>
		<div class="col-md-6 col-sm-6 col-xs-4 text-right">
			<?php echo $this->element('BootstrapAdmin.paginator_numbers'); ?>
		</div>
	</div>
</div>