<div class="row-fluid">
	<h2>事務所部屋管理</h2>
	<ul class="nav nav-tabs">
		<li><?php echo $this->Html->link('事務所部屋一覧', array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('事務所部屋の追加', array('action' => 'add')); ?> </li>
		<li class="active"><a>事務所部屋の情報</a></li>
		<li><?php echo $this->Html->link('事務所部屋の編集', array('action' => 'edit', $officeProperty['OfficeProperty']['id'])); ?> </li>
		<!-- <li><?php echo $this->Form->postLink(__('Delete %s', __('Office Property')), array('action' => 'delete', $officeProperty['OfficeProperty']['id']), null, __('Are you sure you want to delete # %s?', $officeProperty['OfficeProperty']['id'])); ?> </li> -->
	</ul>
	<div class="span5">
		<p class="lead">部屋管理</p>
		<table class="table">
			<tr>
				<td style="width: 100px">事務所部屋ID</td>
				<td><?php echo h($officeProperty['OfficeProperty']['id']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td>事務所物件名</td>
				<td><?php
					echo $this->Html->link($officeProperty['OfficeBuilding']['name'], array(
						'controller' => 'office_buildings',
						'action'     => 'view',
						$officeProperty['OfficeBuilding']['id'])
					);
				?>&nbsp;</td>
			</tr>
			<tr>
				<td>貸物件/売物件</td>
				<td><?php
					$sale_rent = array(
						1  => '貸物件',
						2  => '売物件'
					);
					echo h($sale_rent[$officeProperty['OfficeProperty']['sale_or_rent']]);
				?>&nbsp;</td>
			</tr>
			<tr>
				<td>表示/非表示</td>
				<td>表示<?php
					echo ($officeProperty['OfficeProperty']['visible']) ? 'する' : 'しない';
				?>&nbsp;</td>
			</tr>
			<tr>
				<td>所在階</td>
				<td><?php echo h($officeProperty['OfficeProperty']['floor']); ?>階&nbsp;</td>
			</tr>
			<tr>
				<td>価格</td>
				<td><?php echo h($officeProperty['OfficeProperty']['price']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td>床面積</td>
				<td><?php echo h($officeProperty['OfficeProperty']['floor_space']); ?>㎡&nbsp;</td>
			</tr>
			<tr>
				<td>間取り</rd>
				<td><?php echo h($officeProperty['OfficeLayout']['name']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td>備考</td>
				<td><?php echo h($officeProperty['OfficeProperty']['notes']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td>間取り図</td>
				<td><?php
					echo $this->Html->Image(
						$officeProperty['OfficeProperty']['drowing'],
						array('width' => '300px')
					);
				?>&nbsp;</td>
			</tr>
		</table>
	</div>
</div>
