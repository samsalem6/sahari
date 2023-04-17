<?php

namespace App\Http\Controllers;

use App\Model\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class DestinationController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('front');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = Destination::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.destinations.index')->with('destinations', $destinations) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/destinations.create');
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
            'slug'=>'required|unique:destinations|alpha_dash|max:191',
            'type'=>'required|max:191',
            'name'=>'required|max:191'
        ]);
        $destination                  = new Destination;
            if (request('image')) {
                $imageeimage = time() . 'packages1.' .request('image')->getClientOriginalExtension();
                request('image')->move(public_path('images/packages/'),$imageeimage);
                $destination->image           = $imageeimage;
            }

        $destination->slug            = request('slug');
        $destination->name            = request('name');
        $destination->type            = request('type');
        $destination->video           = request('video');
        $destination->metaTitle       = request('metaTitle');
        $destination->metaKeywords    = request('metaKeywords');
        $destination->metaDescription = request('metaDescription');
        $destination->description     = request('description');

        if (request('faq_image')) {
            $faqsimage = time() . 'packages1.' .request('faq_image')->getClientOriginalExtension();
            request('faq_image')->move(public_path('images/packages/'),$faqsimage);
            $destination->faq_image           = $faqsimage;
        }
        $destination->faq_imageAlt     = request('faq_imageAlt');
        $destination->faq_imageTitle     = request('faq_imageTitle');
        $destination->save();

        return redirect('/admin/destinations')->with('success', trans('lang.saveb'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function show(Destination $destination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit(Destination $destination)
    {
        return view('admin.destinations.edit',compact('destination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destination $destination)
    {
        $this->validate(request(),[
            'name'=>'required|max:150',
            'slug'=>'required|alpha_dash|max:191|unique:destinations,slug,'.$destination->id,

        ]);

        $destination = Destination::find($destination->id);
        if (request('image')) {
            \File::delete(public_path('/images/packages/'.$destination->image));
            $imageeimage = time() . 'packages1.' .request('image')->getClientOriginalExtension();
            request('image')->move(public_path('images/packages/'),$imageeimage);
            $destination->image           = $imageeimage;
        }

        $destination->metaTitle       = request('metaTitle');
        $destination->type            = request('type');
        $destination->video           = request('video');
        $destination->metaKeywords    = request('metaKeywords');
        $destination->metaDescription = request('metaDescription');
        $destination->description     = request('description');

        $destination->name = request('name');
        $destination->slug = request('slug');

        if (request('faq_image')) {
            $faqsimage = time() . 'packages1.' .request('faq_image')->getClientOriginalExtension();
            request('faq_image')->move(public_path('images/packages/'),$faqsimage);
            $destination->faq_image           = $faqsimage;
        }
        $destination->faq_imageAlt     = request('faq_imageAlt');
        $destination->faq_imageTitle     = request('faq_imageTitle');
        
        $destination->save();

        return redirect('/admin/destinations')->with('success', trans('lang.saveb'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destination $destination)
    {
        \File::delete(public_path('/images/packages/'.$destination->image));
        $destination->delete();
        return redirect('/admin/destinations')->with('success', trans('lang.delb'));
    }
}
