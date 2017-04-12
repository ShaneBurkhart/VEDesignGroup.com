<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <?php get_template_part('head'); ?>

    <body <?php body_class(); ?>>

        <?php get_header(); ?>

        <main>
            <div class="section tiny">
                <div class="container">
                    <div class="graphic">
                        <img src="<?php the_field('banner_image', get_option('page_for_posts')) ?>">
                    </div>
                    <div class="description">
                        <h2><?php the_field('page_heading', get_option('page_for_posts')); ?></h2>
                        <p><?php the_field('page_description', get_option('page_for_posts')); ?></h2>
                    </div>
                </div>
            </div>
            <?php
                $categoryQuery = $_GET['category'];
                $categories = get_categories();
                $categories = array_filter($categories, 'remove_recipes');

                $page_num = get_query_var('paged') ? get_query_var('paged') : 1;
                $offset = 9 * ($page_num - 1);
                $args = array(
                    'posts_per_page' => -1
                );

                if ($categoryQuery) {
                    if ($categoryQuery == "articles") {
                        $args['category__not_in'] = array(get_cat_ID('recipe'), get_cat_ID('infographics'));
                        $args['tax_query'] = array(
                            array(
                                'taxonomy' => 'post_format',
                                'field' => 'slug',
                                'terms' => array('post-format-video'),
                                'operator' => 'NOT IN',
                            )
                        );
                    } else if ($categoryQuery == "videos") {
                        $args['category__not_in'] = array(get_cat_ID('recipe'));
                        $args['tax_query'] = array(
                            array(
                                'taxonomy' => 'post_format',
                                'field' => 'slug',
                                'terms' => array('post-format-video'),
                                'operator' => 'IN',
                            )
                        );
                    } else if ($categoryQuery == "infographics") {
                        $args['category_name'] = 'infographics';
                        $args['tax_query'] = array(
                            array(
                                'taxonomy' => 'post_format',
                                'field' => 'slug',
                                'terms' => array('post-format-video'),
                                'operator' => 'NOT IN',
                            )
                        );
                    } else {
                        $args['category__not_in'] = array(get_cat_ID('recipe'));
                    }
                } else {
                    $args['category__not_in'] = array(get_cat_ID('recipe'));
                }

                $all_pages = get_posts($args);
                $posts_on_page = array_slice($all_pages, $offset, 9);

                function remove_recipes($var) {
                    return $var->name != 'Recipe';
                }
            ?>
            <div class="section white no-padding">
                <div class="container">
                    <div class="full text-right">
                        <div class="select_wrapper fixed">
                            <select id="category-select">
                                <option disabled <?php if (!$categoryQuery) echo 'selected'; ?>>Filter by Category</option>
                                <option value="">All Categories</option>
                                <option <?php if ($categoryQuery == 'articles') echo 'selected'; ?> value="articles">Articles</option>
                                <option <?php if ($categoryQuery == 'videos') echo 'selected'; ?> value="videos">Videos</option>
                                <option <?php if ($categoryQuery == 'infographics') echo 'selected'; ?> value="infographics">Infographics</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div id="posts-list">
                <div class="section white micro">
                    <?php
                        $no_overlay = true;
                        $pages = array_slice($posts_on_page, 0, 3);
                        include(locate_template('three-page-previews.php', false, false));
                    ?>
                </div>

                <div class="section white micro">
                    <?php
                        $no_overlay = true;
                        $pages = array_slice($posts_on_page, 3, 3);
                        include(locate_template('three-page-previews.php', false, false));
                    ?>
                </div>

                <div class="section white micro">
                    <?php
                        $no_overlay = true;
                        $pages = array_slice($posts_on_page, 6, 3);
                        include(locate_template('three-page-previews.php', false, false));
                    ?>
                </div>

                <div class="section white micro nav">
                    <div class="container-fluid">
                        <div class="full text-center">
                            <span id="next-page-button">
                                <?php
                                    if (sizeof($all_pages) > $offset + 9) {
                                ?>
                                        <a class="button" href="/blog/page/<?php echo $page_num + 1; ?>">More Posts</a>
                                <?php } ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <?php include(locate_template('newsletter-signup-section.php', false, false)); ?>
        </main>

        <?php get_footer(); ?>

    </body>
</html>
