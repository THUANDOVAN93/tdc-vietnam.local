<?php
/*
// 工場の詳細ではマップいらないみたい。
<script src="http://maps.google.com/maps/api/js?v=3&sensor=false" type="text/javascript" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>common/js/jquery.map.detail.js"></script>
*/
?>
<script type="text/javascript" src="<?php echo $this->webroot; ?>common/js/detail.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>common/js/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>common/js/modal.js"></script>
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
			<?php if ( $this->params['url']['area'] == 'all' ) { ?>
			<li><a href="<?php echo $this->webroot; ?>factory/area/all/">工場・工業用地を探す ベトナム全域の物件一覧から探す</a></li>
			<?php } elseif ( $this->params['url']['area'] == 'south' ) { ?>
			<li><a href="<?php echo $this->webroot; ?>factory/area/south/">工場・工業用地を探す ベトナム南部の物件一覧から探す</a></li>
			<?php } elseif ( $this->params['url']['area'] == 'north' ) { ?>
			<li><a href="<?php echo $this->webroot; ?>factory/area/north/">工場・工業用地を探す ベトナム北部の物件一覧から探す</a></li>
			<?php } elseif ( $this->params['url']['area'] == 'central' ) { ?>
			<li><a href="<?php echo $this->webroot; ?>factory/area/central/">工場・工業用地を探す ベトナム中部の物件一覧から探す</a></li>
			<?php } else { ?>
			<li><a href="<?php echo $this->webroot; ?>factory/area/">工場・工業用地を探す ベトナム全域工業団地から探す</a></li>
			<?php } ?>
			<li><?php echo h($factoryBuilding['FactoryBuilding']['name']); ?></li>
		</ul>
		<!-- /topicpath -->

		<!-- detail_header/ -->
		<div class="detail_header clearfix">
			<h1><img src="<?php echo $this->webroot; ?>common/images/search/detail_header_ttl.png" width="142" height="40" alt="物件情報" /></h1>
			<p class="imgbtn"><a href="mailto:?subject=TOKYO DEVELOPMENT CONSULTANT&amp;body=<?php echo $this->Html->url('', true); ?>"><img src="<?php echo $this->webroot; ?>common/images/search/btn_smartphone.png" width="270" height="37" alt="この物件の情報を携帯・スマホへ送る" /></a></p>
		</div>
		<!-- /detail_header -->

		<!-- detail_read/ -->
		<div class="detail_article_read">
			<div class="detail_read_ttl clearfix">
				<h2 class="detail_read_ttl_txt"><?php echo h($factoryBuilding['FactoryBuilding']['name']); ?></h2>
				<p><img src="<?php echo $this->webroot; ?>common/images/search/search_column_ttl_factory<?php echo $factoryBuilding['FactoryBuilding']['factory_category_id']; ?>.png" width="110" height="20" alt="<?php echo h($factoryBuilding['FactoryCategory']['name']); ?>" /></p>
			</div>
			<div class="detail_read_data clearfix">
				<ul class="clearfix">
<?php if (isset($factoryBuilding['FactoryBuilding']['newly']) && !empty($factoryBuilding['FactoryBuilding']['newly'])) { ?>
					<li><img src="<?php echo $this->webroot; ?>common/images/search/search_column_icon_new.png" width="50" height="17" alt="NEW" /></li>
<?php } ?>
<?php if (isset($factoryBuilding['FactoryBuilding']['recommend']) && !empty($factoryBuilding['FactoryBuilding']['recommend'])) { ?>
					<li><img src="<?php echo $this->webroot; ?>common/images/search/search_column_icon_recommend.png" width="50" height="17" alt="おすすめ" /></li>
<?php } ?>
<?php if (isset($factoryBuilding['FactoryBuilding']['popluar']) && !empty($factoryBuilding['FactoryBuilding']['popluar'])) { ?>
					<li><img src="<?php echo $this->webroot; ?>common/images/search/search_column_icon_popular.png" width="50" height="17" alt="人気" /></li>
<?php } ?>
				</ul>
				<dl>
					<dt><img src="<?php echo $this->webroot; ?>common/images/search/search_column_icon_update.png" width="45" height="13" alt="UPDATE" /></dt>
					<dd><?php echo date('Y/m/d H:i', strtotime($factoryBuilding['FactoryBuilding']['modified'])); ?></dd>
				</dl>
			</div>
		</div>
		<!-- /detail_read -->

		<!-- detail_read_detail/ -->
		<div class="detail_article_read_detail clearfix" style="overflow: hidden;">
			<div class="detail_read_aside">
