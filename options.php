<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {



	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/css/';

	$options = array();

	$options[] = array(
		'name' => __('Theme Preference', 'options_framework_theme'),
		'type' => 'heading');


	$options[] = array(
		'name' => "Select Your Prefered Color Theme",
		'desc' => "Different bootstrap style,collected from bootswatch.com",
		'id' => "bootstrap_style",
		'std' => "bootstrap-theme",
		'type' => "images",
		'options' => array(
			'cerulean' => $imagepath . 'cerulean.png',
			'cosmo' => $imagepath . 'cosmo.png',
			'darkly' => $imagepath . 'darkly.png',
			'flatly' => $imagepath . 'flatly.png',
			'cyborg' => $imagepath . 'cyborg.png',
			'journal' => $imagepath . 'journal.png',
			'lumen' => $imagepath . 'lumen.png',
			'paper' => $imagepath . 'paper.png',
			'readable' => $imagepath . 'readable.png',
			'sandstone' => $imagepath . 'sandstone.png',
			'simplex' => $imagepath . 'simplex.png',
			'slate' => $imagepath . 'slate.png',
			'spacelab' => $imagepath . 'spacelab.png',
			'superhero' => $imagepath . 'superhero.png',
			'united' => $imagepath . 'united.png',
			'yeti' => $imagepath . 'yeti.png'

			)
	);

	return $options;
}
