{{--  @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
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

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
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
<html  lang="{{ app()->getLocale() }}">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        @if ( app()->getLocale()  == 'ar' )
        <link rel="stylesheet" href="/admin/css/neon-rtl.css">
        @endif

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Sense Aroma Admin Panel" />
        <meta name="author" content="" />

        <link rel="icon" href="{{ asset('admin/images/favicon.ico') }}">
        
        <title>{{ config('app.name', 'Sense Aroma') }} | {{ __('Login') }}</title>

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
                    <img src="{{ asset('/images/'.meta()->logo)}}" alt="">
                </svg>
            </div>
            
        </div>

        <div class="login-form">
            
            <div class="login-content">
                
                <form method="POST" action="{{ route('login') }}" role="form" >
                    @csrf
                    
                    <div class="form-group">
                        <div class="input-group ">
                            <div class="input-group-addon">
                                <i class="entypo-mail"></i>
                            </div>
                            
                            <input type="text" class="form-control" name="email" placeholder="@lang('lang.email')" value="{{ old('email') }}" required autocomplete="email" autofocus />
                        </div>
                        @error('email')
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

                    
                    <div class="form-group" >
                        <button type="submit" class="btn btn-primary btn-block btn-login">
                            <i class="entypo-login"></i>
                            @lang('lang.LoginIn')
                        </button>
                    </div>
                    
                </form>

                <div class="login-bottom-links" >
                    <hr style="border-top: 1px solid #454a54;" />

                    <a href="/">Copyright 2020 - All Rights Reserved.</a>
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