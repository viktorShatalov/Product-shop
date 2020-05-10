jQuery(document).ready(function () {

    //  mobile-menu

    jQuery('.burger').click(function () {
        jQuery('.burger,.navbar').toggleClass('active');
        jQuery('html,body').toggleClass('lock');
    })

    // category dropdown menu

    jQuery('.category').hide()
    jQuery(".catalog__menu span").click(function () {
        jQuery('.category').toggle('slow')
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
        // responsive: [
        //     {
        //         breakpoint: 480,
        //         settings: {
        //             slidesToShow: 1,
        //             centerMode: true,
        //         }
        //     }
        // ]
    });


    jQuery('.sale__product-slider').slick({
        arrows: true,
        dots: false,
        infinite: true,
        lazyLoad: "progressive",
        slidesToScroll: 1,
        variableWidth: true,
        autoplay: true,
        autoplaySpeed: 3500,
        centerMode: true,
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
        draggable: false,
        responsive: [
            {
                breakpoint: 480,
                settings: {
                    centerMode: true,
                }
            }
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
                    slidesToShow: 3,
                    centerMode: true,
                    centerPadding: '0',
                }
            }
        ]
    });

    // card-product slider tabs
    jQuery('.slider_recomend,.slider_related,.slider_similar').slick({
        arrows: true,
        dots: false,
        lazyLoad: "progressive",
        infinite: false,
        slidesToShow: 7,
        slidesToScroll: 1,
        autoplay: true,
        responsive: [
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    centerMode: true,
                    centerPadding: '0',
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

    // cart-item counter

    $(function () {

        (function quantityProducts() {
            var $quantityArrowMinus = $(".quantity-arrow-minus");
            var $quantityArrowPlus = $(".quantity-arrow-plus");
            var $quantityNum = $(".qty");

            $quantityArrowMinus.click(quantityMinus);
            $quantityArrowPlus.click(quantityPlus);

            function quantityMinus() {
                if ($quantityNum.val() > 1) {
                    $quantityNum.val(+$quantityNum.val() - 1);
                }
            }

            function quantityPlus() {
                $quantityNum.val(+$quantityNum.val() + 1);
            }
        })();

    });

})

