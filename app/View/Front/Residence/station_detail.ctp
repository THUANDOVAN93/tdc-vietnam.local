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
			<li><a href="<?php echo $this->webroot; ?>residence/station/">住まいを探す 駅から探す</a></li>
			<li><?php echo h($residenceBuilding['ResidenceBuilding']['name']); ?></li>
		</ul>
		<!-- /topicpath -->

		<!-- detail_header/ -->
		<div class="detail_header clearfix">
			<h2 class="detail_read_ttl_txt"><img src="<?php echo $this->webroot; ?>common/images/search/detail_header_ttl.png" width="142" height="40" alt="物件情報" /></h2>
			<p class="imgbtn"><a href="mailto:?subject=TOKYO DEVELOPMENT CONSULTANT&amp;body=<?php echo $this->Html->url('', true); ?>"><img src="<?php echo $this->webroot; ?>common/images/search/btn_smartphone.png" width="270" height="37" alt="この物件の情報を携帯・スマホへ送る" /></a></p>
		</div>
		<!-- /detail_header -->

		<!-- detail_read/ -->
		<div class="detail_article_read">
			<div class="detail_read_ttl clearfix">
				<h3 class="detail_read_ttl_txt"><?php echo h($residenceBuilding['ResidenceBuilding']['name']); ?></h3>
				<p><img src="<?php echo $this->webroot; ?>common/images/search/search_column_ttl_residence<?php echo $residenceBuilding['ResidenceBuilding']['residence_category_id']; ?>.png" width="110" height="20" alt="<?php echo h($residenceBuilding['ResidenceCategory']['name']); ?>" /></p>
			</div>
			<div class="detail_read_data clearfix">
				<ul class="clearfix">
<?php if (isset($residenceBuilding['ResidenceBuilding']['newly']) && !empty($residenceBuilding['ResidenceBuilding']['newly'])) { ?>
					<li><img src="<?php echo $this->webroot; ?>common/images/search/search_column_icon_new.png" width="50" height="17" alt="NEW" /></li>
<?php } ?>
<?php if (isset($residenceBuilding['ResidenceBuilding']['recommend']) && !empty($residenceBuilding['ResidenceBuilding']['recommend'])) { ?>
					<li><img src="<?php echo $this->webroot; ?>common/images/search/search_column_icon_recommend.png" width="50" height="17" alt="おすすめ" /></li>
<?php } ?>
<?php if (isset($residenceBuilding['ResidenceBuilding']['popluar']) && !empty($residenceBuilding['ResidenceBuilding']['popluar'])) { ?>
					<li><img src="<?php echo $this->webroot; ?>common/images/search/search_column_icon_popular.png" width="50" height="17" alt="人気" /></li>
<?php } ?>
<?php if (isset($residenceBuilding['ResidenceBuilding']['nearby']) && !empty($residenceBuilding['ResidenceBuilding']['nearby'])) { ?>
					<li><img src="<?php echo $this->webroot; ?>common/images/search/search_column_icon_station.png" width="50" height="17" alt="駅近" /></li>
<?php } ?>
				</ul>
				<dl>
					<dt><img src="<?php echo $this->webroot; ?>common/images/search/search_column_icon_update.png" width="45" height="13" alt="UPDATE" /></dt>
					<dd><?php echo date('Y/m/d H:i', strtotime($residenceBuilding['ResidenceBuilding']['modified'])); ?></dd>
				</dl>
			</div>
			<p class="detail_read_txt"><?php echo nl2br(h($residenceBuilding['ResidenceBuilding']['description'])); ?></p>
		</div>
		<!-- /detail_read -->

		<!-- detail_read_detail/ -->
		<div class="detail_article_read_detail clearfix">
			<div class="detail_read_aside">
