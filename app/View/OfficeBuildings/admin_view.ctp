<div class="container">
	<h2>事務所物件管理</h2>
	<ul class="nav nav-tabs">
		<li><?php echo $this->Html->link('事務所物件一覧', array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('事務所物件の追加', array('action' => 'add')); ?></li>
		<li class="active"><a>事務所物件の情報</a></li>
		<li><?php echo $this->Html->link('事務所物件の編集', array('action' => 'edit', $officeBuilding['OfficeBuilding']['id'])); ?></li>
		<!--
		<li>		<li><?php echo $this->Form->postLink(__('Delete %s', __('Office Building')), array('action' => 'delete', $officeBuilding['OfficeBuilding']['id']), null, __('Are you sure you want to delete # %s?', $officeBuilding['OfficeBuilding']['id'])); ?> </li>
</li>
		-->
	</ul>
	<div class="span5">
		<p class="lead">物件管理</p>
		<table class="table">
			<tr>
				<td style="width: 100px"><strong>事務所物件ID</strong></td>
				<td><?php echo h($officeBuilding['OfficeBuilding']['id']); ?> &nbsp;</td>
			</tr>
			<tr>
				<td><strong>作成日時</strong></td>
				<td><?php echo h($officeBuilding['OfficeBuilding']['created']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>更新日時</strong></td>
				<td><?php echo h($officeBuilding['OfficeBuilding']['updated']); ?>&nbsp;</td>
			</tr>
			<?php
				$alert_id = $officeBuilding['OfficeBuilding']['alert_id'];
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
					echo h($priority[$officeBuilding['OfficeBuilding']['priority']]);
				?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>住居種別</strong></td>
				<td><?php echo h($officeBuilding['OfficeCategory']['name']); ?>&nbsp;</td>
			</tr>
		</table>

		<p class="lead">物件情報</p>
		<table class="table">
			<tr>
				<td style="width: 100px"><strong>物件名</strong></td>
				<td><?php echo h($officeBuilding['OfficeBuilding']['name']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>住所</strong></td>
				<td><?php echo h($officeBuilding['OfficeBuilding']['address']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>エリア</strong></td>
				<td><?php echo h($officeBuilding['Area']['name']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>位置情報</strong></td>
				<td><?php
					$location_url = '';
					$latitude     = $officeBuilding['OfficeBuilding']['lat']; 
					$longitude    = $officeBuilding['OfficeBuilding']['lng']; 
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
				<td><strong>アクセス1</strong></td>
				<td><?php echo h($officeBuilding['Station1']['name']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>アクセス2</strong></td>
				<td><?php echo h($officeBuilding['Station2']['name']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>アクセス3</strong></td>
				<td><?php echo h($officeBuilding['Station3']['name']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>交通</strong></td>
				<td><?php echo h($officeBuilding['OfficeBuilding']['access']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>完成年</strong></td>
				<td><?php
					if (!empty($officeBuilding['OfficeBuilding']['complated'])) {
						echo h($officeBuilding['OfficeBuilding']['complated']);
						echo '&nbsp;年';
					}
				?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>天井高</strong></td>
				<td><?php
					if (!empty($officeBuilding['OfficeBuilding']['height'])) {
						echo h($officeBuilding['OfficeBuilding']['height']);
						echo '&nbsp;M';
					}
				?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>総階数</strong></td>
				<td><?php
					if (!empty($officeBuilding['OfficeBuilding']['total_floor'])) {
						echo h($officeBuilding['OfficeBuilding']['total_floor']);
						echo '&nbsp;階';
					}
				?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>エレベーター数</strong></td>
				<td><?php
					if (!empty($officeBuilding['OfficeBuilding']['elevator'])) {
						echo h($officeBuilding['OfficeBuilding']['elevator']);
						echo '&nbsp;基';
					}
				?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>サービスリフト数</strong></td>
				<td><?php
					if (!empty($officeBuilding['OfficeBuilding']['lift'])) {
						echo h($officeBuilding['OfficeBuilding']['lift']);
						echo '&nbsp;基';
					}
				?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>物件説明</strong></td>
				<td><?php echo h($officeBuilding['OfficeBuilding']['description']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>周辺施設</strong></td>
				<td><?php echo h($officeBuilding['OfficeBuilding']['around']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>管理会社</strong></td>
				<td><?php echo h($officeBuilding['OfficeBuilding']['proprietary']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>駅近</strong></td>
				<td><input type="checkbox" <?php
					echo ($officeBuilding['OfficeBuilding']['nearby'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>おすすめ</strong></td>
				<td><input type="checkbox" <?php
					echo ($officeBuilding['OfficeBuilding']['recommend'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>人気</strong></td>
				<td><input type="checkbox" <?php
					echo ($officeBuilding['OfficeBuilding']['popluar'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>New</strong></td>
				<td><input type="checkbox" <?php
					echo ($officeBuilding['OfficeBuilding']['newly'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>主な入居企業</strong></td>
				<td><?php echo h($officeBuilding['OfficeBuilding']['together']); ?>&nbsp;</td>
			</tr>
		</table>
	</div>
	<div class="span5">
		<p class="lead">設備・特長</p>
		<table class="table">
			<tr>
				<td style="width: 100px"><strong>キャンティーン</strong></td>
				<td><input type="checkbox" <?php
					echo ($officeBuilding['OfficeBuilding']['canteen'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td style="width: 100px"><strong>コンビニ</strong></td>
				<td><input type="checkbox" <?php
					echo ($officeBuilding['OfficeBuilding']['store'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td style="width: 100px"><strong>カフェ</strong></td>
				<td><input type="checkbox" <?php
					echo ($officeBuilding['OfficeBuilding']['cafe'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td style="width: 100px"><strong>共同パントリー</strong></td>
				<td><input type="checkbox" <?php
					echo ($officeBuilding['OfficeBuilding']['shared_pantry'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td style="width: 100px"><strong>レストラン</strong></td>
				<td><input type="checkbox" <?php
					echo ($officeBuilding['OfficeBuilding']['restaurant'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td style="width: 100px"><strong>フィットネス</strong></td>
				<td><input type="checkbox" <?php
					echo ($officeBuilding['OfficeBuilding']['fitness'] == 1) ? 'checked' : '';
				?> disabled>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>駐車場</strong></td>
				<td><?php echo h($officeBuilding['OfficeBuilding']['parking']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>セキュリティ</strong></td>
				<td><?php echo h($officeBuilding['OfficeBuilding']['security']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>会議室利用</strong></td>
				<td><?php echo h($officeBuilding['OfficeBuilding']['meeting_room']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>インターネット</strong></td>
				<td><?php echo h($officeBuilding['OfficeBuilding']['internet']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>エアコン</strong></td>
				<td><?php echo h($officeBuilding['OfficeBuilding']['air_conditioner']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>電気</strong></td>
				<td><?php echo h($officeBuilding['OfficeBuilding']['electricity']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>水道</strong></td>
				<td><?php echo h($officeBuilding['OfficeBuilding']['water_supply']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>電話</strong></td>
				<td><?php echo h($officeBuilding['OfficeBuilding']['telephone']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>管理費</strong></td>
				<td><?php echo h($officeBuilding['OfficeBuilding']['management_cost']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>その他付帯設備</strong></td>
				<td><?php echo h($officeBuilding['OfficeBuilding']['facilities']); ?>&nbsp;</td>
			</tr>
		</table>
	</div>
	<?php if (!empty($officeBuilding['OfficePhoto'])):?>
	<div class="span10">
		<p class="lead">事務所物件写真</p>
		<hr>
		<?php $count = 1; ?>
		<?php foreach ($officeBuilding['OfficePhoto'] as $officePhoto): ?>
			<div style="display: inline-block; width: 320px"><?php
				echo $this->BootstrapHtml->image($officePhoto['path'], array('width' => '300px'));
				echo $this->BootstrapHtml->para(null, '写真' . "$count : " . $officePhoto['caption']);
				$count++;
			?></div>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
	<?php if (!empty($officeBuilding['OfficeProperty'])):?>
	<div class="span10">
		<hr>
		<p class="lead">事務所部屋一覧</p>
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
			<?php foreach ($officeBuilding['OfficeProperty'] as $officeProperty): ?>
			<tr>
				<td style="width: 8%"><?php echo h($officeProperty['id']); ?>&nbsp;</td>
				<td style="width: 12%"><?php
					$sale_or_rent = array(
						0  => '未設定',
						1  => '貸物件',
						2  => '売物件'
					);
					echo h($sale_or_rent[$officeProperty['sale_or_rent']]);
				?>&nbsp;</td>
				<td style="width: 10%">表示<?php
					echo ($officeProperty['visible']) ? 'する' : 'しない';
				?>&nbsp;</td>
				<td style="width: 8%"><?php echo h($officeProperty['floor']); ?>&nbsp;階&nbsp;</td>
				<td style="width: 10%"><?php echo h($officeProperty['price']); ?>&nbsp;円&nbsp;</td>
				<td style="width: 10%"><?php echo h($officeProperty['floor_space']); ?>&nbsp;㎡&nbsp;</td>
				<td style="width: 10%"><?php echo h($officeProperty['OfficeLayout']['name']); ?>&nbsp;</td>
				<td style="width: 10%"><?php
					$drowing = $officeProperty['drowing'];
					echo (!empty($drowing)) ? $this->BootstrapHtml->link('Image', $drowing, null. false) : 'No Image';
				?>&nbsp;</td>
				<td class="actions">
					<div class="btn-group"><?php
						echo $this->Html->link(
							'詳細',
							array(
								'action'     => 'view',
								'controller' => 'office_properties',
								$officeProperty['id']
							),
							array('class'  => 'btn btn-small')
						);
						echo $this->Html->link(
							'編集',
							array(
								'action'     => 'edit',
								'controller' => 'office_properties',
								$officeProperty['id']
							),
							array('class'  => 'btn btn-small')
						);
						echo $this->Form->postLink(
							'削除',
							array(
								'action'     => 'delete',
								'controller' => 'office_properties',
								$officeProperty['id']
							),
							array('class'  => 'btn btn-small btn-danger'),
							__('部屋ID %s の物件を削除しますか？', $officeProperty['id'])
						);
					?></div>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<?php endif; ?>
</div>
