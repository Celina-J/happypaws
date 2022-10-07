<?php

$args = array(
    'post_type' => 'store_locator',
    'post_status' => 'publish',
    'posts_per_page' => 10
);

?>

<?php

$the_query = new WP_Query($args);

if ($the_query->have_posts()) {

    echo '<div class="stores-container">';

    while ($the_query->have_posts()) {
        $the_query->the_post(); ?>

        <div class="store-card">

            <h3 class="store-card-title">
                <?= get_the_title() ?>
            </h3>

            <div class="store-card-content">
                <?= get_the_content() ?>
            </div>

        </div>
<?php
    }

    echo '</div>';

} 

wp_reset_postdata();
