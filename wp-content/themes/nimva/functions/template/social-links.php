<?php global $data; ?>
<div id="top-social">
    <ul>
		<?php if ( $data['facebook_link'] ) { ?><li><a href="<?php echo $data['facebook_link']; ?>" target="_blank"><i class="fa fa-facebook"></i><div class="ts-text">Facebook</div></a></li><?php } ?>
        <?php if ( $data['twitter_link'] ) { ?><li><a href="<?php echo $data['twitter_link']; ?>" target="_blank"><i class="fa fa-twitter"></i><div class="ts-text">Twitter</div></a></li><?php } ?>
        <?php if ( $data['gplus_link'] ) { ?><li><a href="<?php echo $data['gplus_link']; ?>" target="_blank"><i class="fa fa-google-plus"></i><div class="ts-text">Google+</div></a></li><?php } ?>
        <?php if ( $data['instagram_link'] ) { ?><li><a href="<?php echo $data['instagram_link']; ?>" target="_blank"><i class="fa fa-instagram"></i><div class="ts-text">Instagram</div></a></li><?php } ?>
        <?php if ( $data['linkedin_link'] ) { ?><li><a href="<?php echo $data['linkedin_link']; ?>" target="_blank"><i class="fa fa-linkedin"></i><div class="ts-text">LinkedIn</div></a></li><?php } ?>
        <?php if ( $data['dribbble_link'] ) { ?><li class="ts-dribbble"><a href="<?php echo $data['dribbble_link']; ?>" target="_blank"><i class="fa fa-dribbble"></i><div class="ts-text">Dribbble</div></a></li><?php } ?>
        <?php if ( $data['pinterest_link'] ) { ?><li class="ts-pinterest"><a href="<?php echo $data['pinterest_link']; ?>" target="_blank"><i class="fa fa-pinterest"></i><div class="ts-text">Pinterest</div></a></li><?php } ?>
        <?php if ( $data['flickr_link'] ) { ?><li class="ts-flickr"><a href="<?php echo $data['flickr_link']; ?>" target="_blank"><i class="fa fa-flickr"></i><div class="ts-text">Flickr</div></a></li><?php } ?>
        <?php if ( $data['tumblr_link'] ) { ?><li class="ts-tumblr"><a href="<?php echo $data['tumblr_link']; ?>" target="_blank"><i class="fa fa-tumblr"></i><div class="ts-text">Tumblr</div></a></li><?php } ?>
        <?php if ( $data['behance_link'] ) { ?><li class="ts-behance"><a href="<?php echo $data['behance_link']; ?>" target="_blank"><i class="fa fa-behance"></i><div class="ts-text">Behance</div></a></li><?php } ?>
        <?php if ( $data['skype_link'] ) { ?><li class="ts-skype"><a href="<?php echo $data['skype_link']; ?>" target="_blank"><i class="fa fa-skype"></i><div class="ts-text">Skype</div></a></li><?php } ?>
        <?php if ( $data['vimeo_link'] ) { ?><li class="ts-vimeo"><a href="<?php echo $data['vimeo_link']; ?>" target="_blank"><i class="fa fa-vimeo-square"></i><div class="ts-text">Vimeo</div></a></li><?php } ?>
        <?php if ( $data['youtube_link'] ) { ?><li class="ts-youtube"><a href="<?php echo $data['youtube_link']; ?>" target="_blank"><i class="fa fa-youtube"></i><div class="ts-text">Youtube</div></a></li><?php } ?>
    </ul>
</div>
