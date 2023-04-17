@extends('admin.layouts.app')
@section('title', __('lang.reviews'))
@section('sitetitle', __('lang.reviews'))
@section('reviews', 'visible opened active ')
@section('content')
    <div class="notes-env">
        <div class="notes-header">
            <h2>@lang('lang.reviews')</h2>
            
            <div class="right">
                <a href="/admin/reviews/create" class="btn btn-lg btn-green btn-icon icon-left" id="add-note">
                    <i class="entypo-pencil"></i>
                    @lang('lang.AddItem')
                </a>
            </div>
        </div>
    </div>
    <hr>
    
    <div class="gallery-env">
        <div class="row">
            
            @if(count($reviews) > 0)
            @foreach($reviews as $review)
                <div class="col-sm-4">
                    <article class="album">
                        <header>
                    @if( ($review->image))
                        <img src="/images/reviews/{{ $review->image }}">
                    @else
                        <img src="/images/avatar/default.jpg" class="img-rounded" />
                    @endif                      
                        </header>

                        <section class="album-info">
                            <h3>@lang('lang.name')</h3>
                            <p>{{ $review->name }}</p>
                        </section>
                        <section class="album-info">
                            <h3>@lang('lang.description')</h3>
                            <p>{{ $review->description }}</p>
                        </section>
                        <section class="album-info">
                            <h3>@lang('lang.stars')</h3>
                            <p>{{ $review->stars }}</p>
                        </section>

                        <footer>
                            <div class="album-images-count">
                                <div class="col-sm-6">
                                    <form action="{{action('ReviewController@destroy', $review['id'])}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button  type="submit" class="btn btn-red btn-icon icon-left">
                                            @lang('lang.Delete')
                                            <i class="entypo-trash"></i>
                                        </button >
                                    </form>
                                </div>
                                <div class="col-sm-6">
                                    <a style="color:white" type="button" href="reviews/{{ $review->id}}/edit" class="btn btn-blue btn-icon icon-left">
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
                    {{ $reviews }}
                </div>

            @else
                <div class="error-text text-center">
                    <h2>@lang('lang.nodata')</h2>
                </div>
            @endif
        </div>
    </div>

@stop