<div class="row-fluid">

	<h2><?php __h('工場エリア管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo $this->webroot; ?>admin/factory_areas"><?php __h('工場エリア一覧'); ?></a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/factory_areas/add"><?php __h('工場エリアの追加'); ?></a></li>
		<li class="disabled"><a><?php __h('工場エリアの編集'); ?></a></li>
	</ul>

	<?php echo $this->BootstrapPaginator->pagination(); ?>
	<table class="table table-striped">
		<tr>
			<th>工場エリア名</th>
			<th class="actions">操作</th>
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
