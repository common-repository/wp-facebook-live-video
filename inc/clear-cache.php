<?php

//Ajax call to clear the cache
function facebook_live_video_clear_cache_javascript() { ?>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#facebook_live_video_clear_cache').click(function (event) {
                event.preventDefault();
                $('.notice-success').remove();
                var data = {
                    'action': 'clear_cache_facebook_live_video',
                };
                jQuery.post(ajaxurl, data, function (response) {
                    $('<div class="notice notice-success"><p>The cache was cleared successfully.</p></div>').insertAfter('#facebook_live_video_clear_cache');
                });
            });
        });
    </script>
    <?php
}
add_action( 'admin_footer', 'facebook_live_video_clear_cache_javascript' ); 


//Function to run upon ajax request
function facebook_live_video_clear_cache_callback() {
	global $wpdb; 
    $sql = "DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_wpflv%' or option_name like '_transient_timeout_wpflv%'";
    $wpdb->query($sql);
    	wp_die();     
}
add_action( 'wp_ajax_clear_cache_facebook_live_video', 'facebook_live_video_clear_cache_callback' );



?>