<?php
/**
 * rooxy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rooxy
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rooxy_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on rooxy, use a find and replace
		* to change 'rooxy' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'rooxy', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'rooxy' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'rooxy_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'rooxy_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rooxy_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rooxy_content_width', 640 );
}
add_action( 'after_setup_theme', 'rooxy_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rooxy_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'rooxy' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'rooxy' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar( array(
		'name'          => 'WooCommerce Sidebar',
		'id'            => 'woocommerce-sidebar',
		'description'   => 'Widgets in this area will be displayed in the WooCommerce sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'rooxy_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function rooxy_scripts() {
	wp_enqueue_style( 'rooxy-style', get_template_directory_uri(). '/assets/css/main.css', array(), _S_VERSION );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri(). '/assets/js/bootstrap.bundle.min.js', array('jquery'), _S_VERSION );

	wp_enqueue_script( 'rooxy/tabs', get_template_directory_uri(). '/assets/js/category-tabs.js', array('jquery'), _S_VERSION );
	wp_enqueue_script( 'rooxy/pos', get_template_directory_uri(). '/assets/js/point_of_sale.js', array('jquery'), _S_VERSION );
	wp_enqueue_script( 'rooxy/update-cart', get_template_directory_uri(). '/assets/js/update-cart.js', array('jquery'), _S_VERSION );
	wp_enqueue_script( 'rooxy/newsletter-modal', get_template_directory_uri(). '/assets/js/newsletter-modal.js', array('jquery'), _S_VERSION );
	wp_enqueue_script( 'rooxy/currency-modal', get_template_directory_uri(). '/assets/js/currency-modal.js', array('jquery'), _S_VERSION );

	//wp_style_add_data( 'rooxy-style', 'rtl', 'replace' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// wp_enqueue_script( '', get_template_directory_uri(). '/assets/js/bootstrap.min.js', array(), _S_VERSION );
}
add_action( 'wp_enqueue_scripts', 'rooxy_scripts' );

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
require_once get_template_directory() . '/inc/acf.php';
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function count_products_in_category($category_slug){
	// Get the product category
	$product_category = $category_slug;

	// Get the product category term object
	$term = get_term_by( 'slug', $product_category, 'product_cat' );

	// Get the product category term ID
	$term_id = $term->term_id;

	// Set up the product category query
	$args = array(
		'post_type' => 'product',
		'tax_query' => array(
			array(
				'taxonomy' => 'product_cat',
				'field' => 'term_id',
				'terms' => $term_id
			)
		)
	);
	$query = new WP_Query( $args );

	// Count the number of products in the category
	$product_count = $query->post_count;

	// Output the number of products in the category
	return $product_count;
}

function count_products_on_sale() {
	// Initialize the product count to 0
	$product_count = 0;
  
	// Get all products on sale
	$sale_products = wc_get_product_ids_on_sale();
  
	// Loop through the products on sale
	foreach ( $sale_products as $sale_product ) {
	  // Get the product object
	  $product = wc_get_product( $sale_product );
  
	  // Check if the product is a variation
	  if ( $product->is_type( 'variation' ) ) {
		// Get the parent product object
		$parent_product = wc_get_product( $product->get_parent_id() );
  
	//Check if the parent product is on sale
		if ( $parent_product->is_on_sale() ) {
		  // Increment the product count
		  $product_count++;
		}
	  } else {
		// Increment the product count
		$product_count++;
	  }
	}
  
	// Return the product count
	return $product_count;
}

/**
 * Check if there are products on sale in a WooCommerce category.
 *
 * @param string $category_slug The slug of the category to check.
 *
 * @return bool
 */
function category_has_sale_products( $category_slug ) {
    // Define query arguments
    $args = array(
        'post_type' => 'product',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $category_slug,
            ),
        ),
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => '_sale_price',
                'value' => 0,
                'compare' => '>',
                'type' => 'numeric'
            ),
            array(
                'key' => '_min_variation_sale_price',
                'value' => 0,
                'compare' => '>',
                'type' => 'numeric'
            )
        )
    );

    // Execute the query
    $query = new WC_Product_Query( $args );
    $products = $query->get_products();

    // check if there are any products on sale
    if (count($products) > 0) {
        return true;
    } else {
        return false;
    }
}

function register_my_menu() {
	register_nav_menu('footer-menu',__( 'Footer Menu' ));
  }
add_action( 'init', 'register_my_menu' );

function get_product_subcategories($product_id) {
    $subcategories = array();

    $product_terms = wp_get_post_terms($product_id, 'product_cat');
    if (!empty($product_terms)) {
        foreach ($product_terms as $product_term) {
            if ($product_term->parent == 0) {
                continue;
            }
            $term_link = get_term_link($product_term, 'product_cat');
            $subcategories[] = array(
                'name' => $product_term->name,
                'url' => $term_link,
            );
        }
    }

    return $subcategories;
	
}

