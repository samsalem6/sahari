{{--  @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
  --}}


<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" >
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Sense Aroma Admin Panel" />
        <meta name="author" content="" />

        <link rel="icon" href="{{ asset('admin/images/favicon.ico') }}">

        <title>{{ config('app.name', 'Sense Aroma') }} | {{ __('Register') }}</title>

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
                
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="159.882" height="49.212" viewBox="0 0 2063 635">
                    <metadata><?xpacket begin="﻿" id="W5M0MpCehiHzreSzNTczkc9d"?>
                    <x:xmpmeta xmlns:x="adobe:ns:meta/" x:xmptk="Adobe XMP Core 5.6-c138 79.159824, 2016/09/14-01:09:01        ">
                        <rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
                            <rdf:Description rdf:about=""/>
                        </rdf:RDF>
                    </x:xmpmeta>
                                                                                                                
                                            
                    <?xpacket end="w"?></metadata>
                    <defs>
                    <style>
                        .cls-1, .cls-2 {
                        font-size: 250px;
                        text-anchor: middle;
                        font-family: "Palatino Linotype";
                        }
                
                        .cls-1 {
                        fill: #de4552;
                        }
                
                        .cls-2 {
                        fill: #de4353;
                        }
                    </style>
                    </defs>
                    <image y="12" width="1967" height="614" xlink:href="data:img/png;base64,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"/>
                    <text id="Amos" class="cls-1" x="1052.52" y="338.068"><tspan x="1052.52">Amos</tspan></text>
                    <text id="Iajando" class="cls-2" x="962.538" y="538.538"><tspan x="962.538">Iajando</tspan></text>
                </svg>
            </div>
            
        </div>

        <div class="login-form">
            
            <div class="login-content">
                
                <form method="POST" action="{{ route('register') }}" role="form" >
                    @csrf

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-user"></i>
                        </div>
                        
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="@lang('lang.name')" value="{{ old('name') }}" required autocomplete="name" autofocus />

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group ">
                        <div class="input-group-addon">
                            <i class="entypo-mail"></i>
                        </div>
                        <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="@lang('lang.email')" autocomplete="off" />
                    </div>
                    @error('email')
                        <div class="form-group has-error">
                            <label for="field-4" class="col-sm-12 control-label">{{ $message }}</label>
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="input-group ">
                        <div class="input-group-addon">
                            <i class="entypo-globe"></i>
                        </div>
                        <input type="text" class="form-control" name="country" value="{{ old('country') }}" id="country" placeholder="@lang('lang.country')" autocomplete="off" />
                    </div>
                    @error('country')
                        <div class="form-group has-error">
                            <label for="field-4" class="col-sm-12 control-label">{{ $message }}</label>
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="input-group ">
                        <div class="input-group-addon">
                            <i class="entypo-mobile"></i>
                        </div>
                        <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" id="mobile" placeholder="@lang('lang.mobile')" autocomplete="off" />
                    </div>
                    @error('mobile')
                        <div class="form-group has-error">
                            <label for="field-4" class="col-sm-12 control-label">{{ $message }}</label>
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="input-group ">
                        <div class="input-group-addon">
                            <i class="entypo-direction"></i>
                        </div>
                        <input type="text" class="form-control" name="address" value="{{ old('address') }}" id="address" placeholder="@lang('lang.address')" autocomplete="off" />
                    </div>
                    @error('address')
                        <div class="form-group has-error">
                            <label for="field-4" class="col-sm-12 control-label">{{ $message }}</label>
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-key"></i>
                        </div>
                        
                        <input type="password" class="form-control" name="password" id="password" placeholder="@lang('lang.password')" autocomplete="off" />
                    </div>
                    @error('password')
                    <div class="form-group has-error">
                        <label for="field-4" class="col-sm-12 control-label">{{ $message }}</label>
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-key"></i>
                        </div>
                        
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="@lang('lang.password')" autocomplete="off" />
                    </div>
                    @error('password_confirmation')
                    <div class="form-group has-error">
                        <label for="field-4" class="col-sm-12 control-label">{{ $message }}</label>
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-login">
                        <i class="entypo-login"></i>
                        @lang('lang.Register')
                    </button>
                </div>
                    
                </form>

                <div class="login-bottom-links">
                    @if (Route::has('password.request'))
                        <a class="link" href="{{ route('login') }}" >
                            @lang('lang.LoginIn')
                        </a>
                    @endif
                    <hr style="border-top: 1px solid #454a54;" />

                    <div class="form-group">
                        <a href="/login/facebook" class="btn btn-default btn-lg btn-block btn-icon icon-left facebook-button">
                            Login with Facebook
                            <i class="entypo-facebook"></i>
                        </a>
                    </div>

                    <div class="form-group">
                        <a href="/login/twitter" class="btn btn-default btn-lg btn-block btn-icon icon-left twitter-button">
                            Login with Twitter
                            <i class="entypo-twitter"></i>
                        </a>
                    </div>
                    
                    <div class="form-group">
                    
                        <a href="/login/google" class="btn btn-default btn-lg btn-block btn-icon icon-left google-button">
                            Login with Google+
                            <i class="entypo-gplus"></i>
                        </a>
                        
                    </div>
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