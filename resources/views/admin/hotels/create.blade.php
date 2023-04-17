@extends('admin.layouts.app')
@section('title', __('Add Hotels'))
@section('content')

<div class="notes-env">
    <div class="notes-header">
        <h2>@lang('Add New Hotels')</h2>
        <div class="right">
        </div>
    </div>
</div>
<hr>

<div class="container">
    <form  role="form" method="POST" action="{{url('/hotels')}}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
        {{ csrf_field() }}

        <div class="form-group {{ $errors->has('name') ? ' has-error validate-has-error' : '' }} ">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-8">
                <input name="name" id="name" type="text" class="form-control" value="{{ old('name') }}">
                <span id="name-error" class="validate-has-error">{{ $errors->first('name', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('stars') ? ' has-error validate-has-error' : '' }} ">
            <label for="stars" class="col-sm-2 control-label">Stars</label>
            <div class="col-sm-8">
                <input name="stars" id="stars" type="text" class="form-control" value="{{ old('stars') }}">
                <span id="name-error" class="validate-has-error">{{ $errors->first('stars', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('image') ? ' has-error validate-has-error' : '' }} ">
            <label class="col-sm-2 control-label">Image</label>
            <div class="col-sm-8">
                <input name="image" id="image" type="file" class="form-control">
                <span id="name-error" class="validate-has-error">@lang('Image') : 1400*470 pixels</span><br>
                <span id="name-error" class="validate-has-error">{{ $errors->first('image', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('link') ? ' has-error validate-has-error' : '' }} ">
            <label for="link" class="col-sm-2 control-label">Link</label>
            <div class="col-sm-8">
                <input name="link" id="link" type="text" class="form-control" value="{{ old('link') }}">
                <span id="name-error" class="validate-has-error">{{ $errors->first('link', ':message') }}</span>
            </div>
        </div>

        <div class="form-group ">
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-green btn-icon icon-left">
                    @lang('lang.Add')
                    <i class="entypo-check"></i>
                </button>
                <a href="/hotels" class="btn btn-lg btn-red btn-icon">
                    @lang('lang.Cancel')
                    <i class="entypo-cancel"></i>
                </a>
            </div>
        </div>
    </form>
</div>
@endsection