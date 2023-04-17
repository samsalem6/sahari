@extends('admin.layouts.app')
@section('title', __('lang.generals'))
@section('sitetitle', __('lang.generals'))
@section('generals', 'visible opened active ')
@section('content')

    <div class="notes-env">
        <div class="notes-header">
            <h2>@lang('lang.AddItem')</h2>

            <div class="right">

            </div>
        </div>
    </div>
    <hr>

    <form role="form" method="POST" action="{{url('/admin/generals')}}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
        {{ csrf_field() }}

        <div class="form-group {{ $errors->has('title') ? ' has-error validate-has-error' : '' }} ">
            <label for="title" class="col-sm-2 control-label">@lang('lang.title') </label>

            <div class="col-sm-8">
                <input name="title" id="title" type="text" class="form-control">
                <span id="name-error" class="validate-has-error">{{ $errors->first('title', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('body') ? ' has-error validate-has-error' : '' }} ">
            <label for="body" class="col-sm-2 control-label">@lang('lang.body') </label>
            <div class="col-sm-8">
                <textarea  name="body" id="body" type="text" class="form-control " ></textarea>
                <span id="name-error" class="validate-has-error">{{ $errors->first('body', ':message') }}</span>
            </div>
        </div>

        <div class="form-group ">
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-green btn-icon icon-left">
                    @lang('lang.Add')
                    <i class="entypo-check"></i>
                </button>
                <a href="/admin/generals" class="btn btn-lg btn-red btn-icon">
                    @lang('lang.Cancel')
                    <i class="entypo-cancel"></i>
                </a>
            </div>
        </div>
    </form>
    @endsection

    @section('js')

    <!-- include summernote css/js -->
    <link rel="stylesheet" href="{{ asset('admin/js/dist/summernote.css')}}">
    <script src="{{ asset('admin/js/dist/summernote.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#body').summernote();
          });
    </script>
    @stop
