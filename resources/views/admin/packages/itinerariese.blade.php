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
                    <form role="form" class="form-horizontal form-groups-bordered" method="POST" action="/itineraries/edit">
                        {{ csrf_field() }}
                        <div class="form-group has-success">
                            <label for="field-3" class="col-sm-3 control-label">Add Itinerary</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{$itineraries->title}}">
                                </div>
                                <span id="name-error" class="validate-has-error">{{ $errors->first('icon', ':message') }}</span>
                                <input name="id" type="hidden" value="{{ $itineraries->id }}">
                                <span id="name-error" class="validate-has-error">{{ $errors->first('body', ':message') }}</span>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="btn btn-success">
                                    Edit Itinerary
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


 <!-- include summernote css/js -->
 <link rel="stylesheet" href="{{ asset('admin/js/dist/summernote.css')}}">
 <script src="{{ asset('admin/js/dist/summernote.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#body').summernote();
      });
</script>
@stop
