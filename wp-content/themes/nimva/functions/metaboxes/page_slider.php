<div class="pyre_metabox">

<?php
global $wpdb;
  $ls = $wpdb->get_results( 
  	"
  	SELECT id, name, date_c
  	FROM ".$wpdb->prefix."layerslider
  	WHERE flag_hidden = '0' AND flag_deleted = '0'
  	ORDER BY date_c ASC LIMIT 100
  	"
  );
  $layer_sliders = array();
  $layer_sliders[0]='Select a slider';
  if ($ls) {
    foreach ( $ls as $slider ) {
      $layer_sliders[$slider->id] = $slider->name;	  
    }
  } 
$this->select(	'slider_layer',
				'Select LayerSlider',
				$layer_sliders,
				''
			);

?>


<?php echo __('Select a slider and it will be displayed on top of your page, just bellow the header area. ', 'Nimva'); ?>
</div>