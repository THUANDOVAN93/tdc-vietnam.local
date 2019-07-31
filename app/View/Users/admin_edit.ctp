<div class="row-fluid">

	<h2><?php __h('ユーザー管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li><a href="<?php echo $this->webroot; ?>admin/users"><?php __h('ユーザー一覧'); ?></a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/users/add"><?php __h('ユーザーの追加'); ?></a></li>
		<li class="active"><a><?php __h('ユーザーの編集'); ?></a></li>
	</ul>

	<?php echo $this->Form->create('User', array('class' => 'form-horizontal')); ?>
		<fieldset>
			<table class="table-input">
				<tr>
					<th>ログインID<span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td><?php echo $this->Form->text('login_id'); ?>
<?php $err = isset($validErrors['login_id'][0]);?>
<?php if ($err) { ?>
					<p class="alert alert-error alert_valid">※<?php __h($validErrors['login_id'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('新しいパスワード'); ?></th>
					<td>
					<?php echo $this->Form->password('new_password'); ?><br>
					<span class="label label-important label-comment"><?php __h('パスワードを更新する場合に入力してください'); ?></span>
<?php $err = isset($validErrors['new_password'][0]);?>
<?php if ($err) { ?>
					<p class="alert alert-error alert_valid">※<?php __h($validErrors['new_password'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('ユーザー名'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td><?php echo $this->Form->text('username'); ?>
<?php $err = isset($validErrors['username'][0]);?>
<?php if ($err) { ?>
					<p class="alert alert-error alert_valid">※<?php __h($validErrors['username'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('権限'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td><?php echo $this->Form->select('role_id', array($roles), array('empty' => false)); ?>
<?php $err = isset($validErrors['role_id'][0]);?>
<?php if ($err) { ?>
					<p class="alert alert-error alert_valid">※<?php __h($validErrors['role_id'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
			</table>

			<?php echo $this->Form->hidden('id', array()); ?>
			<?php echo $this->Form->hidden('password', array()); ?>
			<div class="form-actions"><button class="btn" type="submit"><?php __h('保存'); ?></button></div>
		</fieldset>
	<?php echo $this->Form->end(); ?>
</div>
