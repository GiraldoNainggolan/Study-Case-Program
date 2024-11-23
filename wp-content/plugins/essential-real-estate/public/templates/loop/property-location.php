<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
/**
 * @var $property_address
 * @var $google_map_address_url
 */
?>
<div class="property-location" title="<?php echo esc_attr( $property_address ) ?>">
	<i class="fa fa-map-marker"></i>
	<a target="_blank" href="<?php echo esc_url( $google_map_address_url ); ?>"><span><?php echo esc_attr( $property_address ) ?></span></a>
</div>
