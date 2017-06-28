<?php
    /**
    * Template Name: Front Page
    */

    $recentActivityQuery = new WP_Query(array(
        'category_name' => 'recent-activity',
        'posts_per_page' => 3
    ));
    $recentActivity = $recentActivityQuery->posts;

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <?php get_template_part('head'); ?>

    <body <?php body_class(); ?>>

        <?php get_header(); ?>

        <main class="no-padding">
            <div class="hero">
                <div class="bg" style="background-image: url('<?php the_field('hero_background_image'); ?>')"></div>
                <div class="overlay"></div>
                <div class="content">
                    <div class="container">
                        <h1><?php the_field('hero_headline'); ?></h1>
                        <p><?php the_field('hero_sub_headline'); ?></p>
                        <?php if (get_field('hero_button_destination') && get_field('hero_button_text')) { ?>
                            <a class="button green" href="<?php the_field('hero_button_destination'); ?>"><?php the_field('hero_button_text'); ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="large-container">
                    <div class="half divider">
                        <h3><?php the_field('left_header'); ?></h3>
                        <div><?php the_field('left_body'); ?></div>

                        <?php if (get_field('left_button_destination') && get_field('left_button_text')) { ?>
                            <a class="button dark-gray" href="<?php the_field('left_button_destination'); ?>"><?php the_field('left_button_text'); ?></a>
                        <?php } ?>
                    </div>
                    <div class="half divider">
                        <h3><?php the_field('right_header'); ?></h3>
                        <div><?php the_field('right_body'); ?></div>

                        <?php if (get_field('right_button_destination') && get_field('right_button_text')) { ?>
                            <a class="button dark-gray" href="<?php the_field('right_button_destination'); ?>"><?php the_field('right_button_text'); ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php
                $pages = $recentActivity;
                //include(locate_template('recent-activity-section.php', false, false));
            ?>
        </main>

        <?php get_footer(); ?>

    </body>
</html>
