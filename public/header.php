<?php
    $site_header_menu = wp_get_nav_menu_items('Main Nav');
    $current_permalink = get_permalink();
?>

<header id="main-nav" class="section no-padding white">
    <div class="large-container">
        <div class="full">
            <a id="site-logo" href="/"></a>
            <ul>
                <?php
                    foreach ($site_header_menu as $item) {
                        $item_class = '';
                        if (trailingslashit($item->url) == get_permalink()) $item_class = 'selected';
                ?>
                        <li><a class="<?php echo $item_class; ?>" href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</header>
