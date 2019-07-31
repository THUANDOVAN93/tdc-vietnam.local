<div class="row-fluid">

	<h2><?php __h('工場種別管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo $this->webroot; ?>admin/factory_categories"><?php __h('工場種別一覧'); ?></a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/factory_categories/add"><?php __h('工場種別の追加'); ?></a></li>
		<li class="disabled"><a><?php __h('工場種別の編集'); ?></a></li>
	</ul>

	<?php echo $this->BootstrapPaginator->pagination(); ?>
	<table class="table table-striped">
		<tr>
			<th><?php __h('工場種別名'); ?></th>
			<th class="actions"><?php __h('操作'); ?></th>
		</tr>
		<?php foreach ($factoryCategories as $factoryCategory): ?>
		<tr>
			<td><?php echo h($factoryCategory['FactoryCategory']['name']); ?>&nbsp;</td>
			<td class="actions">
				<div class="btn-group"><?php
					echo $this->Html->link(__('編集'), array('action' => 'edit', $factoryCategory['FactoryCategory']['id']), array('class'  => 'btn btn-small'));
					echo $this->Form->postLink(__('削除'), array('action' => 'delete', $factoryCategory['FactoryCategory']['id']), array('class'  => 'btn btn-small btn-danger'), __('%sの情報を削除しますか？', $factoryCategory['FactoryCategory']['name']));
				?>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->BootstrapPaginator->pagination(); ?>
</div>
