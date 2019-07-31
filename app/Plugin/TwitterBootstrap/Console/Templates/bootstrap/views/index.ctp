<div class="row-fluid">
	<h2><?php echo $pluralHumanName . '管理'; ?></h2>
	<ul class="nav nav-tabs">
		<li class="active"><a><?php echo $singularHumanName . '一覧'; ?></a></li>
		<li><?php echo "<?php echo \$this->Html->link('" . $singularHumanName . "の追加', array('action' => 'add')); ?>";?></li>
		<li class="disabled"><a><?php echo $singularHumanName . 'の情報'; ?></a></li>
		<li class="disabled"><a><?php echo $singularHumanName . 'の編集'; ?></a></li>
<?php
		$done = array();
		foreach ($associations as $type => $data) {
			foreach ($data as $alias => $details) {
				if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
					echo "\t\t<li><?php echo \$this->Html->link(__('List %s', __('" . Inflector::humanize($details['controller']) . "')), array('controller' => '{$details['controller']}', 'action' => 'index')); ?> </li>\n";
					echo "\t\t<li><?php echo \$this->Html->link(__('New %s', __('" . Inflector::humanize(Inflector::underscore($alias)) . "')), array('controller' => '{$details['controller']}', 'action' => 'add')); ?> </li>\n";
					$done[] = $details['controller'];
				}
			}
		}
?>
	</ul>
	<p><?php echo "<?php echo \$this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>";?></p>
	<table class="table table-condensed table-striped">
		<tr>
<?php
			foreach ($fields as $field) {
				echo "\t\t\t<th><?php echo \$this->BootstrapPaginator->sort('{$field}');?></th>\n";
			}
?>
			<th class="actions"><?php echo "<?php echo __('Actions');?>";?></th>
		</tr>
		<?php
		echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
		echo "\t\t<tr>\n";
		foreach ($fields as $field) {
			$isKey = false;
			if (!empty($associations['belongsTo'])) {
				foreach ($associations['belongsTo'] as $alias => $details) {
					if ($field === $details['foreignKey']) {
						$isKey = true;
						echo "\t\t\t<td>\n\t\t\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t\t\t</td>\n";
						break;
					}
				}
			}
			if ($isKey !== true) {
				echo "\t\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
			}
		}
		echo "\t\t\t<td class=\"actions\">\n";
		echo "\t\t\t\t<div class=\"btn-group\">\n";
		echo "\t\t\t\t<?php\n";
		echo "\t\t\t\t\techo \$this->Html->link(\n\t\t\t\t\t\t'詳細',\n\t\t\t\t\t\tarray('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']),\n\t\t\t\t\t\tarray('class'  => 'btn btn-small')\n\t\t\t\t\t);\n";
	 	echo "\t\t\t\t\techo \$this->Html->link(\n\t\t\t\t\t\t'編集',\n\t\t\t\t\t\tarray('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']),\n\t\t\t\t\t\tarray('class'  => 'btn btn-small')\n\t\t\t\t\t);\n";
	 	echo "\t\t\t\t\techo \$this->Form->postLink(\n\t\t\t\t\t\t'削除',\n\t\t\t\t\t\tarray('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']),\n\t\t\t\t\t\tarray('class'  => 'btn btn-small btn-danger'),\n\t\t\t\t\t\t__('%sの情報を削除しますか？', \${$singularVar}['{$modelClass}']['{$primaryKey}'])\n\t\t\t\t\t);\n";
		echo "\t\t\t\t?>\n";
		echo "\t\t\t\t</div>\n";
		echo "\t\t\t</td>\n";
		echo "\t\t</tr>\n";
		echo "\t\t<?php endforeach; ?>\n";
		?>
	</table>
	<?php echo "<?php echo \$this->BootstrapPaginator->pagination(); ?>\n"; ?>
</div>
