<?php 
add_action( 'after_setup_theme', 'menu');

function menu() {
  register_nav_menu('header-menu-left', 'Меню шапки слева'); 
  register_nav_menu('header-menu-right', 'Меню шапки справа '); 
  register_nav_menu('header-mobile-menu', 'Мобильное меню');
  register_nav_menu('footer-menu', 'Меню подвала');
}

// Изменяет основные параметры меню
add_filter( 'wp_nav_menu_args', 'filter_wp_menu_args' );
function filter_wp_menu_args ($args) {
  if ( $args['theme_location'] === 'header-menu-left' || $args['theme_location'] === 'header-menu-right') {
    $args['container'] = false;
    $args['item_wrap'] = '<ul class="%2$s ">%3$s </ul>';
    $args['menu_class'] = 'header-menu';
  }
  if ( $args['theme_location'] === 'header-mobile-menu' ) {
    $args['container'] = false;
    $args['item_wrap'] = '<ul class="%2$s ">%3$s </ul>';
    $args['menu_class'] = 'header-mobile-menu__list';
  }
  if ( $args['theme_location'] === 'footer-menu') {
    $args['container'] = false;
    $args['item_wrap'] = '<ul class="%2$s ">%3$s </ul>';
    $args['menu_class'] = 'footer-menu';
  }
  return $args;
} 


// Изменяем атрибут class у тега li 
add_filter( 'nav_menu_css_class', 'filter_menu_css_classes', 10, 4 );
function filter_menu_css_classes( $classes, $item, $args, $depth ) {
  
  if ($args -> theme_location === 'header-menu-left' || $args -> theme_location === 'header-menu-right' ) {
    $classes = [
      // классы для li, например nav_item $depth глубина вложенности равна 0
			'header-menu__item'
    ];    
  }
  if ($args -> theme_location === 'header-mobile-menu' ) {
    $classes = [
      // классы для li, например nav_item $depth глубина вложенности равна 0
			'header-mobile-menu__item'
    ];    
  }
  if ( $args -> theme_location === 'footer-menu') {
    $classes = [
      // классы для li, например nav_item $depth глубина вложенности равна 0
			'footer-menu__item'
    ];    
  }
  return $classes;
}
// Изменяем класс у подменю ul
add_filter( 'nav_menu_submenu_css_class', 'filter_nav_menu_submenu_css_class', 10, 3 );
function filter_nav_menu_submenu_css_class( $classes, $args, $depth) {
  if ($args -> theme_location === 'header-menu-left' || $args -> theme_location === 'header-menu-right' ) {
    $classes = [
      'header-submenu'
      // классы для ul sub-menu
    ];
  }
  
  return $classes;
}
// изменения класс для ссылки
add_filter( 'nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4 );
function filter_nav_menu_link_attributes( $attr, $item, $args, $depth) {
  if ($args -> theme_location === 'header-menu-left' || $args -> theme_location === 'header-menu-right' ) {
    $attr['class'] = ''; // класс для ссылки
  }  
  
  if ($args -> theme_location === 'footer-menu') {
    $attr['class'] = ''; // класс для ссылки
  }  
  return $attr;
} ?>