<?php

namespace App\Http\Controllers;

use App\Model\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
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
        $socials = Social::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.socials.index')->with('socials', $socials) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/socials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $socials = $this->validate(request(), [
            'name'=>'required|max:100',
            'link'=>'required|max:150',
        ]);

        $socials = new Social;
        $socials->name = request('name');
        $socials->link = request('link');
        $socials->save();

        return redirect('/admin/socials')->with('success', trans('lang.saveb'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function show(Social $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function edit(Social $social)
    {
        $social = Social::find($social->id);
        return view('admin.socials.edit',compact('social'))->with('social', $social);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Social $social)
    {
        $this->validate(request(),[
            'name'=>'required|max:100',
            'link'=>'required|max:150',
        ]);

        $social = Social::find($social->id);
        
        $social->name = request('name');
        $social->link = request('link');
        $social->save();

        return redirect('/admin/socials')->with('success', trans('lang.saveb'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy(Social $social)
    {
        $social = Social::find($social->id);
        $social->delete();

        return redirect('/admin/socials')->with('success', trans('lang.delb'));
    }
}
