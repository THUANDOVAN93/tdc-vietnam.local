<div class="row-fluid">

	<h2><?php __h('駅管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo $this->webroot; ?>admin/stations"><?php __h('駅一覧'); ?></a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/stations/add"><?php __h('駅の追加'); ?></a></li>
		<li class="disabled"><a><?php __h('駅の編集'); ?></a></li>
	</ul>

	<?php echo $this->BootstrapPaginator->pagination(); ?>
	<table class="table table-striped">
		<tr>
			<th><?php __h('駅名'); ?></th>
			<th><?php __h('路線名'); ?>1</th>
			<th><?php __h('路線名'); ?>2</th>
			<th><?php __h('マップ画像'); ?></th>
			<th class="actions"><?php __h('操作'); ?></th>
		</tr>
		<?php foreach ($stations as $station): ?>
		<tr>
			<td><?php __h($station['Station']['name']); ?>&nbsp;</td>
			<td><?php __h($station['Line']['name']); ?>&nbsp;</td>
			<td><?php __h($station['Line2']['name']); ?>&nbsp;</td>
<?php $map = $station['Station']['map']; ?>
			<td><?php echo (!empty($map)) ? $this->Html->link('Image', Configure::read('UploadDir') . $this->name . '/' . $map, array('target' => '_blank')) : 'No Image';?>&nbsp;</td>
			<td class="actions">
				<div class="btn-group">
				<?php echo $this->Html->link(__('編集'), array('action' => 'edit', $station['Station']['id']), array('class'  => 'btn btn-small')); ?>
				<?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $station['Station']['id']), array('class'  => 'btn btn-small btn-danger'), __('%sの情報を削除しますか？', $station['Station']['name'])); ?>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->BootstrapPaginator->pagination(); ?>
</div>
