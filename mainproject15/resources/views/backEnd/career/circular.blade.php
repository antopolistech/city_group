@extends('backEnd.master')

@section('title')
Career
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
            Career <center id="product_error" class="text-danger"></center>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        		<form action="{{route('admin-career.store')}}" method="post" enctype="multipart/form-data" id="career_add_frm">
        		@csrf
	        		<div class="col-md-12">

                          <div class="form-group col-md-6">
                            <label for="designation">Designation </label>
                            <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation">
                            <span class="text-danger designation"></span>
                          </div> 

                          <div class="form-group col-md-6">
                            <label for="vacancy">Vacancy </label>
                            <input type="text" class="form-control" id="vacancy" name="vacancy" placeholder="Vacancy">
                            <span class="text-danger vacancy"></span>
                          </div> 

                          <div class="form-group col-md-6">
                            <label for="job_description">Job Description / Responsibility </label>
                            <textarea type="text" class="form-control tinymce" id="job_description" name="job_description"></textarea>
                            <span class="text-danger job_description"></span>
                          </div> 

                          <div class="form-group col-md-6">
                            <label for="job_req">Job Requirements</label>
                            <textarea type="text" class="form-control tinymce" id="job_req" name="job_req"></textarea>
                            <span class="text-danger job_req"></span>
                          </div> 

                          <div class="form-group col-md-6">
                            <label for="job_nature">Job Nature</label>
                            <input type="text" class="form-control" id="job_nature" name="job_nature" placeholder="Job Nature">
                            <span class="text-danger job_nature"></span>
                          </div>  

                          <div class="form-group col-md-6">
                            <label for="educational_req">Educational Requirements</label>
                            <input type="text" class="form-control" id="educational_req" name="educational_req" placeholder="Educational Requirements">
                            <span class="text-danger educational_req"></span>
                          </div> 

                            <div class="form-group col-md-6">
                            <label for="professional_certificate">Preferred Professional Certification</label>
                            <input type="text" class="form-control" id="professional_certificate" name="professional_certificate" placeholder="Preferred Professional Certification">
                            <span class="text-danger professional_certificate"></span>
                          </div> 

                            <div class="form-group col-md-6">
                            <label for="experience_req">Experience Requirements</label>
                            <input type="text" class="form-control" id="experience_req" name="experience_req" placeholder="Experience Requirements">
                            <span class="text-danger experience_req"></span>
                          </div>  
                          
                           <div class="form-group col-md-6">
                            <label for="job_location">Job Location</label>
                            <input type="text" class="form-control" id="job_location" name="job_location" placeholder="Job Location">
                            <span class="text-danger job_location"></span>
                          </div>  

                           <div class="form-group col-md-6">
                            <label for="salary_range">Salary Range</label>
                            <input type="text" class="form-control" id="salary_range" name="salary_range" placeholder="Salary Range">
                            <span class="text-danger salary_range"></span>
                          </div>  

                          <div class="form-group col-md-6">
                            <label for="other_benefit">Other Benefits</label>
                            <input type="text" class="form-control" id="other_benefit" name="other_benefit" placeholder="Other Benefits">
                            <span class="text-danger other_benefit"></span>
                          </div> 

                          <div class="form-group col-md-6">
                            <label for="published_on">Published On</label>
                            <input type="date" class="form-control" id="published_on" name="published_on" placeholder="Published On">
                            <span class="text-danger published_on"></span>
                          </div>  

                          <div class="form-group col-md-6">
                            <label for="deadline">Deadline</label>
                            <input type="date" class="form-control" id="deadline" name="deadline" placeholder="Deadline">
                            <span class="text-danger deadline"></span>
                          </div>

                           <div class="form-group col-md-6">
                            <label for="instruction">Instruction</label>
                            <input type="text" class="form-control" id="instruction" name="instruction" placeholder="Instruction">
                            <span class="text-danger instruction"></span>
                          </div> 

                          <div class="form-group col-md-12">
                            <label for="BD_job_link"> BD Jobs Link</label>
                            <input type="text" class="form-control" id="BD_job_link" name="BD_job_link" placeholder=" BD Jobs Link">
                            <span class="text-danger BD_job_link"></span>
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
           Manage Career
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
                            <th>designation</th>
                            <th>vacancy</th>
                            <th>job_location</th>
                            <th>published_on</th>
                            <th>deadline</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @php $i = 1 @endphp
                        	@foreach($datas as $data)
                        <tr id="career_row_{{$data->id}}">
                            <td>
                                {{$i++}}
                            </td>
                            <td>
                               {{date('d-M-Y',strtotime($data->created_at))}}
                            </td>
                            <td>
                               {{ $data->designation }}
                            </td> 
                            <td>
                               {{ $data->vacancy }}
                            </td> 
                            <td>
                               {{ $data->job_location }}
                            </td>
                            <td>
                               {{ $data->published_on }}
                            </td> 

                            <td>
                               {{ $data->deadline }}
                            </td>

                            <td>
                                <a data-id="{{$data->id}}" class="btn btn-xs btn-info career_edit_btn"  title="Edit" data-toggle="modal" data-target=".career_modal_lg"><span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="top" title="update"></span></a>

                                 <a data-id="{{$data->id}}" class="btn btn-xs btn-primary career_detail_btn" data-toggle="modal" data-target=".career_detail_model">
                                <span class="glyphicon glyphicon-th-list" data-toggle="tooltip" data-placement="top" title="Detail"></span></a>

                                 <a data-id="{{$data->id}}" class="btn btn-xs btn-danger career_delete_btn" data-toggle="tooltip" data-placement="top" title="Delete">
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
<div class="modal fade career_modal_lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #00BCD4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">Edit Career</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="career_edit_frm">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="col-md-12">
                          <div class="form-group col-md-6">
                            <label for="et_designation">Designation </label>
                            <input type="text" class="form-control" id="et_designation" name="designation" placeholder="Designation">
                            <span class="text-danger et-designation"></span>
                          </div> 

                          <div class="form-group col-md-6">
                            <label for="et_vacancy">Vacancy </label>
                            <input type="text" class="form-control" id="et_vacancy" name="vacancy" placeholder="Vacancy">
                            <span class="text-danger et-vacancy"></span>
                          </div> 

                          <div class="form-group col-md-6">
                            <label for="et_job_description">Job Description / Responsibility </label>
                            <textarea type="text" class="form-control tinymce" id="et_job_description" name="job_description"></textarea>
                            <span class="text-danger et-job_description"></span>
                          </div> 

                          <div class="form-group col-md-6">
                            <label for="et_job_req">Job Requirements</label>
                            <textarea type="text" class="form-control tinymce" id="et_job_req" name="job_req"></textarea>
                            <span class="text-danger et-job_req"></span>
                          </div> 

                          <div class="form-group col-md-6">
                            <label for="et_job_nature">Job Nature</label>
                            <input type="text" class="form-control" id="et_job_nature" name="job_nature" placeholder="Job Nature">
                            <span class="text-danger et-job_nature"></span>
                          </div>  

                          <div class="form-group col-md-6">
                            <label for="et_educational_req">Educational Requirements</label>
                            <input type="text" class="form-control" id="et_educational_req" name="educational_req" placeholder="Educational Requirements">
                            <span class="text-danger et-educational_req"></span>
                          </div> 

                            <div class="form-group col-md-6">
                            <label for="et_professional_certificate">Preferred Professional Certification</label>
                            <input type="text" class="form-control" id="et_professional_certificate" name="professional_certificate" placeholder="Preferred Professional Certification">
                            <span class="text-danger et-professional_certificate"></span>
                          </div> 

                            <div class="form-group col-md-6">
                            <label for="et_experience_req">Experience Requirements</label>
                            <input type="text" class="form-control" id="et_experience_req" name="experience_req" placeholder="Experience Requirements">
                            <span class="text-danger et-experience_req"></span>
                          </div>  
                          
                           <div class="form-group col-md-6">
                            <label for="et_job_location">Job Location</label>
                            <input type="text" class="form-control" id="et_job_location" name="job_location" placeholder="Job Location">
                            <span class="text-danger et-job_location"></span>
                          </div>  

                           <div class="form-group col-md-6">
                            <label for="et_salary_range">Salary Range</label>
                            <input type="text" class="form-control" id="et_salary_range" name="salary_range" placeholder="Salary Range">
                            <span class="text-danger et-salary_range"></span>
                          </div>  

                          <div class="form-group col-md-6">
                            <label for="et_other_benefit">Other Benefits</label>
                            <input type="text" class="form-control" id="et_other_benefit" name="other_benefit" placeholder="Other Benefits">
                            <span class="text-danger et-other_benefit"></span>
                          </div> 

                          <div class="form-group col-md-6">
                            <label for="et_published_on">Published On</label>
                            <input type="date" class="form-control" id="et_published_on" name="published_on" placeholder="Published On">
                            <span class="text-danger et-published_on"></span>
                          </div>  

                          <div class="form-group col-md-6">
                            <label for="et_deadline">Deadline</label>
                            <input type="date" class="form-control" id="et_deadline" name="deadline" placeholder="Deadline">
                            <span class="text-danger et-deadline"></span>
                          </div>

                           <div class="form-group col-md-6">
                            <label for="et_instruction">Instruction</label>
                            <input type="text" class="form-control" id="et_instruction" name="instruction" placeholder="Instruction">
                            <span class="text-danger et-instruction"></span>
                          </div> 

                          <div class="form-group col-md-12">
                            <label for="et_BD_job_link"> BD Jobs Link</label>
                            <input type="text" class="form-control" id="et_BD_job_link" name="BD_job_link" placeholder=" BD Jobs Link">
                            <span class="text-danger et-BD_job_link"></span>
                          </div> 
                    </div>
                    <center><img src="" alt="" id="achievement_img_view" width="300" height="200"></center>
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
<div class="modal fade career_detail_model" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #00BCD4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">Career Detail</h4>
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

