<?php

/**
 * Template Name: Transfer
 */
get_header();
$cars_args = array(
    'post_type' => 'cars',
    'post_status' => 'publish',
    'posts_per_page' => -1,
);

$adults = intval($_POST['adults']) ?? 2;
$children = intval($_POST['children']) ?? 0;
$infants = intval($_POST['infants']) ?? 0;
$total_passengers = $adults + $children + $infants;

$cars_args['meta_query'] = array(
    'relation'      => 'AND',
    array(
        'key'       => 'persons',
        'value'     => $total_passengers,
        'type'      => 'NUMERIC',
        'compare'   => '>='
    )
);

$query = new WP_Query($cars_args);
?>
<?php get_template_part('template-parts/page-header'); ?>
<div class="archive-content__container container">
    <?php get_template_part('template-parts/transfer-filters'); ?>

    <?php if ($query->have_posts()) : ?>
        <section class="archive-content">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <?php
                $pricelist = get_field('pricelist');
                $category = get_the_terms(get_the_ID(), 'car-categories')
                ?>
                <div class="section-content__car archive-car">
                    <a href="javascript:void(0);" aria-label="Select this car"></a>
                    <?php get_template_part('template-parts/car-card'); ?>
                    <?php foreach ($pricelist as $post) : setup_postdata($post); ?>
                        <?php if (have_rows('prices_periods')) : ?>
                            <?php while (have_rows('prices_periods')) : the_row(); ?>
                                <?php
                                $date_from = get_sub_field('period_from');
                                $date_from_obj = DateTime::createFromFormat('d/m/Y', $date_from);
                                $date_from_timestamp = $date_from_obj->getTimestamp();

                                $date_to = get_sub_field('period_to');
                                $date_to_obj = DateTime::createFromFormat('d/m/Y', $date_to);
                                $date_to_timestamp = $date_to_obj->getTimestamp();

                                $input_date = $_POST['date'];
                                $input_date_obj = DateTime::createFromFormat('d F, Y', $input_date);
                                $input_date_timestamp = $input_date_obj->getTimestamp();
                                ?>
                                <?php if ($input_date_timestamp >= $date_from_timestamp && $input_date_timestamp <= $date_to_timestamp) : ?>
                                    <div class="car-price">
                                        <?php if (have_rows('prices')) : ?>
                                            <?php while (have_rows('prices')) : the_row(); ?>
                                                <?php $stop = get_sub_field('stop2'); ?>
                                                <?php if (isset($_POST['to']) && !empty($_POST['to']) && $stop->post_title === $_POST['to']) : ?>
                                                    <?php $price = strtolower($category[0]->name . '_price'); ?>
                                                    <div class="price">
                                                        <p><span class="selected-price"><?php the_sub_field($price); ?></span>&euro;</p>
                                                        <small><?php pll_e('Includes fuels & all taxes'); ?></small>
                                                    </div>
                                                    <div class="book-car">
                                                        <a href="javascript:void(0);"><?php pll_e('Book this car'); ?></a>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </section>
    <?php endif; ?>

</div>

<?php get_footer(); ?>