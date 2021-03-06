<?php


class aseFunctions{

	public function __construct(){

		// LOCAL ONLY
		//define('ASE_DEV', true);

		// Set some constants
		define('ASE_VERSION', '1.7');
		define('ASE_DIR', get_template_directory());
		define('ASE_URL', get_template_directory_uri());

		// load includes
		require_once(ASE_DIR.'/inc/usermeta.php');
		require_once(ASE_DIR.'/inc/options.php');
		require_once(ASE_DIR.'/inc/scripts.php');
		require_once(ASE_DIR.'/inc/misc_functions.php');
		require_once(ASE_DIR.'/inc/do-ssl.php');

		// theme setup
		add_action('after_setup_theme', 	array($this,'setup'));
		add_action('wp_head', 				array($this,'fb_init'));
		add_action('wp_footer', 			array($this,'aesop_timeline_loader'),21);
		add_filter('body_class', 			array($this,'body_class'));
		add_filter('widget_text', 'do_shortcode');
		add_filter('edd_download_supports', array($this,'modify_edd_product_supports'));
		add_action('aesop_inside_body_top', array($this,'aesop_inside_body_top'));

		add_action('pre_get_posts', 		array($this, 'exclude_donation'));

		add_action( 'p2p_init', array($this,'connection_types') );

	}

	function exclude_donation($query) {

		if ( ! is_admin() && $query->is_main_query() ) {
		    if ( is_post_type_archive( 'download' ) ) {
				// donation and library card products

		    	$ids = get_theme_mod('ase_excluded_items');
				$idclean = array_map('intval', explode(',', $ids));
		      	$query->set('post__not_in', $idclean );
		    }
		}
	}

	function connection_types(){
	    p2p_register_connection_type( array(
	        'name' => 'posts_to_posts',
	        'from' => 'post',
	        'to' => 'post'
	    ) );
	}

	public function setup() {


		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );

		// Switch default core markup for search form, comment form, and comments
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list',
		) );

		add_post_type_support( 'download', 'subtitles' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary'   => __( 'Top primary menu', 'ase' )
		) );

		register_nav_menus( array(
			'footer'   => __( 'footer menu', 'ase' )
		) );
		//edd
		define('EDD_SLUG', 'library');

		add_image_size( 'ase-store-img',  600, 300, true ); // main product image
		add_image_size( 'ase-product-img',  360, 220, true ); // main product image
		add_image_size('ase-showcase-img', 300, 200, true);

		//sidebar
		register_sidebars(1, array(
			'name' => 'Library Sidebar',
			'id' => 'library_sb',
	      	'before_title' => '<h3 class="widget_title">',
	      	'after_title' => '</h3>',
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>'
	    ));

		register_sidebars(1, array(
			'name' => 'Single Product Sidebar',
			'id' => 'single_product_sb',
	      	'before_title' => '<h3 class="widget_title">',
	      	'after_title' => '</h3>',
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>'
	    ));

		register_sidebars(1, array(
			'name' => 'BBPress Sidebar',
			'id' => 'bbpress',
	      	'before_title' => '<h3 class="widget_title">',
	      	'after_title' => '</h3>',
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>'
	    ));


		register_sidebars(1, array(
			'name' => 'Footer Sidebar',
			'id' => 'footer',
	      	'before_title' => '<h3 class="widget_title">',
	      	'after_title' => '</h3>',
			'before_widget' => '<div class="col-md-4 footer-widget">',
			'after_widget' => '</div>'
	    ));
	}

	function modify_edd_product_supports($supports) {
		$supports[] = 'comments';
		return $supports;	
	}

	function aesop_timeline_loader(){

		if(is_page_template('doc.php') || is_page_template('dev-docs.php') || is_page_template('library-docs.php')):
			?>
				<!-- Aesop Timeline -->
				<script>
				jQuery(document).ready(function(){

					adminBar = jQuery('#wpadminbar').outerHeight();
					header   = jQuery('.ase-site-header').height();

					jQuery('.aesop-entry-content').scrollNav({
					    sections: '.aesop-timeline-stop',
					    arrowKeys: true,
					    insertTarget: '.aesop-timeline',
					    insertLocation: 'appendTo',
					    showTopLink: false,
					    showHeadline: false,
					    scrollOffset: 140
					});
					
					jQuery('.aesop-timeline-stop').each(function(){
						var label = jQuery(this).attr('data-title');
						jQuery(this).text(label);
					});

				});

				</script>

			<?php 
		endif;
	}
	function body_class($classes){

		$message = get_theme_mod('ase_hey_bar');

		$classes[] = 'ase';

		if ( $message && !is_page('checkout') ) {
			$classes[] = 'ase-hey-message';
		}
		return $classes;
	}

	function fb_init(){

		if( is_single() && 'download' !== get_post_type()){
			$img 		= wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID() ), 'large' );
			?>
			<script>

				function fbAsyncInit() {
					FB.init({
					    appId: "492973480802758",
					    status: true,
					    cookie: true,
					    xfbml: true
					});

				  	jQuery(".ase-fb-share").click(function(e){
				  		e.preventDefault();

					    FB.ui({
					      	name: '<?php echo esc_attr(get_the_title());?>',
					      	link: '<?php the_permalink();?>',
					      	caption: '',
					      	description: '',
					      	method: "feed",
					      	picture: '<?php echo $img[0];?>'
					    });

				  	});
				}

				jQuery(document).ready(function(){
					jQuery(".ase-twitter-share").attr('href', "https://twitter.com/intent/tweet?text=<?php echo the_title(),' - ',the_permalink();?>  via @aesopinteractiv ");
				});

			</script>
		<?php }
	}

	function aesop_inside_body_top(){

		$message = get_theme_mod('ase_hey_bar');

		if ( $message && !is_page('checkout') ) { ?>
			<div class="ase-hey-bar">
				<div class="ase-hey-bar-inner">
					<?php echo $message;?>
				</div>
			</div>
		<?php }
	}
}


new aseFunctions;