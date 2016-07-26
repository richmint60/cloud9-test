<?php

if ( class_exists( 'WPBakeryShortCode' ) ) {

	add_action( 'vc_before_init', 'nv_set_as_theme' );
	function nv_set_as_theme() {
	    vc_set_as_theme();
	    /* disable updater */
		vc_manager()->disableUpdater(true);
	}

	$awesome_icons_list  = $awesome_icons_list = $button_style = $button_colors = $size_arr = $target_arr = $alignment = $alignment2 = array();

	$settings_row = array ( 'weight' => 50 );
	$settings_text = array ( 'weight' => 49 );
	$settings_icon = array ( 'weight' => 48 );
	$settings_custom_head = array ( 'weight' => 47 );	

	vc_map_update( 'vc_row', $settings_row );
	vc_map_update( 'vc_column_text', $settings_text );
	vc_map_update( 'vc_icon', $settings_icon );
	vc_map_update( 'vc_custom_heading', $settings_custom_head );

	$colors_arr = array(__("Grey", "Nimva") => "wpb_button", __("Blue", "Nimva") => "btn-primary", __("Turquoise", "Nimva") => "btn-info", __("Green", "Nimva") => "btn-success", __("Orange", "Nimva") => "btn-warning", __("Red", "Nimva") => "btn-danger", __("Black", "Nimva") => "btn-inverse");	

	$button_colors = array( __("Red", "Nimva") => "red", __("Dark Red", "Nimva") => "dark_red", __("Light Blue", "Nimva") => "blue", __("Orange", "Nimva") => "orange", __("Turquoise", "Nimva") => "turquoise", __("Emerald", "Nimva") => "emerald", __("Amethyst", "Nimva") => "amethyst", __("Wet Asphalt", "Nimva") => "wet_asphalt", __("Light", "Nimva") => "light", __("Dark", "Nimva") => "dark", __("Transparent Light", "Nimva") => "transparent_light", __("Transparent Dark", "Nimva") => "transparent_dark");

	// Used in "Button" and "Call to Action" blocks
	$size_arr = array( __("Small", "Nimva") => "small", __("Large", "Nimva") => "large");

	$button_style = array( __("Minimal", "Nimva") => "minimal", __("3D", "Nimva") => "3d");

	$target_arr = array(__("Same window", "Nimva") => "_self", __("New window", "Nimva") => "_blank");

	$alignment = array(__("Center", "Nimva") => "center", __("Left", "Nimva") => "left", __("Right", "Nimva") => "right" );

	$alignment2 = array(__("Select", "Nimva") => "", __("Center", "Nimva") => "center", __("Left", "Nimva") => "left", __("Right", "Nimva") => "right" );

	$awesome_icons_list = array (
		'' => '',
	    'fa-glass' => "000",
		'fa-music' => "001",
		'fa-search' => "002",
		'fa-envelope-o' => "003",
		'fa-heart' => "004",
		'fa-star' => "005",
		'fa-star-o' => "006",
		'fa-user' => "007",
		'fa-film' => "008",
		'fa-th-large' => "009",
		'fa-th' => "00a",
		'fa-th-list' => "00b",
		'fa-check' => "00c",
		'fa-times' => "00d",
		'fa-search-plus' => "00e",
		'fa-search-minus' => "010",
		'fa-power-off' => "011",
		'fa-signal' => "012",
		'fa-cog' => "013",
		'fa-trash-o' => "014",
		'fa-home' => "015",
		'fa-file-o' => "016",
		'fa-clock-o' => "017",
		'fa-road' => "018",
		'fa-download' => "019",
		'fa-arrow-circle-o-down' => "01a",
		'fa-arrow-circle-o-up' => "01b",
		'fa-inbox' => "01c",
		'fa-play-circle-o' => "01d",
		'fa-repeat' => "01e",
		'fa-refresh' => "021",
		'fa-list-alt' => "022",
		'fa-lock' => "023",
		'fa-flag' => "024",
		'fa-headphones' => "025",
		'fa-volume-off' => "026",
		'fa-volume-down' => "027",
		'fa-volume-up' => "028",
		'fa-qrcode' => "029",
		'fa-barcode' => "02a",
		'fa-tag' => "02b",
		'fa-tags' => "02c",
		'fa-book' => "02d",
		'fa-bookmark' => "02e",
		'fa-print' => "02f",
		'fa-camera' => "030",
		'fa-font' => "031",
		'fa-bold' => "032",
		'fa-italic' => "033",
		'fa-text-height' => "034",
		'fa-text-width' => "035",
		'fa-align-left' => "036",
		'fa-align-center' => "037",
		'fa-align-right' => "038",
		'fa-align-justify' => "039",
		'fa-list' => "03a",
		'fa-outdent' => "03b",
		'fa-indent' => "03c",
		'fa-video-camera' => "03d",
		'fa-picture-o' => "03e",
		'fa-pencil' => "040",
		'fa-map-marker' => "041",
		'fa-adjust' => "042",
		'fa-tint' => "043",
		'fa-pencil-square-o' => "044",
		'fa-share-square-o' => "045",
		'fa-check-square-o' => "046",
		'fa-arrows' => "047",
		'fa-step-backward' => "048",
		'fa-fast-backward' => "049",
		'fa-backward' => "04a",
		'fa-play' => "04b",
		'fa-pause' => "04c",
		'fa-stop' => "04d",
		'fa-forward' => "04e",
		'fa-fast-forward' => "050",
		'fa-step-forward' => "051",
		'fa-eject' => "052",
		'fa-chevron-left' => "053",
		'fa-chevron-right' => "054",
		'fa-plus-circle' => "055",
		'fa-minus-circle' => "056",
		'fa-times-circle' => "057",
		'fa-check-circle' => "058",
		'fa-question-circle' => "059",
		'fa-info-circle' => "05a",
		'fa-crosshairs' => "05b",
		'fa-times-circle-o' => "05c",
		'fa-check-circle-o' => "05d",
		'fa-ban' => "05e",
		'fa-arrow-left' => "060",
		'fa-arrow-right' => "061",
		'fa-arrow-up' => "062",
		'fa-arrow-down' => "063",
		'fa-share' => "064",
		'fa-expand' => "065",
		'fa-compress' => "066",
		'fa-plus' => "067",
		'fa-minus' => "068",
		'fa-asterisk' => "069",
		'fa-exclamation-circle' => "06a",
		'fa-gift' => "06b",
		'fa-leaf' => "06c",
		'fa-fire' => "06d",
		'fa-eye' => "06e",
		'fa-eye-slash' => "070",
		'fa-exclamation-triangle' => "071",
		'fa-plane' => "072",
		'fa-calendar' => "073",
		'fa-random' => "074",
		'fa-comment' => "075",
		'fa-magnet' => "076",
		'fa-chevron-up' => "077",
		'fa-chevron-down' => "078",
		'fa-retweet' => "079",
		'fa-shopping-cart' => "07a",
		'fa-folder' => "07b",
		'fa-folder-open' => "07c",
		'fa-arrows-v' => "07d",
		'fa-arrows-h' => "07e",
		'fa-bar-chart' => "080",
		'fa-twitter-square' => "081",
		'fa-facebook-square' => "082",
		'fa-camera-retro' => "083",
		'fa-key' => "084",
		'fa-cogs' => "085",
		'fa-comments' => "086",
		'fa-thumbs-o-up' => "087",
		'fa-thumbs-o-down' => "088",
		'fa-star-half' => "089",
		'fa-heart-o' => "08a",
		'fa-sign-out' => "08b",
		'fa-linkedin-square' => "08c",
		'fa-thumb-tack' => "08d",
		'fa-external-link' => "08e",
		'fa-sign-in' => "090",
		'fa-trophy' => "091",
		'fa-github-square' => "092",
		'fa-upload' => "093",
		'fa-lemon-o' => "094",
		'fa-phone' => "095",
		'fa-square-o' => "096",
		'fa-bookmark-o' => "097",
		'fa-phone-square' => "098",
		'fa-twitter' => "099",
		'fa-facebook' => "09a",
		'fa-github' => "09b",
		'fa-unlock' => "09c",
		'fa-credit-card' => "09d",
		'fa-rss' => "09e",
		'fa-hdd-o' => "0a0",
		'fa-bullhorn' => "0a1",
		'fa-bell' => "0f3",
		'fa-certificate' => "0a3",
		'fa-hand-o-right' => "0a4",
		'fa-hand-o-left' => "0a5",
		'fa-hand-o-up' => "0a6",
		'fa-hand-o-down' => "0a7",
		'fa-arrow-circle-left' => "0a8",
		'fa-arrow-circle-right' => "0a9",
		'fa-arrow-circle-up' => "0aa",
		'fa-arrow-circle-down' => "0ab",
		'fa-globe' => "0ac",
		'fa-wrench' => "0ad",
		'fa-tasks' => "0ae",
		'fa-filter' => "0b0",
		'fa-briefcase' => "0b1",
		'fa-arrows-alt' => "0b2",
		'fa-users' => "0c0",
		'fa-link' => "0c1",
		'fa-cloud' => "0c2",
		'fa-flask' => "0c3",
		'fa-scissors' => "0c4",
		'fa-files-o' => "0c5",
		'fa-paperclip' => "0c6",
		'fa-floppy-o' => "0c7",
		'fa-square' => "0c8",
		'fa-bars' => "0c9",
		'fa-list-ul' => "0ca",
		'fa-list-ol' => "0cb",
		'fa-strikethrough' => "0cc",
		'fa-underline' => "0cd",
		'fa-table' => "0ce",
		'fa-magic' => "0d0",
		'fa-truck' => "0d1",
		'fa-pinterest' => "0d2",
		'fa-pinterest-square' => "0d3",
		'fa-google-plus-square' => "0d4",
		'fa-google-plus' => "0d5",
		'fa-money' => "0d6",
		'fa-caret-down' => "0d7",
		'fa-caret-up' => "0d8",
		'fa-caret-left' => "0d9",
		'fa-caret-right' => "0da",
		'fa-columns' => "0db",
		'fa-sort' => "0dc",
		'fa-sort-desc' => "0dd",
		'fa-sort-asc' => "0de",
		'fa-envelope' => "0e0",
		'fa-linkedin' => "0e1",
		'fa-undo' => "0e2",
		'fa-gavel' => "0e3",
		'fa-tachometer' => "0e4",
		'fa-comment-o' => "0e5",
		'fa-comments-o' => "0e6",
		'fa-bolt' => "0e7",
		'fa-sitemap' => "0e8",
		'fa-umbrella' => "0e9",
		'fa-clipboard' => "0ea",
		'fa-lightbulb-o' => "0eb",
		'fa-exchange' => "0ec",
		'fa-cloud-download' => "0ed",
		'fa-cloud-upload' => "0ee",
		'fa-user-md' => "0f0",
		'fa-stethoscope' => "0f1",
		'fa-suitcase' => "0f2",
		'fa-bell-o' => "0a2",
		'fa-coffee' => "0f4",
		'fa-cutlery' => "0f5",
		'fa-file-text-o' => "0f6",
		'fa-building-o' => "0f7",
		'fa-hospital-o' => "0f8",
		'fa-ambulance' => "0f9",
		'fa-medkit' => "0fa",
		'fa-fighter-jet' => "0fb",
		'fa-beer' => "0fc",
		'fa-h-square' => "0fd",
		'fa-plus-square' => "0fe",
		'fa-angle-double-left' => "100",
		'fa-angle-double-right' => "101",
		'fa-angle-double-up' => "102",
		'fa-angle-double-down' => "103",
		'fa-angle-left' => "104",
		'fa-angle-right' => "105",
		'fa-angle-up' => "106",
		'fa-angle-down' => "107",
		'fa-desktop' => "108",
		'fa-laptop' => "109",
		'fa-tablet' => "10a",
		'fa-mobile' => "10b",
		'fa-circle-o' => "10c",
		'fa-quote-left' => "10d",
		'fa-quote-right' => "10e",
		'fa-spinner' => "110",
		'fa-circle' => "111",
		'fa-reply' => "112",
		'fa-github-alt' => "113",
		'fa-folder-o' => "114",
		'fa-folder-open-o' => "115",
		'fa-smile-o' => "118",
		'fa-frown-o' => "119",
		'fa-meh-o' => "11a",
		'fa-gamepad' => "11b",
		'fa-keyboard-o' => "11c",
		'fa-flag-o' => "11d",
		'fa-flag-checkered' => "11e",
		'fa-terminal' => "120",
		'fa-code' => "121",
		'fa-reply-all' => "122",
		'fa-star-half-o' => "123",
		'fa-location-arrow' => "124",
		'fa-crop' => "125",
		'fa-code-fork' => "126",
		'fa-chain-broken' => "127",
		'fa-question' => "128",
		'fa-info' => "129",
		'fa-exclamation' => "12a",
		'fa-superscript' => "12b",
		'fa-subscript' => "12c",
		'fa-eraser' => "12d",
		'fa-puzzle-piece' => "12e",
		'fa-microphone' => "130",
		'fa-microphone-slash' => "131",
		'fa-shield' => "132",
		'fa-calendar-o' => "133",
		'fa-fire-extinguisher' => "134",
		'fa-rocket' => "135",
		'fa-maxcdn' => "136",
		'fa-chevron-circle-left' => "137",
		'fa-chevron-circle-right' => "138",
		'fa-chevron-circle-up' => "139",
		'fa-chevron-circle-down' => "13a",
		'fa-html5' => "13b",
		'fa-css3' => "13c",
		'fa-anchor' => "13d",
		'fa-unlock-alt' => "13e",
		'fa-bullseye' => "140",
		'fa-ellipsis-h' => "141",
		'fa-ellipsis-v' => "142",
		'fa-rss-square' => "143",
		'fa-play-circle' => "144",
		'fa-ticket' => "145",
		'fa-minus-square' => "146",
		'fa-minus-square-o' => "147",
		'fa-level-up' => "148",
		'fa-level-down' => "149",
		'fa-check-square' => "14a",
		'fa-pencil-square' => "14b",
		'fa-external-link-square' => "14c",
		'fa-share-square' => "14d",
		'fa-compass' => "14e",
		'fa-caret-square-o-down' => "150",
		'fa-caret-square-o-up' => "151",
		'fa-caret-square-o-right' => "152",
		'fa-eur' => "153",
		'fa-gbp' => "154",
		'fa-usd' => "155",
		'fa-inr' => "156",
		'fa-jpy' => "157",
		'fa-rub' => "158",
		'fa-krw' => "159",
		'fa-btc' => "15a",
		'fa-file' => "15b",
		'fa-file-text' => "15c",
		'fa-sort-alpha-asc' => "15d",
		'fa-sort-alpha-desc' => "15e",
		'fa-sort-amount-asc' => "160",
		'fa-sort-amount-desc' => "161",
		'fa-sort-numeric-asc' => "162",
		'fa-sort-numeric-desc' => "163",
		'fa-thumbs-up' => "164",
		'fa-thumbs-down' => "165",
		'fa-youtube-square' => "166",
		'fa-youtube' => "167",
		'fa-xing' => "168",
		'fa-xing-square' => "169",
		'fa-youtube-play' => "16a",
		'fa-dropbox' => "16b",
		'fa-stack-overflow' => "16c",
		'fa-instagram' => "16d",
		'fa-flickr' => "16e",
		'fa-adn' => "170",
		'fa-bitbucket' => "171",
		'fa-bitbucket-square' => "172",
		'fa-tumblr' => "173",
		'fa-tumblr-square' => "174",
		'fa-long-arrow-down' => "175",
		'fa-long-arrow-up' => "176",
		'fa-long-arrow-left' => "177",
		'fa-long-arrow-right' => "178",
		'fa-apple' => "179",
		'fa-windows' => "17a",
		'fa-android' => "17b",
		'fa-linux' => "17c",
		'fa-dribbble' => "17d",
		'fa-skype' => "17e",
		'fa-foursquare' => "180",
		'fa-trello' => "181",
		'fa-female' => "182",
		'fa-male' => "183",
		'fa-gratipay' => "184",
		'fa-sun-o' => "185",
		'fa-moon-o' => "186",
		'fa-archive' => "187",
		'fa-bug' => "188",
		'fa-vk' => "189",
		'fa-weibo' => "18a",
		'fa-renren' => "18b",
		'fa-pagelines' => "18c",
		'fa-stack-exchange' => "18d",
		'fa-arrow-circle-o-right' => "18e",
		'fa-arrow-circle-o-left' => "190",
		'fa-caret-square-o-left' => "191",
		'fa-dot-circle-o' => "192",
		'fa-wheelchair' => "193",
		'fa-vimeo-square' => "194",
		'fa-try' => "195",
		'fa-plus-square-o' => "196",
		'fa-space-shuttle' => "197",
		'fa-slack' => "198",
		'fa-envelope-square' => "199",
		'fa-wordpress' => "19a",
		'fa-openid' => "19b",
		'fa-university' => "19c",
		'fa-graduation-cap' => "19d",
		'fa-yahoo' => "19e",
		'fa-google' => "1a0",
		'fa-reddit' => "1a1",
		'fa-reddit-square' => "1a2",
		'fa-stumbleupon-circle' => "1a3",
		'fa-stumbleupon' => "1a4",
		'fa-delicious' => "1a5",
		'fa-digg' => "1a6",
		'fa-pied-piper' => "1a7",
		'fa-pied-piper-alt' => "1a8",
		'fa-drupal' => "1a9",
		'fa-joomla' => "1aa",
		'fa-language' => "1ab",
		'fa-fax' => "1ac",
		'fa-building' => "1ad",
		'fa-child' => "1ae",
		'fa-paw' => "1b0",
		'fa-spoon' => "1b1",
		'fa-cube' => "1b2",
		'fa-cubes' => "1b3",
		'fa-behance' => "1b4",
		'fa-behance-square' => "1b5",
		'fa-steam' => "1b6",
		'fa-steam-square' => "1b7",
		'fa-recycle' => "1b8",
		'fa-car' => "1b9",
		'fa-taxi' => "1ba",
		'fa-tree' => "1bb",
		'fa-spotify' => "1bc",
		'fa-deviantart' => "1bd",
		'fa-soundcloud' => "1be",
		'fa-database' => "1c0",
		'fa-file-pdf-o' => "1c1",
		'fa-file-word-o' => "1c2",
		'fa-file-excel-o' => "1c3",
		'fa-file-powerpoint-o' => "1c4",
		'fa-file-image-o' => "1c5",
		'fa-file-archive-o' => "1c6",
		'fa-file-audio-o' => "1c7",
		'fa-file-video-o' => "1c8",
		'fa-file-code-o' => "1c9",
		'fa-vine' => "1ca",
		'fa-codepen' => "1cb",
		'fa-jsfiddle' => "1cc",
		'fa-life-ring' => "1cd",
		'fa-circle-o-notch' => "1ce",
		'fa-rebel' => "1d0",
		'fa-empire' => "1d1",
		'fa-git-square' => "1d2",
		'fa-git' => "1d3",
		'fa-hacker-news' => "1d4",
		'fa-tencent-weibo' => "1d5",
		'fa-qq' => "1d6",
		'fa-weixin' => "1d7",
		'fa-paper-plane' => "1d8",
		'fa-paper-plane-o' => "1d9",
		'fa-history' => "1da",
		'fa-circle-thin' => "1db",
		'fa-header' => "1dc",
		'fa-paragraph' => "1dd",
		'fa-sliders' => "1de",
		'fa-share-alt' => "1e0",
		'fa-share-alt-square' => "1e1",
		'fa-bomb' => "1e2",
		'fa-futbol-o' => "1e3",
		'fa-tty' => "1e4",
		'fa-binoculars' => "1e5",
		'fa-plug' => "1e6",
		'fa-slideshare' => "1e7",
		'fa-twitch' => "1e8",
		'fa-yelp' => "1e9",
		'fa-newspaper-o' => "1ea",
		'fa-wifi' => "1eb",
		'fa-calculator' => "1ec",
		'fa-paypal' => "1ed",
		'fa-google-wallet' => "1ee",
		'fa-cc-visa' => "1f0",
		'fa-cc-mastercard' => "1f1",
		'fa-cc-discover' => "1f2",
		'fa-cc-amex' => "1f3",
		'fa-cc-paypal' => "1f4",
		'fa-cc-stripe' => "1f5",
		'fa-bell-slash' => "1f6",
		'fa-bell-slash-o' => "1f7",
		'fa-trash' => "1f8",
		'fa-copyright' => "1f9",
		'fa-at' => "1fa",
		'fa-eyedropper' => "1fb",
		'fa-paint-brush' => "1fc",
		'fa-birthday-cake' => "1fd",
		'fa-area-chart' => "1fe",
		'fa-pie-chart' => "200",
		'fa-line-chart' => "201",
		'fa-lastfm' => "202",
		'fa-lastfm-square' => "203",
		'fa-toggle-off' => "204",
		'fa-toggle-on' => "205",
		'fa-bicycle' => "206",
		'fa-bus' => "207",
		'fa-ioxhost' => "208",
		'fa-angellist' => "209",
		'fa-cc' => "20a",
		'fa-ils' => "20b",
		'fa-meanpath' => "20c",
		'fa-buysellads' => "20d",
		'fa-connectdevelop' => "20e",
		'fa-dashcube' => "210",
		'fa-forumbee' => "211",
		'fa-leanpub' => "212",
		'fa-sellsy' => "213",
		'fa-shirtsinbulk' => "214",
		'fa-simplybuilt' => "215",
		'fa-skyatlas' => "216",
		'fa-cart-plus' => "217",
		'fa-cart-arrow-down' => "218",
		'fa-diamond' => "219",
		'fa-ship' => "21a",
		'fa-user-secret' => "21b",
		'fa-motorcycle' => "21c",
		'fa-street-view' => "21d",
		'fa-heartbeat' => "21e",
		'fa-venus' => "221",
		'fa-mars' => "222",
		'fa-mercury' => "223",
		'fa-transgender' => "224",
		'fa-transgender-alt' => "225",
		'fa-venus-double' => "226",
		'fa-mars-double' => "227",
		'fa-venus-mars' => "228",
		'fa-mars-stroke' => "229",
		'fa-mars-stroke-v' => "22a",
		'fa-mars-stroke-h' => "22b",
		'fa-neuter' => "22c",
		'fa-genderless' => "22d",
		'fa-facebook-official' => "230",
		'fa-pinterest-p' => "231",
		'fa-whatsapp' => "232",
		'fa-server' => "233",
		'fa-user-plus' => "234",
		'fa-user-times' => "235",
		'fa-bed' => "236",
		'fa-viacoin' => "237",
		'fa-train' => "238",
		'fa-subway' => "239",
		'fa-medium' => "23a",
		'fa-y-combinator' => "23b",
		'fa-optin-monster' => "23c",
		'fa-opencart' => "23d",
		'fa-expeditedssl' => "23e",
		'fa-battery-full' => "240",
		'fa-battery-three-quarters' => "241",
		'fa-battery-half' => "242",
		'fa-battery-quarter' => "243",
		'fa-battery-empty' => "244",
		'fa-mouse-pointer' => "245",
		'fa-i-cursor' => "246",
		'fa-object-group' => "247",
		'fa-object-ungroup' => "248",
		'fa-sticky-note' => "249",
		'fa-sticky-note-o' => "24a",
		'fa-cc-jcb' => "24b",
		'fa-cc-diners-club' => "24c",
		'fa-clone' => "24d",
		'fa-balance-scale' => "24e",
		'fa-hourglass-o' => "250",
		'fa-hourglass-start' => "251",
		'fa-hourglass-half' => "252",
		'fa-hourglass-end' => "253",
		'fa-hourglass' => "254",
		'fa-hand-rock-o' => "255",
		'fa-hand-paper-o' => "256",
		'fa-hand-scissors-o' => "257",
		'fa-hand-lizard-o' => "258",
		'fa-hand-spock-o' => "259",
		'fa-hand-pointer-o' => "25a",
		'fa-hand-peace-o' => "25b",
		'fa-trademark' => "25c",
		'fa-registered' => "25d",
		'fa-creative-commons' => "25e",
		'fa-gg' => "260",
		'fa-gg-circle' => "261",
		'fa-tripadvisor' => "262",
		'fa-odnoklassniki' => "263",
		'fa-odnoklassniki-square' => "264",
		'fa-get-pocket' => "265",
		'fa-wikipedia-w' => "266",
		'fa-safari' => "267",
		'fa-chrome' => "268",
		'fa-firefox' => "269",
		'fa-opera' => "26a",
		'fa-internet-explorer' => "26b",
		'fa-television' => "26c",
		'fa-contao' => "26d",
		'fa-500px' => "26e",
		'fa-amazon' => "270",
		'fa-calendar-plus-o' => "271",
		'fa-calendar-minus-o' => "272",
		'fa-calendar-times-o' => "273",
		'fa-calendar-check-o' => "274",
		'fa-industry' => "275",
		'fa-map-pin' => "276",
		'fa-map-signs' => "277",
		'fa-map-o' => "278",
		'fa-map' => "279",
		'fa-commenting' => "27a",
		'fa-commenting-o' => "27b",
		'fa-houzz' => "27c",
		'fa-vimeo' => "27d",
		'fa-black-tie' => "27e",
		'fa-fonticons' => "280",
		'fa-reddit-alien' => "281",
		'fa-edge' => "282",
		'fa-credit-card-alt' => "283",
		'fa-codiepie' => "284",
		'fa-modx' => "285",
		'fa-fort-awesome' => "286",
		'fa-usb' => "287",
		'fa-product-hunt' => "288",
		'fa-mixcloud' => "289",
		'fa-scribd' => "28a",
		'fa-pause-circle' => "28b",
		'fa-pause-circle-o' => "28c",
		'fa-stop-circle' => "28d",
		'fa-stop-circle-o' => "28e",
		'fa-shopping-bag' => "290",
		'fa-shopping-basket' => "291",
		'fa-hashtag' => "292",
		'fa-bluetooth' => "293",
		'fa-bluetooth-b' => "294",
		'fa-percent' => "295"	
	);

	/*
	Add Range Option to Visual Composer Params
	*/
	if (function_exists('add_shortcode_param')) {
	    add_shortcode_param('range', 'mk_range_settings_field');
	}

	function mk_range_settings_field($settings, $value) {
	    $dependency = vc_generate_dependencies_attributes($settings);
	    $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
	    $type = isset($settings['type']) ? $settings['type'] : '';
	    $min = isset($settings['min']) ? $settings['min'] : '';
	    $max = isset($settings['max']) ? $settings['max'] : '';
	    $step = isset($settings['step']) ? $settings['step'] : '';   
	    //$unit = isset($settings['unit']) ? $settings['unit'] : '';
	    //$uniqeID = uniqid();
	    $output = '';
	    
	    					
	    $output .= '<div class="js_range">';
	    	$output .= '<input type="text" name="' . $param_name . '" id="' . $param_name . '" value="'.$value.'" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' mini" />';
	    	$output .= '<div id="'.$param_name.'-slider" class="smof_sliderui" style="margin-left: 7px;" data-id="'.$param_name.'" data-val="'.$value.'" data-min="'.$min.'" data-max="'.$max.'" data-step="'.$step.'" ></div>';
	    $output .= '</div>';

	    $output .= '<script type="text/javascript">
	    	mk_range_input();
			</script>';
	    					
	    return $output;
	}

	/*
	Add Toggle Option to Visual Composer Params
	*/
	if (function_exists('add_shortcode_param')) {
	    add_shortcode_param('switch', 'switch_function');
	}
	function switch_function($settings, $value) {
	    $dependency = vc_generate_dependencies_attributes($settings);
	    $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
	    $type = isset($settings['type']) ? $settings['type'] : '';
	    $output = '';

	    $output .= '<div class="composer_switch">';
	    	$output .= '<p class="switch-options">';
	    		$output .= '<label class="cb-enable " data-id="'.$param_name.'"><span>On</span></label>';
	    		$output .= '<label class="cb-disable " data-id="'.$param_name.'"><span>Off</span></label>';
	    		
	    		$output .= '<input type="hidden" class="wpb_vc_param_value '.$param_name.' '.$type.'" value="'.$value.'" name="'.$param_name.'"/>';
	    		
	    	$output .= '</p>';	
	    $output .= '</div>';
	    
	    $output.= '<script type="text/javascript">

	        js_composer_switch();

	    </script>';
	    
	    return $output;
	}

	/*
	Add Old FontAwesome Select Box to Visual Composer Params
	*/
	if (function_exists('add_shortcode_param')) {
	    add_shortcode_param('awesome_icons', 'awesome_icons_function');
	}

	function awesome_icons_function ($settings, $value) {

		$dependency = vc_generate_dependencies_attributes($settings);
	    $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
	    $type = isset($settings['type']) ? $settings['type'] : '';
	    $encoding = isset($settings['encoding']) ? $settings['encoding'] : '';	   
	    $output = '';

		$output .= '<input autocomplete="off" size="60" placeholder="Type Icon Name to Filter" type="text" class="page-composer-icon-filter" value="" name="icon-filter-by-name" />';
		$output .= '<div class="mk-visual-selector mk-font-icons-wrapper">';
		foreach ( $settings['value'] as $key => $val ) {	    
		    $output .= '<a href="#" title="Class Name : '.$key.'" rel="'.$key.'"><span>'.$key.'</span><i class="fa '.$key.'" ></i></a>';	   
		}


		$output .= '<input name="'.$param_name.'" id="'.$param_name.'" class="wpb_vc_param_value '.$param_name.' '.$type.'" type="hidden" value="'.$value.'"/>';
		$output .= '</div>';

		$output.= '<script type="text/javascript">
			
			visual_selector();
			icon_filter_name();
			
			</script>';

		return $output;
	}

	/*
	Add MultiSelect Option to Visual Composer Params
	*/
	if (function_exists('add_shortcode_param')) {
	    add_shortcode_param('multiselect', 'multiselect_param_field');
	}
	function multiselect_param_field($settings, $value)
	{
	    $dependency = vc_generate_dependencies_attributes($settings);
	    $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
	    $type       = isset($settings['type']) ? $settings['type'] : '';
	   // $options    = isset($settings['options']) ? $settings['options'] : '';
	    $output     = '';
	    //$uniqeID    = uniqid();

	    $output .= '<select multiple="multiple" name="' . $param_name . '" id="multiselect-' . $param_name . '" style="width:100%" ' . $dependency . ' class="wpb-multiselect ' . $dependency . ' wpb_vc_param_value ' . $param_name . ' ' . $type . '">';
	    if ($settings['value'] != null && !empty($settings['value'])) {
	        foreach ($settings['value'] as $key => $option) {
	            $selected = '';
	            if(is_array($value) ) {
	            	if (in_array($key, $value)) {
		                $selected = ' selected="selected"';
		            }
	            }
	            else{
		            if (in_array($key, explode(',', $value))) {
		                $selected = ' selected="selected"';
		            }
		        }
	            $output .= '<option value="' . $key . '"' . $selected . '>' . $option . '</option>';
	        }
	    }
	    $output .= '</select>';

	    $output .= '<script type="text/javascript">

	        jQuery("#multiselect-' . $param_name . '").chosen();

	    </script>';

	    return $output;
	}

	/*
	Add Visual Selector Option to Visual Composer Params
	*/
	if (function_exists('add_shortcode_param')) {
	    add_shortcode_param('visual_selector', 'visual_selector_param_field');
	}
	function visual_selector_param_field($settings, $value) {
	    $dependency = vc_generate_dependencies_attributes($settings);
	    $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
	    
	    //$border     = isset($settings['border']) ? $settings['border'] : '';
	    $class = isset($settings['class']) ? $settings['class'] : '';
	    $type = isset($settings['type']) ? $settings['type'] : '';
	    $options = isset($settings['value']) ? $settings['value'] : '';
	    $output = '';
	    $uniqeID = uniqid();
	    
	    //$border_css = ($border == 'true') ? 'border:1px solid #ddd;' : '';
	    
	    $output.= '<div class="mk-visual-selector patterns' . $class . '" id="visual-selector' . $uniqeID . '">';
	    foreach ($options as $key => $option) {
	        $output.= '<a href="#" style="margin:15px 15px 0 0; border:1px solid #ddd;" rel="' . $option . '"><img  src="' . get_template_directory_uri() . '/images/' . $key . '" /></a>';
	    }
	    $output.= '<input name="' . $param_name . '" id="' . $param_name . '" ' . $dependency . ' class="wpb_vc_param_value ' . $param_name . ' ' . $type . '" type="hidden" value="' . $value . '"/>';
	    $output.= '</div>';
	    
	    $output.= '<script type="text/javascript">

	        visual_selector();

	    </script>';
	    
	    return $output;
	}
}