@extends('put.theme')
@section('title', 'Home')

@section('body')

@php
    $RatioDL=0;
    $RatioUndl=0;
    $TotalLog=$TotalLog_dl+$TotalLog_undl;
    if($TotalLog>0)
    {
        $RatioDL= ($TotalLog_dl*100)/$TotalLog;
        $RatioUndl= ($TotalLog_undl*100)/$TotalLog;
    }
@endphp

            <div class="content container-fluid" id="showDashboard">
                <div class="page-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h5 class="text-uppercase">Welcome {{ Auth::user()->name }} </h5>
                        @include('alert.success')  
                         @include('alert.error')   
                    </div>

                </div>
            </div>

         <div class="row">
         
                    
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-primary"><i class="fa fa-link" aria-hidden="true"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{$TotalGateway}}</h3>
                                <span>Gateways</span>
                            </div>
                        </div>
                    </div>
                  
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-dark"><i class="fa fa-history" aria-hidden="true"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{$TotalLog}} ({{number_format($RatioDL+$RatioUndl).'%'}})  </h3>
                                <span>SMS Log</span>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-secondary"><i class="fa fa-check" aria-hidden="true"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{$TotalLog_dl}} ({{number_format($RatioDL).'%'}}) </h3>
                                <span>Delivered SMS</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-danger"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <div class="dash-widget-info">
                                  @php
                                   
                                @endphp
                                <h3>{{$TotalLog_undl}} ({{number_format($RatioUndl).'%'}}) </h3>
                                <span> Undelivered SMS</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                    
                <div class="row">
                    <div class="col-lg-12" >
                        <div class="content-page">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="page-title mb-2">
                                        Control Gateway 
                                    </div>
                                    <div class="table-responsive">
                                         <table class="table bg-info text-white">
                                <thead class="table-dark">
  
                                    <tr class="text-center">
                                        <th style="min-width:70px;">#</th>
                                        <th style="min-width:50px;">Gateway</th>
                                        <th style="min-width:50px;">Gateway Switch</th>
                                        <th style="min-width:50px;">Reset Error </th>
                                        <th style="min-width:50px;">Error Code</th>
                                 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Gateways as $i=>$Gateway)

                                                    <tr class="text-center">
                                                        <td> {{ $i+1}} </td>
                                         
                                                        <td> {{ $Gateway->Gateway }} </td>

                                                        <td class="text-center" >

                                                            <a href="#" onclick="window.open('{{ url('GatewaySwitch/'.$Gateway->Gateway.'/Enable') }}')" class="btn btn-info btn-sm mb-1">
                                                                <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                                            </a>

                                                            <a href="#" onclick="window.open('{{ url('GatewaySwitch/'.$Gateway->Gateway.'/Disable') }}')" class="btn btn-danger btn-sm mb-1">
                                                                <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                                            </a>
                                                        </td>

                                                    @foreach ($Errors as $Error)
                                                        @if ($Gateway->Gateway==$Error->Gateway)
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
                                   
                                                            
                                                        <td class="bg-danger text-white"> 
                                                        
                                                             <h5> {{$Error->ErrorCode}} </h5>

                                                             @if ($Error->ErrorCode=="8")
                                    <audio controls autoplay src="{{ asset('assets/alert.mp3') }}" preload="auto" style="display: none"></audio>
                                                              @endif                         
                                                        </td>
                                                        @endif
                                                    @endforeach
                                                       
                                                        
                                                    </tr>
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
@endsection