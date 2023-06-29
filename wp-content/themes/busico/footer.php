<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package busico
 */
$hide_global_footer = get_post_meta( get_the_ID(), 'hide_global_footer', true );
?>
</div><!-- #page -->
<footer class="footer-section">
<?php busico_footer_settings();?>
</footer>

<?php wp_footer();?>

</body>
</html>
