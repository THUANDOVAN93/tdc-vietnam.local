<div class="row-fluid">
	<h2><?php echo $pluralHumanName; ?>管理</h2>
	<ul class="nav nav-tabs">
		<li><?php echo "<?php echo \$this->Html->link('" . $pluralHumanName . "一覧', array('action' => 'index'));?>";?></li>
<?php if (strpos($action, 'add') === false): ?>
		<li><?php echo "<?php echo \$this->Html->link('" . $singularHumanName. "の追加', array('action' => 'add'));?>";?></li>
		<li><?php echo "<?php echo \$this->Html->link('" . $singularHumanName. "の情報', array('action' => 'view', \$this->Form->value('{$modelClass}.{$primaryKey}')));?>";?></li>
		<li class="active"><a><?php echo $singularHumanName; ?>の編集</a></li>
		<!--
		<li><?php echo "<?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), null, __('Are you sure you want to delete # %s?', \$this->Form->value('{$modelClass}.{$primaryKey}'))); ?>";?></li>
		-->
<?php else: ?>
		<li class="active"><a><?php echo $singularHumanName; ?>の追加</a></li>
		<li class="disabled"><a><?php echo $singularHumanName; ?>の情報</a></li>
		<li class="disabled"><a><?php echo $singularHumanName; ?>の編集</a></li>
<?php endif;?>
	</ul>
	<?php echo "<?php echo \$this->BootstrapForm->create('{$modelClass}', array('class' => 'form-horizontal'));?>\n";?>
		<fieldset>
		<?php
		echo "<?php\n";
		$id = null;
		foreach ($fields as $field) {
			if (strpos($action, 'add') !== false && $field == $primaryKey) {
				continue;
			} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
				if ($field == $primaryKey) {
					$id = "\t\t\techo \$this->BootstrapForm->hidden('{$field}');\n";
				} else {
					if($this->templateVars['schema'][$field]['null'] == false){
						$required = ", array(\n\t\t\t\t'required'   => 'required',\n\t\t\t\t'helpInline' => '<span class=\"label label-important\">' . __('Required') . '</span>&nbsp;')\n\t\t\t";
					} else {
						$required = null;
					}
					echo "\t\t\techo \$this->BootstrapForm->input('{$field}'{$required});\n";
				}
			}
		}
		echo $id;
		unset($id);
		if (!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
				echo "\t\t\t\techo \$this->BootstrapForm->input('{$assocName}');\n";
			}
		}
		echo "\t\t?>\n";
		echo "\t\t<?php echo \$this->BootstrapForm->submit(__('Submit'));?>\n";
		?>
		</fieldset>
	<?php echo "<?php echo \$this->BootstrapForm->end();?>\n"; ?>
</div>
