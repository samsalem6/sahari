<?php

namespace App\Http\Controllers;

use App\Model\Hotels;
use App\Model\Package;
use App\Model\PricingTemplatesPackages;
use App\Model\PricingValue;
use Illuminate\Http\Request;

class PricingValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function set_value(Request $request, $id = null)
    {

        $tmp = Package::select('startPrice')->where('id', $id)->first();
			if(isset($request['Values'])) {
				foreach($request['Values'] as $value) {
					$comp = PricingValue::select('value')->where('id', $value['id'])->first();
					$pricing_value= PricingValue::find($value['id']);
					$pricing_value->value=$value['value'];
					$pricing_value->save();
				}

			}

            if(isset($request['PricingTemplatesPackage'])) {
                foreach($request['PricingTemplatesPackage'] as $id=>$value) {
                    $pricing_template_program = PricingTemplatesPackages::find($id);
                    $pricing_template_program->caption=$value;
                    $pricing_template_program->save();
                }
            }

            if(isset($request['PricingTemplatesPackageHotels']) && !empty($request['PricingTemplatesPackageHotels'])) {
                foreach($request['PricingTemplatesPackageHotels'] as $id=>$value) {
                    if (!empty($value)) {
                        $hotelArray = implode(",", $value);
                        $pricing_template_program = PricingTemplatesPackages::find($id);
                        $pricing_template_program->hotels = $hotelArray;
                        $pricing_template_program->save();
                    }
                    
                }
            }

            // $hotels = Hotels::all(array('id','name'))->toArray();
            $hotels = Hotels::pluck('name','id')->toArray();
            // dd($hotels);

            $data = PricingTemplatesPackages::orderby('order')->where('package_id', $id)->get();

            $allPricingValuesArray = array();
			$allPricingValuesArrayCounter = 0;

            // loop over all pricing templates program
			foreach($data as $currentDataArrayEntry) {
				// get all values ordered by row and column, for the current pricing template program
				$orderedValues = PricingValue::findOrderedValuesByPricingTemplatePackage($currentDataArrayEntry['id']);
                // dd($orderedValues);
                // exit;
				// initialize inner array which contains headers as its first entry and then every row as an entry
				$currentPricingValueArray = array();
				$currentPricingValueArrayCounter = 1; // as 0 will be assigned to the columns

				// get row names
				$rowNames = PricingValue::findRowNamesByPricingTemplatePackage($currentDataArrayEntry['id']);
				$rowsCount = count($rowNames);
				// loop to get all columns
                //dd($rowNames);
				if($rowsCount>0)
				    $colCount = count($orderedValues) / $rowsCount;
                else
				    $colCount=0;

				$columnsArray = array();
				$columnsArray[0] = '&nbsp;';

				$c = 0;
				while($c < $colCount) {
					$columnsArray[$c+1] = $orderedValues[$c]['ColName'];
					$c++;
				}

				$currentPricingValueArray[0] = $columnsArray;

				// loop to get an entry for each row, with the row name and the values
				$r = 0;
				while($r < count($orderedValues)) {
					// initialize the one row array and fill the first entry
					if($r % $colCount == 0) {
						$oneRowArray = array(); // array representing one row
						$oneRowArray[0] = $rowNames[$r / $colCount]['rowsName']; // first entry is the row name
					}
					// fill the entries using the loop counter and the col counter
					$oneRowArray[($r % $colCount) + 1]['value'] = $orderedValues[$r]['PricingValue'];
					$oneRowArray[($r % $colCount) + 1]['id'] = $orderedValues[$r]['PricingValueId'];

					$r++;// increment the counter

					// check if the array is completed to save it and start the next
					if($r % $colCount == 0) {
						// adding the row to the current pricing array
						$currentPricingValueArray[$currentPricingValueArrayCounter] = $oneRowArray;
						$currentPricingValueArrayCounter++;
					}
				}

				// add current pricing array to the all pricing array
				$allPricingValuesArray[$allPricingValuesArrayCounter] = $currentPricingValueArray;
				$allPricingValuesArrayCounter++;
			}

            $temp1 = PricingTemplatesPackages::with('pricingTemplates')->where(array('package_id'=>$id))->orderby('pricing_templates_packages.order','asc')->get()->toArray();
            // $temp1 = PricingTemplatesPackages::join('pricing_templates', 'pricing_templates.id', '=', 'pricing_templates_packages.pricing_templates_id')->where(array('package_id'=>$id))->get(['pricing_templates.id', 'pricing_templates.name']);
			if($request->all()){
                return redirect('/admin/packages')->with('success', trans('lang.saveb'));
            }else{
			    return view('admin.pricingValue.set_value', ['startPrice' => $tmp->startPrice,'temp1'=>$temp1,'allPricingValuesArray'=>$allPricingValuesArray,'hotels'=>$hotels,'id'=>$id]);
            }

    }
}
