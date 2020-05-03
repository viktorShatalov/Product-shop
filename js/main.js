jQuery(document).ready(function () {

    //  mobile-menu

    jQuery('.burger').click(function () {
        jQuery('.burger,.navbar').toggleClass('active');
        jQuery('html,body').toggleClass('lock');
    })


    $('a').on('click', function (e) {
        e.preventDefault();
    });


    // $(".category__menu-items li").hover(
    //     function () {
    //         $(this).addClass("active")
    //     }, function () {
    //         $(this).removeClass("active");
    //     }
    // );

})