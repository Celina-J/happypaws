<div class="homepage_block2-container">
    <div class="top_homepage_block2">

        <div class="left_b2_text"><?php echo get_field('left_b2_text') ?></div>

        <?php
        if (get_field('right_b2_image')) {
            $image_id = get_field('right_b2_image')['id'];
            echo wp_get_attachment_image($image_id, 'full');
        }
        ?>

    </div>
    <div class="bottom_homepage_block2">

        <?php
        if (get_field('left_b2_image')) {
            $image_id = get_field('left_b2_image')['id'];
            echo wp_get_attachment_image($image_id, 'full');
        }
        ?>
        <div class="right_b2_text"><?php echo get_field('right_b2_text') ?></div>

    </div>
</div>