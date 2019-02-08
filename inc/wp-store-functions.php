<?php
// function for weblayout 
if( ! function_exists( 'wp_store_custom_weblayout_class' ) ){
	function wp_store_custom_weblayout_class($classes){
		$header_class = esc_attr(get_theme_mod('wp_store_basic_setting_webpage_layout','fullwidth'));
		$classes[] = $header_class;
		return $classes;
	}
}
add_filter( 'body_class', 'wp_store_custom_weblayout_class' );

// function for right sidebar in index page
if( ! function_exists( 'wp_store_custom_header_tag_index_page' ) ){
	function wp_store_custom_header_tag_index_page($classes){
		global $post;
		$header_class = '';
		if(is_front_page()){
			$header_class = 'right-sidebar';
			$page_for_posts = get_option( 'page_for_posts' );
			if($page_for_posts!=0){
				$header_class = get_post_meta( $page_for_posts, 'wp_store_sidebar_layout', true );
			}
		}
		elseif(is_home()){
			$header_class .= esc_attr(get_theme_mod('wp_store_innerpage_setting_blog_page_layout','right-sidebar'));
		}
		$classes[] = esc_attr( $header_class );
		return $classes;
	}
}
add_filter( 'body_class', 'wp_store_custom_header_tag_index_page' );

// function for blog post
if( ! function_exists( 'wp_store_blog_post' ) ){
	function wp_store_blog_post($classes){
		if ( is_page_template('tpl-homepage.php') ) {  // Default homepage 
		} elseif ( is_front_page() ) { 
			// static homepage 
		} elseif ( is_home() ) {  // blog page 			
			$classes[] .= 'archive';
		} else { 
			//everything else 
		}
		return $classes;
	}
}
add_filter( 'body_class', 'wp_store_blog_post' );
	// function for archive pagelayout in body class 
if( ! function_exists( 'wp_store_custom_header_tag_archive_page' ) ){
	function wp_store_custom_header_tag_archive_page($classes){
		$header_class = "";
		$blog_cat= esc_attr(get_theme_mod('wp_store_homepage_setting_blog_category'));
		if(function_exists('is_shop') && is_shop()):
			$header_class = 'right-sidebar';
	elseif(is_archive() && !is_category($blog_cat) ):
		$header_class .= esc_attr(get_theme_mod('wp_store_innerpage_setting_archive_layout','right-sidebar'));
elseif(is_archive() && is_category($blog_cat) ):
	$header_class .= esc_attr(get_theme_mod('wp_store_innerpage_setting_blog_page_layout','right-sidebar'));
endif;
$classes[] = $header_class;
return $classes;
}
}
add_filter( 'body_class', 'wp_store_custom_header_tag_archive_page' );

// function for Single page in body class.
if( ! function_exists( 'wp_store_custom_header_tag_single_page' ) ){
	function wp_store_custom_header_tag_single_page($classes){
		global $post;
		$header_class = "";
		if(is_page() && !(is_home() || is_front_page())){
			$sidebar = esc_attr(get_post_meta( $post -> ID, 'wp_store_sidebar_layout', true ));
			if(!empty($sidebar)):
				$header_class .= $sidebar;
			else:
				$header_class .= esc_attr(get_theme_mod('wp_store_innerpage_setting_single_page_layout','right-sidebar'));
			endif;		        
		}
		$classes[] = $header_class;
		return $classes;
	}
}
add_filter( 'body_class', 'wp_store_custom_header_tag_single_page' );

// function for Single post in body class.
if( ! function_exists( 'wp_store_custom_header_tag_single_post' ) ){
	function wp_store_custom_header_tag_single_post($classes){
		global $post;
		$header_class = "";
		if(function_exists('is_product') && is_product()):
			$header_class= 'right-sidebar';

	elseif(is_single()):
		$sidebar = esc_attr(get_post_meta( $post -> ID, 'wp_store_sidebar_layout', true ));
		if(!empty($sidebar)):
			$header_class .= $sidebar;
		else:
			$header_class .= esc_attr(get_theme_mod('wp_store_innerpage_setting_single_post_layout','right-sidebar'));
		endif;		        
	endif;
	$classes[] = $header_class;
	return $classes;
}
}
add_filter( 'body_class', 'wp_store_custom_header_tag_single_post' );

