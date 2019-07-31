<script src="http://maps.google.com/maps/api/js?v=3&sensor=false" type="text/javascript" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>common/js/jquery.map.detail.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>common/js/detail.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>common/js/jquery.colorbox-min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>common/css/colorbox.css" media="screen" />

<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=150800048342214";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

		<!-- topicpath/ -->
		<ul id="topicpath">
			<li class="home"><a href="<?php echo $this->webroot; ?>">TOP</a></li>
			<li><a href="<?php echo $this->webroot; ?>office/area/">事務所を探す エリアから探す</a></li>
			<li><?php echo h($officeBuilding['OfficeBuilding']['name']); ?></li>
		</ul>
		<!-- /topicpath -->

		<!-- detail_header/ -->
		<div class="detail_header clearfix">
			<h2><img src="<?php echo $this->webroot; ?>common/images/search/detail_header_ttl.png" width="142" height="40" alt="物件情報" /></h2>
			<p class="imgbtn"><a href="mailto:?subject=TOKYO DEVELOPMENT CONSULTANT&amp;body=<?php echo $this->Html->url('', true); ?>"><img src="<?php echo $this->webroot; ?>common/images/search/btn_smartphone.png" width="270" height="37" alt="この物件の情報を携帯・スマホへ送る" /></a></p>
		</div>
		<!-- /detail_header -->

		<!-- detail_read/ -->
		<div class="detail_article_read">
			<div class="detail_read_ttl clearfix">
				<h3 class="detail_read_ttl_txt"><?php echo h($officeBuilding['OfficeBuilding']['name']); ?></h3>
				<p><img src="<?php echo $this->webroot; ?>common/images/search/search_column_ttl_office<?php echo $officeBuilding['OfficeBuilding']['office_category_id']; ?>.png" width="110" height="20" alt="<?php echo h($officeBuilding['OfficeCategory']['name']); ?>" /></p>
			</div>
			<div class="detail_read_data clearfix">
				<ul class="clearfix">
<?php if (isset($officeBuilding['OfficeBuilding']['newly']) && !empty($officeBuilding['OfficeBuilding']['newly'])) { ?>
					<li><img src="<?php echo $this->webroot; ?>common/images/search/search_column_icon_new.png" width="50" height="17" alt="NEW" /></li>
<?php } ?>
<?php if (isset($officeBuilding['OfficeBuilding']['recommend']) && !empty($officeBuilding['OfficeBuilding']['recommend'])) { ?>
					<li><img src="<?php echo $this->webroot; ?>common/images/search/search_column_icon_recommend.png" width="50" height="17" alt="おすすめ" /></li>
<?php } ?>
<?php if (isset($officeBuilding['OfficeBuilding']['popluar']) && !empty($officeBuilding['OfficeBuilding']['popluar'])) { ?>
					<li><img src="<?php echo $this->webroot; ?>common/images/search/search_column_icon_popular.png" width="50" height="17" alt="人気" /></li>
<?php } ?>
<?php if (isset($officeBuilding['OfficeBuilding']['nearby']) && !empty($officeBuilding['OfficeBuilding']['nearby'])) { ?>
					<li><img src="<?php echo $this->webroot; ?>common/images/search/search_column_icon_station.png" width="50" height="17" alt="駅近" /></li>
<?php } ?>
				</ul>
				<dl>
					<dt><img src="<?php echo $this->webroot; ?>common/images/search/search_column_icon_update.png" width="45" height="13" alt="UPDATE" /></dt>
					<dd><?php echo date('Y/m/d H:i', strtotime($officeBuilding['OfficeBuilding']['modified'])); ?></dd>
				</dl>
			</div>
			<p class="detail_read_txt"><?php echo nl2br(h($officeBuilding['OfficeBuilding']['description'])); ?></p>
		</div>
		<!-- /detail_read -->

		<!-- detail_read_detail/ -->
		<div class="detail_article_read_detail clearfix" style="overflow: hidden;">
			<div class="detail_read_aside">
