<?php
    /**
    * Template Name: Project Page
    */

    $project_tag_id = get_field('project_tag');
    $recentActivity = array();
    if ($project_tag_id) {
        $recentActivityQuery = new WP_Query(array(
            'category_name' => 'recent-activity',
            'posts_per_page' => 3,
            'tag_id' => get_field('project_tag'),
        ));
        $recentActivity = $recentActivityQuery->posts;
    }

    $page_num = get_query_var('paged') ? get_query_var('paged') : 1;
    global $wp_query;
    $wp_query = NULL;
    $wp_query = new WP_Query(array(
        'posts_per_page' => 5,
        'paged' => $page_num,
        'meta_key' => '_wp_page_template',
        'meta_value' => 'template-project.php',
    ));

    $project_bullets = array();
    if (sizeof(get_field('project_details_bullets'))) {
        $project_bullets = explode("\n", get_field('project_details_bullets'));
    }
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <?php get_template_part('head'); ?>

    <body <?php body_class(); ?>>

        <?php get_header(); ?>

        <main class="no-padding">
            <div id="project">
                <div class="hero">
                    <div class="bg" style="background-image: url('<?php the_field('hero_image'); ?>')"></div>
                </div>
                <div class="section">
                    <div class="small-container">
                        <div class="full">
                            <h1 class="text-center uppercase"><?php echo get_the_title(); ?></h1>
                            <p class="text-center location"><?php the_field('location'); ?></p>
                            <p class="text-center"><?php the_field('project_snippet'); ?></p>


                        </div>
                    </div>
                    <div class="container">
                        <div class="full">
                            <ul class="project-bullets">
                                <div class="column">
                                    <?php $column = false; ?>
                                    <?php foreach ($project_bullets as $i => $bullet) { ?>
                                        <?php if (!$column && $i >= floor(sizeof($project_bullets) / 2)) { ?>
                                            <?php $column = true; ?>
                                            </div>
                                            <div class="column">
                                        <?php } ?>

                                        <li><?php echo $bullet; ?></li>
                                    <?php } ?>
                                </div>
                            </ul>

                            <div id="project-map">
                            </div>

                            <script>
                                function initMap() {
                                    var uluru = {
                                        lat: <?php echo get_field('google_maps_lat'); ?>,
                                        lng: <?php echo get_field('google_maps_lng'); ?>,
                                    };
                                    var map = new google.maps.Map(document.getElementById('project-map'), {
                                        zoom: 12,
                                        center: uluru,
                                        scrollwheel: false,
                                    });
                                    var marker = new google.maps.Marker({
                                        position: uluru,
                                        map: map
                                    });
                                }
                            </script>

                            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzto5QywRpPqZ3Lu8X6xq4lz8lqT3VJNs&callback=initMap"></script>
                        </div>
                    </div>
                </div>

                <?php
                    if (sizeof($recentActivity)) {
                        $pages = $recentActivity;
                        include(locate_template('recent-activity-section.php', false, false));
                    }
                ?>

            </div>
        </main>

        <?php get_footer(); ?>

    </body>
</html>
