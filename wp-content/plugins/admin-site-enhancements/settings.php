<?php

/**
 * Register admin menu
 *
 * @since 1.0.0
 */
function asenha_register_admin_menu()
{
    add_submenu_page(
        'tools.php',
        // Parent page/menu
        'Admin and Site Enhancements',
        // Browser tab/window title
        'Enhancements',
        // Sube menu title
        'manage_options',
        // Minimal user capabililty
        ASENHA_SLUG,
        // Page slug. Shows up in URL.
        'asenha_add_settings_page'
    );
}

/**
 * Create the settings page of the plugin
 *
 * @since 1.0.0
 */
function asenha_add_settings_page()
{
    ?>
	<div class="wrap asenha">

		<div id="asenha-header" class="asenha-header">
			<div class="asenha-header-left">
				<h1 class="asenha-heading"><?php 
    echo  get_admin_page_title() ;
    ?> <small><?php 
    esc_html_e( 'by', 'admin-site-enhancements' );
    ?> <a href="https://bowo.io/asenha-bw" target="_blank">Bowo</a></small></h1>
				<!-- <a href="https://wordpress.org/plugins/admin-site-enhancements/" target="_blank" class="asenha-header-action"><span>&#8505;</span> <?php 
    // esc_html_e( 'Info', 'admin-site-enhancements' );
    ?></a> -->
			</div>
			<div class="asenha-header-right">
				<a href="https://bowo.io/asenha-rvw" target="_blank" class="asenha-header-action"><span>&starf;</span> <?php 
    esc_html_e( 'Review', 'admin-site-enhancements' );
    ?></a>
				<a href="https://bowo.io/asenha-fdbk" target="_blank" class="asenha-header-action">&#10010; <?php 
    esc_html_e( 'Feedback', 'admin-site-enhancements' );
    ?></a>
				<a href="https://bowo.io/asenha-trnslt" target="_blank" class="asenha-header-action">&#9654; <?php 
    esc_html_e( 'Translate', 'admin-site-enhancements' );
    ?></a>
                <div id="plugin-sponsor" class="button button-primary plugin-sponsor">
                    <?php 
    esc_html_e( 'Sponsor', 'admin-site-enhancements' );
    ?>
                </div>
				<a class="button button-primary asenha-save-button">Save Changes</a>
				<div class="asenha-changes-saved" style="display:none;">Changes have been saved.</div>
			</div>
		</div>

		<div class="asenha-body">
			<div class="asenha-sponsorship-nudge nudge-show-more is-enabled" style="display: none;">
				<h3>Looks like some of these enhancements have been useful for your site?</h3> 
				<p class="nudge-description">Please consider supporting Admin and Site Enhancements (ASE).</p>
				<a id="enable-svg-upload-show-moreless" class="nudge-show-more-less show-more-less show-more" href="#">Expand ▼</a>
				<div class="nudge-wrapper-show-more">
					<div class="nudge-content">
						<div class="nudge-primary">
							<h4>Sponsor ASE from as little as USD 1, monthly or one-time</h4>
							<div class="nudge-info">
								<p class="nudge-description user-quote">“A very very useful plugin. I have made a little sponsorship and encourage other users to do the same as it is so much deserved. Thank you Bowo!” ~<a href="https://wordpress.org/support/topic/very-very-useful-54/" target="_blank">@pgrand83</a></p>
								<p class="nudge-description">Please consider sponsoring ASE's ongoing development and maintenance so it can remain functional and useful for years to come. Thank you!</p>
							</div>
							<div class="nudge-ctas">
								<a href="https://bowo.io/asenha-sp-gth-ndg" class="button button-primary sponsorship-button monthly" target="_blank">Sponsor Monthly</a>
								<a href="https://bowo.io/asenha-sp-ppl-ndg" class="button sponsorship-button one-time" target="_blank">Sponsor One-Time</a>
								<a href="#" id="have-sponsored" class="asenha-have-sponsored">I've sponsored ASE</a>
							</div>
							<div class="nudge-stats">
								<p class="nudge-description">ASE has consumed more than <a href="https://bowo.io/asenha-sp-ndg-chnlg" target="_blank">250 hours of dev time</a>. At v5.2.9 (released on June 27, 2023) and 4,000+ active installs, there have been <a href="https://bowo.io/asenha-sp-gth-ndg" target="_blank">4 monthly sponsors</a> and <a href="https://bowo.io/asenha-sp-ppl-ndg" target="_blank">16 one-time sponsors</a>. You can be one today!</p>
							</div>
						</div>
						<div class="nudge-secondary">
							<h4>Give ASE your 5-star review or provide detailed feedback</h4>
							<p class="nudge-description user-quote">“Simply the best! Still looking for the sixth star for you. Don’t stop developing… We are supporting you!“ ~<a href="https://wordpress.org/support/topic/too-good-to-be-true-22/" target="_blank">@springbreak</a></p>
							<p class="nudge-description">If financial sponsorship is not something you can provide at the moment, you can always <a href="https://bowo.io/asenha-rvw-ndg" target="_blank">add a quick, 5-star review</a> to support ASE. It has received <a href="https://bowo.io/asenha-rvw-ndg" target="_blank">50+ 5-star reviews</a> so far. Help make it 100, or more!</p>
							<p class="nudge-description">Or, if you find something is lacking or not working as you expect it to, you can provide a good and detailed <a href="https://bowo.io/asenha-fdbk-ndg" target="_blank">feature request or feedback</a>, which is much more appreciated than a 4-star review or less. This is how we can work together to improve ASE.</p>
						</div>
					</div>
					<a href="https://bowo.io/asenha-bw-ndg" target="_blank" class="nudge-photo-link"><img src="<?php 
    echo  esc_attr( ASENHA_URL . 'assets/img/bowo.jpg' ) ;
    ?>" class="nudge-photo" /></a>
					<h3>Thank you!</h3> 
					<p class="nudge-description nudge-closing">I hope you continue to benefit from ASE. ~<a href="https://bowo.io/asenha-bw-ndg" target="_blank">Bowo</a></p>
					<div class="dismiss-sponsorship-nudge"><a href="#" id="sponsorship-nudge-dismiss" class="asenha-sponsorship-nudge-dismiss">Dismiss this notice</a></div>
				</div>
			</div>
			<form action="options.php" method="post">
				<div class="asenha-vertical-tabs">
					<div class="asenha-tab-buttons">
					    <input id="tab-content-management" type="radio" name="tabs" checked><label for="tab-content-management">Content Management</label>
					    <input id="tab-admin-interface" type="radio" name="tabs"><label for="tab-admin-interface">Admin Interface</label>
					    <input id="tab-login-logout" type="radio" name="tabs"><label for="tab-login-logout">Log In | Log Out</label>
					    <input id="tab-custom-code" type="radio" name="tabs"><label for="tab-custom-code">Custom Code</label>
					    <input id="tab-disable-components" type="radio" name="tabs"><label for="tab-disable-components">Disable Components</label>
					    <input id="tab-security" type="radio" name="tabs"><label for="tab-security">Security</label>
					    <input id="tab-optimizations" type="radio" name="tabs"><label for="tab-optimizations">Optimizations</label>
					    <input id="tab-utilities" type="radio" name="tabs"><label for="tab-utilities">Utilities</label>
					</div>
					<div class="asenha-tab-contents">
					    <section class="asenha-fields fields-content-management"> 
					    	<table class="form-table" role="presentation">
					    		<tbody></tbody>
					    	</table>
					    </section>
					    <section class="asenha-fields fields-admin-interface"> 
					    	<table class="form-table" role="presentation">
					    		<tbody></tbody>
					    	</table>
					    </section>
					    <section class="asenha-fields fields-login-logout"> 
					    	<table class="form-table" role="presentation">
					    		<tbody></tbody>
					    	</table>
					    </section>
					    <section class="asenha-fields fields-custom-code"> 
					    	<table class="form-table" role="presentation">
					    		<tbody></tbody>
					    	</table>
					    </section>
					    <section class="asenha-fields fields-disable-components"> 
					    	<table class="form-table" role="presentation">
					    		<tbody></tbody>
					    	</table>
					    </section>
					    <section class="asenha-fields fields-security"> 
					    	<table class="form-table" role="presentation">
					    		<tbody></tbody>
					    	</table>
					    </section>
					    <section class="asenha-fields fields-optimizations"> 
					    	<table class="form-table" role="presentation">
					    		<tbody></tbody>
					    	</table>
					    </section>
					    <section class="asenha-fields fields-utilities"> 
					    	<table class="form-table" role="presentation">
					    		<tbody></tbody>
					    	</table>
					    </section>
					</div>
				</div>
				<div style="display:none;"><!-- Hide to prevent flash of fields appearing at the bottom of the page -->
					<?php 
    settings_fields( ASENHA_ID );
    ?>
					<?php 
    do_settings_sections( ASENHA_SLUG );
    ?>
					<?php 
    submit_button(
        'Save Changes',
        // Button copy
        'primary',
        // Type: 'primary', 'small', or 'large'
        'submit',
        // The 'name' attribute
        true,
        // Whether to wrap in <p> tag
        array(
            'id' => 'asenha-submit',
        )
    );
    ?>
				</div>
			</form>
		</div>

		<div class="asenha-footer">
		</div>

        <div id="asenha-sponsor" class="cta-modal-content sponsorship" style="display:none;">
            <div class="sponsorship-content">
                <div class="sponsorship-header">
                    <div class="sponsorship-image">
                        <img src="<?php 
    echo  esc_attr( ASENHA_URL . 'assets/img/undraw_Programming_re_kg9v.png' ) ;
    ?>" />
                    </div>
                    <h2>Thank you for your interest in sponsoring!</h2>
                </div>
                <div class="sponsorship-content-sections">
                    <div class="sponsorship-info">
                        <p class="sponsorship-description">I love building <strong>useful and free <a href="https://bowo.io/asenha-other-plugins" target="_blank">plugins</a></strong>. Your sponsorship will help justify the time and effort I spend in <strong>developing and maintaining this plugin</strong>, so it can remain functional and be more useful for <strong>your personal project(s), paid dev work, client site(s) and/or agency workflow</strong>... hopefully for years to come.</p>                                
                    </div>
                    <div class="sponsorship-methods">
                        <p class="sponsorship-amount">Sponsorship can be <strong>as little as USD 1</strong>, monthly or one-time.</p>
                        <div class="sponsorship-method sponsor-via-github">
                            <a href="https://bowo.io/asenha-sp-gth" target="_blank" class="button button-primary button-hero sponsorship-button monthly">Monthly Sponsorship via Github <span class="dashicons dashicons-arrow-right-alt2"></span></a>
                        </div>
                        <div class="sponsorship-method sponsor-via-paypal">
                            <a href="https://bowo.io/asenha-sp-ppl" target="_blank" class="button button-hero sponsorship-button one-time">One-time Sponsorship via PayPal <span class="dashicons dashicons-arrow-right-alt2"></span></a>
                        </div>
                    </div>
                </div>
                <p>More about me and my work at <a href="https://bowo.io/asenha-bw-sp" target="_blank">bowo.io</a>.</p>
            </div>
        </div>
	</div>
	<?php 
    // Record the number of times changes were saved as well as the date of last save
    $asenha_stats = get_option( ASENHA_SLUG_U . '_stats', array() );
    $changes_saved = ( isset( $_GET['settings-updated'] ) && 'true' == $_GET['settings-updated'] ? true : false );
    
    if ( $changes_saved ) {
        $current_date = date( 'Y-m-d', time() );
        
        if ( !isset( $asenha_stats['first_save_date'] ) ) {
            $asenha_stats['first_save_date'] = $current_date;
            $asenha_stats['last_save_date'] = $current_date;
            $asenha_stats['save_count'] = 1;
            $asenha_stats['have_sponsored'] = false;
            $asenha_stats['sponsorship_nudge_dismissed'] = false;
            $asenha_stats['sponsorship_nudge_last_shown_date'] = '';
            $asenha_stats['sponsorship_nudge_last_shown_save_count'] = 0;
        } else {
            $asenha_stats['last_save_date'] = $current_date;
            $save_count = $asenha_stats['save_count'];
            $save_count++;
            $asenha_stats['save_count'] = $save_count;
        }
        
        update_option( ASENHA_SLUG_U . '_stats', $asenha_stats );
    }

}

