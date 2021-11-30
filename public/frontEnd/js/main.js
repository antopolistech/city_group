(function ($) {
	"use strict";
    // mobile Menu area
    $('nav.mobile_menu').meanmenu({
        meanScreenWidth: '767'
    });
    $('nav.mean-nav li > a:first-child').on('click', function () {
        $('a.meanmenu-reveal').click();
    });

    // Owl Carousel for Home Slider Panel
    var maintheme_slid = $('.main_slider');
    maintheme_slid.owlCarousel({
        loop:true,
        margin:30,
        autoplay:true,
        dots:true,
        animateOut: 'fadeOut',
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            992:{
                items:1
            }
        }
    });

    $('.mainslider_nav .testi_next').on('click', function() {
        maintheme_slid.trigger('next.owl.carousel');
    });

    $('.mainslider_nav .testi_prev').on('click', function() {
        maintheme_slid.trigger('prev.owl.carousel');
    });
    // Owl Carousel for Home Slider Panel

    // Owl Carousel for News and Events
    var news_slide = $('.news-events-slider');
    news_slide.owlCarousel({
        loop:true,
        margin:10,
        //nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });
    $('.news_nav .testi_next').on('click', function() {
        news_slide.trigger('next.owl.carousel');
    });

    $('.news_nav .testi_prev').on('click', function() {
        news_slide.trigger('prev.owl.carousel');
    });

    // Owl Carousel for Latest Service Start
    var tab_slid = $('.only-product-tab-area .tab-pane, .product-pane');
    tab_slid.owlCarousel({
        loop:true,
        margin:30,
        //autoplay:true,
        dots:false,

        center:true,
        URLhashListener:true,
        autoplayHoverPause:true,
        startPosition: 'URLHash',
        responsive:{
            0:{
                items:1,
                loop: false
            },
            768:{
                items:3
            },
            992:{
                items:3
            }
        }
    });
    
    $('.tab_area_nav .testi_next').on('click', function() {
        tab_slid.trigger('next.owl.carousel');
    });
    
    $('.tab_area_nav .testi_prev').on('click', function() {
        tab_slid.trigger('prev.owl.carousel');
    });
    // Owl Carousel for Latest Service End

    // On Click Hide Product Details Start
    $(".products_catagory > li > a, .tab_area_nav > .testi_prev, .tab_area_nav > .testi_next").click(function(){
        $("#all-product-details-wrap").hide();
    });
    // On Click Hide Product Details End

    // Owl Carousel for Youtube Video Start

    var tvc_slide = $('.tvc-youtube');
    tvc_slide.owlCarousel({
        items:1,
        merge:true,
        loop:true,
        margin:10,
        video:true,
        lazyLoad:true,
        center:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            768:{
                items:1
            },
            992:{
                items:1
            }
        }
    });

    $('.tvc-youtube_nav .testi_next').on('click', function() {
        tvc_slide.trigger('next.owl.carousel');
    });

    $('.tvc-youtube_nav .testi_prev').on('click', function() {
        tvc_slide.trigger('prev.owl.carousel');
    });
    // Owl Carousel for Youtube Video End

    //-------------Sister Concern Page Script-------------

    $('#accordion .panel-heading h4.panel-title').on('click', function(){
        var $this = $(this);
        $this.parents('.col-sm-4').addClass('higherZindex').siblings().find('.panel-collapse').each(function(){
            $(this).removeClass('in').siblings('.panel-heading');
        });
        $this.parents('.col-sm-4').siblings().find('.accordion-toggle').each(function(){
            $(this).addClass('collapsed');
        });
        setTimeout(function(){
            $this.parents('.col-sm-4').siblings().removeClass('higherZindex');
        }, 500);

    });

}(jQuery));