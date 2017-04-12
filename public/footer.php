<footer class="section small dark-gray">
    <ul class="social-buttons-group">
        <li><a href="https://www.facebook.com/Twistd-Q-Seasonings-141077326384362/"><i class="fa fa-facebook-f"></i></a></li>
    </ul>
    <div class="fluid-container">
        <div class="full">
            <a id="site-logo" href="/"></a>
        </div>
    </div>
    <div class="fluid-container">
        <div class="fifth">
            <p>Twist’d Q is a premium line of rubs, seasonings and sauces that have been created from the handcrafted, competition-tested recipes of BBQ pitmaster champions. Get unbeatable BBQ with a side of rave reviews.</p>
        </div>
        <div class="fifth">
            <p class="capitalize"><a href="/products">Products</a></p>
            <?php
                $footer_products = wp_get_nav_menu_items('Footer Products');
                foreach ($footer_products as $item) {
            ?>
                <p class="normal-casing"><a href="<?php echo $item->url; ?>"><?php echo strtolower($item->title); ?></a></p>
            <?php } ?>
        </div>
        <div class="fifth">
            <?php
                $footer_items = wp_get_nav_menu_items('Footer Middle Menu');
                foreach ($footer_items as $item) {
            ?>
                <p class="capitalize"><a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a></p>
            <?php } ?>
        </div>
        <div class="fifth">
            <?php
                $footer_items = wp_get_nav_menu_items('Footer Right Menu');
                foreach ($footer_items as $item) {
            ?>
                <p class="capitalize"><a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a></p>
            <?php } ?>
        </div>
    </div>
</footer>

<script src="/wp-content/themes/custom/assets/js/site-header.js"></script>
<script src="/wp-content/themes/custom/assets/js/misc.js"></script>

<?php wp_footer(); ?>
