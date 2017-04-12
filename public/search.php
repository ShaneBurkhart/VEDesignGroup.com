<?php
    $custom_query_args = array(
        'category__not_in' => array(1),
        's' => get_query_var('s'),
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
    );

    global $wp_query;
    $wp_query = NULL;
    $wp_query = new WP_Query($custom_query_args);
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <?php get_template_part('head'); ?>

    <body <?php body_class(); ?>>

        <?php get_header(); ?>

        <main>
            <div class="section tiny white">
                <div class="container">
                    <div class="full">
                        <h1 class="text-center"><?php the_field('search_results_page_headline', get_option('page_on_front')) ?></h1>
                    </div>
                </div>
            </div>
            <div class="section white micro">
                <div class="container full-mobile">
                    <?php
                        if ( have_posts() ) {
                            while ( have_posts() ) {
                                the_post();
                    ?>
                                <div class="full search-result">
                                    <?php if (get_field('banner_image')) { ?>
                                        <div class="graphic" style="background-image: url(<?php the_field('banner_image'); ?>);"></div>
                                    <?php } ?>
                                    <div class="description">
                                        <h3><a href="<?php echo get_permalink(get_the_ID()); ?>"><?php the_title(); ?></a></h3>
                                    <?php if (get_field('product_description')) { ?>
                                        <p><?php the_field('product_description'); ?></p>
                                    <?php
                                        } else if (get_field('page_description')) {
                                            $matches = array();
                                            $page_desc = get_field('page_description');
                                            preg_match('/(?:<p>|^)(.+?)(?:<p\/>|<\/p>|$)/', $page_desc, $matches);
                                    ?>

                                        <p><?php echo $matches[1]; ?></p>
                                    <?php } else { ?>
                                        <?php the_excerpt(); ?>
                                    <?php } ?>
                                    </div>
                                </div>
                    <?php
                            }
                        } else {

                        }
                    ?>
                    <div class="full text-center pagination-nav">
                        <?php
                            $previousLink = previous_posts_link('Previous');
                            if ($previousLink) { echo $previousLink; }

                            $nextLink = next_posts_link('More Results', $wp_query->max_num_pages);
                            if ($nextLink) { echo $nextLink; }
                        ?>
                    </div>
                </div>
            </div>

            <div class="section white tiny">
                <div class="container-fluid">
                </div>
            </div>
        </main>

        <?php get_footer(); ?>

    </body>
</html>
