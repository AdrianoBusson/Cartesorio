<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package busico
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function busico_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'busico_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function busico_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'busico_pingback_header');



/**
 * Detect Homepage
 *
 * @return boolean value
 */
function busico_detect_homepage()
{
    // If front page is set to display a static page, get the URL of the posts page.
    $homepage_id = get_option('page_on_front');

    // current page id
    $current_page_id = (is_page(get_the_ID())) ? get_the_ID() : '';

    if ($homepage_id == $current_page_id) {
        return true;
    } else {
        return false;
    }
}

/**
 *   Get the site logo for Bufet
 *
 */
function busico_get_site_logo()
{
    $logo = '';
    $busico = get_option('busico');
    $logo_url = '';

    $custom_logo = get_post_meta(get_the_ID(), 'use_custom_logo', true);
    $page_logo = get_post_meta(get_the_ID(), 'select_logo', true);

    if (!empty($custom_logo)) {
        $img_url = wp_get_attachment_image_src($page_logo, 'full');
        $logo_url = esc_url($img_url[0]);
        $logo = '<img src="' . esc_url($logo_url) . '" alt="' . esc_attr(get_bloginfo('title')) . '" class="navbar-brand__regular">';
    } else if (!empty($busico['logo']['url'])) {
        $logo_url = esc_url($busico['logo']['url']);
        $logo = '<img src="' . esc_url($logo_url) . '" alt="' . esc_attr(get_bloginfo('title')) . '" class="navbar-brand__regular">';
    } else {
        if (has_custom_logo()) {
            $core_logo_id = get_theme_mod('custom_logo');
            $logo_url = wp_get_attachment_image_src($core_logo_id, 'full');
            $logo = '<img src="' . esc_url($logo_url[0]) . '" alt="' . esc_attr(get_bloginfo('title')) . '" class="navbar-brand__regular">';
        } else {
            $logo = '<h1 class="navbar-brand__regular">' . get_bloginfo('name') . '</h1>';
        }
    }

    return $logo;
}

/**
 * Get the site logo for Bufet
 */
function busico_get_site_sticky_logo()
{

    $busico = get_option('busico');

    $logo = '';
    $logo_url = '';

    $custom_logo = get_post_meta(get_the_ID(), 'use_custom_logo', true);
    $page_sticky_logo = get_post_meta(get_the_ID(), 'select_sticky_logo', true);

    if (!empty($custom_logo) && $page_sticky_logo) {
        $img_url = wp_get_attachment_image_src($page_sticky_logo, 'full');
        $logo_url = esc_url($img_url[0]);
        $logo = '<img src="' . esc_url($logo_url) . ' ?>" alt="' . esc_attr(get_bloginfo('title')) . '" class="navbar-brand__sticky">';
    } else if (!empty($busico['sticky_logo']['url'])) {
        $logo_url = esc_url($busico['sticky_logo']['url']);
        $logo = '<img src="' . esc_url($logo_url) . '" alt="' . esc_attr(get_bloginfo('title')) . '" class="navbar-brand__sticky">';
    }
    return $logo;
}

add_action('wp_ajax_cloadmore', 'busico_comments_loadmore_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_cloadmore', 'busico_comments_loadmore_handler'); // wp_ajax_nopriv_{action}

function busico_comments_loadmore_handler()
{

    // maybe it isn't the best way to declare global $post variable, but it is simple and works perfectly!
    global $post;
    $post = get_post($_POST['post_id']);
    setup_postdata($post);

    wp_list_comments(
        array(
            'page' => $_POST['cpage'], // current comment page
            'per_page' => get_option('comments_per_page'),
            'style' => 'ol',
            'short_ping' => true,
        )
    );
    die; // don't forget this thing if you don't want "0" to be displayed
}


/**
 * busico Is edit mode in elementor
 *
 */
function busico_is_edit_mode(  ) {

    return isset($_GET['elementor-preview']);
}
/**
 * busico header Settings
 *
 */
function busico_header_settings() {

    if (defined('ELEMENTOR_PRO_VERSION') && busico_is_edit_mode() ) {
        return;
    }else{
        $busico = get_option( 'busico' );

        $check_header_post = get_posts( ['post_type' => 'busico_header'] );

        if ( 0 != count( $check_header_post ) ) {
            echo '<header class="site-header busico-elementor-header">';
            busico_header_footer_template_query( 'busico_header' );
            echo '</header>';
        } else {
            get_template_part( 'template-parts/headers/header-style-1' );
        }
    }

}

