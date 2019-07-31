<link rel="stylesheet" type="text/css" media="all" href="<?php echo $this->webroot; ?>common/css/factory-map.css" />
<script type="text/javascript" src="<?php echo $this->webroot; ?>common/js/areamap.js"></script>
<script src="<?php echo $this->webroot; ?>common/js/jquery.searchcontrol.js" type="text/javascript" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>common/js/list.js"></script>

		<!-- topicpath/ -->
		<ul id="topicpath">
			<li class="home"><a href="<?php echo $this->webroot; ?>">TOP</a></li>
			<li><a href="<?php echo $this->webroot; ?>factory/area/">工場・工業用地を探す ベトナム全域工業団地から探す</a></li>
			<li><a href="<?php echo $this->webroot; ?>factory/area/central/">中部から探す</a></li>
			<li><?php echo h($factoryArea['FactoryArea']['name']); ?></li>
		</ul>
		<!-- /topicpath -->

		<!-- search_header/ -->
		<div class="search_header clearfix">
			<h1><img src="<?php echo $this->webroot; ?>common/images/search/factory_header_ttl_central.png" width="730" height="40" alt="ベトナムの工業地帯・工業団地一覧" /></h1>
		</div>
		<!-- /search_header -->

		<!-- search_area/ -->
		<p class="search_area_read">ベトナムの工場・工業団地物件を検索したいエリアをクリックして下さい。</p>
		<div id="map-vietnam" class="central">
<p class="map"><img src="<?php echo $this->webroot; ?>common/images/search/factory_index_map02_central.png" alt="" width="700" height="552" /></p>

<!-- area-central -->
<p class="area19 area-link"><a href="<?php echo $this->webroot; ?>factory/area/central/list/9">Da Nang</a></p>

<!-- zone01 -->
<p class="num01 factory-marker"><a href="<?php echo $this->webroot; ?>factory/area/detail/83/"><img src="<?php echo $this->webroot; ?>common/images/search/factory_icon-zone01.png" alt="リエンチエウ工業団地" /></a></p>
<p class="num02 factory-marker"><a href="<?php echo $this->webroot; ?>factory/area/detail/84/"><img src="<?php echo $this->webroot; ?>common/images/search/factory_icon-zone01.png" alt="新ホアカイン工業団地" /></a></p>
<p class="num03 factory-marker"><a href="<?php echo $this->webroot; ?>factory/area/detail/85/"><img src="<?php echo $this->webroot; ?>common/images/search/factory_icon-zone01.png" alt="ホアカイン工業団地" /></a></p>
<p class="num04 factory-marker"><a href="<?php echo $this->webroot; ?>factory/area/detail/86/"><img src="<?php echo $this->webroot; ?>common/images/search/factory_icon-zone01.png" alt="ダナン水産物サービス工業団地" /></a></p>
<p class="num05 factory-marker"><a href="<?php echo $this->webroot; ?>factory/area/detail/87/"><img src="<?php echo $this->webroot; ?>common/images/search/factory_icon-zone01.png" alt="ダナン工業団地" /></a></p>
<p class="num06 factory-marker"><a href="<?php echo $this->webroot; ?>factory/area/detail/88/"><img src="<?php echo $this->webroot; ?>common/images/search/factory_icon-zone01.png" alt="ホアカム工業団地" /></a></p>
</div>


