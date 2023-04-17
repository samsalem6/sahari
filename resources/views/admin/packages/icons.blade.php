@extends('admin.layouts.app')
@section('title','Icons')
@section('sitetitle', 'Icons')
@section('packages', 'visible opened active ')
@section('content')
<div class="profile-env">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <form role="form" class="form-horizontal form-groups-bordered" method="POST" action="/admin/icons/store">
                        {{ csrf_field() }}
                        <div class="form-group has-success">
                            <label for="field-6" class="col-sm-3 control-label">Add Icon</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                <input type="text" class="form-control" name="icon" id="icon" placeholder="icon" value="{{old('icon')}}">
                                </div>
                                <span id="name-error" class="validate-has-error">{{ $errors->first('icon', ':message') }}</span>
                                <input name="package_id" type="hidden" value="{{ request()->id }}">
                            
                                <div class="input-group">
                                    <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{old('title')}}">
                                </div>
                                <span id="name-error" class="validate-has-error">{{ $errors->first('title', ':message') }}</span>
                            </div>
                            <div class="form-group"> 
                                <div class="col-sm-offset-3 col-sm-5"> 
                                    <button type="submit" class="btn btn-success">
                                    Add Icon
                                </button> 
                                </div> 
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <table class="table table-condensed table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th style="text-align:center">#</th>
                    <th style="text-align:center">icon</th>
                    <th style="text-align:center">title</th>
                    <th style="text-align:center" >@lang('lang.time')</th>
                    <th style="text-align:center" ></th>
                </tr>
            </thead>
            
            <tbody>
                @if(count($icons) > 0)
                    @foreach($icons as $icon)
                        <tr>
                            <td style="text-align:center">{{ $loop->iteration }}</td>
                            <td style="text-align:center ;width:20%">{{$icon->icon}}</td>
                            <td style="text-align:center ;width:20%">{{$icon->title}}</td>
                            <td style="text-align:center">{{ $icon->created_at->format('Y-m-d H:i A')}}</td>
                            <td style="text-align:center; width:40%"">
                            <div class="col-sm-3">
                                <a href="/admin/icons/edit/{{$icon['id']}}"  class="btn btn-info btn-icon icon-left">
                                    Edit
                                    <i class="entypo-plus"></i>
                                </a >
                            </div>

                            <div class="col-sm-3">
                                <a href="/admin/icons/destroy/{{$icon['id']}}"  class="btn btn-red btn-icon icon-left">
                                    Delete
                                    <i class="entypo-trash"></i>
                                </a >
                            </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        
    </div>
    
</div>

@endsection
@section('js')
<script src="{{ asset('admin/js/fileinput.js')}}"></script>
@stop