<?php
/**
 * Created by G5Theme.
 * User: trungpq
 * Date: 7/15/2017
 * Time: 11:20 PM
 * @var $css_class_field
 * @var $request_bathrooms
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$bathrooms_list = ere_get_option('bathrooms_list','1,2,3,4,5,6,7,8,9,10');
$bathrooms_array = explode( ',', $bathrooms_list );
?>
<div class="<?php echo esc_attr($css_class_field); ?> form-group">
    <select name="bathrooms" title="<?php esc_attr_e('Property Bathrooms', 'essential-real-estate') ?>"
            class="search-field form-control" data-default-value="">
        <option value="">
            <?php esc_html_e('Any Bathrooms', 'essential-real-estate') ?>
        </option>
	    <?php if (is_array($bathrooms_array) && !empty($bathrooms_array) ): ?>
	        <?php foreach ($bathrooms_array as $n) : ?>
			    <option <?php selected($request_bathrooms,$n) ?> value="<?php echo esc_attr($n)?>"><?php echo esc_html($n)?></option>
	        <?php endforeach; ?>
	    <?php endif; ?>
    </select>
</div>