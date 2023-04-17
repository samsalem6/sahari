<?php

namespace App\Http\Controllers;

use App\Model\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
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
        $faqs = Faq::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.faqs.index')->with('faqs', $faqs) ;
    }


    public function front()
    {
        $faqss = Faq::all();
        return view('faqs')->with('faqss', $faqss) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/faqs.create');
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

        $faq = new Faq;
        $faq->title = request('title');
        $faq->body = request('body');
        $faq->destination_id   = (isset($request->destination_id)) ? request('destination_id') : NULL;
        $faq->viewInHome       = (isset($request->viewInHome) && $request->viewInHome == true) ? 1 : 0;
        $faq->save();

        return redirect('/admin/faqs')->with('success', trans('lang.saveb'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        $faq = Faq::find($faq->id);
        return view('admin.faqs.edit',compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $this->validate(request(),[
            'title'=>'required|max:150',
            'body'=>'required',
        ]);

        $faq = Faq::find($faq->id);
        
        $faq->title = request('title');
        $faq->body = request('body');
        $faq->destination_id   = (isset($request->destination_id)) ? request('destination_id') : NULL;
        $faq->viewInHome       = (isset($request->viewInHome) && $request->viewInHome == true) ? 1 : 0;
        $faq->save();

        return redirect('/admin/faqs')->with('success', trans('lang.saveb'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect('/admin/faqs')->with('success', trans('lang.delb'));
    }
}
