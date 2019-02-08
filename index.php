<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Store
 */

get_header();
$page_for_posts = get_option( 'page_for_posts' );
$page_layout='right-sidebar';
if($page_for_posts!=0){
$page_layout = get_post_meta( $page_for_posts, 'wp_store_sidebar_layout', true );
}

if ( is_page_template('tpl-homepage.php') ) {  // Default homepage 
} elseif ( is_front_page() ) { 
	// static homepage 
} elseif ( is_home() ) {  // blog page 			
	
	$blog_cat = get_theme_mod('wp_store_homepage_setting_blog_category', '' );
	$blog_page_layout = get_theme_mod('wp_store_innerpage_setting_blog_page_layout','right-sidebar'); 
	$blog_post_layout = get_theme_mod('wp_store_innerpage_setting_blog_post_layout','large-image'); 
	$archive_page_layout = $blog_page_layout;
	$archive_post_layout = $blog_post_layout;
	$slider_page = get_theme_mod('wp_store_innerpage_setting_blog_page_slider',0);
	if($slider_page == '1'):
		do_action('wp_store_slider_section'); 
	endif;
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
				<div class="archive <?php echo esc_attr($archive_post_layout);?>">
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						$blog_readmore = get_theme_mod('wp_store_innerpage_setting_blog_page_readmore', esc_html__('Read More','wp-store')); 

						$blog_cat = get_theme_mod( 'wp_store_homepage_setting_blog_category','' );

						$archive_post_layout = get_theme_mod('wp_store_innerpage_setting_blog_post_layout','large-image'); 
						$archive_readmore = $blog_readmore;
						?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<header class="entry-header">
									<?php
										if ( is_single() ) {
											the_title( '<h1 class="entry-title">', '</h1>' );
										} else {
											the_title( '<h2 class="entry-title"><a href="' . esc_url( get_the_permalink() ) . '" rel="bookmark">', '</a></h2>' );
										}

									if ( 'post' === get_post_type() ) : ?>
									<div class="entry-meta">
										<?php wp_store_posted_on(); ?>
									</div><!-- .entry-meta -->
									<?php
									endif; ?>
								</header><!-- .entry-header -->
								<div class="content-thumbnail">
									<?php if(has_post_thumbnail()): ?>
										<div class="post-thumbnail">
											<?php
												$image_resize = 'wp-store-large-image';
											?>
											<?php the_post_thumbnail($image_resize); ?>
										</div>		
									<?php endif; ?>
									<div class="wrap-content">
										<div class="entry-content">
											<?php
													if(!is_single()):
														the_excerpt();	
														echo "<a href ='".esc_url(get_the_permalink())."'>".esc_html($archive_readmore)."</a>";	
													else:
														the_content();
													endif;

												wp_link_pages( array(
													'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-store' ),
													'after'  => '</div>',
												) );
											?>
										</div><!-- .entry-content -->

										<footer class="entry-footer">
											<?php wp_store_entry_footer(); ?>
										</footer><!-- .entry-footer -->
									</div>
								</div>
							</article>
							<?php

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
		if(get_theme_mod('wp_store_innerpage_setting_blog_page_cta')=="1"){
			if(is_active_sidebar('widget-area-two')){
				dynamic_sidebar('widget-area-two');
			}
		}
	get_footer();
	return;
} else { 
	//everything else 
}
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
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

				<?php
				endif;
		if ( is_page_template('tpl-homepage.php') ) {  // Default homepage 
		} elseif ( is_front_page() ) { 
			// static homepage 
		} elseif ( is_home() ) {  // blog page 			
			$classes[] .= 'archive';
		} else { 
			//everything else 
		}
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
		get_sidebar();
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