<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
/**
 * @see ere_template_single_property_gallery
 * @see ere_template_single_property_floor
 * @see ere_template_single_property_features
 */
add_action( 'ere_single_property_summary', 'ere_template_single_property_gallery', 10 );
add_action( 'ere_single_property_summary', 'ere_template_single_property_features', 25 );
add_action('ere_single_property_summary','ere_template_single_property_floor',30);
