<?php
    /**
    * Template Name: Projects List Page
    */

    $max_num_pages = 4;
    $page_num = get_query_var('paged') ? get_query_var('paged') : 1;
    $all_pages = get_posts(array(
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_parent' => get_the_ID(),
        'numberposts' => -1,
        'meta_key' => 'project_position',
        'orderby' => 'meta_value_num',
        'order' => 'ASC'
    ));
    $pages = array_slice($all_pages, ($page_num - 1) * $max_num_pages, $max_num_pages);

    $more_pages = $page_num * $max_num_pages < sizeof($all_pages);

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <?php get_template_part('head'); ?>

    <body <?php body_class(); ?>>

        <?php get_header(); ?>

        <main>
            <div id="projects-list">
                <div class="section white no-padding no-border">
                    <div class="container">
                        <div class="full">
                            <h1 class="text-center uppercase"><?php echo get_the_title(); ?></h1>
                        </div>
                    </div>
                </div>

                <?php
                    $counter = 1;
                    foreach ($pages as $project) {
                        $alt = $counter % 2 == 1;
                        include(locate_template('project-preview-section.php', false, false));
                        //$counter++;
                    }
                ?>


                <?php if ($more_pages || $page_num > 1) { ?>
                    <div class="section white tiny">
                        <div class="container">
                            <div class="full text-center">
                                <span id="next-page-button">
                                    <?php if ($page_num > 1) { ?>
                                        <a class="button dark-gray" href="/projects?paged=<?php echo $page_num - 1; ?>">Previous Projects</a>
                                    <?php } ?>

                                    <?php if ($more_pages) { ?>
                                        <a class="button" href="/projects?paged=<?php echo $page_num + 1; ?>">More Projects</a>
                                    <?php } ?>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </main>

        <?php get_footer(); ?>

    </body>
</html>
