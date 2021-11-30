@extends('backEnd.master')
@section('pageCss')
    <style>
        .pdfobject-container {
            height: 20rem;
            border: 1rem solid rgba(0, 0, 0, .1);
        }

    </style>
@endsection

@section('title')
    Sustain Ability
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
                Sustainability <center id="product_error" class="text-danger"></center>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                            class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="{{ route('sustain.ability.store') }}" method="post" id="csr_add_frm">
                    @csrf
                    <div class="col-md-12">

                        <div class="form-group col-md-12">
                            <label for="csr_desc">Sustainability </label>
                            <textarea type="text" class="form-control tinymce" id="csr_desc" name="description"
                                rows="12"></textarea>
                            <span class="text-danger error-csr_desc"></span>
                        </div>

                        <div class="col-md-12">
                            <input type="submit" class="btn btn-danger" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @if ($data)
        <section class="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    Sustainability
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                class="fa fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="box-body table-responsive">
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr class="danger">
                                    <th>Created At</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                <tr id="csr_row_{{ $data->id }}">
                                    <td>
                                        {{ date('d-M-Y', strtotime($data->created_at)) }}
                                    </td>
                                    <td>
                                        {!! str_limit($data->description, 100) !!}
                                    </td>
                                    <td>

                                        <button class="btn btn-xs btn-info csr_edit_btn"
                                            onclick="edit({{ $data->id }})">
                                            <span class="glyphicon glyphicon-edit" data-toggle="tooltip"
                                                data-placement="top" title="update"></span></button>

                                        <button onclick="view({{ $data->id }})"
                                            class="btn btn-xs btn-primary csr_detail_btn">
                                            <span class="glyphicon glyphicon-th-list" data-toggle="tooltip"
                                                data-placement="top" title="Detail"></span></button>

                                        {{-- <button onclick="delete({{ $data->id }})" class="btn btn-xs btn-danger" id="csr_delete_btn"
                                            data-toggle="tooltip" data-placement="top" title="Delete">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </button> --}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endif


    <section class="content">

        <div class="box box-default">
            <div class="box-header with-border">
                Add Sustainability PDF <center id="product_error" class="text-danger"></center>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                            class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="{{ route('sustain.ability.pdf.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">

                        <div class="form-group col-md-12">
                            <div class="form-group col-md-12">
                                <label for="banner_image">Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="banner_image">PDF</label>
                                <input type="file" name="pdf" class="custom-file-input dropify"data-allowed-file-extensions='["pdf"]'
                                 data-max-file-size="10.M" data-errors-position="outside">

                                {{-- <input type="file" class="form-control" name="pdf"> --}}
                            </div>

                        </div>


                        <div class="col-md-12">
                            <input type="submit" class="btn btn-danger" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @if (!empty($pdfs))
        <section class="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    Sustainability PDF
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                class="fa fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="box-body table-responsive">
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr class="danger">
                                    <th>Name</th>
                                    <th>PDF</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($pdfs as $item)


                                    <tr class="pdf_row{{ $item->id }}">
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            <div class="pdf_viewer{{ $item->id }}"></div>
                                            {{-- <a href="{{ asset($item->pdf) }}" target="blank">
                                                <button type='button' class='ms-btn-icon btn-dark'>
                                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                </button>
                                            </a> --}}

                                        </td>
                                        <td>

                                            <button class="btn btn-xs btn-info csr_edit_btn"
                                                onclick="editPdf({{ $item->id }})">
                                                <span class="glyphicon glyphicon-edit" data-toggle="tooltip"
                                                    data-placement="top" title="update"></span></button>


                                            <button onclick="deletePdf({{ $item->id }})" class="btn btn-xs btn-danger"
                                                id="csr_delete_btn" data-toggle="tooltip" data-placement="top"
                                                title="Delete">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Modal -->
    <div class="modal fade csr_modal_lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #00BCD4">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myLargeModalLabel">Edit Sustainability</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" id="update_form">
                        @csrf
                        <input type="hidden" class="hidden_id" name="id">
                        <div class="col-md-12">
                            <div class="form-group col-md-12">
                                <label for="edit_csr_desc">Sustainability</label>
                                <textarea type="text" class="form-control tinymce" id="edit_csr_desc" name="description"
                                    rows="12"></textarea>
                                <span class="text-danger error-edit-csr_desc"></span>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Submit"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Modal -->
    <div class="modal fade csr_detail_model" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #00BCD4">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myLargeModalLabel">Sustainability Detail</h4>
                </div>
                <div class="modal-body">

                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <p class="desc"></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- pdf edit Modal -->
    <div class="modal fade pdf_edit" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #00BCD4">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myLargeModalLabel">Edit Sustainability</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" id="update_form_pdf">
                        @csrf
                        <div class="form-group col-md-12">
                            <input type="hidden" name="id" class="hidden_id_pdf">
                            <div class="form-group col-md-12">
                                <label for="banner_image">Name</label>
                                <input type="text" class="form-control" id="edit_pdf" name="name">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="banner_image">PDF</label>
                                <input type="file" name="pdf" id="edit_image" class="custom-file-input dropify"data-allowed-file-extensions='["pdf"]'
                                data-max-file-size="10.M" data-errors-position="outside">
                            </div>

                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Submit"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('pageScripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.6/pdfobject.min.js"
        integrity="sha512-B+t1szGNm59mEke9jCc5nSYZTsNXIadszIDSLj79fEV87QtNGFNrD6L+kjMSmYGBLzapoiR9Okz3JJNNyS2TSg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.sidebar-menu').find('.company_overview').addClass('active');
        $('.sidebar-menu').find('.sustain_ability').addClass('active');

        var pdfs = {!! $pdfs !!};
        var path = window.location.href;
        var url = path.slice(0, -16);
        $.each(pdfs, function(key, val) {
            PDFObject.embed(url + "/pdf/" + val.id, ".pdf_viewer" + val.id);
        });
        $('.dropify').dropify({
                error: {
                    'fileSize': 'The file size is too big ( 600KB  max).',
                }
            });
        var config = {
            routes: {
                add: "{!! route('sustain.ability.store') !!}",
                edit: "{!! route('sustain.ability.edit') !!}",
                editPdf: "{!! route('sustain.ability.pdf.edit') !!}",
                view: "{!! route('sustain.ability.show') !!}",
                update: "{!! route('sustain.ability.update') !!}",
                updatePdf: "{!! route('sustain.ability.pdf.update') !!}",
                deletePdf: "{!! route('sustain.ability.pdf.delete') !!}",
            }
        };



        function edit(id) {
            $.ajax({
                url: config.routes.edit,
                method: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(response) {
                    if (response.success == true) {
                        $('.hidden_id').val(response.data.id);
                        // tinymce.activeEditor.setContent(response.data.description);
                        tinyMCE.get('edit_csr_desc').setContent(response.data.description);
                        $('.csr_modal_lg').modal('show');

                    } //success end

                }
            }); //ajax end
        }

        function editPdf(id) {
            // alert(id);
            $.ajax({
                url: config.routes.editPdf,
                method: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(response) {
                    if (response.success == true) {
                        $('.hidden_id_pdf').val(response.data.id);
                        $('#edit_pdf').val(response.data.name);

                        $('.pdf_edit').modal('show');

                    } //success end

                }
            }); //ajax end
        }

        function view(id) {
            $.ajax({
                url: config.routes.view,
                method: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(response) {
                    if (response.success == true) {
                        $('.desc').html(response.data.description);

                        $('.csr_detail_model').modal('show');

                    } //success end

                }
            }); //ajax end
        }

        function deletePdf(id) {
            // alert(id)
            var answer = confirm("Are you sure you want to delete?");
            if (answer) {
                $.ajax({
                    url: config.routes.deletePdf,
                    method: "POST",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(response) {
                        $('.pdf_row' + id).remove();
                        $.toast({
                            heading: 'Success',
                            text: response.msg,
                            showHideTransition: 'slide',
                            icon: 'success',
                            position: 'top-right',
                            stack: false
                        });

                    }
                }); //ajax end
            }
            // confirm ("Are you sure you want to delete?");

        }

        $(document).off('submit', '#update_form');
        $(document).on('submit', '#update_form', function(event) {
            event.preventDefault();
            // alert('sds');
            $.ajax({
                url: config.routes.update,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function(response) {
                    window.location.href = response.url;
                    // $('.csr_modal_lg').modal('hide');

                }, //success end

            });
        });
        $(document).off('submit', '#update_form_pdf');
        $(document).on('submit', '#update_form_pdf', function(event) {
            event.preventDefault();
            // alert('sds');
            $.ajax({
                url: config.routes.updatePdf,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function(response) {
                    window.location.href = response.url;
                    // $('.csr_modal_lg').modal('hide');

                }, //success end

            });
        });
    </script>
@endsection

@section('script')

    <!--  add & validation using ajax -->
    $('#csr_add_frm').submit(function( event ) {

    event.preventDefault();
    var url = $(this).attr('action');
    var method = $(this).attr('method');

    $(".error-csr_desc").text('');

    $.ajax({
    type: method,
    url: url,
    enctype: 'multipart/form-data',
    contentType: false,
    processData: false,
    data: new FormData(this),
    success: function(response){
    {{-- console.log(response.errors) --}}
    if(response.message){
    $.toast({
    heading: 'Warning',
    text: "Description field is required",
    showHideTransition: 'slide',
    icon: 'error',
    position: 'top-right',
    stack: false
    })
    }

    if(response.url){
    window.location.href = response.url;
    }
    },
    error: function(response){
        $.toast({
            heading: 'Warning',
            text: "Description field is required",
            showHideTransition: 'slide',
            icon: 'error',
            position: 'top-right',
            stack: false
            })
    if(response.responseJSON.errors){
    $(".error-csr_desc").text(response.responseJSON.errors.csr_desc);
    }
    }
    });
    });
    @if ($msg = Session::get('msg'))
        $.toast({
        heading: 'Success',
        text: '{{ $msg }}',
        showHideTransition: 'slide',
        icon: 'success',
        position: 'top-right',
        stack: false
        })
        {{ Session::forget('msg') }}
    @endif

    @if ($msg = Session::get('msg2'))
        $.toast({
        heading: 'Error',
        text: '{{ $msg }}',
        showHideTransition: 'fade',
        icon: 'error',
        position: 'top-right',
        stack: false
        })
        {{ Session::forget('msg2') }}
    @endif

@endsection
