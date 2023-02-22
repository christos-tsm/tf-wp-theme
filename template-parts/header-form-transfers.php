<?php

/**
 * Form Transfers
 * CSS File : @scss/components/_header-form.scss
 * JS File  : @js/header-form.js
 */

// Select populate (To)
$stops_args = array(
    'post_type' => 'stops',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order' => 'asc'
);
// Select populate (Tours)
$tours_args = array(
    'post_type' => 'tours',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order' => 'asc'
);
$stops_query = new WP_Query($stops_args);
$tours_query = new WP_Query($tours_args);
?>
<div class="header-form__container">
    <div class="header-form__content">
        <div class="header-form__header">
            <h3 class="header-form__header-item header-form__header-item--active" data-target='#form--transfers'><?php pll_e('Transfers'); ?></h3>
            <h3 class="header-form__header-item" data-target='#form--excursions'><?php pll_e('Excursions'); ?></h3>
        </div>
        <form class="header-form header-form--active" method="POST" id="form--transfers">
            <div class="form__row">
                <div class="input__container">
                    <label for="from">From</label>
                    <select name="from" id="from" title="Pick up from">
                        <option value="chania-airport">Chania Airport</option>
                    </select>
                </div>
                <div class="input__container">
                    <label for="from">To</label>
                    <?php if ($stops_query->have_posts()) : ?>
                        <select name="to" id="to" title="Drop off to">
                            <?php while ($stops_query->have_posts()) : $stops_query->the_post(); ?>
                                <option value="<?= get_the_ID(); ?>"><?= ucfirst(get_the_title()); ?></option>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </select>
                    <?php endif; ?>
                </div>
                <div class="input__container">
                    <label for="from">Date</label>
                    <input type="text" name="date" class="transfer-date" title="Pick up date">
                </div>
            </div>
            <div class="form__row form__row--bottom">
                <div class="input__container">
                    <input type="hidden" name="adults" id="adults" value="2">
                    <label class="user-select--none" for="from">Adults (13+)</label>
                    <div class="input-number__container">
                        <span data-operation="minus" data-input=".header-form--active input[name='adults']" data-display-value=".header-form--active #adults-value" class="handle-value icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/minus.svg'); ?></span>
                        <span id="adults-value" class="user-select--none">2</span>
                        <span data-operation="plus" data-input=".header-form--active input[name='adults']" data-display-value=".header-form--active #adults-value" class="handle-value icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/plus.svg'); ?></span>
                    </div>
                </div>
                <div class="input__container">
                    <input type="hidden" name="children" id="children" value="0">
                    <label class="user-select--none" for="from">Children (3 - 12)</label>
                    <div class="input-number__container">
                        <span data-operation="minus" data-input=".header-form--active input[name='children']" data-display-value=".header-form--active #children-value" class="handle-value icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/minus.svg'); ?></span>
                        <span id="children-value" class="user-select--none">0</span>
                        <span data-operation="plus" data-input=".header-form--active input[name='children']" data-display-value=".header-form--active #children-value" class="handle-value icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/plus.svg'); ?></span>
                    </div>
                </div>
                <div class="input__container">
                    <input type="hidden" name="infants" id="infants" value="0">
                    <label class="user-select--none" for="from">Infants (0 - 2)</label>
                    <div class="input-number__container">
                        <span data-operation="minus" data-input=".header-form--active input[name='infants']" data-display-value=".header-form--active #infants-value" class="handle-value icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/minus.svg'); ?></span>
                        <span id="infants-value" class="user-select--none">0</span>
                        <span data-operation="plus" data-input=".header-form--active input[name='infants']" data-display-value=".header-form--active #infants-value" class="handle-value icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/plus.svg'); ?></span>
                    </div>
                </div>
            </div>
        </form>
        <form class="header-form" method="POST" id="form--excursions">
            <div class="form__row">
                <div class="input__container">
                    <label for="excursions">Excursions</label>
                    <?php if ($tours_query->have_posts()) : ?>
                        <select name="excursions" id="excursions" title="Select excursion">
                            <?php while ($tours_query->have_posts()) : $tours_query->the_post(); ?>
                                <option value="<?= get_the_ID(); ?>"><?= ucfirst(get_the_title()); ?></option>
                            <?php endwhile; ?>
                        </select>
                    <?php endif; ?>
                </div>
                <div class="input__container">
                    <label for="pick-up-point">Pick up point</label>
                    <?php if ($stops_query->have_posts()) : ?>
                        <select name="pick-up-point" id="pick-up-point" title="Select pick up point">
                            <?php while ($stops_query->have_posts()) : $stops_query->the_post(); ?>
                                <option value="<?= get_the_ID(); ?>"><?= ucfirst(get_the_title()); ?></option>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </select>
                    <?php endif; ?>
                </div>
                <div class="input__container">
                    <label for="from">Date</label>
                    <input type="text" name="date" class="transfer-date" title="Pick up date">
                </div>
            </div>
            <div class="form__row form__row--bottom">
                <div class="input__container">
                    <input type="hidden" name="adults" id="adults" value="2">
                    <label class="user-select--none" for="from">Adults (13+)</label>
                    <div class="input-number__container">
                        <span data-operation="minus" data-input=".header-form--active input[name='adults']" data-display-value=".header-form--active #adults-value" class="handle-value icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/minus.svg'); ?></span>
                        <span id="adults-value" class="user-select--none">2</span>
                        <span data-operation="plus" data-input=".header-form--active input[name='adults']" data-display-value=".header-form--active #adults-value" class="handle-value icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/plus.svg'); ?></span>
                    </div>
                </div>
                <div class="input__container">
                    <input type="hidden" name="children" id="children" value="0">
                    <label class="user-select--none" for="from">Children (3 - 12)</label>
                    <div class="input-number__container">
                        <span data-operation="minus" data-input=".header-form--active input[name='children']" data-display-value=".header-form--active #children-value" class="handle-value icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/minus.svg'); ?></span>
                        <span id="children-value" class="user-select--none">0</span>
                        <span data-operation="plus" data-input=".header-form--active input[name='children']" data-display-value=".header-form--active #children-value" class="handle-value icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/plus.svg'); ?></span>
                    </div>
                </div>
                <div class="input__container">
                    <input type="hidden" name="infants" id="infants" value="0">
                    <label class="user-select--none" for="from">Infants (0 - 2)</label>
                    <div class="input-number__container">
                        <span data-operation="minus" data-input=".header-form--active input[name='infants']" data-display-value=".header-form--active #infants-value" class="handle-value icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/minus.svg'); ?></span>
                        <span id="infants-value" class="user-select--none">0</span>
                        <span data-operation="plus" data-input=".header-form--active input[name='infants']" data-display-value=".header-form--active #infants-value" class="handle-value icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/plus.svg'); ?></span>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="header-form__submit">
        <button class="btn btn--submit" type="submit"><?php pll_e('Search'); ?></button>
    </div>
</div>