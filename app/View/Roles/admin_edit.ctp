<div class="row-fluid">

	<h2><?php __h('権限管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li><a href="<?php echo $this->webroot; ?>admin/roles"><?php __h('権限一覧'); ?></a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/roles/add"><?php __h('権限の追加'); ?></a></li>
		<li class="active"><a><?php __h('権限の編集'); ?></a></li>
	</ul>

	<?php echo $this->Form->create('Role', array('class' => 'form-horizontal')); ?>
		<fieldset>
			<table class="table-input">
				<tr>
					<th><?php __h('権限名'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td><?php echo $this->Form->text('name'); ?>
<?php $err = isset($validErrors['name'][0]);?>
<?php if ($err) { ?>
					<p class="alert alert-error alert_valid">※<?php __h($validErrors['name'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('権限'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<label class="checkbox">
							<?php echo $this->Form->checkbox('role_admin'); ?><label for="RoleRoleAdmin"><?php __h('システム管理'); ?></label>
						</label>
						<label class="checkbox">
							<?php echo $this->Form->checkbox('role_manager'); ?><label for="RoleRoleManager"><?php __h('ユーザー管理'); ?></label>
						</label>
						<label class="checkbox">
							<?php echo $this->Form->checkbox('role_staff'); ?><label for="RoleRoleStaff"><?php __h('サイト更新'); ?></label>
						</label>
<?php $err = isset($validErrors['role_admin'][0]);?>
<?php if ($err) { ?>
					<p class="alert alert-error alert_valid">※<?php __h($validErrors['role_admin'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
			</table>

			<?php echo $this->Form->hidden('id', array()); ?>
			<div class="form-actions"><button class="btn" type="submit"><?php __h('保存'); ?></button></div>
		</fieldset>
	<?php echo $this->Form->end(); ?>
</div>
