<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top  custom_nav">
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('/images/frontend/images/logo.png') }}" alt="{{ config('app.name') }}"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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

    <section class="search_inside">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 m-auto">
                <div class="searchbox p-0">
                    <ul class="nav d-flex justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="tabnav active" id="buy-tab" data-toggle="tab" href="#buy" role="tab"
                                aria-controls="buy" aria-selected="true">BUY</a>
                        </li>
                        <li class="nav-item">
                            <a class="tabnav" id="rent-tab" data-toggle="tab" href="#rent" role="tab"
                                aria-controls="rent" aria-selected="false">Rent</a>
                        </li>
                        <li class="nav-item">
                            <a class="tabnav" id="off-plan-tab" data-toggle="tab" href="#offPlan" role="tab"
                                aria-controls="off-plan" aria-selected="false">OFF PLAN</a>
                        </li>
                    </ul>
                    <div class="tab-content searchbg" id="myTabContent">
                        <div class="tab-pane fade show active" id="buy" role="tabpanel" aria-labelledby="buy-tab">
                            <div class="search_input">
                                <input type="search" placeholder="Search State, City or Area">
                                <button type="submit"><i class="icon ion-md-search"></i></button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="rent" role="tabpanel" aria-labelledby="rent-tab">
                            <div class="search_input">
                                <input type="search" placeholder="Search State, City or Area">
                                <button type="submit"><i class="icon ion-md-search"></i></button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="offPlan" role="tabpanel" aria-labelledby="off-plan-tab">
                            <div class="search_input">
                                <input type="search" placeholder="Search State, City or Area">
                                <button type="submit"><i class="icon ion-md-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
