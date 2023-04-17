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
            <h2>@lang('lang.AddSocial')</h2>
            
            <div class="right">
               
            </div>
        </div>
    </div>
    <hr>
  
    <form role="form" method="POST" action="{{url('/admin/socials')}}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
        {{ csrf_field() }}
        
        <div class="form-group">
            <label class="col-sm-3 control-label">@lang('lang.name')</label>
            
            <div class="col-sm-5">
                
                <select id="name" name="name" class="selectboxit visible" style="display: none;">

                    <option value="facebook">Facebook</option>
                    <option value="twitter">Twitter</option>
                    <option value="gplus">Google</option>
                    <option value="instagram">Instagram</option>
                    <option value="dropbox">Dropbox</option>
                    <option value="flickr">Flickr</option>
                    <option value="youtube">Youtube</option>
                    <option value="github">Github</option>
                    <option value="linkedin">Linkedin</option>
                    <option value="soundcloud">Sound Cloud</option>
                
                </select>                
            </div>
        </div>


        <div class="form-group {{ $errors->has('link') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">@lang('lang.Link') </label>
            
            <div class="col-sm-5">
                <input name="link" id="link" type="text" class="form-control" id="field-6" >
                <span id="name-error" class="validate-has-error">{{ $errors->first('link', ':message') }}</span>
            </div>
        </div>

        <div class="form-group ">
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-green btn-icon icon-left">
                    @lang('lang.Add')
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