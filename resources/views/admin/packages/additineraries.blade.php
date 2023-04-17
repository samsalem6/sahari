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
                    <form role="form" class="form-horizontal form-groups-bordered" method="POST" action="/admin/addItineraries/store">
                        @csrf
                        <div class="form-group">
                            <label for="field-1" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-8">
                                <input name="itineraries_id" type="hidden" value="{{ request()->id ? request()->id : $itineraries_id }}">
                                <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{old('title')}}">
                                <span id="name-error" class="text-danger ">{{ $errors->first('title', ':message') }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-2 control-label">Body</label>
                            <div class="col-sm-8">
                                <textarea name="body" id="body" type="text" class="form-control " >{{ old('body') }}</textarea>
                                <span id="name-error" class="text-danger ">{{ $errors->first('body', ':message') }}</span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success" type="button">Add</button>
                        <div class="col-sm-6">
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

                            <div class="col-sm-3">
                                <a href="/admin/addItineraries/edit/{{$Itinerary['id']}}"  class="btn btn-info btn-icon icon-left">
                                    Edit
                                    <i class="entypo-plus"></i>
                                </a>
                            </div>

                            <div class="col-sm-3">
                                <a href="/admin/addItineraries/destroy/{{$Itinerary['id']}}"  class="btn btn-red btn-icon icon-left">
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
