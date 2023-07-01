<?php 
add_action( 'wp_enqueue_scripts', 'styles' );
add_action('wp_footer', 'my_scripts' );

function styles() {
  
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/style.min.css');
	
} 

function my_scripts() {
  wp_enqueue_script('jquery');

 	wp_enqueue_script('main.min.js', get_template_directory_uri(  ) . '/js/main.min.js', array('jquery'));	  
 	wp_enqueue_script('main.js', get_template_directory_uri(  ) . '/js/main.js', array('jquery'));	  
}

?>