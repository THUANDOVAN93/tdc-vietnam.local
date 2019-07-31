<div class="row-fluid">
	<h2>住居部屋管理</h2>
	<ul class="nav nav-tabs">
		<li><?php echo $this->Html->link('住居部屋一覧', array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('住居部屋の追加', array('action' => 'add')); ?> </li>
		<li class="active"><a>住居部屋の情報</a></li>
		<li><?php echo $this->Html->link('住居部屋の編集', array('action' => 'edit', $residenceProperty['ResidenceProperty']['id'])); ?> </li>
		<!-- <li><?php echo $this->Form->postLink(__('Delete %s', __('Residence Property')), array('action' => 'delete', $residenceProperty['ResidenceProperty']['id']), null, __('Are you sure you want to delete # %s?', $residenceProperty['ResidenceProperty']['id'])); ?> </li> -->
	</ul>
	<div class="span5">
		<p class="lead">部屋管理</p>
		<table class="table">
			<tr>
				<td style="width: 100px">住居部屋ID</td>
				<td><?php echo h($residenceProperty['ResidenceProperty']['id']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td>住居物件名</td>
				<td><?php
					echo $this->Html->link($residenceProperty['ResidenceBuilding']['name'], array(
						'controller' => 'residence_buildings',
						'action'     => 'view',
						$residenceProperty['ResidenceBuilding']['id'])
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
					echo h($sale_rent[$residenceProperty['ResidenceProperty']['sale_or_rent']]);
				?>&nbsp;</td>
			</tr>
			<tr>
				<td>表示/非表示</td>
				<td>表示<?php
					echo ($residenceProperty['ResidenceProperty']['visible']) ? 'する' : 'しない';
				?>&nbsp;</td>
			</tr>
			<tr>
				<td>所在階</td>
				<td><?php echo h($residenceProperty['ResidenceProperty']['floor']); ?>階&nbsp;</td>
			</tr>
			<tr>
				<td>価格</td>
				<td><?php echo h($residenceProperty['ResidenceProperty']['price']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td>床面積</td>
				<td><?php echo h($residenceProperty['ResidenceProperty']['floor_space']); ?>㎡&nbsp;</td>
			</tr>
			<tr>
				<td>間取り</rd>
				<td><?php echo h($residenceProperty['ResidenceLayout']['name']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td>備考</td>
				<td><?php echo h($residenceProperty['ResidenceProperty']['notes']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td>間取り図</td>
				<td><?php
					echo $this->Html->Image(
						$residenceProperty['ResidenceProperty']['drowing'],
						array('width' => '300px')
					);
				?>&nbsp;</td>
			</tr>
		</table>
	</div>
</div>
