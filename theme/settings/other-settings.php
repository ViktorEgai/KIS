<?php 

// Удаление  меню из админки
add_action( 'admin_menu', 'remove_menus' );

function remove_menus(){
	remove_menu_page( 'edit.php' );                   // Записи
}

// Преобразование номера телефона
function getPhone($phone) {
  return preg_replace('/[\s+()-]/i', '', $phone);
}

// Настройки темы acf
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Настройки темы',
		'menu_title'	=> 'Настройки темы',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}

// Удаление <p> <br> contact form 7 
add_filter('wpcf7_autop_or_not', '__return_false');