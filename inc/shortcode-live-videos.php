<?php
// shortcode
function facebook_live_video_live_videos() {

    return facebook_live_video_video_display();

}
add_shortcode('facebooklivevideo', 'facebook_live_video_live_videos');
?>