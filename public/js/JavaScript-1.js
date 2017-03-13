jQuery(document).ready(function ($) {

    "use strict";
    $('.selectpicker').selectpicker({
        style: 'btn-info',
        size: 4 
    });
  
    
    $('.owl-carousel').owlCarousel({
        loop: true,
        autoplayTimeout: 6000,
        margin: 10,
        nav: true,
        autoplayHoverPause: true,
        transitionStyle: true,
        dots: true,
        loop: true,
        rtl: true,
        smartSpeed: 1000,
        navText: [
            "<i class='fa fa-angle-right ri' aria-hidden='true'></i>",
            "<i class='fa fa-angle-left le' aria-hidden='true'></i>"
          
        ],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    });

    
    $('.coumb').owlCarousel({
        loop: true,
        autoplayTimeout: 6000,
        margin: 10,
        nav: true,
        autoplayHoverPause: true,
        transitionStyle: true,
        dots: true,
        loop: true,
        rtl: true,
        smartSpeed: 1000,
        navText: [
            "<i class='fa fa-angle-right ri' aria-hidden='true'></i>",
            "<i class='fa fa-angle-left le' aria-hidden='true'></i>"
            
        ],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 6
            }
        }
    });

    
   
});

