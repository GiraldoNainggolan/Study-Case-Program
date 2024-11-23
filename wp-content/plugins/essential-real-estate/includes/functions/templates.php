<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

function ere_template_loop_property_price( $property_id = '' ) {
    if (is_array($property_id)) {
        $args          = wp_parse_args( $property_id, array(
            'property_id' => get_the_ID(),
        ) );
        $property_id = $args['property_id'];
    } elseif (empty($property_id)) {
        $property_id = get_the_ID();
    }
	$price            = get_post_meta( $property_id, ERE_METABOX_PREFIX . 'property_price', true );
	$price_short      = get_post_meta( $property_id, ERE_METABOX_PREFIX . 'property_price_short', true );
	$price_unit       = get_post_meta( $property_id, ERE_METABOX_PREFIX . 'property_price_unit', true );
	$price_prefix     = get_post_meta( $property_id, ERE_METABOX_PREFIX . 'property_price_prefix', true );
	$price_postfix    = get_post_meta( $property_id, ERE_METABOX_PREFIX . 'property_price_postfix', true );
	$empty_price_text = ere_get_option( 'empty_price_text' );
	ere_get_template( 'loop/property-price.php', apply_filters('ere_template_loop_property_price_args',array(
		'price'            => $price,
		'price_short'      => $price_short,
		'price_unit'       => $price_unit,
		'price_prefix'     => $price_prefix,
		'price_postfix'    => $price_postfix,
		'empty_price_text' => $empty_price_text
	)));
}

function ere_template_loop_property_title($property_id = '') {
	if (empty($property_id)) {
		$property_id = get_the_ID();
	}
	ere_get_template('loop/property-title.php',array('property_id' => $property_id));
}

function ere_template_loop_property_location($property_id = '') {
	if (empty($property_id)) {
		$property_id = get_the_ID();
	}
	$property_address   = get_post_meta($property_id,ERE_METABOX_PREFIX . 'property_address', TRUE);
	if (empty($property_address)) {
		return;
	}
	$property_location = get_post_meta( $property_id, ERE_METABOX_PREFIX . 'property_location', true );
	if ( is_array($property_location) && isset($property_location['address'])) {
		$google_map_address_url = "http://maps.google.com/?q=" . $property_location['address'];
	} else {
		$google_map_address_url = "http://maps.google.com/?q=" . $property_address;
	}
	ere_get_template( 'loop/property-location.php', array(
		'property_address'       => $property_address,
		'google_map_address_url' => $google_map_address_url,
	));
}


function ere_template_single_property_gallery($args = array()) {
    $args          = wp_parse_args( $args, array(
        'property_id' => get_the_ID(),
    ) );
    ere_get_template( 'single-property/gallery.php' );
}
function ere_template_single_property_floor($property_id = '') {
	if (empty($property_id)) {
		$property_id = get_the_ID();
	}
	$property_floor_enable = boolval(get_post_meta($property_id,ERE_METABOX_PREFIX . 'floors_enable', TRUE));
	if ($property_floor_enable === FALSE) {
		return;
	}
	$property_floors       = get_post_meta( $property_id, ERE_METABOX_PREFIX . 'floors', true );
	if (!is_array($property_floors) && count($property_floors) == 0) {
		return;
	}

	ere_get_template( 'single-property/floors.php', array( 'property_floors' => $property_floors ) );
}

function ere_template_single_property_features($property_id = '') {
	if (empty($property_id)) {
		$property_id = get_the_ID();
	}

    $tabs = ere_get_single_property_features_tabs($property_id);

    if ( empty( $tabs ) ) {
        return;
    }

	ere_get_template( 'single-property/features.php', array('tabs' => $tabs) );
}

function ere_template_single_property_overview($args = array()) {
    $args          = wp_parse_args( $args, array(
        'property_id' => get_the_ID(),
    ) );

    $data = ere_get_single_property_overview($args['property_id']);
    if (empty($data)) {
        return;
    }
    ere_get_template('single-property/overview.php', array('data' => $data));
}

function ere_template_single_property_feature($args = array())
{
    $args          = wp_parse_args( $args, array(
        'property_id' => get_the_ID(),
    ) );

    $features = ere_get_property_features($args);

    if (($features === false ) || empty($features)) {
        return;
    }

    ere_get_template('single-property/feature.php',array('features' => $features));
}

function ere_template_single_property_video($args = array()) {
    $args          = wp_parse_args( $args, array(
        'property_id' => get_the_ID(),
    ) );
    $video = ere_get_property_video($args);
    if ($video === false) {
        return;
    }
    ere_get_template('single-property/video.php',$video);
}

function ere_template_single_property_virtual_tour($args = array()) {
    $args          = wp_parse_args( $args, array(
        'property_id' => get_the_ID(),
    ) );
    $virtual_tour =  ere_get_property_virtual_tour($args);
    if ($virtual_tour === false) {
        return;
    }
    ere_get_template('single-property/virtual-tour.php',$virtual_tour);
}

function ere_template_single_property_identity($args = array() ) {
    $args = wp_parse_args( $args, array(
        'property_id' => get_the_ID(),
    ) );

    $property_identity = get_post_meta( $args['property_id'], ERE_METABOX_PREFIX . 'property_identity', true );
    if ( empty( $property_identity ) ) {
        $property_identity = get_the_ID();
    }

    ere_get_template('single-property/data/identity.php', array( 'property_identity' => $property_identity ));


}

