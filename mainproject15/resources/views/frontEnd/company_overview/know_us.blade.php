@extends('frontEnd.master')

@section('title')
Know Us
@endsection

@section('mainContent')

<!-- Banner Start -->
<section class="banner-area know-us-page">
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
<section class="know-us-area section-padding text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 know-all-box">

                <h2 class="section-title white-title text-center">Know Us</h2>

                <div class="col-sm-4">
                    <div class="single-know-box">
                        <div class="know-icon-box"><img src="{{asset('public/frontEnd/img/know-us-page-img/about-us.png')}}" alt="About Us"></div>
                        <h3 class="text-uppercase">About us</h3>
                        <div class="know-content-box">
                            <p class="text-justify">City Group is one of Bangladesh’s leading conglomerates and trusted consumer goods manufacturers. With 49 years of business legacy, the group has grown substantially over the period in value creation and production.
                            </p>
                            <div class="read-more"><a href="{{route('about-us.index')}}" class="blue-font">Read More</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="single-know-box">
                        <div class="know-icon-box"><img src="{{asset('public/frontEnd/img/know-us-page-img/history.png')}}" alt="Our History"></div>
                        <h3 class="text-uppercase">Our History</h3>
                        <div class="know-content-box">
                            <p class="text-justify">The glorious journey of City Group started in 1972 with a dream of being 21st Century global business Conglomerate. This dream paved the way to establish country’s renowned brands of food consumables and to deliver excellence in service.
                            </p>
                            <div class="read-more"><a href="{{route('history.index')}}" class="blue-font">Read More</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="single-know-box">
                        <div class="know-icon-box"><img src="{{asset('public/frontEnd/img/know-us-page-img/sister-concern.png')}}" alt="Our Sister Concern"></div>
                        <h3 class="text-uppercase">Our Sister Concern</h3>
                        <div class="know-content-box">
                            <p class="text-justify">At present there are 40 sister concerns, each specializing in different areas of production and service incorporating FMCG, feed products, PET bottle, printing and packaging, ship building, media, hospital etc. and continuing for exploration of bigger opportunities.
                            </p>
                            <div class="read-more"><a href="{{route('sister-concern.index')}}" class="blue-font">Read More</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="single-know-box">
                        <div class="know-icon-box"><img src="{{asset('public/frontEnd/img/know-us-page-img/management.png')}}" alt="Company management"></div>
                        <h3 class="text-uppercase">management</h3>
                        <div class="know-content-box">
                            <p class="text-justify">A passionate, proficient and renowned management team is taking care of more than 15,000 manpower of the group under the expert guidance of honorable founding Chairman and Managing Director of City Group- Mr. Fazlur Rahman.
                            </p>
                            <div class="read-more"><a href="{{route('management.index')}}" class="blue-font">Read More</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="single-know-box">
                        <div class="know-icon-box"><img src="{{asset('public/frontEnd/img/know-us-page-img/achievement.png')}}" alt="Logistics & Support"></div>
                        <h3 class="text-uppercase">Achievement</h3>
                        <div class="know-content-box">
                            <p class="text-justify">The past years have been very exciting and encouraging for City Group. It has achieved significant milestones and continues to strive for more in the days to come. Along the way, the group received several national and international recognition for its contribution towards local & global economy.
                            </p>
                            <div class="read-more"><a href="{{route('achievement.index')}}" class="blue-font">Read More</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="single-know-box">
                        <div class="know-icon-box"><img src="{{asset('public/frontEnd/img/know-us-page-img/csr.png')}}" alt="Company Overview"></div>
                        <h3 class="text-uppercase">Social responsibility</h3>
                        <div class="know-content-box">
                            <p class="text-justify">In order to care for the consumers, City Group is always engaged in a variety of corporate activities in the country. Serving the country for more than four decades and being proactive in social arena to improve the quality of life around us.
                            </p>
                            <div class="read-more"><a href="{{route('csr.index')}}" class="blue-font">Read More</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Our Brands  Area End -->

@endsection