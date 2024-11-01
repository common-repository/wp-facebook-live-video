<div class="meta-box-sortables ui-sortable">
    <div class="postbox">
        <div class="handlediv" title="Click to toggle">
            <br>
        </div>
        <!-- Toggle -->
        <h2 class="hndle"><span><?php esc_attr_e( 'Authentication Settings', 'wp_admin_style' ); ?></span>
						</h2>
        <div class="inside">

            <table class="form-table">




                <tr valign="top">
                    <td scope="row">
                        <label for="facebook_live_video_profile_type">Facebook Profile Type</label>
                    </td>
                    <td>
                        <select id="facebook_live_video_profile_type" name="facebook_live_video_profile_type">

                            <?php if(isset($facebook_live_video_profile_type)) {} else {$facebook_live_video_profile_type = "Page";} ?>

                                <option value="Page" <?php if( 'Page'==$facebook_live_video_profile_type) echo 'selected="selected"'; ?>>Page</option>
                                <option value="User" <?php if( 'User'==$facebook_live_video_profile_type) echo 'selected="selected"'; ?>>User</option>
                        </select>
                    </td>
                </tr>




                <tr valign="top">
                    <td scope="row">
                        <label for="facebook_live_video_app_id">Facebook App ID</label>
                    </td>
                    <td>
                        <input name="facebook_live_video_app_id" id="facebook_live_video_app_id" type="text" value="<?php if(isset($facebook_live_video_app_id)) { echo esc_attr($facebook_live_video_app_id); } ?>" class="regular-text" />


                    </td>
                </tr>




                <tr valign="top">
                    <td scope="row">
                        <label for="facebook_live_video_app_secret">Facebook App Secret</label>
                    </td>
                    <td>
                        <input name="facebook_live_video_app_secret" id="facebook_live_video_app_secret" type="text" value="<?php if(isset($facebook_live_video_app_secret)) { echo esc_attr($facebook_live_video_app_secret); } ?>" class="regular-text" />


                    </td>
                </tr>





                <tr valign="top">
                    <td scope="row">
                        <label for="facebook_live_connection">Facebook Live Connection</label>
                    </td>
                    <td>




                        <fb:login-button scope="public_profile,email,manage_pages,user_videos" onlogin="checkLoginState();">
                        </fb:login-button>

                        <div id="status" style="display:inline-block;">
                        </div>


                    </td>
                </tr>





                <tr valign="top">
                    <td scope="row">
                        <label for="facebook_live_video_authorization">Facebook Access Token</label>
                    </td>
                    <td>
                        <input name="facebook_live_video_access_token" id="facebook_live_video_access_token" type="password" value="<?php if(isset($facebook_live_video_access_token)) { echo esc_attr($facebook_live_video_access_token); } ?>" class="regular-text" />


                    </td>
                </tr>



                <tr valign="top">
                    <td scope="row">
                        <label for="facebook_live_video_user_id">Facebook User ID</label>
                    </td>
                    <td>
                        <input name="facebook_live_video_user_id" id="facebook_live_video_user_id" type="text" value="<?php if(isset($facebook_live_video_user_id)) { echo esc_attr($facebook_live_video_user_id); } ?>" class="regular-text" />


                    </td>
                </tr>



                <tr class="facebook-page-option" valign="top">
                    <td scope="row">
                        <label for="facebook_live_video_page_selection">Facebook Page Selection</label>
                    </td>
                    <td>
                        <select id="facebook_live_video_page_selection" name="facebook_live_video_page_selection">



                            <?php

// {@see https://codex.wordpress.org/HTTP_API}
$response = wp_remote_get( 'https://graph.facebook.com/v2.3/'.$facebook_live_video_user_id.'/accounts?access_token='.$facebook_live_video_access_token );

if ( ! is_wp_error( $response ) ) {
	// The request went through successfully, check the response code against
	// what we're expecting
	if ( 200 == wp_remote_retrieve_response_code( $response ) ) {
		// Do something with the response
		 $body = wp_remote_retrieve_body( $response );
		// $headers = wp_remote_retrieve_headers( $response );
        
        $jsondata = json_decode($response['body'],true); 
        
	} else {
		// The response code was not what we were expecting, record the message
		$error_message = wp_remote_retrieve_response_message( $response );
	}
} else {
	// There was an error making the request
	$error_message = $response->get_error_message();
}
                
                ?>




                                <?php 

                                                  