<div id="balloon" class="tooltip">
<a id="balloon-inner" href=""></a>
</div>
<p>&nbsp;</p>
<div class="detail_read_ttl clearfix"><h2 class="detail_read_ttl_txt"><?php echo h($factoryArea['FactoryArea']['name']); ?> の物件一覧</h2></div>

		<!-- /search_area -->
		<?php echo $this->Form->create('FactoryBuilding', array('url' => '/factory/area/central/list/' . $factoryArea['FactoryArea']['id'], 'id' => 'U_FactoryBuildingAreaListForm')); ?>
			<!-- search_nav/ -->
			<div class="search_nav clearfix">
				<h4 class="imgbtn"><img src="<?php echo $this->webroot; ?>common/images/search/search_nav_btn01.png" width="230" height="48" alt="条件を絞り込んで検索" /></h4>
				<div class="search_nav_detail">
					<ul class="clearfix">
						<li>
							<img src="<?php echo $this->webroot; ?>common/images/search/search_nav_txt01.png" width="51" height="12" alt="並び替え" />
							<?php echo $this->Form->select('sort', Configure::read('SearchList.Sort'), array('empty' => false, 'id' => 'U_FactoryBuildingSort')); ?>
						</li>
						<li>
							<img src="<?php echo $this->webroot; ?>common/images/search/search_nav_txt02.png" width="52" height="12" alt="表示件数" />
							<?php echo $this->Form->select('limit', Configure::read('SearchList.Limit'), array('empty' => false, 'id' => 'U_FactoryBuildingLimit')); ?>
						</li>
					</ul>
				</div>
			</div>
			<!-- /search_nav -->

			<!-- search_nav_table/ -->
			<div class="search_nav_table">
				<table summary="条件を絞り込んで検索">
					<tr>
						<th>工業団地内外</th>
						<td>
							<ul class="search_nav_table_li1 clearfix">
<?php foreach ($industrialParks as $value => $name) { ?>
<?php     $checked = ''; ?>
<?php     if (isset($this->request->data['FactoryBuilding']['industrial_park_id']) && in_array($value, $this->request->data['FactoryBuilding']['industrial_park_id'])) { ?>
<?php         $checked = 'checked="checked"'; ?>
<?php     } ?>
								<li>
									<label><input type="checkbox" id="U_FactoryBuildingIndustrialParkId<?php echo $value; ?>" name="data[FactoryBuilding][industrial_park_id][]" value="<?php echo $value; ?>" <?php echo $checked; ?> /><?php echo $name; ?></label>
								</li>
<?php } ?>
							</ul>
						</td>
					</tr>
					<tr>
						<th>物件タイプ</th>
						<td>
							<ul class="search_nav_table_li1 clearfix">
<?php $checked = ''; ?>
<?php if (empty($this->request->data['FactoryBuilding']['factory_sub_category_id'])) { ?>
<?php     $checked = 'checked="checked"'; ?>
<?php } ?>
								<li><label><input type="radio" id="U_FactoryBuildingFactoryCategoryId0" name="data[FactoryBuilding][factory_sub_category_id]" value="" <?php echo $checked; ?> class="u_cat_types" />すべての物件タイプ</label></li>
<?php $checked = ''; ?>
<?php if (!empty($this->request->data['FactoryBuilding']['factory_sub_category_id']) && $this->request->data['FactoryBuilding']['factory_sub_category_id'] == '2,4') { ?>
<?php     $checked = 'checked="checked"'; ?>
<?php } ?>
								<li><label><input type="radio" id="U_FactoryBuildingFactorySubCategoryId24" name="data[FactoryBuilding][factory_sub_category_id]" value="2,4" <?php echo $checked; ?> class="u_cat_types" />貸し工場/貸し倉庫</label></li>
<?php $checked = ''; ?>
<?php if (!empty($this->request->data['FactoryBuilding']['factory_sub_category_id']) && $this->request->data['FactoryBuilding']['factory_sub_category_id'] == '1,3') { ?>
<?php     $checked = 'checked="checked"'; ?>
<?php } ?>
								<li><label><input type="radio" id="U_FactoryBuildingFactorySubCategoryId13" name="data[FactoryBuilding][factory_sub_category_id]" value="1,3" <?php echo $checked; ?> class="u_cat_types" />売り工場/売り倉庫</label></li>