<?php if (isset($residenceBuilding['ResidencePhoto']['Main'])) { ?>
				<p>
					<a href="<?php echo $this->webroot; ?>upload/ResidenceBuildings/<?php echo $residenceBuilding['ResidencePhoto']['Main'][0]['path']; ?>" class="colorbox" title="<?php echo $residenceBuilding['ResidencePhoto']['Main'][0]['caption']; ?>" target="_blank">
						<span class="imgbtn"><img src="<?php echo $this->webroot; ?>common/images/search/layer_m.png" alt="" /></span>
						<img src="<?php echo $this->webroot; ?>upload/ResidenceBuildings/tmb_main_<?php echo $residenceBuilding['ResidencePhoto']['Main'][0]['path']; ?>" alt="<?php echo $residenceBuilding['ResidencePhoto']['Main'][0]['caption']; ?>" />
					</a>
				</p>
<?php } else { ?>
				<p><img src="<?php echo $this->webroot; ?>common/images/noimage-detail.png" alt="NO IMAGE" /></p>
<?php } ?>
			</div>
			<div class="detail_read_section clearfix">
				<table summary="物件詳細">
					<tr>
						<th>アクセス<span>Access</span></th>
						<td><?php echo nl2br(h($residenceBuilding['ResidenceBuilding']['access'])); ?></td>
					</tr>
					<tr>
						<th>エリア<span>Area</span></th>
						<td><?php echo h($residenceBuilding['Area']['name']); ?></td>
					</tr>
					<tr>
						<th>住所<span>Address</span></th>
						<td><?php echo h($residenceBuilding['ResidenceBuilding']['address']); ?></td>
					</tr>
					<tr>
						<th>完成年<span>Completion year</span></th>
						<td>
<?php if (isset($residenceBuilding['ResidenceBuilding']['complated']) && !empty($residenceBuilding['ResidenceBuilding']['complated'])) { ?>
							<?php echo h($residenceBuilding['ResidenceBuilding']['complated']); ?>年
<?php } else { ?>
							&nbsp;
<?php } ?>
						</td>
					</tr>
					<tr>
						<th>総階数<span>Total floors</span></th>
						<td>
<?php if (isset($residenceBuilding['ResidenceBuilding']['total_floor']) && !empty($residenceBuilding['ResidenceBuilding']['total_floor'])) { ?>
							<?php echo h($residenceBuilding['ResidenceBuilding']['total_floor']); ?>階
<?php } else { ?>
							&nbsp;
<?php } ?>
						</td>
					</tr>
					<tr>
						<th>部屋数<span>Total rooms</span></th>
						<td>
