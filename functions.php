<?php

function theme_styles() {

	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'bootstrap_theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );

}

function theme_js(){

  global $wp_scripts;

  wp_register_script('html5_shiv','https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js','','',false);
  wp_register_script('respond','https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js','','',false);

  $wp_scripts->add_data('html5_shiv','conditional','lt IE9');
  $wp_scripts->add_data('respond','conditional','lt IE9');

	$handle = 'bootstrap.js';
   $list = 'enqueued';
     if (wp_script_is( $handle, $list )) {
       return;
     } else {
			wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0.0', true );
		}


	wp_enqueue_script('theme_js', get_template_directory_uri() . '/js/theme.js', array('jquery','bootstrap_js'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );
add_action('wp_enqueue_scripts','theme_js');

add_theme_support('menus');
add_theme_support( 'post-thumbnails' );
function register_theme_menus(){
  register_nav_menus(
  array(
  'header-menu' => __('Header Menu')
  )
  );
}

add_action('init','register_theme_menus');
require_once('include/wp_bootstrap_navwalker.php');

function create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => __( $name ),
		'id' => $id,
		'description' => __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));

}
create_widget( 'Front Page Left', 'front-left', 'Displays on the left of the homepage' );
create_widget( 'Front Page Center', 'front-center', 'Displays in the center of the homepage' );
create_widget( 'Front Page Right', 'front-right', 'Displays on the right of the homepage' );
create_widget( 'Page Sidebar', 'page-right', 'Displays on the right of pages with sidebar' );
create_widget( 'Blog Sidebar', 'blog', 'Displays on the right of Blog page' );
?>
