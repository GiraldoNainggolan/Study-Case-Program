<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Get Property Gallery Image
 *
 * @param $property_Id
 *
 * @return false|string[]
 */
function ere_get_property_gallery_image($property_Id) {
	$property_gallery = get_post_meta($property_Id, ERE_METABOX_PREFIX . 'property_images', true);
	if (empty($property_gallery)) {
		return FALSE;
	}
	return explode( '|', $property_gallery);
}

function ere_get_single_property_features_tabs($property_id = '') {
    if (empty($property_id)) {
        $property_id = get_the_ID();
    }

    $tabs = array();

    $tabs['overview'] = array(
        'title'    => esc_html__( 'Overview', 'essential-real-estate' ),
        'priority' => 10,
        'callback' => 'ere_template_single_property_overview',
        'property_id' => $property_id
    );

    $tabs['features'] = array(
        'title'    => esc_html__( 'Features', 'essential-real-estate' ),
        'priority' => 20,
        'callback' => 'ere_template_single_property_feature',
        'property_id' => $property_id
    );

    $tabs['video'] = array(
        'title'    => esc_html__( 'Video', 'essential-real-estate' ),
        'priority' => 30,
        'callback' => 'ere_template_single_property_video',
        'property_id' => $property_id
    );

    $tabs['virtual_tour'] = array(
        'title'    => esc_html__( 'Virtual Tour', 'essential-real-estate' ),
        'priority' => 30,
        'callback' => 'ere_template_single_property_virtual_tour',
        'property_id' => $property_id
    );

    $tabs = apply_filters( 'ere_single_property_features_tabs', $tabs , $property_id);

    uasort( $tabs, 'ere_sort_by_order_callback' );

    $tabs = array_map( 'ere_content_callback', $tabs );

    return array_filter( $tabs, 'ere_filter_content_callback' );
}

function ere_get_single_property_overview($property_id = '')
{
    if (empty($property_id)) {
        $property_id = get_the_ID();
    }
    
    $overview = array();

    $overview['property_id'] = array(
        'title'    => esc_html__( 'Property ID', 'essential-real-estate' ),
        'priority' => 10,
        'callback' => 'ere_template_single_property_identity',
        'property_id' => $property_id
    );

    $overview['price'] = array(
        'title'    => esc_html__( 'Price', 'essential-real-estate' ),
        'priority' => 20,
        'callback' => 'ere_template_loop_property_price',
        'property_id' => $property_id
    );

    $overview['type'] = array(
        'title'    => esc_html__( 'Property Type', 'essential-real-estate' ),
        'priority' => 30,
        'callback' => 'ere_template_single_property_type',
        'property_id' => $property_id
    );

    $overview['status'] = array(
        'title'    => esc_html__( 'Property status', 'essential-real-estate' ),
        'priority' => 40,
        'callback' => 'ere_template_single_property_status',
        'property_id' => $property_id
    );

    $overview['rooms'] = array(
        'title'    => esc_html__( 'Rooms', 'essential-real-estate' ),
        'priority' => 50,
        'callback' => 'ere_template_single_property_rooms',
        'property_id' => $property_id
    );

    $overview['bedrooms'] = array(
        'title'    => esc_html__( 'Bedrooms', 'essential-real-estate' ),
        'priority' => 60,
        'callback' => 'ere_template_single_property_bedrooms',
        'property_id' => $property_id
    );

    $overview['bathrooms'] = array(
        'title'    => esc_html__( 'Bathrooms', 'essential-real-estate' ),
        'priority' => 70,
        'callback' => 'ere_template_single_property_bathrooms',
        'property_id' => $property_id
    );

    $overview['year'] = array(
        'title'    => esc_html__( 'Year Built', 'essential-real-estate' ),
        'priority' => 80,
        'callback' => 'ere_template_single_property_year',
        'property_id' => $property_id
    );

    $overview['size'] = array(
        'title'    => esc_html__( 'Size', 'essential-real-estate' ),
        'priority' => 90,
        'callback' => 'ere_template_single_property_size',
        'property_id' => $property_id
    );

    $overview['land_size'] = array(
        'title'    => esc_html__( 'Land area', 'essential-real-estate' ),
        'priority' => 100,
        'callback' => 'ere_template_single_property_land_size',
        'property_id' => $property_id
    );

    $overview['label'] = array(
        'title'    => esc_html__( 'Label', 'essential-real-estate' ),
        'priority' => 110,
        'callback' => 'ere_template_single_property_label',
        'property_id' => $property_id
    );

    $overview['garages'] = array(
        'title'    => esc_html__( 'Garages', 'essential-real-estate' ),
        'priority' => 120,
        'callback' => 'ere_template_single_property_garage',
        'property_id' => $property_id
    );

    $overview['garages_size'] = array(
        'title'    => esc_html__( 'Garage Size', 'essential-real-estate' ),
        'priority' => 130,
        'callback' => 'ere_template_single_property_garage_size',
        'property_id' => $property_id
    );

    $priority = 140;
    $additional_fields = ere_render_additional_fields();
    foreach ( $additional_fields as $key => $field ) {
        $property_field         = get_post_meta( $property_id, $field['id'], true );
        $property_field_content = $property_field;
        if ( $field['type'] == 'checkbox_list' ) {
            $property_field_content = '';
            if ( is_array( $property_field ) ) {
                foreach ( $property_field as $value => $v ) {
                    $property_field_content .= $v . ', ';
                }
            }
            $property_field_content = rtrim( $property_field_content, ', ' );
        }
        if ( $field['type'] === 'textarea' ) {
            $property_field_content = wpautop( $property_field_content );
        }
        if ( ! empty( $property_field_content ) ) {
            $overview[ $field['id'] ] = array(
                'title'    => $field['title'],
                'content'  => '<span>' . $property_field_content . '</span>',
                'priority' => $priority,
            );
        }
        $priority+= 10;
    }


    $additional_features = get_post_meta( $property_id, ERE_METABOX_PREFIX . 'additional_features', true );
    if ( $additional_features > 0 ) {
        $additional_feature_title = get_post_meta( $property_id, ERE_METABOX_PREFIX . 'additional_feature_title', true );
        $additional_feature_value = get_post_meta( $property_id, ERE_METABOX_PREFIX . 'additional_feature_value', true );
        for ( $i = 0; $i < $additional_features; $i ++ ) {
            if ( ! empty( $additional_feature_title[ $i ] ) && ! empty( $additional_feature_value[ $i ] ) ) {
                $overview[ sanitize_title( $additional_feature_title[ $i ] ) ] = array(
                    'title'    => $additional_feature_title[ $i ],
                    'content'  => '<span>' . $additional_feature_value[ $i ] . '</span>',
                    'priority' => $priority,
                );
                $priority+= 10;
            }
        }
    }


    $overview = apply_filters( 'ere_single_property_overview', $overview );

    uasort( $overview, 'ere_sort_by_order_callback' );

    $overview = array_map( 'ere_content_callback', $overview );

    return array_filter( $overview, 'ere_filter_content_callback' );
}

