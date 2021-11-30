@extends('backEnd.master')

@section('title')
Product
@endsection

@section('mainContent')

<br>
<section class="content">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ol>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ol>
    </div>
    @endif
    <div class="box box-default">
        <div class="box-header with-border">
            Product <center id="product_error" class="text-danger"></center>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        		<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data" id="product_add_frm">
        		@csrf
	        		<div class="col-md-12">                
                          <div class="form-group col-md-6">
                            <label for="brand_id">Brand Name</label>
                            <select name="brand_id" class="form-control" id="brand_id_option">
                                <option value="">Select One</option>
                                @foreach($brand as $b)
                                <option value="{{$b->id}}">{{$b->brand_name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-brand_id"></span>
                          </div>

                          <div class="form-group col-md-6">
                            <label for="category_id">Category Name</label>
                            <select name="category_id" class="form-control" id="category_id_option">
                            </select>
                            <span class="text-danger error-category_id"></span>
                          </div>

                          <div class="form-group col-md-6">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name">
                            <span class="text-danger error-product_name"></span>
                          </div> 
                          <div class="form-group col-md-6">
                            <label for="product_tag">Product TagLine</label>
                            <input type="text" class="form-control" id="product_tag" name="product_tag" placeholder="Product TagLine">
                            <span class="text-danger error-product_tag"></span>
                          </div> 

                          

                          <div class="form-group col-md-12">
                            <label for="product_desc">Product Description</label>
                            <textarea type="text" class="form-control" id="product_desc" name="product_desc" placeholder="Product Description"></textarea>
                            <span class="text-danger error-product_desc"></span>
                          </div> 

                          

                          <div class="form-group col-md-6">
                            <label for="consumer_pack">Consumer Pack</label>
                            <input type="text" class="form-control" id="consumer_pack" name="consumer_pack" placeholder="Consumer Pack">
                            <span class="text-danger error-consumer_pack"></span>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="bulk_pack">Bulk Pack</label>
                            <input type="text" class="form-control" id="bulk_pack" name="bulk_pack" placeholder="Bulk Pack">
                            <span class="text-danger error-bulk_pack"></span>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="product_image">Product Image</label>
                            <input type="file" class="form-control" id="product_image" name="product_image" accept="image/*">
                            <span class="text-danger error-product_image"></span>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="product_add">Product Advertisement Image</label>
                            <input type="file" class="form-control" id="product_add" name="product_add" accept="image/*">
                            <span class="text-danger error-product_add"></span>
                          </div>

						   <div class="col-md-12">
                                <input type="submit" id="slider_add_btn" class="btn btn-danger" value="Submit">
                            </div>
					 </div>
	        	</form>
        </div>
    </div>
</section>

<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            Manage Product
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr class="danger">
                            <th>Serial No</th>
                            <th>Created At</th>
                            <th>product_name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        	@php $i = 1 @endphp
                        	@foreach($product as $data)
                        <tr id="product_row_{{$data->id}}">

                            <td>
                                {{$i++}}
                            </td>
                            <td>
                               {{date('d-M-Y',strtotime($data->created_at))}}
                            </td>
                            <td>
                                {{$data->product_name}}
                            </td>
                            <td>

                                <a href="{{route('youtube.link',$data->id)}}" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top" title="Add Youtube Video link">
                                <span class="glyphicon glyphicon-plus"></span></a>

                                <a data-id="{{$data->id}}" class="btn btn-xs btn-info product_edit_btn" data-toggle="modal" data-target=".product_modal_lg">
                                <span data-toggle="tooltip" data-placement="top" title="Update" class="glyphicon glyphicon-edit"></span></a>

                                <a data-id="{{$data->id}}" class="btn btn-xs btn-primary product_detail_btn" data-toggle="modal" data-target=".product_detail_model">
                                <span class="glyphicon glyphicon-th-list" data-toggle="tooltip" data-placement="top" title="Detail"></span></a>

                                <a data-id="{{$data->id}}" class="btn btn-xs btn-danger product_delete_btn" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td> 
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade product_modal_lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #00BCD4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">Edit Product</h4>
            </div>
            <div class="modal-body">

                <form action="" method="POST" enctype="multipart/form-data" id="product_edit_frm">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <label for="et_category_id">Category Name</label>
                            <select name="category_id" id="et_category_id" class="form-control">
                                
                            </select>
                            <span class="text-danger error-et-category_id"></span>
                          </div>

                          <div class="form-group col-md-6">
                            <label for="et_product_name">Product Name</label>
                            <input type="text" class="form-control" id="et_product_name" name="product_name" placeholder="Product Name">
                            <span class="text-danger error-et-product_name"></span>
                          </div> 

                         
                         

                          <div class="form-group col-md-6">
                            <label for="et_product_desc">Product Description</label>
                            <input type="text" class="form-control" id="et_product_desc" name="product_desc" placeholder="Product Description">
                            <span class="text-danger error-et-product_desc"></span>
                          </div> 

                          <div class="form-group col-md-6">
                            <label for="et_product_tag">Product TagLine</label>
                            <input type="text" class="form-control" id="et_product_tag" name="product_tag" placeholder="Product TagLine">
                            <span class="text-danger error-et-product_tag"></span>
                          </div> 

                          <div class="form-group col-md-6">
                            <label for="et_consumer_pack">Consumer Pack</label>
                            <input type="text" class="form-control" id="et_consumer_pack" name="consumer_pack" placeholder="Consumer Pack">
                            <span class="text-danger error-et-consumer_pack"></span>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="et_bulk_pack">Bulk Pack</label>
                            <input type="text" class="form-control" id="et_bulk_pack" name="bulk_pack" placeholder="Bulk Pack">
                            <span class="text-danger error-et-bulk_pack"></span>
                          </div>
                          <div class="form-group col-md-12">
                            <label for="et_product_image">Product Image</label>
                            <input type="file" class="form-control" id="et_product_image" name="product_image" accept="image/*">
                            <span class="text-danger error-et-product_image"></span>
                          </div>
                           <div class="form-group col-md-12">
                            <label for="et_product_add">Product Advertisement Image</label>
                            <input type="file" class="form-control" id="et_product_add" name="product_add" accept="image/*">
                            <span class="text-danger error-et-product_add"></span>
                          </div>
                       {{--    <center>
                              <img src="" alt="" id="product_img_view" width="300" height="200">
                              <img src="" alt="" id="product_adver_view" width="300" height="200">
                          </center> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" id="slider_edit_btn" value="Submit"></input>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Detail Modal -->
<div class="modal fade product_detail_model" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #00BCD4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">Product Detail</h4>
            </div>
            <div class="modal-body">

                <div class="panel panel-default">
                  <div class="panel-heading"></div>
                  <div class="panel-body">
                    
                  </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

  {{-- $(document).ready(function() { --}}
$('#product_image').dropify();
$('#product_add').dropify();
        {{-- }); --}}
{{-- var imagesUrl = '{!! asset() !!}'; --}}

$('#brand_id_option').on('change', function() {
    var value = $(this).val();
    var url = ('categ-option/'+value);
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response.data.length);
            if(response.data.length >= 0){
                var option = [];
                for(var i = 0; i < response.data.length; i++){
                    option += '<option value="' + response.data[i].id + '">' + response.data[i].category_name + '</option>';
                }
                    $("#category_id_option").html(option);
                    option = '';
                }
            }
            
        });
})