<?php if (isset($officeBuilding['OfficePhoto']['Main'])) { ?>
				<p>
					<a href="<?php echo $this->webroot; ?>upload/OfficeBuildings/<?php echo $officeBuilding['OfficePhoto']['Main'][0]['path']; ?>" class="colorbox" title="<?php echo $officeBuilding['OfficePhoto']['Main'][0]['caption']; ?>" target="_blank">
						<span class="imgbtn"><img src="<?php echo $this->webroot; ?>common/images/search/layer_m.png" alt="" /></span>
						<img src="<?php echo $this->webroot; ?>upload/OfficeBuildings/tmb_main_<?php echo $officeBuilding['OfficePhoto']['Main'][0]['path']; ?>" alt="<?php echo $officeBuilding['OfficePhoto']['Main'][0]['caption']; ?>" />
					</a>
				</p>
<?php } else { ?>
				<p><img src="<?php echo $this->webroot; ?>common/images/noimage-detail.png" alt="NO IMAGE" /></p>
<?php } ?>
			</div>
			<div class="detail_read_section clearfix">
				<table summary="物件詳細">
					<col width="30%" />
					<col width="" />
					<tr>
						<th>アクセス<span>Access</span></th>
						<td><?php echo nl2br(h($officeBuilding['OfficeBuilding']['access'])); ?></td>
					</tr>
					<tr>
						<th>エリア<span>Area</span></th>
						<td><?php echo h($officeBuilding['Area']['name']); ?></td>
					</tr>
					<tr>
						<th>住所<span>Address</span></th>
						<td><?php echo h($officeBuilding['OfficeBuilding']['address']); ?></td>
					</tr>
					<tr>
						<th>完成年<span>Completion year</span></th>
						<td>
<?php if (isset($officeBuilding['OfficeBuilding']['complated']) && !empty($officeBuilding['OfficeBuilding']['complated'])) { ?>
							<?php echo h($officeBuilding['OfficeBuilding']['complated']); ?>年
<?php } else { ?>
							&nbsp;
<?php } ?>
						</td>
					</tr>
					<tr>
						<th>天井高<span>Ceiling height</span></th>
						<td>
<?php if (isset($officeBuilding['OfficeBuilding']['height']) && !empty($officeBuilding['OfficeBuilding']['height'])) { ?>
							<?php echo h(number_format($officeBuilding['OfficeBuilding']['height'],2)); ?>m
<?php } else { ?>
							&nbsp;
<?php } ?>
						</td>
					</tr>
					<tr>
						<th>総階数<span>Total floors</span></th>
						<td>
<?php if (isset($officeBuilding['OfficeBuilding']['total_floor']) && !empty($officeBuilding['OfficeBuilding']['total_floor'])) { ?>
							<?php echo h($officeBuilding['OfficeBuilding']['total_floor']); ?>階
<?php } else { ?>
							&nbsp;
<?php } ?>
						</td>
					</tr>
					<tr>
						<th>エレベーター数<span>Elevator</span></th>
						<td>
<?php if (isset($officeBuilding['OfficeBuilding']['elevator']) && !empty($officeBuilding['OfficeBuilding']['elevator'])) { ?>
							<?php echo h($officeBuilding['OfficeBuilding']['elevator']); ?>台
<?php } else { ?>
							&nbsp;
<?php } ?>
						</td>
					</tr>
					<tr>
						<th>サービスリフト数<span>Service Lift</span></th>
						<td>
<?php if (isset($officeBuilding['OfficeBuilding']['lift']) && !empty($officeBuilding['OfficeBuilding']['lift'])) { ?>
							<?php echo h($officeBuilding['OfficeBuilding']['lift']); ?>台
<?php } else { ?>
							&nbsp;
<?php } ?>
						</td>
					</tr>
					<tr>
						<th>管理会社<span>Management Office</span></th>
						<td>
