<?php

namespace App\Http\Controllers;

use App\Model\ItineraryType;
use Illuminate\Http\Request;
use App\Model\Itinerary;

class ItineraryTypeController extends Controller
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
        $itineraries = ItineraryType::where('package_id',$id)->get();
        $package_id = $id;
        return view('admin.packages.itineraries',compact('itineraries','package_id'));
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
            'title' => 'required',
            'package_id'=>'required',
        ]);

        $itineraries = new ItineraryType;
        $itineraries->title = request('title');
        $itineraries->package_id = request('package_id');
        $itineraries->save();
        return redirect('/admin/itineraries/'.$itineraries->package_id)->with('success', trans('lang.saveb'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ItineraryType  $itineraryType
     * @return \Illuminate\Http\Response
     */
    public function show(ItineraryType $itineraryType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ItineraryType  $itineraryType
     * @return \Illuminate\Http\Response
     */
    public function edit(ItineraryType $itineraryType, $id)
    {
        $itineraries = ItineraryType::where('id',$id)->first();
        $package_id = $id;
        return view('admin.packages.itinerariese',compact('itineraries','package_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ItineraryType  $itineraryType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItineraryType $itineraryType)
    {
        $this->validate(request(),[
            'title'=>'required',
        ]);

        $itinerary = ItineraryType::find($request->id);
        $itinerary->title = $request->title;
        $itinerary->save();
        return redirect('/admin/itineraries/'.$itinerary->package_id)->with('success', trans('lang.saveb'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ItineraryType  $itineraryType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItineraryType $itineraryType, $id)
    {
        $ItineraryType = ItineraryType::find($id);
        $itinerary = Itinerary::where('itinerary_types_id',$id)->get();
        if (count($itinerary)>0) {
            foreach ($itinerary as $value) {
                $value->delete();
            }
        }
        $ItineraryType->delete();
        return redirect('/admin/itineraries/'.$ItineraryType->package_id)->with('success', trans('lang.delb'));
    }
}
