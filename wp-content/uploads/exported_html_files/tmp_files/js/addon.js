(function ($) {

    "use strict";

    /* ---------------------------------------------

    Navigation menu

    --------------------------------------------- */

    // dropdown for mobile
    /* is_exist() */
    jQuery.fn.is_exist = function () {
        return this.length;
    }

    var BusicoGlobal = function ($scope, $) {
        if ($scope.hasClass('busico-sticky-yes')) {
            var current_widget = $scope;
            current_widget.wrap('<div class="sticky-wrapper"></div>');
            var headerHeight = $(current_widget).parent('.sticky-wrapper').height(),
                stickyWrapper = $(current_widget).parent('.sticky-wrapper');
            stickyWrapper.css('height', headerHeight + "px")
            window.onscroll = function () {
                scrollFunction()
            };

            function scrollFunction() {

                if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                    if ($scope.hasClass('busico-sticky-yes')) {
                        stickyWrapper.addClass("is-sticky");
                        console.log(stickyWrapper);
                    }
                } else {
                    if ($scope.hasClass('busico-sticky-yes')) {
                        stickyWrapper.removeClass("is-sticky");
                    }
                }
                if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                    if ($scope.hasClass('busico-sticky-yes')) {
                        $scope.addClass("reveal-sticky");
                    }
                } else {
                    if ($scope.hasClass('busico-sticky-yes')) {
                        $scope.removeClass("reveal-sticky");
                    }
                }

            }

        }
    }


    var HeroSliderOne = function ($scope, $) {
        var hs_one = $scope.find('.hero-slider-active');
        if (hs_one.length === 0)
            return false;
        var settings = hs_one.data('settings');
        hs_one.owlCarousel({
            loop: settings['loop'],
            nav: settings['nav'],
            autoplay: settings['autoplay'],
            singleItem: true,
            dots: false,
            autoplayTimeout: settings['autoplaytimeout'],
            items: 1,
            mouseDrag: settings['mousedrag'],
            navText: ['<i class="eicon-long-arrow-left"></i>PREV', 'Next<i class="eicon-long-arrow-right"></i>'],
        })
    };




    var HeroSlidertwo = function ($scope, $) {
        var hs_two = $scope.find('.hero-slider-2');

        if (hs_two.length === 0)
            return false;

        var heros = hs_two.data('settings');

        hs_two.owlCarousel({
            items: 1,
            nav: heros['nav'],
            dots: false,
            loop: heros['loop'],
            mouseDrag: heros['mousedrag'],
            singleItem: true,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            autoplayTimeout: heros['autoplaytimeout'],
            autoplay: heros['autoplay'],
            navText: ['<i class="eicon-long-arrow-left"></i>', '<i class="eicon-long-arrow-right"></i>'],

        });

    }

    var HeroSliderThree = function ($scope, $) {
        var hs_three = $scope.find('.agency-slider-active');

        if (hs_three.length === 0)
            return false;

        var heros = hs_three.data('settings');

        hs_three.owlCarousel({
            items: 1,     
            dots: heros['nav'],
            loop: heros['loop'],
            autoplayTimeout: heros['autoplaytimeout'],
            autoplay:heros['autoplay'],

        });

    }

    var Busico_Testimonial_slider_Two = function ($scope, $) {
    var hs_four = $scope.find('.busico-testimonial-2');

    if( hs_four.length === 0 )
    return false;

    var heros = hs_four.data('settings');

    hs_four.owlCarousel({        
        items: 1,     
        nav: heros['nav'],
        dots: heros['dots'],  
        loop: heros['loop'],
        mouseDrag:heros['mousedrag'],
        singleItem: true,
        autoplayTimeout: heros['autoplaytimeout'], 
        autoplay: heros['autoplay'],
        navText: ['<i class="eicon-angle-left"></i>', '<i class="eicon-angle-right"></i>'],
       
    });

}

