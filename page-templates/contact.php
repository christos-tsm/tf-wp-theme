<?php

/**
 * Template Name: Contact
 */
get_header();
?>
<?php get_template_part('template-parts/page-header'); ?>
<section class="contact-intro container">
    <div class="contact-intro__title">
        <h2 class="page-intro__title"><?php the_field('page_header_title'); ?></h2>
        <div class="page-intro__text">
            <?php the_content(); ?>
        </div>
    </div>
    <div class="contact-intro__address">
        <h2><?php pll_e('Address'); ?></h2>
        <ul>
            <li>
                <a href="<?= the_field('address_url', 'option') ?>" target="_blank" rel="noopener">
                    <?= pll_current_language() == 'en' ? get_field('address_en', 'option') : get_field('address', 'option'); ?>
                </a>
            </li>
        </ul>
    </div>
    <div class="contact-intro__social">
        <h2><?php pll_e('Contact'); ?></h2>
        <?php if (have_rows('tels', 'option')) : ?>
            <ul>
                <?php while (have_rows('tels', 'option')) : the_row(); ?>
                    <?php $tel = get_sub_field('tel'); ?>
                    <li>
                        <a href="tel:<?= str_replace(' ', '', $tel); ?>">
                            T. <?= esc_attr($tel); ?>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
        <?php if (have_rows('emails', 'option')) : ?>
            <ul>
                <?php while (have_rows('emails', 'option')) : the_row(); ?>
                    <li>
                        <a href="mailto:<?= esc_attr(get_sub_field('email')); ?>">
                            E. <?= esc_attr(get_sub_field('email')); ?>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    </div>
    <div class="contact-intro__social">
        <h2><?php pll_e('Follow us'); ?></h2>
        <ul>
            <li>
                <a class="icon icon--medium" aria-label="Social media link" target="_blank" rel="noopener noreferrer" href="<?= esc_url(get_field('facebook_url', 'option')) ?>">
                    <?= file_get_contents(get_stylesheet_directory() . '/assets/images/facebook.svg') ?>
                </a>
            </li>
            <li>
                <a class="icon icon--medium" aria-label="Social media link" target="_blank" rel="noopener noreferrer" href="<?= esc_url(get_field('twitter_url', 'option')) ?>">
                    <?= file_get_contents(get_stylesheet_directory() . '/assets/images/twitter.svg') ?>
                </a>
            </li>
            <li>
                <a class="icon icon--medium" aria-label="Social media link" target="_blank" rel="noopener noreferrer" href="<?= esc_url(get_field('instagram_url', 'option')) ?>">
                    <?= file_get_contents(get_stylesheet_directory() . '/assets/images/instagram.svg') ?>
                </a>
            </li>
            <li>
                <a class="icon icon--medium" aria-label="Social media link" target="_blank" rel="noopener noreferrer" href="<?= esc_url(get_field('linkedin_url', 'option')) ?>">
                    <?= file_get_contents(get_stylesheet_directory() . '/assets/images/linkedin.svg') ?>
                </a>
            </li>
            <li>
                <a class="icon icon--medium" aria-label="Social media link" target="_blank" rel="noopener noreferrer" href="<?= esc_url(get_field('youtube_url', 'option')) ?>">
                    <?= file_get_contents(get_stylesheet_directory() . '/assets/images/youtube.svg') ?>
                </a>
            </li>
        </ul>
    </div>
</section>
<section class="contact-form__container">
    <div class="contact-form-flex container container--big">
        <div class="div contact-form__content">
            <?php $shortcode = get_field('form_shortcode'); ?>
            <?= do_shortcode($shortcode) ?>
        </div>
        <div class="div contact-form__thumbnail">
            <?php $image = get_field('form_image'); ?>
            <img src="<?= esc_url($image['url']) ?>" alt="<?php the_title(); ?>">
        </div>
    </div>
</section>
<?php get_footer(); ?>