<?php
get_header();
$gallery = get_field('gallery');
$video = get_field('video');
?>

<div class="single-tours-intro">
    <?php if (has_post_thumbnail()) : ?>
        <img src="<?= the_post_thumbnail_url('large') ?>" alt="<?php the_title(); ?>">
    <?php endif; ?>
    <div class="single-tours-intro__buttons container">
        <a href="javascript:void(0);" id="open-gallery" class="btn btn--primary">
            <span class="icon icon--large"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/camera.svg'); ?></span>
            <?php pll_e('View Photos'); ?>
        </a>
        <a id="open-video" href="javascript:void(0);" class="btn btn--secondary">
            <span class="icon icon--large"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/video.svg'); ?></span>
            <?php pll_e('Video'); ?>
        </a>
    </div>
    <div class="single-tours-gallery">
        <?php foreach ($gallery as $image) : ?>
            <a class="lightboxed" rel="group1" href="<?= esc_url($image['url']); ?>">
                <img src="<?= esc_url($image['sizes']['medium']) ?>" alt="">
            </a>
        <?php endforeach; ?>
    </div>
    <div class="single-tours-video">
        <?php
        // Use preg_match to find iframe src.
        preg_match('/src="(.+?)"/', $video, $matches);
        $src = $matches[1];

        // Add extra parameters to src and replace HTML.
        $params = array(
            'controls'  => 0,
            'hd'        => 1,
            'autohide'  => 1
        );
        $new_src = add_query_arg($params, $src);
        $video = str_replace($src, $new_src, $video);

        // Add extra attributes to iframe HTML.
        $attributes = 'frameborder="0"';
        $video = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $video);

        // Display customized HTML.
        echo $video;
        ?>
        <div id="close-video" class="overlay"></div>
    </div>
