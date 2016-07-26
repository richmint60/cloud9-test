<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{				
        //Register sidebar options for blog/portfolio/woocommerce category/archive pages
        global $wp_registered_sidebars;
        $sidebar_options[] = 'None';
        for($i=0;$i<1;$i++){
            $sidebars = $wp_registered_sidebars;// sidebar_generator::get_sidebars();
            //var_dump($sidebars);
            if(is_array($sidebars) && !empty($sidebars)){
                foreach($sidebars as $sidebar){
                    $sidebar_options[] = $sidebar['name'];
                }
            }
            $sidebars = sidebar_generator::get_sidebars();
            if(is_array($sidebars) && !empty($sidebars)){
                foreach($sidebars as $key => $value){
                    $sidebar_options[] = $value;
                }
            }
        }
        // End
		
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		$of_options_columns = array("col_one_fourth" => "Four Columns", "col_one_third" => "Three Columns", "col_half" => "Two Columns");
		$of_options_info = array("Left", "Center", "Right"); 
		$of_options_pt = array("Style 1", "Style 2");
		$of_options_effect = array("fade", "scroll", "crossfade", "cover", "cover-fade", "uncover", "uncover-fade");
		$of_options_autoplay = array("true", "false");
		$of_options_tb = array("left", "right");
		$of_options_animation = array("fade", "slide");
		$of_options_direction = array("horizontal", "vertical");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/patterns/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/patterns/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		
		//Pattern overlay reader
		
		$bg_overlay_path = get_stylesheet_directory(). '/images/overlay/'; // change this to where you store your bg images
		$bg_overlay_url = get_template_directory_uri().'/images/overlay/'; // change this to where you store your bg images
		$bg_overlay = array();
		
		if ( is_dir($bg_overlay_path) ) {
		    if ($bg_overlay_dir = opendir($bg_overlay_path) ) { 
		        while ( ($bg_overlay_file = readdir($bg_overlay_dir)) !== false ) {
		            if(stristr($bg_overlay_file, ".png") !== false || stristr($bg_overlay_file, ".jpg") !== false) {
		                $bg_overlay[] = $bg_overlay_url . $bg_overlay_file;
		            }
		        }    
		    }
		}
		
		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 
		
		$font_sizes = array(
			'10' => '10',
			'11' => '11',
			'12' => '12',
			'13' => '13',
			'14' => '14',
			'15' => '15',
			'16' => '16',
			'17' => '17',
			'18' => '18',
			'19' => '19',
			'20' => '20',
			'21' => '21',
			'22' => '22',
			'23' => '23',
			'24' => '24',
			'25' => '25',
			'26' => '26',
			'27' => '27',
			'28' => '28',
			'29' => '29',
			'30' => '30',
			'31' => '31',
			'32' => '32',
			'33' => '33',
			'34' => '34',
			'35' => '35',
			'36' => '36',
			'37' => '37',
			'38' => '38',
			'39' => '39',
			'40' => '40',
			'41' => '41',
			'42' => '42',
		);

		$google_fonts = array(
							"Select Font" => "Select Font",
							"ABeeZee" => "ABeeZee",
							"Abel" => "Abel",
							"Abril Fatface" => "Abril Fatface",
							"Aclonica" => "Aclonica",
							"Acme" => "Acme",
							"Actor" => "Actor",
							"Adamina" => "Adamina",
							"Advent Pro" => "Advent Pro",
							"Aguafina Script" => "Aguafina Script",
							"Akronim" => "Akronim",
							"Aladin" => "Aladin",
							"Aldrich" => "Aldrich",
							"Alef" => "Alef",
							"Alegreya" => "Alegreya",
							"Alegreya SC" => "Alegreya SC",
							"Alegreya Sans" => "Alegreya Sans",
							"Alegreya Sans SC" => "Alegreya Sans SC",
							"Alex Brush" => "Alex Brush",
							"Alfa Slab One" => "Alfa Slab One",
							"Alice" => "Alice",
							"Alike" => "Alike",
							"Alike Angular" => "Alike Angular",
							"Allan" => "Allan",
							"Allerta" => "Allerta",
							"Allerta Stencil" => "Allerta Stencil",
							"Allura" => "Allura",
							"Almendra" => "Almendra",
							"Almendra Display" => "Almendra Display",
							"Almendra SC" => "Almendra SC",
							"Amarante" => "Amarante",
							"Amaranth" => "Amaranth",
							"Amatic SC" => "Amatic SC",
							"Amethysta" => "Amethysta",
							"Anaheim" => "Anaheim",
							"Andada" => "Andada",
							"Andika" => "Andika",
							"Angkor" => "Angkor",
							"Annie Use Your Telescope" => "Annie Use Your Telescope",
							"Anonymous Pro" => "Anonymous Pro",
							"Antic" => "Antic",
							"Antic Didone" => "Antic Didone",
							"Antic Slab" => "Antic Slab",
							"Anton" => "Anton",
							"Arapey" => "Arapey",
							"Arbutus" => "Arbutus",
							"Arbutus Slab" => "Arbutus Slab",
							"Architects Daughter" => "Architects Daughter",
							"Archivo Black" => "Archivo Black",
							"Archivo Narrow" => "Archivo Narrow",
							"Arimo" => "Arimo",
							"Arizonia" => "Arizonia",
							"Armata" => "Armata",
							"Artifika" => "Artifika",
							"Arvo" => "Arvo",
							"Asap" => "Asap",
							"Asset" => "Asset",
							"Astloch" => "Astloch",
							"Asul" => "Asul",
							"Atomic Age" => "Atomic Age",
							"Aubrey" => "Aubrey",
							"Audiowide" => "Audiowide",
							"Autour One" => "Autour One",
							"Average" => "Average",
							"Average Sans" => "Average Sans",
							"Averia Gruesa Libre" => "Averia Gruesa Libre",
							"Averia Libre" => "Averia Libre",
							"Averia Sans Libre" => "Averia Sans Libre",
							"Averia Serif Libre" => "Averia Serif Libre",
							"Bad Script" => "Bad Script",
							"Balthazar" => "Balthazar",
							"Bangers" => "Bangers",
							"Basic" => "Basic",
							"Battambang" => "Battambang",
							"Baumans" => "Baumans",
							"Bayon" => "Bayon",
							"Belgrano" => "Belgrano",
							"Belleza" => "Belleza",
							"BenchNine" => "BenchNine",
							"Bentham" => "Bentham",
							"Berkshire Swash" => "Berkshire Swash",
							"Bevan" => "Bevan",
							"Bigelow Rules" => "Bigelow Rules",
							"Bigshot One" => "Bigshot One",
							"Bilbo" => "Bilbo",
							"Bilbo Swash Caps" => "Bilbo Swash Caps",
							"Bitter" => "Bitter",
							"Black Ops One" => "Black Ops One",
							"Bokor" => "Bokor",
							"Bonbon" => "Bonbon",
							"Boogaloo" => "Boogaloo",
							"Bowlby One" => "Bowlby One",
							"Bowlby One SC" => "Bowlby One SC",
							"Brawler" => "Brawler",
							"Bree Serif" => "Bree Serif",
							"Bubblegum Sans" => "Bubblegum Sans",
							"Bubbler One" => "Bubbler One",
							"Buda" => "Buda",
							"Buenard" => "Buenard",
							"Butcherman" => "Butcherman",
							"Butterfly Kids" => "Butterfly Kids",
							"Cabin" => "Cabin",
							"Cabin Condensed" => "Cabin Condensed",
							"Cabin Sketch" => "Cabin Sketch",
							"Caesar Dressing" => "Caesar Dressing",
							"Cagliostro" => "Cagliostro",
							"Calligraffitti" => "Calligraffitti",
							"Cambo" => "Cambo",
							"Candal" => "Candal",
							"Cantarell" => "Cantarell",
							"Cantata One" => "Cantata One",
							"Cantora One" => "Cantora One",
							"Capriola" => "Capriola",
							"Cardo" => "Cardo",
							"Carme" => "Carme",
							"Carrois Gothic" => "Carrois Gothic",
							"Carrois Gothic SC" => "Carrois Gothic SC",
							"Carter One" => "Carter One",
							"Caudex" => "Caudex",
							"Cedarville Cursive" => "Cedarville Cursive",
							"Ceviche One" => "Ceviche One",
							"Changa One" => "Changa One",
							"Chango" => "Chango",
							"Chau Philomene One" => "Chau Philomene One",
							"Chela One" => "Chela One",
							"Chelsea Market" => "Chelsea Market",
							"Chenla" => "Chenla",
							"Cherry Cream Soda" => "Cherry Cream Soda",
							"Cherry Swash" => "Cherry Swash",
							"Chewy" => "Chewy",
							"Chicle" => "Chicle",
							"Chivo" => "Chivo",
							"Cinzel" => "Cinzel",
							"Cinzel Decorative" => "Cinzel Decorative",
							"Clicker Script" => "Clicker Script",
							"Coda" => "Coda",
							"Coda Caption" => "Coda Caption",
							"Codystar" => "Codystar",
							"Combo" => "Combo",
							"Comfortaa" => "Comfortaa",
							"Coming Soon" => "Coming Soon",
							"Concert One" => "Concert One",
							"Condiment" => "Condiment",
							"Content" => "Content",
							"Contrail One" => "Contrail One",
							"Convergence" => "Convergence",
							"Cookie" => "Cookie",
							"Copse" => "Copse",
							"Corben" => "Corben",
							"Courgette" => "Courgette",
							"Cousine" => "Cousine",
							"Coustard" => "Coustard",
							"Covered By Your Grace" => "Covered By Your Grace",
							"Crafty Girls" => "Crafty Girls",
							"Creepster" => "Creepster",
							"Crete Round" => "Crete Round",
							"Crimson Text" => "Crimson Text",
							"Croissant One" => "Croissant One",
							"Crushed" => "Crushed",
							"Cuprum" => "Cuprum",
							"Cutive" => "Cutive",
							"Cutive Mono" => "Cutive Mono",
							"Damion" => "Damion",
							"Dancing Script" => "Dancing Script",
							"Dangrek" => "Dangrek",
							"Dawning of a New Day" => "Dawning of a New Day",
							"Days One" => "Days One",
							"Delius" => "Delius",
							"Delius Swash Caps" => "Delius Swash Caps",
							"Delius Unicase" => "Delius Unicase",
							"Della Respira" => "Della Respira",
							"Denk One" => "Denk One",
							"Devonshire" => "Devonshire",
							"Didact Gothic" => "Didact Gothic",
							"Diplomata" => "Diplomata",
							"Diplomata SC" => "Diplomata SC",
							"Domine" => "Domine",
							"Donegal One" => "Donegal One",
							"Doppio One" => "Doppio One",
							"Dorsa" => "Dorsa",
							"Dosis" => "Dosis",
							"Dr Sugiyama" => "Dr Sugiyama",
							"Droid Sans" => "Droid Sans",
							"Droid Sans Mono" => "Droid Sans Mono",
							"Droid Serif" => "Droid Serif",
							"Duru Sans" => "Duru Sans",
							"Dynalight" => "Dynalight",
							"EB Garamond" => "EB Garamond",
							"Eagle Lake" => "Eagle Lake",
							"Eater" => "Eater",
							"Economica" => "Economica",
							"Electrolize" => "Electrolize",
							"Elsie" => "Elsie",
							"Elsie Swash Caps" => "Elsie Swash Caps",
							"Emblema One" => "Emblema One",
							"Emilys Candy" => "Emilys Candy",
							"Engagement" => "Engagement",
							"Englebert" => "Englebert",
							"Enriqueta" => "Enriqueta",
							"Erica One" => "Erica One",
							"Esteban" => "Esteban",
							"Euphoria Script" => "Euphoria Script",
							"Ewert" => "Ewert",
							"Exo" => "Exo",
							"Exo 2" => "Exo 2",
							"Expletus Sans" => "Expletus Sans",
							"Fanwood Text" => "Fanwood Text",
							"Fascinate" => "Fascinate",
							"Fascinate Inline" => "Fascinate Inline",
							"Faster One" => "Faster One",
							"Fasthand" => "Fasthand",
							"Fauna One" => "Fauna One",
							"Federant" => "Federant",
							"Federo" => "Federo",
							"Felipa" => "Felipa",
							"Fenix" => "Fenix",
							"Finger Paint" => "Finger Paint",
							"Fjalla One" => "Fjalla One",
							"Fjord One" => "Fjord One",
							"Flamenco" => "Flamenco",
							"Flavors" => "Flavors",
							"Fondamento" => "Fondamento",
							"Fontdiner Swanky" => "Fontdiner Swanky",
							"Forum" => "Forum",
							"Francois One" => "Francois One",
							"Freckle Face" => "Freckle Face",
							"Fredericka the Great" => "Fredericka the Great",
							"Fredoka One" => "Fredoka One",
							"Freehand" => "Freehand",
							"Fresca" => "Fresca",
							"Frijole" => "Frijole",
							"Fruktur" => "Fruktur",
							"Fugaz One" => "Fugaz One",
							"GFS Didot" => "GFS Didot",
							"GFS Neohellenic" => "GFS Neohellenic",
							"Gabriela" => "Gabriela",
							"Gafata" => "Gafata",
							"Galdeano" => "Galdeano",
							"Galindo" => "Galindo",
							"Gentium Basic" => "Gentium Basic",
							"Gentium Book Basic" => "Gentium Book Basic",
							"Geo" => "Geo",
							"Geostar" => "Geostar",
							"Geostar Fill" => "Geostar Fill",
							"Germania One" => "Germania One",
							"Gilda Display" => "Gilda Display",
							"Give You Glory" => "Give You Glory",
							"Glass Antiqua" => "Glass Antiqua",
							"Glegoo" => "Glegoo",
							"Gloria Hallelujah" => "Gloria Hallelujah",
							"Goblin One" => "Goblin One",
							"Gochi Hand" => "Gochi Hand",
							"Gorditas" => "Gorditas",
							"Goudy Bookletter 1911" => "Goudy Bookletter 1911",
							"Graduate" => "Graduate",
							"Grand Hotel" => "Grand Hotel",
							"Gravitas One" => "Gravitas One",
							"Great Vibes" => "Great Vibes",
							"Griffy" => "Griffy",
							"Gruppo" => "Gruppo",
							"Gudea" => "Gudea",
							"Habibi" => "Habibi",
							"Hammersmith One" => "Hammersmith One",
							"Hanalei" => "Hanalei",
							"Hanalei Fill" => "Hanalei Fill",
							"Handlee" => "Handlee",
							"Hanuman" => "Hanuman",
							"Happy Monkey" => "Happy Monkey",
							"Headland One" => "Headland One",
							"Henny Penny" => "Henny Penny",
							"Herr Von Muellerhoff" => "Herr Von Muellerhoff",
							"Holtwood One SC" => "Holtwood One SC",
							"Homemade Apple" => "Homemade Apple",
							"Homenaje" => "Homenaje",
							"IM Fell DW Pica" => "IM Fell DW Pica",
							"IM Fell DW Pica SC" => "IM Fell DW Pica SC",
							"IM Fell Double Pica" => "IM Fell Double Pica",
							"IM Fell Double Pica SC" => "IM Fell Double Pica SC",
							"IM Fell English" => "IM Fell English",
							"IM Fell English SC" => "IM Fell English SC",
							"IM Fell French Canon" => "IM Fell French Canon",
							"IM Fell French Canon SC" => "IM Fell French Canon SC",
							"IM Fell Great Primer" => "IM Fell Great Primer",
							"IM Fell Great Primer SC" => "IM Fell Great Primer SC",
							"Iceberg" => "Iceberg",
							"Iceland" => "Iceland",
							"Imprima" => "Imprima",
							"Inconsolata" => "Inconsolata",
							"Inder" => "Inder",
							"Indie Flower" => "Indie Flower",
							"Inika" => "Inika",
							"Irish Grover" => "Irish Grover",
							"Istok Web" => "Istok Web",
							"Italiana" => "Italiana",
							"Italianno" => "Italianno",
							"Jacques Francois" => "Jacques Francois",
							"Jacques Francois Shadow" => "Jacques Francois Shadow",
							"Jim Nightshade" => "Jim Nightshade",
							"Jockey One" => "Jockey One",
							"Jolly Lodger" => "Jolly Lodger",
							"Josefin Sans" => "Josefin Sans",
							"Josefin Slab" => "Josefin Slab",
							"Joti One" => "Joti One",
							"Judson" => "Judson",
							"Julee" => "Julee",
							"Julius Sans One" => "Julius Sans One",
							"Junge" => "Junge",
							"Jura" => "Jura",
							"Just Another Hand" => "Just Another Hand",
							"Just Me Again Down Here" => "Just Me Again Down Here",
							"Kameron" => "Kameron",
							"Kantumruy" => "Kantumruy",
							"Karla" => "Karla",
							"Kaushan Script" => "Kaushan Script",
							"Kavoon" => "Kavoon",
							"Kdam Thmor" => "Kdam Thmor",
							"Keania One" => "Keania One",
							"Kelly Slab" => "Kelly Slab",
							"Kenia" => "Kenia",
							"Khmer" => "Khmer",
							"Kite One" => "Kite One",
							"Knewave" => "Knewave",
							"Kotta One" => "Kotta One",
							"Koulen" => "Koulen",
							"Kranky" => "Kranky",
							"Kreon" => "Kreon",
							"Kristi" => "Kristi",
							"Krona One" => "Krona One",
							"La Belle Aurore" => "La Belle Aurore",
							"Lancelot" => "Lancelot",
							"Lato" => "Lato",
							"League Script" => "League Script",
							"Leckerli One" => "Leckerli One",
							"Ledger" => "Ledger",
							"Lekton" => "Lekton",
							"Lemon" => "Lemon",
							"Libre Baskerville" => "Libre Baskerville",
							"Life Savers" => "Life Savers",
							"Lilita One" => "Lilita One",
							"Lily Script One" => "Lily Script One",
							"Limelight" => "Limelight",
							"Linden Hill" => "Linden Hill",
							"Lobster" => "Lobster",
							"Lobster Two" => "Lobster Two",
							"Londrina Outline" => "Londrina Outline",
							"Londrina Shadow" => "Londrina Shadow",
							"Londrina Sketch" => "Londrina Sketch",
							"Londrina Solid" => "Londrina Solid",
							"Lora" => "Lora",
							"Love Ya Like A Sister" => "Love Ya Like A Sister",
							"Loved by the King" => "Loved by the King",
							"Lovers Quarrel" => "Lovers Quarrel",
							"Luckiest Guy" => "Luckiest Guy",
							"Lusitana" => "Lusitana",
							"Lustria" => "Lustria",
							"Macondo" => "Macondo",
							"Macondo Swash Caps" => "Macondo Swash Caps",
							"Magra" => "Magra",
							"Maiden Orange" => "Maiden Orange",
							"Mako" => "Mako",
							"Marcellus" => "Marcellus",
							"Marcellus SC" => "Marcellus SC",
							"Marck Script" => "Marck Script",
							"Margarine" => "Margarine",
							"Marko One" => "Marko One",
							"Marmelad" => "Marmelad",
							"Marvel" => "Marvel",
							"Mate" => "Mate",
							"Mate SC" => "Mate SC",
							"Maven Pro" => "Maven Pro",
							"McLaren" => "McLaren",
							"Meddon" => "Meddon",
							"MedievalSharp" => "MedievalSharp",
							"Medula One" => "Medula One",
							"Megrim" => "Megrim",
							"Meie Script" => "Meie Script",
							"Merienda" => "Merienda",
							"Merienda One" => "Merienda One",
							"Merriweather" => "Merriweather",
							"Merriweather Sans" => "Merriweather Sans",
							"Metal" => "Metal",
							"Metal Mania" => "Metal Mania",
							"Metamorphous" => "Metamorphous",
							"Metrophobic" => "Metrophobic",
							"Michroma" => "Michroma",
							"Milonga" => "Milonga",
							"Miltonian" => "Miltonian",
							"Miltonian Tattoo" => "Miltonian Tattoo",
							"Miniver" => "Miniver",
							"Miss Fajardose" => "Miss Fajardose",
							"Modern Antiqua" => "Modern Antiqua",
							"Molengo" => "Molengo",
							"Molle" => "Molle",
							"Monda" => "Monda",
							"Monofett" => "Monofett",
							"Monoton" => "Monoton",
							"Monsieur La Doulaise" => "Monsieur La Doulaise",
							"Montaga" => "Montaga",
							"Montez" => "Montez",
							"Montserrat" => "Montserrat",
							"Montserrat Alternates" => "Montserrat Alternates",
							"Montserrat Subrayada" => "Montserrat Subrayada",
							"Moul" => "Moul",
							"Moulpali" => "Moulpali",
							"Mountains of Christmas" => "Mountains of Christmas",
							"Mouse Memoirs" => "Mouse Memoirs",
							"Mr Bedfort" => "Mr Bedfort",
							"Mr Dafoe" => "Mr Dafoe",
							"Mr De Haviland" => "Mr De Haviland",
							"Mrs Saint Delafield" => "Mrs Saint Delafield",
							"Mrs Sheppards" => "Mrs Sheppards",
							"Muli" => "Muli",
							"Mystery Quest" => "Mystery Quest",
							"Neucha" => "Neucha",
							"Neuton" => "Neuton",
							"New Rocker" => "New Rocker",
							"News Cycle" => "News Cycle",
							"Niconne" => "Niconne",
							"Nixie One" => "Nixie One",
							"Nobile" => "Nobile",
							"Nokora" => "Nokora",
							"Norican" => "Norican",
							"Nosifer" => "Nosifer",
							"Nothing You Could Do" => "Nothing You Could Do",
							"Noticia Text" => "Noticia Text",
							"Noto Sans" => "Noto Sans",
							"Noto Serif" => "Noto Serif",
							"Nova Cut" => "Nova Cut",
							"Nova Flat" => "Nova Flat",
							"Nova Mono" => "Nova Mono",
							"Nova Oval" => "Nova Oval",
							"Nova Round" => "Nova Round",
							"Nova Script" => "Nova Script",
							"Nova Slim" => "Nova Slim",
							"Nova Square" => "Nova Square",
							"Numans" => "Numans",
							"Nunito" => "Nunito",
							"Odor Mean Chey" => "Odor Mean Chey",
							"Offside" => "Offside",
							"Old Standard TT" => "Old Standard TT",
							"Oldenburg" => "Oldenburg",
							"Oleo Script" => "Oleo Script",
							"Oleo Script Swash Caps" => "Oleo Script Swash Caps",
							"Open Sans" => "Open Sans",
							"Open Sans Condensed" => "Open Sans Condensed",
							"Oranienbaum" => "Oranienbaum",
							"Orbitron" => "Orbitron",
							"Oregano" => "Oregano",
							"Orienta" => "Orienta",
							"Original Surfer" => "Original Surfer",
							"Oswald" => "Oswald",
							"Over the Rainbow" => "Over the Rainbow",
							"Overlock" => "Overlock",
							"Overlock SC" => "Overlock SC",
							"Ovo" => "Ovo",
							"Oxygen" => "Oxygen",
							"Oxygen Mono" => "Oxygen Mono",
							"PT Mono" => "PT Mono",
							"PT Sans" => "PT Sans",
							"PT Sans Caption" => "PT Sans Caption",
							"PT Sans Narrow" => "PT Sans Narrow",
							"PT Serif" => "PT Serif",
							"PT Serif Caption" => "PT Serif Caption",
							"Pacifico" => "Pacifico",
							"Paprika" => "Paprika",
							"Parisienne" => "Parisienne",
							"Passero One" => "Passero One",
							"Passion One" => "Passion One",
							"Pathway Gothic One" => "Pathway Gothic One",
							"Patrick Hand" => "Patrick Hand",
							"Patrick Hand SC" => "Patrick Hand SC",
							"Patua One" => "Patua One",
							"Paytone One" => "Paytone One",
							"Peralta" => "Peralta",
							"Permanent Marker" => "Permanent Marker",
							"Petit Formal Script" => "Petit Formal Script",
							"Petrona" => "Petrona",
							"Philosopher" => "Philosopher",
							"Piedra" => "Piedra",
							"Pinyon Script" => "Pinyon Script",
							"Pirata One" => "Pirata One",
							"Plaster" => "Plaster",
							"Play" => "Play",
							"Playball" => "Playball",
							"Playfair Display" => "Playfair Display",
							"Playfair Display SC" => "Playfair Display SC",
							"Podkova" => "Podkova",
							"Poiret One" => "Poiret One",
							"Poller One" => "Poller One",
							"Poly" => "Poly",
							"Pompiere" => "Pompiere",
							"Pontano Sans" => "Pontano Sans",
							"Port Lligat Sans" => "Port Lligat Sans",
							"Port Lligat Slab" => "Port Lligat Slab",
							"Prata" => "Prata",
							"Preahvihear" => "Preahvihear",
							"Press Start 2P" => "Press Start 2P",
							"Princess Sofia" => "Princess Sofia",
							"Prociono" => "Prociono",
							"Prosto One" => "Prosto One",
							"Puritan" => "Puritan",
							"Purple Purse" => "Purple Purse",
							"Quando" => "Quando",
							"Quantico" => "Quantico",
							"Quattrocento" => "Quattrocento",
							"Quattrocento Sans" => "Quattrocento Sans",
							"Questrial" => "Questrial",
							"Quicksand" => "Quicksand",
							"Quintessential" => "Quintessential",
							"Qwigley" => "Qwigley",
							"Racing Sans One" => "Racing Sans One",
							"Radley" => "Radley",
							"Raleway" => "Raleway",
							"Raleway Dots" => "Raleway Dots",
							"Rambla" => "Rambla",
							"Rammetto One" => "Rammetto One",
							"Ranchers" => "Ranchers",
							"Rancho" => "Rancho",
							"Rationale" => "Rationale",
							"Redressed" => "Redressed",
							"Reenie Beanie" => "Reenie Beanie",
							"Revalia" => "Revalia",
							"Ribeye" => "Ribeye",
							"Ribeye Marrow" => "Ribeye Marrow",
							"Righteous" => "Righteous",
							"Risque" => "Risque",
							"Roboto" => "Roboto",
							"Roboto Condensed" => "Roboto Condensed",
							"Roboto Slab" => "Roboto Slab",
							"Rochester" => "Rochester",
							"Rock Salt" => "Rock Salt",
							"Rokkitt" => "Rokkitt",
							"Romanesco" => "Romanesco",
							"Ropa Sans" => "Ropa Sans",
							"Rosario" => "Rosario",
							"Rosarivo" => "Rosarivo",
							"Rouge Script" => "Rouge Script",
							"Rubik Mono One" => "Rubik Mono One",
							"Rubik One" => "Rubik One",
							"Ruda" => "Ruda",
							"Rufina" => "Rufina",
							"Ruge Boogie" => "Ruge Boogie",
							"Ruluko" => "Ruluko",
							"Rum Raisin" => "Rum Raisin",
							"Ruslan Display" => "Ruslan Display",
							"Russo One" => "Russo One",
							"Ruthie" => "Ruthie",
							"Rye" => "Rye",
							"Sacramento" => "Sacramento",
							"Sail" => "Sail",
							"Salsa" => "Salsa",
							"Sanchez" => "Sanchez",
							"Sancreek" => "Sancreek",
							"Sansita One" => "Sansita One",
							"Sarina" => "Sarina",
							"Satisfy" => "Satisfy",
							"Scada" => "Scada",
							"Schoolbell" => "Schoolbell",
							"Seaweed Script" => "Seaweed Script",
							"Sevillana" => "Sevillana",
							"Seymour One" => "Seymour One",
							"Shadows Into Light" => "Shadows Into Light",
							"Shadows Into Light Two" => "Shadows Into Light Two",
							"Shanti" => "Shanti",
							"Share" => "Share",
							"Share Tech" => "Share Tech",
							"Share Tech Mono" => "Share Tech Mono",
							"Shojumaru" => "Shojumaru",
							"Short Stack" => "Short Stack",
							"Siemreap" => "Siemreap",
							"Sigmar One" => "Sigmar One",
							"Signika" => "Signika",
							"Signika Negative" => "Signika Negative",
							"Simonetta" => "Simonetta",
							"Sintony" => "Sintony",
							"Sirin Stencil" => "Sirin Stencil",
							"Six Caps" => "Six Caps",
							"Skranji" => "Skranji",
							"Slackey" => "Slackey",
							"Smokum" => "Smokum",
							"Smythe" => "Smythe",
							"Sniglet" => "Sniglet",
							"Snippet" => "Snippet",
							"Snowburst One" => "Snowburst One",
							"Sofadi One" => "Sofadi One",
							"Sofia" => "Sofia",
							"Sonsie One" => "Sonsie One",
							"Sorts Mill Goudy" => "Sorts Mill Goudy",
							"Source Code Pro" => "Source Code Pro",
							"Source Sans Pro" => "Source Sans Pro",
							"Special Elite" => "Special Elite",
							"Spicy Rice" => "Spicy Rice",
							"Spinnaker" => "Spinnaker",
							"Spirax" => "Spirax",
							"Squada One" => "Squada One",
							"Stalemate" => "Stalemate",
							"Stalinist One" => "Stalinist One",
							"Stardos Stencil" => "Stardos Stencil",
							"Stint Ultra Condensed" => "Stint Ultra Condensed",
							"Stint Ultra Expanded" => "Stint Ultra Expanded",
							"Stoke" => "Stoke",
							"Strait" => "Strait",
							"Sue Ellen Francisco" => "Sue Ellen Francisco",
							"Sunshiney" => "Sunshiney",
							"Supermercado One" => "Supermercado One",
							"Suwannaphum" => "Suwannaphum",
							"Swanky and Moo Moo" => "Swanky and Moo Moo",
							"Syncopate" => "Syncopate",
							"Tangerine" => "Tangerine",
							"Taprom" => "Taprom",
							"Tauri" => "Tauri",
							"Telex" => "Telex",
							"Tenor Sans" => "Tenor Sans",
							"Text Me One" => "Text Me One",
							"The Girl Next Door" => "The Girl Next Door",
							"Tienne" => "Tienne",
							"Tinos" => "Tinos",
							"Titan One" => "Titan One",
							"Titillium Web" => "Titillium Web",
							"Trade Winds" => "Trade Winds",
							"Trocchi" => "Trocchi",
							"Trochut" => "Trochut",
							"Trykker" => "Trykker",
							"Tulpen One" => "Tulpen One",
							"Ubuntu" => "Ubuntu",
							"Ubuntu Condensed" => "Ubuntu Condensed",
							"Ubuntu Mono" => "Ubuntu Mono",
							"Ultra" => "Ultra",
							"Uncial Antiqua" => "Uncial Antiqua",
							"Underdog" => "Underdog",
							"Unica One" => "Unica One",
							"UnifrakturCook" => "UnifrakturCook",
							"UnifrakturMaguntia" => "UnifrakturMaguntia",
							"Unkempt" => "Unkempt",
							"Unlock" => "Unlock",
							"Unna" => "Unna",
							"VT323" => "VT323",
							"Vampiro One" => "Vampiro One",
							"Varela" => "Varela",
							"Varela Round" => "Varela Round",
							"Vast Shadow" => "Vast Shadow",
							"Vibur" => "Vibur",
							"Vidaloka" => "Vidaloka",
							"Viga" => "Viga",
							"Voces" => "Voces",
							"Volkhov" => "Volkhov",
							"Vollkorn" => "Vollkorn",
							"Voltaire" => "Voltaire",
							"Waiting for the Sunrise" => "Waiting for the Sunrise",
							"Wallpoet" => "Wallpoet",
							"Walter Turncoat" => "Walter Turncoat",
							"Warnes" => "Warnes",
							"Wellfleet" => "Wellfleet",
							"Wendy One" => "Wendy One",
							"Wire One" => "Wire One",
							"Yanone Kaffeesatz" => "Yanone Kaffeesatz",
							"Yellowtail" => "Yellowtail",
							"Yeseva One" => "Yeseva One",
							"Yesteryear" => "Yesteryear",
							"Zeyada" => "Zeyada",
						);


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

$of_options[] = array( 	"name" 		=> "Logo",
						"type" 		=> "heading"
				);
/*				
$of_options[] = array( "name" => "Custom Favicon",
					"desc" => "You can put url of an ico image that will represent your website's favicon (16px x 16px)",
					"id" => "favicon",
					"std" => "",
					"type" => "upload");	
					
$of_options[] = array( "name" => "Default Sidebar Position",
					"desc" => "Select the defeault position of the sidebar.",
					"id" => "default_sidebar_pos",
					"std" => "right",
					"options" => array('right' => 'Right', 'left' => 'Left'),
					"type" => "select");

$of_options[] = array( "name" => "Tracking Code",
					"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
					"id" => "google_analytics",
					"std" => "",
					"type" => "textarea");

$of_options[] = array( "name" => "Allow comments on pages",
					"desc" => "Allow comments on regular pages.",
					"id" => "comments_pages",
					"std" => 1,
					"type" => "checkbox");
*/	
$of_options[] = array( 	"name" 		=> "Favicon",
						"desc" 		=> "",
						"id" 		=> "favicon_text",
						"std" 		=> "<h3 style=\"margin: 0;\">Favicon</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
$of_options[] = array(  "name" => "Favicon",
						"desc" => "Upload your custom favicon. Your favicon should be 16x16px. To generate a favicon you can visit <a href=\"http://tools.dynamicdrive.com/favicon/\" target = \"_blank\">Dynamic Drive</a>",
						"id" => "favicon",
						"std" => '',
						"type" => "media");					
				
$of_options[] = array( 	"name" 		=> "Logo Settings",
						"desc" 		=> "",
						"id" 		=> "logo_settings",
						"std" 		=> "<h3 style=\"margin: 0;\">Logo Settings</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);			
$of_options[] = array(  "name" => "Logo",
						"desc" => "Please choose an image file for your logo. <br>IMPORTANT: If no image is used, the default site title text will be used.",
						"id" => "logo",
						"std" => get_bloginfo('template_directory')."/images/logo.png",
						"type" => "media");	
						
$of_options[] = array(  "name" => "Retina Logo",
						"desc" => "Your Retina Logo should be twice the size of your normal logo. For example if your normal logo is: 113x97, your retina logo should be: 226x194 pixels. <br>IMPORTANT: If no image is used, the default site title text will be used.",
						"id" => "logo_retina",
						"std" => get_bloginfo('template_directory')."/images/logo@2x.png",
						"type" => "media");							
					
$of_options[] = array(  "name" => "Logo resize",
						"desc" => "Force logo resize to a specified value",
						"id" => "logo_resize",
						"std" => 1,
						"folds" => 1,
						"type" => "switch");	
						
$of_options[] = array(  "name" => "Logo resize - height value in pixels",
						"desc" => "Set here the logo resize height. Default value: 97",
						"id" => "logo_resize_value",
						"std" => "97",
						"fold" => "logo_resize",
						"type" => "text");
						
$of_options[] = array(  "name" => "Sticky Header Logo ",
						"desc" => "Set here the sticky header logo height in pixels. Use a value that is lower than the height of your logo to create a nice shrinking effect when scrolling. Default value: 70",
						"id" => "sticky_header_logo",
						"std" => "70",
						"type" => "text");												
						
$of_options[] = array( 	"name" 		=> "Text Logo Settings",
						"desc" 		=> "",
						"id" 		=> "text_logo_settings",
						"std" 		=> "<h3 style=\"margin: 0;\">Text Logo Settings</h3>If no image is used for the logo, the default site title text will be used. Use the settings below to customize the text logo.",
						"icon" 		=> true,
						"type" 		=> "info"
				);		
				
$of_options[] = array(  "name" => "Text Logo font family",
						"desc" => "Select a font family for the text logo",
						"id" => "text_logo_font",
						"std" => "Open Sans",
						"type" => "select_google_font",
						"preview" 	=> array(
										"text" => "My Text Logo", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						),
						"options" => $google_fonts);
						
$of_options[] = array(  "name" => "Text Logo font size (px)",
						"desc" => "Default is 26px",
						"id" => "text_logo_font_size",
						"std" => "26",
						"type" => "select",
						"options" => $font_sizes);	
						
$of_options[] = array(  "name" =>  "Text Logo font color",
						"desc" => "",
						"id" => "text_logo_font_color",
						"std" => "#777777",
						"type" => "color");	
						
$of_options[] = array( 	"name" => "Text Logo Margin Top",
						"desc" => "Default is 10px",
						"id" => "text_logo_margin_top",
						"std" => "10",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "50",
						"type" 		=> "sliderui" 
				);
				
$of_options[] = array( 	"name" => "Text Logo Margin Bottom",
						"desc" => "Default is 10px",
						"id" => "text_logo_margin_bottom",
						"std" => "10",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "50",
						"type" 		=> "sliderui" 
				);																																																

$of_options[] = array( 	"name" 		=> "Tagline",
						"desc" 		=> "",
						"id" 		=> "logo_settings",
						"std" 		=> "<h3 style=\"margin: 0;\">Tagline</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array(  "name" => "Show Tagline",
						"desc" => "Only works if there is no image logo used.",
						"id" => "show_tagline",
						"std" => 0,
						"folds" => 1,
						"type" => "switch");
					
$of_options[] = array( 	"name" 		=> "Tagline text",
						"id" 		=> "tagline_text",
						"std" 		=> "Ultimate WordPress Theme.",
						"fold"		=> "show_tagline",
						"type" 		=> "textarea"
				);	
				
$of_options[] = array(  "name" => "Tagline position",
						"desc" => "Select the tagline positioning - this option only works for Header Version 3.",
						"id" => "tagline_pos",
						"std" => "right",
						"fold" => "show_tagline",
						"type" => "select",
						"options" => array('left','right'));

						
$of_options[] = array( 	"name" => "Tagline font size (px)",
						"desc" => "Default is 16px",
						"id" => "tagline_font_size",
						"std" => "16",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "50",
						"fold" 		=> "show_tagline",
						"type" 		=> "sliderui" 
				);						
/*						
$of_options[] = array(  "name" => "Tagline text align",
						"desc" => "",
						"id" => "tagline_text_align",
						"std" => "right",
						"fold" => "show_tagline",
						"type" => "select",
						"options" => array('left','right'));													
*/				
$of_options[] = array(  "name" => "Tagline Font Family",
						"desc" => "Select a font family for the tagline text",
						"id" => "tagline_font",
						"std" => "Open Sans",
						"type" => "select_google_font",
						"fold" 	=> "show_tagline",
						"preview" 	=> array(
										"text" => "Tagline preview text", //this is the text from preview box
										"size" => "20px" //this is the text size from preview box
						),
						"options" => $google_fonts);
						
$of_options[] = array(  "name" =>  "Tagline font Color",
						"desc" => "",
						"id" => "tagline_font_color",
						"std" => "#777777",
						"fold" 	=> "show_tagline",
						"type" => "color");						
						
$of_options[] = array( 	"name" 		=> "Margin Top",
						"desc" 		=> "",
						"id" 		=> "tagline_margin_top",
						"std" 		=> "40",
						"min" 		=> "0",
						"step"		=> "5",
						"max" 		=> "80",
						"fold" 		=> "show_tagline",
						"type" 		=> "sliderui" 
				);
				
$of_options[] = array( 	"name" 		=> "General Settings",
						"type" 		=> "heading"
				);
/*	
$of_options[] = array( 	"name" 		=> "Disable Integrated Visual Composer ",
						"desc" 		=> "Allows you to disable the integrated Visual Composer. Enable this option if you own an original license of Visual Composer and plan to use it.",
						"id" 		=> "disable_visual_composer",
						"std" 		=> 0,
						"type" 		=> "switch"
				);					
*/
$of_options[] = array(  "name" =>  "Website Top Border Width",
						"desc" => "",
						"id" => "wrapper_top_border",
						"std" 		=> "3",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "10",
						"type" 		=> "sliderui");	
						
$of_options[] = array(  "name" =>  "Website Top Border Color",
						"desc" => "",
						"id" => "wrapper_top_border_color",
						"std" => "#f96e5b",
						"type" => "color");				
				
$of_options[] = array(  "name" => "Sidebar Position",
						"desc" => "Select the default Sidebar Position",
						"id" => "sidebar_position",
						"std" => "Right",
						"type" => "select",
						"options" => array(						
							'left' => 'Left',
							'right' => 'Right',
				));	
							
				
$of_options[] = array( 	"name" 		=> "Featured Images",
						"desc" 		=> "How many featured images to be used for posts, pages and portfolio items",
						"id" 		=> "featured_images",
						"std" 		=> "5",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "10",
						"type" 		=> "sliderui" 
				);	
				
$of_options[] = array( 	"name" 		=> "Smooth Scrolling",
						"desc" 		=> "Enable / Disable smooth srolling and styled scrollbar.",
						"id" 		=> "smooth_scrolling",
						"std" 		=> 1,
						"type" 		=> "switch"
				);	
				
$of_options[] = array( 	"name" 		=> "Responsiveness",
						"desc" 		=> "Enable / Disable responsive layout.",
						"id" 		=> "responsive",
						"std" 		=> 1,
						"type" 		=> "switch"
				);		
				
$of_options[] = array( 	"name" 		=> "Tracking Code / Header Code / Body Code",
						"desc" 		=> "",
						"id" 		=> "tracking_code",
						"std" 		=> "<h3 style=\"margin: 0;\">Tracking Code / Header Code / Body Code</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
				
$of_options[] = array(  "name" => "Tracking Code",
						"desc" => "Paste your Google Analytics (or other) tracking code here. Please put code inside script tags.",
						"id" => "tracking_code",
						"std" => '',
						"type" => "textarea");	
						
$of_options[] = array(  "name" => "Code before &lt;/head&gt;",
						"desc" => "Add code before the closing &lt;/head&gt; tag.",
						"id" => "head_code",
						"std" => '',
						"type" => "textarea");	
						
$of_options[] = array(  "name" => "Code before &lt;/body&gt;",
						"desc" => "Add code before the closing &lt;/body&gt; tag.",
						"id" => "body_code",
						"std" => '',
						"type" => "textarea");							

$of_options[] = array( 	"name" 		=> "Top Bar",
						"type" 		=> "heading"
				);	
										
				
$of_options[] = array( "name" => "Header Top Bar Left Content",
					"desc" => "",
					"id" => "header_left_content",
					"std" => "Contact Info",
					"type" => "select",
					"options" => array('contactinfo' => 'Contact Info', 'socialinks' => 'Social Links', 'nav' => 'Top Menu', 'empty' => 'Leave Empty'));	

$of_options[] = array( "name" => "Header Top Bar Right Content",
					"desc" => "",
					"id" => "header_right_content",
					"std" => "Social Links",
					"type" => "select",
					"options" => array('contactinfo' => 'Contact Info', 'socialinks' => 'Social Links', 'nav' => 'Top Menu', 'empty' => 'Leave Empty'));								
	
$of_options[] = array( 	"name" 		=> "Header Contact Info",
						"desc" 		=> "",
						"id" 		=> "header_soc_prof",
						"std" 		=> "<h3 style=\"margin: 0;\">Top Bar Contact Info</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
$of_options[] = array(  "name" => "Phone Number",
						"desc" => "",
						"id" => "header_number",
						"std" => "Call Us Now! 1.555.800.800",
//						"fold" => "header_contact",
						"type" => "text");
						
$of_options[] = array(  "name" => "Phone Number Icon",
						"desc" => "",
						"id" => "header_number_icon",
						"std" => "fa-phone",
//						"fold" => "header_contact",
						"type" => "text");	
						
$of_options[] = array(  "name" => "Email Address",
						"desc" => "",
						"id" => "header_email",
						"std" => "support@rockythemes.com",
//						"fold" => "header_contact",
						"type" => "text");
						
$of_options[] = array(  "name" => "Email Icon",
						"desc" => "",
						"id" => "header_email_icon",
						"std" => "fa-envelope",
//						"fold" => "header_contact",
						"type" => "text");							
						
$of_options[] = array( 	"name" 		=> "Tap to Call Button",
						"desc" 		=> "",
						"id" 		=> "tap_to_call_button",
						"std" 		=> "<h3 style=\"margin: 0;\">Tap to Call Button</h3>This will add a Tap to Call Button, but only on mobile devices - phones!",
						"icon" 		=> true,
						"type" 		=> "info"
				);
								
						
$of_options[] = array(  "name" => "Tap to Call",
						"desc" => "Enable Tap to Call Action",
						"id" => "en_tapcall",
						"std" => 1,
						"folds" => 1,
						"type" => "switch");
					
$of_options[] = array( 	"name" 		=> "Button text",
						"desc"		=> "Enter the text that will appear on the tap to call button",
						"id" 		=> "tapcall_button",
						"std" 		=> "Tap to Call",
						"fold"		=> "en_tapcall",
						"type" 		=> "text"
				);
				
$of_options[] = array(  "name" => "Tap to Call Phone Number",
						"desc" => "Should be the same as the one you enter above",
						"id" => "tapcall_ph_number",
						"std" => "1.555.800.800",
						"fold" => "en_tapcall",
						"type" => "text");	
						
$of_options[] = array(  "name" => "Tap to Call Button Style",
						"desc" => "",
						"id" => "tapcall_style",
						"std" => "minimal",
						"type" => "select",
						"options" => array('minimal' => 'Minimal', '3d' => '3D'));							
						
$of_options[] = array(  "name" => "Tap to Call Button Color",
						"desc" => "Select the color of the Tap to Call button",
						"id" => "tapcall_color",
						"std" => "lightred",
						"type" => "select",
						"options" => array( 'lightred' => 'Light Red',
											'darkred' => 'Dark Red',  
											'orange' => 'Orange',  
											'turquoise' => 'Turquoise',
											'emerald' => 'Emerald',
											'lightblue' => 'Light Blue',
											'amethyst' => 'Amethyst',
											'wetasphalt' => 'Wet Asphalt',
											'light' => 'Light',
											'dark' => 'Dark'
									 ));	
																								
$of_options[] = array(  "name" => "Tap to Call Button Size",
						"desc" => "Select the size of the Tap to Call button",
						"id" => "tapcall_size",
						"std" => "small",
						"type" => "select",
						"options" => array('small' => 'Small', 'large' => 'Large'));


						
$of_options[] = array( 	"name" 		=> "Header Top Bar",
						"desc" 		=> "",
						"id" 		=> "header_top_bar",
						"std" 		=> "<h3 style=\"margin: 0;\">Top Bar Colors</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	

$of_options[] = array(  "name" =>  "Header Top Bar Background Color",
						"desc" => "",
						"id" => "header_contact_bg",
						"std" => "#f7f7f7",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Header Top Bar Border Width",
						"desc" => "",
						"id" => "header_top_bar_bw",
						"std" 		=> "1",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "5",
						"type" 		=> "sliderui");	
						
$of_options[] = array(  "name" =>  "Header Top Bar Border Color",
						"desc" => "",
						"id" => "header_top_bar_bc",
						"std" => "#e8e8e8",
						"type" => "color");							
																										

$of_options[] = array(  "name" =>  "Header Top Bar Text/Link Color",
						"desc" => "",
						"id" => "header_contact_text_color",
						"std" => "#777777",
						"type" => "color");				
						
$of_options[] = array(  "name" =>  "Header Top Bar Link Color Hover",
						"desc" => "",
						"id" => "header_contact_link_color",
						"std" => "#f96e5b",
						"type" => "color");		
						
$of_options[] = array(  "name" =>  "Header Contact Info Separator Color",
						"desc" => "",
						"id" => "header_contact_separator_color",
						"std" => "#e8e8e8",
						"type" => "color");																																																																			

$of_options[] = array( 	"name" 		=> "Header Settings",
						"type" 		=> "heading"
				);
$of_options[] = array( 	"name" 		=> "Header Layout",
						"desc" 		=> "",
						"id" 		=> "header_layout",
						"std" 		=> "<h3 style=\"margin: 0;\">Header Layout</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);				
$of_options[] = array( "name" => "Select a Header Layout",
                    "desc" => "",
                    "id" => "header_layout",
                    "std" => "v1",
                    "type" => "images",
                    "options" => array(
                        "v1" => get_bloginfo('template_directory')."/images/header/header1.jpg",
                        "v2" => get_bloginfo('template_directory')."/images/header/header2.jpg",
						"v3" => get_bloginfo('template_directory')."/images/header/header3.jpg"
                ));	
				
										
				
							
/*
$of_options[] = array( 	"name" 		=> "Header Social Profiles",
						"desc" 		=> "Enable or disable social profiles.",
						"id" 		=> "off_social",
						"std" 		=> 1,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);
*/		
																						

$of_options[] = array( 	"name" 		=> "Header Design Options",
						"desc" 		=> "",
						"id" 		=> "header_design_options",
						"std" 		=> "<h3 style=\"margin: 0;\">Header Design Options</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
				
$of_options[] = array(  "name" =>  "Header Background Color",
						"desc" => "",
						"id" => "header_bg",
						"std" => "#fff",
						"type" => "color");	
						
$of_options[] = array( 	"name" 		=> "Header Background pattern",
						"desc" 		=> "Enable/Disable Header Background Pattern.",
						"id" 		=> "header_bg_pattern_en",
						"std" 		=> 0,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);												

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Select a background pattern for the header.",
						"id" 		=> "header_bg_pattern",
						"std" 		=> $bg_images_url."bg1.png",
						"type" 		=> "tiles",
						"fold"		=> "header_bg_pattern_en",
						"options" 	=> $bg_images,
				);		
				
$of_options[] = array( 	"name" 		=> "Custom Background Image Upload",
						"desc" 		=> "Upload or select an existing image to use for the header background.",
						"id" 		=> "header_custom_bg_image",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"type" 		=> "upload"
				);
				
$of_options[] = array(  "name" => "Header Custom Background Image Repeat",
						"desc" => "",
						"id" => "header_custom_bg_repeat",
						"std" => "2",
						"type" => "select",
						"options" => array('no-repeat' => 'no-repeat', 'repeat' => 'repeat', 'repeat-x' => 'repeat-x', 'repeat-y' => 'repeat-y'));	
						
$of_options[] = array( 	"name" 		=> "Header Top Border",
						"id" 		=> "header_border_top",
						"std" 		=> "0",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "10",
						"type" 		=> "sliderui" 
				);
				
$of_options[] = array(  "name" =>  "Header Top Border Color",
						"desc" => "",
						"id" => "header_border_top_color",
						"std" => "#ccc",
						"type" => "color");					
				
$of_options[] = array( 	"name" 		=> "Header Bottom Border",
						"id" 		=> "header_border_bottom",
						"std" 		=> "1",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "10",
						"type" 		=> "sliderui" 
				);	
				
$of_options[] = array(  "name" =>  "Header Bottom Border Color",
						"desc" => "",
						"id" => "header_border_bottom_color",
						"std" => "#e8e8e8",
						"type" => "color");																							

$of_options[] = array( 	"name" 		=> "Header V2/V3 Design Options",
						"desc" 		=> "",
						"id" 		=> "header_design_options_v2_v3",
						"std" 		=> "<h3 style=\"margin: 0;\">Header V2/V3 Design Options</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
				
$of_options[] = array( 	"name" 		=> "Header V2/V3 Menu Top Border",
						"id" 		=> "header_v23_menu_border_top",
						"std" 		=> "1",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "10",
						"type" 		=> "sliderui" 
				);
				
$of_options[] = array(  "name" =>  "Header V2/V3 Menu Top Border Color",
						"desc" => "",
						"id" => "header_v23_menu_border_top_color",
						"std" => "#e8e8e8",
						"type" => "color");	
						
$of_options[] = array(  "name" => "Header V3 Banner Code",
						"desc" => "Paste here the html code for Header V3. The banner or image will display in Header V3 if the Show Tagline (Logo Options) is turned off",
						"id" => "header_v3_banner",
						"std" => '',
						"type" => "textarea");										

$of_options[] = array( 	"name" 		=> "Header Extra Options",
						"desc" 		=> "",
						"id" 		=> "header_extra_options",
						"std" 		=> "<h3 style=\"margin: 0;\">Header Extra Options</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array( 	"name" 		=> "Sticky Header",
						"desc" 		=> "Enabling this option will allow the header section to become fixed on user scroll.",
						"id" 		=> "floating_header",
						"std" 		=> 1,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Transparent Sticky Header",
						"desc" 		=> "Enabling this option will make the sticky header background transparent, but keeping the background color.",
						"id" 		=> "transp_floating_header",
						"std" 		=> 1,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);	

																
$of_options[] = array(  "name" => "Menu Transparency",
						"desc" => "Enable or disable menu transparency.",
						"id" => "en_menu_transparent",
						"std" => 1,
						"folds" => 1,
						"type" => "switch");							
				
$of_options[] = array( 	"name" 		=> "Header Shadow",
						"desc" 		=> "Enabling this option will add a shadow effect just bellow the header.",
						"id" 		=> "shadow_header",
						"std" 		=> 1,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);				

//Social Media

$of_options[] = array(	"name"		=> "Social Media",
						"type"		=> "heading"
				);

$of_options[] = array( 	"name" 		=> "Header Top Bar Social Profiles",
						"desc" 		=> "",
						"id" 		=> "header_top_bar_soc_prof",
						"std" 		=> "<h3 style=\"margin: 0;\">Header Top Bar Social Profiles</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);		

$of_options[] = array(  "name" =>  "Header Social Profiles Color",
						"desc" => "",
						"id" => "header_sp_color",
						"std" => "#4a4a4a",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Header Social Profiles Background Color Hover",
						"desc" => "",
						"id" => "header_sp_bg_hover",
						"std" => "#f96e5b",
						"type" => "color");	
/*
$of_options[] = array(  "name" => "Header Social Profiles Color Scheme",
						"desc" => "",
						"id" => "social_prof_cs",
						"std" => "dark",
						"type" => "select",
						"options" => array('dark','light'));	
						
$of_options[] = array(  "name" => "Header Social Profiles Color Scheme on Hover",
						"desc" => "",
						"id" => "social_prof_cs_hover",
						"std" => "light",
						"type" => "select",
						"options" => array('dark','light'));				
*/				
$of_options[] = array( 	"name" 		=> "Header Soc Prof",
						"desc" 		=> "",
						"id" 		=> "header_soc_prof",
						"std" 		=> "<h3 style=\"margin: 0;\">Social Profiles</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
		
$of_options[] = array( "name" => "Facebook",
					"desc" => "Place the link to your facebook profile/page. To remove it, just leave it blank.",
					"id" => "facebook_link",
					"std" => "facebook link here",
//					"fold" => "off_social",
					"type" => "text");	

$of_options[] = array( "name" => "Twitter",
					"desc" => "Place the link to your twitter profile/page. To remove it, just leave it blank.",
					"id" => "twitter_link",
					"std" => "twitter link here",
//					"fold" => "off_social",
					"type" => "text");
					
$of_options[] = array( "name" => "Google Plus",
					"desc" => "Place the link to your google plus profile/page. To remove it, just leave it blank.",
					"id" => "gplus_link",
					"std" => "gplus link here",
//					"fold" => "off_social",
					"type" => "text");
					
$of_options[] = array( "name" => "Instagram",
					"desc" => "Place the link to your instagram profile/page. To remove it, just leave it blank.",
					"id" => "instagram_link",
					"std" => "instagram link here",
//					"fold" => "off_social",
					"type" => "text");					
					
$of_options[] = array( "name" => "Dribbble",
					"desc" => "Place the link to your dribble profile/page. To remove it, just leave it blank.",
					"id" => "dribbble_link",
					"std" => "dribbble link here",
//					"fold" => "off_social",
					"type" => "text");

$of_options[] = array( "name" => "Pinterest",
					"desc" => "Place the link to your pinterest profile/page. To remove it, just leave it blank.",
					"id" => "pinterest_link",
					"std" => "pinterest link here",
//					"fold" => "off_social",
					"type" => "text");
					
$of_options[] = array( "name" => "Tumblr",
					"desc" => "Place the link to your tumblr profile/page. To remove it, just leave it blank.",
					"id" => "tumblr_link",
					"std" => "tumblr link here",
//					"fold" => "off_social",
					"type" => "text");
					
$of_options[] = array( "name" => "Skype",
					"desc" => "Place the link to your skype profile/page. To remove it, just leave it blank.",
					"id" => "skype_link",
					"std" => "skype link here",
//					"fold" => "off_social",
					"type" => "text");
					
$of_options[] = array( "name" => "Vimeo",
					"desc" => "Place the link to your vimeo profile/page. To remove it, just leave it blank.",
					"id" => "vimeo_link",
					"std" => "vimeo link here",
//					"fold" => "off_social",
					"type" => "text");
					
$of_options[] = array( "name" => "Youtube",
					"desc" => "Place the link to your youtube profile/page. To remove it, just leave it blank.",
					"id" => "youtube_link",
					"std" => "youtube link here",
//					"fold" => "off_social",
					"type" => "text");	
					
$of_options[] = array( "name" => "LinkedIn",
					"desc" => "Place the link to your linkedin profile/page. To remove it, just leave it blank.",
					"id" => "linkedin_link",
					"std" => "linkedin link here",
//					"fold" => "off_social",
					"type" => "text");	
					
$of_options[] = array( "name" => "Flickr",
					"desc" => "Place the link to your flickr profile/page. To remove it, just leave it blank.",
					"id" => "flickr_link",
					"std" => "flickr link here",
//					"fold" => "off_social",
					"type" => "text");	
					
$of_options[] = array( "name" => "Behance",
					"desc" => "Place the link to your behance profile/page. To remove it, just leave it blank.",
					"id" => "behance_link",
					"std" => "behance link here",
//					"fold" => "off_social",
					"type" => "text");																																											
				
//Menu Settings
$of_options[] = array( 	"name" 		=> "Menu options",
						"type" 		=> "heading"
				);
			
				
$of_options[] = array( 	"name" 		=> "Header V2/V3 Menu Height",
						"id" 		=> "header_v23_menu_height",
						"std" 		=> "50",
						"min" 		=> "20",
						"step"		=> "1",
						"max" 		=> "120",
						"type" 		=> "sliderui" 
				);	
				
$of_options[] = array(  "name" =>  "Header V2/V3 Background Color",
						"desc" => "",
						"id" => "menu_v23_bg",
						"std" => "#ffffff",
						"type" => "color");								
				
$of_options[] = array(  "name" => "Dropdown Menu",
						"desc" => "",
						"id" => "dropdown_menu",
						"std" => "<h3 style='margin: 0;'>Dropdown Menu</h3>",
						"icon" => true,
						"type" => "info");					
				
$of_options[] = array( 	"name" 		=> "Dropdown Menu Width (px)",
						"desc"		=> "You can enter your own value for the Dropdown Menu Width, in pixels!",
						"id" 		=> "dropdown_mw",
						"std" 		=> "200",
						"min" 		=> "100",
						"step"		=> "5",
						"max" 		=> "400",
						"type" 		=> "sliderui" 
				);	

$of_options[] = array(  "name" => "WooCommerce ",
						"desc" => "",
						"id" => "woocommerce",
						"std" => "<h3 style='margin: 0;'>WooCommerce</h3>",
						"icon" => true,
						"type" => "info");	
						
$of_options[] = array(  "name" => "",
						"desc" => "Add shopping cart icon to main menu.<br>Will only work if you have WooCommerce plugin installed.",
						"id" => "woocommerce_item",
						"std" => 1,
						"folds" => 1,
						"type" => "switch");
						
				
$of_options[] = array(  "name" => "Mobile Menu",
						"desc" => "",
						"id" => ",mob_menu",
						"std" => "<h3 style='margin: 0;'>Mobile Menu</h3>",
						"icon" => true,
						"type" => "info");	
						
$of_options[] = array(  "name" => "Mobile Menu Text",
						"desc" => "Enter the text you want to use for the mobile menu.",
						"id" => "mob_menu_text",
						"std" => "Menu",
//						"fold" => "header_contact",
						"type" => "text");

$of_options[] = array(  "name" =>  "Mobile Menu Background Color",
						"desc" => "",
						"id" => "mob_menu_bg",
						"std" => "#1F1F1F",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Mobile Menu Link Color",
						"desc" => "",
						"id" => "mob_menu_link",
						"std" => "#fffeff",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Mobile Menu Link Separator Color",
						"desc" => "",
						"id" => "mob_menu_sep_link",
						"std" => "#4b4b4b",
						"type" => "color");		
						
$of_options[] = array(  "name" => "Mobile Menu Force Uppercase",
						"desc" => "Force uppercase letters on Mobile menu.",
						"id" => "mob_menu_up",
						"std" => 0,
						"folds" => 1,
						"type" => "switch");	
						
$of_options[] = array(  "name" => "Mobile Menu Font Weight",
						"desc" => "",
						"id" => "mob_menu_font_weight",
						"std" => "normal",
						"type" => "select",
						"options" => array('400', 'normal', '600', '700'));																																																			
				
$of_options[] = array(  "name" => "Menu Style - First Level",
						"desc" => "",
						"id" => "menu_colors_intro",
						"std" => "<h3 style='margin: 0;'>Menu Style - First Level</h3>",
						"icon" => true,
						"type" => "info");										

$of_options[] = array(  "name" =>  "Menu Text Color - First Level",
						"desc" => "",
						"id" => "menu_first_color",
						"std" => "#444444",
						"type" => "color");
						
$of_options[] = array(  "name" =>  "Menu Text Color on Hover - First Level",
						"desc" => "",
						"id" => "menu_first_color_hover",
						"std" => "#444444",
						"type" => "color");						
					
$of_options[] = array(  "name" =>  "Menu Background Color Hover - First Level",
						"desc" => "",
						"id" => "menu_first_bg_color_hover",
						"std" => "#ffffff",
						"type" => "color");						
						
$of_options[] = array(  "name" =>  "Menu Border Color Hover - Sublevels",
						"desc" => "",
						"id" => "menu_border_color_hover",
						"std" => "#f96e5b",
						"type" => "color");	
						
$of_options[] = array(  "name" => "Menu Style - Sublevels",
						"desc" => "",
						"id" => "menu_colors_intro",
						"std" => "<h3 style='margin: 0;'>Menu Style - Sublevels + Megamenu</h3>",
						"icon" => true,
						"type" => "info");																	

$of_options[] = array(  "name" =>  "Menu Text Color - Sublevels",
						"desc" => "",
						"id" => "menu_sub_color",
						"std" => "#444444",
						"type" => "color");

$of_options[] = array(  "name" =>  "Menu Text Color Hover - Sublevels",
						"desc" => "",
						"id" => "menu_sub_color_hover",
						"std" => "#ffffff",
						"type" => "color");						
						
$of_options[] = array(  "name" =>  "Menu Background Color - Sublevels",
						"desc" => "",
						"id" => "menu_sub_bg_color",
						"std" => "#ffffff",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Menu Background Color Hover - Sublevels ",
						"desc" => "",
						"id" => "menu_sub_bg_color_hover",
						"std" => "#313131",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Menu Separator Color (Lines)",
						"desc" => "",
						"id" => "menu_separators_color",
						"std" => "#f2f2f2",
						"type" => "color");	
						
$of_options[] = array(  "name" => "Megamenu",
						"desc" => "",
						"id" => "menu_colors_intro",
						"std" => "<h3 style='margin: 0;'>Megamenu</h3>",
						"icon" => true,
						"type" => "info");						
						
$of_options[] = array(  "name" =>  "MegaMenu Heading Links Color",
						"desc" => "",
						"id" => "mm_headings",
						"std" => "#000",
						"type" => "color");
						
$of_options[] = array(  "name" =>  "MegaMenu Heading Links Color on Hover",
						"desc" => "",
						"id" => "mm_headings_hover",
						"std" => "#f96e5b",
						"type" => "color");		
	
//Menu Settings
$of_options[] = array( 	"name" 		=> "Page Title Breadcrumb",
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> "Page Title and Breadcrumb",
						"desc" 		=> "",
						"id" 		=> "title_breadcrumbs",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Page Title and Breadcrumb</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> "Title and Breadcrumb",
						"desc" 		=> "Enable / Disable the Title and Breadcrumb section.",
						"id" 		=> "en_title_breadcrumb",
						"std" 		=> 1,
						"type" 		=> "switch",
						"folds"		=> 1
				);
				
$of_options[] = array( "name" => "Title and Breadcrumb - Right Section display",
					"desc" => "Select what do you want to display on the right section of the Title and Sidebar?",
					"id" => "title_breadcrumb_right_side",
					"std" => "Search Box",
					"type" => "select",
					"fold" => "en_title_breadcrumb",
					"options" => array('search' => 'Search Box', 'contactinfo' => 'Contact Info', 'socialinks' => 'Social Links', 'empty' => 'Leave Empty' ));					
				
$of_options[] = array(  "name" =>  "Page Title Text Color",
						"desc" => "",
						"id" => "page_title_color",
						"std" => "#555555",
						"fold" => "en_title_breadcrumb",
						"type" => "color");
						
$of_options[] = array( 	"name" 		=> "Breadcrumb",
						"desc" 		=> "Enable / Disable the Breadcrumb.",
						"id" 		=> "en_breadcrumb",
						"std" 		=> 1,
						"type" 		=> "switch",
						"fold" => "en_title_breadcrumb",
				);						
					
$of_options[] = array(  "name" =>  "Breadcrumbs Text Color",
						"desc" => "",
						"id" => "breadcrumbs_text_color",
						"std" => "#888888",
						"fold" => "en_title_breadcrumb",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Breadcrumbs Link Color",
						"desc" => "",
						"id" => "breadcrumbs_link_color",
						"std" => "#888888",
						"fold" => "en_title_breadcrumb",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Title and Breadcrumbs Background Color Outside",
						"desc" => "",
						"id" => "title_bread_bg_color_out",
						"std" => "#f6f6f6",
						"fold" => "en_title_breadcrumb",
						"type" => "color");							
						
$of_options[] = array(  "name" =>  "Title and Breadcrumbs Background Color Inside",
						"desc" => "",
						"id" => "title_bread_bg_color_in",
						"std" => "#f9f9f9",
						"fold" => "en_title_breadcrumb",
						"type" => "color");
						
$of_options[] = array( 	"name" 		=> "Title and Breadcrumbs Background pattern",
						"desc" 		=> "Enable/Disable Title and Breadcrumbs Background Pattern.",
						"id" 		=> "title_bread_bg_pattern_en",
						"std" 		=> 0,
						"folds" 	=> 1,
						"fold" => "en_title_breadcrumb",
						"type" 		=> "switch"
				);												

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Select a background pattern for the Title and Breadcrumbs Section.",
						"id" 		=> "title_bread_bg_pattern",
						"std" 		=> $bg_images_url."bg1.png",
						"type" 		=> "tiles",
						"fold"		=> "title_bread_bg_pattern_en",
						"options" 	=> $bg_images,
				);		
				
$of_options[] = array( 	"name" 		=> "Title and Breadcrumbs Custom Background Image Upload",
						"desc" 		=> "Upload or select an existing image to use for the title and breadcrumbs background.",
						"id" 		=> "title_bread_custom_bg_image",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"fold" => "en_title_breadcrumb",
						"type" 		=> "upload"
				);
				
$of_options[] = array(  "name" => "Title and Breadcrumbs Custom Background Image Repeat",
						"desc" => "",
						"id" => "title_bread_custom_bg_repeat",
						"std" => "2",
						"type" => "select",
						"fold" => "en_title_breadcrumb",
						"options" => array('no-repeat' => 'no-repeat', 'repeat' => 'repeat', 'repeat-x' => 'repeat-x', 'repeat-y' => 'repeat-y'));						
						
$of_options[] = array(  "name" =>  "Title and Breadcrumbs Padding Outside",
						"desc" => "",
						"id" => "title_bread_padding_out",
						"std" 		=> "5",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "20",
						"fold" => "en_title_breadcrumb",
						"type" 		=> "sliderui");	
						
$of_options[] = array(  "name" =>  "Title and Breadcrumbs Padding Inside",
						"desc" => "",
						"id" => "title_bread_padding_in",
						"std" 		=> "15",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "40",
						"fold" => "en_title_breadcrumb",
						"type" 		=> "sliderui");
						
$of_options[] = array(  "name" =>  "Title and Breadcrumbs Bottom Border Color",
						"desc" => "",
						"id" => "title_bread_border_color",
						"std" => "#f6f6f6",
						"fold" => "en_title_breadcrumb",
						"type" => "color");								
						
$of_options[] = array(  "name" =>  "Title and Breadcrumbs Bottom Border Width",
						"desc" => "",
						"id" => "title_bread_border_width",
						"std" 		=> "1",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "5",
						"fold" => "en_title_breadcrumb",
						"type" 		=> "sliderui");	
						
//Footer Settings
$of_options[] = array( 	"name" 		=> "Footer Settings",
						"type" 		=> "heading"
				);	

$of_options[] = array(  "name" => "Footer Sidebar Columns",
						"desc" => "Select the number of columns to be used for displaying the Footer Sidebars",
						"id" => "footer_sidebar_cols",
						"std" => "4",
						"type" => "select",						
						"options" => array(4,3,2));													

$of_options[] = array(  "name" => "Footer Widgets",
						"desc" => "",
						"id" => "footer_w",
						"std" => "<h3 style='margin: 0;'>Footer Widgets</h3>",
						"icon" => true,
						"type" => "info");

$of_options[] = array( 	"name" 		=> "Footer Widgets",
						"desc" 		=> "Enable/disable footer widgets.",
						"id" 		=> "footer_widgets",
						"std" 		=> 0,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Footer Copyright Alignment",
						"desc" 		=> "Center the footer copyright section.",
						"id" 		=> "footer_copyright_center",
						"std" 		=> 0,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);				
				
$of_options[] = array( 	"name" 		=> "Copyright",
						"desc" 		=> "Enable/disable the copyrights.",
						"id" 		=> "copyrights_area",
						"std" 		=> 1,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);				
				
$of_options[] = array(  "name" => "Copyright Text",
						"desc" => "",
						"id" => "copyrights_text",
						"fold" => "copyrights_area",
						"std" => 'Copyright 2013 Nimva | All Rights Reserved | <a href="http://rockythemes.com">RockyThemes</a>',
						"type" => "textarea");					

$of_options[] = array( 	"name" 		=> "Footer Menu",
						"desc" 		=> "Enable/disable footer menu.",
						"id" 		=> "footer_menu",
						"std" 		=> 1,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);	
				
$of_options[] = array(  "name" => "Twitter Feed Bar",
						"desc" => "",
						"id" => "twitted_fd_br",
						"std" => "<h3 style='margin: 0;'>Twitter Feed Bar</h3>",
						"icon" => true,
						"type" => "info");				

$of_options[] = array( 	"name" 		=> "Enable/Disable Twitter Feed Bar",
						"desc" 		=> "Enable/Disable Twitter Feed bar just above the footer.",
						"id" 		=> "twitter_bar",
						"std" 		=> 0,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);	
				
$of_options[] = array(  "name" =>  "Twitter Feed Bar Text Color",
						"desc" => "",
						"id" => "twitter_bar_text",
						"std" => "#ffffff",
						"fold" => "twitter_bar",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Twitter Feed Bar Background Color",
						"desc" => "",
						"id" => "twitter_bar_bg",
						"std" => "#f96e5b",
						"fold" => "call_action",
						"type" => "color");						

$of_options[] = array( 	"name" 		=> "Twitter Info",
						"desc" 		=> "",
						"id" 		=> "twitter_info",
						"std" 		=> "<h3 style=\"margin: 0;\">Twitter Api</h3><a href=\"http://dev.twitter.com/apps\" target=\"_blank\">Go here to Create or Find your Twitter App</a>",
						"icon" 		=> true,
						"fold" => "twitter_bar",
						"type" 		=> "info"
				);	
				
$of_options[] = array(  "name" => "Twitter Profile",
						"desc" => "Enter your twitter profile id.",
						"id" => "twitter_profile",
						"std" => "rockythemes",
						"fold" => "twitter_bar",
						"type" => "text");
							
$of_options[] = array(  "name" => "Consumer Key",
						"desc" => "Enter your consumer key.",
						"id" => "consumer_key",
						"std" => "",
						"fold" => "twitter_bar",
						"type" => "text");		
						
$of_options[] = array(  "name" => "Consumer Secret",
						"desc" => "Enter your consumer secret.",
						"id" => "consumer_secret",
						"std" => "",
						"fold" => "twitter_bar",
						"type" => "text");
						
$of_options[] = array(  "name" => "Action Token",
						"desc" => "Enter your action token.",
						"id" => "access_token",
						"std" => "",
						"fold" => "twitter_bar",
						"type" => "text");

$of_options[] = array(  "name" => "Action Token Secret",
						"desc" => "Enter your action token secret.",
						"id" => "access_token_secret",
						"std" => "",
						"fold" => "twitter_bar",
						"type" => "text");																												

$of_options[] = array(  "name" => "Call to Action Bar",
						"desc" => "",
						"id" => "menu_colors_intro",
						"std" => "<h3 style='margin: 0;'>Call to Action Bar</h3>",
						"icon" => true,
						"type" => "info");
						

$of_options[] = array( 	"name" 		=> "Call to Action Bar",
						"desc" 		=> "Enable/Disable Call to Action Bar.",
						"id" 		=> "call_action",
						"std" 		=> 0,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);
											

$of_options[] = array(  "name" => "Call to Action Text",
						"desc" => "Enter your Call to Action Text.",
						"id" => "call_action_text",
						"std" => "<span>Call to action</span> section for all pages with Admin Option. Enjoy <span><strong>Nimva?</strong></span>",
						"fold" => "call_action",
						"type" => "textarea");
						
$of_options[] = array(  "name" =>  "Call to Action Text Color",
						"desc" => "",
						"id" => "call_action_text_color",
						"std" => "#444444",
						"fold" => "call_action",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Call to Action Span Color",
						"desc" => "",
						"id" => "call_action_span_color",
						"std" => "#f96e5b",
						"fold" => "call_action",
						"type" => "color");															

$of_options[] = array(  "name" => "Call to Action Button Text",
						"desc" => "Edit Call to Action Button text.",
						"id" => "call_action_button_text",
						"std" => "Buy This Theme",
						"fold" => "call_action",
						"type" => "text");

$of_options[] = array(  "name" => "Call to Action Button Link",
						"desc" => "Edit Call to Action Button link.",
						"id" => "call_action_button_link",
						"std" => "http://rockythemes.com/nimva/",
						"fold" => "call_action",
						"type" => "text");
						
$of_options[] = array(  "name" => "Call to Action Button Icon",
						"desc" => "Add a font awesome icon to the Call to Action Button.",
						"id" => "call_action_button_icon",
						"std" => "fa-star",
						"fold" => "call_action",
						"type" => "text");						
						
$of_options[] = array(  "name" => "Call to Action Button Style",
						"desc" => "",
						"id" => "call_action_button_style",
						"std" => "minimal",
						"fold" => "call_action",
						"type" => "select",
						"options" => array('minimal' => 'Minimal', '3d' => '3D'));							
						
$of_options[] = array(  "name" => "Call to Action Button Color",
						"desc" => "Select the color of the Call to Action button",
						"id" => "call_action_button_color",
						"fold" => "call_action",
						"std" => "lightred",
						"type" => "select",
						"options" => array( 'lightred' => 'Light Red',
											'darkred' => 'Dark Red',  
											'orange' => 'Orange',  
											'turquoise' => 'Turquoise',
											'emerald' => 'Emerald',
											'lightblue' => 'Light Blue',
											'amethyst' => 'Amethyst',
											'wetasphalt' => 'Wet Asphalt',
											'light' => 'Light',
											'dark' => 'Dark'
									 ));	
																								
$of_options[] = array(  "name" => "Call to Action Button Size",
						"desc" => "Select the size of the Call to Action button",
						"id" => "call_action_button_size",
						"std" => "small",
						"fold" => "call_action",
						"type" => "select",
						"options" => array('small' => 'Small', 'large' => 'Large'));						
						
$of_options[] = array(  "name" =>  "Call to Action Background Color",
						"desc" => "",
						"fold" => "call_action",
						"id" => "call_action_bg",
						"std" => "#f2f2f2",
						"type" => "color");	
						
$of_options[] = array( 	"name" 		=> "Call to Action Background Pattern",
						"desc" 		=> "Enable/Disable Call to Action Background Pattern.",
						"id" 		=> "call_action_bg_pattern_en",
						"std" 		=> 0,
						"fold" => "call_action",
						"folds" 	=> 1,
						"type" 		=> "switch"
				);												

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Select a background pattern for the Call to Action.",
						"id" 		=> "call_action_bg_pattern",
						"std" 		=> $bg_images_url."bg1.png",
						"type" 		=> "tiles",
						"fold"		=> "call_action_bg_pattern_en",
						"options" 	=> $bg_images,
				);		
				
$of_options[] = array( 	"name" 		=> "Custom Background Image Upload",
						"desc" 		=> "Upload or select an existing image to use for the call to action background.",
						"id" 		=> "call_action_custom_bg_image",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"fold" => "call_action",
						"type" 		=> "upload"
				);
				
$of_options[] = array(  "name" => "Call to Action Custom Background Image Repeat",
						"desc" => "",
						"id" => "call_action_custom_bg_repeat",
						"std" => "2",
						"type" => "select",
						"fold" => "call_action",
						"options" => array('no-repeat' => 'no-repeat', 'repeat' => 'repeat', 'repeat-x' => 'repeat-x', 'repeat-y' => 'repeat-y'));						
//footer style		
$of_options[] = array( 	"name" 		=> "Footer Colors and Background",
						"desc" 		=> "",
						"id" 		=> "footer_color_bg",
						"std" 		=> "<h3 style=\"margin: 0;\">Footer Colors and Background</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	

$of_options[] = array(  "name" =>  "Footer Headings Color",
						"desc" => "",
						"id" => "footer_headings_color",
						"std" => "#EEEEEE",
						"type" => "color");
						
$of_options[] = array(  "name" =>  "Footer Headings Small Border Color",
						"desc" => "",
						"id" => "footer_headings_border_color",
						"std" => "#676767",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Footer Headings Big Border Color",
						"desc" => "",
						"id" => "footer_headings_border_color_big",
						"std" => "#4b4b4b",
						"type" => "color");												

$of_options[] = array(  "name" =>  "Footer Text Color",
						"desc" => "",
						"id" => "footer_text_color",
						"std" => "#DDDDDD",
						"type" => "color");

$of_options[] = array(  "name" =>  "Footer Link Color",
						"desc" => "",
						"id" => "footer_link_color",
						"std" => "#BFBFBF",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Footer Link Color Hover",
						"desc" => "",
						"id" => "footer_link_color_hover",
						"std" => "#fff",
						"type" => "color");						
				
$of_options[] = array(  "name" =>  "Footer Background Color ",
						"desc" => "",
						"id" => "footer_bg",
						"std" => "#363839",
						"type" => "color");
						
$of_options[] = array( 	"name" 		=> "Footer Background pattern",
						"desc" 		=> "Enable/Disable Footer Background Pattern.",
						"id" 		=> "footer_bg_pattern_en",
						"std" 		=> 0,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);												

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Select a background pattern for the footer.",
						"id" 		=> "footer_bg_pattern",
						"std" 		=> $bg_images_url."bg1.png",
						"type" 		=> "tiles",
						"fold"		=> "footer_bg_pattern_en",
						"options" 	=> $bg_images,
				);		
				
$of_options[] = array( 	"name" 		=> "Custom Background Image Upload",
						"desc" 		=> "Upload or select an existing image to use for the footer background.",
						"id" 		=> "footer_custom_bg_image",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"type" 		=> "upload"
				);
				
$of_options[] = array(  "name" => "Footer Custom Background Image Repeat",
						"desc" => "",
						"id" => "footer_custom_bg_repeat",
						"std" => "2",
						"type" => "select",
						"options" => array('no-repeat' => 'no-repeat', 'repeat' => 'repeat', 'repeat-x' => 'repeat-x', 'repeat-y' => 'repeat-y'));						

$of_options[] = array(  "name" =>  "Footer Border Color ",
						"desc" => "",
						"id" => "footer_border",
						"std" => "#3f3f3f",
						"type" => "color");								
						
$of_options[] = array(  "name" =>  "Copyright Background Color",
						"desc" => "",
						"id" => "copyright_bg",
						"std" => "#282A2B",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Copyright Text Color",
						"desc" => "",
						"id" => "copyright_text_color",
						"std" => "#DDDDDD",
						"type" => "color");						
						
$of_options[] = array(  "name" =>  "Copyright Link Color",
						"desc" => "",
						"id" => "copyright_link_color",
						"std" => "#BFBFBF",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Copyright Link Color Hover",
						"desc" => "",
						"id" => "copyright_link_color_hover",
						"std" => "#fff",
						"type" => "color");										
						
$of_options[] = array(  "name" =>  "Copyright Border Color ",
						"desc" => "",
						"id" => "copyright_border",
						"std" => "#282A2B",
						"type" => "color");							
				
//Footer Settings
$of_options[] = array( 	"name" 		=> "Background",
						"type" 		=> "heading"
				);							

$of_options[] = array(  "name" => "Site Layout",
						"desc" => "Boxed or wide layout?",
						"id" => "site_layout",
						"std" => "Wide",
						"type" => "select",
						"options" => array(						
							'wide' => 'Wide',
							'boxed' => 'Boxed',
				));
				
$of_options[] = array(  "name" => "Layout Width",
						"desc" => "Select the width of the Site Layout, in pixels.",
						"id" => "layout_width",
						"std" => "960px",
						"type" => "select",
						"options" => array(						
							'960' => '960px',
							'1160' => '1160px',
				));				
				
$of_options[] = array( 	"name" 		=> "Margins",
						"desc" 		=> "",
						"id" 		=> "site_margin",
						"std" 		=> "<h3 style=\"margin: 0;\">Site Margins for Boxed Layout!</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);				
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Margin Top",
						"id" 		=> "margin_top",
						"std" 		=> "50",
						"min" 		=> "0",
						"step"		=> "5",
						"max" 		=> "80",
						"type" 		=> "sliderui" 
				);	
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Margin Bottom",
						"id" 		=> "margin_bottom",
						"std" 		=> "50",
						"min" 		=> "0",
						"step"		=> "5",
						"max" 		=> "80",
						"type" 		=> "sliderui" 
				);							

$of_options[] = array( 	"name" 		=> "Background Info",
						"desc" 		=> "",
						"id" 		=> "background_iintro",
						"std" 		=> "<h3 style=\"margin: 0;\">Image Background Options</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array( 	"name" 		=> "Background Image",
						"desc" 		=> "Upload or select an existing image to use for background.",
						"id" 		=> "bg_image",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"type" 		=> "upload"
				);
				
$of_options[] = array(  "name" => "Background Repeat",
						"desc" => "",
						"id" => "bg_repeat",
						"std" => "2",
						"type" => "select",
						"options" => array('no-repeat' => 'no-repeat', 'repeat' => 'repeat', 'repeat-x' => 'repeat-x', 'repeat-y' => 'repeat-y'));
						
$of_options[] = array( 	"name" 		=> "Enable Parallax effect",
						"desc" 		=> "Add a very awesome parallax effect to your site background.",
						"id" 		=> "en_parallax",
						"std" 		=> 0,
						"type" 		=> "switch"
				);						

$of_options[] = array( 	"name" 		=> "Fullscreen Background Image",
						"desc" 		=> "Have background image always at 100% in width and height and scale according to the browser size.",
						"id" 		=> "bg_full",
						"std" 		=> 0,
						"type" 		=> "switch"
				);
						
$of_options[] = array(  "name" =>  "Background Color - Wide/Boxed Layout",
						"desc" => "Select a background color for the wide/boxed layout.",
						"id" => "bg_color",
						"std" => "#fff",
						"type" => "color");
						
$of_options[] = array(  "name" =>  "Inner Background Color - Boxed Layout",
						"desc" => "Select a background color for the inner content of the boxed layout.",
						"id" => "content_bg",
						"std" => "#fff",
						"type" => "color");							
						
$of_options[] = array( 	"name" 		=> "Background pattern",
						"desc" 		=> "Enable/Disable Background Pattern.",
						"id" 		=> "bg_pattern_en",
						"std" 		=> 0,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);												

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Select a background pattern.",
						"id" 		=> "bg_pattern",
						"std" 		=> $bg_images_url."bg1.png",
						"type" 		=> "tiles",
						"fold"		=> "bg_pattern_en",
						"options" 	=> $bg_images,
				);
				
$of_options[] = array( 	"name" 		=> "Video Background",
						"desc" 		=> "",
						"id" 		=> "video_bg_opt",
						"std" 		=> "<h3 style=\"margin: 0;\">Video Background Options</h3>Allows you add a video background from youtube.",
						"icon" 		=> true,
						"type" 		=> "info"
				);				
				
$of_options[] = array( 	"name" 		=> "Video Background",
						"desc" 		=> "Enable/Disable Video Background.",
						"id" 		=> "video_bg_en",
						"std" 		=> 0,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);	
				
$of_options[] = array(  "name" => "Youtube Video ID",
						"desc" => "Paste here the id of your Youtube video you want to use. <br> E.g: https://www.youtube.com/watch?v=PZizZxwrrbk - if this is your video link, the id would be:<strong>PZizZxwrrbk</strong>",
						"id" => "ytb_id",
						"std" => "",
						"fold" => "video_bg_en",
						"type" => "text");	
						
$of_options[] = array(  "name" => "Video Quality",
						"desc" => "Only works if the video supports this quality",
						"id" => "video_quality",
						"std" => "2",
						"fold" => "video_bg_en",
						"type" => "select",
						"options" => array( 'Default' => 'default', 'Small' => 'small', 'Medium' => 'medium', 'Large' => 'large', '720 HD' => 'hd720', '1080 HD' => 'hd1080', 'High Resolution' => 'highres' ));	
						
$of_options[] = array( 	"name" 		=> "Video Opacity",
						"desc" 		=> "Select the opacity for the video background",
						"id" 		=> "video_opacity",
						"std" 		=> "100",
						"min" 		=> "0",
						"step"		=> "5",
						"max" 		=> "100",
						"fold" => "video_bg_en",
						"type" 		=> "sliderui" 
				);																	

$of_options[] = array(  "name" =>  "Video Overlay Color",
						"desc" => "Add a colored background over the Video Background. Leave blank if you don't want to use this feature.",
						"id" => "video_overlay",
						"std" => "",
						"fold" => "video_bg_en",
						"type" => "color");
						
$of_options[] = array( 	"name" 		=> "Video Overlay Opacity",
						"desc" 		=> "Select the opacity of the colored background, in percents.",
						"id" 		=> "video_overlay_opacity",
						"std" 		=> "50",
						"min" 		=> "0",
						"step"		=> "5",
						"max" 		=> "100",
						"fold" => "video_bg_en",
						"type" 		=> "sliderui" 
				);			
				
$of_options[] = array( 	"name" 		=> "Background Video Overlay Pattern",
						"desc" 		=> "You can optionally select an overlay pattern for your video background.",
						"id" 		=> "video_overlay_bg",
						"std" 		=> $bg_overlay_url."none.png",
						"type" 		=> "tiles",
						"fold"		=> "video_bg_en",
						"options" 	=> $bg_overlay,
						"fold" => "video_bg_en"
				);											

//Footer Settings
$of_options[] = array( 	"name" 		=> "Typography",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Custom Font",
						"desc" 		=> "",
						"id" 		=> "c_fonts",
						"std" 		=> "<h3 style=\"margin: 0;\">Custom Font</h3>This will overide the google/standard fonts.",
						"icon" 		=> true,
						"type" 		=> "info"
				);				

$of_options[] = array(  "name" => "Custom Font .woff",
						"desc" => "Upload here the .woff font file.",
						"id" => "custom_woff",
						"std" => "",
						"mod" => "yes",
						"type" => "upload");	
						
$of_options[] = array(  "name" => "Custom Font .ttf",
						"desc" => "Upload here the .ttf font file.",
						"id" => "custom_ttf",
						"std" => "",
						"mod" => "yes",
						"type" => "media");	
						
$of_options[] = array(  "name" => "Custom Font .svg",
						"desc" => "Upload here the .svg font file.",
						"id" => "custom_svg",
						"std" => "",
						"mod" => "yes",
						"type" => "media");	
						
$of_options[] = array(  "name" => "Custom Font .eot",
						"desc" => "Upload here the .eot font file.",
						"id" => "custom_eot",
						"std" => "",
						"mod" => "yes",
						"type" => "media");	
							
						
$of_options[] = array( 	"name" 		=> "Choose where to use your Custom Font",
						"desc" 		=> "Use as Body Font",
						"id" 		=> "custom_body",
						"std" 		=> 0,
						"type" 		=> "switch"
				);
$of_options[] = array( 	"desc" 		=> "Use on Header Menu",
						"id" 		=> "custom_menu",
						"std" 		=> 0,
						"type" 		=> "switch"
				);	
				
$of_options[] = array( 	"desc" 		=> "Use on Headings",
						"id" 		=> "custom_heading",
						"std" 		=> 0,
						"type" 		=> "switch"
				);	
				
$of_options[] = array( 	"desc" 		=> "Use on Text Logo",
						"id" 		=> "custom_logo",
						"std" 		=> 0,
						"type" 		=> "switch"
				);	

$of_options[] = array( 	"desc" 		=> "Use on Tagline",
						"id" 		=> "custom_tagline",
						"std" 		=> 0,
						"type" 		=> "switch"
				);								

$of_options[] = array( 	"desc" 		=> "Use on Footer Headings",
						"id" 		=> "custom_footer",
						"std" 		=> 0,
						"type" 		=> "switch"
				);																																					
				
$of_options[] = array( 	"name" 		=> "Google Fonts Options",
						"desc" 		=> "",
						"id" 		=> "g_fonts",
						"std" 		=> "<h3 style=\"margin: 0;\">Google Fonts Options</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array(  "name" => "Select Body Font Family",
						"desc" => "Select a font family for body text",
						"id" => "google_body",
						"std" => "Open Sans",
						"type" => "select_google_font",
						"preview" => array(
									"text" => "Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit.", 
									"size" => "12px"
						),
						"options" => $google_fonts);
						
						

$of_options[] = array(  "name" => "Select Header Menu Font Family",
						"desc" => "Select a font family for navigation",
						"id" => "google_nav",
						"std" => "Open Sans",
						"type" => "select_google_font",
						"preview" => array(
									"text" => "HOME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PAGES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SHORTCODES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CONTACT", 
									"size" => "13px"
						),
						"options" => $google_fonts);

$of_options[] = array(  "name" => "Select Headings Font Family",
						"desc" => "Select a font family for headings",
						"id" => "google_headings",
						"std" => "Open Sans",
						"type" => "select_google_font",
						"preview" => array(
									"text" => "Headings are used everywhere!", 
									"size" => "18px"
						),
						"options" => $google_fonts);

$of_options[] = array(  "name" => "Select Footer Headings Font Family",
						"desc" => "Select a font family for footer headings",
						"id" => "google_footer_headings",
						"std" => "Open Sans",
						"type" => "select_google_font",
						"preview" => array(
									"text" => "Footer Headings are also important", 
									"size" => "16px"
						),
						"options" => $google_fonts);
						
$of_options[] = array(  "name" => "Standard Fonts",
						"desc" => "",
						"id" => "font_size_intro",
						"std" => "<h3 style='margin: 0;'>Standard Fonts Sizes</h3>If you have a Google Font selected above, the standard font will be overridden.",
						"icon" => true,
						"type" => "info");		
						
$standard_fonts = array(
						'0' => 'Select Font',
						'Arial, Helvetica, sans-serif' => 'Arial, Helvetica, sans-serif',
						"'Arial Black', Gadget, sans-serif" => "'Arial Black', Gadget, sans-serif",
						"'Bookman Old Style', serif" => "'Bookman Old Style', serif",
						"'Comic Sans MS', cursive" => "'Comic Sans MS', cursive",
						"Courier, monospace" => "Courier, monospace",
						"Garamond, serif" => "Garamond, serif",
						"Georgia, serif" => "Georgia, serif",
						"Impact, Charcoal, sans-serif" => "Impact, Charcoal, sans-serif",
						"'Lucida Console', Monaco, monospace" => "'Lucida Console', Monaco, monospace",
						"'Lucida Sans Unicode', 'Lucida Grande', sans-serif" => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
						"'MS Sans Serif', Geneva, sans-serif" => "'MS Sans Serif', Geneva, sans-serif",
						"'MS Serif', 'New York', sans-serif" => "'MS Serif', 'New York', sans-serif",
						"'Palatino Linotype', 'Book Antiqua', Palatino, serif" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif",
						"Tahoma, Geneva, sans-serif" => "Tahoma, Geneva, sans-serif",
						"'Times New Roman', Times, serif" => "'Times New Roman', Times, serif",
						"'Trebuchet MS', Helvetica, sans-serif" => "'Trebuchet MS', Helvetica, sans-serif",
						"Verdana, Geneva, sans-serif" => "Verdana, Geneva, sans-serif"
					);

$of_options[] = array(  "name" => "Select Body Font Family",
						"desc" => "Select a font family for body text",
						"id" => "standard_body",
						"std" => "",
						"type" => "select",
						"options" => $standard_fonts);

$of_options[] = array(  "name" => "Select Menu Font Family",
						"desc" => "Select a font family for menu / navigation",
						"id" => "standard_nav",
						"std" => "",
						"type" => "select",
						"options" => $standard_fonts);

$of_options[] = array(  "name" => "Select Headings Font Family",
						"desc" => "Select a font family for headings",
						"id" => "standard_headings",
						"std" => "",
						"type" => "select",
						"options" => $standard_fonts);

$of_options[] = array(  "name" => "Select Footer Headings Font Family",
						"desc" => "Select a font family for footer headings",
						"id" => "standard_footer_headings",
						"std" => "",
						"type" => "select",
						"options" => $standard_fonts);										

$of_options[] = array(  "name" => "Font Sizes",
						"desc" => "",
						"id" => "font_size_intro",
						"std" => "<h3 style='margin: 0;'>Font Sizes</h3>",
						"icon" => true,
						"type" => "info");

$of_options[] = array(  "name" => "Body Font Size (px)",
						"desc" => "Default is 12",
						"id" => "body_font_size",
						"std" => "12",
						"type" => "select",
						"options" => $font_sizes);

$of_options[] = array(  "name" => "Header Menu Font Size (px)",
						"desc" => "Default is 13",
						"id" => "nav_font_size",
						"std" => "13",
						"type" => "select",
						"options" => $font_sizes);

$of_options[] = array(  "name" => "Header Contact Info Font Size (px)",
						"desc" => "Default is 12",
						"id" => "snav_font_size",
						"std" => "12",
						"type" => "select",
						"options" => $font_sizes);
						
$of_options[] = array(  "name" =>  "Page Title Font Size",
						"desc" => "Default is 24",
						"id" => "page_title_font_size",
						"std" => "24",
						"type" => "select",
						"options" => $font_sizes);						

$of_options[] = array(  "name" => "Breadcrumbs Font Size (px)",
						"desc" => "Default is 12",
						"id" => "breadcrumbs_font_size",
						"std" => "12",
						"type" => "select",
						"options" => $font_sizes);
/*
$of_options[] = array(  "name" => "Cool Title Font Size (px)",
						"desc" => "Default is 11",
						"id" => "coolt_font_size",
						"std" => "11",
						"type" => "select",
						"options" => $font_sizes);
*/
$of_options[] = array(  "name" => "Sidebar Widget Title Font Size (px)",
						"desc" => "Default is 11",
						"id" => "sidew_font_size",
						"std" => "11",
						"type" => "select",
						"options" => $font_sizes);

$of_options[] = array(  "name" => "Footer Widget Title Font Size (px)",
						"desc" => "Default is 11",
						"id" => "footw_font_size",
						"std" => "11",
						"type" => "select",
						"options" => $font_sizes);

$of_options[] = array(  "name" => "Copyright Font Size (px)",
						"desc" => "Default is 12",
						"id" => "copyright_font_size",
						"std" => "12",
						"type" => "select",
						"options" => $font_sizes);

$of_options[] = array(  "name" => "Heading Font Size H1 (px)",
						"desc" => "Default is 28",
						"id" => "h1_font_size",
						"std" => "28",
						"type" => "select",
						"options" => $font_sizes);

$of_options[] = array(  "name" => "Heading Font Size H2 (px)",
						"desc" => "Default is 22",
						"id" => "h2_font_size",
						"std" => "22",
						"type" => "select",
						"options" => $font_sizes);

$of_options[] = array(  "name" => "Heading Font Size H3 (px)",
						"desc" => "Default is 18",
						"id" => "h3_font_size",
						"std" => "18",
						"type" => "select",
						"options" => $font_sizes);

$of_options[] = array(  "name" => "Heading Font Size H4 (px)",
						"desc" => "Default is 16",
						"id" => "h4_font_size",
						"std" => "16",
						"type" => "select",
						"options" => $font_sizes);

$of_options[] = array(  "name" => "Heading Font Size H5 (px)",
						"desc" => "Default is 14",
						"id" => "h5_font_size",
						"std" => "14",
						"type" => "select",
						"options" => $font_sizes);

$of_options[] = array(  "name" => "Heading Font Size H6 (px)",
						"desc" => "Default is 12",
						"id" => "h6_font_size",
						"std" => "12",
						"type" => "select",
						"options" => $font_sizes);				
								
$of_options[] = array( 	"name" 		=> "Color Scheme",
						"type" 		=> "heading"
				);
				
$of_options[] = array(  "name" => "Predefined Color Scheme",
						"desc" => "",
						"id" => "color_scheme",
						"std" => "Light Red",
						"type" => "select",
						"options" => array( 'lightred' => 'Light Red',
											'darkred' => 'Dark Red',  
											'orange' => 'Orange',  
											'turquoise' => 'Turquoise',
											'emerald' => 'Emerald',
											'lightblue' => 'Light Blue',
											'amethyst' => 'Amethyst',
											'wetasphalt' => 'Wet Asphalt',
									 ));
/*
$of_options[] = array(  "name" =>  "Primary Color",
						"desc" => "",
						"id" => "primary_color",
						"std" => "#f96e5b",
						"type" => "color");	
						
$of_options[] = array( 	"name" 		=> "Primary Color Overwrite",
						"desc" 		=> "Use Primary Color for all styles (links, shortcodes, etc). Checking this box will overwrite some of the colors you manually set.",
						"id" 		=> "primary_color_overwrite",
						"std" 		=> 0,
						"type" 		=> "switch"
				);						
*/
$of_options[] = array(  "name" => "Text Color",
						"desc" => "",
						"id" => "text_color",
						"std" => "<h3 style='margin: 0;'>Text Colors</h3>",
						"icon" => true,
						"type" => "info");	

$of_options[] = array(  "name" =>  "Body Text Color",
						"desc" => "",
						"id" => "body_text_color",
						"std" => "#777777",
						"type" => "color");
						
$of_options[] = array(  "name" =>  "Span Text Color",
						"desc" => "",
						"id" => "span_text_color",
						"std" => "#f96e5b",
						"type" => "color");						

$of_options[] = array(  "name" =>  "Link Color",
						"desc" => "",
						"id" => "link_color",
						"std" => "#555555",
						"type" => "color");															

$of_options[] = array(  "name" =>  "Link Color on Hover",
						"desc" => "",
						"id" => "link_color_hover",
						"std" => "#f96e5b",
						"type" => "color");						
						

$of_options[] = array(  "name" =>  "Heading 1 (H1) Text Color",
						"desc" => "",
						"id" => "h1_color",
						"std" => "#444444",
						"type" => "color");

$of_options[] = array(  "name" =>  "Heading 2 (H2) Text Color",
						"desc" => "",
						"id" => "h2_color",
						"std" => "#444444",
						"type" => "color");

$of_options[] = array(  "name" =>  "Heading 3 (H3) Text Color",
						"desc" => "",
						"id" => "h3_color",
						"std" => "#444444",
						"type" => "color");

$of_options[] = array(  "name" =>  "Heading 4 (H4) Text Color",
						"desc" => "",
						"id" => "h4_color",
						"std" => "#444444",
						"type" => "color");

$of_options[] = array(  "name" =>  "Heading 5 (H5) Text Color",
						"desc" => "",
						"id" => "h5_color",
						"std" => "#444444",
						"type" => "color");

$of_options[] = array(  "name" =>  "Heading 6 (H6) Text Color",
						"desc" => "",
						"id" => "h6_color",
						"std" => "#444444",
						"type" => "color");
							
$of_options[] = array( 	"name" 		=> "PageNavigation and Flexslider Arrow Color",
						"desc" 		=> "",
						"id" 		=> "page-navigation",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">PageNavigation and Flexslider Arrow Colorn</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array(  "name" =>  "Page Navigation Color",
						"desc" => "",
						"id" => "page_navi_color",
						"std" => "#f96e5b",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Slideshow Arrows Color",
						"desc" => "",
						"id" => "slide_arrow_color",
						"std" => "#f96e5b",
						"type" => "color");									
						
$of_options[] = array( 	"name" 		=> "Header Post Nagivation",
						"desc" 		=> "",
						"id" 		=> "post-navi",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Header Post Nagivation</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);							
						
$of_options[] = array(  "name" =>  "Post Navigation Icon Color",
						"desc" => "",
						"id" => "post_navigation_color",
						"std" => "#777",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Post Navigation Icon Color on Hover",
						"desc" => "",
						"id" => "post_navigation_color_hover",
						"std" => "#f96e5b",
						"type" => "color");																																			
/*
$of_options[] = array( 	"name" 		=> "Background Color!",
						"desc" 		=> "",
						"id" 		=> "background_color",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Footer Twitter Bar </h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);																	

						
$of_options[] = array(  "name" =>  "Twitter Bar Background Color",
						"desc" => "",
						"id" => "twitter_bar_bg",
						"std" => "#f96e5b",
						"type" => "color");													
	*/																									

$of_options[] = array(  "name" => "Element Colors",
						"desc" => "",
						"id" => "custom_color_scheme_element",
						"std" => "<h3 style='margin: 0;'>Image Overlay</h3>",
						"icon" => true,
						"type" => "info");
						
$of_options[] = array(  "name" =>  "Image Hover Background Color",
						"desc" => "",
						"id" => "image_hover_bg_color",
						"std" => "#000000",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Image Hover Background Opacity %",
						"desc" => "Lower values will make the background transparent.<br />Higher values will make the background opaque.",
						"id" => "image_hover_bg_opacity",
						"std" 		=> "60",
						"min" 		=> "0",
						"step"		=> "10",
						"max" 		=> "100",
						"type" 		=> "sliderui");	
						
$of_options[] = array(  "name" =>  "Image Hover - Icon Color",
						"desc" => "",
						"id" => "image_hover_icon_color",
						"std" => "#fff",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Image Hover - Icon Background",
						"desc" => "",
						"id" => "image_hover_icon_bg",
						"std" => "#f96e5b",
						"type" => "color");	
						
$of_options[] = array(  "name" => "Element Colors",
						"desc" => "",
						"id" => "search_btt",
						"std" => "<h3 style='margin: 0;'>Search Button Colors</h3>",
						"icon" => true,
						"type" => "info");																																				
						
$of_options[] = array(  "name" =>  "Search Button Background Color",
						"desc" => "",
						"id" => "search_button_bg_color",
						"std" => "#444444",
						"type" => "color");																											
											
$of_options[] = array(  "name" =>  "Search Button Background Color Hover",
						"desc" => "",
						"id" => "search_button_bg_color_hover",
						"std" => "#f96e5b",
						"type" => "color");
						
$of_options[] = array(  "name" => "Back to Top Button",
						"desc" => "",
						"id" => "back_top",
						"std" => "<h3 style='margin: 0;'>Back to Top Button</h3>",
						"icon" => true,
						"type" => "info");		
						
$of_options[] = array(  "name" => "Enable Back to Top Button",
						"id" => "en_back_top",
						"std" => 1,
						"folds" => 1,
						"type" => "switch");
						
$of_options[] = array(  "name" =>  "Back to Top Icon Color",
						"desc" => "",
						"id" => "back_top_icon",
						"std" => "#fff",
						"fold" => "en_back_top",
						"type" => "color");							
						
$of_options[] = array(  "name" =>  "Back to Top Background Color",
						"desc" => "",
						"id" => "back_top_bg",
						"std" => "#444",
						"fold" => "en_back_top",
						"type" => "color");
						
$of_options[] = array(  "name" =>  "Back to Top Background Color on Hover",
						"desc" => "",
						"id" => "back_top_bg_hover",
						"std" => "#f96e5b",
						"fold" => "en_back_top",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Back to Top Border Width",
						"desc" => "",
						"id" => "back_top_border",
						"std" 		=> "0",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "5",
						"fold" => "en_back_top",
						"type" 		=> "sliderui");	
						
$of_options[] = array(  "name" =>  "Back to Top Border Color",
						"desc" => "",
						"id" => "back_top_border_color",
						"std" => "#fff",
						"fold" => "en_back_top",
						"type" => "color");	
																																																			
$of_options[] = array( 	"name" 		=> "Buttons",
						"type" 		=> "heading"
				);																																																																																										

$of_options[] = array(  "name" => "WooCommerce Button",
						"desc" => "",
						"id" => "wc_but",
						"std" => "<h3 style='margin: 0;'>WooCommerce Button</h3>",
						"icon" => true,
						"type" => "info");
						
$of_options[] = array(  "name" =>  "WooCommerce Button Text Color",
						"desc" => "",
						"id" => "wc_button_text",
						"std" => "#ffffff",
						"type" => "color");						
						
$of_options[] = array(  "name" =>  "WooCommerce Button Background Color",
						"desc" => "",
						"id" => "wc_button_bg",
						"std" => "#333333",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "WooCommerce Button Text Color on Hover",
						"desc" => "",
						"id" => "wc_button_text_hover",
						"std" => "#ffffff",
						"type" => "color");												
						
$of_options[] = array(  "name" =>  "WooCommerce Button Background Color on Hover",
						"desc" => "",
						"id" => "wc_button_bg_hover",
						"std" => "#f96e5b",
						"type" => "color");												

$of_options[] = array(  "name" => "Red Button",
						"desc" => "",
						"id" => "min_buttons_shortcode",
						"std" => "<h3 style='margin: 0;'>Red Button</h3>Use the settings bellow to customize the look of the red button.",
						"icon" => true,
						"type" => "info");
						
$of_options[] = array(  "name" =>  "Red Button Background Color",
						"desc" => "",
						"id" => "colored_bg_red",
						"std" => "#f96e5b",
						"type" => "color");
						
$of_options[] = array(  "name" =>  "Red Button Text Color",
						"desc" => "",
						"id" => "colored_text_red",
						"std" => "#fff",
						"type" => "color");						
						
$of_options[] = array(  "name" =>  "Red Button Background Color on Hover",
						"desc" => "",
						"id" => "colored_bg_red_hover",
						"std" => "#333",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Red Button Text Color on Hover",
						"desc" => "",
						"id" => "colored_text_red_hover",
						"std" => "#fff",
						"type" => "color");	
						
$of_options[] = array(  "name" => "Dark Red Button",
						"desc" => "",
						"id" => "min_buttons_shortcode",
						"std" => "<h3 style='margin: 0;'>Dark Red Button</h3>Use the settings bellow to customize the look of the dark red button.",
						"icon" => true,
						"type" => "info");						
						
$of_options[] = array(  "name" =>  "Dark Red Button Background Color",
						"desc" => "",
						"id" => "colored_bg_dark_red",
						"std" => "#961a34",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Dark Red Button Text Color",
						"desc" => "",
						"id" => "colored_text_dark_red",
						"std" => "#fff",
						"type" => "color");						
						
$of_options[] = array(  "name" =>  "Dark Red Button Background Color on Hover",
						"desc" => "",
						"id" => "colored_bg_dark_red_hover",
						"std" => "#333",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Dark Red Button Text Color on Hover",
						"desc" => "",
						"id" => "colored_text_dark_red_hover",
						"std" => "#fff",
						"type" => "color");							
						
$of_options[] = array(  "name" => "Blue Button",
						"desc" => "",
						"id" => "min_buttons_shortcode",
						"std" => "<h3 style='margin: 0;'>Blue Button</h3>Use the settings bellow to customize the look of the blue button.",
						"icon" => true,
						"type" => "info");																	
						
$of_options[] = array(  "name" =>  "Blue Button Background Color",
						"desc" => "",
						"id" => "colored_bg_blue",
						"std" => "#3498db",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Blue Button Text Color",
						"desc" => "",
						"id" => "colored_text_blue",
						"std" => "#fff",
						"type" => "color");						
						
$of_options[] = array(  "name" =>  "Blue Button Background Color on Hover",
						"desc" => "",
						"id" => "colored_bg_blue_hover",
						"std" => "#333",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Blue Button Text Color on Hover",
						"desc" => "",
						"id" => "colored_text_blue_hover",
						"std" => "#fff",
						"type" => "color");							
						
$of_options[] = array(  "name" => "Orange Button",
						"desc" => "",
						"id" => "min_buttons_shortcode",
						"std" => "<h3 style='margin: 0;'>Orange Button</h3>Use the settings bellow to customize the look of the orange button.",
						"icon" => true,
						"type" => "info");						
						
$of_options[] = array(  "name" =>  "Orange Button Background Color",
						"desc" => "",
						"id" => "colored_bg_orange",
						"std" => "#ff7534",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Orange Button Text Color",
						"desc" => "",
						"id" => "colored_text_orange",
						"std" => "#fff",
						"type" => "color");						
						
$of_options[] = array(  "name" =>  "Orange Button Background Color on Hover",
						"desc" => "",
						"id" => "colored_bg_orange_hover",
						"std" => "#333",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Orange Button Text Color on Hover",
						"desc" => "",
						"id" => "colored_text_orange_hover",
						"std" => "#fff",
						"type" => "color");	
						
$of_options[] = array(  "name" => "Turquoise Button",
						"desc" => "",
						"id" => "min_buttons_shortcode",
						"std" => "<h3 style='margin: 0;'>Turquoise Button</h3>Use the settings bellow to customize the look of the Turquoise button.",
						"icon" => true,
						"type" => "info");																	
						
$of_options[] = array(  "name" =>  "Turquoise Button Background Color",
						"desc" => "",
						"id" => "colored_bg_turquoise",
						"std" => "#00d1c5",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Turquoise Button Text Color",
						"desc" => "",
						"id" => "colored_text_turquoise",
						"std" => "#fff",
						"type" => "color");						
						
$of_options[] = array(  "name" =>  "Turquoise Button Background Color on Hover",
						"desc" => "",
						"id" => "colored_bg_turquoise_hover",
						"std" => "#333",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Turquoise Button Text Color on Hover",
						"desc" => "",
						"id" => "colored_text_turquoise_hover",
						"std" => "#fff",
						"type" => "color");	
						
$of_options[] = array(  "name" => "Emerald Button",
						"desc" => "",
						"id" => "min_buttons_shortcode",
						"std" => "<h3 style='margin: 0;'>Emerald Button</h3>Use the settings bellow to customize the look of the Emerald button.",
						"icon" => true,
						"type" => "info");																	
						
$of_options[] = array(  "name" =>  "Emerald Button Background Color",
						"desc" => "",
						"id" => "colored_bg_emerald",
						"std" => "#37ba85",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Emerald Button Text Color",
						"desc" => "",
						"id" => "colored_text_emerald",
						"std" => "#fff",
						"type" => "color");						
						
$of_options[] = array(  "name" =>  "Emerald Button Background Color on Hover",
						"desc" => "",
						"id" => "colored_bg_emerald_hover",
						"std" => "#333",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Emerald Button Text Color on Hover",
						"desc" => "",
						"id" => "colored_text_emerald_hover",
						"std" => "#fff",
						"type" => "color");	
						
$of_options[] = array(  "name" => "Amethyst Button",
						"desc" => "",
						"id" => "min_buttons_shortcode",
						"std" => "<h3 style='margin: 0;'>Amethyst Button</h3>Use the settings bellow to customize the look of the Amethyst button.",
						"icon" => true,
						"type" => "info");																	
						
$of_options[] = array(  "name" =>  "Amethyst Button Background Color",
						"desc" => "",
						"id" => "colored_bg_amethyst",
						"std" => "#9b59b6",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Amethyst Button Text Color",
						"desc" => "",
						"id" => "colored_text_amethyst",
						"std" => "#fff",
						"type" => "color");						
						
$of_options[] = array(  "name" =>  "Amethyst Button Background Color on Hover",
						"desc" => "",
						"id" => "colored_bg_amethyst_hover",
						"std" => "#333",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Amethyst Button Text Color on Hover",
						"desc" => "",
						"id" => "colored_text_amethyst_hover",
						"std" => "#fff",
						"type" => "color");		
						
$of_options[] = array(  "name" => "Wet Asphalt Button",
						"desc" => "",
						"id" => "min_buttons_shortcode",
						"std" => "<h3 style='margin: 0;'>Wet Asphalt Button</h3>Use the settings bellow to customize the look of the Wet Asphalt button.",
						"icon" => true,
						"type" => "info");																	
						
$of_options[] = array(  "name" =>  "Wet Asphalt Button Background Color",
						"desc" => "",
						"id" => "colored_bg_wet_asphalt",
						"std" => "#34495e",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Wet Asphalt Button Text Color",
						"desc" => "",
						"id" => "colored_text_wet_asphalt",
						"std" => "#fff",
						"type" => "color");						
						
$of_options[] = array(  "name" =>  "Wet Asphalt Button Background Color on Hover",
						"desc" => "",
						"id" => "colored_bg_wet_asphalt_hover",
						"std" => "#333",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Wet Asphalt Button Text Color on Hover",
						"desc" => "",
						"id" => "colored_text_wet_asphalt_hover",
						"std" => "#fff",
						"type" => "color");																								
						
$of_options[] = array(  "name" => "Light Button",
						"desc" => "",
						"id" => "min_buttons_shortcode",
						"std" => "<h3 style='margin: 0;'>Light Button</h3>Use the settings bellow to customize the look of the white button.",
						"icon" => true,
						"type" => "info");	
																	
$of_options[] = array(  "name" =>  "Light Button Background Color",
						"desc" => "",
						"id" => "colored_bg_light",
						"std" => "#ffffff",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Light Button Text Color",
						"desc" => "",
						"id" => "colored_text_light",
						"std" => "#333333",
						"type" => "color");												
						
$of_options[] = array(  "name" =>  "Light Button Background Color on Hover",
						"desc" => "",
						"id" => "colored_bg_light_hover",
						"std" => "#555555",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Light Button Text Color on Hover",
						"desc" => "",
						"id" => "colored_text_light_hover",
						"std" => "#ffffff",
						"type" => "color");
						
$of_options[] = array(  "name" =>  "Light Button Border Color",
						"desc" => "",
						"id" => "colored_border_light",
						"std" => "#555555",
						"type" => "color");							
						
$of_options[] = array(  "name" =>  "Light Button Border Color on Hover",
						"desc" => "",
						"id" => "colored_border_light_hover",
						"std" => "#555555",
						"type" => "color");										

						
$of_options[] = array(  "name" => "Dark Button",
						"desc" => "",
						"id" => "min_buttons_shortcode",
						"std" => "<h3 style='margin: 0;'>Dark Button</h3>Use the settings bellow to customize the look of the dark button.",
						"icon" => true,
						"type" => "info");						
						
$of_options[] = array(  "name" =>  "Dark Button Background Color",
						"desc" => "",
						"id" => "colored_bg_dark",
						"std" => "#555555",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Dark Button Text Color",
						"desc" => "",
						"id" => "colored_text_dark",
						"std" => "#fff",
						"type" => "color");						
						
$of_options[] = array(  "name" =>  "Dark Button Background Color on Hover",
						"desc" => "",
						"id" => "colored_bg_dark_hover",
						"std" => "#fff",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Dark Button Text Color on Hover",
						"desc" => "",
						"id" => "colored_text_dark_hover",
						"std" => "#555",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Dark Button Border Color",
						"desc" => "",
						"id" => "colored_border_dark",
						"std" => "#555",
						"type" => "color");							
						
$of_options[] = array(  "name" =>  "Dark Button Border Color on Hover",
						"desc" => "",
						"id" => "colored_border_dark_hover",
						"std" => "#555",
						"type" => "color");
						
$of_options[] = array(  "name" => "Transparent Light Button",
						"desc" => "",
						"id" => "min_buttons_shortcode2",
						"std" => "<h3 style='margin: 0;'>Transparent Light Button</h3>Use the settings bellow to customize the look of the transparent light button.",
						"icon" => true,
						"type" => "info");	
						
$of_options[] = array(  "name" =>  "Transparent Light Button Border Color",
						"desc" => "",
						"id" => "transparent_light_border",
						"std" => "#ffffff",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Transparent Light Button Text Color",
						"desc" => "",
						"id" => "transparent_ligth_text",
						"std" => "#fff",
						"type" => "color");						
						
$of_options[] = array(  "name" =>  "Transparent Light Button Border Color on Hover",
						"desc" => "",
						"id" => "transparent_light_border_hover",
						"std" => "#ededed",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Transparent Light Button Text Color on Hover",
						"desc" => "",
						"id" => "transparent_ligth_text_hover",
						"std" => "#ededed",
						"type" => "color");	
						
$of_options[] = array(  "name" => "Transparent Dark Button",
						"desc" => "",
						"id" => "min_buttons_shortcode3",
						"std" => "<h3 style='margin: 0;'>Transparent Dark Button</h3>Use the settings bellow to customize the look of the transparent dark button.",
						"icon" => true,
						"type" => "info");	
						
$of_options[] = array(  "name" =>  "Transparent Dark Button Border Color",
						"desc" => "",
						"id" => "transparent_dark_border",
						"std" => "#555555",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Transparent Dark Button Text Color",
						"desc" => "",
						"id" => "transparent_dark_text",
						"std" => "#555555",
						"type" => "color");						
						
$of_options[] = array(  "name" =>  "Transparent Dark Button Border Color on Hover",
						"desc" => "",
						"id" => "transparent_dark_border_hover",
						"std" => "#7c7c7c",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Transparent Dark Button Text Color on Hover",
						"desc" => "",
						"id" => "transparent_dark_text_hover",
						"std" => "#7c7c7c",
						"type" => "color");																												

$of_options[] = array( 	"name" 		=> "VC Elements",
						"type" 		=> "heading"
				);
/*
$of_options[] = array(  "name" => "Minimal Buttons",
						"desc" => "",
						"id" => "min_buttons_shortcode",
						"std" => "<h3 style='margin: 0;'>Minimal Buttons Shortcode</h3>Use the settings bellow to customize the look of the minimal buttons.",
						"icon" => true,
						"type" => "info");
				
$of_options[] = array(  "name" =>  "Minimal Button Background Color",
						"desc" => "This setting also controls the background color of the Minimal Button Inverse, on hover.",
						"id" => "minimal_bg_color",
						"std" => "#333333",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Minimal Button Text Color",
						"desc" => "",
						"id" => "minimal_text_color",
						"std" => "#ffffff",
						"type" => "color");						
						
$of_options[] = array(  "name" =>  "Minimal Button Inverse Background Color",
						"desc" => "This setting also controls the background color of the Minimal Button, on hover.",
						"id" => "minimal_bg_inverse_color",
						"std" => "#f96e5b",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Minimal Button Inverse Text Color",
						"desc" => "",
						"id" => "minimal_text_color_inverse",
						"std" => "#ffffff",
						"type" => "color");	
						
$of_options[] = array( 	"name" 		=> "Minimal Button Text Shadow",
						"desc" 		=> "Enable text shadow effect on Minimal Buttons - uncheck to disable!",
						"id" 		=> "minimal_text_shadow",
						"std" 		=> 1,
						"type" 		=> "switch"
				);																									
*/

$of_options[] = array(  "name" => "Accordion Element",
						"desc" => "",
						"id" => "clients_shortcode",
						"std" => "<h3 style='margin: 0;'>Accordion Element</h3>Use the settings bellow to customize the look of the accordion element.",
						"icon" => true,
						"type" => "info");
						
$of_options[] = array(  "name" =>  "Active Section - Title Color",
						"desc" => "",
						"id" => "acc_active_title",
						"std" => "#f96e5b",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Active Section - Icon Color",
						"desc" => "",
						"id" => "acc_active_icon",
						"std" => "#f96e5b",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Inactive Section - Title Color",
						"desc" => "",
						"id" => "acc_inactive_title",
						"std" => "#333333",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Inactive Section - Icon Color",
						"desc" => "",
						"id" => "acc_inactive_icon",
						"std" => "#333333",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Separator color",
						"desc" => "",
						"id" => "acc_separator",
						"std" => "#dddddd",
						"type" => "color");																							
					
$of_options[] = array(  "name" => "Clients Element",
						"desc" => "",
						"id" => "clients_shortcode",
						"std" => "<h3 style='margin: 0;'>Clients Element</h3>Use the settings bellow to customize the look of the clients element.",
						"icon" => true,
						"type" => "info");	
/*						
$of_options[] = array(  "name" =>  "Clients Border Width (px)",
						"desc" => "",
						"id" => "clients_border_width",
						"std" 		=> "5",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "10",
						"type" 		=> "sliderui");																												
*/						
$of_options[] = array(  "name" =>  "Clients Border Color",
						"desc" => "",
						"id" => "clients_border_color",
						"std" => "#F5F5F5",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Clients Border Color on Hover",
						"desc" => "",
						"id" => "clients_border_color_hover",
						"std" => "#f96e5b",
						"type" => "color");	
						
$of_options[] = array( 	"name" => "Clients Effect",
						"desc" => "",
						"id" => "clients_effect",
						"std" 		=> "scroll",
						"type" 		=> "select",
						"options" 	=> $of_options_effect
						);
						
$of_options[] = array( 	"name" => "Clients Autoplay Effect",
						"desc" => "",
						"id" => "clients_auto",
						"std" 		=> "false",
						"type" 		=> "select",
						"options" 	=> $of_options_autoplay
						);	
						
$of_options[] = array(  "name" =>  "Clients Speed (miliseconds)",
						"desc" => "",
						"id" => "clients_speed",
						"std" 		=> "300",
						"min" 		=> "100",
						"step"		=> "100",
						"max" 		=> "1000",
						"type" 		=> "sliderui");	
						
$of_options[] = array(  "name" =>  "Clients Pause Time (seconds)",
						"desc" => "",
						"id" => "clients_pause",
						"std" 		=> "3",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "30",
						"type" 		=> "sliderui");						
						
$of_options[] = array(  "name" => "Title Element",
						"desc" => "",
						"id" => "cool_title_Element",
						"std" => "<h3 style='margin: 0;'> Title Element</h3>Use the settings bellow to customize the look of the Title element.",
						"icon" => true,
						"type" => "info");													

$of_options[] = array( 	"name" => "Title Small Bottom Border",
						"desc" => "Enable small border just bellow the title - turn off to disable!",
						"id" => "cool_title_border",
						"std" => 1,
						"type" => "switch"
				);
				
$of_options[] = array( 	"name" => "Title Small Bottom Border Color",
						"desc" => "",
						"id" => "cool_title_border_color",
						"std" => "#f96e5b",
						"type" => "color");	
						
$of_options[] = array( 	"name" => "Title Big Bottom Border Color",
						"desc" => "",
						"id" => "cool_title_big_border_color",
						"std" => "#e5e5e5",
						"type" => "color");																						
				
$of_options[] = array(  "name" => "Featured Services Element",
						"desc" => "",
						"id" => "featured_services_Element",
						"std" => "<h3 style='margin: 0;'>Featured Services Element</h3>Use the settings bellow to customize the look of the featured services element.",
						"icon" => true,
						"type" => "info");	
						
$of_options[] = array(  "name" =>  "Box Border (px)",
						"desc" => "",
						"id" => "fs_box_border_width",
						"std" 		=> "1",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "10",
						"type" 		=> "sliderui");
						
$of_options[] = array( 	"name" => "Box Background Color",
						"desc" => "",
						"id" => "fs_box_bg_color",
						"std" => "#9f9f9",
						"type" => "color");								
						
$of_options[] = array( 	"name" => "Box Background Color on Hover",
						"desc" => "",
						"id" => "fs_box_bg_color_hover",
						"std" => "#f96e5b",
						"type" => "color");		
						
$of_options[] = array( 	"name" => "Icon Color",
						"desc" => "",
						"id" => "fs_box_icon_color",
						"std" => "#777777",
						"type" => "color");		
						
$of_options[] = array( 	"name" => "Icon Color on Hover",
						"desc" => "",
						"id" => "fs_box_icon_color_hover",
						"std" => "#ffffff",
						"type" => "color");							
						
$of_options[] = array( 	"name" => "Title Color",
						"desc" => "",
						"id" => "fs_box_title_color",
						"std" => "#f96e5b",
						"type" => "color");	
						
$of_options[] = array( 	"name" => "Title Color on Hover",
						"desc" => "",
						"id" => "fs_box_title_color_hover",
						"std" => "#ffffff",
						"type" => "color");								
						
$of_options[] = array( 	"name" => "Text Color",
						"desc" => "",
						"id" => "fs_box_text_color",
						"std" => "#777777",
						"type" => "color");	
						
$of_options[] = array( 	"name" => "Text Color on Hover",
						"desc" => "",
						"id" => "fs_box_text_color_hover",
						"std" => "#ffffff",
						"type" => "color");							
/*
$of_options[] = array( 	"name" => "Text Shadow",
						"desc" => "Enable text shadow for icon, title and text on hover - turn off to disable!",
						"id" => "fs_box_text_shadow",
						"std" => 1,
						"type" => "switch");	

$of_options[] = array( 	"name" => "Elements Color on Hover",
						"desc" => "Choose the color for the Icon, Title and Text on hover bahavior.",
						"id" => "fs_box_elements_hover",
						"std" => "#ffffff",
						"type" => "color");	
*/						
$of_options[] = array(  "name" => "Product Featured Element",
						"desc" => "",
						"id" => "product_feature_Element",
						"std" => "<h3 style='margin: 0;'>Product Feature Element</h3>Use the settings bellow to customize the look of the product feature element.",
						"icon" => true,
						"type" => "info");
/*
$of_options[] = array( 	"name" => "Product Feature Icon Background Color - Style 1",
						"desc" => "",
						"id" => "pf_icon_bg1",
						"std" => "#f96e5b",
						"type" => "color");	
						
$of_options[] = array( 	"name" => "Product Feature Icon Color - Style 1",
						"desc" => "",
						"id" => "pf_icon_text1",
						"std" => "#ffffff",
						"type" => "color");		
						
$of_options[] = array( 	"name" => "Product Feature Title - Style 1",
						"desc" => "",
						"id" => "pf_icon_title1",
						"std" => "#f96e5b",
						"type" => "color");	
*/					
$of_options[] = array( 	"name" => "Product Feature Icon Background Color",
						"desc" => "",
						"id" => "pf_icon_bg2",
						"std" => "#333333",
						"type" => "color");	
						
$of_options[] = array( 	"name" => "Product Feature Icon Color",
						"desc" => "",
						"id" => "pf_icon_text2",
						"std" => "#ffffff",
						"type" => "color");		
						
$of_options[] = array( 	"name" => "Product Feature Title",
						"desc" => "",
						"id" => "pf_icon_title2",
						"std" => "#333333",
						"type" => "color");	
/*						
$of_options[] = array(  "name" =>  "Product Feature Icon Size (px) - Both Styles",
						"desc" => "",
						"id" => "pf_icon_size",
						"std" 		=> "20",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "40",
						"type" 		=> "sliderui");	
*/					
$of_options[] = array(  "name" => "Pricing Table Element",
						"desc" => "",
						"id" => "pricing_table_Element",
						"std" => "<h3 style='margin: 0;'>Pricing Table Element</h3>Use the settings bellow to customize the look of the pricing table element.",
						"icon" => true,
						"type" => "info");		
				
$of_options[] = array( 	"name" => "Best Pricing Column",
						"desc" => "Title Color",
						"id" => "pt_best_price_title",
						"std" => "#f96e5b",
						"type" => "color");				
				
$of_options[] = array( 	"name" => "",
						"desc" => "Price Background",
						"id" => "pt_best_price_bg",
						"std" => "#f96e5b",
						"type" => "color");		
						
$of_options[] = array( 	"name" => "",
						"desc" => "Text Color",
						"id" => "pt_best_price_text",
						"std" => "#ffffff",
						"type" => "color");	
						
$of_options[] = array( 	"name" => "",
						"desc" => "Time Color",
						"id" => "pt_best_price_time",
						"std" => "#eeeeee",
						"type" => "color");		
						
$of_options[] = array( 	"name" => "Normal Pricing Column",
						"desc" => "Title Color",
						"id" => "pt_normal_price_title",
						"std" => "#444444",
						"type" => "color");				
				
$of_options[] = array( 	"name" => "",
						"desc" => "Price Background",
						"id" => "pt_normal_price_bg",
						"std" => "#ffffff",
						"type" => "color");		
						
$of_options[] = array( 	"name" => "",
						"desc" => "Text Color",
						"id" => "pt_normal_price_text",
						"std" => "#444444",
						"type" => "color");	
						
$of_options[] = array( 	"name" => "",
						"desc" => "Time Color",
						"id" => "pt_normal_price_time",
						"std" => "#aaaaaa",
						"type" => "color");		
						
$of_options[] = array(  "name" => "Tabs Element",
						"desc" => "",
						"id" => "tabs_Element",
						"std" => "<h3 style='margin: 0;'>Tabs Element</h3>Use the settings bellow to customize the look of the tabs element.",
						"icon" => true,
						"type" => "info");	
						
$of_options[] = array( 	"name" => "Tabs Section - Border Color",
						"desc" => "",
						"id" => "tabs_border",
						"std" => "#e6e6e6",
						"type" => "color");
						
$of_options[] = array( 	"name" => "Tabs - Content Background Color",
						"desc" => "",
						"id" => "tabs_content_bg",
						"std" => "#ffffff",
						"type" => "color");
						
$of_options[] = array( 	"name" => "Tabs - Content Text Color",
						"desc" => "",
						"id" => "tabs_text",
						"std" => "#777777",
						"type" => "color");												

$of_options[] = array( 	"name" => "Active Tab - Border Top Color",
						"desc" => "",
						"id" => "tabs_active_tab",
						"std" => "#f96e5b",
						"type" => "color");
						
$of_options[] = array( 	"name" => "Active Tab - Text Color",
						"desc" => "",
						"id" => "tabs_active_text",
						"std" => "#f96e5b",
						"type" => "color");	
						
$of_options[] = array( 	"name" => "Active Tab - Background Color",
						"desc" => "",
						"id" => "tabs_active_bg",
						"std" => "#ffffff",
						"type" => "color");		
						
$of_options[] = array( 	"name" => "Inactive Tab - Text Color",
						"desc" => "",
						"id" => "tabs_inactive_text",
						"std" => "#888888",
						"type" => "color");	
						
$of_options[] = array( 	"name" => "Inactive Tab - Background Color",
						"desc" => "",
						"id" => "tabs_inactive_bg",
						"std" => "#f4f4f4",
						"type" => "color");		
						
$of_options[] = array(  "name" => "Tour Element",
						"desc" => "",
						"id" => "tour_Element",
						"std" => "<h3 style='margin: 0;'>Tour Element</h3>Use the settings bellow to customize the look of the tour element.",
						"icon" => true,
						"type" => "info");	
						
$of_options[] = array( 	"name" => "Tour Section - Border Color",
						"desc" => "",
						"id" => "tour_border",
						"std" => "#e6e6e6",
						"type" => "color");
						
$of_options[] = array( 	"name" => "Tour - Content Background Color",
						"desc" => "",
						"id" => "tour_content_bg",
						"std" => "#ffffff",
						"type" => "color");
						
$of_options[] = array( 	"name" => "Tour - Content Text Color",
						"desc" => "",
						"id" => "tour_text",
						"std" => "#777777",
						"type" => "color");												

$of_options[] = array( 	"name" => "Active Tour Tab - Border Left Color",
						"desc" => "",
						"id" => "tour_active_tab",
						"std" => "#f96e5b",
						"type" => "color");
						
$of_options[] = array( 	"name" => "Active Tour Tab - Text Color",
						"desc" => "",
						"id" => "tour_active_text",
						"std" => "#f96e5b",
						"type" => "color");	
						
$of_options[] = array( 	"name" => "Active Tour Tab - Background Color",
						"desc" => "",
						"id" => "tour_active_bg",
						"std" => "#ffffff",
						"type" => "color");		
						
$of_options[] = array( 	"name" => "Inactive Tour Tab - Text Color",
						"desc" => "",
						"id" => "tour_inactive_text",
						"std" => "#888888",
						"type" => "color");	
						
$of_options[] = array( 	"name" => "Inactive Tour Tab - Background Color",
						"desc" => "",
						"id" => "tour_inactive_bg",
						"std" => "#f4f4f4",
						"type" => "color");															
																																		
$of_options[] = array(  "name" => "Call to Action Element",
						"desc" => "",
						"id" => "cta_Element",
						"std" => "<h3 style='margin: 0;'>Call to Action</h3>Use the settings bellow to customize the look of the call to action element.",
						"icon" => true,
						"type" => "info");
						
$of_options[] = array( 	"name" => "Call to Action - Box Border Color",
						"desc" => "",
						"id" => "tagline_box_border",
						"std" => "#e8e8e8",
						"type" => "color");	

$of_options[] = array( 	"name" => "Call to Action - Inner Box Border Color",
						"desc" => "",
						"id" => "tagline_inner_box_border",
						"std" => "#f9f9f9",
						"type" => "color");						
						
$of_options[] = array( 	"name" => "Call to Action - Box Background Color",
						"desc" => "",
						"id" => "tagline_box_bg",
						"std" => "#ffffff",
						"type" => "color");
						
$of_options[] = array( 	"name" => "Call to Action - Box Title Color",
						"desc" => "",
						"id" => "tagline_box_title",
						"std" => "#444",
						"type" => "color");		
						
$of_options[] = array(  "name" =>  "Call to Action - Box Title Size (px)",
						"desc" => "",
						"id" => "tagline_title_size",
						"std" 		=> "19",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "40",
						"type" 		=> "sliderui");	
						
$of_options[] = array(  "name" =>  "Call to Action - Box Text Size (px)",
						"desc" => "",
						"id" => "tagline_text_size",
						"std" 		=> "12",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "40",
						"type" 		=> "sliderui");																																			

$of_options[] = array(  "name" => "Testimonials Element",
						"desc" => "",
						"id" => "testimonial_Element",
						"std" => "<h3 style='margin: 0;'>Testimonials Element</h3>Use the settings bellow to customize the look of the testimonial element.",
						"icon" => true,
						"type" => "info");
						
$of_options[] = array( 	"name" => "Testimonial Background Color",
						"desc" => "",
						"id" => "testimonial_bg_color",
						"std" => "#EEE",
						"type" => "color");		
						
$of_options[] = array( 	"name" => "Testimonial Border Color",
						"desc" => "",
						"id" => "testimonial_border_color",
						"std" => "#fff",
						"type" => "color");	
						
$of_options[] = array( 	"name" => "Testimonial Text Color",
						"desc" => "",
						"id" => "testimonial_text_color",
						"std" => "#222222",
						"type" => "color");	
						
$of_options[] = array( 	"name" => "Testimonial Author Color",
						"desc" => "",
						"id" => "testimonial_author_color",
						"std" => "#222222",
						"type" => "color");			
						
$of_options[] = array( 	"name" => "Testimonial Link Color",
						"desc" => "",
						"id" => "testimonial_link_color",
						"std" => "#f96e5b",
						"type" => "color");	
						
$of_options[] = array( 	"name" => "Testimonial Link Color Hover",
						"desc" => "",
						"id" => "testimonial_link_color_hover",
						"std" => "#222222",
						"type" => "color");																																				
/*
$of_options[] = array( 	"name" => "Testimonial Text Shadow",
						"desc" => "Enable text shadow - turn off to disable!",
						"id" => "testimonial_text_shadow",
						"std" => 1,
						"type" => "switch");
*/					
$of_options[] = array( 	"name" => "Testimonial Text Alignment",
						"desc" => "",
						"id" => "testimonial_text_align",
						"std" 		=> "Left",
						"type" 		=> "select",
						"options" 	=> $of_options_info
						);	
																							
						
$of_options[] = array( 	"name" => "Testimonial Author Details Position",
						"id" => "testimonial_author_position",
						"std" 		=> "Right",
						"type" 		=> "select",
						"options" 	=> $of_options_info
						);	
						
$of_options[] = array( 	"name" => "Testimonial Effect",
						"desc" => "",
						"id" => "testimonial_effect",
						"std" 		=> "scroll",
						"type" 		=> "select",
						"options" 	=> $of_options_effect
						);
						
$of_options[] = array( 	"name" => "Testimonial Autoplay Effect",
						"desc" => "",
						"id" => "testimonial_auto",
						"std" 		=> "false",
						"type" 		=> "select",
						"options" 	=> $of_options_autoplay
						);	
						
$of_options[] = array(  "name" =>  "Testimonial Transition Speed (miliseconds)",
						"desc" => "",
						"id" => "testimonial_speed",
						"std" 		=> "300",
						"min" 		=> "100",
						"step"		=> "100",
						"max" 		=> "1000",
						"type" 		=> "sliderui");	
						
$of_options[] = array(  "name" =>  "Testimonial Pause Time (seconds)",
						"desc" => "",
						"id" => "testimonial_pause",
						"std" 		=> "3",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "30",
						"type" 		=> "sliderui");	
																																							

$of_options[] = array(  "name" => "Toggle Box Element",
						"desc" => "",
						"id" => "toggle_box_Element",
						"std" => "<h3 style='margin: 0;'>Toggle Box Element</h3>Use the settings bellow to customize the look of the toggle box element.",
						"icon" => true,
						"type" => "info");
						
$of_options[] = array( 	"name" => "Toggle Box Icon Position",
						"desc" => "",
						"id" => "tb_pos",
						"std" 		=> "left",
						"type" 		=> "select",
						"options" 	=> $of_options_tb
						);			
						
$of_options[] = array( 	"name" => "Toggle Box Icon Color",
						"desc" => "",
						"id" => "tb_icon_color",
						"std" => "#333",
						"type" => "color");
						
$of_options[] = array( 	"name" => "Toggle Box Title Color",
						"desc" => "",
						"id" => "tb_title_color",
						"std" => "#333",
						"type" => "color");	
						
$of_options[] = array( 	"name" => "Toggle Box Icon Color on Hover / Expanded",
						"desc" => "",
						"id" => "tb_icon_color_hov",
						"std" => "#333",
						"type" => "color");
						
$of_options[] = array( 	"name" => "Toggle Box Title Color on Hover / Expanded",
						"desc" => "",
						"id" => "tb_title_color_hov",
						"std" => "#333",
						"type" => "color");	
						
$of_options[] = array(  "name" => "Tooltip Element",
						"desc" => "",
						"id" => "tooltip_Element",
						"std" => "<h3 style='margin: 0;'>Tooltip Element</h3>Use the settings bellow to customize the look of the tooltip element.",
						"icon" => true,
						"type" => "info");																																		
						
$of_options[] = array(  "name" =>  "Tooltip Background Color",
						"desc" => "",
						"id" => "tooltip_bg_color",
						"std" => "#000000",
						"type" => "color");
						
$of_options[] = array(  "name" =>  "Tooltip Text Color",
						"desc" => "",
						"id" => "tooltip_text_color",
						"std" => "#ffffff",
						"type" => "color");
/*
$of_options[] = array( 	"name" 		=> "Shortcodes",
						"type" 		=> "heading"
				);
				
$of_options[] = array(  "name" => "Checklist Shortcode",
						"desc" => "",
						"id" => "checklist_shortcode",
						"std" => "<h3 style='margin: 0;'>Checklist Shortcode</h3>Use the settings bellow to customize the look of the checklists.",
						"icon" => true,
						"type" => "info");	
						
$of_options[] = array(  "name" =>  "Checklist Color",
						"desc" => "",
						"id" => "checklist_color",
						"std" => "#777777",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Checklist Margin Left (px)",
						"desc" => "",
						"id" => "checklist_margin_left",
						"std" 		=> "0",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "30",
						"type" 		=> "sliderui");					

$of_options[] = array( 	"name" 		=> "Comments",
						"type" 		=> "heading"
				);
*/	

$of_options[] = array( 	"name" 		=> "Comments",
						"type" 		=> "heading"
				);
			
$of_options[] = array(  "name" => "Comments Settings",
						"desc" => "",
						"id" => "comm_settings",
						"std" => "<h3 style='margin: 0;'>Comments Settings</h3>",
						"icon" => true,
						"type" => "info");	
						
$of_options[] = array(  "name" => "Posts Comments",
						"desc" => "Show comments on single post pages.",
						"id" => "blog_comments",
						"std" => 1,
						"type" => "switch");									
						
$of_options[] = array(  "name" => "Page Comments - Default Template",
						"desc" => "Show comments on pages - default template.",
						"id" => "default_comments",
						"std" => 0,
						"type" => "switch");

$of_options[] = array(  "name" => "Submit Comment - Button Style ",
						"desc" => "Select the style for the Submit Comment button",
						"id" => "comment_style",
						"std" => "minimal",
						"type" => "select",
						"options" => array('minimal' => 'Minimal', '3d' => '3D'));	
						
$of_options[] = array(  "name" => "Submit Comment - Button Color",
						"desc" => "Select the color of the Submit Comment button",
						"id" => "comment_color",
						"std" => "lightred",
						"type" => "select",
						"options" => array( 'lightred' => 'Light Red',
											'darkred' => 'Dark Red',  
											'orange' => 'Orange',  
											'turquoise' => 'Turquoise',
											'emerald' => 'Emerald',
											'lightblue' => 'Light Blue',
											'amethyst' => 'Amethyst',
											'wetasphalt' => 'Wet Asphalt',
											'light' => 'Light',
											'dark' => 'Dark'
									 ));
									 
$of_options[] = array(  "name" => "Submit Comment - Button Size",
						"desc" => "Select the size of the Submit Comment button",
						"id" => "comment_size",
						"std" => "small",
						"type" => "select",
						"options" => array('small' => 'Small', 'large' => 'Large'));
						
$of_options[] = array(  "name" => "Submit Comment - Button Icon",
						"desc" => "Insert a fontawesome icon.",
						"id" => "comment_icon",
						"std" => "fa-comments",
						"type" => "text");															 						

$of_options[] = array( 	"name" 		=> "Blog Options",
						"type" 		=> "heading"
				);
				
$of_options[] = array(  "name" => "Posts Grid Element",
						"desc" => "",
						"id" => "post_grid_element",
						"std" => "<h3 style='margin: 0;'>Posts Grid Element</h3>Use the settings bellow to customize the Posts Grid element.",
						"icon" => true,
						"type" => "info");		
						
$of_options[] = array( 	
						"desc" => "Select where the Featured Image of the Posts Grid element links to: post page or bigger image.",
						"id" => "fi_post_link",
						"std" 		=> "bigger_image",
						"type" 		=> "select",
						"options" => array(						
							'bigger_image' => 'Bigger Image',
							'post_page' => 'Post Page',
						));								
				
$of_options[] = array(  "name" => "Single Post Page",
						"desc" => "",
						"id" => "single_post_page",
						"std" => "<h3 style='margin: 0;'>Single Post Page</h3>Use the settings bellow to customize the single post page.",
						"icon" => true,
						"type" => "info");

$of_options[] = array(  "name" => "Post Title",
						"desc" => "Show the post title that goes below the featured images",
						"id" => "blog_post_title",
						"std" => 1,
						"type" => "switch");				

$of_options[] = array(  "name" => "Featured Image on Single Post Page",
						"desc" => "Show featured images on top on single post pages.",
						"id" => "featured_images_single",
						"std" => 1,
						"type" => "switch");
						
$of_options[] = array(  "name" => "Social Sharing Box",
						"desc" => "Show the social sharing box.",
						"id" => "social_sharing_box",
						"std" => 1,
						"folds" =>1,
						"type" => "switch");

$of_options[] = array( 	
						"desc" => "Select the shape of the social icons",
						"id" => "social_icons_shape",
						"std" => "Rounded",
						"type" => "select",
						"fold" => "social_sharing_box",
						"options" => array(						
							'rounded' => 'Round',
							'square' => 'Square',
						));							
						
$of_options[] = array(  "name" => "Related Posts",
						"desc" => "Show related posts.",
						"id" => "related_posts",
						"std" => 1,
						"folds" => 1,
						"type" => "switch");
						
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "How many related posts to be displayed on single post pages",
						"id" 		=> "related_posts_number",
						"std" 		=> "4",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "15",
						"fold"		=> "related_posts_number",
						"type" 		=> "sliderui" 
				);							

						
$of_options[] = array(  "name" => "Show Post Date",
						"desc" => "Turn Off to hide date on single post page.",
						"id" => "post_meta_date",
						"std" => 1,
						"type" => "switch");						
						
$of_options[] = array(  "name" => "Show Post Tags",
						"desc" => "Turn Off to hide tags from on single post page.",
						"id" => "post_meta_tags",
						"std" => 0,
						"type" => "switch");						
						
$of_options[] = array(  "name" => "Show Previous/Next Pagination",
						"desc" => "Turn Off to disable previous/next pagination",
						"id" => "blog_pn_nav",
						"std" => 1,
						"type" => "switch");																			

$of_options[] = array(  "name" => "Post Meta Settings - Affects Single Post and Archive Page!",
						"desc" => "",
						"id" => "archive_page",
						"std" => "<h3 style='margin: 0;'>Post Meta Settings !</h3>These settings affect both single post and archive pages.",
						"icon" => true,
						"type" => "info");						
						
$of_options[] = array(  "name" => "Show Post Meta Author",
						"desc" => "Turn Off to hide author name from post meta.",
						"id" => "post_meta_author",
						"std" => 1,
						"type" => "switch");																										
						
$of_options[] = array(  "name" => "Show Post Meta Categories",
						"desc" => "Turn Off to hide categories from post meta.",
						"id" => "post_meta_cats",
						"std" => 1,
						"type" => "switch");						
						
$of_options[] = array(  "name" => "Show Post Meta Comments",
						"desc" => "Turn Off to hide comments from post meta.",
						"id" => "post_meta_comments",
						"std" => 1,
						"type" => "switch");						

$of_options[] = array(  "name" => "Archive Page",
						"desc" => "",
						"id" => "archive_page",
						"std" => "<h3 style='margin: 0;'>Archive Page</h3>Use the settings bellow to customize the archive page.",
						"icon" => true,
						"type" => "info");
						
$of_options[] = array( 	"name" 		=> "Posts per page",
						"desc" 		=> "How many posts to be displayed on archive pages",
						"id" 		=> "archive_posts",
						"std" 		=> "8",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "20",
						"type" 		=> "sliderui" 
				);	
				
$of_options[] = array(  "name" => "Category Description",
						"desc" => "Show/Hide Category Description.",
						"id" => "categ_desc",
						"std" => 1,
						"folds" => 1,
						"type" => "switch");

$of_options[] = array(  "name" =>  "",
						"desc" => "Category description background color",
						"id" => "categ_desc_bg",
						"std" => "#f7f7f7",
						"fold" => "categ_desc",
						"type" => "color");

$of_options[] = array(  "name" =>  "",
						"desc" => "Category description text color",
						"id" => "categ_desc_text",
						"std" => "#777777",
						"fold" => "categ_desc",
						"type" => "color");							
						
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Category description border width (px)",
						"id" 		=> "categ_desc_border",
						"std" 		=> "1",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "10",
						"fold" => "categ_desc",
						"type" 		=> "sliderui" 
				);
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Category description border color",
						"id" 		=> "categ_desc_border_color",
						"std" => "#f2f2f2",
						"fold" => "categ_desc",
						"type" => "color"
				);																										
						
$of_options[] = array(  "name" =>  "Blog Post Date Background Color on Archive Page",
						"desc" => "",
						"id" => "blog_post_date_bg_color",
						"std" => "#f96e5b",
						"type" => "color");	
				
$of_options[] = array(  "name" =>  "Blog Post Icon Color on Archive Page",
						"desc" => "",
						"id" => "blog_post_icon_color",
						"std" => "#999999",
						"type" => "color");	
						
$of_options[] = array(  "name" => "Show Post Date on Archive Page",
						"desc" => "Turn Off to hide date from archive page.",
						"id" => "post_archive_date",
						"std" => 1,
						"type" => "switch");						
						
$of_options[] = array(  "name" => "Show Post Icon on Archive Page",
						"desc" => "Turn Off to hide post icon.",
						"id" => "post_meta_icon",
						"std" => 1,
						"type" => "switch");																			
												

$of_options[] = array(  "name" => "Show Post Meta Read More Link",
						"desc" => "Turn Off to hide read more link from post meta.",
						"id" => "post_meta_read",
						"std" => 1,
						"type" => "switch");
						
$of_options[] = array(  "name" => "Excerpt vs Post Content",
						"desc" => "",
						"id" => "excerpt_post_content",
						"std" => "<h3 style='margin: 0;'>Post Excerpt vs Post Content</h3>Use the settings bellow to choose what to show on archive pages.",
						"icon" => true,
						"type" => "info");						
						
$of_options[] = array( 	
						"desc" => "Display post excerpt or full post content on archive pages.",
						"id" => "archive_excerpt_full",
						"std" 		=> "slide",
						"type" 		=> "select",
						"options" => array(						
							'excerpt' => 'Post Excerpt',
							'full' => 'Full Content',
						));							
						
$of_options[] = array(  "name" => "Excerpt Length",
						"desc" => "Input the number of words you want to cut from the content to be the excerpt of search and archive page.",
						"id" => "excerpt_length_blog",
						"std" => "40",
						"type" => "text");			
						
$of_options[] = array(  "name" => "Strip HTML from Excerpt",
						"desc" => "Check this if you want to strip HTML from the excerpt content only.",
						"id" => "strip_html_excerpt",
						"std" => 1,
						"type" => "switch");	
						
$of_options[] = array(  "name" => "Animations",
						"desc" => "",
						"id" => "blog_animations",
						"std" => "<h3 style='margin: 0;'>Blog Post Slideshow</h3>Use the settings bellow to customize the animation of the blog post featured images.",
						"icon" => true,
						"type" => "info");		
						
$of_options[] = array( 	"name" => "Slideshows Animation Effect",
						"desc" => "Select the effect for the slideshow animation.",
						"id" => "bp_anim",
						"std" 		=> "slide",
						"type" 		=> "select",
						"options" 	=> $of_options_animation
						);
/*						
$of_options[] = array( 	"name" => "Slideshows Animation Direction",
						"desc" => "Only works for SLIDE animation effect.",
						"id" => "bp_anim_dir",
						"std" 		=> "slide",
						"type" 		=> "select",
						"options" 	=> $of_options_direction
						);		
*/						
$of_options[] = array( 	"name" => "Slideshow Controls",
						"desc" => "Display slideshow controls. ",
						"id" => "bp_anim_control",
						"std" => 1,
						"type" => "switch");										
						
$of_options[] = array( 	"name" => "Slideshow Animation Autoplay",
						"desc" => "Turn On to enable Slideshow Autoplay.",
						"id" => "bp_anim_auto",
						"std" => 0,
						"type" => "switch");
						
$of_options[] = array( 	"name" => "Slideshow Animation Pause on Hover",
						"desc" => "Turn on to pause the slideshow on user hover. ",
						"id" => "bp_anim_pause",
						"std" => 1,
						"type" => "switch");
						
$of_options[] = array( 	"name" => "Slideshow Animation Speed",
						"desc" => "Select the speed of the slideshow, in miliseconds.",
						"id" => "bp_anim_speed",
						"std" 		=> "300",
						"min" 		=> "100",
						"step"		=> "50",
						"max" 		=> "2000",
						"type" 		=> "sliderui");		
						
$of_options[] = array( 	"name" => "Slideshow Animation Pause Time",
						"desc" => "Select the pause time for the slideshow, in seconds.",
						"id" => "bp_anim_pause_time",
						"std" 		=> "5",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "10",
						"type" 		=> "sliderui");																																																													

$of_options[] = array( 	"name" 		=> "Portfolio Options",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" => "Portfolio Items",
						"desc" => "Select how many portfolio items to display on portfolio pages (2 columns, 3 columns, 4 columns, hexagon columns, rounded columns).",
						"id" => "port_items",
						"std" 		=> "12",
						"min" 		=> "2",
						"step"		=> "1",
						"max" 		=> "30",
						"type" 		=> "sliderui");	
						
$of_options[] = array(  "name" => "Portfolio Slug",
						"desc" => "Change/Rewrite the permalink when you use the permalink type as %postname%.<strong>Make sure to regenerate permalinks.</strong>",
						"id" => "portfolio_slug",
						"std" => "portfolio-items",
						"type" => "text");		
						
$of_options[] = array(  "name" => "Portfolio Text Fields",
						"desc" => "",
						"id" => "port_text_field",
						"std" => "<h3 style='margin: 0;'>Portfolio Text Fields</h3>Use the settings bellow to change the text for the Portfolio Fields.",
						"icon" => true,
						"type" => "info");	

$of_options[] = array( 	"name" 		=> "Project Details Text",
						"desc" 		=> "Enter the text you want to use for Project Details text tag. Default is: Project Details.<br />Leave empty if you don't want to show anything.",
						"id" 		=> "project_details_text",
						"std" 		=> "Project Details",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> "Project Description Text",
						"desc" 		=> "Enter the text you want to use for Project Description text tag. Default is: Project Description.<br />Leave empty if you don't want to show anything.",
						"id" 		=> "project_description_text",
						"std" 		=> "Project Description",
						"type" 		=> "text"
				);	

$of_options[] = array( 	"name" 		=> "Related Projects Text",
						"desc" 		=> "Enter the text you want to use for Related Projects text tag. Default is: Related Projects.<br />Leave empty if you don't want to show anything.",
						"id" 		=> "project_related_text",
						"std" 		=> "Related Projects",
						"type" 		=> "text"
				);		
				
$of_options[] = array( 	"name" 		=> "Client Text",
						"desc" 		=> "Enter the text you want to use for Client text tag. Default is: Client.<br />This will only appear in the front end. In the backend you will still see Client.",
						"id" 		=> "project_client_text",
						"std" 		=> "Client",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Skills Text",
						"desc" 		=> "Enter the text you want to use for Skills text tag. Default is: Skills.<br />This will only appear in the front end. In the backend you will still see Skills.",
						"id" 		=> "project_skills_text",
						"std" 		=> "Skills",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Website Text",
						"desc" 		=> "Enter the text you want to use for Website text tag. Default is: Website.<br />This will only appear in the front end. In the backend you will still see Website.",
						"id" 		=> "project_website_text",
						"std" 		=> "Website",
						"type" 		=> "text"
				);																																	
						
$of_options[] = array(  "name" => "Single Portfolio Page",
						"desc" => "",
						"id" => "single_portfolio_page",
						"std" => "<h3 style='margin: 0;'>Single Portfolio Page</h3>Use the settings bellow to customize the single portfolio page.",
						"icon" => true,
						"type" => "info");	
						
$of_options[] = array( 	"name" => "Enable Project Details",
						"desc" => "This will show up the project details on the single portfolio page. ",
						"id" => "port_details",
						"std" => 1,
						"folds" => 1,
						"type" => "switch");
						
$of_options[] = array( 	"name" => "Project Creation Date",
						"desc" => "Show the project creation date. ",
						"id" => "port_date",
						"std" => 1,
						"fold" => "port_details",
						"type" => "switch");	
						
$of_options[] = array( 	"name" => "Project Client Name",
						"desc" => "Show the project client name. ",
						"id" => "port_client",
						"std" => 1,
						"fold" => "port_details",
						"type" => "switch");
						
$of_options[] = array( 	"name" => "Project Skills",
						"desc" => "Show the project skills. ",
						"id" => "port_skills",
						"std" => 1,
						"fold" => "port_details",
						"type" => "switch");
						
$of_options[] = array( 	"name" => "Project Website",
						"desc" => "Show the project website. ",
						"id" => "port_website",
						"std" => 1,
						"fold" => "port_details",
						"type" => "switch");																																						

$of_options[] = array( 	"name" => "Related Projects",
						"desc" => "Show/hide related portfolio posts. ",
						"id" => "related_portfolio",
						"std" => 1,
						"type" => "switch");

/*
$of_options[] = array( 	"name" => "Project Launch Button",
						"desc" => "Show the project launch button. ",
						"id" => "port_button",
						"std" => 1,
						"fold" => "port_details",
						"type" => "switch");																																						
*/
$of_options[] = array(  "name" => "Portfolio Element and Portfolio Columns",
						"desc" => "",
						"id" => "portfolio_page",
						"std" => "<h3 style='margin: 0;'>Portfolio Element and Portfolio Columns</h3>Use the settings bellow to customize the portfolio columns page and portfolio shortcode.",
						"icon" => true,
						"type" => "info");
						
$of_options[] = array( 	
						"desc" => "Select where the Portfolio Image links to: portfolio post or bigger image.",
						"id" => "portfolio_link",
						"std" 		=> "bigger_image",
						"type" 		=> "select",
						"options" => array(						
							'bigger_image' => 'Bigger Image',
							'portfolio_post' => 'Portfolio Post',
						));		
						
$of_options[] = array( 	"name" => "Show portfolio title and categories box",
						"desc" => "Select if you want to display the portfolio title and categories box bellow the portfolio image.",
						"id" => "portfolio_details",
						"std" 		=> "yes",
						"type" 		=> "switch"
						);												
				
$of_options[] = array(  "name" =>  "Portfolio Title Background Color ",
						"desc" => "",
						"fold" => "portfolio_details",
						"id" => "portf_title_bg_color",
						"std" => "#F5F5F5",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Portfolio Title Background Color Hover",
						"desc" => "",
						"fold" => "portfolio_details",
						"id" => "portf_title_bg_color_hover",
						"std" => "#f96e5b",
						"type" => "color");								
						
$of_options[] = array(  "name" =>  "Portfolio Title Link Color",
						"desc" => "",
						"fold" => "portfolio_details",
						"id" => "portf_title_link_color",
						"std" => "#444444",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Portfolio Title Link Color on Hover ",
						"desc" => "",
						"fold" => "portfolio_details",
						"id" => "portf_title_link_color_hover",
						"std" => "#ffffff",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Portfolio Categories Link Color ",
						"desc" => "",
						"fold" => "portfolio_details",
						"id" => "portf_categ_link_color",
						"std" => "#555555",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Portfolio Categories Link Color on Hover ",
						"desc" => "",
						"fold" => "portfolio_details",
						"id" => "portf_categ_link_color_hover",
						"std" => "#ffffff",
						"type" => "color");	

$of_options[] = array(  "name" => "Rounded & Hexagonal Portfolio Settings",
						"desc" => "",
						"id" => "portfolio_page",
						"std" => "<h3 style='margin: 0;'>Rounded & Hexagonal Portfolio Settings</h3>Use the settings bellow to customize the rounded and hexagonal portfolio items.",
						"icon" => true,
						"type" => "info");
						
$of_options[] = array(  "name" =>  "Rounded & Hexagonal Portfolio Background Color",
						"desc" => "",
						"id" => "portf_rh_bg",
						"std" => "#f96e5b",
						"type" => "color");										
						
$of_options[] = array(  "name" => "Portfolio Shortcode",
						"desc" => "",
						"id" => "recent_works_shortcode",
						"std" => "<h3 style='margin: 0;'>Portfolio Element </h3>Use the settings bellow to customize the look of the Portfolio Element of Visual Composer.",
						"icon" => true,
						"type" => "info");	
						
$of_options[] = array( 	"name" => "Portfolio Effect",
						"desc" => "",
						"id" => "rw_effect",
						"std" 		=> "scroll",
						"type" 		=> "select",
						"options" 	=> $of_options_effect
						);
						
$of_options[] = array( 	"name" => "Portfolio Autoplay Effect",
						"desc" => "",
						"id" => "rw_auto",
						"std" 		=> "false",
						"type" 		=> "select",
						"options" 	=> $of_options_autoplay
						);	
						
$of_options[] = array(  "name" =>  "Portfolio Transition Speed (miliseconds)",
						"desc" => "",
						"id" => "rw_speed",
						"std" 		=> "300",
						"min" 		=> "100",
						"step"		=> "100",
						"max" 		=> "1000",
						"type" 		=> "sliderui");	
						
$of_options[] = array(  "name" =>  "Portfolio Pause Time (seconds)",
						"desc" => "",
						"id" => "rw_pause",
						"std" 		=> "3",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "30",
						"type" 		=> "sliderui");											

$of_options[] = array( 	"name" 		=> "WooCommerce",
						"type" 		=> "heading"
				);
				
$of_options[] = array(  "name" => "WooCommerce Shop Page",
						"desc" => "",
						"id" => "woo_shop_page",
						"std" => "<h3 style='margin: 0;'>WooCommerce Shop Page</h3>Use the settings bellow to customize the functionality of your shop page.",
						"icon" => true,
						"type" => "info");
						
$of_options[] = array(  "name" => "Enable Sidebar",
						"desc" => "Enable/disable sidebar on your shop page.",
						"id" => "shop_sidebar",
						"std" => 0,
						"folds" => 1,
						"type" => "switch");
						
$of_options[] = array( "name" => "Woocommerce Archive/Category Sidebar",
						"desc" => "Select the sidebar that will be added to the archive/category pages.",
						"id" => "woocommerce_archive_sidebar",
						"std" => "None",
						"type" => "select",
						"options" => $sidebar_options
					);						
						
$of_options[] = array(  "name" =>  "Products per page",
						"desc" => "Select how many products you want to list on your pages.",
						"id" => "shop_prod_number",
						"std" 		=> "10",
						"min" 		=> "3",
						"step"		=> "1",
						"max" 		=> "40",
						"type" 		=> "sliderui");	
						
					
$of_options[] = array(  "name" =>  "WooCommerce Sale Tag",
						"desc" => "Select the color of the WooCommerce Sale Tag",
						"id" => "woo_sale_tag",
						"std" => "#f96e5b",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "WooCommerce Products Price",
						"desc" => "Select the color of the WooCommerce Products Price",
						"id" => "woo_prod_price",
						"std" => "#f96e5b",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "WooCommerce Products - Old Price",
						"desc" => "Select the color of the WooCommerce Products - Old Price",
						"id" => "woo_prod_old_price",
						"std" => "#c8c8c8",
						"type" => "color");																												

$of_options[] = array( 	"name" 		=> "Custom Css",
						"type" 		=> "heading"
				);

$of_options[] = array(  "name" => "Custom Css",
						"desc" => "",
						"id" => "custom_css_head",
						"std" => "<h3 style='margin: 0;'>Custom Css</h3>Use the textarea below to add custom css rules and modify the look of the Nimva theme.",
						"icon" => true,
						"type" => "info");

$of_options[] = array( 	//"name" 		=> "Custom CSS",
						//"desc" 		=> "Quickly add some CSS to your theme by adding it to this block.",
						"id" 		=> "custom_css_area",
						"std" 		=> "/* Add your custom css rules below */",
						"type" 		=> "textarea"
				);

$of_options[] = array( 	"name" 		=> "Contact Options",
						"type" 		=> "heading"
				);
				
$of_options[] = array(  "name" => "Google Map Type",
						"desc" => "Select the type of map to show on google map",
						"id" => "gmap_type",
						"std" => "roadmap",
						"options" => array('roadmap' => 'ROADMAP', 'satellite' => 'SATELLITE', 'hybrid' => 'HYBRID', 'terrain' => 'TERRAIN'),
						"type" => "select");

$of_options[] = array(  "name" => "Google Map Width",
						"desc" => "(in pixels or percentage, e.g.:100% or 100px)",
						"id" => "gmap_width",
						"std" => "100%",
						"type" => "text");

$of_options[] = array(  "name" => "Google Map Height",
						"desc" => "(in pixels, e.g.: 100px)",
						"id" => "gmap_height",
						"std" => "400px",
						"type" => "text");
						
$of_options[] = array(  "name" => "Google Map PopUp Title",
						"desc" => "Example: We are RockyThemes",
						"id" => "gmap_title",
						"std" => "We are <span>RockyThemes</span>",
						"type" => "text");	
						
$of_options[] = array(  "name" => "Google Map PopUp Short Message",
						"desc" => "",
						"id" => "gmap_desc",
						"std" => "Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.",
						"type" => "textarea");											

$of_options[] = array(  "name" => "Google Map Address",
						"desc" => "Example: 775 New York Ave, Brooklyn, New York 11203. ",
						"id" => "gmap_address",
						"std" => "",
						"type" => "text");

$of_options[] = array(  "name" => "Google Map Email Address",
						"desc" => "Enter your contact email.",
						"id" => "gmap_email",
						"std" => "support@rockythemes.com",
						"type" => "text");
						

$of_options[] = array(  "name" => "Google Map Phone Number",
						"desc" => "Enter your contact phone number.",
						"id" => "gmap_phone",
						"std" => "1.555.800.800",
						"type" => "text");						

$of_options[] = array(  "name" => "Map Zoom Level",
						"desc" => "Higher number will be more zoomed in",
						"id" => "map_zoom_level",
						"std" => "16",
						"std" 		=> "16",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "21",
						"type" 		=> "sliderui");	

$of_options[] = array(  "name" => "Disable Map Scrollwheel",
						"desc" => "Check to disable scrollwheel on google maps",
						"id" => "map_scrollwheel",
						"std" => 0,
						"type" => "checkbox");
/*
$of_options[] = array(  "name" => "Disable Map Scale",
						"desc" => "Check to disable scale on google maps",
						"id" => "map_scale",
						"std" => 0,
						"type" => "checkbox"); //asta am
*/
$of_options[] = array(  "name" => "Disable Map Zoom & Pan Control Icons",
						"desc" => "Check to disable zoom control icon and pan control icon on google maps",
						"id" => "map_zoomcontrol",
						"std" => 0,
						"type" => "checkbox");	
						
$of_options[] = array(  "name" => "Disable Map Type Control", //asta am
						"desc" => "Check to disable map type control on google maps",
						"id" => "map_type_control",
						"std" => 0,
						"type" => "checkbox");	
						
$of_options[] = array(  "name" => "Disable StreetView", //asta am
						"desc" => "Check to disable street view on google maps",
						"id" => "map_street",
						"std" => 0,
						"type" => "checkbox");														
				
$of_options[] = array( 	"name" 		=> "Docs and Videos",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Online Documentation",
						"id" 		=> "on_doc",
						"std" 		=> "<h3 style=\"margin: 0;\">Online Documentation</h3>You can check out the Online Documentation of the Nimva theme here: <a href=\"http://rockythemes.com/nimva/doc/\" target=\"_blank\">http://rockythemes.com/nimva/doc/</a>",
						"type" 		=> "info",
						"desc" 		=> '',
				);	
				
$of_options[] = array( 	"name" 		=> "Narrated Video Tutorials",
						"id" 		=> "on_videos",
						"std" 		=> "<h3 style=\"margin: 0;\">Narrated Video Tutorials</h3>You can check out the Narrated Video Tutorials of the Nimva theme here: <a href=\"https://www.youtube.com/playlist?list=PLw5gDyOINzEwNI1z5l2GFdlgY1u9x_h5A\" target=\"_blank\">Youtube Videos</a>",
						"type" 		=> "info",
						"desc" 		=> '',
				);					
			
				
// Backup Options
$of_options[] = array( 	"name" 		=> "Backup Options",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-slider.png"
				);
				
$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				);
				
$of_options[] = array( 	"name" 		=> "Transfer Theme Options Data",
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				);
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
