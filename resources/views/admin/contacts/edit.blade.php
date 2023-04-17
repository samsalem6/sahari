@extends('admin.layouts.app')
@section('title', __('lang.contacts'))
@section('sitetitle', __('lang.contacts'))
@section('contacts', 'visible opened active')
@section('content')

    <div class="notes-env">
        <div class="notes-header">
            <h2>@lang('lang.EditContact')</h2>
                <div class="right">
            </div>
        </div>
    </div>
    <hr>
    <form role="form" method="POST" action="{{action('ContactController@update', $contact)}}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
  
        <div class="form-group {{ $errors->has('phone') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">@lang('lang.phone') </label>
            
            <div class="col-sm-5">
                <input name="phone" id="phone" type="text" class="form-control" value="{{ $contact->phone }}">
                <span id="name-error" class="validate-has-error">{{ $errors->first('phone', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('fax') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">@lang('lang.fax') </label>
            
            <div class="col-sm-5">
                <input name="fax" id="fax" type="text" class="form-control" value="{{ $contact->fax }}" >
                <span id="name-error" class="validate-has-error">{{ $errors->first('fax', ':message') }}</span>
            </div>
        </div>
  
        <div class="form-group {{ $errors->has('email') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">@lang('lang.email') </label>
            
            <div class="col-sm-5">
                <input name="email" id="email" type="text" class="form-control" value="{{ $contact->email }}">
                <span id="name-error" class="validate-has-error">{{ $errors->first('email', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('location') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">@lang('Address') </label>
            
            <div class="col-sm-5">
                <input name="location" id="location" type="text" class="form-control" value="{{ $contact->location }}">
                <span id="name-error" class="validate-has-error">{{ $errors->first('location', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('map') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">@lang('Map Address') </label>
            
            <div class="col-sm-5">
                <input name="map" id="map" type="text" class="form-control" value="{{ $contact->map }}">
                <span id="name-error" class="validate-has-error">{{ $errors->first('map', ':message') }}</span>
            </div>
        </div>

        <div class="form-group ">
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-green btn-icon icon-left">
                    @lang('lang.Update')
                    <i class="entypo-check"></i>
                </button>
                <a href="/admin/contacts" class="btn btn-lg btn-red btn-icon">
                    @lang('lang.Cancel')
                    <i class="entypo-cancel"></i>
                </a>
            </div>
        </div>
    </form>
@stop