<?php
    $section_color = 'white';
    if ($alt) $section_color = 'light-gray';
?>
<div class="project section small <?php echo $section_color; ?>">
    <div class="large-container">
        <?php if ($alt) { ?>
            <div class="graphic">
                <img src="<?php the_field('hero_image', $project->ID); ?>">
            </div>
        <?php } ?>
        <div class="description">
            <h2><?php echo $project->post_title; ?></h4>
            <p class="location"><?php the_field('location', $project->ID); ?><p>
            <?php if (get_field('project_snippet', $project->ID)) { ?>
                <p><?php the_field('project_snippet', $project->ID); ?><p>
            <?php } ?>
            <a class="button dark-gray" href="<?php echo get_permalink($project->ID); ?>">View Project</a>
        </div>
        <?php if (!$alt) { ?>
            <div class="graphic">
                <img src="<?php the_field('hero_image', $project->ID); ?>">
            </div>
        <?php } ?>
    </div>
</div>
