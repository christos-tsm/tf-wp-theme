<?php
$stops_args = array(
    'post_type' => 'stops',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order' => 'asc'
);
$stops_query = new WP_Query($stops_args);
?>
<aside class="archive-filters__container">
    <form action="POST" class="archive-filters">
        <div class="input__container">
            <label for="from">From</label>
            <select name="from" id="from" title="Pick up from">
                <option value="chania-airport">Chania Airport</option>
            </select>
        </div>
        <div class="seperator"></div>
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
        <div class="seperator"></div>
        <div class="input__container">
            <label for="from">Date</label>
            <input type="text" name="date" class="transfer-date" title="Pick up date">
        </div>
        <div class="seperator"></div>
        <div class="input__group">
            <div class="input__container">
                <input type="hidden" name="adults" id="adults" value="2">
                <label class="user-select--none" for="from">Adults <span class="text--small">(13+)</span></label>
                <div class="input-number__container">
                    <span data-operation="minus" data-input="input[name='adults']" data-display-value="#adults-value" class="handle-value icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/minus.svg'); ?></span>
                    <span id="adults-value" class="user-select--none">2</span>
                    <span data-operation="plus" data-input="input[name='adults']" data-display-value="#adults-value" class="handle-value icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/plus.svg'); ?></span>
                </div>
            </div>
            <div class="input__container">
                <input type="hidden" name="children" id="children" value="0">
                <label class="user-select--none" for="from">Children <span class="text--small">(3 - 12)</span></label>
                <div class="input-number__container">
                    <span data-operation="minus" data-input="input[name='children']" data-display-value="#children-value" class="handle-value handle-value--disabled icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/minus.svg'); ?></span>
                    <span id="children-value" class="user-select--none">0</span>
                    <span data-operation="plus" data-input="input[name='children']" data-display-value="#children-value" class="handle-value icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/plus.svg'); ?></span>
                </div>
            </div>
            <div class="input__container">
                <input type="hidden" name="infants" id="infants" value="0">
                <label class="user-select--none" for="from">Infants <span class="text--small">(0 - 2)</span></label>
                <div class="input-number__container">
                    <span data-operation="minus" data-input="input[name='infants']" data-display-value="#infants-value" class="handle-value handle-value--disabled icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/minus.svg'); ?></span>
                    <span id="infants-value" class="user-select--none">0</span>
                    <span data-operation="plus" data-input="input[name='infants']" data-display-value="#infants-value" class="handle-value icon icon--medium"><?= file_get_contents(get_stylesheet_directory() . '/assets/images/plus.svg'); ?></span>
                </div>
            </div>
        </div>
        <div class="seperator"></div>
        <div class="return__container">
            <label class="switch">
                Return
                <input type="checkbox">
                <span class="slider round"></span>
            </label>
        </div>
        <button class="btn--submit">Search</button>
    </form>
</aside>