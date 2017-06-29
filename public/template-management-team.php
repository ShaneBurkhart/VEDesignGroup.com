<?php
    /**
    * Template Name: Management Team Page
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
            <div class="section small white">
                <div class="large-container">
                    <div class="full text-center">
                        <div class="thumbnail-preview">
                            <h4>Mike Burkhart</h4>
                            <p>Business Manager<p>
                        </div>
                        <div class="thumbnail-preview">
                            <h4>Corry Worthington</h4>
                            <p>Principal Engineer<p>
                        </div>
                        <div class="thumbnail-preview">
                            <h4>Ron Ireland</h4>
                            <p>Principal Architect<p>
                        </div>
                        <div class="thumbnail-preview">
                            <h4>Chris Burkhart</h4>
                            <p>Project Manager<p>
                        </div>
                        <div class="thumbnail-preview">
                            <h4>Brandon Cotter</h4>
                            <p>Project Engineer<p>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php get_footer(); ?>

    </body>
</html>
