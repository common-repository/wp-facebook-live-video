<?php
/*
*		Plugin Name: WP Facebook Live Video
*		Plugin URI: https://www.northernbeacheswebsites.com.au
*		Description: Show live video on your Wordpress website. 
*		Version: 5.2
*		Author: Martin Gibson
*		Author URI:  https://www.northernbeacheswebsites.com.au
*		Text Domain: wp-facebook-live-video   
*		Support: https://www.northernbeacheswebsites.com.au/contact
*		Licence: GPL2
*/
// Assign global variables







function facebook_live_video_plugin_get_version() {
	if ( ! function_exists( 'get_plugins' ) )
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	$plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
	$plugin_file = basename( ( __FILE__ ) );
	return $plugin_folder[$plugin_file]['Version'];
}


$options = array();


// Add a link to our plugin in the admin menu under Settings > GoToWebinar
function wp_facebook_live_video_wp_menu() {
    global $facebook_live_video_wp_settings_page;
    $facebook_live_video_wp_settings_page = add_options_page(
        'Facebook Live Video Options',
        'Facebook Live Video',
        'manage_options',
        'facebook-live-video',
        'wp_facebook_live_video_options_page'    
    );
}
add_action('admin_menu','wp_facebook_live_video_wp_menu');



//add a settings link on the plugin page
function facebook_live_video_plugin_add_settings_link( $links ) {
    $settings_link = '<a href="options-general.php?page=facebook-live-video">' . __( 'Settings' ) . '</a>';
    array_unshift( $links, $settings_link );
  	return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'facebook_live_video_plugin_add_settings_link' );


//add custom links to plugin on plugins page
function facebook_live_video_plugin_row_meta( $links, $file ) {
   if ( strpos( $file, 'wp-gotowebinar.php' ) !== false ) {
      $new_links = array(
               '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VGVE97KF74FVN" target="_blank">' . __('Donate') . '</a>',
            );
      $links = array_merge( $links, $new_links );
   }
   return $links;
}
add_filter( 'plugin_row_meta', 'facebook_live_video_plugin_row_meta', 10, 2 );


// Create our main options page
function wp_facebook_live_video_options_page(){
    if(!current_user_can('manage_options')) {
        wp_die('You do not have sufficient permission to access this page.');
    }
    
    
//check if form has been submitted
global $options;
if( isset( $_POST['wp_facebook_live_video_settings_form_submitted'])){
    $hidden_field = esc_html($_POST['wp_facebook_live_video_settings_form_submitted']);
        if( $hidden_field == 'Y') {
            
            $facebook_live_video_access_token = esc_html($_POST['facebook_live_video_access_token']);
            $options['facebook_live_video_access_token'] = $facebook_live_video_access_token;
            
            $facebook_live_video_app_id = esc_html($_POST['facebook_live_video_app_id']);
            $options['facebook_live_video_app_id'] = $facebook_live_video_app_id;
            
            $facebook_live_video_app_secret = esc_html($_POST['facebook_live_video_app_secret']);
            $options['facebook_live_video_app_secret'] = $facebook_live_video_app_secret;
            
            $facebook_live_video_user_id = esc_html($_POST['facebook_live_video_user_id']);
            $options['facebook_live_video_user_id'] = $facebook_live_video_user_id;
            
            $facebook_live_video_page_selection = esc_html($_POST['facebook_live_video_page_selection']);
            $options['facebook_live_video_page_selection'] = $facebook_live_video_page_selection;
            
            $facebook_live_video_extended_access_token = esc_html($_POST['facebook_live_video_extended_access_token']);
            $options['facebook_live_video_extended_access_token'] = $facebook_live_video_extended_access_token;
            
            $facebook_live_video_player_width = esc_html($_POST['facebook_live_video_player_width']);
            $options['facebook_live_video_player_width'] = $facebook_live_video_player_width;
            
            $facebook_live_video_profile_type = esc_html($_POST['facebook_live_video_profile_type']);
            $options['facebook_live_video_profile_type'] = $facebook_live_video_profile_type;
            
            $facebook_live_video_show_comments = esc_html($_POST['facebook_live_video_show_comments']);
            $options['facebook_live_video_show_comments'] = $facebook_live_video_show_comments;
            
            $facebook_live_video_max_comments = esc_html($_POST['facebook_live_video_max_comments']);
            $options['facebook_live_video_max_comments'] = $facebook_live_video_max_comments;
            
            $facebook_live_video_no_live_video = esc_html($_POST['facebook_live_video_no_live_video']);
            $options['facebook_live_video_no_live_video'] = $facebook_live_video_no_live_video;
            
            $facebook_live_video_cache_expiration = esc_html($_POST['facebook_live_video_cache_expiration']);
            $options['facebook_live_video_cache_expiration'] = $facebook_live_video_cache_expiration;
            
            $facebook_live_video_past_video_hide = esc_html($_POST['facebook_live_video_past_video_hide']);
            $options['facebook_live_video_past_video_hide'] = $facebook_live_video_past_video_hide;
            
            $facebook_live_video_live_video_hide = esc_html($_POST['facebook_live_video_live_video_hide']);
            $options['facebook_live_video_live_video_hide'] = $facebook_live_video_live_video_hide;
            
            
            
            
            
            update_option('wp_facebook_live_video_settings', $options);
            
        }
}
    
    
    $options = get_option('wp_facebook_live_video_settings');
    if($options != ''){
        $facebook_live_video_access_token = $options['facebook_live_video_access_token'];
        $facebook_live_video_app_id = $options['facebook_live_video_app_id'];
        $facebook_live_video_app_secret = $options['facebook_live_video_app_secret'];
        $facebook_live_video_user_id = $options['facebook_live_video_user_id'];
        $facebook_live_video_page_selection = $options['facebook_live_video_page_selection'];
        $facebook_live_video_extended_access_token = $options['facebook_live_video_extended_access_token'];
        $facebook_live_video_player_width = $options['facebook_live_video_player_width'];
        $facebook_live_video_profile_type = $options['facebook_live_video_profile_type'];
        $facebook_live_video_show_comments = $options['facebook_live_video_show_comments'];
        $facebook_live_video_max_comments = $options['facebook_live_video_max_comments'];
        $facebook_live_video_no_live_video = $options['facebook_live_video_no_live_video'];
        $facebook_live_video_cache_expiration = $options['facebook_live_video_cache_expiration'];
        $facebook_live_video_past_video_hide = $options['facebook_live_video_past_video_hide'];
        $facebook_live_video_live_video_hide = $options['facebook_live_video_live_video_hide'];
        
        
        
    }
    require('inc/options-page-wrapper.php');
}


