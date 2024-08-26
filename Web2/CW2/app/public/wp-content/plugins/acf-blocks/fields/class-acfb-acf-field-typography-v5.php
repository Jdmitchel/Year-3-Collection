<?php

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('acfb_acf_field_typography') ) :


class acfb_acf_field_typography extends acf_field {
	
	
	/*
	*  __construct
	*
	*  This function will setup the field type data
	*
	*  @type	function
	*  @date	5/03/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function __construct( $settings ) {
		
		/*
		*  name (string) Single word, no spaces. Underscores allowed
		*/

		
		$this->name = 'typography';
		
		
		/*
		*  label (string) Multiple words, can include spaces, visible when selecting a field type
		*/
		
		$this->label = __('Acfb Typography', 'acfb-typography');
		
		
		/*
		*  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
		*/
		
		$this->category = 'basic';
		
		
		/*
		*  defaults (array) Array of default settings which are merged into the field object. These are used later in settings
		*/
		
		$this->defaults = array(
			'font_family_enable' => 0,
			'font_family'	=> 'default',
			'font_size'	=> 18,
			'font_weight'	=> 'default',
			'font_transform' => 'default',
			'font_style' => 'default',
			'font_decoration' => 'default',
			'font_line_height'	=> '',
			'font_letter_spacing'	=> ''
			
		);
		


