@extends('frontEnd.master')

@section('title')
Achievements
@endsection

@section('mainContent')

<!-- Banner Start -->
<section class="banner-area know-us-page achievement-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!--<h1 class="text-uppercase text-center">Acheivement</h1>-->
            </div>
        </div>
    </div>
</section>
<!-- Banner End -->

<!--Social Page Links Area Start-->
@include('frontEnd.includes.social')
<!--Social Page Links Area End-->

<!-- Achievement Area Start -->
<section class="achievement-area text-center section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <h2 class="section-title white-title text-center">Achievements</h2>

                @foreach($acheives as $acheive)
                <div class="achievement-single-box">
                    <div class="achievement-img-box"><img src="{{asset($acheive->achieve_image)}}" alt="{{asset($acheive->achieve_image)}}"></div>
                    <div class="achievement-text-box">
                        <h3>{{$acheive->achieve_name}}</h3>
                        <p>{!! $acheive->achieve_desc !!}</p>
                    </div>
                </div>
                @endforeach

                
            </div>
        </div>
    </div>
</section>
<!-- Achievement Area End -->

@endsection