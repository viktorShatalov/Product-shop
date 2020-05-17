jQuery(document).ready(function () {

    function preloader() {
        var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ? true : false;
        var preloader = jQuery('#preloader');
        if (!isMobile) {
            setTimeout(function () {
                preloader.addClass('preloaded');
            }, 800);
            setTimeout(function () {
                preloader.remove();
            }, 2000);
        } else {
            preloader.remove();
        }
    };
    preloader()

    //  mobile-menu

    jQuery('.burger').click(function () {
        jQuery('.burger,.menu__items,.mobile__content').toggleClass('active');
        jQuery('html,body').toggleClass('lock');
    })
    jQuery('.close-menu').click(function () {
        jQuery('.burger,.menu__items,.mobile__content').removeClass('active');
    })

    // category dropdown menu

    jQuery(".catalog__menu span").click(function () {
        jQuery('.category').toggleClass('active', 'slow')
    });

    void function () {
        "use strict";

        const categoriesItems = document.querySelectorAll('.category__menu-items>li');
        const categoriesSubMenuItems = document.querySelectorAll('.box__sub-menu>*');

        Array.from(categoriesItems).forEach(item => {
            item.addEventListener('mouseenter', (e) => {
                showSubcategory(e);
            })
        });

        Array.from(categoriesSubMenuItems).forEach(item => {
            item.addEventListener('mouseleave', hideSubcategories);
        });

        function hideSubcategories() {
            Array.from(categoriesSubMenuItems).forEach(item => item.style.display =
                'none');
        }

        function showSubcategory(e) {
            hideSubcategories();
            const selectSubcategory = document.querySelector(
                `.category__sub-menu${e.target.dataset.filter}`);
            selectSubcategory.style.display = 'block';
        }
    }();

    // sliders
    jQuery('.first__slider').slick({
        arrows: true,
        dots: true,
        infinite: true,
        lazyLoad: "progressive",
        slidesToShow: 1,
        slidesToScroll: 1,
        variableWidth: true,
        autoplay: true,
        autoplaySpeed: 3500,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    arrows: false,
                    dots: false,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    dots: false,
                }
            },
        ]
    });


    jQuery('.sale__product-slider').slick({
        arrows: true,
        dots: false,
        infinite: true,
        lazyLoad: "progressive",
        slidesToScroll: 3,
        slidesToShow: 5,
        variableWidth: true,
        autoplay: true,
        autoplaySpeed: 3500,
        variableWidth: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    arrows: false,
                    dots: false,
                    slidesToShow: 3,
                    slidesToScroll: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToScroll: 2,
                    slidesToShow: 2,
                    arrows: false,
                    dots: false,
                    // centerMode: true,
                }
            }
        ]
    });

    // card-product slider

    jQuery('.slider-for').slick({
        arrows: false,
        dots: false,
        infinite: true,
        autoplay: false,
        lazyLoad: "progressive",
        asNavFor: '.slider-nav',
        fade: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        draggable: false,
        centerMode: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    dots: false,
                    draggable: true,
                    fade: false,
                }
            },
            // {
            //     breakpoint: 480,
            //     settings: {
            //         centerMode: true,
            //         slidesToShow: 1,
            //         arrows: false,
            //         dots: false,
            //     }
            // }
        ]
    });


    jQuery('.slider-nav').slick({
        arrows: true,
        dots: false,
        lazyLoad: "progressive",
        asNavFor: '.slider-for',
        slidesToShow: 4,
        infinite: true,
        vertical: true,
        autoplay: false,
        focusOnSelect: true,
        draggable: false,
        responsive: [
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    centerMode: true,
                    centerPadding: '0',
                    slidesToShow: 1,
                    arrows: false,
                    dots: false,
                }
            }
        ]
    });

    // card-product slider tabs
    jQuery('.slider_recomend,.slider_related,.slider_similar').slick({
        arrows: true,
        dots: false,
        lazyLoad: "progressive",
        infinite: true,
        slidesToShow: 7,
        slidesToScroll: 3,
        variableWidth: true,
        autoplay: true,
        responsive: [
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    centerMode: true,
                    centerPadding: '0',
                    arrows: false,
                    dots: false,
                }
            }
        ]
    });


    // filtr
    jQuery.easing.def = "easeInOutQuad";
    jQuery('li.button a').click(function (e) {
        var dropDown = jQuery(this).parent().next();
        jQuery('.dropdown').not(dropDown).slideUp('slow');
        dropDown.slideToggle('slow');
        e.preventDefault()
    })


})
