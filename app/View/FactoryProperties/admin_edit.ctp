<div class="container">
	<h2><?php __h('工場区画管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li><a href="<?php echo $this->webroot; ?>admin/factory_properties"><?php __h('工場区画一覧'); ?></a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/factory_properties/add"><?php __h('工場区画の追加'); ?></a></li>
		<li class="active"><a><?php __h('工場区画の編集'); ?></a></li>
	</ul>
	<?php echo $this->Form->create('FactoryProperty', array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
		<fieldset>
			<table class="table-input">
				<tr>
					<th><?php __h('プロジェクト名'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php asort($factoryBuildings);
echo $this->Form->select('factory_building_id', __arrTranslate($factoryBuildings), array('empty'=>array('' => ''))); ?>
<?php $err = isset($validErrors['FactoryProperty']['factory_building_id'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryProperty']['factory_building_id'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('フロント表示'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->select('visible', __arrTranslate(Configure::read('Visible')), array('empty'=>false)); ?>
<?php $err = isset($validErrors['FactoryProperty']['visible'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryProperty']['visible'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('区画種別'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->select('factory_sub_category_id', __arrTranslate($factorySubCategories), array('empty'=>false)); ?>
<?php $err = isset($validErrors['FactoryProperty']['factory_sub_category_id'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryProperty']['factory_sub_category_id'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('プロット'); ?></th>
					<td>
						<?php echo $this->Form->text('plot', array()); ?>
<?php $err = isset($validErrors['FactoryProperty']['plot'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryProperty']['plot'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('ユニット'); ?></th>
					<td>
						<?php echo $this->Form->text('unit', array()); ?>
<?php $err = isset($validErrors['FactoryProperty']['unit'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryProperty']['unit'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('工場面積'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('floor_space', array('value'=>number_format(str_replace( ',', '', $this->data['FactoryProperty']['floor_space']))) ); ?>
							<span class="add-on">m&sup2;</span>
						</div>
<?php $err = isset($validErrors['FactoryProperty']['floor_space'][0]);?>
<?php if ($err) { ?>
							<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryProperty']['floor_space'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('敷地面積'); ?><!--span class="label label-important require-s"><?php __h('必須'); ?></span--></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('site_area', array('value'=>number_format(str_replace( ',', '', $this->data['FactoryProperty']['site_area']))) ); ?>
							<span class="add-on">m&sup2;</span>
						</div>
<?php $err = isset($validErrors['FactoryProperty']['site_area'][0]);?>
<?php if ($err) { ?>
							<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryProperty']['site_area'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('価格'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('price', array('value'=>number_format(str_replace( ',', '', $this->data['FactoryProperty']['price']))) ); ?>
							<span class="add-on"><?php __h('USD'); ?></span>
						</div>
<?php $err = isset($validErrors['FactoryProperty']['price'][0]);?>
<?php if ($err) { ?>
							<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryProperty']['price'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('位置図'); ?></th>
					<td>
<?php if (!empty($this->data['FactoryProperty']['arrangement_plan'])) { ?>
						<p><a href="<?php echo Configure::read('UploadDir') . $this->name; ?>/<?php echo $this->data['FactoryProperty']['arrangement_plan']; ?>" target="_blank">Image</a></p>
						<label class="delete_label" for="FactoryPropertyArrangementPlanDelete">
							<?php echo $this->Form->checkbox('arrangement_plan_delete'); ?>
							<?php __h('画像を削除する'); ?>
						</label>
<?php } else { ?>
						<p>No Image</p>
<?php }  ?>
						<?php echo $this->Form->file('new_arrangement_plan'); ?>
						<?php echo $this->Form->hidden('arrangement_plan', array()); ?>
<?php $err = isset($validErrors['FactoryProperty']['arrangement_plan'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryProperty']['arrangement_plan'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('間取り図'); ?></th>
					<td>
<?php if (!empty($this->data['FactoryProperty']['drowing'])) { ?>
						<p><a href="<?php echo Configure::read('UploadDir') . $this->name; ?>/<?php echo $this->data['FactoryProperty']['drowing']; ?>" target="_blank">Image</a></p>
						<label class="delete_label" for="FactoryPropertyDrowingDelete">
							<?php echo $this->Form->checkbox('drowing_delete'); ?>
							<?php __h('画像を削除する'); ?>
						</label>
<?php } else { ?>
						<p>No Image</p>
<?php }  ?>
						<?php echo $this->Form->file('new_drowing'); ?>
						<?php echo $this->Form->hidden('drowing', array()); ?>
<?php $err = isset($validErrors['FactoryProperty']['drowing'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryProperty']['drowing'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('備考'); ?></th>
					<td>
						<?php echo $this->Form->textarea('note', array('class'=>'span4')); ?>
<?php $err = isset($validErrors['FactoryProperty']['note'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryProperty']['note'][0]); ?></p>
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