<?php if (isset($officeBuilding['OfficeBuilding']['proprietary']) && !empty($officeBuilding['OfficeBuilding']['proprietary'])) { ?>
							<?php echo h($officeBuilding['OfficeBuilding']['proprietary']); ?>
<?php } else { ?>
							&nbsp;
<?php } ?>
						</td>
					</tr>
					<tr>
						<th>主な入居企業<span>Notable Tenants</span></th>
						<td>
<?php if (isset($officeBuilding['OfficeBuilding']['together']) && !empty($officeBuilding['OfficeBuilding']['together'])) { ?>
							<?php echo h($officeBuilding['OfficeBuilding']['together']); ?>
<?php } else { ?>
							&nbsp;
<?php } ?>
						</td>
					</tr>
				</table>

				<div class="box_share">
					<dl class="clearfix">
						<dt><img src="<?php echo $this->webroot; ?>common/images/search/btn_share.png" width="159" height="35" alt="この物件をシェアする" /></dt>
						<dd>
							<div class="fb-like" data-send="false" data-layout="button_count" data-width="120" data-show-faces="false"></div>
						</dd>
					</dl>
				</div>
			</div>
		</div>
		<!-- /detail_read_detail -->

		<!-- detail_article_feature/ -->
		<h3 class="detail_hgroup"><img src="<?php echo $this->webroot; ?>common/images/search/detail_ttl_feature.png" width="72" height="18" alt="設備・特長" /></h3>
		<div class="detail_article_feature">
			<ul class="clearfix">
<?php foreach(Configure::read('Facility.OfficeBuilding') as $key => $val) { ?>
<?php     if ($officeBuilding['OfficeBuilding'][$key] == '1') { ?>
				<li><img src="<?php echo $this->webroot; ?>common/images/search/search_column_li_<?php echo $key; ?>.png" width="110" height="33" alt="<?php echo $val; ?>" /></li>
<?php     } else { ?>
				<li><img src="<?php echo $this->webroot; ?>common/images/search/search_column_li_<?php echo $key; ?>_off.png" width="110" height="33" alt="<?php echo $val; ?>" /></li>
<?php     } ?>
<?php } ?>
			</ul>
			<table summary="設備・特長">
				<col width="15%" />
				<col width="35%" />
				<col width="15%" />
				<col width="35%" />
				<tr>
					<th>駐輪場<span>Bicycle Parking</span></th>
					<td>
