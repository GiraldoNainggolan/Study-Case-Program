<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
/**
 * @var $garage_size
 * @var $measurement_units
 */
?>
<span class="ere__property-garage-size"><?php echo wp_kses_post(sprintf( '%s %s',ere_get_format_number($garage_size), $measurement_units)); ?></span>