// function for search in body class.
if( ! function_exists( 'wp_store_custom_header_tag_search' ) ){
	function wp_store_custom_header_tag_search($classes){
		global $post;
		$header_class = "";
		if(is_search()){
			$sidebar = 'right-sidebar';
			$header_class .= esc_attr($sidebar);
		}
		$classes[] = $header_class;
		return $classes;
	}
}
add_filter( 'body_class', 'wp_store_custom_header_tag_search' );

function wp_store_category_lists(){
	$category 	=	get_categories();
	$cat_list 	=	array();
	$cat_list[0]=	__('Select category','wp-store');
	foreach ($category as $cat) {
		$cat_list[$cat->term_id]	=	$cat->name;
	}
	return $cat_list;
}

function wp_store_parent_category_lists(){
	$category 	=	get_categories( array(
		'hide_empty' => 1,
		'orderby' => 'name',
		'parent'  => 0,
	));
	$cat_list 	=	array();
	$cat_list[0]=	__('Select Parent category','wp-store');
	foreach ($category as $cat) {
		$cat_list[$cat->term_id]	=	$cat->name;
	}
	return $cat_list;
}

	// count no. of footers in footer
function wp_store_footer_count(){
	$count = 0;
	if(is_active_sidebar('footer-one'))
		$count++;

	if(is_active_sidebar('footer-two'))
		$count++;

	if(is_active_sidebar('footer-three'))
		$count++;

	if(is_active_sidebar('footer-four'))
		$count++;

	return $count;
}


/** Function to add span in the title */
function wp_store_get_title($title){
	$wp_title = '';
	$arr = explode(' ', $title);
	$count = count($arr);
	if( $count > 1 ){
		$i=0;
		$wp_title .= "<p class='first-three'>".$arr[$i++];
		if($count>=2){$wp_title .= " ".$arr[$i++];}
		if($count>=3){$wp_title .= " ".$arr[$i++];}
		$wp_title .= "</p>";
		$wp_title .= "<p class='other-all'>";
		for ($j=$i; $j < $count; $j++) { 
			$wp_title .= $arr[$j]." ";
		}
		$wp_title .= "</p>";
		apply_filters('the_title', $wp_title);
	}else{
		apply_filters('the_title', $title);
	}
}

function wp_store_count_widgets( $sidebar_id ) {
			// If loading from front page, consult $_wp_sidebars_widgets rather than options
			// to see if wp_convert_widget_settings() has made manipulations in memory.
	global $_wp_sidebars_widgets;
	if ( empty( $_wp_sidebars_widgets ) ){
		$sidebars_widgets_count = get_option( 'sidebars_widgets', array() );
	}
	else{
		$sidebars_widgets_count = $_wp_sidebars_widgets;
	}

	if ( isset( $sidebars_widgets_count[ $sidebar_id ] ) ) :
		$widget_count = count( $sidebars_widgets_count[ $sidebar_id ] );
		$widget_classes = 'wp-store-widget-count-' . $widget_count;
		return esc_attr($widget_classes);
	endif;
}


	// Function for using Slider
