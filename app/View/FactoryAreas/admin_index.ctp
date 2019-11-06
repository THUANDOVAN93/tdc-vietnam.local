<div class="row-fluid">

	<h2><?php __h('factory-area-management'); ?></h2>
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo $this->webroot; ?>admin/factory_areas"><?php __h('factory-area-list'); ?></a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/factory_areas/add"><?php __h('add-factory-area'); ?></a></li>
		<li class="disabled"><a><?php __h('edit-factory-area'); ?></a></li>
	</ul>

	<?php echo $this->BootstrapPaginator->pagination(); ?>
	<table class="table table-striped">
		<tr>
			<th><?php __h('factory-area-name'); ?></th>
			<th class="actions"><?php __h('action'); ?></th>
		</tr>
		<?php foreach ($factoryAreas as $factoryArea): ?>
		<tr>
			<td><?php echo h($factoryArea['FactoryArea']['name']); ?>&nbsp;</td>
			<td class="actions">
				<div class="btn-group">
				<?php echo $this->Html->link(__('編集'), array('action' => 'edit', $factoryArea['FactoryArea']['id']), array('class' => 'btn btn-small')); ?>
				<?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $factoryArea['FactoryArea']['id']), array('class' => 'btn btn-small btn-danger'),__('%sの情報を削除しますか？', $factoryArea['FactoryArea']['name'])); ?>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->BootstrapPaginator->pagination(); ?>
</div>
