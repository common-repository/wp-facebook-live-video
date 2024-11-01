<div class="postbox">
                        <div class="handlediv" title="Click to toggle">
                            <br>
                        </div>
                        <!-- Toggle -->
                        <h2 class="hndle"><span><?php esc_attr_e( 'Setup Guide', 'wp_admin_style' ); ?></span>
						</h2>
                        <div class="inside">
                            <div id="accordion">
                                
                                
                                <p style="color: red; font-weight: bold;">Please follow the written instructions below stricly. Failing to follow the instructions probably will result in something going wrong :( Check out the <a target="_blank" href="https://www.youtube.com/watch?v=0NeZ4kGVhaQ">helper video</a> below as well as that will guide you from start to finish.</p>
                                
                                <iframe width="600" height="338" src="https://www.youtube.com/embed/0NeZ4kGVhaQ?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                                
                                
                                <h3>Step 1 - Create a Facebook Application</h3>
                                <div>
                                    <ol>
                                    
                                        <li>Make sure you're logged in to facebook and please go to: <a target="_blank" href="https://developers.facebook.com">https://developers.facebook.com</a></li>
                                        <li>In the top right hand corner you will see a "My Apps" button/drop down. Click on this and then click on the "Add a New App" button.</li>
                                        <li>Give your app a name, it can be anything. The Category doesn't matter but just select "Apps for Pages" and then click the "Create App ID" button.</li>
                                        <li>You will now land on your app settings page. Click the Settings tab in the left hand side menu and at the bottom of this page click the "Add Platform" button and then select "Website" and then enter in the home page of your website e.g. www.google.com and then press the "Save Changes" button.</li>
                                        <li>Then in the left hand side menu click the "+ Add Product" link and then next to "Facebook Login" press the "Get Started" button. In the "Valid OAuth redirect URIs" field please enter: <code><?php global $wp;
$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
                                    
                                    echo $current_url."/wp-admin/options-general.php?page=facebook-live-video"; 
                                    ?></code> and press the "Save Changes" button.
</li>
                                        
                                        <li>Then in the left hand side menu go to "App Review" and click the "Start a Submission" button. Check the "manage_pages" and "user_videos" option and press the "Add 2 Items" button. At the top of this page make your app active by toggling the Yes/No switch to Yes and then press the "Confirm" button.</li>
                                        <li>In the left hand side menu go to Dashboard and then copy and paste the App ID and Secret into the above plugin settings and then press the "Save All Settings" button.</li>
                                    </ol>
                                    
                                    
                                    
                                    
                                </div>
                                
                                
                                
                                <h3>Step 2 - Completing this settings page</h3>
                                <div>
                                    <ol>
                                    
                                        <li>By now you should have already entered in your App ID and Secret above and saved the settings and you can also choose whether you want to display live video from your personal profile or from a Facebook page. Now a Facebook login button will appear just below these settings, click on this button proceed through the Facebook permission popup box and then press the "Save All Settings" button.</li>
                                        <li>Press the "Save All Settings" button again.</li>
                                        <li>If you are displaying live video from a user profile that's it for the settings but if you selected to connect a Facebook page you now need to select which page you want to connect to, once you have done this press "Save All Settings".</li>
                                        <li>If you are connecting to a Facebook Page you now need to press the "Click here to get Extended Access Token" button and then press "Save All Settings".</li>
                                    </ol>
                                    
                                    
                                    
                                    
                                </div>
                                
                                <h3>Step 3 - Adding the shortcode/widget to your post or page</h3>
                                <div>
                                    <ol>
                                    
                                        <li>Woohoo you made it this far! Now the easy part all you need to do is copy and paste the shortcode: <code>[facebooklivevideo]</code> on any post or page to show your live video.</li>
                                        <li>Simply go to <strong>Appearance > Widgets</strong> and drag the <strong>Facebook Live Video</strong> widget into your sidebar.</li>

                                    </ol>
                                    
                                    
                                    
                                    
                                </div>
                                
                                <h3>How do I display previous live videos?</h3>
                                <div>
                                    
                                All you need to do is use the shortcode: <code>[facebookpastvideo]</code> on any post or page and it will display a listing of all previous live videos (from most recent). You can also limit the amount of past live videos shown by adding a parameter to the shortcode like: <code>[facebookpastvideo videos=9]</code> which in this case would display 9 of the most recent live videos. If the "videos" parameter isn't specified all live videos will display.
                                    
                                This shortcode can work well in conjunction with the live video shortcode: <code>[facebooklivevideo]</code> on the one page to display any live videos followed by previous live videos.     
                                    
                                    
                                    
                                    
                                </div>
                                
                                <h3>I followed all the instructions but my video isn't displaying?</h3>
                                <div>
                                    <ol>
                                    
                                        <li>A video will only appear if you are recording live, if you aren't recording live it will appear completely blank (unless you add a custom message in the setting.</li>
                                        <li>If you are using a Facebook page, make sure your page is published! If your page is unpublished videos will have a "Video Unavailable" message on it.</li>
                                        <li>If videos aren't showing in your past videos shortcode display it could be due to the caching. Please clear the cache by pressing the "Clear Video Cache" button above. By default videos are cached and refreshed every 24 hours to minimise API calls to Facebook.</li>
                                        <li>Make sure all the settings above are completed and your Facebook app has been setup correctly and you follow the above instructions strictly.</li>

                                    </ol>
                                    
                                    
                                    
                                    
                                </div>
                                
                                
                            </div>
                        </div>
                        <!-- .inside -->
                    </div>