<div class="large-container">
    <?php foreach ($pages as $page) { ?>
        <div class="third activity-preview">
            <div class="image circle outline" style="background-image: url('<?php the_field('thumbnail_preview', $page->ID); ?>');"></div>
            <h4><?php echo $page->post_title; ?></h4>
            <p><?php the_field('location', $page->ID); ?><p>
        </div>
    <?php } ?>
</div>
