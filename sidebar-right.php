<div class="right-column">	
	<?php get_search_form(); ?>
	<div class="random-img">
<!-- 		<img src="<?php bloginfo('template_url');?>/images/img/<?php echo rand(1,5);?>.jpg" alt="cat" id="gallery"> -->
	
<?php
//подключаем виджет
	if ( function_exists('dynamic_sidebar') )
		dynamic_sidebar('right-sidebar');
?>

<?php
// 	$images = get_posts(array(
// 	'post_status' => 'null',
//     'post_parent__not_in' => array(0),
// 	'posts_per_page' => 1,
// 	'post_type' => 'attachment',
// 	'orderby' => 'rand'
//   ));
			
// foreach ($images as $image) {
//   $src = wp_get_attachment_url($image->ID); // ссылка на изображение
//   $alt = get_post_meta($image->ID, '_wp_attachment_image_alt', true); // атрибут alt
//   $caption = $image->post_excerpt; // подпись к изображению
// }	
// 		wp_reset_postdata();
?>
		
		
<!-- <img src="<?php echo $src; ?>" alt="<?php echo $alt; ?>" width="100%"/>
			<p><?php echo $caption; ?></p>
		 -->
		
		
<?php
// $args = array( 'post_type' => 'attachment', 'posts_per_page' => 1, 'orderby' => 'rand', 'post_status' => null, 'post_parent__not_in' => array(0) );
// $attachments = get_posts( $args );
// if ($attachments) {
// 	foreach ( $attachments as $post ) { setup_postdata($post);
// 		the_attachment_link($post->ID, false);
// 		the_excerpt();
// 	}
// }
// wp_reset_postdata();
		
?>
	
	<?php
		
$args = array('post_type' => 'attachment', 'posts_per_page' => 1, 'orderby' => 'rand', 'post_parent__not_in' => array(0));
$attachments = get_posts($args);
if ($attachments) {
 foreach ( $attachments as $attachment ) {
  $my_url_foto = wp_get_attachment_url($attachment->ID);
$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true); // атрибут alt
$caption = $attachment->post_excerpt; // подпись к изображению
 ?>

  <img title="" src="<?php echo $my_url_foto; ?>" alt="<?php echo $alt;?>" height="100%" width="auto">
		 <a class="newpage" href="<?php echo get_permalink($attachment->ID); ?>"><?php echo $caption; ?></a>

 <?php }
}
wp_reset_postdata();
		
?>
		
		
		

		
	</div>
</div>