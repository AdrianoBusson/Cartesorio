(function ($) {
    "use strict";
    $(document).ready(function () {

        if ($.fn.niceSelect) {
            $('select').niceSelect();
            $('.product select, .woocommerce-account select').niceSelect('destroy')
        }

        if ($.fn.select2) {
            $('.product select').select2();
        }

        $('#wp-calendar td a').parent('td').addClass('has-calendar-link');
        $('.busico-header-area.sticky-header').wrap('<div class="sticky-wrapper"></div>');
        var headerHeight = $('.sticky-wrapper').height(),
            stickyWrapper = $('.sticky-wrapper');
        stickyWrapper.css('height', headerHeight + "px")
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                stickyWrapper.addClass("is-sticky");
            } else {
                stickyWrapper.removeClass("is-sticky");
            }
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                $(".is-sticky .sticky-header").addClass("reveal-header");
            } else {
                $(".is-sticky .sticky-header").removeClass("reveal-header");
            }
        }
        // comment load more button click event
        $('.busico-comment-loadmore-btn').on('click', function () {
            var button = $(this);
            // decrease the current comment page value
            busico_comment_loadmore.cpage--;
            $.ajax({
                url: busico_comment_loadmore.ajaxurl, // AJAX handler, declared before
                data: {
                    'action': 'cloadmore', // wp_ajax_cloadmore
                    'post_id': busico_comment_loadmore.parent_post_id, // the current post
                    'cpage': busico_comment_loadmore.cpage, // current comment page
                },
                type: 'POST',
                beforeSend: function (xhr) {
                    button.text('Loading...'); // preloader here
                },
                success: function (data) {
                    if (data) {
                        $('ol.comment-list').append(data);
                        button.text('More comments');
                        // if the last page, remove the button
                        if (busico_comment_loadmore.cpage == 1)
                            button.remove();
                    } else {
                        button.remove();
                    }
                }
            });
            return false;
        });

        var $temp = $("<input>");
        var $url = $(location).attr('href');
        $('#copy-btn').on('click', function () {

            $("body").append($temp);
            $temp.val($url).select();
            document.execCommand("copy");
            alert('URL copied!');
            $temp.remove();
            $("p").text("URL copied!");

        });




    })
    $(window).load(function () {
        if ($.fn.masonry) {
            $('.blog-content-row .posts-row').masonry({
                // options
                itemSelector: '.posts-row>div',
            });
        }
        setTimeout(function () {
            jQuery(".busico-preloader-wrap").fadeOut(500);
        }, 500);
        setTimeout(function () {
            jQuery(".busico-preloader-wrap").remove();
        }, 2000);

        if ('object' != typeof (elementorFrontend)) {


            $('.main-navigation ul.navbar-nav>li').each(function (i, v) {
                $(v).find('a').contents().wrap('<span class="menu-item-text"/>')
            });
            $(".menu-item-has-children > a").append('<span class="dropdownToggle"><i class="fas fa-angle-down"></i></span>');

            if (jQuery('.busico-main-menu-wrap').hasClass('menu-style-inline')) {
                if (jQuery(window).width() < 1025) {
                    jQuery('.busico-main-menu-wrap').addClass('menu-style-flyout');
                } else {
                    jQuery('.busico-main-menu-wrap').removeClass('menu-style-flyout');
                }

                $(window).resize(function () {
                    if (jQuery(window).width() < 1025) {
                        jQuery('.busico-main-menu-wrap').addClass('menu-style-flyout');
                    } else {
                        jQuery('.busico-main-menu-wrap').removeClass('menu-style-flyout');
                    }
                })
            }


            function navMenu() {
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
                $(".busico-mega-menu> ul.sub-menu > li > a").unbind('click'); // Navbar moved up
            }
            navMenu();
        }
    })

    function busicoCartQtyBtn() {
        $(".woocommerce .quantity").append('<span class="busico-qty-dec-btn busico-qty-counter">-</span><span class="busico-qty-inc-btn busico-qty-counter">+</span>');
        $(".woocommerce .quantity .busico-qty-counter").on("click", function () {
            var $button = $(this);
            var oldValue = $button.parent('.quantity').find("input").val();
            oldValue = oldValue ? oldValue : 0;
            if ($button.hasClass("busico-qty-inc-btn")) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }
            $button.parent('.quantity').find("input").val(newVal);
            $('.woocommerce div.quantity input.qty').change();
        });
    }
    busicoCartQtyBtn();
    $(document).ajaxComplete(function (event, request, settings) {
        if ($('.woocomerce-cart-form .quantity .busico-qty-counter')) {
            $(".woocommerce .quantity .busico-qty-counter").remove();
            busicoCartQtyBtn();
        }
    });


})(jQuery);