    $f = '{"default":"Default","ABeeZee":"ABeeZee","Abel":"Abel","Abhaya+Libre":"Abhaya Libre","Abril+Fatface":"Abril Fatface","Aclonica":"Aclonica","Acme":"Acme","Actor":"Actor","Adamina":"Adamina","Advent+Pro":"Advent Pro","Aguafina+Script":"Aguafina Script","Akronim":"Akronim","Aladin":"Aladin","Alata":"Alata","Alatsi":"Alatsi","Aldrich":"Aldrich","Alef":"Alef","Alegreya":"Alegreya","Alegreya+SC":"Alegreya SC","Alegreya+Sans":"Alegreya Sans","Alegreya+Sans+SC":"Alegreya Sans SC","Aleo":"Aleo","Alex+Brush":"Alex Brush","Alfa+Slab+One":"Alfa Slab One","Alice":"Alice","Alike":"Alike","Alike+Angular":"Alike Angular","Allan":"Allan","Allerta":"Allerta","Allerta+Stencil":"Allerta Stencil","Allura":"Allura","Almarai":"Almarai","Almendra":"Almendra","Almendra+Display":"Almendra Display","Almendra+SC":"Almendra SC","Amarante":"Amarante","Amaranth":"Amaranth","Amatic+SC":"Amatic SC","Amethysta":"Amethysta","Amiko":"Amiko","Amiri":"Amiri","Amita":"Amita","Anaheim":"Anaheim","Andada":"Andada","Andika":"Andika","Angkor":"Angkor","Annie+Use+Your+Telescope":"Annie Use Your Telescope","Anonymous+Pro":"Anonymous Pro","Antic":"Antic","Antic+Didone":"Antic Didone","Antic+Slab":"Antic Slab","Anton":"Anton","Arapey":"Arapey","Arbutus":"Arbutus","Arbutus+Slab":"Arbutus Slab","Architects+Daughter":"Architects Daughter","Archivo":"Archivo","Archivo+Black":"Archivo Black","Archivo+Narrow":"Archivo Narrow","Aref+Ruqaa":"Aref Ruqaa","Arima+Madurai":"Arima Madurai","Arimo":"Arimo","Arizonia":"Arizonia","Armata":"Armata","Arsenal":"Arsenal","Artifika":"Artifika","Arvo":"Arvo","Arya":"Arya","Asap":"Asap","Asap+Condensed":"Asap Condensed","Asar":"Asar","Asset":"Asset","Assistant":"Assistant","Astloch":"Astloch","Asul":"Asul","Athiti":"Athiti","Atma":"Atma","Atomic+Age":"Atomic Age","Aubrey":"Aubrey","Audiowide":"Audiowide","Autour+One":"Autour One","Average":"Average","Average+Sans":"Average Sans","Averia+Gruesa+Libre":"Averia Gruesa Libre","Averia+Libre":"Averia Libre","Averia+Sans+Libre":"Averia Sans Libre","Averia+Serif+Libre":"Averia Serif Libre","B612":"B612","B612+Mono":"B612 Mono","Bad+Script":"Bad Script","Bahiana":"Bahiana","Bahianita":"Bahianita","Bai+Jamjuree":"Bai Jamjuree","Baloo+2":"Baloo 2","Baloo+Bhai+2":"Baloo Bhai 2","Baloo+Bhaina+2":"Baloo Bhaina 2","Baloo+Chettan+2":"Baloo Chettan 2","Baloo+Da+2":"Baloo Da 2","Baloo+Paaji+2":"Baloo Paaji 2","Baloo+Tamma+2":"Baloo Tamma 2","Baloo+Tammudu+2":"Baloo Tammudu 2","Baloo+Thambi+2":"Baloo Thambi 2","Balthazar":"Balthazar","Bangers":"Bangers","Barlow":"Barlow","Barlow+Condensed":"Barlow Condensed","Barlow+Semi+Condensed":"Barlow Semi Condensed","Barriecito":"Barriecito","Barrio":"Barrio","Basic":"Basic","Baskervville":"Baskervville","Battambang":"Battambang","Baumans":"Baumans","Bayon":"Bayon","Be+Vietnam":"Be Vietnam","Bebas+Neue":"Bebas Neue","Belgrano":"Belgrano","Bellefair":"Bellefair","Belleza":"Belleza","Bellota":"Bellota","Bellota+Text":"Bellota Text","BenchNine":"BenchNine","Bentham":"Bentham","Berkshire+Swash":"Berkshire Swash","Beth+Ellen":"Beth Ellen","Bevan":"Bevan","Big+Shoulders+Display":"Big Shoulders Display","Big+Shoulders+Text":"Big Shoulders Text","Bigelow+Rules":"Bigelow Rules","Bigshot+One":"Bigshot One","Bilbo":"Bilbo","Bilbo+Swash+Caps":"Bilbo Swash Caps","BioRhyme":"BioRhyme","BioRhyme+Expanded":"BioRhyme Expanded","Biryani":"Biryani","Bitter":"Bitter","Black+And+White+Picture":"Black And White Picture","Black+Han+Sans":"Black Han Sans","Black+Ops+One":"Black Ops One","Blinker":"Blinker","Bokor":"Bokor","Bonbon":"Bonbon","Boogaloo":"Boogaloo","Bowlby+One":"Bowlby One","Bowlby+One+SC":"Bowlby One SC","Brawler":"Brawler","Bree+Serif":"Bree Serif","Bubblegum+Sans":"Bubblegum Sans","Bubbler+One":"Bubbler One","Buda":"Buda","Buenard":"Buenard","Bungee":"Bungee","Bungee+Hairline":"Bungee Hairline","Bungee+Inline":"Bungee Inline","Bungee+Outline":"Bungee Outline","Bungee+Shade":"Bungee Shade","Butcherman":"Butcherman","Butterfly+Kids":"Butterfly Kids","Cabin":"Cabin","Cabin+Condensed":"Cabin Condensed","Cabin+Sketch":"Cabin Sketch","Caesar+Dressing":"Caesar Dressing","Cagliostro":"Cagliostro","Cairo":"Cairo","Caladea":"Caladea","Calistoga":"Calistoga","Calligraffitti":"Calligraffitti","Cambay":"Cambay","Cambo":"Cambo","Candal":"Candal","Cantarell":"Cantarell","Cantata+One":"Cantata One","Cantora+One":"Cantora One","Capriola":"Capriola","Cardo":"Cardo","Carme":"Carme","Carrois+Gothic":"Carrois Gothic","Carrois+Gothic+SC":"Carrois Gothic SC","Carter+One":"Carter One","Catamaran":"Catamaran","Caudex":"Caudex","Caveat":"Caveat","Caveat+Brush":"Caveat Brush","Cedarville+Cursive":"Cedarville Cursive","Ceviche+One":"Ceviche One","Chakra+Petch":"Chakra Petch","Changa":"Changa","Changa+One":"Changa One","Chango":"Chango","Charm":"Charm","Charmonman":"Charmonman","Chathura":"Chathura","Chau+Philomene+One":"Chau Philomene One","Chela+One":"Chela One","Chelsea+Market":"Chelsea Market","Chenla":"Chenla","Cherry+Cream+Soda":"Cherry Cream Soda","Cherry+Swash":"Cherry Swash","Chewy":"Chewy","Chicle":"Chicle","Chilanka":"Chilanka","Chivo":"Chivo","Chonburi":"Chonburi","Cinzel":"Cinzel","Cinzel+Decorative":"Cinzel Decorative","Clicker+Script":"Clicker Script","Coda":"Coda","Coda+Caption":"Coda Caption","Codystar":"Codystar","Coiny":"Coiny","Combo":"Combo","Comfortaa":"Comfortaa","Comic+Neue":"Comic Neue","Coming+Soon":"Coming Soon","Concert+One":"Concert One","Condiment":"Condiment","Content":"Content","Contrail+One":"Contrail One","Convergence":"Convergence","Cookie":"Cookie","Copse":"Copse","Corben":"Corben","Cormorant":"Cormorant","Cormorant+Garamond":"Cormorant Garamond","Cormorant+Infant":"Cormorant Infant","Cormorant+SC":"Cormorant SC","Cormorant+Unicase":"Cormorant Unicase","Cormorant+Upright":"Cormorant Upright","Courgette":"Courgette","Courier+Prime":"Courier Prime","Cousine":"Cousine","Coustard":"Coustard","Covered+By+Your+Grace":"Covered By Your Grace","Crafty+Girls":"Crafty Girls","Creepster":"Creepster","Crete+Round":"Crete Round","Crimson+Pro":"Crimson Pro","Crimson+Text":"Crimson Text","Croissant+One":"Croissant One","Crushed":"Crushed","Cuprum":"Cuprum","Cute+Font":"Cute Font","Cutive":"Cutive","Cutive+Mono":"Cutive Mono","DM+Sans":"DM Sans","DM+Serif+Display":"DM Serif Display","DM+Serif+Text":"DM Serif Text","Damion":"Damion","Dancing+Script":"Dancing Script","Dangrek":"Dangrek","Darker+Grotesque":"Darker Grotesque","David+Libre":"David Libre","Dawning+of+a+New+Day":"Dawning of a New Day","Days+One":"Days One","Dekko":"Dekko","Delius":"Delius","Delius+Swash+Caps":"Delius Swash Caps","Delius+Unicase":"Delius Unicase","Della+Respira":"Della Respira","Denk+One":"Denk One","Devonshire":"Devonshire","Dhurjati":"Dhurjati","Didact+Gothic":"Didact Gothic","Diplomata":"Diplomata","Diplomata+SC":"Diplomata SC","Do+Hyeon":"Do Hyeon","Dokdo":"Dokdo","Domine":"Domine","Donegal+One":"Donegal One","Doppio+One":"Doppio One","Dorsa":"Dorsa","Dosis":"Dosis","Dr+Sugiyama":"Dr Sugiyama","Duru+Sans":"Duru Sans","Dynalight":"Dynalight","EB+Garamond":"EB Garamond","Eagle+Lake":"Eagle Lake","East+Sea+Dokdo":"East Sea Dokdo","Eater":"Eater","Economica":"Economica","Eczar":"Eczar","El+Messiri":"El Messiri","Electrolize":"Electrolize","Elsie":"Elsie","Elsie+Swash+Caps":"Elsie Swash Caps","Emblema+One":"Emblema One","Emilys+Candy":"Emilys Candy","Encode+Sans":"Encode Sans","Encode+Sans+Condensed":"Encode Sans Condensed","Encode+Sans+Expanded":"Encode Sans Expanded","Encode+Sans+Semi+Condensed":"Encode Sans Semi Condensed","Encode+Sans+Semi+Expanded":"Encode Sans Semi Expanded","Engagement":"Engagement","Englebert":"Englebert","Enriqueta":"Enriqueta","Erica+One":"Erica One","Esteban":"Esteban","Euphoria+Script":"Euphoria Script","Ewert":"Ewert","Exo":"Exo","Exo+2":"Exo 2","Expletus+Sans":"Expletus Sans","Fahkwang":"Fahkwang","Fanwood+Text":"Fanwood Text","Farro":"Farro","Farsan":"Farsan","Fascinate":"Fascinate","Fascinate+Inline":"Fascinate Inline","Faster+One":"Faster One","Fasthand":"Fasthand","Fauna+One":"Fauna One","Faustina":"Faustina","Federant":"Federant","Federo":"Federo","Felipa":"Felipa","Fenix":"Fenix","Finger+Paint":"Finger Paint","Fira+Code":"Fira Code","Fira+Mono":"Fira Mono","Fira+Sans":"Fira Sans","Fira+Sans+Condensed":"Fira Sans Condensed","Fira+Sans+Extra+Condensed":"Fira Sans Extra Condensed","Fjalla+One":"Fjalla One","Fjord+One":"Fjord One","Flamenco":"Flamenco","Flavors":"Flavors","Fondamento":"Fondamento","Fontdiner+Swanky":"Fontdiner Swanky","Forum":"Forum","Francois+One":"Francois One","Frank+Ruhl+Libre":"Frank Ruhl Libre","Freckle+Face":"Freckle Face","Fredericka+the+Great":"Fredericka the Great","Fredoka+One":"Fredoka One","Freehand":"Freehand","Fresca":"Fresca","Frijole":"Frijole","Fruktur":"Fruktur","Fugaz+One":"Fugaz One","GFS+Didot":"GFS Didot","GFS+Neohellenic":"GFS Neohellenic","Gabriela":"Gabriela","Gaegu":"Gaegu","Gafata":"Gafata","Galada":"Galada","Galdeano":"Galdeano","Galindo":"Galindo","Gamja+Flower":"Gamja Flower","Gayathri":"Gayathri","Gelasio":"Gelasio","Gentium+Basic":"Gentium Basic","Gentium+Book+Basic":"Gentium Book Basic","Geo":"Geo","Geostar":"Geostar","Geostar+Fill":"Geostar Fill","Germania+One":"Germania One","Gidugu":"Gidugu","Gilda+Display":"Gilda Display","Girassol":"Girassol","Give+You+Glory":"Give You Glory","Glass+Antiqua":"Glass Antiqua","Glegoo":"Glegoo","Gloria+Hallelujah":"Gloria Hallelujah","Goblin+One":"Goblin One","Gochi+Hand":"Gochi Hand","Gorditas":"Gorditas","Gothic+A1":"Gothic A1","Gotu":"Gotu","Goudy+Bookletter+1911":"Goudy Bookletter 1911","Graduate":"Graduate","Grand+Hotel":"Grand Hotel","Gravitas+One":"Gravitas One","Great+Vibes":"Great Vibes","Grenze":"Grenze","Griffy":"Griffy","Gruppo":"Gruppo","Gudea":"Gudea","Gugi":"Gugi","Gupter":"Gupter","Gurajada":"Gurajada","Habibi":"Habibi","Halant":"Halant","Hammersmith+One":"Hammersmith One","Hanalei":"Hanalei","Hanalei+Fill":"Hanalei Fill","Handlee":"Handlee","Hanuman":"Hanuman","Happy+Monkey":"Happy Monkey","Harmattan":"Harmattan","Headland+One":"Headland One","Heebo":"Heebo","Henny+Penny":"Henny Penny","Hepta+Slab":"Hepta Slab","Herr+Von+Muellerhoff":"Herr Von Muellerhoff","Hi+Melody":"Hi Melody","Hind":"Hind","Hind+Guntur":"Hind Guntur","Hind+Madurai":"Hind Madurai","Hind+Siliguri":"Hind Siliguri","Hind+Vadodara":"Hind Vadodara","Holtwood+One+SC":"Holtwood One SC","Homemade+Apple":"Homemade Apple","Homenaje":"Homenaje","IBM+Plex+Mono":"IBM Plex Mono","IBM+Plex+Sans":"IBM Plex Sans","IBM+Plex+Sans+Condensed":"IBM Plex Sans Condensed","IBM+Plex+Serif":"IBM Plex Serif","IM+Fell+DW+Pica":"IM Fell DW Pica","IM+Fell+DW+Pica+SC":"IM Fell DW Pica SC","IM+Fell+Double+Pica":"IM Fell Double Pica","IM+Fell+Double+Pica+SC":"IM Fell Double Pica SC","IM+Fell+English":"IM Fell English","IM+Fell+English+SC":"IM Fell English SC","IM+Fell+French+Canon":"IM Fell French Canon","IM+Fell+French+Canon+SC":"IM Fell French Canon SC","IM+Fell+Great+Primer":"IM Fell Great Primer","IM+Fell+Great+Primer+SC":"IM Fell Great Primer SC","Ibarra+Real+Nova":"Ibarra Real Nova","Iceberg":"Iceberg","Iceland":"Iceland","Imprima":"Imprima","Inconsolata":"Inconsolata","Inder":"Inder","Indie+Flower":"Indie Flower","Inika":"Inika","Inknut+Antiqua":"Inknut Antiqua","Inria+Sans":"Inria Sans","Inria+Serif":"Inria Serif","Inter":"Inter","Irish+Grover":"Irish Grover","Istok+Web":"Istok Web","Italiana":"Italiana","Italianno":"Italianno","Itim":"Itim","Jacques+Francois":"Jacques Francois","Jacques+Francois+Shadow":"Jacques Francois Shadow","Jaldi":"Jaldi","Jim+Nightshade":"Jim Nightshade","Jockey+One":"Jockey One","Jolly+Lodger":"Jolly Lodger","Jomhuria":"Jomhuria","Jomolhari":"Jomolhari","Josefin+Sans":"Josefin Sans","Josefin+Slab":"Josefin Slab","Joti+One":"Joti One","Jua":"Jua","Judson":"Judson","Julee":"Julee","Julius+Sans+One":"Julius Sans One","Junge":"Junge","Jura":"Jura","Just+Another+Hand":"Just Another Hand","Just+Me+Again+Down+Here":"Just Me Again Down Here","K2D":"K2D","Kadwa":"Kadwa","Kalam":"Kalam","Kameron":"Kameron","Kanit":"Kanit","Kantumruy":"Kantumruy","Karla":"Karla","Karma":"Karma","Katibeh":"Katibeh","Kaushan+Script":"Kaushan Script","Kavivanar":"Kavivanar","Kavoon":"Kavoon","Kdam+Thmor":"Kdam Thmor","Keania+One":"Keania One","Kelly+Slab":"Kelly Slab","Kenia":"Kenia","Khand":"Khand","Khmer":"Khmer","Khula":"Khula","Kirang+Haerang":"Kirang Haerang","Kite+One":"Kite One","Knewave":"Knewave","KoHo":"KoHo","Kodchasan":"Kodchasan","Kosugi":"Kosugi","Kosugi+Maru":"Kosugi Maru","Kotta+One":"Kotta One","Koulen":"Koulen","Kranky":"Kranky","Kreon":"Kreon","Kristi":"Kristi","Krona+One":"Krona One","Krub":"Krub","Kulim+Park":"Kulim Park","Kumar+One":"Kumar One","Kumar+One+Outline":"Kumar One Outline","Kurale":"Kurale","La+Belle+Aurore":"La Belle Aurore","Lacquer":"Lacquer","Laila":"Laila","Lakki+Reddy":"Lakki Reddy","Lalezar":"Lalezar","Lancelot":"Lancelot","Lateef":"Lateef","Lato":"Lato","League+Script":"League Script","Leckerli+One":"Leckerli One","Ledger":"Ledger","Lekton":"Lekton","Lemon":"Lemon","Lemonada":"Lemonada","Lexend+Deca":"Lexend Deca","Lexend+Exa":"Lexend Exa","Lexend+Giga":"Lexend Giga","Lexend+Mega":"Lexend Mega","Lexend+Peta":"Lexend Peta","Lexend+Tera":"Lexend Tera","Lexend+Zetta":"Lexend Zetta","Libre+Barcode+128":"Libre Barcode 128","Libre+Barcode+128+Text":"Libre Barcode 128 Text","Libre+Barcode+39":"Libre Barcode 39","Libre+Barcode+39+Extended":"Libre Barcode 39 Extended","Libre+Barcode+39+Extended+Text":"Libre Barcode 39 Extended Text","Libre+Barcode+39+Text":"Libre Barcode 39 Text","Libre+Baskerville":"Libre Baskerville","Libre+Caslon+Display":"Libre Caslon Display","Libre+Caslon+Text":"Libre Caslon Text","Libre+Franklin":"Libre Franklin","Life+Savers":"Life Savers","Lilita+One":"Lilita One","Lily+Script+One":"Lily Script One","Limelight":"Limelight","Linden+Hill":"Linden Hill","Literata":"Literata","Liu+Jian+Mao+Cao":"Liu Jian Mao Cao","Livvic":"Livvic","Lobster":"Lobster","Lobster+Two":"Lobster Two","Londrina+Outline":"Londrina Outline","Londrina+Shadow":"Londrina Shadow","Londrina+Sketch":"Londrina Sketch","Londrina+Solid":"Londrina Solid","Long+Cang":"Long Cang","Lora":"Lora","Love+Ya+Like+A+Sister":"Love Ya Like A Sister","Loved+by+the+King":"Loved by the King","Lovers+Quarrel":"Lovers Quarrel","Luckiest+Guy":"Luckiest Guy","Lusitana":"Lusitana","Lustria":"Lustria","M+PLUS+1p":"M PLUS 1p","M+PLUS+Rounded+1c":"M PLUS Rounded 1c","Ma+Shan+Zheng":"Ma Shan Zheng","Macondo":"Macondo","Macondo+Swash+Caps":"Macondo Swash Caps","Mada":"Mada","Magra":"Magra","Maiden+Orange":"Maiden Orange","Maitree":"Maitree","Major+Mono+Display":"Major Mono Display","Mako":"Mako","Mali":"Mali","Mallanna":"Mallanna","Mandali":"Mandali","Manjari":"Manjari","Mansalva":"Mansalva","Manuale":"Manuale","Marcellus":"Marcellus","Marcellus+SC":"Marcellus SC","Marck+Script":"Marck Script","Margarine":"Margarine","Markazi+Text":"Markazi Text","Marko+One":"Marko One","Marmelad":"Marmelad","Martel":"Martel","Martel+Sans":"Martel Sans","Marvel":"Marvel","Mate":"Mate","Mate+SC":"Mate SC","Maven+Pro":"Maven Pro","McLaren":"McLaren","Meddon":"Meddon","MedievalSharp":"MedievalSharp","Medula+One":"Medula One","Meera+Inimai":"Meera Inimai","Megrim":"Megrim","Meie+Script":"Meie Script","Merienda":"Merienda","Merienda+One":"Merienda One","Merriweather":"Merriweather","Merriweather+Sans":"Merriweather Sans","Metal":"Metal","Metal+Mania":"Metal Mania","Metamorphous":"Metamorphous","Metrophobic":"Metrophobic","Michroma":"Michroma","Milonga":"Milonga","Miltonian":"Miltonian","Miltonian+Tattoo":"Miltonian Tattoo","Mina":"Mina","Miniver":"Miniver","Miriam+Libre":"Miriam Libre","Mirza":"Mirza","Miss+Fajardose":"Miss Fajardose","Mitr":"Mitr","Modak":"Modak","Modern+Antiqua":"Modern Antiqua","Mogra":"Mogra","Molengo":"Molengo","Molle":"Molle","Monda":"Monda","Monofett":"Monofett","Monoton":"Monoton","Monsieur+La+Doulaise":"Monsieur La Doulaise","Montaga":"Montaga","Montez":"Montez","Montserrat":"Montserrat","Montserrat+Alternates":"Montserrat Alternates","Montserrat+Subrayada":"Montserrat Subrayada","Moul":"Moul","Moulpali":"Moulpali","Mountains+of+Christmas":"Mountains of Christmas","Mouse+Memoirs":"Mouse Memoirs","Mr+Bedfort":"Mr Bedfort","Mr+Dafoe":"Mr Dafoe","Mr+De+Haviland":"Mr De Haviland","Mrs+Saint+Delafield":"Mrs Saint Delafield","Mrs+Sheppards":"Mrs Sheppards","Mukta":"Mukta","Mukta+Mahee":"Mukta Mahee","Mukta+Malar":"Mukta Malar","Mukta+Vaani":"Mukta Vaani","Muli":"Muli","Mystery+Quest":"Mystery Quest","NTR":"NTR","Nanum+Brush+Script":"Nanum Brush Script","Nanum+Gothic":"Nanum Gothic","Nanum+Gothic+Coding":"Nanum Gothic Coding","Nanum+Myeongjo":"Nanum Myeongjo","Nanum+Pen+Script":"Nanum Pen Script","Neucha":"Neucha","Neuton":"Neuton","New+Rocker":"New Rocker","News+Cycle":"News Cycle","Niconne":"Niconne","Niramit":"Niramit","Nixie+One":"Nixie One","Nobile":"Nobile","Nokora":"Nokora","Norican":"Norican","Nosifer":"Nosifer","Notable":"Notable","Nothing+You+Could+Do":"Nothing You Could Do","Noticia+Text":"Noticia Text","Noto+Sans":"Noto Sans","Noto+Sans+HK":"Noto Sans HK","Noto+Sans+JP":"Noto Sans JP","Noto+Sans+KR":"Noto Sans KR","Noto+Sans+SC":"Noto Sans SC","Noto+Sans+TC":"Noto Sans TC","Noto+Serif":"Noto Serif","Noto+Serif+JP":"Noto Serif JP","Noto+Serif+KR":"Noto Serif KR","Noto+Serif+SC":"Noto Serif SC","Noto+Serif+TC":"Noto Serif TC","Nova+Cut":"Nova Cut","Nova+Flat":"Nova Flat","Nova+Mono":"Nova Mono","Nova+Oval":"Nova Oval","Nova+Round":"Nova Round","Nova+Script":"Nova Script","Nova+Slim":"Nova Slim","Nova+Square":"Nova Square","Numans":"Numans","Nunito":"Nunito","Nunito+Sans":"Nunito Sans","Odibee+Sans":"Odibee Sans","Odor+Mean+Chey":"Odor Mean Chey","Offside":"Offside","Old+Standard+TT":"Old Standard TT","Oldenburg":"Oldenburg","Oleo+Script":"Oleo Script","Oleo+Script+Swash+Caps":"Oleo Script Swash Caps","Open+Sans":"Open Sans","Open+Sans+Condensed":"Open Sans Condensed","Oranienbaum":"Oranienbaum","Orbitron":"Orbitron","Oregano":"Oregano","Orienta":"Orienta","Original+Surfer":"Original Surfer","Oswald":"Oswald","Over+the+Rainbow":"Over the Rainbow","Overlock":"Overlock","Overlock+SC":"Overlock SC","Overpass":"Overpass","Overpass+Mono":"Overpass Mono","Ovo":"Ovo","Oxanium":"Oxanium","Oxygen":"Oxygen","Oxygen+Mono":"Oxygen Mono","PT+Mono":"PT Mono","PT+Sans":"PT Sans","PT+Sans+Caption":"PT Sans Caption","PT+Sans+Narrow":"PT Sans Narrow","PT+Serif":"PT Serif","PT+Serif+Caption":"PT Serif Caption","Pacifico":"Pacifico","Padauk":"Padauk","Palanquin":"Palanquin","Palanquin+Dark":"Palanquin Dark","Pangolin":"Pangolin","Paprika":"Paprika","Parisienne":"Parisienne","Passero+One":"Passero One","Passion+One":"Passion One","Pathway+Gothic+One":"Pathway Gothic One","Patrick+Hand":"Patrick Hand","Patrick+Hand+SC":"Patrick Hand SC","Pattaya":"Pattaya","Patua+One":"Patua One","Pavanam":"Pavanam","Paytone+One":"Paytone One","Peddana":"Peddana","Peralta":"Peralta","Permanent+Marker":"Permanent Marker","Petit+Formal+Script":"Petit Formal Script","Petrona":"Petrona","Philosopher":"Philosopher","Piedra":"Piedra","Pinyon+Script":"Pinyon Script","Pirata+One":"Pirata One","Plaster":"Plaster","Play":"Play","Playball":"Playball","Playfair+Display":"Playfair Display","Playfair+Display+SC":"Playfair Display SC","Podkova":"Podkova","Poiret+One":"Poiret One","Poller+One":"Poller One","Poly":"Poly","Pompiere":"Pompiere","Pontano+Sans":"Pontano Sans","Poor+Story":"Poor Story","Poppins":"Poppins","Port+Lligat+Sans":"Port Lligat Sans","Port+Lligat+Slab":"Port Lligat Slab","Pragati+Narrow":"Pragati Narrow","Prata":"Prata","Preahvihear":"Preahvihear","Press+Start+2P":"Press Start 2P","Pridi":"Pridi","Princess+Sofia":"Princess Sofia","Prociono":"Prociono","Prompt":"Prompt","Prosto+One":"Prosto One","Proza+Libre":"Proza Libre","Public+Sans":"Public Sans","Puritan":"Puritan","Purple+Purse":"Purple Purse","Quando":"Quando","Quantico":"Quantico","Quattrocento":"Quattrocento","Quattrocento+Sans":"Quattrocento Sans","Questrial":"Questrial","Quicksand":"Quicksand","Quintessential":"Quintessential","Qwigley":"Qwigley","Racing+Sans+One":"Racing Sans One","Radley":"Radley","Rajdhani":"Rajdhani","Rakkas":"Rakkas","Raleway":"Raleway","Raleway+Dots":"Raleway Dots","Ramabhadra":"Ramabhadra","Ramaraja":"Ramaraja","Rambla":"Rambla","Rammetto+One":"Rammetto One","Ranchers":"Ranchers","Rancho":"Rancho","Ranga":"Ranga","Rasa":"Rasa","Rationale":"Rationale","Ravi+Prakash":"Ravi Prakash","Red+Hat+Display":"Red Hat Display","Red+Hat+Text":"Red Hat Text","Redressed":"Redressed","Reem+Kufi":"Reem Kufi","Reenie+Beanie":"Reenie Beanie","Revalia":"Revalia","Rhodium+Libre":"Rhodium Libre","Ribeye":"Ribeye","Ribeye+Marrow":"Ribeye Marrow","Righteous":"Righteous","Risque":"Risque","Roboto":"Roboto","Roboto+Condensed":"Roboto Condensed","Roboto+Mono":"Roboto Mono","Roboto+Slab":"Roboto Slab","Rochester":"Rochester","Rock+Salt":"Rock Salt","Rokkitt":"Rokkitt","Romanesco":"Romanesco","Ropa+Sans":"Ropa Sans","Rosario":"Rosario","Rosarivo":"Rosarivo","Rouge+Script":"Rouge Script","Rozha+One":"Rozha One","Rubik":"Rubik","Rubik+Mono+One":"Rubik Mono One","Ruda":"Ruda","Rufina":"Rufina","Ruge+Boogie":"Ruge Boogie","Ruluko":"Ruluko","Rum+Raisin":"Rum Raisin","Ruslan+Display":"Ruslan Display","Russo+One":"Russo One","Ruthie":"Ruthie","Rye":"Rye","Sacramento":"Sacramento","Sahitya":"Sahitya","Sail":"Sail","Saira":"Saira","Saira+Condensed":"Saira Condensed","Saira+Extra+Condensed":"Saira Extra Condensed","Saira+Semi+Condensed":"Saira Semi Condensed","Saira+Stencil+One":"Saira Stencil One","Salsa":"Salsa","Sanchez":"Sanchez","Sancreek":"Sancreek","Sansita":"Sansita","Sarabun":"Sarabun","Sarala":"Sarala","Sarina":"Sarina","Sarpanch":"Sarpanch","Satisfy":"Satisfy","Sawarabi+Gothic":"Sawarabi Gothic","Sawarabi+Mincho":"Sawarabi Mincho","Scada":"Scada","Scheherazade":"Scheherazade","Schoolbell":"Schoolbell","Scope+One":"Scope One","Seaweed+Script":"Seaweed Script","Secular+One":"Secular One","Sedgwick+Ave":"Sedgwick Ave","Sedgwick+Ave+Display":"Sedgwick Ave Display","Sen":"Sen","Sevillana":"Sevillana","Seymour+One":"Seymour One","Shadows+Into+Light":"Shadows Into Light","Shadows+Into+Light+Two":"Shadows Into Light Two","Shanti":"Shanti","Share":"Share","Share+Tech":"Share Tech","Share+Tech+Mono":"Share Tech Mono","Shojumaru":"Shojumaru","Short+Stack":"Short Stack","Shrikhand":"Shrikhand","Siemreap":"Siemreap","Sigmar+One":"Sigmar One","Signika":"Signika","Signika+Negative":"Signika Negative","Simonetta":"Simonetta","Single+Day":"Single Day","Sintony":"Sintony","Sirin+Stencil":"Sirin Stencil","Six+Caps":"Six Caps","Skranji":"Skranji","Slabo+13px":"Slabo 13px","Slabo+27px":"Slabo 27px","Slackey":"Slackey","Smokum":"Smokum","Smythe":"Smythe","Sniglet":"Sniglet","Snippet":"Snippet","Snowburst+One":"Snowburst One","Sofadi+One":"Sofadi One","Sofia":"Sofia","Solway":"Solway","Song+Myung":"Song Myung","Sonsie+One":"Sonsie One","Sorts+Mill+Goudy":"Sorts Mill Goudy","Source+Code+Pro":"Source Code Pro","Source+Sans+Pro":"Source Sans Pro","Source+Serif+Pro":"Source Serif Pro","Space+Mono":"Space Mono","Spartan":"Spartan","Special+Elite":"Special Elite","Spectral":"Spectral","Spectral+SC":"Spectral SC","Spicy+Rice":"Spicy Rice","Spinnaker":"Spinnaker","Spirax":"Spirax","Squada+One":"Squada One","Sree+Krushnadevaraya":"Sree Krushnadevaraya","Sriracha":"Sriracha","Srisakdi":"Srisakdi","Staatliches":"Staatliches","Stalemate":"Stalemate","Stalinist+One":"Stalinist One","Stardos+Stencil":"Stardos Stencil","Stint+Ultra+Condensed":"Stint Ultra Condensed","Stint+Ultra+Expanded":"Stint Ultra Expanded","Stoke":"Stoke","Strait":"Strait","Stylish":"Stylish","Sue+Ellen+Francisco":"Sue Ellen Francisco","Suez+One":"Suez One","Sulphur+Point":"Sulphur Point","Sumana":"Sumana","Sunflower":"Sunflower","Sunshiney":"Sunshiney","Supermercado+One":"Supermercado One","Sura":"Sura","Suranna":"Suranna","Suravaram":"Suravaram","Suwannaphum":"Suwannaphum","Swanky+and+Moo+Moo":"Swanky and Moo Moo","Syncopate":"Syncopate","Tajawal":"Tajawal","Tangerine":"Tangerine","Taprom":"Taprom","Tauri":"Tauri","Taviraj":"Taviraj","Teko":"Teko","Telex":"Telex","Tenali+Ramakrishna":"Tenali Ramakrishna","Tenor+Sans":"Tenor Sans","Text+Me+One":"Text Me One","Thasadith":"Thasadith","The+Girl+Next+Door":"The Girl Next Door","Tienne":"Tienne","Tillana":"Tillana","Timmana":"Timmana","Tinos":"Tinos","Titan+One":"Titan One","Titillium+Web":"Titillium Web","Tomorrow":"Tomorrow","Trade+Winds":"Trade Winds","Trirong":"Trirong","Trocchi":"Trocchi","Trochut":"Trochut","Trykker":"Trykker","Tulpen+One":"Tulpen One","Turret+Road":"Turret Road","Ubuntu":"Ubuntu","Ubuntu+Condensed":"Ubuntu Condensed","Ubuntu+Mono":"Ubuntu Mono","Ultra":"Ultra","Uncial+Antiqua":"Uncial Antiqua","Underdog":"Underdog","Unica+One":"Unica One","UnifrakturCook":"UnifrakturCook","UnifrakturMaguntia":"UnifrakturMaguntia","Unkempt":"Unkempt","Unlock":"Unlock","Unna":"Unna","VT323":"VT323","Vampiro+One":"Vampiro One","Varela":"Varela","Varela+Round":"Varela Round","Vast+Shadow":"Vast Shadow","Vesper+Libre":"Vesper Libre","Viaoda+Libre":"Viaoda Libre","Vibes":"Vibes","Vibur":"Vibur","Vidaloka":"Vidaloka","Viga":"Viga","Voces":"Voces","Volkhov":"Volkhov","Vollkorn":"Vollkorn","Vollkorn+SC":"Vollkorn SC","Voltaire":"Voltaire","Waiting+for+the+Sunrise":"Waiting for the Sunrise","Wallpoet":"Wallpoet","Walter+Turncoat":"Walter Turncoat","Warnes":"Warnes","Wellfleet":"Wellfleet","Wendy+One":"Wendy One","Wire+One":"Wire One","Work+Sans":"Work Sans","Yanone+Kaffeesatz":"Yanone Kaffeesatz","Yantramanav":"Yantramanav","Yatra+One":"Yatra One","Yellowtail":"Yellowtail","Yeon+Sung":"Yeon Sung","Yeseva+One":"Yeseva One","Yesteryear":"Yesteryear","Yrsa":"Yrsa","ZCOOL+KuaiLe":"ZCOOL KuaiLe","ZCOOL+QingKe+HuangYou":"ZCOOL QingKe HuangYou","ZCOOL+XiaoWei":"ZCOOL XiaoWei","Zeyada":"Zeyada","Zhi+Mang+Xing":"Zhi Mang Xing","Zilla+Slab":"Zilla Slab","Zilla+Slab+Highlight":"Zilla Slab Highlight"}'; 



