<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package busico
 */

use BusicoTheme\Inc\Classes\Busico_Main;

get_header();

$busicoObj = new Busico_Main();
echo esc_html($busicoObj->busico_breadcrumb_bridge());

$busico = get_option('busico');

$grid = (isset($busico['blog_grid'])) ? $busico['blog_grid'] : 'two-column';

?>

<div class="content-block">
	<div class="container">
		<div class="row blog-content-row">

			<?php
			// If Redux Framework Active
			if (class_exists('ReduxFrameworkPlugin')) :
				$busicoObj->postMarkupGenerator($busico['blog_layout'], $grid);

			else : // If Redux Framework Is Not Active

				$busicoObj->postMarkupGenerator(null, $grid);

			endif;

			?>

		</div>
	</div>
</div>

<?php
get_footer();
