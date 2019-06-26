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

// Multiple Property Image upload by admin or user
var abc = 0; // Declaring and defining global increment variable.
$(document).ready(function() {
    $('#add_more').click(function() {
        $('.add_image').before($("<div/>", {
            id: 'filediv'
        }).fadeIn('slow').append($("<input/>", {
            name: 'file[]',
            type: 'file',
            id: 'file'
        }).trigger('click'),));
    });

    // Following function will executes on change event of file input to select different file.
    $('body').on('change', '#file', function() {
        if (this.files && this.files[0]) {
            abc += 1; // Incrementing global variable by 1.
            var z = abc - 1;
            var x = $(this).parent().find('#previewimg' + z).remove();
            $(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
            $(this).hide();
            $("#abcd" + abc).append($("<i></i>", {
                id: 'close',
                alt: 'delete',
                class: 'fa fa-close'
            }).click(function() {
                $(this).parent().parent().remove();
            }));
        }
    });
    // To Preview Image
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };
    $('#upload').click(function(e) {
        var name = $(":file").val();
        if (!name) {
            alert("First Image Must Be Selected");
            e.preventDefault();
        }
    });
});

// Get City List According to state
$('#state').on('change',function(){
  var stateID = $(this).val();
  if(stateID){
      $.ajax({
          type:"GET",
          url:"/list-your-property/get-city-list?state_id="+stateID,
          success:function(res){               
          if(res){
              $("#city").empty();
              $("#city").append('<option>Select City</option>');
              $.each(res,function(key,value){
                  $("#city").append('<option value="'+key+'">'+value+'</option>');
              });
          
          }else{
              $("#city").empty();
          }
          }
      });
  }else{
      $("#city").empty();
  }   
});

// property product slide //

$('.product-carousel').owlCarousel({
  loop:true,
  margin:30,
  responsiveClass:true,
  autoplay:true,
  responsive:{
      0:{
          items:1,
          nav:true
      },
      600:{
          items:3,
          nav:false
      },
      1000:{
          items:3,
          nav:true,
          loop:false
      }
  }
})