<?php if (isset($residenceBuilding['ResidenceBuilding']['total_room']) && !empty($residenceBuilding['ResidenceBuilding']['total_room'])) { ?>
							<?php echo h($residenceBuilding['ResidenceBuilding']['total_room']); ?>室
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
<?php foreach(Configure::read('Facility.Residence') as $key => $val) { ?>
<?php     if ($residenceBuilding['ResidenceBuilding'][$key] == '1') { ?>
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
					<th>電気<span>Electricity</span></th>
					<td>
<?php     if (isset($residenceBuilding['ResidenceBuilding']['electricity']) && !empty($residenceBuilding['ResidenceBuilding']['electricity'])) { ?>
						<?php echo h($residenceBuilding['ResidenceBuilding']['electricity']); ?>&nbsp;VND/Unit
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
					<th>水道<span>Water</span></th>
					<td>
<?php     if (isset($residenceBuilding['ResidenceBuilding']['water_supply']) && !empty($residenceBuilding['ResidenceBuilding']['water_supply'])) { ?>
						<?php echo h($residenceBuilding['ResidenceBuilding']['water_supply']); ?>&nbsp;VND/Unit(cu.m)
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
				</tr>
				<tr>
					<th>電話<span>Telephone</span></th>
					<td>
<?php     if (isset($residenceBuilding['ResidenceBuilding']['telephone']) && !empty($residenceBuilding['ResidenceBuilding']['telephone'])) { ?>
						<?php echo h($residenceBuilding['ResidenceBuilding']['telephone']); ?>&nbsp;VND
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
					<th>コンロ<span>Hobs</span></th>
					<td>
<?php     if (isset($residenceBuilding['ResidenceBuilding']['cookstove']) && !empty($residenceBuilding['ResidenceBuilding']['cookstove'])) { ?>
						<?php echo h($residenceBuilding['ResidenceBuilding']['cookstove']); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
				</tr>
				<tr>
<?php     // サービスアパートの場合 ?>
<?php     if($residenceBuilding['ResidenceBuilding']['residence_category_id'] == '3') { ?>
					<th>サービス<span>Service</span></th>
					<td colspan="3">
<?php         if (isset($residenceBuilding['ResidenceBuilding']['service']) && !empty($residenceBuilding['ResidenceBuilding']['service'])) { ?>
						<?php echo h($residenceBuilding['ResidenceBuilding']['service']); ?>
<?php         } else { ?>
						&nbsp;
<?php         } ?>
					</td>
<?php } ?>
<?php     // コンドミニアムの場合 ?>
<?php     if($residenceBuilding['ResidenceBuilding']['residence_category_id'] == '2') { ?>
					<th>管理費<span>Management Fee</span></th>
					<td colspan="3">
<?php         if (isset($residenceBuilding['ResidenceBuilding']['management_cost']) && !empty($residenceBuilding['ResidenceBuilding']['management_cost'])) { ?>
						<?php echo h(number_format($residenceBuilding['ResidenceBuilding']['management_cost'], 1)); ?>&nbsp;USD/m&sup2;
<?php         } else { ?>
						&nbsp;
<?php         } ?>
					</td>
<?php } ?>
				</tr>
				<tr>
					<th>その他付帯設備<span>Remarks</span></th>
					<td colspan="3">
<?php     if (isset($residenceBuilding['ResidenceBuilding']['facilities']) && !empty($residenceBuilding['ResidenceBuilding']['facilities'])) { ?>
						<?php echo nl2br(h($residenceBuilding['ResidenceBuilding']['facilities'])); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
				</tr>
			</table>
		</div>
		<!-- /detail_article_feature -->

		<!-- detail_photo:start/ -->
		<div class="detail_photo clearfix">
<?php if (isset($residenceBuilding['ResidencePhoto']['Sub']) && count($residenceBuilding['ResidencePhoto']['Sub']) > 0) { ?>
<?php     foreach($residenceBuilding['ResidencePhoto']['Sub'] as $residencePhotoSub) { ?>
			<div class="detail_photo_l">
				<p class="detail_photo_img">
					<a href="<?php echo $this->webroot; ?>upload/ResidenceBuildings/<?php echo $residencePhotoSub['path']; ?>" class="colorbox" title="<?php echo $residencePhotoSub['caption']; ?>" target="_blank">
						<span class="imgbtn"><img src="<?php echo $this->webroot; ?>common/images/search/layer_l.png" alt="" /></span>
						<img src="<?php echo $this->webroot; ?>upload/ResidenceBuildings/tmb_sub_<?php echo $residencePhotoSub['path']; ?>" alt="<?php echo $residencePhotoSub['caption']; ?>" />
					</a>
				</p>
				<p class="detail_photo_txt"><?php echo $residencePhotoSub['caption']; ?></p>
			</div>
<?php     } ?>
<?php } ?>
		</div>
		<!-- /detail_photo:end -->

		<!-- detail_photo:start/ -->
<?php if (isset($residenceBuilding['ResidencePhoto']['SubSub']) && count($residenceBuilding['ResidencePhoto']['SubSub']) > 0) { ?>
<?php     $count = 1;?>
<?php     foreach($residenceBuilding['ResidencePhoto']['SubSub'] as $residencePhotoSubSub) { ?>
<?php         if ($count == 1 || $count == 4) { ?>
		<div class="detail_photo clearfix">
<?php         } ?>
			<div class="detail_photo_s">
				<p class="detail_photo_img">
					<a href="<?php echo $this->webroot; ?>upload/ResidenceBuildings/<?php echo $residencePhotoSubSub['path']; ?>" class="colorbox" title="<?php echo $residencePhotoSubSub['caption']; ?>" target="_blank">
						<span class="imgbtn"><img src="<?php echo $this->webroot; ?>common/images/search/layer_s.png" alt="" /></span>
						<img src="<?php echo $this->webroot; ?>upload/ResidenceBuildings/tmb_subsub_<?php echo $residencePhotoSubSub['path']; ?>" alt="<?php echo $residencePhotoSubSub['caption']; ?>" />
					</a>
				</p>
				<p class="detail_photo_txt"><?php echo $residencePhotoSubSub['caption']; ?></p>
			</div>
<?php         if ($count == 3 || count($residenceBuilding['ResidencePhoto']['SubSub']) == $count) { ?>
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

<?php if (isset($residenceBuilding['ResidenceProperty'][2]) && count($residenceBuilding['ResidenceProperty'][2]) > 0) { ?>
		<!-- detail_article_table/ -->
		<h3 class="detail_hgroup"><img src="<?php echo $this->webroot; ?>common/images/search/detail_ttl_rental.png" width="49" height="18" alt="貸物件" /></h3>
		<div class="detail_article_table imgbtn">
			<table summary="貸物件">
				<tr>
					<th>所在階<span>Floor</span></th>
					<th>間取り<span>Bedroom <br>or Floor plan</span></th>
					<th>面積<span>Floor area</span></th>
					<th>家賃 (VND/月)<span>Price</span></th>
					<th>備考<span>Note</span></th>
				</tr>
<?php     foreach($residenceBuilding['ResidenceProperty'][2] as $residenceBuildingSale) { ?>
				<tr>
					<td><?php echo h($residenceBuildingSale['floor']); ?>階</td>
					<td><?php if (isset($residenceBuildingSale['residence_layout_text']) && $residenceBuildingSale['residence_layout_text'] != '') { echo nl2br(h($residenceBuildingSale['residence_layout_text'])); } else { echo h($residenceLayouts[$residenceBuildingSale['residence_layout_id']]); } ?></td>
					<td><?php echo h($this->Common->doubleVal($residenceBuildingSale['floor_space'])); ?>m&sup2;</td>
					<td><?php echo h(number_format($residenceBuildingSale['price'])); ?></td>
					<td class="note">
						<?php echo nl2br(h($residenceBuildingSale['note'])); ?>
<?php         if (isset($residenceBuildingSale['drowing']) && !empty($residenceBuildingSale['drowing'])) { ?>
						<a href="<?php echo $this->webroot; ?>upload/ResidenceProperties/<?php echo $residenceBuildingSale['drowing']; ?>" class="colorbox" title="<?php echo h($residenceLayouts[$residenceBuildingSale['residence_layout_id']]); ?>の間取り図" target="_blank">
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

<?php if (isset($residenceBuilding['ResidenceProperty'][1]) && count($residenceBuilding['ResidenceProperty'][1]) > 0) { ?>
		<!-- detail_article_table/ -->
		<h3 class="detail_hgroup"><img src="<?php echo $this->webroot; ?>common/images/search/detail_ttl_sell.png" width="49" height="18" alt="売物件" /></h3>
		<div class="detail_article_table imgbtn">
			<table summary="売物件">
				<tr>
					<th>所在階<span>Floor</span></th>
					<th>間取り<span>Bedroom <br>or Floor plan</span></th>
					<th>面積<span>Floor area</span></th>
					<th>家賃 (VND/月)<span>Price</span></th>
					<th>備考<span>Note</span></th>
				</tr>
<?php     foreach($residenceBuilding['ResidenceProperty'][1] as $residenceBuildingRent) { ?>
				<tr>
					<td><?php echo h($residenceBuildingRent['floor']); ?>階</td>
					<td><?php if (isset($residenceBuildingRent['residence_layout_text']) && $residenceBuildingRent['residence_layout_text'] != '') { echo nl2br(h($residenceBuildingRent['residence_layout_text'])); } else { echo h($residenceLayouts[$residenceBuildingRent['residence_layout_id']]); } ?></td>
					<td><?php echo h($this->Common->doubleVal($residenceBuildingRent['floor_space'])); ?>m&sup2;</td>
					<td><?php echo h(number_format($residenceBuildingRent['price'])); ?></td>
					<td class="note">
						<?php echo nl2br(h($residenceBuildingRent['note'])); ?>
<?php         if (isset($residenceBuildingRent['drowing']) && !empty($residenceBuildingRent['drowing'])) { ?>
						<a href="<?php echo $this->webroot; ?>upload/ResidenceProperties/<?php echo $residenceBuildingRent['drowing']; ?>" class="colorbox" title="<?php echo h($residenceLayouts[$residenceBuildingRent['residence_layout_id']]); ?>の間取り図" target="_blank">
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
		<?php echo $this->Form->hidden('lat', array('id' => 'map_lat', 'value' => $residenceBuilding['ResidenceBuilding']['lat'])); ?>
		<?php echo $this->Form->hidden('lng', array('id' => 'map_lng', 'value' => $residenceBuilding['ResidenceBuilding']['lng'])); ?>

		<div class="detail_article_map imgbtn clearfix">
			<table summary="周辺地図">
				<tr>
					<th>住所<span>Address</span></th>
					<td><?php echo h($residenceBuilding['ResidenceBuilding']['address']); ?></td>
				</tr>
				<tr>
					<th>アクセス<span>Access</span></th>
					<td><?php echo nl2br(h($residenceBuilding['ResidenceBuilding']['access'])); ?></td>
				</tr>
				<tr>
					<th>周辺施設<span>Neighbor facilities</span></th>
					<td>
<?php if (isset($residenceBuilding['ResidenceBuilding']['around']) && !empty($residenceBuilding['ResidenceBuilding']['around'])) { ?>
						<?php echo nl2br(h($residenceBuilding['ResidenceBuilding']['around'])); ?>
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
