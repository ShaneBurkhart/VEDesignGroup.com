<?php
    /**
    * Template Name: Project Page
    */

    $page_num = get_query_var('paged') ? get_query_var('paged') : 1;
    global $wp_query;
    $wp_query = NULL;
    $wp_query = new WP_Query(array(
        'posts_per_page' => 5,
        'paged' => $page_num,
        'meta_key' => '_wp_page_template',
        'meta_value' => 'template-project.php',
    ));
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <?php get_template_part('head'); ?>

    <body <?php body_class(); ?>>

        <?php get_header(); ?>

        <main>
            <div id="projects-list">
                <div class="section white tiny no-border">
                    <div class="container">
                        <div class="full">
                            <h2 class="text-center"><?php echo get_the_title(); ?></h2>
                        </div>
                    </div>
                </div>

                <?php
                    foreach ($wp_query->posts as $project) {
                        include(locate_template('project-preview-section.php', false, false));
                    }
                ?>

                <div class="section white tiny">
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