		$this->font_family = json_decode($f, JSON_PRETTY_PRINT);
		

		$this->font_weight = array(
			'default' => 'Default',
			'100' => '100',
			'200' => '200',
			'300' => '300',
			'400' => '400',
			'500' => '500',
			'600' => '600',
			'700' => '700',
			'800' => '800',
			'900' => '900',
			'normal' => 'Normal',
			'bold' => 'Bold',
		);

		$this->font_transform = array(
			'default' => 'Default',
			'normal' => 'Normal',
			'uppercase' => 'Uppercase',
			'lowercase' => 'Lowercase',
			'capitalize' => 'Capitalize',
		);

		$this->font_style = array(
			'default' => 'Default',
			'normal' => 'Normal',
			'italic' => 'Italic',
		);

		$this->font_decoration = array(
			'default' => 'Default',
			'underline' => 'Underline',
			'overline' => 'Overline',
			'linethrough' => 'Line Through',
			'none' => 'None',
		);

		
		/*
		*  l10n (array) Array of strings that are used in JavaScript. This allows JS strings to be translated in PHP and loaded via:
		*  var message = acf._e('typography', 'error');
		*/
		
		$this->l10n = array(
			'error'	=> __('Error! Please enter a higher value', 'acfb-typography'),
		);
		
		
		/*
		*  settings (array) Store plugin settings (url, path, version) as a reference for later use with assets
		*/
		