function wp_store_slider_section_cb(){

	$slider_category = get_theme_mod('wp_store_homepage_setting_slider_category');
	$show_pager = (get_theme_mod('wp_store_homepage_setting_slider_pager',0) == "1") ? "true" : "false";
	$show_controls = (get_theme_mod('wp_store_homepage_setting_slider_controls',0) == "1") ? "true" : "false";
	$auto_transition = (get_theme_mod('wp_store_homepage_setting_slider_transition_auto',0) == "1") ? "true" : "false";
	$slider_transition = get_theme_mod('wp_store_homepage_setting_slider_transition_type','fade');
	$slider_speed = get_theme_mod('wp_store_homepage_setting_slider_transition_speed','1000');
	$show_caption = get_theme_mod('wp_store_homepage_setting_slider_caption',0);
	if($auto_transition=='true'){ $auto_transition = $slider_speed; }
	?>
	<section id="slider-section" class="slider">
		<script type="text/javascript">
			jQuery(document).ready(function($) { 
				$("#main-slider").owlCarousel({
					autoPlay: <?php echo esc_attr($auto_transition); ?>,
					navigation: <?php echo esc_attr($show_controls); ?>,
					pagination: <?php echo esc_attr($show_pager); ?>,
					transitionStyle: "<?php echo esc_attr($slider_transition); ?>",
					singleItem:true,
					paginationNumbers: true,						
					loop: true,
					afterAction: function(el){ 
						//remove class active 
						this .$owlItems .removeClass('active')
							//add class active 
							this .$owlItems //owl internal $ object containing items 
							.eq(this.currentItem) .addClass('active') 
						}
					}); 

			});

		</script>
		<?php
		$loop = new WP_Query(array(
			'cat' => $slider_category,
			'posts_per_page' => -1    
		));

		?>
		<div id="main-slider" class = "owl-slider">
			<?php
			if($loop->have_posts()) : 
				while($loop->have_posts()) : $loop-> the_post();
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full', false );		                    
					?>
					<div class="slides" style="background-image:url(<?php echo esc_url($image[0]); ?>);">
						<?php if($show_caption == '1'): ?>
							<div class="caption-wrapper">  
								<div class="ed-container">
									<div class="slider-caption">
										<div class="mid-content">
											<div class="small-caption"> 
												<?php the_title(); ?>										
											</div>
											<div class="slider-content">
												<?php the_content(); 
												?>
											</div>

										</div>
									</div>
								</div>
							</div>  
						<?php  endif; ?> 
					</div>
					<?php 
				endwhile;
				wp_reset_query();
			endif; ?>
		</div>  
	</section>			
	<?php
}
add_action('wp_store_slider_section','wp_store_slider_section_cb', 10);

	// Function to use promo section
function wp_store_promo_section_cb(){
	$promo_option = get_theme_mod('wp_store_homepage_setting_promo_option',0);
	if($promo_option == 1):
		$promo_category = get_theme_mod('wp_store_homepage_setting_promo_category');
		?>
		<div id="promo-section" class = 'clearfix'>
			<?php 
			$args = array('cat' => $promo_category, 'post_status' => 'publish','post_type' => 'post');
			$query = new WP_Query($args);
			while($query->have_posts()):
				$query->the_post();
				if(has_post_thumbnail()):
					?>
					<div class = 'promo-block'>
						<?php the_post_thumbnail('wp-store-medium-image');?>
						<div class='promo-text'>
							<div class='category'><?php the_category(get_the_ID());?></div>
							<div class='title'><?php the_title();?></div>
						</div>
					</div>
					<?php
				endif;
			endwhile;
			wp_reset_query();
			?>
		</div>
		<?php 
	endif;
}
add_action('wp_store_promo_section','wp_store_promo_section_cb');

	// fucntion to add social icons
