<div class="row-fluid">

	<h2><?php __h('factory-type-management'); ?></h2>
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo $this->webroot; ?>admin/factory_categories"><?php __h('factory-type-list'); ?></a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/factory_categories/add"><?php __h('add-factory-type'); ?></a></li>
		<li class="disabled"><a><?php __h('edit-factory-type'); ?></a></li>
	</ul>

	<?php echo $this->BootstrapPaginator->pagination(); ?>
	<table class="table table-striped">
		<tr>
			<th><?php __h('factory-type-name'); ?></th>
			<th class="actions"><?php __h('action'); ?></th>
		</tr>
		<?php foreach ($factoryCategories as $factoryCategory): ?>
		<tr>
			<td><?php echo h($factoryCategory['FactoryCategory']['name']); ?>&nbsp;</td>
			<td class="actions">
				<div class="btn-group"><?php
					echo $this->Html->link(__('edit'), array('action' => 'edit', $factoryCategory['FactoryCategory']['id']), array('class'  => 'btn btn-small'));
					echo $this->Form->postLink(__('delete'), array('action' => 'delete', $factoryCategory['FactoryCategory']['id']), array('class'  => 'btn btn-small btn-danger'), __('delete-confirm', $factoryCategory['FactoryCategory']['name']));
				?>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->BootstrapPaginator->pagination(); ?>
</div>
