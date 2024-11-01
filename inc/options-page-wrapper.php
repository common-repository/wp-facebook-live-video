<?php 

$options = get_option('wp_facebook_live_video_settings');

?>


<div class="notice notice-warning">
        <p><?php _e( "ATTENTION: RECENTLY MY FACEBOOK DEVELOPMENT ACCOUNT WAS SUSPENDED WITHOUT WARNING OR REASON BY FACEBOOK. I HAVE FIRMLY PETITIONED AND PROTESTED AGAINST THIS ACTION BY FACEBOOK BECAUSE MY ONLY APP WITH THEM WHICH IS USED SOLEY FOR THE DEVELOPMENT AND SUPPORT OF THIS WORDPRESS PLUGIN HAS ONLY BEEN USED FOR PURPOSES THAT ARE IN THE INTEREST OF BOTH THE WORDPRESS AND FACEBOOK COMMUNITY. THERE HAS NEVER BEEN ANY MALICE OR ILL-INTENT ON MY PART AND I AM SHOCKED AND VERY ANGRY BY FACEBOOK'S DECISION WHICH THEY HAVE GIVEN NO REASON FOR. 

BECAUSE OF THIS I CAN NO LONGER DEVELOP THIS PLUGIN ANY MORE OR PROVIDE SUPPORT BECAUSE I CAN NO LONGER TEST THE PLUGIN. EVERY PART OF ME WANTS TO KEEP WORKING ON THIS PLUGIN AND SUPPORT THE COMMUNITY BUT DUE TO FACEBOOK'S ACTIONS I CAN'T UNFORTUNATELY DO THIS. I WOULD ASK YOU TO WRITE TO THEM ABOUT THIS SO I CAN REGAIN ACCESS, BUT WHO ON EARTH WOULD YOU TALK TO? THE ORGANISATION HAS NO SOUL, IT'S NOT RAN BY REAL PEOPLE, THERE'S NOT ACTUALLY ANY REAL PEOPLE YOU CAN TALK TO - TRY AND FIND AN EMAIL OR PHONE NUMBER FOR THEM! WITH THAT SAID THE PLUGIN SHOULD STILL HOPEFULLY WORK BUT AS I SAID, DON'T EXPECT ANY SUPPORT OR UPDATES.", 'facebook-live-video-admin-notice' ); ?></p>
    </div>



    <div class="wrap">
        
    
        
        <!-- start options -->
        <div id="icon-options-general" class="icon32"></div>
        <h1><?php esc_attr_e( 'Facebook Live Video Options', 'wp_admin_style' ); ?></h1>
        <div id="poststuff">
            <div id="post-body" class="metabox-holder columns-2">
                <!-- main content -->
                <div id="post-body-content">
                    <form name="facebook_live_video_settings_form" id="facebook_live_video_settings_form" method="post" action="">
                        <input type="hidden" name="wp_facebook_live_video_settings_form_submitted" value="Y">
                        
                        <?php 
                        require('options-page-main-settings.php'); 
                        
                        ?>
                        
                    </form>
<?php require('options-page-help.php'); ?>
                </div>
                <?php 
               require('options-page-sidebar.php'); 
                ?>
                    <!-- #postbox-container-1 .postbox-container -->
            </div>
            <!-- #post-body .metabox-holder .columns-2 -->
            <br class="clear">
        </div>
        <!-- #poststuff -->
    </div>
    <!-- .wrap -->