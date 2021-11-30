@extends('backEnd.master')

@section('title')
Brand Category
@endsection

@section('mainContent')

@php $value = array() @endphp
@php $value  = $val @endphp
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
            Add Brand Category <center id="product_error" class="text-danger"></center>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        		<form action="{{route('admin-brand-category.store')}}" method="post" id="brand_category_add_frm">
        		@csrf
	        		<div class="col-md-12">                
						  <div class="form-group col-md-4">
                            <label for="brand_id">Band Name</label>
                            <select name="brand_id" class="form-control" id="getPrecedence" >
                            	<option value="">Select One</option>
                            	@foreach($val as $val)
                            	<option value="{{$val->id}}">{{$val->brand_name}}</option>
                            	@endforeach
                            </select>
                            <span class="text-danger error-brand_id"></span>
                          </div>

                          <div class="form-group col-md-4">
                            <label for="category_name">Category Name</label>
                            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category Name">
                            <span class="text-danger error-category_name"></span>
                          </div>
                        <div class="form-group col-md-4">
                            <label for="precedence">Precedence</label>
                            <input type="text" class="form-control" id="precedence" name="precedence" placeholder="Category Precedence" >
                            <span class="text-danger error-precedence"></span>
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
            Manage Slider
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
                            <th>Category Name</th>
                            <th>Precedence</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        	@php $i = 1 @endphp
                        	@foreach($datas as $data)
                        <tr id="brand_category_row_{{$data->id}}">

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
                               {{$data->category_name}}
                            </td>
                            <td>
                               {{$data->precedence}}
                            </td>
                            <td>

                                <a data-id="{{$data->id}}" class="btn btn-xs btn-info brand_category_edit_btn"  title="Edit" data-toggle="modal" data-target=".brand_category_modal_lg">
                                    <span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="top" title="update"></span></a>
                               {{--  <a data-id="{{$data->id}}" class="btn btn-xs btn-danger brand_category_delete_btn" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a> --}}
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
<div class="modal fade brand_category_modal_lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #00BCD4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">Edit Brand Category</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="brand_category_edit_frm">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    {{-- <div class="col-md-12"> --}}
                        <div class="form-group col-md-12">
                            <label for="et_brand_id">Band Name</label>
                            <select name="brand_id" class="form-control" id="et_brand_id">
                                <option value="">Select One</option>
                                @foreach($value as $v)
                                <option value="{{$v->id}}">{{$v->brand_name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-et-brand_id"></span>
                          </div>

                          <div class="form-group col-md-12">
                            <label for="et_category_name">Category Name</label>
                            <input type="text" class="form-control" id="et_category_name" name="category_name" placeholder="Category Name">
                            <span class="text-danger error-et-category_name"></span>
                          </div>
                          <div class="form-group col-md-12">
                            <label for="et_precedence">Precedence</label>
                            <input type="number" class="form-control" id="et_precedence" name="precedence" >
                            <span class="text-danger error-et-category_name"></span>
                          </div>

                    {{-- </div> --}}
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

<!--  add & validation using ajax -->
$('#brand_category_add_frm').submit(function( event ) {
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".error-brand_id").text('');
    $(".error-category_name").text('');

$.ajax({
    type: method,
    url: url,
    enctype: 'multipart/form-data',
    contentType: false,
    processData: false,
    data: new FormData(this),
    success: function(response){

          if (response.message) {
                            $.toast({
                            heading: 'Error',
                            text: response.message,
                            showHideTransition: 'fade',
                            icon: 'error',
                            position: 'top-right',
                            stack: false
                            })
                        } 

    if(response.url){
        window.location.href = response.url;
        }
    },
    error: function(response){
        console.log(response);
        if(response.responseJSON.errors){
            $(".error-brand_id").text(response.responseJSON.errors.brand_id);
            $(".error-category_name").text(response.responseJSON.errors.category_name);
            $(".error-precedence").text(response.responseJSON.errors.precedence);
        }
    }
    });
});

<!--  Edit functionality -->
$('#example1 tbody').on('click','.brand_category_edit_btn',function( event ) {

    event.preventDefault();

    $(".error-et-brand_id").text('');
    $(".error-et-category_name").text('');

    var value = $(this).data('id');
    var url = ('admin-brand-category/'+value+'/edit');
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);
              $('#et_brand_id').val(response.data.brand_id);
              $('#et_category_name').val(response.data.category_name);
              $('#et_precedence').val(response.data.precedence);

              var route = "<?php echo url('/') ?>";
              console.log(route);
              $("#brand_category_edit_frm").attr("action",(route+'/admin-brand-category/'+response.data.id));
            }
        });
});


