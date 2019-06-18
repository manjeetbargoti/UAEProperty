$(document).ready(function(){

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
            thumbItem:8,
            slideMargin: 0,
            speed:500,
            auto:false,
            loop:false,
            onSliderLoad: function() {
                $('#image-gallery').removeClass('cS-hidden');
            }  
        });
});

// testimonials


$('.testimonial-slider').owlCarousel({
  items:1,
  loop:true,
  margin:10,
  autoplay:2000,
  dot:true,
  nav:true,
});


// TinyMCE Text Editor for Description
var editor_config = {
  height: 250,
  width: 780,
  path_absolute : "/",
  selector: "textarea.my-editor",
  branding: false,
  plugins: [
    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars code fullscreen",
    "insertdatetime media nonbreaking save table contextmenu directionality",
    "emoticons template paste textcolor colorpicker textpattern"
  ],
  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
  relative_urls: false,
  file_browser_callback : function(field_name, url, type, win) {
    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
    var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

    var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
    if (type == 'image') {
      cmsURL = cmsURL + "&type=Images";
    } else {
      cmsURL = cmsURL + "&type=Files";
    }

    tinyMCE.activeEditor.windowManager.open({
      file : cmsURL,
      title : 'Filemanager',
      width : x * 0.8,
      height : y * 0.8,
      resizable : "yes",
      close_previous : "no"
    });
  }
};

tinymce.init(editor_config);

});