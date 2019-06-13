<header class="sticky">
    <nav class="navbar navbar-expand-lg navbar-dark sticky fixed-top  custom_nav">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('/images/frontend/images/logo.png') }}" alt="{{ config('app.name') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ABOUT US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/property-for/1/buy') }}">BUY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/property-for/2/rent') }}">RENT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/property-for/3/off-plan') }}">OFF PLAN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">CONTACT US</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-sm" href="#" style="color:#fff; background: #05b3f8;">List Your Property</a>
                </li>
            </ul>
        </div>
    </nav>
</header>