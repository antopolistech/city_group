@extends('frontEnd.master')

@section('title')

CityGroup

@endsection
@section('pageCss')
    <style>
        .news-image{
            height: 214px !important;
        }
    </style>
@endsection

@section('mainContent')

@include('frontEnd.includes.slider')

<!--Social Page Links Area Start -->
@include('frontEnd.includes.social')
<!--Social Page Links Area End-->

<!-- Company Overview Area Start -->
<section class="company_overview-area text-justify section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="section-title white-title text-center">Know Us</h2>
                <div class="company-overview-content">
                    <p>
                       @if(isset($about_text))
                       {!! $about_text->about_text !!}
                       @endif
                    </p>
                </div>

                <div class="know-more-button">
                    <a href="{{route('know-us.index')}}" class="button"><span>Know more </span></a>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Company Overview Area End -->

<!-- Technology Area Start -->
<section class="technology-area text-center">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="technology-content">
                    <h2 class="section-title blue-title text-center text-uppercase">Excellence Through Innovation & Technology</h2>
                    <p>Strength lies in group's ability to use state-of-the-art technology from Europe and America</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- TechnologyArea End -->

<!-- Our Brands Area Start-->
<section class="our-brands-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 all-brands-box">
                <h2 class="section-title white-title text-center">Our Brands</h2>
                @foreach($brand as $b)
                <div class="single-brand">
                    <a href="{{route('brand.show',$b->id)}}"><div class="brand-img-box"><img src="{{asset($b->brand_logo2)}}" alt="{{$b->brand_name}}" style="width:105px; height:70px;"></div></a>
                    <div class="content-box">
                        <p>{{$b->brand_desc}}
                        </p>
                        <div class="read-more"><a href="{{route('brand.show',$b->id)}}" class="blue-font">Read More</a></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Our Brands  Area End -->

<!-- Business Excellence Area Start -->
<section class="business-excellence-area text-center">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="business-content">
                    <h2 class="section-title blue-title text-center text-uppercase">Prestigious Brands of Asia</h2>
                    <p>TEER Advanced Soyabean Oil and TEER Atta, Flour, Semolina are the Prestigious Brands of Asia</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Business Excellence Area End -->

<!-- News and Events Area Start -->
<section class="news-events-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="white-title blue-font text-center section-title">News and Events</h2>
            </div>
            <div class="col-sm-12">
                <div class="news-events-slider owl-carousel owl-theme">
                    @foreach($news as $n)
                    @php $img = DB::table('news_event_images')->where('news_event_id',$n->id)->first() @endphp
                    <div class="item">
                        <figure>
                            <img class="news-image" alt="{{$img->news_image}}" src="{{asset($img->news_image)}}" >
                            <figcaption>
                                <h4>{{$n->news_name}}</h4>
                                <p>{!! $n->news_desc !!}</p>
                                <!--<div class="know-more-button"><a href="#"><span></span>Know more <i class="fa fa-angle-right"></i></a></div>-->
                            </figcaption>
                        </figure>
                    </div>
                    @endforeach
                </div>
                <div class="news_nav">
                    <i class="fa fa-angle-left testi_prev"></i>
                    <i class="fa fa-angle-right testi_next"></i>
                </div>
                <div class="col-xs-12 home-news-events-button">
                    <div class="know-more-button">
                        <a href="{{route('news-event.index')}}" class="button"><span>See more </span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- News and Events Area END -->



@endsection