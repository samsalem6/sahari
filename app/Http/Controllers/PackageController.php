<?php

namespace App\Http\Controllers;

use App\Model\ColumnsTemplates;
use App\Model\Hotels;
use App\Model\Package;
use App\Model\Destination;
use App\Model\Faq;
use App\Model\PricingTemplatesPackages;
use App\Model\PricingValue;
use App\Model\RelatedWiki;
use App\Model\RowsTemplates;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('all','destinations','allhotdeals','allcruzeiro','slugcruzeiro','slughotdeals','destination','slug','tourPackages','tourPackagesSlug','combinedTourSlug','combinedTour');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::orderBy('order')->with('destination')->paginate(6);
        return view('admin.packages.index')->with('packages', $packages);
    }

    public function allhotdeals()
    {
        $christmas = Package::where('landing',false)->where('viewInSite',true)->orderBy('order')->where('hot','christmas')->get();
        $easter = Package::where('landing',false)->where('viewInSite',true)->orderBy('order')->where('hot','easter')->get();
        $Offers= Package::orderBy('order')->where('viewInSite',true)->where('hot','Offers')->get();
        return view('hotdeals',compact('christmas','easter','Offers'));
    }

    public function slughotdeals($name)
    {
        $package = Package::where('landing',false)->where('viewInSite',true)->where('slug', $name)->whereIn('hot',['christmas','easter','Offers'])->with('icons')->firstOrFail();
        $pricingTemplates = $this->getPackagePricingTemplates($package->id);
        $package_prices = $this->getPackagePrices($package->id,$pricingTemplates);
        return view('package',compact('package', 'package_prices', 'pricingTemplates'));
    }

    public function tourPackages()
    {
        $packages = Package::where('landing',false)->where('viewInSite',true)->orderBy('order')->where('type','TravelPackages')->whereNull('hot')->get();
        return view('packages')->with('packages', $packages);
    }

    public function tourPackagesSlug($name)
    {
        $package = Package::where('landing',false)->where('viewInSite',true)->where('slug', $name)->where('type','TravelPackages')->with('icons')->firstOrFail();
        $pricingTemplates = $this->getPackagePricingTemplates($package->id);
        $package_prices = $this->getPackagePrices($package->id,$pricingTemplates);
        return view('package',compact('package', 'package_prices', 'pricingTemplates'));
    }

    public function combinedTour()
    {
        $packages = Package::where('landing',false)->where('viewInSite',true)->orderBy('order')->whereNull('hot')->where('type','combined')->get();
        return view('combineds')->with('packages', $packages);
    }

    public function allcruzeiro()
    {
        $packages = Package::where('landing',false)->where('viewInSite',true)->orderBy('order')->where('hot','Cruceros-Nilo')->get();
        return view('cruzeiros')->with('packages', $packages);
    }

    public function slugcruzeiro($name)
    {
        $package = Package::where('landing',false)->where('viewInSite',true)->where('slug', $name)->with('icons')->firstOrFail();
        $pricingTemplates = $this->getPackagePricingTemplates($package->id);
        $package_prices = $this->getPackagePrices($package->id,$pricingTemplates);
        return view('cruzeiro',compact('package', 'package_prices', 'pricingTemplates'));
    }

    public function combinedTourSlug($name)
    {
        $package = Package::where('landing',false)->where('viewInSite',true)->where('slug', $name)->where('type','combined')->whereNull('hot')->with('icons')->firstOrFail();
        $pricingTemplates = $this->getPackagePricingTemplates($package->id);
        $package_prices = $this->getPackagePrices($package->id,$pricingTemplates);
        return view('combined',compact('package', 'package_prices', 'pricingTemplates'));
    }

    public function destinations($slug)
    {
        $tdestinations = Destination::where('slug', $slug)->first();
        // dd($tdestinations);
        if ($tdestinations) {
            $packages = Package::where('landing',false)->where('viewInSite',true)->orderBy('order')->where('destination_id', $tdestinations->id)->whereNull('hot')->where('type','!=','combined')->with('icons')->get();
            $faqsDest = Faq::where('destination_id', $tdestinations->id)->get();
            return view('destinos',compact('packages','tdestinations', 'faqsDest'));
        } else {
            $package = Package::where('slug', $slug)->where('viewInSite',true)->with('icons')->firstOrFail();
            $pricingTemplates = $this->getPackagePricingTemplates($package->id);
            $package_prices = $this->getPackagePrices($package->id,$pricingTemplates);
            if ($package->landing == 1) {
                return view('landing',compact('package'));
            }else {
                return view('destino',compact('package', 'package_prices', 'pricingTemplates'));
            }
        }

    }

    public function destination($dest,$slug)
    {
        $package = Package::where('landing',false)->where('viewInSite',true)->where('slug', $slug)->where('type','!=','combined')->whereNull('hot')->with('icons')->firstOrFail();
        // $pricingTemplates = $this->getPackagePricingTemplates($package->id);
        // $package_prices = $this->getPackagePrices($package->id,$pricingTemplates);
        return view('destino',compact('package'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destinations = Destination::all();
        return view('/admin/packages.create',compact('destinations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'mainImage' => 'mimes:jpg,jpeg,gif,png,webp|max:2048',
            'shortImage' => 'mimes:jpg,jpeg,gif,png,webp|max:2048',
            'metaTitle'=>'required',
            'metaKeywords'=>'required',
            'metaDescription'=>'required',
            'order' => 'numeric|unique:packages',
            'slug'=>'required|unique:packages|alpha_dash|max:191',
            'name'=>'required',
            'stars'=>'required|numeric|min:1|max:5',
            'starsNum'=>'required|numeric|min:10',
            'startPrice'=>'required|numeric',
            'description'=>'required',
            // 'tourType'=>'required',
            // 'duration'=>'required',
            // 'itinerary'=>'required',
            // 'price'=>'required',
        ]);
        $package = new Package;
        if (request('mainImage')) {
            $imageemainImage = time() . 'packages1.' .request('mainImage')->getClientOriginalExtension();
            request('mainImage')->move(public_path('images/packages/'),$imageemainImage);
            $package->mainImage        = $imageemainImage;
        }

        if (request('shortImage')) {
            $imageeshortImage = time() . 'packages2.' .request('shortImage')->getClientOriginalExtension();
            request('shortImage')->move(public_path('images/packages/'),$imageeshortImage);
            $package->shortImage       = $imageeshortImage;
        }

        if ($request->inHome == 'on') {
            $package->inHome = true;
        }

        if ($request->landing == 'on') {
            $package->landing = true;
        }

        if (request('hot')=='null'){
            $package->hot = null;
        }else {
            $package->hot = request('hot');
        }

        if (request('viewInSite')=='1'){
            $viewInSite = 1;
        }else {
            $viewInSite = 0;
        }


        $package->viewInSite          = $viewInSite;
        $package->landingTitel          = request('landingTitel');
        $package->altMain          = request('altMain');
        $package->altShort         = request('altShort');
        $package->destination_id   = request('destination_id');
        $package->type             = request('type');
        $package->metaTitle        = request('metaTitle');
        $package->metaKeywords     = request('metaKeywords');
        $package->metaDescription  = request('metaDescription');
        $package->order            = request('order');
        $package->slug             = request('slug');
        $package->name             = request('name');
        $package->tourType             = request('tourType');
        $package->duration             = request('duration');
        $package->popular          = request('popular');
        $package->stars            = request('stars');
        $package->starsNum         = request('starsNum');
        $package->startPrice       = request('startPrice');
        $package->description      = request('description');
        $package->shortDescription = request('shortDescription');
        $package->Exclusions       = request('Exclusions');
        $package->Inclusions       = request('Inclusions');
        // $package->itinerary        = request('itinerary');
        $package->price            = request('price');
        $package->runs_on          = request('runs_on');
        $package->tourRun          = request('tourRun');
        $package->discount         = request('discount');
        $package->save();

        if(isset($request['pricingTemplates']) && is_array($request['pricingTemplates']))
        $selected_template_ids = implode(",",$request['pricingTemplates']);
        else
        $selected_template_ids ="";
    if(!empty($selected_template_ids)) {
        $delete_pricing_templates_package_ids = PricingTemplatesPackages::all()->where('package_id', $package->id)
        ->whereNotIn("pricing_templates_id", $request['pricingTemplates'])->pluck('id')->toArray();
        // dd($request['pricingTemplates']);
        // dd( $delete_pricing_templates_package_ids);
        // exit;
        if(!empty($delete_pricing_templates_package_ids)) {
            // dd( $delete_pricing_templates_package_ids);
        // exit;
            PricingTemplatesPackages::whereIn('id', $delete_pricing_templates_package_ids)->delete();
            PricingValue::whereIn('pricing_templates_packages_id', $delete_pricing_templates_package_ids)->delete();

        }
    } else {
        PricingTemplatesPackages::where('package_id', $package->id)->delete();
    }
    $current_pricing_template = PricingTemplatesPackages::all()->keyBy('pricing_templates_id')->where('package_id', $package->id)->toArray();
    // dd($current_pricing_template);
    //             exit;
            if(isset($request['PricingTemplatesPackagesOrder'])) {
                if($request['PricingTemplatesPackagesOrder']) {
                    foreach($request['PricingTemplatesPackagesOrder'] as $pricingTemplatePackageId=>$order) {
                        $pricingPackage =  PricingTemplatesPackages::find($pricingTemplatePackageId);
                        $pricingPackage->order = $order;
                        $pricingPackage->save();

                    }
                }
            }

            if(isset($request['pricingTemplates']) && is_array($request['pricingTemplates']))
     {
         foreach($request['pricingTemplates'] as $mult_Pricing_id){

            if(!in_array($mult_Pricing_id,array_keys($current_pricing_template))) {

                $pricingTemplatePackage= new PricingTemplatesPackages;
                 $pricingTemplatePackage->pricing_templates_id = $mult_Pricing_id;
                 $pricingTemplatePackage->package_id = $package->id;
                 $pricingTemplatePackage->save();
                 $this->setEmptyPricingValues($mult_Pricing_id, $pricingTemplatePackage->id);
            }

         }
     }

        return redirect('/admin/packages')->with('success', trans('lang.saveb'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        $destinations = Destination::all();
        $pricingTemplatesID = $this->pricingTemplatesPrograms($package->id);
        return view('admin.packages.edit',compact('package','destinations', 'pricingTemplatesID'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        $this->validate(request(),[
            'mainImage' => 'mimes:jpg,jpeg,gif,png|max:2048',
            'shortImage' => 'mimes:jpg,jpeg,gif,png|max:2048',
            'metaTitle'=>'required',
            'metaKeywords'=>'required',
            'metaDescription'=>'required',
            'slug'=>'required|alpha_dash|max:191|unique:packages,slug,'.$package->id,
            'order'=>'numeric|unique:packages,order,'.$package->id,
            'name'=>'required',
            'stars'=>'required|numeric|min:1|max:5',
            'starsNum'=>'required|numeric|min:10',
            'startPrice'=>'required|numeric',
            'description'=>'required',
            // 'tourType'=>'required',
            // 'duration'=>'required',
            // 'itinerary'=>'required',
            // 'price'=>'required',
        ]);

        $package = Package::find($package->id);
        if (request('mainImage')){
            \File::delete(public_path('/images/packages/'.$package->mainImage));
        $imageemainImage = time() . 'packages1.' .request('mainImage')->getClientOriginalExtension();
        request('mainImage')->move(public_path('images/packages/'),$imageemainImage);
        $package->mainImage = $imageemainImage;

        }
        if (request('shortImage')){
            \File::delete(public_path('/images/packages/'.$package->shortImage));

            $imageeshortImage = time() . 'packages2.' .request('shortImage')->getClientOriginalExtension();
            request('shortImage')->move(public_path('images/packages/'),$imageeshortImage);
            $package->shortImage = $imageeshortImage;
        }

        if ($request->inHome == 'on') {
            $package->inHome = true;
        }else{
            $package->inHome = false;
        }

        if ($request->landing == 'on') {
            $package->landing = true;
        }else{
            $package->landing = false;
        }

        if (request('type')==null) {
            $package->popular = null;
        }else{
            $package->popular = request('popular');
        }

        if (request('hot')=='null'){
            $package->hot = null;
        }else {
            $package->hot = request('hot');
        }
        if (request('viewInSite')=='1'){
            $viewInSite = 1;
        }else {
            $viewInSite = 0;
            $Related = RelatedWiki::where('Package_id',$package->id)->get();
            if (count($Related)>0) {
                foreach ($Related as $p) {
                    // code
                    $p->delete();
                    }
            }
        }

        $package->landingTitel          = request('landingTitel');
        $package->altMain          = request('altMain');
        $package->altShort         = request('altShort');
        $package->metaTitle        = request('metaTitle');
        $package->metaKeywords     = request('metaKeywords');
        $package->metaDescription  = request('metaDescription');
        $package->destination_id   = request('destination_id');
        $package->type             = request('type');
        $package->slug             = request('slug');
        $package->order            = request('order');
        $package->name             = request('name');
        $package->tourType             = request('tourType');
        $package->duration             = request('duration');
        $package->stars            = request('stars');
        $package->starsNum         = request('starsNum');
        $package->startPrice       = request('startPrice');
        $package->description      = request('description');
        $package->shortDescription = request('shortDescription');
        $package->Exclusions       = request('Exclusions');
        $package->Inclusions       = request('Inclusions');
        $package->viewInSite       = $viewInSite;
        // $package->itinerary        = request('itinerary');
        $package->price            = request('price');
        $package->runs_on          = request('runs_on');
        $package->tourRun          = request('tourRun');
        $package->discount         = request('discount');
        $package->save();

        
     if(isset($request['pricingTemplates'])) {

        if(isset($request['pricingTemplates']) && is_array($request['pricingTemplates']))
            $selected_template_ids = implode(",",$request['pricingTemplates']);
            else
            $selected_template_ids ="";
        if(!empty($selected_template_ids)) {
            $delete_pricing_templates_package_ids = PricingTemplatesPackages::all()->where('package_id', $package->id)
            ->whereNotIn("pricing_templates_id", $request['pricingTemplates'])->pluck('id')->toArray();
            if(!empty($delete_pricing_templates_package_ids)) {
                PricingTemplatesPackages::whereIn('id', $delete_pricing_templates_package_ids)->delete();
                PricingValue::whereIn('pricing_templates_packages_id', $delete_pricing_templates_package_ids)->delete();

            }
        } else {
            PricingTemplatesPackages::where('package_id', $package->id)->delete();

        }
        $current_pricing_template = PricingTemplatesPackages::where('package_id', $package->id)->get()->keyBy('pricing_templates_id')->toArray();
        // dd($current_pricing_template);
                if(isset($request['PricingTemplatesPackagesOrder'])) {
                    if($request['PricingTemplatesPackagesOrder']) {
                        foreach($request['PricingTemplatesPackagesOrder'] as $pricingTemplatePackageId=>$order) {
                            $pricingPackage =  PricingTemplatesPackages::find($pricingTemplatePackageId);
                            $pricingPackage->order = $order;
                            $pricingPackage->save();

                        }
                    }
                }

                if(isset($request['pricingTemplates']) && is_array($request['pricingTemplates']))
         {
             foreach($request['pricingTemplates'] as $mult_Pricing_id){
                // dd($current_pricing_template);
                if(!in_array($mult_Pricing_id,array_keys($current_pricing_template))) {
                    $pricingTemplatePackage= new PricingTemplatesPackages;
                    // dd($pricingTemplatePackage);
                     $pricingTemplatePackage->pricing_templates_id = $mult_Pricing_id;
                     $pricingTemplatePackage->package_id = $package->id;
                     $pricingTemplatePackage->save();
                    // $current_pricing_template = PricingTemplatesPackages::where('package_id', $package->id)->get()->keyBy('pricing_templates_id')->toArray();
                     $this->setEmptyPricingValues($mult_Pricing_id, $pricingTemplatePackage->id);
                }

             }
         }

    }

        return redirect('/admin/packages')->with('success', trans('lang.saveb'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        $package = Package::find($package->id);
        $Related = RelatedWiki::where('Package_id',$package->id)->get();
        if (count($Related)>0) {
            foreach ($Related as $p) {
                // code
                $p->delete();
                }
        }

        \File::delete(public_path('/images/packages/'.$package->mainImage));
        \File::delete(public_path('/images/packages/'.$package->shortImage));
        $package->delete();

        return redirect('/admin/packages')->with('success', trans('lang.delb'));
    }

    public function pricingTemplatesPrograms($package_id){


        return PricingTemplatesPackages::join('pricing_templates', 'pricing_templates.id', '=', 'pricing_templates_packages.pricing_templates_id')
            ->orderBy('pricing_templates.order', 'asc')
         ->where(array('package_id'=>$package_id))->get(['pricing_templates.id', 'pricing_templates.name',
          'pricing_templates_packages.order','pricing_templates_packages.id as pricing_template_package_id', 'pricing_templates_packages.package_id']);
    }

    public function setEmptyPricingValues($pricingTemplateId, $pricingTemplatePackageId) {

        $allRows = RowsTemplates::where('pricing_templates_id', $pricingTemplateId)->get();
        $allCols = ColumnsTemplates::where('pricing_templates_id', $pricingTemplateId)->get();
        // dd($allRows);
        // exit;
        foreach($allRows as $currentRow){
            foreach($allCols as $currentCol) {
                $rowId = $currentRow['id'];
                $colId = $currentCol['id'];
    
                $PricingValue = new PricingValue;
                $PricingValue->value = 0;
                $PricingValue->pricing_templates_packages_id = $pricingTemplatePackageId;
                $PricingValue->rows_templates_id = $rowId;
                $PricingValue->columns_templates_id = $colId;
                $PricingValue->save();
            }
        }
       }

       public function getPackagePricingTemplates($package_id){
        return PricingTemplatesPackages::with('pricingTemplates')->with('pricingTemplates.columnsTemplates')->with('pricingTemplates.rowsTemplates')
            ->orderBy('order', 'asc')
            ->where('package_id','=',$package_id)
            ->get()->toArray();
    }

    public function getPackagePrices($package_id,$pricingTemplates){
        //defining result array
        $allResults = array();

        // array for holding pricing templates names
        $pricingTemplatesNames = array();
        $namesCounter = 0;

        // initialize array to hold all schedules, each of its entries (one per pricing template) will be an array where the
        // first entry refers to the headers, and the rest to the values.
        $allPricingTablesArray = array();
        $allCounter = 0;

        // loop over all pricing templates, and get pricing schedules for each one.
        foreach($pricingTemplates as $pricingTemplate) {
            // get pricing template id
            $pricingTemplateId = $pricingTemplate['pricing_templates_id'];
            // add pricing template name
            $pricingTemplatesNames[$namesCounter] = $pricingTemplate['pricing_templates']['name'];
            $namesCounter++;

            // initialize the array holding all data for the current pricing template
            $currentPricingArray = array();

            // initialize counter for each entry from 1, as 0 will be reserved for the headers
            $currentCount = 1;

            // get all rows
            $rows = $pricingTemplate['pricing_templates']['rows_templates'];

            // get all columns
            $cols = $pricingTemplate['pricing_templates']['columns_templates'];

            // get all pricing values
            $values = $this->findAllPricingValuesByPricingTemplateId($pricingTemplateId,$package_id);
            if (!empty($pricingTemplate['hotels'])) {
                $hotelArray = explode(',', $pricingTemplate['hotels']);
				$all_hotels = array();
                foreach($hotelArray as $id=>$value){
                    $hotel = Hotels::where('id', $value)->get();
                    $all_hotels[] = $hotel;
                    // dd();
                }
                $currentPricingArray["Hotels"] = $all_hotels;
                

             }
            foreach($values as $value){
                $currentPricingArray['PricesValues'][$value["ColName"]][] = array(
                    'value' => $value["Value"],
                    'text' =>$value["RowName"]
                );
            }

            $allPricingTablesArray[$allCounter] = $currentPricingArray;
            $allCounter++;
        }
        $allResults['allPricingTablesArray'] = $allPricingTablesArray;
        $allResults['names'] = $pricingTemplatesNames;

        return $allResults;
    }

    function findAllPricingValuesByPricingTemplateId($pricingTemplateId,$package_id) {
        $pricing_templates_packages= PricingTemplatesPackages::where(array('package_id'=>$package_id,"pricing_templates_id"=>$pricingTemplateId))->first()->toArray();

        $resultValues= PricingValue::join('rows_templates', 'rows_templates.id', '=', 'pricing_values.rows_templates_id')
            ->join('columns_templates', 'columns_templates.id', '=', 'pricing_values.columns_templates_id')->where('pricing_templates_packages_id', $pricing_templates_packages['id'])
            ->orderBy('rows_templates.order', 'asc')->orderBy('columns_templates.order', 'asc')
            ->get(['rows_templates.name as RowName', 'rows_templates.order as RowOrder',
                'columns_templates.name as ColName', 'columns_templates.order as ColOrder','pricing_values.value as Value'])->toArray();
        return $resultValues;
    }

}
