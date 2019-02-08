<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Store
 */
get_header(); 
global $post;
$page_layout = get_post_meta( $post -> ID, 'wp_store_sidebar_layout', true );

if(empty($page_layout)):
	$page_layout = get_theme_mod('wp_store_innerpage_setting_single_page_layout','right-sidebar');
endif;	
$slider_page = get_theme_mod('wp_store_innerpage_setting_single_page_slider',0);
if($slider_page == '1'):
	do_action('wp_store_slider_section'); 
endif;
?>
<div class="ed-container">
	<?php
	if($page_layout=='both-sidebar'){
		?>
		<div class="left-sidebar-right">
		<?php
	}
	?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php 
	if($page_layout=='left-sidebar' || $page_layout=='both-sidebar'){
	    get_sidebar('left');
	}
	if($page_layout=='both-sidebar'){
	    ?>
	    </div>
	    <?php
	}
	if($page_layout=='right-sidebar' || $page_layout=='both-sidebar'){
	 get_sidebar('right');
	}
?>
</div>
<?php
		
	if(get_theme_mod('wp_store_innerpage_setting_single_page_cta')=="1"){
		if(is_active_sidebar('widget-area-two')){
			?>
			<div class='widget-area'>
				<div class='ed-container'>
					<?php
					dynamic_sidebar('widget-area-two');
					?>
				</div>
			</div>			
			<?php
		}
	}


get_footer();
