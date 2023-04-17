@extends('admin.layouts.app')
@section('title', __('lang.reviews'))
@section('sitetitle', __('lang.reviews'))
@section('reviews', 'visible opened active ')
@section('content')

    <div class="notes-env">
        <div class="notes-header">
            <h2>@lang('lang.Edit')</h2>
                <div class="right">
            </div>
        </div>
    </div>
    <hr>
    <form role="form" method="POST" action="{{action('ReviewController@update', $review)}}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
  
        <div class="form-group text-center">
            <img style="width:400px" src="/images/reviews/{{ $review->image }}">
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">@lang('lang.Image')</label>
            <div class="col-sm-5">
                <input name="image" id="image" type="file" class="form-control">
            </div>
        </div>

        <div class="form-group {{ $errors->has('name') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">@lang('lang.name') </label>
            
            <div class="col-sm-5">
                <input name="name" id="name" type="text" class="form-control" value="{{ $review->name }}">
                <span id="name-error" class="validate-has-error">{{ $errors->first('name', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('description') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">@lang('lang.description') </label>
            
            <div class="col-sm-5">
                <input name="description" id="description" type="text" class="form-control" value="{{ $review->description }}" >
                <span id="name-error" class="validate-has-error">{{ $errors->first('description', ':message') }}</span>
            </div>
        </div>

        <div class="form-group ">
            <label for="field-6" class="col-sm-3 control-label">@lang('lang.stars') </label>
            
            <div class="col-sm-5">
                <input name="stars" id="stars" type="text" class="form-control" value="{{ $review->stars }}" >
            </div>
        </div>

        <div class="form-group ">
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-green btn-icon icon-left">
                    @lang('lang.Update')
                    <i class="entypo-check"></i>
                </button>
                <a href="/admin/reviews" class="btn btn-lg btn-red btn-icon">
                    @lang('lang.Cancel')
                    <i class="entypo-cancel"></i>
                </a>
            </div>
        </div>
    </form>
@stop