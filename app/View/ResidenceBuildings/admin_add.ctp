<script src="http://maps.google.com/maps/api/js?v=3&sensor=false" type="text/javascript" charset="UTF-8"></script>
<?php echo $this->Html->script('jquery.map'); ?>

<div class="container">
	<h2><?php __h('住居物件管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li><a href="<?php echo $this->webroot; ?>admin/residence_buildings"><?php __h('住居物件一覧'); ?></a></li>
		<li class="active"><a href="<?php echo $this->webroot; ?>admin/residence_buildings/add"><?php __h('住居物件の追加'); ?></a></li>
		<li class="disabled"><a><?php __h('住居物件の編集'); ?></a></li>
	</ul>
	<?php echo $this->Form->create('ResidenceBuilding', array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
		<fieldset>
			<legend style="margin-bottom: 5px;"><?php __h('物件管理'); ?></legend>
			<table class="table-input">
				<tr>
					<th><?php __h('更新頻度'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
<?php
  $radioValues = array();
  foreach (Configure::read('AlertTerm') as $value => $item) {
      $radioValues[$value] = __($item['name']);
  }
?>
						<label class="radio">
							<?php echo $this->Form->radio('alert_id', $radioValues, array('hiddenField'=>false, 'legend'=>false, 'separator'=>'</label><label class="radio">')); ?>
<?php $err = isset($validErrors['ResidenceBuilding']['alert_id'][0]);?>
<?php if ($err) { ?>
							<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['alert_id'][0]); ?></p>
<?php } ?>
						</label>
					</td>
				</tr>
				<tr>
					<th><?php __h('表示優先度'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->select('priority', __arrTranslate(Configure::read('Priority')), array('empty'=>false)); ?>
<?php $err = isset($validErrors['ResidenceBuilding']['priority'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['priority'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('フロント表示'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->select('visible', __arrTranslate(Configure::read('Visible')), array('empty'=>false)); ?>
<?php $err = isset($validErrors['ResidenceBuilding']['visible'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['visible'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('物件種別'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->select('residence_category_id', __arrTranslate($residenceCategories), array('empty'=>false)); ?>
<?php $err = isset($validErrors['ResidenceBuilding']['residence_category_id'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['residence_category_id'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
			</table>
		</fieldset>

		<fieldset>
			<legend style="padding-top: 15px; margin-bottom: 5px;"><?php __h('物件情報'); ?></legend>
			<table class="table-input">
				<tr>
					<th><?php __h('エリア'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->select('area_id', $areas, array('empty'=>false)); ?>
<?php $err = isset($validErrors['ResidenceBuilding']['area_id'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['area_id'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('物件名'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->text('name', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidenceBuilding']['name'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['name'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('住所'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->text('address', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidenceBuilding']['address'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['address'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('位置情報取得用住所'); ?></th>
					<td>
						<?php echo $this->Form->text('map_address', array('id' => 'map_address', 'class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidenceBuilding']['map_address'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['map_address'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('位置情報(緯度･経度)'); ?></th>
					<td>
<?php $err = isset($validErrors['ResidenceBuilding']['lat'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['lat'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ResidenceBuilding']['lng'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['lng'][0]); ?></p>
<?php } ?>
						<?php echo $this->Form->text('lat_disabled', array('class' => 'map_lat', 'disabled' => 'disabled')); ?>
						<?php echo $this->Form->text('lng_disabled', array('class' => 'map_lng', 'disabled' => 'disabled')); ?>
						<?php echo $this->Form->hidden('lat', array('id' => 'map_lat', 'class' => 'map_lat')); ?>
						<?php echo $this->Form->hidden('lng', array('id' => 'map_lng', 'class' => 'map_lng')); ?>
						<a href="#" id="set_location_btn" class="btn btn-small" ><?php __h('住所から位置情報を設定する'); ?></a>
						<div id="map_canvas" style="height:<?php echo Configure::read('Admin.Map.Size.Height'); ?>px;width: <?php echo Configure::read('Admin.Map.Size.Width'); ?>px;"></div>
					</td>
				</tr>
				<tr>
					<th><?php __h('最寄駅%d','1'); ?><!--span class="label label-important require-s"><?php __h('必須'); ?></span--></th>
					<td>
						<?php echo $this->Form->select('station1_id', $station1s, array('empty'=>true)); ?>
<?php $err = isset($validErrors['ResidenceBuilding']['station1_id'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['station1_id'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('最寄駅%d','2'); ?></th>
					<td>
						<?php echo $this->Form->select('station2_id', $station2s, array('empty'=>array('' => ''))); ?>
<?php $err = isset($validErrors['ResidenceBuilding']['station2_id'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['station2_id'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('最寄駅%d','3'); ?></th>
					<td>
						<?php echo $this->Form->select('station3_id', $station3s, array('empty'=>array('' => ''))); ?>
<?php $err = isset($validErrors['ResidenceBuilding']['station3_id'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['station3_id'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('アクセス'); ?></th>
					<td>
						<?php echo $this->Form->textarea('access', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidenceBuilding']['access'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['access'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('完成年'); ?></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('complated', array()); ?>
							<span class="add-on"><?php __h('年'); ?></span>
						</div>
<?php $err = isset($validErrors['ResidenceBuilding']['complated'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['complated'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('総階数'); ?></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('total_floor', array()); ?>
							<span class="add-on"><?php __h('階'); ?></span>
						</div>
<?php $err = isset($validErrors['ResidenceBuilding']['total_floor'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['total_floor'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('部屋数'); ?></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('total_room', array()); ?>
							<span class="add-on"><?php __h('室'); ?></span>
						</div>
<?php $err = isset($validErrors['ResidenceBuilding']['total_room'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['total_room'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('物件説明'); ?></th>
					<td>
						<?php echo $this->Form->textarea('description', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidenceBuilding']['description'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['description'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('周辺施設'); ?></th>
					<td>
						<?php echo $this->Form->textarea('around', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidenceBuilding']['around'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['around'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('アイコン'); ?></th>
					<td>
						<div class="checkbox">
							<?php echo $this->Form->checkbox('nearby', array()); ?>
							<label for="ResidenceBuildingNearby"><?php __h('駅近'); ?></label>
							<?php echo $this->Form->checkbox('recommend', array()); ?>
							<label for="ResidenceBuildingRecommend"><?php __h('おすすめ'); ?></label>
							<?php echo $this->Form->checkbox('popluar', array()); ?>
							<label for="ResidenceBuildingPopluar"><?php __h('人気'); ?></label>
							<?php echo $this->Form->checkbox('newly', array()); ?>
							<label for="ResidenceBuildingNewly"><?php __h('新着'); ?></label>
						</div>
					</td>
				</tr>
				<tr>
					<th><?php __h('TOP表示項目'); ?></th>
					<td>
						<div class="checkbox">
<?php foreach ($addInformations as $no => $name) { ?>
							<?php echo $this->Form->checkbox('add_information' . $no, array()); ?>
							<label for="ResidenceBuildingAddInformation<?php echo $no; ?>"><?php __h($name); ?></label>
<?php } ?>
						</div>
					</td>
				</tr>
			</table>
		</fieldset>

		<fieldset>
			<legend style="padding-top: 15px; margin-bottom: 5px;"><?php __h('設備・特徴'); ?></legend>
			<table class="table-input">
				<tr>
					<th><?php __h('アイコン'); ?></th>
					<td>
						<div class="checkbox">
<?php foreach (__arrTranslate(Configure::read('Facility.Residence')) as $column => $columnName) { ?>
							<?php echo $this->Form->checkbox($column, array('id'=>'ResidenceBuilding'.$column)); ?>
							<label for="ResidenceBuilding<?php echo $column; ?>"><?php __h($columnName); ?></label>
<?php } ?>
						</div>
					</td>
				</tr>
				<tr>
					<th><?php __h('サービス'); ?></th>
					<td>
						<?php echo $this->Form->text('service', array('class'=>'span5')); ?><br>
						<span class="label label-important label-comment"><?php __h('サービスアパートのみ入力内容が表示されます'); ?></span>
<?php $err = isset($validErrors['ResidenceBuilding']['service'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['service'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('電気'); ?></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('electricity', array()); ?>
							<span class="add-on">VND/Unit</span>
						</div>
<?php $err = isset($validErrors['ResidenceBuilding']['electricity'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['electricity'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('水道'); ?></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('water_supply', array()); ?>
							<span class="add-on">VND/Unit(cu.m)</span>
						</div>
<?php $err = isset($validErrors['ResidenceBuilding']['water_supply'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['water_supply'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('電話'); ?></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('telephone', array()); ?>
							<span class="add-on">VND</span>
						</div>
<?php $err = isset($validErrors['ResidenceBuilding']['telephone'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['telephone'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('コンロ'); ?></th>
					<td>
						<?php echo $this->Form->text('cookstove', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidenceBuilding']['cookstove'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['cookstove'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('管理費'); ?></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('management_cost', array()); ?>
							<span class="add-on"><?php __h('VND'); ?>/m&sup2;</span>
						</div><br>
						<span class="label label-important label-comment"><?php __h('コンドミニアムのみ入力内容が表示されます'); ?></span>
<?php $err = isset($validErrors['ResidenceBuilding']['management_cost'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['management_cost'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('その他付帯設備'); ?></th>
					<td>
						<?php echo $this->Form->textarea('facilities', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidenceBuilding']['facilities'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidenceBuilding']['facilities'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
			</table>
		</fieldset>

		<fieldset>
			<legend style="padding-top: 15px; margin-bottom: 5px;"><?php __h('住居物件写真'); ?></legend>
			<table class="table-input">
				<tr>
					<th><?php __h('一覧用写真'); ?></th>
					<td>
						<div class="input-section">
<?php $num = 0; ?>
							<?php echo $this->Form->hidden('ResidencePhoto.' . $num . '.use_point', array('value'=>'List')); ?>
							<div>
								<?php echo $this->Form->file('ResidencePhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidencePhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidencePhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="ResidencePhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('ResidencePhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidencePhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidencePhoto'][$num]['caption'][0]); ?></p>
<?php } ?>
								</div>
							</div>
						</div>
						<div>
<?php $num = 1; ?>
							<?php echo $this->Form->hidden('ResidencePhoto.' . $num . '.use_point', array('value'=>'List')); ?>
							<div>
								<?php echo $this->Form->file('ResidencePhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidencePhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidencePhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="ResidencePhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('ResidencePhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidencePhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidencePhoto'][$num]['caption'][0]); ?></p>
<?php } ?>
								</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<th><?php __h('詳細用写真（メイン）＋TOP用'); ?></th>
					<td>
						<div>
<?php $num = 2; ?>
							<?php echo $this->Form->hidden('ResidencePhoto.' . $num . '.use_point', array('value'=>'Main')); ?>
							<div>
								<?php echo $this->Form->file('ResidencePhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidencePhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidencePhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="ResidencePhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('ResidencePhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidencePhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidencePhoto'][$num]['caption'][0]); ?></p>
<?php } ?>
								</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<th><?php __h('詳細用写真（サブ大）'); ?></th>
					<td>
						<div class="input-section">
<?php $num = 3; ?>
							<?php echo $this->Form->hidden('ResidencePhoto.' . $num . '.use_point', array('value'=>'Sub')); ?>
							<div>
								<?php echo $this->Form->file('ResidencePhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidencePhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidencePhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="ResidencePhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('ResidencePhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidencePhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidencePhoto'][$num]['caption'][0]); ?></p>
<?php } ?>
								</div>
							</div>
						</div>
						<div>
<?php $num = 4; ?>
							<?php echo $this->Form->hidden('ResidencePhoto.' . $num . '.use_point', array('value'=>'Sub')); ?>
							<div>
								<?php echo $this->Form->file('ResidencePhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidencePhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidencePhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="ResidencePhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('ResidencePhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidencePhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidencePhoto'][$num]['caption'][0]); ?></p>
<?php } ?>
								</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<th><?php __h('詳細用写真（サブ小）'); ?></th>
					<td>
						<div class="input-section">
<?php $num = 5; ?>
							<?php echo $this->Form->hidden('ResidencePhoto.' . $num . '.use_point', array('value'=>'SubSub')); ?>
							<div>
								<?php echo $this->Form->file('ResidencePhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidencePhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidencePhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="ResidencePhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('ResidencePhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidencePhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidencePhoto'][$num]['caption'][0]); ?></p>
<?php } ?>
								</div>
							</div>
						</div>
						<div class="input-section">
<?php $num = 6; ?>
							<?php echo $this->Form->hidden('ResidencePhoto.' . $num . '.use_point', array('value'=>'SubSub')); ?>
							<div>
								<?php echo $this->Form->file('ResidencePhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidencePhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidencePhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="ResidencePhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('ResidencePhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidencePhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidencePhoto'][$num]['caption'][0]); ?></p>
<?php } ?>
								</div>
							</div>
						</div>
						<div class="input-section">
<?php $num = 7; ?>
							<?php echo $this->Form->hidden('ResidencePhoto.' . $num . '.use_point', array('value'=>'SubSub')); ?>
							<div>
								<?php echo $this->Form->file('ResidencePhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidencePhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidencePhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="ResidencePhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('ResidencePhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidencePhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidencePhoto'][$num]['caption'][0]); ?></p>
<?php } ?>
								</div>
							</div>
						</div>
						<div class="input-section">
<?php $num = 8; ?>
							<?php echo $this->Form->hidden('ResidencePhoto.' . $num . '.use_point', array('value'=>'SubSub')); ?>
							<div>
								<?php echo $this->Form->file('ResidencePhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidencePhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidencePhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="ResidencePhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('ResidencePhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidencePhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidencePhoto'][$num]['caption'][0]); ?></p>
<?php } ?>
								</div>
							</div>
						</div>
						<div class="input-section">
<?php $num = 9; ?>
							<?php echo $this->Form->hidden('ResidencePhoto.' . $num . '.use_point', array('value'=>'SubSub')); ?>
							<div>
								<?php echo $this->Form->file('ResidencePhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidencePhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidencePhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="ResidencePhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('ResidencePhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidencePhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidencePhoto'][$num]['caption'][0]); ?></p>
<?php } ?>
								</div>
							</div>
						</div>
						<div>
<?php $num = 10; ?>
							<?php echo $this->Form->hidden('ResidencePhoto.' . $num . '.use_point', array('value'=>'SubSub')); ?>
							<div>
								<?php echo $this->Form->file('ResidencePhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidencePhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidencePhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="ResidencePhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('ResidencePhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['ResidencePhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['ResidencePhoto'][$num]['caption'][0]); ?></p>
<?php } ?>
								</div>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</fieldset>
		<div class="form-actions">
			<button class="btn" type="submit"><?php __h('保存'); ?></button>
		</div>
	<?php echo $this->Form->end(); ?>
</div>
