<?php
// File Security Check
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Theme Constants
 */
require_once trailingslashit(get_template_directory()) . 'inc/constants.php';

/**
 *  Implement the Custom Header feature.
*/
require BUSICO_INC_DIR . '/custom-header.php';

/**
 *  Theme Style and Scripts Enqueye
*/
require_once BUSICO_INC_DIR . '/theme-style-and-scripts.php';

/**
 *  TGM Plugin Activation.
*/
require BUSICO_INC_DIR . '/plugins/install-plugins.php';

/**
 *   TGM Plugin Activation.
*/
require BUSICO_INC_DIR . '/demo-setup.php';

/**
 *  Functions which enhance the theme by hooking into WordPress.
*/
require BUSICO_INC_DIR . '/template-functions.php';

/**
 *  Custom template tags for this theme.
*/
require BUSICO_INC_DIR . '/template-tags.php';

/**
 *  Bufet Main Class
*/
require_once BUSICO_CLASSES_DIR . '/Busico_Main.php';
require_once BUSICO_CLASSES_DIR . '/Busico_Nav_Walker.php';

/**
 *  Theme Options
*/
require_once BUSICO_INC_DIR . '/theme-options.php';

/**
 *  Custom Theme Options Styles
*/
require_once BUSICO_INC_DIR . '/custom-theme-options-styles.php';

/**
 *  Theme Widgets
*/
require_once BUSICO_INC_DIR . '/widgets.php';

/**
 *   ACf
*/
require_once BUSICO_INC_DIR . '/acf.php';