		$this->settings = $settings;
		
		
		// do not delete!
    	parent::__construct();
    	
	}
	
	
	/*
	*  render_field_settings()
	*
	*  Create extra settings for your field. These are visible when editing a field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	
	function render_field_settings( $field ) {
		
		/*
		*  acf_render_field_setting
		*
		*  This function will create a setting for your field. Simply pass the $field parameter and an array of field settings.
		*  The array of settings does not require a `value` or `prefix`; These settings are found from the $field array.
		*
		*  More than one setting can be added by copy/paste the above code.
		*  Please note that you must also have a matching $defaults value for the field name (font_size)
		*/


		acf_render_field_setting( $field, array(
			'label'			=> __('Enable Field','acfb-typography'),
			'instructions'	=> __('Default','acfb-typography'),
			'type'			=> 'true_false',
			'name'			=> 'font_family_enable',
			'layout'        => 'horizontal',
			'ui'			=> 0
		));

		acf_render_field_setting( $field, array(
			'label'			=> __('Family','acfb-typography'),
			'instructions'	=> __('Default','acfb-typography'),
			'type'			=> 'select',
			'name'			=> 'font_family',
			'choices'       => $this->font_family,
			'layout'        => 'horizontal'
		));
		
		acf_render_field_setting( $field, array(
			'label'			=> __('Size','acfb-typography'),
			'instructions'	=> __('Default','acfb-typography'),
			'type'			=> 'range',
			'name'			=> 'font_size',
			'min'			=> 0,
            'max'			=> 100,
            'step'			=> 1,
			'prepend'		=> 'px',
		));


		acf_render_field_setting( $field, array(
			'label'			=> __('Weight','acfb-typography'),
			'instructions'	=> __('Default','acfb-typography'),
			'type'			=> 'select',
			'name'			=> 'font_weight',
			'choices'       => $this->font_weight,
			'layout'        => 'horizontal'
		));

		acf_render_field_setting( $field, array(
			'label'			=> __('Transform','acfb-typography'),
			'instructions'	=> __('Default','acfb-typography'),
			'type'			=> 'select',
			'name'			=> 'font_transform',
			'choices'       => $this->font_transform,
			'layout'        => 'horizontal'
		));

		acf_render_field_setting( $field, array(
			'label'			=> __('Style','acfb-typography'),
			'instructions'	=> __('Default','acfb-typography'),
			'type'			=> 'select',
			'name'			=> 'font_style',
			'choices'       => $this->font_style,
			'layout'        => 'horizontal'
		));

		acf_render_field_setting( $field, array(
			'label'			=> __('Decoration','acfb-typography'),
			'instructions'	=> __('Default','acfb-typography'),
			'type'			=> 'select',
			'name'			=> 'font_decoration',
			'choices'       => $this->font_decoration,
			'layout'        => 'horizontal'
		));

		acf_render_field_setting( $field, array(
			'label'			=> __('Line Height','acfb-typography'),
			'instructions'	=> __('Default','acfb-typography'),
			'type'			=> 'range',
			'name'			=> 'font_line_height',
			'min'			=> 0.1,
            'max'			=> 10,
            'step'			=> 0.1,
			'prepend'		=> 'px',
		));

		acf_render_field_setting( $field, array(
			'label'			=> __('Letter Spacing','acfb-typography'),
			'instructions'	=> __('Default','acfb-typography'),
			'type'			=> 'range',
			'name'			=> 'font_letter_spacing',
			'min'			=> -5,
            'max'			=> 10,
            'step'			=> 0.1,
			'prepend'		=> 'px',
		));



	}
	
	
	
	/*
	*  render_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field (array) the $field being rendered
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	
	function render_field( $field ) {
		
		
		/*
		*  Review the data of $field.
		*  This will show what data is available
		*/
		
		/*
		*  Create a simple text input using the 'font_size' setting.
		*/

		// $field = array_merge($this->defaults, $field);

		// $default_font_family = $field['font_family_enable'];


		if ( empty($field['value']) ) {

			$field['value']['font_family_enable'] = $field['font_family_enable'];

			$field['value']['font_family'] = $field['font_family'];
			$field['value']['font_size'] = $field['font_size'];
			$field['value']['font_color'] = $field['font_color'];
			$field['value']['font_weight'] = $field['font_weight'];
			$field['value']['font_transform'] = $field['font_transform'];
			$field['value']['font_style'] = $field['font_style'];
			$field['value']['font_decoration'] = $field['font_decoration'];
			$field['value']['font_line_height'] = $field['font_line_height'];
			// $field['value']['font_letter_spacing'] = $field['font_letter_spacing'];
			// $field['value']['font_color'] = $field['font_color'];

		}



		?>



