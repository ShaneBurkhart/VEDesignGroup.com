<?php
    /**
    * Template Name: Contact Page
    */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <?php get_template_part('head'); ?>

    <body <?php body_class(); ?>>

        <?php get_header(); ?>

        <main>
            <div class="section no-padding white image-with-text">
                <img src="<?php the_field('hero_image') ?>">
                <h2 class="text-center"><?php the_field('headline'); ?></h2>
            </div>
            <div class="section large white micro-padding-top">
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
