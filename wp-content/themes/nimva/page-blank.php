<?php // Template Name: Blank - No Header, No Footer ?>
<?php get_header(); ?>
<?php 
if(get_post_meta($post->ID, 'pyre_slider_layer', true) != 0) { 
?>  
    <div id="slider-output">
    	<?php echo do_shortcode('[layerslider id="'.get_post_meta($post->ID, 'pyre_slider_layer', true).'"]'); ?>
    </div>
<?php 
}
?>
<?php get_header(); ?>               

			<div class="blank_page_template">
                <!-- ============================================
                    Page Content Start
                ============================================= -->
                	<?php while(have_posts()): the_post(); ?>                	          	
						<?php the_content(); ?>
                    <?php endwhile; ?>             	
                <!-- ============================================
                    Page Content End
                ============================================= -->

            </div>        

<?php get_footer(); ?>