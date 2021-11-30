@extends('backEnd.master')

@section('title')
About
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
            Add About <center id="product_error" class="text-danger"></center>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        		<form action="{{route('about.store')}}" method="post" enctype="multipart/form-data" id="about_add_frm">
        		@csrf
	        		<div class="col-md-12">                
						  <div class="form-group col-md-4">
                            <label for="banner_image">Banner Image</label>
                            <input type="file" class="form-control" id="banner_image" name="banner_image" accept="image/*">
                            <span class="text-danger error-banner_image"></span>
                          </div>

                          <div class="form-group col-md-4">
                            <label for="vision_mission_img">Vision & Mission Image</label>
                            <input type="file" class="form-control" id="vision_mission_img" name="vision_mission_img" accept="image/*">
                            <span class="text-danger error-vision_mission_img"></span>
                          </div>

                          <div class="form-group col-md-4">
                            <label for="core_value_img">Core Value Image</label>
                            <input type="file" class="form-control" id="core_value_img" name="core_value_img" accept="image/*">
                            <span class="text-danger error-core_value_img"></span>
                          </div>

                          <div class="form-group col-md-12">
                            <label for="about_text">About Description (Please Give 850 Characters)</label>
                            <textarea type="text" class="form-control tinymce" id="about_text" name="about_text"></textarea>
                            <span class="text-danger error-about_text"></span>
                          </div>

                          <div class="form-group col-md-6">
                            <label for="vision_text">Vision Description (Please Give 140 Characters)</label>
                            <textarea type="text" class="form-control" id="vision_text" name="vision_text"></textarea>
                            <span class="text-danger error-vision_text"></span>
                          </div> 

                           <div class="form-group col-md-6">
                            <label for="mission_text">Mission Description (Please Give 140 Characters)</label>
                            <textarea type="text" class="form-control" id="mission_text" name="mission_text"></textarea>
                            <span class="text-danger error-mission_text"></span>
                          </div>

						   <div class="col-md-12">
                                <input type="submit" id="about_add_btn" class="btn btn-danger" value="Submit">
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
            Manage About
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
                            <th>Created At</th>
                            <th>About Text</th>
                            <th>Vision Text</th>
                            <th>Mission Text</th>
                            <th>Banner Image</th>
                            <th>Vision Mission Image</th>
                            <th>Core Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr id="about_row_{{$data->id}}">
                            <td>
                              {{date('d-M-Y',strtotime($data->created_at))}}
                            </td>
                            <td>
                              {!!$data->about_text!!}
                            </td>
                            <td>
                               {!!$data->vision_text!!}
                            </td>
                            <td>
                               {!!$data->mission_text!!}
                            </td>
                             <td>
                               <img src="{{asset($data->banner_image)}}" alt="{{asset($data->banner_image)}}" width="80" height="40">
                            </td>
                             <td>
                               <img src="{{asset($data->vision_mission_img)}}" alt="{{asset($data->vision_mission_img)}}" width="80" height="40">
                            </td> 
                            <td>
                               <img src="{{asset($data->core_value_img)}}" alt="{{asset($data->core_value_img)}}" width="80" height="40">
                            </td>
                            <td>

                                <a data-id="{{$data->id}}" class="btn btn-xs btn-info about_edit_btn"  title="Edit" data-toggle="modal" data-target=".about_lg_model">
                                    <span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="top" title="update"></span>
                                </a>
                                
                                <a data-id="{{$data->id}}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Delete" id="about_delete_btn">
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

