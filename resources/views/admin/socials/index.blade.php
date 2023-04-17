@extends('admin.layouts.app')
@section('title', __('lang.socials'))
@section('sitetitle', __('lang.socials'))
@section('socials', 'visible opened active')
@section('content')
    <div class="notes-env">
        <div class="notes-header">
            <h2>@lang('lang.socials')</h2>
            
            <div class="right">
                <a href="/admin/socials/create" class="btn btn-lg btn-green btn-icon icon-left" id="add-note">
                    <i class="entypo-pencil"></i>
                    @lang('lang.AddSocial')
                </a>
            </div>
        </div>
    </div>
    <hr>

    @if(count($socials) > 0)
    @foreach($socials as $social)
        <div class="panel-body">
            <div class="col-sm-7">
                <button type="button" class="btn btn-default btn-icon icon-left btn-block">
                        {{ ucfirst($social->name) }} - {{ $social->link }}
                    <i class="entypo-{{ $social->name }}"></i>
                </button> 
            </div>
            <div class="col-sm-2">
                <form action="{{action('SocialController@destroy', $social['id'])}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button  type="submit" class="btn btn-red btn-icon icon-left">
                        @lang('lang.Delete')
                        <i class="entypo-trash"></i>
                    </button >
                </form>
            </div>
            <div class="col-sm-2">
                <a style="color:white" type="button" href="socials/{{ $social->id}}/edit" class="btn btn-blue btn-icon icon-left">
                    @lang('lang.Edit')
                    <i class="entypo-plus"></i>
                </a>
            </div>
        </div>
        <hr>
    @endforeach
    @endif
        
    <div class="col-sm-12 text-center">
        {{ $socials }}
    </div>

@stop