/**
 * busico Footer Settings
 *
 */
function busico_footer_settings() {
    if (defined('ELEMENTOR_PRO_VERSION') && busico_is_edit_mode() ) {
        return;
    }else{
        $check_footer_post = get_posts( ['post_type' => 'busico_footer'] );

        if ( 0 != count( $check_footer_post ) ) {

            busico_header_footer_template_query( 'busico_footer' );
        } else {
            busico_raw_footer();
        }
    }
}

/**
 * busico Raw Footer
 *
 */
function busico_raw_footer()
{
    $busico = get_option('busico');

    if (isset($busico['footer_copyright'])) {
        echo '<div class="busico-copyright text-center">' . $busico['footer_copyright'] . '</div>';
    } else {
        echo '<div class="busico-copyright text-center">' . esc_html__('Copyright 2022, All Rights Reserved', 'busico') . '</div>';
    }
}

/**
 * busico Footer Query
 *
 */
function busico_header_footer_template_query($post_type,  $post_id = '')
{

    global $post;
    $current_page_id = isset( $post->ID ) ? $post->ID : false;

    // Query for blog posts
    $args = array(
        'post_type' => $post_type,
        'posts_per_page' => -1,
    );
    if(empty( $post_id )){
        $argc['p'] =  $post_id;
    }

    $footer_query = new WP_Query($args);

    if ($footer_query->have_posts()) :
        while ($footer_query->have_posts()) :
            $footer_query->the_post();

           ob_start();
           the_content();
           $content = ob_get_clean();
            $output = '';


            if( get_field('include_rules', get_the_ID() ) ) {

                while( the_repeater_field('include_rules', get_the_ID()) ) {
                    $specific_pages = get_sub_field( 'pages' ) ? get_sub_field( 'pages' ) : [];
                    $entire_website = get_sub_field( 'include_on' );
                    $archive        = 'archive' == $entire_website ? is_archive() || is_home() || is_search() : false;

                    if( 'all' == $entire_website ||  in_array($current_page_id, $specific_pages) || $archive || ('404' == $entire_website && is_404(  ))){
                        $output = $content;
                    }
                }
            }


            if( get_field('exclude_rules', get_the_ID() ) ) {
                while( the_repeater_field('exclude_rules', get_the_ID()) ) {
                    $specific_pages = get_sub_field( 'pages' ) ? get_sub_field( 'pages' ) : [];
                    $entire_website = get_sub_field( 'exclude_on' );
                    $archive        = 'archive' == $entire_website ? is_archive() || is_home() || is_search() : false;

                    if( 'all' == $entire_website || in_array($current_page_id, $specific_pages) || $archive || ('404' == $entire_website && is_404(  ))){
                        $output = '';
                    }
                }
            }

            if($output){
                printf('%s', $output) ;
            }

        endwhile;
    endif;
    wp_reset_query(  );
}


/**
 * busico get archive post type
 *
 */
function busico_get_archive_post_type()
{
    $postname = isset(get_queried_object()->name) ? get_queried_object()->name : '';
    return is_archive() ? $postname : '';
}

function busico_update_elementor_scheme($colors = array())
{
    global $busico;
    if (class_exists('ReduxFrameworkPlugin')) :
        $accent_color = $busico['custom_accent_color'];
        $heading_color = $busico['heading_color'];
        $text_color = $busico['text_color'];
        $colors = [
            "1" => "$heading_color",
            "2" => "$heading_color",
            "3" => "$text_color",
            "4" => "$accent_color"
        ];
        return $colors;
    endif;
    return false;
}
add_action('after_switch_theme', 'busico_update_elementor_scheme');

if (!function_exists('is_shop') && !class_exists('woocommerce')) {
    function is_shop()
    {
        return false;
    }
}

function busico_preloader()
{
    $busico = get_option('busico');

    $preloader = '
    <div class="busico-preloader-wrap">
        <div class="busico-preloader">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    ';

    if (isset($busico['enable_preloader'])) {
        if (true == $busico['enable_preloader']) {
            printf('%s', $preloader);
        }
    } else {
        printf('%s', $preloader );
    }
}

//catgorys count class adding
function busico_wp_list_categories($catgorys_output){

	$catgorys_output = str_replace("(", "<span>(",$catgorys_output);
	$catgorys_output = str_replace(")", ")</span> ",$catgorys_output);
	return $catgorys_output;
}
add_filter('wp_list_categories','busico_wp_list_categories');