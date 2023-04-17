@extends('admin.layouts.app')
@section('title', __('lang.sliders'))
@section('sitetitle', __('lang.sliders'))
@section('sliders', 'visible opened active ')
@section('content')

    <div class="notes-env">
        <div class="notes-header">
            <h2>@lang('lang.AddSlider')</h2>
            
            <div class="right">
               
            </div>
        </div>
    </div>
    <hr>
  
    <form role="form" method="POST" action="{{ '/admin/sliders'}}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
        {{ csrf_field() }}


        <div class="form-group {{ $errors->has('order') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">Order</label>
            <div class="col-sm-5">
                <input name="order" id="order" type="text" class="form-control" value="{{ old('order') }}" >
                <span id="name-error" class="validate-has-error">{{ $errors->first('order', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('type') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">Type</label>
            <div class="col-sm-5">
                <select id="type" name="type" class="form-control">
                    <option value="image">Image</option>
                    <option value="video">Video</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">@lang('lang.Image')</label>
            
            <div class="col-sm-5">
                <input name="image" id="image" type="file" class="form-control">
            </div>
        </div>

        <div class="form-group {{ $errors->has('video') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">video Link</label>
            <div class="col-sm-5">
                <input name="video" id="video" type="text" class="form-control" value="{{ old('video') }}" >
                <span id="name-error" class="validate-has-error">{{ $errors->first('video', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('title') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">@lang('lang.title') </label>
            <div class="col-sm-5">
                <input name="title" id="title" type="text" class="form-control" value="{{ old('title') }}" >
                <span id="name-error" class="validate-has-error">{{ $errors->first('title', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('description') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">@lang('lang.description') </label>
            
            <div class="col-sm-5">
                <input name="description" id="description" type="text" class="form-control" value="{{ old('description') }}">
                <span id="name-error" class="validate-has-error">{{ $errors->first('description', ':message') }}</span>
            </div>
        </div>

        <div class="form-group ">
            <label for="field-6" class="col-sm-3 control-label">@lang('lang.Link') </label>
            
            <div class="col-sm-5">
                <input name="link" id="link" type="text" class="form-control" value="{{ old('link') }}" >
            </div>
        </div>

        <div class="form-group ">
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-green btn-icon icon-left">
                    @lang('lang.Add')
                    <i class="entypo-check"></i>
                </button>
                <a href="/admin/sliders" class="btn btn-lg btn-red btn-icon">
                    @lang('lang.Cancel')
                    <i class="entypo-cancel"></i>
                </a>
            </div>
        </div>
    </form>
@stop