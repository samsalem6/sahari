@extends('admin.layouts.app')
@section('title', __('lang.socials'))
@section('sitetitle', __('lang.socials'))
@section('socials', 'visible opened active')
@section('content')

@section('css')
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('admin/js/selectboxit/jquery.selectBoxIt.css')}}">
@endsection

    <div class="notes-env">
        <div class="notes-header">
            <h2>@lang('lang.EditSocial')</h2>
                <div class="right">
            </div>
        </div>
    </div>
    <hr>
    <form role="form" method="POST" action="{{action('SocialController@update', $social)}}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">

        <div class="form-group">
                <label class="col-sm-3 control-label">@lang('lang.name')</label>
                
                <div class="col-sm-5">
                    
                    <select id="name" name="name" class="selectboxit visible" style="display: none;">
    
                        <option {{ $social->name === "facebook" ? "selected" : "" }} value="facebook">Facebook</option>
                        <option {{ $social->name === "twitter" ? "selected" : "" }} value="twitter">Twitter</option>
                        <option {{ $social->name === "gplus" ? "selected" : "" }} value="gplus">Google</option>
                        <option {{ $social->name === "instagram" ? "selected" : "" }} value="instagram">Instagram</option>
                        <option {{ $social->name === "dropbox" ? "selected" : "" }} value="dropbox">Dropbox</option>
                        <option {{ $social->name === "flickr" ? "selected" : "" }} value="flickr">Flickr</option>
                        <option {{ $social->name === "youtube" ? "selected" : "" }} value="youtube">Youtube</option>
                        <option {{ $social->name === "github" ? "selected" : "" }} value="github">Github</option>
                        <option {{ $social->name === "linkedin" ? "selected" : "" }} value="linkedin">Linkedin</option>
                        <option {{ $social->name === "soundcloud" ? "selected" : "" }} value="soundcloud">Sound Cloud</option>
                    
                    </select>                
                </div>
            </div>
  
        <div class="form-group {{ $errors->has('link') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">@lang('lang.Link') </label>
            
            <div class="col-sm-5">
                <input name="link" id="link" type="text" class="form-control" value="{{ $social->link }}">
                <span id="name-error" class="validate-has-error">{{ $errors->first('link', ':message') }}</span>
            </div>
        </div>

        <div class="form-group ">
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-green btn-icon icon-left">
                    @lang('lang.Update')
                    <i class="entypo-check"></i>
                </button>
                <a href="/admin/socials" class="btn btn-lg btn-red btn-icon">
                    @lang('lang.Cancel')
                    <i class="entypo-cancel"></i>
                </a>
            </div>
        </div>
    </form>

@endsection

@section('js')
<script src="{{ asset('admin/js/selectboxit/jquery.selectBoxIt.min.js')}}"></script>    
@stop