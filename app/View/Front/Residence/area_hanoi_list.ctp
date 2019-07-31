<script src="http://maps.google.com/maps/api/js?v=3&amp;sensor=false" type="text/javascript" charset="UTF-8"></script>
<script src="<?php echo $this->webroot; ?>common/js/jquery.viewareamap.js" type="text/javascript" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>common/js/list.js"></script>

		<!-- topicpath/ -->
		<ul id="topicpath">
			<li class="home"><a href="<?php echo $this->webroot; ?>">TOP</a></li>
			<li><a href="<?php echo $this->webroot; ?>residence/area/">住まいを探す エリアから探す</a></li>
			<li><a href="<?php echo $this->webroot; ?>residence/area/hanoi/">ハノイで探す</a></li>
			<li><?php echo h($area['Area']['name']); ?>の物件一覧</li>
		</ul>
		<!-- /topicpath -->

		<!-- search_header/ -->
		<div class="search_header clearfix">
			<h2><img src="<?php echo $this->webroot; ?>common/images/search/area_header_ttl.png" width="200" height="40" alt="エリアから探す" /></h2>
			<ul class="imgbtn clearfix">
				<li><a href="<?php echo $this->webroot; ?>office/area/hanoi/"><img src="<?php echo $this->webroot; ?>common/images/search/header_nav01.png" width="160" height="40" alt="事務所を探す" /></a></li>
				<li><a href="<?php echo $this->webroot; ?>residence/area/hanoi/"><img src="<?php echo $this->webroot; ?>common/images/search/header_nav02_on.png" width="160" height="40" alt="住まいを探す" /></a></li>
			</ul>
		</div>
		<!-- /search_header -->

		<!-- search_list/ -->
		<h3 class="search_list_ttl"><?php echo h($area['Area']['name']); ?>の物件一覧</h3>

		<!-- search_list_map_nav/ -->
		<div id="map_canvas" class="search_list_map"></div>
		<?php echo $this->Form->hidden('lat', array('id'=>'map_lat', 'value'=>$area['Area']['lat'])); ?>
		<?php echo $this->Form->hidden('lng', array('id'=>'map_lng', 'value'=>$area['Area']['lng'])); ?>
		<?php $area_arr = array( 'ラチャダー・ラップラオ', 'オンヌット・バンナー', 'ラマ３' );
			$f_flg = false;
			foreach ( $area_arr as $value ) {
				if ( strpos($area['Area']['name'], $value) !== false ) {
		 			$f_flg = true;
					break;
				}
			}
			if ( $f_flg ) {
	 			echo $this->Form->hidden('zoom', array('id'=>'map_zoom', 'value'=>'14'));
			} else {
	 			echo $this->Form->hidden('zoom', array('id'=>'map_zoom', 'value'=>'16'));
			}
		 ?>
		<?php echo $this->Form->hidden('icon_path', array('id'=>'icon_path', 'value'=>$this->webroot . 'common/images/search/map/')); ?>
		<?php echo $this->Form->hidden('detail_url', array('id'=>'detail_url', 'value'=>$this->webroot . 'residence/area/detail/')); ?>
		<?php echo $this->Form->hidden('station_url', array('id'=>'station_url', 'value'=>$this->webroot . 'residence/station/list/')); ?>
		<?php echo $this->Form->hidden('image_path', array('id'=>'image_path', 'value'=>$this->webroot . 'upload/ResidenceBuildings/')); ?>
		<?php echo $this->Form->hidden('xml_url', array('id'=>'xml_url', 'value'=>$this->webroot . 'map/residence/')); ?>

		<dl class="search_list_map_nav clearfix">
			<dt><img src="<?php echo $this->webroot; ?>common/images/search/list_map_nav_ttl.png" width="68" height="46" alt="アイコン表示" /></dt>
			<dd>
				<ul class="clearfix">
					<li class="search_list_map_nav01">
						<label for="list_map_nav01"><?php echo $this->Form->checkbox('list_map_nav01', array('value' => '1', 'class' => 'list_map_nav', 'checked' => true)); ?><img src="<?php echo $this->webroot; ?>common/images/search/list_map_nav_txt01.png" width="102" height="29" alt="アパート・マンション" /></label>
					</li>
					<li class="search_list_map_nav02">
						<label for="list_map_nav02"><?php echo $this->Form->checkbox('list_map_nav02', array('value' => '2', 'class' => 'list_map_nav', 'checked' => true)); ?><img src="<?php echo $this->webroot; ?>common/images/search/list_map_nav_txt02.png" width="76" height="29" alt="コンドミニアム" /></label>
					</li>
					<li class="search_list_map_nav03">
						<label for="list_map_nav03"><?php echo $this->Form->checkbox('list_map_nav03', array('value' => '3', 'class' => 'list_map_nav', 'checked' => true)); ?><img src="<?php echo $this->webroot; ?>common/images/search/list_map_nav_txt03.png" width="89" height="29" alt="サービスアパート" /></label>
					</li>
					<li class="search_list_map_nav04">
						<label for="list_map_nav04"><?php echo $this->Form->checkbox('list_map_nav04', array('value' => '4', 'class' => 'list_map_nav', 'checked' => true)); ?><img src="<?php echo $this->webroot; ?>common/images/search/list_map_nav_txt04.png" width="107" height="29" alt="タウンハウス・一軒家" /></label>
					</li>
				</ul>
			</dd>
		</dl>
		<!-- /search_list_map_nav -->

		<?php echo $this->Form->create('ResidenceBuilding', array('url' => '/residence/area/hanoi/list/' . $area['Area']['id'], 'id' => 'U_ResidenceBuildingAreaListForm')); ?>
			<!-- search_nav/ -->
			<div class="search_nav clearfix">
				<h4 class="imgbtn"><img src="<?php echo $this->webroot; ?>common/images/search/search_nav_btn01.png" width="230" height="48" alt="条件を絞り込んで検索" /></h4>
				<div class="search_nav_detail">
					<ul class="clearfix">
						<li>
							<img src="<?php echo $this->webroot; ?>common/images/search/search_nav_txt01.png" width="51" height="12" alt="並び替え" />
							<?php echo $this->Form->select('sort', Configure::read('SearchList.Sort'), array('empty' => false, 'id' => 'U_ResidenceBuildingSort')); ?>
						</li>
						<li>
							<img src="<?php echo $this->webroot; ?>common/images/search/search_nav_txt02.png" width="52" height="12" alt="表示件数" />
							<?php echo $this->Form->select('limit', Configure::read('SearchList.Limit'), array('empty' => false, 'id' => 'U_ResidenceBuildingLimit')); ?>
						</li>
					</ul>
				</div>
			</div>
			<!-- /search_nav -->

			<!-- search_nav_table/ -->
			<div class="search_nav_table">
				<table summary="条件を絞り込んで検索">
					<tr>
						<th>物件タイプ</th>
						<td>
							<ul class="search_nav_table_li1 clearfix">
