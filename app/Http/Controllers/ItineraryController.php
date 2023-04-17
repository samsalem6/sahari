<?php

namespace App\Http\Controllers;

use App\Model\Itinerary;
use Illuminate\Http\Request;

class ItineraryController extends Controller
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
        $itineraries = Itinerary::where('itinerary_types_id',$id)->get();
        $itineraries_id = $id;
        return view('admin.packages.additineraries',compact('itineraries','itineraries_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $itineraries = $this->validate(request(), [
            'title'          => 'required',
            'body'           => 'required',
            'itineraries_id' => 'required',
        ]);

        $Itinerary = new Itinerary;
        $Itinerary->title = request('title');
        $Itinerary->body = request('body');
        $Itinerary->itinerary_types_id = request('itineraries_id');
        $Itinerary->save();
        $itineraries_id = $Itinerary->itinerary_types_id;
        $itineraries = Itinerary::where('itinerary_types_id',$itineraries_id)->get();

        // dd($Itinerary);

        return redirect('/admin/addItineraries/'.$itineraries_id)
        ->with([
            'itineraries_id' => $itineraries_id,
            'itineraries'    => $itineraries
            ])
        ->with('success', trans('lang.saveb'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Itinerary  $itinerary
     * @return \Illuminate\Http\Response
     */
    public function show(Itinerary $itinerary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Itinerary  $itinerary
     * @return \Illuminate\Http\Response
     */
    public function edit(Itinerary $itinerary,$id)
    {
        $itineraries = Itinerary::where('id',$id)->first();
        $package_id = $id;
        return view('admin.packages.additinerariese',compact('itineraries','package_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Itinerary  $itinerary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Itinerary $itinerary)
    {
        $this->validate(request(),[
            'body'=>'required',
            'title'=>'required',
        ]);

        $itinerary = Itinerary::find($request->id);
        $itinerary->title = $request->title;
        $itinerary->body = $request->body;
        $itinerary->save();
        return redirect('/admin/itineraries/'.$itinerary->package_id)->with('success', trans('lang.saveb'));
    }

    public function up(Request $request)
    {
        $this->validate(request(),[
            'body'=>'required',
            'title'=>'required',
        ]);

        $itinerary = Itinerary::find($request->itineraries_id);
        $itinerary->title = $request->title;
        $itinerary->body = $request->body;
        $itinerary->save();
        return redirect('/admin/addItineraries/'.$itinerary->itinerary_types_id)->with('success', trans('lang.saveb'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Itinerary  $itinerary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Itinerary $itinerary,$id)
    {
        $itinerary = Itinerary::find($id);
        $itinerary->delete();
        return redirect('/admin/addItineraries/'.$itinerary->itinerary_types_id)->with('success', trans('lang.delb'));
    }
}
