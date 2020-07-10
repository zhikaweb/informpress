<!DOCTYPE html>
<html lang="ru-RU">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo wp_get_document_title(); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="wrapper">
	<!-- ..........HEADER........... -->
<header>
	<div class="header-row">
		<!-- Logo, icons and slogan	 -->
		<div class="flex-column header-left-column">
			<div id="logoarea">
				<a href="<?php echo get_home_url(); ?>" title="ИСИ"><img src="<?php bloginfo('template_url'); ?>/images/IP_94_logo_web_white.png" alt="ИСИ"></a>
			</div>
			<div id="slogan">
				<p>
				Издательско-полиграфическое предприятие полного цикла <br>
				«Информпресс-94». Работаем с 1991 года.<br>
				Полиграфические услуги высшего качества в минимальные сроки.
				</p>
			</div>
		</div>
		<!-- 	Contacts	 -->
		<div class="flex-column header-right-column">
			<div id="navy">
				<a title="ИСИ" href="<?php echo get_home_url(); ?>">
					<i class="fas fa-home"></i>
				</a> 
				<a title="Письмо нам" href="mailto:info@isvi.ru">
					<i class="fas fa-paper-plane"></i>
				</a>  
				<a title="English version" href="<?php echo get_home_url(); ?>">
					<i class="fas fa-atlas"></i>
				</a>
			</div>
			<div id="phone">
				<p>
					<span>+7 (495)</span> 618-04-14
				</p>
				<p>
					<span>+7 (495)</span> 618-63-40
				</p>
			</div>
		</div>	
	</div>

	<!-- Navigation menu -->
	<nav class="menuarea">
		<?php wp_nav_menu (array('theme_location' => 'menu' )); ?>
		
	</nav>
</header>