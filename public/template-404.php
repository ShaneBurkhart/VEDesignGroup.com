<?php
    /**
    * Template Name: 404 Page
    */
    the_post();
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <?php get_template_part('head'); ?>

    <body <?php body_class(); ?>>

        <?php get_header(); ?>

        <main>
            <div class="section small white">
                <div class="small-container">
                    <div class="full">
                        <h2 class="text-center"><?php the_field('headline'); ?></h2>
                        <?php the_content(); ?>
                        <form id="search-form-404" class="text-center" action="/" method="GET">
                            <input name="s" type="text" placeholder="Search our site">
                            <button class="yellow">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <?php get_footer(); ?>

    </body>
</html>