function wp_store_social_cb(){
	$facebooklink = get_theme_mod('wp_store_social_facebook','#' );
	$twitterlink =  get_theme_mod('wp_store_social_twitter','#' );
	$google_pluslink =  get_theme_mod('wp_store_social_googleplus','#' ) ;
	$youtubelink =  get_theme_mod('wp_store_social_youtube','#' ) ;
	$pinterestlink =  get_theme_mod('wp_store_social_pinterest', '' ) ;
	$linkedinlink =  get_theme_mod('wp_store_social_linkedin', '' ) ;
	$vimeolink =  get_theme_mod('wp_store_social_vimeo', '' ) ;
	$instagramlink =  get_theme_mod('wp_store_social_instagram', '' ) ;
	$skypelink =  get_theme_mod('wp_store_social_skype', '' );

	?>
	<div class="social-icons ">
		<?php if(!empty($facebooklink)){ ?>
			<a href="<?php echo esc_url( $facebooklink ); ?>" class="facebook" data-title="<?php esc_html_e( 'Facebook','wp-store' );?>" target="_blank"><i class="fa fa-facebook"></i><span></span></a>
			<?php 
		} ?>

		<?php if(!empty($twitterlink)){ ?>
			<a href="<?php echo esc_url( $twitterlink ); ?>" class="twitter" data-title="<?php esc_html_e( 'Twitter','wp-store' );?>" target="_blank"><i class="fa fa-twitter"></i><span></span></a>
			<?php 
		} ?>

		<?php if(!empty($google_pluslink)){ ?>
			<a href="<?php echo esc_url( $google_pluslink ); ?>" class="gplus" data-title="<?php esc_html_e( 'Google Plus','wp-store' );?>" target="_blank"><i class="fa fa-google-plus"></i><span></span></a>
			<?php 
		} ?>

		<?php if(!empty($youtubelink)){ ?>
			<a href="<?php echo esc_url( $youtubelink ); ?>" class="youtube" data-title="<?php esc_html_e( 'Youtube','wp-store' );?>" target="_blank"><i class="fa fa-youtube"></i><span></span></a>
			<?php 
		} ?>

		<?php if(!empty($pinterestlink)){ ?>
			<a href="<?php echo esc_url( $pinterestlink ); ?>" class="pinterest" data-title="<?php esc_html_e( 'Pinterest','wp-store' );?>" target="_blank"><i class="fa fa-pinterest"></i><span></span></a>
			<?php 
		} ?>

		<?php if(!empty($linkedinlink)){ ?>
			<a href="<?php echo esc_url( $linkedinlink ); ?>" class="linkedin" data-title="<?php esc_html_e( 'Linkedin','wp-store' );?>" target="_blank"><i class="fa fa-linkedin"></i><span></span></a>
			<?php 
		} ?>

		<?php if(!empty($vimeolink)){ ?>
			<a href="<?php echo esc_url( $vimeolink ); ?>" class="vimeo" data-title="<?php esc_html_e( 'Vimeo','wp-store' );?>" target="_blank"><i class="fa fa-vimeo-square"></i><span></span></a>
			<?php 
		} ?>

		<?php if(!empty($instagramlink)){ ?>
			<a href="<?php echo esc_url( $instagramlink ); ?>" class="instagram" data-title="<?php esc_html_e( 'Instagram','wp-store' );?>" target="_blank"><i class="fa fa-instagram"></i><span></span></a>
			<?php 
		} ?>

		<?php if(!empty($skypelink)){ ?>
			<a href="<?php echo esc_attr('skype:', 'wp-store'). esc_attr( $skypelink ); ?>" class="skype" data-title="<?php esc_html_e( 'Skype','wp-store' );?>"><i class="fa fa-skype"></i><span></span></a>
			<?php 
		} ?>
	</div>
	<?php
}
add_action('wp_store_social','wp_store_social_cb');

// function for adding ticker
function wp_store_ticker_cb(){
	//Check if ticker is enabled
	$wp_store_ticker = get_theme_mod('wp_store_header_setting_ticker_option','0');
	if($wp_store_ticker==1)
	{
		$ticker_title = get_theme_mod('wp_store_header_setting_ticker_title',esc_html__('Latest','wp-store'));
		$ticker_category = get_theme_mod('wp_store_header_setting_ticker_category','');
		if(empty($ticker_title)){
			$ticker_title= esc_html__('Latest','wp-store');
		}
		if( !empty($ticker_category)) {
			?>
			<div class="top-ticker">
				<script>
					jQuery(document).ready(function($){
						$('#ticker').slick({
							slidesToShow: 1,
							slidesToScroll: 1,
							autoplay: true,
							autoplaySpeed: 3000,
							speed:2000,
							cssEase:'ease',
							arrows:false
						});
					});//jquery close
				</script> <!-- close script -->
				<?php
				$loop = new WP_Query(array(
					'cat' => $ticker_category,
					'posts_per_page' => -1    
				));
				if($loop->have_posts()) {
					?>
					<span class="ticker-title"><?php echo esc_html( $ticker_title);?></span>
					<ul id="ticker" class="hidden">
						<?php
						$i=0;
						while($loop->have_posts()){
							$loop->the_post();
							$i++;
							?>
							<li>
								<h5 class="ticker_tick ticker-h5-<?php echo esc_attr($i); ?>"><a href="<?php the_permalink();?>"><?php the_title(); ?> </a></h5>
							</li>
							<?php  
						}
						?>
					</ul>
					<?php
				}
				wp_reset_query();
				?>
			</div>
			<?php
		}
	}
}

