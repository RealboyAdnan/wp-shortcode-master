<?php
/* ShortCode Inserter */
function wpscm_add_shortcode_inserter_button() {
    global $pagenow, $post_type;
    $post_type = isset($_GET['post_type']) ? $_GET['post_type'] : 'post';
    if ( ($pagenow == 'post.php' || $pagenow == 'post-new.php') && ($post_type === 'post' || $post_type === 'page' || in_array($post_type, get_post_types())) ) {
        add_action( 'media_buttons', 'wpscm_shortcode_inserter_button', 20 );
    }
}

/* ShortCode Data */
function wpscm_shortcode_inserter_button() {
    // Global Variable //
    global $softclever;

    // ShortCode List //
    echo '<a href="#" id="shortcode-inserter-button" class="button" title="Insert Shortcode"><span class="wp-media-buttons-icon dashicons-before dashicons-editor-code"></span> Shortcode</a>';
    echo '<div id="shortcode-select" style="display: none;">';
    echo '<input type="text" id="shortcode-search" placeholder="Search Shortcodes">';
    echo '<select id="shortcode-options">';
    $shortcode_posts = get_posts(array('post_type' => 'wp-shortcode-master', 'posts_per_page' => $softclever['shortcode-list-count']));
    foreach ($shortcode_posts as $shortcode_post) {
        echo '<option value="[shortcode id=' . $shortcode_post->ID . ']">' . $shortcode_post->post_title . '</option>';
    }
    echo '</select><input type="button" id="shortcode-insert-button" class="button" value="Insert Code"></div>';

    // ShortCode Search //
    echo "
    <script>
    jQuery(document).ready(function($) {
        $('#shortcode-inserter-button').click(function() {
            $('#shortcode-select').toggle();
            $('#shortcode-search').val(''); // Clear search field on toggle
            $('#shortcode-options option').show(); // Show all options on toggle
        });
    
        $('#shortcode-insert-button').click(function() {
            var shortcode = $('#shortcode-options').val();
            wp.media.editor.insert(shortcode);
        });

        $('#shortcode-search').on('input', function() {
            var query = $(this).val().toLowerCase();
            $('#shortcode-options option').each(function() {
                var title = $(this).text().toLowerCase();
                if (title.includes(query)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
    </script>
    ";
}

/* Add ShortCode */
add_action( 'admin_init', 'wpscm_add_shortcode_inserter_button' );
?>