<?php if (isset($factoryBuilding['FactoryPhoto']['Main'])) { ?>
				<p>
					<a href="<?php echo $this->webroot; ?>upload/FactoryBuildings/<?php echo $factoryBuilding['FactoryPhoto']['Main'][0]['path']; ?>" class="colorbox" title="<?php echo $factoryBuilding['FactoryPhoto']['Main'][0]['caption']; ?>" target="_blank">
						<span class="imgbtn"><img src="<?php echo $this->webroot; ?>common/images/search/layer_m.png" alt="" /></span>
						<img src="<?php echo $this->webroot; ?>upload/FactoryBuildings/tmb_main_<?php echo $factoryBuilding['FactoryPhoto']['Main'][0]['path']; ?>" alt="<?php echo $factoryBuilding['FactoryPhoto']['Main'][0]['caption']; ?>" />
					</a>
				</p>
<?php } else { ?>
				<p><img src="<?php echo $this->webroot; ?>common/images/noimage-detail.png" alt="NO IMAGE" /></p>
<?php } ?>
			</div>
			<div class="detail_read_section clearfix">
				<ul class="clearfix areaIcon">
<?php     if (isset($factoryBuilding['FactoryBuilding']['giz']) && !empty($factoryBuilding['FactoryBuilding']['giz'])) { ?>
					<li><img src="<?php echo $this->webroot; ?>common/images/search/search_column_factory_giz.png" alt="一般加工区（GIZ）" /></li>
<?php     } ?>
<?php     if (isset($factoryBuilding['FactoryBuilding']['epz']) && !empty($factoryBuilding['FactoryBuilding']['epz'])) { ?>
					<li><img src="<?php echo $this->webroot; ?>common/images/search/search_column_factory_epz.png" alt="輸出加工区（EPZ）" /></li>
<?php     } ?>
<?php     if (isset($factoryBuilding['FactoryBuilding']['fz']) && !empty($factoryBuilding['FactoryBuilding']['fz'])) { ?>
					<li><img src="<?php echo $this->webroot; ?>common/images/search/search_column_factory_fz.png" alt="フリーゾーン（FZ）" /></li>
<?php     } ?>
					<li><img src="<?php echo $this->webroot; ?>common/images/search/search_column_factory_industrial<?php echo h($factoryBuilding['FactoryBuilding']['industrial_park_id']); ?>.png" alt="工業団地" /></li>
				</ul>
				<table summary="物件詳細">
					<col width="36%" />
					<col width="" />
					<!--tr>
						<th>BOIゾーン<span>BOI zone</span></th>
						<td><?php echo h(Configure::read('BoiZone.' . $factoryBuilding['FactoryBuilding']['boi_zone'])); ?></td>
					</tr-->
					<tr>
						<th>開発業者<span>Developer</span></th>
						<td><?php echo h($factoryBuilding['FactoryBuilding']['developer']); ?></td>
					</tr>
					<tr>
						<th>エリア<span>Area</span></th>
						<td><?php echo h($factoryBuilding['FactoryArea']['name']); ?></td>
					</tr>
					<tr>
						<th>住所<span>Address</span></th>
						<td><?php echo h($factoryBuilding['FactoryBuilding']['address']); ?></td>
					</tr>
					<tr>
						<th>海抜<span>Above sea levels</span></th>
						<td>
<?php if (isset($factoryBuilding['FactoryBuilding']['altitude']) && !empty($factoryBuilding['FactoryBuilding']['altitude'])) { ?>
							<?php echo number_format(h(str_replace(',','',$factoryBuilding['FactoryBuilding']['altitude']))); ?>m
<?php } else { ?>
							&nbsp;
<?php } ?>
						</td>
					</tr>
					<tr>
						<th>開発完成年<span>Completion year</span></th>
						<td>
<?php if (isset($factoryBuilding['FactoryBuilding']['complated']) && !empty($factoryBuilding['FactoryBuilding']['complated'])) { ?>
							<?php echo h($factoryBuilding['FactoryBuilding']['complated']); ?>年
<?php } else { ?>
							&nbsp;
<?php } ?>
						</td>
					</tr>
					<tr>
						<th>開発面積<span>Site area</span></th>
						<td>
<?php if (isset($factoryBuilding['FactoryBuilding']['develop_area']) && !empty($factoryBuilding['FactoryBuilding']['develop_area'])) { ?>
							<?php echo number_format(h(str_replace(',','',$factoryBuilding['FactoryBuilding']['develop_area']))); ?>ha
<?php } else { ?>
							&nbsp;
<?php } ?>
						</td>
					</tr>
					<tr>
						<th>リース有効期限<span>Lease expiration year</span></th>
						<td>
<?php if (isset($factoryBuilding['FactoryBuilding']['lease_expiration']) && !empty($factoryBuilding['FactoryBuilding']['lease_expiration'])) { ?>
							<?php echo h($factoryBuilding['FactoryBuilding']['lease_expiration']); ?>年
<?php } else { ?>
							&nbsp;
<?php } ?>
						</td>
					</tr>
					<tr>
						<th>主な入居企業一覧<span>Notable Tenants</span></th>
						<td class="note">
