<script src="http://maps.google.com/maps/api/js?v=3&sensor=false" type="text/javascript" charset="UTF-8"></script>
<?php echo $this->Html->script('jquery.map'); ?>

<div class="row-fluid">

	<h2><?php __h('駅管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li><a href="<?php echo $this->webroot; ?>admin/stations"><?php __h('駅一覧'); ?></a></li>
		<li class="active"><a href="<?php echo $this->webroot; ?>admin/stations/add"><?php __h('駅の追加'); ?></a></li>
		<li class="disabled"><a><?php __h('駅の編集'); ?></a></li>
	</ul>

	<?php echo $this->Form->create('Station', array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
		<fieldset>
			<table class="table-input">
				<tr>
					<th><?php __h('駅名'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td><?php echo $this->Form->text('name'); ?>
<?php $err = isset($validErrors['name'][0]);?>
<?php if ($err) { ?>
					<p class="alert alert-error alert_valid">※<?php __h($validErrors['name'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('路線名'); ?>１<span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td><?php echo $this->Form->select('line_id', array($lines), array('empty' => false)); ?>
<?php $err = isset($validErrors['line_id'][0]);?>
<?php if ($err) { ?>
					<p class="alert alert-error alert_valid">※<?php __h($validErrors['line_id'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('路線名'); ?>２</th>
					<td>
					<?php echo $this->Form->select('line2_id', array($lines), array('empty' => true)); ?>
<?php $err = isset($validErrors['line2_id'][0]);?>
<?php if ($err) { ?>
					<p class="alert alert-error alert_valid">※<?php __h($validErrors['line2_id'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('位置情報取得用住所'); ?></th>
					<td>
						<?php echo $this->Form->text('address', array('id' => 'map_address', 'class'=>'span5')); ?>
<?php $err = isset($validErrors['address'][0]);?>
<?php if ($err) { ?>
					<p class="alert alert-error alert_valid">※<?php __h($validErrors['address'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('位置情報'); ?>(<?php __h('緯度･経度'); ?>)</th>
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
				<tr>
					<th><?php __h('マップ画像'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td><?php echo $this->Form->file('map'); ?>
<?php $err = isset($validErrors['map'][0]);?>
<?php if ($err) { ?>
					<p class="alert alert-error" style="margin-top:10px;">※<?php __h($validErrors['map'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
			</table>

			<div class="form-actions"><button class="btn" type="submit"><?php __h('保存'); ?></button></div>
		</fieldset>
	<?php echo $this->Form->end(); ?>
</div>
