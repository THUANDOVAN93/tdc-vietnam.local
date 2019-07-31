<div class="row-fluid">
	<h2>工場区画管理</h2>
	<ul class="nav nav-tabs">
		<li><?php echo $this->Html->link('工場区画一覧', array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('工場区画の追加', array('action' => 'add')); ?></li>
		<li class="active"><a>工場区画の情報</a></li>
		<li><?php echo $this->Html->link('工場区画の編集', array('action' => 'edit', $factoryProperty['FactoryProperty']['id'])); ?></li>
		<!--<li><?php echo $this->Form->postLink(__('Delete %s', __('工場区画')), array('action' => 'delete', $factoryProperty['FactoryProperty']['id']), null, __('Are you sure you want to delete # %s?', $factoryProperty['FactoryProperty']['id'])); ?> </li> -->
	</ul>
	<div class="span5">
		<p class="lead">区画管理</p>
		<table class="table">
			<tr>
				<td style="width: 100px">工場区画ID</td>
				<td><?php echo h($factoryProperty['FactoryProperty']['id']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td>工場物件名</td>
				<td><?php
					echo $this->Html->link($factoryProperty['FactoryBuilding']['name'], array(
						'controller' => 'factory_buildings',
						'action' => 'view',
						$factoryProperty['FactoryBuilding']['id']
					));
				?>&nbsp;</td>
			</tr>
			<tr>
				<td>種別</td>
				<td><?php echo h($factoryProperty['FactorySubCategory']['name']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td>所在階</td>
				<td><?php echo h($factoryProperty['FactoryProperty']['floor']); ?>階&nbsp;</td>
			</tr>
			<tr>
				<td>価格</td>
				<td><?php echo h($factoryProperty['FactoryProperty']['price']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td>工場面積</td>
				<td><?php echo h($factoryProperty['FactoryProperty']['floor_space']); ?>㎡&nbsp;</td>
			</tr>
			<tr>
				<td>敷地面積</td>
				<td><?php echo h($factoryProperty['FactoryProperty']['site_area']); ?>㎡&nbsp;</td>
			</tr>
			<tr>
				<td>配置図</td>
				<td><?php
					echo $this->Html->Image(
						$factoryProperty['FactoryProperty']['arrangement_plan'],
						array('width' => '300px')
					);
				?>&nbsp;</td>
			</tr>
			<tr>
				<td>間取り図</td>
				<td><?php
					echo $this->Html->Image(
						$factoryProperty['FactoryProperty']['drowing'],
						array('width' => '300px')
					);
				?>&nbsp;</td>
			</tr>
			<tr>
				<td>備考</td>
				<td><?php echo h($factoryProperty['FactoryProperty']['notes']); ?>&nbsp;</td>
			</tr>
			<tr>
				<td>空き状況</td>
				<td>空き<?php
					echo ($factoryProperty['FactoryProperty']['visible']) ? 'あり' : 'なし';
				?>&nbsp;</td>
			</tr>
		</table>
	</div>
</div>