</div>
<div class="single-tours-header__container">
    <div class="single-tours-header container">
        <div class="single-tours-title__container">
            <h1 class="single-tours-title"><?php the_title(); ?></h1>
        </div>
        <div class="single-tours-nav__container">
            <ul class="single-tours-nav">
                <li class="single-tours-nav__item single-tours-nav__item--active">
                    <a href="#description"><?php pll_e('Tour Description'); ?></a>
                </li>
                <li class="single-tours-nav__item">
                    <a href="#itinerary"><?php pll_e('Itinerary'); ?></a>
                </li>
                <li class="single-tours-nav__item">
                    <a href="#map"><?php pll_e('Map'); ?></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="single-tours-content__container container">
    <section class="single-tours-content">
        <div class="section-tours section-tours__tour-description" id="tour-description">
            <div class="section-header__container">
                <h2 class="section-header"><?php pll_e('Tour Description'); ?></h2>
            </div>
            <div class="section-content">
                <?php the_content(); ?>
            </div>
        </div>
        <?php if (have_rows('tour_includes')) : ?>
            <div class="section-tours section-tours__includes" id="includes">
                <div class="section-header__container">
                    <h2 class="section-header"><?php pll_e('Includes'); ?></h2>
                </div>
                <div class="section-content">
                    <ul class="ul--row">
                        <?php while (have_rows('tour_includes')) : the_row(); ?>
                            <li>
                                <span class="icon icon--small">
                                    <?= file_get_contents(get_stylesheet_directory() . '/assets/images/check.svg') ?>
                                </span>
                                <?php the_sub_field('title'); ?>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
        <?php if (have_rows('tour_excludes')) : ?>
            <div class="section-tours section-tours__excludes" id="excludes">
                <div class="section-header__container">
                    <h2 class="section-header"><?php pll_e('Excludes'); ?></h2>
                </div>
                <div class="section-content">
                    <ul class="ul--row">
                        <?php while (have_rows('tour_excludes')) : the_row(); ?>
                            <li>
                                <span class="icon icon--small">
                                    <?= file_get_contents(get_stylesheet_directory() . '/assets/images/xmark.svg') ?>
                                </span>
                                <?php the_sub_field('title'); ?>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
        <?php if (have_rows('itinerary')) : ?>
            <div class="section-tours section-tours__itinerary" id="itinerary">
                <div class="section-header__container">
                    <h2 class="section-header"><?php pll_e('Itinerary'); ?></h2>
                </div>
                <div class="section-content">
                    <ul>
                        <?php while (have_rows('itinerary')) : the_row(); ?>
                            <li><span class="indicator"><?= get_row_index() ?></span><?php the_sub_field('text'); ?></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    </section>
    <aside class="single-tours-sidebar">
        <div class="book-header">
            <div class="section-header__container">
                <h2 class="section-header"><?php pll_e('Book this tour'); ?></h2>
            </div>
            <div class="section-content">
                <div class="book-date-picker__container">
                    <label for="tour-date"><?php pll_e('Choose your date') ?></label>
                    <input type="text" name="tour-date" class="tour-date">
                </div>
                <div class="book-input-group">
                    <div class="book-input-buttons__container">
                        <input type="hidden" name="adults" id="adults" value="2">
                        <label class="user-select--none" for="from">Adults</label>
                        <div class="input-number__container">
                            <span data-operation="minus" data-input="input[name='adults']" data-display-value="#adults-value" class="handle-value icon icon--medium minus-adults"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/minus.svg'); ?></span>
                            <span id="adults-value" class="user-select--none">2</span>
                            <span data-operation="plus" data-input="input[name='adults']" data-display-value="#adults-value" class="handle-value icon icon--medium add-adults"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/plus.svg'); ?></span>
                        </div>
                    </div>
                    <div class="book-input-buttons__container">
                        <input type="hidden" name="children" id="children" value="0">
                        <label class="user-select--none" for="from">Children</label>
                        <div class="input-number__container">
                            <span data-operation="minus" data-input="input[name='children']" data-display-value="#children-value" class="minus-children handle-value handle-value--disabled icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/minus.svg'); ?></span>
                            <span id="children-value" class="user-select--none">0</span>
                            <span data-operation="plus" data-input="input[name='children']" data-display-value="#children-value" class="add-children handle-value icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/plus.svg'); ?></span>
                        </div>
                    </div>
                    <div class="book-input-buttons__container">
                        <input type="hidden" name="infants" id="infants" value="0">
                        <label class="user-select--none" for="from">Infants</label>
                        <div class="input-number__container">
                            <span data-operation="minus" data-input="input[name='infants']" data-display-value="#infants-value" class="minus-infants handle-value handle-value--disabled icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/minus.svg'); ?></span>
                            <span id="infants-value" class="user-select--none">0</span>
                            <span data-operation="plus" data-input="input[name='infants']" data-display-value="#infants-value" class="add-infants handle-value icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/plus.svg'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <a id="check-prices" class="btn btn--tertiary" href="javascript:void(0);"><?php pll_e('Check prices') ?></a>
        </div>
        <?php if (have_rows('cars')) : ?>
            <div class="book-cars section--inactive">
                <div class="section-header__container">
                    <h2 class="section-header"><?php pll_e('Select your car'); ?></h2>
                </div>
                <div class="section-content">
                    <?php while (have_rows('cars')) : the_row(); ?>
                        <?php $car = get_sub_field('car'); ?>
                        <div class="section-content__car">
                            <a href="javascript:void(0);" aria-label="Select this car"></a>
                            <?php foreach ($car as $post) : setup_postdata($post); ?>
                                <?php get_template_part('template-parts/car-card'); ?>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                            <div class="car-price">
                                <div class="price">
                                    <p><span class="selected-price"><?php the_sub_field('price'); ?></span>&euro;</p>
                                    <small><?php pll_e('Includes fuels & all taxes'); ?></small>
                                </div>
                                <div class="select-car">
                                    <a href="javascript:void(0);"><?php pll_e('Select this car'); ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="book-extras section--inactive">
            <div class="section-header__container">
                <h2 class="section-header"><?php pll_e('Add Extras'); ?></h2>
            </div>
            <div class="book-input-group__extras">
                <div class="book-input-buttons__container">
                    <input type="hidden" name="extra-hours" id="extra-hours" value="0">
                    <label class="user-select--none" for="from">Extra Hours<br><small>30&euro;/<?php pll_e('hour') ?></small></label>
                    <div class="input-number__container">
                        <span data-operation="minus" id="minus-extra-hours" data-input="input[name='extra-hours']" data-display-value="#extra-hours-value" class="handle-value handle-value--disabled icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/minus.svg'); ?></span>
                        <span id="extra-hours-value" class="user-select--none">0</span>
                        <span data-operation="plus" id="add-extra-hours" data-input="input[name='extra-hours']" data-display-value="#extra-hours-value" class="handle-value icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/plus.svg'); ?></span>
                    </div>
                </div>
                <div class="book-input-buttons__container">
                    <label for="tour-guide"><?php pll_e('Need a tour guide'); ?><br><small>170&euro;</small></label>
                    <input type="checkbox" name="tour-guide" id="tour-guide">
                </div>
                <div class="book-input-buttons__container">
                    <input type="hidden" name="baby-cot" id="baby-cot" value="0">
                    <label class="user-select--none" for="from">Baby Cot<br><small><?php pll_e('Free of charge') ?></small></label>
                    <div class="input-number__container">
                        <span data-operation="minus" data-input="input[name='baby-cot']" data-display-value="#baby-cot-value" class="handle-value handle-value--disabled icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/minus.svg'); ?></span>
                        <span id="baby-cot-value" class="user-select--none">0</span>
                        <span data-operation="plus" data-input="input[name='baby-cot']" data-display-value="#baby-cot-value" class="handle-value icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/plus.svg'); ?></span>
                    </div>
                </div>
                <div class="book-input-buttons__container">
                    <input type="hidden" name="booster" id="booster" value="0">
                    <label class="user-select--none" for="from">Booster<br><small><?php pll_e('Free of charge') ?></small></label>
                    <div class="input-number__container">
                        <span data-operation="minus" data-input="input[name='booster']" data-display-value="#booster-value" class="handle-value handle-value--disabled icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/minus.svg'); ?></span>
                        <span id="booster-value" class="user-select--none">0</span>
                        <span data-operation="plus" data-input="input[name='booster']" data-display-value="#booster-value" class="handle-value icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/plus.svg'); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="total-price section--inactive">
            <p><?php pll_e('Total Price'); ?> <span id="price"></span>&euro;</p>
            <a class="open-form" href="javascript:void(0);"><?php pll_e('Book Now') ?></a>
        </div>
        <div class="book-form section--inactive">
            <div class="section-header__container">
                <h2 class="section-header"><?php pll_e('Personal Details'); ?></h2>
            </div>
            <div class="form__container">
                <?= do_shortcode('[contact-form-7 id="183" title="Single tour form"]') ?>
            </div>
        </div>
    </aside>
</div>
<?php get_footer(); ?>