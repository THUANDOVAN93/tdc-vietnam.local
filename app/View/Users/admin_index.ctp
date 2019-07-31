<div class="row-fluid">

	<h2><?php __h('ユーザー管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo $this->webroot; ?>admin/users"><?php __h('ユーザー一覧'); ?></a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/users/add"><?php __h('ユーザーの追加'); ?></a></li>
		<li class="disabled"><a><?php __h('ユーザーの編集'); ?></a></li>
	</ul>

	<?php echo $this->BootstrapPaginator->pagination(); ?>
	<table class="table table-striped">
		<tr>
			<th><?php __h('ユーザー名'); ?></th>
			<th><?php __h('ログインID'); ?></th>
			<th><?php __h('権限'); ?></th>
			<th><?php __h('更新日'); ?></th>
			<th class="actions"><?php __h('操作'); ?></th>
		</tr>
		<?php foreach ($users as $user): ?>
		<tr>
			<td><?php __h($user['User']['username']); ?>&nbsp;</td>
			<td><?php __h($user['User']['login_id']); ?>&nbsp;</td>
			<td><?php __h($user['Role']['name']); ?>&nbsp;</td>
			<td><?php __h($user['User']['modified']); ?>&nbsp;</td>
			<td class="actions">
				<div class="btn-group">
					<?php echo $this->Html->link(__('編集'), array('action' => 'edit', $user['User']['id']), array('class'  => 'btn btn-small')); ?>
<?php if ($user['User']['id'] != $this->Session->read('Auth.User.id')) { ?>
					<?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $user['User']['id']), array('class'  => 'btn btn-small btn-danger'), __('%sの情報を削除しますか？', $user['User']['username'])); ?>
<?php } ?>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->BootstrapPaginator->pagination(); ?>
</div>
