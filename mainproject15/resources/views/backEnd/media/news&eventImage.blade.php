@extends('backEnd.master')

@section('title')
News & Event Images
@endsection

@section('mainContent')

<section class="content">
    <a href="{{route('admin-news-event.index')}}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Back To News & Event Page"><span class="glyphicon glyphicon-arrow-left"></span> Back To News & Event Page</a>
    <div class="box box-default">
        <div class="box-header with-border">
           News & Event Images
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
                            <th>Images</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        	@php $i = 1 @endphp
                        	@foreach($datas as $data)
                        <tr id="news_event_img_row_{{$data->id}}">

                            <td>
                                {{$i++}}
                            </td>
                            <td>
                               {{date('d-M-Y',strtotime($data->created_at))}}
                            </td>
                            <td>
                                <img src="{{asset($data->news_image)}}" alt="{{asset($data->news_image)}}" width="80" height="40">
                            </td>
                            <td>

                                <a data-id="{{$data->id}}" class="btn btn-xs btn-info news_event_img_edit_btn" data-toggle="modal" data-target=".news_event_image_modal_lg">
                                    <span class="glyphicon glyphicon-edit"  data-toggle="tooltip" data-placement="top" title="update"></span></a>

                                <a data-id="{{$data->id}}" class="btn btn-xs btn-danger news_event_img_delete_btn" data-toggle="tooltip" data-placement="top" title="Delete">
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
<div class="modal fade news_event_image_modal_lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #00BCD4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">Edit News & Event Image</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="news_event_img_edit_frm">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="col-md-12">

                          <div class="form-group col-md-12">
                            <label for="news_image">Image </label>
                            <input type="file" class="form-control" id="news_image" name="news_image" accept="image/*" multiple>
                            <span class="text-danger error-et-news_image">
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

<!--  Edit functionality -->
$('#example1 tbody').on('click','.news_event_img_edit_btn',function( event ) {
    
    event.preventDefault();

    var route = "<?php echo url('/') ?>";

    $(".error-et-news_image").text('');

    var value = $(this).data('id');
    var url = (value+'/edit');
    console.log(url);
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);

              $("#news_event_img_edit_frm").attr("action",(route+'/newsevent-image/'+response.data.id));
            }
        });
});

<!--  edit & validation using ajax -->
$('#news_event_img_edit_frm').submit(function( event ) {
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".error-et-news_image").text('');

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
            $(".error-et-news_image").text(response.responseJSON.errors.news_image);
            }
        }
        });
    });

<!--  Delete functionality -->
$('#example1 tbody').on('click','.news_event_img_delete_btn',function( event ) {
    
    event.preventDefault();

    var route = "<?php echo url('/') ?>";

    var value = $(this).data('id');
    var url = (route+'/newsevent-image/'+value);
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
            $( "#news_event_img_row_"+value ).fadeOut( "slow" );

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