<?php $checked = ''; ?>
<?php if (empty($this->request->data['ResidenceBuilding']['residence_category_id'])) { ?>
<?php     $checked = 'checked="checked"'; ?>
<?php } ?>
								<li><label><input type="radio" id="U_ResidenceBuildingResidenceCategoryId0" name="data[ResidenceBuilding][residence_category_id]" value="" <?php echo $checked; ?> />すべての物件タイプ</label></li>
<?php foreach($residenceCategories as $key => $val) { ?>
<?php     $checked = ''; ?>
<?php     if (isset($this->request->data['ResidenceBuilding']['residence_category_id']) && $this->request->data['ResidenceBuilding']['residence_category_id'] == $key) { ?>
<?php         $checked = 'checked="checked"'; ?>
<?php     } ?>
								<li><label><input type="radio" id="U_ResidenceBuildingResidenceCategoryId<?php echo $key; ?>" name="data[ResidenceBuilding][residence_category_id]" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $val; ?></label></li>
<?php } ?>
							</ul>
						</td>
					</tr>
					<tr>
						<th>ご予算</th>
						<td>
							<?php echo $this->Form->select('price', Configure::read('Price.ResidenceBuilding.All'), array('empty' => '選択してください', 'id' => 'U_ResidenceBuildingPrice')); ?>&nbsp;VND
						</td>
					</tr>
					<tr>
						<th>広さ</th>
						<td>
							<?php echo $this->Form->select('floor_space', Configure::read('FloorSpace.ResidenceBuilding.All'), array('empty' => '選択してください', 'id' => 'U_ResidenceBuildingFloorSpace')); ?>&nbsp;m&sup2;
						</td>
					</tr>
					<tr>
						<th>間取り</th>
						<td>
							<ul class="search_nav_table_li2 clearfix">
<?php foreach($residenceLayouts as $key => $val) { ?>
<?php     $checked = ''; ?>
<?php     if (isset($this->request->data['ResidenceBuilding']['residence_layout_id']) && in_array($key, $this->request->data['ResidenceBuilding']['residence_layout_id'])) { ?>
<?php         $checked = 'checked="checked"'; ?>
<?php     } ?>
								<li><label><input type="checkbox" id="U_ResidenceBuildingResidenceLayoutId<?php echo $key; ?>" name="data[ResidenceBuilding][residence_layout_id][]" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $val; ?></label></li>
<?php } ?>
							</ul>
						</td>
					</tr>
					<tr>
						<th>その他条件</th>
						<td>
							<ul class="search_nav_table_li3 clearfix">
