<?php global $data; ?>
<div id="top-menu">
	<ul class="menu">
		<?php if($data['header_email']){ ?>
        	<li>
				<?php if($data['header_email_icon']) {?>
                	<i class="fa <?php echo $data['header_email_icon']; ?>"></i>
				<?php } ?>
                <div class="mail"><a href="mailto:<?php echo $data['header_email']; ?>"><?php echo $data['header_email']; ?></a></div>
            </li>
		<?php } ?>
		<?php if($data['header_number']){ ?>
        	<li>
            	<?php if($data['header_number_icon']) {?>
                	<i class="fa <?php echo $data['header_number_icon']; ?>"></i>
				<?php } ?>
            	<div class="phone">
					<?php echo $data['header_number']; ?>
                </div>
                
            </li>
		<?php } ?>
	</ul>                   
</div>
<?php 
if($data['en_tapcall']) { ?>

<?php if ($data['tapcall_color']=='Light Blue') $data['tapcall_color']='blue'; ?>
<?php if ($data['tapcall_color']=='Light Red') $data['tapcall_color']='red'; ?>

<div class="taptocall">
	<!--<a href="callto://<?php echo $data['tapcall_ph_number']; ?>" class="simple-button taptocall"><i class="fa-phone"></i><?php echo $data['tapcall_button'] ?></a> -->
    <?php echo do_shortcode('[vc_button style="'.strtolower($data['tapcall_style']).'" title="'.$data['tapcall_button'].'" href="tel:'.$data['tapcall_ph_number'].'" color="' . strtolower(str_replace(" ","_",$data['tapcall_color'])).'" button_inverse="false" size="'.strtolower($data['tapcall_size']).'" icon="fa '.$data['header_number_icon'].'"]') ?>
</div>    
<?php 
} ?>
