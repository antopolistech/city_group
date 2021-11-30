@extends('backEnd.master')

@section('title')
News & Event 
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
            News & Event <center id="product_error" class="text-danger"></center>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        		<form action="{{route('admin-news-event.store')}}" method="post" enctype="multipart/form-data" id="new_event_add_frm">
        		@csrf
	        		<div class="col-md-12">

						  <div class="form-group col-md-6">
                            <label for="news_name">News & Event Name </label>
                            <input type="text" class="form-control" id="news_name" name="news_name" placeholder="News & Event">
                            <span class="text-danger error-news_name">
                          </div> 

                          <div class="form-group col-md-6">
                            <label for="news_image">Image (Multiple Image Upload) </label>
                            <input type="file" class="form-control" id="news_image" name="news_image[]" accept="image/*" multiple>
                            <span class="text-danger error-news_image">
                          </div> 

                          <div class="form-group col-md-12">
                            <label for="news_desc">News & Event Description </label>
                            <textarea type="text" class="form-control" id="news_desc" name="news_desc" placeholder="News & Event" rows="4"></textarea>
                            <span class="text-danger error-news_desc">
                          </div>

						   <div class="col-md-12">
                                <input type="submit" class="btn btn-danger" value="Submit">
                            </div>
					 </div>
	        	</form>
        </div>
    </div>
</section>

<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
          Manage News & Event
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
                            <th>News Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        	@php $i = 1 @endphp
                        	@foreach($datas as $data)
                        <tr id="news_event_row_{{$data->id}}">

                            <td>
                                {{$i++}}
                            </td>
                            <td>
                               {{date('d-M-Y',strtotime($data->created_at))}}
                            </td>
                            <td>
                                {{$data->news_name}}
                            </td>
                            <td>
                               
                                <a href="{{route('newsevent-image.show',$data->id)}}" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top" title="Images"><span class="glyphicon glyphicon-picture"></span></a>

                                 <a data-id="{{$data->id}}" class="btn btn-xs btn-info news_event_edit_btn"  title="Edit" data-toggle="modal" data-target=".news_event_modal_lg"><span class="glyphicon glyphicon-edit"  data-toggle="tooltip" data-placement="top" title="update"></span></a>

                                <a data-id="{{$data->id}}" class="btn btn-xs btn-primary news_event_detail_btn" data-toggle="modal" data-target=".news_event_detail_model">
                                <span class="glyphicon glyphicon-th-list" data-toggle="tooltip" data-placement="top" title="Detail"></span></a>

                                <a data-id="{{$data->id}}" class="btn btn-xs btn-danger news_event_delete_btn" data-toggle="tooltip" data-placement="top" title="Delete">
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
<div class="modal fade news_event_modal_lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #00BCD4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">Edit News & Event</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="news_event_edit_frm">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="col-md-12">

                        <div class="form-group col-md-12">
                            <label for="et_news_name">News & Event Name </label>
                            <input type="text" class="form-control" id="et_news_name" name="news_name" placeholder="News & Event">
                            <span class="text-danger error-et-news_name">
                          </div> 

                          <div class="form-group col-md-12">
                            <label for="et_news_desc">News & Event Description </label>
                            <textarea type="text" class="form-control" id="et_news_desc" name="news_desc" placeholder="News & Event"></textarea>
                            <span class="text-danger error-et-news_desc">
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

<!-- Detail Modal -->
<div class="modal fade news_event_detail_model" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #00BCD4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">News & Event Detail</h4>
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
$('#new_event_add_frm').submit(function( event ) {
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".error-news_name").text('');
    $(".error-news_image").text('');
    $(".error-news_desc").text('');

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
            $(".error-news_name").text(response.responseJSON.errors.news_name);
            $(".error-news_image").text(response.responseJSON.errors.news_image);
            $(".error-news_desc").text(response.responseJSON.errors.news_desc);
        }
    }
    });
});

<!--  Edit functionality -->
$('#example1 tbody').on('click','.news_event_edit_btn',function( event ) {
    event.preventDefault();

    $(".error-et-news_name").text('');
    $(".error-et-news_desc").text('');

    var value = $(this).data('id');
    var url = ('admin-news-event/'+value+'/edit');
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);
              $('#et_news_name').val(response.data.news_name);
              $('#et_news_desc').val(response.data.news_desc);

              var route = "<?php echo url('/') ?>";
              $("#news_event_edit_frm").attr("action",(route+'/admin-news-event/'+response.data.id));
            }
        });
});

<!--  edit & validation using ajax -->
$('#news_event_edit_frm').submit(function( event ) {
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".error-et-news_name").text('');
    $(".error-et-news_desc").text('');

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
            $(".error-et-news_name").text(response.responseJSON.errors.news_name);
            $(".error-et-news_desc").text(response.responseJSON.errors.news_desc);
            }
        }
        });
    });

<!--  Delete functionality -->
$('#example1 tbody').on('click','.news_event_delete_btn',function( event ) {
    
    event.preventDefault();

    var value = $(this).data('id');
    var url = ('admin-news-event/'+value);
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
            $( "#news_event_row_"+value ).fadeOut( "slow" );

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
$('#example1 tbody').on('click','.news_event_detail_btn',function( event ) {
    
    event.preventDefault();

    var value = $(this).data('id');
    var url = ('admin-news-event/'+value);
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);

            var row = '<span><b>News & Event description: </b>'+response.data.news_desc+'</span>';

            $(".panel-body").html(row);
            $(".panel-heading").html('<h4>'+response.data.news_name+'</h4>');
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
