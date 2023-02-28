<?php
$hours = get_field('hours');
?>
<article class="excursion-card">
    <div class="excursion-card__image">
        <?php if (has_post_thumbnail()) : ?>
            <a aria-label="Go to <?php the_title(); ?>" href="<?php the_permalink() ?>">
                <img src="<?= the_post_thumbnail_url('large') ?>" alt="<?php the_title(); ?>">
            </a>
        <?php endif; ?>
    </div>
    <div class="excursion-card__content">
        <h3 class="excursion-card__title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
        <div class="excursion-card__text">
            <?php the_excerpt(); ?>
        </div>
        <div class="excursion-card__details">
            <ul>
                <?php if ($hours) : ?>
                    <li><span class="icon icon--small"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/clock.svg'); ?></span> <?= esc_attr($hours) ?> <?php pll_e('Hours'); ?></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</article>