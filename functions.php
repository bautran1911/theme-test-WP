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



// Custom post type events

// 1. Custom Post Type Registration (Events)
 
add_action( 'init', 'create_event_postype' );
 
function create_event_postype() {
 
$labels = array(
    'name' => _x('Events', 'post type general name'),
    'singular_name' => _x('Event', 'post type singular name'),
    'add_new' => _x('Add New', 'events'),
    'add_new_item' => __('Add New Event'),
    'edit_item' => __('Edit Event'),
    'new_item' => __('New Event'),
    'view_item' => __('View Event'),
    'search_items' => __('Search Events'),
    'not_found' =>  __('No events found'),
    'not_found_in_trash' => __('No events found in Trash'),
    'parent_item_colon' => '',
);
 
$args = array(
    'label' => __('Events'),
    'labels' => $labels,
    'public' => true,
    'can_export' => true,
    'show_ui' => true,
    '_builtin' => false,
    'capability_type' => 'post',
    'hierarchical' => false,
    'rewrite' => array( "slug" => "events" ),
    'supports'=> array('title', 'thumbnail', 'excerpt', 'editor') ,
    'show_in_nav_menus' => true,
    'taxonomies' => array( 'tf_eventcategory', 'post_tag')
);
 
register_post_type( 'tf_events', $args);
 
}

function create_eventcategory_taxonomy() {
 
$labels = array(
    'name' => _x( 'Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Categories' ),
    'popular_items' => __( 'Popular Categories' ),
    'all_items' => __( 'All Categories' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Category' ),
    'update_item' => __( 'Update Category' ),
    'add_new_item' => __( 'Add New Category' ),
    'new_item_name' => __( 'New Category Name' ),
    'separate_items_with_commas' => __( 'Separate categories with commas' ),
    'add_or_remove_items' => __( 'Add or remove categories' ),
    'choose_from_most_used' => __( 'Choose from the most used categories' ),
);
 
register_taxonomy('tf_eventcategory','tf_events', array(
    'label' => __('Event Category'),
    'labels' => $labels,
    'hierarchical' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'event-category' ),
));
}
 
add_action( 'init', 'create_eventcategory_taxonomy', 0 );

// 3. Show Columns
 
add_filter ("manage_edit-tf_events_columns", "tf_events_edit_columns");
add_action ("manage_posts_custom_column", "tf_events_custom_columns");
 
function tf_events_edit_columns($columns) {
 
$columns = array(
    "cb" => "<input type=\"checkbox\" />",
    "tf_col_ev_cat" => "Category",
    "tf_col_ev_date" => "Dates",
    "tf_col_ev_times" => "Times",
    "tf_col_ev_thumb" => "Thumbnail",
    "title" => "Event",
    "tf_col_ev_desc" => "Description",
    );
return $columns;
}
 
function tf_events_custom_columns($column)
{
global $post;
$custom = get_post_custom();
switch ($column)
{
case "tf_col_ev_cat":
    // - show taxonomy terms -
    $eventcats = get_the_terms($post->ID, "tf_eventcategory");
    $eventcats_html = array();
    if ($eventcats) {
    foreach ($eventcats as $eventcat)
    array_push($eventcats_html, $eventcat->name);
    echo implode($eventcats_html, ", ");
    } else {
    _e('None', 'themeforce');;
    }
break;
case "tf_col_ev_date":
    // - show dates -
    $startd = $custom["tf_events_startdate"][0];
    $endd = $custom["tf_events_enddate"][0];
    $startdate = date("F j, Y", $startd);
    $enddate = date("F j, Y", $endd);
    echo $startdate . '<br /><em>' . $enddate . '</em>';
break;
case "tf_col_ev_times":
    // - show times -
    $startt = $custom["tf_events_startdate"][0];
    $endt = $custom["tf_events_enddate"][0];
    $time_format = get_option('time_format');
    $starttime = date($time_format, $startt);
    $endtime = date($time_format, $endt);
    echo $starttime . ' - ' .$endtime;
break;
case "tf_col_ev_thumb":
    // - show thumb -
    $post_image_id = get_post_thumbnail_id(get_the_ID());
    if ($post_image_id) {
    $thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
    if ($thumbnail) (string)$thumbnail = $thumbnail[0];
    echo '<img src="';
    echo bloginfo('template_url');
    echo '/timthumb/timthumb.php?src=';
    echo $thumbnail;
    echo '&h=60&w=60&zc=1" alt="" />';
}
break;
case "tf_col_ev_desc";
    the_excerpt();
break;
 
}
}

