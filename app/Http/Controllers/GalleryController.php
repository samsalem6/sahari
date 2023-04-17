<?php

namespace App\Http\Controllers;

use App\Model\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index','store');
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
        $galleries = Gallery::where('package_id',$id)->get();
        $galleries_id = $id;
        return view('/admin/packages.galleries',compact('galleries','galleries_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['order'] = request('package_id').request('order');
        $this->validate(request(), [
            'order'      => 'required|unique:galleries',
            'package_id' => 'required',
            'image'      => 'required|mimes:jpg,jpeg,gif,png|max:2048',
            ]);

        $imagee = time() . 'Gallery.' .request('image')->getClientOriginalExtension();
        request('image')->move(public_path('images/packages/'),$imagee);

        $galleries             = new Gallery;
        $galleries->image      = $imagee;
        $galleries->imageAlt   = request('imageAlt');
        $galleries->imageTitle = request('imageTitle');
        $galleries->order      = (int)request('order');
        $galleries->package_id = request('package_id');
        $galleries->save();
        $package_id = $galleries->package_id;
        $galleries  = Gallery::where('package_id',$package_id)->get();

        return redirect('/admin/galleries/'.$package_id)
        ->with([
            'package_id' => $package_id,
            'galleries'    => $galleries
            ])
        ->with('success', trans('lang.saveb'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery,$id)
    {
        $galleries = Gallery::where('id',$id)->first();
        $package_id = $id;
        return view('/admin/packages.editgalleries',compact('galleries','package_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request['order'] = request('package_id').request('order');
        $this->validate(request(),[
            'order'      => 'required|unique:galleries,order,'.$request->galleries_id,
            'image'      => 'mimes:jpg,jpeg,gif,png|max:2048',
        ]);

        $galleries = Gallery::find($request->galleries_id);

        if (request('image')){
            \File::delete(public_path('/images/packages/'.$galleries->image));
            $imagee = time() . 'Gallery.' .request('image')->getClientOriginalExtension();
            request('image')->move(public_path('images/packages/'),$imagee);
            $galleries->image = $imagee;
        }

        $galleries->imageAlt   = request('imageAlt');
        $galleries->imageTitle = request('imageTitle');
        $galleries->order      = (int)request('order');
        $galleries->save();
        $package_id = $galleries->package_id;
        $galleries  = Gallery::where('package_id',$package_id)->get();

        return redirect('/admin/galleries/'.$package_id)
        ->with([
            'package_id' => $package_id,
            'galleries'    => $galleries
            ])
        ->with('success', trans('lang.saveb'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery,$id)
    {
        $galleries = Gallery::find($id);
        \File::delete(public_path('/images/packages/'.$galleries->image));
        $galleries->delete();
        return redirect('/admin/galleries/'.$galleries->package_id)->with('success', trans('lang.delb'));
    }
}
