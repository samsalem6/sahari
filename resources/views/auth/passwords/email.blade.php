{{--  @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  --}}


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Sense Aroma Admin Panel" />
        <meta name="author" content="" />

        <link rel="icon" href="{{ asset('admin/images/favicon.ico') }}">

        <title>{{ config('app.name', 'Sense Aroma') }} | {{ __('Reset Password') }}</title>

        <link rel="stylesheet" href="{{ asset('admin/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/font-icons/entypo/css/entypo.css') }}">
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
        <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/neon-core.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/neon-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/neon-forms.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">

        <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
        <style>
            *{

                font-family: "Cairo", Helvetica, Arial, sans-serif;
            }
        </style>

        <script src="{{ asset('admin/js/jquery-1.11.3.min.js') }}"></script>

    </head>
    <body class="page-body login-page login-form-fall" data-url="http://neon.dev">

    <div class="login-container">
        
        <div class="login-header login-caret">
            
            <div class="login-content">
                
                <a href="index.html" class="logo">
                
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="249.961" height="264.16" viewBox="0 0 757 800">
                    <image id="Layer_0" data-name="Layer 0" x="70" y="153" width="526" height="405" xlink:href="data:img/png;base64,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"/>
                    </svg>

                </a>
            </div>
            
        </div>

        <div class="login-form">
            
            <div class="login-content">
                
                <form method="POST" action="{{ route('password.email') }}" role="form" >
                    @csrf
                    
                    <div class="form-group">
                        <div class="input-group ">
                            <div class="input-group-addon">
                                <i class="entypo-mail"></i>
                            </div>
                            
                            <input type="text" class="form-control" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus />
                        </div>
                        @error('email')
                            <div class="form-group has-error">
                                <label for="field-4" class="col-sm-12 control-label">{{ $message }}</label>
                            </div>
                        @enderror
                        
                    </div>

                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-login">
                            <i class="entypo-login"></i>
                            @lang('lang.PasswordReset')
                        </button>
                    </div>
                    
                </form>

                <div class="login-bottom-links">
                        @if (Route::has('password.request'))
                        <a class="link" href="{{ route('login') }}" >
                            @lang('lang.LoginIn')
                        </a>
                    @endif
                    <br />
                    <a href="/">Copyright 2019 Sense Aroma - All Rights Reserved.</a>
                </div>
            </div>
            
        </div>
        
    </div>

    <!-- Bottom scripts (common) -->
    <script src="{{ asset('admin/js/gsap/TweenMax.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/js/joinable.js') }}"></script>
    <script src="{{ asset('admin/js/resizeable.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin/js/neon-login.js') }}"></script>
</body>
</html>