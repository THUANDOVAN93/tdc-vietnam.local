<div class="row-fluid">

	<h2>権限管理</h2>
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo $this->webroot; ?>admin/roles">権限一覧</a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/roles/add">権限の追加</a></li>
		<li class="disabled"><a>権限の編集</a></li>
	</ul>

	<?php echo $this->BootstrapPaginator->pagination(); ?>
	<table class="table table-striped">
		<tr>
			<th>権限名</th>
			<th>システム管理</th>
			<th>ユーザー管理</th>
			<th>サイト更新</th>
			<th class="actions">操作</th>
		</tr>
		<?php foreach ($roles as $role): ?>
		<tr>
			<td><?php echo h($role['Role']['name']); ?>&nbsp;</td>
			<td><input type="checkbox" <?php echo ($role['Role']['role_admin'] == 1) ? 'checked' : ''; ?> disabled>&nbsp;</td>
			<td><input type="checkbox" <?php echo ($role['Role']['role_manager'] == 1) ? 'checked' : ''; ?> disabled>&nbsp;</td>
			<td><input type="checkbox" <?php echo ($role['Role']['role_staff'] == 1) ? 'checked' : ''; ?> disabled>&nbsp;</td>
			<td class="actions">
				<div class="btn-group"><?php
					echo $this->Html->link(__('編集'), array('action' => 'edit', $role['Role']['id']), array('class'  => 'btn btn-small'));
					echo $this->Form->postLink(__('削除'), array('action' => 'delete', $role['Role']['id']), array('class'  => 'btn btn-small btn-danger'), __('%sの情報を削除しますか？', $role['Role']['name']));
				?>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->BootstrapPaginator->pagination(); ?>
</div>
