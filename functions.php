<?php
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';

/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */
add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

  jQuery('#example_showhidden').click(function() {
      jQuery('#section-example_text_hidden').fadeToggle(400);
  });

  if (jQuery('#example_showhidden:checked').val() !== undefined) {
    jQuery('#section-example_text_hidden').show();
  }

});
</script>

<?php
}

function theme_styles() {

	$theme = 'bootstrap-theme';

	$theme = of_get_option('bootstrap_style','bootstrap-theme');

	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
	if(!empty($theme)){
	wp_enqueue_style( 'bootstrap_theme', get_template_directory_uri() . '/css/'. $theme .'.min.css' );
  }
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
add_theme_support( 'html5', array( 'search-form' ) );
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

function easy_pagination() {
    global $wp_query;
    $big = 999999999; // need an unlikely integer
    $pages = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'prev_next' => false,
            'type'  => 'array',
            'prev_next'   => TRUE,
			'prev_text'    => __('<span class="glyphicon glyphicon-arrow-left"></span>'),
			'next_text'    => __('<span class="glyphicon glyphicon-arrow-right"></span>'),
        ) );
        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<ul class="pagination">';
            foreach ( $pages as $page ) {
                    echo "<li>$page</li>";
            }
           echo '</ul>';
        }
}

function boots_search_form( $form ) {
	$form = '<div class="form-group"><form role="search" method="get" id="searchform" class="searchform form-inline" action="' . home_url( '/' ) . '" >
	<div><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
	<input class="form-control" type="text" value="' . get_search_query() . '" name="s" id="s" />
	<input class="btn btn-default" type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
	</div>
	</form></div>';

	return $form;
}
?>
