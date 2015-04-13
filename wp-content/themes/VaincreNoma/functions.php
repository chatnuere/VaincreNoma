<?php
	/*-----------------------------------------------------------------------------------*/
	/* This file will be referenced every time a template/page loads on your Wordpress site
	/* This is the place to define custom fxns and specialty code
	/*-----------------------------------------------------------------------------------*/

// Define the version so we can easily replace it throughout the theme
define( 'noma_VERSION', 1.0 );

/*-----------------------------------------------------------------------------------*/
/* Add Rss feed support to Head section
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );


/*-----------------------------------------------------------------------------------*/
/* Register main menu for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus( 
	array(
		'primary'	=>	__( 'Primary Menu', 'noma' ),
        'association'	=>	__( 'Sous-menu Association', 'noma' ),
        'footer'	=>	__( 'menu du footer', 'noma' )
	)
);




// Move Yoast to bottom
function yoasttobottom() {
    return 'low';
}

add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

/*-----------------------------------------------------------------------------------*/
/* Activate sidebar for Wordpress use
/*-----------------------------------------------------------------------------------*/
function noma_register_sidebars() {
	register_sidebar(array(				// Start a series of sidebars to register
		'id' => 'sidebar', 					// Make an ID
		'name' => 'Sidebar',				// Name it
		'description' => 'Take it on the side...', // Dumb description for the admin side
		'before_widget' => '<div>',	// What to display before each widget
		'after_widget' => '</div>',	// What to display following each widget
		'before_title' => '<h3 class="side-title">',	// What to display before each widget's title
		'after_title' => '</h3>',		// What to display following each widget's title
		'empty_title'=> '',					// What to display in the case of no title defined for a widget
		// Copy and paste the lines above right here if you want to make another sidebar, 
		// just change the values of id and name to another word/name
	));
} 
// adding sidebars to Wordpress (these are created in functions.php)
add_action( 'widgets_init', 'noma_register_sidebars' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function noma_scripts()  {

	// get the theme directory style.css and link to it in the header
	wp_enqueue_style( 'noma-style', get_template_directory_uri() . '/style.css', '10000', 'all' );

    // add fitvid
    wp_enqueue_script( 'noma-jQuery', get_template_directory_uri() . '/js/jquery-1.11.2.min.js', array( 'jquery' ) );

    // add fitvid
    wp_enqueue_script( 'noma-sticky', get_template_directory_uri() . '/js/jquery.sticky-kit.min.js', array( 'jquery' ) );

    // add fitvid
    wp_enqueue_script( 'noma-iframeresize', get_template_directory_uri() . '/js/iframeResizer.min.js', array( 'jquery' ) );

    // add fitvid
    wp_enqueue_script( 'noma-owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ) );

    // add fitvid
    wp_enqueue_script( 'noma-rangeslider', get_template_directory_uri() . '/js/rangeslider.plugin.js', array( 'jquery' ) );

    // add fitvid
    wp_enqueue_script( 'noma-actualites', get_template_directory_uri() . '/js/actualites.js', array( 'jquery' ) );

    // add fitvid
    wp_enqueue_script( 'noma-home', get_template_directory_uri() . '/js/home.js', array( 'jquery' ) );

    // add fitvid
    wp_enqueue_script( 'noma-don', get_template_directory_uri() . '/js/don.js', array( 'jquery' ) );

    // add fitvid
    wp_enqueue_script( 'noma-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ) );

  
}
add_action( 'wp_enqueue_scripts', 'noma_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header