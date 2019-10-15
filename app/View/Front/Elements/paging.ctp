		<!-- search_pagenav/ -->
		<div class="search_pagenav">

			<dl class="clearfix">
				<dt><?php echo __('result'); ?></dt>
<?php if ($this->Paginator->counter(array('format' => '%count%')) > 0) { ?>
				<dd><?php 
				if (Configure::read('Config.language') == 'eng') {
					echo $this->Paginator->counter(array('format' => 'Show %start%～%end% properties out of %count% properties'));
				} else  {
					echo $this->Paginator->counter(array('format' => '該当件数%count%件中%start%～%end%件を表示中'));
				} ?></dd>
<?php } else { ?>
	<dd><?php echo __('search-no-result'); ?></dd>
<?php } ?>
			</dl>

			<div class="search_pagenav_li">
<?php if ($this->Paginator->counter(array('format' => '%pages%')) > 1) { ?>
				<ul class="clearfix">
<?php     if ($this->Paginator->hasPrev()) { ?>
					<?php echo $this->Paginator->first('<small>&lt;&lt;</small>&nbsp;'.__('ctrl-first'), array('tag' => 'li', 'escape' => false, 'class' => 'first')); ?>
					<?php echo $this->Paginator->prev('<small>&lt;</small>&nbsp;'.__('ctrl-previous'), array('tag' => 'li', 'escape' => false, 'class' => 'prev')); ?>
<?php     } else { ?>
					<li class="first on"><small>&lt;&lt;</small>&nbsp;<?php echo __('ctrl-first'); ?></li>
					<li class="prev on"><small>&lt;</small>&nbsp;<?php echo __('ctrl-previous'); ?></li>
<?php     } ?>

						<?php echo $this->Paginator->numbers(array('separator' => false, 'tag' => 'li', 'modulus'=>4)); ?>

<?php     if ($this->Paginator->hasNext()) { ?>
					<?php echo $this->Paginator->next(__('ctrl-next').'&nbsp;<small>&gt;</small>', array('tag' => 'li', 'escape' => false, 'class' => 'next')); ?>
					<?php echo $this->Paginator->last(__('ctrl-last').'&nbsp;<small>&gt;&gt;</small>', array('tag' => 'li', 'escape' => false, 'class' => 'last')); ?>
<?php   } else { ?>
					<li class="next"><?php echo __('ctrl-next'); ?>&nbsp;<small>&gt;</small></li>
					<li class="last"><?php echo __('ctrl-last'); ?>&nbsp;<small>&gt;&gt;</small></li>
<?php   } ?>
				</ul>
<?php } else { ?>
				<ul class="clearfix">
					<li class="first"><small>&lt;&lt;</small>&nbsp;<?php echo __('ctrl-first'); ?></li>
					<li class="prev"><small>&lt;</small>&nbsp;<?php echo __('ctrl-previous'); ?></li>
					<li class="on">1</li>
					<li class="next"><?php echo __('ctrl-next'); ?>&nbsp;<small>&gt;</small></li>
					<li class="last"><?php echo __('ctrl-last'); ?>&nbsp;<small>&gt;&gt;</small></li>
				</ul>
<?php } ?>
			</div>
		</div>
		<!-- /search_pagenav -->