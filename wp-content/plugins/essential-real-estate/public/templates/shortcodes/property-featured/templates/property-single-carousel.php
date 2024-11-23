<?php
/**
 * @var $layout_style
 * @var $data
 * @var $color_scheme
 * @var $item_amount
 * @var $image_size3
 * @var $include_heading
 * @var $heading_sub_title
 * @var $heading_title
 * @var $heading_text_align
 * @var $property_cities
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$property_content_class = array( 'property-content-wrap' );
$property_item_class    = array( 'property-item' );

$owl_attributes = array(
	'dots' => true,
	'nav' => false,
	'items' => 1
);

?>
<?php if($include_heading) :
	$heading_class=$color_scheme.' '. $heading_text_align;
	?>
	<div
		class="ere-heading <?php echo esc_attr($heading_class); ?>">
		<?php if ( ! empty( $heading_title ) ): ?>
			<h2><?php echo esc_html( $heading_title ); ?></h2>
		<?php endif; ?>
		<?php if ( ! empty( $heading_sub_title ) ): ?>
			<p><?php echo esc_html( $heading_sub_title ); ?></p>
		<?php endif; ?>
	</div>
<?php endif; ?>
<div class="<?php echo esc_attr(join( ' ', $property_content_class )); ?>">
	<div class="property-content-inner">
		<div class="property-content owl-carousel manual" data-plugin-options="<?php echo esc_attr(json_encode($owl_attributes)) ?>">
			<?php if ( $data->have_posts() ) :
				$width = 570;
				$height = 320;
				$no_image_src = ERE_PLUGIN_URL . 'public/assets/images/no-image.jpg';
				$default_image = ere_get_option('default_property_image', '');
				$image_size=$image_size3;
				if (preg_match('/\d+x\d+/', $image_size)) {
					$image_sizes = explode('x', $image_size);
					$width=$image_sizes[0];$height= $image_sizes[1];
					if($default_image!='')
					{
						if(is_array($default_image)&& $default_image['url']!='')
						{
							$resize = ere_image_resize_url($default_image['url'], $width, $height, true);
							if ($resize != null && is_array($resize)) {
								$no_image_src = $resize['url'];
							}
						}
					}
				} else {
					if($default_image!='')
					{
						if(is_array($default_image)&& $default_image['url']!='')
						{
							$no_image_src = $default_image['url'];
						}
					}
				}
				while ( $data->have_posts() ): $data->the_post();
					$property_id=get_the_ID();
					$attach_id = get_post_thumbnail_id();
					$image_src  = '';
					if (preg_match('/\d+x\d+/', $image_size)) {
						$image_sizes = explode('x', $image_size);
						$width=$image_sizes[0];$height= $image_sizes[1];
						$image_src = ere_image_resize_id($attach_id, $width, $height, true);
					} else {
						if (!in_array($image_size, array('full', 'thumbnail'))) {
							$image_size = 'full';
						}
						$image_src = wp_get_attachment_image_src($attach_id, $image_size);
						if ($image_src && !empty($image_src[0])) {
							$image_src = $image_src[0];
						}
						if (!empty($image_src)) {
							list($width, $height) = getimagesize($image_src);
						}
					}
					$excerpt = get_the_excerpt();

					$property_meta_data = get_post_custom( $property_id );
					$property_size         = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_size' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_size' ][0] : '';
					$property_bedrooms     = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_bedrooms' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_bedrooms' ][0] : '0';
					$property_bathrooms    = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_bathrooms' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_bathrooms' ][0] : '0';

					$property_status = get_the_terms( $property_id, 'property-status' );

					$property_link = get_the_permalink();
					?>
					<div class="<?php echo esc_attr(join( ' ', $property_item_class )) ; ?>">
						<div class="property-inner row">
							<div class="property-image col-md-6">
								<a href="<?php echo esc_url( $property_link ); ?>"
								   title="<?php the_title(); ?>"></a>
								<img width="<?php echo esc_attr($width) ?>" height="<?php echo esc_attr($height) ?>"
									 src="<?php echo esc_url($image_src) ?>"
									 onerror="this.src = '<?php echo esc_url($no_image_src) ?>';"
									 alt="<?php the_title(); ?>"
									 title="<?php the_title(); ?>">
							</div>
							<div class="property-item-content col-md-6">
								<div class="property-heading">
									<?php ere_template_loop_property_title($property_id); ?>
									<?php ere_template_loop_property_price($property_id); ?>
											<?php if ( $property_status ) : ?>
												<div class="property-status">
													<?php foreach ( $property_status as $status ) :
														$status_color = get_term_meta($status->term_id, 'property_status_color', true);?>
														<span style="background-color: <?php echo esc_attr($status_color) ?>"><?php echo esc_attr( $status->name ); ?></span>
													<?php endforeach; ?>
												</div>
											<?php endif; ?>


									<?php ere_template_loop_property_location($property_id); ?>
								</div>
								<?php if ( isset( $excerpt ) && ! empty( $excerpt ) ): ?>
									<div class="property-excerpt">
										<p><?php echo wp_kses_post( $excerpt ); ?></p>
									</div>
								<?php endif; ?>
								<div class="property-info">
									<div class="property-info-inner">
										<div class="property-id">
											<div class="property-info-item-inner">
												<span class="fa fa-barcode"></span>
												<div class="content-property-info">
													<p class="property-info-value"><?php
														$property_identity  = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_identity' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_identity' ][0] : '';
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
										</div>
										<?php if ( ! empty( $property_size ) ): ?>
											<div class="property-area">
												<div class="property-info-item-inner">
													<span class="fa fa-arrows"></span>
													<div class="content-property-info">
														<p class="property-info-value"><?php echo ere_get_format_number( $property_size ) ?>
																<span><?php
																	$measurement_units = ere_get_measurement_units();
																	echo wp_kses_post($measurement_units) ?></span>
														</p>
														<p class="property-info-title"><?php esc_html_e( 'Size', 'essential-real-estate' ); ?></p>
													</div>
												</div>
											</div>
										<?php endif; ?>
										<?php if ( ! empty( $property_bedrooms ) ): ?>
											<div class="property-bedrooms">
												<div class="property-info-item-inner">
													<span class="fa fa-hotel"></span>
													<div class="content-property-info">
														<p class="property-info-value"><?php echo esc_html( $property_bedrooms ) ?></p>
														<p class="property-info-title"><?php
															echo ere_get_number_text($property_bedrooms, esc_html__( 'Bedrooms', 'essential-real-estate' ), esc_html__( 'Bedroom', 'essential-real-estate' ));
															?></p>
													</div>
												</div>
											</div>
										<?php endif; ?>
										<?php if ( ! empty( $property_bathrooms ) ): ?>
											<div class="property-bathrooms">
												<div class="property-info-item-inner">
													<span class="fa fa-bath"></span>
													<div class="content-property-info">
														<p class="property-info-value"><?php echo esc_html( $property_bathrooms ) ?></p>
														<p class="property-info-title"><?php
															echo ere_get_number_text($property_bathrooms, esc_html__( 'Bathrooms', 'essential-real-estate' ), esc_html__( 'Bathroom', 'essential-real-estate' ));
															?></p>
													</div>
												</div>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile;

			else: ?>
				<div class="item-not-found"><?php esc_html_e( 'No item found', 'essential-real-estate' ); ?></div>
			<?php endif; ?>
		</div>
	</div>
</div>




