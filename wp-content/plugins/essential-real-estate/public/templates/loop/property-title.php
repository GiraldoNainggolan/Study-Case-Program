<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
/**
 * @var $property_id
 */
?>
<h2 class="property-title"><a href="<?php  the_permalink($property_id); ?>"
                              title="<?php the_title_attribute( array('post' => $property_id)); ?>"><?php echo get_the_title($property_id) ?></a>
</h2>