<!-- Modal -->
<div class="modal fade about_lg_model" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #00BCD4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">Edit About</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="about_edit_frm">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="col-md-12">
                         <div class="form-group col-md-4">
                            <label for="edit_banner_image">Banner Image</label>
                            <input type="file" class="form-control" id="edit_banner_image" name="banner_image" accept="image/*">
                            <span class="text-danger error-edit-banner_image"></span>
                          </div>

                          <input type="hidden" name="about_id" id="about_id">

                          <div class="form-group col-md-4">
                            <label for="edit_vision_mission_img">Vision & Mission Image</label>
                            <input type="file" class="form-control" id="edit_vision_mission_img" name="vision_mission_img" accept="image/*">
                            <span class="text-danger error-edit-vision_mission_img"></span>
                          </div>

                          <div class="form-group col-md-4">
                            <label for="edit_core_value_img">Core Value Image</label>
                            <input type="file" class="form-control" id="edit_core_value_img" name="core_value_img" accept="image/*">
                            <span class="text-danger error-edit-core_value_img"></span>
                          </div>

                          <div class="form-group col-md-12">
                            <label for="edit_about_text">About Description (Please Give 850 Characters)</label>
                            <label id="edit_about_text-error" class="error mt-2 text-danger" for="edit_about_text"></label>
                            <textarea  type="text" class="form-control tinymce" id="edit_about_text" name="about_text"></textarea>
                            <span class="text-danger error-edit-about_text"></span>
                            
                          </div>
                          

                          <div class="form-group col-md-12">
                            <label for="edit_vision_text">Vision Description (Please Give 140 Characters)</label>
                            <textarea type="text" class="form-control" id="edit_vision_text" name="vision_text"></textarea>
                            <span class="text-danger error-edit-vision_text"></span>
                          </div> 

                           <div class="form-group col-md-12">
                            <label for="edit_mission_text">Mission Description (Please Give 140 Characters)</label>
                            <textarea type="text" class="form-control" id="edit_mission_text" name="mission_text"></textarea>
                            <span class="text-danger error-edit-mission_text"></span>
                          </div>
                    </div>
                    {{-- <center>
                        <img src="" alt="" id="about_image_edit_show1" width="250" height="150">
                        <img src="" alt="" id="about_image_edit_show2" width="250" height="150">
                        <img src="" alt="" id="about_image_edit_show3" width="250" height="150">
                    </center> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" id="slider_edit_btn" value="Submit"></input>
                </form>
            </div>
        </div>
    </div>
</div>

@endif
@endsection


@section('script')

$('#banner_image').dropify();
$('#core_value_img').dropify();
$('#vision_mission_img').dropify();

<!--  about add & validation using ajax -->
$('#about_add_frm').submit(function( event ) {
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".error-banner_image").text('');
    $(".error-about_text").text('');
    $(".error-core_value_img").text('');
    $(".error-mission_text").text('');
    $(".error-vision_mission_img").text('');
    $(".error-vision_text").text('');

$.ajax({
    type: method,
    url: url,
    enctype: 'multipart/form-data',
    contentType: false,
    processData: false,
    data: new FormData(this),
    success: function(response){
    console.log(response);
    if(response.url){
        window.location.href = response.url;
        }
    },
    error: function(response){

        if(response.responseJSON.errors){
        console.log(response.responseJSON.errors);
            $(".error-banner_image").text(response.responseJSON.errors.banner_image);
            $(".error-about_text").text(response.responseJSON.errors.about_text);
            $(".error-core_value_img").text(response.responseJSON.errors.core_value_img);
            $(".error-mission_text").text(response.responseJSON.errors.mission_text);
            $(".error-vision_mission_img").text(response.responseJSON.errors.vision_mission_img);
            $(".error-vision_text").text(response.responseJSON.errors.vision_text);
        }
    }
    });
});

<!--  about Edit functionality -->
$('.about_edit_btn').on('click',function( event ) {
    
    event.preventDefault();

    $(".error-edit-banner_image").text('');
    $(".error-edit-about_text").text('');
    $(".error-edit-core_value_img").text('');
    $(".error-edit-mission_text").text('');
    $(".error-edit-vision_mission_img").text('');
    $(".error-edit-vision_text").text('');

    var value = $(this).data('id');
    var url = ('about/'+value+'/edit');
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);
            
              tinyMCE.get('edit_about_text').setContent(response.data.about_text);

              $('#edit_mission_text').val(response.data.mission_text);
              $('#edit_vision_text').val(response.data.vision_text);
              $("#about_id").val(response.data.id);
              
              {{-- $('#about_image_edit_show1').attr('src', response.data.banner_image);
              $('#about_image_edit_show2').attr('src', response.data.core_value_img);
              $('#about_image_edit_show3').attr('src', response.data.vision_mission_img); --}}
              if(response.data.banner_image){
                        var img_url = response.data.banner_image;

                       $("#edit_banner_image").attr("data-height", 100);
                       $("#edit_banner_image").attr("data-default-file",img_url);

                       $(".dropify-wrapper").removeClass("dropify-wrapper").addClass("dropify-wrapper has-preview");
                       $(".dropify-preview").css('display','block');
                       $('.dropify-render').html('').html('<img src=" '+img_url+'" style="max-height: 100px;">')
                      }else{
                       $(".dropify-preview .dropify-render img").attr("src","");
                      }
                if(response.data.core_value_img){
                        var img_url = response.data.core_value_img;

                       $("#edit_core_value_img").attr("data-height", 100);
                       $("#edit_core_value_img").attr("data-default-file",img_url);

                       $(".dropify-wrapper").removeClass("dropify-wrapper").addClass("dropify-wrapper has-preview");
                       $(".dropify-preview").css('display','block');
                       $('.dropify-render').html('').html('<img src=" '+img_url+'" style="max-height: 100px;">')
                      }else{
                       $(".dropify-preview .dropify-render img").attr("src","");
                      }
                  if(response.data.vision_mission_img){
                        var img_url = response.data.vision_mission_img;

                       $("#edit_vision_mission_img").attr("data-height", 100);
                       $("#edit_vision_mission_img").attr("data-default-file",img_url);

                       $(".dropify-wrapper").removeClass("dropify-wrapper").addClass("dropify-wrapper has-preview");
                       $(".dropify-preview").css('display','block');
                       $('.dropify-render').html('').html('<img src=" '+img_url+'" style="max-height: 100px;">')
                      }else{
                       $(".dropify-preview .dropify-render img").attr("src","");
                      }

                     


                      $('#edit_vision_mission_img').dropify();
                      $('#edit_core_value_img').dropify();
                      $('#edit_banner_image').dropify();

              var route = "<?php echo url('/') ?>";
              $("#about_edit_frm").attr("action", (route+'/about/'+response.data.id));
            }
        });
});



