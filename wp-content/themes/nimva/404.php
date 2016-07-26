<?php get_header(); ?>
    <div class="content-wrap">
            
            
                <div class="container clearfix">
                
                <!-- ============================================
                    Page Content Start
                ============================================= -->
                    <div class="error404-page">
                                        
                        <span><?php echo __('Oops, that page doesn\'t exist!','Nimva'); ?></span>4<i class="fa fa-exclamation-circle"></i>4
                                        
                    </div>
                    
                    <div class="error404-page-meta">
                    
                        <form method="get" id="searchform" action="<?php echo get_home_url(); ?>/">
                                <input type="text" id="s" name="s"  onclick="value=''"  value="<?php _e('Try a new search here...', 'Nimva') ?>"/>
                                <input type="submit" id="s-submit" name="s-submit" value="submit">
                            
                        <!--END #searchform-->
                        </form>
                    
                    </div>
                
                <!-- ============================================
                    Page Content End
                ============================================= -->
                </div>
            
            
            </div>
        
        
        </div>		
<?php get_footer(); ?>