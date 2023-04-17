<?php

namespace App\Http\Controllers;

use App\Model\Hotels;
use Illuminate\Http\Request;

class HotelsController extends Controller
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
        $hotels = Hotels::latest()->paginate(10);

        return view('admin.hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hotels.create');
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
            'stars'=> 'required|numeric|min:1|max:5',
            'link'=> 'required',

        ]);

        $images = time() . 'hotels.' .request('image')->getClientOriginalExtension();
        request('image')->move(public_path('images/packages/'), $images);

        $hotel = new Hotels;

        $hotel->name = request('name');
        $hotel->stars = request('stars');
        $hotel->image = $images;
        $hotel->link = request('link');
        $hotel->save();

        return redirect('/hotels')->with('success', 'The New Hotel Added Successfully');


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
    public function edit(Hotels $hotel)
    {
        return view('admin.hotels.edit',compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotels $hotel)
    {
        $this->validate(request(),[
            'name'=> 'required',
            'stars'=> 'required|numeric|min:1|max:5',
            'link'=> 'required',
        ]);

        $hotel = Hotels::find($hotel->id);

        if (request('image')){
           \File::delete(public_path('/images/packages/'.$hotel->image));
           $images = time() . 'hotels.' .request('image')->getClientOriginalExtension();
            request('image')->move(public_path('images/packages/'), $images);
            $hotel->image = $images;

        }
        $hotel->name = request('name');
        $hotel->stars = request('stars');
        $hotel->link = request('link');
        $hotel->save();

        return redirect('/hotels')->with('success', 'The Hotel Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Hotels $hotel)
    {
        $hotel = Hotels::find($hotel->id);
        \File::delete(public_path('/images/packages/'.$hotel->image));
        $hotel->delete();

        return redirect('/hotels')->with('success', 'The Hotel Deleted Successfully');
    }
}
