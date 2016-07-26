<?php
global $data;
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'Nimva') ?></p>
	<?php
		return;
	}

/*-----------------------------------------------------------------------------------*/
/*	Display the comments + Pings
/*-----------------------------------------------------------------------------------*/

		if ( have_comments() ) : // if there are comments ?>
        
        <?php if ( ! empty($comments_by_type['comment']) ) : // if there are normal comments ?>
		
		<div class="title-outer"><h3><?php _e('Commenting area', 'Nimva'); ?></h3></div>
		
		<ol class="commentlist clearfix">
		<?php wp_list_comments('type=comment&callback=comment_style'); ?>
        </ol>
        
        <div class="clear"></div>

        <?php endif; ?>

        <?php if ( ! empty($comments_by_type['pings']) ) : // if there are pings ?>
		
		<h3 id="pings"><?php _e('Trackbacks for this post', 'Nimva') ?></h3>
		
		<ol class="pinglist">
        <?php wp_list_comments('type=pings&callback=tz_list_pings'); ?>
        </ol>

        <?php endif; ?>

		<?php
		
		
/*-----------------------------------------------------------------------------------*/
/*	Deal with no comments or closed comments
/*-----------------------------------------------------------------------------------*/
		
		if ('closed' == $post->comment_status ) : // if the post has comments but comments are now closed ?>
		
		<p class="nocomments"><?php _e('Comments are now closed for this article.', 'Nimva') ?></p>
		
		<?php endif; ?>

 		<?php else :  ?>
		
        <?php if ('open' == $post->comment_status) : // if comments are open but no comments so far ?>

        <?php else : // if comments are closed ?>
		
		<?php if (is_single()) { ?><p class="nocomments"><?php _e('Comments are closed.', 'Nimva') ?></p><?php } ?>

        <?php endif; ?>
        
<?php endif;


/*-----------------------------------------------------------------------------------*/
/*	Comment Form
/*-----------------------------------------------------------------------------------*/

	if ( comments_open() ) : ?>

	<div id="respond" class="clearfix">
    
    	<div class="title-outer"><h3><?php comment_form_title( __('Leave a Reply', 'Nimva'), __('Leave a Reply to %s', 'Nimva') ); ?></h3></div>

	
		<div class="cancel-comment-reply">
			<?php cancel_comment_reply_link(); ?>
		</div>
	
		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p><?php printf(__('You must be %1$slogged in%2$s to post a comment.', 'Nimva'), '<a href="'.get_option('siteurl').'/wp-login.php?redirect_to='.urlencode(get_permalink()).'">', '</a>') ?></p>
		<?php else : ?>
	
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="clearfix">
	
			<?php if ( is_user_logged_in() ) : ?>
			
        	<div class="col_full">
				<p><?php printf(__('Logged in as %1$s. %2$sLog out &raquo;%3$s', 'Nimva'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>', '<a href="'.(function_exists('wp_logout_url') ? wp_logout_url(get_permalink()) : get_option('siteurl').'/wp-login.php?action=logout" title="').'" title="'.__('Log out of this account', 'Nimva').'">', '</a>') ?></p>
            </div>
            
            <div class="col_full">
            	<textarea name="comment" cols="58" rows="10" tabindex="4" class="input-block-level"></textarea>
            </div>
                                    
            <div class="col_full">
            	<p class="allowed-tags"><small><?php _e('You can use these tags:', 'Nimva'); ?> <code>&lt;a href=&quot;&quot; title=&quot;&quot;&gt; &lt;abbr title=&quot;&quot;&gt; &lt;acronym title=&quot;&quot;&gt; &lt;b&gt; &lt;blockquote cite=&quot;&quot;&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=&quot;&quot;&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=&quot;&quot;&gt; &lt;strike&gt; &lt;strong&gt; </code></small></p>
            </div>
		
			<?php else : ?>
            
            <div class="col_one_third">
            	<label for="author"><?php _e('Name ', 'Nimva') ?><span><?php if ($req) _e("*", 'Nimva'); ?></span></label>
                <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" class="input-block-level" />
            </div>
            
            <div class="col_one_third">
            	<label for="email"><?php _e('Mail <span></span>', 'Nimva') ?><span><?php if ($req) _e("*", 'Nimva'); ?></span> <small>(<?php _e('will not be published','Nimva'); ?>)</small></label>
            	<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" class="input-block-level" />
            </div>
            <div class="col_one_third col_last">
                <label for="url"><?php _e('Website', 'Nimva') ?></label>
                <input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" class="input-block-level" />
            </div>
            
            <div class="clear"></div>
            
            <div class="col_full">
            	<textarea name="comment" cols="58" rows="10" tabindex="4" class="input-block-level"></textarea>
            </div>
                                    
            <div class="col_full">
            	<p class="allowed-tags"><small><?php _e('You can use these tags','Nimva');?>: <code>&lt;a href=&quot;&quot; title=&quot;&quot;&gt; &lt;abbr title=&quot;&quot;&gt; &lt;acronym title=&quot;&quot;&gt; &lt;b&gt; &lt;blockquote cite=&quot;&quot;&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=&quot;&quot;&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=&quot;&quot;&gt; &lt;strike&gt; &lt;strong&gt; </code></small></p>
            </div>
		
			<?php endif; ?>
		
        	<?php
			$c_style =  ($data['comment_style'] == '3D') ? 'simple-button-3d' : 'simple-button';
			$c_color = $data['comment_color'];
			if($c_color == 'Light Red' ) $c_color='red';
			if($c_color == 'Light Blue' ) $c_color='blue';
			$c_size = ($data['comment_size'] == 'Small') ? 'small' : 'large';
			$c_icon = ($data['comment_icon'] != '' ) ? '<i class="fa ' . $data['comment_icon'] . '"></i>' : '';
			?>
        
<button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="<?php echo $c_style.' '.strtolower(str_replace(" ","_",$c_color)).' '.$c_size; ?>"><?php _e($c_icon.'Submit Comment', 'Nimva') ?></button>
			<?php comment_id_fields(); ?>
			</p>
			<?php do_action('comment_form', $post->ID); ?>
	
		</form>

	<?php endif; // If registration required and not logged in ?>
	</div>

	<?php endif; // if you delete this the sky will fall on your head ?>
