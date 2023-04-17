@extends('admin.layouts.app')
@section('title', __('lang.users'))
@section('sitetitle', __('lang.users'))
@section('users', 'visible opened active')
@section('content')
    <div class="notes-env">
        <div class="notes-header">
            <h2>@lang('lang.users')</h2>
            <div class="right">
            </div>
        </div>
    </div>
    <hr>

    @if(count($users) > 0)
    @foreach($users as $user)

    <!-- Single Member -->
    <div class="member-entry">
            
        <a class="member-img">
            @if( ($user->avatar))
                <img src="/images/avatar/{{ $user->avatar }}" class="img-rounded" />
            @else
                <img src="/images/avatar/default.jpg" class="img-rounded" />
            @endif
        </a>
        
        <div class="member-details">
            <h4>
                <a>{{ $user->name }}</a>
            </h4>
            
            <!-- Details with Icons -->
            <div class="row info-list">
                
                <div class="col-sm-3">
                    <i class="entypo-phone"></i>
                    @lang('lang.mobile') :<a href="#">{{ $user->mobile }}</a>
                </div>
                
                <div class="col-sm-4">
                    <i class="entypo-back-in-time"></i>
                    @lang('lang.created') :<a href="#">{{ $user->created_at->format(' Y/m/d')}}</a>
                </div>
                
            </div>
        </div>
        
    </div>

    @endforeach
        <div class="col-sm-12 text-center">
            {{ $users }}
        </div>
    @else
        <div class="error-text text-center">
            <h2>@lang('lang.nodata')</h2>
        </div>
    @endif

@stop