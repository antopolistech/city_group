@extends('frontEnd.master')


@section('title')

Brand

@endsection

@section('mainContent')

<!-- Banner Start -->
<section class="banner-area brand-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!--<h1 class="text-uppercase text-center">Our Brands</h1>-->
            </div>
        </div>
    </div>
</section>
<!-- Banner End -->

<!--Social Page Links Area Start-->
@include('frontEnd.includes.social')
<!--Social Page Links Area End-->

<!-- Our Brands Area Start-->
<section class="our-brands-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 all-brands-box">
                <h2 class="section-title white-title text-center">Our Brands</h2>
                @foreach($datas as $data)
                <div class="single-brand">
                    <a href="{{route('brand.show',$data->id)}}"><div class="brand-img-box"><img src="{{asset($data->brand_logo2)}}" alt="{{asset($data->brand_logo2)}}" style="width:105px; height:70px;"></div></a>
                    <div class="content-box">
                        <p>{{ $data->brand_desc }}</p>
                        <div class="read-more"><a href="{{route('brand.show',$data->id)}}" class="blue-font">Read More</a></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Our Brands  Area End -->

@endsection