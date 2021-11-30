@extends('frontEnd.master')

@section('title')
Career
@endsection

@section('mainContent')

<!-- Banner Start -->
<section class="banner-area career-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!--<h1 class="text-uppercase text-center">Our History</h1>-->
            </div>
        </div>
    </div>
</section>
<!-- Banner End -->

<!--Social Page Links Area Start-->
@include('frontEnd.includes.social')
<!--Social Page Links Area End-->

<!-- Life at Citygroup Area Start -->
<section class="life-at-citygroup-area text-justify section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="section-title white-title text-center">Life at City Group</h2>
                <div class="company-overview-content">
                    <p>At City Group, every job is a scope of individual development. Employees are working dedicatedly in the organization since long in different business concerns from Consumer Goods, Shipping, Healthcare, Media etc., according to their area of passion or interest. The management team is comprised of professionals from different industrial exposure adding value through continuous improvement and change management process.</p>
                </div>
                <img src="{{asset('public/frontEnd/img/life-at-citygroup.jpg')}}" alt="Life at city Group">

            </div>
        </div>
    </div>
</section>
<!-- Life at Citygroup Area End -->

<section class="why-work-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="why-work-for-city-group">
                    <h3>Why Join Us?</h3>
                    <ul>
                        <li>Our employees make a positive impact in the society with their dedication in increasing the reach of international standard in FMCG across the Country </li>
                        <li>You will work in an environment that prioritizes creativity, speed and high performance</li>
                        <li>You will work in a company that promotes and embodies equality, safety and diversity</li>
                        <li>We provide you with the rewarding career development you're seeking</li>
                    </ul>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="why-work-for-city-group">
                    <h3>Work Culture</h3>
                    <ul>
                        <li>Freedom and responsibility</li>
                        <li>Performance oriented</li>
                        <li>Continuous improvement</li>
                        <li>Open for creativity and innovation</li>
                        <li>Operational Transparency </li>
                        <li>Excellent work ethos </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@php $script = array()  @endphp
@php $script = $careers  @endphp
<!-- Career Area START -->
<section class="career-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="section-title white-title text-center">Current Opportunities</h2>
                @if(count($careers) <= 0)  
                <h4 class="no-job-announce">No job available now.</h4>
                @endif
                @foreach($careers as $career) 
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a class="know-more-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne{{$career->id}}" aria-expanded="true" aria-controls="collapseOne">
                                        <!--<i class="more-less glyphicon glyphicon-plus"></i>-->
                                        {{$career->designation}}<span>{{$career->job_location}} / {{$career->job_nature}}</span>
                                        <button class="more-less button" type="button"><span>Apply Here</span></button>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne{{$career->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <div class="single-job-box">
                                        <h5><span>Designation:</span> {{$career->designation}}</h5>
                                        <h5><span>Vacancy</span> {{$career->vacancy}}</h5>
                                        <h5><span>Job Description / Responsibility:</span>
                                            <!--The applicants should have “minimum 3 years” of work experience in the following area(s):-->
                                        </h5>
                                        <ul>
                                            {!!$career->job_description!!}
                                        </ul>
                                        <h5><span>Job Nature</span> {{$career->job_nature}}</h5>
                                        <h5><span>Educational Requirements:</span>{{$career->educational_req}}</h5>
                                        <h5><span>Preferred Professional Certification:</span>{{$career->professional_certificate}}</h5>
                                        <h5><span>Experience Requirements:</span>{{$career->experience_req}}</h5>
                                        <h5><span>Job Requirements:</span></h5>
                                        <ul>
                                            {!! $career->job_req !!}
                                        </ul>
                                        <h5><span>Job Location:</span>{{$career->job_location}}</h5>
                                        <h5><span>Salary Range:</span>{{$career->salary_range}}</h5>
                                        <h5><span>Other Benefits:</span>{{$career->other_benefit}}</h5>
                                        <h5><span>Published on:</span> {{date('d F Y',strtotime($career->published_on))}}</h5>
                                        <h5><span>Application Deadline:</span> {{date('d F Y',strtotime($career->deadline))}}</h5>

                                        <form action="{{route('cv.store')}}" method="post" enctype="multipart/form-data" id="send_cv_frm_{{$career->id}}">
                                            @csrf
                                            Select your PDF format CV to upload:
                                            <span class="text-danger error-cvToUpload-{{$career->id}}"></span>
                                            <input type="file" name="cv" accept="application/pdf" id="cv_upload_input_{{$career->id}}">
                                            <input type="hidden" name="career_designation" value="{{$career->designation}}">
                                            <input type="submit" value="Send CV" name="submit">
                                        </form>
                                        <p>
                                            or <br>
                                            {{$career->instruction}}
                                        </p>
                                        <h5><span>To apply through BD Jobs , please click on the following link:</span><a href="{{$career->BD_job_link}}" target="_blank">{{$career->BD_job_link}}</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- panel-group -->
            </div>
        </div>
    </div>
</section>
<!-- Career Area END -->

@endsection

@section('script')

@foreach($script as $s)
<!--  silder add & validation using ajax -->
$('#send_cv_frm_'+{{$s->id}}).submit(function( event ) {
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".error-cvToUpload").text('');

$.ajax({
    type: method,
    url: url,
    enctype: 'multipart/form-data',
    contentType: false,
    processData: false,
    data: new FormData(this),
    success: function(response){
    console.log(response);
    if(response.data.cv){
          $(".error-cvToUpload-"+{{$s->id}}).text('CV Upload Successfully');
          $(".error-cvToUpload-"+{{$s->id}}).css('color','green');
          $("#cv_upload_input_"+{{$s->id}}).val('');
        }
    },
    error: function(response){

        if(response.responseJSON.errors){
            $(".error-cvToUpload-"+{{$s->id}}).text(response.responseJSON.errors.cv[0]);
            $(".error-cvToUpload-"+{{$s->id}}).css('color','red');
        }
    }
    });
});

@endforeach

@endsection
