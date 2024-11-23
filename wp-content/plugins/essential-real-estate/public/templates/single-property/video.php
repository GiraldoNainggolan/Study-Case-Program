<?php
// Do not allow directly accessing this file.
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}
/**
 * @var $video_url
 * @var $video_image
 */
$wrapper_classes = array('video');
if (!empty($video_image)) {
    $wrapper_classes[] = 'video-has-thumb';
}

$wrapper_class = join(' ', $wrapper_classes);


?>
<div class="<?php echo esc_attr($wrapper_class)?>">
    <div class="entry-thumb-wrap">
        <?php if (wp_oembed_get($video_url)) : ?>
            <?php
            $image_src = ere_image_resize_id($video_image, 870, 420, true);
            $width = '870';
            $height = '420';
            if (!empty($image_src)):?>
                <div class="entry-thumbnail property-video ere-light-gallery">
                    <img class="img-responsive" src="<?php echo esc_url($image_src); ?>"
                         width="<?php echo esc_attr($width) ?>"
                         height="<?php echo esc_attr($height) ?>"
                         alt="<?php the_title_attribute(); ?>"/>
                    <a class="ere-view-video"
                       data-src="<?php echo esc_url($video_url); ?>"><i
                                class="fa fa-play-circle-o"></i></a>
                </div>
            <?php else: ?>
                <div class="embed-responsive embed-responsive-16by9 embed-responsive-full">
                    <?php echo wp_oembed_get($video_url, array('wmode' => 'transparent')); ?>
                </div>
            <?php endif; ?>
        <?php else : ?>
            <div class="embed-responsive embed-responsive-16by9 embed-responsive-full">
                <?php echo wp_kses_post($video_url); ?>
            </div>
        <?php endif; ?>
    </div>
</div>
