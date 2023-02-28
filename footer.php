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
<footer class="site-footer">
	<div class="site-footer__top">
		<?php $logo = get_field('logo', 'options') ?>
		<a class="logo__container" aria-label='Link to homepage' href="<?= pll_home_url(); ?>">
			<?= file_get_contents(esc_url($logo['url'])); ?>
		</a>
	</div>
	<div class="site-footer__cols">
		<div class="site-footer__col site-footer__contact">
			<h5>Contact</h5>
			<ul>
				<li>
					<a href="<?= the_field('address_url', 'option') ?>" target="_blank" rel="noopener">
						<span class="icon icon--small"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/pin.svg') ?></span>
						<?= pll_current_language() == 'en' ? get_field('address_en', 'option') : get_field('address', 'option'); ?>
					</a>
				</li>
				<?php if (have_rows('tels', 'option')) : ?>
					<?php while (have_rows('tels', 'option')) : the_row(); ?>
						<?php $tel = get_sub_field('tel'); ?>
						<li>
							<a href="tel:<?= str_replace(' ', '', $tel); ?>">
								<span class="icon icon--small"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/phone.svg') ?></span>
								<?= esc_attr($tel); ?>
							</a>
						</li>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php if (have_rows('emails', 'option')) : ?>
					<?php while (have_rows('emails', 'option')) : the_row(); ?>
						<li>
							<a href="mailto:<?= esc_attr(get_sub_field('email')); ?>">
								<span class="icon icon--small"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/email.svg') ?></span>
								<?= esc_attr(get_sub_field('email')); ?>
							</a>
						</li>
					<?php endwhile; ?>
				<?php endif; ?>
			</ul>
		</div>
		<div class="site-footer__col site-footer__menu">
			<h5>Menu</h5>
			<?php wp_nav_menu(array(
				'theme_location' => 'footer-menu',
				'container' => 'nav'
			)); ?>
		</div>
		<div class="site-footer__col site-footer__information">
			<h5>Information</h5>
			<?php wp_nav_menu(array(
				'theme_location' => 'footer-information',
				'container' => 'nav'
			)); ?>
		</div>
		<div class="site-footer__col site-footer__newsletter">
			<h5>Subscribe & stay updated</h5>
			<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
			<?= do_shortcode('[contact-form-7 id="139" title="Newsletter Form"]') ?>
		</div>
	</div>
	<div class="site-footer__bottom">
		<div class="site-footer__copyrights">
			<p>Copyrights &copy; Transfer Chania | All rights reserved</p>
		</div>
		<div class="site-footer__social">
			<a class="icon icon--medium" aria-label="Social media link" target="_blank" rel="noopener noreferrer" href="<?= esc_url(get_field('facebook_url', 'option')) ?>">
				<?= file_get_contents(get_stylesheet_directory() . '/assets/images/facebook.svg') ?>
			</a>
			<a class="icon icon--medium" aria-label="Social media link" target="_blank" rel="noopener noreferrer" href="<?= esc_url(get_field('twitter_url', 'option')) ?>">
				<?= file_get_contents(get_stylesheet_directory() . '/assets/images/twitter.svg') ?>
			</a>
			<a class="icon icon--medium" aria-label="Social media link" target="_blank" rel="noopener noreferrer" href="<?= esc_url(get_field('instagram_url', 'option')) ?>">
				<?= file_get_contents(get_stylesheet_directory() . '/assets/images/instagram.svg') ?>
			</a>
			<a class="icon icon--medium" aria-label="Social media link" target="_blank" rel="noopener noreferrer" href="<?= esc_url(get_field('linkedin_url', 'option')) ?>">
				<?= file_get_contents(get_stylesheet_directory() . '/assets/images/linkedin.svg') ?>
			</a>
			<a class="icon icon--medium" aria-label="Social media link" target="_blank" rel="noopener noreferrer" href="<?= esc_url(get_field('youtube_url', 'option')) ?>">
				<?= file_get_contents(get_stylesheet_directory() . '/assets/images/youtube.svg') ?>
			</a>
		</div>
		<div class="site-footer__n22">
			<p>Designed by <a href="https://net22.gr" target="_blank" rel="noopener"><strong>Net22</strong></a></p>
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>