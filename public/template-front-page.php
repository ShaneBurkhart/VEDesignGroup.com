<?php
    /**
    * Template Name: Front Page
    */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <?php get_template_part('head'); ?>

    <body <?php body_class(); ?>>

        <?php get_header(); ?>

        <main>
            <div class="section parallax torn-paper">
                <div
                    class="float"
                    style="background-image: url(<?php the_field('parallax_bg_image'); ?>)"
                ></div>
                <div class="content">
                    <div class="fluid-container">
                        <div class="full">
                            <?php if (get_field('coupon_callout')) { ?>
                                <div class="promo pull-right">
                                    <img src="<?php the_field('hero_promo_image'); ?>">
                                    <?php if (get_field('hero_promo_headline')) { ?>
                                        <h3><?php the_field('hero_promo_headline'); ?></h3>
                                    <?php } ?>
                                    <?php if (get_field('hero_promo_subheading')) { ?>
                                        <p><?php the_field('hero_promo_subheading'); ?></p>
                                    <?php } ?>
                                    <?php if (get_field('hero_promo_button_text')) { ?>
                                        <a href="<?php the_field('hero_promo_button_destination'); ?>" class="button"><?php the_field('hero_promo_button_text'); ?></a>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <div class="jumbotron">
                                <h1><?php the_field('main_headline'); ?></h1>
                                <p><?php the_field('main_subheading'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section tiny white">
                <div class="fluid-container">
                    <div class="full">
                        <h2 class="text-center"><?php the_field('products_section_headline'); ?></h2>
                    </div>
                </div>
                <div class="fluid-container">
                    <?php
                        $products_page = get_pages(array(
                            'meta_key' => '_wp_page_template',
                            'meta_value' => 'template-products.php',
                        ))[0];

                        $pages = get_children(array('post_parent' => $products_page->ID));

                        usort($pages, function ($a, $b) {
                            return strcmp($a->product_group_position, $b->product_group_position);
                        });

                        foreach($pages as $page) {
                    ?>
                        <div class="third">
                            <a class="product-group-thumbnail" href="<?php echo get_permalink($page->ID); ?>">
                                <img src="<?php the_field('homepage_product_group_image', $page->ID); ?>">
                                <h3 class="text-center"><?php echo $page->post_title; ?></h3>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="section no-padding white image">
                <img src="<?php the_field('blog_preview_banner_image') ?>">
                <h2 class="text-center"><?php the_field('blog_preview_heading'); ?></h2>
            </div>
            <div class="section large white micro-padding-top">
                <?php
                    $recipe = new WP_Query(array(
                        'category_name' => 'recipe',
                        'posts_per_page' => 1
                    ));
                    $blogPosts = new WP_Query(array(
                        'category__not_in' => array(get_cat_ID('recipe')),
                        // Get 2 posts since we need an extra if no video.
                        'posts_per_page' => 2,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'post_format',
                                'field' => 'slug',
                                'terms' => array('post-format-video'),
                                'operator' => 'NOT IN',
                            )
                        ),
                    ));
                    $videoPosts = new WP_Query(array(
                        'category__not_in' => array(get_cat_ID('recipe')),
                        'posts_per_page' => 1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'post_format',
                                'field' => 'slug',
                                'terms' => array('post-format-video'),
                                'operator' => 'IN',
                            )
                        ),
                    ));


                    $pages = $recipe->posts;
                    if (sizeof($videoPosts->posts) < 1) {
                        $pages = array_merge($pages, $blogPosts->posts);
                    } else {
                        $pages = array_merge($pages, array($blogPosts->posts[0]), $videoPosts->posts);
                    }

                    include(locate_template('three-page-previews.php', false, false));
                ?>
            </div>
            <div class="section orange">
                <div class="fluid-container">
                    <div class="full text-center">
                        <h2 class="capitalize"><?php the_field('qclub_section_headline'); ?></h2>
                    </div>
                </div>
                <div class="container">
                    <div class="full text-center">
                        <p><?php the_field('qclub_section_description'); ?></p>
                        <a href="/q-club" class="button capitalize"><?php the_field('qclub_section_button_text'); ?></a>
                    </div>
                </div>
            </div>
        </main>

        <?php get_footer(); ?>

    </body>
</html>
