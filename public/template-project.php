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

    $project_bullets = array();
    if (sizeof(get_field('project_details_bullets'))) {
        $project_bullets = explode("\n", get_field('project_details_bullets'));
    }
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <?php get_template_part('head'); ?>

    <body <?php body_class(); ?>>

        <?php get_header(); ?>

        <main>
            <div id="project">
                <div class="section no-padding">
                    <div class="small-container">
                        <div class="full">
                            <h1 class="text-center uppercase"><?php echo get_the_title(); ?></h1>
                            <p class="text-center location"><?php the_field('location'); ?></p>
                        </div>
                    </div>
                    <div class="container">
                        <div class="full">
                            <img src="<?php the_field('hero_image'); ?>">
                        </div>
                    </div>
                    <div class="small-container">
                        <div class="full">
                            <?php if (get_field('project_snippet', $project->ID)) { ?>
                                <p class="text-center"><?php the_field('project_snippet'); ?></p>
                            <?php } ?>


                        </div>
                    </div>
                    <div class="container">
                        <div class="full">
                            <ul class="project-bullets">
                                <div class="column">
                                    <?php $column = false; ?>
                                    <?php foreach ($project_bullets as $i => $bullet) { ?>

                                        <?php if (sizeof($project_bullets) % 2 == 1) { ?>
                                            <li><?php echo $bullet; ?></li>
                                        <?php } ?>

                                        <?php if (!$column && $i >= floor(sizeof($project_bullets) / 2)) { ?>
                                            <?php $column = true; ?>
                                            </div>
                                            <div class="column">
                                        <?php } ?>

                                        <?php if (sizeof($project_bullets) % 2 == 0) { ?>
                                            <li><?php echo $bullet; ?></li>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </ul>


                            <?php if(get_field('google_maps_lat') && get_field('google_maps_lng')) { ?>,
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
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php get_footer(); ?>

    </body>
</html>
