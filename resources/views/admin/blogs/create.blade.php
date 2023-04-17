@extends('admin.layouts.app')
@section('title', __('lang.blogs'))
@section('sitetitle', __('lang.blogs'))
@section('blogs', 'visible opened active ')
@section('content')

    <div class="notes-env">
        <div class="notes-header">
            <h2>Add Blog</h2>

            <div class="right">

            </div>
        </div>
    </div>
    <hr>

    <form role="form" method="POST" action="{{ '/admin/blog'}}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
        {{ csrf_field() }}

        <div class="form-group {{ $errors->has('order') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">Order</label>
            <div class="col-sm-5">
                <input name="order" id="order" type="text" class="form-control" value="{{ old('order') }}" >
                <span id="name-error" class="validate-has-error">{{ $errors->first('order', ':message') }}</span>
            </div>
        </div>

        
        <div class="form-group {{ $errors->has('type') ? ' has-error validate-has-error' : '' }} ">
            <label for="type" class="col-sm-2 control-label">Type</label>
            <div class="col-sm-8">
                <select required name="type" class="form-control">
                    <option value="Blog-de-Viajes-a-Egipto">Blog de Viajes a Egipto</option>
                    <option value="Blog-de-Viajes-a-Turquia">Blog de Viajes a Turquía</option>
                    <option value="Blog-de-Viajes-Marruecos">Blog de Viajes Marruecos</option>
                    <option value="blog-de-viajes-jordania">Blog de Viajes jordania</option>
                    <option value="blog-de-viajes-a-dubai">Blog de Viajes a Dubai</option>
                </select>
                <span id="name-error" class="validate-has-error">{{ $errors->first('type', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('metaTitle') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">Meta Title</label>
            <div class="col-sm-5">
                <input name="metaTitle" id="metaTitle" type="text" class="form-control" value="{{ old('metaTitle') }}" >
                <span id="name-error" class="validate-has-error">{{ $errors->first('metaTitle', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('metaKeywords') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">Meta Keywords</label>
            <div class="col-sm-5">
                <input name="metaKeywords" id="metaKeywords" type="text" class="form-control" value="{{ old('metaKeywords') }}" >
                <span id="name-error" class="validate-has-error">{{ $errors->first('metaKeywords', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('metaDescription') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">Meta Description</label>
            <div class="col-sm-5">
                <input name="metaDescription" id="metaDescription" type="text" class="form-control" value="{{ old('metaDescription') }}" >
                <span id="name-error" class="validate-has-error">{{ $errors->first('metaDescription', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('slug') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">Slug</label>
            <div class="col-sm-5">
                <input name="slug" id="slug" type="text" class="form-control" value="{{ old('slug') }}" >
                <span id="name-error" class="validate-has-error">{{ $errors->first('slug', ':message') }}</span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">@lang('lang.Image')</label>
            <div class="col-sm-5">
                <input name="image" id="image" type="file" class="form-control">
            </div>
        </div>

        <div class="form-group {{ $errors->has('imageAlt') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">image Alt</label>
            <div class="col-sm-5">
                <input name="imageAlt" id="imageAlt" type="text" class="form-control" value="{{ old('imageAlt') }}" >
                <span id="name-error" class="validate-has-error">{{ $errors->first('imageAlt', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('imageTitle') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">Image Title</label>
            <div class="col-sm-5">
                <input name="imageTitle" id="imageTitle" type="text" class="form-control" value="{{ old('imageTitle') }}" >
                <span id="name-error" class="validate-has-error">{{ $errors->first('imageTitle', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('title') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">@lang('lang.title') </label>
            <div class="col-sm-5">
                <input name="title" id="title" type="text" class="form-control" value="{{ old('title') }}" >
                <span id="name-error" class="validate-has-error">{{ $errors->first('title', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('Description') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">@lang('lang.description') </label>

            <div class="col-sm-5">
                <input name="Description" id="Description" type="text" class="form-control" value="{{ old('Description') }}">
                <span id="name-error" class="validate-has-error">{{ $errors->first('Description', ':message') }}</span>
            </div>
        </div>

        <div class="form-group ">
            <label for="field-6" class="col-sm-3 control-label">Short Description</label>
            <div class="col-sm-5">
                <input name="shortDescription" id="shortDescription" type="text" class="form-control" value="{{ old('shortDescription') }}" >
            </div>
        </div>

        <div class="form-group {{ $errors->has('viewInSite') ? ' has-error validate-has-error' : '' }} ">
            <label for="viewInSite" class="col-sm-3 control-label">view In Site</label>
            <div class="col-sm-5">
                    <div class="radio">
                        <label class="col-sm-2 control-label">
                            <input type="radio" name="viewInSite" id="0" value="0" > Off
                        </label>
                        <label class="col-sm-2 control-label">
                            <input type="radio" name="viewInSite" id="1" value="1" checked=""> On
                        </label>
                    </div>
                <span id="name-error" class="validate-has-error">{{ $errors->first('viewInSite', ':message') }}</span>
            </div>
        </div>

        <div class="form-group ">
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-green btn-icon icon-left">
                    @lang('lang.Add')
                    <i class="entypo-check"></i>
                </button>
                <a href="/admin/blogs" class="btn btn-lg btn-red btn-icon">
                    @lang('lang.Cancel')
                    <i class="entypo-cancel"></i>
                </a>
            </div>
        </div>
    </form>
@stop
