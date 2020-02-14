<script type="text/javascript" src="<?php echo $this->webroot; ?>common/js/detail.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>common/js/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>common/js/modal.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>common/css/colorbox.css" media="screen" />

<div id="fb-root"></div>
<script>
// (function(d, s, id) {
//   var js, fjs = d.getElementsByTagName(s)[0];
//   if (d.getElementById(id)) return;
//   js = d.createElement(s); js.id = id;
//   js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=150800048342214";
//   fjs.parentNode.insertBefore(js, fjs);
// }(document, 'script', 'facebook-jssdk'));
</script>

		<!-- topicpath/ -->
		<ul id="topicpath">
			<li class="home"><a href="<?php echo $this->webroot; ?>">TOP</a></li>
			<?php if ( $this->params['url']['area'] == 'all' ) { ?>
			<li><a href="<?php echo $this->webroot; ?>factory/area/all/"><?php echo __('breadcrumb-factory-search-all'); ?></a></li>
			<?php } elseif ( $this->params['url']['area'] == 'south' ) { ?>
			<li><a href="<?php echo $this->webroot; ?>factory/area/south/"><?php echo __('breadcrumb-factory-search-south'); ?></a></li>
			<?php } elseif ( $this->params['url']['area'] == 'north' ) { ?>
			<li><a href="<?php echo $this->webroot; ?>factory/area/north/"><?php echo __('breadcrumb-factory-search-north'); ?></a></li>
			<?php } elseif ( $this->params['url']['area'] == 'central' ) { ?>
			<li><a href="<?php echo $this->webroot; ?>factory/area/central/"><?php echo __('breadcrumb-factory-search-central'); ?></a></li>
			<?php } else { ?>
			<li><a href="<?php echo $this->webroot.'factory/area/list/'.$factoryBuilding['FactoryArea']['id']; ?>"><?php echo $factoryBuilding['FactoryArea']['name'].' '.__('list-properties'); ?></a></li>
			<?php } ?>
			<li><?php echo h($factoryBuilding['FactoryBuilding']['name']); ?></li>
		</ul>
		<!-- /topicpath -->

		<!-- detail_header/ -->
		<div class="detail_header clearfix">
			<h1 class="title-row"><?php echo __('property-information'); ?></h1>
		</div>
		<!-- /detail_header -->

		<!-- detail_read/ -->
		<div class="detail_article_read">
			<div class="detail_read_ttl clearfix">
				<h2 class="detail_read_ttl_txt"><?php echo h($factoryBuilding['FactoryBuilding']['name']); ?></h2>
			</div>
			<div class="detail_read_data clearfix">
				<ul class="clearfix">
<?php if (isset($factoryBuilding['FactoryBuilding']['newly']) && !empty($factoryBuilding['FactoryBuilding']['newly'])) { ?>
					<li><span class="box-have-border box-red"><?php echo __('new'); ?></span></li>
<?php } ?>
<?php if (isset($factoryBuilding['FactoryBuilding']['recommend']) && !empty($factoryBuilding['FactoryBuilding']['recommend'])) { ?>
					<li><span class="box-have-border box-pink"><?php echo __('recommend'); ?></span></li>
<?php } ?>
<?php if (isset($factoryBuilding['FactoryBuilding']['popluar']) && !empty($factoryBuilding['FactoryBuilding']['popluar'])) { ?>
					<li><span class="box-have-border box-blue"><?php echo __('popular'); ?></span></li>
<?php } ?>
				</ul>
				<dl>
					<dt><img src="<?php echo $this->webroot; ?>common/images/search/search_column_icon_update.png" width="45" height="13" alt="UPDATE" /></dt>
					<dd><?php echo date('Y/m/d H:i', strtotime($factoryBuilding['FactoryBuilding']['modified'])); ?></dd>
				</dl>
			</div>
			<!-- area description/ -->
			<div style="margin: 20px 10px;">
				<?php echo html_entity_decode($factoryBuilding['FactoryBuilding']['note']); ?>
			</div>
			<!-- area description/ -->
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
					<col width="36%" />
					<col width="" />
					<tr>
						<th><span><?php echo __('developer'); ?></span></th>
						<td><?php echo h($factoryBuilding['FactoryBuilding']['developer']); ?></td>
					</tr>
					<tr>
						<th><span><?php echo __('area'); ?></span></th>
						<td><?php echo h($factoryBuilding['FactoryArea']['name']); ?></td>
					</tr>
					<tr>
						<th><span><?php echo __('address'); ?></span></th>
						<td><?php echo h($factoryBuilding['FactoryBuilding']['address']); ?></td>
					</tr>
					<tr>
						<th><span><?php echo __('above-sea-levels'); ?></span></th>
						<td>
