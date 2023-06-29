<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package busico
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-details-cat-list">
		<h6><?php the_category(); ?></h6>
	</div>

	<div class="post-details-heading">
		<h2></h2>
	</div>
	
	<div class="blog-details-meta-list post-meta top">
		<div class="comment-meta">
			<?php comments_popup_link('No Comment ', '1 Comment ', '% Comments '); ?>

		</div>
		<div class="post-date">
			<?php busico_posted_on() ?>
		</div>
	</div>
	<div class="single-post-content-wrap">
		<div class="entry-content clearfix">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'busico'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					esc_html(get_the_title())
				)
			); ?>
			<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__('Pages:', 'busico'),
					'after'  => '</div>',
				)
			);
			?>
		</div>

		<footer class="entry-footer"> 

			
				
				<section class="sharing-box">
					<?php
					$busico = get_option('busico');
					$postUrl = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; ?>

				   	<?php if($busico['share_title']): ?>
						<h5 class="sharing-box-name"><?php echo esc_html($busico['share_title']); ?></h5>
					<?php endif; ?>

					<div class="share-button-wrapper">

					
						<?php if($busico['s_facebook']): ?>
							<a target="_blank" class="share-button" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $postUrl; ?>" title="Share on Facebook"><i class="fab fa-facebook-f"></i></a>
						<?php endif; ?>

						<?php if($busico['s_twitter']): ?>
							<a target="_blank" class="share-button" href="https://twitter.com/intent/tweet?url=<?php echo $postUrl; ?>&text=<?php echo the_title(); ?>&via=<?php the_author_meta( 'twitter' ); ?>" title="Tweet this">
								<i class="fab fa-twitter"></i>
							</a>
						<?php endif; ?>
						
						<?php if($busico['s_google_plus']): ?>
							<a target="_blank" class="share-button" href="https://plus.google.com/share?url=<?php echo $postUrl; ?>" title="Share on Google Plus"><i class="fab fa-goolge-plus"></i></a>
						<?php endif; ?>
						 
						<?php if($busico['s_linkedin']): ?>
							<a target="_blank" class="share-button" href="https://www.linkedin.com/shareArticle?url=<?php echo $postUrl; ?>" title="Share on Iinkedin"><i class="fab fa-linkedin-in"></i></a>
						<?php endif ?>

						
					</div>
				</section>
				<?php busico_entry_footer(); ?>


		</footer><!-- .entry-footer -->
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->