<?php
/**
 * Rex Blankets engine room
 *
 * @package rex-blankets
 */

/**
 * Set the theme version number as a global variable
 */
$theme				= wp_get_theme( 'storefront-child-rex-blankets' );
$boutique_version	= $theme['Version'];

$theme				= wp_get_theme( 'storefront' );
$storefront_version	= $theme['Version'];

/**
 * Load the individual classes required by this theme
 */
require_once( 'inc/class-rex-blankets.php' );
// require_once( 'inc/class-boutique-customizer.php' );
require_once( 'inc/class-rex-blankets-template.php' );
// require_once( 'inc/class-boutique-integrations.php' );
