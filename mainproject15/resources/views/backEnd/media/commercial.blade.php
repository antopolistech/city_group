@extends('backEnd.master')

@section('title')
commercial
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
            Add Commercial <center id="product_error" class="text-danger"></center>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        		<form action="{{route('admin-commercial.store')}}" method="post" enctype="multipart/form-data" id="commercial_add_frm">
        		@csrf
	        		<div class="col-md-12">

						  <div class="form-group col-md-6">
                            <label for="commercial_iframe">Commercial Video Link </label>
                            <input type="text" class="form-control" id="commercial_iframe" name="commercial_iframe" placeholder="Commercial Video Link">
                            <span class="text-danger error-commercial_iframe"></span>
                          </div> 

                          <div class="form-group col-md-6">
                            <label for="commercial_text">Commercial Video Title </label>
                            <input type="text" class="form-control" id="commercial_text" name="commercial_text" placeholder="Commercial Video Title (CHARACTERS 40)">
                            <span class="text-danger error-commercial_text"></span>
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
                            <th>Commercial Text</th>
                            <th>Commercial Iframe</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        	@php $i = 1 @endphp
                        	@foreach($datas as $data)
                        <tr id="commercial_row_{{$data->id}}">

                            <td>
                                {{$i++}}
                            </td>
                            <td>
                               {{date('d-M-Y',strtotime($data->created_at))}}
                            </td>
                            <td>
                                {{$data->commercial_text}}
                            </td>
                            <td>
                                <iframe width="44%" height="80px" src="{{$data->commercial_iframe}}" frameborder="0" allowfullscreen></iframe>
                            </td>
                            <td>

                                <a data-id="{{$data->id}}" class="btn btn-xs btn-info commercial_edit_btn"  title="Edit" data-toggle="modal" data-target=".commercial_modal_lg">
                                    <span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="top" title="update"></span></a>

                                <a data-id="{{$data->id}}" class="btn btn-xs btn-danger commercial_delete_btn" data-toggle="tooltip" data-placement="top" title="Delete">
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
<div class="modal fade commercial_modal_lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #00BCD4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">Edit Commercial</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="commercial_edit_frm">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="col-md-12">

                        <div class="form-group col-md-12">
                            <label for="et_commercial_iframe">Commercial Video Iframe </label>
                            <input type="text" class="form-control" id="et_commercial_iframe" name="commercial_iframe" placeholder="Commercial Video Iframe">
                            <span class="text-danger error-et-commercial_iframe"></span>
                          </div> 

                          <div class="form-group col-md-12">
                            <label for="et_commercial_text">Commercial Video Title </label>
                            <input type="text" class="form-control" id="et_commercial_text" name="commercial_text" placeholder="Commercial Video Title (CHARACTERS 40)">
                            <span class="text-danger error-et-commercial_text"></span>
                          </div>

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

<!--  add & validation using ajax -->
$('#commercial_add_frm').submit(function( event ) {
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".error-commercial_iframe").text('');
    $(".error-commercial_text").text('');

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
            $(".error-commercial_iframe").text(response.responseJSON.errors.commercial_iframe);
            $(".error-commercial_text").text(response.responseJSON.errors.commercial_text);
        }
    }
    });
});

<!--  Edit functionality -->
$('#example1 tbody').on('click','.commercial_edit_btn',function( event ) {
    
    event.preventDefault();

   $(".error-et-commercial_iframe").text('');
    $(".error-et-commercial_text").text('');

    var value = $(this).data('id');
    var url = ('admin-commercial/'+value+'/edit');
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);
              $('#et_commercial_iframe').val(response.data.commercial_iframe);
              $('#et_commercial_text').val(response.data.commercial_text);

              var route = "<?php echo url('/') ?>";
              console.log(route);
              $("#commercial_edit_frm").attr("action",(route+'/admin-commercial/'+response.data.id));
            }
        });
});

<!--  edit & validation using ajax -->
$('#commercial_edit_frm').submit(function( event ) {
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".error-et-commercial_iframe").text('');
    $(".error-et-commercial_text").text('');

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
            $(".error-et-commercial_iframe").text(response.responseJSON.errors.commercial_iframe);
            $(".error-et-commercial_text").text(response.responseJSON.errors.commercial_text);
            }
        }
        });
    });

<!--  Delete functionality -->
$('#example1 tbody').on('click','.commercial_delete_btn',function( event ) {
    event.preventDefault();

    var value = $(this).data('id');
    var url = ('admin-commercial/'+value);
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
            $( "#commercial_row_"+value ).fadeOut( "slow" );

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


