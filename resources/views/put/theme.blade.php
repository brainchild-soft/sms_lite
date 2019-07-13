<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>Custom Billing System - @yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
    <style type="text/css">
        .green{
            background-color:#008000; 
        }
        .yellow{
            background-color:#FFC107; 
        }
        .orange{
            background-color:#EB8500; 
        }
        .red{
            background-color:#FC1111; 
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        @include('put.header')
      
        @include('put.admin-menu')
  
        
        <div class="page-wrapper"> <!-- content -->

            @section('body')
            @show
               <div class="col-lg-12 col-12 text-center">
                            <div class="alert bg-info fade show text-center text-white">
                                <a href="#" onclick="window.open('https://rngcommunication.com')" class="alert-link text-white">R&G Communication</a> | <strong> {{ date('Y') }}  </strong> 
                            
                            </div> 
                        </div>
        </div>


	</div>
 
    <div class="sidebar-overlay" data-reff=""></div>
    @include('put.js')

</body>
</html>