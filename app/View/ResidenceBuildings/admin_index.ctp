<div class="container">

	<h2><?php __h('住居物件管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo $this->webroot; ?>admin/residence_buildings"><?php __h('住居物件一覧'); ?></a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/residence_buildings/add"><?php __h('住居物件の追加'); ?></a></li>
		<li class="disabled"><a><?php __h('住居物件の編集'); ?></a></li>
	</ul>
	<?php echo $this->Form->create('ResidenceBuilding', array('url' => 'search', 'class' => 'form-inline')); ?>
		<table class="table table-bordered table-condensed search_table">
			<tr>
				<th><?php __h('物件ID'); ?></th>
				<td><?php echo $this->Form->text('id',array()); ?></td>
				<th><?php __h('物件名'); ?></th>
				<td><?php echo $this->Form->text('name', array()); ?></td>
			</tr>
			<tr>
				<th><?php __h('物件種別'); ?></th>
				<td><?php echo $this->Form->select('residence_category_id', __arrTranslate($residenceCategories), array('empty' => true)); ?></td>
				<th><?php __h('エリア'); ?></th>
				<td><?php echo $this->Form->select('area_id', __arrTranslate($areas), array('empty' => true)); ?></td>
			</tr>
			<tr>
				<th><?php __h('住所'); ?></th>
				<td><?php echo $this->Form->text('address', array()); ?></td>
				<th><?php __h('最寄駅'); ?></th>
				<td><?php echo $this->Form->select('station_id', __arrTranslate($stations), array('empty' => true)); ?></td>
			</tr>
			<tr>
				<th><?php __h('フロント表示'); ?></th>
				<td><?php echo $this->Form->select('visible', __arrTranslate(Configure::read('Visible')), array('empty' => true)); ?></td>
				<th><?php __h('表示優先度'); ?></th>
				<td><?php echo $this->Form->select('priority', __arrTranslate(Configure::read('Priority')), array('empty' => true)); ?></td>
			</tr>
			<tr>
				<th><?php __h('アイコン'); ?></th>
				<td><?php echo $this->Form->select('icon', __arrTranslate(Configure::read('Icon.ResidenceBuilding')), array('empty' => true)); ?></td>
				<th><?php __h('追加情報'); ?></th>
				<td><?php echo $this->Form->select('add_information', __arrTranslate($addInformations), array('empty' => true)); ?></td>
			</tr>
		</table>

		<div class="search_btn_area" align="center"><button type="submit" class="btn btn-large"><?php __h('検索'); ?></button></div>
	<?php echo $this->Form->end(); ?>

	<hr />

	<span class="count_pagination">
		<?php __h('全: %d件',$this->Paginator->counter()); ?>
	</span>

	<?php echo $this->BootstrapPaginator->pagination(); ?>
	<table class="table table-striped">
		<tr>
			<th><?php __h('ID'); ?></th>
			<th><?php __h('物件名'); ?></th>
			<th><?php __h('物件種別'); ?></th>
			<th><?php __h('エリア'); ?></th>
			<th><?php __h('更新日'); ?></th>
			<th class="actions"><?php __h('部屋操作'); ?></th>
			<th class="actions"><?php __h('操作'); ?></th>
		</tr>

<?php foreach ($residenceBuildings as $residenceBuilding) { ?>
<?php
          // アラート表示
          $term        = Configure::read('AlertTerm');
          $alert_id    = $residenceBuilding['ResidenceBuilding']['alert_id'];
          $next_update = $now = time();
          if (!is_null($residenceBuilding['ResidenceBuilding']['unixtime'])) {
              $next_update = $residenceBuilding['ResidenceBuilding']['unixtime'];
          }
          $class = '';
          if($next_update < $now) {
              $class = ' class="error"';
          } elseif ($alert_id == 0) {
              $class = ' class="warning"';
          }
?>
		<tr<?php echo $class; ?>>
			<td style="width: 5%;text-align:right;"><?php echo h($residenceBuilding['ResidenceBuilding']['id']); ?>&nbsp;</td>
			<td style="width: 35%"><?php echo h($residenceBuilding['ResidenceBuilding']['name']); ?>&nbsp;</td>
			<td style="width: 15%"><?php echo h($residenceCategories[$residenceBuilding['ResidenceBuilding']['residence_category_id']]); ?>&nbsp;</td>
			<td style="width: 20%"><?php echo h($areas[$residenceBuilding['ResidenceBuilding']['area_id']]); ?>&nbsp;</td>
			<td style="width: 15%"><?php echo h($residenceBuilding['ResidenceBuilding']['modified']); ?>&nbsp;</td>
			<td style="width: 10%" class="actions">
				<div class="btn-group">
					<?php echo $this->Form->create('ResidenceBuilding', array('url' => '/admin/residence_properties/search', 'class' => 'list_properties_form')); ?>
						<button type="submit" class="btn btn-small list_properties_btn"><?php __h('一覧'); ?></button>
						<?php echo $this->Form->hidden('residence_building_id', array('value' => $residenceBuilding['ResidenceBuilding']['id'])); ?>
					<?php echo $this->Form->end(); ?>
					<a href="<?php echo $this->webroot; ?>admin/residence_properties/add/<?php echo $residenceBuilding['ResidenceBuilding']['id']; ?>" class="btn btn-small"><?php __h('追加'); ?></a>
				</div>
			</td>
			<td style="width: 10%" class="actions">
				<div class="btn-group">
					<a href="<?php echo $this->webroot; ?>admin/residence_buildings/edit/<?php echo $residenceBuilding['ResidenceBuilding']['id']; ?>" class="btn btn-small">
						<?php __h('編集'); ?>
					</a>
					<?php echo $this->Form->postLink(
						__('削除'),
						 array(
						 	'action' => 'delete',
						 	$residenceBuilding['ResidenceBuilding']['id']),
						 	array('class'  => 'btn btn-small btn-danger'),
						 	__('%sの情報を削除しますか？', $residenceBuilding['ResidenceBuilding']['name'])
					 ); ?>
				</div>
			</td>
		</tr>
<?php } ?>
	</table>
	<?php echo $this->BootstrapPaginator->pagination(); ?>
</div>
