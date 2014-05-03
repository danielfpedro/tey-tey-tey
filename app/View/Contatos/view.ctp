<h1>hjhjkh</h1>
<div class="contatos view">
<h2><?php echo __('Contato'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($contato['Contato']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($contato['Contato']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Texto'); ?></dt>
		<dd>
			<?php echo h($contato['Contato']['texto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($contato['Contato']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($contato['Contato']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($contato['Contato']['email']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Contato'), array('action' => 'edit', $contato['Contato']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Contato'), array('action' => 'delete', $contato['Contato']['id']), null, __('Are you sure you want to delete # %s?', $contato['Contato']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Contatos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contato'), array('action' => 'add')); ?> </li>
	</ul>
</div>
