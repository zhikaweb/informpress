<div class="sidebar">
	<nav>
		<? wp_nav_menu(array('theme_location' => 'aside-menu', 'menu_class' => 'leftmenu')); ?>
	</nav>
	<nav>
		<? wp_nav_menu(array('theme_location' => 'leftmenu', 'menu_class' => 'leftmenu')); ?>
	</nav>

		<div id="onlinearea">
			<div id="icon"><i class="far fa-envelope-open"></i></div>
			<nav class="online"><p>Online заказ</p>
				<? wp_nav_menu(array('theme_location' => 'online')); ?>
				
			</nav>
		</div>
	</div>