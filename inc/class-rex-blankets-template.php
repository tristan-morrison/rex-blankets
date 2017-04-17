<?php

require_once __DIR__ . '/server_specific_variables.php';
$GLOBALS['my_www'] = $www;
$GLOBALS['my_domain_ending'] = $domain_ending;

/**
 * RexBlankets_Template Class
 *
 * @author   Tristan Lopus
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'RexBlankets_Template' ) ) {

class RexBlankets_Template {

	/**
	 * Setup class.
	 *
	 * @since 1.0
	 */
	public function __construct() {

		add_action( 'init', array( $this, 'remove_homepage_templates' ) );

		add_action('init', array($this, 'add_directory_uri'));

		add_action('storefront_header', array($this, 'site_header_logo'), 43);

		add_action('storefront_header', array($this, 'rex_header_customer_info'), 60);

		// add_action('storefront_header', array($this, 'site_header_title'), 20);
	}

	/**
	 * Remove unnecessary homepage templates
	 *
	 * @return void
	 */
	public function remove_homepage_templates() {
		remove_action( 'storefront_header', 'storefront_site_branding', 20 );
		remove_action( 'storefront_header', 'storefront_product_search', 40 );
		remove_action( 'storefront_header', 'storefront_header_cart', 60 );
	}

	/*
	 * Display site title in header
	 *
	 * @return void
	 */
	 public function site_header_title() {
		 echo '<div class="site-branding"><h1 class="beta site-title">Rex Blankets</h1><h2 class="site-description">& Stablewares</h2></div>';
	 }

	 /*
 	 * Echo the template directory URI to an ID'ed <meta /> tag to the <head>
 	 *
 	 * @return void
 	 */
	 public function add_directory_uri() {
		 $directory_uri = get_template_directory_uri();
		 echo "<meta id='directoryUri' content='$directory_uri' />";
	 }

	/*
	 * Display logo
	 *
	 * @return void
	 */
	 public function site_header_logo() {
		?>
			<div id="headerLogoContainer" class="img-container">
				<a href="http://<?php echo $GLOBALS['my_www']?>rexblankets.<?php echo  $GLOBALS['my_domain_ending']?>" >
					<img src="http://<?php echo $GLOBALS['my_www'] ?>rexblankets.<?php echo $GLOBALS['my_domain_ending'] ?>/wp-content/uploads/2017/04/rex-logo.png"  />
				</a>
			</div>
			<?php
		}

		public function rex_header_customer_info() {
			if ( storefront_is_woocommerce_activated() ) {
				if ( is_cart() ) {
					$class = 'current-menu-item';
				} else {
					$class = '';
				}
			}
			?>
			<span id="cartCount" style="display:none"><?php echo wp_kses_data(WC()->cart->get_cart_contents_count()) ?></span>
			<img id="headerCartIcon" style="display:none; fill: red" src="<?php echo get_template_directory_uri(); ?>/../storefront-child-rex-blankets/assets/images/md_icons_shopping_cart.svg" />
			<ul id="site-header-cart" class="site-header-cart menu">
				<li>
					<a class="" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>">
						<canvas id="headerCartCanvas" width="50" height="50">Your browser does not support canvases.</canvas>
					</a>
				</li>
			</ul>
			<?php
		}


	}
}

return new RexBlankets_Template();

?>

<?php
	function var_error_log( $object=null, $label=null ){
		ob_start();                    // start buffer capture
		var_dump( $object );           // dump the values
		$contents = ob_get_contents(); // put the buffer into a variable
		ob_end_clean();                // end capture
		$output = $label . ': ' . $contents;
		error_log( $output );        // log contents of the result of var_dump( $object )
	}
 ?>
