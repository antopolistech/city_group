@extends('frontEnd.master')

@section('title')
Media
@endsection

@section('mainContent')

<!-- Banner Start -->
<section class="banner-area know-us-page media-page-banner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!--<h1 class="text-uppercase text-center">Know Us</h1>-->
            </div>
        </div>
    </div>
</section>
<!-- Banner End -->

<!--Social Page Links Area Start-->
@include('frontEnd.includes.social')
<!--Social Page Links Area End-->

<!-- Our Brands Area Start-->
<section class="know-us-area media-page-area section-padding text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 know-all-box">

                <h2 class="section-title white-title text-center">Media</h2>

                <div class="col-sm-4">
                    <div class="single-know-box">
                        <div class="know-icon-box"><img src="{{asset('public/frontEnd/img/news&events-img/news&events.png')}}" alt="News & Events"></div>
                        <h3 class="text-uppercase">News & Events</h3>
                        <div class="know-content-box">
                            <p class="text-justify">
                            	@foreach($news as $n)
                                <span>{{$n->news_name}}</span>
                                @endforeach
                            </p>
                            <div class="read-more"><a href="{{route('news-event.index')}}" class="blue-font">View</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="single-know-box">
                        <div class="know-icon-box"><img src="{{asset('public/frontEnd/img/news&events-img/commercials.png')}}" alt="Commercials"></div>
                        <h3 class="text-uppercase">Commercials</h3>
                        <div class="know-content-box">
                            <p class="text-justify">
                            	@foreach($commercial as $c)
                                <span>{{$c->commercial_text}}</span>
                                @endforeach
                            </p>
                            <div class="read-more"><a href="{{route('commercial.index')}}" class="blue-font">View</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="single-know-box">
                        <div class="know-icon-box"><img src="{{asset('public/frontEnd/img/news&events-img/press_releases.png')}}" alt="Press Releases"></div>
                        <h3 class="text-uppercase">Press Releases</h3>
                        <div class="know-content-box">
                            <p class="text-justify">
                            	@foreach($press_release as $p)
                                <span>{{$p->press_release_title}}</span>
                                @endforeach
                            </p>
                            <div class="read-more"><a href="{{route('press-release.index')}}" class="blue-font">View</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Our Brands  Area End -->

@endsection