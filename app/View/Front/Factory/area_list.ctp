<script src="<?php echo $this->webroot; ?>common/js/jquery.viewareamap.js" type="text/javascript" charset="UTF-8"></script>
<script src="<?php echo $this->webroot; ?>common/js/jquery.searchcontrol.js" type="text/javascript" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>common/js/list.js"></script>

	<!-- topicpath/ -->
<ul id="topicpath">
	<li class="home"><a href="<?php echo $this->webroot; ?>">TOP</a></li>
	<li><?php echo $factoryArea['FactoryArea']['name'].' '.__('list-properties'); ?></li>
</ul>
<!-- /topicpath -->

<!-- search_header/ -->
<div class="search_header clearfix">
	<h1 class="title-row title-row-search-content"><?php echo __('factory-search-all-title'); ?></h1>
</div>
<!-- /search_header -->

<!-- search_list/ -->
<h3 class="search_list_ttl"><?php echo h($factoryArea['FactoryArea']['name']); echo " "; echo __('list-properties'); ?></h3>

<!-- factory description/ -->
<div style="margin: 20px 10px;">
<?php echo html_entity_decode($factoryArea['FactoryArea']['note']); ?>
</div>
<!-- search_list_map_nav/ -->
<div id="map_canvas" class="search_list_map"></div>
<?php echo $this->Form->hidden('lat', array('id'=>'map_lat', 'value'=>$factoryArea['FactoryArea']['lat'])); ?>
<?php echo $this->Form->hidden('lng', array('id'=>'map_lng', 'value'=>$factoryArea['FactoryArea']['lng'])); ?>
<?php $area_arr = array( 'BANGKOK', 'SAMUTH PRAKARN', 'PATHUM THANI', 'SAMUTH SAKHON', 'CHACHOENGSAO' );
	$f_flg = false;
	foreach ( $area_arr as $value ) {
		if ( strpos($factoryArea['FactoryArea']['name'], $value) !== false ) {
 			$f_flg = true;
			break;
		}
	}
	if ( $f_flg ) {
			echo $this->Form->hidden('zoom', array('id'=>'map_zoom', 'value'=>'11'));
	} else {
			echo $this->Form->hidden('zoom', array('id'=>'map_zoom', 'value'=>'10'));
	}
 ?>
<?php echo $this->Form->hidden('icon_path', array('id'=>'icon_path', 'value'=>$this->webroot . 'common/images/search/map/')); ?>
<?php echo $this->Form->hidden('detail_url', array('id'=>'detail_url', 'value'=>$this->webroot . 'factory/area/detail/')); ?>
<?php echo $this->Form->hidden('image_path', array('id'=>'image_path', 'value'=>$this->webroot . 'upload/FactoryBuildings/')); ?>
<?php echo $this->Form->hidden('xml_url', array('id'=>'xml_url', 'value'=>$this->webroot . 'map/factory/')); ?>


<dl class="search_list_map_nav clearfix">
	<dt class="d-flex align-items-center"><?php echo __('icon-map'); ?></dt>
	<dd class="d-flex w-100">
		<ul class="d-flex clearfix align-items-center justify-content-betwen w-100">
			<li class="d-flex search_list_map_nav_factory01">
				<label for="list_map_nav01"><?php echo $this->Form->checkbox('list_map_nav01', array('value' => '1', 'class' => 'list_map_nav', 'checked' => true));echo __('industrial-zone'); ?></label>
			</li>
			<li class="d-flex search_list_map_nav_factory02">
				<label for="list_map_nav02"><?php echo $this->Form->checkbox('list_map_nav02', array('value' => '2', 'class' => 'list_map_nav', 'checked' => true));echo __('factory-map'); ?></label>
			</li>
			<li class="d-flex search_list_map_nav_factory03">
				<label for="list_map_nav03"><?php echo $this->Form->checkbox('list_map_nav03', array('value' => '3', 'class' => 'list_map_nav', 'checked' => true));echo __('warehouse'); ?></label>
			</li>
		</ul>
	</dd>
