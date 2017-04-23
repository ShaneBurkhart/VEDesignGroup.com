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
            <div id="map-section" class="section large white">
                <div class="container">
                    <div class="full">
                        <p class="text-center"><?php the_field('form_snippet') ?></p>
                        <?php gravity_form(1, false, false, false, '', false); ?>
                    </div>
                </div>
            </div>
        </main>

        <?php get_footer(); ?>

    </body>
</html>