<!--  add & validation using ajax -->
$('#product_add_frm').submit(function( event ) {
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".error-category_id").text('');
    $(".error-product_name").text('');
    $(".error-product_image").text('');
    $(".error-product_desc").text('');
    $(".error-product_tag").text('');
    $(".error-product_add").text('');
    $(".error-consumer_pack").text('');
    $(".error-bulk_pack").text('');

$.ajax({
    type: method,
    url: url,
    enctype: 'multipart/form-data',
    contentType: false,
    processData: false,
    data: new FormData(this),
    success: function(response){

    if(response.url){
        window.location.href = response.url;
        }
    },
    error: function(response){
        console.log(response);
        if(response.responseJSON.errors){
            $(".error-category_id").text(response.responseJSON.errors.category_id);
            $(".error-product_name").text(response.responseJSON.errors.product_name);
            $(".error-product_desc").text(response.responseJSON.errors.product_desc);
            $(".error-product_tag").text(response.responseJSON.errors.product_tag);
            $(".error-consumer_pack").text(response.responseJSON.errors.consumer_pack);
            $(".error-bulk_pack").text(response.responseJSON.errors.bulk_pack);
            $(".error-product_image").text(response.responseJSON.errors.product_image);
            $(".error-product_add").text(response.responseJSON.errors.product_add);
        }
    }
    });
});

