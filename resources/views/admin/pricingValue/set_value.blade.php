@extends('admin.layouts.app')
@section('title', __('Set Value'))
@section('content')


<div class="widget">
    <div class="widget-title">
        <h4>Set Values</h4>
    </div>
    <div class="widget-body">
        <form action="{{url('/set_values/'.$id)}}"  method="POST">
            {{ csrf_field() }}
            <input type="hidden" value="{{ $id }}">
            <?php
            $pricingTemplatesCounter = 0;
            $PricingNameCount = 0;

            echo  "<div class='caption' ><h3># Start Price ";
            echo  "<span class='minprice' id='minprice_".$id."'>".$startPrice."</span></h3></div>";

            while($pricingTemplatesCounter < count($allPricingValuesArray)) { ?>
                <?php
                //Show Caption For Edit
                //if($temp1[$PricingNameCount]['PricingTemplatesProgram']['show_caption'] != 1){  //} ?>

                <div class="price">
                    <?php
                    echo  "<h3>".'#'.($PricingNameCount+1).' '.$temp1[$PricingNameCount]['pricing_templates']['name']."</h3>";


                    ?>
                    <div class='caption_<?php echo $temp1[$PricingNameCount]['id']; ?>'><h5>#  Hotels Names</h5>
                        <textarea rows="5" class="form-control ckeditor" name="PricingTemplatesPackage[<?php echo $temp1[$PricingNameCount]['id']; ?>]"><?php echo $temp1[$PricingNameCount]['caption']; ?></textarea><br><hr>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input3">Hotels</label>
                        <div class="controls">
                            <div class="input select">
                                <input type="hidden" name="PricingTemplatesPackageHotels[<?php echo $temp1[$PricingNameCount]['id']?>]" value>
                                <select class="form-select" name="PricingTemplatesPackageHotels[<?php echo $temp1[$PricingNameCount]['id']?>][]" multiple="multiple" aria-label="multiple select example" id="PricingTemplatesPackageHotels-<?php echo $temp1[$PricingNameCount]["id"]?>-<?php echo 'hotels' ?>" style="width:100%;height: 300px">
                                    @foreach ($hotels as $key=>$value)
                                        @php
                                            $selected =  explode(',', $temp1[$PricingNameCount]['hotels']);
                                        @endphp
                                        <option {{ in_array($key,$selected) ? "selected" : "" }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                      </div>
                    <?php
                    $PricingNameCount++;

                    echo '<table class="table">';
                    $currentPricingArray = $allPricingValuesArray[$pricingTemplatesCounter];

                    // output the columns
                    echo '<tr>';
                    foreach ($currentPricingArray[0] as $currentPricingArrayHeaders){
                        echo "<th>".$currentPricingArrayHeaders."</th>";
                    }
                    echo '</tr>';

                    // loop over all rows, output the row header and the rest as input (text for value and hidden field for id)
                    $i = 1;
                    while($i < count($currentPricingArray)) {
                        $oneRowArray = $currentPricingArray[$i];
                        echo '<tr>';
                        // output row names
                        echo '<td>'.$oneRowArray[0].'</td>';

                        $j = 1;
                        while($j < count($oneRowArray)) {
                            echo '<td>';

                            $pricingValueId = $oneRowArray[$j]['id'];
                            $pricingValueVal = $oneRowArray[$j]['value'];

                            echo '<input class="form-control" type="text" id="pricingValueVal'.$pricingValueId.'"
                                name="Values['.$pricingValueId.'][value]" value="'.$pricingValueVal.'"/>';
                            echo '<input class="form-control" type="hidden" id="pricingValueId'.$pricingValueId.'"
                                name="Values['.$pricingValueId.'][id]" value="'.$pricingValueId.'"/>';
                            echo '</td>';

                            $j++;
                        }

                        $i++;
                        echo '</tr>';
                    }
                    echo '</table>';
                    echo '<hr style="border-width:2px;">';
                    ?></div>

                <?php
                $pricingTemplatesCounter++;

            }
        ?>

<div class="form-action">
    <button type="submit" class="btn btn-lg btn-green btn-icon icon-left">
        @lang('Update Value')
        <i class="entypo-check"></i>
    </button>
   </div>
        </form>

    </div>
</div>
@endsection

@section('js')
    <!-- include summernote css/js -->
    <link rel="stylesheet" href="{{ asset('admin/js/dist/summernote.css')}}">
    <script src="{{ asset('admin/js/dist/summernote.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.ckeditor').summernote();
        });
    </script>
@stop
