<?php

function facebook_live_video_video_display() {

    
$options = get_option('wp_facebook_live_video_settings'); 

//check is this is user or page we are dealing with    
if($options['facebook_live_video_profile_type'] == "Page"){
    $accessToken = $options['facebook_live_video_extended_access_token']; 
    $pageId = $options['facebook_live_video_page_selection'];      
} else { 
    $accessToken = $options['facebook_live_video_access_token']; 
    $pageId = $options['facebook_live_video_user_id'];  
}    
    
$html = "";  
//display a hidden div so javascript knows whether to fire or not
$html .= '<div id="run-facebook-live-video-script" style="display: none !important;"></div>';

    
// {@see https://codex.wordpress.org/HTTP_API}
$json_feed = wp_remote_get( 'https://graph.facebook.com/v2.8/'.$pageId.'/live_videos?broadcast_status[]=LIVE&access_token='.$accessToken );
    



if ( ! is_wp_error( $json_feed ) ) {
	// The request went through successfully, check the response code against
	// what we're expecting
    
    
	if ( 200 == wp_remote_retrieve_response_code( $json_feed ) ) {
       
		// Do something with the response
                
		$jsondata = json_decode($json_feed['body'], true);

       
        
        
        // display custom message if there's no videos
        if(empty($jsondata['data'])) {
            $html .= html_entity_decode(stripslashes($options['facebook_live_video_no_live_video']));
        }
        
        
        
        

        
        $videosToHideLive = explode(",",$options['facebook_live_video_live_video_hide']);    
        
        $i = 0;
        
        
        foreach ($jsondata['data'] as $videos) {
                
                //if there's a live video but we don't want to display it show the no live video message
                if($i == 0 && in_array($videos['id'],$videosToHideLive)){
                  $html .= html_entity_decode(stripslashes($options['facebook_live_video_no_live_video']));  
                }    
            
                
                if($i == 0 && in_array($videos['id'],$videosToHideLive)==0){ 
            

                $videoId = $videos['id'];
                                    
                //ge heading and video info
                $json_feed_video_info = wp_remote_get( 'https://graph.facebook.com/v2.8/'.$videoId."?fields=live_views,title,description&access_token=".$accessToken );
                    
                    

		$video_info = json_decode($json_feed_video_info['body'], true);
                
                $html .= "<h2>".$video_info['description']."</h2>";

                
                
                $embed_html_trim_one = str_replace("<iframe src=\"","",$videos['embed_html']);
                
                $embed_html_trim_two = str_replace("\" width=\"400\" height=\"400\" frameborder=\"0\"></iframe>","",$embed_html_trim_one);
                
                $embed_html_trim_three = str_replace("https://www.facebook.com/video/embed?video_id=","",$embed_html_trim_two);
                                
            
                    
     
         $html .= '<div class="fb-video" data-href="https://www.facebook.com/'.$pageId.'/videos/'.$embed_html_trim_three.'/" data-width="'.$options['facebook_live_video_player_width'].'" data-show-text="false"></div>';
                    
                    
                    
                }
            $i++;
            
            
        } //end for each video
        
        

        
//comments section        

    if(isset($videoId)){   
        
    
    if($options['facebook_live_video_show_comments'] == "Yes"  ) {    
        
    $html .= '<br></br><br></br><div id="facebook-live-comments" class="facebook-live-comments"><h3>Live Comments <i class="fa fa-comments-o" aria-hidden="true"></i></h3>';
    
        
//    $html .= '<textarea rows="4" name="facebook_live_video_comment" id="facebook_live_video_comment"></textarea>';    
//    
//        
//    $html .= '<fb:login-button scope="publish_actions" onlogin="checkLoginState();" id="facebookCommentLoginButton">Login to Comment</fb:login-button>';    
//        
//    $html .= '<input id="facebook_live_video_comment_submit" type="submit" value="Submit Comment" data="'.$embed_html_trim_three; 
//        
//    $html .= '<p id="commentSuccessMessage"><i class="fa fa-check" aria-hidden="true"></i> Comment Submitted</p>';    
//        
//    $html .= '<p id="commentFailureMessage"><i class="fa fa-times" aria-hidden="true"></i> Please ensure you are logged in.</p>';     
        
    
    $html .= '<ul>';
         
        
    $html .= '</ul></div>'; 
        
        
    $html .= 'Make a comment on <a target="_blank" href="https://www.facebook.com/'.$pageId.'">Facebook</a>.';
    
    }
        
    }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
		// $headers = wp_remote_retrieve_headers( $response );
	} else {
		// The response code was not what we were expecting, record the message
		$error_message = wp_remote_retrieve_response_message( $json_feed );
        	}
} else {
	// There was an error making the request
	$error_message = $json_feed->get_error_message();
}    
    
    
    
    
    
    
	return $html;
}


?>