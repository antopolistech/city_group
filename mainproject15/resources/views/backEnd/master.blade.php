<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title')</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
          <!-- FAVICONS -->
        <link rel="icon" href="{{asset('public/frontEnd/img/favicon.png')}}" type="image/png" sizes="16x16">
        <link rel="shortcut icon" href="{{asset('public/frontEnd/img/favicon.png')}}" type="image/x-icon">
        <link rel="shortcut icon" href="{{asset('public/frontEnd/img/favicon.png')}}">
            <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="{{asset('public/backEnd/bootstrap/css/bootstrap.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('public/backEnd/dist/css/AdminLTE.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/backEnd/dist/css/style.css')}}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{asset('public/backEnd/dist/css/skins/_all-skins.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('public/backEnd/plugins/iCheck/flat/blue.css')}}">
        <!-- Morris chart -->
        <link rel="stylesheet" href="{{asset('public/backEnd/plugins/morris/morris.css')}}">
        <!-- jvectormap -->
        <link rel="stylesheet" href="{{asset('public/backEnd/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
        <!-- Date Picker -->
        <link rel="stylesheet" href="{{asset('public/backEnd/plugins/datepicker/datepicker3.css')}}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{asset('public/backEnd/plugins/daterangepicker/daterangepicker.css')}}">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="{{asset('public/backEnd/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/backEnd/plugins/datatables/dataTables.bootstrap.css')}}">
        <!-- Toast message -->
        <link rel="stylesheet" href="{{asset('public/backEnd/dist/css/jquery.toast.css')}}">
        <link rel="stylesheet" href="{{asset('public/backEnd/plugins/jQueryUI/jquery-ui.min.css')}}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

        <link rel="stylesheet" href="{{asset('public/backEnd/plugins/animate/animate.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
     integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
     crossorigin="anonymous" />
     {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      
        @yield('pageCss')
        <style type="text/css">
             .ui-menu-item-wrapper {
                background: #15708d;
                color: white;
            }
            .ui-state-active {
                background-color: red;
            }
            
            .ui-menu-item .ui-menu-item-wrapper{padding: 8px;}
         
            </style>
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            @include('backEnd.includes.header')
            @include('backEnd.includes.aside')


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                @yield('mainContent')

                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            @include('backEnd.includes.footer')




            <!-- jQuery 2.2.3 -->
            <script src="{{asset('public/backEnd/plugins/jQuery/jquery-3.3.1.min.js')}}"></script>
            <!-- jQuery UI 1.11.4 -->
            <script src="{{asset('public/backEnd/plugins/jQueryUI/jquery-ui.min.js')}}"></script>
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
            $.widget.bridge('uibutton', $.ui.button);</script>
            <!-- Bootstrap 3.3.6 -->
            <script src="{{asset('public/backEnd/bootstrap/js/bootstrap.min.js')}}"></script>
            <!-- Morris.js charts -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

            <script src="{{asset('public/backEnd/plugins/morris/morris.min.js')}}"></script>
            <!-- jvectormap -->
            <script src="{{asset('public/backEnd/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
            <script src="{{asset('public/backEnd/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
            <!-- daterangepicker -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
            <script src="{{asset('public/backEnd/plugins/daterangepicker/daterangepicker.js')}}"></script>
            <!-- datepicker -->
            <script src="{{asset('public/backEnd/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
            <!-- Bootstrap WYSIHTML5 -->
            <script src="{{asset('public/backEnd/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
            <!-- AdminLTE App -->
            <script src="{{asset('public/backEnd/dist/js/app.min.js')}}"></script>
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="{{asset('public/backEnd/dist/js/pages/dashboard.js')}}"></script>

            <!-- DataTables -->
            <script src="{{asset('public/backEnd/plugins/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('public/backEnd/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

            <!-- Toast message -->
            <script src="{{asset('public/backEnd/dist/js/jquery.toast.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

            <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=aauhqjhh3kt99wmim6czz4x919if427whx39sjy8lzctcc96"></script>
                    
             <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
             integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
             crossorigin="anonymous"></script>
              <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
            <script>


                function setPlainText() {
                var ed = tinyMCE.get('elm1');

                ed.pasteAsPlainText = true;  

                //adding handlers crossbrowser
                if (tinymce.isOpera || /Firefox\/2/.test(navigator.userAgent)) {
                    ed.onKeyDown.add(function (ed, e) {
                        if (((tinymce.isMac ? e.metaKey : e.ctrlKey) && e.keyCode == 86) || (e.shiftKey && e.keyCode == 45))
                            ed.pasteAsPlainText = true;
                    });
                } else {            
                    ed.onPaste.addToTop(function (ed, e) {
                        ed.pasteAsPlainText = true;
                    });
                }
            }

            tinymce.init({ selector:'.tinymce',branding: false,oninit : "setPlainText",
            plugins : "paste" });
            </script>
            @yield('pageScripts')

            <script>
                $(document).ready(function(){
                    @yield('script')
                });
            </script>
            <script>
                $('#main_checkbox').click(function(){
                $('input:checkbox').not(this).prop('checked', this.checked);
                });
            </script>
            <script>
                $("#example1").DataTable();
                $("#example2").DataTable();
            </script>
            <script>
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
             </script>

    </body>
</html>
