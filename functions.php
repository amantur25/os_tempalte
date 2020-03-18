<?php

if ( ! function_exists( 'os_setup' ) ) :

	function os_setup() {
	

		add_theme_support( 'automatic-feed-links' );

		
		add_theme_support( 'title-tag' );

	
		add_theme_support( 'post-thumbnails' );

		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'os' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'os_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'os_setup' );


function os_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'os_content_width', 640 );
}
add_action( 'after_setup_theme', 'os_content_width', 0 );


function os_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'os' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'os' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'os_widgets_init' );

/**
 * Подключени scripts and styles  */
function os_scripts() {
	wp_enqueue_style( 'os-style', get_stylesheet_uri() );

	wp_enqueue_script( 'os-css', get_template_directory_uri() . '/assets/css/' ;

// Подключение JavaScript файлов 

	wp_enqueue_script( 'os-js', get_template_directory_uri() . '/assets/js/', array(), '', true );

}
add_action( 'wp_enqueue_scripts', 'os_scripts' );

require get_template_directory() . '/inc/custom-header.php';	

require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/customizer.php';



