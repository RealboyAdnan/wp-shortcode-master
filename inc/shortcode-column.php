<?php
/* ShortCode Column */
function wpscm_add_shortcode_column($columns) {
    $columns['shortcode'] = 'Shortcode';
    return $columns;
}
add_filter('manage_wp-shortcode-master_posts_columns', 'wpscm_add_shortcode_column');

function wpscm_display_shortcode_column($column, $post_id) {
    if ($column == 'shortcode') {
        //echo '[shortcode id="'.$post_id.'"]';
        echo '<input type="text" onclick="this.select();" readonly="readonly" value="[shortcode id=' . $post_id . ']">';
    }
}
add_action('manage_wp-shortcode-master_posts_custom_column', 'wpscm_display_shortcode_column', 10, 2);

/* Customizing Admin Columns */
add_filter("manage_edit-wp-shortcode-master_columns", "wpscm_shortcode_edit_columns");   

function wpscm_shortcode_edit_columns($columns){  
    $columns = array(  
        "cb" => "<input type=\"checkbox\" />",  
        "title" => "Title", 
        "author" => "Author", 
        "date" => "Date",  
        "shortcode" => "ShortCode",
    );  
    return $columns;  
}
?>