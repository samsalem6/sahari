<?php

namespace App\Http\Controllers;

use App\Model\Destination;
use App\Model\Wiki;
use Illuminate\Http\Request;

class WikiController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('front','frontSlug','Egipto','Turquia', 'marruecos', 'dubai');
    }

    public function Egipto()
    {
        $wikis = Wiki::orderBy('order', 'desc')->where('viewInSite',true)->where('type','Egipto-Guía-de-Viajes')->paginate(10);
        $da = 'Egipto';
        return view('wikis2')->with('wikis', $wikis)->with('da',$da) ;
    }

    public function Turquia()
    {
        $wikis = Wiki::orderBy('order', 'desc')->where('viewInSite',true)->where('type','Turquia-Guía-de-Viajes')->paginate(10);
        $da = 'Turquia';
        return view('wikis2')->with('wikis', $wikis)->with('da',$da) ;
    }

    public function marruecos()
    {
        $wikis = Wiki::orderBy('order', 'desc')->where('viewInSite',true)->where('type','marruecos-guia-de-viajes')->paginate(10);
        $da = 'marruecos';
        return view('wikis2')->with('wikis', $wikis)->with('da',$da) ;
    }
    public function dubai() {
        $wikis = Wiki::orderBy('order', 'desc')->where('viewInSite',true)->where('type','dubai-Guía-de-Viajes')->paginate(10);
        $da = 'dubai';
        return view('wikis2')->with('wikis', $wikis)->with('da',$da) ;
    }

    public function front()
    {
        $wikis = Wiki::orderBy('order', 'desc')->where('viewInSite',true)->paginate(10);
        return view('wikis')->with('wikis', $wikis) ;
    }

    public function frontSlug($slug)
    {
        $wiki = Wiki::where('slug',$slug)->first();
        return view('wiki')->with('wiki', $wiki) ;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wikis = Wiki::orderBy('order', 'desc')->paginate(6);
        return view('admin.wikis.index')->with('wikis', $wikis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dests = Destination::all();
        // dd($dests);
        return view('/admin/wikis.create', compact('dests'));
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
            'title'       => 'required|max:150',
            'image'       => 'required|mimes:jpg,jpeg,gif,png,webp|max:2048',
            'slug'        => 'required|unique:wikis',
            'order'       => 'numeric|unique:wikis',
            // 'destination_id' => 'required'
        ]);

        $imagee = time() . 'wiki.' .request('image')->getClientOriginalExtension();
        request('image')->move(public_path('images/wikis/'),$imagee);

        if (request('viewInSite')=='1'){
            $viewInSite = 1;
        }else {
            $viewInSite = 0;
        }

        $wiki                   = new Wiki;
        $wiki->image            = $imagee;
        $wiki->order            = request('order');
        $wiki->slug             = request('slug');
        $wiki->metaTitle        = request('metaTitle');
        $wiki->metaKeywords     = request('metaKeywords');
        $wiki->metaDescription  = request('metaDescription');
        $wiki->type             = request('type');
        $wiki->title            = request('title');
        $wiki->Description      = request('Description');
        $wiki->imageAlt         = request('imageAlt');
        $wiki->imageTitle       = request('imageTitle');
        $wiki->shortDescription = request('shortDescription');
        $wiki->destination_id   = request('destination_id');
        $wiki->viewInSite       = $viewInSite;
        $wiki->save();

        return redirect('/admin/wikis')->with('success', trans('lang.saveb'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Wiki  $wiki
     * @return \Illuminate\Http\Response
     */
    public function show(Wiki $wiki)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Wiki  $wiki
     * @return \Illuminate\Http\Response
     */
    public function edit(Wiki $wiki)
    {
        $dests = Destination::all();
        return view('admin.wikis.edit',compact('wiki', 'dests'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Wiki  $wiki
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wiki $wiki)
    {
        $this->validate(request(),[
            'metaTitle' => 'required|max:200',
            'metaKeywords' => 'required|max:200',
            'metaDescription' => 'required|max:200',
            'slug' => 'required|max:200',
            'imageAlt' => 'required|max:200',
            'imageTitle' => 'required|max:200',
            'title' => 'required|max:200',
            'Description' => 'required',
            'shortDescription' => 'required',
            'slug'  => 'required|alpha_dash|max:191|unique:wikis,slug,'.$wiki->id,
            'order' => 'numeric|unique:wikis,order,'.$wiki->id,
        ]);

        if (request('image')){
            \File::delete(public_path('/images/wikis/'.$wiki->image));
        $imageeimage = time() . 'wikis.' .request('image')->getClientOriginalExtension();
        request('image')->move(public_path('images/wikis/'),$imageeimage);
        $wiki->image = $imageeimage;

        }
        if (request('viewInSite')=='1'){
            $viewInSite = 1;
        }else {
            $viewInSite = 0;
        }

        $wiki->order            = request('order');
        $wiki->slug             = request('slug');
        $wiki->metaTitle        = request('metaTitle');
        $wiki->metaKeywords     = request('metaKeywords');
        $wiki->metaDescription  = request('metaDescription');
        $wiki->type             = request('type');
        $wiki->title            = request('title');
        $wiki->Description      = request('Description');
        $wiki->imageAlt         = request('imageAlt');
        $wiki->imageTitle       = request('imageTitle');
        $wiki->shortDescription = request('shortDescription');
        $wiki->destination_id   = request('destination_id');
        $wiki->viewInSite       = $viewInSite;
        $wiki->save();

        return redirect('/admin/wikis')->with('success', trans('lang.saveb'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Wiki  $wiki
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wiki $wiki)
    {
        \File::delete(public_path('/images/wikis/'.$wiki->image));
        $wiki->delete();
        return redirect('/admin/wikis/'.$wiki->wiki_id)->with('success', trans('lang.delb'));
    }
}
