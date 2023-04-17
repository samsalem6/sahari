@if(session('success'))
<div class="row alert">
    <div class="col-md-12">
        <a class="close" data-dismiss="alert" aria-hidden="true" data-rel="close"><i class="entypo-cancel"></i></a>
        <div class="alert alert-success"><strong> @lang('lang.success') </strong> <br>  {{session('success')}} </div>
    </div>
</div>
@endif


@if(session('errorss'))
<div class="row alert">
    <div class="col-md-12">
        <a class="close" data-dismiss="alert" aria-hidden="true" data-rel="close"><i class="entypo-cancel"></i></a>
        <div class="alert alert-warning"><strong> @lang('lang.errorss') </strong> <br>  {{session('errorss')}} </div>
    </div>
</div>
@endif
