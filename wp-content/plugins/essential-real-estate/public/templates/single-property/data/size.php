<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
/**
 * @var $property_size
 * @var $measurement_units
 */
?>
<span class="ere__property-size"><?php echo wp_kses_post(sprintf( '%s %s',ere_get_format_number($property_size), $measurement_units)); ?></span>
