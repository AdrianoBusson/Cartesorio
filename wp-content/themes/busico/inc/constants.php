<?php

// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// theme version
if(! defined('BUSICO_THEME_VERSION') ){
    define('BUSICO_THEME_VERSION', wp_get_theme()->get('Version'));
} 

// Define the DHRUBOK Folder
if( ! defined( 'BUSICO_DIR' ) ) {
	define('BUSICO_DIR', get_template_directory() );
}

// Define the DHRUBOK Partials Folder
if( ! defined( 'BUSICO_PARTIALS_DIR' ) ) {
	define('BUSICO_PARTIALS_DIR', trailingslashit( BUSICO_DIR ) . 'partials' );
}

// Define the Inc Folder of the DHRUBOK Directory
if( ! defined( 'BUSICO_ASSETS_DIR' ) ) {
	define('BUSICO_ASSETS_DIR', trailingslashit( BUSICO_DIR ) . 'assets' );
}


// Define the Inc Folder of the DHRUBOK Directory
if( ! defined( 'BUSICO_INC_DIR' ) ) {
	define('BUSICO_INC_DIR', trailingslashit( BUSICO_DIR ) . 'inc' );
}

// Define the Inc Folder of the DHRUBOK Directory
if( ! defined( 'BUSICO_FRAMEWORK_DIR' ) ) {
	define('BUSICO_FRAMEWORK_DIR', trailingslashit( BUSICO_INC_DIR ) . 'framework' );
}

// Define the Libs Folder of the DHRUBOK Directory
if( ! defined( 'BUSICO_LIBS_DIR' ) ) {
	define('BUSICO_LIBS_DIR', trailingslashit( BUSICO_DIR ) . 'libs' );
}

// Define the Shortcodes Folder of the DHRUBOK Directory
if( ! defined( 'BUSICO_SHORTCODES_DIR' ) ) {
	define('BUSICO_SHORTCODES_DIR', trailingslashit( BUSICO_INC_DIR ) . 'shortcodes' );
}

// Define the Classes Folder of the DHRUBOK Directory
if( ! defined( 'BUSICO_CLASSES_DIR' ) ) {
	define('BUSICO_CLASSES_DIR', trailingslashit( BUSICO_INC_DIR ) . 'classes' );
}

// Define the Widgets Folder of the DHRUBOK Directory
if( ! defined( 'BUSICO_WIDGETS_DIR' ) ) {
	define('BUSICO_WIDGETS_DIR', trailingslashit( BUSICO_INC_DIR ) . 'widgets' );
}


// Define the PLUGINS Folder of the DHRUBOK Directory
if( ! defined( 'BUSICO_INC_PLUGINS_DIR' ) ) {
	define('BUSICO_INC_PLUGINS_DIR', trailingslashit( BUSICO_INC_DIR ) . 'plugins' );
}
