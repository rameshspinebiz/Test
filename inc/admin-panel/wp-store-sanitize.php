<?php
function wp_store_sanitize_text( $input ) {
  return wp_kses_post( force_balance_tags( $input ) );
}
function wp_store_sanitize_radio_webpagelayout($input) {
  $valid_keys = array(
    'fullwidth' => esc_html__('Full Width', 'wp-store'),
    'boxed' => esc_html__('Boxed Layout', 'wp-store'),
    );
  if ( array_key_exists( $input, $valid_keys ) ) {
    return $input;
  } else {
    return '';
  }
}

function wp_store_sanitize_transition_type($input) {
  $valid_keys = array(
    'fade' => esc_html__('Fade', 'wp-store'),
    'backSlide' => esc_html__('Back Slide', 'wp-store'),
    'goDown' => esc_html__('Go Down Slide', 'wp-store'),
    'fadeUp' => esc_html__('Fade Up', 'wp-store'),
    );
  if ( array_key_exists( $input, $valid_keys ) ) {
   return $input;
 } else {
   return '';
 }
}

function wp_store_sanitize_radio_alignment_logo($input) {
  $valid_keys = array(
    'left'=>esc_html__('Logo and Menu at Left with ads', 'wp-store'),
    'center'=>esc_html__('Logo and Menu at Center', 'wp-store'),
    'right'=>esc_html__('Logo and Menu at Right with ads', 'wp-store')
    );
  if ( array_key_exists( $input, $valid_keys ) ) {
   return $input;
 } else {
   return '';
 }
}


function wp_store_sanitize_radio_sidebar($input) {
  $valid_keys = array(
    'left-sidebar' =>  esc_html__('Left Sidebar','wp-store'),
    'right-sidebar' =>  esc_html__('Right Sidebar','wp-store'),
    'both-sidebar' =>  esc_html__('Both Sidebar','wp-store'),
    'no-sidebar' =>  esc_html__('No Sidebar','wp-store'),
    );
  if ( array_key_exists( $input, $valid_keys ) ) {
    return $input;
  } else {
    return '';
  }
}

function wp_store_sanitize_radio_row($input) {
  $valid_keys = array(        
    '2' => esc_html__('Two', 'wp-store'),
    '3' => esc_html__('Three', 'wp-store'),
    '4' => esc_html__('Four', 'wp-store'),
    '5' => esc_html__('Five', 'wp-store'),
    );
  if ( array_key_exists( $input, $valid_keys ) ) {
    return $input;
  } else {
    return '';
  }
}

   //integer sanitize
function wp_store_sanitize_integer($input){
  return intval( $input );
}

function wp_store_sanitize_blog_layout($input){
  $blog_layout = array(
    'large-image' => esc_html__('Blog with Large Image', 'wp-store'),
    'medium-image' => esc_html__('Blog with Medium Image', 'wp-store'),
    'alternate-image' => esc_html__('Blog with Alternate Medium Image', 'wp-store'),
    );

  if(array_key_exists($input,$blog_layout)){
    return $input;
  }else{
    return '';
  }
}

function wp_store_sanitize_archive_layout($input){
  $blog_layout = array(
    'large-image' => esc_html__('Archive with Large Image', 'wp-store'),
    'medium-image' => esc_html__('Archive with Medium Image', 'wp-store'),
    'alternate-image' => esc_html__('Archive with Alternate Medium Image', 'wp-store'),
    );

  if(array_key_exists($input,$blog_layout)){
    return $input;
  }else{
    return '';
  }
}

function wp_store_sanitize_checkbox($input){
  if($input == 1){
    return 1;
  }else{
    return '';
  }
}

function wp_store_sutoplay_on(){
  $wp_store_autoplay = get_theme_mod( 'wp_store_homepage_setting_slider_transition_auto','0');
  if( $wp_store_autoplay == '1') {
    return true;
  }
  return false;
}