<!--  Edit functionality -->
$('#example1 tbody').on('click','.product_edit_btn',function( event ) {

    event.preventDefault();

    $(".error-et-category_id").text('');
    $(".error-et-product_name").text('');
    $(".error-et-product_image").text('');
    $(".error-et-product_desc").text('');
    $(".error-et-product_tag").text('');
    $(".error-et-product_add").text('');
    $(".error-et-consumer_pack").text('');
    $(".error-et-bulk_pack").text('');

    var value = $(this).data('id');
    var url = ('product/'+value+'/edit');
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);
              $('#et_category_id').html('<option value="' + response.data.category_id + '">' + response.data.category_name + '</option>');
              $('#et_product_name').val(response.data.product_name);
              $('#et_product_desc').val(response.data.product_desc);
              $('#et_product_tag').val(response.data.product_tag);
              $('#et_consumer_pack').val(response.data.consumer_pack);
              $('#et_bulk_pack').val(response.data.bulk_pack);
              
            {{--   $('#et_product_image').attr('src',response.data.product_image);
              $('#et_product_add').attr('src',response.data.product_add); --}}
               if(response.data.product_image){
                          var img_url = response.data.product_image;

                       $("#et_product_image").attr("data-height", 100);
                       $("#et_product_image").attr("data-default-file",img_url);

                       $(".dropify-wrapper").removeClass("dropify-wrapper").addClass("dropify-wrapper has-preview");
                       $(".dropify-preview").css('display','block');
                       $('.dropify-render').html('').html('<img src=" '+img_url+'" style="max-height: 100px;">')
                      }else{
                       $(".dropify-preview .dropify-render img").attr("src","");
                      }
                     if(response.data.product_add){
                          var img_url = response.data.product_add;

                       $("#et_product_add").attr("data-height", 100);
                       $("#et_product_add").attr("data-default-file",img_url);

                       $(".dropify-wrapper").removeClass("dropify-wrapper").addClass("dropify-wrapper has-preview");
                       $(".dropify-preview").css('display','block');
                       $('.dropify-render').html('').html('<img src=" '+img_url+'" style="max-height: 100px;">')
                      }else{
                       $(".dropify-preview .dropify-render img").attr("src","");
                      }

                     

                      $('#et_product_image').dropify();
                      $('#et_product_add').dropify();
{{-- 
              $('#product_img_view').attr('src',response.data.product_image);
              $('#product_adver_view').attr('src',response.data.product_add); --}}

              var route = "<?php echo url('/') ?>";
              console.log(route);
              $("#product_edit_frm").attr("action",(route+'/product/'+response.data.id));
            }
        });
});

$("#product_edit_frm").validate({
               rules: {
                    category_id: {
                        required: true,
                    },

                    product_name: {
                        required: true,
                    },
                     product_desc: {
                        required: true,
                    },
                    
                },
                {{-- messages: {
                  sister_name: {
                      required: 'Please enter sister concern name',
                  },
                  started_type: {
                      required: 'Please enter client name',
                  }
                  
                }, --}}
                errorPlacement: function(label, element) {
                    label.addClass('mt-2 text-danger');
                    label.insertAfter(element);
                },
            });

