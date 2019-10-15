<div class="container">

	<h2><?php __h('factory-property-management'); ?></h2>
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo $this->webroot; ?>admin/factory_buildings"><?php __h('factory-property-list'); ?></a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/factory_buildings/add"><?php __h('add-factory-property'); ?></a></li>
		<li class="disabled"><a><?php __h('edit-factory-properties'); ?></a></li>
	</ul>

	<?php echo $this->Form->create('FactoryBuilding', array('url' => 'search', 'class' => 'form-inline')); ?>
		<table class="table table-bordered table-condensed search_table">
			<tr>
				<th><?php __h('property-id'); ?></th>
				<td><?php echo $this->Form->text('id',array()); ?></td>
				<th><?php __h('project-name'); ?></th>
				<td><?php echo $this->Form->text('name', array()); ?></td>
			</tr>
			<tr>
				<th><?php __h('property-type'); ?></th>
				<td><?php echo $this->Form->select('factory_category_id', __arrTranslate($factoryCategories), array('empty' => true)); ?></td>
				<th><?php __h('factory-area'); ?></th>
				<td><?php echo $this->Form->select('factory_area_id', __arrTranslate($areas), array('empty' => true)); ?></td>
			</tr>
			<tr>
				
				<th><?php __h('inside-and-outside-industrial-park'); ?></th>
				<td><?php echo $this->Form->select('industrial_park_id', __arrTranslate($industrialParks), array('empty' => true)); ?></td>
				<th><?php __h('street-address'); ?></th>
				<td><?php echo $this->Form->text('address', array()); ?></td>
			</tr>
			<tr>
				<th><?php __h('developer'); ?></th>
				<td><?php echo $this->Form->text('developer', array()); ?></td>
				<th><?php __h('front-display'); ?></th>
				<td><?php echo $this->Form->select('visible', __arrTranslate(Configure::read('Visible')), array('empty' => true)); ?></td>
			</tr>
			<tr>
				<th><?php __h('display-priority'); ?></th>
				<td><?php echo $this->Form->select('priority', __arrTranslate(Configure::read('Priority')), array('empty' => true)); ?></td>
				<th><?php __h('icon'); ?></th>
				<td><?php echo $this->Form->select('icon', __arrTranslate(Configure::read('Icon.FactoryBuilding')), array('empty' => true)); ?></td>
			</tr>
			<tr>
				<th><?php __h('additional-information'); ?></th>
				<td><?php echo $this->Form->select('add_information', __arrTranslate($addInformations), array('empty' => true)); ?></td>
				<th></th>
				<td></td>
			</tr>
		</table>

		<div class="search_btn_area" align="center"><button type="submit" class="btn btn-large"><?php __h('search'); ?></button></div>
	<?php echo $this->Form->end(); ?>

	<hr />

	<span class="count_pagination"><?php echo $this->Paginator->counter(array('format' => '全:%count%件')); ?></span>

	<?php echo $this->BootstrapPaginator->pagination(); ?>
	<table class="table table-striped">
		<tr>
			<th><?php __h('ID'); ?></th>
			<th><?php __h('project-name'); ?></th>
			<th><?php __h('property-type'); ?></th>
			<th><?php __h('factory-area'); ?></th>
			<th><?php __h('update-date'); ?></th>
			<th class="actions"><?php __h('partition-operation'); ?></th>
			<th class="actions"><?php __h('operation'); ?></th>
		</tr>

		<?php foreach ($factoryBuildings as $factoryBuilding): ?>
		<?php
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
						<button type="submit" class="btn btn-small list_properties_btn"><?php __h('list'); ?></button>
						<?php echo $this->Form->hidden('factory_building_id', array('value' => $factoryBuilding['FactoryBuilding']['id'])); ?>
					<?php echo $this->Form->end(); ?>
					<a href="<?php echo $this->webroot; ?>admin/factory_properties/add/<?php echo $factoryBuilding['FactoryBuilding']['id']; ?>" class="btn btn-small"><?php __h('add-to'); ?></a>
				</div>
			</td>
			<td style="width: 10%" class="actions">
				<div class="btn-group">
					<a class="btn btn-small" href="<?php echo $this->webroot; ?>admin/factory_buildings/edit/<?php echo $factoryBuilding['FactoryBuilding']['id']; ?>"><?php __h('edit'); ?></a>
					<?php
						echo $this->Form->postLink(
							__('delete'),
							array(
								'action' => 'delete',
								$factoryBuilding['FactoryBuilding']['id']
							),
							array(
								'class'  => 'btn btn-small btn-danger'
							),
							__('delete-confirm', $factoryBuilding['FactoryBuilding']['name'])
						);
					?>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->BootstrapPaginator->pagination(); ?>
</div>
