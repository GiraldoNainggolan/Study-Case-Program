<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $post;
$property_id=get_the_ID();
$property_meta_data = get_post_custom( $property_id );
$property_identity         = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_identity' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_identity' ][0] : '';
$property_size         = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_size' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_size' ][0] : '';
$property_bedrooms    = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_bedrooms' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_bedrooms' ][0] : '0';
$property_bathrooms   = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_bathrooms' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_bathrooms' ][0] : '0';

$property_title = get_the_title();
$property_status = get_the_terms( $property_id, 'property-status' );
?>
<div class="single-property-element property-info-header property-info-action">
	<div class="property-main-info">
		<div class="property-heading">
			<?php if ( ! empty( $property_title ) ): ?>
				<h2><?php the_title(); ?></h2>
			<?php endif; ?>
			<div class="property-info-block-inline">
				<div>
					<?php ere_template_loop_property_price($property_id); ?>
					<?php
					if ( $property_status ) : ?>
						<div class="property-status">
							<?php foreach ( $property_status as $status ) :
								$status_color = get_term_meta($status->term_id, 'property_status_color', true);?>
								<span class="" style="background-color: <?php echo esc_attr($status_color) ?>"><?php echo esc_html( $status->name ); ?></span>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
				<?php ere_template_loop_property_location($property_id); ?>
			</div>
		</div>
	</div>
	<div class="property-info">
		<div class="property-id">
			<span class="fa fa-barcode"></span>
			<div class="content-property-info">
				<p class="property-info-value"><?php
					if(!empty($property_identity))
					{
						echo esc_html($property_identity);
					}
					else
					{
						echo esc_html($property_id);
					}
					?></p>
				<p class="property-info-title"><?php esc_html_e( 'Property ID', 'essential-real-estate' ); ?></p>
			</div>
		</div>
		<?php if ( ! empty( $property_size ) ): ?>
			<div class="property-area">
				<span class="fa fa-arrows"></span>
				<div class="content-property-info">
					<p class="property-info-value"><?php
						echo ere_get_format_number( $property_size ); ?>
							<span><?php
								$measurement_units = ere_get_measurement_units();
								echo wp_kses_post($measurement_units); ?></span>
					</p>
					<p class="property-info-title"><?php esc_html_e( 'Size', 'essential-real-estate' ); ?></p>
				</div>
			</div>
		<?php endif; ?>
		<?php if ( ! empty( $property_bedrooms ) ): ?>
			<div class="property-bedrooms">
				<span class="fa fa-hotel"></span>
				<div class="content-property-info">
					<p class="property-info-value"><?php echo esc_html( $property_bedrooms ) ?></p>
					<p class="property-info-title"><?php
						echo ere_get_number_text($property_bedrooms, esc_html__( 'Bedrooms', 'essential-real-estate' ), esc_html__( 'Bedroom', 'essential-real-estate' ));
						?></p>
				</div>
			</div>
		<?php endif; ?>
		<?php if ( ! empty( $property_bathrooms ) ): ?>
			<div class="property-bathrooms">
				<span class="fa fa-bath"></span>
				<div class="content-property-info">
					<p class="property-info-value"><?php echo esc_html( $property_bathrooms ) ?></p>
					<p class="property-info-title"><?php
						echo ere_get_number_text($property_bathrooms, esc_html__( 'Bathrooms', 'essential-real-estate' ), esc_html__( 'Bathroom', 'essential-real-estate' ));
						?></p>
				</div>
			</div>
		<?php endif; ?>
	</div>
	<div class="property-action">
		<div class="property-action-inner clearfix">
			<?php
			if (ere_get_option('enable_social_share', '1') == '1') {
				ere_get_template('global/social-share.php');
			}
			if (ere_get_option('enable_favorite_property', '1') == '1') {
				ere_get_template('property/favorite.php');
			}
			if (ere_get_option('enable_compare_properties', '1') == '1'):?>
				<a class="compare-property" href="javascript:void(0)"
				   data-property-id="<?php the_ID() ?>" data-toggle="tooltip"
				   title="<?php esc_attr_e('Compare', 'essential-real-estate') ?>">
					<i class="fa fa-plus"></i>
				</a>
			<?php endif;
			if(ere_get_option('enable_print_property','1')=='1'):?>
			<a href="javascript:void(0)" id="property-print"
			   data-ajax-url="<?php echo esc_url(ERE_AJAX_URL) ; ?>" data-toggle="tooltip"
			   data-original-title="<?php esc_attr_e( 'Print', 'essential-real-estate' ); ?>"
			   data-property-id="<?php echo esc_attr( $property_id ); ?>"><i class="fa fa-print"></i></a>
			<?php endif;?>
            <?php do_action('ere_single_property_action', $property_id, $post); ?>
		</div>
	</div>
</div>