<!--  edit & validation using ajax -->
$('#brand_category_edit_frm').submit(function( event ) {
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

   $(".error-et-brand_id").text('');
    $(".error-et-category_name").text('');

    $.ajax({
    type: method,
    url: url,
    data: new FormData(this),
    dataType: false,
    contentType: false,
    processData: false,
    success: function(response){
    {{-- console.log(response); --}}
    if (response.message) {
                            $.toast({
                            heading: 'Error',
                            text: response.message,
                            showHideTransition: 'fade',
                            icon: 'error',
                            position: 'top-right',
                            stack: false
                            })
                        } 
    if(response.url){
        window.location.href = response.url;
        }
    },
    error: function(response){
        console.log(response);
        if(response.responseJSON.errors){
            $(".error-et-brand_id").text(response.responseJSON.errors.brand_id);
            $(".error-et-category_name").text(response.responseJSON.errors.category_name);
            }
        }
        });
    });

<!--  Delete functionality -->
$('#example1 tbody').on('click','.brand_category_delete_btn',function( event ) {
    
    event.preventDefault();

    var value = $(this).data('id');
    var url = ('admin-brand-category/'+value);
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
            $( "#brand_category_row_"+value ).fadeOut( "slow" );

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
{{-- 
 $(document).on('change', '#getPrecedence', function (e) {
            e.preventDefault();
            let id = $(this).val();
            

            $.ajax({
                method: 'get',
                data: {
                    id
                },
                url: '{{ url('brand/precedence') }}/' + id,
                success: function (response) {
                
                    if(response.success==true){
                    var value = Object.values(response);
                    var position = parseInt(response.data) + 1;
                    
                    if (value.length == 0) {
                        $('#precedence').val("1");
                    } else {
                        $('#precedence').val(position);
                    }
                }
                },
                error: function (err) {
                    console.log(err)
                }
            })

        }); --}}

      {{--   $(document).on('change', '#et_brand_id', function (e) {
            e.preventDefault();
            let id = $(this).val();
           

            $.ajax({
                method: 'get',
                data: {
                    id
                },
                url: '{{ url('brand/precedence') }}/' + id,
                success: function (response) {
                
                    if(response.success==true){
                    var value = Object.values(response);
                    var position = parseInt(response.data) + 1;
                    
                    if (value.length == 0) {
                        $('#et_precedence').val("1");
                    } else {
                        $('#et_precedence').val(position);
                    }
                }
                },
                error: function (err) {
                    console.log(err)
                }
            })

        }); --}}

     {{--    $("#precedence").on("change keyup paste", function () {
                let id = $(this).val();
                
                var value = $('#getPrecedence').val();
                // alert(pos);

                $.ajax({
                    method: 'get',
                    data: {
                        id, value
                    },
                    url: '{{ url('precedence/check') }}/' + id + '/' + value,
                    success: function (response) {
                        
                       
                       
                        if (response.message) {
                            $.toast({
                            heading: 'Error',
                            text: response.message,
                            showHideTransition: 'fade',
                            icon: 'error',
                            position: 'top-right',
                            stack: false
                            })
                        } 

                   
                    },
                    error: function (err) {
                        console.log(err)
                    }
                })

            }); --}}

           {{--  $("#et_precedence").on("change keyup paste", function () {
                let id = $(this).val();
               
                var value = $('#et_brand_id').val();
                // alert(pos);

                $.ajax({
                    method: 'get',
                    data: {
                        id, value
                    },
                    url: '{{ url('precedence/check') }}/' + id + '/' + value,
                    success: function (response) {
                       

                        if (response.message) {
                            $.toast({
                            heading: 'Error',
                            text: response.message,
                            showHideTransition: 'fade',
                            icon: 'error',
                            position: 'top-right',
                            stack: false
                            })
                        } 

                    },
                    error: function (err) {
                        console.log(err)
                    }
                })

            }); --}}

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


