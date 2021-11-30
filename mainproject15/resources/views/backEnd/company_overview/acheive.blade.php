@extends('backEnd.master')

@section('title')
Acheivement
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
            Acheivement <center id="product_error" class="text-danger"></center>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        		<form action="{{route('admin-achievement.store')}}" method="post" enctype="multipart/form-data" id="achievement_add_frm">
        		@csrf
	        		<div class="col-md-12">

                          <div class="form-group col-md-12">
                            <label for="achieve_name">Acheivement Name </label>
                            <input type="text" class="form-control" id="achieve_name" name="achieve_name" placeholder="Acheivement Name">
                            <span class="text-danger achieve_name"></span>
                          </div> 

                          

                          <div class="form-group col-md-6">
                            <label for="achieve_desc">Acheivement Description </label>
                            <textarea type="text" class="form-control" id="achieve_desc" name="achieve_desc" rows="10"></textarea>
                            <span class="text-danger achieve_desc"></span>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="achieve_image">Acheivement Image </label>
                            <input type="file" class="form-control" id="achieve_image" name="achieve_image" accept="image/*"></textarea>
                            <span class="text-danger achieve_image"></span>
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
           Acheivement
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
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @php $i = 1 @endphp
                        	@foreach($acheives as $data)
                        <tr id="achievement_row_{{$data->id}}">
                            <td>
                                {{$i++}}
                            </td>
                            <td>
                               {{date('d-M-Y',strtotime($data->created_at))}}
                            </td>
                            <td>
                               {{ $data->achieve_name }}
                            </td>

                            <td>
                               <img src="{{asset($data->achieve_image)}}" alt="{{asset($data->achieve_image)}}" width="70" height="30">
                            </td>
                            <td>

                             
                                <a data-id="{{$data->id}}" class="btn btn-xs btn-info achievement_edit_btn"  title="Edit" data-toggle="modal" data-target=".achievement_con_modal_lg">
                                    <span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="top" title="update"></span>
                                </a>

                                <a data-id="{{$data->id}}" class="btn btn-xs btn-primary achievement_detail_btn" data-toggle="modal" data-target=".achievement_detail_model">
                                <span class="glyphicon glyphicon-th-list" data-toggle="tooltip" data-placement="top" title="Detail"></span></a>

                                 <a data-id="{{$data->id}}" class="btn btn-xs btn-danger achievement_delete_btn" data-toggle="tooltip" data-placement="top" title="Delete">
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
<div class="modal fade achievement_con_modal_lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #00BCD4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">Edit Achievement</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="achievement_edit_frm">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="col-md-12">
                         <div class="form-group col-md-12">
                            <label for="et_achieve_name">Acheivement Name </label>
                            <input type="text" class="form-control" id="et_achieve_name" name="achieve_name" placeholder="Acheivement Name">
                            <span class="text-danger et-achieve_name"></span>
                          </div> 


                          <div class="form-group col-md-12">
                            <label for="et_achieve_desc">Acheivement Description </label>
                            <textarea type="text" class="form-control" id="et_achieve_desc" name="achieve_desc"></textarea>
                            <span class="text-danger et-achieve_desc"></span>
                          </div>

                          <div class="form-group col-md-12">
                            <label for="et_achieve_image">Acheivement Image </label>
                            <input type="file" class="form-control" id="et_achieve_image" name="achieve_image" accept="image/*"></textarea>
                            <span class="text-danger et-achieve_image"></span>
                          </div> 
                    </div>
                   {{--  <center><img src="" alt="" id="achievement_img_view" width="300" height="200"></center> --}}
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
<div class="modal fade achievement_detail_model" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #00BCD4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">Acheivement Detail</h4>
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

$('#achieve_image').dropify()
<!--  add & validation using ajax -->
$('#achievement_add_frm').submit(function( event ) {
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".achieve_name").text('');
    $(".achieve_image").text('');
    $(".achieve_desc").text('');

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
            $(".achieve_name").text(response.responseJSON.errors.achieve_name);
            $(".achieve_desc").text(response.responseJSON.errors.achieve_desc);
            $(".achieve_image").text(response.responseJSON.errors.achieve_image[0]);
        }
    }
    });
});


<!--  achievement Edit functionality -->
$('#example1 tbody').on('click','.achievement_edit_btn',function( event ) {  
    
    event.preventDefault();

   $(".et-achieve_name").text('');
   $(".et-achieve_image").text('');
   $(".et-achieve_desc").text('');

    var value = $(this).data('id');
    var url = ('admin-achievement/'+value+'/edit');
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);
              $('#et_achieve_name').val(response.data.achieve_name);
              $('#et_achieve_desc').val(response.data.achieve_desc);
              {{-- $('#achievement_img_view').attr('src', response.data.achieve_image); --}}
              if(response.data.achieve_image){
                        var img_url = response.data.achieve_image;

                       $("#et_achieve_image").attr("data-height", 100);
                       $("#et_achieve_image").attr("data-default-file",img_url);

                       $(".dropify-wrapper").removeClass("dropify-wrapper").addClass("dropify-wrapper has-preview");
                       $(".dropify-preview").css('display','block');
                       $('.dropify-render').html('').html('<img src=" '+img_url+'" style="max-height: 100px;">')
                      }else{
                       $(".dropify-preview .dropify-render img").attr("src","");
                      }

                     


                      $('#et_achieve_image').dropify();

              var route = "<?php echo url('/') ?>";
              console.log(route);
              $("#achievement_edit_frm").attr("action",(route+'/admin-achievement/'+response.data.id));
            }
        });
});
$("#achievement_edit_frm").validate({
               rules: {
                    achieve_name: {
                        required: true,
                    },

                    achieve_desc: {
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

<!--  achievement edit & validation using ajax -->
{{-- $('#achievement_edit_frm').submit(function( event ) { --}}
$(document).off('submit', '#achievement_edit_frm');
$(document).on('submit', '#achievement_edit_frm', function(event){

    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

   $(".et-achieve_name").text('');
   $(".et-achieve_image").text('');
   $(".et-achieve_desc").text('');

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
            $(".et-achieve_name").text(response.responseJSON.errors.achieve_name);
            $(".et-achieve_image").text(response.responseJSON.errors.achieve_image[0]);
            $(".et-achieve_desc").text(response.responseJSON.errors.achieve_desc);
            }
        }
        });
    });

<!--  Delete functionality -->
$('#example1 tbody').on('click','.achievement_delete_btn',function( event ) {
    
    event.preventDefault();

    var value = $(this).data('id');
    var url = ('admin-achievement/'+value);
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
            $( "#achievement_row_"+value ).fadeOut( "slow" );

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
$('#example1 tbody').on('click','.achievement_detail_btn',function( event ) {
    
    event.preventDefault();

    var value = $(this).data('id');
    var url = ('admin-achievement/'+value);
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);

            var row = '<span><b>Description: </b>'+response.data.achieve_desc+'</span><br><br><span><b>Description: </b><img src="'+response.data.achieve_image+'" alt="'+response.data.achieve_name+'" class="img-responsive"></span><br><br>';

            $(".panel-body").html(row);
            $(".panel-heading").html('<h4>'+response.data.achieve_name+'</h4>');
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
