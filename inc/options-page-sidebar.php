<div id="postbox-container-1" class="postbox-container">
                    <div class="meta-box-sortables">
                        <div class="postbox">
                            <div class="handlediv" title="Click to toggle">
                                <br>
                            </div>
                            <!-- Toggle -->
                            <h2 class="hndle"><span><?php esc_attr_e(
									'Please Donate!', 'wp_admin_style'
								); ?></span></h2>
                            <div class="inside">
                                <p>
                                    <?php esc_attr_e( 'Thank you for using my plugin. Your donation contributes to the development and support of this plugin. Any donation amount is much appreciated.'
                             ); ?>
                                </p>
                                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                    <input type="hidden" name="cmd" value="_s-xclick">
                                    <input type="hidden" name="hosted_button_id" value="VGVE97KF74FVN">
                                    <input type="image" src="https://www.paypalobjects.com/en_AU/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal — The safer, easier way to pay online.">
                                    <img alt="" border="0" src="https://www.paypalobjects.com/en_AU/i/scr/pixel.gif" width="1" height="1">
                                </form>
                            </div>
                            <!-- .inside -->
                        </div>
                        <!-- .postbox -->
                    </div>
                    <div class="postbox">
                        <div class="handlediv" title="Click to toggle">
                            <br>
                        </div>
                        <!-- Toggle -->
                        <h2 class="hndle"><span><?php esc_attr_e(
									'Bugs, Improvements or Customisations?', 'wp_admin_style'
								); ?></span></h2>
                        <div class="inside">
                            <p>Sorry, due to the recent actions by Facebook I can't help you. Please read the notice at the top of this page.</p>
                            </br>
                            <em><?php echo 'PHP Version: <strong>'.phpversion().'</strong>'; ?></em></br>
                            <em><?php echo 'Wordpress Version: <strong>'.get_bloginfo('version').'</strong>';
 ?></em></br>
                            <em>Plugin Version: <strong><?php echo facebook_live_video_plugin_get_version(); ?></strong></em></br>


                                
                    
                
                            
                        
                        
                            
                        </div>
                        <!-- .inside -->
                    </div>
                    <!-- .postbox -->
                </div>