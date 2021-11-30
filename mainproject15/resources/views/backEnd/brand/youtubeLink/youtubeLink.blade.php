@extends('backEnd.master')

@section('title')
{{$data->product_name}} - Youtube Link
@endsection

@section('mainContent')

<br>
<section class="content">
<a href="{{route('product.index')}}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Back To Product Page"><span class="glyphicon glyphicon-arrow-left"></span> Back To Product Page</a>
<br><br>
    @if ($errors->any())
    <div class="alert alert-danger error-youtube_link">
        <ol>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ol>
    </div>
    @endif

    <div class="box box-default">
        <div class="box-header with-border">
            Product Youtube Link<center id="product_error" class="text-danger"></center>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        		<form action="{{route('product-youtube-link.store')}}" method="post" enctype="multipart/form-data" id="pro_you_link_add_frm">
        		@csrf
	        		<div class="col-md-12">

                          <div class="form-group col-md-12">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control" value="{{$data->product_name}}" readonly>
                          </div> 

                           <table class="table table-bordered" id="dynamic_input_table">
		                    <tr>
		                        <td>
		                             <div class="form-group col-md-12">
			                            <label for="youtube_link">Product Youtube Link</label>
			                            <input type="text" class="form-control" id="youtube_link" name="youtube_link[]" placeholder="Product Youtube Link">
			                            <input type="hidden" name="p_id" value="{{$data->id}}">
			                          </div> 
		                        </td>
		                        <td class="text-center">
		                            <span class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Add" id="dynamic_input_btn" style="margin-top: 15%;"> <span class="glyphicon glyphicon-plus"></span>
		                        </td>
		                    </tr>

		                    </table>

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
            Manage Product Youtube Link
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
                            <th>Product Name</th>
                            <th>Youtube Link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                            @php $i = 1 @endphp
                            @foreach($you_link as $data)
                        <tr id="pro_you_link_row_{{$data->id}}">

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
                               <iframe width="44%" height="80px" src="{{$data->youtube_link}}" frameborder="0" allowfullscreen></iframe>
                            </td> 
                            <td>
                                <a data-id="{{$data->id}}" class="btn btn-xs btn-info pro_you_link_edit_btn"  data-toggle="modal" data-target=".pro_you_link_lg_model">
                                <span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="top" title="Update Product"></span></a>


                                 <a data-id="{{$data->id}}" class="btn btn-xs btn-danger pro_you_link_delete_btn" data-toggle="tooltip" data-placement="top" title="Delete">
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
<div class="modal fade pro_you_link_lg_model" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #00BCD4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">Edit Youtube Link</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="pro_you_link_edit_frm">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="col-md-12">
                        <div class="form-group col-md-12">
                            <label for="et_youtube_link">Product Youtube Link</label>
                            <input type="text" class="form-control" id="et_youtube_link" name="youtube_link" placeholder="Product Youtube Link">
                            <span class="text-danger error-et-youtube_link"></span>
                        </div>
                    </div>
                    <center><img src="" alt="" id="sliderImage_show" width="300" height="200"></center>
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

<!-- dynamic input field -->
var i = 1;
$('#dynamic_input_btn').click(function(){
   i++;
   $('#dynamic_input_table').append('<tr id="row'+i+'"><td><div class="form-group col-md-12"><label for="youtube_link">Product Youtube Link</label><input type="text" class="form-control" id="youtube_link" name="youtube_link[]" placeholder="Product Youtube Link"></div></td><td class="text-center"><span class="btn btn-sm btn-danger dynamic_delete_btn" id="'+i+'" title="Delete" style="margin-top: 15%;"> <span class="glyphicon glyphicon-remove"></span></td></tr>');

});

$(document).on('click','.dynamic_delete_btn',function(){
    var btn_id = $(this).attr("id");
    $('#row'+btn_id+'').remove();
});


<!--   Edit functionality -->
$('#example1 tbody').on('click','.pro_you_link_edit_btn',function( event ) {
    
    event.preventDefault();
    var route = "<?php echo url('/') ?>";

    $(".error-et-youtube_link").text('');

    var value = $(this).data('id');
    var url = (route+ '/product-youtube-link'+ '/' +value+'/edit');
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);
              $('#et_youtube_link').val(response.data.youtube_link);

              console.log(route);
              $("#pro_you_link_edit_frm").attr("action", (route+ '/product-youtube-link' + '/' +response.data.id));
            }
        });
});

<!--  silder Edit & validation using ajax -->
$('#pro_you_link_edit_frm').submit(function( event ) {
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".error-et-youtube_link").text('');

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
            $(".error-et-youtube_link").text(response.responseJSON.errors.youtube_link);
            }
        }
        });
    });

<!--  Delete functionality -->
$('#example1 tbody').on('click','.pro_you_link_delete_btn',function( event ) {

    event.preventDefault();
    var route = "<?php echo url('/') ?>";

    var value = $(this).data('id');
    var url = (route+'/product-youtube-link/'+value);
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
            $( "#pro_you_link_row_"+value ).fadeOut( "slow" );

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