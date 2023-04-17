@extends('admin.layouts.app')
@section('title', __('lang.settings'))
@section('sitetitle', __('lang.settings'))
@section('settings', 'visible opened active ')
@section('content')

<div class="profile-env">
			
    <header class="row">
        <form role="form" autocomplete="off" method="POST"action="{{url('/admin/settings/update')}}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
            {{ csrf_field() }}


            <div class="form-group ">
                <label for="metaTitle" class="col-sm-2 control-label"></label>
                <div class="col-sm-8">
                    <img style="width: 100px" src="/images/{{ $settings->logo }}" alt="...">
                    
                </div>
            </div>

            <div class="form-group {{ $errors->has('logo') ? ' has-error validate-has-error' : '' }} ">
                <label class="col-sm-2 control-label">Logo</label>
                <div class="col-sm-8">
                    <input name="logo" id="logo" type="file" class="form-control">
                    <span id="name-error" class="validate-has-error">{{ $errors->first('logo', ':message') }}</span>
                </div>
            </div>

            <div class="form-group {{ $errors->has('metaTitle') ? ' has-error validate-has-error' : '' }} ">
                    <label for="metaTitle" class="col-sm-2 control-label">Meta Title</label>
                    <div class="col-sm-8">
                        <input name="metaTitle" id="metaTitle" type="text" class="form-control" value="{{ $settings->metaTitle }}">
                        <span id="name-error" class="validate-has-error">{{ $errors->first('metaTitle', ':message') }}</span>
                    </div>
                </div>
        
                <div class="form-group {{ $errors->has('metaKeywords') ? ' has-error validate-has-error' : '' }} ">
                    <label for="metaKeywords" class="col-sm-2 control-label">Meta Keywords</label>
                    <div class="col-sm-8">
                        <input name="metaKeywords" id="metaKeywords" type="text" class="form-control" value="{{ $settings->metaKeywords }}" >
                        <span id="name-error" class="validate-has-error">{{ $errors->first('metaKeywords', ':message') }}</span>
                    </div>
                </div>
        
                <div class="form-group {{ $errors->has('metaDescription') ? ' has-error validate-has-error' : '' }} ">
                    <label for="metaDescription" class="col-sm-2 control-label">Meta Description</label>
                    <div class="col-sm-8">
                        <input name="metaDescription" id="metaDescription" type="text" class="form-control" value="{{ $settings->metaDescription }}">
                        <span id="name-error" class="validate-has-error">{{ $errors->first('metaDescription', ':message') }}</span>
                    </div>
                </div>
        
                <div class="form-group {{ $errors->has('mailTo') ? ' has-error validate-has-error' : '' }} ">
                    <label for="mailTo" class="col-sm-2 control-label">Mail To</label>
                    <div class="col-sm-8">
                        <input name="mailTo" id="mailTo" type="text" class="form-control" value="{{ $settings->mailTo }}">
                        <span id="name-error" class="validate-has-error">{{ $errors->first('mailTo', ':message') }}</span>
                    </div>
                </div>
        
                <div class="form-group {{ $errors->has('mailBcc') ? ' has-error validate-has-error' : '' }} ">
                    <label for="mailBcc" class="col-sm-2 control-label">Mail Bcc</label>
                    <div class="col-sm-8">
                        <input name="mailBcc" id="mailBcc" type="text" class="form-control" value="{{ $settings->mailBcc }}">
                        <span id="name-error" class="validate-has-error">{{ $errors->first('mailBcc', ':message') }}</span>
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