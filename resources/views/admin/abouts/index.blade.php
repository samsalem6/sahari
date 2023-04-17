@extends('admin.layouts.app')
@section('title', __('lang.abouts'))
@section('sitetitle', __('lang.abouts'))
@section('abouts', 'visible opened active ')
@section('content')
    <div class="notes-env">
        <div class="notes-header">
            <h2>@lang('lang.abouts')</h2>
            
            <div class="right">
                <a href="/admin/abouts/create" class="btn btn-lg btn-green btn-icon icon-left" id="add-note">
                    <i class="entypo-pencil"></i>
                    @lang('lang.AddAbout')
                </a>
            </div>
        </div>
    </div>
    <hr>

    <div class="gallery-env">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="20%">@lang('lang.title')</th>
                            <th width="35%">@lang('lang.body')</th>
                            <th width="45%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($abouts) > 0)
                        @foreach($abouts as $about)
                        <tr>
                            <td>{{ $about->id }}</td>
                            <td>{{ $about->title }}</td>
                            <td>{!! substr ($about->body, 0, 10)!!} ...</td>
                            <td>
                                <div class="album-images-count">
                                    <div class="col-sm-6">
                                        <form action="{{action('AboutController@destroy', $about['id'])}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button  type="submit" class="btn btn-red btn-icon icon-left">
                                                @lang('lang.Delete')
                                                <i class="entypo-trash"></i>
                                            </button >
                                        </form>
                                    </div>
                                    <div class="col-sm-6">
                                        <a style="color:white" type="button" href="abouts/{{ $about->id}}/edit" class="btn btn-blue btn-icon icon-left">
                                            @lang('lang.Edit')
                                            <i class="entypo-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-sm-12 text-center">
        {{ $abouts }}
    </div>

@stop