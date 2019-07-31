<script src="<?php echo $this->webroot; ?>common/js/jquery.index.tab.js" type="text/javascript" charset="UTF-8"></script>
		<div class="index_section_main_discription">東京デベロップメントコンサルタントで取り扱うベトナムの不動産賃貸物件（工場・工業団地・事務所・住まい）を、オンライン検索できます。さらに詳しい情報も物件ごとに掲載しています。各物件についてのお問い合わせはお気軽に！</div>

		<div class="index_section_main clearfix">
			<div class="index_main_s1">
				<p><img src="<?php echo $this->webroot; ?>common/images/top/index_main_s1_img01.jpg" width="230" height="280" alt="" /></p>
				<h3><img src="<?php echo $this->webroot; ?>common/images/top/index_main_s1_ttl01.png" width="230" height="92" alt="工場・工業用地を探す" /></h3>
				<p><img src="<?php echo $this->webroot; ?>common/images/top/index_main_s1_txt01.png" width="230" height="48" alt="工場・倉庫、ベトナムの進出もお任せください。BOI区分地図などの詳細もご覧になれます。" /></p>
				<p class="imgbtn"><a href="<?php echo $this->webroot; ?>factory/area/"><img src="<?php echo $this->webroot; ?>common/images/top/index_main_s1_btn01.png" width="230" height="70" alt="ベトナム全域の工業団地から探す" /></a></p>
				<p class="imgbtn"><a href="<?php echo $this->webroot; ?>factory/area/all"><img src="<?php echo $this->webroot; ?>common/images/top/index_main_s1_btn02.png" width="230" height="70" alt="ベトナム全域の物件一覧から探す" /></a></p>
			</div>
			<div class="index_main_s2">
				<p><img src="<?php echo $this->webroot; ?>common/images/top/index_main_s2_img01.jpg" width="230" height="280" alt="" /></p>
				<h3><img src="<?php echo $this->webroot; ?>common/images/top/index_main_s2_ttl01.png" width="230" height="70" alt="事務所を探す" /></h3>
				<p><img src="<?php echo $this->webroot; ?>common/images/top/index_main_s2_txt01.png" width="230" height="70" alt="ホーチミン・ハノイ・ダナンの事務所のほか、店舗、ショップなど、多数お取扱いしております。" /></p>
				<p class="imgbtn"><a href="<?php echo $this->webroot; ?>office/area/"><img src="<?php echo $this->webroot; ?>common/images/top/index_main_s2_btn01_hmc.png" width="230" height="70" alt="ホーチミンで探す" /></a></p>
				<p class="imgbtn"><a href="<?php echo $this->webroot; ?>office/area/hanoi/"><img src="<?php echo $this->webroot; ?>common/images/top/index_main_s2_btn01_hanoi.png" width="230" height="70" alt="ハノイで探す" /></a></p>
			</div>
			<div class="index_main_s3">
				<p><img src="<?php echo $this->webroot; ?>common/images/top/index_main_s3_img01.jpg" width="230" height="280" alt="" /></p>
				<h3><img src="<?php echo $this->webroot; ?>common/images/top/index_main_s3_ttl01.png" width="230" height="70" alt="住まいを探す" /></h3>
				<p><img src="<?php echo $this->webroot; ?>common/images/top/index_main_s3_txt01.png" width="230" height="70" alt="ホーチミン・ハノイ・ダナンのアパート・マンション、コンドミニアム、サービスアパートまで、多数の物件をご紹介" /></p>
				<p class="imgbtn"><a href="<?php echo $this->webroot; ?>residence/area/"><img src="<?php echo $this->webroot; ?>common/images/top/index_main_s2_btn01_hmc.png" width="230" height="70" alt="ホーチミンで探す" /></a></p>
				<p class="imgbtn"><a href="<?php echo $this->webroot; ?>residence/area/hanoi/"><img src="<?php echo $this->webroot; ?>common/images/top/index_main_s2_btn01_hanoi.png" width="230" height="70" alt="駅から探す" /></a></p>
			</div>
		</div>
		<!-- /index_section_main -->

		<?php echo $this->Form->hidden('factory_tab_img_on',    array('id' => 'factory_tab_img_on',    'value' => $this->webroot . 'common/images/top/index_detail_btn01_on.gif')); ?>
		<?php echo $this->Form->hidden('office_tab_img_on',     array('id' => 'office_tab_img_on',     'value' => $this->webroot . 'common/images/top/index_detail_btn02_on.gif')); ?>
		<?php echo $this->Form->hidden('residence_tab_img_on',  array('id' => 'residence_tab_img_on',  'value' => $this->webroot . 'common/images/top/index_detail_btn03_on.gif')); ?>
		<?php echo $this->Form->hidden('factory_tab_img_off',   array('id' => 'factory_tab_img_off',   'value' => $this->webroot . 'common/images/top/index_detail_btn01.gif')); ?>
		<?php echo $this->Form->hidden('office_tab_img_off',    array('id' => 'office_tab_img_off',    'value' => $this->webroot . 'common/images/top/index_detail_btn02.gif')); ?>
		<?php echo $this->Form->hidden('residence_tab_img_off', array('id' => 'residence_tab_img_off', 'value' => $this->webroot . 'common/images/top/index_detail_btn03.gif')); ?>

<?php foreach ($addInfos as $addInfo) { ?>
<?php     $addInfoId = $addInfo['AddInformation']['id']; if ( $addInfoId == 8 ) continue; //駅近 削除 ?>
<?php     $colName   = 'add_information' . $addInfoId; ?>
<?php     if (count($residenceBuildings[$colName]) > 0 || count($officeBuildings[$colName]) > 0 || count($factoryBuildings[$colName]) > 0) { ?>
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
				<?php echo $addInfo['AddInformation']['name']; ?>物件
<?php         } ?>
			</h3>
			<ul class="index_detail_nav clearfix">
<?php         if (count($factoryBuildings[$colName]) > 0) { ?>
				<li class="factory_tab"><a href="#"><img src="<?php echo $this->webroot; ?>common/images/top/index_detail_btn01.gif" width="180" height="45" alt="工場・工業用地" /></a></li>
<?php         } ?>
<?php         if (count($officeBuildings[$colName]) > 0) { ?>
				<li class="office_tab"><a href="#"><img src="<?php echo $this->webroot; ?>common/images/top/index_detail_btn02.gif" width="180" height="45" alt="事務所" /></a></li>
<?php         } ?>
<?php         if (count($residenceBuildings[$colName]) > 0) { ?>
				<li class="residence_tab"><a href="#"><img src="<?php echo $this->webroot; ?>common/images/top/index_detail_btn03.gif" width="180" height="45" alt="住まい" /></a></li>
<?php         } ?>
			</ul>
			<div class="index_section_detail clearfix">
				<!-- 工場 -->
				<div class="factory_tab_contents tab_contents">
					<div id="<?php echo $colName; ?>List_factory" class="clearfix">
<?php         if ($addInfo['AddInformation']['id'] == '1' || $addInfo['AddInformation']['id'] == '2') { ?>
<?php             //1段の場合 ?>
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