<?php foreach(Configure::read('Facility.Residence') as $key => $val) { ?>
<?php     $checked = ''; ?>
<?php     if (isset($this->request->data['ResidenceBuilding'][$key]) && $this->request->data['ResidenceBuilding'][$key] == $key) { ?>
<?php         $checked = 'checked="checked"'; ?>
<?php     } ?>
								<li><label><input type="checkbox" id="U_ResidenceBuilding<?php echo $key; ?>" name="data[ResidenceBuilding][<?php echo $key; ?>]" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $val; ?></label></li>
<?php } ?>
							</ul>
						</td>
					</tr>
				</table>
				<div class="imgbtn"><input type="image" name="submit" src="<?php echo $this->webroot; ?>common/images/search/search_nav_btn02.png" alt="この条件で絞り込む" /></div>
			</div>
			<!-- /search_nav_table -->
		<?php echo $this->Form->end(); ?>

<?php
    $this->Paginator->options(array(
        'url' => array(
            'controller' => 'residence',
            'action'     => 'area/hanoi/list/' . $area['Area']['id'],
        )
    ));
?>
<?php echo $this->element('paging'); ?>

		<!-- search_column/ -->
<?php foreach ($residenceBuildings as $residenceBuilding) { ?>

		<div class="search_column_ttl clearfix">
			<h3><a href="<?php echo $this->webroot; ?>residence/area/detail/<?php echo h($residenceBuilding['ResidenceBuilding']['id']); ?>?area=hanoi"><?php echo h($residenceBuilding['ResidenceBuilding']['name']); ?></a></h3>
			<p>
				<img src="<?php echo $this->webroot; ?>common/images/search/search_column_ttl_residence<?php echo $residenceBuilding['ResidenceBuilding']['residence_category_id']; ?>.png" width="110" height="20" alt="<?php echo h($residenceCategories[$residenceBuilding['ResidenceBuilding']['residence_category_id']]); ?>" />
			</p>
		</div>

		<div class="search_column_data clearfix">
			<ul class="clearfix">
<?php     if (isset($residenceBuilding['ResidenceBuilding']['newly']) && !empty($residenceBuilding['ResidenceBuilding']['newly'])) { ?>
				<li><img src="<?php echo $this->webroot; ?>common/images/search/search_column_icon_new.png" width="50" height="17" alt="NEW" /></li>
<?php     } ?>
<?php     if (isset($residenceBuilding['ResidenceBuilding']['recommend']) && !empty($residenceBuilding['ResidenceBuilding']['recommend'])) { ?>
				<li><img src="<?php echo $this->webroot; ?>common/images/search/search_column_icon_recommend.png" width="50" height="17" alt="おすすめ" /></li>
<?php     } ?>
<?php     if (isset($residenceBuilding['ResidenceBuilding']['popluar']) && !empty($residenceBuilding['ResidenceBuilding']['popluar'])) { ?>
				<li><img src="<?php echo $this->webroot; ?>common/images/search/search_column_icon_popular.png" width="50" height="17" alt="人気" /></li>
<?php     } ?>
<?php     if (isset($residenceBuilding['ResidenceBuilding']['nearby']) && !empty($residenceBuilding['ResidenceBuilding']['nearby'])) { ?>
				<li><img src="<?php echo $this->webroot; ?>common/images/search/search_column_icon_station.png" width="50" height="17" alt="駅近" /></li>
<?php     } ?>
			</ul>
			<dl>
				<dt><img src="<?php echo $this->webroot; ?>common/images/search/search_column_icon_update.png" width="45" height="13" alt="UPDATE" /></dt>
				<dd><?php echo date('Y/m/d H:i', strtotime($residenceBuilding['ResidenceBuilding']['modified'])); ?></dd>
			</dl>
		</div>
		<div class="search_column_article clearfix">
			<div class="search_column_aside">
				<div>
					<p>
						<span><img src="<?php echo $this->webroot; ?>common/images/spacer.gif" alt="" /></span>
<?php     if (isset($residenceBuilding['ResidencePhoto']['0']['path']) && !empty($residenceBuilding['ResidencePhoto']['0']['path'])) { ?>
						<img src="<?php echo $this->webroot; ?>upload/ResidenceBuildings/tmb_list_<?php echo h($residenceBuilding['ResidencePhoto']['0']['path']); ?>" alt="<?php echo h($residenceBuilding['ResidencePhoto']['0']['caption']); ?>" />
<?php     } else { ?>
						<img src="<?php echo $this->webroot; ?>common/images/noimage-list.png" alt="NoImage" />
<?php     } ?>
					</p>
				</div>
<?php     if (isset($residenceBuilding['ResidencePhoto']['1']['path']) && !empty($residenceBuilding['ResidencePhoto']['1']['path'])) { ?>
				<div>
					<p>
						<span><img src="<?php echo $this->webroot; ?>common/images/spacer.gif" alt="" /></span>
						<img src="<?php echo $this->webroot; ?>upload/ResidenceBuildings/tmb_list_<?php echo h($residenceBuilding['ResidencePhoto']['1']['path']); ?>" alt="<?php echo h($residenceBuilding['ResidencePhoto']['1']['caption']); ?>" />
					</p>
				</div>
<?php     } ?>
			</div>
			<div class="search_column_section">
				<table summary="物件詳細">
					<tr>
						<th>アクセス<span>Access</span></th>
						<td><?php echo nl2br(h($residenceBuilding['ResidenceBuilding']['access'])); ?></td>
					</tr>
					<tr>
						<th>エリア<span>Area</span></th>
						<td><?php echo h($area['Area']['name']); ?></td>
					</tr>
					<tr>
						<th>完成年<span>Completion year</span></th>
						<td>
<?php     if (isset($residenceBuilding['ResidenceBuilding']['complated']) && !empty($residenceBuilding['ResidenceBuilding']['complated'])) { ?>
							<?php echo h($residenceBuilding['ResidenceBuilding']['complated']); ?>年
<?php     } else { ?>
							&nbsp;
<?php     } ?>
						</td>
					</tr>
					<tr>
						<th>総階数<span>Total floors</span></th>
						<td>
<?php     if (isset($residenceBuilding['ResidenceBuilding']['total_floor']) && !empty($residenceBuilding['ResidenceBuilding']['total_floor'])) { ?>
							<?php echo h($residenceBuilding['ResidenceBuilding']['total_floor']); ?>階
<?php     } else { ?>
							&nbsp;
<?php     } ?>
						</td>
					</tr>
					<tr>
						<th>部屋数<span>Total rooms</span></th>
						<td>
<?php     if (isset($residenceBuilding['ResidenceBuilding']['total_room']) && !empty($residenceBuilding['ResidenceBuilding']['total_room'])) { ?>
							<?php echo h($residenceBuilding['ResidenceBuilding']['total_room']); ?>室
<?php     } else { ?>
							&nbsp;
<?php     } ?>
						</td>
					</tr>
				</table>
				<ul class="clearfix">
<?php     foreach(Configure::read('Facility.Residence') as $key => $val) { ?>
<?php         if ($residenceBuilding['ResidenceBuilding'][$key] == '1') { ?>
					<li><img src="<?php echo $this->webroot; ?>common/images/search/search_column_li_<?php echo $key; ?>.png" width="110" height="33" alt="<?php echo $val; ?>" /></li>
<?php         } else { ?>
					<li><img src="<?php echo $this->webroot; ?>common/images/search/search_column_li_<?php echo $key; ?>_off.png" width="110" height="33" alt="<?php echo $val; ?>" /></li>
<?php         } ?>

<?php     } ?>
				</ul>
				<p class="imgbtn"><a href="<?php echo $this->webroot; ?>residence/area/detail/<?php echo h($residenceBuilding['ResidenceBuilding']['id']); ?>?area=hanoi"><img src="<?php echo $this->webroot; ?>common/images/search/search_column_btn01.png" width="180" height="30" alt="物件の詳細を見る" /></a></p>
			</div>
		</div>
<?php } ?>
<?php if (count($residenceBuildings) == 0) { ?>
		<div class="no_data" style="margn: 10px;"><p>お探しの物件は、見つかりませんでした。</p></div>
<?php }  ?>
		<!-- /search_column -->