/**
 * Suppress all notices, then add notice for successful settings update
 *
 * @since 1.1.0
 */
function asenha_suppress_notices()
{
    global  $plugin_page ;
    // Suppress all notices
    if ( ASENHA_SLUG === $plugin_page ) {
        remove_all_actions( 'admin_notices' );
    }
    // Add notice for successful settings update
    if ( isset( $_GET['page'] ) && ASENHA_SLUG == $_GET['page'] && isset( $_GET['settings-updated'] ) && true == $_GET['settings-updated'] ) {
        ?>
			<script>
				jQuery(document).ready( function() {
					jQuery('.asenha-changes-saved').fadeIn(400).delay(2500).fadeOut(400);
				});
			</script>

		<?php 
    }
}

/**
 * Suppress all generic notices on the plugin settings page
 *
 * @since 2.7.0
 */
function asenha_suppress_generic_notices()
{
    global  $plugin_page ;
    // Suppress all notices
    if ( ASENHA_SLUG === $plugin_page ) {
        remove_all_actions( 'all_admin_notices' );
    }
}

/**
 * Enqueue admin scripts
 *
 * @since 1.0.0
 */
function asenha_admin_scripts( $hook_suffix )
{
    global 
        $wp_version,
        $pagenow,
        $typenow,
        $taxnow,
        $hook_suffix
    ;
    $current_screen = get_current_screen();
    // Get all WP Enhancements options, default to empty array in case it's not been created yet
    $options = get_option( 'admin_site_enhancements', array() );
    // For main page of this plugin
    
    if ( is_asenha() ) {
        wp_enqueue_style(
            'asenha-jbox',
            ASENHA_URL . 'assets/css/jBox.all.min.css',
            array(),
            ASENHA_VERSION
        );
        wp_enqueue_script(
            'asenha-jbox',
            ASENHA_URL . 'assets/js/jBox.all.min.js',
            array(),
            ASENHA_VERSION,
            false
        );
        wp_enqueue_script(
            'asenha-jsticky',
            ASENHA_URL . 'assets/js/jquery.jsticky.mod.min.js',
            array( 'jquery' ),
            ASENHA_VERSION,
            false
        );
        wp_enqueue_script(
            'asenha-js-cookie',
            ASENHA_URL . 'assets/js/js.cookie.min.js',
            array(),
            ASENHA_VERSION,
            false
        );
        // jQuery UI Sortables. In use, e.g. for Admin Interface >> Admin Menu Organizer
        // Re-register and re-enqueue jQuery UI Core and plugins required for sortable, draggable and droppable when ordering menu items
        wp_deregister_script( 'jquery-ui-core' );
        wp_register_script(
            'jquery-ui-core',
            get_site_url() . '/wp-includes/js/jquery/ui/core.min.js',
            array( 'jquery' ),
            ASENHA_VERSION,
            false
        );
        wp_enqueue_script( 'jquery-ui-core' );
        
        if ( version_compare( $wp_version, '5.6.0', '>=' ) ) {
            wp_deregister_script( 'jquery-ui-mouse' );
            wp_register_script(
                'jquery-ui-mouse',
                get_site_url() . '/wp-includes/js/jquery/ui/mouse.min.js',
                array( 'jquery-ui-core' ),
                ASENHA_VERSION,
                false
            );
            wp_enqueue_script( 'jquery-ui-mouse' );
        } else {
            wp_deregister_script( 'jquery-ui-widget' );
            wp_register_script(
                'jquery-ui-widget',
                get_site_url() . '/wp-includes/js/jquery/ui/widget.min.js',
                array( 'jquery' ),
                ASENHA_VERSION,
                false
            );
            wp_enqueue_script( 'jquery-ui-widget' );
            wp_deregister_script( 'jquery-ui-mouse' );
            wp_register_script(
                'jquery-ui-mouse',
                get_site_url() . '/wp-includes/js/jquery/ui/mouse.min.js',
                array( 'jquery-ui-core', 'jquery-ui-widget' ),
                ASENHA_VERSION,
                false
            );
            wp_enqueue_script( 'jquery-ui-mouse' );
        }
        
        wp_deregister_script( 'jquery-ui-sortable' );
        wp_register_script(
            'jquery-ui-sortable',
            get_site_url() . '/wp-includes/js/jquery/ui/sortable.min.js',
            array( 'jquery-ui-mouse' ),
            ASENHA_VERSION,
            false
        );
        wp_enqueue_script( 'jquery-ui-sortable' );
        wp_deregister_script( 'jquery-ui-draggable' );
        wp_register_script(
            'jquery-ui-draggable',
            get_site_url() . '/wp-includes/js/jquery/ui/draggable.min.js',
            array( 'jquery-ui-mouse' ),
            ASENHA_VERSION,
            false
        );
        wp_enqueue_script( 'jquery-ui-draggable' );
        wp_deregister_script( 'jquery-ui-droppable' );
        wp_register_script(
            'jquery-ui-droppable',
            get_site_url() . '/wp-includes/js/jquery/ui/droppable.min.js',
            array( 'jquery-ui-draggable' ),
            ASENHA_VERSION,
            false
        );
        wp_enqueue_script( 'jquery-ui-droppable' );
        // Script to set behaviour and actions of the sortable menu
        wp_enqueue_script(
            'asenha-custom-admin-menu',
            ASENHA_URL . 'assets/js/custom-admin-menu.js',
            array( 'jquery-ui-draggable' ),
            ASENHA_VERSION,
            false
        );
        // CodeMirror. In use, e.g. for Utilities >> Enable Custom Admin / Frontend CSS / ads.txt / app-ads.txt
        wp_enqueue_style(
            'asenha-codemirror',
            ASENHA_URL . 'assets/css/codemirror/codemirror.min.css',
            array(),
            ASENHA_VERSION
        );
        wp_enqueue_script(
            'asenha-codemirror',
            ASENHA_URL . 'assets/js/codemirror/codemirror.min.js',
            array( 'jquery' ),
            ASENHA_VERSION,
            true
        );
        wp_enqueue_script(
            'asenha-codemirror-htmlmixed-mode',
            ASENHA_URL . 'assets/js/codemirror/htmlmixed.js',
            array( 'asenha-codemirror' ),
            ASENHA_VERSION,
            true
        );
        wp_enqueue_script(
            'asenha-codemirror-xml-mode',
            ASENHA_URL . 'assets/js/codemirror/xml.js',
            array( 'asenha-codemirror' ),
            ASENHA_VERSION,
            true
        );
        wp_enqueue_script(
            'asenha-codemirror-javascript-mode',
            ASENHA_URL . 'assets/js/codemirror/javascript.js',
            array( 'asenha-codemirror' ),
            ASENHA_VERSION,
            true
        );
        wp_enqueue_script(
            'asenha-codemirror-css-mode',
            ASENHA_URL . 'assets/js/codemirror/css.js',
            array( 'asenha-codemirror' ),
            ASENHA_VERSION,
            true
        );
        wp_enqueue_script(
            'asenha-codemirror-markdown-mode',
            ASENHA_URL . 'assets/js/codemirror/markdown.js',
            array( 'asenha-codemirror' ),
            ASENHA_VERSION,
            true
        );
        // DataTables. In use, e.g. for Security >> Limit Login Attempts
        wp_enqueue_style(
            'asenha-datatables',
            ASENHA_URL . 'assets/css/datatables/datatables.min.css',
            array(),
            ASENHA_VERSION
        );
        wp_enqueue_script(
            'asenha-datatables',
            ASENHA_URL . 'assets/js/datatables/datatables.min.js',
            array( 'jquery' ),
            ASENHA_VERSION,
            false
        );
        // Main style and script for the admin page
        wp_enqueue_style(
            'asenha-admin-page',
            ASENHA_URL . 'assets/css/admin-page.css',
            array( 'asenha-jbox', 'asenha-codemirror', 'asenha-datatables' ),
            ASENHA_VERSION
        );
        wp_enqueue_script(
            'asenha-admin-page',
            ASENHA_URL . 'assets/js/admin-page.js',
            array(
            'asenha-jsticky',
            'asenha-jbox',
            'asenha-js-cookie',
            'asenha-codemirror-htmlmixed-mode',
            'asenha-codemirror-xml-mode',
            'asenha-codemirror-javascript-mode',
            'asenha-codemirror-css-mode',
            'asenha-codemirror-markdown-mode',
            'asenha-datatables',
            'asenha-custom-admin-menu'
        ),
            ASENHA_VERSION,
            false
        );
    }
    
    // Enqueue on all wp-admin
    wp_enqueue_style(
        'asenha-wp-admin',
        ASENHA_URL . 'assets/css/wp-admin.css',
        array(),
        ASENHA_VERSION
    );
    // Content Management >> Show IDs, for list tables in wp-admin, e.g. All Posts page
    if ( false !== strpos( $current_screen->base, 'edit' ) || false !== strpos( $current_screen->base, 'users' ) || false !== strpos( $current_screen->base, 'upload' ) ) {
        wp_enqueue_style(
            'asenha-list-table',
            ASENHA_URL . 'assets/css/list-table.css',
            array(),
            ASENHA_VERSION
        );
    }
    // Content Management >> Enable Media Replacement
    
    if ( $current_screen->base == 'upload' || $current_screen->id == 'attachment' ) {
        // wp_enqueue_style( 'asenha-jbox', ASENHA_URL . 'assets/css/jBox.all.min.css', array(), ASENHA_VERSION );
        // wp_enqueue_script( 'asenha-jbox', ASENHA_URL . 'assets/js/jBox.all.min.js', array(), ASENHA_VERSION, false );
        wp_enqueue_style(
            'asenha-media-replace',
            ASENHA_URL . 'assets/css/media-replace.css',
            array(),
            ASENHA_VERSION
        );
        wp_enqueue_script(
            'asenha-media-replace',
            ASENHA_URL . 'assets/js/media-replace.js',
            array(),
            ASENHA_VERSION,
            false
        );
    }
    
    // Content Management >> Hide Admin Notices
    
    if ( array_key_exists( 'hide_admin_notices', $options ) && $options['hide_admin_notices'] ) {
        wp_enqueue_style(
            'asenha-jbox',
            ASENHA_URL . 'assets/css/jBox.all.min.css',
            array(),
            ASENHA_VERSION
        );
        wp_enqueue_script(
            'asenha-jbox',
            ASENHA_URL . 'assets/js/jBox.all.min.js',
            array(),
            ASENHA_VERSION,
            false
        );
        wp_enqueue_style(
            'asenha-hide-admin-notices',
            ASENHA_URL . 'assets/css/hide-admin-notices.css',
            array(),
            ASENHA_VERSION
        );
        wp_enqueue_script(
            'asenha-hide-admin-notices',
            ASENHA_URL . 'assets/js/hide-admin-notices.js',
            array( 'asenha-jbox' ),
            ASENHA_VERSION,
            false
        );
    }
    
    // Utilities >> Multiple User Roles
    if ( array_key_exists( 'multiple_user_roles', $options ) && $options['multiple_user_roles'] ) {
        if ( 'user-edit.php' == $hook_suffix || 'user-new.php' == $hook_suffix ) {
            // Only replace roles dropdown with checkboxes for users that can assign roles to other users, e.g. administrators
            if ( current_user_can( 'promote_users', get_current_user_id() ) ) {
                wp_enqueue_script(
                    'asenha-multiple-user-roles',
                    ASENHA_URL . 'assets/js/multiple-user-roles.js',
                    array( 'jquery' ),
                    ASENHA_VERSION,
                    false
                );
            }
        }
    }
    // Pass on ASENHA stats to admin-page.js to determine whether to show sponsorship nudge
    $asenha_stats = get_option( ASENHA_SLUG_U . '_stats', array() );
    $current_date = date( 'Y-m-d', time() );
    $show_sponsorship_nudge = false;
    $asenha_stats_localized = array(
        'firstSaveDate'        => '',
        'lastSaveDate'         => '',
        'saveCount'            => 0,
        'showSponsorshipNudge' => false,
    );
    
    if ( !empty($asenha_stats) ) {
        $have_sponsored = $asenha_stats['have_sponsored'];
        $changes_saved = ( isset( $_GET['settings-updated'] ) && 'true' == $_GET['settings-updated'] ? true : false );
        // Compensate for redirect from settings-updated=true URL
        
        if ( $changes_saved ) {
            $save_count = $asenha_stats['save_count'] + 1;
        } else {
            $save_count = $asenha_stats['save_count'];
        }
        
        $saves_to_nudge_sponsorship = 10;
        
        if ( $save_count < $saves_to_nudge_sponsorship ) {
            $save_count_modulo = -1;
        } else {
            $save_count_modulo = $save_count % $saves_to_nudge_sponsorship;
        }
        
        // User have not sponsored ASE
        if ( false === $have_sponsored ) {
            // Sponsorship nudge have not been dismissed
            
            if ( false === $asenha_stats['sponsorship_nudge_dismissed'] ) {
                // Show sponsorship nudge after every x saves
                
                if ( $save_count_modulo >= 0 ) {
                    $show_sponsorship_nudge = true;
                } else {
                    $show_sponsorship_nudge = false;
                }
                
                
                if ( $show_sponsorship_nudge && $save_count_modulo >= 0 ) {
                    $asenha_stats['sponsorship_nudge_last_shown_date'] = $current_date;
                    $asenha_stats['sponsorship_nudge_last_shown_save_count'] = $save_count;
                    update_option( ASENHA_SLUG_U . '_stats', $asenha_stats );
                }
            
            } else {
                
                if ( $save_count_modulo == 0 ) {
                    
                    if ( $save_count > $asenha_stats['sponsorship_nudge_last_shown_save_count'] ) {
                        $asenha_stats['sponsorship_nudge_dismissed'] = false;
                        update_option( ASENHA_SLUG_U . '_stats', $asenha_stats );
                        $show_sponsorship_nudge = true;
                    } else {
                        $show_sponsorship_nudge = false;
                    }
                
                } else {
                    $show_sponsorship_nudge = false;
                }
            
            }
        
        }
        $asenha_stats_localized = array(
            'firstSaveDate'        => $asenha_stats['first_save_date'],
            'lastSaveDate'         => $asenha_stats['last_save_date'],
            'saveCount'            => $save_count,
            'showSponsorshipNudge' => $show_sponsorship_nudge,
        );
    }
    
    wp_localize_script( 'asenha-admin-page', 'asenhaStats', $asenha_stats_localized );
}

