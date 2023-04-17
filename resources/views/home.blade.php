@extends('admin.layouts.app')
@section('sitetitle', __('lang.home'))
@section('title', __('lang.dashboard'))
@section('dashboard', 'active')


@section('content')

    <div class="row">
        @if (Auth::user()->isAdmin())
            <div class="col-sm-3 col-xs-6">
                <div class="tile-stats tile-red">
                    <div class="icon"><i class="entypo-trophy"></i></div>
                    {{-- <div class="num" data-start="0" data-end="{{ $productsHome->count() }}" data-postfix="" data-duration="1500" data-delay="0">0</div> --}}
        
                    <h3>@lang('lang.products')</h3>
                    {{--  <p>so far in our blog, and our website.</p>  --}}
                </div>
            </div>
        
            <div class="col-sm-3 col-xs-6">
                <div class="tile-stats tile-green">
                    <div class="icon"><i class="entypo-basket"></i></div>
                    {{-- <div class="num" data-start="0" data-end="{{ $ordersHome->count() }}" data-postfix="" data-duration="1500" data-delay="600">0</div> --}}
                    <h3>@lang('lang.orders')</h3>
                </div>
            </div>
            
            <div class="clear visible-xs"></div>
        
            <div class="col-sm-3 col-xs-6">
        
                <div class="tile-stats tile-aqua">
                    <div class="icon"><i class="entypo-mail"></i></div>
                    {{-- <div class="num" data-start="0" data-end="{{ $messageHome->count() }}" data-postfix="" data-duration="1500" data-delay="1200">0</div> --}}
        
                    <h3>@lang('lang.messages')</h3>
                </div>
        
            </div>
        
            <div class="col-sm-3 col-xs-6">
        
                <div class="tile-stats tile-blue">
                    <div class="icon"><i class="entypo-tag"></i></div>
                    {{-- <div class="num" data-start="0" data-end="{{ $ReviewHome->count() }}" data-postfix="" data-duration="1500" data-delay="1800">0</div> --}}
        
                    <h3>@lang('lang.reviews')</h3>
                </div>
        
            </div>
        @endif

        @if (Auth::user()->isUser())
            
            <div class="col-sm-6 col-xs-6">
                <div class="tile-stats tile-green">
                    <div class="icon"><i class="entypo-basket"></i></div>
                    {{-- <div class="num" data-start="0" data-end="{{ $userOrdersHome->count() }}" data-postfix="" data-duration="1500" data-delay="600">0</div> --}}
                    <h3>@lang('lang.orders')</h3>
                </div>
            </div>
            
            <div class="clear visible-xs"></div>
        
            <div class="col-sm-6 col-xs-6">
        
                <div class="tile-stats tile-blue">
                    <div class="icon"><i class="entypo-tag"></i></div>
                    {{-- <div class="num" data-start="0" data-end="{{ $userReviewHome->count() }}" data-postfix="" data-duration="1500" data-delay="1800">0</div> --}}
        
                    <h3>@lang('lang.reviews')</h3>
                </div>
        
            </div>
        @endif
    </div>

@endsection


