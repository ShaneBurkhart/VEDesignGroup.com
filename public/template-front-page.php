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
                        <h3>What we do differently.</h3>
                        <p>Sed dignissim urna feugiat dolor consectetur porta. Morbi eget tincidunt augue. Suspendisse aliquet tellus a arcu ornare condimentum.</p>
                        <p>Maecenas ut eros massa. Cras fringilla porta turpis eget sagittis. Etiam a convallis risus. Etiam ac urna non augue sagittis tristique vel at augue.</p>
                    </div>
                    <div class="half divider">
                        <h3>Interested in working with us?</h3>
                        <p>Nam libero eros, congue eget fringilla a, luctus nec felis. Suspendisse potenti. In tempus suscipit nulla ut commodo.</p>
                        <a class="button dark-gray">Contact Us</a>
                    </div>
                </div>
            </div>
            <div class="section tiny light-gray">
                <div class="large-container">
                    <div class="full">
                        <h2 class="text-center">Recent Activity</h2>
                    </div>
                </div>
                <div class="large-container">
                    <div class="third activity-preview">
                        <div class="image circle outline" style="background-image: url('');"></div>
                        <h4>Cranes erected</h4>
                        <p>Clayton, MO<p>
                    </div>
                    <div class="third activity-preview">
                        <div class="image circle outline" style="background-image: url('');"></div>
                        <h4>Renderings finalized</h4>
                        <p>Columbia, MO<p>
                    </div>
                    <div class="third activity-preview">
                        <div class="image circle outline" style="background-image: url('');"></div>
                        <h4>Installed exterior sheathing</h4>
                        <p>Columbia, MO<p>
                    </div>
                </div>
            </div>
        </main>

        <?php get_footer(); ?>

    </body>
</html>
