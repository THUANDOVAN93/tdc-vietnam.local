<div class="row-fluid">

	<h2><?php __h('factory-type-management'); ?></h2>
	<ul class="nav nav-tabs">
		<li><a href="<?php echo $this->webroot; ?>admin/factory_categories"><?php __h('factory-type-list'); ?></a></li>
		<li class="active"><a href="<?php echo $this->webroot; ?>admin/factory_categories/add"><?php __h('add-factory-type'); ?></a></li>
		<li class="disabled"><a><?php __h('edit-factory-type'); ?></a></li>
	</ul>

	<?php echo $this->Form->create('FactoryCategory', array('class' => 'form-horizontal')); ?>
		<fieldset>
			<table class="table-input">
				<tr>
					<th><?php __h('factory-type-name'); ?><span class="label label-important require-s"><?php __h('required'); ?></span></th>
					<td><?php echo $this->Form->text('name'); ?>
<?php $err = isset($validErrors['name'][0]);?>
<?php if ($err) { ?>
					<p class="alert alert-error alert_valid">※<?php __h($validErrors['name'][0]); ?></p>
<?php } ?>
					</td>
				</tr>
			</table>

			<div class="form-actions"><button class="btn" type="submit"><?php __h('save'); ?></button></div>
		</fieldset>
	<?php echo $this->Form->end(); ?>
</div>