<div class="acf_typo_root acfb_cs_field_root">

		<div class="acf-input">
		<div class="acf-true-false">
				<input type="checkbox" 
				name="<?php echo $field['name'] . 'font_family_enable' ?>" 
				value="<?php echo $field['value']['font_family_enable']; ?>"
				id="acfb_eye_typo_<?php echo $field['name']; ?>" 
				class="acfb-checkbox-true-false"
				<?php 
					if ($field['value']['font_family_enable'] === 1) {

						echo 'checked';

					}
				?>
				>
				<label for="acfb_eye_typo_<?php echo $field['name']; ?>">
					<svg class="acfb_eye_svg" viewBox="0 -1 401.52289 401" xmlns="http://www.w3.org/2000/svg"><path d="m370.589844 250.972656c-5.523438 0-10 4.476563-10 10v88.789063c-.019532 16.5625-13.4375 29.984375-30 30h-280.589844c-16.5625-.015625-29.980469-13.4375-30-30v-260.589844c.019531-16.558594 13.4375-29.980469 30-30h88.789062c5.523438 0 10-4.476563 10-10 0-5.519531-4.476562-10-10-10h-88.789062c-27.601562.03125-49.96875 22.398437-50 50v260.59375c.03125 27.601563 22.398438 49.96875 50 50h280.589844c27.601562-.03125 49.96875-22.398437 50-50v-88.792969c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m376.628906 13.441406c-17.574218-17.574218-46.066406-17.574218-63.640625 0l-178.40625 178.40625c-1.222656 1.222656-2.105469 2.738282-2.566406 4.402344l-23.460937 84.699219c-.964844 3.472656.015624 7.191406 2.5625 9.742187 2.550781 2.546875 6.269531 3.527344 9.742187 2.566406l84.699219-23.464843c1.664062-.460938 3.179687-1.34375 4.402344-2.566407l178.402343-178.410156c17.546875-17.585937 17.546875-46.054687 0-63.640625zm-220.257812 184.90625 146.011718-146.015625 47.089844 47.089844-146.015625 146.015625zm-9.40625 18.875 37.621094 37.625-52.039063 14.417969zm227.257812-142.546875-10.605468 10.605469-47.09375-47.09375 10.609374-10.605469c9.761719-9.761719 25.589844-9.761719 35.351563 0l11.738281 11.734375c9.746094 9.773438 9.746094 25.589844 0 35.359375zm0 0"/></svg>
				</label>
		</div>
		</div>



