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
		add_action('init', array($this, 'typekit_embed_code'));

		add_action('storefront_header', array($this, 'header_wrapper'), 19);
		add_action('storefront_header', array($this, 'rex_site_branding'), 55);
		// add_action('storefront_header', array($this, 'site_header_logo'), 43);

		add_action('storefront_header', array($this, 'rex_header_customer_info'), 60);

		// add_action('storefront_header', array($this, 'header_flex_div'), 52);
		add_action('storefront_header', array($this, 'header_wrapper_close'), 69);

		add_action('storefront_before_content', array($this, 'header_spaceholder'), 5);

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
 	 * Echo the TypeKit embed code
 	 *
 	 * @return void
 	 */
	 public function typekit_embed_code() {
		 ?>
		 <script src="https://use.typekit.net/biu1tdb.js"></script>
		 <script>try{Typekit.load({ async: true });}catch(e){}</script>
		 <?php
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
					<img src="http://<?php echo $GLOBALS['my_www'] ?>rexblankets.<?php echo $GLOBALS['my_domain_ending'] ?>/wp-content/uploads/2017/06/Rex-Blankets-Logo.png" />
				</a>
			</div>
			<?php
		}

		public function header_wrapper () {
			?>
			<div id="headerWrapper">
			<?php
		}

		public function header_wrapper_close () {
			?>
			</div>
			<?php
		}

		public function header_spaceholder () {
			?>
			<div id="headerSpaceholder"></div>
			<?php
		}

		public function rex_site_branding () {
			?>
			<div class="site-branding">
				<a href="http://<?php echo $GLOBALS['my_www']?>rexblankets.<?php echo  $GLOBALS['my_domain_ending']?>" class="site-logo-link">
					<img src="http://<?php echo $GLOBALS['my_www'] ?>rexblankets.<?php echo $GLOBALS['my_domain_ending'] ?>/wp-content/uploads/2017/06/Rex-Blankets-Logo.png" class="site-logo" />
				</a>
			</div>
			<?php
		}

		/**
		 * Display Primary Navigation
		 *
		 * @since  1.0.0
		 * @return void
		 */
		function rex_primary_navigation() {
			?>
			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_html_e( 'Primary Navigation', 'storefront' ); ?>">
			<button class="menu-toggle" aria-controls="site-navigation" aria-expanded="false"><span><?php echo esc_attr( apply_filters( 'storefront_menu_toggle_text', __( 'Menu', 'storefront' ) ) ); ?></span></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location'	=> 'primary',
						'container_class'	=> 'primary-navigation',
						)
				);

				wp_nav_menu(
					array(
						'theme_location'	=> 'handheld',
						'container_class'	=> 'handheld-navigation',
						)
				);
				?>
			</nav><!-- #site-navigation -->
			<?php
		}

	/*
	 * Echo a flex div for spacing in the header
	 *
	 * @return void
	 */
		public function header_flex_div() {
			?>
			<div style="display:flex;flex-grow:1"></div>
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
			<div id="primary-nav-right-group">
				<div> <!-- cart info for canvas to read from; not visible -->
					<span id="cartCount" style="display:none"><?php echo wp_kses_data(WC()->cart->get_cart_contents_count()) ?></span>
					<img id="headerCartIcon" style="display:none; fill: red" src="<?php echo get_template_directory_uri(); ?>/../storefront-child-rex-blankets/assets/images/md_icons_shopping_cart.svg" />
				</div>
				<div class="primary-navigation">
					<ul class="menu" style="list-style: none">
						<li class="primary-nav-right-group-link menu-item">
							<a href="/">contact</a>
						</li>
					</ul>
				</div>
				<ul id="site-header-cart" class="site-header-cart menu">
					<li>
						<div>
							<a class="" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>">
								<canvas id="headerCartCanvas" width="50" height="50">Your browser does not support canvases.</canvas>
							</a>
						</div>
					</li>
				</ul>
			</div>
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
