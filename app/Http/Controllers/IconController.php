<?php

namespace App\Http\Controllers;

use App\Model\Icon;
use App\Model\Package;
use Illuminate\Http\Request;

class IconController extends Controller
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
    public function create($id)
    {
        $icons = Icon::where('package_id',$id)->get();
        $package_id = $id;
        return view('/admin/packages.icons',compact('icons','package_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $icon = $this->validate(request(), [
            'title' => 'required',
            'icon'=>'required',
            'package_id'=>'required',
        ]);

        $icon = new Icon;
        $icon->title = request('title');
        $icon->icon = request('icon');
        $icon->package_id = request('package_id');
        $icon->save();
        return redirect('/admin/icons/'.$icon->package_id)->with('success', trans('lang.saveb'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Icon  $icon
     * @return \Illuminate\Http\Response
     */
    public function show(Icon $icon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Icon  $icon
     * @return \Illuminate\Http\Response
     */
    public function edit(Icon $icon,$id)
    {
        $icon = Icon::where('id',$id)->first();
        $package_id = $id;
        return view('/admin/packages.iconse',compact('icon','package_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Icon  $icon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate(request(),[
            'icon'=>'required',
            'title'=>'required',
        ]);

        $icon = Icon::find($request->id);
        $icon->title = $request->title;
        $icon->icon = $request->icon;
        $icon->save();
        return redirect('/admin/icons/'.$icon->package_id)->with('success', trans('lang.saveb'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Icon  $icon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $icon = Icon::find($id);        
        $icon->delete();
        return redirect('/admin/icons/'.$icon->package_id)->with('success', trans('lang.delb'));
    }
}