<?php echo $this->element('paging'); ?>

		<?php echo $this->Form->create('ResidenceBuilding', array('url' => '/residence/area/hanoi/list/' . $area['Area']['id'], 'id' => 'B_ResidenceBuildingAreaListForm')); ?>
			<!-- search_nav/ -->
			<div class="search_nav clearfix">
				<h4 class="imgbtn"><img src="<?php echo $this->webroot; ?>common/images/search/search_nav_btn01.png" width="230" height="48" alt="条件を絞り込んで検索" /></h4>
				<div class="search_nav_detail">
					<ul class="clearfix">
						<li>
							<img src="<?php echo $this->webroot; ?>common/images/search/search_nav_txt01.png" width="51" height="12" alt="並び替え" />
							<?php echo $this->Form->select('sort', Configure::read('SearchList.Sort'), array('empty' => false, 'id' => 'B_ResidenceBuildingSort')); ?>
						</li>
						<li>
							<img src="<?php echo $this->webroot; ?>common/images/search/search_nav_txt02.png" width="52" height="12" alt="表示件数" />
							<?php echo $this->Form->select('limit', Configure::read('SearchList.Limit'), array('empty' => false, 'id' => 'B_ResidenceBuildingLimit')); ?>
						</li>
					</ul>
				</div>
			</div>
			<!-- /search_nav -->

			<!-- search_nav_table/ -->
			<div class="search_nav_table">
				<table summary="条件を絞り込んで検索">
					<tr>
						<th>物件タイプ</th>
						<td>
							<ul class="search_nav_table_li1 clearfix">
