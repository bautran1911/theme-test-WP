<?php 
add_theme_support( 'post-thumbnails' );

add_theme_support( 'menus' );

register_nav_menus(
        array(
                'main-nav' => 'Menu chính'
        )
);

	add_filter( 'menu_image_default_sizes', function($sizes){

     // remove the default 36x36 size

     unset($sizes['menu-36x36']);

     // add a new size

     $sizes['menu-100x100'] = array(100,100);

     // return $sizes (required)

     return $sizes;

});

remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'sp_custom_footer' );
function sp_custom_footer() {
	?>
	<p class="footer-content tc">SINGAPORE WATCH CLUB 2017 © ALL RIGHT RESERVED </p>
	<?php
}

?>
