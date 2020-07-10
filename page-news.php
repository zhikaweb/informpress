<?php 
/**
* Template Name: page-news
* Template Post Type: post, page, product
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

	<h1><?php the_title(); ?></h1>	
	<?php
	$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1; // определяем текущую страницу блога
$args = array(
	'posts_per_page' => get_option('posts_per_page'), // значение по умолчанию берётся из настроек, но вы можете использовать и собственное
	'paged'          => $current_page // текущая страница
);
query_posts( $args );
 
$wp_query->is_archive = true;
$wp_query->is_home = false;
?>
 <?php if ( have_posts() ) :
		while(have_posts()): the_post(); ?>
		<div class="news-date"><?php the_date() ?></div>
		<h2 class="news-title"><?php the_title() /* заголовок */ ?></h2>
		<div class="page-news"><?php the_content('Читать далее') /* содержимое поста */ ?></div>
		
	<?php
endwhile; ?>

<?php endif; ?> 
<?php wp_corenavi(); ?>
</div>
<!-- right column -->
<?php get_sidebar('right'); ?>
		</div>
	</div>
</div>
<!-- ........FOOTER.........  -->

<?php get_footer(); ?>