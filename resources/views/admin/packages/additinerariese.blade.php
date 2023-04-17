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
                    <form role="form" class="form-horizontal form-groups-bordered" method="POST" action="/admin/addItineraries/edit">
                        @csrf
                        <div class="form-group">
                            <label for="field-1" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-8">
                                <input name="itineraries_id" type="hidden" value="{{ request()->id ? request()->id : $itineraries_id }}">
                                <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{$itineraries->title}}">
                                <span id="name-error" class="text-danger ">{{ $errors->first('title', ':message') }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-2 control-label">Body</label>
                            <div class="col-sm-8">
                                <textarea name="body" id="body" type="text" class="form-control " >{!!$itineraries->body!!}</textarea>
                                <span id="name-error" class="text-danger ">{{ $errors->first('body', ':message') }}</span>
                            </div>
                        </div>

                        <div class="form-group has-success">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-success">
                                    Update Itinerary
                                </button>
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


 <!-- include summernote css/js -->
 <link rel="stylesheet" href="{{ asset('admin/js/dist/summernote.css')}}">
 <script src="{{ asset('admin/js/dist/summernote.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#body').summernote();
      });
</script>
@stop
