@extends('admin.layouts.app')
@section('title', __('lang.blogs'))
@section('sitetitle', __('lang.blogs'))
@section('blogs', 'visible opened active ')
@section('content')
    <div class="notes-env">
        <div class="notes-header">
            <h2>@lang('lang.blogs')</h2>

            <div class="right">
                <a href="/admin/blog/create" class="btn btn-lg btn-green btn-icon icon-left" id="add-note">
                    <i class="entypo-pencil"></i>
                    Add Blog
                </a>
            </div>
        </div>
    </div>
    <hr>

    <div class="gallery-env">
        <div class="row">

            @if(count($blogs) > 0)
            @foreach($blogs as $blog)
                <div class="col-sm-4">
                    <article class="album">
                        <header>
                            <img src="/images/blogs/{{ $blog->image }}">
                        </header>

                        <section class="album-info">
                            <h3>@lang('lang.title')</h3>
                            <p>{{ $blog->title }}</p>
                        </section>

                        <footer>
                            <div class="album-images-count">
                                <div class="col-sm-4">
                                    <form action="{{action('BlogController@destroy', $blog['id'])}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button  type="submit" class="btn btn-red btn-icon icon-left">
                                            @lang('lang.Delete')
                                            <i class="entypo-trash"></i>
                                        </button >
                                    </form>
                                </div>
                                <div class="col-sm-4">
                                    <a style="color:white" type="button" href="blog/{{ $blog->id}}/edit" class="btn btn-blue btn-icon icon-left">
                                        @lang('lang.Edit')
                                        <i class="entypo-plus"></i>
                                    </a>
                                </div>
                                <div class="col-sm-4">
                                    <a style="color:white" type="button" href="/admin/blogItems/{{ $blog->id}}" class="btn btn-orange btn-icon icon-left">
                                        items
                                        <i class="entypo-plus-circled"></i>
                                    </a>
                                </div>

                                <div class="col-sm-2">
                                </div>
                                <div class="col-sm-6">
                                    <br>
                                    <a style="color:white" type="button" href="/admin/relatedPackage/{{ $blog->id}}" class="btn btn-green btn-icon icon-left">
                                        Related Packages
                                        <i class="entypo-plus-circled"></i>
                                    </a>
                                </div>
                            </div>
                        </footer>

                    </article>
                </div>
            @endforeach
                <div class="col-sm-12 text-center">
                    {{ $blogs }}
                </div>

            @else
                <div class="error-text text-center">
                    <h2>@lang('lang.nodata')</h2>
                </div>
            @endif
        </div>
    </div>

@stop