<?php $checked = ''; ?>
<?php if (empty($this->request->data['ResidenceBuilding']['residence_category_id'])) { ?>
<?php     $checked = 'checked="checked"'; ?>
<?php } ?>
								<li><label><input type="radio" id="B_ResidenceBuildingResidenceCategoryId0" name="data[ResidenceBuilding][residence_category_id]" value="" <?php echo $checked; ?> />すべての物件タイプ</label></li>
<?php foreach($residenceCategories as $key => $val) { ?>
<?php     $checked = ''; ?>
<?php     if (isset($this->request->data['ResidenceBuilding']['residence_category_id']) && $this->request->data['ResidenceBuilding']['residence_category_id'] == $key) { ?>
<?php         $checked = 'checked="checked"'; ?>
<?php     } ?>
								<li><label><input type="radio" id="B_ResidenceBuildingResidenceCategoryId<?php echo $key; ?>" name="data[ResidenceBuilding][residence_category_id]" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $val; ?></label></li>
<?php } ?>
							</ul>
						</td>
					</tr>
					<tr>
						<th>ご予算</th>
						<td>
							<?php echo $this->Form->select('price', Configure::read('Price.ResidenceBuilding.All'), array('empty' => '選択してください', 'id' => 'B_ResidenceBuildingPrice')); ?>&nbsp;VND
						</td>
					</tr>
					<tr>
						<th>広さ</th>
						<td>
							<?php echo $this->Form->select('floor_space', Configure::read('FloorSpace.ResidenceBuilding.All'), array('empty' => '選択してください', 'id' => 'B_ResidenceBuildingFloorSpace')); ?>&nbsp;m&sup2;
						</td>
					</tr>
					<tr>
						<th>間取り</th>
						<td>
							<ul class="search_nav_table_li2 clearfix">
<?php foreach($residenceLayouts as $key => $val) { ?>
<?php     $checked = ''; ?>
<?php     if (isset($this->request->data['ResidenceBuilding']['residence_layout_id']) && in_array($key, $this->request->data['ResidenceBuilding']['residence_layout_id'])) { ?>
<?php         $checked = 'checked="checked"'; ?>
<?php     } ?>
								<li><label><input type="checkbox" id="B_ResidenceBuildingResidenceLayoutId<?php echo $key; ?>" name="data[ResidenceBuilding][residence_layout_id][]" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $val; ?></label></li>
<?php } ?>
							</ul>
						</td>
					</tr>
					<tr>
						<th>その他条件</th>
						<td>
							<ul class="search_nav_table_li3 clearfix">
<?php foreach(Configure::read('Facility.Residence') as $key => $val) { ?>
<?php     $checked = ''; ?>
<?php     if (isset($this->request->data['ResidenceBuilding'][$key]) && $this->request->data['ResidenceBuilding'][$key] == $key) { ?>
<?php         $checked = 'checked="checked"'; ?>
<?php     } ?>
								<li><label><input type="checkbox" id="B_ResidenceBuilding<?php echo $key; ?>" name="data[ResidenceBuilding][<?php echo $key; ?>]" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $val; ?></label></li>
<?php } ?>
							</ul>
						</td>
					</tr>
				</table>
				<div class="imgbtn"><input type="image" name="submit" src="<?php echo $this->webroot; ?>common/images/search/search_nav_btn02.png" alt="この条件で絞り込む" /></div>
			</div>
			<!-- /search_nav_table -->
		<?php echo $this->Form->end(); ?>

		<!-- /search_list -->

		<!-- contents_inquiry/ -->
<?php echo $this->element('section_contact'); ?>
		<!-- /contents_inquiry -->