<?php 
add_theme_support( 'post-thumbnails' );

add_theme_support( 'menus' );

register_nav_menus(
        array(
                'main-nav' => 'Menu chính'
        )
);

//* Tùy biến Credits text trong Genesis 1
// add_filter( 'genesis_footer_creds_text', 'sp_footer_creds_text' );
// function sp_footer_creds_text() {
// 	echo '<div class="creds"><p>';
// 	echo 'Copyright &copy; ';
// 	echo date('Y');
// 	echo ' &middot; <a href="http://mydomain.com">My Custom Link</a> &middot; Built on the <a href="http://www.studiopress.com/themes/genesis" title="Genesis Framework">Genesis Framework</a>';
// 	echo '</p></div>';
// }

// add_filter('genesis_footer_creds_text', 'sp_footer_creds_filter');
// function sp_footer_creds_filter( $creds ) {
// 	$creds = '[footer_copyright] &middot; <a href="http://mydomain.com">My Custom Link</a> &middot; Built on the <a href="http://www.studiopress.com/themes/genesis" title="Genesis Framework">Genesis Framework</a>';
// 	return $creds;
// }

//* Tùy biến toàn bộ nội dung Footer trong Genesis
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'sp_custom_footer' );
function sp_custom_footer() {
	?>
	<p class="footer-content tc">SINGAPORE WATCH CLUB 2017 © ALL RIGHT RESERVED </p>
	<?php
}

?>
