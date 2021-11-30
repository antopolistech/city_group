@extends('frontEnd.master')


@section('title')

About-Us

@endsection

@section('mainContent')

<!-- Banner Start -->
@if(isset($data))
<section class="banner-area know-us-page about-us-page" style="background-image: url('{{asset($data->banner_image)}}')">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!--<h1 class="text-uppercase text-center"></h1>-->
            </div>
        </div>
    </div>
</section>
@endif
<!-- Banner End -->

<!--Social Page Links Area Start-->
@include('frontEnd.includes.social')
<!--Social Page Links Area End-->

<!-- Company Overview Area Start / About Us Page First Content-->
<section class="company_overview-area about-area-content text-justify section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="section-title white-title text-center">About Us</h2>
                <div class="company-overview-content">
                    @if(isset($data))
                    {!! $data->about_text !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Company Overview Area End /About Us Page First Content -->

<!-- About Us Total Area Start-->
<section class="about-us-total-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="achievement-single-box">
                    <div class="achievement-img-box">
                        @if(isset($data))
                        <img src="{{asset($data->vision_mission_img)}}" alt="{{asset($data->vision_mission_img)}}" class="about-single-row-img">
                        @endif
                    </div>
                    <div class="achievement-text-box about-single-content">
                        @if(isset($data))
                        <h3>Our Vision</h3>
                        <p>{!! $data->vision_text !!}</p><br>
                        <h3>Our Mission</h3>
                        <p>{!! $data->mission_text !!}</p>
                        @endif
                    </div>
                </div>
                <div class="achievement-single-box">
                    <div class="achievement-img-box">
                        @if(isset($data))
                        <img src="{{asset($data->core_value_img)}}" alt="{{asset($data->core_value_img)}}" class="about-single-row-img">
                        @endif
                    </div>
                    <div class="achievement-text-box about-single-content">
                        <h3>Our Core Values</h3>
                        <ul>
                            <li>Innovation</li>
                            <li>Quality</li>
                            <li>Productivity</li>
                            <li>Accountability </li>
                            <li>Integrity</li>
                            <li>Teamwork</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Us Total Area End -->

@endsection