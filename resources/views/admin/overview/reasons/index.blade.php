@extends('admin.layouts.app')
@section('title', __('Reasons'))
@section('sitetitle', __('Reasons'))
@section('reasons', 'visible opened active')
@section('content')
<div class="notes-env">
    <div class="notes-header">
        <h2>@lang('Reasons')</h2>
       
        <div class="right">
            @if (count($reasons) < 4)
            <a href="/reasons/create" class="btn btn-lg btn-green btn-icon icon-left" id="add-note">
                <i class="entypo-pencil"></i>
                @lang('Add Reason')
            </a>
            @endif
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
                        <th width="45%">@lang('lang.body')</th>
                        <th width="35%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($reasons) > 0)
                    @foreach($reasons as $reason)
                    <tr>
                        <td>{{ $reason->id }}</td>
                        <td>{{ $reason->title }}</td>
                        <td>{!! substr($reason->body, 0, 100)!!} ...</td>
                        <td>
                            <div class="album-images-count">
                                {{-- <div class="col-sm-3">
                                    <form action="{{action('ReasonsController@destroy', $reason['id'])}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button  type="submit" class="btn btn-red btn-icon icon-left">
                                            @lang('lang.Delete')
                                            <i class="entypo-trash"></i>
                                        </button >
                                    </form>
                                </div> --}}
                                <div class="col-sm-3">
                                    <a style="color:white" type="button" href="reasons/{{ $reason->id}}/edit" class="btn btn-blue btn-icon icon-left">
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
@endsection