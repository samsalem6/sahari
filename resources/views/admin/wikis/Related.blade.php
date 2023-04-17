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
                    <form role="form" class="form-horizontal form-groups-bordered" method="POST" action="/admin/relatedwikiPackage/store">
                        @csrf
                        <div class="form-group">
                            <input name="wiki_id" type="hidden" value="{{ $wiki_id }}">
                            <label for="Package_id" class="col-sm-2 control-label">Related Packages</label>
                            <div class="col-sm-8">
                                <select required name="Package_id" class="form-control">
                                    @foreach ($packages as $item)
                                        @if (itemRelatedwiki($wiki_id,$item->id))
                                        @else
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endif
                                    @endforeach

                                </select>
                                <span id="name-error" class="validate-has-error">{{ $errors->first('Package_id', ':message') }}</span>
                                <br>
                            </div>
                            <div class="form-group {{ $errors->has('order') ? ' has-error validate-has-error' : '' }} ">
                                <label for="field-6" class="col-sm-3 control-label">Order</label>
                                <div class="col-sm-5">
                                    <input name="order" id="order" type="text" class="form-control" value="" >
                                    <span id="name-error" class="validate-has-error">{{ $errors->first('order', ':message') }}</span>
                                </div>
                            </div>

                            <div class="col-sm-offset-4 col-sm-4">
                                <br>
                                <button type="submit" class="btn btn-success btn-block">
                                Add Package
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
                    <th style="text-align:center ">#</th>
                    <th style="text-align:center ;width:40%">Package Name</th>
                    <th style="text-align:center ;width:10%">Order</th>
                    <th style="text-align:center ;width:20%" >@lang('lang.time')</th>
                    <th style="text-align:center ; width:40%" ></th>
                </tr>
            </thead>

            <tbody>
                @if(count($Related) > 0)
                    @foreach($Related as $Relate)
                        <tr>
                            <td style="text-align:center">{{ $loop->iteration }}</td>
                            <td style="text-align:center ">{{$Relate->package->name}}</td>
                            <td style="text-align:center ">{{(int)Str::after($Relate->order,$wiki_id)}}</td>
                            <td style="text-align:center">{{ $Relate->created_at->format('Y-m-d H:i A')}}</td>
                            <td style="text-align:center; width:40%">

                            <div class="col-sm-3">
                                <a href="/admin/relatedwikiPackage/destroy/{{$Relate['id']}}"  class="btn btn-red btn-icon icon-left">
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
