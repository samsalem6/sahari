<?php

namespace App\Http\Controllers;

use App\Model\Rate;
use App\Model\Review;
use App\Model\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ReviewController extends Controller
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
        $reviews = Review::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.reviews.index')->with('reviews', $reviews) ;
    }

    public function create()
    {
        return view('/admin/reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = $this->validate(request(), [
            'name'=>'required',
            'description'=>'required',
            'stars'=>'numeric|min:1|max:5',
        ]);
        $review = new Review;
        if (request('image')) {
            $imagee = time() . '.' .request('image')->getClientOriginalExtension();
            request('image')->move(public_path('images/reviews/'),$imagee);
            $review->image = $imagee;
        }

        $review->name = request('name');
        $review->description = request('description');
        $review->stars = request('stars');
        $review->save();

        return redirect('/admin/reviews')->with('success', trans('lang.saveb'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        $review = Review::find($review->id);
        return view('admin.reviews.edit',compact('review'))->with('review', $review);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $this->validate(request(),[
            'name'=>'required|max:150',
            'description'=>'required|max:150',
            'stars'=>'numeric|min:1|max:5',
        ]);

        $review = Review::find($review->id);
        if (request('image')){
            \File::delete(public_path('/images/reviews/'.$review->image));

            $imagee = time() . '.' .request('image')->getClientOriginalExtension();
            request('image')->move(public_path('images/reviews/'),$imagee);
            $review->image = $imagee;
        }
        $review->name = request('name');
        $review->description = request('description');
        $review->stars = request('stars');
        $review->save();

        return redirect('/admin/reviews')->with('success', trans('lang.saveb'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review = Review::find($review->id);
        \File::delete(public_path('/images/reviews/'.$review->image));
        $review->delete();
        
        return redirect('/admin/reviews')->with('success', trans('lang.delb'));
    }
}
