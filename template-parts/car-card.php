<div class="car-thumbnail"><img src="<?php the_post_thumbnail_url('medium') ?>" alt="<?php the_title(); ?>"></div>
<div class="car-details">
    <h3><?php the_title(); ?></h3>
    <ul>
        <li>
            <span class="icon icon--small"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/seats.svg') ?></span>
            x<?php the_field('persons'); ?>
        </li>

        <li>
            <span class="icon icon--small"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/bagagge.svg') ?></span>
            x<?php the_field('bagagges'); ?>
        </li>

        <?php if (get_field('ac')) : ?>
            <li>
                <span class="icon icon--small"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/ac.svg') ?></span>
                <?php pll_e('A/C'); ?>
            </li>
        <?php endif; ?>
        <?php if (get_field('wifi')) : ?>
            <li>
                <span class="icon icon--small"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/wifi.svg') ?></span>
                <?php pll_e('WiFi'); ?>
            </li>
        <?php endif; ?>
    </ul>
</div>