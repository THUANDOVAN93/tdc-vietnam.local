<script src="http://maps.google.com/maps/api/js?v=3&sensor=false" type="text/javascript" charset="UTF-8"></script>
<?php echo $this->Html->script('jquery.map'); ?>

<div class="container">
	<h2><?php __h('事務所物件管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li><a href="<?php echo $this->webroot; ?>admin/office_buildings"><?php __h('事務所物件一覧'); ?></a></li>
		<li class="active"><a href="<?php echo $this->webroot; ?>admin/office_buildings/add"><?php __h('事務所物件の追加'); ?></a></li>
		<li class="disabled"><a><?php __h('事務所物件の編集'); ?></a></li>
	</ul>
	<?php echo $this->Form->create('OfficeBuilding', array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
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
<?php $err = isset($validErrors['OfficeBuilding']['alert_id'][0]);?>
<?php if ($err) { ?>
							<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['alert_id'][0]); ?></p>
<?php } ?>
						</label>
					</td>
				</tr>
				<tr>
					<th><?php __h('表示優先度'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->select('priority', __arrTranslate(Configure::read('Priority')), array('empty'=>false)); ?>
<?php $err = isset($validErrors['OfficeBuilding']['priority'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['priority'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('フロント表示'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->select('visible', __arrTranslate(Configure::read('Visible')), array('empty'=>false)); ?>
<?php $err = isset($validErrors['OfficeBuilding']['visible'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['visible'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('物件種別'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->select('office_category_id', $officeCategories, array('empty'=>false)); ?>
<?php $err = isset($validErrors['OfficeBuilding']['office_category_id'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['office_category_id'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
			</table>
				<?php
					$helpInline   = '<span class="label label-important" style="margin-left: 10px; margin-bottom: 5px">必須</span>&nbsp;';
					$role_admin   = $this->Session->read('Auth.User.Role.role_admin');
					$role_manager = $this->Session->read('Auth.User.Role.role_manager');
				?>
		</fieldset>

		<fieldset>
			<legend style="padding-top: 15px; margin-bottom: 5px;"><?php __h('物件情報'); ?></legend>
			<table class="table-input">
				<tr>
					<th><?php __h('エリア'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->select('area_id', $areas, array('empty'=>false)); ?>
<?php $err = isset($validErrors['OfficeBuilding']['area_id'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['area_id'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('物件名'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->text('name', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficeBuilding']['name'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['name'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('住所'); ?><span class="label label-important require-s"><?php __h('必須'); ?></span></th>
					<td>
						<?php echo $this->Form->text('address', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficeBuilding']['address'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['address'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('位置情報取得用住所'); ?></th>
					<td>
						<?php echo $this->Form->text('map_address', array('id' => 'map_address', 'class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficeBuilding']['map_address'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['map_address'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('位置情報(緯度･経度)'); ?></th>
					<td>
<?php $err = isset($validErrors['OfficeBuilding']['lat'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['lat'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['OfficeBuilding']['lng'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['lng'][0]); ?></p>
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
					<th><?php __h('最寄駅'); ?>1<!--span class="label label-important require-s"><?php __h('必須'); ?></span--></th>
					<td>
						<?php echo $this->Form->select('station1_id', $station1s, array('empty'=>true)); ?>
<?php $err = isset($validErrors['OfficeBuilding']['station1_id'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['station1_id'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('最寄駅'); ?>2</th>
					<td>
						<?php echo $this->Form->select('station2_id', $station2s, array('empty'=>array('' => ''))); ?>
<?php $err = isset($validErrors['OfficeBuilding']['station2_id'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['station2_id'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('最寄駅'); ?>3</th>
					<td>
						<?php echo $this->Form->select('station3_id', $station3s, array('empty'=>array('' => ''))); ?>
<?php $err = isset($validErrors['OfficeBuilding']['station3_id'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['station3_id'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('アクセス'); ?></th>
					<td>
						<?php echo $this->Form->textarea('access', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficeBuilding']['access'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['access'][0]); ?></p>
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
<?php $err = isset($validErrors['OfficeBuilding']['complated'][0]);?>
<?php if ($err) { ?>
							<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['complated'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('天井高'); ?></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('height', array()); ?>
							<span class="add-on">m</span>
						</div>
<?php $err = isset($validErrors['OfficeBuilding']['height'][0]);?>
<?php if ($err) { ?>
							<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['height'][0]); ?></p>
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
<?php $err = isset($validErrors['OfficeBuilding']['total_floor'][0]);?>
<?php if ($err) { ?>
							<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['total_floor'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('エレベーター数'); ?></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('elevator', array()); ?>
							<span class="add-on"><?php __h('台'); ?></span>
						</div>
<?php $err = isset($validErrors['OfficeBuilding']['elevator'][0]);?>
<?php if ($err) { ?>
							<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['elevator'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('サービスリフト数'); ?></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('lift', array()); ?>
							<span class="add-on"><?php __h('台'); ?></span>
						</div>
<?php $err = isset($validErrors['OfficeBuilding']['lift'][0]);?>
<?php if ($err) { ?>
							<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['lift'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('物件説明'); ?></th>
					<td>
						<?php echo $this->Form->textarea('description', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficeBuilding']['description'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['description'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('周辺施設'); ?></th>
					<td>
						<?php echo $this->Form->textarea('around', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficeBuilding']['around'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['around'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('管理会社'); ?></th>
					<td>
						<?php echo $this->Form->text('proprietary', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficeBuilding']['proprietary'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['proprietary'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('アイコン'); ?></th>
					<td>
						<div class="checkbox">
							<?php echo $this->Form->checkbox('nearby', array()); ?>
							<label for="OfficeBuildingNearby"><?php __h('駅近'); ?></label>
							<?php echo $this->Form->checkbox('recommend', array()); ?>
							<label for="OfficeBuildingRecommend"><?php __h('おすすめ'); ?></label>
							<?php echo $this->Form->checkbox('popluar', array()); ?>
							<label for="OfficeBuildingPopluar"><?php __h('人気'); ?></label>
							<?php echo $this->Form->checkbox('newly', array()); ?>
							<label for="OfficeBuildingNewly"><?php __h('新着'); ?></label>
						</div>
					</td>
				</tr>
				<tr>
					<th><?php __h('TOP表示項目'); ?></th>
					<td>
						<div class="checkbox">
<?php foreach ($addInformations as $no => $name) { ?>
							<?php echo $this->Form->checkbox('add_information' . $no, array()); ?>
							<label for="OfficeBuildingAddInformation<?php echo $no; ?>"><?php __h($name); ?></label>
<?php } ?>
						</div>
					</td>
				</tr>
				<tr>
					<th><?php __h('主な入居企業'); ?></th>
					<td>
						<?php echo $this->Form->text('together', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficeBuilding']['together'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['together'][0]); ?></p>
<?php } ?>
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
<?php foreach (__arrTranslate(Configure::read('Facility.OfficeBuilding')) as $column => $columnName) { ?>
							<?php echo $this->Form->checkbox($column, array('id'=>'OfficeBuilding'.$column)); ?>
							<label for="OfficeBuilding<?php echo $column; ?>"><?php __h($columnName); ?></label>
<?php } ?>
						</div>
					</td>
				</tr>

				<tr>
					<th><?php __h('駐輪場'); ?></th>
					<td>
						<div class="input-append">
						<?php echo $this->Form->text('parking', array('class'=>'span2')); ?>
				     	<span class="add-on">VND/台 </span>
						</div>
<?php $err = isset($validErrors['OfficeBuilding']['parking'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['parking'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('セキュリティ'); ?></th>
					<td>
						<?php echo $this->Form->text('security', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficeBuilding']['security'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['security'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('会議室利用'); ?></th>
					<td>
						<?php echo $this->Form->text('meeting_room', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficeBuilding']['meeting_room'][0]);?><br /><span class="label label-important label-comment"><?php __h('サービスオフィスのみ入力内容が表示されます'); ?></span>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['meeting_room'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('インターネット'); ?></th>
					<td>
						<?php echo $this->Form->text('internet', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficeBuilding']['internet'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['internet'][0]); ?></p>
<?php } ?>
					</td>
				</tr>

				<tr>
					<th><?php __h('エアコン'); ?></th>
					<td>
						<?php echo $this->Form->text('air_conditioner', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficeBuilding']['air_conditioner'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['air_conditioner'][0]); ?></p>
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
<?php $err = isset($validErrors['OfficeBuilding']['electricity'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['electricity'][0]); ?></p>
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
<?php $err = isset($validErrors['OfficeBuilding']['water_supply'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['water_supply'][0]); ?></p>
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
<?php $err = isset($validErrors['OfficeBuilding']['telephone'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['telephone'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('管理費'); ?></th>
					<td>
						<div class="input-append">
							<?php echo $this->Form->text('management_cost', array()); ?>
							<span class="add-on"><?php __h('USD'); ?>/m&sup2;</span><br /><span class="label label-important label-comment"><?php __h('オフィス（販売）のみ入力内容が表示されます'); ?></span>
						</div>
<?php $err = isset($validErrors['OfficeBuilding']['management_cost'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['management_cost'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php __h('管理費は賃料に含む'); ?></th>
					<td>
						<div class="checkbox">
							<?php echo $this->Form->checkbox('management_cost_inc', array()); ?>
							<label for="management_cost_inc"><?php __h('表示'); ?></label>
						</div><span class="label label-important label-comment"><?php __h('オフィス（販売）のみ入力内容が表示されます'); ?></span>
<?php $err = isset($validErrors['OfficeBuilding']['management_cost_inc'][0]);?>
					</td>
				</tr>
				<tr>
					<th><?php __h('その他付帯設備'); ?></th>
					<td>
						<?php echo $this->Form->textarea('facilities', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficeBuilding']['facilities'][0]);?>
<?php if ($err) { ?>
						<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficeBuilding']['facilities'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
			</table>
		</fieldset>

		<fieldset>
			<legend style="padding-top: 15px; margin-bottom: 5px;"><?php __h('事務所物件写真'); ?></legend>
			<table class="table-input">
				<tr>
					<th><?php __h('一覧用写真'); ?></th>
					<td>
						<div class="input-section">
<?php $num = 0; ?>
							<?php echo $this->Form->hidden('OfficePhoto.' . $num . '.use_point', array('value'=>'List')); ?>
							<div>
								<?php echo $this->Form->file('OfficePhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficePhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficePhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="OfficePhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('OfficePhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficePhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficePhoto'][$num]['caption'][0]); ?></p>
<?php } ?>
								</div>
							</div>
						</div>
						<div>
<?php $num = 1; ?>
							<?php echo $this->Form->hidden('OfficePhoto.' . $num . '.use_point', array('value'=>'List')); ?>
							<div>
								<?php echo $this->Form->file('OfficePhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficePhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficePhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="OfficePhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('OfficePhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficePhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficePhoto'][$num]['caption'][0]); ?></p>
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
							<?php echo $this->Form->hidden('OfficePhoto.' . $num . '.use_point', array('value'=>'Main')); ?>
							<div>
								<?php echo $this->Form->file('OfficePhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficePhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficePhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="OfficePhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('OfficePhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficePhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficePhoto'][$num]['caption'][0]); ?></p>
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
							<?php echo $this->Form->hidden('OfficePhoto.' . $num . '.use_point', array('value'=>'Sub')); ?>
							<div>
								<?php echo $this->Form->file('OfficePhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficePhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficePhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="OfficePhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('OfficePhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficePhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficePhoto'][$num]['caption'][0]); ?></p>
<?php } ?>
								</div>
							</div>
						</div>
						<div>
<?php $num = 4; ?>
							<?php echo $this->Form->hidden('OfficePhoto.' . $num . '.use_point', array('value'=>'Sub')); ?>
							<div>
								<?php echo $this->Form->file('OfficePhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficePhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficePhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="OfficePhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('OfficePhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficePhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficePhoto'][$num]['caption'][0]); ?></p>
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
							<?php echo $this->Form->hidden('OfficePhoto.' . $num . '.use_point', array('value'=>'SubSub')); ?>
							<div>
								<?php echo $this->Form->file('OfficePhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficePhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficePhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="OfficePhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('OfficePhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficePhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficePhoto'][$num]['caption'][0]); ?></p>
<?php } ?>
								</div>
							</div>
						</div>
						<div class="input-section">
<?php $num = 6; ?>
							<?php echo $this->Form->hidden('OfficePhoto.' . $num . '.use_point', array('value'=>'SubSub')); ?>
							<div>
								<?php echo $this->Form->file('OfficePhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficePhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficePhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="OfficePhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('OfficePhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficePhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficePhoto'][$num]['caption'][0]); ?></p>
<?php } ?>
								</div>
							</div>
						</div>
						<div class="input-section">
<?php $num = 7; ?>
							<?php echo $this->Form->hidden('OfficePhoto.' . $num . '.use_point', array('value'=>'SubSub')); ?>
							<div>
								<?php echo $this->Form->file('OfficePhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficePhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficePhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="OfficePhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('OfficePhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficePhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficePhoto'][$num]['caption'][0]); ?></p>
<?php } ?>
								</div>
							</div>
						</div>
						<div class="input-section">
<?php $num = 8; ?>
							<?php echo $this->Form->hidden('OfficePhoto.' . $num . '.use_point', array('value'=>'SubSub')); ?>
							<div>
								<?php echo $this->Form->file('OfficePhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficePhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficePhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="OfficePhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('OfficePhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficePhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficePhoto'][$num]['caption'][0]); ?></p>
<?php } ?>
								</div>
							</div>
						</div>
						<div class="input-section">
<?php $num = 9; ?>
							<?php echo $this->Form->hidden('OfficePhoto.' . $num . '.use_point', array('value'=>'SubSub')); ?>
							<div>
								<?php echo $this->Form->file('OfficePhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficePhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficePhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="OfficePhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('OfficePhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficePhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficePhoto'][$num]['caption'][0]); ?></p>
<?php } ?>
								</div>
							</div>
						</div>
						<div>
<?php $num = 10; ?>
							<?php echo $this->Form->hidden('OfficePhoto.' . $num . '.use_point', array('value'=>'SubSub')); ?>
							<div>
								<?php echo $this->Form->file('OfficePhoto.' . $num . '.path', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficePhoto'][$num]['path'][0]);?>
<?php if ($err) { ?>
								<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficePhoto'][$num]['path'][0]); ?></p>
<?php } ?>
							</div>
							<div>
								<label class="label-caption" for="OfficePhoto<?php echo $num; ?>Caption"><?php __h('キャプション'); ?></label>
								<div class="controls-caption">
									<?php echo $this->Form->text('OfficePhoto.' . $num . '.caption', array('class'=>'span5')); ?>
<?php $err = isset($validErrors['OfficePhoto'][$num]['caption'][0]);?>
<?php if ($err) { ?>
									<p class="alert alert-error alert_valid">※<?php __h($validErrors['OfficePhoto'][$num]['caption'][0]); ?></p>
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
	<?php echo $this->Form->end();?>
</div>