add_action('wp_store_ticker','wp_store_ticker_cb');

	// Funtion to add payment partner logo
function wp_store_payment_partner_logos(){
	$payment_partner_1 = get_theme_mod('wp_store_paymentlogo_setting_image_one', '' );
	$payment_partner_2 = get_theme_mod('wp_store_paymentlogo_setting_image_two', '' );
	$payment_partner_3 = get_theme_mod('wp_store_paymentlogo_setting_image_three', '' );
	$payment_partner_4 = get_theme_mod('wp_store_paymentlogo_setting_image_four', '' );
	$ssl_seal = get_theme_mod('wp_store_paymentlogo_setting_other_image_one', '' );
	$other_seal_1 = get_theme_mod('wp_store_paymentlogo_setting_other_image_two', '' );
	$other_seal_2 = get_theme_mod('wp_store_paymentlogo_setting_other_image_three', '' );
	if($payment_partner_1!="" || $payment_partner_2!="" || $payment_partner_1!="" || $payment_partner_4!="" || $ssl_seal!="" || $other_seal_1!="" || $other_seal_1!="")
	{
		?>
		<div class="payment-partner">
			<div class="store=wrapper">
				<?php if(!empty($payment_partner_1)): ?>
					<img id="partner_logo1" class="partner-logos" src="<?php echo esc_url($payment_partner_1)?>" alt="<?php esc_html_e('Partner Logo 1', 'wp-store') ?>" />
				<?php endif; ?>

				<?php if(!empty($payment_partner_2)): ?>
					<img id="partner_logo2" class="partner-logos" src="<?php echo esc_url($payment_partner_2)?>" alt="<?php esc_html_e('Partner Logo 2', 'wp-store') ?>" />
				<?php endif; ?>

				<?php if(!empty($payment_partner_3)): ?>
					<img id="partner_logo3" class="partner-logos" src="<?php echo esc_url($payment_partner_3)?>" alt="<?php esc_html_e('Partner Logo 3', 'wp-store') ?>" />
				<?php endif; ?>

				<?php if(!empty($payment_partner_4)): ?>
					<img id="partner_logo4" class="partner-logos" src="<?php echo esc_url($payment_partner_4)?>" alt="<?php esc_html_e('Partner Logo 4', 'wp-store') ?>" />
				<?php endif; ?>

				<?php if(!empty($ssl_seal)): ?>
					<img id="ssl_seal" class="partner-logos" src="<?php echo esc_url($ssl_seal)?>" alt="<?php esc_html_e('SSL Seal', 'wp-store') ?>" />
				<?php endif; ?>

				<?php if(!empty($other_seal_1)): ?>
					<img id="other_seal1" class="partner-logos" src="<?php echo esc_url($other_seal_1)?>" alt="<?php esc_html_e('Other Seal 1', 'wp-store') ?>" />
				<?php endif; ?>

				<?php if(!empty($other_seal_2)): ?>
					<img id="other_seal2" class="partner-logos" src="<?php echo esc_url($other_seal_2)?>" alt="<?php esc_html_e('Other Seal 2', 'wp-store') ?>" />
				<?php endif; ?>
			</div>
		</div>
		<?php
	}
}
add_action('payment_partner_logos','wp_store_payment_partner_logos', 10);

if ( ! function_exists( 'wp_store_woocommerce_available' ) ) {
	function wp_store_woocommerce_available() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}
