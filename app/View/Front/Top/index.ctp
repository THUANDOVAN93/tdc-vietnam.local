<script src="<?php echo $this->webroot; ?>common/js/jquery.index.tab.js" type="text/javascript" charset="UTF-8"></script>
		<div class="index_section_main_discription">
		<?php
				if (Configure::read('Config.language') == 'eng')
			{ ?>
				TDC Vietnam is the place where manufacturers can search factories (land or rental factory), industrial parks and warehouses in Vietnam. <br>
				Having more than 10 years experience in Vietnam since establishment of 2007, we have wide range of options and reliable networks. <br>
				Based on your requirements such as location, area, purpose, and when your factory will start operation etc, we will provide option for you! Please feel free to contact us via email or call.
			<?php } else { ?>
				TDCベトナムはベトナムに進出を検討中の企業様のレンタル工場（貸し工場）・工場用地（購入）探しをお手伝いいたします。<br>
				ご希望の条件（エリア、平米、用途、入居時期など）をお伝えいただければ適切な物件を無料ご紹介、コンサルティングいたしますので、お気軽にお電話またはメールでご連絡ください。日本人が丁寧に対応いたします。
			<?php } ?>
		</div>
		<div class="index_section_main clearfix">
			<div class="index_main_full">
				<p>
				<?php if (Configure::read('Config.language') == 'eng') { ?>
					<img style="border-bottom: 2px solid #000" src="<?php echo $this->webroot; ?>common/images/top/index_main_l1_img01_en.png" width="730" height="174" alt="" />
				<?php } else { ?>
					<img style="border-bottom: 2px solid #000" src="<?php echo $this->webroot; ?>common/images/top/index_main_l1_img01_jp.png" width="730" height="174" alt="" />
				<?php } ?>
				</p>
			</div>
			<p class="search_area_read">
				<?php echo __('search-area-direction'); ?></p>
			<p id="map"><img src="<?php echo $this->webroot; ?>common/images/search/factory_index_map.png?ver=2" alt="map vietnam" width="730" height="710" border="0" usemap="#Map" />
				<map name="Map" id="Map">
					<area shape="rect" coords="140,589,280,619" href="<?php echo $this->webroot; ?>factory/area/list/2/" />
					<area shape="rect" coords="549,578,690,609" href="<?php echo $this->webroot; ?>factory/area/list/3/" />
					<area shape="rect" coords="549,618,689,648" href="<?php echo $this->webroot; ?>factory/area/list/4/" />
					<area shape="rect" coords="140,628,280,658" href="<?php echo $this->webroot; ?>factory/area/list/5/" />
					<area shape="rect" coords="549,657,689,687" href="<?php echo $this->webroot; ?>factory/area/list/6/" />
					<area shape="rect" coords="549,539,689,569" href="<?php echo $this->webroot; ?>factory/area/list/7/" />
					<area shape="rect" coords="140,549,280,579" href="<?php echo $this->webroot; ?>factory/area/list/8/" />
					<area shape="rect" coords="246,348,385,377" href="<?php echo $this->webroot; ?>factory/area/list/9/" />
					<area shape="rect" coords="546,86,685,115" href="<?php echo $this->webroot; ?>factory/area/list/11/" />
					<area shape="rect" coords="37,175,177,205" href="<?php echo $this->webroot; ?>factory/area/list/12/" />
					<!-- Add nghe an province -->
					<area shape="rect" coords="37,232,177,260" href="<?php echo $this->webroot; ?>factory/area/list/28/" />
					<!-- Add nghe an province -->
					<area shape="rect" coords="397,18,537,48" href="<?php echo $this->webroot; ?>factory/area/list/13/" />
					<area shape="rect" coords="545,125,685,155" href="<?php echo $this->webroot; ?>factory/area/list/14/" />
					<area shape="rect" coords="545,164,685,194" href="<?php echo $this->webroot; ?>factory/area/list/15/" />
					<area shape="rect" coords="436,204,577,234" href="<?php echo $this->webroot; ?>factory/area/list/16/" />
					<area shape="rect" coords="436,243,577,273" href="<?php echo $this->webroot; ?>factory/area/list/17/" />
					<area shape="rect" coords="37,96,177,126" href="<?php echo $this->webroot; ?>factory/area/list/18/" />
					<area shape="rect" coords="397,58,537,88" href="<?php echo $this->webroot; ?>factory/area/list/19/" />
					<area shape="rect" coords="38,136,177,165" href="<?php echo $this->webroot; ?>factory/area/list/20/" />
				</map>
			</p>
		</div>
		<!-- /index_section_main -->

		<?php echo $this->Form->hidden('factory_tab_img_on',    array('id' => 'factory_tab_img_on',    'value' => $this->webroot . 'common/images/top/index_detail_btn01_on.gif')); ?>
