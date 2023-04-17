@extends('admin.layouts.app')
@section('title', __('pricingTemplates'))
@section('content')

<div class="notes-env">
    <div class="notes-header">
        <h2>@lang('Add New Pricing Templates')</h2>
        <div class="right">
        </div>
    </div>
</div>
<hr>

<div class="container">
    <form role="form" method="POST" action="{{url('/pricing_template')}}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name *</label>
            <div class="col-sm-8">
                <input name="name" id="name" type="text" class="form-control" value="{{ old('name') }}" required>
                {{-- <span id="name-error" class="validate-has-error">{{ $errors->first('name', ':message') }}</span> --}}
            </div>
        </div>


        <div class="form-group">
            <label for="accommodation" class="col-sm-2 control-label">Accommodation</label>
            <div class="col-sm-8">
                <textarea name="accommodation" rows="5" id="accommodation" type="text" class="form-control " ></textarea>
                {{-- <span id="name-error" class="validate-has-error">{{ $errors->first('accommodation', ':message') }}</span> --}}
            </div>
        </div>

        <div class="form-group ">
            <label for="caption" class="col-sm-2 control-label">Caption</label>
            <div class="col-sm-8">
                <textarea name="caption" rows="5" id="caption" type="text" class="form-control " ></textarea>
                {{-- <span id="name-error" class="validate-has-error">{{ $errors->first('caption', ':message') }}</span> --}}
            </div>
        </div>

        <div class="form-group">
            <label for="show_caption" class="col-sm-2 control-label">Show Caption</label>
            <div class="col-sm-8">
                <input type="checkbox" checked class="form-check-input" id="show_caption" name="show_caption">
                <span id="name-error" class="validate-has-error"></span>
            </div>
        </div>


        <div class="form-group ">
            <label for="order" class="col-sm-2 control-label">Order *</label>
            <div class="col-sm-8">
                <input name="order" id="order" type="text" class="form-control" required>
                <span id="name-error" class="validate-has-error"></span>
            </div>
        </div>

        <hr>

        <div class="container">
            <div class="widget-title">
              <h2>Rows Details</h2>
            </div>
            <div class="widget-body form">
              <h4><?php echo 'Rows';?></h4>
              <ul id="rows">
              </ul>
              <button type="button" id="addrow" class="btn btn-success"><?php echo 'Add Rows';?></button>
            </div>
          </div>

          <hr>

          <div class="container">
              <div class="widget-title">
                <h2>Columns Details</h2>
              </div>
              <div class="widget-body form">
                <h4><?php echo 'Columns';?></h4>
                <ul id="cols">
                </ul>
                <button type="button" id="addcol" class="btn btn-success"><?php echo 'Add Columns';?></button>
              </div>
            </div>


        <div class="form-group ">
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-green btn-icon icon-left">
                    @lang('lang.Add')
                    <i class="entypo-check"></i>
                </button>
                <a href="/pricing_template" class="btn btn-lg btn-red btn-icon">
                    @lang('lang.Cancel')
                    <i class="entypo-cancel"></i>
                </a>
            </div>
        </div>

    </form>

    @endsection

    @section('js')
    <!-- include summernote css/js -->
    <link rel="stylesheet" href="{{ asset('admin/js/dist/summernote.css')}}">
    <script src="{{ asset('admin/js/dist/summernote.js')}}"></script>
    <script src="{{ asset('/front/js/jquery-ui.js')}}"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src="{{ asset('/front/js/jquery-ui.multidatespicker.js')}}"></script>
    {{-- <script src="{{ asset('admin/js/pricingTemplatesAdd.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
            $('#accommodation').summernote();
            $('#caption').summernote();
        });
    </script>

@endsection
