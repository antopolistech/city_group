@extends('backEnd.master')

@section('title')
Sister Concern
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
            Sister Concern <center id="product_error" class="text-danger"></center>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        		<form action="{{route('admin-sister-concern.store')}}" method="post" enctype="multipart/form-data" id="sister_concern_add_frm">
        		@csrf
	        		<div class="col-md-12">
	        			   <div class="form-group col-md-4">
                            <label for="sister_name">Sister Concern Name </label>
                            <input type="text" class="form-control" id="sister_name" name="sister_name" placeholder="Sister Concern Name">
                            <span class="text-danger sister_name"></span>
                          </div> 

                          <div class="form-group col-md-4">
                            <label for="started_type">Sister Concern Type </label>
                            <input type="text" class="form-control" id="started_type" name="started_type" placeholder="Sister Concern Type">
                            <span class="text-danger started_type"></span>
                          </div> 

                           <div class="form-group col-md-4">
                            <label for="sister_year">Sister Concern Year </label>
                            <input type="text" class="form-control" id="sister_year" name="sister_year" placeholder="Sister Concern Year">
                            <span class="text-danger sister_year"></span>
                          </div> 
                          

                          <div class="form-group col-md-6">
                            <label for="sister_functionality">Sister Functionality </label>
                            <textarea type="text" class="form-control" id="sister_functionality" name="sister_functionality" rows="10"></textarea>
                            <span class="text-danger sister_functionality"></span>
                          </div>
                           <div class="form-group col-md-6">
                            <label for="sister_image"> Image </label>
                            <input type="file" class="form-control" id="sister_image" name="sister_image" accept="image/*"></textarea>
                            <span class="text-danger sister_image"></span>
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
           Manage Sister Concern
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
                            <th>Sno</th>
                            <th>Created</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Year</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        	
                        	@php $i = 1 @endphp
                        	@foreach($sister as $data)
                        <tr id="sister_concern_row_{{$data->id}}">
                            <td>
                                {{$i++}}
                            </td>
                            <td>
                               {{date('d-M-Y',strtotime($data->created_at))}}
                            </td>
                            <td>
                               {{ $data->sister_name }}
                            </td>
                            <td>
                               {{ $data->started_type }}
                            </td>
                            <td>
                               {{ $data->sister_year }}
                            </td>  

                            <td>
                               <img src="{{asset($data->sister_image)}}" alt="{{asset($data->sister_image)}}" width="70" height="30">
                            </td>
                            <td>

                                
                                <a data-id="{{$data->id}}" class="btn btn-xs btn-info sister_concern_edit_btn"  title="Edit" data-toggle="modal" data-target=".sister_con_modal_lg"><span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="top" title="update"></span></a>

                                 <a data-id="{{$data->id}}" class="btn btn-xs btn-primary sister_concern_detail_btn" data-toggle="modal" data-target=".sister_concern_detail_model">
                                <span class="glyphicon glyphicon-th-list" data-toggle="tooltip" data-placement="top" title="Detail"></span></a>

                                <a data-id="{{$data->id}}" class="btn btn-xs btn-danger sister_concern_delete_btn" data-toggle="tooltip" data-placement="top" title="Delete">
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
<div class="modal fade sister_con_modal_lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #00BCD4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">Edit Sister Concern</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="sister_concern_edit_frm">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="col-md-12">
                        <div class="form-group col-md-4">
                            <label for="et_sister_name">Sister Concern Name </label>
                            <input type="text" class="form-control" id="et_sister_name" name="sister_name" placeholder="Sister Concern Name">
                            <span class="text-danger et-sister_name"></span>
                          </div> 

                          <div class="form-group col-md-4">
                            <label for="et_started_type">Sister Concern Type </label>
                            <input type="text" class="form-control" id="et_started_type" name="started_type" placeholder="Sister Concern Type">
                            <span class="text-danger et-started_type"></span>
                          </div> 

                           <div class="form-group col-md-4">
                            <label for="et_sister_year">Sister Concern Year </label>
                            <input type="text" class="form-control" id="et_sister_year" name="sister_year" placeholder="Sister Concern Year">
                            <span class="text-danger et-sister_year"></span>
                          </div> 
                           

                          <div class="form-group col-md-12">
                            <label for="et_sister_functionality">Sister Functionality </label>
                            <textarea type="text" class="form-control" id="et_sister_functionality" name="sister_functionality"></textarea>
                            <span class="text-danger et-sister_functionality"></span>
                          </div>
                          <div class="form-group col-md-12">
                            <label for="et_sister_image"> Image </label>
                            <input type="file" class="form-control" id="et_sister_image" name="sister_image" accept="image/*"></textarea>
                            <span class="text-danger et-sister_image"></span>
                          </div>
                    </div>
                    {{-- <center><img src="" alt="" id="sister_con_img_view" width="300" height="200"></center> --}}
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
<div class="modal fade sister_concern_detail_model" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #00BCD4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">Sister Concern Detail</h4>
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

