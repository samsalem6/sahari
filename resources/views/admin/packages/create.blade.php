@extends('admin.layouts.app')
@section('title', __('lang.packages'))
@section('sitetitle', __('lang.packages'))
@section('packages', 'visible opened active ')
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
    height: 30px;
    border-radius: 3px 3px 0px 0px;
}
.widget-title h4 {
    color: #444;
    /* float: left; */
    /* font-size: 13px; */
    font-weight: bold;
    /* padding: 11px px 11px 11px 15px; */
    line-height: 30px;
    margin-left: 10px;
    /* margin: 0; */
}
.widget-body {
    padding: 15px 15px;
    border-bottom: 1px solid #CDCDCD;
    -webkit-border-radius: 0px 0px 3px 3px;
    -moz-border-radius: 0px 0px 3px 3px;
    border-radius: 0px 0px 3px 3px;
}
.widget-body li {
    color: black;
    font-weight: bold;
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
        <h2>@lang('lang.AddItem')</h2>
        <div class="right">
        </div>
    </div>
</div>
<hr>

<form role="form" method="POST" action="{{url('/admin/packages')}}" enctype="multipart/form-data"
    class="form-horizontal form-groups-bordered">
    {{ csrf_field() }}


    <div class="form-group {{ $errors->has('runs_on') ? ' has-error validate-has-error' : '' }} ">
        <label for="runs_on" class="col-sm-2 control-label">Runs On</label>
        <div class="col-sm-8">
            <div id="datePick"></div>
            <input type="text" class="form-control" autocomplete="off" placeholder="Pick the runs on dates" name="runs_on" id="runs_on">
            <span id="name-error" class="validate-has-error">{{ $errors->first('runs_on', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('popular') ? ' has-error validate-has-error' : '' }} ">
        <label for="metaTitle" class="col-sm-2 control-label">Top rated Or Popular</label>
        <div class="col-sm-8">
            <div class="radio">
                <label>
                    <input type="radio" name="popular" id="null" value="null" checked="">Null
                </label>
                <label>
                    <input type="radio" name="popular" id="popular" value="popular">Popular
                </label>
                <label>
                    <input type="radio" name="popular" id="toprated" value="toprated">Top rated
                </label>
            </div>
            <span id="name-error" class="validate-has-error">{{ $errors->first('popular', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('type') ? ' has-error validate-has-error' : '' }} ">
        <label for="metaTitle" class="col-sm-2 control-label">Travel Packages Or Combined</label>
        <div class="col-sm-8">
            <div class="radio">
                <label>
                    <input type="radio" name="type" id="combined" checked="" value="combined">Combined
                </label>
                <label>
                    <input type="radio" name="type" id="TravelPackages" value="TravelPackages">Travel Packages
                </label>
            </div>
            <span id="name-error" class="validate-has-error">{{ $errors->first('type', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('inHome') ? ' has-error validate-has-error' : '' }} ">
        <label for="inHome" class="col-sm-2 control-label">Show in Home</label>
        <div class="col-sm-8">
            <input type="checkbox" class="form-check-input" id="inHome" name="inHome">
            <span id="name-error" class="validate-has-error">{{ $errors->first('inHome', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('landing') ? ' has-error validate-has-error' : '' }} ">
        <label for="landing" class="col-sm-2 control-label">Landing</label>
        <div class="col-sm-8">
            <input type="checkbox" class="form-check-input" id="landing" name="landing">
            <span id="name-error" class="validate-has-error">{{ $errors->first('landing', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('destination_id') ? ' has-error validate-has-error' : '' }} ">
        <label for="destination_id" class="col-sm-2 control-label">Destination</label>
        <div class="col-sm-8">
            <select name="destination_id" class="form-control">
                @foreach ($destinations as $destination)
                    <option value="{{$destination->id}}">{{$destination->name}}</option>
                @endforeach
            </select>
            <span id="name-error" class="validate-has-error">{{ $errors->first('destination_id', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('hot') ? ' has-error validate-has-error' : '' }} ">
        <label for="hot" class="col-sm-2 control-label">Hot Deals</label>
        <div class="col-sm-8">
            <select required name="hot" class="form-control">
                <option value="null">Null</option>
                <option value="christmas">Viajes Fin de Año 2021</option>
                <option value="easter">Tours En Semana Santa 2021</option>
                <option value="Offers">Promociones de Viajes</option>
                <option value="Cruceros-Nilo">Cruceros Nilo</option>
            </select>
            <span id="name-error" class="validate-has-error">{{ $errors->first('hot', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('viewInSite') ? ' has-error validate-has-error' : '' }} ">
        <label for="viewInSite" class="col-sm-3 control-label">view In Site</label>
        <div class="col-sm-5">
                <div class="radio">
                    <label class="col-sm-2 control-label">
                        <input type="radio" name="viewInSite" id="0" value="0" > Off
                    </label>
                    <label class="col-sm-2 control-label">
                        <input type="radio" name="viewInSite" id="1" value="1" checked=""> On
                    </label>
                </div>
            <span id="name-error" class="validate-has-error">{{ $errors->first('viewInSite', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('landingTitel') ? ' has-error validate-has-error' : '' }} ">
        <label for="landingTitel" class="col-sm-2 control-label">Landing Titel</label>
        <div class="col-sm-8">
            <input name="landingTitel" id="landingTitel" type="text" class="form-control" value="{{ old('landingTitel') }}">
            <span id="name-error" class="validate-has-error">{{ $errors->first('landingTitel', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('metaTitle') ? ' has-error validate-has-error' : '' }} ">
        <label for="metaTitle" class="col-sm-2 control-label">Meta Title</label>
        <div class="col-sm-8">
            <input name="metaTitle" id="metaTitle" type="text" class="form-control" value="{{ old('metaTitle') }}">
            <span id="name-error" class="validate-has-error">{{ $errors->first('metaTitle', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('metaKeywords') ? ' has-error validate-has-error' : '' }} ">
        <label for="metaKeywords" class="col-sm-2 control-label">Meta Keywords</label>
        <div class="col-sm-8">
            <input name="metaKeywords" id="metaKeywords" type="text" class="form-control"
                value="{{ old('metaKeywords') }}">
            <span id="name-error" class="validate-has-error">{{ $errors->first('metaKeywords', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('metaDescription') ? ' has-error validate-has-error' : '' }} ">
        <label for="metaDescription" class="col-sm-2 control-label">Meta Description</label>
        <div class="col-sm-8">
            <input name="metaDescription" id="metaDescription" type="text" class="form-control"
                value="{{ old('metaDescription') }}">
            <span id="name-error" class="validate-has-error">{{ $errors->first('metaDescription', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('order') ? ' has-error validate-has-error' : '' }} ">
        <label for="order" class="col-sm-2 control-label">Order</label>
        <div class="col-sm-8">
            <input name="order" id="order" type="text" class="form-control" value="{{ old('order') }}">
            <span id="name-error" class="validate-has-error">{{ $errors->first('order', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('slug') ? ' has-error validate-has-error' : '' }} ">
        <label for="slug" class="col-sm-2 control-label">Page URL (Slug)</label>
        <div class="col-sm-8">
            <input name="slug" id="slug" type="text" class="form-control" value="{{ old('slug') }}">
            <span id="name-error" class="validate-has-error">{{ $errors->first('slug', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('mainImage') ? ' has-error validate-has-error' : '' }} ">
        <label class="col-sm-2 control-label">Main Image</label>
        <div class="col-sm-8">
            <input name="mainImage" id="mainImage" type="file" class="form-control">
            <span id="name-error" class="validate-has-error">@lang('lang.Image') : 1400*470 pixels</span><br>
            <span id="name-error" class="validate-has-error">{{ $errors->first('mainImage', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('altMain') ? ' has-error validate-has-error' : '' }} ">
        <label for="altMain" class="col-sm-2 control-label">Alt for Main Image</label>
        <div class="col-sm-8">
            <input name="altMain" id="altMain" type="text" class="form-control" value="{{ old('altMain') }}">
            <span id="name-error" class="validate-has-error">{{ $errors->first('altMain', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('shortImage') ? ' has-error validate-has-error' : '' }}">
        <label class="col-sm-2 control-label">Short Image</label>
        <div class="col-sm-8">
            <input name="shortImage" id="shortImage" type="file" class="form-control">
            <span id="name-error" class="validate-has-error">@lang('lang.Image') : 800*533 pixels</span><br>
            <span id="name-error" class="validate-has-error">{{ $errors->first('shortImage', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('altShort') ? ' has-error validate-has-error' : '' }} ">
        <label for="altShort" class="col-sm-2 control-label">Alt for Short Image</label>
        <div class="col-sm-8">
            <input name="altShort" id="altShort" type="text" class="form-control" value="{{ old('altShort') }}">
            <span id="name-error" class="validate-has-error">{{ $errors->first('altShort', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('name') ? ' has-error validate-has-error' : '' }} ">
        <label for="name" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-8">
            <input name="name" id="name" type="text" class="form-control" value="{{ old('name') }}">
            <span id="name-error" class="validate-has-error">{{ $errors->first('name', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('tourType') ? ' has-error validate-has-error' : '' }} ">
        <label for="tourType" class="col-sm-2 control-label">Tour Type</label>
        <div class="col-sm-8">
            <input name="tourType" id="tourType" type="text" class="form-control" value="{{ old('tourType') }}">
            <span id="name-error" class="validate-has-error">{{ $errors->first('tourType', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('duration') ? ' has-error validate-has-error' : '' }} ">
        <label for="duration" class="col-sm-2 control-label">Duration</label>
        <div class="col-sm-8">
            <input name="duration" id="duration" type="text" class="form-control" value="{{ old('duration') }}">
            <span id="name-error" class="validate-has-error">{{ $errors->first('duration', ':message') }}</span>
        </div>
    </div>
    <div class="form-group {{ $errors->has('tourRun') ? ' has-error validate-has-error' : '' }} ">
        <label for="tourRun" class="col-sm-2 control-label">Tour Run</label>
        <div class="col-sm-8">
            <input name="tourRun" id="tourRun" type="text" class="form-control" value="{{ old('tourRun') }}">
            <span id="name-error" class="validate-has-error">{{ $errors->first('tourRun', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('stars') ? ' has-error validate-has-error' : '' }} ">
        <label for="stars" class="col-sm-2 control-label">Stars</label>
        <div class="col-sm-8">
            <input name="stars" id="stars" type="text" class="form-control" value="{{ old('stars') }}">
            <span id="name-error" class="validate-has-error">{{ $errors->first('stars', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('starsNum') ? ' has-error validate-has-error' : '' }} ">
        <label for="starsNum" class="col-sm-2 control-label">Stars Number</label>
        <div class="col-sm-8">
            <input name="starsNum" id="starsNum" type="text" class="form-control" value="{{ old('starsNum') }}">
            <span id="name-error" class="validate-has-error">{{ $errors->first('starsNum', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('startPrice') ? ' has-error validate-has-error' : '' }} ">
        <label for="startPrice" class="col-sm-2 control-label">Start Price</label>
        <div class="col-sm-8">
            <input name="startPrice" id="startPrice" type="text" class="form-control" value="{{ old('startPrice') }}">
            <span id="name-error" class="validate-has-error">{{ $errors->first('startPrice', ':message') }}</span>
        </div>
    </div>

    <div class="form-group">
        <label for="pricingTemplate" class="col-sm-2 control-label">Pricing Templates</label>
        <div class="col-sm-8">
            <input type="text" name="Select Templates" class="form-control" id="template_name" autocomplete="off">
        </div>
    </div>

    <div class="form-group">
        <div class="container">

            <div class="widget-title">
                <h4>Pricing Templates selected</h4>
              </div>
                <div class="widget-body form">
                         <div id="rleatedPrograms"></div>
                         <ul id="added_programs">
                          <?php
                        if(!empty($pricingTemplatesID) || isset($pricingTemplatesID)){
                                 $count_items = 1;
                                 foreach($pricingTemplatesID as $pricetemplate){
                                 ?>
                                     <li id="prog_id_<?php echo $pricetemplate['pricing_template']['id'];?>">
                                        <?php echo $pricetemplate['pricing_template']['name'];?>
             <input type="text" class="span1" name="PricingTemplatesPackagesOrder[<?php echo $pricetemplate['pricing_template_package_id']; ?>]" value="<?php echo (empty($pricetemplate['order'])) ? "0" : $pricetemplate['order']; ?>" id="order_<?php echo $pricetemplate['id']; ?>">
             <a href="#" onclick="deleteProgamID(<?php echo $pricetemplate['pricing_template']['id'];?>);return false;">[X]</a>
                                        <input name="pricingTemplates[<?php echo $count_items; ?>]" type="hidden" value="<?php echo $pricetemplate['pricing_template']['id'];?>">
                                     </li>
                                <?php
                            $count_items++;
                                }
                            }
                                 ?>
                         </ul>
                </div>
        </div>
    </div>

    <div class="form-group {{ $errors->has('discount') ? ' has-error validate-has-error' : '' }} ">
        <label for="discount" class="col-sm-2 control-label">Discount</label>
        <div class="col-sm-8">
            <input name="discount" id="discount" type="text" class="form-control" value="{{ old('discount') }}">
            <span id="name-error" class="validate-has-error">{{ $errors->first('discount', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('description') ? ' has-error validate-has-error' : '' }} ">
        <label for="description" class="col-sm-2 control-label">Description</label>
        <div class="col-sm-8">
            <textarea name="description" id="description" type="text"
                class="form-control ">{{ old('description') }}</textarea>
            <span id="name-error" class="validate-has-error">{{ $errors->first('description', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('shortDescription') ? ' has-error validate-has-error' : '' }} ">
        <label for="shortDescription" class="col-sm-2 control-label">Short Description</label>
        <div class="col-sm-8">
            <textarea name="shortDescription" id="shortDescription" type="text" class="form-control " >{{ old('shortDescription') }}</textarea>
            <span id="name-error" class="validate-has-error">{{ $errors->first('shortDescription', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('itinerary') ? ' has-error validate-has-error' : '' }} ">
        <label for="itinerary" class="col-sm-2 control-label">Itinerary</label>
        <div class="col-sm-8">
            <textarea name="itinerary" id="itinerary" type="text"
                class=" form-control">{{ old('itinerary') }}</textarea>
            <span id="name-error" class="validate-has-error">{{ $errors->first('itinerary', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('price') ? ' has-error validate-has-error' : '' }} ">
        <label for="price" class="col-sm-2 control-label">Price</label>
        <div class="col-sm-8">
            <textarea name="price" id="price" type="text" class=" form-control">{{ old('price') }}</textarea>
            <span id="name-error" class="validate-has-error">{{ $errors->first('price', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('Inclusions') ? ' has-error validate-has-error' : '' }} ">
        <label for="Inclusions" class="col-sm-2 control-label">Inclusions</label>
        <div class="col-sm-8">
            <textarea name="Inclusions" id="Inclusions" type="text"
                class="form-control ">{{ old('Inclusions') }}</textarea>
            <span id="name-error" class="validate-has-error">{{ $errors->first('Inclusions', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->has('Exclusions') ? ' has-error validate-has-error' : '' }} ">
        <label for="Exclusions" class="col-sm-2 control-label">Exclusions</label>
        <div class="col-sm-8">
            <textarea name="Exclusions" id="Exclusions" type="text"
                class="form-control ">{{ old('Exclusions') }}</textarea>
            <span id="name-error" class="validate-has-error">{{ $errors->first('Exclusions', ':message') }}</span>
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

@endsection

@section('js')
<!-- include summernote css/js -->
<link rel="stylesheet" href="{{ asset('admin/js/dist/summernote.css')}}">
<link rel="stylesheet" href="{{ asset('admin/css/jquery.autocomplete.css') }}">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="{{ asset('admin/js/dist/summernote.js')}}"></script>
{{-- <script src="{{ asset('/front/js/jquery-ui.js')}}"></script> --}}
{{-- <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> --}}
{{-- <script src="{{ asset('/front/js/jquery-ui.multidatespicker.js')}}"></script> --}}
<script>
    $(document).ready(function () {
        $('#description').summernote();
        $('#shortDescription').summernote();
        $('#itinerary').summernote();
        $('#price').summernote();
        $('#Inclusions').summernote();
        $('#Exclusions').summernote();
        $('#datePick').multiDatesPicker({
            'altField' : '#runs_on',
            dateFormat: 'dd/mm/yy',
        });
    });

</script>

<script type="text/javascript">

    $(document).ready(function(){

      $( "#template_name" ).autocomplete({
         source: function( request, response ) {
            // Fetch data
            $.ajax({
              url:"{{url('getPricingTemplates')}}",
              type: 'GET',
              dataType: "json",
              data: {
                 search: request.term
              },
              success: function( data ) {
                 response( data );
              }
            });
         },
         select: function (event, data, formatted) {
            let items = data.item;
            console.log(items);
            jQuery("#template_name").val(items.label);
            jQuery("#pricing_template_id").val(items.value);
            var current_count = jQuery("#added_programs li").length + 1;
            var new_program = "<li id='prog_id_"+items.value+"'>"+items.label+" <a href='#' onClick='deleteProgamID(\""+items.value+"\");return false;'>[X]</a><input name='pricingTemplates["+current_count+"]' type='hidden' value='"+items.value+"'></li>";
            jQuery("#added_programs").append(new_program);
            jQuery("#template_name").val('');
           return false;
         }
      });

    });
    function deleteProgamID(id){
         jQuery("#prog_id_"+id).remove();
    }
</script>
@stop
