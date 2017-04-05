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

		add_action('init', array($this, 'add_fa_script_link'));

		add_action( 'init', array( $this, 'remove_homepage_templates' ) );

		add_action('storefront_header', array($this, 'site_header_logo'), 43);

		add_action('storefront_header', array($this, 'rex_header_customer_info'), 60);

		// add_action('storefront_header', array($this, 'site_header_title'), 20);
	}

	public function add_fa_script_link() {
		?>
		<script src="https://use.fontawesome.com/ca0eb767e6.js"></script>
		<?php
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
	 * Display logo
	 *
	 * @return void
	 */
	 public function site_header_logo() {
		?>
			<div id="headerLogoContainer" class="img-container">
				<a href="http://<?php echo $GLOBALS['my_www']?>rexblankets.<?php echo  $GLOBALS['my_domain_ending']?>" >
					<img src="http://<?php echo $GLOBALS['my_www'] ?>rexblankets.<?php echo $GLOBALS['my_domain_ending'] ?>/wp-content/uploads/2017/04/rexLogo_roughCut.png"  />
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
			<ul id="site-header-cart" class="site-header-cart menu">
				<li class="<?php echo esc_attr( $class ); ?>">
					<a href="<?php echo get_page_link(33); ?>">
						<icon class="fa fa-shopping-cart" style="font-size:20px;"></icon>
						&nbsp; &nbsp;
						<?php echo wp_kses_data(WC()->cart->get_cart_contents_count()) ?> items
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
