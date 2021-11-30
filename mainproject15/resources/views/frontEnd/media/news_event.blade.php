@extends('frontEnd.master')


@section('title')

News And Event

@endsection

@section('mainContent')

<!-- Banner Start -->
<section class="banner-area news-and-events-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!--<h1 class="text-uppercase text-center">News & Events</h1>-->
            </div>
        </div>
    </div>
</section>
<!-- Banner End -->

<!--Social Page Links Area Start-->
@include('frontEnd.includes.social')
<!--Social Page Links Area End-->

<!-- News and Events Page Area Start -->
<section class="news-events-page-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <h2 class="section-title white-title text-center">News & Events</h2>

                <!--single news and events box start-->
                @foreach($news as $new)
                <div class="news-events-single-box">

                	@php $imgs = DB::table('news_event_images')->where('news_event_id',$new->id)->take(6)->get() @endphp
        
                    <div class="news-events-img-box">

                        <div class="panel with-nav-tabs">
                            <div class="panel-body">
                                <div class="tab-content">

                                	@foreach($imgs as $key=>$img)
				                	@php  $inactive = '';  @endphp
				                	@php
				                	if($key == 0){
				                	$inactive = 'in active';
				                	}
				                	@endphp
                                    <div class="tab-pane fade {{$inactive}}" id="tab{{$img->id}}">
                                        <img src="{{asset($img->news_image)}}" alt="{{asset($img->news_image)}}" class="img-responsive">
                                    </div>
                                     @endforeach

                                </div>
                            </div>
                            <div class="panel-heading">
                                <ul class="nav nav-tabs">


                                	@foreach($imgs as $key=>$img)
				                	@php  $active = '';  @endphp
				                	@php
				                	if($key == 0){
				                	$active = 'active';
				                	}
				                	@endphp
                                    <li class="{{$active}}"><a href="#tab{{$img->id}}" data-toggle="tab">
                                        <img src="{{asset($img->news_image)}}" alt="{{asset($img->news_image)}}">
                                    </a></li>
                                     @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="news-events-text-box">
                        <h3>{{$new->news_name}}</h3>
                        <p> {!! $new->news_desc !!} </p>
                    </div>

                </div>
                @endforeach
                <!--single news and events box End-->

            </div>
        </div>
    </div>
</section>
<!-- News and Events Page Area END -->

@endsection