function ere_get_property_features( $args = array() ) {
    $args     = wp_parse_args( $args, array(
        'property_id' => get_the_ID(),
    ) );
    $features = get_the_terms( $args['property_id'], 'property-feature' );

    if ( is_a( $features, 'WP_Error' ) ) {
        return false;
    }

    return $features;
}

function ere_get_property_video( $args = array() ) {
    $args     = wp_parse_args( $args, array(
        'property_id' => get_the_ID(),
    ) );
    $property_id = $args['property_id'];
    $property_video       = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_video_url', true );
    if ($property_video == '') {
        return false;
    }
    $property_video_image = get_post_meta( $property_id, ERE_METABOX_PREFIX . 'property_video_image', true );
    return array(
        'video_url'   => $property_video,
        'video_image' => $property_video_image
    );

}

function ere_get_property_virtual_tour($args = array()) {
    $args     = wp_parse_args( $args, array(
        'property_id' => get_the_ID(),
    ) );
    $property_id = $args['property_id'];
    $property_image_360         = get_post_meta( $property_id, ERE_METABOX_PREFIX . 'property_image_360', true );
    $property_image_360         = ( isset( $property_image_360 ) && is_array( $property_image_360 ) ) ? $property_image_360['url'] : '';
    $property_virtual_tour      = get_post_meta( $property_id, ERE_METABOX_PREFIX . 'property_virtual_tour', true );
    $property_virtual_tour_type = get_post_meta( $property_id, ERE_METABOX_PREFIX . 'property_virtual_tour_type', true );
    if ( empty( $property_virtual_tour_type ) ) {
        $property_virtual_tour_type = '0';
    }
    if ( ! empty( $property_virtual_tour ) || $property_image_360 != '' ) {
        return array(
            'property_image_360'         => $property_image_360,
            'property_virtual_tour'      => $property_virtual_tour,
            'property_virtual_tour_type' => $property_virtual_tour_type
        );
    }

    return false;

}