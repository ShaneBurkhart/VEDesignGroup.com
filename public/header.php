<?php
    $site_header_menu = wp_get_nav_menu_items('Main Nav');
    $current_permalink = get_permalink();
?>

<header id="main-nav" class="section no-padding white">
    <div class="large-container">
        <div class="full">
            <a id="site-logo" href="/" style="background-image: url('<?php the_field('site_header_logo', get_option( 'page_on_front' )); ?>')"></a>
            <ul id="desktop-links">
                <?php
                    foreach ($site_header_menu as $item) {
                        $item_class = '';
                        if (trailingslashit($item->url) == get_permalink()) $item_class = 'selected';
                ?>
                        <li><a class="<?php echo $item_class; ?>" href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a></li>
                <?php } ?>
            </ul>
            <ul id="mobile-links">
                <li><a href="jovascript:void();"><i class="fa fa-bars"></i></a></li>
            </ul>
        </div>
    </div>
</header>
<div id="mobile-nav">
    <div class="close">
        <a href="javascript:void();"><i class="fa fa-times"></i></a>
    </div>
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

<script>
    $(document).ready(function () {
        var $mobileDrawer = $('#mobile-nav');
        var $drawerButton = $('#mobile-links li a');
        var $closeButton = $mobileDrawer.find('.close');
        var isOpen = false;

        $drawerButton.click(function (e) {
            e.preventDefault();
            if (isOpen) return;

            $mobileDrawer.css({
                'left': 'auto',
                'right': '0',
            });

            isOpen = true;
        });

        $closeButton.click(function (e) {
            e.preventDefault();
            if (!isOpen) return;

            $mobileDrawer.css({
                'left': '-100%',
                'right': 'auto',
            });

            isOpen = false;
        });
    });
</script>
