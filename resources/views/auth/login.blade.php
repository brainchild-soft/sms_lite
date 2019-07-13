<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
        <title>Login - Custom Billing System</title>
        <link href="{{ url('https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/login-style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.min.js"></script>
            <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    
</head>
<body>

        <div class="main-wrapper">
            <div class="account-page">
                <div class="container">
                    <h4 class="account-title">Custom Billing System</h4>
                    <div class="account-box">
                        <div class="account-wrapper">
                            <div class="account-logo">
                                <a href="index.html"><img src="{{ asset('assets/img/logo2.png') }}" alt="R&G Communication"></a>
                            </div>
                           <form method="POST" action="{{ route('login') }}">
                             @csrf
                                <div class="form-group form-focus">
                                    <label class="control-label">{{ __('E-Mail Address') }}</label>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} floating" type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>

                                <div class="form-group form-focus">
                                    <label for="password" class="control-label">{{ __('Password') }}</label>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} floating" type="password" id="password" name="password" required>
                                    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group form-focus">
                                  
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    
                                </div>

                                <div class="form-group text-center">
                                    <button class="btn btn-primary btn-block account-btn" type="submit">{{ __('Login') }}</button>
                                </div>

                                <div class="text-center">
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                </div>

                            </form>
                    <p class="text-center bg-dark text-white"> <strong class="text-white">© {{ date('Y') }} @  R&G Communication </strong>
                    </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="sidebar-overlay" data-reff="#sidebar"></div>

    <script type="text/javascript" src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
