<?php

function product_page_relationship($args, $field, $post) {
    $args['post_type'] = 'page';
    $args['meta_key'] = '_wp_page_template';
    $args['meta_value'] = 'template-product.php';

    return $args;
}

add_filter('acf/fields/relationship/query/name=related_products', 'product_page_relationship', 10, 3);

add_theme_support('post-formats', array('video'));

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="button"';
}

// We don't need a read more link.
function new_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function custom_validation( $result, $value, $form, $field ) {
    if (!$value[0] ||  !$value[1]) {
        $result['is_valid'] = false;
    } else {
        $result['is_valid'] = true;
    }
    return $result;
}
add_filter('gform_field_validation_2_10', 'custom_validation', 10, 4);
?>