<?php if (isset($factoryBuilding['FactoryBuilding']['altitude']) && !empty($factoryBuilding['FactoryBuilding']['altitude'])) { ?>
							<?php echo number_format(h(str_replace(',','',$factoryBuilding['FactoryBuilding']['altitude']))); ?>m
<?php } else { ?>
							&nbsp;
<?php } ?>
						</td>
					</tr>
					<tr>
						<th><span><?php echo __('completion-year'); ?></span></th>
						<td>
<?php if (isset($factoryBuilding['FactoryBuilding']['complated']) && !empty($factoryBuilding['FactoryBuilding']['complated'])) { ?>
							<?php echo h($factoryBuilding['FactoryBuilding']['complated']);echo __('year-jp'); ?>
<?php } else { ?>
							&nbsp;
<?php } ?>
						</td>
					</tr>
					<tr>
						<th><span><?php echo __('site-area'); ?></span></th>
						<td>
<?php if (isset($factoryBuilding['FactoryBuilding']['develop_area']) && !empty($factoryBuilding['FactoryBuilding']['develop_area'])) { ?>
							<?php echo number_format(h(str_replace(',','',$factoryBuilding['FactoryBuilding']['develop_area']))); ?>ha
<?php } else { ?>
							&nbsp;
<?php } ?>
						</td>
					</tr>
					<tr>
						<th><span><?php echo __('lease-expiration-year'); ?></span></th>
						<td>
<?php if (isset($factoryBuilding['FactoryBuilding']['lease_expiration']) && !empty($factoryBuilding['FactoryBuilding']['lease_expiration'])) { ?>
							<?php echo h($factoryBuilding['FactoryBuilding']['lease_expiration']);echo __('year-jp'); ?>
<?php } else { ?>
							&nbsp;
<?php } ?>
						</td>
					</tr>
					<tr>
						<th><span><?php echo __('notable-tenants'); ?></span></th>
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

				<!-- <div class="box_share">
					<dl class="clearfix">
						<dt><img src="<?php echo $this->webroot; ?>common/images/search/btn_share.png" width="159" height="35" alt="この物件をシェアする" /></dt>
						<dd>
							<div class="fb-like" data-send="false" data-layout="button_count" data-width="120" data-show-faces="false"></div>
						</dd>
					</dl>
				</div> -->
			</div>
		</div>
		<div class="modal cpList">
		<div class="modalBody">
			<h3 class="detail_hgroup"><span><?php echo __('notable-tenants'); ?></span></h3>
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
		<h3 class="detail_hgroup"><?php echo __('infrastructure-environment'); ?></h3>
		<div class="detail_article_feature">
			<ul class="clearfix search_column_type">
<?php foreach(Configure::read('Facility.FactoryBuilding') as $key => $val) { ?>
<?php     if ($factoryBuilding['FactoryBuilding'][$key] == '1') { ?>
				<li class="type-item d-inline-block on">
					<?php echo __($val); ?>
				</li>
<?php     } else { ?>
				<li class="type-item d-inline-block off">
					<?php echo __($val); ?>
				</li>
<?php     } ?>
<?php } ?>
			</ul>
			<table summary="インフラ環境・施設">
				<col width="15%" />
				<col width="35%" />
				<col width="15%" />
				<col width="35%" />
				<tr>
					<th><span><?php echo __('motorway'); ?></span></th>
					<td>