foreach($jsondata['data'] as $page){ 
    

echo '<option data="'.$page['access_token'].'" value="'.$page['id'].'" '.  (($page['id']==$facebook_live_video_page_selection)?'selected="selected"':"")   .'>'.$page['name'].'</option>';    
    

} //end for each
                          
?>






                        </select>
                    </td>
                </tr>










                <tr class="facebook-page-option" valign="top">
                    <td scope="row">
                        <label for="facebook_live_video_extended_access_token">Facebook Extended Access Token</label>
                    </td>
                    <td>
                        <input name="facebook_live_video_extended_access_token" id="facebook_live_video_extended_access_token" type="password" value="<?php if(isset($facebook_live_video_extended_access_token)) { echo esc_attr($facebook_live_video_extended_access_token); } ?>" class="regular-text" />


                        <a class="button-secondary extended-access-token">Click here to get Extended Access Token</a>


                    </td>
                </tr>







                <tr valign="top">
                    <td scope="row"></td>
                    <td>
                        <input class="button-primary" type="submit" id="save" name="save" value="Save All Settings" />
                    </td>
                </tr>
            </table>










        </div>
        <!-- .inside -->
    </div>
    <!-- .postbox -->
</div>










<div class="meta-box-sortables ui-sortable">
    <div class="postbox">
        <div class="handlediv" title="Click to toggle">
            <br>
        </div>
        <!-- Toggle -->
        <h2 class="hndle"><span><?php esc_attr_e( 'Video & Player Settings', 'wp_admin_style' ); ?></span>
						</h2>
        <div class="inside">

            <table class="form-table">





                <tr valign="top">
                    <td scope="row">
                        <label for="facebook_live_video_player_width">Player width e.g. 500</label>
                    </td>
                    <td>
                        <input name="facebook_live_video_player_width" id="facebook_live_video_player_width" type="number" value="<?php if(isset($facebook_live_video_player_width)) { echo esc_attr($facebook_live_video_player_width); } ?>" class="regular-text" />


                    </td>
                </tr>




                <tr valign="top">
                    <td scope="row">
                        <label for="facebook_live_video_show_comments">Show Comments</label>
                    </td>
                    <td>
                        <select id="facebook_live_video_show_comments" name="facebook_live_video_show_comments">

                            <?php if(isset($facebook_live_video_show_comments)) {} else {$facebook_live_video_show_comments = "Yes";} ?>


                                <option value="Yes" <?php if( 'Yes'==$facebook_live_video_show_comments) echo 'selected="selected"'; ?>>Yes</option>
                                <option value="No" <?php if( 'No'==$facebook_live_video_show_comments) echo 'selected="selected"'; ?>>No</option>
                        </select>
                    </td>
                </tr>

                <tr valign="top" class="facebook-comment-option">
                    <td scope="row">
                        <label for="facebook_live_video_max_comments">Maximum Comments to Display (defaults to 10)</label>
                    </td>
                    <td>
                        <input name="facebook_live_video_max_comments" id="facebook_live_video_max_comments" type="number" value="<?php if(isset($facebook_live_video_max_comments)) { echo esc_attr($facebook_live_video_max_comments); } ?>" class="regular-text" />


                    </td>
                </tr>



                <tr valign="top">
                    <td scope="row">
                        <label for="facebook_live_video_no_live_video">Content to Display When There's No Live Video</label>
                    </td>
                    <td>




                        <?php 
                        
                        
                        if(isset($facebook_live_video_no_live_video)){ 
                        
                        wp_editor(html_entity_decode(stripslashes($facebook_live_video_no_live_video)), "facebook_live_video_no_live_video", $settings = array(
                        'textarea_name' => "facebook_live_video_no_live_video",
                        'drag_drop_upload' => true,
                        'textarea_rows' => 7,  
                        ) ); 
                        
                        } else {
                            
                        wp_editor("", "facebook_live_video_no_live_video", $settings = array(
                        'textarea_name' => "facebook_live_video_no_live_video",
                        'drag_drop_upload' => true,
                        'textarea_rows' => 7,  
                        ) );     
                            
                        }
                    
                        
                        ?>



                    </td>
                </tr>





                <tr valign="top">
                    <td scope="row">
                        <label for="facebook_live_video_cache_expiration">Cache Expiration for Past Videos (in hours, default 24)</label>
                    </td>
                    <td>
                        <input name="facebook_live_video_cache_expiration" id="facebook_live_video_cache_expiration" type="number" value="<?php if(isset($facebook_live_video_cache_expiration)) { echo esc_attr($facebook_live_video_cache_expiration); } ?>" class="regular-text" />


                    </td>
                </tr>



                <tr valign="top">
                    <td scope="row">
                        <label for="facebook_live_video_clear_cache">Clear the Cache</label>
                    </td>
                    <td>
                        <input type="submit" class="button-secondary" id="facebook_live_video_clear_cache" name="facebook_live_video_clear_cache" value="Clear Video Cache">
                    </td>
                </tr>





                <tr valign="top">
                    <td scope="row"></td>
                    <td>
                        <input class="button-primary" type="submit" id="save" name="save" value="Save All Settings" />
                    </td>
                </tr>
            </table>




        </div>
        <!-- .inside -->
    </div>
    <!-- .postbox -->
