<div class="row-fluid">

	<h2><?php __h('事務所種別管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li><a href="<?php echo $this->webroot; ?>admin/office_categories"><?php __h('事務所種別一覧'); ?></a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/office_categories/add"><?php __h('事務所種別の追加'); ?></a></li>
		<li class="active"><a><?php __h('事務所種別の編集'); ?></a></li>
	</ul>

	<?php echo $this->Form->create('OfficeCategory', array('class' => 'form-horizontal')); ?>
		<fieldset>
			<table class="table-input">
				<tr>
					<th><?php __h('事務所種別名'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td><?php echo $this->Form->text('name'); ?>
<?php $err = isset($validErrors['name'][0]);?>
<?php if ($err) { ?>
					<p class="alert alert-error alert_valid">※<?php __h($validErrors['name'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
			</table>

			<?php echo $this->Form->hidden('id', array()); ?>
			<div class="form-actions"><button class="btn" type="submit"><?php __h('保存'); ?></button></div>
		</fieldset>
	<?php echo $this->Form->end(); ?>
</div>
