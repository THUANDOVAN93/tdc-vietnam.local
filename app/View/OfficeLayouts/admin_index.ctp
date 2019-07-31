<div class="row-fluid">

	<h2><?php __h('事務所間取り管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo $this->webroot; ?>admin/office_layouts"><?php __h('事務所間取り一覧'); ?></a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/office_layouts/add"><?php __h('事務所間取りの追加'); ?></a></li>
		<li class="disabled"><a><?php __h('事務所間取りの編集'); ?></a></li>
	</ul>

	<?php echo $this->BootstrapPaginator->pagination(); ?>
	<table class="table table-striped">
		<tr>
			<th><?php __h('事務所間取り名'); ?></th>
			<th class="actions"><?php __h('操作'); ?></th>
		</tr>
		<?php foreach ($officeLayouts as $officeLayout): ?>
		<tr>
			<td><?php __h($officeLayout['OfficeLayout']['name']); ?>&nbsp;</td>
			<td class="actions">
				<div class="btn-group"><?php
					echo $this->Html->link(__('編集'), array('action' => 'edit', $officeLayout['OfficeLayout']['id']), array('class'  => 'btn btn-small'));
					echo $this->Form->postLink(__('削除'), array('action' => 'delete', $officeLayout['OfficeLayout']['id']), array('class'  => 'btn btn-small btn-danger'), __('%sの情報を削除しますか？', $officeLayout['OfficeLayout']['name']));
				?>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->BootstrapPaginator->pagination(); ?>
</div>
