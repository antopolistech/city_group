@extends('backEnd.master')

@section('title')
History
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
            History <center id="product_error" class="text-danger"></center>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        		<form action="{{route('admin-history.store')}}" method="post" enctype="multipart/form-data" id="history_add_frm">
        		@csrf
	        		<div class="col-md-12">

                          <div class="form-group col-md-6">
                            <label for="history_name">History Name </label>
                            <input type="text" class="form-control" id="history_name" name="history_name" placeholder="History Name">
                            <span class="text-danger history_name"></span>
                          </div> 

                          <div class="form-group col-md-6">
                            <label for="history_year">History Year </label>
                            <input type="text" class="form-control" id="history_year" name="history_year" placeholder="History Year">
                            <span class="text-danger history_year"></span>
                          </div> 
                          <div class="form-group col-md-6">
                            <label for="history_desc">Description </label>
                            <textarea type="text" class="form-control" id="history_desc" name="history_desc" rows="10"></textarea>
                            <span class="text-danger history_desc"></span>
                          </div>

                          <div class="form-group col-md-6">
                            <label for="history_image">Image </label>
                            <input type="file" class="form-control" id="history_image" name="history_image" accept="image/*"></textarea>
                            <span class="text-danger history_image"></span>
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
           Manage History
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
                            <th>SNO</th>
                            <th>Created At</th>
                            <th>Name</th>
                            <th>Year</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @php $i = 1 @endphp
                        	@foreach($history as $data)
                        <tr id="history_row_{{$data->id}}">
                            <td>
                                {{$i++}}
                            </td>
                            <td>
                               {{date('d-M-Y',strtotime($data->created_at))}}
                            </td>
                            <td>
                               {{ $data->history_name }}
                            </td>
                            <td>
                               {{ $data->history_year }}
                            </td> 

                            <td>
                               <img src="{{asset($data->history_image)}}" alt="{{asset($data->history_image)}}" width="70" height="30">
                            </td>
                            <td>

                                
                                <a data-id="{{$data->id}}" class="btn btn-xs btn-info history_edit_btn"  title="Edit" data-toggle="modal" data-target=".history_modal_lg"><span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="top" title="update"></span></a>

                                <a data-id="{{$data->id}}" class="btn btn-xs btn-primary history_detail_btn" data-toggle="modal" data-target=".history_detail_model">
                                <span class="glyphicon glyphicon-th-list" data-toggle="tooltip" data-placement="top" title="Detail"></span></a>

                                 <a data-id="{{$data->id}}" class="btn btn-xs btn-danger history_delete_btn" data-toggle="tooltip" data-placement="top" title="Delete">
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
<div class="modal fade history_modal_lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #00BCD4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">Edit History</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="history_edit_frm">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="col-md-12">
                         <div class="form-group col-md-6">
                            <label for="et_history_name">History Name </label>
                            <input type="text" class="form-control" id="et_history_name" name="history_name" placeholder="History Name">
                            <span class="text-danger edit-history_name"></span>
                          </div> 

                          <input type="hidden" name="id" id="history_id">

                          <div class="form-group col-md-6">
                            <label for="et_history_year">History Year </label>
                            <input type="text" class="form-control" id="et_history_year" name="history_year" placeholder="History Year">
                            <span class="text-danger edit-history_year"></span>
                          </div> 

                          

                          <div class="form-group col-md-12">
                            <label for="et_history_desc">Description </label>
                            <textarea type="text" class="form-control" id="et_history_desc" name="history_desc" rows="5"></textarea>
                            <span class="text-danger edit-history_desc"></span>
                          </div>
                          <div class="form-group col-md-12">
                            <label for="et_history_image">Image </label>
                            <input type="file" class="form-control" id="et_history_image" name="history_image" accept="image/*"></textarea>
                            <span class="text-danger edit-history_image"></span>
                          </div> 
                    </div>
                    {{-- <center><img src="" alt="" id="history_img_view" width="300" height="200"></center> --}}
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
<div class="modal fade history_detail_model" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #00BCD4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">History Detail</h4>
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
$('#history_image').dropify()
<!--  History add & validation using ajax -->
$('#history_add_frm').submit(function( event ) {
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".history_name").text('');
    $(".history_year").text('');
    $(".history_desc").text('');
    $(".history_image").text('');

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

        if(response.responseJSON.errors){
            $(".history_name").text(response.responseJSON.errors.history_name);
            $(".history_year").text(response.responseJSON.errors.history_year);
            $(".history_desc").text(response.responseJSON.errors.history_desc);
            $(".history_image").text(response.responseJSON.errors.history_image[0]);
        }
    }
    });
});

<!--  history Edit functionality -->
$('#example1 tbody').on('click','.history_edit_btn',function( event ) {
    
    event.preventDefault();

    var value = $(this).data('id');
    var url = ('admin-history/'+value+'/edit');
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);
              $('#et_history_name').val(response.data.history_name);
              $('#et_history_year').val(response.data.history_year);
              $('#et_history_desc').val(response.data.history_desc);
              $("#history_id").val(response.data.id);
              if(response.data.history_image){
                        var img_url = response.data.history_image;

                       $("#et_history_image").attr("data-height", 100);
                       $("#et_history_image").attr("data-default-file",img_url);

                       $(".dropify-wrapper").removeClass("dropify-wrapper").addClass("dropify-wrapper has-preview");
                       $(".dropify-preview").css('display','block');
                       $('.dropify-render').html('').html('<img src=" '+img_url+'" style="max-height: 100px;">')
                      }else{
                       $(".dropify-preview .dropify-render img").attr("src","");
                      }

                     


                      $('#et_history_image').dropify();
              
              {{-- $('#history_img_view').attr('src', response.data.history_image); --}}

              var route = "<?php echo url('/') ?>";
              console.log(route);
              $("#history_edit_frm").attr("action", (route+'/admin-history/'+response.data.id));
            }
        });
});
$("#history_edit_frm").validate({
               rules: {
                    history_name: {
                        required: true,
                    },

                    history_year: {
                        required: true,
                    },
                    history_desc: {
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

<!--  silder Edit & validation using ajax -->
$(document).off('submit', '#history_edit_frm');
$(document).on('submit', '#history_edit_frm', function(event){

{{-- $('#history_edit_frm').submit(function( event ) { --}}
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".edit-history_name").text('');
    $(".edit-history_year").text('');
    $(".edit-history_desc").text('');
    $(".edit-history_image").text('');

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
            $(".edit-history_name").text(response.responseJSON.errors.history_name);
            $(".edit-history_year").text(response.responseJSON.errors.history_year);
            $(".edit-history_desc").text(response.responseJSON.errors.history_desc);
            $(".edit-history_image").text(response.responseJSON.errors.history_image[0]);
            }
        }
        });
    });
    
<!--  Delete functionality -->
$('#example1 tbody').on('click','.history_delete_btn',function( event ) {
    
    event.preventDefault();

    var value = $(this).data('id');
    var url = ('admin-history/'+value);
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
            $( "#history_row_"+value ).fadeOut( "slow" );

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
$('#example1 tbody').on('click','.history_detail_btn',function( event ) {
    
    event.preventDefault();

    var value = $(this).data('id');
    var url = ('admin-history/'+value);
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);

            var row = '<span><b>Year: </b>'+response.data.history_year+'</span><br><br><span><b>Description: </b>'+response.data.history_desc+'</span><br><br><span><b>Image: </b><img src="'+response.data.history_image+'" alt="'+response.data.history_name+'" class="img-responsive"></span>';

            $(".panel-body").html(row);
            $(".panel-heading").html('<h4>'+response.data.history_name+'</h4>');
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
