jQuery(document).ready(function () {

    //  mobile-menu

    jQuery('.burger').click(function () {
        jQuery('.burger,.navbar').toggleClass('active');
        jQuery('html,body').toggleClass('lock');
    })

    // вcategory dropdown menu
    // show menu
    jQuery(".catalog__menu span").click(function () {
        jQuery('.category').toggle('slow')
    });

    // show subcategory
    jQuery('.category__box-menu>ul').click(function () {
        jQuery('.category__box-menu>ul').removeClass('active');
        if (jQuery(this).next('.box__sub-menu').css("display") == "none") {
            jQuery('.box__sub-menu').hide('normal');
            jQuery(this).next('.box__sub-menu').toggle('normal');
            jQuery('.category__box-menu>ul').removeClass('active');
            jQuery(this).toggleClass('active');
        } else jQuery('.box__sub-menu').hide('normal');
        return false;
    })


})