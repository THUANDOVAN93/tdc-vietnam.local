<div class="row-fluid">

	<h2><?php __h('ユーザー管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li><a href="<?php echo $this->webroot; ?>admin/users"><?php __h('ユーザー一覧'); ?></a></li>
		<li class="active"><a href="<?php echo $this->webroot; ?>admin/users/add"><?php __h('ユーザーの追加'); ?></a></li>
		<li class="disabled"><a><?php __h('ユーザーの編集'); ?></a></li>
	</ul>

	<?php echo $this->Form->create('User', array('class' => 'form-horizontal')); ?>
		<fieldset>
			<table class="table-input">
				<tr>
					<th><?php __h('ログインID'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td><?php echo $this->Form->text('login_id'); ?>
<?php $err = isset($validErrors['login_id'][0]);?>
<?php if ($err) { ?>
					<p class="alert alert-error alert_valid">※<?php __h($validErrors['login_id'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('パスワード'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td><?php echo $this->Form->password('password'); ?>
<?php $err = isset($validErrors['password'][0]);?>
<?php if ($err) { ?>
					<p class="alert alert-error alert_valid">※<?php __h($validErrors['password'][0]); ?></p>
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

			<div class="form-actions"><button class="btn" type="submit"><?php __h('保存'); ?></button></div>
		</fieldset>
	<?php echo $this->Form->end(); ?>
</div>
