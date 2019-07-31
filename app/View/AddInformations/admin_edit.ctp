<div class="row-fluid">

	<h2><?php __h('TOP表示項目管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li><a href="<?php echo $this->webroot; ?>admin/add_informations"><?php __h('TOP表示項目一覧'); ?></a></li>
		<li class="disabled"><a><?php __h('TOP表示項目の追加'); ?></a></li>
		<li class="active"><a><?php __h('TOP表示項目の編集'); ?></a></li>
	</ul>

	<?php echo $this->Form->create('AddInformation', array('class' => 'form-horizontal')); ?>
		<fieldset>
			<table class="table-input">
				<tr>
					<th><?php __h('TOP表示項目名'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->text('name'); ?>
<?php $err = isset($validErrors['name'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['name'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('TOP表示'); ?>/<?php __h('非表示'); ?></th>
					<td>
						<div class="checkbox">
							<?php echo $this->Form->checkbox('is_enable'); ?>
							<label for="AddInformationIsEnable"><?php __h('TOPに一覧を表示する'); ?></label>
						</div>
					</td>
				</tr>
			</table>

			<?php echo $this->Form->hidden('id', array()); ?>
			<div class="form-actions"><button class="btn" type="submit"><?php __h('保存'); ?></button></div>
		</fieldset>
	<?php echo $this->Form->end(); ?>
</div>
