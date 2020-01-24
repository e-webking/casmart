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
    
    if ($(window).width() < 767) {
        var animspeed = 500; // animation speed in milliseconds
        var $blockquote = $('.bigtext');
        var height = $blockquote.height();
        var mini = $('.bigtext p').eq(0).height() + $('.bigtext p').eq(1).height();

        $blockquote.attr('data-fullheight',height+'px');
        $blockquote.attr('data-miniheight',mini+'px');
        $blockquote.css('height',mini+'px');

        $('.expand').on('click', function(e){
          $text = $(this).prev();
          $text.animate({
            'height': $text.attr('data-fullheight')
          }, animspeed);
          $(this).next('.contract').removeClass('hide');
          $(this).addClass('hide');
        });

        $('.contract').on('click', function(e){
          $text = $(this).prev().prev();

          $text.animate({
            'height': $text.attr('data-miniheight')
          }, animspeed);
          $(this).prev('.expand').removeClass('hide');
          $(this).addClass('hide');
        });
    }
    
     $('#galleryarm').lightGallery({download:false,counter:false});
    
    if ($(window).width() <= 768) {
        $('.lg-thumb-outer').height(75);
        $('.lg-thumb-item').height(75);
    }
    
    window.addEventListener("resize", function(){
        if ($(window).width() <= 768) {
            $('.lg-thumb-outer').height(75);
            $('.lg-thumb-item').width(75);
            $('.lg-thumb-item').height(75);
        } else {
            $('.lg-thumb-outer').height(100);
            $('.lg-thumb-item').width(100);
            $('.lg-thumb-item').height(100);
        }
    });
    
    $(".checkout-standard-process .btn-action").click();
    
})(jQuery);

 function autocomplete(){
	 
 }