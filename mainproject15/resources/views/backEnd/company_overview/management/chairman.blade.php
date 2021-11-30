@extends('backEnd.master')

@section('title')
Chairman
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
            Chairman <center id="product_error" class="text-danger"></center>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        		<form action="{{route('admin-chairman.store')}}" method="post" enctype="multipart/form-data" id="chairman_add_frm">
        		@csrf
	        		<div class="col-md-12">

                          <div class="form-group col-md-6">
                            <label for="chairman_name">Chairman Name </label>
                            <input type="text" class="form-control" id="chairman_name" name="chairman_name" placeholder="Chairman Name">
                            <span class="text-danger error-chairman_name">
                          </div> 

                          <div class="form-group col-md-6">
                            <label for="chairman_designation">Designation </label>
                            <input type="text" class="form-control" id="chairman_designation" name="chairman_designation" placeholder="Designation">
                            <span class="text-danger error-chairman_designation">
                          </div> 

                          

                          <div class="form-group col-md-6">
                            <label for="chairman_message">Message </label>
                            <textarea type="text" class="form-control tinymce" id="chairman_message" name="chairman_message"></textarea>
                            <span class="text-danger error-chairman_message">
                          </div>

                          <div class="form-group col-md-6">
                            <label for="chairman_image">Image </label>
                            <input type="file" class="form-control" id="chairman_image" name="chairman_image" accept="image/*"></textarea>
                            <span class="text-danger error-chairman_image">
                          </div> 

						   <div class="col-md-12">
                                <input type="submit" class="btn btn-danger" value="Submit">
                            </div>
					 </div>
	        	</form>
        </div>
    </div>
</section>

@if(isset($data))
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
           Manage Chairman
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
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Message</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr id="chairman_row_{{$data->id}}">
                            <td>
                               {{date('d-M-Y',strtotime($data->created_at))}}
                            </td>
                            <td>
                               {{ $data->chairman_name }}
                            </td>
                            <td>
                               {{ $data->chairman_designation }}
                            </td>
                            <td>
                               {!! str_limit($data->chairman_message,50) !!}
                            </td> 

                            <td>
                               <img src="{{asset($data->chairman_image)}}" alt="{{asset($data->chairman_image)}}" width="70" height="30">
                            </td>
                            <td>

                                <a data-id="{{$data->id}}" class="btn btn-xs btn-info chairman_edit_btn"  title="Edit" data-toggle="modal" data-target=".chairman_modal_lg">
                                    <span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="top" title="update"></span></a>

                                  <a data-id="{{$data->id}}" class="btn btn-xs btn-danger" id="chairman_delete_btn" data-toggle="tooltip" data-placement="top" title="Delete">
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
<div class="modal fade chairman_modal_lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #00BCD4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">Edit Chairman</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="chairman_edit_frm">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="col-md-12">
                         <div class="form-group col-md-6">
                            <label for="et_chairman_name">Chairman Name </label>
                            <input type="text" class="form-control" id="et_chairman_name" name="chairman_name" placeholder="Chairman Name">
                            <span class="text-danger error-et-chairman_name">
                          </div> 

                          <div class="form-group col-md-6">
                            <label for="et_chairman_designation">Designation </label>
                            <input type="text" class="form-control" id="et_chairman_designation" name="chairman_designation" placeholder="Designation">
                            <span class="text-danger error-et-chairman_designation">
                          </div> 

                          

                          <div class="form-group col-md-12">
                            <label for="et_chairman_message">Message </label>
                            <textarea type="text" class="form-control tinymce" id="et_chairman_message" name="chairman_message"></textarea>
                            <span class="text-danger error-et-chairman_message">
                          </div>
                          <div class="form-group col-md-12">
                            <label for="et_chairman_image">Image </label>
                            <input type="file" class="form-control" id="et_chairman_image" name="chairman_image" accept="image/*"></textarea>
                            <span class="text-danger error-et-chairman_image">
                          </div> 

                    </div>
                    {{-- <center><img src="" alt="" id="chairman_img_view" width="300" height="200"></center> --}}
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
$('#chairman_image').dropify();
<!--  add & validation using ajax -->
$('#chairman_add_frm').submit(function( event ) {
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".error-chairman_name").text('');
    $(".error-chairman_designation").text('');
    $(".error-chairman_image").text('');
    $(".error-chairman_message").text('');

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
            $(".error-chairman_name").text(response.responseJSON.errors.chairman_name);
            $(".error-chairman_designation").text(response.responseJSON.errors.chairman_designation);
            $(".error-chairman_image").text(response.responseJSON.errors.chairman_image[0]);
            $(".error-chairman_message").text(response.responseJSON.errors.chairman_message);
        }
    }
    });
});

