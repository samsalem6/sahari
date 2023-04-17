@extends('admin.layouts.app')
@section('title','wikis')
@section('sitetitle', 'wikis')
@section('wikis', 'visible opened active ')
@section('content')
<div class="profile-env">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <form role="form" class="form-horizontal form-groups-bordered" method="POST" action="/admin/wikiItems/store" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="field-6" class="col-sm-2 control-label">Add Item</label>

                            <div class="col-sm-10">

                                <div class="form-group col-md-10"">
                                    <label class="col-sm-2 control-label">@lang('lang.Image')</label>
                                    <div class="col-sm-8">
                                        <input name="image" id="image" type="file" class="form-control">
                                    </div>
                                </div>

                                <div class="input-group col-md-10">
                                    <input type="text" class="form-control" name="imageAlt" id="imageAlt" placeholder="imageAlt" value="{{old('imageAlt')}}">
                                </div>
                                <span id="name-error" class="validate-has-error">{{ $errors->first('imageAlt', ':message') }}</span>

                                <div class="input-group col-md-10">
                                    <input type="text" class="form-control" name="imageTitle" id="imageTitle" placeholder="imageTitle" value="{{old('imageTitle')}}">
                                </div>
                                <span id="name-error" class="validate-has-error">{{ $errors->first('imageTitle', ':message') }}</span>

                                <div class="input-group col-md-10">
                                    <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{old('title')}}">
                                </div>
                                <span id="name-error" class="validate-has-error">{{ $errors->first('title', ':message') }}</span>

                                <div class="input-group col-md-10">
                                    <input type="text" class="form-control" name="order" id="order" placeholder="order" value="{{old('order')}}">
                                </div>
                                <span id="name-error" class="validate-has-error">{{ $errors->first('order', ':message') }}</span>

                                <input name="wiki_id" type="hidden" value="{{ request()->id }}">

                                <div class="input-group col-md-10">
                                    <textarea name="Description" id="Description" type="text" class="form-control " >{{ old('Description') }}</textarea>
                                    <span id="name-error" class="validate-has-error">{{ $errors->first('Description', ':message') }}</span>
                                </div>
                                <span id="name-error" class="validate-has-error">{{ $errors->first('Description', ':message') }}</span>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="btn btn-success">
                                        Add Item
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
                    <th style="text-align:center">title</th>
                    <th style="text-align:center">Description</th>
                    <th style="text-align:center" >@lang('lang.time')</th>
                    <th style="text-align:center" ></th>
                </tr>
            </thead>

            <tbody>
                @if(count($items) > 0)
                    @foreach($items as $item)
                        <tr>
                            <td style="text-align:center">{{  (int)Str::after($item->order,$item->wiki_id) }}</td>
                            <td style="text-align:center ;width:20%">{{$item->title}}</td>
                            <td style="text-align:center ;width:20%">{!!$item->Description!!}</td>
                            <td style="text-align:center">{{ $item->created_at->format('Y-m-d H:i A')}}</td>
                            <td style="text-align:center; width:40%"">
                            <div class="col-sm-3">
                                <a href="/admin/wikiItems/edit/{{$item['id']}}"  class="btn btn-info btn-icon icon-left">
                                    Edit
                                    <i class="entypo-plus"></i>
                                </a >
                            </div>

                            <div class="col-sm-3">
                                <a href="/admin/wikiItems/destroy/{{$item['id']}}"  class="btn btn-red btn-icon icon-left">
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

 <!-- include summernote css/js -->
 <link rel="stylesheet" href="{{ asset('admin/js/dist/summernote.css')}}">
 <script src="{{ asset('admin/js/dist/summernote.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#Description').summernote();
      });
</script>
@stop
