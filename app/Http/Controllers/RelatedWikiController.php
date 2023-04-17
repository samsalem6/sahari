<?php

namespace App\Http\Controllers;

use App\Model\Package;
use App\Model\RelatedWiki;
use Illuminate\Http\Request;

class RelatedWikiController extends Controller
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
        $Related = RelatedWiki::where('wiki_id',$id)->orderBy('order')->with('package')->get();
        $packages = Package::where('viewInSite',true)->orderBy('order')->get();
        $wiki_id = $id;
        return view('/admin/wikis.Related',compact('Related','wiki_id','packages'));
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
            $request['order'] = request('wiki_id').request('order');
        }
        $Related = $this->validate(request(), [
            'Package_id' => 'required',
            'order'      => 'required|numeric|unique:related_wikis',
        ]);

        $Related             = new RelatedWiki;
        $Related->Package_id = request('Package_id');
        $Related->wiki_id    = request('wiki_id');
        $Related->order      = (int)request('order');
        $Related->save();
        return redirect('/admin/relatedwikiPackage/'.$Related->wiki_id)->with('success', trans('lang.saveb'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\RelatedWiki  $relatedWiki
     * @return \Illuminate\Http\Response
     */
    public function show(RelatedWiki $relatedWiki)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\RelatedWiki  $relatedWiki
     * @return \Illuminate\Http\Response
     */
    public function edit(RelatedWiki $relatedWiki)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\RelatedWiki  $relatedWiki
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RelatedWiki $relatedWiki)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\RelatedWiki  $relatedWiki
     * @return \Illuminate\Http\Response
     */
    public function destroy(RelatedWiki $relatedWiki,$id)
    {
        $Related = RelatedWiki::find($id);
        $Related->delete();
        return redirect('/admin/relatedwikiPackage/'.$Related->wiki_id)->with('success', trans('lang.delb'));
    }
}