<!--  Edit functionality -->
$('.chairman_edit_btn').on('click',function( event ) {
    
    event.preventDefault();

   $(".error-et-chairman_name").text('');
   $(".error-et-chairman_designation").text('');
   $(".error-et-chairman_image").text('');
   $(".error-et-chairman_message").text('');

    var value = $(this).data('id');
    var url = ('admin-chairman/'+value+'/edit');
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);
              $('#et_chairman_name').val(response.data.chairman_name);
              $('#et_chairman_designation').val(response.data.chairman_designation);
              tinyMCE.get('et_chairman_message').setContent(response.data.chairman_message);
              
              {{-- $('#chairman_img_view').attr('src', response.data.chairman_image); --}}
              if(response.data.chairman_image){
                        var img_url = response.data.chairman_image;

                       $("#et_chairman_image").attr("data-height", 100);
                       $("#et_chairman_image").attr("data-default-file",img_url);

                       $(".dropify-wrapper").removeClass("dropify-wrapper").addClass("dropify-wrapper has-preview");
                       $(".dropify-preview").css('display','block');
                       $('.dropify-render').html('').html('<img src=" '+img_url+'" style="max-height: 100px;">')
                      }else{
                       $(".dropify-preview .dropify-render img").attr("src","");
                      }

                     


                      $('#et_chairman_image').dropify();

              var route = "<?php echo url('/') ?>";
              console.log(route);
              $("#chairman_edit_frm").attr("action",(route+'/admin-chairman/'+response.data.id));
            }
        });
});

$("#chairman_edit_frm").validate({
               rules: {
                    chairman_name: {
                        required: true,
                    },

                    chairman_designation: {
                        required: true,
                    },
                    chairman_message: {
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
$(document).off('submit', '#chairman_edit_frm');
$(document).on('submit', '#chairman_edit_frm', function(event){


{{-- $('#chairman_edit_frm').submit(function( event ) { --}}
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

   $(".error-et-chairman_name").text('');
   $(".error-et-chairman_designation").text('');
   $(".error-et-chairman_image").text('');
   $(".error-et-chairman_message").text('');

   var editorContent =  tinyMCE.get('et_chairman_message').getContent();
{{-- alert(editorContent) --}}
if (editorContent == '')
{
  
     $.toast({
      heading: 'Error',
      text: 'Message field is required',
      showHideTransition: 'fade',
      icon: 'error',
      position: 'top-right',
      stack: false
      })
}
else
{

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
            $(".error-et-chairman_name").text(response.responseJSON.errors.chairman_name);
            $(".error-et-chairman_designation").text(response.responseJSON.errors.chairman_designation);
            $(".error-et-chairman_image").text(response.responseJSON.errors.chairman_image[0]);
            $(".error-et-chairman_message").text(response.responseJSON.errors.chairman_message);
            }
        }
        });

    }
});

<!--  Delete functionality -->
$('#chairman_delete_btn').on('click',function( event ) {
    
    event.preventDefault();

    var value = $(this).data('id');
    var url = ('admin-chairman/'+value);
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
            $( "#chairman_row_"+value ).fadeOut( "slow" );

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
