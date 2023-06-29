<?php

/**
 * Enqueue scripts and styles.
 */
function busico_scripts() {
    wp_enqueue_style( 'busico-google-fonts', '//fonts.googleapis.com/css2?family=Exo+2:wght@300;400;500;600;700;800&family=Roboto:wght@300;400;500;700&display=swap' );
    wp_enqueue_style( 'font-awesomes', get_theme_file_uri( '/assets/css/all.min.css' ), array(), '5.15.1' );
	wp_enqueue_style( 'select2', get_theme_file_uri( '/assets/css/select2.min.css'), array(), null);
    wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/css/bootstrap.min.css' ), array(), '4.0' );
    wp_enqueue_style( 'nice-select', get_theme_file_uri( '/assets/css/nice-select.min.css' ), array(), 'null' );
    wp_enqueue_style( 'busico-core', get_theme_file_uri( '/assets/css/core.css' ), array(), BUSICO_THEME_VERSION );
    wp_enqueue_style( 'busico-guten', get_theme_file_uri( '/assets/css/gutenberg.css' ), array(), BUSICO_THEME_VERSION );
    wp_enqueue_style( 'busico-custom', get_theme_file_uri( '/assets/css/theme-style.css' ), array(), BUSICO_THEME_VERSION );
    wp_enqueue_style( 'busico-custom-fonts', get_theme_file_uri( '/assets/css/custom-fonts.css' ), array(), BUSICO_THEME_VERSION );
    wp_enqueue_style( 'busico-style', get_stylesheet_uri(), array(), BUSICO_THEME_VERSION );
    wp_enqueue_style( 'busico-responsive', get_theme_file_uri( '/assets/css/theme-responsive.css' ), array(), BUSICO_THEME_VERSION );

    wp_enqueue_script( 'jquery-masonry' );
	wp_enqueue_script('select2', get_theme_file_uri( '/assets/js/select2.min.js'), array('jquery'), null, true);
    wp_enqueue_script( 'nice-select', get_theme_file_uri( '/assets/js/jquery.nice-select.min.js' ), array( 'jquery' ), null, true );
    wp_enqueue_script( 'busico-main', get_theme_file_uri( '/assets/js/busico-main.js' ), array( 'jquery' ), BUSICO_THEME_VERSION, true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'busico_scripts' );

/**
 * Registers an editor stylesheet for the theme.
 */
function busico_theme_add_editor_styles() {
    add_editor_style( get_theme_file_uri( '/assets/css/editor-style.css' ) );
}
add_action( 'admin_init', 'busico_theme_add_editor_styles' );
