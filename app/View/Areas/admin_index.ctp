<div class="row-fluid">

	<h2><?php __h('エリア管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo $this->webroot; ?>admin/areas"><?php __h('エリア一覧'); ?></a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/areas/add"><?php __h('エリアの追加'); ?></a></li>
		<li class="disabled"><a><?php __h('エリアの編集'); ?></a></li>
	</ul>

	<?php echo $this->BootstrapPaginator->pagination(); ?>
	<table class="table table-striped">
		<tr>
			<th><?php __h('エリア名'); ?></th>
			<th class="actions"><?php __h('操作'); ?></th>
		</tr>
		<?php foreach ($areas as $area): ?>
		<tr>
			<td><?php __h($area['Area']['name']); ?>&nbsp;</td>
			<td class="actions">
				<div class="btn-group">
				<?php echo $this->Html->link(__('編集'), array('action' => 'edit', $area['Area']['id']), array('class' => 'btn btn-small')); ?>
				<?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $area['Area']['id']), array('class' => 'btn btn-small btn-danger'),__('%sの情報を削除しますか？', $area['Area']['name'])); ?>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->BootstrapPaginator->pagination(); ?>
</div>
