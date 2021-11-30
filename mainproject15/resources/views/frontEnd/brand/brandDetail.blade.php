@extends('frontEnd.master')


@section('title')

{{$data->brand_name}}

@endsection

@section('mainContent')


<!--Social Page Links Area Start-->
@include('frontEnd.includes.social')
<!--Social Page Links Area End-->

<!-- OUR Products STAET -->
<section class="tab-area only-product-tab-area section-padding product-details-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="product-logo text-center">
                    <img src="{{asset($data->brand_logo)}}" alt="{{asset($data->brand_logo)}}">
                    <p class="teer-logo-caption text-center">{{$data->brand_desc}}</p>
                </div>
            </div>
        </div>
        <!-- Nav tabs -->
        <div class="row">
            <div class="col-md-12 padding-zero">
                <ul class="products_catagory area_content text-uppercase" role="tablist">
                    <li class="active">
                        <a href="#all" data-toggle="tab">all</a>
                    </li>
                    @foreach($category as $c)
                    <li>
                        <a href="#category_{{$c->id}}" data-toggle="tab">{{$c->category_name}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- Tab panes -->
            <div class="col-md-12">
                <div class="tab-content brand-carousel">
                    <!--Category ALL Start-->
                    <div role="tabpanel" class="tab-pane product-pane active fade in" id="all">
                        @foreach($product as $p)
                        <div class="tab-item">
                                <a class="product_class" data-id="{{$p->id}}">
                                    <img src="{{asset($p->product_image)}}" alt="{{asset($p->product_image)}}" title="{{$p->product_name}}">
                                </a>
                        </div>
                         @endforeach
                    </div>
                    <!--Category ALL End-->

                    <!--Category-Oil Start-->
                        @foreach($categ as $c)
                    <div role="tabpanel" class="tab-pane product-pane fade" id="category_{{$c->category_id}}">
                        @foreach($product as $p)
                        @if($c->category_id == $p->category_id)
                        <div class="tab-item">                            
                            <a class="product_class" data-id="{{$p->id}}">
                                    <img src="{{asset($p->product_image)}}" alt="{{asset($p->product_image)}}" title="{{$p->product_name}}">
                            </a>
                        </div>
                        @endif
                        @endforeach
                    </div>
                        @endforeach
                    <!--Category-Oil End-->
                </div>
                <div class="tab_area_nav">
                    <i class="fa fa-angle-left testi_prev"></i>
                    <i class="fa fa-angle-right testi_next"></i>
                </div>
            </div>
        </div>

     <!--Product Details Info-->
        <div class="row" id="all-product-details-wrap">
            <div class="col-md-12">
                <div class="col-sm-8 padding-zero">
                    <div class="product-detail-content">
                        <h2 id="product_name"></h2>
                        <p class="details-normal-p"></p>

                        <p class="details-speacial-p"></p>
                    </div>
                </div>
                <div class="col-sm-4 padding-zero">
                    <img class="product-details-sidebar-img" id="product_add_image" src="" alt="">
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-sm-6 available padding-zero" id="Consumer_Bulk_Pack">
                    <h4 class="detail-title">Available in</h4>

                    <table class="table available-table">
                        <tbody>
                        <tr>
                            <td>Consumer Pack</td>
                            <td id="Consumer_Pack"></td>
                        </tr>
                        <tr>
                            <td>Bulk Pack</td>
                            <td id="Bulk_Pack"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-6 tvc-area padding-zero">
                        <div id="carousel-shafi-generic" class="carousel slide" data-ride="carousel">
                    
                          <!-- Wrapper for slides -->
                          <div class="carousel-inner">
                            
                          </div>

                          <!-- Controls -->
                          <a class="left carousel-control" href="#carousel-shafi-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="right carousel-control" href="#carousel-shafi-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
   </div>
</section>
<!-- OUR Products END -->


@endsection


@section('script')

$('#carousel-shafi-generic').carousel({
    interval: false,
}); 


$('#carousel-shafi-generic').hide();

$('.teer-logo-caption').show();
$('#all-product-details-wrap').hide();

$('.product_class').on('click',function( event ) {
    
    event.preventDefault();
    $(".teer-logo-caption").css( { marginButton : "20px", display : "none" } );

    $('#all-product-details-wrap').show();

    value = $(this).attr("data-id");
    var url = ('brand-detail/'+value);
    $.ajax({
            type: 'post',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);
             if(response.data.consumer_pack || response.data.bulk_pack){
                $('#Consumer_Bulk_Pack').show();
            }else{
                $('#Consumer_Bulk_Pack').hide();
            }

             $('#product_name').text(response.data.product_name);
             $('.details-normal-p').text(response.data.product_desc);
             $('.details-speacial-p').text(response.data.product_tag);

            $('#Consumer_Pack').text(response.data.consumer_pack);
            $('#Bulk_Pack').text(response.data.bulk_pack);


             <!-- root directory -->
            var str = "<?php echo url('/') ?>";

            if(response.data.product_add){
             $('#product_add_image').attr('src', str+'/'+response.data.product_add);
             $('#product_add_image').attr('alt', str+'/'+response.data.product_name);
             $('#product_add_image').show();
            }else{
             $('#product_add_image').hide();
            }
                 <!-- youtube iframe -->
                var content = [];
                if(response.youLink.length > 0){
                    $('#carousel-shafi-generic').show();
                }
                for (var i=0 ; i < response.youLink.length; i++) {
                console.log(response.youLink[0]);
                if(i==0){
                    var active = "active";
                 }else{
                    var active = "";
                 }
                    content += '<div class="item '+active+'"><iframe width="100%" height="290px" src="'+response.youLink[i].youtube_link+'" frameborder="0" allowfullscreen></iframe></div>';
                }
                console.log(content);
                $('.carousel-inner').html(content);
                content = '';
                
        }
        });
        $('#carousel-shafi-generic').hide();

});

@endsection
