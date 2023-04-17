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
                    <form role="form" class="form-horizontal form-groups-bordered" method="POST" action="/icons/edit">
                        {{ csrf_field() }}
                        <div class="form-group has-success">
                            <label for="field-6" class="col-sm-3 control-label">Add Icon</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                <input type="text" class="form-control" name="icon" id="icon" placeholder="icon" value="{{$icon->icon}}">
                                </div>
                                <span id="name-error" class="validate-has-error">{{ $errors->first('icon', ':message') }}</span>
                                <input name="id" type="hidden" value="{{ $icon->id }}">
                            
                                <div class="input-group">
                                    <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{$icon->title}}">
                                </div>
                                <span id="name-error" class="validate-has-error">{{ $errors->first('title', ':message') }}</span>
                            </div>
                            <div class="form-group"> 
                                <div class="col-sm-offset-3 col-sm-5"> 
                                    <button type="submit" class="btn btn-success">
                                    Edit Icon
                                </button> 
                                </div> 
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
@section('js')
<script src="{{ asset('admin/js/fileinput.js')}}"></script>
@stop