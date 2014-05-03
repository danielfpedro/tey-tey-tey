<div class="breadcrumb breadcrumb-admin">
	<li class="active">
		Estabelecimentos
	</li>
</div>

<div class="wrap-internal-page">
	<?php echo $this->Session->flash(); ?>	<div class="row">
		<div class="col-md-12">
			<?php
			echo $this->Html->link(
				"Novo estabelecimento",
				array('action'=> 'add'),
				array('class'=> 'btn btn-success btn-novo',
					'escape'=> false
				));
			?>
		</div>
	</div>
	
	<br>
	<div class="well well-sm">
		<div class="row clearfix">
			<div class="col-md-12">
				<form method="GET" class="form-inline">
					<input
						type="text"
						class="form-control txt-search"
						placeholder="Pesquisar"
						name="q"
						value="<?php echo $this->request->query['q']; ?>">
					<button class="btn btn-default hidden-xs">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</form>
			</div>
		</div>
	</div>

	<div class="table-responsive clearfix">
		<table class="table table-condensed table-hover table-striped table-admin">
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
					<th>
						<?php echo $this->Paginator->sort('site'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('telefone'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('endereco'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('area_fumantes'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('faz_reserva'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('ar_condicionado'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('estacionamento'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('ar_livre'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('descricao'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('rate'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('categoria_id'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('usuarios_administrativo_id'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('desde'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('imagem'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('cidade'); ?>
					</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($estabelecimentos)): ?>
					<?php foreach ($estabelecimentos as $estabelecimento): ?>						
						<tr>
							<td>
								<?php echo h($estabelecimento['Estabelecimento']['id']); ?>
							</td>
							<td>
								<?php echo h($estabelecimento['Estabelecimento']['name']); ?>
							</td>
							<td>
								<?php echo h($estabelecimento['Estabelecimento']['created']); ?>
							</td>
							<td>
								<?php echo h($estabelecimento['Estabelecimento']['modified']); ?>
							</td>
							<td>
								<?php echo h($estabelecimento['Estabelecimento']['site']); ?>
							</td>
							<td>
								<?php echo h($estabelecimento['Estabelecimento']['telefone']); ?>
							</td>
							<td>
								<?php echo h($estabelecimento['Estabelecimento']['endereco']); ?>
							</td>
							<td>
								<?php echo h($estabelecimento['Estabelecimento']['area_fumantes']); ?>
							</td>
							<td>
								<?php echo h($estabelecimento['Estabelecimento']['faz_reserva']); ?>
							</td>
							<td>
								<?php echo h($estabelecimento['Estabelecimento']['ar_condicionado']); ?>
							</td>
							<td>
								<?php echo h($estabelecimento['Estabelecimento']['estacionamento']); ?>
							</td>
							<td>
								<?php echo h($estabelecimento['Estabelecimento']['ar_livre']); ?>
							</td>
							<td>
								<?php echo h($estabelecimento['Estabelecimento']['descricao']); ?>
							</td>
							<td>
								<?php echo h($estabelecimento['Estabelecimento']['rate']); ?>
							</td>
							<td>
								<?php
									echo $this->Html->link(
										$estabelecimento['Categoria']['name'],
										array(
											'controller' => 'categorias',
											'action' => 'view',
											$estabelecimento['Categoria']['id']
										));
									
								?>
							</td>
							<td>
								<?php
									echo $this->Html->link(
										$estabelecimento['UsuariosAdministrativo']['name'],
										array(
											'controller' => 'usuarios_administrativos',
											'action' => 'view',
											$estabelecimento['UsuariosAdministrativo']['id']
										));
									
								?>
							</td>
							<td>
								<?php echo h($estabelecimento['Estabelecimento']['desde']); ?>
							</td>
							<td>
								<?php echo h($estabelecimento['Estabelecimento']['imagem']); ?>
							</td>
							<td>
								<?php echo h($estabelecimento['Estabelecimento']['cidade']); ?>
							</td>						
							<td class="text-center" style="width:90px;">
								<?php
									echo $this->Html->link(
										"<span class='glyphicon glyphicon-pencil'></span>",
										array(
											'action' => 'edit',
											$estabelecimento['Estabelecimento']['id']),
										array(
											'class'=> 'btn btn-sm btn-primary tt',
											'title'=> 'Editar',
											'escape'=> false
										)
									);
									echo "&nbsp;";
									echo $this->Form->postLink(
										"<span class='glyphicon glyphicon-remove'></span>",
										array(
											'action' => 'delete',
											$estabelecimento['Estabelecimento']['id']),
										array(
											'class'=> 'btn btn-sm btn-danger tt',
											'title'=> 'Remover',
											'escape'=> false
										),
										__('Você tem certeza que deseja deletar # %s?'
										, $estabelecimento['Estabelecimento']['id'])
									);
								?>
							</td>
						<tr>					
					<?php endforeach; ?>
				<?php else: ?>
					<td colspan="20">Nenhuma informação encontrada.</td>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
	
	<br>

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