<?php

namespace App\Http\Controllers;

use App\Model\Package;
use App\Model\Related;
use Illuminate\Http\Request;

class RelatedController extends Controller
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
        $Related = Related::where('blog_id',$id)->orderBy('order')->with('package')->get();
        $packages = Package::orderBy('order')->get();
        $blog_id = $id;
        return view('/admin/blogs.Related',compact('Related','blog_id','packages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (request('order')) {
            $request['order'] = request('blog_id').request('order');
        }
        $Related = $this->validate(request(), [
            'Package_id' => 'required',
            'order'      => 'required|numeric|unique:related',
        ]);

        $Related             = new Related;
        $Related->Package_id = request('Package_id');
        $Related->blog_id    = request('blog_id');
        $Related->order      = (int)request('order');
        $Related->save();
        return redirect('/admin/relatedPackage/'.$Related->blog_id)->with('success', trans('lang.saveb'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Related  $related
     * @return \Illuminate\Http\Response
     */
    public function show(Related $related)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Related  $related
     * @return \Illuminate\Http\Response
     */
    public function edit(Related $related,$id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Related  $related
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Related $related)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Related  $related
     * @return \Illuminate\Http\Response
     */
    public function destroy(Related $related,$id)
    {
        $Related = Related::find($id);
        $Related->delete();
        return redirect('/admin/relatedPackage/'.$Related->blog_id)->with('success', trans('lang.delb'));
    }
}
