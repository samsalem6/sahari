@extends('admin.layouts.app')
@section('title', __('pricingTemplates'))
@section('content')
<style>
    .widget {
    background: none repeat scroll 0 0 #F9F9F9;
    border-top: 1px solid #e0dede;
    border-left: 1px solid #e0dede;
    border-right: 1px solid #e0dede;
    clear: both;
    margin-top: 0px;
    margin-bottom: 20px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}
.widget-title {
    background-color: #EFEFEF;
    background-image: -webkit-gradient(linear, 0 0%, 0 100%, from(#FDFDFD), to(#EAEAEA));
    background-image: -webkit-linear-gradient(top, #FDFDFD 0%, #EAEAEA 100%);
    background-image: -moz-linear-gradient(top, #FDFDFD 0%, #EAEAEA 100%);
    background-image: -ms-linear-gradient(top, #FDFDFD 0%, #EAEAEA 100%);
    background-image: -o-linear-gradient(top, #FDFDFD 0%, #EAEAEA 100%);
    background-image: -linear-gradient(top, #FDFDFD 0%, #EAEAEA 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fdfdfd', endColorstr='#eaeaea',GradientType=0 );
    border-bottom: 1px solid #e0dede;
    height: 36px;
    -webkit-border-radius: 3px 3px 0px 0px;
    -moz-border-radius: 3px 3px 0px 0px;
    border-radius: 3px 3px 0px 0px;
}
.widget-title h2 {
    color: #444;
    float: left;
    /* font-size: 13px; */
    /* font-weight: bold; */
    /* padding: 11px px 11px 11px 15px; */
    line-height: 30px;
    margin: 0;
}
.widget-body {
    padding: 15px 15px;
    border-bottom: 1px solid #CDCDCD;
    -webkit-border-radius: 0px 0px 3px 3px;
    -moz-border-radius: 0px 0px 3px 3px;
    border-radius: 0px 0px 3px 3px;
}
.widget-body h3 {
    font-weight: bold;
}
.controls input {
    width: 50%;
}
</style>
<div class="notes-env">
    <div class="notes-header">
        <h2>@lang('Edit Pricing Templates')</h2>
        <div class="right">
        </div>
    </div>
</div>
<hr>

<div class="container">
    <form role="form" method="POST" action="{{action('PricingTemplatesController@update', $pricingTemplate->id)}}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
        {{ csrf_field() }}
        @method('PUT')
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-8">
                <input name="name" id="name" type="text" class="form-control" value="{{ $pricingTemplate->name }}" >
                {{-- <span id="name-error" class="validate-has-error">{{ $errors->first('name', ':message') }}</span> --}}
            </div>
        </div>


        <div class="form-group">
            <label for="accommodation" class="col-sm-2 control-label">Accommodation</label>
            <div class="col-sm-8">
                <textarea name="accommodation" rows="5" id="accommodation" type="text" class="form-control " >{{ $pricingTemplate->accommodation }}</textarea>
                {{-- <span id="name-error" class="validate-has-error">{{ $errors->first('accommodation', ':message') }}</span> --}}
            </div>
        </div>

        {{-- <div class="form-group ">
            <label for="caption" class="col-sm-2 control-label">Caption</label>
            <div class="col-sm-8">
                <textarea name="caption" rows="5" id="caption" type="text" class="form-control " >{{ $pricingTemplate->caption }}</textarea>
                {{-- <span id="name-error" class="validate-has-error">{{ $errors->first('caption', ':message') }}</span> --}}
            {{-- </div>
        </div>  --}}

        {{-- <div class="form-group">
            <label for="show_caption" class="col-sm-2 control-label">Show Caption</label>
            <div class="col-sm-8">
                <input type="checkbox" class="form-check-input"  {{ $pricingTemplate->show_caption == true ? 'checked' : '' }} id="show_caption" name="show_caption">
                <span id="name-error" class="validate-has-error"></span>
            </div>
        </div> --}}


        <div class="form-group ">
            <label for="order" class="col-sm-2 control-label">Order</label>
            <div class="col-sm-8">
                <input name="order" id="order" type="text" class="form-control" value="{{ $pricingTemplate->order }}">
                <span id="name-error" class="validate-has-error"></span>
            </div>
        </div>

        <hr>

        <div class="widget">
            <div class="widget-title">
              <h2>Rows Details</h2>
            </div>
            <div class="widget-body form" style="padding: 15px 15px;">
              <h3><?php echo 'Rows';?></h3>
                  <?php
                    $i = 0;
                  ?>
              <ul id="rows" style="list-style-type: none;">
                <?php
            if(count($rows) > 0) {
                while($i < count($rows)) {
                        echo '<li class="row">' .
					'<div class="control-group"><label class="control-label" for="rowName'.$i.'">Name:</label><div class="controls">'.
					'<input type="text" id="rowName'.$i.'" name="RowsTemplate['.$i.'][name]" value="'.
					$rows[$i]['name'].'" class="form-control" /></div></div>'.
					'<div class="control-group"><label class="control-label" for="rowOrder'.$i.'">Order:</label><div class="controls">'.
					'<input type="text" id="rowOrder'.$i.'" name="RowsTemplate['.$i.'][order]" value="'.
					$rows[$i]['order'].'" class="form-control" /></div></div>'.
					'<input type="hidden" id="rowId'.$i.'" name="RowsTemplate['.$i.'][id]" value="'.
					$rows[$i]['id'].'" />'.
					'<input type="hidden" id="rowDel'.$i.'" class="deleteField" name="RowsTemplate['.$i.'][deleted]" value="0" />'.
					'<button type="button" class="delete btn btn-danger" style="margin-top: 10px;">Delete</button><br><br>'.
					'</li>';
				        $i++;				
			        }
                    
		     }?>
              </ul>
              <button type="button" id="addrowEdit" class="btn btn-success"><?php echo 'Add Rows';?></button>
              <input type="hidden" id="initialRowCounter" value="<?php echo count($rows);?>"/>
            </div>
          </div>

          <hr>

          <div class="widget">
              <div class="widget-title">
                <h2>Columns Details</h2>
              </div>
              <div class="widget-body form">
                <h3><?php echo 'Columns';?></h3>
                <?php
                // resetting the counter
                $i = 0;
                ?>

                <ul id="cols" style="list-style-type: none;">
                         <?php
                    if(count($cols) > 0) {
                        while($i < count($cols)) {
                            echo '<li class="col">' .
                                '<div class="control-group"><label class="control-label" for="colName'.$i.'">Name:</label><div class="controls">'.
                                '<input type="text" id="colName'.$i.'" name="ColumnsTemplate['.$i.'][name]" value="'.
                                $cols[$i]['name'].'" class="form-control" /></div></div>'.
                                '<div class="control-group"><label class="control-label" for="colOrder'.$i.'">Order:</label><div class="controls">'.
                                '<input type="text" id="colOrder'.$i.'" name="ColumnsTemplate['.$i.'][order]" value="'.
                                $cols[$i]['order'].'" class="form-control" /></div></div>'.
                                '<input type="hidden" id="colId'.$i.'" name="ColumnsTemplate['.$i.'][id]" value="'.
                                $cols[$i]['id'].'" />'.
                                '<input type="hidden" id="colDel'.$i.'" class="deleteField"  name="ColumnsTemplate['.$i.'][deleted]" value="0" />'.
                                '<button type="button" class="delete btn btn-danger" style="margin-top: 10px;">Delete</button><br><br>'.
                                '</li>';
                            $i++;
                        }
                    }?>
                </ul>
                <button type="button" id="addcolEdit" class="btn btn-success"><?php echo 'Add Columns';?></button>
                <input type="hidden" id="initialColumnCounter" value="<?php echo count($cols);?>"/>
              </div>
            </div>


        <div class="form-group ">
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-green btn-icon icon-left">
                    @lang('lang.Update')
                    <i class="entypo-check"></i>
                </button>
                <a href="/pricing_template" class="btn btn-lg btn-red btn-icon">
                    @lang('lang.Cancel')
                    <i class="entypo-cancel"></i>
                </a>
            </div>
        </div>

    </form>
</div>

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