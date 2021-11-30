@extends('backEnd.master')

@section('title')
Brand
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
            Add Brand <center id="product_error" class="text-danger"></center>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        		<form action="{{route('admin-brand.store')}}" method="post" enctype="multipart/form-data" id="brand_add_frm">
        		@csrf
	        		<div class="col-md-12">

						  <div class="form-group col-md-12">
                            <label for="brand_name">Brand Name </label>
                            <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Brand Name">
                            <span class="text-danger error-brand_name"></span>
                          </div>  

                          <div class="form-group col-md-12">
                            <label for="brand_desc">Brand Description </label>
                            <textarea type="text" class="form-control" id="brand_desc" name="brand_desc" placeholder="Brand Description"></textarea>
                            <span class="text-danger error-brand_desc"></span>
                          </div> 
                          <div class="form-group col-md-6">
                            <label for="brand_logo">Brand Logo </label>
                            <input type="file" class="form-control" id="brand_logo" name="brand_logo" accept="image/*">
                            <span class="text-danger error-brand_logo"></span>
                          </div>  
                          <div class="form-group col-md-6">
                            <label for="brand_logo">Brand Logo 2</label>
                            <input type="file" class="form-control" id="brand_logo2" name="brand_logo2" accept="image/*">
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
            Manage Brand
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
                            <th>Brand Name</th>
                            <th>Description</th>
                            <th>Logo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        	@php $i = 1 @endphp
                        	@foreach($datas as $data)
                        <tr id="brand_row_{{$data->id}}">

                            <td>
                                {{$i++}}
                            </td>
                            <td>
                               {{date('d-M-Y',strtotime($data->created_at))}}
                            </td>
                            <td>
                               {{$data->brand_name}}
                            </td> 
                            <td>
                               {!!$data->brand_desc!!}
                            </td>
                            <td>
                                <img src="{{asset($data->brand_logo)}}" alt="{{$data->brand_logo}}" width="70"
                               height="30">
                            </td>
                            <td>

                                <a data-id="{{$data->id}}" class="btn btn-xs btn-info brand_edit_btn"  title="Edit" data-toggle="modal" data-target=".brand_modal_lg">
                                    <span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="top" title="update"></span></a>

                               <!--   <a data-id="{{$data->id}}" class="btn btn-xs btn-danger brand_delete_btn" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a> -->
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
<div class="modal fade brand_modal_lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #00BCD4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">Edit Brand</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="brand_edit_frm">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="col-md-12">

                         <div class="form-group col-md-12">
                            <label for="et_brand_name">Brand Name </label>
                            <input type="text" class="form-control" id="et_brand_name" name="brand_name" placeholder="Brand Name">
                            <span class="text-danger error-et-brand_name"></span>
                          </div>  
                          
                           <div class="form-group col-md-12">
                            <label for="et_brand_desc">Brand Description </label>
                            <textarea type="text" class="form-control" id="et_brand_desc" name="brand_desc" placeholder="Brand Description"></textarea>
                            <span class="text-danger error-et-brand_desc"></span>
                          </div> 
                          <div class="form-group col-md-12">
                            <label for="et_brand_logo">Brand Logo </label>
                            <input type="file" class="form-control" id="et_brand_logo" name="brand_logo" accept="image/*">
                            <span class="text-danger error-et-brand_logo"></span>
                          </div> 
                          <div class="form-group col-md-12">
                            <label for="et_brand_logo">Brand Logo 2 </label>
                            <input type="file" class="form-control" id="et_brand_logo2" name="brand_logo2" accept="image/*">
                          </div> 
                          {{-- <center><img id="brand_show_img" src="" alt="" width="120" height="100"></center> --}}
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


@endsection

@section('script')
$('#brand_logo').dropify()
$('#brand_logo2').dropify()
<!--  add & validation using ajax -->
$('#brand_add_frm').submit(function( event ) {
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".error-brand_name").text('');
    $(".error-brand_logo").text('');
    $(".error-brand_desc").text('');

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
            $(".error-brand_name").text(response.responseJSON.errors.brand_name);
            $(".error-brand_logo").text(response.responseJSON.errors.brand_logo);
            $(".error-brand_desc").text(response.responseJSON.errors.brand_desc);
        }
    }
    });
});

<!--  Edit functionality -->
$('#example1 tbody').on('click','.brand_edit_btn',function( event ) {

    event.preventDefault();

    $(".error-et-brand_name").text('');
    $(".error-et-brand_logo").text('');
    $(".error-et-brand_desc").text('');

    var value = $(this).data('id');
    var url = ('admin-brand/'+value+'/edit');
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);
              $('#et_brand_name').val(response.data.brand_name);
              $('#et_brand_desc').val(response.data.brand_desc);

              {{-- $('#brand_show_img').attr('src', response.data.brand_logo); --}}
              if(response.data.brand_logo){
                          var img_url = response.data.brand_logo;

                       $("#et_brand_logo").attr("data-height", 100);
                       $("#et_brand_logo").attr("data-default-file",img_url);

                       $(".dropify-wrapper").removeClass("dropify-wrapper").addClass("dropify-wrapper has-preview");
                       $(".dropify-preview").css('display','block');
                       $('.dropify-render').html('').html('<img src=" '+img_url+'" style="max-height: 100px;">')
                      }else{
                       $(".dropify-preview .dropify-render img").attr("src","");
                      }

                     if(response.data.brand_logo2){
                          var img_url = response.data.brand_logo2;

                       $("#et_brand_logo2").attr("data-height", 100);
                       $("#et_brand_logo2").attr("data-default-file",img_url);

                       $(".dropify-wrapper").removeClass("dropify-wrapper").addClass("dropify-wrapper has-preview");
                       $(".dropify-preview").css('display','block');
                       $('.dropify-render').html('').html('<img src=" '+img_url+'" style="max-height: 100px;">')
                      }else{
                       $(".dropify-preview .dropify-render img").attr("src","");
                      }

                     

                      $('#et_brand_logo').dropify();
                      $('#et_brand_logo2').dropify();

              var route = "<?php echo url('/') ?>";
              console.log(route);
              $("#brand_edit_frm").attr("action",(route+'/admin-brand/'+response.data.id));
            }
        });
});

$("#brand_edit_frm").validate({
               rules: {
                    brand_name: {
                        required: true,
                    },

                    brand_desc: {
                        required: true,
                    }
                    
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
$(document).off('submit', '#brand_edit_frm');
$(document).on('submit', '#brand_edit_frm', function(event){

{{-- $('#brand_edit_frm').submit(function( event ) { --}}
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".error-et-brand_name").text('');
    $(".error-et-brand_logo").text('');
    $(".error-et-brand_desc").text('');

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
            $(".error-et-brand_name").text(response.responseJSON.errors.brand_name);
            $(".error-et-brand_logo").text(response.responseJSON.errors.brand_logo);
            $(".error-et-brand_desc").text(response.responseJSON.errors.brand_desc);
            }
        }
        });
    });

<!--  Delete functionality -->
$('#example1 tbody').on('click','.brand_delete_btn',function( event ) {
    
    event.preventDefault();

    var value = $(this).data('id');
    var url = ('admin-brand/'+value);
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
            $( "#brand_row_"+value ).fadeOut( "slow" );

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

