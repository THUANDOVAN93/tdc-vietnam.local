<script src="http://maps.google.com/maps/api/js?v=3&sensor=false" type="text/javascript" charset="UTF-8"></script>
<?php echo $this->Html->script('jquery.map'); ?>

<div class="container">
	<h2><?php __h('工場物件管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li><a href="<?php echo $this->webroot; ?>admin/factory_buildings"><?php __h('工場物件一覧'); ?></a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/factory_buildings/add"><?php __h('工場物件の追加'); ?></a></li>
		<li class="active"><a><?php __h('工場物件の編集'); ?></a></li>
	</ul>
	<?php echo $this->Form->create('FactoryBuilding', array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
		<?php echo $this->Form->hidden('id'); ?>
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
<?php $err = isset($validErrors['FactoryBuilding']['alert_id'][0]);?>
<?php if ($err) { ?>
							<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['alert_id'][0]); ?></p>
<?php } ?>
						</label>
					</td>
				</tr>
				<tr>
					<th><?php __h('表示優先度'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->select('priority', __arrTranslate(Configure::read('Priority')), array('empty'=>false)); ?>
<?php $err = isset($validErrors['FactoryBuilding']['priority'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['priority'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('フロント表示'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->select('visible', __arrTranslate(Configure::read('Visible')), array('empty'=>false)); ?>
<?php $err = isset($validErrors['FactoryBuilding']['visible'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['visible'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('物件種別'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->select('factory_category_id', $factoryCategories, array('empty'=>false)); ?>
<?php $err = isset($validErrors['FactoryBuilding']['factory_category_id'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['factory_category_id'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
			</table>
		</fieldset>
<?php

	$helpInline = '<span class="label label-important" style="margin-left: 10px; margin-bottom: 5px">必須</span>&nbsp;';
	$role_admin   = $this->Session->read('Auth.User.Role.role_admin');
	$role_manager = $this->Session->read('Auth.User.Role.role_manager');
?>
		<fieldset>
			<legend style="padding-top: 15px; margin-bottom: 5px;"><?php __h('物件情報'); ?></legend>
			<table class="table-input">
				<tr>
					<th><?php __h('工場エリア'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->select('factory_area_id', $factoryAreas, array('empty'=>false)); ?>
<?php $err = isset($validErrors['FactoryBuilding']['factory_area_id'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['factory_area_id'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('プロジェクト名'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->text('name', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryBuilding']['name'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['name'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<!--tr>
					<th><?php __h('BOIゾーン'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->select('boi_zone', __arrTranslate(Configure::read('BoiZone')), array('empty'=>false)); ?>
<?php $err = isset($validErrors['FactoryBuilding']['boi_zone'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['boi_zone'][0]); ?></p>
<?php } ?>
					</td>
				</tr-->
				<tr>
					<th><?php __h('工業団地ゾーン'); ?></th>
					<td>
						<label class="checkbox">
<?php foreach (__arrTranslate(Configure::read('FactoryZone')) as $column => $name) { ?>
							<?php echo $this->Form->checkbox($column, array('id'=>'FactoryBuilding'.$column)); ?>
							<label for="FactoryBuilding<?php echo $column; ?>"><?php __h($name); ?></label>
<?php } ?>
						</label>
					</td>
				</tr>
				<tr>
					<th><?php __h('工業団地内外'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->select('industrial_park_id', $industrialParks, array('empty'=>false)); ?>
<?php $err = isset($validErrors['FactoryBuilding']['industrial_park_id'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['industrial_park_id'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('開発業者'); ?></th>
					<td>
						<?php echo $this->Form->text('developer', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryBuilding']['developer'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['developer'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('住所'); ?></th>
					<td>
						<?php echo $this->Form->text('address', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryBuilding']['address'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['address'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('位置情報取得用住所'); ?></th>
					<td>
						<?php echo $this->Form->text('map_address', array('id' => 'map_address', 'class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryBuilding']['map_address'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['map_address'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('位置情報'); ?>(<?php __h('緯度･経度'); ?>)</th>
					<td>
<?php $err = isset($validErrors['FactoryBuilding']['lat'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['lat'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['FactoryBuilding']['lng'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['lng'][0]); ?></p>
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
					<th><?php __h('海抜'); ?></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('altitude', array( 'value' => number_format( str_replace( ',', '', $this->Form->value('altitude') ) ) ) ); ?>
							<span class="add-on">m</span>
						</div>
<?php $err = isset($validErrors['FactoryBuilding']['altitude'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['altitude'][0]); ?></p>
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
<?php $err = isset($validErrors['FactoryBuilding']['complated'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['complated'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('開発面積'); ?></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('develop_area', array( 'value' => number_format( str_replace( ',', '', $this->Form->value('develop_area') ) ) ) ); ?>
							<span class="add-on"><?php __h('ヘクタール'); ?></span>
						</div>
<?php $err = isset($validErrors['FactoryBuilding']['develop_area'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['develop_area'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('リース有効期限'); ?></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('lease_expiration', array()); ?>
							<span class="add-on"><?php __h('年'); ?></span>
						</div>
<?php $err = isset($validErrors['FactoryBuilding']['lease_expiration'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['lease_expiration'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('【南部】ホーチミン市内
【中部】ダナン市中心部
【北部】ハノイ市中心部
からの距離
'); ?></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('from_hochiminh', array( 'value' => number_format( str_replace( ',', '', $this->Form->value('from_hochiminh') ) ) ) ); ?>
							<span class="add-on">km</span>
						</div>
<?php $err = isset($validErrors['FactoryBuilding']['from_hochiminh'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['from_hochiminh'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('【南部】タンソンニャット国際空港
【中部】ダナン国際空港
【北部】ノイバイ国際空港
からの距離
'); ?></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('from_tansonnhat', array( 'value' => number_format( str_replace( ',', '', $this->Form->value('from_tansonnhat') ) ) ) ); ?>
							<span class="add-on">km</span>
						</div>
<?php $err = isset($validErrors['FactoryBuilding']['from_tansonnhat'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['from_tansonnhat'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('【南部】ロンタン新国際空港
【中部】ティエンサ港
【北部】ハイフォン港
からの距離
'); ?></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('from_new_airport', array( 'value' => number_format( str_replace( ',', '', $this->Form->value('from_new_airport') ) ) ) ); ?>
							<span class="add-on">km</span>
						</div>
<?php $err = isset($validErrors['FactoryBuilding']['from_new_airport'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['from_new_airport'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('【南部】サイゴン新港
【中部】リエンチュウ港
【北部】カットビー国内空港
からの距離
'); ?></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('from_saigon', array( 'value' => number_format( str_replace( ',', '', $this->Form->value('from_saigon') ) ) ) ); ?>
							<span class="add-on">km</span>
						</div>
<?php $err = isset($validErrors['FactoryBuilding']['from_saigon'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['from_saigon'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('【南部】カットライ
【中部】ロン橋
【北部】ティンラン国際空港
からの距離
'); ?></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('from_catlai', array( 'value' => number_format( str_replace( ',', '', $this->Form->value('from_catlai') ) ) ) ); ?>
							<span class="add-on">km</span>
						</div>
<?php $err = isset($validErrors['FactoryBuilding']['from_catlai'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['from_catlai'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('【南部】チーパイ港
【北部】カイラン港
からの距離
'); ?></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('from_thivai', array( 'value' => number_format( str_replace( ',', '', $this->Form->value('from_thivai') ) ) ) ); ?>
							<span class="add-on">km</span>
						</div>
<?php $err = isset($validErrors['FactoryBuilding']['from_thivai'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['from_thivai'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('【南部】ブンタウ港
からの距離
'); ?></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('from_vungtau', array( 'value' => number_format( str_replace( ',', '', $this->Form->value('from_vungtau') ) ) ) ); ?>
							<span class="add-on">km</span>
						</div>
<?php $err = isset($validErrors['FactoryBuilding']['from_vungtau'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['from_vungtau'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('アイコン'); ?></th>
					<td>
						<div class="checkbox">
							<?php echo $this->Form->checkbox('recommend', array()); ?>
							<label for="FactoryBuildingRecommend"><?php __h('おすすめ'); ?></label>
							<?php echo $this->Form->checkbox('popluar', array()); ?>
							<label for="FactoryBuildingPopluar"><?php __h('人気'); ?></label>
							<?php echo $this->Form->checkbox('newly', array()); ?>
							<label for="FactoryBuildingNewly"><?php __h('新着'); ?></label>
						</div>
					</td>
				</tr>
				<tr>
					<th><?php __h('TOP表示項目'); ?></th>
					<td>
						<div class="checkbox">
<?php foreach ($addInformations as $no => $name) { ?>
							<?php echo $this->Form->checkbox('add_information' . $no, array()); ?>
							<label for="FactoryBuildingAddInformation<?php echo $no; ?>"><?php __h($name); ?></label>
<?php } ?>
						</div>
					</td>
				</tr>
				<tr>
					<th><?php __h('主な入居企業'); ?></th>
					<td>
						<?php echo $this->Form->select('FactoryBuildingFactoryTenant.factory_tenant_id', $factoryTenants, array('empty'=>false, 'multiple'=>true, 'class'=>'span6')); ?>
<?php $err = isset($validErrors['FactoryBuildingFactoryTenant']['factory_tenant_id'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuildingFactoryTenant']['factory_tenant_id'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<legend style="padding-top: 15px; margin-bottom: 5px;"><?php __h('インフラ環境・施設'); ?></legend>
			<table class="table-input">
				<tr>
					<th><?php __h('アイコン'); ?></th>
					<td>
						<div class="checkbox">
<?php foreach (__arrTranslate(Configure::read('Facility.FactoryBuilding')) as $column => $columnName) { ?>
							<?php echo $this->Form->checkbox($column, array('id'=>'FactoryBuilding'.$column)); ?>
							<label for="FactoryBuilding<?php echo $column; ?>"><?php __h($columnName); ?></label>
<?php } ?>
						</div>
					</td>
				</tr>
				<tr>
					<th><?php __h('幹線道路'); ?></th>
					<td>
						<?php echo $this->Form->text('highway', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryBuilding']['highway'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['highway'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('排水処理'); ?></th>
					<td>
						<?php echo $this->Form->text('sewer', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryBuilding']['sewer'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['sewer'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('工業用水'); ?></th>
					<td>
						<?php echo $this->Form->text('waterworks', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryBuilding']['waterworks'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['waterworks'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('雨水処理'); ?></th>
					<td>
						<?php echo $this->Form->text('reservoir', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryBuilding']['reservoir'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['reservoir'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('電力'); ?></th>
					<td>
						<?php echo $this->Form->text('electricity', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryBuilding']['electricity'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['electricity'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<!--tr>
					<th><?php __h('天然ガス'); ?></th>
					<td>
						<?php echo $this->Form->text('natural_gas', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryBuilding']['natural_gas'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['natural_gas'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('スチーム'); ?></th>
					<td>
						<?php echo $this->Form->text('steam', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryBuilding']['steam'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['steam'][0]); ?></p>
<?php } ?>
					</td>
				</tr-->
				<tr>
					<th><?php __h('電話通信'); ?></th>
					<td>
						<?php echo $this->Form->text('telephone', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryBuilding']['telephone'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['telephone'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('セキュリティー'); ?></th>
					<td>
						<?php echo $this->Form->text('security', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryBuilding']['security'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['security'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('管理費'); ?></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('management_cost', array()); ?>
							<span class="add-on"><?php __h('USD'); ?>/m&sup2;</span>
						</div>
<?php $err = isset($validErrors['FactoryBuilding']['management_cost'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['management_cost'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('その他付帯設備'); ?></th>
					<td>
						<?php echo $this->Form->textarea('facilities', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryBuilding']['facilities'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryBuilding']['facilities'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<legend style="padding-top: 15px; margin-bottom: 5px;"><?php __h('工場物件写真'); ?></legend>
			<table class="table-input">
				<tr>
					<th><?php __h('一覧用写真'); ?></th>
					<td>
						<div class="input-section">
<?php $num = 0; ?>
							<?php echo $this->Form->hidden('FactoryPhoto.' . $num . '.use_point', array('value'=>'List')); ?>
							<div>
<?php if (isset($factoryData['FactoryPhoto'][$num]['path'])) { ?>
								<div class="image_display">
									<p class="image_link"><a href="<?php echo Configure::read('UploadDir') . $this->name; ?>/tmb_list_<?php echo $factoryData['FactoryPhoto'][$num]['path']; ?>" target="_blank">Image</a></p>
									<?php echo $this->Form->hidden('FactoryPhoto.' . $num . '.path_hidden', array('value'=>$factoryData['FactoryPhoto'][$num]['path'])); ?>
									<label class="delete_label" for="FactoryPhoto<?php echo $num; ?>PathDelete">
										<?php echo $this->Form->checkbox('FactoryPhoto.' . $num . '.path_delete'); ?>
										<?php __h('画像を削除する'); ?>
									</label>
								</div>
<?php } else { ?>
								<p>No Image</p>
<?php }  ?>
								<?php echo $this->Form->file('FactoryPhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryPhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryPhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="FactoryPhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('FactoryPhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryPhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryPhoto'][$num]['caption'][0]); ?></p>
<?php } ?>
								</div>
							</div>
						</div>
						<div>
<?php $num = 1; ?>
							<?php echo $this->Form->hidden('FactoryPhoto.' . $num . '.use_point', array('value'=>'List')); ?>
							<div>
<?php if (isset($factoryData['FactoryPhoto'][$num]['path'])) { ?>
								<div class="image_display">
									<p class="image_link"><a href="<?php echo Configure::read('UploadDir') . $this->name; ?>/tmb_list_<?php echo $factoryData['FactoryPhoto'][$num]['path']; ?>" target="_blank">Image</a></p>
									<?php echo $this->Form->hidden('FactoryPhoto.' . $num . '.path_hidden', array('value'=>$factoryData['FactoryPhoto'][$num]['path'])); ?>
									<label class="delete_label" for="FactoryPhoto<?php echo $num; ?>PathDelete">
										<?php echo $this->Form->checkbox('FactoryPhoto.' . $num . '.path_delete'); ?>
										<?php __h('画像を削除する'); ?>
									</label>
								</div>
<?php } else { ?>
								<p>No Image</p>
<?php }  ?>
								<?php echo $this->Form->file('FactoryPhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryPhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryPhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="FactoryPhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('FactoryPhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryPhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryPhoto'][$num]['caption'][0]); ?></p>
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
							<?php echo $this->Form->hidden('FactoryPhoto.' . $num . '.use_point', array('value'=>'Main')); ?>
							<div>
<?php if (isset($factoryData['FactoryPhoto'][$num]['path'])) { ?>
								<div class="image_display">
									<p class="image_link"><a href="<?php echo Configure::read('UploadDir') . $this->name; ?>/tmb_main_<?php echo $factoryData['FactoryPhoto'][$num]['path']; ?>" target="_blank">Image</a></p>
									<?php echo $this->Form->hidden('FactoryPhoto.' . $num . '.path_hidden', array('value'=>$factoryData['FactoryPhoto'][$num]['path'])); ?>
									<label class="delete_label" for="FactoryPhoto<?php echo $num; ?>PathDelete">
										<?php echo $this->Form->checkbox('FactoryPhoto.' . $num . '.path_delete'); ?>
										<?php __h('画像を削除する'); ?>
									</label>
								</div>
<?php } else { ?>
								<p>No Image</p>
<?php }  ?>
								<?php echo $this->Form->file('FactoryPhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryPhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryPhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="FactoryPhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('FactoryPhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryPhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryPhoto'][$num]['caption'][0]); ?></p>
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
							<?php echo $this->Form->hidden('FactoryPhoto.' . $num . '.use_point', array('value'=>'Sub')); ?>
							<div>
<?php if (isset($factoryData['FactoryPhoto'][$num]['path'])) { ?>
								<div class="image_display">
									<p class="image_link"><a href="<?php echo Configure::read('UploadDir') . $this->name; ?>/tmb_sub_<?php echo $factoryData['FactoryPhoto'][$num]['path']; ?>" target="_blank">Image</a></p>
									<?php echo $this->Form->hidden('FactoryPhoto.' . $num . '.path_hidden', array('value'=>$factoryData['FactoryPhoto'][$num]['path'])); ?>
									<label class="delete_label" for="FactoryPhoto<?php echo $num; ?>PathDelete">
										<?php echo $this->Form->checkbox('FactoryPhoto.' . $num . '.path_delete'); ?>
										<?php __h('画像を削除する'); ?>
									</label>
								</div>
<?php } else { ?>
								<p>No Image</p>
<?php }  ?>
								<?php echo $this->Form->file('FactoryPhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryPhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryPhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="FactoryPhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('FactoryPhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryPhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryPhoto'][$num]['caption'][0]); ?></p>
<?php } ?>
								</div>
							</div>
						</div>
						<div>
<?php $num = 4; ?>
							<?php echo $this->Form->hidden('FactoryPhoto.' . $num . '.use_point', array('value'=>'Sub')); ?>
							<div>
<?php if (isset($factoryData['FactoryPhoto'][$num]['path'])) { ?>
								<div class="image_display">
									<p class="image_link"><a href="<?php echo Configure::read('UploadDir') . $this->name; ?>/tmb_sub_<?php echo $factoryData['FactoryPhoto'][$num]['path']; ?>" target="_blank">Image</a></p>
									<?php echo $this->Form->hidden('FactoryPhoto.' . $num . '.path_hidden', array('value'=>$factoryData['FactoryPhoto'][$num]['path'])); ?>
									<label class="delete_label" for="FactoryPhoto<?php echo $num; ?>PathDelete">
										<?php echo $this->Form->checkbox('FactoryPhoto.' . $num . '.path_delete'); ?>
										<?php __h('画像を削除する'); ?>
									</label>
								</div>
<?php } else { ?>
								<p>No Image</p>
<?php }  ?>
								<?php echo $this->Form->file('FactoryPhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryPhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryPhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="FactoryPhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('FactoryPhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryPhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryPhoto'][$num]['caption'][0]); ?></p>
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
							<?php echo $this->Form->hidden('FactoryPhoto.' . $num . '.use_point', array('value'=>'SubSub')); ?>
							<div>
<?php if (isset($factoryData['FactoryPhoto'][$num]['path'])) { ?>
								<div class="image_display">
									<p class="image_link"><a href="<?php echo Configure::read('UploadDir') . $this->name; ?>/tmb_subsub_<?php echo $factoryData['FactoryPhoto'][$num]['path']; ?>" target="_blank">Image</a></p>
									<?php echo $this->Form->hidden('FactoryPhoto.' . $num . '.path_hidden', array('value'=>$factoryData['FactoryPhoto'][$num]['path'])); ?>
									<label class="delete_label" for="FactoryPhoto<?php echo $num; ?>PathDelete">
										<?php echo $this->Form->checkbox('FactoryPhoto.' . $num . '.path_delete'); ?>
										<?php __h('画像を削除する'); ?>
									</label>
								</div>
<?php } else { ?>
								<p>No Image</p>
<?php }  ?>
								<?php echo $this->Form->file('FactoryPhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryPhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryPhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="FactoryPhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('FactoryPhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryPhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryPhoto'][$num]['caption'][0]); ?></p>
<?php } ?>
								</div>
							</div>
						</div>
						<div class="input-section">
<?php $num = 6; ?>
							<?php echo $this->Form->hidden('FactoryPhoto.' . $num . '.use_point', array('value'=>'SubSub')); ?>
							<div>
<?php if (isset($factoryData['FactoryPhoto'][$num]['path'])) { ?>
								<div class="image_display">
									<p class="image_link"><a href="<?php echo Configure::read('UploadDir') . $this->name; ?>/tmb_subsub_<?php echo $factoryData['FactoryPhoto'][$num]['path']; ?>" target="_blank">Image</a></p>
									<?php echo $this->Form->hidden('FactoryPhoto.' . $num . '.path_hidden', array('value'=>$factoryData['FactoryPhoto'][$num]['path'])); ?>
									<label class="delete_label" for="FactoryPhoto<?php echo $num; ?>PathDelete">
										<?php echo $this->Form->checkbox('FactoryPhoto.' . $num . '.path_delete'); ?>
										<?php __h('画像を削除する'); ?>
									</label>
								</div>
<?php } else { ?>
								<p>No Image</p>
<?php }  ?>
								<?php echo $this->Form->file('FactoryPhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryPhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryPhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="FactoryPhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('FactoryPhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryPhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryPhoto'][$num]['caption'][0]); ?></p>
<?php } ?>
								</div>
							</div>
						</div>
						<div class="input-section">
<?php $num = 7; ?>
							<?php echo $this->Form->hidden('FactoryPhoto.' . $num . '.use_point', array('value'=>'SubSub')); ?>
							<div>
<?php if (isset($factoryData['FactoryPhoto'][$num]['path'])) { ?>
								<div class="image_display">
									<p class="image_link"><a href="<?php echo Configure::read('UploadDir') . $this->name; ?>/tmb_subsub_<?php echo $factoryData['FactoryPhoto'][$num]['path']; ?>" target="_blank">Image</a></p>
									<?php echo $this->Form->hidden('FactoryPhoto.' . $num . '.path_hidden', array('value'=>$factoryData['FactoryPhoto'][$num]['path'])); ?>
									<label class="delete_label" for="FactoryPhoto<?php echo $num; ?>PathDelete">
										<?php echo $this->Form->checkbox('FactoryPhoto.' . $num . '.path_delete'); ?>
										<?php __h('画像を削除する'); ?>
									</label>
								</div>
<?php } else { ?>
								<p>No Image</p>
<?php }  ?>
								<?php echo $this->Form->file('FactoryPhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryPhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryPhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="FactoryPhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('FactoryPhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryPhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryPhoto'][$num]['caption'][0]); ?></p>
<?php } ?>
								</div>
							</div>
						</div>
						<div class="input-section">
<?php $num = 8; ?>
							<?php echo $this->Form->hidden('FactoryPhoto.' . $num . '.use_point', array('value'=>'SubSub')); ?>
							<div>
<?php if (isset($factoryData['FactoryPhoto'][$num]['path'])) { ?>
								<div class="image_display">
									<p class="image_link"><a href="<?php echo Configure::read('UploadDir') . $this->name; ?>/tmb_subsub_<?php echo $factoryData['FactoryPhoto'][$num]['path']; ?>" target="_blank">Image</a></p>
									<?php echo $this->Form->hidden('FactoryPhoto.' . $num . '.path_hidden', array('value'=>$factoryData['FactoryPhoto'][$num]['path'])); ?>
									<label class="delete_label" for="FactoryPhoto<?php echo $num; ?>PathDelete">
										<?php echo $this->Form->checkbox('FactoryPhoto.' . $num . '.path_delete'); ?>
										<?php __h('画像を削除する'); ?>
									</label>
								</div>
<?php } else { ?>
								<p>No Image</p>
<?php }  ?>
								<?php echo $this->Form->file('FactoryPhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryPhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryPhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="FactoryPhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('FactoryPhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryPhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryPhoto'][$num]['caption'][0]); ?></p>
<?php } ?>
								</div>
							</div>
						</div>
						<div class="input-section">
<?php $num = 9; ?>
							<?php echo $this->Form->hidden('FactoryPhoto.' . $num . '.use_point', array('value'=>'SubSub')); ?>
							<div>
<?php if (isset($factoryData['FactoryPhoto'][$num]['path'])) { ?>
								<div class="image_display">
									<p class="image_link"><a href="<?php echo Configure::read('UploadDir') . $this->name; ?>/tmb_subsub_<?php echo $factoryData['FactoryPhoto'][$num]['path']; ?>" target="_blank">Image</a></p>
									<?php echo $this->Form->hidden('FactoryPhoto.' . $num . '.path_hidden', array('value'=>$factoryData['FactoryPhoto'][$num]['path'])); ?>
									<label class="delete_label" for="FactoryPhoto<?php echo $num; ?>PathDelete">
										<?php echo $this->Form->checkbox('FactoryPhoto.' . $num . '.path_delete'); ?>
										<?php __h('画像を削除する'); ?>
									</label>
								</div>
<?php } else { ?>
								<p>No Image</p>
<?php }  ?>
								<?php echo $this->Form->file('FactoryPhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryPhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryPhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="FactoryPhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('FactoryPhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryPhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryPhoto'][$num]['caption'][0]); ?></p>
<?php } ?>
								</div>
							</div>
						</div>
						<div>
<?php $num = 10; ?>
							<?php echo $this->Form->hidden('FactoryPhoto.' . $num . '.use_point', array('value'=>'SubSub')); ?>
							<div>
<?php if (isset($factoryData['FactoryPhoto'][$num]['path'])) { ?>
								<div class="image_display">
									<p class="image_link"><a href="<?php echo Configure::read('UploadDir') . $this->name; ?>/tmb_subsub_<?php echo $factoryData['FactoryPhoto'][$num]['path']; ?>" target="_blank">Image</a></p>
									<?php echo $this->Form->hidden('FactoryPhoto.' . $num . '.path_hidden', array('value'=>$factoryData['FactoryPhoto'][$num]['path'])); ?>
									<label class="delete_label" for="FactoryPhoto<?php echo $num; ?>PathDelete">
										<?php echo $this->Form->checkbox('FactoryPhoto.' . $num . '.path_delete'); ?>
										<?php __h('画像を削除する'); ?>
									</label>
								</div>
<?php } else { ?>
								<p>No Image</p>
<?php }  ?>
								<?php echo $this->Form->file('FactoryPhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryPhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryPhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="FactoryPhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('FactoryPhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['FactoryPhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['FactoryPhoto'][$num]['caption'][0]); ?></p>
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