$('#sister_image').dropify()
<!--  sister concern add & validation using ajax -->
$('#sister_concern_add_frm').submit(function( event ) {
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".sister_name").text('');
    $(".started_type").text('');
    $(".sister_year").text('');
    $(".sister_functionality").text('');
    $(".sister_image").text('');

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
            $(".sister_name").text(response.responseJSON.errors.sister_name);
            $(".started_type").text(response.responseJSON.errors.started_type);
            $(".sister_year").text(response.responseJSON.errors.sister_year);
            $(".sister_functionality").text(response.responseJSON.errors.sister_functionality);
            $(".sister_image").text(response.responseJSON.errors.sister_image[0]);
        }
    }
    });
});

$("#sister_concern_edit_frm").validate({
               rules: {
                    sister_name: {
                        required: true,
                    },

                    started_type: {
                        required: true,
                    },
                    sister_year: {
                        required: true,
                    },
                    sister_functionality: {
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
<!--  sister concern Edit functionality -->
$('#example1 tbody').on('click','.sister_concern_edit_btn',function( event ) {
    
    event.preventDefault();

    $(".et-sister_name").text('');
    $(".et-started_type").text('');
    $(".et-sister_year").text('');
    $(".et-sister_image").text('');
    $(".et-sister_functionality").text('');

    var value = $(this).data('id');
    var url = ('admin-sister-concern/'+value+'/edit');
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);
              $('#et_sister_name').val(response.data.sister_name);
              $('#et_started_type').val(response.data.started_type);
              $('#et_sister_year').val(response.data.sister_year);
              $('#et_sister_functionality').val(response.data.sister_functionality);
              {{-- $('#sister_con_img_view').attr('src', response.data.sister_image); --}}
              if(response.data.sister_image){
                        var img_url = response.data.sister_image;

                       $("#et_sister_image").attr("data-height", 100);
                       $("#et_sister_image").attr("data-default-file",img_url);

                       $(".dropify-wrapper").removeClass("dropify-wrapper").addClass("dropify-wrapper has-preview");
                       $(".dropify-preview").css('display','block');
                       $('.dropify-render').html('').html('<img src=" '+img_url+'" style="max-height: 100px;">')
                      }else{
                       $(".dropify-preview .dropify-render img").attr("src","");
                      }

                     


                      $('#et_sister_image').dropify();

              var route = "<?php echo url('/') ?>";
              console.log(route);
              $("#sister_concern_edit_frm").attr("action",(route+'/admin-sister-concern/'+response.data.id));
            }
        });
});

<!--  sister concern edit & validation using ajax -->
$(document).off('submit', '#sister_concern_edit_frm');
$(document).on('submit', '#sister_concern_edit_frm', function(event){
{{-- $('#sister_concern_edit_frm').submit(function( event ) { --}}
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".et-sister_name").text('');
    $(".et-started_type").text('');
    $(".et-sister_year").text('');
    $(".et-sister_image").text('');
    $(".et-sister_functionality").text('');

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
            $(".et-sister_name").text(response.responseJSON.errors.sister_name);
            $(".et-started_type").text(response.responseJSON.errors.started_type);
            $(".et-sister_year").text(response.responseJSON.errors.sister_year);
            $(".et-sister_image").text(response.responseJSON.errors.sister_image);
            $(".et-sister_functionality").text(response.responseJSON.errors.sister_functionality);
            }
        }
        });
    });

<!--  Delete functionality -->
$('#example1 tbody').on('click','.sister_concern_delete_btn',function( event ) {
    
    event.preventDefault();

    var value = $(this).data('id');
    var url = ('admin-sister-concern/'+value);
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
            $( "#sister_concern_row_"+value ).fadeOut( "slow" );

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
$('#example1 tbody').on('click','.sister_concern_detail_btn',function( event ) {
    event.preventDefault();

    var value = $(this).data('id');
    var url = ('admin-sister-concern/'+value);
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);

            var row = '<span><b>Started Type: </b>'+response.data.started_type+'</span><br><br><span><b>Year: </b>'+response.data.sister_year+'</span><br><br><span><b>Functionality: </b>'+response.data.sister_functionality+'</span><br><br><span><b>Image: </b><img src="'+response.data.sister_image+'" alt="'+response.data.sister_name+'" class="img-responsive"></span><br><br>';

            $(".panel-body").html(row);
            $(".panel-heading").html('<h4>'+response.data.sister_name+'</h4>');
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
