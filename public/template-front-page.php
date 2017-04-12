<?php
    /**
    * Template Name: Front Page
    */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <?php get_template_part('head'); ?>

    <body <?php body_class(); ?>>

        <?php get_header(); ?>

        <main>
            <div class="hero">
                <div class="bg" style="background-image: url('/assets/images/bg.png')">
                <div class="overlay"></div>
                <div class="content">
                    <div class="container">
                        <h1><?php the_field('hero_headline'); ?></h1>
                        <p><?php the_field('hero_sub_headline'); ?></p>
                        <a class="button green" href="<?php the_field('hero_button_destination'); ?>"><?php the_field('hero_button_text'); ?></a>
                    </div>
                </div>
            </div>
        </main>

        <?php get_footer(); ?>

    </body>
</html>
