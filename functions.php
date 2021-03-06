<?php
/**
 * minera functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package minera
 */

if ( ! function_exists( 'minera_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function minera_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on minera, use a find and replace
		 * to change 'minera' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'minera', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'woocommerce' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'minera' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'minera_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'minera_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function minera_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'minera_content_width', 640 );
}
add_action( 'after_setup_theme', 'minera_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function minera_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'minera' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'minera' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'minera_widgets_init' );

/***
* header-shop-car
***/
if ( ! function_exists( 'minera_shop_header' ) ) {
  function minera_shop_header() {?>
	<div class="header-action hd1-action">
		<div class="search">
			<button class='btn btn-search' id="btn-search-product"></button>
		</div>
		<div class="user-btn">
		<a href="<?php echo esc_html(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" class="login-btn"></a>
		</div>
		<div class="shopping-cart" data-label="Cart">
			<a class="shopping-cart-icon" href="<?php echo wc_get_cart_url() ?>" title="View your shopping cart"><span class="counter-cart"><?php echo WC()->cart->get_cart_contents_count() ?></span></a>
		</div>
	</div>
  <?php }
}


/**
* Logo 
*/
	if (!function_exists('minera_logo')) {
		function minera_logo() {
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			if($custom_logo_id){
				$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				$image_src=$image[0];
			}
			else{
				$image_src=get_template_directory_uri().'/image/logo.png';
			}
			?>
			<div class="logo">
				<a href="<?php echo home_url('/'); ?>"><img src="<?php echo $image_src; ?>" alt="Logo"></a>
			</div>

		<?php }
	}
/**

/*
* add share 
*/
	function minera_share_with() { ?>
		<div class="share-product-with">
			<span><?php echo esc_html( 'Share' ) ?></span>
			<ul class="share-prduct">
				<li class="facebook">
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				</li>
				<li class="twitter">
					<a href="https://twitter.com/home?status=<?php echo get_permalink(); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
				</li>
				<li class="pinterest">
					<a href="https://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
				</li>
			</ul>
		</div>
	<?php }



/**
* page curmber 
*/
if (! function_exists('minera_home')) {
	function minera_home() {
		$home = home_url('/');
		if (is_shop()) { ?>
			<h1 class="title-header">Product Listing</h1>
			<ul class="crumbs">
				<li class="breadcrumb-item"><a class="breadcrumb-link" href=" <?php echo esc_url( $home ); ?>">Home</a></li>
				<li class="breadcrumb-item"><a class="breadcrumb-link" href="#"><?php echo esc_html( 'Shop'); ?></a></li>
				<li class="breadcrumb-item"><span class="breadcrumb-label">Product Listing - Grid</span></li>
			</ul>
		<?php }
		if (is_single()) { ?>
			<h1 class="title-header">Product Single Fullwidth</h1>
			<ul class="crumbs">
				<li class="breadcrumb-item"><a class="breadcrumb-link" href=" <?php echo esc_url( $home ); ?>">Home</a></li>
				<li class="breadcrumb-item"><a class="breadcrumb-link" href="#"><?php echo esc_html( 'Shop'); ?></a></li>
				<li class="breadcrumb-item"><span class="breadcrumb-label">Product Listing - Grid</span></li>
			</ul>

	  	<?php }
		if (is_cart()) { ?>
			<h1 class="title-header left">Shopping Cart</h1>
			<ul class="crumbs left">
				<li class="breadcrumb-item"><a class="breadcrumb-link" href=" <?php echo esc_url( $home ); ?>">Home</a></li>
				<li class="breadcrumb-item"><a class="breadcrumb-link" href="#"><?php echo esc_html( 'Shop'); ?></a></li>
				<li class="breadcrumb-item"><span class="breadcrumb-label">Cart</span></li>
			</ul>
			<div class="bread-spacing-bot"></div>
		<?php }
		if (is_checkout()) { ?>
			<h1 class="title-header left">Shopping Cart</h1>
			<ul class="crumbs left">
				<li class="breadcrumb-item"><a class="breadcrumb-link" href=" <?php echo esc_url( $home ); ?>">Home</a></li>
				<li class="breadcrumb-item"><a class="breadcrumb-link" href="#"><?php echo esc_html( 'Shop'); ?></a></li>
				<li class="breadcrumb-item"><span class="breadcrumb-label">Cart</span></li>
			</ul>
			<div class="bread-spacing-bot"></div>
		<?php }

		if (is_page_template()) { ?>
			<h1 class="title-header left">Login/Register</h1>
			<ul class="crumbs left">
				<li class="breadcrumb-item"><a class="breadcrumb-link" href=" <?php echo esc_url( $home ); ?>">Home</a></li>
				<li class="breadcrumb-item"><a class="breadcrumb-link" href="#"><?php echo esc_html( 'Pages'); ?></a></li>
				<li class="breadcrumb-item"><span class="breadcrumb-label">Login/Register</span></li>
			</ul>
			<div class="bread-spacing-bot"></div>
		<?php } 
	}
}
if (! function_exists('minera_product')) {
	function minera_product() { 
		if (is_shop() ) {
			?>
				<div class="bread-spacing-bot"></div>
			<?php }

		if (is_single() ) {
			?>
				<div class="bread-spacing-bot"></div>
			<?php }

	}
}

/*
* add description product
*/
	function minera_description_product(){
		global $product;
		if ( $product->get_short_description() && ! is_product() ) {
		?>
			<div class="description-product">
				<?php echo esc_html( $product->get_short_description() ); ?>
			</div>
		<?php
		}
	}
	add_action( 'woocommerce_after_shop_loop_item', 'minera_description_product', 6 );

$sidebar_footer=[
	  'name'=> __('Footer-Sidebar','minera'),
	  'id' => 'footer-sidebar',
	  'class' => 'main-footer',
	  'before-title' => '<h3 class="title">',
	  'after-title' =>'</h3>',
	  ];
register_sidebar($sidebar_footer);


$sidebar_footer_2=[
	  'name'=> __('Footer-Sidebar-2','minera'),
	  'id' => 'footer-sidebar-2',
	  'class' => 'main-footer',
	  'before-title' => '<h3 class="title">',
	  'after-title' =>'</h3>',
	  ];
register_sidebar($sidebar_footer_2);



remove_action('woocommerce_template_single_title' , 'woocommerce_single_product_summary' , 5  );


add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {



	$number = get_comments_number();

	$tabs["reviews"]["title"] = sprintf( __("Reviews  <span>%s</span>", 'minera'), $number );

	return $tabs;

}

/*
 * add Read More 
*/
	function minera_readmore() {
		return 
		'<div class="read">
			<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('READ MORE', 'minera') . '</a>
		</div>';
	}
	add_filter( 'excerpt_more', 'minera_readmore' );



/**
 * Enqueue scripts and styles.
 */
function minera_scripts() {
	wp_enqueue_style( 
		'minera-style', 
		get_stylesheet_uri() 
	);

	wp_register_style(
		'bootstrap-js', 
		'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css',
		'all'
	);
	wp_enqueue_style('bootstrap-js');

	wp_register_script(
		'bootstrap', 
		'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js',
		array(
			'jquery'
		),
		null,
		true
	);
	wp_enqueue_script('bootstrap');

	wp_register_script(
		'slick', 
		get_template_directory_uri().'/js/slick.min.js',
		array('jquery'),
		null,
		true
	);
	wp_enqueue_script('slick');

	wp_register_style(
		'slick-css',
		get_template_directory_uri().'/css/slick.css',
		'all'
	);
	wp_enqueue_style('slick-css');

	wp_register_style(
		'slick-theme',
		get_template_directory_uri().'/css/slick-theme.css',
		'all'
	);
	wp_enqueue_style('slick-theme');

	wp_enqueue_style(
		'progress-css',
		get_template_directory_uri().'/css/progress.css',
		'all'
	);




	wp_enqueue_script(
		'progress',
		get_template_directory_uri().'/js/progress.js',
		array( 'jquery' ),
		null,
		true
	);

	wp_enqueue_script(
		'progress-handle',
		get_template_directory_uri().'/js/progress-handle.js',
		array( 'progress' ),
		null,
		true
	);

	wp_enqueue_script(
		'carousel',
		get_template_directory_uri(). '/js/carousel.js',
		array(),
		null,
		true
	);

	wp_enqueue_script( 
		'minera-navigation', 
		get_template_directory_uri() . '/js/navigation.js', 
		array(), 
		'20151215', 
		true 
	);

	wp_enqueue_script( 
		'minera-skip-link-focus-fix', 
		get_template_directory_uri() . '/js/skip-link-focus-fix.js', 
		array(), 
		'20151215', 
		true 
	);

	wp_enqueue_script(
		'minera', 
		get_template_directory_uri().'/js/minera.js',
		array('jquery'),
		null,
		true
	);

	wp_register_style(
		'responsive-css',
		get_template_directory_uri().'/css/responsive.css',
		'all'
	);
	wp_enqueue_style('responsive-css');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'minera_scripts' );


add_action( 'elementor/preview/enqueue_scripts', 'demo2' );
function demo2() {
	wp_enqueue_script(
		'demo',
		get_template_directory_uri().'/js/demo.js',
		array(),
		null,
		true
	);
}

add_action( 'elementor/frontend/after_register_scripts', 'demo' );
function demo() {
	wp_register_script(
		'progress',
		get_template_directory_uri().'/js/progress.js',
		array(),
		null,
		true
	);

	wp_register_script(
		'progress-handle',
		get_template_directory_uri().'/js/progress-handle.js',
		array( 'progress' ),
		null,
		true
	);

}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Implement the Elementor.
 */
require get_template_directory() . '/inc/elementor.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
* number cart
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );
function iconic_cart_count_fragments( $fragments ) {
    
    global $woocommerce;
    $total = $woocommerce->cart->cart_contents_count;

    ob_start();
    ?>
        <span class="counter-cart"><?php echo esc_html( $total ); ?></span>
    <?php

    $fragments['span.counter-cart'] = ob_get_clean();

    return $fragments;
    
}

