		<!-- search_pagenav/ -->
		<div class="search_pagenav">

			<dl class="clearfix">
				<dt><img src="<?php echo $this->webroot; ?>common/images/search/search_pagenav_txt01.png" width="60" height="21" alt="検索結果" /></dt>
<?php if ($this->Paginator->counter(array('format' => '%count%')) > 0) { ?>
				<dd><?php echo $this->Paginator->counter(array('format' => '該当件数%count%件中%start%～%end%件を表示中')); ?></dd>
<?php } else { ?>
				<dd>該当件数0件</dd>
<?php } ?>
			</dl>

			<div class="search_pagenav_li">
<?php if ($this->Paginator->counter(array('format' => '%pages%')) > 1) { ?>
				<ul class="clearfix">
<?php     if ($this->Paginator->hasPrev()) { ?>
					<?php echo $this->Paginator->first('<small>&lt;&lt;</small>&nbsp;最初へ', array('tag' => 'li', 'escape' => false, 'class' => 'first')); ?>
					<?php echo $this->Paginator->prev('<small>&lt;</small>&nbsp;前へ', array('tag' => 'li', 'escape' => false, 'class' => 'prev')); ?>
<?php     } else { ?>
					<li class="first on"><small>&lt;&lt;</small>&nbsp;最初へ</li>
					<li class="prev on"><small>&lt;</small>&nbsp;前へ</li>
<?php     } ?>

						<?php echo $this->Paginator->numbers(array('separator' => false, 'tag' => 'li', 'modulus'=>4)); ?>

<?php     if ($this->Paginator->hasNext()) { ?>
					<?php echo $this->Paginator->next('次へ&nbsp;<small>&gt;</small>', array('tag' => 'li', 'escape' => false, 'class' => 'next')); ?>
					<?php echo $this->Paginator->last('最後へ&nbsp;<small>&gt;&gt;</small>', array('tag' => 'li', 'escape' => false, 'class' => 'last')); ?>
<?php   } else { ?>
					<li class="next">次へ&nbsp;<small>&gt;</small></li>
					<li class="last">最後へ&nbsp;<small>&gt;&gt;</small></li>
<?php   } ?>
				</ul>
<?php } else { ?>
				<ul class="clearfix">
					<li class="first"><small>&lt;&lt;</small>&nbsp;最初へ</li>
					<li class="prev"><small>&lt;</small>&nbsp;前へ</li>
					<li class="on">1</li>
					<li class="next">次へ&nbsp;<small>&gt;</small></li>
					<li class="last">最後へ&nbsp;<small>&gt;&gt;</small></li>
				</ul>
<?php } ?>
			</div>
		</div>
		<!-- /search_pagenav -->