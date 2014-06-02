<div class="breadcrumb breadcrumb-admin">
	<li class="active">
		Usuarios
	</li>
</div>

<div class="wrap-internal-page">
	
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
						<?php echo $this->Paginator->sort('email', 'Nome/Email'); ?>
					</th>
					<th style="width: 160px;">
						<?php echo $this->Paginator->sort('created', 'Data de criação'); ?>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($usuarios)): ?>
					<?php foreach ($usuarios as $usuario): ?>						
						<tr>
							<td>
								<?php echo h($usuario['Perfil']['name']); ?>
								<br>
								<?php echo h($usuario['Usuario']['email']); ?>
							</td>
							<td>
								<?php echo $this->Time->format('d/m/y h:m',$usuario['Usuario']['created']); ?>
							</td>
						<tr>					
					<?php endforeach; ?>
				<?php else: ?>
					<td colspan="6">Nenhuma informação encontrada.</td>
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