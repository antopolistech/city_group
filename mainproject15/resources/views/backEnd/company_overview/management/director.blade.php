@extends('backEnd.master')

@section('title')
Director
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
            Director <center id="product_error" class="text-danger"></center>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        		<form action="{{route('admin-director.store')}}" method="post" enctype="multipart/form-data" id="director_add_frm">
        		@csrf
	        		<div class="col-md-12">

                          <div class="form-group col-md-6">
                            <label for="director_name">Director Name </label>
                            <input type="text" class="form-control" id="director_name" name="director_name" placeholder="Director Name">
                            <span class="text-danger error-director_name">
                          </div> 

                          

                          <div class="form-group col-md-6">
                            <label for="director_designation">Director Designation </label>
                            <input type="text" class="form-control" id="director_designation" name="director_designation" placeholder="Director Designation">
                            <span class="text-danger error-director_designation">
                          </div>
                          <div class="form-group col-md-12">
                            <label for="director_image">Director Image </label>
                            <input type="file" class="form-control" id="director_image" name="director_image" accept="image/*">
                            <span class="text-danger error-director_image">
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
           Director
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
                            <th>Designation</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @php $i = 1 @endphp
                        	@foreach($datas as $data)
                        <tr id="director_row_{{$data->id}}">
                            <td>
                                {{$i++}}
                            </td>
                            <td>
                               {{date('d-M-Y',strtotime($data->created_at))}}
                            </td>
                            <td>
                               {{ $data->director_name }}
                            </td>
                            <td>
                               {{$data->director_designation}}
                            </td> 

                            <td>
                               <img src="{{asset($data->director_image)}}" alt="" width="70" height="30">
                            </td>
                            <td>

                                <a data-id="{{$data->id}}" class="btn btn-xs btn-info director_edit_btn"  title="Edit" data-toggle="modal" data-target=".director_modal_lg">
                                    <span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="top" title="update"></span></a>

                                 <a data-id="{{$data->id}}" class="btn btn-xs btn-danger director_delete_btn" data-toggle="tooltip" data-placement="top" title="Delete">
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
<div class="modal fade director_modal_lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #00BCD4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">Edit Director</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="director_edit_frm">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="col-md-12">
                         <div class="form-group col-md-6">
                            <label for="et_director_name">Director Name </label>
                            <input type="text" class="form-control" id="et_director_name" name="director_name" placeholder="Director Name">
                            <span class="text-danger error-et-director_name">
                          </div> 

                         

                          <div class="form-group col-md-6">
                            <label for="et_director_designation">Director Designation </label>
                            <input type="text" class="form-control" id="et_director_designation" name="director_designation" placeholder="Director Designation">
                            <span class="text-danger error-et-director_designation">
                          </div>
                           <div class="form-group col-md-12">
                            <label for="et_director_image">Director Image </label>
                            <input type="file" class="form-control" id="et_director_image" name="director_image" accept="image/*">
                            <span class="text-danger error-et-director_image">
                          </div> 

                    </div>
                    {{-- <center><img src="" alt="" id="director_img_view" width="300" height="200"></center> --}}
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

$('#director_image').dropify()

<!--  add & validation using ajax -->
$('#director_add_frm').submit(function( event ) {
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".error-director_name").text('');
    $(".error-director_image").text('');
    $(".error-director_designation").text('');

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
            $(".error-director_name").text(response.responseJSON.errors.director_name);
            $(".error-director_image").text(response.responseJSON.errors.director_image);
            $(".error-director_designation").text(response.responseJSON.errors.director_designation);
        }
    }
    });
});

<!--  Edit functionality -->
$('#example1 tbody').on('click','.director_edit_btn',function( event ) {  
    
    event.preventDefault();

   $(".error-et-director_name").text('');
   $(".error-et-director_image").text('');
   $(".error-et-director_designation").text('');

    var value = $(this).data('id');
    var url = ('admin-director/'+value+'/edit');
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);
              $('#et_director_name').val(response.data.director_name);
              $('#et_director_designation').val(response.data.director_designation);

              {{-- $('#director_img_view').attr('src', response.data.director_image); --}}
              if(response.data.director_image){
                        var img_url = response.data.director_image;

                       $("#et_director_image").attr("data-height", 100);
                       $("#et_director_image").attr("data-default-file",img_url);

                       $(".dropify-wrapper").removeClass("dropify-wrapper").addClass("dropify-wrapper has-preview");
                       $(".dropify-preview").css('display','block');
                       $('.dropify-render').html('').html('<img src=" '+img_url+'" style="max-height: 100px;">')
                      }else{
                       $(".dropify-preview .dropify-render img").attr("src","");
                      }

                     


                      $('#et_director_image').dropify();

              var route = "<?php echo url('/') ?>";
              console.log(route);
              $("#director_edit_frm").attr("action",(route+'/admin-director/'+response.data.id));
            }
        });
});

$("#director_edit_frm").validate({
               rules: {
                    director_name: {
                        required: true,
                    },

                    director_designation: {
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
$(document).off('submit', '#director_edit_frm');
$(document).on('submit', '#director_edit_frm', function(event){


{{-- $('#director_edit_frm').submit(function( event ) { --}}
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

   $(".error-et-director_name").text('');
   $(".error-et-director_image").text('');
   $(".error-et-director_designation").text('');

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
            $(".error-et-director_name").text(response.responseJSON.errors.director_name);
            $(".error-et-director_image").text(response.responseJSON.errors.director_image);
            $(".error-et-director_designation").text(response.responseJSON.errors.director_designation);
            }
        }
        });
    });

<!--  Delete functionality -->
$('#example1 tbody').on('click','.director_delete_btn',function( event ) {  
   
    event.preventDefault();

    var value = $(this).data('id');
    var url = ('admin-director/'+value);
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
            $( "#director_row_"+value ).fadeOut( "slow" );

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