// Video display
require('inc/videodisplay.php');

// Add shortcode for live and past videos
require('inc/shortcode-live-videos.php');
require('inc/shortcode-past-videos.php');

// Add widget
require('inc/widget.php');

//clear cache
require('inc/clear-cache.php');



// Load front end style and scripts
function wp_facebook_live_video_register_frontend()
{ 
    $options = get_option('wp_facebook_live_video_settings');

    wp_register_style( 'font-awesome-icons', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
    
    wp_register_script( 'timeago', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-timeago/1.5.3/jquery.timeago.min.js', array( 'jquery' )); 


    wp_enqueue_script('jquery-ui', 'http://code.jquery.com/ui/1.12.1/jquery-ui.min.js', array('jquery'), '1.12.1');

    

    wp_register_style( 'facebook-custom-style', plugins_url( '/inc/style.css', __FILE__ ));
    wp_enqueue_style( array('facebook-custom-style','font-awesome-icons') );
    
    wp_register_script( 'facebook-custom-script', plugins_url( '/inc/script.js', __FILE__ ), array( 'jquery' ),1.0,true);
    
    wp_enqueue_script( array('facebook-custom-script','facebook-script','timeago' ));

    
wp_localize_script( 'facebook-custom-script', 'ajax_object',array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

//    wp_localize_script( 'facebook-custom-script', 'showComments', $options['facebook_live_video_show_comments'] );
//    wp_localize_script( 'facebook-custom-script', 'chosenMaxComments', $options['facebook_live_video_max_comments'] );
    
    
    wp_localize_script( 'facebook-custom-script', 'applicationId', $options['facebook_live_video_app_id'] );

    
    
}
    add_action( 'wp_enqueue_scripts', 'wp_facebook_live_video_register_frontend' );






// Load admin style and scripts
function wp_facebook_live_video_register_admin($hook)
{

    global $facebook_live_video_wp_settings_page;
    if($hook != $facebook_live_video_wp_settings_page)
        return;
    
    
    wp_enqueue_script( 'custom-admin-script', plugins_url( '/inc/adminscript.js', __FILE__ ), array( 'jquery'));
    wp_enqueue_style( 'custom-admin-style', plugins_url( '/inc/adminstyle.css', __FILE__ ));


}
add_action( 'admin_enqueue_scripts', 'wp_facebook_live_video_register_admin' );






















// Get comments
function wp_facebook_live_video_get_comments_callback() {

    
    
    
    $transientName = 'wpflv';
    $getTransient = get_transient($transientName);
    
    if ($getTransient != false){
        $html = $getTransient; 
        $json_response = 200;
    } else {
    
    
    
    
    $options = get_option('wp_facebook_live_video_settings');
    
if($options['facebook_live_video_profile_type'] == "Page"){
    $accessToken = $options['facebook_live_video_extended_access_token']; 
        $pageId = $options['facebook_live_video_page_selection'];      

} else { 
    $accessToken = $options['facebook_live_video_access_token']; 
        $pageId = $options['facebook_live_video_user_id'];  

}    
    
  $json_feed = wp_remote_get( 'https://graph.facebook.com/v2.8/'.$pageId.'/live_videos?broadcast_status[]=LIVE&access_token='.$accessToken );  
    
    
  $jsondata = json_decode($json_feed['body'], true); 
  $json_response = wp_remote_retrieve_response_code($json_feed);  
        
    
   $i = 0; 
    foreach ($jsondata['data'] as $videos) {
    if($i == 0){ 
        
    $videoId = $videos['id'];
    }
     $i++;   
     }    
  

    $json_feed_video_comments = wp_remote_get( 'https://graph.facebook.com/v2.8/'.$videoId."/comments?order=reverse_chronological&access_token=".$accessToken );


        $video_comments = json_decode($json_feed_video_comments['body'], true);
        
        
        $html = ""; 
        
        
        
        
        
        
        
        
        
        
        
        
        
        $commentCounter = 0;
        
        foreach ($video_comments['data'] as $video_comment) {
        
            
            
        
        $commentersID = $video_comment[from][id];
            
            
        
            
    $transientName_commentImage = 'wpflv'.$commentersID;
    $getTransient_commentImage = get_transient($transientName_commentImage);
    
    if ($getTransient_commentImage != false){
        $profilePictureImageURL = $getTransient_commentImage; 
        $json_response_commentImage = 200;
    } else {   
            
            
            
            
            
            
            
            
            
            
            
            
            
        $profilePicture = wp_remote_get( 'https://graph.facebook.com/v2.8/'.$commentersID.'/picture?redirect=false' );
            
        $profilePictureFeed = json_decode($profilePicture['body'], true);
            
            
            
        $json_response_commentImage = wp_remote_retrieve_response_code($profilePicture);  
        $profilePictureImageURL = $profilePictureFeed[data][url];
            
            
            
           //        set the transient
        if($json_response_commentImage == 200){    
        
    set_transient($transientName_commentImage,$profilePictureImageURL, 2592000);  
        
    }  
        
        
        
    } //end transient 
            
            
            
            

            
            
            $html .= '<li>
            
            <a class="facebook-live-image" href="https://facebook.com/'.$commentersID.'" target="_blank"><img src="'.$profilePictureImageURL.'" height="50" width="50"></a>
            
            <span style="display: inline-block; vertical-align: top;"><span class="facebook-live-comment">'.$video_comment[message].'</span><span class="facebook-live-name"><i class="fa fa-user" aria-hidden="true"></i> '.$video_comment[from][name].'</span><span class="facebook-live-time"><i class="fa fa-clock-o" aria-hidden="true"></i>
            
            <time class="timeago" datetime="'.$video_comment[created_time].'" title="'.$video_comment[created_time].'">'.$video_comment[created_time].'</time>
            
            </span></span>
            </li>';
            
            
            
            
            
            
            
            
           
            if(++$commentCounter == $options['facebook_live_video_max_comments']) break;
            
        }
        
        
        
        
//        set the transient
        if($json_response == 200){    
        
    set_transient($transientName,$html, 10);  
        
    }  
        
        
        
    } //end transient
        
       var_dump($html);

    
    
    wp_die(); // this is required to terminate immediately and return a proper response


 
    
} //end get comments
add_action( 'wp_ajax_wp_facebook_live_video_get_comments', 'wp_facebook_live_video_get_comments_callback' );
add_action( 'wp_ajax_nopriv_wp_facebook_live_video_get_comments', 'wp_facebook_live_video_get_comments_callback' );





?>