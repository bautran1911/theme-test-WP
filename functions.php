<?php 
add_theme_support( 'post-thumbnails' );

add_theme_support( 'menus' );

register_nav_menus(
        array(
		'main-nav-sm' => 'Menu Mobile',
                'main-nav' => 'Menu chính',
                'footer-nav' => 'Footer menu'
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


function footer_customize_register($wp_customize) 
{
	$wp_customize->add_section("ads", array(
		"title" => __("Footer", "customizer_ads_sections"),
		"priority" => 30,
	));

        $wp_customize->add_setting("footer_text", array(
		"default" => "",
		"transport" => "postMessage",
	));

        $wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"ads_text",
		array(
			"label" => __("Enter Footer Text", "customizer_ads_text_label"),
			"section" => "ads",
			"settings" => "footer_text",
			"type" => "textarea",
		)
	));

        wp_enqueue_script("footer-themecustomizer", get_template_directory_uri() . "/theme-customizer.js", array("jquery", "customize-preview"), '',  true);
}

add_action("customize_register","footer_customize_register");



?>