<?php 
	$acfb_typo_display = $field['value']['font_family_enable'] === 1 ? 'block' : 'none';
?>

<div class="acfb_typography_main acfb_cs_field_main" style="display: <?php echo $acfb_typo_display; ?>">

			
		<div class="acf-field acf-field-select">
        	<div class="acf-label">
        		<label>Family</label>
        	</div>
        	<div class="acf-input">


        		<select name="<?php echo $field['name'] . 'font_family' ?>">
    		    	<?php 

    		    		foreach ($this->font_family as $key => $font) {

    		    			$selected_value = selected( $field['value']['font_family'], $font );

							echo "<option $selected_value value='$key'>$font</option>";		

    		    		}

    		    	?>
        		</select>
        	</div>
        </div>


        <div class="acf-field acf-field-range">
        	<div class="acf-label">
        		<label>Size</label>
        	</div>
        	<div class="acf-input">
        		<div class="acf-range-wrap">
	        		<input type="range" id="font_size_range" name="<?php echo $field['name'] . 'font_size' ?>" min="0" max="100" step="1">
    	    		<input 
						type="number" 
						id="font_size_num"
						name="<?php echo $field['name'] . 'font_size' ?>"
						value="<?php echo $field['value']['font_size'] ?>" 
						step="1" style="width: 3.9em;"
					>
					<div class="acf-append">
						<?php //echo $field['value']['font_size'] ?>
							px
					</div>
				</div>
        	</div>
        </div>


		<div class="acf-field acf-field-select">
        	<div class="acf-label">
        		<label>Weight</label>
        	</div>
        	<div class="acf-input">
        		<select name="<?php echo $field['name'] . 'font_weight' ?>">
					<?php 

						foreach ( $this->font_weight as $weight => $val ) {

							$selected_value = selected( $field['value']['font_weight'], $val );

							echo '<option '. $selected_value .' value="' . $weight . '">'. $val .'</option>';
						}
					?>

        		</select>
        	</div>
        </div>

		<div class="acf-field acf-field-select">
        	<div class="acf-label">
        		<label>Transform</label>
        	</div>
        	<div class="acf-input">
        		<select name="<?php echo $field['name'] . 'font_transform' ?>">

					<?php  
					
						foreach ( $this->font_transform as $transform => $val ) {

							$selected_value = selected( $field['value']['font_transform'], $transform );

							echo '<option '. $selected_value .' value="' . $transform . '">'. $val .'</option>';
						}

					?>
        		</select>
        	</div>
        </div>
		<div class="acf-field acf-field-select">
        	<div class="acf-label">
        		<label>Style</label>
        	</div>
        	<div class="acf-input">
        		<select name="<?php echo $field['name'] . 'font_style' ?>">
					<?php 

						foreach ( $this->font_style as $font_style => $val ) {

							$selected_value = selected( $field['value']['font_style'], $font_style );

							echo '<option '. $selected_value .' value="' . $font_style . '">'. $val .'</option>';
						}
						
					?>
        		</select>
        	</div>
        </div>

		
        <div class="acf-field acf-field-select">
        	<div class="acf-label">
        		<label>Decoration</label>
        	</div>
        	<div class="acf-input">
        		<select name="<?php echo $field['name'] . 'font_decoration' ?>">
					<?php 
					
						foreach ( $this->font_decoration as $font_decoration => $val ) {

							$selected_value = selected( $field['value']['font_decoration'], $font_decoration );

							echo '<option '. $selected_value .' value="' . $font_decoration . '">'. $val .'</option>';
						}	

					?>
        		</select>
        	</div>
        </div>
        <div class="acf-field acf-field-range">
        	<div class="acf-label">
        		<label>Line Height</label>
        	</div>
        	<div class="acf-input">
        		<div class="acf-range-wrap">
        			<input 
						type="range" 
						id="" 
						name="<?php echo $field['name'] . 'font_line_height' ?>" 
						value="<?php echo $field['value']['font_line_height'] ?>" 
						min="0.1" 
						max="10" 
						step="0.1"
					>
        			<input 
						type="number" 
						id="" 
						name="<?php echo $field['name'] . 'font_line_height' ?>" 
						value="<?php echo $field['value']['font_line_height'] ?>" 
						step="1" 
						style="width: 3.9em;"
					>
					<div class="acf-append">px</div>
				</div>
        	</div>
        </div>
        
 		<div class="acf-field acf-field-range">
        	<div class="acf-label">
        		<label>Letter Spacing</label>
        	</div>
        	<div class="acf-input">
        		<div class="acf-range-wrap">
        			<input 
        			type="range" id="" 
        			name="<?php echo $field['name'] . 'font_letter_spacing'?>" 
        			value="<?php echo $field['value']['font_letter_spacing'] ?>" 
        			min="-5" max="10" step="0.1">
        			<input 
        			type="number" 
        			id="" 
        			name="<?php echo $field['name'] . 'font_letter_spacing' ?>" 
        			value="<?php echo $field['value']['font_letter_spacing'] ?>" 
        			step="1" 
        			style="width: 3.9em;">
					<div class="acf-append">px</div>
				</div>
        	</div>
        </div>


        </div>


        </div>


		<?php
	}
	

