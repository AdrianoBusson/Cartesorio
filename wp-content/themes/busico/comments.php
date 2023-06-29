<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package busico
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}

$busico_comment_count = get_comments_number();
$busico = get_option('busico');
$center = '';

if (is_single() && 'post' == get_post_type() && false == is_active_sidebar('busico_blog_sidebar')) {
	$center = 'justify-content-center';
} elseif (isset($busico['single_page_layout'])) {
	if ('fullpage' == $busico['single_page_layout']) {
		$center = 'justify-content-center';
	}
}

?>


<?php if ($busico_comment_count != 0) : ?>
	<div id="comments" class="comments-area">

					<?php
					// You can start editing here -- including this comment!
					if (have_comments()) :
					?>
						<h2 class="comments-title">
							<?php

							if ('1' === $busico_comment_count) {
								printf(
									/* translators: 1: title. */
									'%s', esc_html__('1 Response on this post', 'busico')
								);
							} else {
								printf(
									/* translators: 1: comment count number, 2: title. */
									esc_html(
										_nx(
											'%1$s Response on this post',
											'%1$s Responses on this post',
											$busico_comment_count,
											'Responses title',
											'busico'
										)
									),
									number_format_i18n($busico_comment_count), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									'<span>' . esc_html(get_the_title()) . '</span>'
								);
							}
							?>
						</h2><!-- .comments-title -->

						<?php the_comments_navigation(); ?>

						<ol class="comment-list">
							<?php
							wp_list_comments(
								array(
									'style'      => 'ol',
									'short_ping' => true,
								)
							);
							?>
						</ol><!-- .comment-list -->

						<?php
						// the_comments_navigation();
						$cpage = get_query_var('cpage') ? get_query_var('cpage') : 1;

						if ($cpage > 1) : ?>
							<div class="busico-comment-loadmore-btn"><?php echo esc_html__('Load more comments', 'busico') ?> <i class="fa fa-caret-down"></i></div>
					<?php
							$cpage = get_query_var('cpage') ? get_query_var('cpage') : 1;
							wp_localize_script(
								'busico-main',
								'busico_comment_loadmore',
								array(
									'ajaxurl' => admin_url('admin-ajax.php'),
									'parent_post_id' => get_the_ID(),
									'cpage' => $cpage,
								)
							);

						endif;


					endif; // Check for have_comments().

					?>

	</div><!-- #comments -->
<?php endif; ?>



<div class="comment-form-area">


	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if (!comments_open()) :
	?>
		<p class="no-comments"><?php esc_html_e('Comments are closed.', 'busico'); ?></p>
	<?php
	else :

		$args = array(
			'title_reply' => __('Post Comment', 'busico'),
			'comment_field' => '<p class="comment-form-comment">
						<textarea id="comment" name="comment" aria-required="true" placeholder="' . esc_attr__('Type your comments....', 'busico') . '"></textarea>
					</p>',
			'fields' => array(
				//Author field
				'author' => '<p class="comment-form-author">
					<input id="author" name="author" aria-required="true" placeholder="' . esc_attr__('Type your name....', 'busico') . '" required="required" />
					</p>',
				//Email Field
				'email' => '<p class="comment-form-email">
					<input id="email" name="email" placeholder="' . esc_attr__('Type your email....', 'busico') . '" required="required" />
					</p>',
				//URL Field
				'url' => '',
			),


		);
		comment_form($args);
	endif;
	?>

</div>



