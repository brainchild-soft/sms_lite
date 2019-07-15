@extends('put.theme')
@section('title', 'Gateways')

@section('body')
 
<div class="content container-fluid" id="itemsDropdown">
           <div class="row">
                    <div class="col-sm-8 col-6">
                        <h4 class="page-title">Gateways</h4>
                         @include('alert.success')  
                         @include('alert.error')   
                    </div>

                    <div class="col-sm-4 col-6 text-right m-b-30">
                        <a href="#" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#add_operator"><i class="fa fa-plus"></i> Add Gateway</a>
                    </div>
     
                </div>
              
              <div class="content-page">
               
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive"> 
                            <table class="table table-primary table-striped table-hover table-sm ">
                                <thead class="table-dark">
  
                                    <tr class="text-center">
                                        <th style="min-width:70px;">#</th>
                                        <th style="min-width:50px;">Gateway</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-primary">

                              @foreach ($Gateways as $i=>$Gateway)
                                    <tr class="text-center ourItem">
                                        <td> {{$i+1}} </td>
                                        <td>  {{$Gateway->Gateway}}</td>
                                                       
                                        <td class="text-right">
                                            <a style="display: inline-block" href="{{ url('/CustomerGateway/'.$Gateway->id.'/edit') }}" class="btn btn-primary btn-sm mb-1">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>

                                        <form style="display: inline-block" action="{{ url('/CustomerGateway/'.$Gateway->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger btn-sm mb-1">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                            </form>
                                        </td>
                                    
                                    </tr>
                                     @endforeach 
                           
                                </tbody>
                            </table>
                        </div>
                    </div>
   
                </div>
            </div>
   
</div>

    <div id="add_operator" class="modal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content modal-md">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Gateway</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/CustomerGateway/') }}" id="form_validation" class="uk-form-stacked" method='post' enctype='multipart/form-data' charset='utf-8'>
                            {{ csrf_field() }}

                            <div class="form-group custom-mt-form-group">
                                <input type="text" name="Gateway" placeholder="Enter Gateway Name"/>
                                <label class="control-label">Gateway</label><i class="bar"></i>
                            </div> 


                            <div class="m-t-20 text-center">
                                 <button class="btn btn-success btn-small" type="submit"><span>Submit</span> </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


@endsection
