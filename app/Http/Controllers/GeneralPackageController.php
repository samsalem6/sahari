<?php

namespace App\Http\Controllers;

use App\Model\General;
use Illuminate\Http\Request;
use App\Model\GeneralPackage;

class GeneralPackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
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
    public function create($id)
    {
        $generalPackage = GeneralPackage::where('package_id',$id)->get();
        $General = General::get();
        $package_id = $id;
        return view('/admin/packages.generalPackage',compact('General','package_id','generalPackage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $generalPackage = $this->validate(request(), [
            'package_id'=>'required',
        ]);

        $generalPackage = new GeneralPackage;
        $generalPackage->general_id = request('general_id');
        $generalPackage->package_id = request('package_id');
        $generalPackage->save();
        return redirect('/admin/GeneralPackage/'.request('package_id'))->with('success', trans('lang.saveb'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\GeneralPackage  $generalPackage
     * @return \Illuminate\Http\Response
     */
    public function show(GeneralPackage $generalPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\GeneralPackage  $generalPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(GeneralPackage $generalPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\GeneralPackage  $generalPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GeneralPackage $generalPackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\GeneralPackage  $generalPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $generalPackage = GeneralPackage::where('id',$id)->first();
        $generalPackage->delete();
        return redirect('/admin/GeneralPackage/'.$generalPackage->package_id)->with('success', trans('lang.delb'));
    }
}
