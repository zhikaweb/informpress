<?php 
/**
* Template Name: single
* Template Post Type: page, post
*/
?>

<?php get_header(); ?> 

		<!-- ..........MAIN PAGE........... -->

<div class="main-content">
	<div class="container">
		<div class="main-content-row">
		
	<!-- left column -->

<?php get_sidebar('left'); ?>
	
	<!-- main column -->
<div class="maincolumn">
	
	<?php if (have_posts()): while (have_posts()): the_post(); ?>
		<div class="news-date"><?php the_date() ?></div>
		<h2 class="news-title"><?php the_title() /* заголовок */ ?></h2>
		<div class="page-news"><?php the_content(); ?></div>
	<?php	
	 endwhile; endif; ?>

</div>
<!-- right column -->
<?php get_sidebar('right'); ?>
		</div>
	</div>
</div>
<!-- ........FOOTER.........  -->

<?php get_footer(); ?>