
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>404 Error Page</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/bootstrap.min.css')}}">
  <!-- FAVICONS -->
    <link rel="icon" href="{{asset('public/frontEnd/img/favicon.png')}}" type="image/png" sizes="16x16">
    <link rel="shortcut icon" href="{{asset('public/frontEnd/img/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('public/frontEnd/img/favicon.png')}}">
    <style type="text/css" media="screen">
    	body {
		    margin: 0;
		    font-family: Raleway,sans-serif;
		    font-size: .9rem;
		    font-weight: 400;
		    line-height: 1.6;
		    color: #212529;
		    text-align: left;
		    background-color: #f5f8fa;
		}
		center img{
			box-shadow: 0 1.5px 10px #3F51B5;
		}	
    </style>
  </head>
  <body>

  	<br><br>
    <center><img src="{{asset('public\frontEnd\img\error.jpg')}}" alt="error image" class="img-responsive">
    <br>
    <a href="{{route('index')}}" class="btn btn-warning" title="back to home" >Back To Home Page</a>
    </center>
    <br><br>
	   <!--[if (!IE)|(gt IE 8)]><!-->
	<script src="{{asset('public/frontEnd/js/jquery-2.1.4.min.js')}}"></script>
	<!--<![endif]-->

	<!-- ====Bootstrap JS==== -->
	<script src="{{asset('public/frontEnd/js/bootstrap.min.js')}}"></script>
  </body>
</html>

