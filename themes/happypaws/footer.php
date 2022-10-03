<?php wp_footer(); ?>

<div class="footer-container">
    <div class="footer-content">
        <div class="navigate-footer-menu">
            <div class="footer-menu-title"><strong>Navigate</strong></div>
            <?php

            wp_nav_menu(
                array(
                    'theme_location' => 'navigate-footer-menu'
                )
            );
            ?>
        </div>


        <div class="info-footer-menu">
            <div class="footer-menu-title"><strong>Information</strong></div>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'info-footer-menu'
                )
            );
            ?>
        </div>


        <div class="site-title-navbar">
            <h1><a href="/"><?= get_bloginfo('name'); ?></a></h1>
        </div>
    </div>

</div>

</body>

</html>