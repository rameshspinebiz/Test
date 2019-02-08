<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Store
 */

get_header();
$blog_cat = get_theme_mod('wp_store_homepage_setting_blog_category', 0 );
$blog_page_layout = get_theme_mod('wp_store_innerpage_setting_blog_page_layout','right-sidebar'); 
$blog_post_layout = get_theme_mod('wp_store_innerpage_setting_blog_post_layout','large-image'); 

$archive_post_layout = get_theme_mod('wp_store_innerpage_setting_archive_post_layout','large-image'); 
$archive_page_layout = get_theme_mod('wp_store_innerpage_setting_archive_layout','right-sidebar'); 

if(!empty($blog_cat) && is_category($blog_cat) ){
	$archive_page_layout = $blog_page_layout;
	$archive_post_layout = $blog_post_layout;
	$slider_page = get_theme_mod('wp_store_innerpage_setting_blog_page_slider',0);
	if($slider_page == '1'):
		do_action('wp_store_slider_section'); 
	endif;
}
elseif(is_archive() && !is_category() ){
	$slider_page = get_theme_mod('wp_store_innerpage_setting_archive_slider',0);
	if($slider_page == '1'):
		do_action('wp_store_slider_section'); 
	endif;
}
?>
<div class="ed-container">
	<?php
	if($archive_page_layout=='both-sidebar'){
		?>
		<div class="left-sidebar-right">
		<?php
	}
	?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">				
				<?php
					the_archive_title( '<h1 class="page-title"><span>', '</span></h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<div class="archive <?php echo esc_attr($archive_post_layout);?>">
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php 
	if($archive_page_layout=='left-sidebar' || $archive_page_layout=='both-sidebar'){
	    get_sidebar('left');
	}
	if($archive_page_layout=='both-sidebar'){
	    ?>
	        </div>
	    <?php
	}
	if($archive_page_layout=='right-sidebar' || $archive_page_layout=='both-sidebar'){
	 get_sidebar('right');
	}
?>
</div>
<?php

if(is_category($blog_cat)):
	if(get_theme_mod('wp_store_innerpage_setting_blog_page_cta')=="1"){
		if(is_active_sidebar('widget-area-two')){
			dynamic_sidebar('widget-area-two');
		}
	}
endif;
if(is_archive()):
	if(get_theme_mod('wp_store_innerpage_setting_archive_cta')=="1"){
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
	
endif;
get_footer();
