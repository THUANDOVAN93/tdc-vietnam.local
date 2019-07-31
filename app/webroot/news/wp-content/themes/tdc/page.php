<?php get_header(); ?>

<!-- topicpath/ -->
<?php
    $categoryList = get_the_category();
    $cat_now  = $categoryList[0];
    $now_id   = $cat_now->cat_ID;
    $now_name = $cat_now->cat_name;
?>
<?php if ($now_id == 2){?>
<ul id="topicpath">
	<li class="home"><a href="/">TOP</a></li>
	<li>新着情報</li>
</ul>
	<div id="newsCnt">
		<h2><img src="/news/images/header_ttl_02.png" width="730" height="40" alt="新着情報" /></h2>
<?php }else if($now_id == 3){?>
<ul id="topicpath">
	<li class="home"><a href="/">TOP</a></li>
	<li>物件更新情報</li>
</ul>
	<div id="newsCnt">
		<h2><img src="/news/images/header_ttl_01.png" width="730" height="40" alt="物件更新情報" /></h2>
<?php }else{ ?>
	<div id="newsCnt">
<?php } ?>
<!-- /topicpath -->

<?php if (have_posts()) : // WordPress ループ
	while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h3><?php the_title(); ?></h3>
			<div class="data clearfix">
			<dl>
				<dt><img src="/news/images/icon_update.png"></dt>
				<dd><?php the_time('Y/m/d') ?></dd>
			</dl>
			</div><!-- / .data clearfix -->
			<div class="article">
				<?php the_content(); ?>
			</div><!-- / .article -->
							
			<?php 
				$args = array(
					'before' => '<div class="page-link">',
					'after' => '</div>',
					'link_before' => '<span>',
					'link_after' => '</span>',
				);
			wp_link_pages($args); ?>
		</div>
	<?php endwhile; // 繰り返し処理終了		
		else : // ここから記事が見つからなかった場合の処理 ?>
			<div class="post">
				<h3>記事はありません</h3>
				<p>お探しの記事は見つかりませんでした。</p>
			</div>
<?php endif; ?>

</div><!-- / #contactCnt -->
</div>
<!-- == /section_contents == -->

</div>
<!-- === /container === -->

<?php get_footer(); ?>