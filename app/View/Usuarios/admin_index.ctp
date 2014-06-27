<?php echo $this->Html->script('Site/admin_usuarios_index', array('inline'=> false)); ?>
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
					<th style="width: 60px;"></th>
					<th>
						<?php echo $this->Paginator->sort('email', 'Nome/Email'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('data_nascimento'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('cidade'); ?>
					</th>
					<th style="width: 160px;">
						<?php echo $this->Paginator->sort('created', 'Data de criação'); ?>
					</th>
					<th style="width: 40px;text-align: center;"></th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($usuarios)): ?>
					<?php foreach ($usuarios as $usuario): ?>						
						<tr>
							<td>
								<?php
									if (!empty($usuario['Perfil']['imagem'])) {
										$img_url = ''.
											'Usuarios/' . 
											$usuario['Usuario']['id'] .
											'/' . 
											$usuario['Perfil']['imagem'];
									}elseif (!empty($usuario['Usuario']['facebook_id'])) {
										$img_url = 'https://graph.facebook.com/' .
											$usuario['Usuario']['facebook_id'].
											'/picture?type=normal';
										
									} else {
										$img_url = 'Usuarios/default_avatar.png';
									}
									echo $this->Html->image($img_url, array('width'=> '100%'));
								?>
							</td>
							<td>
								<?php echo h($usuario['Perfil']['name']); ?> "<strong><?php echo $usuario['Perfil']['apelido'] ?></strong>", 
								<br>
								<?php echo h($usuario['Usuario']['email']); ?>
							</td>
							<td>
								<?php echo $this->Time->format('d/m/Y', $usuario['Perfil']['data_nascimento']); ?>
							</td>
							<td>
								<?php echo h($usuario['Perfil']['cidade']); ?>
							</td>
							<td>
								<?php echo $this->Time->format('d/m/Y h:i',$usuario['Usuario']['created']); ?>
							</td>
							<td style="text-align: center;">
								<input
									type="checkbox"
									id="chk-ativo"
									data-status="<?php echo $usuario['Usuario']['ativo']; ?>"
									data-id="<?php echo $usuario['Usuario']['id'];?>" <?php echo ($usuario['Usuario']['ativo'])? 'checked' : '';?>>
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