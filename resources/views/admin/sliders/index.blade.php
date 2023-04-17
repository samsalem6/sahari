@extends('admin.layouts.app')
@section('title', __('lang.sliders'))
@section('sitetitle', __('lang.sliders'))
@section('sliders', 'visible opened active ')
@section('content')
    <div class="notes-env">
        <div class="notes-header">
            <h2>@lang('lang.sliders')</h2>
            
            <div class="right">
                <a href="/admin/sliders/create" class="btn btn-lg btn-green btn-icon icon-left" id="add-note">
                    <i class="entypo-pencil"></i>
                    @lang('lang.AddSlider')
                </a>
            </div>
        </div>
    </div>
    <hr>
    
    <div class="gallery-env">
        <div class="row">
            
            @if(count($sliders) > 0)
            @foreach($sliders as $slider)
                <div class="col-sm-4">
                    <article class="album">
                        <header>
                            <img src="/images/sliders/{{ $slider->image }}">                        
                        </header>

                        <section class="album-info">
                            <h3>@lang('lang.title')</h3>
                            <p>{{ $slider->title }}</p>
                        </section>
                        <section class="album-info">
                            <h3>@lang('lang.description')</h3>
                            <p>{{ $slider->description }}</p>
                        </section>
                        <section class="album-info">
                            <h3>@lang('lang.Link')</h3>
                            <p>{{ $slider->link }}</p>
                        </section>

                        <footer>
                            <div class="album-images-count">
                                <div class="col-sm-6">
                                    <form action="{{action('SliderController@destroy', $slider['id'])}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button  type="submit" class="btn btn-red btn-icon icon-left">
                                            @lang('lang.Delete')
                                            <i class="entypo-trash"></i>
                                        </button >
                                    </form>
                                </div>
                                <div class="col-sm-6">
                                    <a style="color:white" type="button" href="sliders/{{ $slider->id}}/edit" class="btn btn-blue btn-icon icon-left">
                                        @lang('lang.Edit')
                                        <i class="entypo-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </footer>
                        
                    </article>
                </div>
            @endforeach
                <div class="col-sm-12 text-center">
                    {{ $sliders }}
                </div>

            @else
                <div class="error-text text-center">
                    <h2>@lang('lang.nodata')</h2>
                </div>
            @endif
        </div>
    </div>

@stop