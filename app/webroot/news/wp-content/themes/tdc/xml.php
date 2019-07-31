<?php
/*
Template Name: XML
*/
?>
<?php header('Content-Type: text/xml; charset='.get_option('blog_charset'), true); ?>
<?php echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>'; ?>
<news>

<?php query_posts("posts_per_page=10"); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php 
	$cat = get_the_category();
	$cat = $cat[0];
	$cat_id = $cat->cat_ID;
?>
	<item>
	<date><?php echo get_post_time('Y/m/d', true); ?></date>
	<category_id><?php echo $cat_id; ?></category_id>
	<url><?php the_permalink(); ?></url>
	<title><?php the_title_rss(); ?></title>
	</item>
<?php endwhile; ?>
<?php wp_reset_query(); endif; ?>
</news>