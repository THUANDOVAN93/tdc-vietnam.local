<div class="container">
	<div id="admin-login">
		<div class="login-box">
			<?php echo $this->Form->create('User', array('url'=>'/admin/login', 'class' => 'form-horizontal')); ?>
				<fieldset>
				<div class="legend"><?php __h('管理画面ログイン'); ?></div>
				<table>
					<tr>
						<th><?php __h('ユーザー名'); ?></th>
						<td><?php echo $this->Form->text('login_id'); ?></td>
					</tr>
					<tr>
						<th><?php __h('パスワード'); ?></th>
						<td><?php echo $this->Form->password('password'); ?></td>
					</tr>
				</table>
				</fieldset>
				<button class="btn" type="submit"><?php __h('ログイン'); ?></button>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>
<script type="text/javascript">
	window.onload = function(){ document.getElementById("UserLoginId").focus(); };
</script>
