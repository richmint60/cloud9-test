<div class='pyre_metabox'>

<?php
$this->text(	'client_name',
				__('Client name', 'Nimva'),
				''
			);
?>
<?php
$this->text(	'skills',
				__('Project Skills', 'Nimva'),
				''
			);
?>
<?php
$this->text(	'website_text',
				__('Website Text','Nimva'),
				''
			);
?>

<?php
$this->text(	'website_url',
				__('Website URL', 'Nimva'),
				''
			);
?>

<?php
$this->text(	'custom_url',
				__('Portfolio Item Custom URL', 'Nimva'),
				'Set here a custom URL for this portfolio item. When used as part of the Portfolio element, it will link to the URL you specify here'
			);
?>
<?php
$this->select(	'custom_url_target',
				__('Open Custom URL in new Window?', 'Nimva'),
				array('yes' => __('Yes', 'Nimva'), 'no' => __('No', 'Nimva')),
				''
			);
?>

</div>