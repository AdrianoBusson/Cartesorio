<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package busico
 */
use BusicoTheme\Inc\Classes\Busico_Main;

get_header();

$busicoObj = new Busico_Main();
echo esc_html($busicoObj->busico_breadcrumb_bridge());
?>
<div class="error-404 not-found">
	<div class="container">
		<div class="row justify-content-center align-items-center">
		<div class="col-md-8 order-1 text-center">
				<img src="<?php echo esc_url( get_theme_file_uri('/assets/img/404.png') );  ?>" alt="<?php echo esc_attr('404 page') ?>">
			</div>
			<div class="col-xl-6 col-lg-7 col-md-8 content-404 order-2 text-center px-xl-5">
				<h4><?php echo esc_html__( '404 Error!', 'busico' ) ?></h4>
				<p><?php echo esc_html__('The page you are looking for is not available or doesn’t belong to this website!', 'busico') ?></p>
				<a href="<?php echo esc_url(home_url()) ?>" class="busico-btn"><?php echo esc_html__( 'Go back to home', 'busico' ) ?></a>
			</div>
		</div>
	</div>
</div><!-- .error-404 -->


<?php
get_footer();
