<?php
    /**
    * Template Name: Projects List Page
    */

    $max_num_pages = 5;
    $page_num = get_query_var('paged') ? get_query_var('paged') : 1;
    $pages = array_slice(get_children(array(
        'post_status' => 'publish',
        'post_parent' => get_the_ID(),
        'numberposts' => -1,
    )), ($page_num - 1) * $max_num_pages);

    $more_pages = $page_num * $max_num_pages < sizeof($pages);

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <?php get_template_part('head'); ?>

    <body <?php body_class(); ?>>

        <?php get_header(); ?>

        <main class="padding">
            <div id="projects-list">
                <div class="section white no-padding no-border">
                    <div class="container">
                        <div class="full">
                            <h1 class="text-center uppercase"><?php echo get_the_title(); ?></h2>
                        </div>
                    </div>
                </div>

                <?php
                    $counter = 0;
                    foreach ($pages as $project) {
                        $alt = $counter % 2 == 1;
                        include(locate_template('project-preview-section.php', false, false));
                        $counter++;
                    }
                ?>


                <?php if ($more_pages) { ?>
                    <div class="section white tiny">
                        <div class="container">
                            <div class="full text-center">
                                <span id="next-page-button">
                                        <a class="button" href="/projects?paged=<?php echo $page_num + 1; ?>">More Projects</a>
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
