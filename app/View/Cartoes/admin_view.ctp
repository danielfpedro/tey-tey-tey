<h1>hjhjkh</h1>
<div class="cartoes view">
<h2><?php echo __('Cartao'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cartao['Cartao']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($cartao['Cartao']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($cartao['Cartao']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($cartao['Cartao']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cartao'), array('action' => 'edit', $cartao['Cartao']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cartao'), array('action' => 'delete', $cartao['Cartao']['id']), null, __('Are you sure you want to delete # %s?', $cartao['Cartao']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cartoes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cartao'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Estabelecimentos'), array('controller' => 'estabelecimentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estabelecimento'), array('controller' => 'estabelecimentos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Estabelecimentos'); ?></h3>
	<?php if (!empty($cartao['Estabelecimento'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Endereco'); ?></th>
		<th><?php echo __('Telefone'); ?></th>
		<th><?php echo __('Tipo Comida'); ?></th>
		<th><?php echo __('Horario Funcionamento'); ?></th>
		<th><?php echo __('Site'); ?></th>
		<th><?php echo __('Area Fumantes'); ?></th>
		<th><?php echo __('Ar Livre'); ?></th>
		<th><?php echo __('Ar Condicionado'); ?></th>
		<th><?php echo __('Faz Reserva'); ?></th>
		<th><?php echo __('Estacionamento'); ?></th>
		<th><?php echo __('Faz Entrega'); ?></th>
		<th><?php echo __('Wifi'); ?></th>
		<th><?php echo __('Acesso Deficiente'); ?></th>
		<th><?php echo __('Inaugurado'); ?></th>
		<th><?php echo __('Cartoes'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Rate'); ?></th>
		<th><?php echo __('Categoria Id'); ?></th>
		<th><?php echo __('Usuarios Administrativo Id'); ?></th>
		<th><?php echo __('Imagem'); ?></th>
		<th><?php echo __('Cidade'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cartao['Estabelecimento'] as $estabelecimento): ?>
		<tr>
			<td><?php echo $estabelecimento['id']; ?></td>
			<td><?php echo $estabelecimento['name']; ?></td>
			<td><?php echo $estabelecimento['endereco']; ?></td>
			<td><?php echo $estabelecimento['telefone']; ?></td>
			<td><?php echo $estabelecimento['tipo_comida']; ?></td>
			<td><?php echo $estabelecimento['horario_funcionamento']; ?></td>
			<td><?php echo $estabelecimento['site']; ?></td>
			<td><?php echo $estabelecimento['area_fumantes']; ?></td>
			<td><?php echo $estabelecimento['ar_livre']; ?></td>
			<td><?php echo $estabelecimento['ar_condicionado']; ?></td>
			<td><?php echo $estabelecimento['faz_reserva']; ?></td>
			<td><?php echo $estabelecimento['estacionamento']; ?></td>
			<td><?php echo $estabelecimento['faz_entrega']; ?></td>
			<td><?php echo $estabelecimento['wifi']; ?></td>
			<td><?php echo $estabelecimento['acesso_deficiente']; ?></td>
			<td><?php echo $estabelecimento['inaugurado']; ?></td>
			<td><?php echo $estabelecimento['cartoes']; ?></td>
			<td><?php echo $estabelecimento['created']; ?></td>
			<td><?php echo $estabelecimento['modified']; ?></td>
			<td><?php echo $estabelecimento['descricao']; ?></td>
			<td><?php echo $estabelecimento['rate']; ?></td>
			<td><?php echo $estabelecimento['categoria_id']; ?></td>
			<td><?php echo $estabelecimento['usuarios_administrativo_id']; ?></td>
			<td><?php echo $estabelecimento['imagem']; ?></td>
			<td><?php echo $estabelecimento['cidade']; ?></td>
			<td><?php echo $estabelecimento['slug']; ?></td>
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