<?php $checked = ''; ?>
<?php if (!empty($this->request->data['FactoryBuilding']['factory_sub_category_id']) && $this->request->data['FactoryBuilding']['factory_sub_category_id'] == '5') { ?>
<?php     $checked = 'checked="checked"'; ?>
<?php } ?>
								<li><label><input type="radio" id="U_FactoryBuildingFactorySubCategoryId5" name="data[FactoryBuilding][factory_sub_category_id]" value="5" <?php echo $checked; ?> class="u_cat_types" />売り土地</label></li>
							</ul>
						</td>
					</tr>
					<tr class="u_switch disp_U_FactoryBuildingFactorySubCategoryId24">
						<th>ご予算</th>
						<td>
							<?php echo $this->Form->select('price', Configure::read('Price.FactoryBuilding.2,4'), array('empty' => '選択してください', 'id' => 'U_FactoryBuildingPrice24')); ?>&nbsp;VND/ライ（1ライ=1600m&sup2;）
						</td>
					</tr>
					<tr class="u_switch disp_U_FactoryBuildingFactorySubCategoryId13">
						<th>ご予算</th>
						<td>
							<?php echo $this->Form->select('price', Configure::read('Price.FactoryBuilding.1,3'), array('empty' => '選択してください', 'id' => 'U_FactoryBuildingPrice13')); ?>&nbsp;VND
						</td>
					</tr>
					<tr class="u_switch disp_U_FactoryBuildingFactorySubCategoryId5">
						<th>ご予算</th>
						<td>
							<?php echo $this->Form->select('price', Configure::read('Price.FactoryBuilding.5'), array('empty' => '選択してください', 'id' => 'U_FactoryBuildingPrice5')); ?>&nbsp;VND/m&sup2;
						</td>
					</tr>
					<tr class="u_switch disp_U_FactoryBuildingFactorySubCategoryId24 disp_U_FactoryBuildingFactorySubCategoryId13">
						<th>床面積</th>
						<td>
							<?php echo $this->Form->select('floor_space', Configure::read('FloorSpace.FactoryBuilding.1,2,3,4'), array('empty' => '選択してください', 'id' => 'U_FactoryBuildingFloorSpace1234')); ?>&nbsp;m&sup2;
						</td>
					</tr>
					<tr class="u_switch disp_U_FactoryBuildingFactorySubCategoryId5">
						<th>敷地面積</th>
						<td>
							<?php echo $this->Form->select('site_area', Configure::read('FloorSpace.FactoryBuilding.5'), array('empty' => '選択してください', 'id' => 'U_FactoryBuildingSiteArea5')); ?>&nbsp;ライ（1ライ=1600m&sup2;）
						</td>
					</tr>
					<tr>
						<th>その他条件</th>
						<td>
							<ul class="search_nav_table_li3 clearfix">
<?php foreach(Configure::read('Facility.FactoryBuilding') as $key => $val) { ?>
<?php     $checked = ''; ?>
<?php     if (isset($this->request->data['FactoryBuilding'][$key]) && $this->request->data['FactoryBuilding'][$key] == $key) { ?>
<?php         $checked = 'checked="checked"'; ?>
<?php     } ?>
								<li><label><input type="checkbox" id="U_FactoryBuilding<?php echo $key; ?>" name="data[FactoryBuilding][<?php echo $key; ?>]" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $val; ?></label></li>
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
            'controller' => 'factory',
            'action'     => 'area/central/list/' . $factoryArea['FactoryArea']['id'],
        )
    ));
?>
<?php echo $this->element('paging'); ?>

<!-- search_column/ -->
<div class="main" id="factory-list">
<table border="0" cellspacing="0" cellpadding="0">
<?php foreach ($factoryBuildings as $factoryBuilding) { ?>
<tr>
<td class="type"><img src="<?php echo $this->webroot; ?>common/images/search/search_factory_list_ico0<?php echo $factoryBuilding['FactoryBuilding']['factory_category_id']; ?>.png" alt="<?php echo h($factoryCategories[$factoryBuilding['FactoryBuilding']['factory_category_id']]); ?>" width="60" height="20" /></td>
<td><?php echo h($factoryBuilding['FactoryBuilding']['name']); ?></td>
<td class="btn imgbtn"><a href="<?php echo $this->webroot; ?>factory/area/detail/<?php echo h($factoryBuilding['FactoryBuilding']['id']); ?>?area=central"><img src="<?php echo $this->webroot; ?>common/images/search/search_factory_list_btn.png" alt="物件の詳細" width="85" height="20" /></a></td>
</tr>
<?php }  ?>
</table>
</div><!-- / #factory-list .main -->
<?php if (count($factoryBuildings) == 0) { ?>
	<div class="no_data" style="margn: 10px;"><p>お探しの物件は、見つかりませんでした。</p></div>
<?php }  ?>
<!-- /search_column -->

