@extends('backEnd.master')

@section('title')
Dashboard
@endsection

@section('mainContent')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Career CV
        <small>Lists</small>
    </h1>
</section>

<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
           Manage Career CV
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
                        <!-- <th><input type="checkbox" id="main_checkbox"/></th> -->
                        <th>Sno</th>
                        <th>Date</th>
                        <th>designation</th>
                        <th>Download</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                            @php $i = 1 @endphp
                            @foreach($cvs as $data)
                        <tr id="cv_row_{{$data->id}}">
                            <!-- <td><input type="checkbox" id="checkone" name="checkbox[]" value=""></td> -->
                            <td>
                                {{$i++}}
                            </td>
                            <td>
                               {{date('d-M-Y h:i:s A',strtotime($data->created_at))}}
                            </td>
                            <td>
                               {{ $data->career_designation }}
                            </td>
                            <td>
                               <a href="{{asset($data->cv)}}" download><i class="glyphicon glyphicon-download-alt"></i> Download CV</a> 
                            </td>

                            <td>
                              <a class="btn btn-xs btn-danger cv_delete_btn" data-id="{{$data->id}}" data-toggle="tooltip" data-placement="top" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
                            </td> 
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')

<!--  Delete functionality -->
$('#example1 tbody').on('click','.cv_delete_btn',function( event ) {
    
    event.preventDefault();

    var value = $(this).data('id');
    var url = ('cv/'+value);
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
        $( "#cv_row_"+value ).fadeOut( "slow" );

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

@endsection