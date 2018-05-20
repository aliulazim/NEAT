<?php

function neat_script_enqueue(){
	wp_enqueue_style('bootstrap',get_template_directory_uri().'/css/bootstrap.css',array(),'1.0','all');
	wp_enqueue_style('icomoon',get_template_directory_uri().'/css/icomoon.css',array(),'1.0','all');
	wp_enqueue_style('animate',get_template_directory_uri().'/css/animate.css',array(),'1.0','all');
	wp_enqueue_style('css/magnific-popup.css',get_template_directory_uri().'/css/magnific-popup.css',array(),'1.0','all');
	wp_enqueue_style('flexslider',get_template_directory_uri().'/css/flexslider.css',array(),'1.0','all');
	wp_enqueue_style('style',get_template_directory_uri().'/css/style.css',array(),'1.0','all');

	wp_enqueue_style('Fonts','https://fonts.googleapis.com/css?family=Oxygen:300,400',array(),'1.0','all');
	wp_enqueue_style('Fonts2','https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700',array(),'1.0','all');


	wp_enqueue_script( 'modernizr', get_template_directory_uri().'/js/modernizr-2.6.2.min.js', array(), '2.6.2', false );
	wp_enqueue_script( 'jquery', get_template_directory_uri().'/js/jquery.min.js', array(), '1.0', true );
	wp_enqueue_script( 'easing', get_template_directory_uri().'/js/jquery.easing.1.3.js', array('jquery'), '1.3', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), '1.1', true );
	wp_enqueue_script( 'waypoints', get_template_directory_uri().'/js/jquery.waypoints.min.js', array('jquery'), '2.2.3', true );
	wp_enqueue_script( 'flexslider', get_template_directory_uri().'/js/jquery.flexslider-min.js', array('jquery'), '2.2.3', true );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri().'/js/jquery.magnific-popup.min.js', array('jquery'), '2.2.3', true );
	wp_enqueue_script( 'magnific-popup-options', get_template_directory_uri().'/js/magnific-popup-options.js', array('jquery'), '2.2.3', true );
	wp_enqueue_script( 'CountTo', get_template_directory_uri().'/js/jquery.countTo.js', array('jquery'), '2.2.3', true );
	wp_enqueue_script( 'main', get_template_directory_uri().'/js/main.js', array('jquery'), '2.2.3', true );
}

add_action( 'wp_enqueue_scripts', 'neat_script_enqueue' );


function neat_theme_support(){
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'menus' );



	$defaults = array(
	'default-image'          => '',
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'uploads'                => true,
	'random-default'         => false,
	'header-text'            => true,
	'default-text-color'     => '',
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
	add_theme_support( 'custom-header',$defaults);

	
	register_nav_menu( 'primary', 'Primary Menu' );

	function read_more($word){
	$content = explode(" ", get_the_content( ));
	$word_limit = array_slice($content, 0 , $word);
	echo implode(" ", $word_limit);
	}





}



add_action('after_setup_theme','neat_theme_support' );


function neat_custom_slider(){
	$slider_labels = array(
		'name' => 'Neat Slider',
		'add_new' => 'Add Slider',
		'add_new_item' => 'Add New Slider',
		'not_found' => 'No slider found',
		'search_items' => 'Search slider'

		);

	$args = array(
		'labels' => $slider_labels,
		'public' => true,
		'supports' => array(
				'title',
				'thumbnail',
				'editor'
			)
		);

	register_post_type('neatslider', $args);
}
add_action('init', 'neat_custom_slider');

function neat_feature(){
	$feature_labels = array(
		'name' => 'Neat Feature',
		'add_new' => 'Add Feature',
		'add_new_item' => 'Add New Feature',
		'not_found' => 'No Feature found',
		'search_items' => 'Search Feature'

		);

	$args = array(
		'labels' => $feature_labels,
		'public' => true,
		'supports' => array(
				'title',
				'thumbnail',
				'editor',
				'custom-fields'
			)
		);

	register_post_type('neatfeature', $args);
}
add_action('init', 'neat_feature');


  define('MY_POST_TYPE', 'neatwork');
  define('MY_POST_SLUG', 'gallery');
  function my_register_post_type () {

  	$work_labels = array(
		'name' => 'Neat Work',
		'add_new' => 'Add Work',
		'add_new_item' => 'Add New Work',
		'not_found' => 'No Work found',
		'search_items' => 'Search Work'

		);

  	$args = array (
  		'labels' => $work_labels,
  		'public' => true,
  		'supports' => array( 'title', 'excerpt','editor','thumbnail' ),
  		'register_meta_box_cb' => 'my_meta_box_cb',
  		'show_ui' => true,
  		'query_var' => true
  	);
  	register_post_type( MY_POST_TYPE , $args );
  }
  add_action( 'init', 'my_register_post_type' );
  function my_meta_box_cb () {
  	add_meta_box( MY_POST_TYPE . '_details' , 'Media Library', 'my_meta_box_details', MY_POST_TYPE, 'normal', 'high' );
  }
  function my_meta_box_details () {
  	global $post;
    $post_ID = $post->ID; // global used by get_upload_iframe_src
  	printf( "<iframe frameborder='0' src=' %s ' style='width: 100%%; height: 400px;'> </iframe>", get_upload_iframe_src('media') );
  }


function widgets(){
	register_sidebar(array(
		'name' => 'Numbers of Client',
		'description' => 'You can numbers option here',
		'id' => 'numbers'

	));

	register_sidebar(array(
		'name' => 'About Us',
		'description' => 'You can write about your company here',
		'id' => 'about'

	));

	register_sidebar(array(
		'name' => 'Contact Us',
		'description' => 'You can write your contact details from here',
		'id' => 'contact'

	));

	register_sidebar(array(
		'name' => 'Footer Info',
		'description' => 'You can update your footer info from here',
		'id' => 'footer',
		'before_widget' => '<div class="col-md-3 fh5co-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'

	));

	
}
add_action('widgets_init' , 'widgets' );


// function to display number of posts.
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    else if($count == 0 || $count == 1){
    	return $count." View";
    }
    else{
    	return $count.' Views';
    }
    
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Views');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
	if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}


add_action( 'init', 'add_category' );
function add_category() {
	register_taxonomy_for_object_type( 'category', 'neatwork' );
}


function new_submenu_class($menu) {    
    $menu = preg_replace('/ class="sub-menu"/','/ class="dropdown" /',$menu);        
    return $menu;      
}

add_filter('wp_nav_menu','new_submenu_class'); 




?>
