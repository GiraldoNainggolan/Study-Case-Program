<?php
// Do not allow directly accessing this file.
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}
/**
 * @var $data array
 */
?>
<ul class="list-2-col ere-property-list">
    <?php foreach ($data as $k => $v): ?>
        <li>
            <strong><?php echo wp_kses_post($v['title'])?></strong>
            <?php echo wp_kses_post($v['content'])?>
        </li>
    <?php endforeach; ?>
</ul>
