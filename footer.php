<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Store
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<?php 
	$menu_option = has_nav_menu( 'wp_footer' );
	$social_option = get_theme_mod('wp_store_social_setting_section_option_footer',0);
	if( $menu_option || $social_option):?>
	<div class="footer-top <?php if($menu_option && !$social_option)echo esc_attr('menu');?> <?php if(!$menu_option && $social_option) echo esc_attr('social-link');?>">
		<div class="ed-container">
			<?php if($menu_option ):?>
				<div class="top-footer-menu">
					<?php 
					if ( has_nav_menu( 'wp_footer' ) ) {
						wp_nav_menu( array( 'theme_location' => 'wp_footer' ) );
					}							
					?>
				</div>
			<?php endif;?>
			<!-- Social Icons -->
			<?php if( get_theme_mod( 'wp_store_social_setting_section_option_footer', 0 ) ): ?>
			<div class="ed-social-footer">
				<?php do_action('wp_store_social'); ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
<?php endif;?>
<?php
if ( is_active_sidebar( 'footer-one' ) ||  is_active_sidebar( 'footer-two' )  || is_active_sidebar( 'footer-three' )  || is_active_sidebar( 'footer-four' )) : ?>
<div class="top-footer footer-column-<?php echo esc_attr(wp_store_footer_count()); ?>">

	<div class="ed-container">
		<?php if ( is_active_sidebar( 'footer-one' ) ) : ?>
			<div class="footer-block-one footer-block">
				<?php dynamic_sidebar( 'footer-one' ); ?>    							
			</div>
		<?php endif; ?>	

		<?php if ( is_active_sidebar( 'footer-two' ) ) : ?>
			<div class="footer-block-two footer-block">	    						
				<?php dynamic_sidebar( 'footer-two' ); ?>	    						
			</div>
		<?php endif; ?>	


		<?php if ( is_active_sidebar( 'footer-three' ) ) : ?>
			<div class="footer-block-three footer-block">    							
				<?php dynamic_sidebar( 'footer-three' ); ?>
			</div>
		<?php endif; ?>	

		<?php if ( is_active_sidebar( 'footer-four' ) ) : ?>
			<div class="footer-block-four footer-block">    						
				<?php dynamic_sidebar( 'footer-four' ); ?>    		                     
			</div>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>
<div class="site-info">
	<div class="ed-container">
		<div class="footer-copyright">
			<div class="copyright-text">
				<?php
				if(get_theme_mod('wp_store_footer_setting_footer_copyright_text') && get_theme_mod('wp_store_footer_setting_footer_copyright_text')!=""){
					echo wp_kses_post( get_theme_mod( 'wp_store_footer_setting_footer_copyright_text', '' ) );
				} else {
					?>
					<?php esc_html_e( 'Free WordPress Theme : ','wp-store' );?>
					<a title="<?php esc_attr_e( 'Free WordPress Theme','wp-store' );?>" href="<?php echo esc_url( 'https://8degreethemes.com/wordpress-themes/wp-store/', 'wp-store' ); ?>">
						<?php esc_html_e('Wp Store','wp-store');?>
					</a>
					<?php esc_html_e('by 8DegreeThemes','wp-store');					
				}
				?>
			</div>					
		</div>
		<!-- Payment Partner Logos -->
		<?php do_action('payment_partner_logos');?>

	</div>		
</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->
<div id="back-to-top"><i class="fa fa-long-arrow-up"></i></div>
<?php wp_footer(); ?>
</body>
</html>