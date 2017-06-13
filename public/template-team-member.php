<?php
    /**
    * Template Name: Team Member Page
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
            <div class="section micro">
                <div class="container">
                    <div class="full">
                        <p>
                            <img src="<?php the_field('team_photo'); ?>">
                        </p>
                    </div>
                </div>
                <div class="small-container">
                    <div class="full">
                        <p class="text-center"><?php the_field('company_snippet'); ?></p>
                    </div>
                </div>
            </div>
            <div class="section tiny light-gray">
                <div class="container">
                    <div class="full">
                        <h2 class="text-center">Partners</h2>
                    </div>
                </div>
                <div class="container">
                    <div class="half text-center team-member">
                        <div class="image circle outline" style="background-image: url('<?php the_field('thumbnail_preview', $page->ID); ?>');"></div>
                        <h4>Michael Burkhart</h4>
                        <p>Job Title<p>
                    </div>
                    <div class="half text-center team-member">
                        <div class="image circle outline" style="background-image: url('<?php the_field('thumbnail_preview', $page->ID); ?>');"></div>
                        <h4>Corry Worthington</h4>
                        <p>Job Title<p>
                    </div>
                </div>
            </div>
            <div class="section white">
                <div class="container">
                    <div class="full">
                        <h2 class="text-center">Our Team</h2>
                    </div>
                </div>
                <div class="large-container">
                    <div class="fouth text-center team-member">
                        <div class="image circle outline" style="background-image: url('<?php the_field('thumbnail_preview', $page->ID); ?>');"></div>
                        <h4>Corry Worthington</h4>
                        <p>Job Title<p>
                    </div>
                    <div class="fouth text-center team-member">
                        <div class="image circle outline" style="background-image: url('<?php the_field('thumbnail_preview', $page->ID); ?>');"></div>
                        <h4>Corry Worthington</h4>
                        <p>Job Title<p>
                    </div>
                    <div class="fouth text-center team-member">
                        <div class="image circle outline" style="background-image: url('<?php the_field('thumbnail_preview', $page->ID); ?>');"></div>
                        <h4>Corry Worthington</h4>
                        <p>Job Title<p>
                    </div>
                    <div class="fouth text-center team-member">
                        <div class="image circle outline" style="background-image: url('<?php the_field('thumbnail_preview', $page->ID); ?>');"></div>
                        <h4>Corry Worthington</h4>
                        <p>Job Title<p>
                    </div>
                </div>
                <div class="large-container">
                    <div class="fouth text-center team-member">
                        <div class="image circle outline" style="background-image: url('<?php the_field('thumbnail_preview', $page->ID); ?>');"></div>
                        <h4>Corry Worthington</h4>
                        <p>Job Title<p>
                    </div>
                    <div class="fouth text-center team-member">
                        <div class="image circle outline" style="background-image: url('<?php the_field('thumbnail_preview', $page->ID); ?>');"></div>
                        <h4>Corry Worthington</h4>
                        <p>Job Title<p>
                    </div>
                    <div class="fouth text-center team-member">
                        <div class="image circle outline" style="background-image: url('<?php the_field('thumbnail_preview', $page->ID); ?>');"></div>
                        <h4>Corry Worthington</h4>
                        <p>Job Title<p>
                    </div>
                    <div class="fouth text-center team-member">
                        <div class="image circle outline" style="background-image: url('<?php the_field('thumbnail_preview', $page->ID); ?>');"></div>
                        <h4>Corry Worthington</h4>
                        <p>Job Title<p>
                    </div>
                </div>
            </div>
        </main>

        <?php get_footer(); ?>

    </body>
</html>
