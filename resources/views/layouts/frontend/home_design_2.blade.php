<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/frontend/bootstrap.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/frontend/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/lightslider.css') }}">

    <!-- font icon CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css">

    <title>{{ config('app.name') }}</title>
</head>

<body>

    <div class='notifications top-right'></div>

    @include('layouts.frontend.home_header_2')

    @yield('content')

    @include('layouts.frontend.home_footer')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="{{ asset('js/frontend/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/frontend/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/frontend/lightslider.js') }}"></script>
    <script src="{{ asset('js/frontend/customjs.js') }}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.js"></script>

    <script>
    @if(Session::has('flash_message_success'))
    $('.top-right').notify({
        message: {
            text: "{{ Session::get('flash_message_success') }}"
        },
        // fadeOut: { enabled: true, delay: 3000 }
        transition: 'fade'
    }).show();
    @php
    Session::forget('flash_message_success');
    @endphp
    @endif

    @if(Session::has('flash_message_error'))
    $('.top-right').notify({
        message: {
            text: "{{ Session::get('flash_message_error') }}"
        },
        // fadeOut: { enabled: true, delay: 3000 },
        type: 'error',
        transition: 'fade'
    }).show();
    @php
    Session::forget('flash_message_error');
    @endphp
    @endif
    </script>

    <script>
    var o2 = $('#work-class2')
    o2.owlCarousel({
        items: 1,
        singleItem: true,
        loop: false,
        margin: 10,
        dots: false,
        pagination: false,
        nav: false,
        touchDrag: false,
        slideBy: 2,
        mouseDrag: false
    });

    var o1 = $('#work-class1');
    o1.owlCarousel({
        items: 1,
        singleItem: true,
        loop: false,
        margin: 0,
        //dots:false,
        pagination: false,
        nav: true,
        touchDrag: false,
        slideBy: 1,
        mouseDrag: false
    });

    var o1 = $('#work-class1'),
        o2 = $('#work-class2');

    //Sync o2 by o1
    o1.on('click onDragged', '.owl-next', function() {
        o2.trigger('next.owl.carousel')
    });

    o1.on('click dragged.owl.carousel', '.owl-prev', function() {
        o2.trigger('prev.owl.carousel')
    });

    //Sync o1 by o2
    o2.on('click onDragged', '.owl-next', function() {
        o1.trigger('next.owl.carousel')
    });

    o2.on('click dragged.owl.carousel', '.owl-prev', function() {
        o1.trigger('prev.owl.carousel')
    });
    </script>


</body>

</html>