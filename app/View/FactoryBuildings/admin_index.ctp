<div class="container">

	<h2><?php __h('工場物件管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo $this->webroot; ?>admin/factory_buildings"><?php __h('工場物件一覧'); ?></a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/factory_buildings/add"><?php __h('工場物件の追加'); ?></a></li>
		<li class="disabled"><a><?php __h('工場物件の編集'); ?></a></li>
	</ul>

	<?php echo $this->Form->create('FactoryBuilding', array('url' => 'search', 'class' => 'form-inline')); ?>
		<table class="table table-bordered table-condensed search_table">
			<tr>
				<th><?php __h('物件ID'); ?></th>
				<td><?php echo $this->Form->text('id',array()); ?></td>
				<th><?php __h('プロジェクト名'); ?></th>
				<td><?php echo $this->Form->text('name', array()); ?></td>
			</tr>
			<tr>
				<th><?php __h('物件種別'); ?></th>
				<td><?php echo $this->Form->select('factory_category_id', __arrTranslate($factoryCategories), array('empty' => true)); ?></td>
				<th><?php __h('工場エリア'); ?></th>
				<td><?php echo $this->Form->select('factory_area_id', __arrTranslate($areas), array('empty' => true)); ?></td>
			</tr>
			<tr>
				<!--th><?php __h('BOIゾーン'); ?></th>
				<td><?php echo $this->Form->select('boi_zone', __arrTranslate(Configure::read('BoiZone')), array('empty' => true)); ?></td-->
				<th><?php __h('工業団地内外'); ?></th>
				<td><?php echo $this->Form->select('industrial_park_id', __arrTranslate($industrialParks), array('empty' => true)); ?></td>
				<th><?php __h('住所'); ?></th>
				<td><?php echo $this->Form->text('address', array()); ?></td>
			</tr>
			<tr>
				<th><?php __h('開発業者'); ?></th>
				<td><?php echo $this->Form->text('developer', array()); ?></td>
				<th><?php __h('フロント表示'); ?></th>
				<td><?php echo $this->Form->select('visible', __arrTranslate(Configure::read('Visible')), array('empty' => true)); ?></td>
			</tr>
			<tr>
				<th><?php __h('表示優先度'); ?></th>
				<td><?php echo $this->Form->select('priority', __arrTranslate(Configure::read('Priority')), array('empty' => true)); ?></td>
				<th><?php __h('アイコン'); ?></th>
				<td><?php echo $this->Form->select('icon', __arrTranslate(Configure::read('Icon.FactoryBuilding')), array('empty' => true)); ?></td>
			</tr>
			<tr>
				<th><?php __h('追加情報'); ?></th>
				<td><?php echo $this->Form->select('add_information', __arrTranslate($addInformations), array('empty' => true)); ?></td>
				<th></th>
				<td></td>
			</tr>
		</table>

		<div class="search_btn_area" align="center"><button type="submit" class="btn btn-large"><?php __h('検索'); ?></button></div>
	<?php echo $this->Form->end(); ?>

	<hr />

	<span class="count_pagination"><?php echo $this->Paginator->counter(array('format' => '全:%count%件')); ?></span>

	<?php echo $this->BootstrapPaginator->pagination(); ?>
	<table class="table table-striped">
		<tr>
			<th><?php __h('ID'); ?></th>
			<th><?php __h('プロジェクト名'); ?></th>
			<th><?php __h('物件種別'); ?></th>
			<th><?php __h('工場エリア'); ?></th>
			<th><?php __h('更新日'); ?></th>
			<th class="actions"><?php __h('区画操作'); ?></th>
			<th class="actions"><?php __h('操作'); ?></th>
		</tr>

		<?php foreach ($factoryBuildings as $factoryBuilding): ?>
		<?php
			// アラート表示
			$term        = Configure::read('AlertTerm');
			$alert_id    = $factoryBuilding['FactoryBuilding']['alert_id'];
			$next_update = $now = time();
			if (!is_null($factoryBuilding['FactoryBuilding']['unixtime'])) {
				$next_update = $factoryBuilding['FactoryBuilding']['unixtime'];
			}
		?>
		<?php if($next_update < $now): ?>
		<tr class="error">
		<?php elseif ($alert_id == 0): ?>
		<tr class="warning">
		<?php else: ?>
		<tr>
		<?php endif; ?>
			<td style="width: 5%;text-align:right;"><?php echo h($factoryBuilding['FactoryBuilding']['id']); ?>&nbsp;</td>
			<td style="width: 35%"><?php echo h($factoryBuilding['FactoryBuilding']['name']); ?>&nbsp;</td>
			<td style="width: 15%"><?php echo h($factoryCategories[$factoryBuilding['FactoryBuilding']['factory_category_id']]); ?>&nbsp;</td>
			<td style="width: 20%"><?php echo h($areas[$factoryBuilding['FactoryBuilding']['factory_area_id']]); ?>&nbsp;</td>
			<td style="width: 15%"><?php echo h($factoryBuilding['FactoryBuilding']['modified']); ?>&nbsp;</td>
			<td style="width: 10%" class="actions">
				<div class="btn-group">
					<?php echo $this->Form->create('FactoryBuilding', array('url' => '/admin/factory_properties/search', 'class' => 'list_properties_form')); ?>
						<button type="submit" class="btn btn-small list_properties_btn"><?php __h('一覧'); ?></button>
						<?php echo $this->Form->hidden('factory_building_id', array('value' => $factoryBuilding['FactoryBuilding']['id'])); ?>
					<?php echo $this->Form->end(); ?>
					<a href="<?php echo $this->webroot; ?>admin/factory_properties/add/<?php echo $factoryBuilding['FactoryBuilding']['id']; ?>" class="btn btn-small"><?php __h('追加'); ?></a>
				</div>
			</td>
			<td style="width: 10%" class="actions">
				<div class="btn-group">
					<a class="btn btn-small" href="<?php echo $this->webroot; ?>admin/factory_buildings/edit/<?php echo $factoryBuilding['FactoryBuilding']['id']; ?>"><?php __h('編集'); ?></a>
					<?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $factoryBuilding['FactoryBuilding']['id']), array('class'  => 'btn btn-small btn-danger'), __('%sの情報を削除しますか？', $factoryBuilding['FactoryBuilding']['name'])); ?>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->BootstrapPaginator->pagination(); ?>
</div>
