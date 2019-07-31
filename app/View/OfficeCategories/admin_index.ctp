<div class="row-fluid">

	<h2><?php __h('事務所種別管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo $this->webroot; ?>admin/office_categories"><?php __h('事務所種別一覧'); ?></a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/office_categories/add"><?php __h('事務所種別の追加'); ?></a></li>
		<li class="disabled"><a><?php __h('事務所種別の編集'); ?></a></li>
	</ul>

	<?php echo $this->BootstrapPaginator->pagination(); ?>
	<table class="table table-striped">
		<tr>
			<th><?php __h('事務所種別名'); ?></th>
			<th class="actions"><?php __h('操作'); ?></th>
		</tr>
		<?php foreach ($officeCategories as $officeCategory): ?>
		<tr>
			<td><?php echo h($officeCategory['OfficeCategory']['name']); ?>&nbsp;</td>
			<td class="actions">
				<div class="btn-group"><?php
					echo $this->Html->link(__('編集'), array('action' => 'edit', $officeCategory['OfficeCategory']['id']), array('class'  => 'btn btn-small'));
					echo $this->Form->postLink(__('削除'), array('action' => 'delete', $officeCategory['OfficeCategory']['id']), array('class'  => 'btn btn-small btn-danger'), __('%sの情報を削除しますか？', $officeCategory['OfficeCategory']['name']));
				?>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->BootstrapPaginator->pagination(); ?>
</div>