/**
 * Enqueue public scripts
 *
 * @since 3.9.0
 */
function asenha_public_scripts( $hook_suffix )
{
    // Get all WP Enhancements options, default to empty array in case it's not been created yet
    $options = get_option( 'admin_site_enhancements', array() );
    
    if ( array_key_exists( 'enable_external_permalinks', $options ) ) {
        $enable_external_permalinks = $options['enable_external_permalinks'];
    } else {
        $enable_external_permalinks = false;
    }
    
    
    if ( $enable_external_permalinks ) {
        wp_enqueue_script(
            'asenha-public',
            ASENHA_URL . 'assets/js/public.js',
            array( 'jquery' ),
            ASENHA_VERSION,
            false
        );
        wp_localize_script( 'asenha-public', 'phpVars', array(
            'externalPermalinksEnabled' => $enable_external_permalinks,
        ) );
    }

}

/**
 * Add 'Access now' plugin action link.
 *
 * @since    1.0.0
 */
function asenha_plugin_action_links( $links )
{
    $settings_link = '<a href="tools.php?page=' . ASENHA_SLUG . '">Configure now</a>';
    array_unshift( $links, $settings_link );
    return $links;
}

/**
 * Modify footer text
 *
 * @since 1.0.0
 */
function asenha_footer_text()
{
    if ( is_asenha() ) {
        ?>
		<a href="https://bowo.io/asenha-dotorg" target="_blank">Admin Site Enhancements</a> is on <a href="https://bowo.io/asenha-gthb" target="_blank">github</a>.
		<?php 
    }
}

