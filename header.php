
<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Store
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<script type="text/javascript">
		var yith_wcwl_plugin_ajax_web_url = '<?php echo esc_url( admin_url('admin-ajax.php') ); ?>';
	</script>
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
	<div class="wp-store-preloader"></div>	
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'wp-store' ); ?></a>
		<?php $logo_alignment = get_theme_mod('wp_store_header_settings_logo_alignment','left');?>
		<header id="masthead" class="site-header <?php echo esc_attr($logo_alignment);?>" role="banner">
			<div class="top-header">
				<div class="ed-container">
					<?php 
					if(get_theme_mod('wp_store_social_setting_section_option_header',0)):?>
					<div class="ed-social-icons">
						<?php do_action('wp_store_social');?>
					</div>
					<?php
					endif;
					?>
					<?php 
					if(get_theme_mod('wp_store_header_setting_ticker_option',0)):?>
					<div class="ticker">
						<?php
						do_action('wp_store_ticker');
						?>
					</div>
					<?php
					endif;
					?>
					<div class="account-wrap">
						<div class="my-account">
							<a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>">
								<i class="fa fa-user"></i>
								<p><?php esc_html_e('My Account','wp-store');?></p>
							</a>
						</div>
						<?php
						if (function_exists('YITH_WCWL')) {
							$wishlist_url = YITH_WCWL()->get_wishlist_url();
							?>
							<!-- Wishlist Link -->
							<div class="wishlist-box">
								<a class="quick-wishlist" href="<?php echo esc_url($wishlist_url); ?>" title="<?php esc_attr_e('Wishlist','wp-store');?>">
									<i class="fa fa-heart"></i>
									<span class="my-wishlist">
										<?php esc_html_e('Wishlist','wp-store'); 
										if(yith_wcwl_count_products() > 0) echo ' ['.absint(yith_wcwl_count_products()).']'; ?></span>
									</a>
								</div>
								<?php
							}
							?>
							<div class="user-login">
								<?php
								//if user is logged in
								if(is_user_logged_in()){
									global $current_user;
									wp_get_current_user();
									?>						
									<a href="<?php echo esc_url(wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) )
); ?>" class="logout">
										<i class="fa fa-sign-out "></i>
										<?php esc_html_e('Logout','wp-store'); ?>
									</a>
									<?php
								} else{
									?>


								<a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>" class="login">
										<i class="fa fa-sign-in"></i>
										<?php esc_html_e('Login / Signup','wp-store'); ?>
									</a>
									<?php 
								}
								?>
							</div>
						</div>
					</div>
				</div>
				<div class="buttom-header">
					<div class="ed-container">
						<div class="site-branding">
							<div class="site-logo">
								<?php if ( has_custom_logo() ) :
								the_custom_logo();
								endif; // End logo check. ?>
							</div>
							<div class="site-text">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
									<p class="site-description"><?php bloginfo( 'description' ); ?></p>
								</a>
							</div>
						</div><!-- .site-branding -->
						<div class="wrap-right">
							<div class="header-call-to">
								<?php
								//call to us
								$header_callto = get_theme_mod('wp_store_header_setting_callto_text','');
								echo wp_kses_post( $header_callto );
								?>
							</div>
							<div class="header-cart">
								<?php 
									//echo es_woocommerce_cart_menu();
								if(wp_store_woocommerce_available()):
									?>
								<a class="cart-content" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'wp-store' ); ?>">
									<div class="count">
										<i class="fa fa-shopping-bag"></i>
										<span class="cart-title"><?php esc_html_e('Shopping Cart','wp-store');?></span>
										<span class="cart-count"><?php echo wp_kses_data(sprintf( _n( '%s Item', '%s Items', WC()->cart->get_cart_contents_count(), 'wp-store' ), WC()->cart->get_cart_contents_count() ) ); ?></span>
										<span class="cart-total"><?php echo wp_kses_data( WC()->cart->get_cart_total() ) ; ?></span>
									</div>	               	
								</a>
								<?php the_widget( 'WC_Widget_Cart' ); ?>
								<?php
								endif;
								?>
							</div>
						</div>
					</div>
				</div>
				<div class="menu-wrap">
					<div class="ed-container">
						<nav id="site-navigation" class="main-navigation" role="navigation">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'wp-store' ); ?></button>
							<div class="close"> &times; </div>
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
						</nav><!-- #site-navigation -->
						<?php if(get_theme_mod('wp_store_header_setting_search_option') =='1'){ ?>
						<div class="header-search">
							<a href="javascript:void(0)"><i class="fa fa-search"></i></a>
							<div class="search-box">
								<div class="close"> &times; </div>
								<?php get_template_part('searchform-header'); ?>
							</div>
						</div> <!--  search-form-->
						<?php } ?>
					</div>
				</div>
			</header><!-- #masthead -->

			<div id="content" class="site-content">
