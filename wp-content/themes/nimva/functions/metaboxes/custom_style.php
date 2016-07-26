<div class='pyre_metabox'>

<?php 
$this->upload('background', __('Custom Background Image', 'Nimva'), __('This will overide the actual background used in the Theme Option Area', 'Nimva')); ?>

<?php
$this->select(	'en_parallax',
				__('Enable Parallax Background ', 'Nimva'),
				array('no' => __('No', 'Nimva'), 'yes' => __('Yes', 'Nimva')),
				''
			);
?>

<?php
$this->select(	'en_full_screen',
				__('Enable FullScreen Background Image', 'Nimva'),
				array('no' => __('No', 'Nimva'), 'yes' => __('Yes', 'Nimva')),
				''
			);
?>
<?php 
$this->colorpicker('bg_color', __('Custom Background Color', 'Nimva'), __('This will overide the actual background color used in the Theme Option Area', 'Nimva')); ?>

<?php
$this->select(	'bg_repeat',
				__('Custom Background Repeat', 'Nimva'),
				array(
					'no-repeat' => __('No Repeat','Nimva'), 
					'repeat-x' => __('Repeat Horizontally', 'Nimva'), 
					'repeat-y' => __('Repeat Vertically', 'Nimva'), 
					'repeat' => __('Repeat All', 'Nimva')
					),
				''
			);
?>
<?php /*
$this->select(	'bg_position',
				__('Custom Background Position', 'Nimva'),
				array('top left' => __('Top Left', 'Nimva'), 
				      'top center' => __('Top Center', 'Nimva'), 
					  'top right' => __('Top Right', 'Nimva'), 
					  'center left' => __('Middle Left', 'Nimva'),
					  'center center' => __('Middle Center', 'Nimva'),
					  'center right' => __('Middle Right', 'Nimva'),
					  'bottom left' => __('Bottom Left', 'Nimva'),
					  'bottom center' => __('Bottom Center', 'Nimva'),
					  'bottom right' => __('Bottom Right', 'Nimva')
					  ),
				''
			);
			*/
?>
<?php
$this->select(	'bg_attach',
				__('Custom Background Scrolling', 'Nimva'),
				array(
					'fixed' => __('Fixed in Place', 'Nimva'), 
					'scroll' => __('Scroll Normally', 'Nimva')
					),
				__('Choose if you want the background to be fixed in place or scroll it normally.', 'Nimva')
			);
?>
</div>