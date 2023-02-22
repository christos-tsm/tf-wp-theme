<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Taxi_Transfer
 */

?>
</main> <!-- .site-main end -->
<footer id="colophon" class="site-footer">
	<div class="site-info">
		<a href="<?php echo esc_url(__('https://wordpress.org/', 'taxi-transfer')); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf(esc_html__('Proudly powered by %s', 'taxi-transfer'), 'WordPress');
			?>
		</a>
		<span class="sep"> | </span>
		<?php
		/* translators: 1: Theme name, 2: Theme author. */
		printf(esc_html__('Theme: %1$s by %2$s.', 'taxi-transfer'), 'taxi-transfer', '<a href="https://net22.gr">Net22</a>');
		?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>