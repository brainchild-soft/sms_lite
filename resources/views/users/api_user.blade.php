@extends('put.theme')
@section('title', 'Add API User')

@section('body')
 
<div class="content container-fluid">
           <div class="row">
                    <div class="col-sm-8 col-6">
                        <h4 class="page-title">API User </h4>
                        @include('alert.success')   
                        @include('alert.error')   
                    </div>
               
                </div>
              
              <div class="content-page">
               <div class="row">
                    <div class="col-md-12">
                       <form action="{{ url('/ApiUser/'.$ApiUser->id) }}" id="form_validation" class="uk-form-stacked" method='post' enctype='multipart/form-data' charset='utf-8'>
                              
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                                 <div class="form-group custom-mt-form-group">
                                    <input type="text" name="UserName" value="{{$ApiUser->UserName}}" required/>
                                    <label class="control-label">User Name</label><i class="bar"></i>
                                </div>
                                <div class="form-group custom-mt-form-group">
                                    <input type="text" name="Password" value="{{$ApiUser->Password}}" required/>
                                    <label class="control-label">Password</label><i class="bar"></i>
                                </div>
                              
                                <div class="form-group custom-mt-form-group">
                                    <input type="text" name="Url" value="{{$ApiUser->Url}}" required />
                                    <label class="control-label">Url or IP</label><i class="bar"></i>
                                </div>  
                            <div class="m-t-20 text-center">
                                 <button class="btn btn-success btn-small" type="submit"><span>Submit</span> </button>
                            </div>
                        </form>
                    </div>
   
                </div>
            </div>



        </div>
   
</div>


@endsection
