<?php get_header(); ?>

<!-- <div id="newsCnt">
	<h2><img src="<?php bloginfo('template_url'); ?>/images/header_ttl_02.png" width="730" height="40" alt="新着情報" /></h2> -->

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

<?php if (have_posts()) : query_posts($query_string); // WordPress ループ
while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h3><a href="<?php the_permalink() ?>" class="link"><?php the_title(); ?></a></h3>
		<div class="data clearfix">
			<dl>
				<dt><img src="/news/images/icon_update.png"></dt>
				<dd><?php the_time('Y/m/d') ?></dd>
			</dl>
		</div><!-- / .data clearfix -->
		<div class="article">
			<?php the_content(); ?>
		</div><!-- / .article -->
	</div><!-- /post -->
	<?php 
	endwhile; // 繰り返し処理終了		
	else : // ここから記事が見つからなかった場合の処理 ?>
		<div class="post">
			<h3>記事はありません</h2>
			<p>お探しの記事は見つかりませんでした。</p>
		</div>
<?php
	endif;
?>

<!-- <div class="wp-pagenavi">
<span class="pages">1 / 9</span> <span class="current">1</span>  <a class="page larger" href="#">2</a>  <a class="page larger" href="#">3</a> <span class="extend">...</span>
</div> -->

<?php wp_pagenavi(); ?>

</div><!-- / #contactCnt -->
</div>
<!-- == /section_contents == -->

</div>
<!-- === /container === -->

<?php get_footer(); ?>