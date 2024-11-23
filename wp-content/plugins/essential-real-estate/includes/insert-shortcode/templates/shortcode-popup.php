<?php
/**
 * @var $ere_shortcodes array
 */
?>
<div id="ere-input-shortcode-wrap" style="display: none">
    <div id="ere-input-shortcode">
        <div class="g5u-popup-container" style="--g5u-popup-width: 910px; --g5u-content-min-height: 40vh">
            <div class="shortcode-content g5u-popup">
                <div id="ere-sc-header" class="g5u-popup-header" style="padding-right: 60px">
                    <strong><?php echo esc_html__( 'ERE Shortcodes', 'essential-real-estate' ) ?></strong>
                    <select id="ere-shortcodes"
                            data-placeholder="<?php echo esc_attr__( "Choose a shortcode", 'essential-real-estate' ) ?>">
                        <option></option>
		                <?php foreach ($ere_shortcodes as $shortcode => $options): ?>
                            <option value="<?php echo esc_attr($shortcode) ?>"><?php echo esc_html($options['title']) ?></option>
		                <?php endforeach; ?>
                    </select>
                </div>
                <div class="g5u-popup-body">
	                <?php foreach ($ere_shortcodes as $shortcode => $options): ?>
                        <div class="shortcode-options" id="options-<?php echo esc_attr($shortcode) ?>" data-name="<?php echo esc_attr($shortcode) ?>" data-type="<?php echo esc_attr($options['type']) ?>">
			                <?php if ( ! empty( $options['attr'] ) ): $index = 0; ?>
				                <?php foreach ( $options['attr'] as $name => $attr_option ): ?>
					                <?php if ($index++ % 2 == 0): ?>
                                        <div class="two-option-wrap">
					                <?php endif; ?>
					                <?php ere_get_admin_template('includes/insert-shortcode/templates/option-element.php', array(
						                'name' => $name,
						                'attr_option' => $attr_option
					                )); ?>
					                <?php if ($index % 2 == 0 || ($index >= count($options['attr'])) ): ?>
                                        </div>
                                        <div class="clearfix"></div>
					                <?php endif; ?>
				                <?php endforeach; ?>
			                <?php endif; ?>
                        </div>
	                <?php endforeach; ?>
                    <a class="btn" id="insert-shortcode"><?php echo esc_html__( "Insert Shortcode", "essential-real-estate" ) ?></a>
                </div>
            </div>
        </div>
    </div>
</div>