<?php
    /**
    * Template Name: Recent Activity Page
    */

    $page_num = get_query_var('paged') ? get_query_var('paged') : 1;
    global $wp_query;
    $wp_query = NULL;
    $wp_query = new WP_Query(array(
        'post_status' => 'publish',
        'category_name' => 'recent-activity',
        'posts_per_page' => 9,
        'paged' => $page_num,
    ));
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <?php get_template_part('head'); ?>

    <body <?php body_class(); ?>>

        <?php get_header(); ?>

        <main>
            <div id="recent-activity-list">
                <div class="section white no-padding no-border">
                    <div class="container">
                        <div class="full">
                            <h1 class="text-center uppercase"><?php echo get_the_title(); ?></h1>
                        </div>
                    </div>
                </div>
                <div class="section white tiny">
                    <?php
                        $pages = array_slice($wp_query->posts, 0, 3);
                        include(locate_template('three-activity-thumbnails.php', false, false));
                    ?>

                    <?php
                        $pages = array_slice($wp_query->posts, 3, 3);
                        include(locate_template('three-activity-thumbnails.php', false, false));
                    ?>

                    <?php
                        $pages = array_slice($wp_query->posts, 6, 3);
                        include(locate_template('three-activity-thumbnails.php', false, false));
                    ?>

                    <div class="container">
                        <div class="full text-center">
                            <span id="next-page-button">
                                <?php
                                    $nextLink = next_posts_link('More Recipes', $wp_query->max_num_pages);
                                    if ($nextLink) { echo $nextLink; }
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php get_footer(); ?>

    </body>
</html>
