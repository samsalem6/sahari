<?php

namespace App\Http\Controllers;

use App\Model\General;
use Illuminate\Http\Request;

class GeneralController extends Controller
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
        $generals = General::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.generals.index')->with('generals', $generals) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/generals.create');
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
            'title'=>'required|max:150',
            'body'=>'required',
        ]);

        $general = new General;
        $general->title = request('title');
        $general->body = request('body');
        $general->save();

        return redirect('/admin/generals')->with('success', trans('lang.saveb'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\General  $general
     * @return \Illuminate\Http\Response
     */
    public function show(General $general)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\General  $general
     * @return \Illuminate\Http\Response
     */
    public function edit(General $general)
    {
        $general = General::find($general->id);
        return view('admin.generals.edit',compact('general'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\General  $general
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, General $general)
    {
        $this->validate(request(),[
            'title'=>'required|max:150',
            'body'=>'required',
        ]);

        $general = General::find($general->id);

        $general->title = request('title');
        $general->body = request('body');
        $general->save();

        return redirect('/admin/generals')->with('success', trans('lang.saveb'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\General  $general
     * @return \Illuminate\Http\Response
     */
    public function destroy(General $general)
    {
        $general->delete();
        return redirect('/admin/generals')->with('success', trans('lang.delb'));
    }
}
