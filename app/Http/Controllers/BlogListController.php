<?php

namespace App\Http\Controllers;

use App\Model\BlogList;
use Illuminate\Http\Request;

class BlogListController extends Controller
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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $items = BlogList::where('blog_id',$id)->orderBy('order')->get();
        $blog_id = $id;
        return view('/admin/blogs.items',compact('items','blog_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request['order'] = (int)request('blog_id').(int)request('order');
        $this->validate($request, [
            'order'       => 'required|unique:blog_lists',
            'image'       => 'mimes:jpg,jpeg,gif,png|max:2048',
            'blog_id'     => 'required'
            ]);

            $imagee = time() . 'blogitems.' .request('image')->getClientOriginalExtension();
            request('image')->move(public_path('images/blogs/'),$imagee);

            $blogList              = new BlogList;
            $blogList->image       = $imagee;
            $blogList->imageAlt    = request('imageAlt');
            $blogList->imageTitle  = request('imageTitle');
            $blogList->title       = request('title');
            $blogList->Description = request('Description');
            $blogList->order       = request('order');
            $blogList->blog_id     = request('blog_id');
            $blogList->save();
            return redirect('/admin/blogItems/'.request('blog_id'))->with('success', trans('lang.saveb'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BlogList  $blogList
     * @return \Illuminate\Http\Response
     */
    public function show(BlogList $blogList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BlogList  $blogList
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogList $blogList,$id)
    {
        $blogList = BlogList::where('id',$id)->first();
        $blog_id = $id;
        return view('/admin/blogs.item',compact('blogList','blog_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BlogList  $blogList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogList $blogList)
    {
        $blogList = BlogList::find($request->id);
        $request['order'] = (int)$blogList->blog_id.(int)request('order');
        $this->validate($request, [
            'slug'        => 'alpha_dash|max:191|unique:blog_lists,slug,'.$blogList->id,
            'order'       => 'numeric|unique:blog_lists,order,'.$blogList->id,
            ]);

            if (request('image')){
                \File::delete(public_path('/images/blogs/'.$blogList->image));

                $imageeimage = time() . 'blogList.' .request('image')->getClientOriginalExtension();
                request('image')->move(public_path('images/blogs/'),$imageeimage);
                $blogList->image = $imageeimage;
            }

            $blogList->imageAlt    = request('imageAlt');
            $blogList->imageTitle  = request('imageTitle');
            $blogList->title       = request('title');
            $blogList->Description = request('Description');
            $blogList->order       = request('order');
            $blogList->save();
            return redirect('/admin/blogItems/'.$blogList->blog_id)->with('success', trans('lang.saveb'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BlogList  $blogList
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogList $blogList,$id)
    {
        $blogList = BlogList::find($id);
        \File::delete(public_path('/images/blogs/'.$blogList->image));
        $blogList->delete();
        return redirect('/admin/blogs/'.$blogList->blog_id)->with('success', trans('lang.delb'));
    }
}
