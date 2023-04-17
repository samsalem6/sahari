@extends('admin.layouts.app')
@section('title','General info Package')
@section('sitetitle', 'General info Package')
@section('packages', 'visible opened active ')
@section('content')
<div class="profile-env">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <form role="form" class="form-horizontal form-groups-bordered" method="POST" action="/admin/GeneralPackage/store">
                        {{ csrf_field() }}
                        <input name="package_id" type="hidden" value="{{ $package_id }}">
                        <div class="col-sm-12">
                            <div class="form-group"> <label class="col-sm-3 control-label">General info Package</label>
                                <div class="col-sm-5">
                                    <select required name="general_id" class="form-control">

                                            @foreach ($General as $item)
                                                @if (getGeneralPackage($package_id,$item->id))
                                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-info">
                                Add General Info
                            </button>
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
                    <th style="text-align:center">body</th>
                    <th style="text-align:center" >@lang('lang.time')</th>
                    <th style="text-align:center" ></th>
                </tr>
            </thead>

            <tbody>
                @if(count($generalPackage) > 0)
                    @foreach($generalPackage as $generalPackag)

                        <tr>
                            <td style="text-align:center">{{ $loop->iteration }}</td>
                            <td style="text-align:center ;width:20%">
                                {{getNameGeneral($generalPackag->general_id)->title}}
                            </td>
                            <td style="text-align:center ;width:20%">
                                {!!getNameGeneral($generalPackag->general_id)->title!!}
                            </td>
                            <td style="text-align:center">{{ $generalPackag->created_at->format('Y-m-d H:i A')}}</td>
                            <td style="text-align:center; width:40%"">
                            <div class="col-sm-3">
                                <a href="/admin/GeneralPackage/edit/{{$generalPackag['id']}}"  class="btn btn-info btn-icon icon-left">
                                    Edit
                                    <i class="entypo-plus"></i>
                                </a >
                            </div>
                            <div class="col-sm-3">
                                <a href="/admin/GeneralPackage/destroy/{{$generalPackag['id']}}"  class="btn btn-red btn-icon icon-left">
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
        $('#body').summernote();
      });
</script>
@stop
