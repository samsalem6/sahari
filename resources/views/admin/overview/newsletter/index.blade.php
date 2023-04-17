@extends('admin.layouts.app')
@section('title', __('Newsletter'))
@section('sitetitle', __('Newsletter'))
@section('reasons', 'visible opened active')
@section('content')
<div class="notes-env">
    <div class="notes-header">
        <h2>@lang('Newsletter')</h2>
       
        <div class="right">
            <a href="{{ action('NewsletterController@export') }}" style="background-color: #5867dd; border-color: #5867dd; color:#fff;" class="btn btn-lg btn-primary" id="add-note">
                @lang('Export')
            </a>
        </div>

    </div>
</div>
<hr>


<div class="gallery-env">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered  table-striped responsive">
                <thead>
                    <tr>
                        <th width="100%">@lang('lang.email')</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($newsletters) > 0)
                    @foreach($newsletters as $newsletter)
                    <tr>
                        <td>{{ $newsletter->email }}</td>
                    </tr>
                    @endforeach
                    
                    @endif
                </tbody>
            </table>
            <div class="col-sm-12 text-center">
                {{ $newsletters }}
            </div>
        </div>
    </div>
</div>
@endsection