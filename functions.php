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

// Footer text
	function footer_customize_register($wp_customize) 
	{
		$wp_customize->add_section("footer", array(
			"title" => __("Footer", "customizer_footer_sections"),
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
				"label" => __("Enter Footer Text", "customizer_footer_text_label"),
				"section" => "footer",
				"settings" => "footer_text",
				"type" => "textarea",
			)
		));

		wp_enqueue_script("footer-themecustomizer", get_template_directory_uri() . "/theme-customizer.js", array("jquery", "customize-preview"), '',  true);
	}

	add_action("customize_register","footer_customize_register");

// Breadcrumb
	function the_breadcrumb() {
                echo '<ul id="crumbs" class="breadcrumbs list fw3">';
        if (!is_home()) {
                echo '<li><a href="';
                echo get_option('home');
                echo '">';
                echo 'Home';
                echo "</a></li>";
                if (is_category() || is_single()) {
                        echo '<li>';
                        the_category(' </li><li> ');
                        if (is_single()) {
                                echo "</li><li>";
                                the_title();
                                echo '</li>';
                        }
                } elseif (is_page()) {
                        echo '<li>';
                        echo the_title();
                        echo '</li>';
                }
        }
        elseif (is_tag()) {single_tag_title();}
        elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
        elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
        elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
        elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
        elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
        elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
        echo '</ul>';
}




?>

