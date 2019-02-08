<?php
/**
 * Changelog
 */

$wp_store = wp_get_theme( 'wp-store' );
?>
<div class="featured-section changelog">
<?php
	WP_Filesystem();
	global $wp_filesystem;
	$wp_store_changelog       = $wp_filesystem->get_contents( get_template_directory() . '/README.txt' );
	$changelog_start = strpos($wp_store_changelog,'== Changelog ==');
	$wp_store_changelog_before = substr($wp_store_changelog,0,($changelog_start+15));
	$wp_store_changelog = str_replace($wp_store_changelog_before,'',$wp_store_changelog);
	$wp_store_changelog = str_replace('*','<br/>*',$wp_store_changelog);
	$wp_store_changelog = str_replace('= 1.0','<br/><br/>= 1.0',$wp_store_changelog);
	echo "<b>== Changelog ==</b>";
	echo $wp_store_changelog;
	echo '<hr />';
	?>
</div>