$(document).ready(function(){
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
});



        