<?php
if ( ! class_exists( 'sportshub_customizer_default' ) ) {
	final class sportshub_customizer_default {
		private static $instance = null;
		private $sportshub_customize;
		public static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}
			return self::$instance;
		}
		private function __construct() {
			add_action( 'customize_controls_print_scripts', array( $this, 'sportshub_customize_controls_print_scripts' ) );
			add_action( 'customize_register', array( $this, 'sportshub_customize_register' ) );
		}
		public function sportshub_customize_controls_print_scripts() {
			wp_enqueue_style( 'css-for-customize', get_template_directory_uri() . '/inc/customizer/css/customizer-control.css' );
			wp_enqueue_script( 'js-for-customize', get_template_directory_uri() . '/inc/customizer/js/customizer-control.js', array( 'jquery', 'customize-controls' ) );			
		}
		private $wp_customize; // Define the property

		public function sportshub_customize_register( $sportshub_customize ) {
			$this->wp_customize = $sportshub_customize;
		}
	
		public function sportshub_reset_customizer() {
			$settings = $this->wp_customize->settings();
			foreach ( $settings as $setting ) {
				if ( 'theme_mod' == $setting->type ) {
					remove_theme_mod( $setting->id );
				}
			}
		}
	}
}
sportshub_customizer_default::get_instance();