function ere_template_single_property_type($args = array()) {
    $args = wp_parse_args( $args, array(
        'property_id' => get_the_ID(),
    ) );

    $property_type = get_the_term_list( $args['property_id'], 'property-type', '', ', ', '' );
    if ( $property_type === false || is_a( $property_type, 'WP_Error' ) ) {
        return;
    }
    ere_get_template( 'single-property/data/type.php', array( 'property_type' => $property_type ) );

}

function ere_template_single_property_status($args = array()) {
    $args = wp_parse_args( $args, array(
        'property_id' => get_the_ID(),
    ) );

    $property_status = get_the_term_list( $args['property_id'], 'property-status', '', ', ', '' );
    if ( $property_status === false || is_a( $property_status, 'WP_Error' ) ) {
        return;
    }

    ere_get_template( 'single-property/data/status.php', array( 'property_status' => $property_status ) );
}

function ere_template_single_property_rooms($args = array()) {
    $args = wp_parse_args( $args, array(
        'property_id' => get_the_ID(),
    ) );
    $property_rooms = get_post_meta( $args['property_id'], ERE_METABOX_PREFIX . 'property_rooms', true );
    if ( $property_rooms === '' ) {
        return;
    }
    ere_get_template( 'single-property/data/rooms.php', array(
        'rooms' => $property_rooms
    ) );
}

function ere_template_single_property_bedrooms($args = array()){
    $args = wp_parse_args( $args, array(
        'property_id' => get_the_ID(),
    ) );
    $property_bedrooms = get_post_meta( $args['property_id'], ERE_METABOX_PREFIX . 'property_bedrooms', true );
    if ( $property_bedrooms === '' ) {
        return;
    }
    ere_get_template( 'single-property/data/bedrooms.php', array( 'property_bedrooms' => $property_bedrooms ) );
}

function ere_template_single_property_bathrooms($args = array()) {
    $args = wp_parse_args( $args, array(
        'property_id' => get_the_ID(),
    ) );
    $property_bathrooms = get_post_meta( $args['property_id'], ERE_METABOX_PREFIX . 'property_bathrooms', true );
    if ( $property_bathrooms === '' ) {
        return;
    }
    ere_get_template( 'single-property/data/bathrooms.php', array( 'property_bathrooms' => $property_bathrooms ) );
}

function ere_template_single_property_year($args = array()) {
    $args = wp_parse_args( $args, array(
        'property_id' => get_the_ID(),
    ) );
    $property_year = get_post_meta( $args['property_id'], ERE_METABOX_PREFIX . 'property_year', true );
    if ( $property_year === '' ) {
        return;
    }
    ere_get_template( 'single-property/data/year.php', array( 'property_year' => $property_year ) );
}

function ere_template_single_property_size($args = array()) {
    $args = wp_parse_args( $args, array(
        'property_id' => get_the_ID(),
    ) );
    $property_size = get_post_meta( $args['property_id'], ERE_METABOX_PREFIX . 'property_size', true );
    if ( $property_size === '' ) {
        return;
    }
    $measurement_units = ere_get_measurement_units();
    ere_get_template( 'single-property/data/size.php', array(
        'property_size'     => $property_size,
        'measurement_units' => $measurement_units
    ) );
}

function ere_template_single_property_land_size($args = array()) {
    $args = wp_parse_args( $args, array(
        'property_id' => get_the_ID(),
    ) );
    $property_land = get_post_meta( $args['property_id'], ERE_METABOX_PREFIX . 'property_land', true );
    if ( $property_land === '' ) {
        return;
    }
    $measurement_units_land_area = ere_get_measurement_units_land_area();
    ere_get_template( 'single-property/data/land-size.php', array(
        'property_land'               => $property_land,
        'measurement_units_land_area' => $measurement_units_land_area
    ) );
}

function ere_template_single_property_label($args = array()) {
    $args = wp_parse_args( $args, array(
        'property_id' => get_the_ID(),
    ) );

    $property_label = get_the_term_list( $args['property_id'], 'property-label', '', ', ', '' );
    if ( $property_label === false || is_a( $property_label, 'WP_Error' ) ) {
        return;
    }
    ere_get_template( 'single-property/data/label.php', array( 'property_label' => $property_label ) );
}
function ere_template_single_property_garage($args = array()) {
    $args = wp_parse_args( $args, array(
        'property_id' => get_the_ID(),
    ) );

    $property_garage = get_post_meta( $args['property_id'], ERE_METABOX_PREFIX . 'property_garage', true );
    if ( $property_garage === '' ) {
        return;
    }
    ere_get_template( 'single-property/data/garage.php', array( 'property_garage' => $property_garage ) );
}

function ere_template_single_property_garage_size($args = array()) {
    $args = wp_parse_args( $args, array(
        'property_id' => get_the_ID(),
    ) );

    $garage_size = get_post_meta( $args['property_id'], ERE_METABOX_PREFIX . 'property_garage_size', true );
    if ( $garage_size === '' ) {
        return;
    }
    $measurement_units = ere_get_measurement_units();
    ere_get_template( 'single-property/data/garage-size.php', array(
        'garage_size'       => $garage_size,
        'measurement_units' => $measurement_units
    ) );
}