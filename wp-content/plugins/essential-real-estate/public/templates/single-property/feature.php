<?php
// Do not allow directly accessing this file.
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}
/**
 * @var $features WP_Term
 */
$features_terms_id = array();
foreach ($features as $feature) {
    $features_terms_id[] = intval($feature->term_id);
}

$all_features = get_categories(array(
    'taxonomy' => 'property-feature',
    'hide_empty' => 0,
    'orderby' => 'term_id',
    'order' => 'ASC'
));

$parents_items = array();
$multi_level = false;

$hide_empty_features = ere_get_option('hide_empty_features', 1);
$map_feature = array();
foreach ($all_features as $k =>  $v){
    $map_feature[$v->term_id] = $v;
}


foreach ($all_features as $term) {
    if (0 == $term->parent) {
        if (!isset($parents_items[$term->term_id])) {
            $parents_items[$term->term_id] = array(
                'term' => $term,
                'child' => array()
            );
        }
    } else {
        $multi_level = true;
        if (!isset($parents_items[$term->parent])) {
            $parents_items[$term->parent] = array(
                'term' => $map_feature[$term->parent],
                'child' => array()
            );
        }
        $parents_items[$term->parent]['child'][] = $term;
    }

};
$property_archive_link = get_post_type_archive_link('property');

?>
<?php if ($multi_level): ?>
    <?php foreach ($parents_items as $k => $v): ?>
        <?php
            $found = FALSE;
            $found_child = FALSE;
            $term = $v['term'];
            $child = isset($v['child']) ? $v['child'] : array();
            if (in_array($term->term_id,$features_terms_id) || ($hide_empty_features != 1)) {
                $found = true;
            }
        ?>
        <?php if (is_array($child) && count($child) > 0): ?>
            <?php ob_start();?>
            <div class="row mg-bottom-30">
                <?php foreach ($child as $child_term ): ?>
                    <?php $term_link = get_term_link($child_term, 'property-feature'); ?>
                    <?php if (in_array($child_term->term_id, $features_terms_id)): ?>
                        <?php $found = true;
                        $found_child = true;?>
                        <div class="col-md-3 col-xs-6 col-mb-12 property-feature-wrap">
                            <a class="feature-checked" href="<?php echo esc_url($term_link)?>"><i class="fa fa-check-square-o"></i> <?php echo esc_html($child_term->name) ?></a>
                        </div>
                    <?php elseif ($hide_empty_features != 1): ?>
                        <?php $found = true;
                        $found_child = true;?>
                        <div class="col-md-3 col-xs-6 col-mb-12 property-feature-wrap">
                            <a class="feature-unchecked" href="<?php echo esc_url($term_link)?>"><i class="fa fa-square-o"></i> <?php echo esc_html($child_term->name) ?></a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <?php $child_content = ob_get_clean(); ?>

            <?php if ($found_child) {
                echo ob_get_clean();
            } ?>
        <?php endif; ?>

        <?php ob_start(); ?>
        <h4><?php echo esc_html($term->name)?></h4>
        <?php if ($found_child) {
            echo wp_kses_post($child_content);
        } ?>
        <?php $content = ob_get_clean(); ?>

        <?php if ($found) {
            echo wp_kses_post($content);
        } ?>

    <?php endforeach; ?>
<?php else: ?>
    <div class="row">
        <?php foreach ($parents_items as $k => $v): ?>
            <?php $term = $v['term'] ?>
            <?php $term_link = get_term_link($term, 'property-feature');  ?>
            <?php if (in_array($term->term_id, $features_terms_id)): ?>
                <div class="col-md-3 col-xs-6 col-mb-12 property-feature-wrap">
                    <a class="feature-checked" href="<?php echo esc_url($term_link)?>"><i class="fa fa-check-square-o"></i> <?php echo esc_html($term->name) ?></a>
                </div>
            <?php elseif ($hide_empty_features != 1): ?>
                <div class="col-md-3 col-xs-6 col-mb-12 property-feature-wrap">
                    <a class="feature-unchecked" href="<?php echo esc_url($term_link)?>"><i class="fa fa-square-o"></i> <?php echo esc_html($term->name) ?></a>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
