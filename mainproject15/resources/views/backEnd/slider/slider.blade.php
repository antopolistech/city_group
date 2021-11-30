@extends('backEnd.master')

@section('title')
Slider
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
            Add Slider <center id="product_error" class="text-danger"></center>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        		<form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data" id="slider_add_frm">
        		@csrf
	        		<div class="col-md-12">                
						  <div class="form-group col-md-6">
                            <label for="sliderText1">Slider Text1</label>
                            <input type="text" class="form-control" id="sliderText1" name="sliderText1" placeholder="Slider Text1">
                            <span class="text-danger error-sliderText1"></span>
                          </div>

                          <div class="form-group col-md-6">
                            <label for="sliderText2">Slider Text2</label>
                            <input type="text" class="form-control" id="sliderText2" name="sliderText2" placeholder="Slider Text2">
                            <span class="text-danger error-sliderText2"></span>
                          </div>

                           <div class="form-group col-md-12">
                            <label for="sliderImage">Slider Image <span class="text-danger">( image size: 250KB | width: 1600 | height: 700 )</span></label>
                            <input type="file" class="form-control" id="sliderImage" name="sliderImage" accept="image/*" required>
                            <span class="text-danger error-sliderImage"></span>
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
            Manage Slider
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
                            <th>Slider Text1</th>
                            <th>Slider Text2</th>
                            <th>Slider Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        	@php $i = 1 @endphp
                        	@foreach($datas as $data)
                        <tr id="slider_row_{{$data->id}}">

                            <td>
                                {{$i++}}
                            </td>
                            <td>
                               {{date('d-M-Y',strtotime($data->created_at))}}
                            </td>
                            <td>
                               {{$data->sliderText1}}
                            </td>
                            <td>
                                {{$data->sliderText2}}
                            </td>
                            <td>
                               <img src="{{asset($data->sliderImage)}}" alt="{{$data->sliderImage}}" width="70"
                               height="30">
                            </td>
                            <td>
                                <a data-id="{{$data->id}}" class="btn btn-xs btn-info slider_edit_btn"  title="Edit" data-toggle="modal" data-target=".slider_lg_model">
                                    <span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="top" title="update"></span></a>
                                <a data-id="{{$data->id}}" class="btn btn-xs btn-danger slider_delete_btn" data-toggle="tooltip" data-placement="top" title="Delete">
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
<div class="modal fade slider_lg_model" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background: #00BCD4">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myLargeModalLabel">Edit Slider</h4>
			</div>
			<div class="modal-body">
				<form action="" method="POST" enctype="multipart/form-data" id="slider_edit_frm">
					@csrf
                    <input type="hidden" name="_method" value="PUT">
					<div class="col-md-12">
						<div class="form-group col-md-6">
							<label for="edit_sliderText1">Slider Text1</label>
							<input type="text" class="form-control" id="edit_sliderText1" name="sliderText1">
							<input type="hidden" id="slider_id" name="id">
							<span class="text-danger error-edit-sliderText1"></span>
						</div>
						<div class="form-group col-md-6">
							<label for="edit_sliderText2">Slider Text2</label>
							<input type="text" class="form-control" id="edit_sliderText2" name="sliderText2">
							<span class="text-danger error-edit-sliderText2"></span>
						</div>
						<div class="form-group col-md-12">
							<label for="edit_sliderImage">Slider Image <span class="text-danger">( image size: 250KB | width: 1600 | height: 700 )</span></label>
							<input type="file" id="edit_sliderImage" name="sliderImage" placeholder="Slider Image" accept="image/*">
							<span class="text-danger error-edit-sliderImage"></span>
						</div>
					</div>
					{{-- <center><img src="" alt="" id="sliderImage_show" width="300" height="200"></center> --}}
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

$('#sliderImage').dropify()
<!--  silder add & validation using ajax -->
$('#slider_add_frm').submit(function( event ) {
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".error-sliderText1").text('');
	$(".error-sliderText2").text('');
	$(".error-sliderImage").text('');

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
			$(".error-sliderText1").text(response.responseJSON.errors.sliderText1);
			$(".error-sliderText2").text(response.responseJSON.errors.sliderText2);
			$(".error-sliderImage").text(response.responseJSON.errors.sliderImage);
		}
	}
	});
});

<!--  slider Edit functionality -->
$('#example1 tbody').on('click','.slider_edit_btn',function( event ) {
	
    event.preventDefault();

	var value = $(this).data('id');
	var url = ('slider/'+value+'/edit');
	$.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);
              $('#edit_sliderText1').attr('value', response.data.sliderText1);
              $('#edit_sliderText2').attr('value', response.data.sliderText2);
              $("#slider_id").val(response.data.id);
              {{-- $('#sliderImage_show').attr('src', response.data.sliderImage); --}}
              if(response.data.sliderImage){
                        var img_url = response.data.sliderImage;

                       $("#edit_sliderImage").attr("data-height", 100);
                       $("#edit_sliderImage").attr("data-default-file",img_url);

                       $(".dropify-wrapper").removeClass("dropify-wrapper").addClass("dropify-wrapper has-preview");
                       $(".dropify-preview").css('display','block');
                       $('.dropify-render').html('').html('<img src=" '+img_url+'" style="max-height: 100px;">')
                      }else{
                       $(".dropify-preview .dropify-render img").attr("src","");
                      }

                     


                      $('#edit_sliderImage').dropify();

              var route = "<?php echo url('/') ?>";
              console.log(route);
              $("#slider_edit_frm").attr("action", (route+'/slider/'+response.data.id));
            }
        });
});

$("#slider_edit_frm").validate({
               rules: {
                    sliderText1: {
                        required: true,
                    },

                    sliderText2: {
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
$(document).off('submit', '#slider_edit_frm');
$(document).on('submit', '#slider_edit_frm', function(event){

{{-- $('#slider_edit_frm').submit(function( event ) { --}}
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
	});

<!--  Delete functionality -->
$('#example1 tbody').on('click','.slider_delete_btn',function( event ) {
    
    event.preventDefault();

    var value = $(this).data('id');
    var url = ('slider/'+value);
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
            $( "#slider_row_"+value ).fadeOut( "slow" );

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


