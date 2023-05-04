




$(window).scroll(function(){
    if ($(window).scrollTop() >= 1) {
       $('header').addClass('sticky');
    }
    else {
       $('header').removeClass('sticky');
    }
});







if($(window))
{
    new WOW().init();
}











//LOADER

  $(window).on('load', function(){

    $("#preloader").removeClass("loader_show");

    $("#preloader").addClass("hide");

    $(".loader").addClass("fadeout");

  });






$(document).ready(function() {
  $(".wsmenu .wsmenu-list li a").click(function() {
    $("body").removeClass("wsactive");
  });
  });



















































    /*=====================================*/
/* Header Sticky : Start */
var lastScroll = 0;
var headheight = jQuery("header.header_main").outerHeight();
jQuery(window).scroll(function () {
    var scroll1 = jQuery(window).scrollTop();
    if (scroll1 >= headheight) {
        if (scroll1 > lastScroll) {
            jQuery("header.header_main").addClass("is-hidden");
            console.log(headheight);
            setTimeout(function () {
                jQuery("header.header_main").addClass("is-fixed");
            }, 1);
        } else if (scroll1 < lastScroll) {
            jQuery("header.header_main").removeClass("is-hidden");
        }
    } else if (scroll1 < headheight) {
        jQuery("header.header_main").removeClass("is-hidden");
    }
    //console.log(scroll);
    if (scroll1 < 1) {
        jQuery("header.header_main").removeClass("is-fixed");
    }

    lastScroll = scroll1;

});
/* Header Sticky : End */
/*=====================================*/