<?php     if (isset($officeBuilding['OfficeBuilding']['parking']) && !empty($officeBuilding['OfficeBuilding']['parking'])) { ?>
						<?php echo number_format(h(str_replace(',','',$officeBuilding['OfficeBuilding']['parking']))); ?>&nbsp;VND/台
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
					<th>セキュリティ<span>Security</span></th>
					<td>
<?php     if (isset($officeBuilding['OfficeBuilding']['security']) && !empty($officeBuilding['OfficeBuilding']['security'])) { ?>
						<?php echo h($officeBuilding['OfficeBuilding']['security']); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
				</tr>


<?php if ( $officeBuilding['OfficeBuilding']['office_category_id'] == 3 ) { //サービスオフィスの場合 ?>
				<tr>
					<th>会議室利用<span>Meeting Room</span></th>
					<td>
<?php     if (isset($officeBuilding['OfficeBuilding']['meeting_room']) && !empty($officeBuilding['OfficeBuilding']['meeting_room'])) { ?>
						<?php echo h($officeBuilding['OfficeBuilding']['meeting_room']); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
					<th>インターネット<span>Internet</span></th>
					<td>
<?php     if (isset($officeBuilding['OfficeBuilding']['internet']) && !empty($officeBuilding['OfficeBuilding']['internet'])) { ?>
						<?php echo h($officeBuilding['OfficeBuilding']['internet']); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
				</tr>
				<tr>
					<th>エアコン<span>AC</span></th>
					<td>
<?php     if (isset($officeBuilding['OfficeBuilding']['air_conditioner']) && !empty($officeBuilding['OfficeBuilding']['air_conditioner'])) { ?>
						<?php echo h($officeBuilding['OfficeBuilding']['air_conditioner']); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
					<th>電気<span>Electricity</span></th>
					<td>
<?php     if (isset($officeBuilding['OfficeBuilding']['electricity']) && !empty($officeBuilding['OfficeBuilding']['electricity'])) { ?>
						<?php echo h($officeBuilding['OfficeBuilding']['electricity']); ?>&nbsp;VND/Unit
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
				</tr>
				<tr>
					<th>水道<span>Water</span></th>
					<td>
<?php     if (isset($officeBuilding['OfficeBuilding']['water_supply']) && !empty($officeBuilding['OfficeBuilding']['water_supply'])) { ?>
						<?php echo h($officeBuilding['OfficeBuilding']['water_supply']); ?>&nbsp;VND/Unit(cu.m)
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
					<th>電話<span>Telephone</span></th>
					<td>
<?php     if (isset($officeBuilding['OfficeBuilding']['telephone']) && !empty($officeBuilding['OfficeBuilding']['telephone'])) { ?>
						<?php echo h($officeBuilding['OfficeBuilding']['telephone']); ?>&nbsp;VND
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
				</tr>
				<tr>
					<th>その他付帯設備<span>Remarks</span></th>
					<td colspan="3">
<?php     if (isset($officeBuilding['OfficeBuilding']['facilities']) && !empty($officeBuilding['OfficeBuilding']['facilities'])) { ?>
						<?php echo nl2br(h($officeBuilding['OfficeBuilding']['facilities'])); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
				</tr>

<?php } else { ?>
				<tr>
					<th>インターネット<span>Internet</span></th>
					<td>
<?php     if (isset($officeBuilding['OfficeBuilding']['internet']) && !empty($officeBuilding['OfficeBuilding']['internet'])) { ?>
						<?php echo h($officeBuilding['OfficeBuilding']['internet']); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
					<th>エアコン<span>AC</span></th>
					<td>
<?php     if (isset($officeBuilding['OfficeBuilding']['air_conditioner']) && !empty($officeBuilding['OfficeBuilding']['air_conditioner'])) { ?>
						<?php echo h($officeBuilding['OfficeBuilding']['air_conditioner']); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
				</tr>
				<tr>
					<th>電気<span>Electricity</span></th>
					<td>
<?php     if (isset($officeBuilding['OfficeBuilding']['electricity']) && !empty($officeBuilding['OfficeBuilding']['electricity'])) { ?>
						<?php echo h($officeBuilding['OfficeBuilding']['electricity']); ?>&nbsp;VND/Unit
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
					<th>水道<span>Water</span></th>
					<td>
<?php     if (isset($officeBuilding['OfficeBuilding']['water_supply']) && !empty($officeBuilding['OfficeBuilding']['water_supply'])) { ?>
						<?php echo h($officeBuilding['OfficeBuilding']['water_supply']); ?>&nbsp;VND/Unit(cu.m)
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
				</tr>
<?php     if($officeBuilding['OfficeBuilding']['office_category_id'] == '2') { //オフィス（販売）の場合 ?>
				<tr>
					<th>電話<span>Telephone</span></th>
					<td>
<?php     if (isset($officeBuilding['OfficeBuilding']['telephone']) && !empty($officeBuilding['OfficeBuilding']['telephone'])) { ?>
						<?php echo h($officeBuilding['OfficeBuilding']['telephone']); ?>&nbsp;VND
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
					<th>管理費<span>Management Fee</span></th>
					<td>
<?php         if (isset($officeBuilding['OfficeBuilding']['management_cost']) && !empty($officeBuilding['OfficeBuilding']['management_cost'])) { ?>
						<?php echo h(number_format(str_replace(',','',$officeBuilding['OfficeBuilding']['management_cost']), 1)); ?>&nbsp;USD/m&sup2;
						<?php if(isset($officeBuilding['OfficeBuilding']['management_cost_inc']) && !empty($officeBuilding['OfficeBuilding']['management_cost_inc'])) { //オフィス（販売）の場合 ?>
						<br />管理費は賃料に含む
						<?php } ?>
<?php         } else { ?>
						&nbsp;
<?php         } ?>
					</td>
				</tr>
				<tr>
					<th>その他付帯設備<span>Remarks</span></th>
					<td colspan="3">
<?php     if (isset($officeBuilding['OfficeBuilding']['facilities']) && !empty($officeBuilding['OfficeBuilding']['facilities'])) { ?>
						<?php echo nl2br(h($officeBuilding['OfficeBuilding']['facilities'])); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
				</tr>

<?php     } else { ?>
				<tr>
					<th>電話<span>Telephone</span></th>
					<td>
<?php     if (isset($officeBuilding['OfficeBuilding']['telephone']) && !empty($officeBuilding['OfficeBuilding']['telephone'])) { ?>
						<?php echo h($officeBuilding['OfficeBuilding']['telephone']); ?>&nbsp;VND
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
					<th>その他付帯設備<span>Remarks</span></th>
					<td>
<?php     if (isset($officeBuilding['OfficeBuilding']['facilities']) && !empty($officeBuilding['OfficeBuilding']['facilities'])) { ?>
						<?php echo nl2br(h($officeBuilding['OfficeBuilding']['facilities'])); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
				</tr>
<?php     } ?>

<?php } ?>
			</table>
		</div>
		<!-- /detail_article_feature -->

		<!-- detail_photo:start/ -->
		<div class="detail_photo clearfix">
<?php if (isset($officeBuilding['OfficePhoto']['Sub']) && count($officeBuilding['OfficePhoto']['Sub'])) { ?>
<?php     foreach($officeBuilding['OfficePhoto']['Sub'] as $officePhotoSub) { ?>
			<div class="detail_photo_l">
				<p class="detail_photo_img">
					<a href="<?php echo $this->webroot; ?>upload/OfficeBuildings/<?php echo $officePhotoSub['path']; ?>" class="colorbox" title="<?php echo $officePhotoSub['caption']; ?>" target="_blank">
						<span class="imgbtn"><img src="<?php echo $this->webroot; ?>common/images/search/layer_l.png" alt="" /></span>
						<img src="<?php echo $this->webroot; ?>upload/OfficeBuildings/tmb_sub_<?php echo $officePhotoSub['path']; ?>" alt="<?php echo $officePhotoSub['caption']; ?>" />
					</a>
				</p>
				<p class="detail_photo_txt"><?php echo $officePhotoSub['caption']; ?></p>
			</div>
<?php     } ?>
<?php } ?>
		</div>
		<!-- /detail_photo:end -->

		<!-- detail_photo:start/ -->
<?php if (isset($officeBuilding['OfficePhoto']['SubSub']) && count($officeBuilding['OfficePhoto']['SubSub'])) { ?>
<?php     $count = 1;?>
<?php     foreach($officeBuilding['OfficePhoto']['SubSub'] as $officePhotoSubSub) { ?>
<?php         if ($count == 1 || $count == 4) { ?>
		<div class="detail_photo clearfix">
<?php         } ?>
			<div class="detail_photo_s">
				<p class="detail_photo_img">
					<a href="<?php echo $this->webroot; ?>upload/OfficeBuildings/<?php echo $officePhotoSubSub['path']; ?>" class="colorbox" title="<?php echo $officePhotoSubSub['caption']; ?>" target="_blank">
						<span class="imgbtn"><img src="<?php echo $this->webroot; ?>common/images/search/layer_s.png" alt="" /></span>
						<img src="<?php echo $this->webroot; ?>upload/OfficeBuildings/tmb_subsub_<?php echo $officePhotoSubSub['path']; ?>" alt="<?php echo $officePhotoSubSub['caption']; ?>" />
					</a>
				</p>
				<p class="detail_photo_txt"><?php echo $officePhotoSubSub['caption']; ?></p>
			</div>
<?php         if ($count == 3 || count($officeBuilding['OfficePhoto']['SubSub']) == $count) { ?>
		</div>
<?php         } ?>
<?php         $count ++;?>
<?php     } ?>
<?php } ?>
		<!-- /detail_photo:end -->

		<div class="detail_photo_share clearfix">
			<div class="box_share">
				<dl class="clearfix">
					<dt><img src="<?php echo $this->webroot; ?>common/images/search/btn_share.png" width="159" height="35" alt="この物件をシェアする" /></dt>
					<dd>
						<div class="fb-like" data-send="false" data-layout="button_count" data-width="120" data-show-faces="false"></div>
					</dd>
				</dl>
			</div>
			<p class="imgbtn"><a href="mailto:?subject=TOKYO DEVELOPMENT CONSULTANT&amp;body=<?php echo $this->Html->url('', true); ?>"><img src="<?php echo $this->webroot; ?>common/images/search/btn_smartphone.png" width="270" height="37" alt="この物件の情報を携帯・スマホへ送る" /></a></p>
		</div>

<?php if (isset($officeBuilding['OfficeProperty'][2]) && count($officeBuilding['OfficeProperty'][2])) { ?>
		<!-- detail_article_table/ -->
		<h3 class="detail_hgroup"><img src="<?php echo $this->webroot; ?>common/images/search/detail_ttl_rental.png" width="49" height="18" alt="貸物件" /></h3>
		<div class="detail_article_table imgbtn">
			<table summary="貸物件">
				<tr>
					<th>所在階<span>Floor</span></th>
					<th>間取り<span>Layout</span></th>
					<th>面積<span>Floor area</span></th>
					<th>家賃 (USD/月)<span>Price</span></th>
					<th>備考<span>Note</span></th>
				</tr>
<?php     foreach($officeBuilding['OfficeProperty'][2] as $officeBuildingSale) { ?>
				<tr>
					<td><?php echo h($officeBuildingSale['floor']); ?>階</td>
					<td><?php if (isset($officeBuildingSale['office_layout_text']) && $officeBuildingSale['office_layout_text'] != '') { echo nl2br(h($officeBuildingSale['office_layout_text'])); } else { echo h($officeLayouts[$officeBuildingSale['office_layout_id']]); } ?></td>
					<td><?php echo number_format(h(str_replace(',','',$officeBuildingSale['floor_space']))); ?>m&sup2;</td>
					<td><?php echo number_format(h(str_replace(',','',$officeBuildingSale['price']))); ?></td>
					<td class="note">
						<?php echo nl2br(h($officeBuildingSale['note'])); ?>
<?php         if (isset($officeBuildingSale['drowing']) && !empty($officeBuildingSale['drowing'])) { ?>
						<a href="<?php echo $this->webroot; ?>upload/OfficeProperties/<?php echo $officeBuildingSale['drowing']; ?>" class="colorbox" title="<?php echo h($officeLayouts[$officeBuildingSale['office_layout_id']]); ?>の間取り図" target="_blank">
							<img src="<?php echo $this->webroot; ?>common/images/search/detail_btn_floor.png" width="95" height="28" alt="間取り図" />
						</a>
<?php         } ?>
					</td>
				</tr>
<?php     } ?>
			</table>
		</div>
		<!-- /detail_article_table -->
<?php } ?>

<?php if (isset($officeBuilding['OfficeProperty'][1]) && count($officeBuilding['OfficeProperty'][1])) { ?>
		<!-- detail_article_table/ -->
		<h3 class="detail_hgroup"><img src="<?php echo $this->webroot; ?>common/images/search/detail_ttl_sell.png" width="49" height="18" alt="売物件" /></h3>
		<div class="detail_article_table imgbtn">
			<table summary="売物件">
				<tr>
					<th>所在階<span>Floor</span></th>
					<th>間取り<span>Layout</span></th>
					<th>面積<span>Floor area</span></th>
					<th>売買価格<span>Price</span></th>
					<th>備考<span>Note</span></th>
				</tr>
<?php     foreach($officeBuilding['OfficeProperty'][1] as $officeBuildingRent) { ?>
				<tr>
					<td><?php echo h($officeBuildingRent['floor']); ?>階</td>
					<td><?php if (isset($officeBuildingRent['office_layout_text']) && $officeBuildingRent['office_layout_text'] != '') { echo nl2br(h($officeBuildingRent['office_layout_text'])); } else { echo h($officeLayouts[$officeBuildingRent['office_layout_id']]); } ?></td>
					<td><?php echo number_format(h(str_replace(',','',$officeBuildingRent['floor_space']))); ?>m&sup2;</td>
					<td><?php echo number_format(h(str_replace(',','',$officeBuildingRent['price']))); ?></td>
					<td class="note">
						<?php echo nl2br(h($officeBuildingRent['note'])); ?>
<?php         if (isset($officeBuildingRent['drowing']) && !empty($officeBuildingRent['drowing'])) { ?>
						<a href="<?php echo $this->webroot; ?>upload/OfficeProperties/<?php echo $officeBuildingRent['drowing']; ?>" class="colorbox" title="<?php echo h($officeLayouts[$officeBuildingRent['office_layout_id']]); ?>の間取り図" target="_blank">
							<img src="<?php echo $this->webroot; ?>common/images/search/detail_btn_floor.png" width="95" height="28" alt="間取り図" />
						</a>
<?php         } ?>
					</td>
				</tr>
<?php     } ?>
			</table>
		</div>
		<!-- /detail_article_table -->
<?php } ?>

		<!-- detail_article_map/ -->
		<h3 class="detail_hgroup"><img src="<?php echo $this->webroot; ?>common/images/search/detail_ttl_map.png" width="65" height="18" alt="周辺地図" /></h3>

<!-- TODO ★★★★★ ランドマークを入れる -->
		<div id="map_canvas" class="detail_article_map_data"></div>
		<?php echo $this->Form->hidden('lat', array('id' => 'map_lat', 'value' => $officeBuilding['OfficeBuilding']['lat'])); ?>
		<?php echo $this->Form->hidden('lng', array('id' => 'map_lng', 'value' => $officeBuilding['OfficeBuilding']['lng'])); ?>

		<div class="detail_article_map imgbtn clearfix">
			<table summary="周辺地図">
				<tr>
					<th>住所<span>Address</span></th>
					<td><?php echo h($officeBuilding['OfficeBuilding']['address']); ?></td>
				</tr>
				<tr>
					<th>アクセス<span>Access</span></th>
					<td><?php echo nl2br(h($officeBuilding['OfficeBuilding']['access'])); ?></td>
				</tr>
				<tr>
					<th>周辺施設<span>Neighbor facilities</span></th>
					<td>
<?php if (isset($officeBuilding['OfficeBuilding']['around']) && !empty($officeBuilding['OfficeBuilding']['around'])) { ?>
						<?php echo nl2br(h($officeBuilding['OfficeBuilding']['around'])); ?>
<?php } else { ?>
						&nbsp;
<?php } ?>
					</td>
				</tr>
			</table>
			<p class="imgbtn"><a href="mailto:?subject=TOKYO DEVELOPMENT CONSULTANT&amp;body=<?php echo $this->Html->url('', true); ?>"><img src="<?php echo $this->webroot; ?>common/images/search/btn_smartphone.png" width="270" height="37" alt="この物件の情報を携帯・スマホへ送る" /></a></p>
		</div>
		<!-- /detail_article_map -->

		<!-- contents_inquiry/ -->
<?php echo $this->element('section_contact'); ?>
		<!-- /contents_inquiry -->

		<!--[if IE 6]>
		<script type="text/javascript" src="<?php echo $this->webroot; ?>common/js/DD_belatedPNG.js"></script>
		<script>DD_belatedPNG.fix('span.imgbtn img');</script>
		<![endif]-->
