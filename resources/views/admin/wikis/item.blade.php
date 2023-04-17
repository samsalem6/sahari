@extends('admin.layouts.app')
@section('title','wikiList')
@section('sitetitle', 'wikiList')
@section('wikis', 'visible opened active ')
@section('content')
<div class="profile-env">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <form role="form" class="form-horizontal form-groups-bordered" method="POST" action="/wikiItems/edit" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="field-6" class="col-sm-2 control-label">Update Item</label>

                            <div class="col-sm-10">
                                <div class="form-group text-center">
                                    <img style="width:400px" src="/images/wikis/{{ $wikiList->image }}">
                                </div>
                                <div class="form-group col-md-10"">
                                    <label class="col-sm-2 control-label">@lang('lang.Image')</label>
                                    <div class="col-sm-8">
                                        <input name="image" id="image" type="file" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-md-10"">
                                    <label class="col-sm-2 control-label">image Alt</label>
                                    <div class="input-group col-md-10">
                                        <input type="text" class="form-control" name="imageAlt" id="imageAlt" placeholder="imageAlt" value="{{$wikiList->imageAlt}}">
                                    </div>
                                </div>
                                <span id="name-error" class="validate-has-error">{{ $errors->first('imageAlt', ':messag') }}</span>

                                <div class="form-group col-md-10"">
                                    <label class="col-sm-2 control-label">imageTitle</label>

                                    <div class="input-group col-md-10">
                                        <input type="text" class="form-control" name="imageTitle" id="imageTitle" placeholder="imageTitle" value="{{$wikiList->imageTitle}}">
                                    </div>
                                </div>
                                <span id="name-error" class="validate-has-error">{{ $errors->first('imageTitle', ':message') }}</span>

                                <div class="form-group col-md-10"">
                                    <label class="col-sm-2 control-label">Title</label>

                                    <div class="input-group col-md-10">
                                        <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{$wikiList->title}}">
                                    </div>
                                </div>
                                <span id="name-error" class="validate-has-error">{{ $errors->first('title', ':message') }}</span>

                                <div class="form-group col-md-10"">
                                    <label class="col-sm-2 control-label">order</label>

                                    <div class="input-group col-md-10">
                                        <input type="text" class="form-control" name="order" id="order" placeholder="order" value="{{(int)Str::after($wikiList->order,$wikiList->wiki_id)}}">
                                    </div>
                                </div>
                                <span id="name-error" class="validate-has-error">{{ $errors->first('order', ':message') }}</span>

                                <input name="id" type="hidden" value="{{ $wikiList->id }}">

                                <div class="form-group col-md-10"">
                                    <label class="col-sm-2 control-label">Description</label>

                                <div class="input-group col-md-10">
                                    <textarea name="Description" id="Description" type="text" class="form-control " >{!!$wikiList->Description!!}</textarea>
                                    <span id="name-error" class="validate-has-error">{{ $errors->first('Description', ':message') }}</span>
                                </div>
                                </div>
                                <span id="name-error" class="validate-has-error">{{ $errors->first('Description', ':message') }}</span>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="btn btn-success">
                                        Edit Item
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
        $('#Description').summernote();
      });
</script>
@stop
