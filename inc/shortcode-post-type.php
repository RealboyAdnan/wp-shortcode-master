<?php
/* Register ShortCode */
function wpscm_create_custom_post_type() {
    register_post_type( 'wp-shortcode-master',
        array(
            'labels' => array(
                'name' => _x('ShortCodes', 'wpscm'),
                'all_items' => _x('All ShortCodes', 'wpscm'),
                'singular_name' => _x('Add New ShortCode', 'wpscm'),
                'add_new' => _x('Add New ShortCode', 'wpscm'),
                'add_new_item' => __('Add New ShortCode', 'wpscm'),
                'edit_item' => __('Edit ShortCode', 'wpscm'),
                'new_item' => __('Add New ShortCode', 'wpscm'),
                'view_item' => __('View ShortCode', 'wpscm'),
                'search_items' => __('Search shortcodes', 'wpscm'),
                'not_found' =>  __('No shortcodes found!', 'wpscm'),
                'not_found_in_trash' => __('No shortcodes found in trash!', 'wpscm'), 
            ),
            'public' => false,
            'publicly_queryable' => false,
            'show_ui' => true, 
            'query_var' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'capability_type' => 'post',
            'supports' => array('title','editor'),
            'rewrite' => array('slug' => 'custom-shortcode'),
            'menu_icon' => 'dashicons-editor-code',
        )
    );
}
add_action( 'init', 'wpscm_create_custom_post_type' );
?>
