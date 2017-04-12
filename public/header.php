<?php
    $site_header_menu = wp_get_nav_menu_items('Main Nav');
?>

<header id="main-nav" class="section no-padding">
    <div class="large-container">
        <div class="full">
            <a id="site-logo" href="/"></a>
            <ul>
                <?php foreach ($site_header_menu as $item) { ?>
                    <li><a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</header>
