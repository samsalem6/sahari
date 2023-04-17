@extends('admin.layouts.app')
@section('title', __('lang.contacts'))
@section('sitetitle', __('lang.contacts'))
@section('contacts', 'visible opened active')
@section('content')

    <div class="notes-env">
        <div class="notes-header">
            <h2>@lang('lang.contacts')</h2>
            
            <div class="right">
                <a href="/admin/contacts/1/edit" class="btn btn-lg btn-blue btn-icon icon-left" id="add-note">
                    <i class="entypo-pencil"></i>
                    @lang('lang.EditContact')
                </a>
            </div>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-sm-offset-2 col-sm-10">
            <blockquote>
                <p>
                    <strong>@lang('lang.phone')</strong>
                    <br>
                    {{ $contact->phone }}
                </p>
            </blockquote>
        
            <blockquote>
                <p>
                    <strong>@lang('lang.fax')</strong>
                    <br>
                    {{ $contact->fax }}
                </p>
            </blockquote>
        
            <blockquote>
                <p>
                    <strong>@lang('lang.email')</strong>
                    <br>
                    {{ $contact->email }}
                </p>
            </blockquote>

            <blockquote>
                <p>
                    <strong>@lang('lang.address')</strong>
                    <br>
                    {{ $contact->location }}
                </p>
            </blockquote>
        </div>
    </div>

@stop