<?php  
//подключаем стили и скрипты
function register_styles () {
	wp_register_style('style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style( 'style' );

	wp_register_style('all.css', get_template_directory_uri() . '/fonts/fontawesome/css/all.css');
	wp_enqueue_style( 'all.css' );
}
add_action( 'wp_enqueue_scripts', 'register_styles' );

function register_scripts(){
	wp_enqueue_script( 'myscript', get_template_directory_uri() . '/js/script.js');
}
add_action( 'wp_enqueue_scripts', 'register_scripts' );

//sidebar
function register_my_widgets(){
	register_sidebar( array(
		'name' => "Правая боковая панель сайта",
		'id' => 'right-sidebar',
		'description' => 'Эти виджеты будут показаны в правой колонке сайта',
		'before_title' => '<h1>',
		'after_title' => '</h1>'
	) );
}
add_action( 'widgets_init', 'register_my_widgets' );


// register_nav_menu('menu', 'main-menu');
add_action('after_setup_theme', function(){
	register_nav_menus( array(
		'main-menu' => 'main-menu',
		'aside-menu' => 'aside-menu',
		'leftmenu' => 'leftmenu',
		'online' => 'online'
	) );
});

//подключаем миниатюры
add_theme_support( 'post-thumbnails' );
add_image_size( 'informpress-thumb', 130, 9999 ); 
add_filter( 'image_size_names_choose', 'my_custom_sizes' );
function my_custom_sizes( $sizes ) {
	return array_merge( $sizes, array(
		'informpress-thumb' => 'Мой размерчик',
	) );
}


// Функция для подсветки слов поиска в WordPress
add_filter('the_content', 'informpress_search_backlight');
add_filter('the_excerpt', 'informpress_search_backlight');
add_filter('the_title', 'informpress_search_backlight');
function informpress_search_backlight( $text ){
	// ------------ Настройки -----------
	$styles = ['',
		'color: #000; background: #99ff66;',
		'color: #000; background: #ffcc66;',
		'color: #000; background: #99ccff;',
		'color: #000; background: #ff9999;',
		'color: #000; background: #FF7EFF;',
	];

	// только для страниц поиска...
	if ( ! is_search() ) return $text;

	$query_terms = get_query_var('search_terms');
	if( empty($query_terms) ) $query_terms = array(get_query_var('s'));
	if( empty($query_terms) ) return $text;

	$n = 0;
	foreach( $query_terms as $term ){
		$n++;

		$term = preg_quote( $term, '/' );
		$text = preg_replace_callback( "/$term/iu", function($match) use ($styles,$n){
			return '<span style="'. $styles[ $n ] .'">'. $match[0] .'</span>';
		}, $text );
	}

	return $text;
}

//  Функция для постраничной навигации
function wp_corenavi() {
global $wp_query, $wp_rewrite;
$pages = '';
$max = $wp_query->max_num_pages;
if (!$current = get_query_var('paged')) $current = 1;
$a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
$a['total'] = $max;
$a['current'] = $current;
 
$total = 0; //1 - выводить текст "Страница N из N", 0 - не выводить
$a['mid_size'] = 1; //сколько ссылок показывать слева и справа от текущей
$a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
$a['prev_text'] = '<<'; //текст ссылки "Предыдущая страница"
$a['next_text'] = '>>'; //текст ссылки "Следующая страница"
 
if ($max > 1) echo '<nav class="pagenavi">';
if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
echo $pages . paginate_links($a);
if ($max > 1) echo '</nav>';
}

// Отключение Emoji в WordPress
if(1){
	## отключаем DNS prefetch
	add_filter('emoji_svg_url', '__return_empty_string');

	/**
	 * Disable the emoji's
	 */
	add_action( 'init', 'disable_emojis' );
	function disable_emojis() {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	}

	/**
	 * Filter function used to remove the tinymce emoji plugin.
	 *
	 * @param    array  $plugins
	 * @return   array             Difference betwen the two arrays
	 */
	function disable_emojis_tinymce( $plugins ) {
		if ( is_array( $plugins ) ) {
			return array_diff( $plugins, array( 'wpemoji' ) );
		} else {
			return array();
		}
	}
}




?>