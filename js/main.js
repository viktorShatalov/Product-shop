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

    // filtr
    jQuery.easing.def = "easeInOutQuad";
    jQuery('li.button a').click(function (e) {
        var dropDown = jQuery(this).parent().next();
        jQuery('.dropdown').not(dropDown).slideUp('slow');
        dropDown.slideToggle('slow');
        e.preventDefault();
    })
    // loadMore

    jQuery('#showmore button').click(function () {
        if (jQuery(".showmore").is(":hidden")) {
            jQuery(".showmore").show("slow");
            jQuery("#showmore button").prop('disabled', true);
        } else {
            jQuery(".showmore").slideUp();
        }
    });

})