</dl>
<!-- /search_list_map_nav -->

<!-- <?php echo $this->Form->create('FactoryBuilding', array('url' => '/factory/area/list/' . $factoryArea['FactoryArea']['id'], 'id' => 'U_FactoryBuildingAreaListForm')); ?> -->
	<!-- search_nav/ -->
	<!-- <div class="search_nav clearfix">
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
	</div> -->
	<!-- /search_nav -->

	<!-- search_nav_table/ -->
	<!-- <div class="search_nav_table">
		<table summary="条件を絞り込んで検索">
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
		</table>
		<div class="imgbtn"><input type="image" name="submit" src="<?php echo $this->webroot; ?>common/images/search/search_nav_btn02.png" alt="この条件で絞り込む" /></div>
	</div> -->
	<!-- /search_nav_table -->
<!-- <?php echo $this->Form->end(); ?> -->

<?php
$this->Paginator->options(array(
'url' => array(
    'controller' => 'factory',
    'action'     => 'area/list/' . $factoryArea['FactoryArea']['id'],
)
));
?>
<?php echo $this->element('paging'); ?>

<!-- search_column/ -->
<?php foreach ($factoryBuildings as $factoryBuilding) { ?>

<div class="search_column_ttl clearfix">
	<h3><a href="<?php echo $this->webroot; ?>factory/area/detail/<?php echo h($factoryBuilding['FactoryBuilding']['id']); ?>"><?php echo h($factoryBuilding['FactoryBuilding']['name']); ?></a></h3>
</div>

<div class="search_column_data clearfix">
	<ul class="clearfix">
<?php     if (isset($factoryBuilding['FactoryBuilding']['newly']) && strlen($factoryBuilding['FactoryBuilding']['newly'] > 0)) { ?>
		<li><span class="box-have-border box-red"><?php echo __('new'); ?></span></li>
<?php     } ?>
<?php     if (isset($factoryBuilding['FactoryBuilding']['recommend']) && strlen($factoryBuilding['FactoryBuilding']['recommend'] > 0)) { ?>
		<li><span class="box-have-border box-pink"><?php echo __('recommend'); ?></span></li>
<?php     } ?>
<?php     if (isset($factoryBuilding['FactoryBuilding']['popluar']) && strlen($factoryBuilding['FactoryBuilding']['popluar'] > 0)) { ?>
		<li><span class="box-have-border box-blue"><?php echo __('popular'); ?></span></li>
<?php     } ?>
	</ul>
	<dl>
		<dt><img src="<?php echo $this->webroot; ?>common/images/search/search_column_icon_update.png" width="45" height="13" alt="UPDATE" /></dt>
		<dd><?php echo date('Y/m/d H:i', strtotime($factoryBuilding['FactoryBuilding']['modified'])); ?></dd>
	</dl>
</div>
<div class="search_column_article clearfix">
	<div class="search_column_aside">
		<div>
			<p>
				<span><img src="<?php echo $this->webroot; ?>common/images/spacer.gif" alt="" /></span>
<?php     if (isset($factoryBuilding['FactoryPhoto']['0']['path']) && strlen($factoryBuilding['FactoryPhoto']['0']['path'] > 0)) { ?>
				<img src="<?php echo $this->webroot; ?>upload/FactoryBuildings/tmb_list_<?php echo h($factoryBuilding['FactoryPhoto']['0']['path']); ?>" alt="<?php echo h($factoryBuilding['FactoryPhoto']['0']['caption']); ?>" />
<?php     } else { ?>
				<img src="<?php echo $this->webroot; ?>common/images/noimage-list.png" alt="NoImage" />
<?php     } ?>
			</p>
		</div>
<?php     if (isset($factoryBuilding['FactoryPhoto']['1']['path']) && strlen($factoryBuilding['FactoryPhoto']['1']['path'] > 0)) { ?>
		<div>
			<p>
				<span><img src="<?php echo $this->webroot; ?>common/images/spacer.gif" alt="" /></span>
				<img src="<?php echo $this->webroot; ?>upload/FactoryBuildings/tmb_list_<?php echo h($factoryBuilding['FactoryPhoto']['1']['path']); ?>" alt="<?php echo h($factoryBuilding['FactoryPhoto']['1']['caption']); ?>" />
			</p>
		</div>
<?php     } ?>
	</div>
	<div class="search_column_section">
		<ul class="clearfix first">
<?php     if (isset($factoryBuilding['FactoryBuilding']['giz']) && !empty($factoryBuilding['FactoryBuilding']['giz'])) { ?>
			<li class="border-gray bk-gray p-y-10"><?php echo __('giz'); ?></li>
<?php     } ?>
<?php     if (isset($factoryBuilding['FactoryBuilding']['epz']) && !empty($factoryBuilding['FactoryBuilding']['epz'])) { ?>
			<li class="border-gray bk-gray p-y-10"><?php echo __('epz'); ?></li>
<?php     } ?>
<?php     if (isset($factoryBuilding['FactoryBuilding']['fz']) && !empty($factoryBuilding['FactoryBuilding']['fz'])) { ?>
			<li class="border-gray bk-gray p-y-10"><?php echo __('fz'); ?></li>
<?php     } ?>
<?php   if ($factoryBuilding['FactoryBuilding']['industrial_park_id'] == 1) { ?>
		<li class="border-gray bk-gray p-y-10"><?php echo __('industrial-park'); ?></li>
		<?php } ?>

		<?php if ($factoryBuilding['FactoryBuilding']['industrial_park_id'] == 2) { ?>
		<li class="border-gray bk-gray p-y-10"><?php echo __('industrial-park-no-eat'); ?></li>
		<?php } ?>

		<?php if ($factoryBuilding['FactoryBuilding']['industrial_park_id'] == 3) { ?>
		<li class="border-gray bk-gray p-y-10"><?php echo __('industrial-park-outsite'); ?></li>
		<?php } ?>
		</ul>
		<table summary="物件詳細">
			<col width="110">
			<col width="">
			<tr>
				<th><span><?php echo __('area'); ?></span></th>
				<td><?php echo h($factoryArea['FactoryArea']['name']); ?></td>
			</tr>
			<tr>
				<th><span><?php echo __('completion-year'); ?></span></th>
				<td>
<?php     if (isset($factoryBuilding['FactoryBuilding']['complated']) && !empty($factoryBuilding['FactoryBuilding']['complated'])) { ?>
					<?php echo h($factoryBuilding['FactoryBuilding']['complated']);echo __('year-jp'); ?>
<?php     } else { ?>
					&nbsp;
<?php     } ?>
				</td>
			</tr>
		</table>
		<ul class="clearfix search_column_type">
<?php     foreach(Configure::read('Facility.FactoryBuilding') as $key => $val) { ?>
<?php         if ($factoryBuilding['FactoryBuilding'][$key] == '1') { ?>
					<li class="type-item d-inline-block on p-10">
						<?php echo __($val); ?>
					</li>
<?php         } else { ?>
					<li class="type-item d-inline-block off p-10">
						<?php echo __($val); ?>
					</li>
<?php         } ?>

<?php     } ?>
		</ul>
		
		<p class="imgbtn">
			
			<a class="d-inline-block button-red hover-dark" href="<?php echo $this->webroot; ?>factory/area/detail/<?php echo h($factoryBuilding['FactoryBuilding']['id']); ?>"><i class="fas fa-info-circle mr-5"></i><?php echo __('details-property'); ?></a>
		</p>
	</div>
</div>
<?php } ?>
<?php if (count($factoryBuildings) == 0) { ?>
		<div class="no_data" style="margn: 10px;"><p><?php echo __('search-no-result'); ?></p></div>
<?php }  ?>
		<!-- /search_column -->
<?php echo $this->element('paging'); ?>
		<!-- contents_inquiry/ -->
<?php echo $this->element('section_contact'); ?>
		<!-- /contents_inquiry -->