<?php echo $this->element('paging'); ?>

		<?php echo $this->Form->create('FactoryBuilding', array('url' => '/factory/area/central/list/' . $factoryArea['FactoryArea']['id'], 'id' => 'B_FactoryBuildingAreaListForm')); ?>
			<!-- search_nav/ -->
			<div class="search_nav clearfix">
				<h4 class="imgbtn"><img src="<?php echo $this->webroot; ?>common/images/search/search_nav_btn01.png" width="230" height="48" alt="条件を絞り込んで検索" /></h4>
				<div class="search_nav_detail">
					<ul class="clearfix">
						<li>
							<img src="<?php echo $this->webroot; ?>common/images/search/search_nav_txt01.png" width="51" height="12" alt="並び替え" />
							<?php echo $this->Form->select('sort', Configure::read('SearchList.Sort'), array('empty' => false, 'id' => 'B_FactoryBuildingSort')); ?>
						</li>
						<li>
							<img src="<?php echo $this->webroot; ?>common/images/search/search_nav_txt02.png" width="52" height="12" alt="表示件数" />
							<?php echo $this->Form->select('limit', Configure::read('SearchList.Limit'), array('empty' => false, 'id' => 'B_FactoryBuildingLimit')); ?>
						</li>
					</ul>
				</div>
			</div>
			<!-- /search_nav -->

			<!-- search_nav_table/ -->
			<div class="search_nav_table">
				<table summary="条件を絞り込んで検索">
					<tr>
						<th>工業団地内外</th>
						<td>
							<ul class="search_nav_table_li1 clearfix">
<?php foreach ($industrialParks as $value => $name) { ?>
<?php     $checked = ''; ?>
<?php     if (isset($this->request->data['FactoryBuilding']['industrial_park_id']) && in_array($value, $this->request->data['FactoryBuilding']['industrial_park_id'])) { ?>
<?php         $checked = 'checked="checked"'; ?>
<?php     } ?>
								<li>
									<label><input type="checkbox" id="B_FactoryBuildingIndustrialParkId<?php echo $value; ?>" name="data[FactoryBuilding][industrial_park_id][]" value="<?php echo $value; ?>" <?php echo $checked; ?> /><?php echo $name; ?></label>
								</li>
<?php } ?>
							</ul>
						</td>
					</tr>
					<tr>
						<th>物件タイプ</th>
						<td>
							<ul class="search_nav_table_li1 clearfix">
<?php $checked = ''; ?>
<?php if (empty($this->request->data['FactoryBuilding']['factory_sub_category_id'])) { ?>
<?php     $checked = 'checked="checked"'; ?>
<?php } ?>
								<li><label><input type="radio" id="B_FactoryBuildingFactoryCategoryId0" name="data[FactoryBuilding][factory_sub_category_id]" value="" <?php echo $checked; ?> class="b_cat_types" />すべての物件タイプ</label></li>
<?php $checked = ''; ?>
<?php if (!empty($this->request->data['FactoryBuilding']['factory_sub_category_id']) && $this->request->data['FactoryBuilding']['factory_sub_category_id'] == '2,4') { ?>
<?php     $checked = 'checked="checked"'; ?>
<?php } ?>
								<li><label><input type="radio" id="B_FactoryBuildingFactorySubCategoryId24" name="data[FactoryBuilding][factory_sub_category_id]" value="2,4" <?php echo $checked; ?> class="b_cat_types" />貸し工場/貸し倉庫</label></li>