/*
		function updateTextInput() {
		?>
		<script>
			var slider = document.getElementById("font_size_range");
			var output = document.getElementById("font_size_num");
			output.innerHTML = slider.value;

			slider.oninput = function() {
			  output.innerHTML = this.value;
			}
		</script>
        <?php
        }
		
*/



	/*
	*  input_admin_enqueue_scripts()
	*
	*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
	*  Use this action to add CSS + JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_enqueue_scripts)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	
	/*
	function input_admin_enqueue_scripts() {
		
		// vars
		$url = $this->settings['url'];
		$version = $this->settings['version'];
		
		
		// register & include JS
		wp_register_script('acfb-typography', "{$url}assets/js/input.js", array('acf-input'), $version);
		wp_enqueue_script('acfb-typography');
		
		
		// register & include CSS
		wp_register_style('acfb-typography', "{$url}assets/css/input.css", array('acf-input'), $version);
		wp_enqueue_style('acfb-typography');
		
	}
	
	*/
	
	
	/*
	*  input_admin_head()
	*
	*  This action is called in the admin_head action on the edit screen where your field is created.
	*  Use this action to add CSS and JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_head)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
		
	function input_admin_head() {
	
		
		
	}
	
	*/
	
	
	/*
   	*  input_form_data()
   	*
   	*  This function is called once on the 'input' page between the head and footer
   	*  There are 2 situations where ACF did not load during the 'acf/input_admin_enqueue_scripts' and 
   	*  'acf/input_admin_head' actions because ACF did not know it was going to be used. These situations are
   	*  seen on comments / user edit forms on the front end. This function will always be called, and includes
   	*  $args that related to the current screen such as $args['post_id']
   	*
   	*  @type	function
   	*  @date	6/03/2014
   	*  @since	5.0.0
   	*
   	*  @param	$args (array)
   	*  @return	n/a
   	*/
   	
   	/*
   	
   	function input_form_data( $args ) {
	   	
		
	
   	}
   	
   	*/
	
	
	/*
	*  input_admin_footer()
	*
	*  This action is called in the admin_footer action on the edit screen where your field is created.
	*  Use this action to add CSS and JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_footer)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
		
	function input_admin_footer() {
	
		
		
	}
	
	*/
	
	
	/*
	*  field_group_admin_enqueue_scripts()
	*
	*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is edited.
	*  Use this action to add CSS + JavaScript to assist your render_field_options() action.
	*
	*  @type	action (admin_enqueue_scripts)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
	
	function field_group_admin_enqueue_scripts() {
		
	}
	
	*/

	
	/*
	*  field_group_admin_head()
	*
	*  This action is called in the admin_head action on the edit screen where your field is edited.
	*  Use this action to add CSS and JavaScript to assist your render_field_options() action.
	*
	*  @type	action (admin_head)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
	
	function field_group_admin_head() {
	
	}
	
	*/


	/*
	*  load_value()
	*
	*  This filter is applied to the $value after it is loaded from the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value found in the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*  @return	$value
	*/
	
	
	
	function load_value( $value, $post_id, $field ) {
		
		return $value;
		
	}
	
	
	
	
	/*
	*  update_value()
	*
	*  This filter is applied to the $value before it is saved in the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value found in the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*  @return	$value
	*/
	
	
	
	function update_value( $value, $post_id, $field ) {
		
		return $value;
		
	}
	
	
	
	
	/*
	*  format_value()
	*
	*  This filter is appied to the $value after it is loaded from the db and before it is returned to the template
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value which was loaded from the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*
	*  @return	$value (mixed) the modified value
	*/
		
	
	
	function format_value( $value, $post_id, $field ) {
		
		// bail early if no value
		if( empty($value) ) {
		
			return $value;
			
		}
		
		
		// apply setting
		// if( $field['font_size'] > 12 ) { 
			
			// format the value
			// $value = 'something';
		
		// }
		
		
		// return
		return $value;
	}
	
	
	
	
	/*
	*  validate_value()
	*
	*  This filter is used to perform validation on the value prior to saving.
	*  All values are validated regardless of the field's required setting. This allows you to validate and return
	*  messages to the user if the value is not correct
	*
	*  @type	filter
	*  @date	11/02/2014
	*  @since	5.0.0
	*
	*  @param	$valid (boolean) validation status based on the value and the field's required setting
	*  @param	$value (mixed) the $_POST value
	*  @param	$field (array) the field array holding all the field options
	*  @param	$input (string) the corresponding input name for $_POST value
	*  @return	$valid
	*/
	
	
	
	// function validate_value( $valid, $value, $field, $input ){
		
	// 	// Basic usage
		
	// if( $value < $field['custom_minimum_setting'] )
	// 	{
	// 		$valid = false;
	// 	}
		
		
	// 	// Advanced usage
	// 	if( $value < $field['custom_minimum_setting'] )
	// 	{
	// 		$valid = __('The value is too little!','acfb-typography');
	// 	}
		
		
	// 	// return
	// 	return $valid;
		
	// }
	
	
	
	/*
	*  delete_value()
	*
	*  This action is fired after a value has been deleted from the db.
	*  Please note that saving a blank value is treated as an update, not a delete
	*
	*  @type	action
	*  @date	6/03/2014
	*  @since	5.0.0
	*
	*  @param	$post_id (mixed) the $post_id from which the value was deleted
	*  @param	$key (string) the $meta_key which the value was deleted
	*  @return	n/a
	*/
	
	/*
	
	function delete_value( $post_id, $key ) {
		
		
		
	}
	
	*/
	
	
	/*
	*  load_field()
	*
	*  This filter is applied to the $field after it is loaded from the database
	*
	*  @type	filter
	*  @date	23/01/2013
	*  @since	3.6.0	
	*
	*  @param	$field (array) the field array holding all the field options
	*  @return	$field
	*/
	
	
	
	function load_field( $field ) {
		
		return $field;
		
	}	
	
	
	
	
	/*
	*  update_field()
	*
	*  This filter is applied to the $field before it is saved to the database
	*
	*  @type	filter
	*  @date	23/01/2013
	*  @since	3.6.0
	*
	*  @param	$field (array) the field array holding all the field options
	*  @return	$field
	*/
	
	
	
	function update_field( $field ) {
			
		return $field;
		
	}	
	
	
	
	
	/*
	*  delete_field()
	*
	*  This action is fired after a field is deleted from the database
	*
	*  @type	action
	*  @date	11/02/2014
	*  @since	5.0.0
	*
	*  @param	$field (array) the field array holding all the field options
	*  @return	n/a
	*/
	
	/*
	
	function delete_field( $field ) {
		
		
		
	}	
	
	*/
	
	
}


// initialize
new acfb_acf_field_typography( $this->settings );


// class_exists check
endif;

?>