<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <meta name="google-site-verification" content="4cCQlp4kMHcWW-SsImgMX4GCu276orC70GokFz-I_C4" />

    <link href="https://fonts.googleapis.com/css?family=Cantarell:400,700|Fjalla+One" rel="stylesheet">
    <link href="/wp-content/themes/public/style.css" rel="stylesheet">

    <script
      src="https://code.jquery.com/jquery-2.2.4.min.js"
      integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
      crossorigin="anonymous"></script>

    <?php if (get_the_ID() == get_option( 'page_on_front' )) { ?>
        <title>VE Design Group | Design Management Firm</title>
    <?php } else { ?>
        <title><?php echo get_the_title() . " | VE Design Group"; ?></title>
    <?php } ?>

    <?php wp_head(); ?>
</head>
