<div class="row-fluid">

	<h2><?php __h('事務所部屋管理') ?></h2>
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo $this->webroot; ?>admin/office_properties"><?php __h('事務所部屋一覧') ?></a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/office_properties/add"><?php __h('事務所部屋の追加') ?></a></li>
		<li class="disabled"><a><?php __h('事務所部屋の編集') ?></a></li>
	</ul>

    <?php echo $this->Form->create('OfficeProperty', array('url' => 'search', 'class' => 'form-inline')); ?>
	<table class="table table-bordered table-condensed search_table">
		<tr>
			<th><?php __h('物件ID') ?></th>
			<td><?php echo $this->Form->text('office_building_id',array()); ?></td>
			<th><?php __h('物件名') ?></th>
			<td><?php echo $this->Form->text('name', array()); ?></td>
		</tr>
		<tr>
			<th><?php __h('フロント表示') ?></th>
			<td><?php echo $this->Form->select('visible', __arrTranslate(Configure::read('Visible')), array('empty' => true)); ?></td>
			<th><?php __h('売り物件') ?>/<?php __h('貸し物件') ?></th>
			<td><?php echo $this->Form->select('sale_or_rent', __arrTranslate(Configure::read('SaleOrRent')), array('empty' => true)); ?></td>
		</tr>
	</table>

	<div class="search_btn_area" align="center"><button type="submit" class="btn btn-large"><?php __h('検索') ?></button></div>
	<?php echo $this->Form->end(); ?>

	<hr />

<?php if (!empty($this->data['OfficeProperty']['office_building_id'])) { ?>
	<div style="margin-bottom:20px;"><a href="<?php echo $this->webroot; ?>admin/office_properties/add/<?php echo $this->data['OfficeProperty']['office_building_id']; ?>" class="btn"><?php __h('検索中の物件に対して部屋を追加') ?></a></div>
<?php } ?>
	<span class="count_pagination">
		<?php __h('全: %d件',$this->Paginator->counter()); ?>
	</span>

	<?php echo $this->BootstrapPaginator->pagination(); ?>
	<table class="table table-striped">
		<tr>
			<th><?php __h('事務所物件名') ?></th>
			<th><?php __h('間取り') ?></th>
			<th><?php __h('フロント表示') ?></th>
			<th><?php __h('所在階') ?><br />(<?php __h('階') ?>)</th>
			<th><?php __h('床面積') ?><br />(m&sup2;)</th>
			<th><?php __h('売り物件') ?>/<?php __h('貸し物件') ?></th>
			<!--th><?php __h('価格') ?><br />(<?php __h('VND') ?>)</th-->
			<th><?php __h('価格') ?></th>
			<th><?php __h('間取り図') ?></th>
			<th class="actions"><?php __h('操作') ?></th>
		</tr>
<?php foreach ($officeProperties as $officeProperty) { ?>
		<tr>
			<td><?php echo $this->Html->link(h($officeProperty['OfficeBuilding']['name']), array('controller' => 'office_buildings', 'action' => 'edit', $officeProperty['OfficeBuilding']['id'])); ?></td>
			<td><?php echo h($officeProperty['OfficeLayout']['name']); ?></td>
			<td class="text_center">
<?php     if ($officeProperty['OfficeProperty']['visible']) { ?>
				<?php __h('表示') ?>
<?php     } else { ?>
				<?php __h('非表示') ?>
<?php     } ?>
			</td>
			<td class="text_right"><?php echo h($officeProperty['OfficeProperty']['floor']); ?>&nbsp;</td>
			<td class="text_right"><?php echo h($this->Common->doubleVal($officeProperty['OfficeProperty']['floor_space'])); ?>&nbsp;</td>
			<td class="text_center"><?php echo Configure::read('SaleOrRent.'.$officeProperty['OfficeProperty']['sale_or_rent']); ?></td>
			<td class="text_right"><?php echo h(number_format(str_replace( ',', '', $officeProperty['OfficeProperty']['price']))); ?>&nbsp;</td>
			<td>
<?php     $drowing = $officeProperty['OfficeProperty']['drowing']; ?>
<?php     if (!empty($drowing)) { ?>
				<a href="<?php echo Configure::read('UploadDir') . $this->name; ?>/<?php echo $drowing; ?>" target="_blank">Image</a>
<?php     } else { ?>
				No Image
<?php     } ?>
			</td>
			<td class="actions">
				<div class="btn-group">
					<a class="btn btn-small" href="<?php echo $this->webroot; ?>admin/office_properties/edit/<?php echo $officeProperty['OfficeProperty']['id']; ?>"><?php __h('編集') ?></a>
					<?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $officeProperty['OfficeProperty']['id']), array('class'  => 'btn btn-small btn-danger'), __('%sのこちらの部屋を削除しますか？', $officeProperty['OfficeBuilding']['name'])); ?>
				</div>
			</td>
		</tr>
<?php } ?>
	</table>
	<?php echo $this->BootstrapPaginator->pagination(); ?>
</div>
