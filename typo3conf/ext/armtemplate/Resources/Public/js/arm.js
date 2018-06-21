/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
  /*
  if ($('.fullwidth-img').length) {
     $('.fullwidth-img').find('img').each(function(index){
          var imgHeight = $(this).height();
          if(imgHeight > 0 && $(this).css('display') == 'block')
            $(this).parent().height(imgHeight);
     });
  */
  $(".variable").slick({dots: false,infinite: true,variableWidth: true});
});
