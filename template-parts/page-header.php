<?php
$default_image = get_field('default_header_image', 'options');
$page_title = get_field('page_header_title') ? get_field('page_header_title') : get_the_title();
?>
<section class="page-header">
    <?php if (has_post_thumbnail()) : ?>
        <img class="page-header__img" src="<?= esc_url(the_post_thumbnail_url('large')) ?>" alt="<?= bloginfo('name'); ?>">
    <?php else : ?>
        <img class="page-header__img" src="<?= esc_url($default_image['sizes']['large']) ?>" alt="<?= bloginfo('name'); ?>">
    <?php endif; ?>

    <div class="page-header__content">
        <h1 class="page-header__title"><?= esc_attr($page_title); ?></h1>
    </div>

    <div class="overlay"></div>
</section>