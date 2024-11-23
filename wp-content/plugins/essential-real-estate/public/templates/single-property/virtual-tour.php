<?php
// Do not allow directly accessing this file.
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}
/**
 * @var $property_image_360
 * @var $property_virtual_tour
 * @var $property_virtual_tour_type
 */
?>
<div class="ere__single-property-virtual-tour">
    <?php if (!empty($property_image_360) && $property_virtual_tour_type == '0') : ?>
        <iframe width="100%" height="600" scrolling="no" allowfullscreen
                src="<?php echo esc_url(ERE_PLUGIN_URL . "public/assets/packages/vr-view/index.html?image=" . $property_image_360) ; ?>"></iframe>
    <?php  elseif (!empty($property_virtual_tour) && $property_virtual_tour_type == '1'): ?>
        <?php echo(!empty($property_virtual_tour) ? do_shortcode($property_virtual_tour) : '') ?>
    <?php endif; ?>
</div>

