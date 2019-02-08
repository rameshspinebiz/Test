<?php
/**
  *
 * @package WP_Store
 */
$search = get_theme_mod('wp_store_header_setting_search_placeholder',__('Search...','wp-store'));
?>
<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<div class="search-in-select">
		<select name="post_type" class="select-search-type">
			<option value=""><?php esc_html_e('All','wp-store');?></option>
			<option value="product"><?php esc_html_e('Product','wp-store');?></option>
			<option value="post"><?php esc_html_e('Post','wp-store');?></option>
		</select>
	</div>
	<input type="text" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" class="search-field" placeholder="<?php echo esc_attr($search); ?>" />
</form>