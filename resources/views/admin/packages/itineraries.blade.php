@extends('admin.layouts.app')
@section('title','itineraries')
@section('sitetitle', 'itineraries')
@section('packages', 'visible opened active ')
@section('content')
<div class="profile-env">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <form role="form" class="form-horizontal form-groups-bordered" method="POST" action="/admin/itineraries/store">
                        {{ csrf_field() }}
                        <div class="form-group has-success">
                            <label for="field-6" class="col-sm-4 control-label">Add main Itinerary</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{old('title')}}">
                                        <input name="package_id" type="hidden" value="{{ request()->id }}">
                                        <span id="name-error" class="validate-has-error">{{ $errors->first('title', ':message') }}</span>
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-success" type="button">Add</button>
                                        </span>
                                    </div>
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
                    <th style="text-align:center">title</th>
                    <th style="text-align:center" >@lang('lang.time')</th>
                    <th style="text-align:center" ></th>
                </tr>
            </thead>

            <tbody>
                @if(count($itineraries) > 0)
                    @foreach($itineraries as $Itinerary)
                        <tr>
                            <td style="text-align:center">{{ $loop->iteration }}</td>
                            <td style="text-align:center ;width:40%">{{$Itinerary->title}}</td>
                            <td style="text-align:center">{{ $Itinerary->created_at->format('Y-m-d H:i A')}}</td>
                            <td style="text-align:center; width:40%"">

                            <div class="col-sm-4">
                                <a href="/admin/addItineraries/{{$Itinerary['id']}}"  class="btn btn-orange btn-icon icon-left">
                                    Add Itinerary
                                    <i class="entypo-list"></i>
                                </a>
                            </div>

                            <div class="col-sm-3">
                                <a href="/admin/itineraries/edit/{{$Itinerary['id']}}"  class="btn btn-info btn-icon icon-left">
                                    Edit
                                    <i class="entypo-plus"></i>
                                </a>
                            </div>

                            <div class="col-sm-3">
                                <a href="/admin/itineraries/destroy/{{$Itinerary['id']}}"  class="btn btn-red btn-icon icon-left">
                                    Delete
                                    <i class="entypo-trash"></i>
                                </a>
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

 <!-- include summernote css/js -->
 <link rel="stylesheet" href="{{ asset('admin/js/dist/summernote.css')}}">
 <script src="{{ asset('admin/js/dist/summernote.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#body').summernote();
      });
</script>
@stop
