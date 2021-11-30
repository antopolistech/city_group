@extends('backEnd.master')

@section('title')
Press-Release
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
            Add Press Release <center id="product_error" class="text-danger"></center>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        		<form action="{{route('admin-PressRelease.store')}}" method="post" enctype="multipart/form-data" id="press_release_add_frm">
        		@csrf
	        		<div class="col-md-12">

						  <div class="form-group col-md-4">
                            <label for="press_release_title">Press Release Title </label>
                            <input type="text" class="form-control" id="press_release_title" name="press_release_title" placeholder="Press Release Title">
                            <span class="text-danger error-press_release_title"></span>
                          </div> 

                          <div class="form-group col-md-4">
                            <label for="press_release_place">Press Release Place </label>
                            <input type="text" class="form-control" id="press_release_place" name="press_release_place" placeholder="@example: Dhaka">
                            <span class="text-danger error-press_release_place"></span>
                          </div>

                          <div class="form-group col-md-4">
                            <label for="press_release_date">Press Release Date </label>
                            <input type="date" class="form-control" id="press_release_date" name="press_release_date">
                            <span class="text-danger error-press_release_date"></span>
                          </div>

                          

                           <div class="form-group col-md-6">
                            <label for="press_release_desc">Press Release Description </label>
                            <textarea type="text" class="form-control tinymce" id="press_release_desc" name="press_release_desc"></textarea>
                            <span class="text-danger error-press_release_desc"></span>
                          </div> 
                          <div class="form-group col-md-6">
                            <label for="press_release_image">Press Release Image </label>
                            <input type="file" class="form-control" id="press_release_image" name="press_release_image" accept="image/*">
                            <span class="text-danger error-press_release_image"></span>
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
            Press Release
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
                            <th>Title</th>
                            <th>Place</th>
                            <th>Date</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                            @php $i = 1 @endphp
                            @foreach($datas as $data)
                        <tr id="press_release_row_{{$data->id}}">

                            <td>
                                {{$i++}}
                            </td>
                            <td>
                               {{date('d-M-Y',strtotime($data->created_at))}}
                            </td>
                            <td>
                                {{$data->press_release_title}}
                            </td>
                             <td>
                                {{$data->press_release_place}}
                            </td> 
                            <td>
                                {{date('d-F-Y',strtotime($data->press_release_date))}}
                            </td>
                            <td>
                                <img src="{{asset($data->press_release_image)}}" alt="{{$data->press_release_image}}" width="70"
                               height="30">
                            </td>
                            <td>
                                <a data-id="{{$data->id}}" class="btn btn-xs btn-info press_release_edit_btn"  title="Edit" data-toggle="modal" data-target=".press_release_modal_lg"><span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="top" title="update"></span></a>

                                <a data-id="{{$data->id}}" class="btn btn-xs btn-primary press_release_detail_btn" data-toggle="modal" data-target=".press_release_detail_model">
                                <span class="glyphicon glyphicon-th-list" data-toggle="tooltip" data-placement="top" title="Detail"></span></a>

                                 <a data-id="{{$data->id}}" class="btn btn-xs btn-danger press_release_delete_btn" data-toggle="tooltip" data-placement="top" title="Delete">
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
<div class="modal fade press_release_modal_lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #00BCD4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">Edit Press Release</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="press_release_edit_frm">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="col-md-12">

                         <div class="form-group col-md-4">
                            <label for="et_press_release_title">Press Release Title </label>
                            <input type="text" class="form-control" id="et_press_release_title" name="press_release_title" placeholder="Press Release Title">
                            <span class="text-danger error-et-press_release_title"></span>
                          </div> 

                          <div class="form-group col-md-4">
                            <label for="et_press_release_place">Press Release Place </label>
                            <input type="text" class="form-control" id="et_press_release_place" name="press_release_place" placeholder="@example: Dhaka">
                            <span class="text-danger error-et-press_release_place"></span>
                          </div>

                        <div class="form-group col-md-4">
                            <label for="et_press_release_date">Press Release Date </label>
                            <input type="date" class="form-control" id="et_press_release_date" name="press_release_date">
                            <span class="text-danger error-et-press_release_date"></span>
                          </div>

                          

                           <div class="form-group col-md-12">
                            <label for="et_press_release_desc">Press Release Description </label>
                            <textarea type="text" class="form-control tinymce" id="et_press_release_desc" name="press_release_desc" placeholder="Press Release Description"></textarea>
                            <span class="text-danger error-et-press_release_desc"></span>
                          </div>  
                          <div class="form-group col-md-12">
                            <label for="et_press_release_image">Press Release Image </label>
                            <input type="file" class="form-control" id="et_press_release_image" name="press_release_image" accept="image/*">
                            <span class="text-danger error-et-press_release_image"></span>
                          </div> 

                          {{-- <center><img id="press_release_show_img" src="" alt="" width="300" height="200"></center> --}}
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
<div class="modal fade press_release_detail_model" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #00BCD4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">Press Release Detail</h4>
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

