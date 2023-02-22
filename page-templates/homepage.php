<?php

/**
 * Template Name: Homepage
 */
get_header();
?>

<section class="page-header__container homepage-header__container">
    <?php $bg_image = get_field('header_image'); ?>
    <img src="<?= esc_url($bg_image['url']) ?>" alt="<?= bloginfo('name') ?>">
    <div class="homepage-header__content">
        <h1 class="page-header__title"><?php the_field('header_title'); ?></h1>
        <?php get_template_part('template-parts/header-form-transfers'); ?>
    </div>
</section>

<?php get_footer(); ?>