function print_product_categories($product_id) {
    $terms = get_the_terms($product_id, 'product_cat');

    if ($terms && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            if ($term->parent == 0) {
                echo '<a href="' . get_term_link($term) . '" class="pt-1 pb-1 pe-3 ps-3 rounded">' . $term->name . '</a><br>';
            }
        }
    }
}



add_action('after_setup_theme', function() {
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
});

//add_action( 'woocommerce_product_thumbnails', 'custom_product_thumbnails', 20 );
function custom_product_thumbnails() {
    global $product;

    $attachment_ids = array_merge(array($product->get_image_id()), $product->get_gallery_image_ids());

    if ( $attachment_ids ) {
        echo '<div class="custom-product-gallery">';
        
        // Display all thumbnails on the left side
        echo '<div class="custom-product-thumbs">';
        foreach ( $attachment_ids as $attachment_id ) {
			$image_link = wp_get_attachment_url( $attachment_id );
			$image_thumb = wp_get_attachment_image_url( $attachment_id, 'large' );
			$image_title = get_post_field( 'post_title', $attachment_id );
			$is_main_image = ($attachment_id == $product->get_image_id()) ? ' is-main-image' : '';
			
			echo '<a href="#" class="custom-product-thumb'.$is_main_image.'" data-image="'.$image_link.'">';
			echo '<img src="'.$image_thumb.'" alt="'.$image_title.'">';
			echo '</a>';
		}
		
        echo '</div>';
        
        // Display the main image on the right side
        echo '<div class="custom-product-main-image">';
        echo '<img src="'.wp_get_attachment_image_url( $product->get_image_id(), 'large' ).'" alt="'.$product->get_title().'">';
        echo '</div>';

        echo '</div>';
    }
}

add_action( 'woocommerce_product_thumbnails', 'custom_product_thumbnails_slider', 20 );
function custom_product_thumbnails_slider() {
    global $product;

    $attachment_ids = array_merge(array($product->get_image_id()), $product->get_gallery_image_ids());
	$number_of_images = count($attachment_ids);

    if ( $attachment_ids ) {
        echo '<div class="custom-product-gallery">';
        
        // Display all thumbnails in the carousel
        echo '<div id="custom-product-carousel" class="carousel slide" data-ride="carousel">';
        echo '<div class="carousel-inner d-flex justify-content-lg-around">';
        $i = 0;
        foreach ( $attachment_ids as $attachment_id ) {
            $image_link = wp_get_attachment_url( $attachment_id );
            $image_thumb = wp_get_attachment_image_url( $attachment_id, 'large' );
            $image_title = get_post_field( 'post_title', $attachment_id );
            $is_main_image = ($attachment_id == $product->get_image_id()) ? ' active' : '';
			

            if ($i % 3 == 0) {
                echo '<div class="carousel-item' . $is_main_image . '">';
                echo '<div class="row d-lg-flex flex-lg-column d-flex flex-row">';
            }

            echo '<div class="col-4 d-flex d-lg-block justify-content-center">';
			if($i == 0){
				echo '<a href="#" class="custom-product-thumb is-main-image d-flex d-lg-block justify-content-center" data-image="'.$image_link.'">';
				echo '<img src="'.$image_thumb.'" alt="'.$image_title.'">';
            	echo '</a>';
			}
			else{
				echo '<a href="#" class="custom-product-thumb d-flex d-lg-block justify-content-center" data-image="'.$image_link.'">';
				echo '<img src="'.$image_thumb.'" alt="'.$image_title.'">';
				echo '</a>';
			}

            echo '</div>';

            if (($i + 1) % 3 == 0 || $i + 1 == count($attachment_ids)) {
                echo '</div>';
                echo '</div>';
            }

            $i++;
        }
        echo '</div>';
		if($i>=3){

		
        echo '<button class="carousel-control-prev" type="button" data-bs-target="#custom-product-carousel" data-bs-slide="prev">';
        echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
        echo '</button>';
        echo '<button class="carousel-control-next" type="button" data-bs-target="#custom-product-carousel" data-bs-slide="next">';
        echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
        echo '</button>';
	}
        echo '</div>';
        
        // Display the main image
        echo '<div class="custom-product-main-image">';
        echo '<img src="'.wp_get_attachment_image_url( $product->get_image_id(), 'large' ).'" alt="'.$product->get_title().'">';
        echo '</div>';

        echo '</div>';
    }
}



add_action( 'wp_footer', 'custom_product_thumbnails_script' );
function custom_product_thumbnails_script() {
    ?>
    <script>
        jQuery(document).ready(function($) {
			// Handle click event on thumbnail
			$('.custom-product-thumb').on('click', function(e) {
				e.preventDefault();
				var imageUrl = $(this).data('image');
				$('.custom-product-main-image img').attr('src', imageUrl);
				$('.custom-product-thumb').removeClass('is-main-image');
				$(this).addClass('is-main-image');
			});
		});
    </script>
    <?php
}

remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );

// Display cart item count in header
add_filter( 'woocommerce_add_to_cart_fragments', 'header_cart_count_fragment' );

