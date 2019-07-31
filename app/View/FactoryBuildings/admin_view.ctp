<div class="container">
	<h2>工場物件管理</h2>
	<ul class="nav nav-tabs">
		<li><?php echo $this->Html->link('工場物件一覧', array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('工場物件の追加', array('action' => 'add')); ?></li>
		<li class="active"><a>工場物件の情報</a></li>
		<li><?php echo $this->Html->link('工場物件の編集', array('action' => 'edit', $factoryBuilding['FactoryBuilding']['id'])); ?></li>
		<!--
		<li>		<li><?php echo $this->Form->postLink(__('Delete %s', __('工場物件')), array('action' => 'delete', $factoryBuilding['FactoryBuilding']['id']), null, __('Are you sure you want to delete # %s?', $factoryBuilding['FactoryBuilding']['id'])); ?> </li>
</li>
		-->
	</ul>
	<div class="span5">
		<p class="lead">物件管理</p>
		<table class="table">
			<tr>
				<td style="width: 100px"><strong>工場物件ID</strong></td>
				<td><?php echo h($factoryBuilding['FactoryBuilding']['id']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>作成日時</strong></td>
				<td><?php echo h($factoryBuilding['FactoryBuilding']['created']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>更新日時</strong></td>
				<td><?php echo h($factoryBuilding['FactoryBuilding']['updated']); ?>&nbsp;</td>
			</tr>
			<?php
				$alert_id = $factoryBuilding['FactoryBuilding']['alert_id'];
				$alerts   = Configure::read('AlertTerm');
				$alert    = array(
					0  => $alerts[0]['name'],
					1  => $alerts[1]['name'],
					2  => $alerts[2]['name'],
					3  => $alerts[3]['name']
				);
			?>
			<?php if($alert_id == 0): ?>
			<tr class="warning">
			<?php else: ?>
			<tr>
			<?php endif; ?>
				<td><strong>更新頻度</strong></td>
				<td><?php echo h($alert[$alert_id]); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>優先順位</strong></td>
				<td><?php
					$priority = array(
						1  => '1 (優先度：高) ',
						2  => '2',
						3  => '3 (優先度：中)',
						4  => '4',
						5  => '5 (優先度：低)'
					);
					echo h($priority[$factoryBuilding['FactoryBuilding']['priority']]);
				?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>物件種別</strong></td>
				<td><?php echo h($factoryBuilding['FactoryCategory']['name']); ?>&nbsp;</td>
			</tr>
		</table>

		<p class="lead">物件情報</p>
		<table class="table">
			<tr>
				<td style="width: 100px"><strong>プロジェクト名</strong></td>
				<td><?php echo h($factoryBuilding['FactoryBuilding']['name']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>BOIゾーン</strong></td>
				<td><?php
					$boi_zone = array(
						1  => 'ZONE1',
						2  => 'ZONE2',
						3  => 'ZONE3-1',
						4  => 'ZONE3-2'
					);
					echo h($boi_zone[$factoryBuilding['FactoryBuilding']['boi_zone']]);
				?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>一般加工区(GIZ)</strong></td>
				<td><input type="checkbox" <?php
					echo ($factoryBuilding['FactoryBuilding']['giz'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>輸出加工区(EPZ)</strong></td>
				<td><input type="checkbox" <?php
					echo ($factoryBuilding['FactoryBuilding']['epz'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>フリーゾーン(FZ)</strong></td>
				<td><input type="checkbox" <?php
					echo ($factoryBuilding['FactoryBuilding']['fz'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>工業団地公社(IATE)傘下</strong></td>
				<td><input type="checkbox" <?php
					echo ($factoryBuilding['FactoryBuilding']['iate'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>開発業者</strong></td>
				<td><?php echo h($factoryBuilding['FactoryBuilding']['developer']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>住所</strong></td>
				<td><?php echo h($factoryBuilding['FactoryBuilding']['address']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>エリア</strong></td>
				<td><?php echo h($factoryBuilding['Area']['name']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>位置情報</strong></td>
				<td><?php
					$location_url = '';
					$latitude     = $factoryBuilding['FactoryBuilding']['lat']; 
					$longitude    = $factoryBuilding['FactoryBuilding']['lng']; 
					if (!empty($latitude) && !empty($longitude)) :
						printf("<p>緯度:%s、経度:%s</p>", h($latitude), h($longitude));
						$base_url     = 'http://maps.google.com/maps/api/staticmap?';
						$center       = sprintf('center=%s,%s', $latitude, $longitude);
						$zoom         = 'zoom=14';
						$size         = 'size=320x240';
						$sensor       = 'sensor=false';
						$markers      = sprintf('markers=|%s,%s', $latitude, $longitude);
						$location_url = sprintf('%s&%s&%s&%s&%s&%s', $base_url, $center, $zoom, $size, $sensor, $markers);
					endif;
					echo (!empty($location_url)) ? $this->Html->image($location_url) : '';
				?></td>
			</tr>
			<tr>
				<td><strong>海抜</strong></td>
				<td><?php
					if (!empty($factoryBuilding['FactoryBuilding']['altitude'])) {
						echo h($factoryBuilding['FactoryBuilding']['altitude']);
						echo '&nbsp;m';
					}
				?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>開発完成年</strong></td>
				<td><?php
					if (!empty($factoryBuilding['FactoryBuilding']['complated'])) {
						echo h($factoryBuilding['FactoryBuilding']['complated']);
						echo '&nbsp;年';
					}
				?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>開発面積</strong></td>
				<td><?php
					if (!empty($factoryBuilding['FactoryBuilding']['develop_area'])) {
						echo h($factoryBuilding['FactoryBuilding']['develop_area']);
						echo '&nbsp;㎡';
					}
				?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>バンコクからの距離</strong></td>
				<td><?php
					if (!empty($factoryBuilding['FactoryBuilding']['from_bangkok'])) {
						echo h($factoryBuilding['FactoryBuilding']['from_bangkok']);
						echo '&nbsp;km';
					}
				?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>スワナプーム国際空港からの距離</strong></td>
				<td><?php
					if (!empty($factoryBuilding['FactoryBuilding']['from_suvarnabhumi'])) {
						echo h($factoryBuilding['FactoryBuilding']['from_suvarnabhumi']);
						echo '&nbsp;km';
					}
				?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>レームチャバン港からの距離</strong></td>
				<td><?php
					if (!empty($factoryBuilding['FactoryBuilding']['from_laemchabang'])) {
						echo h($factoryBuilding['FactoryBuilding']['from_laemchabang']);
						echo '&nbsp;km';
					}
				?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>ドンムアン国際空港からの距離</strong></td>
				<td><?php
					if (!empty($factoryBuilding['FactoryBuilding']['from_donmueang'])) {
						echo h($factoryBuilding['FactoryBuilding']['from_donmueang']);
						echo '&nbsp;km';
					}
				?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>クロントイ港からの距離</strong></td>
				<td><?php
					if (!empty($factoryBuilding['FactoryBuilding']['from_khlongtoei'])) {
						echo h($factoryBuilding['FactoryBuilding']['from_khlongtoei']);
						echo '&nbsp;km';
					}
				?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>マプタプット港からの距離</strong></td>
				<td><?php
					if (!empty($factoryBuilding['FactoryBuilding']['from_maptaphut'])) {
						echo h($factoryBuilding['FactoryBuilding']['from_maptaphut']);
						echo '&nbsp;km';
					}
				?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>おすすめ</strong></td>
				<td><input type="checkbox" <?php
					echo ($factoryBuilding['FactoryBuilding']['recommend'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>人気</strong></td>
				<td><input type="checkbox" <?php
					echo ($factoryBuilding['FactoryBuilding']['popluar'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>新着</strong></td>
				<td><input type="checkbox" <?php
					echo ($factoryBuilding['FactoryBuilding']['newly'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>主な入居企業</strong></td>
				<td><?php
					foreach ($factoryBuilding['FactoryTenant'] as $factoryTenant):
						echo h($factoryTenant['name']) . '&nbsp;';
					endforeach;
				?>&nbsp;</td>
			</tr>
		</table>
	</div>
	<div class="span5">
		<p class="lead">設備・特長</p>
		<table class="table">
			<tr>
				<td style="width: 100px"><strong>銀行</strong></td>
				<td><input type="checkbox" <?php
					echo ($factoryBuilding['FactoryBuilding']['bank'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>ホテル</strong></td>
				<td><input type="checkbox" <?php
					echo ($factoryBuilding['FactoryBuilding']['hotel'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>アパート</strong></td>
				<td><input type="checkbox" <?php
					echo ($factoryBuilding['FactoryBuilding']['apart'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>レストラン</strong></td>
				<td><input type="checkbox" <?php
					echo ($factoryBuilding['FactoryBuilding']['restaurant'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>ゴルフ場</strong></td>
				<td><input type="checkbox" <?php
					echo ($factoryBuilding['FactoryBuilding']['golfpark'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>病院</strong></td>
				<td><input type="checkbox" <?php
					echo ($factoryBuilding['FactoryBuilding']['hospital'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>ショッピングセンター</strong></td>
				<td><input type="checkbox" <?php
					echo ($factoryBuilding['FactoryBuilding']['shopping_center'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>電話</strong></td>
				<td><?php echo h($factoryBuilding['FactoryBuilding']['telephone']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>インターネット</strong></td>
				<td><?php echo h($factoryBuilding['FactoryBuilding']['internet']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>電気</strong></td>
				<td><?php echo h($factoryBuilding['FactoryBuilding']['electricity']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>上水</strong></td>
				<td><?php echo h($factoryBuilding['FactoryBuilding']['waterworks']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>排水</strong></td>
				<td><?php echo h($factoryBuilding['FactoryBuilding']['sewer']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>処理場</strong></td>
				<td><?php echo h($factoryBuilding['FactoryBuilding']['plant']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>貯水池</strong></td>
				<td><?php echo h($factoryBuilding['FactoryBuilding']['reservoir']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>天然ガス</strong></td>
				<td><?php echo h($factoryBuilding['FactoryBuilding']['natural_gas']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>スチーム</strong></td>
				<td><?php echo h($factoryBuilding['FactoryBuilding']['steam']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>幹線道路</strong></td>
				<td><?php echo h($factoryBuilding['FactoryBuilding']['highway']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>管理費</strong></td>
				<td><?php echo h($factoryBuilding['FactoryBuilding']['management_cost']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>その他付帯設備</strong></td>
				<td><?php echo h($factoryBuilding['FactoryBuilding']['facilities']); ?>&nbsp;</td>
			</tr>
		</table>
	</div>
	<?php if (!empty($factoryBuilding['FactoryPhoto'])):?>
	<div class="span10">
		<p class="lead">工場物件写真</p>
		<hr>
		<?php $count = 1; ?>
		<?php foreach ($factoryBuilding['FactoryPhoto'] as $factoryPhoto): ?>
			<div style="display: inline-block; width: 320px"><?php
				echo $this->BootstrapHtml->image($factoryPhoto['path'], array('width' => '300px'));
				echo $this->BootstrapHtml->para(null, '写真' . "$count : " . $factoryPhoto['caption']);
				$count++;
			?></div>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
	<?php if (!empty($factoryBuilding['FactoryProperty'])):?>
	<div class="span10">
		<hr>
		<p class="lead">事務所部屋一覧</p>
		<table class="table">
			<tr>
				<th>区画ID</th>
				<th>種別</th>
				<th>空状況</th>
				<th>所在階</th>
				<th>敷地面積</th>
				<th>価格</th>
				<th>間取り図</th>
				<th class="actions">操作</th>
			</tr>
			<?php foreach ($factoryBuilding['FactoryProperty'] as $factoryProperty): ?>
			<tr>
				<td style="width: 8%"><?php echo h($factoryProperty['id']); ?>&nbsp;</td>
				<td style="width: 10%"><?php echo h($factoryProperty['FactorySubCategory']['name']); ?>&nbsp;</td>
				<td style="width: 10%">空き<?php
					echo ($factoryProperty['visible']) ? 'あり' : 'なし';
				?>&nbsp;</td>
				<td style="width: 10%"><?php echo h($factoryProperty['floor']); ?>&nbsp;階&nbsp;</td>
				<td style="width: 15%"><?php echo h($factoryProperty['site_area']); ?>&nbsp;㎡&nbsp;</td>
				<td style="width: 15%"><?php echo h($factoryProperty['price']); ?>&nbsp;円&nbsp;</td>
				<td style="width: 10%"><?php
					$drowing = $factoryProperty['drowing'];
					echo (!empty($drowing)) ? $this->BootstrapHtml->link('Image', $drowing, null. false) : 'No Image';
				?>&nbsp;</td>
				<td class="actions">
					<div class="btn-group"><?php
						echo $this->Html->link(
							'詳細',
							array(
								'action'     => 'view',
								'controller' => 'factory_properties',
								$factoryProperty['id']
							),
							array('class'  => 'btn btn-small')
						);
						echo $this->Html->link(
							'編集',
							array(
								'action'     => 'edit',
								'controller' => 'factory_properties',
								$factoryProperty['id']
							),
							array('class'  => 'btn btn-small')
						);
						echo $this->Form->postLink(
							'削除',
							array(
								'action'     => 'delete',
								'controller' => 'factory_properties',
								$factoryProperty['id']
							),
							array('class'  => 'btn btn-small btn-danger'),
							__('区画ID %s の物件を削除しますか？', $factoryProperty['id'])
						);
					?></div>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<?php endif; ?>
</div>
