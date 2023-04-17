@extends('admin.layouts.app')
@section('title', __('lang.profile'))
@section('sitetitle', __('lang.profile'))
@section('profile', 'visible opened active')
@section('content')

<div class="profile-env">
			
    <header class="row">
        <form role="form" autocomplete="off" method="POST"action="{{url('/profile/update')}}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
            {{ csrf_field() }}

            <div class="form-group">
                <label class="col-sm-3 control-label">@lang('lang.Image')</label>
                <div class="col-sm-5">
                    <div class="fileinput fileinput-new" data-provides="fileinput"><input type="hidden">
                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                            @if( (Auth::user()->avatar))
                            <img src="/images/avatar/{{ $user->avatar }}" alt="...">
                            @else
                            <img src="/images/avatar/default.jpg" alt="...">
							@endif
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                        <div>
                            <span class="btn btn-white btn-file">
                                <span class="fileinput-new">@lang('lang.Edit')</span>
                                <span class="fileinput-exists">@lang('lang.Edit')</span>
                                <input type="file" name="avatar" accept="image/*">
                            </span>
                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">@lang('lang.Delete')</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group {{ $errors->has('name') ? ' has-error validate-has-error' : '' }} ">
                <label for="field-6" class="col-sm-3 control-label">@lang('lang.name') </label>
                
                <div class="col-sm-5">
                    <input name="name" id="name" type="text" class="form-control" value="{{ $user->name }}">
                    <span id="name-error" class="validate-has-error">{{ $errors->first('name', ':message') }}</span>
                </div>
            </div>

            <div class="form-group {{ $errors->has('email') ? ' has-error validate-has-error' : '' }} ">
                <label for="field-6" class="col-sm-3 control-label">@lang('lang.email') </label>
                
                <div class="col-sm-5">
                    <input name="email" id="email" type="text" class="form-control" value="{{ $user->email }}">
                    <span id="name-error" class="validate-has-error">{{ $errors->first('email', ':message') }}</span>
                </div>
            </div>

            <div class="form-group {{ $errors->has('mobile') ? ' has-error validate-has-error' : '' }} ">
                <label for="field-6" class="col-sm-3 control-label">@lang('lang.mobile') </label>
                
                <div class="col-sm-5">
                    <input name="mobile" id="mobile" type="text" class="form-control" value="{{ $user->mobile }}">
                    <span id="name-error" class="validate-has-error">{{ $errors->first('mobile', ':message') }}</span>
                </div>
            </div>

            <div class="form-group {{ $errors->has('password') ? ' has-error validate-has-error' : '' }} ">
                <label for="field-6" class="col-sm-3 control-label">@lang('lang.password') </label>
                
                <div class="col-sm-5">
                    <input name="password" id="password" type="password" class="form-control" autocomplete="off">
                    <span id="name-error" class="validate-has-error">{{ $errors->first('password', ':message') }}</span>
                </div>
            </div>


            <div class="form-group ">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-5">
                <div class="text-center">
                    <button type="submit" class="btn btn-block btn-lg btn-green btn-icon icon-left">
                        @lang('lang.Save')
                        <i class="entypo-check"></i>
                    </button>
                </div>
                </div>
            </div>
        </form>
        
    </header>
    
</div>

@endsection
@section('js')
<script src="{{ asset('admin/js/fileinput.js')}}"></script>

@stop