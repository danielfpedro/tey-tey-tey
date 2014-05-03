<h1>hjhjkh</h1>
<div class="comentarios view">
<h2><?php echo __('Comentario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($comentario['Comentario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($comentario['Comentario']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($comentario['Comentario']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($comentario['Comentario']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($comentario['Usuario']['id'], array('controller' => 'usuarios', 'action' => 'view', $comentario['Usuario']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Comentario'), array('action' => 'edit', $comentario['Comentario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Comentario'), array('action' => 'delete', $comentario['Comentario']['id']), null, __('Are you sure you want to delete # %s?', $comentario['Comentario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Comentarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comentario'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Estabelecimentos'), array('controller' => 'estabelecimentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estabelecimento'), array('controller' => 'estabelecimentos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Estabelecimentos'); ?></h3>
	<?php if (!empty($comentario['Estabelecimento'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Site'); ?></th>
		<th><?php echo __('Telefone'); ?></th>
		<th><?php echo __('Endereco'); ?></th>
		<th><?php echo __('Area Fumantes'); ?></th>
		<th><?php echo __('Faz Reserva'); ?></th>
		<th><?php echo __('Ar Condicionado'); ?></th>
		<th><?php echo __('Estacionamento'); ?></th>
		<th><?php echo __('Ar Livre'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Rate'); ?></th>
		<th><?php echo __('Categoria Id'); ?></th>
		<th><?php echo __('Usuarios Administrativo Id'); ?></th>
		<th><?php echo __('Desde'); ?></th>
		<th><?php echo __('Imagem'); ?></th>
		<th><?php echo __('Cidade'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($comentario['Estabelecimento'] as $estabelecimento): ?>
		<tr>
			<td><?php echo $estabelecimento['id']; ?></td>
			<td><?php echo $estabelecimento['name']; ?></td>
			<td><?php echo $estabelecimento['created']; ?></td>
			<td><?php echo $estabelecimento['modified']; ?></td>
			<td><?php echo $estabelecimento['site']; ?></td>
			<td><?php echo $estabelecimento['telefone']; ?></td>
			<td><?php echo $estabelecimento['endereco']; ?></td>
			<td><?php echo $estabelecimento['area_fumantes']; ?></td>
			<td><?php echo $estabelecimento['faz_reserva']; ?></td>
			<td><?php echo $estabelecimento['ar_condicionado']; ?></td>
			<td><?php echo $estabelecimento['estacionamento']; ?></td>
			<td><?php echo $estabelecimento['ar_livre']; ?></td>
			<td><?php echo $estabelecimento['descricao']; ?></td>
			<td><?php echo $estabelecimento['rate']; ?></td>
			<td><?php echo $estabelecimento['categoria_id']; ?></td>
			<td><?php echo $estabelecimento['usuarios_administrativo_id']; ?></td>
			<td><?php echo $estabelecimento['desde']; ?></td>
			<td><?php echo $estabelecimento['imagem']; ?></td>
			<td><?php echo $estabelecimento['cidade']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'estabelecimentos', 'action' => 'view', $estabelecimento['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'estabelecimentos', 'action' => 'edit', $estabelecimento['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'estabelecimentos', 'action' => 'delete', $estabelecimento['id']), null, __('Are you sure you want to delete # %s?', $estabelecimento['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Estabelecimento'), array('controller' => 'estabelecimentos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
