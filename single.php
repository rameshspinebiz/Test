<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Store
 */

get_header(); 
global $post;
$single_post_layout = esc_attr(get_post_meta( $post -> ID, 'wp_store_sidebar_layout', true ));
if(empty($single_post_layout)):
	$single_post_layout = esc_attr(get_theme_mod('wp_store_innerpage_setting_single_post_layout','right-sidebar'));
endif;	


$slider_single = get_theme_mod('wp_store_innerpage_setting_single_post_slider',0);
if($slider_single == '1'):
	do_action('wp_store_slider_section'); 
endif;
?><?php //echo $single_post_layout;?>
<div class="ed-container">
	<?php
	if($single_post_layout=='both-sidebar'){
		?>
		<div class="left-sidebar-right">
		<?php
	}
	?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.

		the_posts_navigation();
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php 
	if($single_post_layout=='left-sidebar' || $single_post_layout=='both-sidebar'){
	    get_sidebar('left');
	}
	if($single_post_layout=='both-sidebar'){
	    ?>
	    </div>
	    <?php
	}
	if($single_post_layout=='right-sidebar' || $single_post_layout=='both-sidebar'){
	 get_sidebar('right');
	}
?>
</div>
<?php
if(get_theme_mod('wp_store_innerpage_setting_single_post_cta')=="1"){
	if(is_active_sidebar('widget-area-two')){
			?>
			<div class='widget-area'>
				<?php
				dynamic_sidebar('widget-area-two');
				?>
			</div>			
			<?php
	}
}
get_footer();