</div>






<?php
if(strlen($options['facebook_live_video_access_token']) > 0){
?>



<div class="meta-box-sortables ui-sortable">
    <div class="postbox">
        <div class="handlediv" title="Click to toggle">
            <br>
        </div>
        <!-- Toggle -->
        <h2 class="hndle"><span><?php esc_attr_e( 'Hide Videos', 'wp_admin_style' ); ?></span>
						</h2>

        <h3 class="hndle" style="color: red; font-size: 13px;">At the moment there are bugs in Facebook's API feeds where live videos don't get properly closed off and also deleted videos can appear in the API feeds. I have created a bug report with Facbeook about this which hasn't been resolved yet. However this feature below will enable you to hide these unwatnted videos from showing.</h3>
        <div class="inside">

            <table class="form-table">



                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                <tr valign="top">
                    <td scope="row">
                        <label for="facebook_live_video_live_video_hide">Hide Live Videos</label>
                    </td>
                    <td>





                            <table id="facebook_live_video_live_video_hide_table" style="">
                                <tr>
                                    <th style="text-align: left;">Created (d/m/y, hh:mm timezone)</th>
                                    <th style="text-align: left;">Description</th>
                                    <th style="text-align: left;">Hide</th>
                                </tr>
                                
                                
                                
                                
                                <?php
                        
                      if($options['facebook_live_video_profile_type'] == "Page"){
                        $accessToken = $options['facebook_live_video_extended_access_token']; 
                        $pageId = $options['facebook_live_video_page_selection'];     
                        } else { 
                        $accessToken = $options['facebook_live_video_access_token']; 
                        $pageId = $options['facebook_live_video_user_id'];  
                        }    
                        
                        
                        
                        
                        //check to see what videos are available
$json_feedLiveVids = wp_remote_get( 'https://graph.facebook.com/v2.8/'.$pageId.'/live_videos?broadcast_status[]=LIVE&access_token='.$accessToken );
                                                             
    
	if ( 200 == wp_remote_retrieve_response_code( $json_feedLiveVids ) ) {                                                             

//set the variable pastVids to be the response and get response       
$liveVids = json_decode($json_feedLiveVids['body'], true);
                        
                        foreach ($liveVids['data'] as $videos) {
                        
                            
                        $videoId = $videos['id'];   
                        
                            
                        $json_feed_video_info = wp_remote_get( 'https://graph.facebook.com/v2.8/'.$videoId."?fields=live_views,creation_time,title,description&access_token=".$accessToken );    
                        
                        $video_info = json_decode($json_feed_video_info['body'], true);   
                            
                            

                            
                            
                            
                        $html = "";  
                            
                        $html .= '<tr>'; 
                         
                        //creationd date    
                        
                        $dateandtime = new DateTime($video_info['creation_time']);    
                            
                        $html .= '<td>'.$dateandtime->format('j/n/y, g:ia T').'</td>'; 
                        
                        //description
                        $html .= '<td>'.$video_info['description'].'</td>';  
                            
                        
                           
                            
                        //checkbox
                        $html .= '<td><input class="liveVideoCheckboxes" name="'.$videos['id'].'" id="'.$videos['id'].'" type="checkbox" value="1" /></td>';    
                            
                        $html .= '</tr>';      
                         
                            
                        echo $html;      
                            
                        } //end for each
                        } //end if error status codes
          
                        
                        ?>
                                
                        </table>


                            <input style="display:none;" name="facebook_live_video_live_video_hide" id="facebook_live_video_live_video_hide" type="text" value="<?php if(isset($facebook_live_video_live_video_hide)) { echo esc_attr($facebook_live_video_live_video_hide); } ?>" class="regular-text" />


                    </td>
                </tr>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                


                <tr valign="top">
                    <td scope="row">
                        <label for="facebook_live_video_past_video_hide">Hide Past Videos</label>
                    </td>
                    <td>





                            <table id="facebook_live_video_past_video_hide_table" style="">
                                <tr>
                                    <th style="text-align: left;">Created (d/m/y, hh:mm timezone)</th>
                                    <th style="text-align: left;">Description</th>
                                    <th style="text-align: left;">Hide</th>
                                </tr>
                                
                                
                                
                                
                                <?php
                        
                      if($options['facebook_live_video_profile_type'] == "Page"){
                        $accessToken = $options['facebook_live_video_extended_access_token']; 
                        $pageId = $options['facebook_live_video_page_selection'];     
                        } else { 
                        $accessToken = $options['facebook_live_video_access_token']; 
                        $pageId = $options['facebook_live_video_user_id'];  
                        }    
                        
                        
                        
                        
                        //check to see what videos are available
$json_feedPastVids = wp_remote_get( 'https://graph.facebook.com/v2.8/'.$pageId.'/live_videos?broadcast_status[]=VOD&access_token='.$accessToken );
                                                             
                                                             
    
    
	if ( 200 == wp_remote_retrieve_response_code( $json_feedPastVids ) ) {                                                                

//set the variable pastVids to be the response and get response       
$pastVids = json_decode($json_feedPastVids['body'], true);
                        
                        foreach ($pastVids['data'] as $videos) {
                        
                            
                        $videoId = $videos['id'];   
                        
                            
                        $json_feed_video_info = wp_remote_get( 'https://graph.facebook.com/v2.8/'.$videoId."?fields=live_views,creation_time,title,description&access_token=".$accessToken );    
                        
                        $video_info = json_decode($json_feed_video_info['body'], true);   
                            
                            

                            
                            
                            
                        $html = "";  
                            
                        $html .= '<tr>'; 
                         
                        //creationd date    
                        
                        $dateandtime = new DateTime($video_info['creation_time']);    
                            
                        $html .= '<td>'.$dateandtime->format('j/n/y, g:ia T').'</td>'; 
                        
                        //description
                        $html .= '<td>'.$video_info['description'].'</td>';  
                            
                        
                           
                            
                        //checkbox
                        $html .= '<td><input class="pastVideoCheckboxes" name="'.$videos['id'].'" id="'.$videos['id'].'" type="checkbox" value="1" /></td>';    
                            
                        $html .= '</tr>';      
                         
                            
                        echo $html;      
                            
                        } //end for each
                        } //end if error status codes
                        
          
                        
                        ?>
                                
                        </table>


                            <input style="display:none;" name="facebook_live_video_past_video_hide" id="facebook_live_video_past_video_hide" type="text" value="<?php if(isset($facebook_live_video_past_video_hide)) { echo esc_attr($facebook_live_video_past_video_hide); } ?>" class="regular-text" />


                    </td>
                </tr>


                <tr valign="top">
                    <td scope="row"></td>
                    <td>
                        <input class="button-primary" type="submit" id="save" name="save" value="Save All Settings" />
                    </td>
                </tr>




            </table>




        </div>
        <!-- .inside -->
    </div>
    <!-- .postbox -->
</div>

<?php
} //end if condition that checks if there's enough settings to make api call
?>