var Hero_Text_Slider_Animation = function ($scope, $) {
     $(".owl-carousel").on("initialized.owl.carousel", () => {
            setTimeout(() => {
                $(".owl-item.active .animated-text").addClass("is-transitioned");
            }, 200);
        });

        $owlCarousel.on("changed.owl.carousel", e => {
            $(".animated-text").removeClass("is-transitioned");
            
            const $currentOwlItem = $(".owl-item").eq(e.item.index);
            $currentOwlItem.find(".animated-text").addClass("is-transitioned");
            
            const $target = $currentOwlItem.find(".hero-contents");
        });
}



    var navMenu = function ($scope, $) {

        $('.busico-mega-menu').closest('.elementor-container').addClass('megamenu-full-container');
        var count = 0;
        $(".main-navigation ul.navbar-nav>li.busico-mega-menu>.sub-menu>li").each(function (index) {
            count++;
            if ($(this).is('li:last-child')) {
                $(this).parent().addClass('mg-column-' + count);
                count = 0;
            }
        });

        $('.main-navigation ul.navbar-nav>li').each(function (i, v) {
            $(v).find('a').contents().wrap('<span class="menu-item-text"/>')
        });
        $(".menu-item-has-children > a").append('<span class="dropdownToggle"><i class="fas fa-angle-down"></i></span>');

        function navMenu() {

            if (jQuery('.busico-main-menu-wrap').hasClass('menu-style-inline')) {
                if (jQuery(window).width() < 1025) {
                    jQuery('.busico-main-menu-wrap').addClass('menu-style-flyout');
                    jQuery('.busico-main-menu-wrap').removeClass('menu-style-inline');
                } else {
                    jQuery('.busico-main-menu-wrap').removeClass('menu-style-flyout');
                    jQuery('.busico-main-menu-wrap').addClass('menu-style-inline');
                }

                $(window).resize(function () {
                    if (jQuery(window).width() < 1025) {
                        jQuery('.busico-main-menu-wrap').addClass('menu-style-flyout');
                        jQuery('.busico-main-menu-wrap').removeClass('menu-style-inline');
                    } else {
                        jQuery('.busico-main-menu-wrap').removeClass('menu-style-flyout');
                        jQuery('.busico-main-menu-wrap').addClass('menu-style-inline');
                    }
                })
            }

            // main menu toggleer icon (Mobile site only)
            $('[data-toggle="navbarToggler"]').on("click", function (e) {
                $('.navbar').toggleClass('active');
                $('.navbar-toggler-icon').toggleClass('active');
                $('body').toggleClass('offcanvas--open');
                e.stopPropagation();
                e.preventDefault();

            });
            $('.navbar-inner').on("click", function (e) {
                e.stopPropagation();
            });

            // Remove class when click on body
            $('body').on("click", function () {
                $('.navbar').removeClass('active');
                $('.navbar-toggler-icon').removeClass('active');
                $('body').removeClass('offcanvas--open');
            });
            $('.main-navigation ul.navbar-nav li.menu-item-has-children>a').on("click", function (e) {
                e.preventDefault();
                $(this).siblings('.sub-menu').toggle();
                $(this).parent('li').toggleClass('dropdown-active');
            })


        }
        navMenu();
    }


    // Testimonial
    var Busico_Testimonial_Js = function ($scope, $) {
        var wrapper = $scope.find(".testimonial-carousel-active");

        if (wrapper.length === 0)
            return false;

        var tdata = wrapper.data('settings');

        wrapper.owlCarousel({
            items: 1,
            dots: false,
            loop: tdata.loop,
            autoplayTimeout: tdata.autoplaytimeout,
            autoplay: tdata.autoplay,
            nav: tdata.nav,
            mousedrag: tdata.mousedrag,
            navText: ['<i class="eicon-long-arrow-left"></i>', '<i class="eicon-long-arrow-right"></i>'],
        });

    }





    //Case Srudy
    var Busico_Case_Js = function () {
        if ($.fn.isotope) {

            var $gridMas = $('.busico-case-study-wrap.layout-mode-masonry');
            var $grid = $('.busico-case-study-wrap.layout-mode-normal');

            $grid.isotope({
                itemSelector: '.busico-case-study-item-wrap',
                percentPosition: true,
            }).resize()

            $grid.imagesLoaded().progress(function () {
                $grid.isotope('layout')
            }).resize();

            $gridMas.isotope({
                itemSelector: '.busico-case-study-item-wrap',
                percentPosition: true,
            })

            $gridMas.imagesLoaded().progress(function () {
                $gridMas.isotope('layout')
            });

            $grid.isotope().resize();
            $gridMas.isotope().resize();

            $(".case-isotope-nav li").on('click', function () {
                $(".case-isotope-nav li").removeClass("active");
                $(this).addClass("active");

                var selector = $(this).attr("data-filter");
                $gridMas.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: "linear",
                        queue: false,
                    }
                });

                var selector = $(this).attr("data-filter");
                $grid.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: "linear",
                        queue: false,
                    }
                });


            });

        }

    }

    //portfolio gallery js start
    var Busico_Portfolio_Gallery_Js = function ($scope, $) {

        if ($.fn.isotope) {
            var gridMas = $('.busico-pf-gallery-wrap.layout-mode-masonry');

            gridMas.isotope({
                itemSelector: '.busico-pf-gallery-wrap .busico-portfolio-item-wrap',
                percentPosition: true,
                layoutMode: 'packery',
            }).resize();

            gridMas.imagesLoaded().progress(function () {
                gridMas.isotope()
            });
        }


        if ($(".busico-pf-gallery-slider").length > 0) {
            var wrapper = $scope.find(".busico-pf-gallery-slider");
            if (wrapper.length === 0)
                return;
            var settings = wrapper.data('settings');

            wrapper.slick({
                infinite: settings['loop'],
                speed: 900,
                slidesToShow: settings['per_coulmn'],
                slidesToScroll: 1,
                autoplay: settings['autoplay'],
                autoplaySpeed: settings['autoplaytimeout'],
                arrows: settings['nav'],
                prevArrow: '<button type="button" class="busico-slick-prev">' + settings.prev_icon + '</button>',
                nextArrow: '<button type="button" class="busico-slick-next">' + settings.next_icon + '</button>',
                draggable: settings['mousedrag'],
                dots: settings['dots'],
                lazyLoad: 'ondemand',
                dotsClass: "busico-pf-gallery-slider-dots",
                responsive: [{
                    breakpoint: 991,
                    settings: {
                        slidesToShow: settings['per_coulmn_tablet'],
                    },
                },
                {
                    breakpoint: 450,
                    settings: {
                        slidesToShow: settings['per_coulmn_mobile'],
                    },
                },
                ],
            });
        }
    }

    var busico_portfolio_slider = function ($scope, $) {
        var wrapper = $scope.find(".rrdevs-hero-slider");
        if (wrapper.length === 0)
            return;
        var settings = wrapper.data('settings');
        wrapper.slick({
            infinite: true,
            speed: 900,
            slidesToShow: settings['per_coulmn'],
            slidesToScroll: 1,
            autoplay: settings['autoplay'],
            autoplaySpeed: settings['autoplaytimeout'],
            arrows: settings['nav'],
            draggable: settings['mousedrag'],
            dots: settings['dots'],
            lazyLoad: 'ondemand',
            // adaptiveHeight: true,
            dotsClass: "hero-slider-dot-list",
            swipe: true,
            vertical: settings['show_vertical'],
            appendArrows: '.team-slider-arrow',
            prevArrow: $('.prev'),
            nextArrow: $('.next'),
            responsive: [{
                breakpoint: 1600,
                settings: {
                    slidesToShow: settings['per_coulmn'],
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 1000,
                settings: {
                    slidesToShow: settings['per_coulmn_tablet'],
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: settings['per_coulmn_mobile'],
                    slidesToScroll: 1,
                    vertical: false,
                },
            },
            ],
        });

    }

    //portfolio js start
    var Busico_Portfolio_Js = function ($scope, $) {
        if ($.fn.isotope) {

            var $gridMas = $('.busico-portfolio-wrap.layout-mode-masonry');
            var $grid = $('.busico-portfolio-wrap.layout-mode-normal.enable-filter-yes');

            $grid.isotope({
                itemSelector: '.busico-portfolio-item-wrap',
                percentPosition: true,
                layoutMode: 'fitRows',
            }).resize()

            $grid.imagesLoaded().progress(function () {
                $grid.isotope('layout')
            }).resize();

            $gridMas.isotope({
                itemSelector: '.busico-portfolio-item-wrap',
                percentPosition: true,
                layoutMode: 'packery',
            })

            $gridMas.imagesLoaded().progress(function () {
                $gridMas.isotope('layout')
            });

            $grid.isotope().resize();
            $gridMas.isotope().resize();

            $(".pf-isotope-nav li").on('click', function () {
                $(".pf-isotope-nav li").removeClass("active");
                $(this).addClass("active");

                var selector = $(this).attr("data-filter");
                $gridMas.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: "linear",
                        queue: false,
                    }
                });

                var selector = $(this).attr("data-filter");
                $grid.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: "linear",
                        queue: false,
                    }
                });


            });

        }

        // comment load more button click event
        $('.busico-pf-loadmore-btn').on('click', function () {
            var button = $(this);

            // decrease the current comment page value
            var dpaged = button.data('paged'),
                total_pages = button.data('total-page'),
                nonce = button.data('referrar'),
                ajaxurl = button.data('url');

            dpaged++;
            // console.log(foio_portfolio_js_datas);
            $.ajax({
                url: ajaxurl, // AJAX handler, declared before
                dataType: 'html',
                data: {
                    'action': 'busico_loadmore_callback', // wp_ajax_cloadmore
                    // 'post_id': foio_portfolio_js_datas.parent_post_id, // the current post
                    'paged': dpaged, // current comment page
                    'folio_nonce': nonce,
                    'portfolio_settings': button.data('portfolio-settings'),
                },
                type: 'POST',
                beforeSend: function (xhr) {
                    button.text('Loading...'); // preloader here
                },
                success: function (data) {
                    if (data) {
                        $('.busico-portfolio-wrap').append(data);
                        $('.busico-portfolio-wrap').isotope('reloadItems').isotope()
                        button.text('More projects');
                        button.data('paged', dpaged);
                        // if the last page, remove the button
                        if (total_pages == dpaged)
                            button.remove();
                    } else {
                        button.remove();
                    }
                }
            });
            return false;
        });


        // Slider Active   
        var wrapper = $scope.find(".bucico-pf-slider");
        if (wrapper.length === 0)
            return;
        var settings = wrapper.data('settings');
        wrapper.slick({
            infinite: true,
            speed: 900,
            slidesToShow: settings['per_coulmn'],
            slidesToScroll: 1,
            autoplay: settings['autoplay'],
            autoplaySpeed: settings['autoplaytimeout'],
            arrows: settings['nav'],
            draggable: settings['mousedrag'],
            dots: settings['dots'],
            lazyLoad: 'ondemand',
            // adaptiveHeight: true,
            dotsClass: "busico-pf-dot-list",
            swipe: true,
            vertical: settings['show_vertical'],
            appendArrows: '.busico-pf-slider-arrow',
            prevArrow: $('.prev'),
            nextArrow: $('.next'),
            responsive: [{
                breakpoint: 1600,
                settings: {
                    slidesToShow: settings['per_coulmn'],
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 1000,
                settings: {
                    slidesToShow: settings['per_coulmn_tablet'],
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: settings['per_coulmn_mobile'],
                    slidesToScroll: 1,
                    vertical: false,
                },
            },
            ],
        });

    }




    $(window).on("elementor/frontend/init", function () {

        elementorFrontend.hooks.addAction("frontend/element_ready/busico-hero-one.default", HeroSliderOne);
        elementorFrontend.hooks.addAction("frontend/element_ready/busico-hero-two.default", HeroSlidertwo);
        elementorFrontend.hooks.addAction("frontend/element_ready/busico-hero-three.default", HeroSliderThree);
        elementorFrontend.hooks.addAction("frontend/element_ready/hero-text-animation.default", Hero_Text_Slider_Animation);
        elementorFrontend.hooks.addAction("frontend/element_ready/busico-testimonial-loop.default", Busico_Testimonial_Js);
        elementorFrontend.hooks.addAction("frontend/element_ready/busico-portfolio-gallery.default", Busico_Portfolio_Gallery_Js);
        elementorFrontend.hooks.addAction("frontend/element_ready/busico-testimonial-2.default", Busico_Testimonial_slider_Two);
        elementorFrontend.hooks.addAction("frontend/element_ready/busico-case-study.default", Busico_Case_Js);
        elementorFrontend.hooks.addAction("frontend/element_ready/busico-main-menu.default", navMenu);
        elementorFrontend.hooks.addAction("frontend/element_ready/busico-portfolio.default", Busico_Portfolio_Js);
        elementorFrontend.hooks.addAction("frontend/element_ready/global", BusicoGlobal);
    });

})(jQuery);
/*This file was exported by "Export WP Page to Static HTML" plugin which created by ReCorp (https://myrecorp.com) */