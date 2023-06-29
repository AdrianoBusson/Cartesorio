<?php
// File Security Check
if (!defined('ABSPATH')) {
	exit;
}

/* Theme demo data setup */
function busico_import_files()
{
    return array(
        array(
            'import_file_name' => 'Initial Setup',
            'categories' => array('Inner Pages'),
            'local_import_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/initial-setup.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/widget.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/customizer.dat',
            'local_import_redux' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/demo-contents/theme-options.json',
                    'option_name' => 'busico',
                ),
            ),
            'import_preview_image_url' => home_url() . '/wp-content/themes/busico/inc/demo-contents/previews/Initial-setup.png',
            'import_notice' => __('After you import this demo, you will have to setup the nav menu.', 'busico'),
            'preview_url' => 'https://rrdevs.net/demos/wp/busico',
        ),

        array(
            'import_file_name' => 'Home',
            'categories' => array('Homepages'),
            'local_import_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/Home-01.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/widget.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/customizer.dat',
            'local_import_redux' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/demo-contents/theme-options.json',
                    'option_name' => 'busico',
                ),
            ),
            'import_preview_image_url' => home_url() . '/wp-content/themes/busico/inc/demo-contents/previews/home-01.png',
            'import_notice' => __('After you import this demo, you will have to setup the nav menu.', 'busico'),
            'preview_url' => 'https://rrdevs.net/demos/wp/busico',
        ),

        array(
            'import_file_name' => 'Home 02',
            'categories' => array('Homepages'),
            'local_import_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/Home-02.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/widget.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/customizer.dat',
            'local_import_redux' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/demo-contents/theme-options.json',
                    'option_name' => 'busico',
                ),
            ),
            'import_preview_image_url' => home_url() . '/wp-content/themes/busico/inc/demo-contents/previews/home-02.png',
            'import_notice' => __('After you import this demo, you will have to setup the nav menu.', 'busico'),
            'preview_url' => 'https://rrdevs.net/demos/wp/busico/home-02',
        ),

        array(
            'import_file_name' => 'Home 03',
            'categories' => array('Homepages'),
            'local_import_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/Home-03.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/widget.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/customizer.dat',
            'local_import_redux' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/demo-contents/theme-options.json',
                    'option_name' => 'busico',
                ),
            ),
            'import_preview_image_url' => home_url() . '/wp-content/themes/busico/inc/demo-contents/previews/home-03.png',
            'import_notice' => __('After you import this demo, you will have to setup the nav menu.', 'busico'),
            'preview_url' => 'https://rrdevs.net/demos/wp/busico/home-03',
        ),

        array(
            'import_file_name' => 'Home 04',
            'categories' => array('Homepages'),
            'local_import_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/Home-04.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/widget.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/customizer.dat',
            'local_import_redux' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/demo-contents/theme-options.json',
                    'option_name' => 'busico',
                ),
            ),
            'import_preview_image_url' => home_url() . '/wp-content/themes/busico/inc/demo-contents/previews/home-04.png',
            'import_notice' => __('After you import this demo, you will have to setup the nav menu.', 'busico'),
            'preview_url' => 'https://rrdevs.net/demos/wp/busico/home-04',
        ),

        array(
            'import_file_name' => 'Home 05',
            'categories' => array('Homepages'),
            'local_import_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/Home-05.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/widget.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/customizer.dat',
            'local_import_redux' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/demo-contents/theme-options.json',
                    'option_name' => 'busico',
                ),
            ),
            'import_preview_image_url' => home_url() . '/wp-content/themes/busico/inc/demo-contents/previews/home-05.png',
            'import_notice' => __('After you import this demo, you will have to setup the nav menu.', 'busico'),
            'preview_url' => 'https://rrdevs.net/demos/wp/busico/home-05',
        ),

    );
}
add_filter('pt-ocdi/import_files', 'busico_import_files');



function ocdi_after_import($selected_import)
{

    if ('Home' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Home');
    } elseif ('Home 02' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Home 02');
    } elseif ('Home 03' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Home 03');
    } elseif ('Home 04' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Home 04');
    } elseif ('Home 05' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Home 05');
    }else{
        $front_page_id = get_page_by_title('Home');
    }


    $main_menu = get_term_by('name', 'Header Menu', 'nav_menu');

    set_theme_mod('nav_menu_locations', array(
        'main-menu' => $main_menu->term_id, // replace 'main-menu' here with the menu location identifier from register_nav_menu() function
    ));

    $blog_page_id  = get_page_by_title('Blog');
    update_option('show_on_front', 'page');
    update_option('page_on_front', $front_page_id->ID);
    update_option('page_for_posts', $blog_page_id->ID);

    //update_option('elementor_scheme_color', array('#161c2d', '#161c2d', '#6E727D', '#473bf0'));

    $elem_clear_cache = new \Elementor\Core\Files\Manager();
    $elem_clear_cache->clear_cache();

}
add_action('pt-ocdi/after_import', 'ocdi_after_import');
