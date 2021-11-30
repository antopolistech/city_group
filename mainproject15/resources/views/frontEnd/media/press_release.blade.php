@extends('frontEnd.master')


@section('title')

Press Release

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

<!-- Press Releases Area START -->
<section class="career-area press-releases-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="section-title white-title text-center">Press Releases</h2>
                @foreach($datas as $data)
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a class="know-more-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne{{$data->id}}" aria-expanded="true" aria-controls="collapseOne">
                                        {{$data->press_release_title}}<span>{{$data->press_release_place}},  {{date('F d, Y',strtotime($data->created_at))}}</span>
                                        <button class="more-less button" type="button"><span>Read More</span></button>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne{{$data->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <div class="single-job-box">
                                        <img src="{{asset($data->press_release_image)}}" alt="{{asset($data->press_release_image)}}" width="644" height="362">
                                        <h5>{{$data->press_release_title}}</h5>
                                         {!!$data->press_release_desc!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- panel-group End -->
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Press Releases Area END -->


@endsection