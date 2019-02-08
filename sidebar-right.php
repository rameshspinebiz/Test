<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Store
 */

if ( ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
}
?>
<div id="secondary-right" class="widget-area right-sidebar sidebar">
    <?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'right-sidebar' ); ?>
	<?php endif; ?>
</div>

