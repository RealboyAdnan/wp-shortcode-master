<?php
/* Return ShortCode */
function wpscm_shortcode_func( $atts ) {
    $atts = shortcode_atts( array(
        'id' => '',
    ), $atts );
 
    $post_id = $atts['id'];
    $post = get_post( $post_id );
 
    if ( $post ) {
        return apply_filters( 'the_content', $post->post_content );
    }
}
add_shortcode( 'shortcode', 'wpscm_shortcode_func' );
?>