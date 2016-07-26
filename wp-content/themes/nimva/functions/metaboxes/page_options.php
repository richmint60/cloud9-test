<div class="pyre_metabox">
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

<?php /*
$this->select(	'show_title',
				__('Show Page Title', 'Nimva'),
				array('yes' => __('Yes', 'Nimva'), 'no' => __('No', 'Nimva')),
				''
			);
*/ ?>
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
<?php
$this->select(	'transparent_header',
				__('Transparent Header', 'Nimva'),
				array('default' => __('Default', 'Nimva'), 'yes' => __('Yes', 'Nimva'), 'no' => __('No', 'Nimva')),
				''
			);
?>
<?php
$this->select(	'top_bar',
				__('Top Bar', 'Nimva'),
				array('default' => __('Default', 'Nimva'), 'yes' => __('Yes', 'Nimva'), 'no' => __('No', 'Nimva')),
				''
			);
?>
<?php
$types = get_terms('portfolio_category', 'hide_empty=0');
$types_array[0] = __('All categories', 'Nimva');
if($types) {
	foreach($types as $type) {
		$types_array[$type->term_id] = $type->name;
	}
$this->select(	'portfolio_category',
				__('Portfolio Type', 'Nimva'),
				$types_array,
				__('Choose what portfolio category you want to display posts from. Leave blank for all categories. <br />This option will only work for Portfolio page templates', 'Nimva')
			);
}
?>

<?php
$this->select(	'portfolio_details',
				__('Portfolio Details', 'Nimva'),
				array('default' => __('Default', 'Nimva'), 'yes' => __('Yes', 'Nimva'), 'no' => __('No', 'Nimva')),
				__('Show or hide the portfolio details. <br />This option will only work for Portfolio page templates', 'Nimva')
			);
?>

<?php
$types2 = get_terms('faq_category', 'hide_empty=0');
$types_array2[0] = __('All categories', 'Nimva');
if($types2) {
	foreach($types2 as $type2) {
		$types_array2[$type2->term_id] = $type2->name;
	}
$this->select(	'faq_category',
				__('FAQ Type', 'Nimva'),
				$types_array2,
				__('Choose what FAQ category you want to display. Leave blank for all categories. <br />These options will only work for FAQ page template', 'Nimva')
			);
}
?>

<?php /*
$this->select(	'portfolio_sidebar',
				__('Enable Portfolio Sidebar', 'Nimva'),
				array('no' => __('No', 'Nimva'), 'yes' => __('Yes', 'Nimva')),
				''
			);
*/?>

</div>