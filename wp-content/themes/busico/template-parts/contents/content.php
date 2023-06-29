<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package busico
 */

global $busicoObj;
$busico        = get_option('busico');
$show_excerpt = isset($busico['show_excerpt']) ? $busico['show_excerpt'] : true;
$grid         = (isset($busico['blog_grid'])) ? $busico['blog_grid'] : 'one-column';
switch ($grid) {

	case 'one-column':
		$limit = 40;
		$title = get_the_title();
		break;

	case 'two-column':
		$limit = 17;
		$title = wp_trim_words(get_the_title(), 11, '...');
		break;

	default:
		$limit = 17;
		$title = wp_trim_words(get_the_title(), 11, '...');
		break;
}

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-post-item <?php echo esc_attr($grid)  ?>">
		<div class="post-thumbnail-wrapper">
			<?php
			if (is_sticky()) {
				echo '<span class="sticky-text" >' . esc_html__('Sticky', 'busico') . '</span>';
			}
			?>
			<?php busico_post_thumbnail(); ?>

		</div>
		<div class="post-content">
		<div class="blog-categroy">
				<?php  $category = get_the_category(); if (!empty($category)):  ?>
					<?php
						echo '<span><a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->cat_name . '</a></span>';
					?>
				<?php endif; ?>
			</div>

			<?php
			echo '<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">';
			echo esc_html($title);
			echo '</a></h2>';
			?>
			<div class="post-meta top">
				<div class="comment-meta">
					<?php comments_popup_link('No Comment ', '1 Comment ', '% Comments '); ?>
				</div>
				<div class="post-date">
					<?php busico_posted_on() ?>
				</div>

			</div>

			<?php if ($show_excerpt) {
				echo '<p>' . esc_html($busicoObj->postExcerpt($limit, get_the_excerpt())) . '</p>';
			} ?>

			<div class="post-single-item-bottom-area">
				<div class="post-read-more">
					<a href="<?php echo esc_url(get_permalink()); ?>">
						<?php echo (isset($busico['continue_reading_title'])) ? $busico['continue_reading_title'] : esc_html__('Read More', 'busico') ?>

					</a>
				</div>
			</div>


		</div>
	</div>

</div><!-- #post-<?php the_ID(); ?> -->