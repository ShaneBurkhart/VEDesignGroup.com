<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link href="/wp-content/themes/custom/style.css" rel="stylesheet">

    <script
      src="https://code.jquery.com/jquery-2.2.4.min.js"
      integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
      crossorigin="anonymous"></script>
    <script src="/wp-content/themes/custom/assets/js/handlebars-v4.0.5.js"></script>

    <meta name="og:image" content="<?php the_field('banner_image'); ?>">

    <title><?php
        if (in_category('recipe', get_the_ID())) {
            echo wp_title('', false)." Recipes";
        } else {
            echo wp_title('', false);
        }
    ?></title>

    <?php wp_head(); ?>
</head>