/**
 * Change WP version number text in footer
 * 
 * @since 4.8.3
 */
function asenha_footer_version_text()
{
    ?>
    Also by Bowo &#8594; <a href="https://bowo.io/asenha-wpn" target="_blank">WordPress Newsboard</a>: The latest from 100+ sources
	<?php 
}

/**
 * Check if current screen is this plugin's main page
 *
 * @since 1.0.0
 */
function is_asenha()
{
    $request_uri = sanitize_text_field( $_SERVER['REQUEST_URI'] );
    // e.g. /wp-admin/index.php?page=page-slug
    
    if ( strpos( $request_uri, 'page=' . ASENHA_SLUG ) !== false ) {
        return true;
        // Yes, this is the plugin's main page
    } else {
        return false;
        // Nope, this is NOT the plugin's page
    }

}

/**
 * Mark that user have sponsored ASE
 * 
 * @since 5.2.7
 */
function asenha_have_sponsored()
{
    
    if ( isset( $_REQUEST ) ) {
        $asenha_stats = get_option( ASENHA_SLUG_U . '_stats', array() );
        $asenha_stats['have_sponsored'] = true;
        $asenha_stats['sponsorship_nudge_dismissed'] = true;
        $success = update_option( ASENHA_SLUG_U . '_stats', $asenha_stats );
        
        if ( $success ) {
            echo  json_encode( array(
                'success' => true,
            ) ) ;
        } else {
            echo  json_encode( array(
                'success' => false,
            ) ) ;
        }
    
    }

}

/**
 * Dismiss sponsorship nudge
 * 
 * @since 5.2.7
 */
function asenha_dismiss_sponsorship_nudge()
{
    
    if ( isset( $_REQUEST ) ) {
        $asenha_stats = get_option( ASENHA_SLUG_U . '_stats', array() );
        $asenha_stats['sponsorship_nudge_dismissed'] = true;
        $success = update_option( ASENHA_SLUG_U . '_stats', $asenha_stats );
        
        if ( $success ) {
            echo  json_encode( array(
                'success' => true,
            ) ) ;
        } else {
            echo  json_encode( array(
                'success' => false,
            ) ) ;
        }
    
    }

}
