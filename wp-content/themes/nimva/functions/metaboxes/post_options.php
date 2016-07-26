<div class='pyre_metabox'>


<?php
$this->select(	'en_sidebar',
				__('Enable Sidebar', 'Nimva'),
				array('yes' => __('Yes', 'Nimva'), 'no' => __('No', 'Nimva')),
				''
			);
?>
<?php 
$this->select(	'sidebar_pos',
				__('Sidebar Position', 'Nimva'),
				array('default' => __('Default', 'Nimva'), 'right' => __('Right', 'Nimva'), 'left' => __('Left', 'Nimva')),
				''
			);
?>
<?php
$this->select(	'show_title',
				__('Show Post Title', 'Nimva'),
				array('yes' => __('Yes', 'Nimva'), 'no' => __('No', 'Nimva')),
				''
			);
?>

<?php
$this->select(	'skip_first',
				__('Skip First Image', 'Nimva'),
				array('no' => __('No', 'Nimva'), 'yes' => __('Yes', 'Nimva')),
				''
			);
?>

<?php
$this->select(	'page_title',
				__('Page Title &amp; Breadcrumbs Bar', 'Nimva'),
				array('show' => __('Show', 'Nimva'), 'hide' => __('Hide', 'Nimva')),
				''
			);
?>
<?php
$this->select(	'header_version',
				__('Header Version', 'Nimva'),
				array('default' => __('Default', 'Nimva'), 'v1' => __('Version 1', 'Nimva'), 'v2' => __('Version 2', 'Nimva'), 'v3' => __('Version 3', 'Nimva')),
				''
			);
?>
</div>