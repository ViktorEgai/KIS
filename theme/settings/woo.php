<?php 
//  подключение woocommerce
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

// счетчик на корзине
add_filter('woocommerce_add_to_cart_fragments', 'header_add_to_cart_fragment');

function header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start();
    ?>
    <span class="cart-btn-counter">
      <?php echo sprintf($woocommerce->cart->cart_contents_count); ?>
    </span>
    <?php
    $fragments['.cart-btn-counter'] = ob_get_clean();
    return $fragments;
}

add_filter('woocommerce_add_to_cart_fragments', 'cart_counter');
function cart_counter( $fragments ) {
    global $woocommerce;
    ob_start();
    $counter = $woocommerce->cart->cart_contents_count;
    ?>
    
    <p class="cart-counter">
	В корзине <?php echo declOfNum($counter, array('товар', 'товара', 'товаров') ) ?>
 </p>
    
    <?php
    $fragments['.cart-counter'] = ob_get_clean();
    return $fragments;
}


// Каталог товаров
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 ); 
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart',10 );
remove_action( 'woocommerce_before_shop_loop_item_title' , 'woocommerce_template_loop_product_thumbnail' , 10);
// вывод изображений в каталоге
add_action( 'woocommerce_before_shop_loop_item_title' , function() {
  echo ' <div class="catalog-item__thumb">';					
    woocommerce_template_loop_product_thumbnail();
  echo '</div>';
  $product_image_hover = get_field('product_image_hover');
  if ( !empty($product_image_hover) ) : 
    echo '
     <div class="catalog-item__thumb catalog-item__thumb--hover">
      <img src="'.$product_image_hover['url'] .'" alt="">
     </div>
     ';
  endif;

} , 10);
// Заголовок товара
add_filter( 'woocommerce_product_loop_title_classes', 'add_title_class' );
function add_title_class( $string ){
  $string .= ' catalog-item__title';
	// filter...
	return $string;
}
add_action('woocommerce_after_shop_loop_item_title', 'show_size', 30);
function show_size() {
  global $product;
  $size = $product->get_attribute('size');
  $each_size = explode(',', $size);   
 
  echo '<ul class="catalog-item__size">
          <li class="catalog-item__size-item">Size (IT)</li>';

  foreach ($each_size as $size_item ) :
		echo '<li class="catalog-item__size-item">'. $size_item.'</li>';							
  endforeach;
  echo '</ul>';
};

// single-product


remove_action( 'woocommerce_single_product_summary', 
'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 
'woocommerce_template_single_sharing', 40 );
remove_action( 'woocommerce_single_product_summary', 
'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 
'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_after_single_product_summary', 
'woocommerce_output_product_data_tabs', 10 );



add_action( 'woocommerce_single_product_summary', 
'woocommerce_template_single_price', 6 );
add_action( 'woocommerce_single_product_summary', 
'woocommerce_template_single_meta', 10 );
add_action( 'woocommerce_single_product_summary', 
'woocommerce_output_product_data_tabs', 12 );
// add_action( 'template_redirect', function() {
// global $woocommerce;

  
//   if( is_page('cart')  && sprintf($woocommerce->cart->cart_contents_count) > 0  ) {		wp_redirect( 'http://detskiy-dvor/checkout/', 301 );
// 		exit;
// 	}
 
	
// } );