<!--  edit & validation using ajax -->
$(document).off('submit', '#product_edit_frm');
$(document).on('submit', '#product_edit_frm', function(event){

{{-- $('#product_edit_frm').submit(function( event ) { --}}
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".error-et-category_id").text('');
    $(".error-et-product_name").text('');
    $(".error-et-product_image").text('');
    $(".error-et-product_desc").text('');
    $(".error-et-product_tag").text('');
    $(".error-et-product_add").text('');
    $(".error-et-consumer_pack").text('');
    $(".error-et-bulk_pack").text('');

    $.ajax({
    type: method,
    url: url,
    data: new FormData(this),
    dataType: false,
    contentType: false,
    processData: false,
    success: function(response){
    console.log(response);
    if(response.url){
        window.location.href = response.url;
        }
    },
    error: function(response){
        console.log(response);
        if(response.responseJSON.errors){
            $(".error-et-category_id").text(response.responseJSON.errors.category_id);
            $(".error-et-product_name").text(response.responseJSON.errors.product_name);
            $(".error-et-product_image").text(response.responseJSON.errors.product_image);
            $(".error-et-product_desc").text(response.responseJSON.errors.product_desc);
            $(".error-et-product_tag").text(response.responseJSON.errors.product_tag);
            $(".error-et-product_add").text(response.responseJSON.errors.product_add);
            $(".error-et-consumer_pack").text(response.responseJSON.errors.consumer_pack);
            $(".error-et-bulk_pack").text(response.responseJSON.errors.bulk_pack);
            }
        }
        });
    });

<!--  Delete functionality -->
$('#example1 tbody').on('click','.product_delete_btn',function( event ) {
    
    event.preventDefault();

    var value = $(this).data('id');
    var url = ('product/'+value);
    var method =  'DELETE';
    var answer = confirm ("Are you sure you want to delete?");

if(answer){

    $.ajax({
    type: method,
    url: url,
    enctype: 'multipart/form-data',
    contentType: false,
    processData: false,
    data: {'value': value},
    success: function(response){
    console.log(response);
        if(response.msg){
            $( "#product_row_"+value ).fadeOut( "slow" );

            $.toast({
            heading: 'Success',
            text: response.msg,
            showHideTransition: 'slide',
            icon: 'success',
            position: 'top-right',
            stack: false
            });
        }
   
    },
    error: function(response){
        console.log(response);
       
    }
    });
}
});

<!--  detail functionality -->
$('#example1 tbody').on('click','.product_detail_btn',function( event ) {    
    event.preventDefault();

    var value = $(this).data('id');
    var url = ('product/'+value);
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);

            {{-- var row = '<span><b>Category Name:</b> '+response.data.category_name+'</span><br><br><span><b>Product Description:</b> '+response.data.product_desc+'</span><br><br><span><b>Product tag:</b> '+response.data.product_tag+'</span><br><br><span><b>Consumer Pack:</b> '+response.data.consumer_pack+'</span><br><br><span><b>Bulk Pack:</b> '+response.data.bulk_pack+'</span><br><br><span><b>Product Image:</b><img src="'+response.data.product_image+'" alt="'+response.data.product_name+'"  width="123" height="160"></span>&nbsp &nbsp &nbsp<span><b>Product Advertisement: </b><img src="'+response.data.product_add+'" alt="'+response.data.product_name+'" width="250" height="150"></span>'; --}}
            var row = '<span><b>Category Name:</b> '+response.data.category_name+'</span><br><br><span><b>Product Description:</b> '+response.data.product_desc+'</span><br><br><span><b>Product tag:</b> '+response.data.product_tag+'</span><br><br><span><b>Consumer Pack:</b> '+response.data.consumer_pack+'</span><br><br><span><b>Bulk Pack:</b> '+response.data.bulk_pack+'</span><br><br><div class="col-md-12"><div class="row"><div class="col-md-6"><p><b>Product Image:</b></p><img src="'+response.data.product_image+'" alt="'+response.data.product_name+'"  width="123" height="160"></div><div class="col-md-6"><p><b>Product Advertisement:</b> </p><img src="'+response.data.product_add+'" alt="'+response.data.product_name+'" width="250" height="150"></div></div></div>';


            $(".panel-body").html(row);
            $(".panel-heading").html('<h4>'+response.data.product_name+'</h4>');
            }
        });
});

@if($msg = Session::get('msg'))
$.toast({
heading: 'Success',
text: '{{$msg}}',
showHideTransition: 'slide',
icon: 'success',
position: 'top-right',
stack: false
})
{{Session::forget('msg')}}
@endif

@if($msg = Session::get('msg2'))
$.toast({
heading: 'Error',
text: '{{$msg}}',
showHideTransition: 'fade',
icon: 'error',
position: 'top-right',
stack: false
})
{{Session::forget('msg2')}}
@endif

@endsection


