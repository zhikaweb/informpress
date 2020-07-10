<?php 
/**
* Template Name: 404
* Template Post Type: page
*/
?>
<!-- .........HEADER........ -->
<?php get_header(); ?> 

		<!-- ..........MAIN PAGE........... -->

<div class="main-content">
	<div class="container">
		<div class="main-content-row">
		
	<!-- left column -->

<?php get_sidebar('left'); ?>
	
	<!-- main column -->
<div class="maincolumn">
	<div class="result404">	
		<p><?php _e( 'Кажется, мы что-то потеряли...', 'informpress' ); ?></p>
		<p><a class="new-page" href="<?php echo get_home_url(); ?>"><?php _e( 'Пожалуйста, начните с главной страницы.', 'informpress' ); ?></a></p>
	</div>
</div>
<!-- right column -->
<?php get_sidebar('right'); ?>
		</div>
	</div>
</div>
<!-- ........FOOTER.........  -->

<?php get_footer(); ?>