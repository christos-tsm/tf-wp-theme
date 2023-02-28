<?php

/**
 * Template Name: Excursions
 */
get_header();
$args = array(
    'post_type' => 'tours',
    'post_status' => 'publish',
    'posts_per_page' => -1,
);
$query = new WP_Query($args);
?>
<?php get_template_part('template-parts/page-header'); ?>

<div class="page-intro container">
    <h2 class="page-intro__title"><?php the_field('intro_title'); ?></h2>
    <div class="page-intro__text">
        <?php the_field('intro_text'); ?>
    </div>
</div>

<?php if ($query->have_posts()) : ?>
    <div class="excursions-content container">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <?php get_template_part('template-parts/excursion-card'); ?>
        <?php endwhile; ?>
    </div>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>

<?php get_footer(); ?>