function sportshub_register_theme_customizer( $sportshub_customize ) {
	class sportshub_control_image_select extends WP_Customize_Control {
	    public function render_content(){
	        if ( empty( $this->choices ) ){ return; }
	        if ( ! empty( $this->label ) ) : ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php endif;
				if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo esc_html($this->description) ; ?></span>
			<?php endif;
	        $html = array();
			$tpl  = '<label class="themelazerc-image-select"><img src="%s"><input type="%s" class="hidden" name="%s" value="%s" %s%s></label>';
			$field = $this->input_attrs;
			foreach ( $this->choices as $value => $image )
			{
				$html[] = sprintf(
					$tpl,
					$image,
					$field['multiple'] ? 'checkbox' : 'radio',
					$this->id,
					esc_attr( $value ),
					$this->get_link(),
					checked( $this->value(), $value, false )
				);
			}
			echo implode(' ', $html); 
	    }
	}
	// Header text
	class sportshub_Customize_Control_Title extends WP_Customize_Control {
	    public function render_content(){
	        if ( empty( $this->label ) ){ return; }
	        if ( ! empty( $this->label ) ) : ?>
					<h2 class="themelazerc_headding"><?php echo esc_html( $this->label ); ?>
				<?php endif;
				if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo esc_html($this->description) ; ?></span>
			</h2><?php endif; 
	    }
	}
	// Sidebar
	$option_sidebar = array();
	$sidebars = get_option('sbg_sidebars');
	$option_sidebar['']='';
	if(isset($sidebars)) {
		if(is_array($sidebars)) {
			foreach($sidebars as $sidebar) {
				$option_sidebar[$sidebar] = $sidebar;
			}			
		}
	}

	// Font and Google Font
	$faces = array(
	'none' => 'None',
	'abeezee' => 'ABeeZee',
    'adlam-display' => 'ADLaM Display',
    'ar-one-sans' => 'AR One Sans',
    'abel' => 'Abel',
    'abhaya-libre' => 'Abhaya Libre',
    'aboreto' => 'Aboreto',
    'abril-fatface' => 'Abril Fatface',
    'abyssinica-sil' => 'Abyssinica SIL',
    'aclonica' => 'Aclonica',
    'acme' => 'Acme',
    'actor' => 'Actor',
    'adamina' => 'Adamina',
    'advent-pro' => 'Advent Pro',
    'afacad' => 'Afacad',
    'agbalumo' => 'Agbalumo',
    'agdasima' => 'Agdasima',
    'aguafina-script' => 'Aguafina Script',
    'akatab' => 'Akatab',
    'akaya-kanadaka' => 'Akaya Kanadaka',
    'akaya-telivigala' => 'Akaya Telivigala',
    'akronim' => 'Akronim',
    'akshar' => 'Akshar',
    'aladin' => 'Aladin',
    'alata' => 'Alata',
    'alatsi' => 'Alatsi',
    'albert-sans' => 'Albert Sans',
    'aldrich' => 'Aldrich',
    'alef' => 'Alef',
    'alegreya' => 'Alegreya',
    'alegreya-sc' => 'Alegreya SC',
    'alegreya-sans' => 'Alegreya Sans',
    'alegreya-sans-sc' => 'Alegreya Sans SC',
    'aleo' => 'Aleo',
    'alex-brush' => 'Alex Brush',
    'alexandria' => 'Alexandria',
    'alfa-slab-one' => 'Alfa Slab One',
    'alice' => 'Alice',
    'alike' => 'Alike',
    'alike-angular' => 'Alike Angular',
    'alkalami' => 'Alkalami',
    'alkatra' => 'Alkatra',
    'allan' => 'Allan',
    'allerta' => 'Allerta',
    'allerta-stencil' => 'Allerta Stencil',
    'allison' => 'Allison',
    'allura' => 'Allura',
    'almarai' => 'Almarai',
    'almendra' => 'Almendra',
    'almendra-display' => 'Almendra Display',
    'almendra-sc' => 'Almendra SC',
    'alumni-sans' => 'Alumni Sans',
    'alumni-sans-collegiate-one' => 'Alumni Sans Collegiate One',
    'alumni-sans-inline-one' => 'Alumni Sans Inline One',
    'alumni-sans-pinstripe' => 'Alumni Sans Pinstripe',
    'amarante' => 'Amarante',
    'amaranth' => 'Amaranth',
    'amatic-sc' => 'Amatic SC',
    'amethysta' => 'Amethysta',
    'amiko' => 'Amiko',
    'amiri' => 'Amiri',
    'amiri-quran' => 'Amiri Quran',
    'amita' => 'Amita',
    'anaheim' => 'Anaheim',
    'andada-pro' => 'Andada Pro',
    'andika' => 'Andika',
    'anek-bangla' => 'Anek Bangla',
    'anek-devanagari' => 'Anek Devanagari',
    'anek-gujarati' => 'Anek Gujarati',
    'anek-gurmukhi' => 'Anek Gurmukhi',
    'anek-kannada' => 'Anek Kannada',
    'anek-latin' => 'Anek Latin',
    'anek-malayalam' => 'Anek Malayalam',
    'anek-odia' => 'Anek Odia',
    'anek-tamil' => 'Anek Tamil',
    'anek-telugu' => 'Anek Telugu',
    'angkor' => 'Angkor',
    'annapurna-sil' => 'Annapurna SIL',
    'annie-use-your-telescope' => 'Annie Use Your Telescope',
    'anonymous-pro' => 'Anonymous Pro',
    'anta' => 'Anta',
    'antic' => 'Antic',
    'antic-didone' => 'Antic Didone',
    'antic-slab' => 'Antic Slab',
    'anton' => 'Anton',
    'anton-sc' => 'Anton SC',
    'antonio' => 'Antonio',
    'anuphan' => 'Anuphan',
    'anybody' => 'Anybody',
    'aoboshi-one' => 'Aoboshi One',
    'arapey' => 'Arapey',
    'arbutus' => 'Arbutus',
    'arbutus-slab' => 'Arbutus Slab',
    'architects-daughter' => 'Architects Daughter',
    'archivo' => 'Archivo',
    'archivo-black' => 'Archivo Black',
    'archivo-narrow' => 'Archivo Narrow',
    'are-you-serious' => 'Are You Serious',
    'aref-ruqaa' => 'Aref Ruqaa',
    'aref-ruqaa-ink' => 'Aref Ruqaa Ink',
    'arima' => 'Arima',
    'arimo' => 'Arimo',
    'arizonia' => 'Arizonia',
    'armata' => 'Armata',
    'arsenal' => 'Arsenal',
    'arsenal-sc' => 'Arsenal SC',
    'artifika' => 'Artifika',
    'arvo' => 'Arvo',
    'arya' => 'Arya',
    'asap' => 'Asap',
    'asap-condensed' => 'Asap Condensed',
    'asar' => 'Asar',
    'asset' => 'Asset',
    'assistant' => 'Assistant',
    'astloch' => 'Astloch',
    'asul' => 'Asul',
    'athiti' => 'Athiti',
    'atkinson-hyperlegible' => 'Atkinson Hyperlegible',
    'atma' => 'Atma',
    'atomic-age' => 'Atomic Age',
    'aubrey' => 'Aubrey',
    'audiowide' => 'Audiowide',
    'autour-one' => 'Autour One',
    'average' => 'Average',
    'average-sans' => 'Average Sans',
    'averia-gruesa-libre' => 'Averia Gruesa Libre',
    'averia-libre' => 'Averia Libre',
    'averia-sans-libre' => 'Averia Sans Libre',
    'averia-serif-libre' => 'Averia Serif Libre',
    'azeret-mono' => 'Azeret Mono',
    'b612' => 'B612',
    'b612-mono' => 'B612 Mono',
    'biz-udgothic' => 'BIZ UDGothic',
    'biz-udmincho' => 'BIZ UDMincho',
    'biz-udpgothic' => 'BIZ UDPGothic',
    'biz-udpmincho' => 'BIZ UDPMincho',
    'babylonica' => 'Babylonica',
    'bacasime-antique' => 'Bacasime Antique',
    'bad-script' => 'Bad Script',
    'bagel-fat-one' => 'Bagel Fat One',
    'bahiana' => 'Bahiana',
    'bahianita' => 'Bahianita',
    'bai-jamjuree' => 'Bai Jamjuree',
    'bakbak-one' => 'Bakbak One',
    'ballet' => 'Ballet',
    'baloo-2' => 'Baloo 2',
    'baloo-bhai-2' => 'Baloo Bhai 2',
    'baloo-bhaijaan-2' => 'Baloo Bhaijaan 2',
    'baloo-bhaina-2' => 'Baloo Bhaina 2',
    'baloo-chettan-2' => 'Baloo Chettan 2',
    'baloo-da-2' => 'Baloo Da 2',
    'baloo-paaji-2' => 'Baloo Paaji 2',
    'baloo-tamma-2' => 'Baloo Tamma 2',
    'baloo-tammudu-2' => 'Baloo Tammudu 2',
    'baloo-thambi-2' => 'Baloo Thambi 2',
    'balsamiq-sans' => 'Balsamiq Sans',
    'balthazar' => 'Balthazar',
    'bangers' => 'Bangers',
    'barlow' => 'Barlow',
    'barlow-condensed' => 'Barlow Condensed',
    'barlow-semi-condensed' => 'Barlow Semi Condensed',
    'barriecito' => 'Barriecito',
    'barrio' => 'Barrio',
    'basic' => 'Basic',
    'baskervville' => 'Baskervville',
    'baskervville-sc' => 'Baskervville SC',
    'battambang' => 'Battambang',
    'baumans' => 'Baumans',
    'bayon' => 'Bayon',
    'be-vietnam-pro' => 'Be Vietnam Pro',
    'beau-rivage' => 'Beau Rivage',
    'bebas-neue' => 'Bebas Neue',
    'beiruti' => 'Beiruti',
    'belanosima' => 'Belanosima',
    'belgrano' => 'Belgrano',
    'bellefair' => 'Bellefair',
    'belleza' => 'Belleza',
    'bellota' => 'Bellota',
    'bellota-text' => 'Bellota Text',
    'benchnine' => 'BenchNine',
    'benne' => 'Benne',
    'bentham' => 'Bentham',
    'berkshire-swash' => 'Berkshire Swash',
    'besley' => 'Besley',
    'beth-ellen' => 'Beth Ellen',
    'bevan' => 'Bevan',
    'bhutuka-expanded-one' => 'BhuTuka Expanded One',
    'big-shoulders-display' => 'Big Shoulders Display',
    'big-shoulders-inline-display' => 'Big Shoulders Inline Display',
    'big-shoulders-inline-text' => 'Big Shoulders Inline Text',
    'big-shoulders-stencil-display' => 'Big Shoulders Stencil Display',
    'big-shoulders-stencil-text' => 'Big Shoulders Stencil Text',
    'big-shoulders-text' => 'Big Shoulders Text',
    'bigelow-rules' => 'Bigelow Rules',
    'bigshot-one' => 'Bigshot One',
    'bilbo' => 'Bilbo',
    'bilbo-swash-caps' => 'Bilbo Swash Caps',
    'biorhyme' => 'BioRhyme',
    'biorhyme-expanded' => 'BioRhyme Expanded',
    'birthstone' => 'Birthstone',
    'birthstone-bounce' => 'Birthstone Bounce',
    'biryani' => 'Biryani',
    'bitter' => 'Bitter',
    'black-and-white-picture' => 'Black And White Picture',
    'black-han-sans' => 'Black Han Sans',
    'black-ops-one' => 'Black Ops One',
    'blaka' => 'Blaka',
    'blaka-hollow' => 'Blaka Hollow',
    'blaka-ink' => 'Blaka Ink',
    'blinker' => 'Blinker',
    'bodoni-moda' => 'Bodoni Moda',
    'bodoni-moda-sc' => 'Bodoni Moda SC',
    'bokor' => 'Bokor',
    'bona-nova' => 'Bona Nova',
    'bona-nova-sc' => 'Bona Nova SC',
    'bonbon' => 'Bonbon',
    'bonheur-royale' => 'Bonheur Royale',
    'boogaloo' => 'Boogaloo',
    'borel' => 'Borel',
    'bowlby-one' => 'Bowlby One',
    'bowlby-one-sc' => 'Bowlby One SC',
    'braah-one' => 'Braah One',
    'brawler' => 'Brawler',
    'bree-serif' => 'Bree Serif',
    'bricolage-grotesque' => 'Bricolage Grotesque',
    'bruno-ace' => 'Bruno Ace',
    'bruno-ace-sc' => 'Bruno Ace SC',
    'brygada-1918' => 'Brygada 1918',
    'bubblegum-sans' => 'Bubblegum Sans',
    'bubbler-one' => 'Bubbler One',
    'buda' => 'Buda',
    'buenard' => 'Buenard',
    'bungee' => 'Bungee',
    'bungee-hairline' => 'Bungee Hairline',
    'bungee-inline' => 'Bungee Inline',
    'bungee-outline' => 'Bungee Outline',
    'bungee-shade' => 'Bungee Shade',
    'bungee-spice' => 'Bungee Spice',
    'bungee-tint' => 'Bungee Tint',
    'butcherman' => 'Butcherman',
    'butterfly-kids' => 'Butterfly Kids',
    'cabin' => 'Cabin',
    'cabin-condensed' => 'Cabin Condensed',
    'cabin-sketch' => 'Cabin Sketch',
    'cactus-classical-serif' => 'Cactus Classical Serif',
    'caesar-dressing' => 'Caesar Dressing',
    'cagliostro' => 'Cagliostro',
    'cairo' => 'Cairo',
    'cairo-play' => 'Cairo Play',
    'caladea' => 'Caladea',
    'calistoga' => 'Calistoga',
    'calligraffitti' => 'Calligraffitti',
    'cambay' => 'Cambay',
    'cambo' => 'Cambo',
    'candal' => 'Candal',
    'cantarell' => 'Cantarell',
    'cantata-one' => 'Cantata One',
    'cantora-one' => 'Cantora One',
    'caprasimo' => 'Caprasimo',
    'capriola' => 'Capriola',
    'caramel' => 'Caramel',
    'carattere' => 'Carattere',
    'cardo' => 'Cardo',
    'carlito' => 'Carlito',
    'carme' => 'Carme',
    'carrois-gothic' => 'Carrois Gothic',
    'carrois-gothic-sc' => 'Carrois Gothic SC',
    'carter-one' => 'Carter One',
    'castoro' => 'Castoro',
    'castoro-titling' => 'Castoro Titling',
    'catamaran' => 'Catamaran',
    'caudex' => 'Caudex',
    'caveat' => 'Caveat',
    'caveat-brush' => 'Caveat Brush',
    'cedarville-cursive' => 'Cedarville Cursive',
    'ceviche-one' => 'Ceviche One',
    'chakra-petch' => 'Chakra Petch',
    'changa' => 'Changa',
    'changa-one' => 'Changa One',
    'chango' => 'Chango',
    'charis-sil' => 'Charis SIL',
    'charm' => 'Charm',
    'charmonman' => 'Charmonman',
    'chathura' => 'Chathura',
    'chau-philomene-one' => 'Chau Philomene One',
    'chela-one' => 'Chela One',
    'chelsea-market' => 'Chelsea Market',
    'chenla' => 'Chenla',
    'cherish' => 'Cherish',
    'cherry-bomb-one' => 'Cherry Bomb One',
    'cherry-cream-soda' => 'Cherry Cream Soda',
    'cherry-swash' => 'Cherry Swash',
    'chewy' => 'Chewy',
    'chicle' => 'Chicle',
    'chilanka' => 'Chilanka',
    'chivo' => 'Chivo',
    'chivo-mono' => 'Chivo Mono',
    'chocolate-classical-sans' => 'Chocolate Classical Sans',
    'chokokutai' => 'Chokokutai',
    'chonburi' => 'Chonburi',
    'cinzel' => 'Cinzel',
    'cinzel-decorative' => 'Cinzel Decorative',
    'clicker-script' => 'Clicker Script',
    'climate-crisis' => 'Climate Crisis',
    'coda' => 'Coda',
    'codystar' => 'Codystar',
    'coiny' => 'Coiny',
    'combo' => 'Combo',
    'comfortaa' => 'Comfortaa',
    'comforter' => 'Comforter',
    'comforter-brush' => 'Comforter Brush',
    'comic-neue' => 'Comic Neue',
    'coming-soon' => 'Coming Soon',
    'comme' => 'Comme',
    'commissioner' => 'Commissioner',
    'concert-one' => 'Concert One',
    'condiment' => 'Condiment',
    'content' => 'Content',
    'contrail-one' => 'Contrail One',
    'convergence' => 'Convergence',
    'cookie' => 'Cookie',
    'copse' => 'Copse',
    'corben' => 'Corben',
    'corinthia' => 'Corinthia',
    'cormorant' => 'Cormorant',
    'cormorant-garamond' => 'Cormorant Garamond',
    'cormorant-infant' => 'Cormorant Infant',
    'cormorant-sc' => 'Cormorant SC',
    'cormorant-unicase' => 'Cormorant Unicase',
    'cormorant-upright' => 'Cormorant Upright',
    'courgette' => 'Courgette',
    'courier-prime' => 'Courier Prime',
    'cousine' => 'Cousine',
    'coustard' => 'Coustard',
    'covered-by-your-grace' => 'Covered By Your Grace',
    'crafty-girls' => 'Crafty Girls',
    'creepster' => 'Creepster',
    'crete-round' => 'Crete Round',
    'crimson-pro' => 'Crimson Pro',
    'crimson-text' => 'Crimson Text',
    'croissant-one' => 'Croissant One',
    'crushed' => 'Crushed',
    'cuprum' => 'Cuprum',
    'cute-font' => 'Cute Font',
    'cutive' => 'Cutive',
    'cutive-mono' => 'Cutive Mono',
    'dm-mono' => 'DM Mono',
    'dm-sans' => 'DM Sans',
    'dm-serif-display' => 'DM Serif Display',
    'dm-serif-text' => 'DM Serif Text',
    'dai-banna-sil' => 'Dai Banna SIL',
    'damion' => 'Damion',
    'dancing-script' => 'Dancing Script',
    'danfo' => 'Danfo',
    'dangrek' => 'Dangrek',
    'darker-grotesque' => 'Darker Grotesque',
    'darumadrop-one' => 'Darumadrop One',
    'david-libre' => 'David Libre',
    'dawning-of-a-new-day' => 'Dawning of a New Day',
    'days-one' => 'Days One',
    'dekko' => 'Dekko',
    'dela-gothic-one' => 'Dela Gothic One',
    'delicious-handrawn' => 'Delicious Handrawn',
    'delius' => 'Delius',
    'delius-swash-caps' => 'Delius Swash Caps',
    'delius-unicase' => 'Delius Unicase',
    'della-respira' => 'Della Respira',
    'denk-one' => 'Denk One',
    'devonshire' => 'Devonshire',
    'dhurjati' => 'Dhurjati',
    'didact-gothic' => 'Didact Gothic',
    'diphylleia' => 'Diphylleia',
    'diplomata' => 'Diplomata',
    'diplomata-sc' => 'Diplomata SC',
    'do-hyeon' => 'Do Hyeon',
    'dokdo' => 'Dokdo',
    'domine' => 'Domine',
    'donegal-one' => 'Donegal One',
    'dongle' => 'Dongle',
    'doppio-one' => 'Doppio One',
    'dorsa' => 'Dorsa',
    'dosis' => 'Dosis',
    'dotgothic16' => 'DotGothic16',
    'dr-sugiyama' => 'Dr Sugiyama',
    'duru-sans' => 'Duru Sans',
    'dynapuff' => 'DynaPuff',
    'dynalight' => 'Dynalight',
    'eb-garamond' => 'EB Garamond',
    'eagle-lake' => 'Eagle Lake',
    'east-sea-dokdo' => 'East Sea Dokdo',
    'eater' => 'Eater',
    'economica' => 'Economica',
    'eczar' => 'Eczar',
    'edu-au-vic-wa-nt-hand' => 'Edu AU VIC WA NT Hand',
    'edu-nsw-act-foundation' => 'Edu NSW ACT Foundation',
    'edu-qld-beginner' => 'Edu QLD Beginner',
    'edu-sa-beginner' => 'Edu SA Beginner',
    'edu-tas-beginner' => 'Edu TAS Beginner',
    'edu-vic-wa-nt-beginner' => 'Edu VIC WA NT Beginner',
    'el-messiri' => 'El Messiri',
    'electrolize' => 'Electrolize',
    'elsie' => 'Elsie',
    'elsie-swash-caps' => 'Elsie Swash Caps',
    'emblema-one' => 'Emblema One',
    'emilys-candy' => 'Emilys Candy',
    'encode-sans' => 'Encode Sans',
    'encode-sans-condensed' => 'Encode Sans Condensed',
    'encode-sans-expanded' => 'Encode Sans Expanded',
    'encode-sans-sc' => 'Encode Sans SC',
    'encode-sans-semi-condensed' => 'Encode Sans Semi Condensed',
    'encode-sans-semi-expanded' => 'Encode Sans Semi Expanded',
    'engagement' => 'Engagement',
    'englebert' => 'Englebert',
    'enriqueta' => 'Enriqueta',
    'ephesis' => 'Ephesis',
    'epilogue' => 'Epilogue',
    'erica-one' => 'Erica One',
    'esteban' => 'Esteban',
    'estonia' => 'Estonia',
    'euphoria-script' => 'Euphoria Script',
    'ewert' => 'Ewert',
    'exo' => 'Exo',
    'exo-2' => 'Exo 2',
    'expletus-sans' => 'Expletus Sans',
    'explora' => 'Explora',
    'fahkwang' => 'Fahkwang',
    'familjen-grotesk' => 'Familjen Grotesk',
    'fanwood-text' => 'Fanwood Text',
    'farro' => 'Farro',
    'farsan' => 'Farsan',
    'fascinate' => 'Fascinate',
    'fascinate-inline' => 'Fascinate Inline',
    'faster-one' => 'Faster One',
    'fasthand' => 'Fasthand',
    'fauna-one' => 'Fauna One',
    'faustina' => 'Faustina',
    'federant' => 'Federant',
    'federo' => 'Federo',
    'felipa' => 'Felipa',
    'fenix' => 'Fenix',
    'festive' => 'Festive',
    'figtree' => 'Figtree',
    'finger-paint' => 'Finger Paint',
    'finlandica' => 'Finlandica',
    'fira-code' => 'Fira Code',
    'fira-mono' => 'Fira Mono',
    'fira-sans' => 'Fira Sans',
    'fira-sans-condensed' => 'Fira Sans Condensed',
    'fira-sans-extra-condensed' => 'Fira Sans Extra Condensed',
    'fjalla-one' => 'Fjalla One',
    'fjord-one' => 'Fjord One',
    'flamenco' => 'Flamenco',
    'flavors' => 'Flavors',
    'fleur-de-leah' => 'Fleur De Leah',
    'flow-block' => 'Flow Block',
    'flow-circular' => 'Flow Circular',
    'flow-rounded' => 'Flow Rounded',
    'foldit' => 'Foldit',
    'fondamento' => 'Fondamento',
    'fontdiner-swanky' => 'Fontdiner Swanky',
    'forum' => 'Forum',
    'fragment-mono' => 'Fragment Mono',
    'francois-one' => 'Francois One',
    'frank-ruhl-libre' => 'Frank Ruhl Libre',
    'fraunces' => 'Fraunces',
    'freckle-face' => 'Freckle Face',
    'fredericka-the-great' => 'Fredericka the Great',
    'fredoka' => 'Fredoka',
    'freehand' => 'Freehand',
    'freeman' => 'Freeman',
    'fresca' => 'Fresca',
    'frijole' => 'Frijole',
    'fruktur' => 'Fruktur',
    'fugaz-one' => 'Fugaz One',
    'fuggles' => 'Fuggles',
    'fustat' => 'Fustat',
    'fuzzy-bubbles' => 'Fuzzy Bubbles',
    'gfs-didot' => 'GFS Didot',
    'gfs-neohellenic' => 'GFS Neohellenic',
    'ga-maamli' => 'Ga Maamli',
    'gabarito' => 'Gabarito',
    'gabriela' => 'Gabriela',
    'gaegu' => 'Gaegu',
    'gafata' => 'Gafata',
    'gajraj-one' => 'Gajraj One',
    'galada' => 'Galada',
    'galdeano' => 'Galdeano',
    'galindo' => 'Galindo',
    'gamja-flower' => 'Gamja Flower',
    'gantari' => 'Gantari',
    'gasoek-one' => 'Gasoek One',
    'gayathri' => 'Gayathri',
    'gelasio' => 'Gelasio',
    'gemunu-libre' => 'Gemunu Libre',
    'genos' => 'Genos',
    'gentium-book-plus' => 'Gentium Book Plus',
    'gentium-plus' => 'Gentium Plus',
    'geo' => 'Geo',
    'geologica' => 'Geologica',
    'georama' => 'Georama',
    'geostar' => 'Geostar',
    'geostar-fill' => 'Geostar Fill',
    'germania-one' => 'Germania One',
    'gideon-roman' => 'Gideon Roman',
    'gidugu' => 'Gidugu',
    'gilda-display' => 'Gilda Display',
    'girassol' => 'Girassol',
    'give-you-glory' => 'Give You Glory',
    'glass-antiqua' => 'Glass Antiqua',
    'glegoo' => 'Glegoo',
    'gloock' => 'Gloock',
    'gloria-hallelujah' => 'Gloria Hallelujah',
    'glory' => 'Glory',
    'gluten' => 'Gluten',
    'goblin-one' => 'Goblin One',
    'gochi-hand' => 'Gochi Hand',
    'goldman' => 'Goldman',
    'golos-text' => 'Golos Text',
    'gorditas' => 'Gorditas',
    'gothic-a1' => 'Gothic A1',
    'gotu' => 'Gotu',
    'goudy-bookletter-1911' => 'Goudy Bookletter 1911',
    'gowun-batang' => 'Gowun Batang',
    'gowun-dodum' => 'Gowun Dodum',
    'graduate' => 'Graduate',
    'grand-hotel' => 'Grand Hotel',
    'grandiflora-one' => 'Grandiflora One',
    'grandstander' => 'Grandstander',
    'grape-nuts' => 'Grape Nuts',
    'gravitas-one' => 'Gravitas One',
    'great-vibes' => 'Great Vibes',
    'grechen-fuemen' => 'Grechen Fuemen',
    'grenze' => 'Grenze',
    'grenze-gotisch' => 'Grenze Gotisch',
    'grey-qo' => 'Grey Qo',
    'griffy' => 'Griffy',
    'gruppo' => 'Gruppo',
    'gudea' => 'Gudea',
    'gugi' => 'Gugi',
    'gulzar' => 'Gulzar',
    'gupter' => 'Gupter',
    'gurajada' => 'Gurajada',
    'gwendolyn' => 'Gwendolyn',
    'habibi' => 'Habibi',
    'hachi-maru-pop' => 'Hachi Maru Pop',
    'hahmlet' => 'Hahmlet',
    'halant' => 'Halant',
    'hammersmith-one' => 'Hammersmith One',
    'hanalei' => 'Hanalei',
    'hanalei-fill' => 'Hanalei Fill',
    'handjet' => 'Handjet',
    'handlee' => 'Handlee',
    'hanken-grotesk' => 'Hanken Grotesk',
    'hanuman' => 'Hanuman',
    'happy-monkey' => 'Happy Monkey',
    'harmattan' => 'Harmattan',
    'headland-one' => 'Headland One',
    'hedvig-letters-sans' => 'Hedvig Letters Sans',
    'hedvig-letters-serif' => 'Hedvig Letters Serif',
    'heebo' => 'Heebo',
    'henny-penny' => 'Henny Penny',
    'hepta-slab' => 'Hepta Slab',
    'herr-von-muellerhoff' => 'Herr Von Muellerhoff',
    'hi-melody' => 'Hi Melody',
    'hina-mincho' => 'Hina Mincho',
    'hind' => 'Hind',
    'hind-guntur' => 'Hind Guntur',
    'hind-madurai' => 'Hind Madurai',
    'hind-siliguri' => 'Hind Siliguri',
    'hind-vadodara' => 'Hind Vadodara',
    'holtwood-one-sc' => 'Holtwood One SC',
    'homemade-apple' => 'Homemade Apple',
    'homenaje' => 'Homenaje',
    'honk' => 'Honk',
    'hubballi' => 'Hubballi',
    'hurricane' => 'Hurricane',
    'ibm-plex-mono' => 'IBM Plex Mono',
    'ibm-plex-sans' => 'IBM Plex Sans',
    'ibm-plex-sans-arabic' => 'IBM Plex Sans Arabic',
    'ibm-plex-sans-condensed' => 'IBM Plex Sans Condensed',
    'ibm-plex-sans-devanagari' => 'IBM Plex Sans Devanagari',
    'ibm-plex-sans-hebrew' => 'IBM Plex Sans Hebrew',
    'ibm-plex-sans-jp' => 'IBM Plex Sans JP',
    'ibm-plex-sans-kr' => 'IBM Plex Sans KR',
    'ibm-plex-sans-thai' => 'IBM Plex Sans Thai',
    'ibm-plex-sans-thai-looped' => 'IBM Plex Sans Thai Looped',
    'ibm-plex-serif' => 'IBM Plex Serif',
    'im-fell-dw-pica' => 'IM Fell DW Pica',
    'im-fell-dw-pica-sc' => 'IM Fell DW Pica SC',
    'im-fell-double-pica' => 'IM Fell Double Pica',
    'im-fell-double-pica-sc' => 'IM Fell Double Pica SC',
    'im-fell-english' => 'IM Fell English',
    'im-fell-english-sc' => 'IM Fell English SC',
    'im-fell-french-canon' => 'IM Fell French Canon',
    'im-fell-french-canon-sc' => 'IM Fell French Canon SC',
    'im-fell-great-primer' => 'IM Fell Great Primer',
    'im-fell-great-primer-sc' => 'IM Fell Great Primer SC',
    'ibarra-real-nova' => 'Ibarra Real Nova',
    'iceberg' => 'Iceberg',
    'iceland' => 'Iceland',
    'imbue' => 'Imbue',
    'imperial-script' => 'Imperial Script',
    'imprima' => 'Imprima',
    'inclusive-sans' => 'Inclusive Sans',
    'inconsolata' => 'Inconsolata',
    'inder' => 'Inder',
    'indie-flower' => 'Indie Flower',
    'ingrid-darling' => 'Ingrid Darling',
    'inika' => 'Inika',
    'inknut-antiqua' => 'Inknut Antiqua',
    'inria-sans' => 'Inria Sans',
    'inria-serif' => 'Inria Serif',
    'inspiration' => 'Inspiration',
    'instrument-sans' => 'Instrument Sans',
    'instrument-serif' => 'Instrument Serif',
    'inter' => 'Inter',
    'inter-tight' => 'Inter Tight',
    'irish-grover' => 'Irish Grover',
    'island-moments' => 'Island Moments',
    'istok-web' => 'Istok Web',
    'italiana' => 'Italiana',
    'italianno' => 'Italianno',
    'itim' => 'Itim',
    'jacquard-12' => 'Jacquard 12',
    'jacquard-12-charted' => 'Jacquard 12 Charted',
    'jacquard-24' => 'Jacquard 24',
    'jacquard-24-charted' => 'Jacquard 24 Charted',
    'jacquarda-bastarda-9' => 'Jacquarda Bastarda 9',
    'jacquarda-bastarda-9-charted' => 'Jacquarda Bastarda 9 Charted',
    'jacques-francois' => 'Jacques Francois',
    'jacques-francois-shadow' => 'Jacques Francois Shadow',
    'jaini' => 'Jaini',
    'jaini-purva' => 'Jaini Purva',
    'jaldi' => 'Jaldi',
    'jaro' => 'Jaro',
    'jersey-10' => 'Jersey 10',
    'jersey-10-charted' => 'Jersey 10 Charted',
    'jersey-15' => 'Jersey 15',
    'jersey-15-charted' => 'Jersey 15 Charted',
    'jersey-20' => 'Jersey 20',
    'jersey-20-charted' => 'Jersey 20 Charted',
    'jersey-25' => 'Jersey 25',
    'jersey-25-charted' => 'Jersey 25 Charted',
    'jetbrains-mono' => 'JetBrains Mono',
    'jim-nightshade' => 'Jim Nightshade',
    'joan' => 'Joan',
    'jockey-one' => 'Jockey One',
    'jolly-lodger' => 'Jolly Lodger',
    'jomhuria' => 'Jomhuria',
    'jomolhari' => 'Jomolhari',
    'josefin-sans' => 'Josefin Sans',
    'josefin-slab' => 'Josefin Slab',
    'jost' => 'Jost',
    'joti-one' => 'Joti One',
    'jua' => 'Jua',
    'judson' => 'Judson',
    'julee' => 'Julee',
    'julius-sans-one' => 'Julius Sans One',
    'junge' => 'Junge',
    'jura' => 'Jura',
    'just-another-hand' => 'Just Another Hand',
    'just-me-again-down-here' => 'Just Me Again Down Here',
    'k2d' => 'K2D',
    'kablammo' => 'Kablammo',
    'kadwa' => 'Kadwa',
    'kaisei-decol' => 'Kaisei Decol',
    'kaisei-harunoumi' => 'Kaisei HarunoUmi',
    'kaisei-opti' => 'Kaisei Opti',
    'kaisei-tokumin' => 'Kaisei Tokumin',
    'kalam' => 'Kalam',
    'kalnia' => 'Kalnia',
    'kalnia-glaze' => 'Kalnia Glaze',
    'kameron' => 'Kameron',
    'kanit' => 'Kanit',
    'kantumruy-pro' => 'Kantumruy Pro',
    'karantina' => 'Karantina',
    'karla' => 'Karla',
    'karma' => 'Karma',
    'katibeh' => 'Katibeh',
    'kaushan-script' => 'Kaushan Script',
    'kavivanar' => 'Kavivanar',
    'kavoon' => 'Kavoon',
    'kay-pho-du' => 'Kay Pho Du',
    'kdam-thmor-pro' => 'Kdam Thmor Pro',
    'keania-one' => 'Keania One',
    'kelly-slab' => 'Kelly Slab',
    'kenia' => 'Kenia',
    'khand' => 'Khand',
    'khmer' => 'Khmer',
    'khula' => 'Khula',
    'kings' => 'Kings',
    'kirang-haerang' => 'Kirang Haerang',
    'kite-one' => 'Kite One',
    'kiwi-maru' => 'Kiwi Maru',
    'klee-one' => 'Klee One',
    'knewave' => 'Knewave',
    'koho' => 'KoHo',
    'kodchasan' => 'Kodchasan',
    'kode-mono' => 'Kode Mono',
    'koh-santepheap' => 'Koh Santepheap',
    'kolker-brush' => 'Kolker Brush',
    'konkhmer-sleokchher' => 'Konkhmer Sleokchher',
    'kosugi' => 'Kosugi',
    'kosugi-maru' => 'Kosugi Maru',
    'kotta-one' => 'Kotta One',
    'koulen' => 'Koulen',
    'kranky' => 'Kranky',
    'kreon' => 'Kreon',
    'kristi' => 'Kristi',
    'krona-one' => 'Krona One',
    'krub' => 'Krub',
    'kufam' => 'Kufam',
    'kulim-park' => 'Kulim Park',
    'kumar-one' => 'Kumar One',
    'kumar-one-outline' => 'Kumar One Outline',
    'kumbh-sans' => 'Kumbh Sans',
    'kurale' => 'Kurale',
    'lxgw-wenkai-mono-tc' => 'LXGW WenKai Mono TC',
    'lxgw-wenkai-tc' => 'LXGW WenKai TC',
    'la-belle-aurore' => 'La Belle Aurore',
    'labrada' => 'Labrada',
    'lacquer' => 'Lacquer',
    'laila' => 'Laila',
    'lakki-reddy' => 'Lakki Reddy',
    'lalezar' => 'Lalezar',
    'lancelot' => 'Lancelot',
    'langar' => 'Langar',
    'lateef' => 'Lateef',
    'lato' => 'Lato',
    'lavishly-yours' => 'Lavishly Yours',
    'league-gothic' => 'League Gothic',
    'league-script' => 'League Script',
    'league-spartan' => 'League Spartan',
    'leckerli-one' => 'Leckerli One',
    'ledger' => 'Ledger',
    'lekton' => 'Lekton',
    'lemon' => 'Lemon',
    'lemonada' => 'Lemonada',
    'lexend' => 'Lexend',
    'lexend-deca' => 'Lexend Deca',
    'lexend-exa' => 'Lexend Exa',
    'lexend-giga' => 'Lexend Giga',
    'lexend-mega' => 'Lexend Mega',
    'lexend-peta' => 'Lexend Peta',
    'lexend-tera' => 'Lexend Tera',
    'lexend-zetta' => 'Lexend Zetta',
    'libre-barcode-128' => 'Libre Barcode 128',
    'libre-barcode-128-text' => 'Libre Barcode 128 Text',
    'libre-barcode-39' => 'Libre Barcode 39',
    'libre-barcode-39-extended' => 'Libre Barcode 39 Extended',
    'libre-barcode-39-extended-text' => 'Libre Barcode 39 Extended Text',
    'libre-barcode-39-text' => 'Libre Barcode 39 Text',
    'libre-barcode-ean13-text' => 'Libre Barcode EAN13 Text',
    'libre-baskerville' => 'Libre Baskerville',
    'libre-bodoni' => 'Libre Bodoni',
    'libre-caslon-display' => 'Libre Caslon Display',
    'libre-caslon-text' => 'Libre Caslon Text',
    'libre-franklin' => 'Libre Franklin',
    'licorice' => 'Licorice',
    'life-savers' => 'Life Savers',
    'lilita-one' => 'Lilita One',
    'lily-script-one' => 'Lily Script One',
    'limelight' => 'Limelight',
    'linden-hill' => 'Linden Hill',
    'linefont' => 'Linefont',
    'lisu-bosa' => 'Lisu Bosa',
    'literata' => 'Literata',
    'liu-jian-mao-cao' => 'Liu Jian Mao Cao',
    'livvic' => 'Livvic',
    'lobster' => 'Lobster',
    'lobster-two' => 'Lobster Two',
    'londrina-outline' => 'Londrina Outline',
    'londrina-shadow' => 'Londrina Shadow',
    'londrina-sketch' => 'Londrina Sketch',
    'londrina-solid' => 'Londrina Solid',
    'long-cang' => 'Long Cang',
    'lora' => 'Lora',
    'love-light' => 'Love Light',
    'love-ya-like-a-sister' => 'Love Ya Like A Sister',
    'loved-by-the-king' => 'Loved by the King',
    'lovers-quarrel' => 'Lovers Quarrel',
    'luckiest-guy' => 'Luckiest Guy',
    'lugrasimo' => 'Lugrasimo',
    'lumanosimo' => 'Lumanosimo',
    'lunasima' => 'Lunasima',
    'lusitana' => 'Lusitana',
    'lustria' => 'Lustria',
    'luxurious-roman' => 'Luxurious Roman',
    'luxurious-script' => 'Luxurious Script',
    'm-plus-1' => 'M PLUS 1',
    'm-plus-1-code' => 'M PLUS 1 Code',
    'm-plus-1p' => 'M PLUS 1p',
    'm-plus-2' => 'M PLUS 2',
    'm-plus-code-latin' => 'M PLUS Code Latin',
    'm-plus-rounded-1c' => 'M PLUS Rounded 1c',
    'ma-shan-zheng' => 'Ma Shan Zheng',
    'macondo' => 'Macondo',
    'macondo-swash-caps' => 'Macondo Swash Caps',
    'mada' => 'Mada',
    'madimi-one' => 'Madimi One',
    'magra' => 'Magra',
    'maiden-orange' => 'Maiden Orange',
    'maitree' => 'Maitree',
    'major-mono-display' => 'Major Mono Display',
    'mako' => 'Mako',
    'mali' => 'Mali',
    'mallanna' => 'Mallanna',
    'maname' => 'Maname',
    'mandali' => 'Mandali',
    'manjari' => 'Manjari',
    'manrope' => 'Manrope',
    'mansalva' => 'Mansalva',
    'manuale' => 'Manuale',
    'marcellus' => 'Marcellus',
    'marcellus-sc' => 'Marcellus SC',
    'marck-script' => 'Marck Script',
    'margarine' => 'Margarine',
    'marhey' => 'Marhey',
    'markazi-text' => 'Markazi Text',
    'marko-one' => 'Marko One',
    'marmelad' => 'Marmelad',
    'martel' => 'Martel',
    'martel-sans' => 'Martel Sans',
    'martian-mono' => 'Martian Mono',
    'marvel' => 'Marvel',
    'mate' => 'Mate',
    'mate-sc' => 'Mate SC',
    'matemasie' => 'Matemasie',
    'material-icons' => 'Material Icons',
    'material-icons-outlined' => 'Material Icons Outlined',
    'material-icons-round' => 'Material Icons Round',
    'material-icons-sharp' => 'Material Icons Sharp',
    'material-icons-two-tone' => 'Material Icons Two Tone',
    'material-symbols-outlined' => 'Material Symbols Outlined',
    'material-symbols-rounded' => 'Material Symbols Rounded',
    'material-symbols-sharp' => 'Material Symbols Sharp',
    'maven-pro' => 'Maven Pro',
    'mclaren' => 'McLaren',
    'mea-culpa' => 'Mea Culpa',
    'meddon' => 'Meddon',
    'medievalsharp' => 'MedievalSharp',
    'medula-one' => 'Medula One',
    'meera-inimai' => 'Meera Inimai',
    'megrim' => 'Megrim',
    'meie-script' => 'Meie Script',
    'meow-script' => 'Meow Script',
    'merienda' => 'Merienda',
    'merriweather' => 'Merriweather',
    'merriweather-sans' => 'Merriweather Sans',
    'metal' => 'Metal',
    'metal-mania' => 'Metal Mania',
    'metamorphous' => 'Metamorphous',
    'metrophobic' => 'Metrophobic',
    'michroma' => 'Michroma',
    'micro-5' => 'Micro 5',
    'micro-5-charted' => 'Micro 5 Charted',
    'milonga' => 'Milonga',
    'miltonian' => 'Miltonian',
    'miltonian-tattoo' => 'Miltonian Tattoo',
    'mina' => 'Mina',
    'mingzat' => 'Mingzat',
    'miniver' => 'Miniver',
    'miriam-libre' => 'Miriam Libre',
    'mirza' => 'Mirza',
    'miss-fajardose' => 'Miss Fajardose',
    'mitr' => 'Mitr',
    'mochiy-pop-one' => 'Mochiy Pop One',
    'mochiy-pop-p-one' => 'Mochiy Pop P One',
    'modak' => 'Modak',
    'modern-antiqua' => 'Modern Antiqua',
    'moderustic' => 'Moderustic',
    'mogra' => 'Mogra',
    'mohave' => 'Mohave',
    'moirai-one' => 'Moirai One',
    'molengo' => 'Molengo',
    'molle' => 'Molle',
    'monda' => 'Monda',
    'monofett' => 'Monofett',
    'monomaniac-one' => 'Monomaniac One',
    'monoton' => 'Monoton',
    'monsieur-la-doulaise' => 'Monsieur La Doulaise',
    'montaga' => 'Montaga',
    'montagu-slab' => 'Montagu Slab',
    'montecarlo' => 'MonteCarlo',
    'montez' => 'Montez',
    'montserrat' => 'Montserrat',
    'montserrat-alternates' => 'Montserrat Alternates',
    'montserrat-subrayada' => 'Montserrat Subrayada',
    'moo-lah-lah' => 'Moo Lah Lah',
    'mooli' => 'Mooli',
    'moon-dance' => 'Moon Dance',
    'moul' => 'Moul',
    'moulpali' => 'Moulpali',
    'mountains-of-christmas' => 'Mountains of Christmas',
    'mouse-memoirs' => 'Mouse Memoirs',
    'mr-bedfort' => 'Mr Bedfort',
    'mr-dafoe' => 'Mr Dafoe',
    'mr-de-haviland' => 'Mr De Haviland',
    'mrs-saint-delafield' => 'Mrs Saint Delafield',
    'mrs-sheppards' => 'Mrs Sheppards',
    'ms-madi' => 'Ms Madi',
    'mukta' => 'Mukta',
    'mukta-mahee' => 'Mukta Mahee',
    'mukta-malar' => 'Mukta Malar',
    'mukta-vaani' => 'Mukta Vaani',
    'mulish' => 'Mulish',
    'murecho' => 'Murecho',
    'museomoderno' => 'MuseoModerno',
    'my-soul' => 'My Soul',
    'mynerve' => 'Mynerve',
    'mystery-quest' => 'Mystery Quest',
    'ntr' => 'NTR',
    'nabla' => 'Nabla',
    'namdhinggo' => 'Namdhinggo',
    'nanum-brush-script' => 'Nanum Brush Script',
    'nanum-gothic' => 'Nanum Gothic',
    'nanum-gothic-coding' => 'Nanum Gothic Coding',
    'nanum-myeongjo' => 'Nanum Myeongjo',
    'nanum-pen-script' => 'Nanum Pen Script',
    'narnoor' => 'Narnoor',
    'neonderthaw' => 'Neonderthaw',
    'nerko-one' => 'Nerko One',
    'neucha' => 'Neucha',
    'neuton' => 'Neuton',
    'new-amsterdam' => 'New Amsterdam',
    'new-rocker' => 'New Rocker',
    'new-tegomin' => 'New Tegomin',
    'news-cycle' => 'News Cycle',
    'newsreader' => 'Newsreader',
    'niconne' => 'Niconne',
    'niramit' => 'Niramit',
    'nixie-one' => 'Nixie One',
    'nobile' => 'Nobile',
    'nokora' => 'Nokora',
    'norican' => 'Norican',
    'nosifer' => 'Nosifer',
    'notable' => 'Notable',
    'nothing-you-could-do' => 'Nothing You Could Do',
    'noticia-text' => 'Noticia Text',
    'noto-color-emoji' => 'Noto Color Emoji',
    'noto-emoji' => 'Noto Emoji',
    'noto-kufi-arabic' => 'Noto Kufi Arabic',
    'noto-music' => 'Noto Music',
    'noto-naskh-arabic' => 'Noto Naskh Arabic',
    'noto-nastaliq-urdu' => 'Noto Nastaliq Urdu',
    'noto-rashi-hebrew' => 'Noto Rashi Hebrew',
    'noto-sans' => 'Noto Sans',
    'noto-sans-adlam' => 'Noto Sans Adlam',
    'noto-sans-adlam-unjoined' => 'Noto Sans Adlam Unjoined',
    'noto-sans-anatolian-hieroglyphs' => 'Noto Sans Anatolian Hieroglyphs',
    'noto-sans-arabic' => 'Noto Sans Arabic',
    'noto-sans-armenian' => 'Noto Sans Armenian',
    'noto-sans-avestan' => 'Noto Sans Avestan',
    'noto-sans-balinese' => 'Noto Sans Balinese',
    'noto-sans-bamum' => 'Noto Sans Bamum',
    'noto-sans-bassa-vah' => 'Noto Sans Bassa Vah',
    'noto-sans-batak' => 'Noto Sans Batak',
    'noto-sans-bengali' => 'Noto Sans Bengali',
    'noto-sans-bhaiksuki' => 'Noto Sans Bhaiksuki',
    'noto-sans-brahmi' => 'Noto Sans Brahmi',
    'noto-sans-buginese' => 'Noto Sans Buginese',
    'noto-sans-buhid' => 'Noto Sans Buhid',
    'noto-sans-canadian-aboriginal' => 'Noto Sans Canadian Aboriginal',
    'noto-sans-carian' => 'Noto Sans Carian',
    'noto-sans-caucasian-albanian' => 'Noto Sans Caucasian Albanian',
    'noto-sans-chakma' => 'Noto Sans Chakma',
    'noto-sans-cham' => 'Noto Sans Cham',
    'noto-sans-cherokee' => 'Noto Sans Cherokee',
    'noto-sans-chorasmian' => 'Noto Sans Chorasmian',
    'noto-sans-coptic' => 'Noto Sans Coptic',
    'noto-sans-cuneiform' => 'Noto Sans Cuneiform',
    'noto-sans-cypriot' => 'Noto Sans Cypriot',
    'noto-sans-cypro-minoan' => 'Noto Sans Cypro Minoan',
    'noto-sans-deseret' => 'Noto Sans Deseret',
    'noto-sans-devanagari' => 'Noto Sans Devanagari',
    'noto-sans-display' => 'Noto Sans Display',
    'noto-sans-duployan' => 'Noto Sans Duployan',
    'noto-sans-egyptian-hieroglyphs' => 'Noto Sans Egyptian Hieroglyphs',
    'noto-sans-elbasan' => 'Noto Sans Elbasan',
    'noto-sans-elymaic' => 'Noto Sans Elymaic',
    'noto-sans-ethiopic' => 'Noto Sans Ethiopic',
    'noto-sans-georgian' => 'Noto Sans Georgian',
    'noto-sans-glagolitic' => 'Noto Sans Glagolitic',
    'noto-sans-gothic' => 'Noto Sans Gothic',
    'noto-sans-grantha' => 'Noto Sans Grantha',
    'noto-sans-gujarati' => 'Noto Sans Gujarati',
    'noto-sans-gunjala-gondi' => 'Noto Sans Gunjala Gondi',
    'noto-sans-gurmukhi' => 'Noto Sans Gurmukhi',
    'noto-sans-hk' => 'Noto Sans HK',
    'noto-sans-hanifi-rohingya' => 'Noto Sans Hanifi Rohingya',
    'noto-sans-hanunoo' => 'Noto Sans Hanunoo',
    'noto-sans-hatran' => 'Noto Sans Hatran',
    'noto-sans-hebrew' => 'Noto Sans Hebrew',
    'noto-sans-imperial-aramaic' => 'Noto Sans Imperial Aramaic',
    'noto-sans-indic-siyaq-numbers' => 'Noto Sans Indic Siyaq Numbers',
    'noto-sans-inscriptional-pahlavi' => 'Noto Sans Inscriptional Pahlavi',
    'noto-sans-inscriptional-parthian' => 'Noto Sans Inscriptional Parthian',
    'noto-sans-jp' => 'Noto Sans JP',
    'noto-sans-javanese' => 'Noto Sans Javanese',
    'noto-sans-kr' => 'Noto Sans KR',
    'noto-sans-kaithi' => 'Noto Sans Kaithi',
    'noto-sans-kannada' => 'Noto Sans Kannada',
    'noto-sans-kawi' => 'Noto Sans Kawi',
    'noto-sans-kayah-li' => 'Noto Sans Kayah Li',
    'noto-sans-kharoshthi' => 'Noto Sans Kharoshthi',
    'noto-sans-khmer' => 'Noto Sans Khmer',
    'noto-sans-khojki' => 'Noto Sans Khojki',
    'noto-sans-khudawadi' => 'Noto Sans Khudawadi',
    'noto-sans-lao' => 'Noto Sans Lao',
    'noto-sans-lao-looped' => 'Noto Sans Lao Looped',
    'noto-sans-lepcha' => 'Noto Sans Lepcha',
    'noto-sans-limbu' => 'Noto Sans Limbu',
    'noto-sans-linear-a' => 'Noto Sans Linear A',
    'noto-sans-linear-b' => 'Noto Sans Linear B',
    'noto-sans-lisu' => 'Noto Sans Lisu',
    'noto-sans-lycian' => 'Noto Sans Lycian',
    'noto-sans-lydian' => 'Noto Sans Lydian',
    'noto-sans-mahajani' => 'Noto Sans Mahajani',
    'noto-sans-malayalam' => 'Noto Sans Malayalam',
    'noto-sans-mandaic' => 'Noto Sans Mandaic',
    'noto-sans-manichaean' => 'Noto Sans Manichaean',
    'noto-sans-marchen' => 'Noto Sans Marchen',
    'noto-sans-masaram-gondi' => 'Noto Sans Masaram Gondi',
    'noto-sans-math' => 'Noto Sans Math',
    'noto-sans-mayan-numerals' => 'Noto Sans Mayan Numerals',
    'noto-sans-medefaidrin' => 'Noto Sans Medefaidrin',
    'noto-sans-meetei-mayek' => 'Noto Sans Meetei Mayek',
    'noto-sans-mende-kikakui' => 'Noto Sans Mende Kikakui',
    'noto-sans-meroitic' => 'Noto Sans Meroitic',
    'noto-sans-miao' => 'Noto Sans Miao',
    'noto-sans-modi' => 'Noto Sans Modi',
    'noto-sans-mongolian' => 'Noto Sans Mongolian',
    'noto-sans-mono' => 'Noto Sans Mono',
    'noto-sans-mro' => 'Noto Sans Mro',
    'noto-sans-multani' => 'Noto Sans Multani',
    'noto-sans-myanmar' => 'Noto Sans Myanmar',
    'noto-sans-nko' => 'Noto Sans NKo',
    'noto-sans-nko-unjoined' => 'Noto Sans NKo Unjoined',
    'noto-sans-nabataean' => 'Noto Sans Nabataean',
    'noto-sans-nag-mundari' => 'Noto Sans Nag Mundari',
    'noto-sans-nandinagari' => 'Noto Sans Nandinagari',
    'noto-sans-new-tai-lue' => 'Noto Sans New Tai Lue',
    'noto-sans-newa' => 'Noto Sans Newa',
    'noto-sans-nushu' => 'Noto Sans Nushu',
    'noto-sans-ogham' => 'Noto Sans Ogham',
    'noto-sans-ol-chiki' => 'Noto Sans Ol Chiki',
    'noto-sans-old-hungarian' => 'Noto Sans Old Hungarian',
    'noto-sans-old-italic' => 'Noto Sans Old Italic',
    'noto-sans-old-north-arabian' => 'Noto Sans Old North Arabian',
    'noto-sans-old-permic' => 'Noto Sans Old Permic',
    'noto-sans-old-persian' => 'Noto Sans Old Persian',
    'noto-sans-old-sogdian' => 'Noto Sans Old Sogdian',
    'noto-sans-old-south-arabian' => 'Noto Sans Old South Arabian',
    'noto-sans-old-turkic' => 'Noto Sans Old Turkic',
    'noto-sans-oriya' => 'Noto Sans Oriya',
    'noto-sans-osage' => 'Noto Sans Osage',
    'noto-sans-osmanya' => 'Noto Sans Osmanya',
    'noto-sans-pahawh-hmong' => 'Noto Sans Pahawh Hmong',
    'noto-sans-palmyrene' => 'Noto Sans Palmyrene',
    'noto-sans-pau-cin-hau' => 'Noto Sans Pau Cin Hau',
    'noto-sans-phags-pa' => 'Noto Sans Phags Pa',
    'noto-sans-phoenician' => 'Noto Sans Phoenician',
    'noto-sans-psalter-pahlavi' => 'Noto Sans Psalter Pahlavi',
    'noto-sans-rejang' => 'Noto Sans Rejang',
    'noto-sans-runic' => 'Noto Sans Runic',
    'noto-sans-sc' => 'Noto Sans SC',
    'noto-sans-samaritan' => 'Noto Sans Samaritan',
    'noto-sans-saurashtra' => 'Noto Sans Saurashtra',
    'noto-sans-sharada' => 'Noto Sans Sharada',
    'noto-sans-shavian' => 'Noto Sans Shavian',
    'noto-sans-siddham' => 'Noto Sans Siddham',
    'noto-sans-signwriting' => 'Noto Sans SignWriting',
    'noto-sans-sinhala' => 'Noto Sans Sinhala',
    'noto-sans-sogdian' => 'Noto Sans Sogdian',
    'noto-sans-sora-sompeng' => 'Noto Sans Sora Sompeng',
    'noto-sans-soyombo' => 'Noto Sans Soyombo',
    'noto-sans-sundanese' => 'Noto Sans Sundanese',
    'noto-sans-syloti-nagri' => 'Noto Sans Syloti Nagri',
    'noto-sans-symbols' => 'Noto Sans Symbols',
    'noto-sans-symbols-2' => 'Noto Sans Symbols 2',
    'noto-sans-syriac' => 'Noto Sans Syriac',
    'noto-sans-syriac-eastern' => 'Noto Sans Syriac Eastern',
    'noto-sans-tc' => 'Noto Sans TC',
    'noto-sans-tagalog' => 'Noto Sans Tagalog',
    'noto-sans-tagbanwa' => 'Noto Sans Tagbanwa',
    'noto-sans-tai-le' => 'Noto Sans Tai Le',
    'noto-sans-tai-tham' => 'Noto Sans Tai Tham',
    'noto-sans-tai-viet' => 'Noto Sans Tai Viet',
    'noto-sans-takri' => 'Noto Sans Takri',
    'noto-sans-tamil' => 'Noto Sans Tamil',
    'noto-sans-tamil-supplement' => 'Noto Sans Tamil Supplement',
    'noto-sans-tangsa' => 'Noto Sans Tangsa',
    'noto-sans-telugu' => 'Noto Sans Telugu',
    'noto-sans-thaana' => 'Noto Sans Thaana',
    'noto-sans-thai' => 'Noto Sans Thai',
    'noto-sans-thai-looped' => 'Noto Sans Thai Looped',
    'noto-sans-tifinagh' => 'Noto Sans Tifinagh',
    'noto-sans-tirhuta' => 'Noto Sans Tirhuta',
    'noto-sans-ugaritic' => 'Noto Sans Ugaritic',
    'noto-sans-vai' => 'Noto Sans Vai',
    'noto-sans-vithkuqi' => 'Noto Sans Vithkuqi',
    'noto-sans-wancho' => 'Noto Sans Wancho',
    'noto-sans-warang-citi' => 'Noto Sans Warang Citi',
    'noto-sans-yi' => 'Noto Sans Yi',
    'noto-sans-zanabazar-square' => 'Noto Sans Zanabazar Square',
    'noto-serif' => 'Noto Serif',
    'noto-serif-ahom' => 'Noto Serif Ahom',
    'noto-serif-armenian' => 'Noto Serif Armenian',
    'noto-serif-balinese' => 'Noto Serif Balinese',
    'noto-serif-bengali' => 'Noto Serif Bengali',
    'noto-serif-devanagari' => 'Noto Serif Devanagari',
    'noto-serif-display' => 'Noto Serif Display',
    'noto-serif-dogra' => 'Noto Serif Dogra',
    'noto-serif-ethiopic' => 'Noto Serif Ethiopic',
    'noto-serif-georgian' => 'Noto Serif Georgian',
    'noto-serif-grantha' => 'Noto Serif Grantha',
    'noto-serif-gujarati' => 'Noto Serif Gujarati',
    'noto-serif-gurmukhi' => 'Noto Serif Gurmukhi',
    'noto-serif-hk' => 'Noto Serif HK',
    'noto-serif-hebrew' => 'Noto Serif Hebrew',
    'noto-serif-jp' => 'Noto Serif JP',
    'noto-serif-kr' => 'Noto Serif KR',
    'noto-serif-kannada' => 'Noto Serif Kannada',
    'noto-serif-khitan-small-script' => 'Noto Serif Khitan Small Script',
    'noto-serif-khmer' => 'Noto Serif Khmer',
    'noto-serif-khojki' => 'Noto Serif Khojki',
    'noto-serif-lao' => 'Noto Serif Lao',
    'noto-serif-makasar' => 'Noto Serif Makasar',
    'noto-serif-malayalam' => 'Noto Serif Malayalam',
    'noto-serif-myanmar' => 'Noto Serif Myanmar',
    'noto-serif-np-hmong' => 'Noto Serif NP Hmong',
    'noto-serif-old-uyghur' => 'Noto Serif Old Uyghur',
    'noto-serif-oriya' => 'Noto Serif Oriya',
    'noto-serif-ottoman-siyaq' => 'Noto Serif Ottoman Siyaq',
    'noto-serif-sc' => 'Noto Serif SC',
    'noto-serif-sinhala' => 'Noto Serif Sinhala',
    'noto-serif-tc' => 'Noto Serif TC',
    'noto-serif-tamil' => 'Noto Serif Tamil',
    'noto-serif-tangut' => 'Noto Serif Tangut',
    'noto-serif-telugu' => 'Noto Serif Telugu',
    'noto-serif-thai' => 'Noto Serif Thai',
    'noto-serif-tibetan' => 'Noto Serif Tibetan',
    'noto-serif-toto' => 'Noto Serif Toto',
    'noto-serif-vithkuqi' => 'Noto Serif Vithkuqi',
    'noto-serif-yezidi' => 'Noto Serif Yezidi',
    'noto-traditional-nushu' => 'Noto Traditional Nushu',
    'noto-znamenny-musical-notation' => 'Noto Znamenny Musical Notation',
    'nova-cut' => 'Nova Cut',
    'nova-flat' => 'Nova Flat',
    'nova-mono' => 'Nova Mono',
    'nova-oval' => 'Nova Oval',
    'nova-round' => 'Nova Round',
    'nova-script' => 'Nova Script',
    'nova-slim' => 'Nova Slim',
    'nova-square' => 'Nova Square',
    'numans' => 'Numans',
    'nunito' => 'Nunito',
    'nunito-sans' => 'Nunito Sans',
    'nuosu-sil' => 'Nuosu SIL',
    'odibee-sans' => 'Odibee Sans',
    'odor-mean-chey' => 'Odor Mean Chey',
    'offside' => 'Offside',
    'oi' => 'Oi',
    'ojuju' => 'Ojuju',
    'old-standard-tt' => 'Old Standard TT',
    'oldenburg' => 'Oldenburg',
    'ole' => 'Ole',
    'oleo-script' => 'Oleo Script',
    'oleo-script-swash-caps' => 'Oleo Script Swash Caps',
    'onest' => 'Onest',
    'oooh-baby' => 'Oooh Baby',
    'open-sans' => 'Open Sans',
    'oranienbaum' => 'Oranienbaum',
    'orbit' => 'Orbit',
    'orbitron' => 'Orbitron',
    'oregano' => 'Oregano',
    'orelega-one' => 'Orelega One',
    'orienta' => 'Orienta',
    'original-surfer' => 'Original Surfer',
    'oswald' => 'Oswald',
    'outfit' => 'Outfit',
    'over-the-rainbow' => 'Over the Rainbow',
    'overlock' => 'Overlock',
    'overlock-sc' => 'Overlock SC',
    'overpass' => 'Overpass',
    'overpass-mono' => 'Overpass Mono',
    'ovo' => 'Ovo',
    'oxanium' => 'Oxanium',
    'oxygen' => 'Oxygen',
    'oxygen-mono' => 'Oxygen Mono',
    'pt-mono' => 'PT Mono',
    'pt-sans' => 'PT Sans',
    'pt-sans-caption' => 'PT Sans Caption',
    'pt-sans-narrow' => 'PT Sans Narrow',
    'pt-serif' => 'PT Serif',
    'pt-serif-caption' => 'PT Serif Caption',
    'pacifico' => 'Pacifico',
    'padauk' => 'Padauk',
    'padyakke-expanded-one' => 'Padyakke Expanded One',
    'palanquin' => 'Palanquin',
    'palanquin-dark' => 'Palanquin Dark',
    'palette-mosaic' => 'Palette Mosaic',
    'pangolin' => 'Pangolin',
    'paprika' => 'Paprika',
    'parisienne' => 'Parisienne',
    'passero-one' => 'Passero One',
    'passion-one' => 'Passion One',
    'passions-conflict' => 'Passions Conflict',
    'pathway-extreme' => 'Pathway Extreme',
    'pathway-gothic-one' => 'Pathway Gothic One',
    'patrick-hand' => 'Patrick Hand',
    'patrick-hand-sc' => 'Patrick Hand SC',
    'pattaya' => 'Pattaya',
    'patua-one' => 'Patua One',
    'pavanam' => 'Pavanam',
    'paytone-one' => 'Paytone One',
    'peddana' => 'Peddana',
    'peralta' => 'Peralta',
    'permanent-marker' => 'Permanent Marker',
    'petemoss' => 'Petemoss',
    'petit-formal-script' => 'Petit Formal Script',
    'petrona' => 'Petrona',
    'philosopher' => 'Philosopher',
    'phudu' => 'Phudu',
    'piazzolla' => 'Piazzolla',
    'piedra' => 'Piedra',
    'pinyon-script' => 'Pinyon Script',
    'pirata-one' => 'Pirata One',
    'pixelify-sans' => 'Pixelify Sans',
    'plaster' => 'Plaster',
    'platypi' => 'Platypi',
    'play' => 'Play',
    'playball' => 'Playball',
    'playfair' => 'Playfair',
    'playfair-display' => 'Playfair Display',
    'playfair-display-sc' => 'Playfair Display SC',
    'playpen-sans' => 'Playpen Sans',
    'playwrite-ar' => 'Playwrite AR',
    'playwrite-at' => 'Playwrite AT',
    'playwrite-au-nsw' => 'Playwrite AU NSW',
    'playwrite-au-qld' => 'Playwrite AU QLD',
    'playwrite-au-sa' => 'Playwrite AU SA',
    'playwrite-au-tas' => 'Playwrite AU TAS',
    'playwrite-au-vic' => 'Playwrite AU VIC',
    'playwrite-be-vlg' => 'Playwrite BE VLG',
    'playwrite-be-wal' => 'Playwrite BE WAL',
    'playwrite-br' => 'Playwrite BR',
    'playwrite-ca' => 'Playwrite CA',
    'playwrite-cl' => 'Playwrite CL',
    'playwrite-co' => 'Playwrite CO',
    'playwrite-cu' => 'Playwrite CU',
    'playwrite-cz' => 'Playwrite CZ',
    'playwrite-de-grund' => 'Playwrite DE Grund',
    'playwrite-de-la' => 'Playwrite DE LA',
    'playwrite-de-sas' => 'Playwrite DE SAS',
    'playwrite-de-va' => 'Playwrite DE VA',
    'playwrite-dk-loopet' => 'Playwrite DK Loopet',
    'playwrite-dk-uloopet' => 'Playwrite DK Uloopet',
    'playwrite-es' => 'Playwrite ES',
    'playwrite-es-deco' => 'Playwrite ES Deco',
    'playwrite-fr-moderne' => 'Playwrite FR Moderne',
    'playwrite-fr-trad' => 'Playwrite FR Trad',
    'playwrite-gb-j' => 'Playwrite GB J',
    'playwrite-gb-s' => 'Playwrite GB S',
    'playwrite-hr' => 'Playwrite HR',
    'playwrite-hr-lijeva' => 'Playwrite HR Lijeva',
    'playwrite-hu' => 'Playwrite HU',
    'playwrite-id' => 'Playwrite ID',
    'playwrite-ie' => 'Playwrite IE',
    'playwrite-in' => 'Playwrite IN',
    'playwrite-is' => 'Playwrite IS',
    'playwrite-it-moderna' => 'Playwrite IT Moderna',
    'playwrite-it-trad' => 'Playwrite IT Trad',
    'playwrite-mx' => 'Playwrite MX',
    'playwrite-ng-modern' => 'Playwrite NG Modern',
    'playwrite-nl' => 'Playwrite NL',
    'playwrite-no' => 'Playwrite NO',
    'playwrite-nz' => 'Playwrite NZ',
    'playwrite-pe' => 'Playwrite PE',
    'playwrite-pl' => 'Playwrite PL',
    'playwrite-pt' => 'Playwrite PT',
    'playwrite-ro' => 'Playwrite RO',
    'playwrite-sk' => 'Playwrite SK',
    'playwrite-tz' => 'Playwrite TZ',
    'playwrite-us-modern' => 'Playwrite US Modern',
    'playwrite-us-trad' => 'Playwrite US Trad',
    'playwrite-vn' => 'Playwrite VN',
    'playwrite-za' => 'Playwrite ZA',
    'plus-jakarta-sans' => 'Plus Jakarta Sans',
    'podkova' => 'Podkova',
    'poetsen-one' => 'Poetsen One',
    'poiret-one' => 'Poiret One',
    'poller-one' => 'Poller One',
    'poltawski-nowy' => 'Poltawski Nowy',
    'poly' => 'Poly',
    'pompiere' => 'Pompiere',
    'pontano-sans' => 'Pontano Sans',
    'poor-story' => 'Poor Story',
    'poppins' => 'Poppins',
    'port-lligat-sans' => 'Port Lligat Sans',
    'port-lligat-slab' => 'Port Lligat Slab',
    'potta-one' => 'Potta One',
    'pragati-narrow' => 'Pragati Narrow',
    'praise' => 'Praise',
    'prata' => 'Prata',
    'preahvihear' => 'Preahvihear',
    'press-start-2p' => 'Press Start 2P',
    'pridi' => 'Pridi',
    'princess-sofia' => 'Princess Sofia',
    'prociono' => 'Prociono',
    'prompt' => 'Prompt',
    'prosto-one' => 'Prosto One',
    'protest-guerrilla' => 'Protest Guerrilla',
    'protest-revolution' => 'Protest Revolution',
    'protest-riot' => 'Protest Riot',
    'protest-strike' => 'Protest Strike',
    'proza-libre' => 'Proza Libre',
    'public-sans' => 'Public Sans',
    'puppies-play' => 'Puppies Play',
    'puritan' => 'Puritan',
    'purple-purse' => 'Purple Purse',
    'qahiri' => 'Qahiri',
    'quando' => 'Quando',
    'quantico' => 'Quantico',
    'quattrocento' => 'Quattrocento',
    'quattrocento-sans' => 'Quattrocento Sans',
    'questrial' => 'Questrial',
    'quicksand' => 'Quicksand',
    'quintessential' => 'Quintessential',
    'qwigley' => 'Qwigley',
    'qwitcher-grypen' => 'Qwitcher Grypen',
    'rem' => 'REM',
    'racing-sans-one' => 'Racing Sans One',
    'radio-canada' => 'Radio Canada',
    'radio-canada-big' => 'Radio Canada Big',
    'radley' => 'Radley',
    'rajdhani' => 'Rajdhani',
    'rakkas' => 'Rakkas',
    'raleway' => 'Raleway',
    'raleway-dots' => 'Raleway Dots',
    'ramabhadra' => 'Ramabhadra',
    'ramaraja' => 'Ramaraja',
    'rambla' => 'Rambla',
    'rammetto-one' => 'Rammetto One',
    'rampart-one' => 'Rampart One',
    'ranchers' => 'Ranchers',
    'rancho' => 'Rancho',
    'ranga' => 'Ranga',
    'rasa' => 'Rasa',
    'rationale' => 'Rationale',
    'ravi-prakash' => 'Ravi Prakash',
    'readex-pro' => 'Readex Pro',
    'recursive' => 'Recursive',
    'red-hat-display' => 'Red Hat Display',
    'red-hat-mono' => 'Red Hat Mono',
    'red-hat-text' => 'Red Hat Text',
    'red-rose' => 'Red Rose',
    'redacted' => 'Redacted',
    'redacted-script' => 'Redacted Script',
    'reddit-mono' => 'Reddit Mono',
    'reddit-sans' => 'Reddit Sans',
    'reddit-sans-condensed' => 'Reddit Sans Condensed',
    'redressed' => 'Redressed',
    'reem-kufi' => 'Reem Kufi',
    'reem-kufi-fun' => 'Reem Kufi Fun',
    'reem-kufi-ink' => 'Reem Kufi Ink',
    'reenie-beanie' => 'Reenie Beanie',
    'reggae-one' => 'Reggae One',
    'rethink-sans' => 'Rethink Sans',
    'revalia' => 'Revalia',
    'rhodium-libre' => 'Rhodium Libre',
    'ribeye' => 'Ribeye',
    'ribeye-marrow' => 'Ribeye Marrow',
    'righteous' => 'Righteous',
    'risque' => 'Risque',
    'road-rage' => 'Road Rage',
    'roboto' => 'Roboto',
    'roboto-condensed' => 'Roboto Condensed',
    'roboto-flex' => 'Roboto Flex',
    'roboto-mono' => 'Roboto Mono',
    'roboto-serif' => 'Roboto Serif',
    'roboto-slab' => 'Roboto Slab',
    'rochester' => 'Rochester',
    'rock-3d' => 'Rock 3D',
    'rock-salt' => 'Rock Salt',
    'rocknroll-one' => 'RocknRoll One',
    'rokkitt' => 'Rokkitt',
    'romanesco' => 'Romanesco',
    'ropa-sans' => 'Ropa Sans',
    'rosario' => 'Rosario',
    'rosarivo' => 'Rosarivo',
    'rouge-script' => 'Rouge Script',
    'rowdies' => 'Rowdies',
    'rozha-one' => 'Rozha One',
    'rubik' => 'Rubik',
    'rubik-80s-fade' => 'Rubik 80s Fade',
    'rubik-beastly' => 'Rubik Beastly',
    'rubik-broken-fax' => 'Rubik Broken Fax',
    'rubik-bubbles' => 'Rubik Bubbles',
    'rubik-burned' => 'Rubik Burned',
    'rubik-dirt' => 'Rubik Dirt',
    'rubik-distressed' => 'Rubik Distressed',
    'rubik-doodle-shadow' => 'Rubik Doodle Shadow',
    'rubik-doodle-triangles' => 'Rubik Doodle Triangles',
    'rubik-gemstones' => 'Rubik Gemstones',
    'rubik-glitch' => 'Rubik Glitch',
    'rubik-glitch-pop' => 'Rubik Glitch Pop',
    'rubik-iso' => 'Rubik Iso',
    'rubik-lines' => 'Rubik Lines',
    'rubik-maps' => 'Rubik Maps',
    'rubik-marker-hatch' => 'Rubik Marker Hatch',
    'rubik-maze' => 'Rubik Maze',
    'rubik-microbe' => 'Rubik Microbe',
    'rubik-mono-one' => 'Rubik Mono One',
    'rubik-moonrocks' => 'Rubik Moonrocks',
    'rubik-pixels' => 'Rubik Pixels',
    'rubik-puddles' => 'Rubik Puddles',
    'rubik-scribble' => 'Rubik Scribble',
    'rubik-spray-paint' => 'Rubik Spray Paint',
    'rubik-storm' => 'Rubik Storm',
    'rubik-vinyl' => 'Rubik Vinyl',
    'rubik-wet-paint' => 'Rubik Wet Paint',
    'ruda' => 'Ruda',
    'rufina' => 'Rufina',
    'ruge-boogie' => 'Ruge Boogie',
    'ruluko' => 'Ruluko',
    'rum-raisin' => 'Rum Raisin',
    'ruslan-display' => 'Ruslan Display',
    'russo-one' => 'Russo One',
    'ruthie' => 'Ruthie',
    'ruwudu' => 'Ruwudu',
    'rye' => 'Rye',
    'stix-two-text' => 'STIX Two Text',
    'suse' => 'SUSE',
    'sacramento' => 'Sacramento',
    'sahitya' => 'Sahitya',
    'sail' => 'Sail',
    'saira' => 'Saira',
    'saira-condensed' => 'Saira Condensed',
    'saira-extra-condensed' => 'Saira Extra Condensed',
    'saira-semi-condensed' => 'Saira Semi Condensed',
    'saira-stencil-one' => 'Saira Stencil One',
    'salsa' => 'Salsa',
    'sanchez' => 'Sanchez',
    'sancreek' => 'Sancreek',
    'sankofa-display' => 'Sankofa Display',
    'sansita' => 'Sansita',
    'sansita-swashed' => 'Sansita Swashed',
    'sarabun' => 'Sarabun',
    'sarala' => 'Sarala',
    'sarina' => 'Sarina',
    'sarpanch' => 'Sarpanch',
    'sassy-frass' => 'Sassy Frass',
    'satisfy' => 'Satisfy',
    'sawarabi-gothic' => 'Sawarabi Gothic',
    'sawarabi-mincho' => 'Sawarabi Mincho',
    'scada' => 'Scada',
    'scheherazade-new' => 'Scheherazade New',
    'schibsted-grotesk' => 'Schibsted Grotesk',
    'schoolbell' => 'Schoolbell',
    'scope-one' => 'Scope One',
    'seaweed-script' => 'Seaweed Script',
    'secular-one' => 'Secular One',
    'sedan' => 'Sedan',
    'sedan-sc' => 'Sedan SC',
    'sedgwick-ave' => 'Sedgwick Ave',
    'sedgwick-ave-display' => 'Sedgwick Ave Display',
    'sen' => 'Sen',
    'send-flowers' => 'Send Flowers',
    'sevillana' => 'Sevillana',
    'seymour-one' => 'Seymour One',
    'shadows-into-light' => 'Shadows Into Light',
    'shadows-into-light-two' => 'Shadows Into Light Two',
    'shalimar' => 'Shalimar',
    'shantell-sans' => 'Shantell Sans',
    'shanti' => 'Shanti',
    'share' => 'Share',
    'share-tech' => 'Share Tech',
    'share-tech-mono' => 'Share Tech Mono',
    'shippori-antique' => 'Shippori Antique',
    'shippori-antique-b1' => 'Shippori Antique B1',
    'shippori-mincho' => 'Shippori Mincho',
    'shippori-mincho-b1' => 'Shippori Mincho B1',
    'shizuru' => 'Shizuru',
    'shojumaru' => 'Shojumaru',
    'short-stack' => 'Short Stack',
    'shrikhand' => 'Shrikhand',
    'siemreap' => 'Siemreap',
    'sigmar' => 'Sigmar',
    'sigmar-one' => 'Sigmar One',
    'signika' => 'Signika',
    'signika-negative' => 'Signika Negative',
    'silkscreen' => 'Silkscreen',
    'simonetta' => 'Simonetta',
    'single-day' => 'Single Day',
    'sintony' => 'Sintony',
    'sirin-stencil' => 'Sirin Stencil',
    'six-caps' => 'Six Caps',
    'sixtyfour' => 'Sixtyfour',
    'skranji' => 'Skranji',
    'slabo-13px' => 'Slabo 13px',
    'slabo-27px' => 'Slabo 27px',
    'slackey' => 'Slackey',
    'slackside-one' => 'Slackside One',
    'smokum' => 'Smokum',
    'smooch' => 'Smooch',
    'smooch-sans' => 'Smooch Sans',
    'smythe' => 'Smythe',
    'sniglet' => 'Sniglet',
    'snippet' => 'Snippet',
    'snowburst-one' => 'Snowburst One',
    'sofadi-one' => 'Sofadi One',
    'sofia' => 'Sofia',
    'sofia-sans' => 'Sofia Sans',
    'sofia-sans-condensed' => 'Sofia Sans Condensed',
    'sofia-sans-extra-condensed' => 'Sofia Sans Extra Condensed',
    'sofia-sans-semi-condensed' => 'Sofia Sans Semi Condensed',
    'solitreo' => 'Solitreo',
    'solway' => 'Solway',
    'sometype-mono' => 'Sometype Mono',
    'song-myung' => 'Song Myung',
    'sono' => 'Sono',
    'sonsie-one' => 'Sonsie One',
    'sora' => 'Sora',
    'sorts-mill-goudy' => 'Sorts Mill Goudy',
    'source-code-pro' => 'Source Code Pro',
    'source-sans-3' => 'Source Sans 3',
    'source-serif-4' => 'Source Serif 4',
    'space-grotesk' => 'Space Grotesk',
    'space-mono' => 'Space Mono',
    'special-elite' => 'Special Elite',
    'spectral' => 'Spectral',
    'spectral-sc' => 'Spectral SC',
    'spicy-rice' => 'Spicy Rice',
    'spinnaker' => 'Spinnaker',
    'spirax' => 'Spirax',
    'splash' => 'Splash',
    'spline-sans' => 'Spline Sans',
    'spline-sans-mono' => 'Spline Sans Mono',
    'squada-one' => 'Squada One',
    'square-peg' => 'Square Peg',
    'sree-krushnadevaraya' => 'Sree Krushnadevaraya',
    'sriracha' => 'Sriracha',
    'srisakdi' => 'Srisakdi',
    'staatliches' => 'Staatliches',
    'stalemate' => 'Stalemate',
    'stalinist-one' => 'Stalinist One',
    'stardos-stencil' => 'Stardos Stencil',
    'stick' => 'Stick',
    'stick-no-bills' => 'Stick No Bills',
    'stint-ultra-condensed' => 'Stint Ultra Condensed',
    'stint-ultra-expanded' => 'Stint Ultra Expanded',
    'stoke' => 'Stoke',
    'strait' => 'Strait',
    'style-script' => 'Style Script',
    'stylish' => 'Stylish',
    'sue-ellen-francisco' => 'Sue Ellen Francisco',
    'suez-one' => 'Suez One',
    'sulphur-point' => 'Sulphur Point',
    'sumana' => 'Sumana',
    'sunflower' => 'Sunflower',
    'sunshiney' => 'Sunshiney',
    'supermercado-one' => 'Supermercado One',
    'sura' => 'Sura',
    'suranna' => 'Suranna',
    'suravaram' => 'Suravaram',
    'suwannaphum' => 'Suwannaphum',
    'swanky-and-moo-moo' => 'Swanky and Moo Moo',
    'syncopate' => 'Syncopate',
    'syne' => 'Syne',
    'syne-mono' => 'Syne Mono',
    'syne-tactile' => 'Syne Tactile',
    'tac-one' => 'Tac One',
    'tai-heritage-pro' => 'Tai Heritage Pro',
    'tajawal' => 'Tajawal',
    'tangerine' => 'Tangerine',
    'tapestry' => 'Tapestry',
    'taprom' => 'Taprom',
    'tauri' => 'Tauri',
    'taviraj' => 'Taviraj',
    'teachers' => 'Teachers',
    'teko' => 'Teko',
    'tektur' => 'Tektur',
    'telex' => 'Telex',
    'tenali-ramakrishna' => 'Tenali Ramakrishna',
    'tenor-sans' => 'Tenor Sans',
    'text-me-one' => 'Text Me One',
    'texturina' => 'Texturina',
    'thasadith' => 'Thasadith',
    'the-girl-next-door' => 'The Girl Next Door',
    'the-nautigal' => 'The Nautigal',
    'tienne' => 'Tienne',
    'tillana' => 'Tillana',
    'tilt-neon' => 'Tilt Neon',
    'tilt-prism' => 'Tilt Prism',
    'tilt-warp' => 'Tilt Warp',
    'timmana' => 'Timmana',
    'tinos' => 'Tinos',
    'tiny5' => 'Tiny5',
    'tiro-bangla' => 'Tiro Bangla',
    'tiro-devanagari-hindi' => 'Tiro Devanagari Hindi',
    'tiro-devanagari-marathi' => 'Tiro Devanagari Marathi',
    'tiro-devanagari-sanskrit' => 'Tiro Devanagari Sanskrit',
    'tiro-gurmukhi' => 'Tiro Gurmukhi',
    'tiro-kannada' => 'Tiro Kannada',
    'tiro-tamil' => 'Tiro Tamil',
    'tiro-telugu' => 'Tiro Telugu',
    'titan-one' => 'Titan One',
    'titillium-web' => 'Titillium Web',
    'tomorrow' => 'Tomorrow',
    'tourney' => 'Tourney',
    'trade-winds' => 'Trade Winds',
    'train-one' => 'Train One',
    'trirong' => 'Trirong',
    'trispace' => 'Trispace',
    'trocchi' => 'Trocchi',
    'trochut' => 'Trochut',
    'truculenta' => 'Truculenta',
    'trykker' => 'Trykker',
    'tsukimi-rounded' => 'Tsukimi Rounded',
    'tulpen-one' => 'Tulpen One',
    'turret-road' => 'Turret Road',
    'twinkle-star' => 'Twinkle Star',
    'ubuntu' => 'Ubuntu',
    'ubuntu-condensed' => 'Ubuntu Condensed',
    'ubuntu-mono' => 'Ubuntu Mono',
    'ubuntu-sans' => 'Ubuntu Sans',
    'ubuntu-sans-mono' => 'Ubuntu Sans Mono',
    'uchen' => 'Uchen',
    'ultra' => 'Ultra',
    'unbounded' => 'Unbounded',
    'uncial-antiqua' => 'Uncial Antiqua',
    'underdog' => 'Underdog',
    'unica-one' => 'Unica One',
    'unifrakturcook' => 'UnifrakturCook',
    'unifrakturmaguntia' => 'UnifrakturMaguntia',
    'unkempt' => 'Unkempt',
    'unlock' => 'Unlock',
    'unna' => 'Unna',
    'updock' => 'Updock',
    'urbanist' => 'Urbanist',
    'vt323' => 'VT323',
    'vampiro-one' => 'Vampiro One',
    'varela' => 'Varela',
    'varela-round' => 'Varela Round',
    'varta' => 'Varta',
    'vast-shadow' => 'Vast Shadow',
    'vazirmatn' => 'Vazirmatn',
    'vesper-libre' => 'Vesper Libre',
    'viaoda-libre' => 'Viaoda Libre',
    'vibes' => 'Vibes',
    'vibur' => 'Vibur',
    'victor-mono' => 'Victor Mono',
    'vidaloka' => 'Vidaloka',
    'viga' => 'Viga',
    'vina-sans' => 'Vina Sans',
    'voces' => 'Voces',
    'volkhov' => 'Volkhov',
    'vollkorn' => 'Vollkorn',
    'vollkorn-sc' => 'Vollkorn SC',
    'voltaire' => 'Voltaire',
    'vujahday-script' => 'Vujahday Script',
    'waiting-for-the-sunrise' => 'Waiting for the Sunrise',
    'wallpoet' => 'Wallpoet',
    'walter-turncoat' => 'Walter Turncoat',
    'warnes' => 'Warnes',
    'water-brush' => 'Water Brush',
    'waterfall' => 'Waterfall',
    'wavefont' => 'Wavefont',
    'wellfleet' => 'Wellfleet',
    'wendy-one' => 'Wendy One',
    'whisper' => 'Whisper',
    'windsong' => 'WindSong',
    'wire-one' => 'Wire One',
    'wittgenstein' => 'Wittgenstein',
    'wix-madefor-display' => 'Wix Madefor Display',
    'wix-madefor-text' => 'Wix Madefor Text',
    'work-sans' => 'Work Sans',
    'workbench' => 'Workbench',
    'xanh-mono' => 'Xanh Mono',
    'yaldevi' => 'Yaldevi',
    'yanone-kaffeesatz' => 'Yanone Kaffeesatz',
    'yantramanav' => 'Yantramanav',
    'yarndings-12' => 'Yarndings 12',
    'yarndings-12-charted' => 'Yarndings 12 Charted',
    'yarndings-20' => 'Yarndings 20',
    'yarndings-20-charted' => 'Yarndings 20 Charted',
    'yatra-one' => 'Yatra One',
    'yellowtail' => 'Yellowtail',
    'yeon-sung' => 'Yeon Sung',
    'yeseva-one' => 'Yeseva One',
    'yesteryear' => 'Yesteryear',
    'yomogi' => 'Yomogi',
    'young-serif' => 'Young Serif',
    'yrsa' => 'Yrsa',
    'ysabeau' => 'Ysabeau',
    'ysabeau-infant' => 'Ysabeau Infant',
    'ysabeau-office' => 'Ysabeau Office',
    'ysabeau-sc' => 'Ysabeau SC',
    'yuji-boku' => 'Yuji Boku',
    'yuji-hentaigana-akari' => 'Yuji Hentaigana Akari',
    'yuji-hentaigana-akebono' => 'Yuji Hentaigana Akebono',
    'yuji-mai' => 'Yuji Mai',
    'yuji-syuku' => 'Yuji Syuku',
    'yusei-magic' => 'Yusei Magic',
    'zcool-kuaile' => 'ZCOOL KuaiLe',
    'zcool-qingke-huangyou' => 'ZCOOL QingKe HuangYou',
    'zcool-xiaowei' => 'ZCOOL XiaoWei',
    'zain' => 'Zain',
    'zen-antique' => 'Zen Antique',
    'zen-antique-soft' => 'Zen Antique Soft',
    'zen-dots' => 'Zen Dots',
    'zen-kaku-gothic-antique' => 'Zen Kaku Gothic Antique',
    'zen-kaku-gothic-new' => 'Zen Kaku Gothic New',
    'zen-kurenaido' => 'Zen Kurenaido',
    'zen-loop' => 'Zen Loop',
    'zen-maru-gothic' => 'Zen Maru Gothic',
    'zen-old-mincho' => 'Zen Old Mincho',
    'zen-tokyo-zoo' => 'Zen Tokyo Zoo',
    'zeyada' => 'Zeyada',
    'zhi-mang-xing' => 'Zhi Mang Xing',
    'zilla-slab' => 'Zilla Slab',
    'zilla-slab-highlight' => 'Zilla Slab Highlight'
	);
	// Font Size
	$font_sizes = array();
	$font_sizes_px_none = array();
	for ($i = 9; $i <= 50; $i++){ 
		$font_sizes[$i.'px'] = $i.'px';
		$font_sizes_px_none[$i] = $i.'px';
	}
	// Font Weights
	$font_weights  = array(
		'100' => esc_html__('Thin', 'sportshub'),
		'200' => esc_html__('Extra-Light', 'sportshub'),
		'300' => esc_html__('Light', 'sportshub'),
		'400' => esc_html__('Regular', 'sportshub'),
		'500' => esc_html__('Medium', 'sportshub'),
		'600' => esc_html__('Semi-Bold', 'sportshub'),
		'700' => esc_html__('Bold', 'sportshub'),
		'800' => esc_html__('Extra-Bold', 'sportshub'),
		'900' => esc_html__('Black', 'sportshub')
	);
	
	$sportshub_customize->add_panel( 'sportshub_theme_options', array(
	    'priority' => 1,
	    'title' => esc_html__( 'Theme Options', 'sportshub' ),
	    'description' => esc_html__( 'Options for theme customizing', 'sportshub' ),
	));

	$sportshub_customize->add_section( 
		'sportshub_logo_favicon' , 
		array(
   		'title'      => esc_html__( 'Logo', 'sportshub' ),
   		'description'=> esc_html__( 'Please choose your logo', 'sportshub' ),
   		'priority'  => 1,
   		'panel' => 'sportshub_theme_options'
	));
    $sportshub_customize->add_setting( 
		'sportshub_logo', 
		array(
		'default' 			=> '',
		'transport'   		=> 'refresh',
		'sanitize_callback' => 'sanitize_text_field',	
	));
    $sportshub_customize->add_control( 
    	new WP_Customize_Image_Control( 
    	$sportshub_customize, 
    	'sportshub_logo', 
    	array(
        'label'    => esc_html__( 'Upload your Logo', 'sportshub' ),
        'section'  => 'sportshub_logo_favicon',
        'settings' => 'sportshub_logo'
    )));

    $sportshub_customize->add_setting( 
		'sportshub_logo_white', 
		array(
		'default' 			=> '',
		'transport'   		=> 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	));
    $sportshub_customize->add_control( 
    	new WP_Customize_Image_Control( 
    	$sportshub_customize, 
    	'sportshub_logo_white', 
    	array(
        'label'    => esc_html__( 'Darkmode logo', 'sportshub' ),
        'section'  => 'sportshub_logo_favicon',
        'settings' => 'sportshub_logo_white'
    )));

	/*General Setting*/
	$sportshub_customize->add_section(
		    'sportshub_general_setting',
		    array(
		        'title'     => esc_html__('General Setting', 'sportshub'),
		        'priority'  => 1,
		        'panel' => 'sportshub_theme_options'
		    )
	);
	$sportshub_customize->add_setting(
	    'header_layout_design',
	    array(
	        'default'     => 'header_layout_3',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    new sportshub_control_image_select (
	        $sportshub_customize,
	        'header_layout_design',
	        array(
	            'label'      	=> esc_html__( 'Header Layout (header menu and logo)', 'sportshub' ),
	            'description'	=> esc_html__('Select header style.', 'sportshub'),
	            'section'		=> 'sportshub_general_setting',
	            'settings'		=> 'header_layout_design',
	            'choices'		=> array(
	            	'header_layout_1'	=> get_template_directory_uri().'/inc/customizer/images/header1.png',
	            	'header_layout_2'	=> get_template_directory_uri().'/inc/customizer/images/header2.png',
	            	'header_layout_3'	=> get_template_directory_uri().'/inc/customizer/images/header3.png',
	            	'header_layout_4'	=> get_template_directory_uri().'/inc/customizer/images/header4.png',
	            ),
	            'input_attrs' => array(
	            	'multiple' => false
	            )
	        )
	    )
	);	
	$sportshub_customize->add_setting(
	    'theme_color',
	    array(
	        'default'     => '#fc382a',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $sportshub_customize->add_control(
	    new WP_Customize_Color_Control(
	        $sportshub_customize,
	        'theme_color',
	        array(
	            'label'      => esc_html__( 'Theme color', 'sportshub' ),
	            'section'    => 'sportshub_general_setting',
	            'settings'   => 'theme_color'
	        )
	    )
	);

	$sportshub_customize->add_setting(
	    'body_text_color',
	    array(
	        'default'     => '#000',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $sportshub_customize->add_control(
	    new WP_Customize_Color_Control(
	        $sportshub_customize,
	        'body_text_color',
	        array(
	            'label'      => esc_html__( 'Body text color', 'sportshub' ),
	            'section'    => 'sportshub_general_setting',
	            'settings'   => 'body_text_color'
	        )
	    )
	);

    $sportshub_customize->add_setting(
	    'body_background_color',
	    array(
	        'default'     => '#fffff',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $sportshub_customize->add_control(
	    new WP_Customize_Color_Control(
	        $sportshub_customize,
	        'body_background_color',
	        array(
	            'label'      => esc_html__( 'Body Background Color', 'sportshub' ),
	            'section'    => 'sportshub_general_setting',
	            'settings'   => 'body_background_color'
	        )
	    )
	);
	
	$sportshub_customize->add_setting(
        'sportshub_other_title',
        array(
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $sportshub_customize->add_control(
        new sportshub_Customize_Control_Title (
            $sportshub_customize,
            'sportshub_other_title',
            array(
                'label'         => esc_html__( 'Other Setting', 'sportshub' ),
                'section'       => 'sportshub_general_setting',
                'settings'      => 'sportshub_other_title',
            )
        )
    );

	
	// $sportshub_customize->add_setting(
	// 	'en_border_radius', 
	// 	array(
	// 		'default' => false, 
	// 		'transport' => 'refresh',
	//         'sanitize_callback' => 'sanitize_text_field',
	// 	)
	// );
	$sportshub_customize->add_control(
	    'en_border_radius',
	    array(
	        'section'   => 'sportshub_general_setting',
	        'label'     => esc_html__('Enable border radius','sportshub'),
	        'type'      => 'checkbox'
	    )
	);

	$sportshub_customize->add_setting(
		'disable_top_search', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$sportshub_customize->add_control(
	    'disable_top_search',
	    array(
	        'section'   => 'sportshub_general_setting',
	        'label'     => esc_html__('Disable header search','sportshub'),
	        'type'      => 'checkbox'
	    )
	);
	$sportshub_customize->add_setting(
		'disable_social_icons', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$sportshub_customize->add_control(
	    'disable_social_icons',
	    array(
	        'section'   => 'sportshub_general_setting',
	        'label'     => esc_html__('Disable social icons','sportshub'),
	        'type'      => 'checkbox'
	    )
	);
		
	/*Typography*/
	$sportshub_customize->add_section(
		    'sportshub_typography_setting',
		    array(
		        'title'     => esc_html__('Typography', 'sportshub'),
		        'priority'  => 1,
		        'panel' => 'sportshub_theme_options'
		    )
	);

	$sportshub_customize->add_setting(
	    'sportshub_menu_settings_title',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $sportshub_customize->add_control(
	    new sportshub_Customize_Control_Title (
	        $sportshub_customize,
	        'sportshub_menu_settings_title',
	        array(
	            'label'      	=> esc_html__( 'Navigation Settings', 'sportshub' ),
	            'section'		=> 'sportshub_typography_setting',
	            'settings'		=> 'sportshub_menu_settings_title',
	        )
	    )
	);
	$sportshub_customize->add_setting(
	    'sportshub_menu_font_family',
	    array(
	        'default'     => 'Roboto',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $sportshub_customize->add_control(
	    'sportshub_menu_font_family',
	    array(
	        'section'   => 'sportshub_typography_setting',
	        'label'     => esc_html__('Menu font family','sportshub'),
	        'type'      => 'select',
	        'choices'	=> $faces
	    )
	);
    $sportshub_customize->add_setting(
	    'sportshub_menu_font_size',
	    array(
	        'default'     => '12px',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $sportshub_customize->add_control(
	    'sportshub_menu_font_size',
	    array(
	        'section'   => 'sportshub_typography_setting',
	        'label'     => esc_html__('Main menu font size','sportshub'),
	        'type'      => 'select',
	        'choices'	=> $font_sizes
	    )
	);
	$sportshub_customize->add_setting(
	    'sportshub_menu_font_weight',
	    array(
	        'default'     => '600',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $sportshub_customize->add_control(
	    'sportshub_menu_font_weight',
	    array(
	        'section'   => 'sportshub_typography_setting',
	        'label'     => esc_html__('Main menu font weight','sportshub'),
	        'type'      => 'select',
	        'choices'	=> $font_weights
	    )
	);
	$sportshub_customize->add_setting(
	    'sportshub_menu_transform',
	    array(
	        'default'    =>  'uppercase',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'sportshub_menu_transform',
	    array(
	        'section'   => 'sportshub_typography_setting',
	        'label'     => esc_html__('Menu text transform','sportshub'),
	        'type'      => 'select',
	        'choices' 	=> array(
	        	'none' => esc_html__('None', 'sportshub'),
	        	'capitalize' => esc_html__('Capitalize', 'sportshub'),
	        	'uppercase' => esc_html__('Uppercase', 'sportshub')
	        )
	    )
	);
	$sportshub_customize->add_setting(
	    'letter_spacing_menu',
	    array(
	        'default'    =>  '0.09em',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'letter_spacing_menu',
	    array(
	        'section'   => 'sportshub_typography_setting',
	        'label'     => esc_html__('Menu letter spacing','sportshub'),
	        'type'      => 'text'
	    )
	);

	$sportshub_customize->add_setting(
	    'sportshub_sub_menu_font_size',
	    array(
	        'default'     => '12px',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $sportshub_customize->add_control(
	    'sportshub_sub_menu_font_size',
	    array(
	        'section'   => 'sportshub_typography_setting',
	        'label'     => esc_html__('Sub menu font size','sportshub'),
	        'type'      => 'select',
	        'choices'	=> $font_sizes
	    )
	);
	$sportshub_customize->add_setting(
	    'sportshub_sub_menu_font_weight',
	    array(
	        'default'     => '600',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $sportshub_customize->add_control(
	    'sportshub_sub_menu_font_weight',
	    array(
	        'section'   => 'sportshub_typography_setting',
	        'label'     => esc_html__('Sub menu font weight','sportshub'),
	        'type'      => 'select',
	        'choices'	=> $font_weights
	    )
	);

	$sportshub_customize->add_setting(
	    'sportshub_sub_menu_transform',
	    array(
	        'default'    =>  'capitalize',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'sportshub_sub_menu_transform',
	    array(
	        'section'   => 'sportshub_typography_setting',
	        'label'     => esc_html__('Sub Menu text transform','sportshub'),
	        'type'      => 'select',
	        'choices' 	=> array(
	        	'none' => esc_html__('None', 'sportshub'),
	        	'capitalize' => esc_html__('Capitalize', 'sportshub'),
	        	'uppercase' => esc_html__('Uppercase', 'sportshub')
	        )
	    )
	);

	$sportshub_customize->add_setting(
	    'letter_spacing_sub_menu',
	    array(
	        'default'    =>  '0px',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'letter_spacing_sub_menu',
	    array(
	        'section'   => 'sportshub_typography_setting',
	        'label'     => esc_html__('Sub Menu letter spacing','sportshub'),
	        'type'      => 'text'
	    )
	);

	$sportshub_customize->add_setting(
	    'sportshub_p_settings_title',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $sportshub_customize->add_control(
	    new sportshub_Customize_Control_Title (
	        $sportshub_customize,
	        'sportshub_p_settings_title',
	        array(
	            'label'      	=> esc_html__( 'Paragraph Settings', 'sportshub' ),
	            'section'		=> 'sportshub_typography_setting',
	            'settings'		=> 'sportshub_p_settings_title',
	        )
	    )
	);

	$sportshub_customize->add_setting(
	    'sportshub_p_font_family',
	    array(
	        'default'     => 'Roboto',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $sportshub_customize->add_control(
	    'sportshub_p_font_family',
	    array(
	        'section'   => 'sportshub_typography_setting',
	        'label'     => esc_html__('Paragraph font family','sportshub'),
	        'type'      => 'select',
	        'choices'	=> $faces
	    )
	);
	$sportshub_customize->add_setting(
	    'sportshub_p_font_size',
	    array(
	        'default'     => '16px',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $sportshub_customize->add_control(
	    'sportshub_p_font_size',
	    array(
	        'section'   => 'sportshub_typography_setting',
	        'label'     => esc_html__('Paragraph font size','sportshub'),
	        'type'      => 'select',
	        'choices'	=> $font_sizes
	    )
	);
	$sportshub_customize->add_setting(
	    'sportshub_p_font_weight',
	    array(
	        'default'     => '400',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $sportshub_customize->add_control(
	    'sportshub_p_font_weight',
	    array(
	        'section'   => 'sportshub_typography_setting',
	        'label'     => esc_html__('Paragraph font weight','sportshub'),
	        'type'      => 'select',
	        'choices'	=> $font_weights
	    )
	);
    // ======================================
    // Categotry Font
    //======================================= 
    $sportshub_customize->add_setting(
	    'sportshub_Category_settings_title',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $sportshub_customize->add_control(
	    new sportshub_Customize_Control_Title (
	        $sportshub_customize,
	        'sportshub_Category_settings_title',
	        array(
	            'label'      	=> esc_html__( 'Category Style Settings', 'sportshub' ),
	            'section'		=> 'sportshub_typography_setting',
	            'settings'		=> 'sportshub_Category_settings_title',
	        )
	    )
	);

	$sportshub_customize->add_setting(
	    'sportshub_category_font_family',
	    array(
	        'default'     => 'Charm',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $sportshub_customize->add_control(
	    'sportshub_category_font_family',
	    array(
	        'section'   => 'sportshub_typography_setting',
	        'label'     => esc_html__('Category font family','sportshub'),
	        'type'      => 'select',
	        'choices'	=> $faces
	    )
	);
	$sportshub_customize->add_setting(
	    'sportshub_category_font_size',
	    array(
	        'default'     => '16px',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $sportshub_customize->add_control(
	    'sportshub_category_font_size',
	    array(
	        'section'   => 'sportshub_typography_setting',
	        'label'     => esc_html__('Category font size','sportshub'),
	        'type'      => 'select',
	        'choices'	=> $font_sizes
	    )
	);
	$sportshub_customize->add_setting(
	    'sportshub_category_font_weight',
	    array(
	        'default'     => '700',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $sportshub_customize->add_control(
	    'sportshub_category_font_weight',
	    array(
	        'section'   => 'sportshub_typography_setting',
	        'label'     => esc_html__('Category font weight','sportshub'),
	        'type'      => 'select',
	        'choices'	=> $font_weights
	    )
	);
    //====================================================================== 
   
	$sportshub_customize->add_setting(
	    'sportshub_title_settings_title',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $sportshub_customize->add_control(
	    new sportshub_Customize_Control_Title (
	        $sportshub_customize,
	        'sportshub_title_settings_title',
	        array(
	            'label'      	=> esc_html__( 'Title Settings', 'sportshub' ),
	            'section'		=> 'sportshub_typography_setting',
	            'settings'		=> 'sportshub_title_settings_title',
	        )
	    )
	);
	$sportshub_customize->add_setting(
	    'sportshub_title_font_family',
	    array(
	        'default'     => 'Work Sans',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $sportshub_customize->add_control(
	    'sportshub_title_font_family',
	    array(
	        'section'   => 'sportshub_typography_setting',
	        'label'     => esc_html__('Title font family','sportshub'),
	        'type'      => 'select',
	        'choices'	=> $faces
	    )
	);
	$sportshub_customize->add_setting(
	    'sportshub_title_font_weight',
	    array(
	        'default'     => '700',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $sportshub_customize->add_control(
	    'sportshub_title_font_weight',
	    array(
	        'section'   => 'sportshub_typography_setting',
	        'label'     => esc_html__('Title font weight','sportshub'),
	        'type'      => 'select',
	        'choices'	=> $font_weights
	    )
	);	
	$sportshub_customize->add_setting(
	    'sportshub_title_transform',
	    array(
	        'default'    =>  'capitalize',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'sportshub_title_transform',
	    array(
	        'section'   => 'sportshub_typography_setting',
	        'label'     => esc_html__('Title text transform','sportshub'),
	        'type'      => 'select',
	        'choices' 	=> array(
	        	'none' => esc_html__('None', 'sportshub'),
	        	'capitalize' => esc_html__('Capitalize', 'sportshub'),
	        	'uppercase' => esc_html__('Uppercase', 'sportshub')
	        )
	    )
	);

	$sportshub_customize->add_setting(
	    'letter_spacing_heading',
	    array(
	        'default'    =>  '-0.03em',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'letter_spacing_heading',
	    array(
	        'section'   => 'sportshub_typography_setting',
	        'label'     => esc_html__('Title letter spacing','sportshub'),
	        'type'      => 'text'
	    )
	);

	$sportshub_customize->add_setting(
	    'line_height_heading',
	    array(
	        'default'    =>  '1.3',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'line_height_heading',
	    array(
	        'section'   => 'sportshub_typography_setting',
	        'label'     => esc_html__('Title line height','sportshub'),
	        'type'      => 'text'
	    )
	);



	/*Blog & single post*/
	$sportshub_customize->add_section(
		    'sportshub_blog_single_setting',
		    array(
		        'title'     => esc_html__('Blog & single post', 'sportshub'),
		        'priority'  => 1,
		        'panel' => 'sportshub_theme_options'
		    )
	);
	$sportshub_customize->add_setting(
	    'single_post_layout_options',
	    array(
	        'default'    =>  'single_post_default',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'single_post_layout_options',
	    array(
	        'section'   => 'sportshub_blog_single_setting',
	        'label'     => esc_html__('Single Post Layout','sportshub'),
	        'type'      => 'radio',
	        'choices'	=> array(
	        'single_post_default' => esc_html__('Default Layout', 'sportshub'),
			'single_post_full' => esc_html__('Full header', 'sportshub'),
			'single_post_full_two' => esc_html__('Full Header Layout Two', 'sportshub')				
	        )
	    )
	);

	$sportshub_customize->add_setting(
		'disable_post_date', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$sportshub_customize->add_control(
	    'disable_post_date',
	    array(
	        'section'   => 'sportshub_blog_single_setting',
	        'label'     => esc_html__('Disable post date','sportshub'),
	        'type'      => 'checkbox'
	    )
	);
	$sportshub_customize->add_setting(
		'disable_post_author', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$sportshub_customize->add_control(
	    'disable_post_author',
	    array(
	        'section'   => 'sportshub_blog_single_setting',
	        'label'     => esc_html__('Disable post author','sportshub'),
	        'type'      => 'checkbox'
	    )
	);
	$sportshub_customize->add_setting(
		'disable_post_category', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$sportshub_customize->add_control(
	    'disable_post_category',
	    array(
	        'section'   => 'sportshub_blog_single_setting',
	        'label'     => esc_html__('Disable post category','sportshub'),
	        'type'      => 'checkbox'
	    )
	);
	$sportshub_customize->add_setting(
		'disable_post_comment_meta', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$sportshub_customize->add_control(
	    'disable_post_comment_meta',
	    array(
	        'section'   => 'sportshub_blog_single_setting',
	        'label'     => esc_html__('Disable post comment meta','sportshub'),
	        'type'      => 'checkbox'
	    )
	);
	$sportshub_customize->add_setting(
		'disable_post_tag', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$sportshub_customize->add_control(
	    'disable_post_tag',
	    array(
	        'section'   => 'sportshub_blog_single_setting',
	        'label'     => esc_html__('Disable post tag','sportshub'),
	        'type'      => 'checkbox'
	    )
	);
	$sportshub_customize->add_setting(
		'disable_post_share', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$sportshub_customize->add_control(
	    'disable_post_share',
	    array(
	        'section'   => 'sportshub_blog_single_setting',
	        'label'     => esc_html__('Disable post share','sportshub'),
	        'type'      => 'checkbox'
	    )
	);
	$sportshub_customize->add_setting(
		'disable_post_related', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$sportshub_customize->add_control(
	    'disable_post_related',
	    array(
	        'section'   => 'sportshub_blog_single_setting',
	        'label'     => esc_html__('Disable post related','sportshub'),
	        'type'      => 'checkbox'
	    )
	);
	$sportshub_customize->add_setting(
		'disable_post_view', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$sportshub_customize->add_control(
	    'disable_post_view',
	    array(
	        'section'   => 'sportshub_blog_single_setting',
	        'label'     => esc_html__('Disable post view','sportshub'),
	        'type'      => 'checkbox'
	    )
	);
	$sportshub_customize->add_setting(
		'disable_time_read', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$sportshub_customize->add_control(
	    'disable_time_read',
	    array(
	        'section'   => 'sportshub_blog_single_setting',
	        'label'     => esc_html__('Disable Time Read','sportshub'),
	        'type'      => 'checkbox'
	    )
	);
    $sportshub_customize->add_setting(
		'disable_post_marquee', 
		array(
			'default' => true, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$sportshub_customize->add_control(
	    'disable_post_marquee',
	    array(
	        'section'   => 'sportshub_blog_single_setting',
	        'label'     => esc_html__('Disable Post Marquee','sportshub'),
	        'type'      => 'checkbox'
	    )
	);

	// $sportshub_customize->add_setting(
	// 	'disable_post_love', 
	// 	array(
	// 		'default' => false, 
	// 		'transport' => 'refresh',
	//         'sanitize_callback' => 'sanitize_text_field',
	// 	)
	// );
	// $sportshub_customize->add_control(
	//     'disable_post_love',
	//     array(
	//         'section'   => 'sportshub_blog_single_setting',
	//         'label'     => esc_html__('Disable post love','sportshub'),
	//         'type'      => 'checkbox'
	//     )
	// );

	$sportshub_customize->add_setting(
		'disable_post_nav', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$sportshub_customize->add_control(
	    'disable_post_nav',
	    array(
	        'section'   => 'sportshub_blog_single_setting',
	        'label'     => esc_html__('Disable post navigation','sportshub'),
	        'type'      => 'checkbox'
	    )
	);

	/*Social Header Link*/
	$sportshub_customize->add_section(
		    'sportshub_social_setting',
		    array(
		        'title'     => esc_html__('Social Header Link', 'sportshub'),
		        'priority'  => 1,
		        'panel' => 'sportshub_theme_options'
		    )
	);

	$sportshub_customize->add_setting(
	    'themelazer_fl_title',
	    array(
	        'default'    =>  esc_html__('Follow us','sportshub'),
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'themelazer_fl_title',
	    array(
	        'section'   => 'sportshub_social_setting',
	        'label'     => esc_html__('Social title','sportshub'),
	        'type'      => 'text'
	    )
	);

	$sportshub_customize->add_setting(
	    'facebook',
	    array(
	        'default'    =>  '#',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'facebook',
	    array(
	        'section'   => 'sportshub_social_setting',
	        'label'     => esc_html__('Facebook','sportshub'),
	        'type'      => 'text'
	    )
	);

	$sportshub_customize->add_setting(
	    'vk',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'vk',
	    array(
	        'section'   => 'sportshub_social_setting',
	        'label'     => esc_html__('VK','sportshub'),
	        'type'      => 'text'
	    )
	);

	$sportshub_customize->add_setting(
	    'telegram',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'telegram',
	    array(
	        'section'   => 'sportshub_social_setting',
	        'label'     => esc_html__('Telegram','sportshub'),
	        'type'      => 'text'
	    )
	);	

	$sportshub_customize->add_setting(
	    'behance',
	    array(
	        'default'    =>  '#',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'behance',
	    array(
	        'section'   => 'sportshub_social_setting',
	        'label'     => esc_html__('Behance','sportshub'),
	        'type'      => 'text'
	    )
	);

	$sportshub_customize->add_setting(
	    'vimeo',
	    array(
	        'default'    =>  '#',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'vimeo',
	    array(
	        'section'   => 'sportshub_social_setting',
	        'label'     => esc_html__('Vimeo','sportshub'),
	        'type'      => 'text'
	    )
	);

	$sportshub_customize->add_setting(
	    'youtube',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'youtube',
	    array(
	        'section'   => 'sportshub_social_setting',
	        'label'     => esc_html__('Youtube','sportshub'),
	        'type'      => 'text'
	    )
	);

	$sportshub_customize->add_setting(
	    'instagram',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'instagram',
	    array(
	        'section'   => 'sportshub_social_setting',
	        'label'     => esc_html__('Instagram','sportshub'),
	        'type'      => 'text'
	    )
	);

	$sportshub_customize->add_setting(
	    'linkedin',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'linkedin',
	    array(
	        'section'   => 'sportshub_social_setting',
	        'label'     => esc_html__('Linkedin','sportshub'),
	        'type'      => 'text'
	    )
	);

	$sportshub_customize->add_setting(
	    'pinterest',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'pinterest',
	    array(
	        'section'   => 'sportshub_social_setting',
	        'label'     => esc_html__('Pinterest','sportshub'),
	        'type'      => 'text'
	    )
	);

	$sportshub_customize->add_setting(
	    'twitter',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'twitter',
	    array(
	        'section'   => 'sportshub_social_setting',
	        'label'     => esc_html__('Twitter','sportshub'),
	        'type'      => 'text'
	    )
	);

	$sportshub_customize->add_setting(
	    'deviantart',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'deviantart',
	    array(
	        'section'   => 'sportshub_social_setting',
	        'label'     => esc_html__('Deviantart','sportshub'),
	        'type'      => 'text'
	    )
	);

	$sportshub_customize->add_setting(
	    'dribble',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'dribble',
	    array(
	        'section'   => 'sportshub_social_setting',
	        'label'     => esc_html__('Dribble','sportshub'),
	        'type'      => 'text'
	    )
	);

	$sportshub_customize->add_setting(
	    'dropbox',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'dropbox',
	    array(
	        'section'   => 'sportshub_social_setting',
	        'label'     => esc_html__('Dropbox','sportshub'),
	        'type'      => 'text'
	    )
	);

	$sportshub_customize->add_setting(
	    'rss',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'rss',
	    array(
	        'section'   => 'sportshub_social_setting',
	        'label'     => esc_html__('RSS','sportshub'),
	        'type'      => 'text'
	    )
	);

	$sportshub_customize->add_setting(
	    'skype',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'skype',
	    array(
	        'section'   => 'sportshub_social_setting',
	        'label'     => esc_html__('Skype','sportshub'),
	        'type'      => 'text'
	    )
	);

	$sportshub_customize->add_setting(
	    'stumbleupon',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'stumbleupon',
	    array(
	        'section'   => 'sportshub_social_setting',
	        'label'     => esc_html__('Stumbleupon','sportshub'),
	        'type'      => 'text'
	    )
	);

	$sportshub_customize->add_setting(
	    'wordpress',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'wordpress',
	    array(
	        'section'   => 'sportshub_social_setting',
	        'label'     => esc_html__('WordPress','sportshub'),
	        'type'      => 'text'
	    )
	);

	$sportshub_customize->add_setting(
	    'yahoo',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'yahoo',
	    array(
	        'section'   => 'sportshub_social_setting',
	        'label'     => esc_html__('Yahoo','sportshub'),
	        'type'      => 'text'
	    )
	);

	$sportshub_customize->add_setting(
	    'sound_cloud',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'sound_cloud',
	    array(
	        'section'   => 'sportshub_social_setting',
	        'label'     => esc_html__('Sound Cloud','sportshub'),
	        'type'      => 'text'
	    )
	);

	/*Footer*/
	$sportshub_customize->add_section(
		    'sportshub_footer_setting',
		    array(
		        'title'     => esc_html__('Footer', 'sportshub'),
		        'priority'  => 1,
		        'panel' => 'sportshub_theme_options'
		    )
	);	   

	$sportshub_customize->add_setting(
        'sportshub_footer_opt',
        array(
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $sportshub_customize->add_control(
        new sportshub_Customize_Control_Title (
            $sportshub_customize,
            'sportshub_footer_opt',
            array(
                'label'         => esc_html__( 'Footer Options', 'sportshub' ),
                'section'       => 'sportshub_footer_setting',
                'settings'      => 'sportshub_footer_opt',
            )
        )
    );
	$sportshub_customize->add_setting(
	    'footer_columns',
	    array(
	        'default'    =>  'footer3col',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$sportshub_customize->add_control(
	    'footer_columns',
	    array(
	        'section'   => 'sportshub_footer_setting',
	        'label'     => esc_html__('Footer columns','sportshub'),
	        'type'      => 'radio',
	        'choices'	=> array(
			'footer5col' => esc_html__('Footer 5 columns', 'sportshub'),
			'footer5cola' => esc_html__('Footer 5 A columns', 'sportshub'),
	        'footer4col' => esc_html__('Footer 4 columns', 'sportshub'),
			'footer4cola' => esc_html__('Footer 4 A columns', 'sportshub'),
			'footer3col' => esc_html__('Footer 3 columns', 'sportshub'),
			'footer2col' => esc_html__('Footer 2 columns', 'sportshub'),
			'footer1col' => esc_html__('Footer 1 columns', 'sportshub'),
			'footer0col' => esc_html__('No Footer', 'sportshub')
	        )
	    )
	);
	$sportshub_customize->add_setting(
	    'themelazer_copyright',
	    array(
	        'default'    =>  esc_html__('© Copyright 2023 Themelazer. All Rights Reserved Powered by Themelazer', 'sportshub'),
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'wp_kses_post',
	    )
	);
	$sportshub_customize->add_control(
	    'themelazer_copyright',
	    array(
	        'section'   => 'sportshub_footer_setting',
	        'label'     => esc_html__('Footer copyright','sportshub'),
	        'type'      => 'textarea'
	    )
	);
	
$sportshub_customize->remove_section( 'colors' );
$sportshub_customize->remove_section( 'background_image' );
}
add_action( 'customize_register', 'sportshub_register_theme_customizer', 110 );
