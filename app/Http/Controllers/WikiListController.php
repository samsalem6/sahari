<?php

namespace App\Http\Controllers;

use App\Model\WikiList;
use Illuminate\Http\Request;

class WikiListController extends Controller
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
        $items = WikiList::where('wiki_id',$id)->orderBy('order')->get();
        $wiki_id = $id;
        return view('/admin/wikis.items',compact('items','wiki_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['order'] = (int)request('wiki_id').(int)request('order');
        $this->validate($request, [
            'order'       => 'required|unique:wiki_lists',
            'image'       => 'mimes:jpg,jpeg,gif,png,webp|max:2048',
            ]);

            if(isset($request['image'])) {
                $imagee = time() . 'wikiitems.' .request('image')->getClientOriginalExtension();
                request('image')->move(public_path('images/wikis/'),$imagee);
            }
           

            $wikiList              = new WikiList;
            $wikiList->image       = $imagee ?? null;
            $wikiList->imageAlt    = request('imageAlt');
            $wikiList->imageTitle  = request('imageTitle');
            $wikiList->title       = request('title');
            $wikiList->Description = request('Description');
            $wikiList->order       = request('order');
            $wikiList->wiki_id     = request('wiki_id');
            $wikiList->save();
            return redirect('/admin/wikiItems/'.request('wiki_id'))->with('success', trans('lang.saveb'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\WikiList  $wikiList
     * @return \Illuminate\Http\Response
     */
    public function show(WikiList $wikiList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\WikiList  $wikiList
     * @return \Illuminate\Http\Response
     */
    public function edit(WikiList $wikiList,$id)
    {
        $wikiList = WikiList::where('id',$id)->first();
        $wiki_id = $id;
        return view('/admin/wikis.item',compact('wikiList','wiki_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\WikiList  $wikiList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WikiList $wikiList)
    {
        $wikiList = WikiList::find($request->id);
        $request['order'] = (int)$wikiList->wiki_id.(int)request('order');
        $this->validate($request, [
            'slug'        => 'alpha_dash|max:191|unique:wiki_lists,slug,'.$wikiList->id,
            'order'       => 'numeric|unique:wiki_lists,order,'.$wikiList->id,
            ]);

            if (request('image')){
                \File::delete(public_path('/images/wikis/'.$wikiList->image));

                $imageeimage = time() . 'wikiList.' .request('image')->getClientOriginalExtension();
                request('image')->move(public_path('images/wikis/'),$imageeimage);
                $wikiList->image = $imageeimage;
            }

            $wikiList->imageAlt    = request('imageAlt');
            $wikiList->imageTitle  = request('imageTitle');
            $wikiList->title       = request('title');
            $wikiList->Description = request('Description');
            $wikiList->order       = request('order');
            $wikiList->save();
            return redirect('/admin/wikiItems/'.$wikiList->wiki_id)->with('success', trans('lang.saveb'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\WikiList  $wikiList
     * @return \Illuminate\Http\Response
     */
    public function destroy(WikiList $wikiList,$id)
    {
        $wikiList = WikiList::find($id);
        \File::delete(public_path('/images/wikis/'.$wikiList->image));
        $wikiList->delete();
        return redirect('/admin/wikis/'.$wikiList->wiki_id)->with('success', trans('lang.delb'));
    }
}