<?php if (isset($factoryBuilding['FactoryTenant']) && count($factoryBuilding['FactoryTenant']) > 0) { ?>
<?php     $outputs = array(); ?>
<?php     if (isset($factoryBuilding['FactoryTenant'][0])) { array_push($outputs, $factoryBuilding['FactoryTenant'][0]['name']); } ?>
<?php     if (isset($factoryBuilding['FactoryTenant'][1])) { array_push($outputs, $factoryBuilding['FactoryTenant'][1]['name']); } ?>
							<?php echo implode('<br />', $outputs); ?>
<?php     if (count($factoryBuilding['FactoryTenant']) >= 3) { ?>
							<p alt="cpList" class="btns"><img src="<?php echo $this->webroot; ?>common/images/search/detail_btn_companylist.png" width="121" height="28" alt="入居企業一覧" /></p>
<?php     } ?>
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
		<div class="modal cpList">
		<div class="modalBody">
			<h3 class="detail_hgroup">主な入居企業一覧<span>Notable Tenants</span></h3>
<?php if (isset($factoryBuilding['FactoryTenant']) && count($factoryBuilding['FactoryTenant']) > 0) { ?>
			<ul>
<?php     foreach ($factoryBuilding['FactoryTenant'] as $factoryTenant) { ?>
				<li><?php echo $factoryTenant['name']; ?></li>
<?php     } ?>
			</ul>
<?php } ?>
			<p class="close"><span>×close</span></p>
		</div><!-- / .modalBody -->
		<div class="modalBK"></div>
		</div><!-- / .modalcpList -->
		<!-- /detail_read_detail -->

		<!-- detail_article_feature/ -->
		<h3 class="detail_hgroup"><img src="<?php echo $this->webroot; ?>common/images/search/detail_ttl_infla.png" width="134" height="18" alt="インフラ環境・施設" /></h3>
		<div class="detail_article_feature">
			<ul class="clearfix">
<?php foreach(Configure::read('Facility.FactoryBuilding') as $key => $val) { ?>
<?php     if ($factoryBuilding['FactoryBuilding'][$key] == '1') { ?>
				<li><img src="<?php echo $this->webroot; ?>common/images/search/search_column_li_<?php echo $key; ?>.png" width="110" height="33" alt="<?php echo $val; ?>" /></li>
<?php     } else { ?>
				<li><img src="<?php echo $this->webroot; ?>common/images/search/search_column_li_<?php echo $key; ?>_off.png" width="110" height="33" alt="<?php echo $val; ?>" /></li>
<?php     } ?>
<?php } ?>
			</ul>
			<table summary="インフラ環境・施設">
				<col width="15%" />
				<col width="35%" />
				<col width="15%" />
				<col width="35%" />
				<tr>
					<th>幹線道路<span>Motorway</span></th>
					<td>
<?php     if (isset($factoryBuilding['FactoryBuilding']['highway']) && !empty($factoryBuilding['FactoryBuilding']['highway'])) { ?>
						<?php echo h($factoryBuilding['FactoryBuilding']['highway']); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
					<th>排水処理<span>Drainage Wate</span></th>
					<td>
<?php     if (isset($factoryBuilding['FactoryBuilding']['sewer']) && !empty($factoryBuilding['FactoryBuilding']['sewer'])) { ?>
						<?php echo h($factoryBuilding['FactoryBuilding']['sewer']); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
				</tr>
				<tr>
					<th>工業用水<span>Industrial water</span></th>
					<td>
<?php     if (isset($factoryBuilding['FactoryBuilding']['waterworks']) && !empty($factoryBuilding['FactoryBuilding']['waterworks'])) { ?>
						<?php echo h($factoryBuilding['FactoryBuilding']['waterworks']); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
					<th>雨水処理<span>Stormwater treatment</span></th>
					<td>
<?php     if (isset($factoryBuilding['FactoryBuilding']['reservoir']) && !empty($factoryBuilding['FactoryBuilding']['reservoir'])) { ?>
						<?php echo h($factoryBuilding['FactoryBuilding']['reservoir']); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
				</tr>
				<tr>
					<th>電力<span>Electric power</span></th>
					<td>
<?php     if (isset($factoryBuilding['FactoryBuilding']['electricity']) && !empty($factoryBuilding['FactoryBuilding']['electricity'])) { ?>
						<?php echo h($factoryBuilding['FactoryBuilding']['electricity']); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
					<th>天然ガス<span>Natural Gas</span></th>
					<td>
<?php     if (isset($factoryBuilding['FactoryBuilding']['natural_gas']) && !empty($factoryBuilding['FactoryBuilding']['natural_gas'])) { ?>
						<?php echo h($factoryBuilding['FactoryBuilding']['natural_gas']); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
				</tr>
				<tr>
					<!--th>スチーム<span>Steam</span></th>
					<td>
<?php     if (isset($factoryBuilding['FactoryBuilding']['steam']) && !empty($factoryBuilding['FactoryBuilding']['steam'])) { ?>
						<?php echo h($factoryBuilding['FactoryBuilding']['steam']); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td-->
					<th>電話通信<span>TelepMhaonnay</span></th>
					<td>
<?php     if (isset($factoryBuilding['FactoryBuilding']['telephone']) && !empty($factoryBuilding['FactoryBuilding']['telephone'])) { ?>
						<?php echo h($factoryBuilding['FactoryBuilding']['telephone']); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
					<th>セキュリティー<span>Security</span></th>
					<td>
<?php     if (isset($factoryBuilding['FactoryBuilding']['security']) && !empty($factoryBuilding['FactoryBuilding']['security'])) { ?>
						<?php echo h($factoryBuilding['FactoryBuilding']['security']); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
				</tr>
				<tr>

					<th>管理費<span>Management Fee</span></th>
					<td>
<?php         if (isset($factoryBuilding['FactoryBuilding']['management_cost']) && !empty($factoryBuilding['FactoryBuilding']['management_cost'])) { ?>
						<?php echo h(number_format($factoryBuilding['FactoryBuilding']['management_cost'], 1)); ?>&nbsp;USD/m&sup2;
<?php         } else { ?>
						&nbsp;
<?php         } ?>
					</td>
					<th>その他付帯設備<span>Remarks</span></th>
					<td colspan="3">
<?php     if (isset($factoryBuilding['FactoryBuilding']['facilities']) && !empty($factoryBuilding['FactoryBuilding']['facilities'])) { ?>
						<?php echo nl2br(h($factoryBuilding['FactoryBuilding']['facilities'])); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
				</tr>

			</table>
		</div>
		<!-- /detail_article_feature -->

		<!-- detail_article_feature/ -->
		<h3 class="detail_hgroup"><img src="<?php echo $this->webroot; ?>common/images/search/detail_ttl_distance.png" width="142" height="18" alt="主要地域までの距離" /></h3>
		<div class="detail_article_feature">
		<ul class="clearfix">
		</ul>
<?php
		//エリアサーチ（北部・中部）
		$area_master = array( 'north' => array( 'Phu Tho', 'Ninh Binh', 'Lang Son', 'Thai Nguyen', 'Vinh Phuc', 'Ha Noi', 'Hoa Binh', 'Bac Ninh', 'Bac Giang', 'Hai Duong', 'Hung Yen', 'Hai Phong', 'Ha Nam', 'Nam Dinh', 'Quang Ninh', 'Thai Binh' ), 'center' => array( 'Da Nang') );

		$find = false;
		foreach( $area_master as $key => $arr_s ) {
			if ( array_search( $factoryBuilding['FactoryArea']['name'], $arr_s ) !== false ) {
				$find = true;
				break;
			}
		}
		
		if ( !$find ) {
			//南部
			$disp1 = "ホーチミン市内<span>From Ho Chi Minh City</span>";
			$disp2 = "タンソンニャット国際空港<span>From Tan Son Nhat International Airport</span>";
			$disp3 = "ロンタン新国際空港（2020年完成予定）<span>Long Thanh International Airport</span>";
			$disp4 = "サイゴン新港<span>From New Saigon Port</span>";
			$disp5 = "カットライ<span>From Cat Lai Port</span>";
			$disp6 = "チーパイ港<span>From Thi Vai Port </span>";
		} else {
			if ( $key == "north" ) {
				//北部
				$disp1 = "ハノイ市中心部<span>From Ha Noi City</span>";
				$disp2 = "ノイバイ国際空港<span>From Noi Bai International Airport</span>";
				$disp3 = "ハイフォン港<span>From Haiphong Port</span>";
				$disp4 = "カットビー国内空港<span>From Cat Bi Domestic Airport</span>";
				$disp5 = "ティンラン国際空港<span>From Tien Lang International Airport</span>";
				$disp6 = "カイラン港<span>From Cai Lan Port</span>";
			} else {
				//中部
				$disp1 = "ダナン市中心部<span>From Da Nang City</span>";
				$disp2 = "ダナン国際空港<span>From Da Nang International Airport</span>";
				$disp3 = "ティエンサ港<span>From Tien Sa Port</span>";
				$disp4 = "リエンチュウ港<span>From Lien Chieu Port</span>";
				$disp5 = "ロン橋<span>From Rong Bridge</span>";
				$disp6 = "";
			}
		}
?>
			<table summary="主要地域までの距離">
				<col width="20%" />
				<col width="30%" />
				<col width="20%" />
				<col width="30%" />
				<tr>
					<th><?php echo $disp1; ?></th>
					<td>
<?php if (isset($factoryBuilding['FactoryBuilding']['from_hochiminh']) && !empty($factoryBuilding['FactoryBuilding']['from_hochiminh'])) { ?>
						<?php echo number_format(h(str_replace(',','',$factoryBuilding['FactoryBuilding']['from_hochiminh']))); ?>km
<?php } else { ?>
						&nbsp;
<?php } ?>
					</td>
					<th><?php echo $disp2; ?></th>
					<td>
<?php if (isset($factoryBuilding['FactoryBuilding']['from_tansonnhat']) && !empty($factoryBuilding['FactoryBuilding']['from_tansonnhat'])) { ?>
						<?php echo number_format(h(str_replace(',','',$factoryBuilding['FactoryBuilding']['from_tansonnhat']))); ?>km
<?php } else { ?>
						&nbsp;
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php echo $disp3; ?></th>
					<td>
<?php if (isset($factoryBuilding['FactoryBuilding']['from_new_airport']) && !empty($factoryBuilding['FactoryBuilding']['from_new_airport'])) { ?>
						<?php echo number_format(h(str_replace(',','',$factoryBuilding['FactoryBuilding']['from_new_airport']))); ?>km
<?php } else { ?>
						&nbsp;
<?php } ?>
					</td>
					<th><?php echo $disp4; ?></th>
					<td>
<?php if (isset($factoryBuilding['FactoryBuilding']['from_saigon']) && !empty($factoryBuilding['FactoryBuilding']['from_saigon'])) { ?>
						<?php echo number_format(h(str_replace(',','',$factoryBuilding['FactoryBuilding']['from_saigon']))); ?>km
<?php } else { ?>
						&nbsp;
<?php } ?>
					</td>
				</tr>
				<tr>
					<th><?php echo $disp5; ?></th>
					<td>
<?php if (isset($factoryBuilding['FactoryBuilding']['from_catlai']) && !empty($factoryBuilding['FactoryBuilding']['from_catlai'])) { ?>
						<?php echo number_format(h(str_replace(',','',$factoryBuilding['FactoryBuilding']['from_catlai']))); ?>km
<?php } else { ?>
						&nbsp;
<?php } ?>
					</td>
					<th><?php echo $disp6; ?></th>
					<td>
<?php if (isset($factoryBuilding['FactoryBuilding']['from_thivai']) && !empty($factoryBuilding['FactoryBuilding']['from_thivai'])) { ?>
						<?php echo number_format(h(str_replace(',','',$factoryBuilding['FactoryBuilding']['from_thivai']))); ?>km
<?php } else { ?>
						&nbsp;
<?php } ?>
					</td>
				</tr>
<?php if ( !$find ) { ?>
				<tr>
					<th>ブンタウ港<span>From Vung Tau Port</span></th>
					<td>
<?php if (isset($factoryBuilding['FactoryBuilding']['from_vungtau']) && !empty($factoryBuilding['FactoryBuilding']['from_vungtau'])) { ?>
						<?php echo number_format(h(str_replace(',','',$factoryBuilding['FactoryBuilding']['from_vungtau']))); ?>km
<?php } else { ?>
						&nbsp;
<?php } ?>
					</td>
					<th>&nbsp;</th>
					<td></td>
				</tr>
<?php } ?>
			</table>
		</div>
		<!-- /detail_article_feature -->

		<!-- detail_photo:start/ -->
		<div class="detail_photo clearfix">
<?php if (isset($factoryBuilding['FactoryPhoto']['Sub']) && count($factoryBuilding['FactoryPhoto']['Sub'])) { ?>
<?php     foreach($factoryBuilding['FactoryPhoto']['Sub'] as $factoryPhotoSub) { ?>
			<div class="detail_photo_l">
				<p class="detail_photo_img">
					<a href="<?php echo $this->webroot; ?>upload/FactoryBuildings/<?php echo $factoryPhotoSub['path']; ?>" class="colorbox" title="<?php echo $factoryPhotoSub['caption']; ?>" target="_blank">
						<span class="imgbtn"><img src="<?php echo $this->webroot; ?>common/images/search/layer_l.png" alt="" /></span>
						<img src="<?php echo $this->webroot; ?>upload/FactoryBuildings/tmb_sub_<?php echo $factoryPhotoSub['path']; ?>" alt="<?php echo $factoryPhotoSub['caption']; ?>" />
					</a>
				</p>
				<p class="detail_photo_txt"><?php echo $factoryPhotoSub['caption']; ?></p>
			</div>
<?php     } ?>
<?php } ?>
		</div>
		<!-- /detail_photo:end -->

		<!-- detail_photo:start/ -->
<?php if (isset($factoryBuilding['FactoryPhoto']['SubSub']) && count($factoryBuilding['FactoryPhoto']['SubSub'])) { ?>
<?php     $count = 1;?>
<?php     foreach($factoryBuilding['FactoryPhoto']['SubSub'] as $factoryPhotoSubSub) { ?>
<?php         if ($count == 1 || $count == 4) { ?>
		<div class="detail_photo clearfix">
<?php         } ?>
			<div class="detail_photo_s">
				<p class="detail_photo_img">
					<a href="<?php echo $this->webroot; ?>upload/FactoryBuildings/<?php echo $factoryPhotoSubSub['path']; ?>" class="colorbox" title="<?php echo $factoryPhotoSubSub['caption']; ?>" target="_blank">
						<span class="imgbtn"><img src="<?php echo $this->webroot; ?>common/images/search/layer_s.png" alt="" /></span>
						<img src="<?php echo $this->webroot; ?>upload/FactoryBuildings/tmb_subsub_<?php echo $factoryPhotoSubSub['path']; ?>" alt="<?php echo $factoryPhotoSubSub['caption']; ?>" />
					</a>
				</p>
				<p class="detail_photo_txt"><?php echo $factoryPhotoSubSub['caption']; ?></p>
			</div>
<?php         if ($count == 3 || count($factoryBuilding['FactoryPhoto']['SubSub']) == $count) { ?>
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

<?php $isProperty = false; ?>
<?php $subNum = 1; ?>
<?php if (isset($factoryBuilding['FactoryProperty'][$subNum]) && count($factoryBuilding['FactoryProperty'][$subNum])) { ?>
<?php     $isProperty = true; ?>
		<!-- detail_article_table/ -->
		<h3 class="detail_hgroup"><img src="<?php echo $this->webroot; ?>common/images/search/detail_ttl_factory-sell.png" width="62" height="16" alt="売り工場" /></h3>
		<div class="detail_article_table factory imgbtn">
			<table summary="売り工場">
				<tr>
					<!--thプロット</th>
					<th>ユニット</th-->
					<th>工場面積<br />(m&sup2)<span>Factory area</span></th>
					<th>敷地面積<br />(m&sup2)<span>Land area</span></th>
					<th>家賃<br />(USD)<span>Price</span></th>
					<th>備考<span>Note</span></th>
				</tr>
<?php     foreach($factoryBuilding['FactoryProperty'][$subNum] as $factoryProperty) { ?>
				<tr>
					<!--td class="col1 text_left"><?php echo h($factoryProperty['plot']); ?></td>
					<td class="col1 text_left"><?php echo h($factoryProperty['unit']); ?></td-->
					<td class="col2"><?php echo h(number_format(str_replace(',','',$factoryProperty['floor_space']))); ?></td>
					<td class="col2"><?php echo h(number_format(str_replace(',','',$factoryProperty['site_area']))); ?></td>
					<td class="col3"><?php echo h(number_format(str_replace(',','',$factoryProperty['price']))); ?></td>
					<td class="note">
						<?php echo nl2br(h($factoryProperty['note'])); ?>
						<ul class="clearfix">
<?php         if (isset($factoryProperty['drowing']) && !empty($factoryProperty['drowing'])) { ?>
							<li><a href="<?php echo $this->webroot; ?>upload/FactoryProperties/<?php echo $factoryProperty['drowing']; ?>" class="colorbox" title="<?php echo h($factorySubCategories[$factoryProperty['factory_sub_category_id']]); ?>の間取り図" target="_blank"><img src="<?php echo $this->webroot; ?>common/images/search/detail_btn_floor.png" width="95" height="28" alt="間取り図" /></a></li>
<?php         } ?>
<?php         if (isset($factoryProperty['arrangement_plan']) && !empty($factoryProperty['arrangement_plan'])) { ?>
							<li><a href="<?php echo $this->webroot; ?>upload/FactoryProperties/<?php echo $factoryProperty['arrangement_plan']; ?>" class="colorbox" title="<?php echo h($factorySubCategories[$factoryProperty['factory_sub_category_id']]); ?>の位置図" target="_blank"><img src="<?php echo $this->webroot; ?>common/images/search/detail_btn_position.png" width="95" height="28" alt="位置図" /></a></li>
<?php         } ?>
						</ul>
					</td>
				</tr>
<?php     } ?>
			</table>
		</div>
		<!-- /detail_article_table -->
<?php } ?>

<?php $subNum = 2; ?>
<?php if (isset($factoryBuilding['FactoryProperty'][$subNum]) && count($factoryBuilding['FactoryProperty'][$subNum])) { ?>
<?php     $isProperty = true; ?>
		<!-- detail_article_table/ -->
		<h3 class="detail_hgroup"><img src="<?php echo $this->webroot; ?>common/images/search/detail_ttl_factory-rent.png" width="62" height="16" alt="貸し工場" /></h3>
		<div class="detail_article_table factory imgbtn">
			<table summary="貸し工場">
				<tr>
					<!--th>プロット</th>
					<th>ユニット</th-->
					<th>工場面積<br />(m&sup2)</th>
					<th>敷地面積<br />(m&sup2)</th>
					<th>家賃<br />(USD/月)</th>
					<th>備考</th>
				</tr>
<?php     foreach($factoryBuilding['FactoryProperty'][$subNum] as $factoryProperty) { ?>
				<tr>
					<!--td class="col1 text_left"><?php echo h($factoryProperty['plot']); ?></td>
					<td class="col1 text_left"><?php echo h($factoryProperty['unit']); ?></td-->
					<td class="col2"><?php echo h(number_format(str_replace(',','',$factoryProperty['floor_space']))); ?></td>
					<td class="col2"><?php echo h(number_format(str_replace(',','',$factoryProperty['site_area']))); ?></td>
					<td class="col3"><?php echo h(number_format(str_replace(',','',$factoryProperty['price']))); ?></td>
					<td class="note">
						<?php echo nl2br(h($factoryProperty['note'])); ?>
						<ul class="clearfix">
<?php         if (isset($factoryProperty['drowing']) && !empty($factoryProperty['drowing'])) { ?>
							<li><a href="<?php echo $this->webroot; ?>upload/FactoryProperties/<?php echo $factoryProperty['drowing']; ?>" class="colorbox" title="<?php echo h($factorySubCategories[$factoryProperty['factory_sub_category_id']]); ?>の間取り図" target="_blank"><img src="<?php echo $this->webroot; ?>common/images/search/detail_btn_floor.png" width="95" height="28" alt="間取り図" /></a></li>
<?php         } ?>
<?php         if (isset($factoryProperty['arrangement_plan']) && !empty($factoryProperty['arrangement_plan'])) { ?>
							<li><a href="<?php echo $this->webroot; ?>upload/FactoryProperties/<?php echo $factoryProperty['arrangement_plan']; ?>" class="colorbox" title="<?php echo h($factorySubCategories[$factoryProperty['factory_sub_category_id']]); ?>の位置図" target="_blank"><img src="<?php echo $this->webroot; ?>common/images/search/detail_btn_position.png" width="95" height="28" alt="位置図" /></a></li>
<?php         } ?>
						</ul>
					</td>
				</tr>
<?php     } ?>
			</table>
		</div>
		<!-- /detail_article_table -->
<?php } ?>

<?php $subNum = 3; ?>
<?php if (isset($factoryBuilding['FactoryProperty'][$subNum]) && count($factoryBuilding['FactoryProperty'][$subNum])) { ?>
<?php     $isProperty = true; ?>
		<!-- detail_article_table/ -->
		<h3 class="detail_hgroup"><img src="<?php echo $this->webroot; ?>common/images/search/detail_ttl_warehouse-sell.png" width="62" height="16" alt="売り倉庫" /></h3>
		<div class="detail_article_table factory imgbtn">
			<table summary="売り倉庫">
				<tr>
					<!--th>プロット</th>
					<th>ユニット</th-->
					<th>工場面積<br />(m&sup2)</th>
					<th>敷地面積<br />(m&sup2)</th>
					<th>家賃<br />(USD)</th>
					<th>備考</th>
				</tr>
<?php     foreach($factoryBuilding['FactoryProperty'][$subNum] as $factoryProperty) { ?>
				<tr>
					<!--td class="col1 text_left"><?php echo h($factoryProperty['plot']); ?></td>
					<td class="col1 text_left"><?php echo h($factoryProperty['unit']); ?></td-->
					<td class="col2"><?php echo h(number_format(str_replace(',','',$factoryProperty['floor_space']))); ?></td>
					<td class="col2"><?php echo h(number_format(str_replace(',','',$factoryProperty['site_area']))); ?></td>
					<td class="col3"><?php echo h(number_format(str_replace(',','',$factoryProperty['price']))); ?></td>
					<td class="note">
						<?php echo nl2br(h($factoryProperty['note'])); ?>
						<ul class="clearfix">
<?php         if (isset($factoryProperty['drowing']) && !empty($factoryProperty['drowing'])) { ?>
							<li><a href="<?php echo $this->webroot; ?>upload/FactoryProperties/<?php echo $factoryProperty['drowing']; ?>" class="colorbox" title="<?php echo h($factorySubCategories[$factoryProperty['factory_sub_category_id']]); ?>の間取り図" target="_blank"><img src="<?php echo $this->webroot; ?>common/images/search/detail_btn_floor.png" width="95" height="28" alt="間取り図" /></a></li>
<?php         } ?>
<?php         if (isset($factoryProperty['arrangement_plan']) && !empty($factoryProperty['arrangement_plan'])) { ?>
							<li><a href="<?php echo $this->webroot; ?>upload/FactoryProperties/<?php echo $factoryProperty['arrangement_plan']; ?>" class="colorbox" title="<?php echo h($factorySubCategories[$factoryProperty['factory_sub_category_id']]); ?>の位置図" target="_blank"><img src="<?php echo $this->webroot; ?>common/images/search/detail_btn_position.png" width="95" height="28" alt="位置図" /></a></li>
<?php         } ?>
						</ul>
					</td>
				</tr>
<?php     } ?>
			</table>
		</div>
		<!-- /detail_article_table -->
<?php } ?>

<?php $subNum = 4; ?>
<?php if (isset($factoryBuilding['FactoryProperty'][$subNum]) && count($factoryBuilding['FactoryProperty'][$subNum])) { ?>
<?php     $isProperty = true; ?>
		<!-- detail_article_table/ -->
		<h3 class="detail_hgroup"><img src="<?php echo $this->webroot; ?>common/images/search/detail_ttl_warehouse-rent.png" width="62" height="16" alt="貸し倉庫" /></h3>
		<div class="detail_article_table factory imgbtn">
			<table summary="貸し倉庫">
				<tr>
					<!--th>プロット</th>
					<th>ユニット</th-->
					<th>工場面積<br />(m&sup2)</th>
					<th>敷地面積<br />(m&sup2)</th>
					<th>家賃<br />(USD/月)</th>
					<th>備考</th>
				</tr>
<?php     foreach($factoryBuilding['FactoryProperty'][$subNum] as $factoryProperty) { ?>
				<tr>
					<!--td class="col1 text_left"><?php echo h($factoryProperty['plot']); ?></td>
					<td class="col1 text_left"><?php echo h($factoryProperty['unit']); ?></td-->
					<td class="col2"><?php echo h(number_format(str_replace(',','',$factoryProperty['floor_space']))); ?></td>
					<td class="col2"><?php echo h(number_format(str_replace(',','',$factoryProperty['site_area']))); ?></td>
					<td class="col3"><?php echo h(number_format(str_replace(',','',$factoryProperty['price']))); ?></td>
					<td class="note">
						<?php echo nl2br(h($factoryProperty['note'])); ?>
						<ul class="clearfix">
<?php         if (isset($factoryProperty['drowing']) && !empty($factoryProperty['drowing'])) { ?>
							<li><a href="<?php echo $this->webroot; ?>upload/FactoryProperties/<?php echo $factoryProperty['drowing']; ?>" class="colorbox" title="<?php echo h($factorySubCategories[$factoryProperty['factory_sub_category_id']]); ?>の間取り図" target="_blank"><img src="<?php echo $this->webroot; ?>common/images/search/detail_btn_floor.png" width="95" height="28" alt="間取り図" /></a></li>
<?php         } ?>
<?php         if (isset($factoryProperty['arrangement_plan']) && !empty($factoryProperty['arrangement_plan'])) { ?>
							<li><a href="<?php echo $this->webroot; ?>upload/FactoryProperties/<?php echo $factoryProperty['arrangement_plan']; ?>" class="colorbox" title="<?php echo h($factorySubCategories[$factoryProperty['factory_sub_category_id']]); ?>の位置図" target="_blank"><img src="<?php echo $this->webroot; ?>common/images/search/detail_btn_position.png" width="95" height="28" alt="位置図" /></a></li>
<?php         } ?>
						</ul>
					</td>
				</tr>
<?php     } ?>
			</table>
		</div>
		<!-- /detail_article_table -->
<?php } ?>

<?php $subNum = 5; ?>
<?php if (isset($factoryBuilding['FactoryProperty'][$subNum]) && count($factoryBuilding['FactoryProperty'][$subNum])) { ?>
<?php     $isProperty = true; ?>
		<!-- detail_article_table/ -->
		<h3 class="detail_hgroup"><img src="<?php echo $this->webroot; ?>common/images/search/detail_ttl_land.png" width="94" height="16" alt="売り土地" /></h3>
		<div class="detail_article_table factory imgbtn">
			<table summary="売り土地">
				<tr>
					<!--th>プロット</th>
					<th>ユニット</th-->
					<th>敷地面積<br />(m&sup2)</th>
					<!--th>敷地面積<br />(m&sup2)</th-->
					<th>リース料金<br />(USD)</th>
					<th>備考</th>
				</tr>
<?php     foreach($factoryBuilding['FactoryProperty'][$subNum] as $factoryProperty) { ?>
				<tr>
					<!--td class="col1 text_left"><?php echo h($factoryProperty['plot']); ?></td>
					<td class="col1 text_left"><?php echo h($factoryProperty['unit']); ?></td-->
					<td class="col2"><?php echo h(number_format(str_replace(',','',$factoryProperty['floor_space']))); ?></td>
					<!--td class="col2"><?php echo h(number_format(str_replace(',','',$factoryProperty['site_area']))); ?></td-->
					<td class="col3"><?php echo h(number_format(str_replace(',','',$factoryProperty['price']))); ?></td>
					<td class="note">
						<?php echo nl2br(h($factoryProperty['note'])); ?>
						<ul class="clearfix">
<?php         if (isset($factoryProperty['drowing']) && !empty($factoryProperty['drowing'])) { ?>
							<li><a href="<?php echo $this->webroot; ?>upload/FactoryProperties/<?php echo $factoryProperty['drowing']; ?>" class="colorbox" title="<?php echo h($factorySubCategories[$factoryProperty['factory_sub_category_id']]); ?>の間取り図" target="_blank"><img src="<?php echo $this->webroot; ?>common/images/search/detail_btn_floor.png" width="95" height="28" alt="間取り図" /></a></li>
<?php         } ?>
<?php         if (isset($factoryProperty['arrangement_plan']) && !empty($factoryProperty['arrangement_plan'])) { ?>
							<li><a href="<?php echo $this->webroot; ?>upload/FactoryProperties/<?php echo $factoryProperty['arrangement_plan']; ?>" class="colorbox" title="<?php echo h($factorySubCategories[$factoryProperty['factory_sub_category_id']]); ?>の位置図" target="_blank"><img src="<?php echo $this->webroot; ?>common/images/search/detail_btn_position.png" width="95" height="28" alt="位置図" /></a></li>
<?php         } ?>
						</ul>
					</td>
				</tr>
<?php     } ?>
			</table>
		</div>
		<!-- /detail_article_table -->
<?php } ?>
<?php if ($isProperty) { ?>
		<div class="detail_article_table imgbtn clearfix">
			<p class="imgbtn"><a href="mailto:?subject=TOKYO DEVELOPMENT CONSULTANT&amp;body=<?php echo $this->Html->url('', true); ?>"><img src="<?php echo $this->webroot; ?>common/images/search/btn_smartphone.png" width="270" height="37" alt="この物件の情報を携帯・スマホへ送る" /></a></p>
		</div>
<?php } ?>

		<!-- contents_inquiry/ -->
<?php echo $this->element('section_contact'); ?>
		<!-- /contents_inquiry -->

		<!--[if IE 6]>
		<script type="text/javascript" src="<?php echo $this->webroot; ?>common/js/DD_belatedPNG.js"></script>
		<script>DD_belatedPNG.fix('span.imgbtn img');</script>
		<![endif]-->
