<?php
/* Include Styles */
function wpscm_enqueue_prism_scripts() {
    wp_enqueue_style( 'wpscm-style', plugin_dir_url( __FILE__ ) . '../assets/style.css', array(), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'wpscm_enqueue_prism_scripts' );
?>