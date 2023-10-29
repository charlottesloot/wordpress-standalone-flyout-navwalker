jQuery(document).ready(function ($) {
    $.noConflict();


    var standard_nav_height = $('.main-site-nav-wrapper').outerHeight();
    console.log(standard_nav_height);


    $('.nav--hamburger').click(function(){
        var nav_wrapper =  $('.main-site-nav-wrapper');
        $(this).toggleClass('open'); // hamburger animation

        
        $('.main-site-nav').toggle();
        $('.main-site-nav-wrapper').toggleClass('open');


        if ($(this).hasClass('open')){
            $('.main-site-nav-wrapper').animate({height: '80dvh'},300)
            
        } else {
            $('.main-site-nav-wrapper').animate({height: standard_nav_height},300)
        }

    })

    if ($(window).width() >= 992) {
        console.log('on desktop');
        $('.sub-menu').hide();
        
        $('.menu-item-has-children').on({
            mouseenter: function() {
                $(this).children('.sub-menu').slideDown();
            },
            mouseleave: function() {
                $(this).children('.sub-menu').slideUp();
            }
        });
    
        $('.sub-menu').on({
            mouseenter: function() {
                $(this).stop(true, true).show();
            },
            mouseleave: function() {
                $(this).slideUp();
            }
        });

    } else {
        $('.main-site-nav').hide();
        $('main-site-nav-wrapper').height(standard_nav_height);
        
    }

   
});
