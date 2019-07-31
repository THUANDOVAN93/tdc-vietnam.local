<div class="container">
	<h2>住居物件管理</h2>
	<ul class="nav nav-tabs">
		<li><?php echo $this->Html->link('住居物件一覧', array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('住居物件の追加', array('action' => 'add')); ?> </li>
		<li class="active"><a>住居物件の情報</a></li>
		<li><?php echo $this->Html->link('住居物件の編集', array('action' => 'edit', $residenceBuilding['ResidenceBuilding']['id'])); ?> </li>
		<!--
		<li><?php echo $this->Form->postLink(__('Delete %s', __('Residence Building')), array('action' => 'delete', $residenceBuilding['ResidenceBuilding']['id']), null, __('Are you sure you want to delete # %s?', $residenceBuilding['ResidenceBuilding']['id'])); ?></li>
		-->
	</ul>
	<div class="span5">
		<p class="lead">物件管理</p>
		<table class="table">
			<tr>
				<td style="width: 100px"><strong>住居物件ID</strong></td>
				<td><?php echo h($residenceBuilding['ResidenceBuilding']['id']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>作成日時</strong></td>
				<td><?php echo h($residenceBuilding['ResidenceBuilding']['created']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>更新日時</strong></td>
				<td><?php echo h($residenceBuilding['ResidenceBuilding']['updated']); ?>&nbsp;</td>
			</tr>
			<?php
				$alert_id = $residenceBuilding['ResidenceBuilding']['alert_id'];
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
					echo h($priority[$residenceBuilding['ResidenceBuilding']['priority']]);
				?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>住居種別</strong></td>
				<td><?php echo h($residenceBuilding['ResidenceCategory']['name']); ?>&nbsp;</td>
			</tr>
		</table>

		<p class="lead">物件情報</p>
		<table class="table">
			<tr>
				<td style="width: 100px"><strong>物件名</strong></td>
				<td><?php echo h($residenceBuilding['ResidenceBuilding']['name']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>住所</strong></td>
				<td><?php echo h($residenceBuilding['ResidenceBuilding']['address']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>エリア</strong></td>
				<td><?php echo h($residenceBuilding['Area']['name']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>位置情報</strong></td>
				<td><?php
					$location_url = '';
					$latitude     = $residenceBuilding['ResidenceBuilding']['lat']; 
					$longitude    = $residenceBuilding['ResidenceBuilding']['lng']; 
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
				<td><strong>最寄駅1</strong></td>
				<td><?php echo h($residenceBuilding['Station1']['name']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>最寄駅2</strong></td>
				<td><?php echo h($residenceBuilding['Station2']['name']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>最寄駅3</strong></td>
				<td><?php echo h($residenceBuilding['Station3']['name']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>アクセス</strong></td>
				<td><?php echo h($residenceBuilding['ResidenceBuilding']['access']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>完成年</strong></td>
				<td><?php echo h($residenceBuilding['ResidenceBuilding']['complated']); ?>&nbsp;年&nbsp;</td>
			</tr>
			<tr>
				<td><strong>総階数</strong></td>
				<td><?php echo h($residenceBuilding['ResidenceBuilding']['total_floor']); ?>&nbsp;階&nbsp;</td>
			</tr>
			<tr>
				<td><strong>部屋数</strong></td>
				<td><?php echo h($residenceBuilding['ResidenceBuilding']['total_room']); ?>&nbsp;室&nbsp;</td>
			</tr>
			<tr>
				<td><strong>物件説明</strong></td>
				<td><?php echo h($residenceBuilding['ResidenceBuilding']['description']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>周辺施設</strong></td>
				<td><?php echo h($residenceBuilding['ResidenceBuilding']['around']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>駅近</strong></td>
				<td><input type="checkbox" <?php
					echo ($residenceBuilding['ResidenceBuilding']['nearby'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>おすすめ</strong></td>
				<td><input type="checkbox" <?php
					echo ($residenceBuilding['ResidenceBuilding']['recommend'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>人気</strong></td>
				<td><input type="checkbox" <?php
					echo ($residenceBuilding['ResidenceBuilding']['popluar'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>New</strong></td>
				<td><input type="checkbox" <?php
					echo ($residenceBuilding['ResidenceBuilding']['newly'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
		</table>
	</div>
	<div class="span5">
		<p class="lead">設備・特長</p>
		<table class="table">
			<tr>
				<td style="width: 100px"><strong>プール</strong></td>
				<td><input type="checkbox" <?php
					echo ($residenceBuilding['ResidenceBuilding']['pool'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>ジム</strong></td>
				<td><input type="checkbox" <?php
					echo ($residenceBuilding['ResidenceBuilding']['gym'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>サウナ</strong></td>
				<td><input type="checkbox" <?php
					echo ($residenceBuilding['ResidenceBuilding']['sauna'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>テニスコート</strong></td>
				<td><input type="checkbox" <?php
					echo ($residenceBuilding['ResidenceBuilding']['tennis_court'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>子供の遊び場</strong></td>
				<td><input type="checkbox" <?php
					echo ($residenceBuilding['ResidenceBuilding']['playground'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>ランドリー</strong></td>
				<td><input type="checkbox" <?php
					echo ($residenceBuilding['ResidenceBuilding']['laundry'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>コンビニ</strong></td>
				<td><input type="checkbox" <?php
					echo ($residenceBuilding['ResidenceBuilding']['store'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>キッチン</strong></td>
				<td><input type="checkbox" <?php
					echo ($residenceBuilding['ResidenceBuilding']['kitchen'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>洗濯機</strong></td>
				<td><input type="checkbox" <?php
					echo ($residenceBuilding['ResidenceBuilding']['washer'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>メイド部屋</strong></td>
				<td><input type="checkbox" <?php
					echo ($residenceBuilding['ResidenceBuilding']['maid_room'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>ペット可</strong></td>
				<td><input type="checkbox" <?php
					echo ($residenceBuilding['ResidenceBuilding']['keep_pet'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>セキュリティ</strong></td>
				<td><input type="checkbox" <?php
					echo ($residenceBuilding['ResidenceBuilding']['security'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>駐車場</strong></td>
				<td><input type="checkbox" <?php
					echo ($residenceBuilding['ResidenceBuilding']['parking'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>インターネット</strong></td>
				<td><input type="checkbox" <?php
					echo ($residenceBuilding['ResidenceBuilding']['internet'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>衛星放送(UBC+NHK)</strong></td>
				<td><input type="checkbox" <?php
					echo ($residenceBuilding['ResidenceBuilding']['satellite_broadcasting'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>サービス</strong></td>
				<td><?php echo h($residenceBuilding['ResidenceBuilding']['service']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>電気</strong></td>
				<td><?php echo h($residenceBuilding['ResidenceBuilding']['electricity']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>水道</strong></td>
				<td><?php echo h($residenceBuilding['ResidenceBuilding']['water_supply']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>電話</strong></td>
				<td><?php echo h($residenceBuilding['ResidenceBuilding']['telephone']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>コンロ</strong></td>
				<td><?php echo h($residenceBuilding['ResidenceBuilding']['cookstove']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>管理費</strong></td>
				<td><?php echo h($residenceBuilding['ResidenceBuilding']['management_cost']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>その他付帯設備</strong></td>
				<td><?php echo h($residenceBuilding['ResidenceBuilding']['facilities']); ?>&nbsp;</td>
			</tr>
		</table>
	</div>
	<?php if (!empty($residenceBuilding['ResidencePhoto'])):?>
	<div class="span10">
		<hr>
		<p class="lead">住居物件写真</p>
		<?php $count = 1; ?>
		<?php foreach ($residenceBuilding['ResidencePhoto'] as $residencePhoto): ?>
			<div style="display: inline-block; width: 320px"><?php
				echo $this->BootstrapHtml->image($residencePhoto['path'], array('width' => '300px'));
				echo $this->BootstrapHtml->para(null, '写真' . "$count : " . $residencePhoto['caption']);
				$count++;
			?></div>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
	<?php if (!empty($residenceBuilding['ResidenceProperty'])):?>
	<div class="span10">
		<hr>
		<p class="lead">住居部屋一覧</p>
		<table class="table">
			<tr>
				<th>部屋ID</th>
				<th>売物件/貸物件</th>
				<th>表示/非表示</th>
				<th>所在階</th>
				<th>価格</th>
				<th>床面積</th>
				<th>間取り</th>
				<th>間取り図</th>
				<th class="actions">操作</th>
			</tr>
			<?php foreach ($residenceBuilding['ResidenceProperty'] as $residenceProperty): ?>
			<tr>
				<td style="width: 8%"><?php echo h($residenceProperty['id']); ?>&nbsp;</td>
				<td style="width: 12%"><?php
					$sale_or_rent = array(
						0  => '未設定',
						1  => '貸物件',
						2  => '売物件'
					);
					echo h($sale_or_rent[$residenceProperty['sale_or_rent']]);
				?>&nbsp;</td>
				<td style="width: 10%">表示<?php
					echo ($residenceProperty['visible']) ? 'する' : 'しない';
				?>&nbsp;</td>
				<td style="width: 10%"><?php echo h($residenceProperty['floor']); ?>&nbsp;階&nbsp;</td>
				<td style="width: 10%"><?php echo h($residenceProperty['price']); ?>&nbsp;円&nbsp;</td>
				<td style="width: 10%"><?php echo h($residenceProperty['floor_space']); ?>&nbsp;㎡&nbsp;</td>
				<td style="width: 10%"><?php echo h($residenceProperty['ResidenceLayout']['name']); ?>&nbsp;</td>
				<td style="width: 10%"><?php
					$drowing = $residenceProperty['drowing'];
					echo (!empty($drowing)) ? $this->BootstrapHtml->link('Image', $drowing, null. false) : 'No Image';
				?>&nbsp;</td>
				<td class="actions">
					<div class="btn-group"><?php
						echo $this->Html->link(
							'詳細',
							array(
								'action'     => 'view',
								'controller' => 'residence_properties',
								$residenceProperty['id']
							),
							array('class'  => 'btn btn-small')
						);
						echo $this->Html->link(
							'編集',
							array(
								'action'     => 'edit',
								'controller' => 'residence_properties',
								$residenceProperty['id']
							),
							array('class'  => 'btn btn-small')
						);
						echo $this->Form->postLink(
							'削除',
							array(
								'action'     => 'delete',
								'controller' => 'residence_properties',
								$residenceProperty['id']
							),
							array('class'  => 'btn btn-small btn-danger'),
							__('部屋ID %s の物件を削除しますか？', $residenceProperty['id'])
						);
					?></div>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<?php endif; ?>
</div>
