<div class="container">
	<h2><?php __h('住居部屋管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li><a href="<?php echo $this->webroot; ?>admin/residence_properties"><?php __h('住居部屋一覧'); ?></a></li>
		<li class="active"><a href="<?php echo $this->webroot; ?>admin/residence_properties/add"><?php __h('住居部屋の追加'); ?></a></li>
		<li class="disabled"><a><?php __h('住居部屋の編集'); ?></a></li>
	</ul>
	<?php echo $this->Form->create('ResidenceProperty', array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
		<fieldset>
			<table class="table-input">
				<tr>
					<th><?php __h('住居物件名'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
<?php if (!empty($set_building_id)) { ?>
						<?php echo $this->Form->hidden('residence_building_id', array('value'=>$set_building_id)); ?>
						<p class="build_text"><?php echo $residenceBuildings[$set_building_id]; ?></p>
<?php } else { ?>
						<?php asort($residenceBuildings);
echo $this->Form->select('residence_building_id', $residenceBuildings, array('empty'=>array('' => ''))); ?>
<?php     $err = isset($validErrors['ResidenceProperty']['residence_building_id'][0]);?>
<?php     if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceProperty']['residence_building_id'][0]); ?></p>
<?php     } ?>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('フロント表示'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->select('visible', __arrTranslate(Configure::read('Visible')), array('empty'=>false)); ?>
<?php $err = isset($validErrors['ResidenceProperty']['visible'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceProperty']['visible'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('売り物件'); ?>/<?php __h('貸し物件'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->select('sale_or_rent', __arrTranslate(Configure::read('SaleOrRent')), array('empty'=>false)); ?>
<?php $err = isset($validErrors['ResidenceProperty']['sale_or_rent'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceProperty']['sale_or_rent'][0]); ?></p>
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
<?php $err = isset($validErrors['ResidenceProperty']['floor'][0]);?>
<?php if ($err) { ?>
							<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceProperty']['floor'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('間取り'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->select('residence_layout_id', $residenceLayouts, array('empty'=>false)); ?>
<?php $err = isset($validErrors['ResidenceProperty']['residence_layout_id'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceProperty']['residence_layout_id'][0]); ?></p>
<?php } ?>
						<div class="sub_input">その他&nbsp;<?php echo $this->Form->textarea('residence_layout_text', array('class'=>'span4')); ?></div>
<?php $err = isset($validErrors['ResidenceProperty']['residence_layout_text'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceProperty']['residence_layout_text'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('床面積'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('floor_space', array()); ?>
							<span class="add-on">m&sup2;</span>
						</div>
<?php $err = isset($validErrors['ResidenceProperty']['floor_space'][0]);?>
<?php if ($err) { ?>
							<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceProperty']['floor_space'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('価格'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('price', array()); ?>
							<span class="add-on"><?php __h('USD/月'); ?></span>
						</div>
<?php $err = isset($validErrors['ResidenceProperty']['price'][0]);?>
<?php if ($err) { ?>
							<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceProperty']['price'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('間取り図'); ?></th>
					<td>
						<?php echo $this->Form->file('drowing', array()); ?>
<?php $err = isset($validErrors['ResidenceProperty']['drowing'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceProperty']['drowing'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('備考'); ?></th>
					<td>
						<?php echo $this->Form->textarea('note', array('class'=>'span4')); ?>
<?php $err = isset($validErrors['ResidenceProperty']['note'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceProperty']['note'][0]); ?></p>
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