<?php 
	foreach ($addInfos as $addInfo) {
		$addInfoId = $addInfo['AddInformation']['id'];
		if ( $addInfoId == 8 || $addInfoId == 6 ) continue;
		$colName   = 'add_information' . $addInfoId;
		if (count($residenceBuildings[$colName]) > 0 || count($officeBuildings[$colName]) > 0 || count($factoryBuildings[$colName]) > 0) {
?>
	<!-- tab_area/ -->
		<div class="tab_area">
			<h3 class="index_detail_ttl">
<?php         if ($addInfoId == '1') { ?>
				<img src="<?php echo $this->webroot; ?>common/images/top/index_detail_ttl_recent.png" width="730" height="50" alt="新着物件" />
<?php         } else if ($addInfoId == '2') { ?>
				<img src="<?php echo $this->webroot; ?>common/images/top/index_detail_ttl_recommended.png" width="730" height="50" alt="おすすめ物件" />
<?php         } else if ($addInfoId == '3') { ?>
				<img src="<?php echo $this->webroot; ?>common/images/top/index_detail_ttl_station.png" width="730" height="50" alt="駅近物件" />
<?php         } else { ?>
				<?php
					echo __('recommendation');
				?>
<?php         } ?>
			</h3>
			<ul class="index_detail_nav clearfix">
<?php         if (count($factoryBuildings[$colName]) > 0) { ?>
				<li class="factory_tab"><span>Factory and Land</span></li>
				<!-- <li class="factory_tab"><a href="#"> alt="工場・工業用地" /></a></li> -->
<?php         } ?>
			</ul>
			<div class="index_section_detail clearfix">
				<div class="factory_tab_contents tab_contents">
					<div id="<?php echo $colName; ?>List_factory" class="clearfix">
<?php         if ($addInfo['AddInformation']['id'] == '1' || $addInfo['AddInformation']['id'] == '2') { ?>
<?php             foreach ($factoryBuildings[$colName] as $factoryBuildingSel) { ?>
						<table summary="<?php echo $addInfo['AddInformation']['name']; ?>物件">
							<tr>
<?php                 foreach ($factoryBuildingSel as $factoryBuilding) { ?>
<?php                     if (count($factoryBuilding) > 0) { ?>
								<td>
									<a href="<?php echo $this->webroot; ?>factory/area/detail/<?php echo h($factoryBuilding['FactoryBuilding']['id']); ?>"><span class="index_detail_photo">
<?php                         if (isset($factoryBuilding['FactoryBuilding']['newly']) && $factoryBuilding['FactoryBuilding']['newly'] == '1') { ?>
									<span><img src="<?php echo $this->webroot; ?>common/images/top/index_detail_new.gif" alt="" /></span>
<?php                         } ?>
<?php                         if (isset($factoryBuilding['FactoryPhoto']['path'])) { ?>
									<img src="<?php echo $this->webroot; ?>upload/FactoryBuildings/tmb_main_<?php echo $factoryBuilding['FactoryPhoto']['path']; ?>" alt="<?php h($factoryBuilding['FactoryPhoto']['caption']); ?>" />
<?php                         } else { ?>
									<img src="<?php echo $this->webroot; ?>common/images/noimage-list.png" alt="NO IMAGE" />
<?php                         } ?>
									</span></a>
									<p class="index_detail_text"><a href="<?php echo $this->webroot; ?>factory/area/detail/<?php echo h($factoryBuilding['FactoryBuilding']['id']); ?>"><?php echo h($factoryBuilding['FactoryBuilding']['name']); ?></a></p>
								</td>
<?php                     } else { ?>
								<td>&nbsp;</td>
<?php                     } ?>
<?php                 } ?>
							</tr>
						</table>
<?php             } ?>
<?php         } else { ?>
<?php             //2段の場合 ?>
<?php             foreach ($factoryBuildings[$colName] as $factoryBuildingSel) { ?>
						<table summary="<?php echo $addInfo['AddInformation']['name']; ?>物件">
<?php                 foreach ($factoryBuildingSel as $factoryBuildingRow) { ?>
							<tr>
<?php                     foreach ($factoryBuildingRow as $factoryBuilding) { ?>
<?php                         if (count($factoryBuilding) > 0) { ?>
								<td>
									<a href="<?php echo $this->webroot; ?>factory/area/detail/<?php echo h($factoryBuilding['FactoryBuilding']['id']); ?>"><span class="index_detail_photo">
<?php                             if (isset($factoryBuilding['FactoryBuilding']['newly']) && $factoryBuilding['FactoryBuilding']['newly'] == '1') { ?>
									<span><img src="<?php echo $this->webroot; ?>common/images/top/index_detail_new.gif" alt="" /></span>
<?php                             } ?>
<?php                             if (isset($factoryBuilding['FactoryPhoto']['path'])) { ?>
									<img src="<?php echo $this->webroot; ?>upload/FactoryBuildings/tmb_main_<?php echo $factoryBuilding['FactoryPhoto']['path']; ?>" alt="<?php h($factoryBuilding['FactoryPhoto']['caption']); ?>" />
<?php                             } else { ?>
									<img src="<?php echo $this->webroot; ?>common/images/noimage-list.png" alt="NO IMAGE" />
<?php                             } ?>
									</span></a>
									<p class="index_detail_text"><a href="<?php echo $this->webroot; ?>factory/area/detail/<?php echo h($factoryBuilding['FactoryBuilding']['id']); ?>"><?php echo h($factoryBuilding['FactoryBuilding']['name']); ?></a></p>
								</td>
<?php                         } else { ?>
								<td><p style="height:178px;"></p></td>
<?php                         } ?>
<?php                     } ?>
							</tr>
<?php                 } ?>
						</table>
<?php             } ?>
<?php         } ?>
					</div>
					<div class="slider_nav">
						<p class="prev"><a id="<?php echo $colName; ?>Prev_factory" href="#"><span>prev</span></a></p>
						<div id="<?php echo $colName; ?>Page_factory" class="pagination"></div>
						<p class="next"><a id="<?php echo $colName; ?>Next_factory" href="#"><span>next</span></a></p>
					</div>
				</div>
				<!-- 事務所 -->
				<div class="office_tab_contents tab_contents">
					<div id="<?php echo $colName; ?>List_office" class="clearfix">
<?php         if ($addInfo['AddInformation']['id'] == '1' || $addInfo['AddInformation']['id'] == '2') { ?>
<?php             //1段の場合 ?>
<?php             foreach ($officeBuildings[$colName] as $officeBuildingSel) { ?>
						<table summary="<?php echo $addInfo['AddInformation']['name']; ?>物件">
							<tr>
<?php                 foreach ($officeBuildingSel as $officeBuilding) { ?>
<?php                     if (count($officeBuilding) > 0) { ?>
								<td>
									<a href="<?php echo $this->webroot; ?>office/area/detail/<?php echo h($officeBuilding['OfficeBuilding']['id']); ?>"><span class="index_detail_photo">
<?php                         if (isset($officeBuilding['OfficeBuilding']['newly']) && $officeBuilding['OfficeBuilding']['newly'] == '1') { ?>
									<span><img src="<?php echo $this->webroot; ?>common/images/top/index_detail_new.gif" alt="" /></span>
<?php                         } ?>
<?php                         if (isset($officeBuilding['OfficePhoto']['path'])) { ?>
									<img src="<?php echo $this->webroot; ?>upload/OfficeBuildings/tmb_main_<?php echo $officeBuilding['OfficePhoto']['path']; ?>" alt="<?php h($officeBuilding['OfficePhoto']['caption']); ?>" />
<?php                         } else { ?>
									<img src="<?php echo $this->webroot; ?>common/images/noimage-list.png" alt="NO IMAGE" />
<?php                         } ?>
									</span></a>
									<p class="index_detail_text"><a href="<?php echo $this->webroot; ?>office/area/detail/<?php echo h($officeBuilding['OfficeBuilding']['id']); ?>"><?php echo h($officeBuilding['OfficeBuilding']['name']); ?></a></p>
								</td>
<?php                     } else { ?>
								<td>&nbsp;</td>
<?php                     } ?>
<?php                 } ?>
							</tr>
						</table>
<?php             } ?>
<?php         } else { ?>
<?php             //2段の場合 ?>
<?php             foreach ($officeBuildings[$colName] as $officeBuildingSel) { ?>
						<table summary="<?php echo $addInfo['AddInformation']['name']; ?>物件">
<?php                 foreach ($officeBuildingSel as $officeBuildingRow) { ?>
							<tr>
<?php                     foreach ($officeBuildingRow as $officeBuilding) { ?>
<?php                         if (count($officeBuilding) > 0) { ?>
								<td>
									<a href="<?php echo $this->webroot; ?>office/area/detail/<?php echo h($officeBuilding['OfficeBuilding']['id']); ?>"><span class="index_detail_photo">
<?php                             if (isset($officeBuilding['OfficeBuilding']['newly']) && $officeBuilding['OfficeBuilding']['newly'] == '1') { ?>
									<span><img src="<?php echo $this->webroot; ?>common/images/top/index_detail_new.gif" alt="" /></span>
<?php                             } ?>
<?php                             if (isset($officeBuilding['OfficePhoto']['path'])) { ?>
									<img src="<?php echo $this->webroot; ?>upload/OfficeBuildings/tmb_main_<?php echo $officeBuilding['OfficePhoto']['path']; ?>" alt="<?php h($officeBuilding['OfficePhoto']['caption']); ?>" />
<?php                             } else { ?>
									<img src="<?php echo $this->webroot; ?>common/images/noimage-list.png" alt="NO IMAGE" />
<?php                             } ?>
									</span></a>
									<p class="index_detail_text"><a href="<?php echo $this->webroot; ?>office/area/detail/<?php echo h($officeBuilding['OfficeBuilding']['id']); ?>"><?php echo h($officeBuilding['OfficeBuilding']['name']); ?></a></p>
								</td>
<?php                         } else { ?>
								<td><p style="height:178px;"></p></td>
<?php                         } ?>
<?php                     } ?>
							</tr>
<?php                 } ?>
						</table>
<?php             } ?>
<?php         } ?>
					</div>
					<div class="slider_nav">
						<p class="prev"><a id="<?php echo $colName; ?>Prev_office" href="#"><span>prev</span></a></p>
						<div id="<?php echo $colName; ?>Page_office" class="pagination"></div>
						<p class="next"><a id="<?php echo $colName; ?>Next_office" href="#"><span>next</span></a></p>
					</div>
				</div>
				<!-- 住まい -->
				<div class="residence_tab_contents tab_contents">
					<div id="<?php echo $colName; ?>List_residence" class="clearfix">
<?php         if ($addInfo['AddInformation']['id'] == '1' || $addInfo['AddInformation']['id'] == '2') { ?>
<?php             //1段の場合 ?>
<?php             foreach ($residenceBuildings[$colName] as $residenceBuildingSel) { ?>
						<table summary="<?php echo $addInfo['AddInformation']['name']; ?>物件">
							<tr>
<?php                 foreach ($residenceBuildingSel as $residenceBuilding) { ?>
<?php                     if (count($residenceBuilding) > 0) { ?>
								<td>
									<a href="<?php echo $this->webroot; ?>residence/area/detail/<?php echo h($residenceBuilding['ResidenceBuilding']['id']); ?>"><span class="index_detail_photo">
<?php                         if (isset($residenceBuilding['ResidenceBuilding']['newly']) && $residenceBuilding['ResidenceBuilding']['newly'] == '1') { ?>
									<span><img src="<?php echo $this->webroot; ?>common/images/top/index_detail_new.gif" alt="" /></span>
<?php                         } ?>
<?php                         if (isset($residenceBuilding['ResidencePhoto']['path'])) { ?>
									<img src="<?php echo $this->webroot; ?>upload/ResidenceBuildings/tmb_main_<?php echo $residenceBuilding['ResidencePhoto']['path']; ?>" alt="<?php h($residenceBuilding['ResidencePhoto']['caption']); ?>" />
<?php                         } else { ?>
									<img src="<?php echo $this->webroot; ?>common/images/noimage-list.png" alt="NO IMAGE" />
<?php                         } ?>
									</span></a>
									<p class="index_detail_text"><a href="<?php echo $this->webroot; ?>residence/area/detail/<?php echo h($residenceBuilding['ResidenceBuilding']['id']); ?>"><?php echo h($residenceBuilding['ResidenceBuilding']['name']); ?></a></p>
								</td>
<?php                     } else { ?>
								<td>&nbsp;</td>
<?php                     } ?>
<?php                 } ?>
							</tr>
						</table>
<?php             } ?>
<?php         } else { ?>
<?php             //2段の場合 ?>
<?php             foreach ($residenceBuildings[$colName] as $residenceBuildingSel) { ?>
						<table summary="<?php echo $addInfo['AddInformation']['name']; ?>物件">
<?php                 foreach ($residenceBuildingSel as $residenceBuildingRow) { ?>
							<tr>
<?php                     foreach ($residenceBuildingRow as $residenceBuilding) { ?>
<?php                         if (count($residenceBuilding) > 0) { ?>
								<td>
									<a href="<?php echo $this->webroot; ?>residence/area/detail/<?php echo h($residenceBuilding['ResidenceBuilding']['id']); ?>"><span class="index_detail_photo">
<?php                             if (isset($residenceBuilding['ResidenceBuilding']['newly']) && $residenceBuilding['ResidenceBuilding']['newly'] == '1') { ?>
									<span><img src="<?php echo $this->webroot; ?>common/images/top/index_detail_new.gif" alt="" /></span>
<?php                             } ?>
<?php                             if (isset($residenceBuilding['ResidencePhoto']['path'])) { ?>
									<img src="<?php echo $this->webroot; ?>upload/ResidenceBuildings/tmb_main_<?php echo $residenceBuilding['ResidencePhoto']['path']; ?>" alt="<?php h($residenceBuilding['ResidencePhoto']['caption']); ?>" />
<?php                             } else { ?>
									<img src="<?php echo $this->webroot; ?>common/images/noimage-list.png" alt="NO IMAGE" />
<?php                             } ?>
									</span></a>
									<p class="index_detail_text"><a href="<?php echo $this->webroot; ?>residence/area/detail/<?php echo h($residenceBuilding['ResidenceBuilding']['id']); ?>"><?php echo h($residenceBuilding['ResidenceBuilding']['name']); ?></a></p>
								</td>
<?php                         } else { ?>
								<td><p style="height:178px;"></p></td>
<?php                         } ?>
<?php                     } ?>
							</tr>
<?php                 } ?>
						</table>
<?php             } ?>
<?php         } ?>
					</div>
					<div class="slider_nav">
						<p class="prev"><a id="<?php echo $colName; ?>Prev_residence" href="#"><span>prev</span></a></p>
						<div id="<?php echo $colName; ?>Page_residence" class="pagination"></div>
						<p class="next"><a id="<?php echo $colName; ?>Next_residence" href="#"><span>next</span></a></p>
					</div>
				</div>
			</div>
		</div>
		<!-- /tab_area -->
<?php     } ?>
<?php } ?>
<?php echo $this->element('section_contact'); ?>