if(wp_store_woocommerce_available()):
	function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
		global $post;

		if ( has_post_thumbnail() ) {
			return get_the_post_thumbnail( $post->ID, $size );
		} elseif ( wc_placeholder_img_src() ) {
			$placeholder = wp_store_wc_placeholder_img_src();
			$alt = get_the_title();
			$placeholder_img = '<img src="'.esc_url($placeholder).'" alt="'.esc_attr($alt).'" />';
			return $placeholder_img;
		}
	}

	function wp_store_wc_placeholder_img_src(){
		$placeholder = "";
		$custom_placeholder = get_theme_mod('wp_store_woocommerce_setting_product_image', '');
		if($custom_placeholder!=''){
			$placeholder = $custom_placeholder;
		}
		else{
			$placeholder = get_template_directory_uri()."/images/noimage.jpg";//wc_placeholder_img_src();
		}
		return esc_url($placeholder);
	}




	//Declare Woocommerce support
	add_action( 'after_setup_theme', 'wp_store_woocommerce_support' );
	function wp_store_woocommerce_support() {
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}

	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
	remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);


	add_action('woocommerce_before_main_content', 'wp_store_wrapper_start', 10);
	add_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 10);
	add_action('woocommerce_before_main_content', 'wp_store_primary', 10);
	add_action('woocommerce_after_main_content', 'wp_store_wrapper_end', 10);

	function wp_store_wrapper_start(){
		$woo_slider_option = get_theme_mod('wp_store_woocommerce_setting_page_slider',0);
		if($woo_slider_option == '1'):
			do_action('wp_store_slider_section'); // Slider section- this function is in wp-store-function.php
		endif;
		echo '<div class="ed-container">';
	}

	// to add primary div after breadcrumb
	function wp_store_primary(){		
		echo '<div id="primary">';
	}

	function wp_store_wrapper_end(){
		remove_action('woocommerce_sidebar','woocommerce_get_sidebar');
		echo '</div>';
		//adding shop-sidebar in shop page
		if(is_active_sidebar('shop-sidebar')){
			?>
			<div class='shop-sidebar'>
				<?php 
				dynamic_sidebar('shop-sidebar');	
				?>
			</div>
			<?php			
		}
		echo'</div>';

		// adding widget are two
		if(get_theme_mod('wp_store_woocommerce_setting_page_cta')=="1"){
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
	}

	//For shop page products no.of columns in a row and no. of products in a page
	add_filter('loop_shop_columns', 'wp_store_loop_columns');
	if (!function_exists('wp_store_loop_columns')) {
		function wp_store_loop_columns() {
				// Change number or products per row to $xr
			if(get_theme_mod('wp_store_woocommerce_setting_product_rows', '') && get_theme_mod('wp_store_woocommerce_setting_product_rows', '')>0){
				$xr =  get_theme_mod('wp_store_woocommerce_setting_product_rows','');
			} else {
				$xr = 3;
			}
			return intval($xr); 
		}
	}
	global $num_products;
	// Display $num_products products per page.
	if(get_theme_mod('wp_store_woocommerce_setting_product_total',12) && get_theme_mod('wp_store_woocommerce_setting_product_total',12)>0){

		$num_products = get_theme_mod('wp_store_woocommerce_setting_product_total',12);
	} else {
		$num_products = 12;
	}
	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.intval($num_products).';' ), 20 );


	if ( class_exists('YITH_WCWL') ) {
		if (function_exists('YITH_WCWL')) {

			add_action('woocommerce_before_shop_loop_item_title', 'wp_store_show_add_to_wishlist', 11 );
			function wp_store_show_add_to_wishlist(){
				if(class_exists( 'YITH_WCQV_Frontend' )){
					echo "<div class='whislist-quickview'>";
				}
				echo do_shortcode('[yith_wcwl_add_to_wishlist]');
			}

			add_action('woocommerce_single_product_summary', 'wp_store_add_to_wishlist_single_product', 35 );
			function wp_store_add_to_wishlist_single_product(){
				echo do_shortcode('[yith_wcwl_add_to_wishlist]');	
			}


			// Use Ajax for Whislist at the header

			if ( !function_exists( 'wp_store_whilist_ajax' ) ) {

				function wp_store_whilist_ajax(){
					$wishlist_url = YITH_WCWL()->get_wishlist_url();
					?>
					<!-- Wishlist Link -->
					<div class="wishlist-box">
						<a class="quick-wishlist" href="<?php echo esc_url($wishlist_url); ?>" title="<?php esc_attr_e('Wishlist','wp-store');?>">
							<i class="fa fa-heart"></i>
							<span class="my-wishlist">
								<?php esc_html_e('Whishlist','wp-store'); 
								if(yith_wcwl_count_products() > 0) echo ' ['.absint(yith_wcwl_count_products()).']'; ?>		
							</span>
						</a>
					</div>
					<?php			
				}	

			}
			// Header wishlist icon ajax update
			add_action( 'wp_ajax_yith_wcwl_update_single_product_list', 'wp_store_whilist_ajax' );
			add_action( 'wp_ajax_nopriv_yith_wcwl_update_single_product_list', 'wp_store_whilist_ajax' );
		}
	}



	if( class_exists( 'YITH_WCQV_Frontend' ) ){

		$quick_view = YITH_WCQV_Frontend();
		remove_action('woocommerce_after_shop_loop_item', array( $quick_view, 'yith_add_quick_view_button' ), 15 );
		add_action( 'woocommerce_before_shop_loop_item_title', array( $quick_view, 'yith_add_quick_view_button' ), 11 );

		add_action( 'woocommerce_before_shop_loop_item_title',  'wp_store_div_after_yith_add_quick_view_button' , 11 );
		function wp_store_div_after_yith_add_quick_view_button(){
			if(function_exists('YITH_WCWL') ){
				echo "</div>";
			}
		}

	}

	remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open',10);
	remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',10);
	add_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_link_open',13);
	add_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_link_close',15);

	

	add_action('woocommerce_before_shop_loop_item', 'wp_store_wrapper_woocommerce_before_shop_loop_item_title', 5);
	add_action('woocommerce_shop_loop_item_title', 'wp_store_wrapper_woocommerce_after_shop_loop_item_title', 12);
	// start wrap-image-sale div
	function wp_store_wrapper_woocommerce_before_shop_loop_item_title() {
		echo '<div class="wrap-image-sale">';
		echo '<a href="'. esc_url( get_the_permalink() ) .'">';
	}

	function wp_store_wrapper_woocommerce_after_shop_loop_item_title() {
		echo "</a>";
		echo '</div>';
	}
	// end for div wrap
	remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);
	add_action('woocommerce_shop_loop_item_title', 'wp_store_woocommerce_wp_store_single_title',14);

	if ( ! function_exists( 'wp_store_woocommerce_wp_store_single_title' ) ) {
		function wp_store_woocommerce_wp_store_single_title() {
			?>
			<h3 class="product-title "><?php the_title(); ?></h3>
			<?php
		}
	}

	// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
	add_filter( 'woocommerce_add_to_cart_fragments', 'wp_store_woocommerce_header_add_to_cart_fragment' );
	function wp_store_woocommerce_header_add_to_cart_fragment( $fragments ) {
		ob_start();		 
		if(wp_store_woocommerce_available()):
			?>
			<a class="cart-content" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'wp-store' ); ?>">
				<div class="count">
					<i class="fa fa-shopping-bag"></i>
					<span class="cart-title"><?php esc_html_e('Shopping Cart','wp-store');?></span>
					<span class="cart-count"><?php echo wp_kses_data(sprintf( _n( '%1$s Item', '%1$s Items', WC()->cart->get_cart_contents_count(), 'wp-store' ), WC()->cart->get_cart_contents_count() ) ); ?></span>
					<span class="cart-total"><?php echo wp_kses_data( WC()->cart->get_cart_total() ) ; ?></span>
				</div>	               	
			</a>
			<?php
		endif;				
		$fragments['a.cart-content'] = ob_get_clean();
		return wp_kses_post( $fragments );
	}


	add_action('woocommerce_before_shop_loop', 'wp_store_wrapper_before_products', 40);
	add_action('woocommerce_after_shop_loop', 'wp_store_wrapper_woocommerce_after_shop_loop_item_title', 20);
	// start wrap-image-sale div
	function wp_store_wrapper_before_products() {
		if ( empty( $woocommerce_loop['columns'] ) ) {
			$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );
		}
		if(isset($woocommerce_loop['columns'])){
			$cols = $woocommerce_loop['columns'];
		}		
		else{
			$cols='3';
		}
		echo '<div class="wp-store-products columns-'.esc_attr($cols).'">';
	}

	function wp_store_wrapper_after_products() {
		echo '</div>';
	}
endif;