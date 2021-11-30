@extends('backEnd.master')

@section('title')
CSR
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
            CSR <center id="product_error" class="text-danger"></center>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        		<form action="{{route('admin-csr.store')}}" method="post" id="csr_add_frm">
        		@csrf
	        		<div class="col-md-12">

                          <div class="form-group col-md-12">
                            <label for="csr_desc">Social Responsibility </label>
                            <textarea type="text" class="form-control tinymce" id="csr_desc" name="csr_desc" rows="12"></textarea>
                            <span class="text-danger error-csr_desc"></span>
                          </div>

						   <div class="col-md-12">
                                <input type="submit" class="btn btn-danger" value="Submit">
                            </div>
					 </div>
	        	</form>
        </div>
    </div>
</section>

@if($data)
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
           CSR
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="box-body table-responsive">
                <table id="" class="table table-bordered table-striped">
                    <thead>
                        <tr class="danger">
                            <th>Created At</th>
                            <th>CSR Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        	
                        <tr id="csr_row_{{$data->id}}">
                            <td>
                               {{date('d-M-Y',strtotime($data->created_at))}}
                            </td>
                            <td>
                               {!! str_limit($data->csr_desc,100) !!}
                            </td>
                            <td>

                                <a data-id="{{$data->id}}" class="btn btn-xs btn-info csr_edit_btn"  title="Edit" data-toggle="modal" data-target=".csr_modal_lg">
                                    <span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="top" title="update"></span></a>

                                <a data-id="{{$data->id}}" class="btn btn-xs btn-primary csr_detail_btn" data-toggle="modal" data-target=".csr_detail_model">
                                <span class="glyphicon glyphicon-th-list" data-toggle="tooltip" data-placement="top" title="Detail"></span></a>

                                <a data-id="{{$data->id}}" class="btn btn-xs btn-danger" id="csr_delete_btn" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td> 
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Modal -->
<div class="modal fade csr_modal_lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #00BCD4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">Edit CSR</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="csr_edit_frm">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="col-md-12">
                           <div class="form-group col-md-12">
                            <label for="edit_csr_desc">Social Responsibility </label>
                            <textarea type="text" class="form-control tinymce" id="edit_csr_desc" name="csr_desc" rows="12"></textarea>
                            <span class="text-danger error-edit-csr_desc"></span>
                          </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Submit"></input>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Detail Modal -->
<div class="modal fade csr_detail_model" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #00BCD4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">CSR Detail</h4>
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

<!--  add & validation using ajax -->
$('#csr_add_frm').submit(function( event ) {

    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".error-csr_desc").text('');

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
            $(".error-csr_desc").text(response.responseJSON.errors.csr_desc);
        }
    }
    });
});

<!--  Edit functionality -->
$('.csr_edit_btn').on('click',function( event ) {
    
    event.preventDefault();

   $(".error-edit-csr_desc").text('');

    var value = $(this).data('id');
    var url = ('admin-csr/'+value+'/edit');
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);
              tinyMCE.get('edit_csr_desc').setContent(response.data.csr_desc);

              var route = "<?php echo url('/') ?>";
              console.log(route);
              $("#csr_edit_frm").attr("action",(route+'/admin-csr/'+response.data.id));
            }
        });
});

<!--  edit & validation using ajax -->
$('#csr_edit_frm').submit(function( event ) {

    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".error-edit-csr_desc").text('');

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
            $(".error-edit-csr_desc").text(response.responseJSON.errors.csr_desc);
            }
        }
        });
    });
<!--  Delete functionality -->
$('#csr_delete_btn').on('click',function( event ) {
    
    event.preventDefault();

    var value = $(this).data('id');
    var url = ('admin-csr/'+value);
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
            $( "#csr_row_"+value ).fadeOut( "slow" );

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
$('.csr_detail_btn').on('click',function( event ) {
    
    event.preventDefault();

    var value = $(this).data('id');
    var url = ('admin-csr/'+value);
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);

            var row = '<span><b>Description: </b>'+response.data.csr_desc+'</span><br><br>';

            $(".panel-body").html(row);
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
