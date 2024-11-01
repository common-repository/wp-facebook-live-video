<?php
// shortcode
function facebook_live_video_past_videos($atts) {

//get global settings    
$options = get_option('wp_facebook_live_video_settings');

//get and declare parameters    
$a = shortcode_atts( array(
            'videos' => '9999',
        ), $atts );    

$maxVideos = $a['videos']; 
 
    
//check is this is user or page we are dealing with    
if($options['facebook_live_video_profile_type'] == "Page"){
    $accessToken = $options['facebook_live_video_extended_access_token']; 
    $pageId = $options['facebook_live_video_page_selection'];      
} else { 
    $accessToken = $options['facebook_live_video_access_token']; 
    $pageId = $options['facebook_live_video_user_id'];  
}  
    
    
//start output    
$html = "";  

//display a hidden div so javascript knows whether to fire or not    
$html .= '<div id="run-facebook-live-video-script" style="display: none !important;"></div>';    

    
    

//if the user doesn't specify a cache expiration make it 24 hours   
if(strlen(isset($options['facebook_live_video_cache_expiration'])) < 1) {
    $cacheExpiration = 24;
} else {
    $cacheExpiration = $options['facebook_live_video_cache_expiration'];
}
    
    
    
    

//name and get the transient    
$transientNamePastVids = 'wpflv_pastvids';
$getTransientPastVids = get_transient($transientNamePastVids);    
  
    //if there's something in the cache set the variable to the transient and give 200 response
    if ($getTransientPastVids != false){
        $pastVids = $getTransientPastVids; 
        $json_responsePastVids = 200;
    } else {    
    
//check to see what videos are available
$json_feedPastVids = wp_remote_get( 'https://graph.facebook.com/v2.8/'.$pageId.'/live_videos?broadcast_status[]=VOD&access_token='.$accessToken );

//set the variable pastVids to be the response and get response       
$pastVids = json_decode($json_feedPastVids['body'], true);
$json_responsePastVids = wp_remote_retrieve_response_code($json_feedPastVids);  

//if the response code is 200 set the transient
if($json_responsePastVids == 200){          
set_transient($transientNamePastVids,$pastVids, $cacheExpiration*60*60);        
}          
        
        
}

        
$videosToHide = explode(",",$options['facebook_live_video_past_video_hide']);    
    
    
     
        //set a counter variable called i
        $i = 0;
        
        //cycle through each video
        foreach ($pastVids['data'] as $videos) {
            
                //while the count is less than the max videos to the loop
                if($i < $maxVideos && in_array($videos['id'],$videosToHide)==0){ 
            

                $videoId = $videos['id'];
                
                    
                    
                    
                //name and get the transient    
                $transientNamePastVideo = 'wpflv_'.$videoId;
                $getTransientPastVideo = get_transient($transientNamePastVideo);      
                    
                
                //if there's something in the cache set the variable to the transient and give 200 response
                if ($getTransientPastVideo != false){
                $video_info = $getTransientPastVideo; 
                $json_responsePastVideo = 200;
                    
                } else {       
                    
                //get heading and video info
                $json_feed_video_info = wp_remote_get( 'https://graph.facebook.com/v2.8/'.$videoId."?fields=live_views,title,description&access_token=".$accessToken );
                    
                //set the variable pastVids to be the response and get response       
		        $video_info = json_decode($json_feed_video_info['body'], true);
                $json_responsePastVideo = wp_remote_retrieve_response_code($json_feed_video_info);     
                
                //if the response code is 200 set the transient
                if($json_responsePastVideo == 200){          
                set_transient($transientNamePastVideo,$video_info, $cacheExpiration*60*60);        
                }      
                    
                }
                    
                    

                $html .= "<h3>".$video_info['description']."</h3>";

                
                
                $embed_html_trim_one = str_replace("<iframe src=\"","",$videos['embed_html']);
                
                $embed_html_trim_two = str_replace("\" width=\"400\" height=\"400\" frameborder=\"0\"></iframe>","",$embed_html_trim_one);
                
                $embed_html_trim_three = str_replace("https://www.facebook.com/video/embed?video_id=","",$embed_html_trim_two);
                                
                
     
         $html .= '<div class="fb-video" data-href="https://www.facebook.com/'.$pageId.'/videos/'.$embed_html_trim_three.'/" data-width="'.$options['facebook_live_video_player_width'].'" data-show-text="false"></div>';
                    
                    
                    
                }
            //add one to i
            $i++;
            
            
        } //end for each video
        
    
    //print the html variable
	return $html;    

}
//add the function as a shortcode
add_shortcode('facebookpastvideo', 'facebook_live_video_past_videos');
?>