$("#about_edit_frm").validate({
               rules: {
                    about_text: {
                        required: true,
                    },

                    vision_text: {
                        required: true,
                    },
                    mission_text: {
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
$(document).off('submit', '#about_edit_frm');
$(document).on('submit', '#about_edit_frm', function(event){
{{-- $('#about_edit_frm').submit(function( event ) { --}}
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".error-edit-banner_image").text('');
    {{-- $(".error-edit-about_text").text(''); --}}
    $(".error-edit-core_value_img").text('');
    $(".error-edit-mission_text").text('');
    $(".error-edit-vision_mission_img").text('');
    $(".error-edit-vision_text").text('');
var editorContent =  tinyMCE.get('edit_about_text').getContent();
{{-- alert(editorContent) --}}
if (editorContent == '')
{
   {{-- $('#edit_about_text-error').text('This field is required') --}}
     $.toast({
      heading: 'Error',
      text: 'About description field is required',
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
            $(".error-edit-banner_image").text(response.responseJSON.errors.banner_image);
            $(".error-edit-about_text").text(response.responseJSON.errors.about_text);
            $(".error-edit-core_value_img").text(response.responseJSON.errors.core_value_img);
            $(".error-edit-mission_text").text(response.responseJSON.errors.mission_text);
            $(".error-edit-vision_mission_img").text(response.responseJSON.errors.vision_mission_img);
            $(".error-edit-vision_text").text(response.responseJSON.errors.vision_text);
            }
        }
        });
}
    
    });

<!--  Delete functionality -->
$('#about_delete_btn').on('click',function( event ) {
    
    event.preventDefault();

    var value = $(this).data('id');
    var url = ('about/'+value);
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
            $( "#about_row_"+value ).fadeOut( "slow" );

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


<!-- $('#slider_edit_frm').submit(function( event ) {
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".error-edit-sliderText1").text('');
    $(".error-edit-sliderText2").text('');
    $(".error-edit-sliderImage").text('');

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
            $(".error-edit-sliderText1").text(response.responseJSON.errors.sliderText1);
            $(".error-edit-sliderText2").text(response.responseJSON.errors.sliderText2);
            $(".error-edit-sliderImage").text(response.responseJSON.errors.sliderImage);
            }
        }
        });
    }); -->