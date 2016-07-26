<div class='pyre_metabox'>
<?php
$this->select(	'en_video_bg',
				__('Enable Video Background', 'Nimva'),
				array('default' => __('Default', 'Nimva'),'yes' => __('Yes', 'Nimva'), 'no' => __('No', 'Nimva')),
				''
			);
?>
<?php
$this->text('youtube_id',
			__('Youtube Video Id', 'options_framework_theme'),
			__('Paste here the video id of your youtube video that will be used as the Video Background. <br>E.g: http://www.youtube.com/watch?v=PZizZxwrrbk - the code you should enter would be: PZizZxwrrbk', 'Nimva')
		);
?>
<?php
$this->text('video_opacity',
			__('Video Opacity', 'options_framework_theme'),
			__('Enter a number between 1 - 100 to determine the opacity of the video - lower values will make the video less visible', 'Nimva')
		);
?>
<?php 
$this->colorpicker('video_bg_overlay_color', __('Video Overlay Color', 'Nimva'), __('Add a colored background over the Video Background. Leave blank if you don\'t want to use this feature.', 'Nimva')); ?>
<?php
$this->select('video_bg_overlay',
				__('Background Video Overlay Pattern', 'Nimva'),
				array('0' => __('No Image', 'Nimva'), 'overlay-pattern1.png' => __('Pattern 1', 'Nimva'), 'overlay-pattern2.png' => __('Pattern 2', 'Nimva'), 'overlay-pattern3.png' => __('Pattern 3', 'Nimva'),'overlay-pattern4.png' => __('Pattern 4', 'Nimva')),
				'You can optionally select an overlay pattern for your video background.'
			);
?>
<?php
$this->text('video_overlay_opacity',
			__('Video Overlay Opacity', 'options_framework_theme'),
			__('Enter a number between 1 - 100 to determine the opacity of the video background overlay - lower values will make the video background overlay less visible.', 'Nimva')
		);
?>
</div>