// 4. Show Meta-Box
 
add_action( 'admin_init', 'tf_events_create' );
 
function tf_events_create() {
    add_meta_box('tf_events_meta', 'Events', 'tf_events_meta', 'tf_events');
}
 
function tf_events_meta () {
 
// - grab data -
 
global $post;
$custom = get_post_custom($post->ID);
$meta_sd = $custom["tf_events_startdate"][0];
$meta_ed = $custom["tf_events_enddate"][0];
$meta_st = $meta_sd;
$meta_et = $meta_ed;
 
// - grab wp time format -
 
$date_format = get_option('date_format'); // Not required in my code
$time_format = get_option('time_format');
 
// - populate today if empty, 00:00 for time -
 
if ($meta_sd == null) { $meta_sd = time(); $meta_ed = $meta_sd; $meta_st = 0; $meta_et = 0;}
 
// - convert to pretty formats -
 
$clean_sd = date("D, M d, Y", $meta_sd);
$clean_ed = date("D, M d, Y", $meta_ed);
$clean_st = date($time_format, $meta_st);
$clean_et = date($time_format, $meta_et);
 
// - security -
 
echo '<input type="hidden" name="tf-events-nonce" id="tf-events-nonce" value="' .
wp_create_nonce( 'tf-events-nonce' ) . '" />';
 
// - output -
 
?>
<div class="tf-meta">
<ul>
    <li><label>Start Date</label><input name="tf_events_startdate" class="tfdate" value="<?php echo $clean_sd; ?>" /></li>
    <li><label>Start Time</label><input name="tf_events_starttime" value="<?php echo $clean_st; ?>" /><em>Use 24h format (7pm = 19:00)</em></li>
    <li><label>End Date</label><input name="tf_events_enddate" class="tfdate" value="<?php echo $clean_ed; ?>" /></li>
    <li><label>End Time</label><input name="tf_events_endtime" value="<?php echo $clean_et; ?>" /><em>Use 24h format (7pm = 19:00)</em></li>
</ul>
</div>
<?php
}


// 5. Save Data
 
add_action ('save_post', 'save_tf_events');
 
function save_tf_events(){
 
global $post;
 
// - still require nonce
 
if ( !wp_verify_nonce( $_POST['tf-events-nonce'], 'tf-events-nonce' )) {
    return $post->ID;
}
 
if ( !current_user_can( 'edit_post', $post->ID ))
    return $post->ID;
 
// - convert back to unix & update post
 
if(!isset($_POST["tf_events_startdate"])):
return $post;
endif;
$updatestartd = strtotime ( $_POST["tf_events_startdate"] . $_POST["tf_events_starttime"] );
update_post_meta($post->ID, "tf_events_startdate", $updatestartd );
 
if(!isset($_POST["tf_events_enddate"])):
return $post;
endif;
$updateendd = strtotime ( $_POST["tf_events_enddate"] . $_POST["tf_events_endtime"]);
update_post_meta($post->ID, "tf_events_enddate", $updateendd );
 
}

//Hiển thị custom post type ra trang chủ
add_filter('pre_get_posts','lay_custom_post_type');
function lay_custom_post_type($query) {
  if (is_home() && $query->is_main_query ())
    $query->set ('post_type', array ('post','tf_events'));
    return $query;
}

?>

