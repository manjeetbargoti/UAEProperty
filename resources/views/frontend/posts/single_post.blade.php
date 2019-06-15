@extends('layouts.frontend.home_design_2')
@section('content')

<div class="blogbanner">
    <img src="{{ url('/images/frontend/images/blogbanner.jpg') }}">
</div>

@foreach($posts as $p)
<div id="smart_container">
    <section class="pt-1 pb-1">
        <div class="breadcrumb_sec">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb custom_breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/blog') }}">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $p->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <section class="all_blogs">
        <div class="container">
            <div class="row">
                <div class="col-md-9">

                    <div class="single_blog">

                        <div class="blogs_img">
                            <img src="{{ url('images/frontend/post_images/large/'.$p->post_image) }}">
                        </div>
                        <div class="singleblogtxt">
                            <span>Posted By {{ date('d M, Y', strtotime($p->created_at)) }}</span>
                            <h2>{{ $p->title }}</h2>
                            <p>
                                {!! $p->content !!}
                            </p>
                        </div>

                    </div>


                </div>
                <div class="col-md-3">
                    <div class="blogsidebar">
                        <div class="recent_post">
                            <h2>Recent Post</h2>
                            <ul>
                                @foreach(\App\Post::where('status', '1')->orderBy('created_at', 'desc')->get() as $rp)
                                <li>
                                    <a href="{{ url('/blog/'.$rp->url) }}">
                                        <div class="reblogs_img">
                                            <img src="{{ url('/images/frontend/post_images/small/'.$rp->post_image) }}">
                                        </div>
                                        <div class="reblogtxt">
                                            <span>Posted By {{ date('d M, Y', strtotime($rp->created_at)) }}</span>
                                            <h6>{{ $rp->title }}</h6>
                                            <p>{{ strip_tags($rp->content) }} </p>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    @endforeach

    @endsection