<?php $checked = ''; ?>
<?php if (!empty($this->request->data['FactoryBuilding']['factory_sub_category_id']) && $this->request->data['FactoryBuilding']['factory_sub_category_id'] == '1,3') { ?>
<?php     $checked = 'checked="checked"'; ?>
<?php } ?>
								<li><label><input type="radio" id="B_FactoryBuildingFactorySubCategoryId13" name="data[FactoryBuilding][factory_sub_category_id]" value="1,3" <?php echo $checked; ?> class="b_cat_types" />売り工場/売り倉庫</label></li>
<?php $checked = ''; ?>
<?php if (!empty($this->request->data['FactoryBuilding']['factory_sub_category_id']) && $this->request->data['FactoryBuilding']['factory_sub_category_id'] == '5') { ?>
<?php     $checked = 'checked="checked"'; ?>
<?php } ?>
								<li><label><input type="radio" id="B_FactoryBuildingFactorySubCategoryId5" name="data[FactoryBuilding][factory_sub_category_id]" value="5" <?php echo $checked; ?> class="b_cat_types" />売り土地</label></li>
							</ul>
						</td>
					</tr>
					<tr class="b_switch disp_B_FactoryBuildingFactorySubCategoryId24">
						<th>ご予算</th>
						<td>
							<?php echo $this->Form->select('price', Configure::read('Price.FactoryBuilding.2,4'), array('empty' => '選択してください', 'id' => 'B_FactoryBuildingPrice24')); ?>&nbsp;VND/m&sup2;
						</td>
					</tr>
					<tr class="b_switch disp_B_FactoryBuildingFactorySubCategoryId13">
						<th>ご予算</th>
						<td>
							<?php echo $this->Form->select('price', Configure::read('Price.FactoryBuilding.1,3'), array('empty' => '選択してください', 'id' => 'B_FactoryBuildingPrice13')); ?>&nbsp;VND
						</td>
					</tr>
					<tr class="b_switch disp_B_FactoryBuildingFactorySubCategoryId5">
						<th>ご予算</th>
						<td>
							<?php echo $this->Form->select('price', Configure::read('Price.FactoryBuilding.5'), array('empty' => '選択してください', 'id' => 'B_FactoryBuildingPrice5')); ?>&nbsp;VND
						</td>
					</tr>
					<tr class="b_switch disp_B_FactoryBuildingFactorySubCategoryId24 disp_B_FactoryBuildingFactorySubCategoryId13">
						<th>床面積</th>
						<td>
							<?php echo $this->Form->select('floor_space', Configure::read('FloorSpace.FactoryBuilding.1,2,3,4'), array('empty' => '選択してください', 'id' => 'B_FactoryBuildingFloorSpace1234')); ?>&nbsp;m&sup2;
						</td>
					</tr>
					<tr class="b_switch disp_B_FactoryBuildingFactorySubCategoryId5">
						<th>敷地面積</th>
						<td>
							<?php echo $this->Form->select('site_area', Configure::read('FloorSpace.FactoryBuilding.5'), array('empty' => '選択してください', 'id' => 'B_FactoryBuildingSiteArea5')); ?>&nbsp;ライ
						</td>
					</tr>
					<tr>
						<th>その他条件</th>
						<td>
							<ul class="search_nav_table_li3 clearfix">
<?php foreach(Configure::read('Facility.FactoryBuilding') as $key => $val) { ?>
<?php     $checked = ''; ?>
<?php     if (isset($this->request->data['FactoryBuilding'][$key]) && $this->request->data['FactoryBuilding'][$key] == $key) { ?>
<?php         $checked = 'checked="checked"'; ?>
<?php     } ?>
								<li><label><input type="checkbox" id="B_FactoryBuilding<?php echo $key; ?>" name="data[FactoryBuilding][<?php echo $key; ?>]" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $val; ?></label></li>
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