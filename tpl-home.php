<?php
/**
* Template Name: Homepage	
*
* @package WP_Store
*/
get_header();
$slider_option = get_theme_mod('wp_store_homepage_setting_slider_option',0);
if($slider_option == '1'):
	do_action('wp_store_slider_section'); // Slider section- this function is in wp-store-function.php
endif;
?>
<div class="ed-container">
	<?php
	
	do_action('wp_store_promo_section');	// Promo section- this function is in wp-store-function.php
	
	// Widget area one section starts
	$widget_area_one = get_theme_mod('wp_store_homepage_setting_widget1_option',0);
		if($widget_area_one == '1'):
		?>
		<div id='widget-area-one-section'>
			<?php
			if(is_active_sidebar('widget-area-one')):
				dynamic_sidebar( 'widget-area-one' );
			endif;
			?>
		</div>
	<?php 
		endif;
	// Widget area one section ends

	// Call to action Section Starts
	$cta_section = get_theme_mod('wp_store_homepage_setting_cta_option',0);
		if($cta_section == '1'):
			?>
			<div id='cta-section'>
				<?php
				$cta_title = get_theme_mod('wp_store_homepage_setting_cta_title',__('Unique and Elegant Unique Rolex','wp-store'));
				$cta_sub_title = get_theme_mod('wp_store_homepage_setting_cta_subtitle',__('Milancelos A Lanos de Rolex','wp-store'));
				$cta_desc = get_theme_mod('wp_store_homepage_setting_cta_desc');
				$cta_readmore = get_theme_mod('wp_store_homepage_setting_cta_readmore',__('Read More','wp-store'));
				$cta_readmore_link = get_theme_mod('wp_store_homepage_setting_cta_readmore_link','#');
				$image = get_theme_mod('wp_store_homepage_setting_cta_bg_image');
				?>
				<div class="cta-content">
					<h2><?php echo esc_html($cta_title);?></h2>
					<h4><?php echo esc_html($cta_sub_title);?></h4>
					<p><?php echo esc_textarea($cta_desc);?></p>
					<?php if( !empty( $cta_readmore_link ) ):?>
						<a href="<?php echo esc_url($cta_readmore_link);?>">
							<?php echo esc_html($cta_readmore);?>
						</a>
					<?php endif;?>
				</div>
				<figure>
					<img src="<?php echo esc_url($image);?>" alt='<?php echo esc_attr($cta_title);?>'/>
				</figure>

			</div>
		<?php 
			endif;
	// Call to action section ends

	// Product area section starts
	$product_section = get_theme_mod('wp_store_homepage_setting_product_option',0);
		if($product_section == '1'):
		?>
		<div id='product-area-section'>
			<?php
			if(is_active_sidebar('product-area')):
				dynamic_sidebar( 'product-area' );
			endif;
			?>
		</div>
	<?php 
		endif;
	// Product area section ends

	// Widgets area 2 section starts
	$widget_area_two = get_theme_mod('wp_store_homepage_setting_widget2_option',0);
		if($widget_area_two == '1'):
		?>
		<div id='widget-area-two-section'>
			<?php
			if(is_active_sidebar('widget-area-two')):
				dynamic_sidebar( 'widget-area-two' );
			endif;
			?>
		</div>
	<?php 
		endif;
	// Widget area 2 section ends

	// blog section starts
	$blog_section = get_theme_mod('wp_store_homepage_setting_blog_option',0);
	if($blog_section == 1):
	?>
		<div id="blog-section">
			<?php 
			$blog_title = get_theme_mod('wp_store_homepage_setting_blog_title',esc_html__('Get Updated Blogs','wp-store'));
			$blog_category = get_theme_mod('wp_store_homepage_setting_blog_category', '' );
			?>
			<h3 class="section-title"><span><?php echo esc_html($blog_title);?></span></h3>
			<?php
			$args = array('cat' => $blog_category, 'post_status' => 'publish', 'posts_per_page'=> 3);
			$query = new WP_Query($args);
			while($query->have_posts()):
				$query->the_post();
				?>
				<div class="blogs">
					<?php 
					if(has_post_thumbnail()):
					?>
					<a href="<?php the_permalink();?>">
						<?php the_post_thumbnail('wp-store-medium-image');?>
					</a>
					<h5><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
					<span class="blog-comment"><i class="fa fa-comment-o"></i>
					<?php echo esc_html(get_comments_number()).' '. esc_html__('Comments','wp-store');?></span><span class="blog-date"><i class="fa fa-clock-o"></i><?php echo get_the_date(('d,M,Y'),get_the_ID());?></span>
					<p><?php the_excerpt();?></p>
					<?php
					endif;
					?>
				</div>
				<?php
			endwhile;				
			wp_reset_query();
			?>
		</div>
	<?php
	endif;
	//blog section ends 

	// widget area 3 section starts
	$widget_area_three = get_theme_mod('wp_store_homepage_setting_widget3_option',0);
		if($widget_area_three == '1'):
		?>
		<div id='widget-area-three-section'>
			<?php
			if(is_active_sidebar('widget-area-three')):
				dynamic_sidebar( 'widget-area-three' );
			endif;
			?>
		</div>
	<?php 
		endif;

	// widget area 3 section ends

	// widget icon section starts
	$widget_icon_section = get_theme_mod('wp_store_homepage_setting_widget_icon_option',0);
		if($widget_icon_section == '1'):
		?>
		<div id='widget-icon-section'>
			<?php
			if(is_active_sidebar('widget-icon')):
				dynamic_sidebar( 'widget-icon' );
			endif;
			?>
		</div>
	<?php 
		endif;

	// widget icon section ends

	// brand section starts
	$brand_section = get_theme_mod('wp_store_homepage_setting_brand_option',0);
	if($brand_section == 1):
	?>
		<div id="brand-section">
			<?php 
			$brand_title = get_theme_mod('wp_store_homepage_setting_brand_title', esc_html__('Brands We Have','wp-store'));
			$brand_category = get_theme_mod('wp_store_homepage_setting_brand_category');
			?>
			<h3 class="section-title"><span><?php echo esc_html($brand_title);?></span></h3>
			<?php
			$brands_args = array('cat' => $brand_category, 'post_status' => 'publish', 'posts_per_page'=> 5);
			$brands = new WP_Query($brands_args);
			while($brands->have_posts()):
				$brands->the_post();
				?>
				<div class="brands">
					<?php 
					if(has_post_thumbnail()):
						the_post_thumbnail('small');
					endif;
					?>
				</div>
				<?php
			endwhile;				
			wp_reset_query();
			?>
		</div>
	<?php
	endif;
	//brand section ends 
	?>
</div>
<?php
get_footer();