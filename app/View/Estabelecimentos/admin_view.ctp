<h1>hjhjkh</h1>
<div class="estabelecimentos view">
<h2><?php echo __('Estabelecimento'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($estabelecimento['Estabelecimento']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($estabelecimento['Estabelecimento']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($estabelecimento['Estabelecimento']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($estabelecimento['Estabelecimento']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Site'); ?></dt>
		<dd>
			<?php echo h($estabelecimento['Estabelecimento']['site']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefone'); ?></dt>
		<dd>
			<?php echo h($estabelecimento['Estabelecimento']['telefone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Endereco'); ?></dt>
		<dd>
			<?php echo h($estabelecimento['Estabelecimento']['endereco']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Area Fumantes'); ?></dt>
		<dd>
			<?php echo h($estabelecimento['Estabelecimento']['area_fumantes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Faz Reserva'); ?></dt>
		<dd>
			<?php echo h($estabelecimento['Estabelecimento']['faz_reserva']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ar Condicionado'); ?></dt>
		<dd>
			<?php echo h($estabelecimento['Estabelecimento']['ar_condicionado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estacionamento'); ?></dt>
		<dd>
			<?php echo h($estabelecimento['Estabelecimento']['estacionamento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ar Livre'); ?></dt>
		<dd>
			<?php echo h($estabelecimento['Estabelecimento']['ar_livre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($estabelecimento['Estabelecimento']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rate'); ?></dt>
		<dd>
			<?php echo h($estabelecimento['Estabelecimento']['rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categoria'); ?></dt>
		<dd>
			<?php echo $this->Html->link($estabelecimento['Categoria']['name'], array('controller' => 'categorias', 'action' => 'view', $estabelecimento['Categoria']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuarios Administrativo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($estabelecimento['UsuariosAdministrativo']['name'], array('controller' => 'usuarios_administrativos', 'action' => 'view', $estabelecimento['UsuariosAdministrativo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Desde'); ?></dt>
		<dd>
			<?php echo h($estabelecimento['Estabelecimento']['desde']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imagem'); ?></dt>
		<dd>
			<?php echo h($estabelecimento['Estabelecimento']['imagem']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cidade'); ?></dt>
		<dd>
			<?php echo h($estabelecimento['Estabelecimento']['cidade']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Estabelecimento'), array('action' => 'edit', $estabelecimento['Estabelecimento']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Estabelecimento'), array('action' => 'delete', $estabelecimento['Estabelecimento']['id']), null, __('Are you sure you want to delete # %s?', $estabelecimento['Estabelecimento']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Estabelecimentos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estabelecimento'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios Administrativos'), array('controller' => 'usuarios_administrativos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuarios Administrativo'), array('controller' => 'usuarios_administrativos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comentarios'), array('controller' => 'comentarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comentario'), array('controller' => 'comentarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Comentarios'); ?></h3>
	<?php if (!empty($estabelecimento['Comentario'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($estabelecimento['Comentario'] as $comentario): ?>
		<tr>
			<td><?php echo $comentario['id']; ?></td>
			<td><?php echo $comentario['name']; ?></td>
			<td><?php echo $comentario['created']; ?></td>
			<td><?php echo $comentario['modified']; ?></td>
			<td><?php echo $comentario['usuario_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'comentarios', 'action' => 'view', $comentario['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'comentarios', 'action' => 'edit', $comentario['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'comentarios', 'action' => 'delete', $comentario['id']), null, __('Are you sure you want to delete # %s?', $comentario['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Comentario'), array('controller' => 'comentarios', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
