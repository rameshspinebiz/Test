jQuery(document).ready(function($){

    // Pre Loader
    $(window).load(function () {
        // Animate loader off screen
        $(".wp-store-preloader").fadeOut("slow");
      });
    var winwidth = $(window).width();
    if(winwidth <= 980) {
        $('.menu-item-has-children, .page_item_has_children').append('<i class="fa fa-caret-down menu-caret"></i>');
        $('.main-navigation ul.sub-menu,.main-navigation ul.children').hide();
        $('body').on('click','.main-navigation.toggled .menu-caret',function(){
           $(this).siblings('ul.sub-menu,ul.children').slideToggle();
        });
    }
   	// header search option
    $('.header-search > a').click(function(){
    	$('.search-box').toggleClass('search-active');
    });
    $('.header-search .close').click(function(){
      $('.search-box').removeClass('search-active');
    });    

    // For Call to actio video widget
    $(".various").fancybox({
     'transitionIn'  : 'none',
     'transitionOut' : 'none',
     'showCloseButton' : true,  
     'showNavArrows' : true,
   });

    // Wishlist count ajax update
    $( 'body' ).on( 'added_to_wishlist', function () {
      $( '.wishlist-box' ).load( yith_wcwl_plugin_ajax_web_url + ' .wishlist-box .quick-wishlist', { action: 'yith_wcwl_update_single_product_list' } );
    } );
    $( 'body' ).on( 'removed_from_wishlist', function () {
      $( '.wishlist-box' ).load( yith_wcwl_plugin_ajax_web_url + ' .wishlist-box .quick-wishlist', { action: 'yith_wcwl_update_single_product_list' } );
    } );
    $( 'body' ).on( 'added_to_cart', function () {
      $( '.wishlist-box' ).load( yith_wcwl_plugin_ajax_web_url + ' .wishlist-box .quick-wishlist', { action: 'yith_wcwl_update_single_product_list' } );
    } );

    //back to top button
    $('#back-to-top').css('right',-65);
    $(window).scroll(function(){
      if($(this).scrollTop() > 300){
        $('#back-to-top').css('right',20);
      }else{
        $('#back-to-top').css('right',-65);
      }
    });

    $("#back-to-top").click(function(){
      $('html,body').animate({scrollTop:0},600);
    });

    $('.main-navigation .close').click(function(){
      $('.main-navigation').removeClass('toggled');
    });
    $('.main-navigation ul.nav-menu').scroll(function(){

      if($(this).scrollTop() > 10){
        $('.main-navigation .close').hide('slow');
      }else{
       $('.main-navigation .close').show('slow');
     }
   });

    $(window).on("load",function(){
      $(".header-cart .widget_shopping_cart_content > ul").mCustomScrollbar();
    });
    
  }); //doc close
