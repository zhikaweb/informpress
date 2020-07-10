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
		
	<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>

				<h1><?php single_post_title(); ?></h1>
			<?php endif; ?>

			<?php
			while (have_posts()): the_post();

			get_template_part( 'content', get_post_format() );

			endwhile;
			else :
			get_template_part( 'content', 'none' );

		endif;
		?>
		
			
	</div>

	<!-- right column -->
			   
	<?php get_sidebar('right'); ?>
	</div>
</div>
</div>
	
		<!-- ..........FOOTER......... -->
	
<?php get_footer(); ?>