function header_cart_count_fragment( $fragments ) {
    ob_start();
    ?>
    <span class="cart-item-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
    <?php
    $fragments['span.cart-item-count'] = ob_get_clean();
    return $fragments;
}

add_filter( 'woocommerce_shortcode_products_query', 'custom_sale_products_query', 10, 3 );

function custom_sale_products_query( $query_args, $atts, $loop_name ) {
    if ( $loop_name == 'sale_products' ) {
        $query_args['orderby'] = 'menu_order title';
        $query_args['order'] = 'ASC';
    }

    return $query_args;
}

add_action( 'woocommerce_shortcode_before_sale_products_loop', 'custom_sale_products_before_loop', 10 );

function custom_sale_products_before_loop() {
    if ( function_exists( 'woocommerce_catalog_ordering' ) ) {
        woocommerce_catalog_ordering();
    }
}
/**
 * Changes the redirect URL for the Return To Shop button in the cart.
 *
 * @return string
 */
function wc_empty_cart_redirect_url() {
	return '/';
}
add_filter( 'woocommerce_return_to_shop_redirect', 'wc_empty_cart_redirect_url' );

// In your functions.php
// Action function
function form_submit_action() {
	// You can now use $_GET/$_POST variables depending on what method you used in your form
	// In this case we are using method post
	$name = sanitize_text_field($_POST['nameInput']);
	$email = sanitize_email($_POST['emailInput']);
	$subject = sanitize_text_field($_POST['betreffInput']);
	$message = sanitize_text_field($_POST['nachrichtInput']);
	if( empty($name) && empty($email) && empty($message) && empty($subject)){
	  $name = sanitize_text_field($_POST['nameqay']);
	  $email = sanitize_email($_POST['emailwsx']);
	  $betreff = sanitize_text_field($_POST['betreffedc']);
	  $message = sanitize_text_field($_POST['nachrichtrfv']);
	  $datenschutz = sanitize_text_field($_POST['datenschutztgb']);
	  
	  // Then do the processing here like create new post/user, update new post/user , etc.
	  // But on this example im gonna show you how send an email, create your own custom html body format.
	  
	  // Send to admin
	  $to = 'info@karoxa.ch';//get_bloginfo('admin_email'); // or 'sendee@email.com' to specify email
	  // Email subject
	  $subject = 'Neue Kontaktanfrage | karoxa.com';
	  $subject_customer = 'Ihre Kontaktanfrage ist bei uns eingegangen | karoxa.com';
	  // Email body/content (tricky part)
	  /* Instead of:
		  $body = '<div>
					  <p>'. $first_name .'</p>
				  </div>'; 
	  */
	  // We can create a custom function with the post fields as your attributes
	  $body = my_email_body_function($name,$email, $betreff,$message,$datenschutz);
	  $body_customer = my_email_body_function_customer($name,$email, $betreff,$message,$datenschutz);
	  $headers = array('Content-Type: text/html; charset=UTF-8');
	  wp_mail( $to, $subject, $body, $headers );
	  wp_mail( $email, $subject_customer, $body_customer, $headers);
	  
	  // Then redirect to desired page
	  $redirect = add_query_arg ('kontaktformular', 'gesendet', '/kontakt');
	  wp_redirect($redirect);
	  exit;
	  //wp_redirect(home_url('/kontakt'));
	}
	else{
	  exit;
	}
  }
  // Necessary action hooks
  // Use our specific action form_submit_action to process the data related to our request
  add_action( 'admin_post_nopriv_form_submit_action', 'form_submit_action' );
  add_action( 'admin_post_form_submit_action', 'form_submit_action' );
  
  // Email body function declaration
  function my_email_body_function($name,$email,$betreff,$message,$datenschutz) {
	ob_start(); // We have to turn on output buffering. VERY IMPORTANT! or else wp_mail() wont work 
	// Then setup your email body using the postfields from the attritbutes passed on. ?>
	<table style="width:100%; border-collapse: collapse;">
	<tr>
	  <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Name:</th>
	  <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;"><?php echo $name; ?></th>
	</tr>
	<tr>
	  <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Email:</th>
	  <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;"><?php echo $email; ?></th>
	</tr>
	<tr>
	  <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Betreff:</th>
	  <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;"><?php echo $betreff; ?></th>
	</tr>
	<tr>
	  <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Nachricht oder Kommentar:</th>
	  <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;"><?php echo $message; ?></th>
	</tr>
	  </table>
	
	<?php 
	return ob_get_contents();
	ob_get_clean();
  }
  
  function my_email_body_function_customer($name,$email,$betreff,$message,$datenschutz) {
	  ob_start(); // We have to turn on output buffering. VERY IMPORTANT! or else wp_mail() wont work 
	  // Then setup your email body using the postfields from the attritbutes passed on. ?>
	  Hallo, <?= $name;?><br><br>
	  vielen Dank für Ihre Kontaktanfrage.<br><br>
	  Wir bearbeiten diese umgehend und melden uns anschließend bei Ihnen zurück.
	  
	  <?php 
	  return ob_get_contents();
	  ob_get_clean();
	}
