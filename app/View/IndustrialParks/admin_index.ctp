<div class="row-fluid">

	<h2><?php __h('工業団地内外管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo $this->webroot; ?>admin/industrial_parks"><?php __h('工業団地内外一覧'); ?></a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/industrial_parks/add"><?php __h('工業団地内外の追加'); ?></a></li>
		<li class="disabled"><a><?php __h('工業団地内外の編集'); ?></a></li>
	</ul>

	<?php echo $this->BootstrapPaginator->pagination(); ?>
	<table class="table table-striped">
		<tr>
			<th><?php __h('工業団地内外名'); ?></th>
			<th class="actions"><?php __h('操作'); ?></th>
		</tr>
		<?php foreach ($industrialParks as $industrialPark): ?>
		<tr>
			<td><?php __h($industrialPark['IndustrialPark']['name']); ?>&nbsp;</td>
			<td class="actions">
				<div class="btn-group"><?php
					echo $this->Html->link(__('編集'), array('action' => 'edit', $industrialPark['IndustrialPark']['id']), array('class'  => 'btn btn-small'));
					echo $this->Form->postLink(__('削除'), array('action' => 'delete', $industrialPark['IndustrialPark']['id']), array('class'  => 'btn btn-small btn-danger'), __('%sの情報を削除しますか？', $industrialPark['IndustrialPark']['name']));
				?>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->BootstrapPaginator->pagination(); ?>
</div>
