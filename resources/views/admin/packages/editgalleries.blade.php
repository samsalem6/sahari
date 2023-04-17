@extends('admin.layouts.app')
@section('title','galleries')
@section('sitetitle', 'galleries')
@section('packages', 'visible opened active ')
@section('content')
<div class="profile-env">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <form role="form" class="form-horizontal form-groups-bordered" method="POST" action="/galleries/edit" enctype="multipart/form-data">
                        @csrf
                        <input name="galleries_id" type="hidden" value="{{ $galleries->id }}">
                        <input name="package_id" type="hidden" value="{{ $galleries->package_id }}">

                        <div class="form-group {{ $errors->has('order') ? ' has-error validate-has-error' : '' }} ">
                            <label for="order" class="col-sm-2 control-label">Order</label>
                            <div class="col-sm-8">
                                <input name="order" id="order" type="text" class="form-control" value="{{(int)Str::after($galleries->order,$galleries->package_id) }}">
                                <span id="name-error" class="validate-has-error">{{ $errors->first('order', ':message') }}</span>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('imageAlt') ? ' has-error validate-has-error' : '' }} ">
                            <label for="imageAlt" class="col-sm-2 control-label">Alt Image</label>
                            <div class="col-sm-8">
                                <input name="imageAlt" id="imageAlt" type="text" class="form-control" value="{{ $galleries->imageAlt }}">
                                <span id="name-error" class="validate-has-error">{{ $errors->first('imageAlt', ':message') }}</span>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('imageTitle') ? ' has-error validate-has-error' : '' }} ">
                            <label for="imageTitle" class="col-sm-2 control-label">Title Image</label>
                            <div class="col-sm-8">
                                <input name="imageTitle" id="imageTitle" type="text" class="form-control" value="{{ $galleries->imageTitle }}">
                                <span id="name-error" class="validate-has-error">{{ $errors->first('imageTitle', ':message') }}</span>
                            </div>
                        </div>

                        <img width="250px" class="img-responsive img-rounded" src="{{url('images/packages/'.$galleries->image) }}" alt="packages-{{$galleries->id}}">

                        <div class="form-group {{ $errors->has('image') ? ' has-error validate-has-error' : '' }} ">
                            <label class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-8">
                                <input name="image" id="image" type="file" class="form-control">
                                <span id="name-error" class="validate-has-error">{{ $errors->first('image', ':message') }}</span>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="text-center">
                                <button type="submit" class="btn btn-lg btn-green btn-icon icon-left">
                                    @lang('lang.Add')
                                    <i class="entypo-check"></i>
                                </button>
                                <a href="/admin/packages" class="btn btn-lg btn-red btn-icon">
                                    @lang('lang.Cancel')
                                    <i class="entypo-cancel"></i>
                                </a>
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
