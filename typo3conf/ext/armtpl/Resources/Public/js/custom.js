
$(".swiper-container").each(function(index, element){
    
    var $data = $(this).attr('data-uid');
    
    var swiper = new Swiper(".swiper-" + $data, {
        slidesPerView: 1,
        spaceBetween: 30,
        keyboard: {
            enabled: true,
        },
        pagination: {
            el: '.page-'+$data,
            clickable: true,
        },
        navigation: {
            nextEl: '.btn-next-' + $data,
            prevEl: '.btn-prev-' + $data
        }
    });
});

var swiperTes = new Swiper('.swiper-testimonial', {
        slidesPerView: 1,
        spaceBetween: 30,
        keyboard: {
            enabled: true,
        },
        pagination: {
            el: '.pagination-testimonial',
            clickable: true,
        }
});

document.addEventListener(
      "DOMContentLoaded", () => {
         new Mmenu("#menu", {
            extensions: ["position-right", "position-front"]
         }, {
            // configuration
            classNames: {
               fixedElements: {
                  fixed: "fix",
                  sticky: "stick"
               }
            }
         });
      }
   );

(function($){
    $('.listtoggle').on('click', function(){
       $('.armulist').toggle(); 
    });
    
//    $('.media-item').on('mouseover', function(){
//        $(this).siblings('.armoverlay').show();
//        $(this).siblings('.cta').show();
//    });
//    $('.media-item').on('mouseout', function(){
//        $(this).siblings('.armoverlay').hide();
//        $(this).siblings('.cta').hide();
//    });
    
})(jQuery);