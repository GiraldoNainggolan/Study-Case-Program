<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
/**
 * @param $package_id
 *
 * @return bool
 */
function ere_package_is_visible($package_id) {
	$visible = true;
	if (empty($package_id)) {
		$visible = false;
	}
	$package_id = absint($package_id);
	if ($package_id === 0) {
		$visible = false;
	}
	$post_object = get_post($package_id);
	if (!is_a($post_object, 'WP_Post') || ($post_object->post_status !== 'publish') || $post_object->post_type !== 'package') {
		$visible = false;
	}
	return $visible;
}