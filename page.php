<?php 
/**
* Template Name: page
* Template Post Type: page
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
	<?php if (have_posts()): while (have_posts()): the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; endif; ?>

</div>
<!-- right column -->
<?php get_sidebar('right'); ?>
		</div>
	</div>
</div>
<!-- ........FOOTER.........  -->

<?php get_footer(); ?>