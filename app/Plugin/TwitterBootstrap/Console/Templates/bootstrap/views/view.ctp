<div class="row-fluid">
	<h2><?php echo $pluralHumanName;?>管理</h2>
	<ul class="nav nav-tabs">
		<li><?php echo "<?php echo \$this->Html->link('" . $pluralHumanName. "一覧', array('action' => 'index')); ?>";?></li>
		<li><?php echo "<?php echo \$this->Html->link('" . $singularHumanName . "の追加', array('action' => 'add')); ?>";?></li>
		<li class="active"><a><?php echo $singularHumanName;?>の情報</a></li>
		<li><?php echo "<?php echo \$this->Html->link('" . $singularHumanName ."の編集', array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>";?></li>
		<!--
		<li><?php  echo "\t\t<li><?php echo \$this->Form->postLink(__('Delete %s', __('" . $singularHumanName . "')), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), null, __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?> </li>\n"; ?></li>
		-->
	</ul>
	<div class="span9">
		<dl>
<?php
foreach ($fields as $field) {
	$isKey = false;
	if (!empty($associations['belongsTo'])) {
		foreach ($associations['belongsTo'] as $alias => $details) {
			if ($field === $details['foreignKey']) {
				$isKey = true;
				echo "\t\t\t<dt><?php echo __('" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?></dt>\n";
				echo "\t\t\t<dd>\n\t\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t\t\t&nbsp;\n\t\t\t</dd>\n";
				break;
			}
		}
	}
	if ($isKey !== true) {
		echo "\t\t\t<dt><?php echo __('" . Inflector::humanize($field) . "'); ?></dt>\n";
		echo "\t\t\t<dd>\n\t\t\t\t<?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>\n\t\t\t\t&nbsp;\n\t\t\t</dd>\n";
	}
}
?>
		</dl>
	</div>
</div>

<?php
if (!empty($associations['hasOne'])) :
	foreach ($associations['hasOne'] as $alias => $details): ?>
<div class="row-fluid">
	<div class="span9">
		<h3><?php echo "<?php echo __('Related %s', __('" . Inflector::humanize($details['controller']) . "')); ?>";?></h3>
	<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])):?>\n";?>
		<dl>
<?php
		foreach ($details['fields'] as $field) {
			echo "\t\t\t<dt><?php echo __('" . Inflector::humanize($field) . "'); ?></dt>\n";
			echo "\t\t\t<dd>\n\t\t\t\t<?php echo \${$singularVar}['{$alias}']['{$field}'];?>\n\t\t\t\t&nbsp;\n\t\t\t</dd>\n";
		}
?>
		</dl>
	<?php echo "<?php endif; ?>\n";?>
	</div>
	<div class="span3">
		<ul class="nav nav-list">
			<li><?php echo "<?php echo \$this->Html->link(__('Edit %s', __('" . Inflector::humanize(Inflector::underscore($alias)) . "')), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?></li>\n";?>
		</ul>
	</div>
</div>

<?php
	endforeach;
endif;
if (empty($associations['hasMany'])) {
	$associations['hasMany'] = array();
}
if (empty($associations['hasAndBelongsToMany'])) {
	$associations['hasAndBelongsToMany'] = array();
}
$relations = array_merge($associations['hasMany'], $associations['hasAndBelongsToMany']);
$i = 0;
foreach ($relations as $alias => $details):
	$otherSingularVar = Inflector::variable($alias);
	$otherPluralHumanName = Inflector::humanize($details['controller']);
	?>
<div class="row-fluid">
	<div class="span9">
		<h3><?php echo "<?php echo __('Related %s', __('" . $otherPluralHumanName . "')); ?>";?></h3>
	<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])):?>\n";?>
		<table class="table">
			<tr>
<?php
			foreach ($details['fields'] as $field) {
				echo "\t\t\t\t<th><?php echo __('" . Inflector::humanize($field) . "'); ?></th>\n";
			}
?>
				<th class="actions"><?php echo "<?php echo __('Actions');?>";?></th>
			</tr>
<?php
echo "\t\t<?php foreach (\${$singularVar}['{$alias}'] as \${$otherSingularVar}): ?>\n";
		echo "\t\t\t<tr>\n";
			foreach ($details['fields'] as $field) {
				echo "\t\t\t\t<td><?php echo \${$otherSingularVar}['{$field}'];?></td>\n";
			}

			echo "\t\t\t\t<td class=\"actions\">\n";
			echo "\t\t\t\t\t<?php echo \$this->Html->link(__('View'), array('controller' => '{$details['controller']}', 'action' => 'view', \${$otherSingularVar}['{$details['primaryKey']}'])); ?>\n";
			echo "\t\t\t\t\t<?php echo \$this->Html->link(__('Edit'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$otherSingularVar}['{$details['primaryKey']}'])); ?>\n";
			echo "\t\t\t\t\t<?php echo \$this->Form->postLink(__('Delete'), array('controller' => '{$details['controller']}', 'action' => 'delete', \${$otherSingularVar}['{$details['primaryKey']}']), null, __('Are you sure you want to delete # %s?', \${$otherSingularVar}['{$details['primaryKey']}'])); ?>\n";
			echo "\t\t\t\t</td>\n";
		echo "\t\t\t</tr>\n";

echo "\t\t<?php endforeach; ?>\n";
?>
		</table>
	<?php echo "<?php endif; ?>\n\n";?>
	</div>
	<div class="span3">
		<ul class="nav nav-list">
			<li><?php echo "<?php echo \$this->Html->link(__('New %s', __('" . Inflector::humanize(Inflector::underscore($alias)) . "')), array('controller' => '{$details['controller']}', 'action' => 'add'));?>";?> </li>
		</ul>
	</div>
</div>
<?php endforeach;?>
