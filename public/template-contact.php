<?php
    /**
    * Template Name: Contact Page
    */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <?php get_template_part('head'); ?>

    <body id="contact-page" <?php body_class(); ?>>

        <?php get_header(); ?>

        <main>
            <div class="section white no-padding no-border">
                <div class="container">
                    <div class="full">
                        <h1 class="text-center uppercase"><?php echo get_the_title(); ?></h1>
                    </div>
                </div>
            </div>
            <div id="map-section" class="section white small">
                <div class="large-container">
                    <div class="third">
                        <h2><?php the_field('address_headline'); ?></h2>
                        <address>
                            <?php the_field('office_address'); ?>
                        </address>
                    </div>
                    <div class="two-thirds">
                        <div id="map">
                        </div>
                        <script>
                            function initMap() {
                                var uluru = {
                                    lat: <?php echo get_field('office_lat'); ?>,
                                    lng: <?php echo get_field('office_lng'); ?>,
                                };
                                var map = new google.maps.Map(document.getElementById('map'), {
                                    zoom: 15,
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
            <div class="section large light-gray">
                <div class="small-container">
                    <div class="full">
                        <h2 class="text-center"><?php the_field('contact_section_headline'); ?></h2>
                        <p class="text-center"><?php the_field('form_snippet') ?></p>
                        <?php echo do_shortcode('[ninja_form id=1]'); ?>
                    </div>
                </div>
            </div>
        </main>

        <?php get_footer(); ?>

    </body>
</html>
