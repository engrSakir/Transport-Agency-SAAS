(function ($) {
    'use strict';
    $(document).ready(function () {

        // $fn.scrollSpeed(step, speed, easing);


// Custom scrolling speed with jQuery
// Source: github.com/ByNathan/jQuery.scrollSpeed
// Version: 1.0.2


     
// Page loader js
        $('#page-anim-preloader').delay('10').fadeOut(2000);
        setTimeout(page_anim_remove_preloader, '11000');

        function page_anim_remove_preloader() {
            $('#page-anim-preloader').remove();
        }

// testimonial-slider

        $("#testimonial-slider").owlCarousel({
            items: 3,
            loop: true,
            dots: true,
            itemsDesktop: [1000, 3],
            itemsDesktopSmall: [980, 1],
            itemsTablet: [767, 1],
            pagination: false,
            navigation: true,
            navigationText: ["", ""],
            slideSpeed: 1000,
            autoPlay: true
        });


        /* home-team */
        var swiper = new Swiper('.swiper-container.team-slider', {
            effect: 'slide',
            slidesPerView: '3',
            touch: 'enable',
            autoplay: 3000,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                551: {
                    slidesPerView: 1,
                    spaceBetween: 10
                }
            }
        });

        /* shiping */
        var swiper = new Swiper('.swiper-container.swiper1', {
            effect: 'slide',
            slidesPerView: '3',
            touch: 'enable',
            autoplay: 3000,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                551: {
                    slidesPerView: 1,
                    spaceBetween: 10
                }
            }
        });

        /* shiping */
        var swiper = new Swiper('.swiper-container.swiper2', {
            effect: 'slide',
            slidesPerView: '2',
            touch: 'enable',
            autoplay: 3000,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                551: {
                    slidesPerView: 1,
                    spaceBetween: 10
                }
            }
        });

        // home-mainslider
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 1,
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            pagination: true,
            autoplay: true,
            stopOnHover: true,
            autoplayTimeout: 3000,
            transitionStyle: "fade",
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            autoplayHoverPause: true
        });
        $('.play').on('click', function () {
            owl.trigger('play.owl.autoplay', [1000])
        })
        $('.stop').on('click', function () {
            owl.trigger('stop.owl.autoplay')
        })


        // blog-slider
        var swiper = new Swiper('.blog-slider', {
            slidesPerView: 3,
            spaceBetween: 30,
            touch: 'enable',
            loop: true,
            // init: false,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                640: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                320: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                }
            }
        });

        // testimonial-slider
        var swiper = new Swiper('.home-tsetimonial', {
            slidesPerView: 3,
            spaceBetween: 30,
            touch: 'enable',
            interval: 3000,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                640: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                320: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                }
            }

        });


        // blog-template
        var swiper = new Swiper('.blog-template', {
            slidesPerView: 1,
            spaceBetween: 30,
            touch: 'enable',
            interval: 3000,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }
        });

        /*Scroll to Top*/
        $(window).on("scroll", function () {
            if ($(this).scrollTop() >= 50) {
                $('#return-to-top').fadeIn(200);
            } else {
                $('#return-to-top').fadeOut(200);
            }
        });
        $('#return-to-top').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 500);
        });

        // mobild-sidemenu

        if ($(window)) {
            $(function () {
                $('.menu').crbnMenu({
                    hideActive: true
                });
            });
        }

        // login-modal
        $(".fas.fa-eye").on("click", function() {
			$(this).toggleClass(".fas.fa-eye-slash");
			  var type = $("#password").attr("type");
			if (type == "text"){ 
			  $("#password").prop('type','password');}
			else{ 
			  $("#password").prop('type','text'); }
		});

        /* service-template */
        var swiper = new Swiper('.ser-feature', {
            effect: 'fade',
            slidesPerView: '1',
            touch: 'enable',
            autoplay: true,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                551: {
                    slidesPerView: 1,
                    spaceBetween: 10
                }
            }
        });

        //on hover nav dropdown
        $('body').on('mouseenter mouseleave', '.dropdown-hover', function (e) {
            let dropdown = $(e.target).closest('.dropdown-hover');
            dropdown.addClass('show');

            setTimeout(function () {
                dropdown[dropdown.is(':hover') ? 'addClass' : 'removeClass']('show');
            }, 300);
        });
        jQuery.scrollSpeed(200, 800);
    });
})(jQuery);

//mobile-sidemenu
function openNav() {
    "use strict";
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    "use strict";
    document.getElementById("mySidenav").style.width = "0";
}