@extends('frontEnd.master')

@section('title')
CSR
@endsection
@section('pageCss')
<style>
         .company-overview-content.csr-content > p {
            text-align: justify;
        }
</style>
@endsection
@section('mainContent')

<!-- Banner Start -->
<section class="banner-area know-us-page csr-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!--<h1 class="text-uppercase text-center">Social Responsibility</h1>-->
            </div>
        </div>
    </div>
</section>
<!-- Banner End -->

<!--Social Page Links Area Start-->
@include('frontEnd.includes.social')
<!--Social Page Links Area End-->
@if($data)
<!-- Company Overview Area Start -->
<section class="company_overview-area csr-area text-justify section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="section-title white-title text-center">Social Responsibility</h2>

                <div class="company-overview-content csr-content">
                   {!!$data->csr_desc!!}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Company Overview Area End -->
@endif
@endsection