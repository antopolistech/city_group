@extends('frontEnd.master')

@section('title')
Management
@endsection

@section('mainContent')

<!-- Banner Start -->
<section class="banner-area know-us-page management-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!--<h1 class="text-uppercase text-center">Management</h1>-->
            </div>
        </div>
    </div>
</section>
<!-- Banner End -->

<!--Social Page Links Area Start-->
@include('frontEnd.includes.social')
<!--Social Page Links Area End-->

<!-- CEO Message Start -->
<section class="ceo-message-area section-padding">
    <div class="container">
        @if(isset($chairman))
        <div class="row">
            <div class="col-sm-12">
                <h2 class="section-title white-title text-center">Management</h2>
            </div>
            <div class="col-sm-5">
                <div class="ceo-img">
                    <img src="{{ $chairman->chairman_image }}" alt="{{ $chairman->chairman_image }}">
                </div>
            </div>
            <div class="col-sm-7">
                <!--<div class="designation">-->
                   <div class="message-container">
                       <blockquote>
                           <h2>Chairman's Message</h2>
                           <p class="ceo-message">
                               {!! $chairman->chairman_message !!}
                           </p>
                           <div class="designation">
                               <h3 class="text-uppercase">{{ $chairman->chairman_name }}</h3>
                               <h5 class="text-uppercase">{{ $chairman->chairman_designation }}</h5>
                           </div>
                       </blockquote>
                   </div>
                <!--</div>-->
            </div>
        </div>
        @endif
    </div>
</section>
<!-- CEO Message End -->

<!-- Director List Area Start -->
<section class="director-list-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="section-title white-title text-center">Board of Directors</h2>
            </div>
            @foreach($director as $director)
            <div class="col-sm-4">
                <figure class="director-single-img">
                    <!--<img src="{{$director->director_image}}" alt="{{$director->director_image}}" width="180" height="200">-->
                    <figcaption>
                        <h4>{{$director->director_name}} </h4>
                        <span>{{$director->director_designation}} </span>
                    </figcaption>
                </figure>
            </div>
            @endforeach
        </div>
        <div class="row management-team-extra">
            <div class="col-sm-12">
                <h2 class="section-title white-title text-center">Management Team</h2>
            </div>

            @foreach($manageTeam as $team)
            <div class="col-sm-4">
                <figure class="director-single-img">
                    <!--<img src="{{$team->manageTeam_image}}" alt="{{$team->manageTeam_image}}" width="180" height="200">-->
                    <figcaption>
                        <h4>{{$team->manageTeam_name}} </h4>
                        <span>{{$team->manageTeam_designation}} </span>
                    </figcaption>
                </figure>
            </div>
            @endforeach


        </div>
    </div>
</section>
<!-- Director List Area End -->

@endsection