$('#press_release_image').dropify()
<!--  add & validation using ajax -->
$('#press_release_add_frm').submit(function( event ) {
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".error-press_release_title").text('');
    $(".error-press_release_place").text('');
    $(".error-press_release_date").text('');
    $(".error-press_release_image").text('');
    $(".error-press_release_desc").text('');

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
            $(".error-press_release_title").text(response.responseJSON.errors.press_release_title);
            $(".error-press_release_place").text(response.responseJSON.errors.press_release_place);
            $(".error-press_release_date").text(response.responseJSON.errors.press_release_date);
            $(".error-press_release_image").text(response.responseJSON.errors.press_release_image);
            $(".error-press_release_desc").text(response.responseJSON.errors.press_release_desc);
        }
    }
    });
});

<!--  Edit functionality -->
$('#example1 tbody').on('click','.press_release_edit_btn',function( event ) {
    
    event.preventDefault();

    $(".error-et-press_release_title").text('');
    $(".error-et-press_release_place").text('');
    $(".error-et-press_release_date").text('');
    $(".error-et-press_release_image").text('');
    $(".error-et-press_release_desc").text('');

    var value = $(this).data('id');
    var url = ('admin-PressRelease/'+value+'/edit');
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);
              $('#et_press_release_title').val(response.data.press_release_title);
              $('#et_press_release_place').val(response.data.press_release_place);
              $('#et_press_release_date').val(response.data.press_release_date);
              tinyMCE.get('et_press_release_desc').setContent(response.data.press_release_desc);

              {{-- $('#press_release_show_img').attr('src', response.data.press_release_image); --}}
              if(response.data.press_release_image){
                        var img_url = response.data.press_release_image;

                       $("#et_press_release_image").attr("data-height", 100);
                       $("#et_press_release_image").attr("data-default-file",img_url);

                       $(".dropify-wrapper").removeClass("dropify-wrapper").addClass("dropify-wrapper has-preview");
                       $(".dropify-preview").css('display','block');
                       $('.dropify-render').html('').html('<img src=" '+img_url+'" style="max-height: 100px;">')
                      }else{
                       $(".dropify-preview .dropify-render img").attr("src","");
                      }

                     


                      $('#et_press_release_image').dropify();

              var route = "<?php echo url('/') ?>";
              console.log(route);
              $("#press_release_edit_frm").attr("action",(route+'/admin-PressRelease/'+response.data.id));
            }
        });
});

$("#press_release_edit_frm").validate({
               rules: {
                    press_release_title: {
                        required: true,
                    },

                    press_release_place: {
                        required: true,
                    },
                    press_release_date: {
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
$(document).off('submit', '#press_release_edit_frm');
$(document).on('submit', '#press_release_edit_frm', function(event){

{{-- $('#press_release_edit_frm').submit(function( event ) { --}}
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".error-et-press_release_title").text('');
    $(".error-et-press_release_place").text('');
    $(".error-et-press_release_date").text('');
    $(".error-et-press_release_image").text('');
    $(".error-et-press_release_desc").text('');

    var editorContent =  tinyMCE.get('et_press_release_desc').getContent();
{{-- alert(editorContent) --}}
if (editorContent == '')
{
   {{-- $('#edit_about_text-error').text('This field is required') --}}
     $.toast({
      heading: 'Error',
      text: 'Description field is required',
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
            $(".error-et-press_release_title").text(response.responseJSON.errors.press_release_title);
            $(".error-et-press_release_place").text(response.responseJSON.errors.press_release_place);
            $(".error-et-press_release_date").text(response.responseJSON.errors.press_release_date);
            $(".error-et-press_release_image").text(response.responseJSON.errors.press_release_image);
            $(".error-et-press_release_desc").text(response.responseJSON.errors.press_release_desc);
            }
        }
        });
      }
    });

<!--  Delete functionality -->
$('#example1 tbody').on('click','.press_release_delete_btn',function( event ) {
    
    event.preventDefault();

    var value = $(this).data('id');
    var url = ('admin-PressRelease/'+value);
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
            $( "#press_release_row_"+value ).fadeOut( "slow" );

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
$('#example1 tbody').on('click','.press_release_detail_btn',function( event ) {
    
    event.preventDefault();

    var value = $(this).data('id');
    var url = ('admin-PressRelease/'+value);
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);

            var row = '<span><b>Date: </b>'+response.data.press_release_date+'</span><br><br><span><b>Place: </b>'+response.data.press_release_place+'</span><br><br><span><b>Description: </b>'+response.data.press_release_desc+'</span><br><br><span><b>Image: </b><img src="'+response.data.press_release_image+'" alt="'+response.data.press_release_title+'" width="500" height="300" class="img-responsive"></span><br><br>';

            $(".panel-body").html(row);
            $(".panel-heading").html('<h4>'+response.data.press_release_title+'</h4>');
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


