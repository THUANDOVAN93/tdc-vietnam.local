<div class="row-fluid">

	<h2><?php __h('路線管理'); ?></h2>
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo $this->webroot; ?>admin/lines"><?php __h('路線一覧'); ?></a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/lines/add"><?php __h('路線の追加'); ?></a></li>
		<li class="disabled"><a><?php __h('路線の編集'); ?></a></li>
	</ul>

	<?php echo $this->BootstrapPaginator->pagination(); ?>
	<table class="table table-striped">
		<tr>
			<th><?php __h('路線名'); ?></th>
			<th class="actions"><?php __h('操作'); ?></th>
		</tr>
		<?php foreach ($lines as $line): ?>
		<tr>
			<td><?php echo h($line['Line']['name']); ?>&nbsp;</td>
			<td class="actions">
				<div class="btn-group"><?php
					echo $this->Html->link(__('編集'), array('action' => 'edit', $line['Line']['id']), array('class'  => 'btn btn-small'));
					echo $this->Form->postLink(__('削除'), array('action' => 'delete', $line['Line']['id']), array('class'  => 'btn btn-small btn-danger'), __('%sの情報を削除しますか？', $line['Line']['name']) );
				?></div>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->BootstrapPaginator->pagination(); ?>
</div>
