<?php if(!is_page_template('page-blank.php')): ?>
<?php global $data; ?>

	<?php
	if($data['call_action']) {
	?>
    	<div id="call_action">
        
        	<div class="container clearfix">
            	
                	<div class="promo-text">
                    	<h3><?php echo $data['call_action_text']; ?></h3>
                    </div>
                    <div class="promo-action">
                    <?php if ($data['call_action_button_color']=='Light Blue') $data['call_action_button_color']='blue'; ?>
                    <?php if ($data['call_action_button_color']=='Light Red') $data['call_action_button_color']='red'; ?>
                        
                        <?php echo do_shortcode('[vc_button style="'.strtolower($data['call_action_button_style']).'" title="'.$data['call_action_button_text'].'" href="' . $data['call_action_button_link'] . '" color="' . strtolower(str_replace(" ","_",$data['call_action_button_color'])).'" button_inverse="false" size="'.strtolower($data['call_action_button_size']).'" icon="fa '.$data['call_action_button_icon'].'"]') ?>
                    </div>
                            	
        		
            </div>
        
        </div>
    <?php	
	}
	?> 
<?php if($data['twitter_bar']) {
			$id = rand(0,999);	
	?>    
        <div id="twitter_bar">
        	<div class="container clearfix">
            	<?php
				$transName = 'list_tweets_'.$args['widget_id'];
				$cacheTime = 10;
				delete_transient($transName);
				if(false === ($twitterData = get_transient($transName))) {
					 // require the twitter auth class
					 @require_once 'functions/twitteroauth/twitteroauth.php';
					 $twitterConnection = new TwitterOAuth(
									$data['consumer_key'],	// Consumer Key
									$data['consumer_secret'],   	// Consumer secret
									$data['access_token'],       // Access token
									$data['access_token_secret']    	// Access token secret
									);
					$twitterData = $twitterConnection->get(
									  'statuses/user_timeline',
									  array(
										'screen_name'     => $data['twitter_profile'],
										'count'           => 1,
										'exclude_replies' => false
									  )
									);
					 if($twitterConnection->http_code != 200)
					 {
						  $twitterData = get_transient($transName);
					 }
		
					 // Save our new transient.
					 set_transient($transName, $twitterData, 60 * $cacheTime);
				};
				$twitter = get_transient($transName);
				if($twitter && is_array($twitter)) {
					//var_dump($twitter);
					$id = rand(0,999);
				?>

				<ul id="twitter_list_<?php echo $id; ?>" style="margin:0;">
					<?php foreach($twitter as $tweet): ?>
                <li>
                	
					<?php
					$latestTweet = $tweet->text;
					$latestTweet = preg_replace('/http:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '&nbsp;<a href="http://$1" target="_blank">http://$1</a>&nbsp;', $latestTweet);
					$latestTweet = preg_replace('/@([a-z0-9_]+)/i', '&nbsp;<a href="http://twitter.com/$1" target="_blank">@$1</a>&nbsp;', $latestTweet);
					echo $latestTweet;					
					$twitterTime = strtotime($tweet->created_at);					
					?>
                    
					<a href="http://twitter.com/<?php echo $tweet->user->screen_name; ?>/statuses/<?php echo $tweet->id_str; ?>" class="jtwt_date"></a>	
                    				
                </li>
            <?php endforeach; ?>
				</ul>
                <?php
				}
				?>
            </div>    
        </div>
     <?php } ?> 
   
<!-- ============================================
            Footer
        ============================================= -->
      
     <?php if($data['footer_widgets']) { ?>   
        
        <div id="footer" class="footer-dark">
        
            
            <div class="container clearfix">

            <?php 
            $sidebar_cols = $data['footer_sidebar_cols'];
            if ( $sidebar_cols ) {
                $sidebar_cols = 'col-footer-'.$sidebar_cols;
            }
            else {
                $sidebar_cols = '';
            }
            ?>
        
        
                <div class="footer-widgets-wrap <?php echo $sidebar_cols; ?> clearfix">
                
                    <div class="col_one_fourth">
                        <?php 
                        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Sidebar 1')): 
                        endif;
                        ?> 
                    </div>
                    
                     <div class="col_one_fourth">
						<?php
                        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Sidebar 2')): 
                        endif;
                        ?>                    
                    </div>
                    
                    <div class="col_one_fourth">
						<?php
                        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Sidebar 3')): 
                        endif;
                        ?>
                    </div>    
                    
                    <div class="col_one_fourth">
						<?php
                        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Sidebar 4')): 
                        endif;
                        ?>
                    </div>

                </div>
            
            
            </div>
        
        
        </div>
        
     <?php } ?>  
        <?php if( ($data['copyrights_area']) || ($data['footer_menu']) ) { ?>
        <!-- ============================================
            Copyrights
        ============================================= -->
        <div id="copyrights" class="copyrights-dark">
        
            <div class="container clearfix">
        
            <?php 
					
				if($data['copyrights_area']){
                	
					$col1 = $data['footer_copyright_center'] ? 'col_full nobottommargin center' : 'col_half';
					$col2 = $data['footer_copyright_center'] ? 'col_full nobottommargin center' : 'col_half col_last tright';
					
			?>		
					<div class="<?php echo $col1; ?>"><?php echo $data['copyrights_text']; ?></div>
                
            <?php
			
				}
				
				if($data['footer_menu']) {
			
			?>

	                <div class="<?php echo $col2; ?>">
						<?php	                    
                            if(has_nav_menu('footer-menu')) {
                                wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container' => false,'menu_class' => 'footer-menu' ) ); 
                            }
                            else{
                                echo '<ul><li><a href="#">No menu assigned!</a></li></ul>';
                            }
                        ?>                    	                
                	</div>	
            
            <?php } ?>
            
            </div>
            
    	</div>
    
    	<?php } ?>
<?php endif; ?>    
    
    <div id="gotoTop" class="fa fa-angle-up"></div>

<?php //require_once(get_template_directory().'/style_selector.php'); ?>

<?php wp_footer(); ?>

<?php echo $data['body_code']; ?>
</div><!-- end content div -->  
</div><!-- end wrapper div -->
</body>
</html>