<?php     if (isset($factoryBuilding['FactoryBuilding']['highway']) && !empty($factoryBuilding['FactoryBuilding']['highway'])) { ?>
						<?php echo h($factoryBuilding['FactoryBuilding']['highway']); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
					<th><span><?php echo __('drainage-wate'); ?></span></th>
					<td>
<?php     if (isset($factoryBuilding['FactoryBuilding']['sewer']) && !empty($factoryBuilding['FactoryBuilding']['sewer'])) { ?>
						<?php echo h($factoryBuilding['FactoryBuilding']['sewer']); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
				</tr>
				<tr>
					<th><span><?php echo __('industrial-water'); ?></span></th>
					<td>
<?php     if (isset($factoryBuilding['FactoryBuilding']['waterworks']) && !empty($factoryBuilding['FactoryBuilding']['waterworks'])) { ?>
						<?php echo h($factoryBuilding['FactoryBuilding']['waterworks']); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
					<th><span><?php echo __('stormwater-treatment'); ?></span></th>
					<td>
<?php     if (isset($factoryBuilding['FactoryBuilding']['reservoir']) && !empty($factoryBuilding['FactoryBuilding']['reservoir'])) { ?>
						<?php echo h($factoryBuilding['FactoryBuilding']['reservoir']); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
				</tr>
				<tr>
					<th><span><?php echo __('electric-power'); ?></span></th>
					<td>
<?php     if (isset($factoryBuilding['FactoryBuilding']['electricity']) && !empty($factoryBuilding['FactoryBuilding']['electricity'])) { ?>
						<?php echo h($factoryBuilding['FactoryBuilding']['electricity']); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
					<th><span><?php echo __('natural-gas'); ?></span></th>
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
					<th><span><?php echo __('telephone'); ?></span></th>
					<td>
<?php     if (isset($factoryBuilding['FactoryBuilding']['telephone']) && !empty($factoryBuilding['FactoryBuilding']['telephone'])) { ?>
						<?php echo h($factoryBuilding['FactoryBuilding']['telephone']); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
					<th><span><?php echo __('security'); ?></span></th>
					<td>
<?php     if (isset($factoryBuilding['FactoryBuilding']['security']) && !empty($factoryBuilding['FactoryBuilding']['security'])) { ?>
						<?php echo h($factoryBuilding['FactoryBuilding']['security']); ?>
<?php     } else { ?>
						&nbsp;
<?php     } ?>
					</td>
				</tr>
				<tr>

					<th><span><?php echo __('management-fee'); ?></span></th>
					<td>
<?php         if (isset($factoryBuilding['FactoryBuilding']['management_cost']) && !empty($factoryBuilding['FactoryBuilding']['management_cost'])) { ?>
						<?php echo h(number_format($factoryBuilding['FactoryBuilding']['management_cost'], 1)); ?>&nbsp;USD/m&sup2;
<?php         } else { ?>
						&nbsp;
<?php         } ?>
					</td>
					<th><span><?php echo __('remarks'); ?></span></th>
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
		<h3 class="detail_hgroup"><?php echo __('distance-major-areas'); ?></h3>
		<div class="detail_article_feature">
		<ul class="clearfix">
		</ul>
<?php
		//エリアサーチ（北部・中部）
		$area_master = array( 'north' => array( 'Phu Tho', 'Ninh Binh', 'Lang Son', 'Thai Nguyen', 'Vinh Phuc', 'Ha Noi', 'Hoa Binh', 'Bac Ninh', 'Bac Giang', 'Hai Duong', 'Hung Yen', 'Hai Phong', 'Ha Nam', 'Nam Dinh', 'Quang Ninh', 'Thai Binh' ), 'center' => array( 'Da Nang', 'Phu Yen', 'Nghe An') );

		$find = false;
		foreach( $area_master as $key => $arr_s ) {
			if ( array_search( $factoryBuilding['FactoryArea']['name'], $arr_s ) !== false ) {
				$find = true;
				break;
			}
		}
		
		if ( !$find ) {
			//南部
			$disp1 = "<span>".__('from-hochiminh-city')."</span>";
			$disp2 = "<span>".__('from-tansonnhat-airport')."</span>";
			$disp3 = "<span>".__('from-longthanh-airport')."</span>";
			$disp4 = "<span>".__('form-newsaigon-port')."</span>";
			$disp5 = "<span>".__('from-catlai-port')."</span>";
			$disp6 = "<span>".__('from-thivai-port')."</span>";
		} else {
			if ( $key == "north" ) {
				//北部
				$disp1 = "<span>".__('from-hanoi-city')."</span>";
				$disp2 = "<span>".__('from-noibai-airport')."</span>";
				$disp3 = "<span>".__('from-haiphong-port')."</span>";
				$disp4 = "<span>".__('from-catbi-airport')."</span>";
				$disp5 = "<span>".__('from-tienlang-airport')."</span>";
				$disp6 = "<span>".__('from-cailan-port')."</span>";
			} else {
				//中部
				$disp1 = "<span>".__('from-danang-city')."</span>";
				$disp2 = "<span>".__('from-danang-airport')."</span>";
				$disp3 = "<span>".__('from-tiensa-port')."</span>";
				$disp4 = "<span>".__('from-lienchieu-port')."</span>";
				$disp5 = "<span>".__('from-rong-bridge')."</span>";
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
					<th><span><?php echo __('from-vungtau-port'); ?></span></th>
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

		<!-- contents_inquiry/ -->
<?php echo $this->element('section_contact'); ?>
		<!-- /contents_inquiry -->
