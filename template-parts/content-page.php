<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Store
 */

?>

	<header class="page-header">
		<?php the_title( '<h1 class="page-title"><span>', '</span></h1>' ); ?>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-store' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .page-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="page-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'wp-store' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .page-footer -->
	<?php endif; ?>
