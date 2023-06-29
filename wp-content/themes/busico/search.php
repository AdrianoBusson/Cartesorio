<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package busico
 */
use BusicoTheme\Inc\Classes\Busico_Main;

get_header();

$busicoObj = new Busico_Main();

echo esc_html($busicoObj->busico_breadcrumb_bridge());

$busico = get_option('busico');
$grid = (isset($busico['blog_grid'])) ? $busico['blog_grid'] : 'one-column';

?>

<div class="content-block sp-80">
	<div class="container">
		<div class="row blog-content-row justify-content-center">

			<?php
			// If Redux Framework Active
			if (have_posts()) :

				if (class_exists('ReduxFrameworkPlugin')) :
					// var_dump($busico['blog_layout']);
					$busicoObj->postMarkupGenerator($busico['blog_layout'], $grid);

				else : // If Redux Framework Is Not Active

					$busicoObj->postMarkupGenerator(null, $grid);

				endif;
			else :

				get_template_part('template-parts/contents/content-none');
			endif;
			?>
		</div>
	</div>
</div>


<?php
get_footer();
