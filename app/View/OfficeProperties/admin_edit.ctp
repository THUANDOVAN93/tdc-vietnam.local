<div class="container">
	<h2><?php __h('事務所部屋管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li><a href="<?php echo $this->webroot; ?>admin/office_properties"><?php __h('事務所部屋一覧'); ?></a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/office_properties/add"><?php __h('事務所部屋の追加'); ?></a></li>
		<li class="active"><a><?php __h('事務所部屋の編集'); ?></a></li>
	</ul>
	<?php echo $this->Form->create('OfficeProperty', array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
		<fieldset>
			<table class="table-input">
				<tr>
					<th><?php __h('事務所物件名'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php asort($officeBuildings);
echo $this->Form->select('office_building_id', $officeBuildings, array('empty'=>array('' => ''))); ?>
<?php $err = isset($validErrors['OfficeProperty']['office_building_id'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeProperty']['office_building_id'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('フロント表示'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->select('visible', __arrTranslate(Configure::read('Visible')), array('empty'=>false)); ?>
<?php $err = isset($validErrors['OfficeProperty']['visible'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeProperty']['visible'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('売り物件'); ?>/<?php __h('貸し物件'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->select('sale_or_rent', __arrTranslate(Configure::read('SaleOrRent')), array('empty'=>false)); ?>
<?php $err = isset($validErrors['OfficeProperty']['sale_or_rent'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeProperty']['sale_or_rent'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('所在階'); ?><!--span class="label label-important require-s"><?php __h('必須'); ?></span--></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('floor', array()); ?>
							<span class="add-on"><?php __h('階'); ?></span>
						</div>
<?php $err = isset($validErrors['OfficeProperty']['floor'][0]);?>
<?php if ($err) { ?>
							<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeProperty']['floor'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('間取り'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->select('office_layout_id', $officeLayouts, array('empty'=>false)); ?>
<?php $err = isset($validErrors['OfficeProperty']['office_layout_id'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeProperty']['office_layout_id'][0]); ?></p>
<?php } ?>
						<div class="sub_input">その他&nbsp;<?php echo $this->Form->textarea('office_layout_text', array('class'=>'span4')); ?></div>
<?php $err = isset($validErrors['OfficeProperty']['office_layout_text'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeProperty']['office_layout_text'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('床面積'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('floor_space', array('value'=>number_format(str_replace( ',', '', $this->data['OfficeProperty']['floor_space']))) ); ?>
							<span class="add-on">m&sup2;</span>
						</div>
<?php $err = isset($validErrors['OfficeProperty']['floor_space'][0]);?>
<?php if ($err) { ?>
							<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeProperty']['floor_space'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('人数（サービスオフィス）'); ?><!--span class="label label-important require-s"><?php __h('必須'); ?></span--></th>
					<td>
						<?php echo $this->Form->select('office_person_num_id', $officePersonNums, array('empty'=>true)); ?>
<?php $err = isset($validErrors['OfficeProperty']['office_person_num_id'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeProperty']['office_person_num_id'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('価格'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('price', array('value'=>number_format(str_replace( ',', '', $this->data['OfficeProperty']['price']))) ); ?>
							<span class="add-on"><?php __h('USD/月'); ?></span>
						</div>
<?php $err = isset($validErrors['OfficeProperty']['price'][0]);?>
<?php if ($err) { ?>
							<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeProperty']['price'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('間取り図'); ?></th>
					<td>
<?php if (!empty($this->data['OfficeProperty']['drowing'])) { ?>
						<p><a href="<?php echo Configure::read('UploadDir') . $this->name; ?>/<?php echo $this->data['OfficeProperty']['drowing']; ?>" target="_blank">Image</a></p>
						<label class="delete_label" for="OfficePropertyDrowingDelete">
							<?php echo $this->Form->checkbox('drowing_delete'); ?>
							<?php __h('画像を削除する'); ?>
						</label>
<?php } else { ?>
						<p>No Image</p>
<?php }  ?>
						<?php echo $this->Form->file('new_drowing'); ?>
						<?php echo $this->Form->hidden('drowing', array()); ?>
<?php $err = isset($validErrors['OfficeProperty']['drowing'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeProperty']['drowing'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('備考'); ?></th>
					<td>
						<?php echo $this->Form->textarea('note', array('class'=>'span4')); ?>
<?php $err = isset($validErrors['OfficeProperty']['note'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeProperty']['note'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
			</table>
		</fieldset>

		<div class="form-actions">
			<button class="btn" type="submit"><?php __h('保存'); ?></button>
		</div>
	<?php echo $this->Form->end();?>
</div>
