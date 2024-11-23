<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
/**
 * @var $property_land
 * @var $measurement_units_land_area
 */
?>
<span class="ere__property-land-size"><?php echo wp_kses_post(sprintf( '%s %s',ere_get_format_number($property_land), $measurement_units_land_area)); ?></span>
