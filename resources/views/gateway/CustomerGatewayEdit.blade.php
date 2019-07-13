@extends('put.theme')
@section('title', 'Edit Gateway')

@section('body')
 
<div class="content container-fluid">
           <div class="row">
                    <div class="col-sm-8 col-6">
                        <h4 class="page-title">Edit SMS Gateway</h4>
                        @include('alert.error')  
                    </div>
                    <div class="col-sm-4 col-6 text-right m-b-30">
                        <a href="{{ url('/CustomerGateway/') }}" class="btn btn-primary"><i class="fa fa-link"></i> Gateways</a>
                    </div>
                </div>
              
              <div class="content-page">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ url('/CustomerGateway/'.$CustomerGateway->id) }}" id="form_validation" class="uk-form-stacked" method='post' enctype='multipart/form-data' charset='utf-8'>
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                               
                            <div class="form-group custom-mt-form-group">
                                <input type="text" name="Gateway" value="{{ $CustomerGateway->Gateway }}" placeholder="Enter Gateway Name"/>
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
