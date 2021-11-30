@extends('frontEnd.master')

@section('title')
History
@endsection

@section('mainContent')


<!-- Banner Start -->
<section class="banner-area history-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!--<h1 class="text-uppercase text-center">Our Story</h1>-->
            </div>
        </div>
    </div>
</section>
<!-- Banner End -->
<!--Social Page Links Area Start-->
@include('frontEnd.includes.social')
<!--Social Page Links Area End-->


<!--History Area Start-->
<section class="history-area history">
    <section class="history">
        <header class="container text-center">
            <h2 class="section-title white-title text-center">Our history</h2>
            <span class="subtitle">Timeline</span>
        </header>
        <div class="main-container">
            <div class="container text-center">
                <div class="col-sm-8 col-sm-offset-2">
                    <p class="text-center">At present, City Group focuses on meeting and responding to the ever-changing needs of the consumers both home and abroad. Years of efficacious planning and meticulous effort have paid off and by now City Group has started flourishing towards becoming a 21st Century business conglomerate. </p>
                </div>
            </div>
        </div>

        <div class="timeline container">
            <div class="timeline-badge present"><span class="t"><span class="c">present</span></span></div>
            <div class="timeline-holder">
            	@foreach($history as $key => $history)
                @if($loop->last)
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 text-center last-timeline">
                        <article class="thumbnail">
                            <h3>{{$history->history_name}}</h3>
                            <div class="timeline-badge"><span class="t"><span class="c">{{$history->history_year}}</span></span></div>
                            <img src="{{asset($history->history_image)}}" height="200" width="390" alt="{{asset($history->history_image)}}">
                            <p class="text-center">{!!$history->history_desc!!}</p>
                        </article>
                    </div>
                </div>
                @elseif($key % 2 !== 0)
                <div class="row">
                    <div class="col-sm-6 pull-right">
                        <article class="thumbnail">
                            <h3>{{$history->history_name}}</h3>
                            <img src="{{asset($history->history_image)}}" height="199" width="391" alt="{{asset($history->history_image)}}">
                            <div class="line"><div class="timeline-badge"><span class="t"><span class="c">{{$history->history_year}}</span></span></div></div>
                            <p>{!!$history->history_desc!!}</p>
                        </article>
                    </div>
                </div>

                @else
                <div class="row">
                    <div class="col-sm-6">
                        <article class="thumbnail">
                            <h3>{{$history->history_name}}</h3>
                            <img src="{{asset($history->history_image)}}" height="199" width="391" alt="{{asset($history->history_image)}}">
                            <div class="line">
                                <div class="timeline-badge"><span class="t"><span class="c">{{$history->history_year}}</span></span></div>
                            </div>
                             <p>{!!$history->history_desc!!}</p>
                        </article>
                    </div>
                </div>
               
                @endif
                @endforeach
            </div>
            
        </div>
    </section>
</section>
<!-- History Area End -->

@endsection
