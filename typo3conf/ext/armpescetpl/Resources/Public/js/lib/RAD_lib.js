// Equalize
function equalize(what, thing) {
    var h = 0,
        vPad = 0;
    what.find(thing).each(function() {
        $(this).height('auto');
        var thisHeight = $(this).height(),
            pad1 = parseInt($(this).css('padding-top').replace("px", "")),
            pad2 = parseInt($(this).css('padding-bottom').replace("px", ""));
        vPad = pad1 + pad2;
        // alert(thisHeight);
        if (thisHeight > h) {
            h = thisHeight;
            // alert(h);
        }
    }).css('height', h + vPad + 'px');
}

// AnimScroll
function animScroll(target, dur){
    if(typeof target === 'object' ){
        target = target.offset().top;
    }
    if (dur === undefined) {
        dur = 1000;
    }
    if($('header').css('position') == 'fixed'){
    	target = target - $('header').height();
    }
    $('html,body').animate({
        scrollTop: target
    }, dur);
    window.addEventListener("wheel",function(){
        $('html,body').stop();
    })
}

// OPACITY ANIMATE
$.fn.opacify = function(val,time){
  if (val === undefined) {
      val = 1;
      console.log('Set value for opacity')
  }
  if (time === undefined) {
      time = 0;
      console.log('Set value for time')
  }
  this.animate({
    'opacity':val
  },time);
  return this;
}

// CREATE GRID
function gridify(num){
  var colNum = num,
    colW = (100 / colNum),
    colColor = 'dodgerblue',
    cols;
  if($('.gggridLine').length == 0){
    for(i = 0; i < colNum; i++){
      var col = $('<div>',{
        'class':'gggridLine'
      });
      $('body').append(col);
      col.css({
        'display':'block',
        'position':'fixed',
        'z-index':'9999999',
        'pointer-events':'none',
        'top':0,
        'left':i*colW+'%',
        'width':colW+'%',
        'height':'100%',
        'border-left':'1px solid ' + colColor
      })
    }
    var $tog = $('<div>',{
      'id':'gridTogglr',
      'class':'fa fa-asterisk'
    });
    $('body').append($tog);
    $tog.css({
      'display':'block',
      'position':'fixed',
      'z-index':'9999999',
      'bottom':0,
      'left':0,
      'background':'black',
      'color':'white',
      'width':'30px',
      'text-align':'center',
      'padding-top':'10px',
      'height':'30px'
    })
    cols = $('.gggridLine');
    cols.hide();
    $tog.click(function(){
      cols.fadeToggle(100);
    })
  }
}

// FIND AND WRAP TEXT
$.fn.replaceText = function(b, a, c) {
  return this.each(function() {
      var f = this.firstChild,
          g, e, d = [];
      if (f) {
          do {
              if (f.nodeType === 3) {
                  g = f.nodeValue;
                  e = g.replace(b, a);
                  if (e !== g) {
                      if (!c && /</.test(e)) {
                          $(f).before(e);
                          d.push(f)
                      } else {
                          f.nodeValue = e
                      }
                  }
              }
          } while (f = f.nextSibling)
      }
      d.length && $(d).remove()
  })
}

$(function(){
   // INTERNAL SMOOTH SCROLL
   $('a[href*=#]:not([href=#])').click(function() {
       if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
         var target = $(this.hash);
         target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
         if (target.length) {
           $('html,body').animate({
             scrollTop: target.offset().top
           }, 1000);
           return false;
         }
       }
   }); 
});

var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};

// Visible Check USE - &(element).visible(true) ?
!function(t){var i=t(window);t.fn.visible=function(t,e,o){if(!(this.length<1)){var r=this.length>1?this.eq(0):this,n=r.get(0),f=i.width(),h=i.height(),o=o?o:"both",l=e===!0?n.offsetWidth*n.offsetHeight:!0;if("function"==typeof n.getBoundingClientRect){var g=n.getBoundingClientRect(),u=g.top>=0&&g.top<h,s=g.bottom>0&&g.bottom<=h,c=g.left>=0&&g.left<f,a=g.right>0&&g.right<=f,v=t?u||s:u&&s,b=t?c||a:c&&a;if("both"===o)return l&&v&&b;if("vertical"===o)return l&&v;if("horizontal"===o)return l&&b}else{var d=i.scrollTop(),p=d+h,w=i.scrollLeft(),m=w+f,y=r.offset(),z=y.top,B=z+r.height(),C=y.left,R=C+r.width(),j=t===!0?B:z,q=t===!0?z:B,H=t===!0?R:C,L=t===!0?C:R;if("both"===o)return!!l&&p>=q&&j>=d&&m>=L&&H>=w;if("vertical"===o)return!!l&&p>=q&&j>=d;if("horizontal"===o)return!!l&&m>=L&&H>=w}}}}(jQuery);

/**
 * Overwrites obj1's values with obj2's and adds obj2's if non existent in obj1
 * @param obj1
 * @param obj2
 * @returns obj3 a new object based on obj1 and obj2
 */
function merge_options(obj1,obj2){
    var obj3 = {};
    for (var attrname in obj1) { obj3[attrname] = obj1[attrname]; }
    for (var attrname in obj2) { obj3[attrname] = obj2[attrname]; }
    return obj3;
}