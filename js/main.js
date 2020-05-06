jQuery(document).ready(function () {

    //  mobile-menu

    jQuery('.burger').click(function () {
        jQuery('.burger,.navbar').toggleClass('active');
        jQuery('html,body').toggleClass('lock');
    })

    // category dropdown menu
    // show menu
    jQuery(".catalog__menu span").click(function () {
        jQuery('.category').toggle('slow')
    });

    // show subcategory
    // jQuery('.category__box-menu>ul').click(function () {
    //     jQuery('.category__box-menu>ul').removeClass('active');
    //     if (jQuery(this).next('.box__sub-menu').css("display") == "none") {
    //         jQuery('.box__sub-menu').hide('normal');
    //         jQuery(this).next('.box__sub-menu').toggle('normal');
    //         jQuery('.category__box-menu>ul').removeClass('active');
    //         jQuery(this).toggleClass('active');
    //     } else jQuery('.box__sub-menu').hide('normal');
    //     return false;
    // })

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
