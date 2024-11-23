<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$social_sharing   = ere_get_option( 'social_sharing', array() );
if (!is_array($social_sharing) || count($social_sharing) === 0) {
	return;
}
$page_permalink = get_permalink();
$page_title = get_the_title();
?>
<div class="social-share">
	<div class="social-share-hover">
		<i class="fa fa-share-alt" aria-hidden="true"></i>
		<div class="social-share-list">
			<div class="list-social-icon clearfix">
			<?php foreach ($social_sharing as $social): ?>
				<?php
				$link = '';
				$icon = '';
				$title = '';
				$attributes = array();

				switch ($social) {
					case 'facebook':
						$link = "https://www.facebook.com/sharer.php?u=" . urlencode($page_permalink);
						$icon = 'fa fa-facebook';
						$title = esc_html__('Facebook', 'essential-real-estate');
						break;
					case 'twitter':
						$link  = "https://twitter.com/share?text=" . $page_title . "&url=" . urlencode($page_permalink);
						$icon = 'fa fa-twitter';
						$title = esc_html__('Twitter', 'essential-real-estate');
						break;
					case 'linkedin':
						$link = "http://www.linkedin.com/shareArticle?mini=true&url=" . urlencode($page_permalink) . "&title=" . $page_title;
						$icon = 'fa fa-linkedin';
						$title = esc_html__('LinkedIn', 'essential-real-estate');
						break;
					case 'tumblr':
						$link = "http://www.tumblr.com/share/link?url=" . urlencode($page_permalink) . "&name=" . $page_title;
						$icon = 'fa fa-tumblr';
						$title = esc_html__('Tumblr', 'essential-real-estate');
						break;
					case 'pinterest':
						$_img_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
						$link = "http://pinterest.com/pin/create/button/?url=" . urlencode($page_permalink) . '&media=' . (($_img_src === false) ? '' :  $_img_src[0]) . "&description=" . $page_title;
						$icon = 'fa fa-pinterest';
						$title = esc_html__('Pinterest', 'essential-real-estate');
						break;
					case 'whatsup':
						$link  = "https://api.whatsapp.com/send?text=" . esc_attr( $page_title . "  \n\n" . esc_url( $page_permalink ) );
						$icon = 'fa fa-whatsapp';
						$title = esc_html__('Whats App', 'essential-real-estate');
						$attributes[] = 'target="_blank"';
						break;
				}


				$args = apply_filters('ere_social_share_'. $social .'_args',array(
					'link' => $link,
					'icon' => $icon,
					'title' => $title
				));

				$attributes[] = sprintf( 'href="%s"', $args['link'] );
				$attributes[] = sprintf( 'title="%s"', esc_attr($args['title']));
				$attributes[] = 'rel="nofollow"';
				$attributes[] = 'data-delay="1"';
				$attributes[] = 'data-toggle="tooltip"';
				$attributes[] = 'target="_blank"';
				?>
				<a <?php echo join(' ', $attributes)?>>
					<i class="<?php echo esc_attr($args['icon']); ?>"></i>
				</a>

			<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>