jQuery.fn.centerElement = function () {
   this.css ("position", "absolute");
   this.css ("top", ($(window).height() - this.height()) / 2 + $(window).scrollTop() + "px");
   this.css ("left", ($(window).width() - this.width()) / 2 + $(window).scrollLeft() + "px")
   
   return this;
}

function getPosition(el) {
  var xPosition = 0;
  var yPosition = 0;
 
  while (el) {
    if (el.tagName == "BODY") {
      // deal with browser quirks with body/window/document and page scroll
      var xScrollPos = el.scrollLeft || document.documentElement.scrollLeft;
      var yScrollPos = el.scrollTop || document.documentElement.scrollTop;
 
      xPosition += (el.offsetLeft - xScrollPos + el.clientLeft);
      yPosition += (el.offsetTop - yScrollPos + el.clientTop);
    } else {
      xPosition += (el.offsetLeft - el.scrollLeft + el.clientLeft);
      yPosition += (el.offsetTop - el.scrollTop + el.clientTop);
    }
 
    el = el.offsetParent;
  }
  return {
    x: xPosition,
    y: yPosition
  };
}

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
   
function closeModal()
{
    $("#modalimg").hide();
    $('#lightimg').attr('src', '');
}

function openModal(src) {
    $('#lightimg').attr('src', src);
    $("#modalimg").show();
}
    
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
    var hovertitle;
    var hoversrc;
    $('.icon-mouse-event').on('mouseenter', function (){
     
        hovertitle = $(this).find('img').attr('src');
        hoversrc = $(this).find('img').attr('data-title');
        $(this).find('img').attr('src', hoversrc);
        $(this).find('img').attr('data-title', hovertitle);
        
    });
    $('.icon-mouse-event').on('mouseleave', function (){
        hoversrc = $(this).find('img').attr('data-title');
        hovertitle = $(this).find('img').attr('src');
        $(this).find('img').attr('src', hoversrc);
        $(this).find('img').attr('data-title', hovertitle);
    });
    var nicon = '/typo3conf/ext/armaimeos/Resources/Public/Icons/info-button-black.png';
    var hicon = '/typo3conf/ext/armaimeos/Resources/Public/Icons/info-button-white.png';
    var mouseX, mouseY;
    
    $(document).mousemove(function(e) {
        mouseX = e.pageX;
        mouseY = e.pageY;
    }); 
    
   
    $('.arminfo').on('click', function(){
       $(this).css("background-image", "url(" + hicon + ")");
       $(this).siblings('.arm-aimeos-info').show();
       
    });
    $('.arm-aimeos-info').on('click', function (){
       $(this).hide(); 
       $('.arminfo').css("background-image", "url(" + nicon + ")");
    });
    
    
})(jQuery);


