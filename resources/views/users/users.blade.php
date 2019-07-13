@extends('put.theme')
@section('title', 'User')

@section('body')
 
<div class="content container-fluid">
           <div class="row">
                    <div class="col-sm-8 col-6">
                        <h4 class="page-title">User</h4>
                         @include('alert.success')   
                         @include('alert.error')   
                    </div>
                </div>
              
              <div class="content-page">
               <div class="row">
                    <div class="col-md-12">
                       <form action="{{ url('/Users/'.$User->id) }}" id="form_validation" class="uk-form-stacked" method='post' enctype='multipart/form-data' charset='utf-8'>
                              
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                                <div class="form-group custom-mt-form-group">
                                    <input id="name" type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $User->name }}" required autofocus/>
                                    <label class="control-label">{{ __('Name') }}</label><i class="bar"></i>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif

                                </div>
                                
                                <div class="form-group custom-mt-form-group">
                                    <input for="email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $User->email }}" required>
                                    <label class="control-label">{{ __('E-Mail Address') }}</label><i class="bar"></i>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="form-group custom-mt-form-group">
                                   <input for="password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    <label for="password" class="control-label">{{ __('Password') }}</label><i class="bar"></i>

                                     @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>  

                                <div class="form-group custom-mt-form-group">
                                     <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    <label for="password-confirm" class="control-label">{{ __('Confirm Password') }}</label><i class="bar"></i>
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