<!--  add & validation using ajax -->
$('#career_add_frm').submit(function( event ) {
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".designation").text('');
    $(".vacancy").text('');
    $(".job_description").text('');
    $(".job_req").text('');
    $(".job_nature").text('');
    $(".educational_req").text('');
    $(".professional_certificate").text('');
    $(".experience_req").text('');
    $(".job_location").text('');
    $(".salary_range").text('');
    $(".other_benefit").text('');
    $(".published_on").text('');
    $(".deadline").text('');
    $(".instruction").text('');
    $(".BD_job_link").text('');

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
            $(".designation").text(response.responseJSON.errors.designation);
            $(".vacancy").text(response.responseJSON.errors.vacancy);
            $(".job_description").text(response.responseJSON.errors.job_description);
            $(".job_req").text(response.responseJSON.errors.job_req);
            $(".job_nature").text(response.responseJSON.errors.job_nature);
            $(".educational_req").text(response.responseJSON.errors.educational_req);
            $(".professional_certificate").text(response.responseJSON.errors.professional_certificate);
            $(".experience_req").text(response.responseJSON.errors.experience_req);
            $(".job_location").text(response.responseJSON.errors.job_location);
            $(".salary_range").text(response.responseJSON.errors.salary_range);
            $(".other_benefit").text(response.responseJSON.errors.other_benefit);
            $(".published_on").text(response.responseJSON.errors.published_on);
            $(".deadline").text(response.responseJSON.errors.deadline);
            $(".instruction").text(response.responseJSON.errors.instruction);
            $(".BD_job_link").text(response.responseJSON.errors.BD_job_link);
        }
    }
    });
});

