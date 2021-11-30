@extends('frontEnd.master')


@section('title')

Commercial

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

<!-- Achievement Area Start -->
<section class="commercials-area text-center section-padding">
    <div class="container">
        <div class="row">
            <h2 class="section-title white-title text-center">Commercials</h2>
            @foreach($datas as $data)
            <div class="col-sm-4">
                <div class="commercial-thumb">
                  
                    <iframe width="100%" height="190" src="{{$data->commercial_iframe}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

                    <h5>{{$data->commercial_text}}</h5>
                 </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Achievement Area End -->

@endsection