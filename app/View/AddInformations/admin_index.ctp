<div class="row-fluid">

	<h2><?php __h('TOP表示項目管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo $this->webroot; ?>admin/add_informations"><?php __h('TOP表示項目一覧'); ?></a></li>
		<li class="disabled"><a><?php __h('TOP表示項目の追加'); ?></a></li>
		<li class="disabled"><a><?php __h('TOP表示項目の編集'); ?></a></li>
	</ul>

	<?php echo $this->BootstrapPaginator->pagination(); ?>
	<table class="table table-striped">
		<tr>
			<th><?php __h('TOP表示項目名'); ?></th>
			<th><?php __h('TOP表示'); ?>/<?php __h('非表示'); ?></th>
			<th class="actions"><?php __h('操作'); ?></th>
		</tr>
<?php foreach ($addInformations as $addInformation) { ?>

		<tr>
			<td><?php __h($addInformation['AddInformation']['name']); ?>&nbsp;</td>
			<td>
<?php     if (!empty($addInformation['AddInformation']['is_enable'])) { ?>
				<?php __h('表示'); ?>
<?php     } else { ?>
				<?php __h('非表示'); ?>
<?php     } ?>
			</td>
			<td class="actions">
<?php     if ($addInformation['AddInformation']['id'] > 3) { ?>
				<div class="btn-group">
					<a class="btn btn-small" href="<?php echo $this->webroot; ?>admin/add_informations/edit/<?php echo $addInformation['AddInformation']['id']; ?>"><?php __h('編集'); ?></a>
				</div>
<?php     } else { ?>
				<div style="text-align:center;">---</div>
<?php     } ?>
			</td>
		</tr>
<?php } ?>
	</table>
	<?php echo $this->BootstrapPaginator->pagination(); ?>
</div>
