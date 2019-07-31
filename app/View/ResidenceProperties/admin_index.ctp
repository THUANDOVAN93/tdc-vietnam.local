<div class="row-fluid">

	<h2><?php __h('住居部屋管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo $this->webroot; ?>admin/residence_properties"><?php __h('住居部屋一覧'); ?></a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/residence_properties/add"><?php __h('住居部屋の追加'); ?></a></li>
		<li class="disabled"><a><?php __h('住居部屋の編集'); ?></a></li>
	</ul>

	<?php echo $this->Form->create('ResidenceProperty', array('url' => 'search', 'class' => 'form-inline')); ?>
		<table class="table table-bordered table-condensed search_table">
			<tr>
				<th><?php __h('物件ID'); ?></th>
				<td><?php echo $this->Form->text('residence_building_id',array()); ?></td>
				<th><?php __h('物件名'); ?></th>
				<td><?php echo $this->Form->text('name', array()); ?></td>
			</tr>
			<tr>
				<th><?php __h('フロント表示'); ?></th>
				<td><?php echo $this->Form->select('visible', __arrTranslate(Configure::read('Visible')), array('empty' => true)); ?></td>
				<th><?php __h('売り物件'); ?>/<?php __h('貸し物件'); ?></th>
				<td><?php echo $this->Form->select('sale_or_rent', __arrTranslate(Configure::read('SaleOrRent')), array('empty' => true)); ?></td>
			</tr>
		</table>

		<div class="search_btn_area" align="center"><button type="submit" class="btn btn-large"><?php __h('検索'); ?></button></div>
	<?php echo $this->Form->end(); ?>

	<hr />

<?php if (!empty($this->data['ResidenceProperty']['residence_building_id'])) { ?>
	<div style="margin-bottom:20px;"><a href="<?php echo $this->webroot; ?>admin/residence_properties/add/<?php echo $this->data['ResidenceProperty']['residence_building_id']; ?>" class="btn"><?php __h('検索中の物件に対して部屋を追加'); ?></a></div>
<?php } ?>
	<span class="count_pagination">
		<?php __h('全: %d件',$this->Paginator->counter()); ?>
	</span>

	<?php echo $this->BootstrapPaginator->pagination(); ?>
	<table class="table table-striped">
		<tr>
			<th><?php __h('住居物件名'); ?></th>
			<th><?php __h('間取り'); ?></th>
			<th><?php __h('フロント表示'); ?></th>
			<th><?php __h('所在階'); ?><br />(<?php __h('階'); ?>)</th>
			<th><?php __h('売り物件'); ?>/<?php __h('貸し物件'); ?></th>
			<!--th><?php __h('価格'); ?><br />(<?php __h('VND'); ?>)</th-->
			<th><?php __h('価格'); ?></th>
			<th><?php __h('間取り図'); ?></th>
			<th class="actions"><?php __h('操作'); ?></th>
		</tr>
	<?php foreach ($residenceProperties as $residenceProperty): ?>
		<tr>
			<td><?php echo $this->Html->link(h($residenceProperty['ResidenceBuilding']['name']), array('controller' => 'residence_buildings', 'action' => 'edit', $residenceProperty['ResidenceBuilding']['id'])); ?></td>
			<td><?php __h($residenceProperty['ResidenceLayout']['name']); ?>&nbsp;</td>
			<td class="text_center">
<?php     if ($residenceProperty['ResidenceProperty']['visible']) { ?>
				<?php __h('表示'); ?>
<?php     } else { ?>
				<?php __h('非表示'); ?>
<?php     } ?>
			</td>
			<td class="text_right"><?php __h($residenceProperty['ResidenceProperty']['floor']); ?>&nbsp;</td>
			<td class="text_center"><?php echo Configure::read('SaleOrRent.' . $residenceProperty['ResidenceProperty']['sale_or_rent']); ?></td>
			<td class="text_right"><?php __h(number_format(str_replace( ',', '', $residenceProperty['ResidenceProperty']['price']))); ?>&nbsp;</td>
			<td>
<?php $drowing = $residenceProperty['ResidenceProperty']['drowing']; ?>
<?php if (!empty($drowing)) { ?>
				<a href="<?php echo Configure::read('UploadDir') . $this->name; ?>/<?php echo $drowing; ?>" target="_blank">Image</a>
<?php } else { ?>
				No Image
<?php } ?>
			</td>
			<td class="actions">
				<div class="btn-group">
					<a class="btn btn-small" href="<?php echo $this->webroot; ?>admin/residence_properties/edit/<?php echo $residenceProperty['ResidenceProperty']['id']; ?>"><?php __h('編集'); ?></a>
					<?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $residenceProperty['ResidenceProperty']['id']), array('class'  => 'btn btn-small btn-danger'), __('%sのこちらの部屋を削除しますか？', $residenceProperty['ResidenceBuilding']['name'])); ?>
				</div>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php echo $this->BootstrapPaginator->pagination(); ?>
</div>
