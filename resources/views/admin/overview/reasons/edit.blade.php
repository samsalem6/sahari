@extends('admin.layouts.app')
@section('title', __('Update Reasons'))
@section('sitetitle', __('Update Reasons'))
@section('reasons', 'visible opened active')
@section('content')

<div class="notes-env">
    <div class="notes-header">
        <h2>@lang('Update Reasons')</h2>
        
        <div class="right">
           
        </div>
    </div>
</div>
<hr>

<form role="form" method="POST" action="{{action('ReasonsController@update', $reason)}}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
    {{ csrf_field() }}
    @method('PUT')
    
    <div class="form-group {{ $errors->has('title') ? ' has-error validate-has-error' : '' }} ">
        <label for="title" class="col-sm-2 control-label">@lang('lang.title') </label>
        
        <div class="col-sm-8">
            <input name="title" id="title" type="text" class="form-control" value="{{ $reason->title }}">
            <span id="name-error" class="validate-has-error">{{ $errors->first('title', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('image') ? ' has-error validate-has-error' : '' }} ">
        <label class="col-sm-2 control-label">Image</label>
        <div class="col-sm-8">
            <input name="image" id="image" type="file" class="form-control">
            <span id="name-error" class="validate-has-error">@lang('lang.image') : 1400*470 pixels</span><br>
            <span id="name-error" class="validate-has-error">{{ $errors->first('image', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('body') ? ' has-error validate-has-error' : '' }} ">
        <label for="body" class="col-sm-2 control-label">@lang('lang.body') </label>
        <div class="col-sm-8">
            <textarea  name="body" id="body" type="text" class="form-control">{{ $reason->body }}</textarea>
            <span id="name-error" class="validate-has-error">{{ $errors->first('body', ':message') }}</span>
        </div>
    </div>

    <div class="form-group ">
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-green btn-icon icon-left">
                @lang('Update')
                <i class="entypo-check"></i>
            </button>
            <a href="/reasons" class="btn btn-lg btn-red btn-icon">
                @lang('lang.Cancel')
                <i class="entypo-cancel"></i>
            </a>
        </div>
    </div>
</form>

@endsection