<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$property_gallery = ere_get_property_gallery_image(get_the_ID());
$total_image = 0;
if ($property_gallery) {
	$total_image = count($property_gallery);
}
?>
<div class="property-view-gallery-wrap" data-toggle="tooltip" title="<?php echo esc_attr(sprintf( __( '(%s) Photos', 'essential-real-estate' ), $total_image)) ; ?>">
    <a data-property-id="<?php the_ID(); ?>"
       href="javascript:void(0)" class="property-view-gallery"><i
            class="fa fa-camera"></i></a>
</div>