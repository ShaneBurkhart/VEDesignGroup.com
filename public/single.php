<?php
    the_post();
    $is_recipe = in_category('recipe');
    $init_pages = $pages;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <?php get_template_part('head'); ?>

    <body <?php body_class(); ?>>

        <?php get_header(); ?>

        <main>
            <div class="section no-padding white page-nav">
                <div class="fluid-container">
                    <?php if ($is_recipe) { ?>
                        <p><a href="/recipes"><i class="fa fa-arrow-left"></i> Recipes</a></p>
                    <?php } else { ?>
                        <p><a href="/blog"><i class="fa fa-arrow-left"></i> Blog</a></p>
                    <?php } ?>
                </div>
            </div>

            <?php if (!$is_recipe) { ?>
                <div class="section no-padding white post-image-section" style="background-image: url(<?php the_field('banner_image') ?>);"></div>
                <div class="section tiny white">
                    <div class="container">
                        <div class="two-thirds blog-post">
                            <h1 class="post-title"><?php echo get_the_title(); ?></h1>
                            <?php the_content(); ?>
                        </div>
                        <div class="third blog-side-bar">
                            <ul id="blog-share-links">
                                <?php
                                    $url_encoded = urlencode(get_permalink());
                                    $tweet_text = urlencode(get_the_title() . " - " . get_permalink());
                                ?>
                                <li><a href="http://pinterest.com/pin/create/link/?url=<?php echo $url_encoded; ?>" class="fa fa-pinterest" target="_blank"></a></li>
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url_encoded; ?>" class="fa fa-facebook" target="_blank"></a></li>
                                <li><a href="https://twitter.com/intent/tweet?text=<?php echo $tweet_text; ?>" class="fa fa-twitter" target="_blank"></a></li>
                            </ul>
                            <h3>Subscribe To Q'Club</h3>
                            <p>Get the latest straight to your inbox. Sign up today.</p>
                            <?php gravity_form(4, false, false, false, '', false); ?>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div id="recipe-container" class="section no-padding white">
                    <div class="full-container">
                        <div class="graphic background" style="background-image: url(<?php the_field('banner_image'); ?>);"></div>
                        <div class="description">
                            <h1 class="post-title"><?php echo get_the_title(); ?></h1>
                            <ul id="blog-share-links">
                                <li id="print-button"><a class="button yellow" href="javascript: window.print()">Print Recipe</a></li>
                                <?php
                                    $url_encoded = urlencode(get_permalink());
                                    $tweet_text = urlencode(get_the_title() . " - " . get_permalink());
                                ?>
                                <li><a href="http://pinterest.com/pin/create/link/?url=<?php echo $url_encoded; ?>" class="fa fa-pinterest" target="_blank"></a></li>
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url_encoded; ?>" class="fa fa-facebook" target="_blank"></a></li>
                                <li><a href="https://twitter.com/intent/tweet?text=<?php echo $tweet_text; ?>" class="fa fa-twitter" target="_blank"></a></li>
                            </ul>
                            <ul class="recipe-meta">
                                <li>
                                    <span class="bold">Difficulty</span>
                                    <?php if (get_field('recipe_difficulty') == 1) { ?>
                                        <i class="fa fa-circle"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    <?php } else if (get_field('recipe_difficulty') == 2) { ?>
                                        <i class="fa fa-circle"></i>
                                        <i class="fa fa-circle"></i>
                                        <i class="fa fa-circle-o"></i>
                                    <?php } else { ?>
                                        <i class="fa fa-circle"></i>
                                        <i class="fa fa-circle"></i>
                                        <i class="fa fa-circle"></i>
                                    <?php } ?>
                                </li>
                                <?php if (get_field('recipe_serving_size')) { ?>
                                    <li>
                                        <span class="bold">Serving Size</span>
                                        <?php the_field('recipe_serving_size'); ?>
                                    </li>
                                <?php } ?>
                            </ul>
                            <hr>
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if ($is_recipe) { ?>
                <div class="section white small">
                    <div class="micro-container">
                        <div class="full">
                            <h2 class="capitalize text-center">You'll Dig These Recipes, Too.</h2>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="section micro-padding-top white">
                <?php
                    $args = array(
                        'posts_per_page' => 3,
                        'exclude' => get_the_ID()
                    );

                    if ($is_recipe) {
                        $args['category_name'] = 'recipe';
                    } else {
                        $args['category__not_in'] = array(get_cat_ID('recipe'));
                    }

                    $pages = get_posts($args);

                    include(locate_template('three-page-previews.php', false, false));
                ?>
            </div>

            <?php include(locate_template('newsletter-signup-section.php', false, false)); ?>

            <?php if ($is_recipe) { ?>
                <?php $pages = $init_pages; ?>
                <div id="section-to-print">
                    <div id="recipe-container" class="section no-padding white">
                        <div class="full-container">
                            <div class="description">
                                <h1 class="post-title"><?php echo get_the_title(); ?></h1>
                                <ul id="blog-share-links">
                                    <?php
                                        $url_encoded = urlencode(get_permalink());
                                        $tweet_text = urlencode(get_the_title() . " - " . get_permalink());
                                    ?>
                                    <li><a href="http://pinterest.com/pin/create/link/?url=<?php echo $url_encoded; ?>" class="fa fa-pinterest" target="_blank"></a></li>
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url_encoded; ?>" class="fa fa-facebook" target="_blank"></a></li>
                                    <li><a href="https://twitter.com/intent/tweet?text=<?php echo $tweet_text; ?>" class="fa fa-twitter" target="_blank"></a></li>
                                </ul>
                                <ul class="recipe-meta">
                                    <li>
                                        <span class="bold">Difficulty</span>
                                        <?php if (get_field('recipe_difficulty') == 1) { ?>
                                            <i class="fa fa-circle"></i>
                                            <i class="fa fa-circle-o"></i>
                                            <i class="fa fa-circle-o"></i>
                                        <?php } else if (get_field('recipe_difficulty') == 2) { ?>
                                            <i class="fa fa-circle"></i>
                                            <i class="fa fa-circle"></i>
                                            <i class="fa fa-circle-o"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-circle"></i>
                                            <i class="fa fa-circle"></i>
                                            <i class="fa fa-circle"></i>
                                        <?php } ?>
                                    </li>
                                    <?php if (get_field('recipe_serving_size')) { ?>
                                        <li>
                                            <span class="bold">Serving Size</span>
                                            <?php the_field('recipe_serving_size'); ?>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <hr>
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </main>

        <?php get_footer(); ?>

        <div id="social-images">
            <img src="<?php the_field('banner_image') ?>">
        </div>
    </body>
</html>