/**
 *  Pagination
 */
if ( ! function_exists( 'theme_paging' ) ) {
    function theme_paging( $wp_query = null, $paged = null ) {

        if ( ! $wp_query ) {
            $wp_query = $GLOBALS['wp_query'];
        }

        /*Don't print empty markup if there's only one page.*/

        if ( $wp_query->max_num_pages < 2 ) return;

        if ( null == $paged ) {
            $paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
        }
        $pagenum_link = html_entity_decode( get_pagenum_link() );
        $query_args   = array();
        $url_parts    = explode( '?', $pagenum_link );

        if ( isset( $url_parts[1] ) ) {
            wp_parse_str( $url_parts[1], $query_args );
        }

        $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
        $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

        $format = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
        $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

        /*Set up paginated links.*/
        $links = paginate_links( array(
            'base'      => $pagenum_link,
            'format'    => $format,
            'total'     => $wp_query->max_num_pages,
            'current'   => $paged,
            'mid_size'  => 1,
            'add_args'  => array_map( 'urlencode', $query_args ),
            'prev_text' => sprintf( esc_html_x( '%s Prev', 'Pagination previous button', 'minera' ), '<span class="fa fa-angle-double-left"></span>' ),
            'next_text' => sprintf( esc_html_x( 'Next %s', 'Pagination next button', 'minera' ), '<span class="fa fa-angle-double-right"></span>' ),
            'type'      => 'list'
        ) );

        if ( $links ):
        ?>
            <nav class="ht-pagination">
                <span class="screen-reader-text"><?php esc_html_e( 'Posts pagination', 'minera' ); ?></span>
                <?php echo wp_kses_post( $links ); ?>
            </nav>
        <?php
        endif;
    }
}

