@extends('frontEnd.master')
@section('title')
    Sustain Ability
@endsection
@section('pageCss')
    <style>
        .panel {
            padding: 16px 0;
            width: 220px;
        }

        .pdf-title {
            margin-top: 10px;
            height: auto;
        }
        .company-overview-content.csr-content > p {
            text-align: justify;
        }


        /* -- More extra small device (portrait phones, less than 360px - like iPhone 5/SE (320px)) --
@media (max-width: 359.98px) {}

/*-- Extra small devices (portrait phones, less than 576px) --*/
@media (min-width: 360px) and (max-width: 575.98px) {
    .pdfobject-container {
            height: 30rem;
        }
}

/*-- Small devices (landscape phones, 576px to 768px) --*/
@media (min-width: 576px) and (max-width: 767.98px) {
    .pdfobject-container {
            height: 30rem;
        }
}

/*-- Medium devices (tablets, 768px and up) --*/
@media (min-width: 768px) and (max-width: 991.98px) {
    .pdfobject-container {
            height: 35rem;
        }
}

/*-- Large devices (small laptop and large tablet, 992px to 1200px - like iPad pro) --*/
@media (min-width: 992px) and (max-width: 1199.98px) {
    .pdfobject-container {
            height: 35rem;
            
        }
}

@media (min-width: 1200px) and (max-width: 1365.98px) {
    .pdfobject-container {
            height: 35rem;
        }
}
@media (min-width: 1366px) and (max-width: 1679.98px) {
    .pdfobject-container {
            height: 35rem;
        }
}
@media (min-width: 1680px) and (max-width: 1919.98px) {
    .pdfobject-container {
            height: 40rem;
        }
}
@media (min-width: 1920px) {
    .pdfobject-container {
            height: 40rem;
        }
} */

        .fa-file-pdf-o {
            font-size: 40px;
            color: #ff0000;
        }

        .pdf {
            cursor: pointer;
        }

        .pdf-row-3 {
            margin-left: 15%;
        }

        .pdf-row-2 {
            margin-left: 30%;
        }

        .pdf-row-1 {
            margin-left: 40%;
        }

        .pdf-col {
            margin-right: 60px;
        }

        .company-overview-content>ul {
            list-style: disc;
            margin-left: 80px;
        }

        .company-overview-content>ul>li {
            padding-top: 20px;
            color: rgba(0, 0, 0, 0.9);
            font-size: 18px;
            margin: 0 auto;
            width: 70%;
        }
        td {
         text-align: center;
         vertical-align: middle !important;
     }
     tr{
         height: 70px;
     }

     /* @media (min-width: 576px){
.modal-dialog-centered {
    min-height: calc(100% - (1.75rem * 2));
}
     } */
     .modal-dialog {
    /* margin: 0 auto; */
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

    </style>
@endsection


@section('mainContent')

    <!-- Banner Start -->
    <section class="banner-area know-us-page csr-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!--<h1 class="text-uppercase text-center">Social Responsibility</h1>-->
                </div>
            </div>
        </div>
    </section>
    <!-- Banner End -->

    <!--Social Page Links Area Start-->
    @include('frontEnd.includes.social')
    <!--Social Page Links Area End-->
    @if (!empty($data))
        <!-- Company Overview Area Start -->
        <section class="company_overview-area csr-area text-justify section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="section-title white-title text-center">Social Responsibility</h2>

                        <div class="company-overview-content csr-content">
                            {!! $data->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <section class="pdf-table">
        <div class="col-sm-12">
            <h1 class="section-title white-title text-center">Sustainability</h1>
        </div>
        <div class="container">
            <div class="row">
                <table class="table table-bordered">
                    <tbody>
                        @if (!empty($pdfs))
                        @foreach ($pdfs as $item)
                        <tr>
                            <td width='70%'>{{$item->name}}</td>
                            <td><a class="pdf" onclick="pdfView({{ $item->id }})"> Click here to open</a></td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    @if (!empty($pdfs))
        <section class="company_overview-area csr-area text-justify section-padding">
            <div class="container">
                <div
                    class="row pdf-row {{ $pdfs->count() == 3 ? 'pdf-row-3' : ($pdfs->count() == 2 ? 'pdf-row-2' : ($pdfs->count() == 1 ? 'pdf-row-1' : '')) }} ">
                    @foreach ($pdfs as $item)
                    <a class="pdf" onclick="pdfView({{ $item->id }})">
                        <div class="col-sm-3 {{ $pdfs->count() < 4 ? 'pdf-col' : '' }}">
                            <div class="panel panel-default ">
                                <div class="panel-body text-center">
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>                      
                                    <div class="text-center pdf-title">
                                        {{ $item->name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- Company Overview Area End -->
    @endif

    <!-- pdf edit Modal -->
<div class="modal fade pdf_view" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myLargeModalLabel"> </h4>
            </div>
            <div class="modal-body">
                <div class="pdf_viewer"></div>
            </div>

        </div>
    </div>
</div>

@endsection


@section('pageScript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.6/pdfobject.min.js"
        integrity="sha512-B+t1szGNm59mEke9jCc5nSYZTsNXIadszIDSLj79fEV87QtNGFNrD6L+kjMSmYGBLzapoiR9Okz3JJNNyS2TSg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // var pdfs = {!! $pdfs !!};
        // var path = window.location.href;
        // var url = path.slice(0, -14);

        // $.each(pdfs, function(key, val) {
        //     PDFObject.embed(url + "/pdf/" + val.id, ".pdf_viewer" + val.id);
        // });

        function pdfView(id) {
            var path = window.location.href;
            var url = path.slice(0, -14);
            PDFObject.embed(url + "/pdf/" + id, ".pdf_viewer");
            $('.pdf_view').modal('show');

        }
    </script>
@endsection
