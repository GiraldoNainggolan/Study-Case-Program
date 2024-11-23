<?php
/**
 * @var $name string
 * @var $attr_option array
 */
$option_element = null;
$desc           = ( isset( $attr_option['desc'] ) && ! empty( $attr_option['desc'] ) ) ? '<p class="des">' . esc_html($attr_option['desc'])  . '</p>' : '';

$required      = isset( $attr_option['required'] ) ? $attr_option['required'] : '';
$is_required = is_array( $required ) && $required != array();

$input_attrs = array();

if (isset( $attr_option['default'] )) {
	$input_attrs['data-default-value'] = $attr_option['default'];
}

if ( is_array( $required ) && $required != array() ) {
    $input_attrs['data-required-element'] = $required['element'];
    $input_attrs['data-required-value'] = is_array( $required['value'] ) ? implode( ',', $required['value'] )  : $required['value'];
}
?>
<div class="option-item-wrap <?php echo esc_attr($name) ?>">
    <div class="label">
        <label for="<?php echo esc_attr($name) ?>"><strong><?php echo esc_html($attr_option['title']) ?>: </strong></label>
    </div>
    <?php if ($attr_option['type'] === 'checkbox'): ?>
        <div class="content">
            <input  name="<?php echo esc_attr($name) ?>" type="checkbox"
                    class="<?php echo esc_attr($name) ?>"
                    id="<?php echo esc_attr($name) ?>" <?php ere_render_html_attr($input_attrs); ?>/>
            <?php echo wp_kses_post($desc) ?>
        </div>
    <?php elseif ($attr_option['type'] === 'select'): ?>
        <div class="content">
            <select id="<?php echo esc_attr($name) ?>" name="<?php echo esc_attr($name) ?>" <?php ere_render_html_attr($input_attrs); ?>>
			    <?php foreach ( $attr_option['values'] as $key => $value ): ?>
                    <option value="<?php echo esc_attr($key) ?>"><?php echo esc_html($value) ?></option>
			    <?php endforeach; ?>
            </select>
	        <?php echo wp_kses_post($desc) ?>
        </div>
	<?php elseif ($attr_option['type'] === 'ere_selectize'): ?>
        <div class="content">
            <select class="ere-selectize-input" multiple="multiple" id="<?php echo esc_attr($name) ?>" name="<?php echo esc_attr($name ) ?>" <?php ere_render_html_attr($input_attrs); ?>>
	            <?php foreach ( $attr_option['values'] as $key => $value ): ?>
                    <option value="<?php echo esc_attr($key) ?>"><?php echo esc_html($value) ?></option>
	            <?php endforeach; ?>
            </select>
	        <?php echo wp_kses_post($desc) ?>
        </div>
	<?php elseif ($attr_option['type'] === 'textarea'): ?>
        <div class="content">
            <textarea id="<?php echo esc_attr($name) ?>" name="<?php echo esc_attr($name) ?>"></textarea>
            <?php echo wp_kses_post($desc) ?>
        </div>
	<?php elseif ($attr_option['type'] === 'image'): ?>
        <div class="content">
            <div class="shortcode-dynamic-item" id="options-item" data-name="image-upload">
                <input type="hidden" id="options-item-id" name="<?php echo esc_attr($name) ?>" value="" />
                <img class="ere-image-screenshot" id="<?php echo esc_attr($name) ?>" src="" />
                <a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);" class="ere-image-upload button-secondary" rel-id="">
				    <?php echo esc_html__( 'Upload', 'essential-real-estate' ) ?>
                </a>
                <a href="javascript:void(0);" class="ere-image-upload-remove" style="display: none;"><?php echo esc_html__( 'Remove Upload', 'essential-real-estate' ) ?></a>

			    <?php echo wp_kses_post($desc) ?>
            </div>
        </div>
    <?php else: ?>
        <div class="content">
            <input id="<?php echo esc_attr($name) ?>" type="text" name="<?php echo esc_attr($name) ?>" value="" <?php ere_render_html_attr($input_attrs); ?> />
            <?php echo wp_kses_post($desc) ?>
        </div>
	<?php endif; ?>
</div>