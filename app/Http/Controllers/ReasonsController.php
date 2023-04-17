<?php

namespace App\Http\Controllers;

use App\Model\Reasons;
use Illuminate\Http\Request;

class ReasonsController extends Controller
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

    public function index(Reasons $res)
    {
        $reasons = Reasons::whereIn('id', [1,2,3,4])->get();
        // dd($reasons);
        return view('admin.overview.reasons.index', compact('reasons'));
    }

    // public function front()
    // {
    //     $reasonss = Reasons::all();
    //     return view('welcome')->with('reasonss', $reasonss);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.overview.reasons.create');
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
            'image' => 'required|mimes:jpg,jpeg,gif,png|max:2048',
            'body'=>'required',
        ]);
        $reason = new Reasons;
        if (request('image')) {
            $image = time() . 'reasons1.' .request('image')->getClientOriginalExtension();
            request('image')->move(public_path('images/packages/'),$image);
            $reason->image = $image;
        }
        $reason->title = request('title');
        $reason->body = request('body');
        $reason->save();

        return redirect('/reasons')->with('success', trans('lang.saveb'));
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
    public function edit($id)
    {
        $reason = Reasons::find($id);
        return view('admin.overview.reasons.edit', compact('reason'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Reasons $reason)
    {
        $this->validate(request(),[
            'title'=>'required|max:150',
            'image' => 'image|mimes:jpg,jpeg,gif,png|max:2048',
            'body'=>'required',
        ]);
        $reason = Reasons::find($reason->id);
        if (request('image')) {
            \File::delete(public_path('/images/packages/'.$reason->image));
            $image = time() . 'reasons1.' .request('image')->getClientOriginalExtension();
            request('image')->move(public_path('images/packages/'),$image);
            $reason->image = $image;
        }
        $reason->title = request('title');
        $reason->body = request('body');
        $reason->save();

        return redirect('/reasons')->with('success', trans('lang.saveb'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getTailor()
    {
        $tailor = Reasons::find(5);
        return view('admin.overview.tailor.index')->with('tailor', $tailor) ;
    }
  
    public function updateTailor(Reasons $tailor) {

        $tailor = Reasons::find(5);
        if (request('image')) {
            \File::delete(public_path('/images/packages/'.$tailor->image));
            $image = time() . 'tailor1.' .request('image')->getClientOriginalExtension();
            request('image')->move(public_path('images/packages/'),$image);
            $tailor->image = $image;
        }
        $tailor->title = request('title');
        $tailor->body = request('body');
        $tailor->save();
        return redirect('/tailors')->with('success', trans('lang.saveb'));

    }
    public function getAbout()
    {
        $about = Reasons::find(6);
        return view('admin.overview.footer.index', compact('about'));
    }
    public function updateAbout(Reasons $about) {

        $about = Reasons::find(6);
        $about->title = request('title');
        $about->body = request('body');
        $about->save();
        return redirect('/about')->with('success', trans('lang.saveb'));

    }
}
