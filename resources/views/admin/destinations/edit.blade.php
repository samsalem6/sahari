@extends('admin.layouts.app')
@section('title', 'Destinations')
@section('sitetitle', 'Destinations')
@section('destinations', 'visible opened active ')
@section('content')

    <div class="notes-env">
        <div class="notes-header">
            <h2>@lang('lang.Edit')</h2>
                <div class="right">
            </div>
        </div>
    </div>
    <hr>
    <form role="form" method="POST" action="{{action('DestinationController@update', $destination)}}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">

        <div class="form-group {{ $errors->has('type') ? ' has-error validate-has-error' : '' }} ">
            <label for="metaTitle" class="col-sm-2 control-label">Type</label>
            <div class="col-sm-8">
                <div class="radio">
                    <label>
                        <input type="radio" name="type" id="image" value="image"
                         {{ $destination->type === 'image' ? "checked" : "" }}
                         >Image
                    </label>
                    <label>
                        <input type="radio" name="type" id="video" value="video"
                        {{ $destination->type === 'video' ? "checked" : "" }}
                        >Video
                    </label>

                </div>
                <span id="name-error" class="validate-has-error">{{ $errors->first('type', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('metaTitle') ? ' has-error validate-has-error' : '' }} ">
            <label for="metaTitle" class="col-sm-2 control-label">Meta Title </label>
            <div class="col-sm-8">
                <input name="metaTitle" id="metaTitle" value="{{$destination->metaTitle}}" type="text" class="form-control">
                <span id="name-error" class="validate-has-error">{{ $errors->first('metaTitle', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('metaKeywords') ? ' has-error validate-has-error' : '' }} ">
            <label for="metaKeywords" class="col-sm-2 control-label">Meta Keywords</label>
            <div class="col-sm-8">
                <input name="metaKeywords" id="metaKeywords" value="{{$destination->metaKeywords}}" type="text" class="form-control">
                <span id="name-error" class="validate-has-error">{{ $errors->first('metaKeywords', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('metaDescription') ? ' has-error validate-has-error' : '' }} ">
            <label for="metaDescription" class="col-sm-2 control-label">Meta Description</label>
            <div class="col-sm-8">
                <input name="metaDescription" id="metaDescription" value="{{$destination->metaDescription}}" type="text" class="form-control">
                <span id="name-error" class="validate-has-error">{{ $errors->first('metaDescription', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('name') ? ' has-error validate-has-error' : '' }} ">
            <label for="name" class="col-sm-2 control-label">@lang('lang.name') </label>
            <div class="col-sm-8">
                <input name="name" id="name" type="text" class="form-control" value="{{ $destination->name }}">
                <span id="name-error" class="validate-has-error">{{ $errors->first('name', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('slug') ? ' has-error validate-has-error' : '' }} ">
            <label for="slug" class="col-sm-2 control-label">Slug</label>
            <div class="col-sm-8">
                <input name="slug" id="slug" type="text" class="form-control" value="{{ $destination->slug }}">
                <span id="name-error" class="validate-has-error">{{ $errors->first('slug', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('video') ? ' has-error validate-has-error' : '' }} ">
            <label for="video" class="col-sm-2 control-label">Video link</label>
            <div class="col-sm-8">
            <input name="video" id="video" value="{{ $destination->video }}" type="text" class="form-control">
                <span id="name-error" class="validate-has-error">{{ $errors->first('video', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('description') ? ' has-error validate-has-error' : '' }} ">
            <label for="description" class="col-sm-2 control-label">description</label>
            <div class="col-sm-8">
            <input name="description" id="description" value="{{ $destination->description }}" type="text" class="form-control">
                <span id="name-error" class="validate-has-error">{{ $errors->first('description', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('image') ? ' has-error validate-has-error' : '' }} ">
            <label class="col-sm-2 control-label">Image</label>
            <div class="col-sm-8">
                <img src="{{ asset('/images/packages/'.$destination->image)}}" width="150px">
                <input name="image" id="image" type="file" class="form-control">
                <span id="name-error" class="validate-has-error">@lang('lang.Image') : 1400*470 pixels</span><br>
                <span id="name-error" class="validate-has-error">{{ $errors->first('image', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('faq_image') ? ' has-error validate-has-error' : '' }} ">
            <label class="col-sm-2 control-label">FAQs Image</label>
            <div class="col-sm-8">
                <img src="{{ asset('/images/packages/'.$destination->faq_image)}}" width="150px">
                <input name="faq_image" id="faq_image" type="file" class="form-control">
                <span id="name-error" class="validate-has-error">@lang('lang.Image') : 1400*470 pixels</span><br>
                <span id="name-error" class="validate-has-error">{{ $errors->first('faq_image', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('faq_imageTitle') ? ' has-error validate-has-error' : '' }} ">
            <label for="faq_imageTitle" class="col-sm-2 control-label">Title for Main Image</label>
            <div class="col-sm-8">
                <input name="faq_imageTitle" id="faq_imageTitle" type="text" class="form-control" value="{{$destination->faq_imageTitle}}">
                <span id="name-error" class="validate-has-error">{{ $errors->first('faq_imageTitle', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('faq_imageAlt') ? ' has-error validate-has-error' : '' }} ">
            <label for="faq_imageAlt" class="col-sm-2 control-label">Alt for Faqs Image</label>
            <div class="col-sm-8">
                <input name="faq_imageAlt" id="faq_imageAlt" type="text" class="form-control" value="{{$destination->faq_imageAlt}}">
                <span id="name-error" class="validate-has-error">{{ $errors->first('faq_imageAlt', ':message') }}</span>
            </div>
        </div>

        <div class="form-group ">
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-green btn-icon icon-left">
                    @lang('lang.Update')
                    <i class="entypo-check"></i>
                </button>
                <a href="/admin/destinations" class="btn btn-lg btn-red btn-icon">
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
            $('#description').summernote();
          });
    </script>
    @stop
