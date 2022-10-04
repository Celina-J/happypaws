<?php
get_header();

if (have_posts()) : ?>
    <div class="container">
        <div class="news-container">
            <?php while (have_posts()) : the_post(); ?>
                <div class="news-card">
                    <div>
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium') ?></a>
                    </div>
                    <div>

                        <h3 class="news-title"><a href="<?= the_permalink(); ?>"><strong><?php the_title() ?></strong></a></h3>

                    </div>
                    <div>
                        <?php the_excerpt(); ?>
                    </div>
                    <div>
                        <a href="<?php the_permalink(); ?>">Read more</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php
else :
    _e('Sorry, no posts matched your criteria.', 'textdomain');
endif;

get_footer();
?>