<!--  achievement Edit functionality -->
$('#example1 tbody').on('click','.career_edit_btn',function( event ) {
    
    event.preventDefault();

   $(".et-designation").text('');
    $(".et-vacancy").text('');
    $(".et-job_description").text('');
    $(".et-job_req").text('');
    $(".et-job_nature").text('');
    $(".et-educational_req").text('');
    $(".et-professional_certificate").text('');
    $(".et-experience_req").text('');
    $(".et-job_location").text('');
    $(".et-salary_range").text('');
    $(".et-other_benefit").text('');
    $(".et-published_on").text('');
    $(".et-deadline").text('');
    $(".et-instruction").text('');
    $(".et-BD_job_link").text('');

    var value = $(this).data('id');
    var url = ('admin-career/'+value+'/edit');
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);
             $("#et_designation").val(response.data.designation);
             $("#et_vacancy").val(response.data.vacancy);
             $("#et_job_nature").val(response.data.job_nature);
             $("#et_educational_req").val(response.data.educational_req);
             $("#et_professional_certificate").val(response.data.professional_certificate);
             $("#et_experience_req").val(response.data.experience_req);
             $("#et_job_location").val(response.data.job_location);
             $("#et_salary_range").val(response.data.salary_range);
             $("#et_other_benefit").val(response.data.other_benefit);
             $("#et_published_on").val(response.data.published_on);
             $("#et_deadline").val(response.data.deadline);
             $("#et_instruction").val(response.data.instruction);
             $("#et_BD_job_link").val(response.data.BD_job_link);

             tinyMCE.get('et_job_description').setContent(response.data.job_description);
             tinyMCE.get('et_job_req').setContent(response.data.job_req);

             var route = "<?php echo url('/') ?>";
              $("#career_edit_frm").attr("action",(route+'/admin-career/'+response.data.id));
            }
        });
});

