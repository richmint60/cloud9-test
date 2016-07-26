<div class="pyre_metabox">
<?php
$this->select(	'column_type',
				__('Column Type', 'Nimva'),
				array('normal' => __('Normal', 'Nimva'), 'best' => __('Featured', 'Nimva'))
			);
			
$this->text('price',
			__('Price', 'Nimva')
		);

$this->text('currency',
			__('Currency', 'Nimva')
		);
$this->text('time',
			__('Billing Cycle', 'Nimva'),
			__('Enter a billing cycle: monthly, yearly, etc. Leave blank for no billing cycle.', 'Nimva')
		);

$this->text('button_text',
			__('Text on Button', 'Nimva'),
			__('Enter the text that will appear on the button. Leave blank if you don\'t want to use a button', 'Nimva')
		);
		
$this->text('button_url',
			__('Button URL', 'Nimva'),
			__('Enter the url where the visitors will go after clicking the button. E.g: http://google.com', 'Nimva')
		);		

$this->select(	'button_style',
				__('Button Style', 'Nimva'),
				array('minimal' => __('Minimal', 'Nimva'), '3d' => __('3D', 'Nimva'))
			);
			
$this->select(	'button_color',
				__('Button Color', 'Nimva'),
				array('red' => __('Red', 'Nimva'), 'dark_red' => __('Dark Red', 'Nimva'), 'blue' => __('Light Blue', 'Nimva'), 'orange' => __('Orange', 'Nimva'), 'turquoise' => __('Turquoise', 'Nimva'), 'emerald' => __('Emerald', 'Nimva'), 'amethyst' => __('Amethyst', 'Nimva'), 'wet_asphalt' => __('Wet Asphalt', 'Nimva'), 'light' => __('Light', 'Nimva'), 'dark' => __('Dark', 'Nimva'))
			);			

$this->select(	'button_size',
				__('Button Size', 'Nimva'),
				array('small' => __('Small', 'Nimva'), 'large' => __('Large', 'Nimva'))
			);

$this->select(	'inverse_color',
				__('Inverse Button Colors', 'Nimva'),
				array('false' => __('No', 'Nimva'), 'true' => __('Yes', 'Nimva'))
			);
$this->text('button_icon',
			__('Button icon', 'Nimva'),
			__('Enter a fontawesome text icon to appear on your button. E.g: icon-ok, icon-cogs, icon-star, etc', 'Nimva')
		);			
?>
</div>