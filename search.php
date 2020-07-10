<?php 
/**
* Template Name: search
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
	<div class="search-result"><?php printf( __( 'Результаты поиска для: %s', 'informpress' ), get_search_query() ); ?>
	
		<?php if ( have_posts() ) :
			while ( have_posts() ) : the_post(); ?>
				<div id="posts">
					<p class="search-header"><a class="new-page" href="<?php the_permalink() ?>"><?php the_title() ?></a></p>
					<p class="search-title"><?php the_excerpt() ?></p>
				</div>
		<?php endwhile; ?>
		<?php
		else :
			echo "<p class='notfound'>Извините, по Вашему запросу ничего не найдено.</p>";
	endif;
?>
<!-- пагинация -->
<?php wp_corenavi(); ?>
	</div>
</div>
<!-- right column -->
<?php get_sidebar('right'); ?>
		</div>
	</div>
</div>
<!-- ........FOOTER.........  -->

<?php get_footer(); ?>