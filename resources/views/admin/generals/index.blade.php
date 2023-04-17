@extends('admin.layouts.app')
@section('title', __('lang.generals'))
@section('sitetitle', __('lang.generals'))
@section('generals', 'visible opened active ')
@section('content')
    <div class="notes-env">
        <div class="notes-header">
            <h2>@lang('lang.generals')</h2>

            <div class="right">
                <a href="/admin/generals/create" class="btn btn-lg btn-green btn-icon icon-left" id="add-note">
                    <i class="entypo-pencil"></i>
                    @lang('lang.AddItem')
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
                        @if(count($generals) > 0)
                        @foreach($generals as $general)
                        <tr>
                            <td>{{ $general->id }}</td>
                            <td>{{ $general->title }}</td>
                            <td>{!! substr ($general->body, 0, 10)!!} ...</td>
                            <td>
                                <div class="album-images-count">
                                    <div class="col-sm-6">

                                        <form action="{{action('GeneralController@destroy', $general['id'])}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button  type="submit" class="btn btn-red btn-icon icon-left">
                                                @lang('lang.Delete')
                                                <i class="entypo-trash"></i>
                                            </button >
                                        </form>

                                    </div>
                                    <div class="col-sm-6">
                                        <a style="color:white" type="button" href="generals/{{ $general->id}}/edit" class="btn btn-blue btn-icon icon-left">
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
        {{ $generals }}
    </div>

@stop
