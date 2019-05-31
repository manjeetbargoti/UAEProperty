$(window).scroll(function(){
    var sticky = $('.sticky'),
        scroll = $(window).scrollTop();
  
    if (scroll >= 100) sticky.addClass('bg-dark');
    else sticky.removeClass('bg-dark');
  });

// search 

$(document).ready(function(){
    $("#hidesearch").click(function(){
      $(".searchbox").hide();
      $(".search_header").show();
    });
    $("#showsearch").click(function(){
      $(".searchbox").show();
      $(".search_header").hide();
    });
  });

// product Slider

$(document).ready(function() {
  $("#content-slider").lightSlider({
            loop:false,
            keyPress:true
        });
        $('#image-gallery').lightSlider({
            gallery:true,
            item:1,
            thumbItem:5,
            slideMargin: 0,
            speed:500,
            auto:false,
            loop:false,
            onSliderLoad: function() {
                $('#image-gallery').removeClass('cS-hidden');
            }  
        });
});




  