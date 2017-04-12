<?php
    $products_page = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'template-products.php',
    ))[0];

    $pages = get_children(array('post_parent' => $products_page->ID));

    usort($pages, function ($a, $b) {
        return strcmp($a->product_group_position, $b->product_group_position);
    });
?>

<header class="section no-padding">
    <div class="fluid-container">
        <div class="full">
            <a id="site-logo" href="/"></a>
            <ul>
                <?php
                    $site_header_menu = wp_get_nav_menu_items('Site Navigation');
                    foreach ($site_header_menu as $item) {
                        if ($item->title == "Products") {
                ?>
                            <li>
                                <a href="<?php echo $item->url; ?>">Products</a>
                                <ul class="drop-down-items">
                                    <?php
                                        foreach($pages as $page) {
                                    ?>
                                            <li><a href="<?php echo get_permalink($page->ID); ?>">
                                                <?php echo $page->post_title; ?>
                                            </a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } else if ($item->title == "Blog") { ?>
                            <li><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><?php echo $item->title; ?></a></li>
                        <?php } else { ?>
                            <li><a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a></li>
                        <?php } ?>
                <?php } ?>
                <li id="desktop-search-button"><a href="javascript:void(0)"><i class="fa fa-search"></i></a></li>
                <li id="mobile-drawer-button" class="mobile-drawer"><a href="javascript:void(0)"><i class=" fa fa-bars"></i></a></li>
            </ul>
            <div class="mobile-nav-drawer">
                <div class="search-section">
                    <form action="/" method="GET">
                        <div class="input-container">
                            <input name="s">
                            <button class="fa fa-search"></button>
                        </div>
                        <button type="button" id="mobile-drawer-close-button" class="circle-arrow fa fa-arrow-right"></button>
                    </form>
                </div>
                <ul>
                    <?php
                        foreach ($site_header_menu as $item) {
                            if ($item->title == "Products") {
                    ?>
                                <li>
                                    <a href="<?php echo $item->url; ?>">Products</a>
                                    <ul class="drop-down-items">
                                        <?php
                                            foreach($pages as $page) {
                                        ?>
                                                <li><a href="<?php echo get_permalink($page->ID); ?>">
                                                    <?php echo $page->post_title; ?>
                                                </a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } else if ($item->title == "Blog") { ?>
                                <li><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><?php echo $item->title; ?></a></li>
                            <?php } else { ?>
                                <li><a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a></li>
                            <?php } ?>
                    <?php } ?>
                </ul>
            </div>
            <a class="button pull-right capitalize" href="/store-locator">
                <i class="fa fa-map-marker"></i><span>Store Locator</span>
            </a>
        </div>
    </div>
</header>
<div id="desktop-search-overlay">
    <a href="javascript:void(0)" id="exit-button" class="fa fa-times"></a>
    <form action="/" method="GET">
        <input name="s" type="text" placeholder="Start searching">
        <button class="fa fa-search"></button>
    </form>
</div>