<!-- edit & validation using ajax -->
$('#career_edit_frm').submit(function( event ) {
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".et-designation").text('');
    $(".et-vacancy").text('');
    $(".et-job_description").text('');
    $(".et-job_req").text('');
    $(".et-job_nature").text('');
    $(".et-educational_req").text('');
    $(".et-professional_certificate").text('');
    $(".et-experience_req").text('');
    $(".et-job_location").text('');
    $(".et-salary_range").text('');
    $(".et-other_benefit").text('');
    $(".et-published_on").text('');
    $(".et-deadline").text('');
    $(".et-instruction").text('');
    $(".et-BD_job_link").text('');

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
            $(".et-designation").text(response.responseJSON.errors.designation);
            $(".et-vacancy").text(response.responseJSON.errors.vacancy);
            $(".et-job_description").text(response.responseJSON.errors.job_description);
            $(".et-job_req").text(response.responseJSON.errors.job_req);
            $(".et-job_nature").text(response.responseJSON.errors.job_nature);
            $(".et-educational_req").text(response.responseJSON.errors.educational_req);
            $(".et-professional_certificate").text(response.responseJSON.errors.professional_certificate);
            $(".et-experience_req").text(response.responseJSON.errors.experience_req);
            $(".et-job_location").text(response.responseJSON.errors.job_location);
            $(".et-salary_range").text(response.responseJSON.errors.salary_range);
            $(".et-other_benefit").text(response.responseJSON.errors.other_benefit);
            $(".et-published_on").text(response.responseJSON.errors.published_on);
            $(".et-deadline").text(response.responseJSON.errors.deadline);
            $(".et-instruction").text(response.responseJSON.errors.instruction);
            $(".et-BD_job_link").text(response.responseJSON.errors.BD_job_link);
            }
        }
        });
    });

<!--  Delete functionality -->
$('#example1 tbody').on('click','.career_delete_btn',function( event ) {
    event.preventDefault();

    var value = $(this).data('id');
    var url = ('admin-career/'+value);
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
            $( "#career_row_"+value ).fadeOut( "slow" );

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

<!--  achievement Edit functionality -->
$('#example1 tbody').on('click','.career_detail_btn',function( event ) {

    event.preventDefault();

    var value = $(this).data('id');
    var url = ('admin-career/'+value);
    $.ajax({
            type: 'get',
            url: url,
            data: {'id': value},
            success: function (response) {
            console.log(response);

              var row = '<span><b>Vacancy: </b>'+response.data.vacancy+'</span><br><br><span><b>job description: </b>'+response.data.job_description+'</span><br><span><b>job nature: </b>'+response.data.job_nature+'</span><br><br><span><b>Educational Requirements: </b>'+response.data.educational+'</span><br><br><span><b>Preferred Professional Certification: </b>'+response.data.professional_certificate+'</span><br><br><span><b>Experience Requirements: </b>'+response.data.experience_req+'</span><br><br><span><b>Job Requirements: </b>'+response.data.job_req+'</span><br><span><b>Job Location: </b>'+response.data.job_location+'</span><br><br><span><b>salary range: </b>'+response.data.salary_range+'</span><br><br><span><b>other benefit: </b>'+response.data.other_benefit+'</span><br><br><span><b>published on: </b>'+response.data.published_on+'</span><br><br><span><b>To apply through BD Jobs , please click on the following link: </b>'+response.data.BD_job_link+'</span><br><br>';

              $('.panel-body').html(row);
              $('.panel-heading').html('<h4>'+response.data.designation+'</h4>');
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
