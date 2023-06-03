<?php
/* Code Preview */
function wpscm_code_shortcode( $atts, $content = null ) {
    global $softclever;
    $copy = "Copy";
    $copied = "Copied";
    $language = isset( $atts['lang'] ) ? $atts['lang'] : 'plaintext';
    $highlighted_code = '<div class="wpscm-code ' . strtolower($language) . '"><pre><code class="' . esc_attr( $language ) . '">' . htmlentities( $content ) . '</code></pre></div>';
    $code = '<div class="wpscm-code-section"><span class="wpscm-lang-name-' . strtolower($language) . '">' . strtoupper( $language ) . '</span> <span class="wpscm-copy-button" onclick="copyCode(this)">'.$copy.'</span></div>' . $highlighted_code;
    $code .= '<script>
        jQuery(document).ready(function() { jQuery("pre code").click(function() { window.getSelection().selectAllChildren(this); }); });
        function copyCode(button) {
            var codeElement = button.parentNode.nextElementSibling.querySelector("code");
            var codeText = codeElement.textContent;
            var tempTextarea = document.createElement("textarea");
            tempTextarea.textContent = codeText;
            document.body.appendChild(tempTextarea);
            tempTextarea.select();
            document.execCommand("copy");
            document.body.removeChild(tempTextarea);
            button.textContent = "'.$copied.'";
            setTimeout(function() {
                button.textContent = "'.$copy.'";
            }, 2000);
        }
    </script>';
    return $code;
}

/* Remove String */
function wpscm_remove_wpautop_for_code_shortcode() {
    remove_filter( 'the_content', 'wpautop' );
    remove_filter( 'the_excerpt', 'wpautop' );
}
add_shortcode( 'code', 'wpscm_code_shortcode' );
add_action( 'init', 'wpscm_remove_wpautop_for_code_shortcode' );


/* Keep String */
function wpscm_modify_wpautop_for_code_shortcode( $content ) {
    if ( has_shortcode( $content, 'code' ) ) {
        return $content;
    } else {
        return wpautop( $content );
    }
}
add_filter( 'the_content', 'wpscm_modify_wpautop_for_code_shortcode' );
add_filter( 'the_excerpt', 'wpscm_modify_wpautop_for_code_shortcode' );
?>