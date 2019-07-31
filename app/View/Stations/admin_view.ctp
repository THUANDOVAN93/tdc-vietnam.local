<div class="row-fluid">
	<h2>駅管理</h2>
	<ul class="nav nav-tabs">
		<li><?php echo $this->Html->link('駅一覧', array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('駅の追加', array('action' => 'add')); ?> </li>
		<li class="active"><a>駅の情報</a></li>
		<li><?php echo $this->Html->link('駅の編集', array('action' => 'edit', $station['Station']['id'])); ?></li>
		<!-- <li><?php echo $this->Form->postLink('削除', array('action' => 'delete', $station['Station']['id']), array('class'  => 'btn btn-small btn-danger'), __('%sの情報を削除しますか？', $station['Station']['name'])); ?></li> -->
	</ul>
	<dl>
		<dt>駅ID</dt>
		<dd>
			<?php echo h($station['Station']['id']); ?>
			&nbsp;
		</dd>
		<dt>駅名</dt>
		<dd>
			<?php echo h($station['Station']['name']); ?>
			&nbsp;
		</dd>
		<dt>路線名</dt>
		<dd>
			<?php echo h($station['Line']['name']); ?>
			&nbsp;
		</dd>
		<dt>位置情報 <?php
			$location_url = '';
			$latitude     = ($station['Station']['lat']);
			$longitude    = ($station['Station']['lng']);
			if (!empty($latitude) && !empty($longitude)) :
				printf("(緯度:%s、経度:%s)", h($latitude), h($longitude));
				$base_url     = 'http://maps.google.com/maps/api/staticmap?';
				$center       = sprintf('center=%s,%s', $latitude, $longitude);
				$zoom         = 'zoom=14';
				$size         = 'size=640x343'; // 710x380 = 71:38 (90%
				$sensor       = 'sensor=false';
				$markers      = sprintf('markers=|%s,%s', $latitude, $longitude);
				$location_url = sprintf('%s&%s&%s&%s&%s&%s', $base_url, $center, $zoom, $size, $sensor, $markers);
			endif;
		?></dt>
		<dd>
		<?php
			echo (!empty($location_url)) ? $this->Html->image($location_url) : '位置情報が登録されていません';
		?>&nbsp;
		</dd>
		<dt>マップ画像</dt>
		<dd>
		<?php
			$map_image = ($station['Station']['map']);
			if (!empty($map_image)) :
				echo $this->Html->para(null, $map_image);
				echo $this->Html->image($map_image);
			else :
				echo $this->Html->para(null, '登録されていません');
			endif;
			?> &nbsp;
		</dd>
	</dl>
</div>
