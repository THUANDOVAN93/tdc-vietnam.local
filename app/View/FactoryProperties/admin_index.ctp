<div class="row-fluid">

	<h2><?php __h('工場区画管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo $this->webroot; ?>admin/factory_properties"><?php __h('工場区画一覧'); ?></a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/factory_properties/add"><?php __h('工場区画の追加'); ?></a></li>
		<li class="disabled"><a><?php __h('工場区画の編集'); ?></a></li>
	</ul>

	<?php echo $this->Form->create('FactoryProperty', array('url' => 'search', 'class' => 'form-inline')); ?>
	<table class="table table-bordered table-condensed search_table">
		<tr>
			<th><?php __h('物件ID'); ?></th>
			<td><?php echo $this->Form->text('factory_building_id',array()); ?></td>
			<th><?php __h('プロジェクト名'); ?></th>
			<td><?php echo $this->Form->text('name', array()); ?></td>
		</tr>
		<tr>
			<th><?php __h('区画種別'); ?></th>
			<td><?php echo $this->Form->select('factory_sub_category_id', __arrTranslate($factorySubCategories), array('empty' => true)); ?></td>
			<th><?php __h('フロント表示'); ?></th>
			<td><?php echo $this->Form->select('visible', __arrTranslate(Configure::read('Visible')), array('empty' => true)); ?></td>
		</tr>
	</table>

	<div class="search_btn_area" align="center"><button type="submit" class="btn btn-large"><?php __h('検索'); ?></button></div>
	<?php echo $this->Form->end(); ?>

	<hr />

<?php if (!empty($this->data['FactoryProperty']['factory_building_id'])) { ?>
	<div style="margin-bottom:20px;"><a href="<?php echo $this->webroot; ?>admin/factory_properties/add/<?php echo $this->data['FactoryProperty']['factory_building_id']; ?>" class="btn"><?php __h('検索中の物件に対して部屋を追加'); ?></a></div>
<?php } ?>

	<span class="count_pagination">
		<?php __h('全: %d件',$this->Paginator->counter()); ?>
	</span>
	<?php echo $this->BootstrapPaginator->pagination(); ?>

	<table class="table table-striped">
		<tr>
			<th><?php __h('プロジェクト名'); ?></th>
			<th><?php __h('区画種別'); ?></th>
			<th><?php __h('フロント表示'); ?></th>
			<th><?php __h('プロット'); ?></th>
			<th><?php __h('ユニット'); ?></th>
			<th><?php __h('工場面積'); ?><br />(m&sup2;)</th>
			<th><?php __h('敷地面積'); ?><br />(m&sup2;)</th>
			<!--th><?php __h('価格'); ?><br />(<?php __h('VND'); ?>)</th-->
			<th><?php __h('価格'); ?></th>
			<th><?php __h('間取り図'); ?></th>
			<th class="actions"><?php __h('操作'); ?></th>
		</tr>
	<?php foreach ($factoryProperties as $factoryProperty): ?>
		<tr>
			<td><?php echo $this->Html->link($factoryProperty['FactoryBuilding']['name'], array('controller' => 'factory_buildings', 'action' => 'edit', $factoryProperty['FactoryBuilding']['id'])); ?></td>
			<td><?php __h($factoryProperty['FactorySubCategory']['name']); ?>&nbsp;</td>
			<td class="text_center">
<?php     if ($factoryProperty['FactoryProperty']['visible']) { ?>
				<?php __h('表示'); ?>
<?php     } else { ?>
				<?php __h('非表示'); ?>
<?php     } ?>
			</td>
			<td><?php __h($factoryProperty['FactoryProperty']['plot']); ?>&nbsp;</td>
			<td><?php __h($factoryProperty['FactoryProperty']['unit']); ?>&nbsp;</td>
			<td class="text_right"><?php __h(number_format(str_replace( ',', '', $factoryProperty['FactoryProperty']['floor_space']))); ?>&nbsp;</td>
			<td class="text_right"><?php __h(number_format(str_replace( ',', '', $factoryProperty['FactoryProperty']['site_area']))); ?>&nbsp;</td>
			<td class="text_right"><?php __h($factoryProperty['FactoryProperty']['price']); ?>&nbsp;</td>
			<td>
<?php $drowing = $factoryProperty['FactoryProperty']['drowing']; ?>
<?php if (!empty($drowing)) { ?>
				<a href="<?php echo Configure::read('UploadDir') . $this->name; ?>/<?php echo $drowing; ?>" target="_blank">Image</a>
<?php } else { ?>
				No Image
<?php } ?>
			</td>
			<td class="actions">
				<div class="btn-group">
				<?php
					echo $this->Html->link(__('編集'), array('action' => 'edit', $factoryProperty['FactoryProperty']['id']), array('class'  => 'btn btn-small'));
					echo $this->Form->postLink(__('削除'), array('action' => 'delete', $factoryProperty['FactoryProperty']['id']), array('class'  => 'btn btn-small btn-danger'), __('%sのこちらの区画を削除しますか？', $factoryProperty['FactoryBuilding']['name']));
				?>
				</div>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php echo $this->BootstrapPaginator->pagination(); ?>
</div>
