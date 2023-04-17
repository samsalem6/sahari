@extends('admin.layouts.app')
@section('title', __('lang.blogs'))
@section('sitetitle', __('lang.blogs'))
@section('blogs', 'visible opened active ')
@section('content')

    <div class="notes-env">
        <div class="notes-header">
            <h2>Edit Blog</h2>
                <div class="right">
            </div>
        </div>
    </div>
    <hr>
    <form role="form" method="POST" action="{{action('BlogController@update', $blog)}}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">

        <div class="form-group {{ $errors->has('order') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">Order</label>
            <div class="col-sm-5">
                <input name="order" id="order" type="text" class="form-control" value="{{ $blog->order }}" >
                <span id="name-error" class="validate-has-error">{{ $errors->first('order', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('type') ? ' has-error validate-has-error' : '' }} ">
            <label for="type" class="col-sm-2 control-label">type</label>
            <div class="col-sm-8">
                <select required name="type" class="form-control">
                    <option {{ $blog->type === 'Blog-de-Viajes-a-Egipto' ? 'selected' : "" }} value="Blog-de-Viajes-a-Egipto">Blog de Viajes a Egipto</option>
                    <option {{ $blog->type === 'Blog-de-Viajes-a-Turquia' ? 'selected' : "" }} value="Blog-de-Viajes-a-Turquía">Blog de Viajes a Turquía</option>
                    <option {{ $blog->type === 'Blog-de-Viajes-Marruecos' ? 'selected' : "" }} value="Blog-de-Viajes-Marruecos">Blog de Viajes Marruecos</option>
                    <option {{ $blog->type === 'blog-de-viajes-jordania' ? 'selected' : "" }} value="blog-de-viajes-jordania">Blog de Viajes jordania</option>
                    <option {{ $blog->type === 'blog-de-viajes-a-dubai' ? 'selected' : "" }} value="blog-de-viajes-a-dubai">Blog de Viajes a Dubai</option>

                </select>
                <span id="name-error" class="validate-has-error">{{ $errors->first('type', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('metaTitle') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">Meta Title</label>
            <div class="col-sm-5">
                <input name="metaTitle" id="metaTitle" type="text" class="form-control" value="{{ $blog->metaTitle }}" >
                <span id="name-error" class="validate-has-error">{{ $errors->first('metaTitle', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('metaKeywords') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">Meta Keywords</label>
            <div class="col-sm-5">
                <input name="metaKeywords" id="metaKeywords" type="text" class="form-control" value="{{ $blog->metaKeywords }}" >
                <span id="name-error" class="validate-has-error">{{ $errors->first('metaKeywords', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('metaDescription') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">Meta Description</label>
            <div class="col-sm-5">
                <input name="metaDescription" id="metaDescription" type="text" class="form-control" value="{{ $blog->metaDescription }}" >
                <span id="name-error" class="validate-has-error">{{ $errors->first('metaDescription', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('slug') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">Slug</label>
            <div class="col-sm-5">
                <input name="slug" id="slug" type="text" class="form-control" value="{{ $blog->slug }}" >
                <span id="name-error" class="validate-has-error">{{ $errors->first('slug', ':message') }}</span>
            </div>
        </div>

        <div class="form-group text-center">
            <img style="width:400px" src="/images/blogs/{{ $blog->image }}">
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
                <input name="imageAlt" id="imageAlt" type="text" class="form-control" value="{{ $blog->imageAlt }}" >
                <span id="name-error" class="validate-has-error">{{ $errors->first('imageAlt', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('imageTitle') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">Image Title</label>
            <div class="col-sm-5">
                <input name="imageTitle" id="imageTitle" type="text" class="form-control" value="{{ $blog->imageTitle }}" >
                <span id="name-error" class="validate-has-error">{{ $errors->first('imageTitle', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('title') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">@lang('lang.title') </label>

            <div class="col-sm-5">
                <input name="title" id="title" type="text" class="form-control" value="{{ $blog->title }}">
                <span id="name-error" class="validate-has-error">{{ $errors->first('title', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('Description') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">@lang('lang.description') </label>

            <div class="col-sm-5">
                <input name="Description" id="Description" type="text" class="form-control" value="{{ $blog->Description }}" >
                <span id="name-error" class="validate-has-error">{{ $errors->first('Description', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('shortDescription') ? ' has-error validate-has-error' : '' }} ">
            <label for="field-6" class="col-sm-3 control-label">Short Description </label>

            <div class="col-sm-5">
                <input name="shortDescription" id="shortDescription" type="text" class="form-control" value="{{ $blog->shortDescription }}" >
                <span id="name-error" class="validate-has-error">{{ $errors->first('shortDescription', ':message') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('viewInSite') ? ' has-error validate-has-error' : '' }} ">
            <label for="viewInSite" class="col-sm-3 control-label">view In Site</label>
            <div class="col-sm-5">
                    <div class="radio">
                        <label class="col-sm-2 control-label">
                            <input type="radio" name="viewInSite" id="0" value="0" {{$blog->viewInSite == 0? 'checked=""':""}}> Off
                        </label>
                        <label class="col-sm-2 control-label">
                            <input type="radio" name="viewInSite" id="1" value="1" {{$blog->viewInSite == 1? 'checked=""':""}}> On
                        </label>
                    </div>
                <span id="name-error" class="validate-has-error">{{ $errors->first('viewInSite', ':message') }}</span>
            </div>
        </div>

        <div class="form-group ">
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-green btn-icon icon-left">
                    @lang('lang.Update')
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
