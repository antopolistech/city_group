@extends('frontEnd.master')

@section('title')
Sister Concern
@endsection

@section('mainContent')

<!-- Banner Start -->
<section class="sister-concern-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!--<h1 class="text-uppercase text-center">SISTER CONCERN</h1>-->
            </div>
        </div>
    </div>
</section>
<!-- Banner End -->

<!--Social Page Links Area Start-->
@include('frontEnd.includes.social')
<!--Social Page Links Area End-->

<!-- Sister Concern Area Start -->
<section class="sister-concern-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="section-title white-title text-center">Our Sister Concern</h2>

                <div id="accordion" class="panel-group">
                	@foreach($sister as $data)
                    <div class="col-sm-4">
                        <div class="panel">
                            <div class="single-sister-concern-img">
                                <img src="{{asset($data->sister_image)}}" alt="{{asset($data->sister_image)}}" class="img-responsive">
                            </div>
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="#panelBody{{$data->id}}" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion">
                                        <h2>{{$data->sister_name}}</h2>
                                    </a>
                                </h4>
                            </div>
                            <div id="panelBody{{$data->id}}" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="padding-zero sister-concern-p fix_p text-justify">
                                        <p><span>{{$data->started_type}}:</span> {{$data->sister_year}}</p>
                                        <p><span>Functionality:</span>{!! $data->sister_functionality !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Sister Concern Area End -->

@endsection