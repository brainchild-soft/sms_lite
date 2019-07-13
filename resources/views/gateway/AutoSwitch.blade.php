<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="10">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>Auto Disable Gateway</title>
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
        @if (Auth::user()->Role=='Customer')
        @include('put.customer-menu')

        @elseif(Auth::user()->Role=='Admin' || Auth::user()->Role=='Operator')
        @include('put.admin-menu')
        @endif
        
        @foreach ($SentOnly as $element)
            @if ($element->NotDelivered>=20)

             <script>
                window.open('{{ url('GatewaySwitch/'.$element->Gateway.'/Disable') }}')
            </script>
                
            @endif
        @endforeach
        <div class="page-wrapper"> <!-- content -->

            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <h5 class="text-uppercase">Errors From Gateway</h5>
                            @include('alert.success')  
                            @include('alert.error')   
                        </div>

                    </div>
                </div>

                <div class="row" >
                    <div class="col-lg-12" >
                        <div class="content-page">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                               
                                    

                                    <div class="table-responsive">
                                     <table class="table table-primary table-striped">
                                        <thead class="table-dark">

                                            <tr class="text-center">
                                                <th style="min-width:70px;">#</th>
                                                <th style="min-width:50px;">Client</th>
                                                <th style="min-width:50px;">Gateway</th>
                                                <th style="min-width:50px;">Error Code</th>
                                                <th style="min-width:50px;">Total Error</th>
                                                <th style="min-width:50px;">Switch</th>
                                                <th style="min-width:50px;">Reset</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-primary">

                                @foreach ($Errors as $i=>$Error)

                                    @if ($Error->ErrorCode==$Error->Error && $Error->TotalErrorCode>=$Error->Limit)
                                    
                                         <script>
                                            window.open('{{ url('GatewaySwitch/'.$Error->Gateway.'/Disable') }}')
                                        </script> 
    
                                <tr class="text-center">
                                    <td> {{ $i+1}} </td>
                                    
                                    <td> {{ $Error->CustomerId}} </td>
                                    
                                    <td> <a href="{{ url('GatewayReportDetails/'.$Error->Gateway.'/'. date('d-m-Y', strtotime($Date1)).'/'. date('d-m-Y', strtotime($Date2))) }}">{{ $Error->Gateway }}</a>  </td>
                                    
                                    <td class="bg-danger text-white"> 
                                     <h5> {{ $Error->ErrorCode }} </h5>                         
                                 </td>

                                 <td> {{  $Error->TotalErrorCode }}</td>
                                 @foreach ($ApiUsers as $ApiUser)

                                 @endforeach
                                 <td class="text-center" >

                                    <a href="#" onclick="window.open('{{ url('GatewaySwitch/'.$Error->Gateway.'/Enable') }}')" class="btn btn-info btn-sm mb-1">
                                        <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                    </a>

                                    <a href="#" onclick="window.open('{{ url('GatewaySwitch/'.$Error->Gateway.'/Disable') }}')" class="btn btn-danger btn-sm mb-1">
                                        <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                    </a>
                                </td>
                                
                                <td>
                                    <form action="{{ url('/ResetError/')  }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <input type="hidden" value="{{ $Error->Gateway }}" name="Gateway">
                                        <input type="hidden" value="{{ $Error->ErrorCode }}" name="ErrorCode">
                                        <button type="submit" class="btn btn-warning btn-sm mb-1">
                                            <i class="fa fa-refresh" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                                
                            </tr>
                              @endif
                            @endforeach
                            
                            
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>       
</div>
</div>
            
       
        </div>

        
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    @include('put.js')

</body>
</html>