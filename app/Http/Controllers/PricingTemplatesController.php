<?php

namespace App\Http\Controllers;

use App\Model\ColumnsTemplates;
use App\Model\PricingTemplates;
use App\Model\PricingTemplatesPackages;
use App\Model\PricingValue;
use App\Model\RowsTemplates;
use Illuminate\Http\Request;

class PricingTemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $pricingTemplates = PricingTemplates::latest()->paginate(10);
        return view('admin.pricingTemplates.index', compact('pricingTemplates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pricingTemplates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'order'=> 'required'
        ]);
        // dd($request);
        // exit;
        $pricingTemplate = new PricingTemplates;

        $pricingTemplate->name =  request('name');
        $pricingTemplate->accommodation =  request('accommodation');
        $pricingTemplate->order =  request('order');
        $pricingTemplate->save();

        // dd($request['RowsTemplate']);
        // dd($pricingTemplate->id);
        // exit;
        if (isset($request['RowsTemplate'])) {
            $pricingTemplate->rowsTemplates()->delete();
            if ($request['RowsTemplate']) {
                foreach($request['RowsTemplate'] as $rows){
                    // $row = $pricingTemplate->rowsTemplates()
                    $row = new RowsTemplates;
                    $row->pricing_templates_id = $pricingTemplate->id;
                    $row->name = $rows['name'];
                    $row->order = $rows['order'];
                    $row->save();
                }
            }
        }

        if (isset($request['ColumnsTemplate'])) {
            $pricingTemplate->columnsTemplates()->delete();
            if ($request['ColumnsTemplate']) {
                foreach($request['ColumnsTemplate'] as $cols){
                    // $row = $pricingTemplate->rowsTemplates()
                    $col = new ColumnsTemplates;
                    $col->pricing_templates_id = $pricingTemplate->id;
                    $col->name = $cols['name'];
                    $col->order = $cols['order'];
                    $col->save();
                }
            }
        }
        return redirect('/pricing_template')->with('success', 'The New Pricing template Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PricingTemplates $pricingTemplate, RowsTemplates $rows, ColumnsTemplates $cols)
    {
        $rows = RowsTemplates::orderBy('order')->where('pricing_templates_id', $pricingTemplate->id)->get();
        $cols = ColumnsTemplates::orderBy('order')->where('pricing_templates_id', $pricingTemplate->id)->get();

        $pricingTemplateTableHeaders = array();
		$pricingTemplateRows = array();

        $pricingTemplateTableHeaders[0] = '';

        $i = 1;

        foreach($cols as $col) {

			$pricingTemplateTableHeaders[$i] = $col['name'];

			$i++;

		}
		$i = 0;
		foreach($rows as $row) {

			$pricingTemplateRows[$i] = array('0'=>$row['name']);

			$i++;

		}


        return view('admin.pricingTemplates.view', compact('pricingTemplate', 'rows', 'cols'))->with('rows', $pricingTemplateRows)->with('headers', $pricingTemplateTableHeaders);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PricingTemplates $pricingTemplate, RowsTemplates $rows, ColumnsTemplates $cols)
    {
        $rows = RowsTemplates::where('pricing_templates_id', $pricingTemplate->id)->get();
        $cols = ColumnsTemplates::where('pricing_templates_id', $pricingTemplate->id)->get();

        return view('admin.pricingTemplates.edit', compact('pricingTemplate', 'rows', 'cols'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PricingTemplates $pricingTemplate, RowsTemplates $rows)
    {
        $request->validate([
            'name'=> 'required',
            // 'accommodation'=> 'required',
            'order'=> 'required'
        ]);
        // dd($request);
        // exit;
        $pricingTemplate->update($request->all());
        // $pricingtp = PricingTemplates::findById($id)->firstOrFail();
        // dd($pricingTemplate);
        // dd($request->all());
        // exit;
        if(!empty($request)) {
            if (isset($request['RowsTemplate'])) {
                if ($request['RowsTemplate']) {
                    foreach($request['RowsTemplate'] as $key=>$rows){
                        $id = $request['RowsTemplate'][$key]['id'];
                        // dd($id);
                        // $row = $pricingTemplate->rowsTemplates()
                        if($id == -1){
                            $row = new RowsTemplates;
                            $row->pricing_templates_id = $pricingTemplate->id;
                            $row->name = $rows['name'];
                            $row->order = $rows['order'];
                            $row->save();
                        }
                        else {
                            $deleted = $request['RowsTemplate'][$key]['deleted'];

                            if($deleted == 0){
                                $row =  RowsTemplates::find($id);
                                // dd($row);
                                // $row->pricing_templates_id = $pricingTemplate->id;
                                $row->name = $rows['name'];
                                $row->order = $rows['order'];
                                $row->save();
                            } elseif($deleted == 1) {
                                // dd('deleted');
                                // exit;
                                PricingValue::where('rows_templates_id', $id)->delete();
                                if(RowsTemplates::find($id)->count()>0)
                                 RowsTemplates::find($id)->delete();

                            }
                        }


                    }
                }
            }

            if (isset($request['ColumnsTemplate'])) {
                if ($request['ColumnsTemplate']) {
                    foreach($request['ColumnsTemplate'] as $key=>$cols){

                        $id = $request['ColumnsTemplate'][$key]['id'];
                        if($id == -1) {
                            $col = new ColumnsTemplates;
                            $col->pricing_templates_id = $pricingTemplate->id;
                            $col->name = $cols['name'];
                            $col->order = $cols['order'];
                            $col->save();
                        }
                        else {
                            $deleted = $request['ColumnsTemplate'][$key]['deleted'];

                            if($deleted == 0) {
                                $col =  ColumnsTemplates::find($id);
                                $col->name = $cols['name'];
                                $col->order = $cols['order'];
                                $col->save();
                            } elseif($deleted == 1) {
                                PricingValue::where('columns_templates_id', $id)->delete();
                                if(ColumnsTemplates::find($id)->count()>0)
                                ColumnsTemplates::find($id)->delete();
                            }
                        }
                    }
                }
            }
        }

        $allPricingTemplatePackages = PricingTemplatesPackages::where('pricing_templates_id',  $pricingTemplate->id)->get()->toArray();
        $allRows = RowsTemplates::where('pricing_templates_id', $pricingTemplate->id)->get()->toArray();
        $allCols = ColumnsTemplates::where('pricing_templates_id', $pricingTemplate->id)->get()->toArray();

        foreach($allRows as $currentRow) {
            foreach($allCols as $currentCol) {
                foreach($allPricingTemplatePackages as $PricingTemplatePackages) {
                    $rowId = $currentRow['id'];
					$colId = $currentCol['id'];
                    $PricingTemplatePackagesId = $PricingTemplatePackages['id'];
                    // dd($PricingTemplatePackagesId);
                    $testArray = PricingValue::all()->where('pricing_templates_packages_id', $PricingTemplatePackagesId)->where('rows_templates_id', $rowId)->where('columns_templates_id', $colId)->toArray();
                    // ->where('rows_templates_id', $rowId)
                    //                          ->where('columns_templates_id', $colId)
                    //                          ->where('pricing_templates_packages_id', $PricingTemplatePackagesId)->toArray();
                                        //   where(array('rows_templates_id'=> $rowId, 'columns_templates_id'=> $colId, 'pricing_templates_packages_id', $PricingTemplatePackagesId))->get()->toArray();

                                            //  dd($testArray);

                        if(empty($testArray)) {
                            $PricingValue = new PricingValue;
                            $PricingValue->value = 0;
                            $PricingValue->pricing_templates_packages_id = $PricingTemplatePackagesId;
                            $PricingValue->rows_templates_id = $rowId;
                            $PricingValue->columns_templates_id = $colId;
                            // dd($PricingValue);
                            // exit;
                            $PricingValue->save();
                            // dd($PricingValue);
                            // exit;
                        }
                }
            }
        }
        return redirect('/pricing_template')->with('success', 'The Pricing template Updated Successfully');
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

    public function getPricingTemplates(Request $request){
        $search = $request->search;

        // $query = $request->get('query');
        if($search == ''){
            $pricingTemp = PricingTemplates::orderby('name','asc')->select('id','name')->limit(5)->get();
        }else{
            $pricingTemp = PricingTemplates::orderby('name','asc')->select('id','name')->where('name', 'LIKE', '%' .$search. '%')->limit(10)->get();
        }

        $response = array();
        foreach($pricingTemp as $pt){
           $response[] = array("value"=>$pt->id,"label"=>$pt->name);
        }

        return response()->json($response);
     }
}
