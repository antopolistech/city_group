@extends('backEnd.master')

@section('title')
Management Team
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
            Management Team <center id="product_error" class="text-danger"></center>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        		<form action="{{route('admin-manageTeam.store')}}" method="post" enctype="multipart/form-data" id="manageTeam_add_frm">
        		@csrf
	        		<div class="col-md-12">

                          <div class="form-group col-md-6">
                            <label for="manageTeam_name">Name </label>
                            <input type="text" class="form-control" id="manageTeam_name" name="manageTeam_name" placeholder="Name">
                            <span class="text-danger error-manageTeam_name">
                          </div> 

                         

                          <div class="form-group col-md-6">
                            <label for="manageTeam_designation">Designation </label>
                            <input type="text" class="form-control" id="manageTeam_designation" name="manageTeam_designation" placeholder="Designation">
                            <span class="text-danger error-manageTeam_designation">
                          </div>

                           <div class="form-group col-md-12">
                            <label for="manageTeam_image">Image </label>
                            <input type="file" class="form-control" id="manageTeam_image" name="manageTeam_image" accept="image/*">
                            <span class="text-danger error-manageTeam_image">
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
           Manage Management Team 
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
                        	@foreach($manageTeam as $data)
                        <tr id="manageTeam_row_{{$data->id}}">
                            <td>
                                {{$i++}}
                            </td>
                            <td>
                               {{date('d-M-Y',strtotime($data->created_at))}}
                            </td>
                            <td>
                               {{ $data->manageTeam_name }}
                            </td>
                            <td>
                               {{$data->manageTeam_designation}}
                            </td> 

                            <td>
                               <img src="{{asset($data->manageTeam_image)}}" alt="" width="70" height="30">
                            </td>
                            <td>

                                <a data-id="{{$data->id}}" class="btn btn-xs btn-info manageTeam_edit_btn"  title="Edit" data-toggle="modal" data-target=".manage_team_modal_lg">
                                    <span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="top" title="update"></span></a>

                                <a data-id="{{$data->id}}" class="btn btn-xs btn-danger manageTeam_delete_btn" data-toggle="tooltip" data-placement="top" title="Delete">
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
<div class="modal fade manage_team_modal_lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #00BCD4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">Edit Management Team</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="manageTeam_edit_frm">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="col-md-12">
                         <div class="form-group col-md-6">
                            <label for="et_manageTeam_name">Name </label>
                            <input type="text" class="form-control" id="et_manageTeam_name" name="manageTeam_name" placeholder="Name">
                            <span class="text-danger error-et-manageTeam_name">
                          </div> 

                          

                          <div class="form-group col-md-6">
                            <label for="et_manageTeam_designation">Designation </label>
                            <input type="text" class="form-control" id="et_manageTeam_designation" name="manageTeam_designation" placeholder="Designation">
                            <span class="text-danger error-et-manageTeam_designation">
                          </div>
                          <div class="form-group col-md-12">
                            <label for="et_manageTeam_image">Image </label>
                            <input type="file" class="form-control" id="et_manageTeam_image" name="manageTeam_image" accept="image/*">
                            <span class="text-danger error-et-manageTeam_image">
                          </div> 

                    </div>
                    {{-- <center><img src="" alt="" id="manageTeam_img_view" width="300" height="200"></center> --}}
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
$('#manageTeam_image').dropify()
<!--  add & validation using ajax -->
$('#manageTeam_add_frm').submit(function( event ) {
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".error-manageTeam_name").text('');
    $(".error-manageTeam_image").text('');
    $(".error-manageTeam_designation").text('');

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
            $(".error-manageTeam_name").text(response.responseJSON.errors.manageTeam_name);
            $(".error-manageTeam_image").text(response.responseJSON.errors.manageTeam_image);
            $(".error-manageTeam_designation").text(response.responseJSON.errors.manageTeam_designation);
        }
    }
    });
});

<!--  Edit functionality -->
$('#example1 tbody').on('click','.manageTeam_edit_btn',function( event ) {  
    
    event.preventDefault();

    $(".error-et-manageTeam_name").text('');
    $(".error-et-manageTeam_image").text('');
    $(".error-et-manageTeam_designation").text('');

    var value = $(this).data('id');
    var url = ('admin-manageTeam/'+value+'/edit');
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);
              $('#et_manageTeam_name').val(response.data.manageTeam_name);
              $('#et_manageTeam_designation').val(response.data.manageTeam_designation);

              {{-- $('#manageTeam_img_view').attr('src', response.data.manageTeam_image); --}}
              if(response.data.manageTeam_image){
                        var img_url = response.data.manageTeam_image;

                       $("#et_manageTeam_image").attr("data-height", 100);
                       $("#et_manageTeam_image").attr("data-default-file",img_url);

                       $(".dropify-wrapper").removeClass("dropify-wrapper").addClass("dropify-wrapper has-preview");
                       $(".dropify-preview").css('display','block');
                       $('.dropify-render').html('').html('<img src=" '+img_url+'" style="max-height: 100px;">')
                      }else{
                       $(".dropify-preview .dropify-render img").attr("src","");
                      }

                     


                      $('#et_manageTeam_image').dropify();

              var route = "<?php echo url('/') ?>";
              console.log(route);
              $("#manageTeam_edit_frm").attr("action",(route+'/admin-manageTeam/'+response.data.id));
            }
        });
});

$("#manageTeam_edit_frm").validate({
               rules: {
                    manageTeam_name: {
                        required: true,
                    },

                    manageTeam_designation: {
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
$(document).off('submit', '#manageTeam_edit_frm');
$(document).on('submit', '#manageTeam_edit_frm', function(event){

{{-- $('#manageTeam_edit_frm').submit(function( event ) { --}}
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

   $(".error-et-manageTeam_name").text('');
    $(".error-et-manageTeam_image").text('');
    $(".error-et-manageTeam_designation").text('');

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
            $(".error-et-manageTeam_name").text(response.responseJSON.errors.manageTeam_name);
            $(".error-et-manageTeam_image").text(response.responseJSON.errors.manageTeam_image);
            $(".error-et-manageTeam_designation").text(response.responseJSON.errors.manageTeam_designation);
            }
        }
        });
    });

<!--  Delete functionality -->
$('#example1 tbody').on('click','.manageTeam_delete_btn',function( event ) {  
    
    event.preventDefault();

    var value = $(this).data('id');
    var url = ('admin-manageTeam/'+value);
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
            $( "#manageTeam_row_"+value ).fadeOut( "slow" );

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
