<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Store
 */

if ( ! is_active_sidebar( 'left-sidebar' ) ) {
	return;
}
?>
<div id="secondary-left" class="widget-area left-sidebar sidebar">
    <?php if ( is_active_sidebar( 'left-sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'left-sidebar' ); ?>
	<?php endif; ?>
</div>

