<script src="https://maps.google.com/maps/api/js?key=AIzaSyDRe-SLe-oVJhmp1x0wDGUdtVOmFceE8eU&v=quarterly&v=3" type="text/javascript" charset="UTF-8"></script>
<?php echo $this->Html->script('jquery.map'); ?>

<div class="row-fluid">

	<h2><?php __h('factory-area-management'); ?></h2>
	<ul class="nav nav-tabs">
		<li><a href="<?php echo $this->webroot; ?>admin/factory_areas"><?php __h('factory-area-list'); ?></a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/factory_areas/add"><?php __h('add-factory-area'); ?></a></li>
		<li class="active"><a><?php __h('edit-factory-area'); ?></a></li>
	</ul>

	<?php echo $this->Form->create('FactoryArea', array('class' => 'form-horizontal')); ?>
		<fieldset>
			<table class="table-input">
				<tr>
					<th><?php __h('factory-area-name'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td><?php echo $this->Form->text('name'); ?>
<?php $err = isset($validErrors['name'][0]);?>
<?php if ($err) { ?>
					<p class="alert alert-error alert_valid">※<?php __h($validErrors['name'][0]); ?></p>
<?php } ?>
					</td>
				</tr>

				<tr>
					<th><?php __h('factory-area-description'); ?><span class="label label-important"></span></th>
					<td><?php echo $this->Wysiwyg->textarea('FactoryArea.note'); ?>
<?php $err = isset($validErrors['name'][0]);?>
<?php if ($err) { ?>
					<p class="alert alert-error alert_valid">※<?php __h($validErrors['note'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				
				<tr>
					<th><?php __h('location-information-acquisition-address'); ?></th>
					<td>
						<?php echo $this->Form->text('address', array('id' => 'map_address', 'class'=>'span5')); ?>
<?php $err = isset($validErrors['address'][0]);?>
<?php if ($err) { ?>
					<p class="alert alert-error alert_valid">※<?php __h($validErrors['address'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('位置情報(緯度･経度)'); ?></th>
					<td>
					<?php echo $this->Form->text('lat_disabled', array('class' => 'map_lat', 'disabled' => 'disabled')); ?>
					<?php echo $this->Form->text('lng_disabled', array('class' => 'map_lng', 'disabled' => 'disabled')); ?>
					<?php echo $this->Form->hidden('lat', array('id' => 'map_lat', 'class' => 'map_lat')); ?>
					<?php echo $this->Form->hidden('lng', array('id' => 'map_lng', 'class' => 'map_lng')); ?>
<?php $err = isset($validErrors['lat'][0]);?>
<?php if ($err) { ?>
					<p class="alert alert-error alert_valid">※<?php __h($validErrors['lat'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['lng'][0]);?>
<?php if ($err) { ?>
					<p class="alert alert-error alert_valid">※<?php __h($validErrors['lng'][0]); ?></p>
<?php } ?>
					<a href="#" id="set_location_btn" class="btn btn-small" ><?php __h('住所から位置情報を設定する'); ?></a>
					<div id="map_canvas" style="height:<?php echo Configure::read('Admin.Map.Size.Height'); ?>px;width: <?php echo Configure::read('Admin.Map.Size.Width'); ?>px;"></div>
					</td>
				</tr>
			</table>

			<?php echo $this->Form->hidden('id', array()); ?>
			<div class="form-actions"><button class="btn" type="submit"><?php __h('保存'); ?></button></div>
		</fieldset>
	<?php echo $this->Form->end(); ?>
</div>
