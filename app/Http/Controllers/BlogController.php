<?php

namespace App\Http\Controllers;

use App\Model\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('front','frontSlug','Egipto','Turquia','Marruecos', 'jordania', 'dubai');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function Egipto()
    {
        $blogs = Blog::orderBy('order', 'desc')->where('viewInSite',true)->where('type','Blog-de-Viajes-a-Egipto')->paginate(10);
        $eblogs = Blog::orderBy('order', 'desc')->where('viewInSite',true)->where('type','Blog-de-Viajes-a-Egipto')->take(3)->get();
        $eblogss = Blog::orderBy('order', 'desc')->where('viewInSite',true)->where('type','Blog-de-Viajes-a-Egipto')->take(3)->get();

        return view('blogsEgipto')->with('blogs', $blogs)->with('eblogs', $eblogs)->with('eblogss', $eblogss);
    }

    public function Turquia()
    {
        $blogs = Blog::orderBy('order', 'desc')->where('viewInSite',true)->where('type','Blog-de-Viajes-a-Turquia')->paginate(10);
        $tblogs = Blog::orderBy('order', 'desc')->where('viewInSite',true)->where('type','Blog-de-Viajes-a-Turquia')->take(3)->get();
        $tblogss = Blog::orderBy('order', 'desc')->where('viewInSite',true)->where('type','Blog-de-Viajes-a-Turquia')->take(3)->get();

        return view('blogsTurquia')->with('blogs', $blogs)->with('tblogs', $tblogs)->with('tblogss', $tblogss);
    }

    public function Marruecos()
    {
        $blogs = Blog::orderBy('order', 'desc')->where('viewInSite',true)->where('type','Blog-de-Viajes-Marruecos')->paginate(10);
        $mblogs = Blog::orderBy('order', 'desc')->where('viewInSite',true)->where('type','Blog-de-Viajes-Marruecos')->take(3)->get();
        $mblogss = Blog::orderBy('order', 'desc')->where('viewInSite',true)->where('type','Blog-de-Viajes-Marruecos')->take(3)->get();
        return view('blogsMarruecos')->with('blogs', $blogs)->with('mblogs', $mblogs)->with('mblogss', $mblogss);
    }

    public function jordania()
    {
        $blogs = Blog::orderBy('order', 'desc')->where('viewInSite',true)->where('type','blog-de-viajes-jordania')->paginate(10);
        $jblogs = Blog::orderBy('order', 'desc')->where('viewInSite',true)->where('type','Blog-de-Viajes-jordania')->take(3)->get();
        $jblogss = Blog::orderBy('order', 'desc')->where('viewInSite',true)->where('type','Blog-de-Viajes-jordania')->take(3)->get();
        return view('blogsjordania')->with('blogs', $blogs)->with('jblogs', $jblogs)->with('jblogss', $jblogss);
    }

    public function dubai()
    {
        $blogs = Blog::orderBy('order', 'desc')->where('viewInSite',true)->where('type','blog-de-viajes-a-dubai')->paginate(10);
        $dblogs = Blog::orderBy('order', 'desc')->where('viewInSite',true)->where('type','Blog-de-Viajes-a-dubai')->take(3)->get();
        $dblogss = Blog::orderBy('order', 'desc')->where('viewInSite',true)->where('type','Blog-de-Viajes-a-dubai')->take(3)->get();
        return view('blogsdubai')->with('blogs', $blogs)->with('dblogs', $dblogs)->with('dblogss', $dblogss);
    }

    public function frontSlug($slug)
    {
        $blog = Blog::where('slug',$slug)->first();
        return view('blog')->with('blog', $blog) ;
    }

    public function index()
    {
        $blogs = Blog::orderBy('order', 'desc')->paginate(6);
        return view('admin.blogs.index')->with('blogs', $blogs) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/blogs.create');
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
            'image'       => 'required|max:2048',
            'slug'        => 'required|unique:blogs',
            'order'       => 'numeric|unique:blogs',
        ]);

        $imagee = time() . 'blog.' .request('image')->getClientOriginalExtension();
        request('image')->move(public_path('images/blogs/'),$imagee);

        if (request('viewInSite')=='1'){
            $viewInSite = 1;
        }else {
            $viewInSite = 0;
        }

        $blog                   = new Blog;
        $blog->image            = $imagee;
        $blog->order            = request('order');
        $blog->slug             = request('slug');
        $blog->metaTitle        = request('metaTitle');
        $blog->metaKeywords     = request('metaKeywords');
        $blog->metaDescription  = request('metaDescription');
        $blog->type  = request('type');
        $blog->title            = request('title');
        $blog->Description      = request('Description');
        $blog->imageAlt         = request('imageAlt');
        $blog->imageTitle       = request('imageTitle');
        $blog->shortDescription = request('shortDescription');
        $blog->viewInSite       = $viewInSite;
        $blog->save();

        return redirect('/admin/blog')->with('success', trans('lang.saveb'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $this->validate(request(),[
            'title' => 'required|max:150',
            'slug'  => 'required|alpha_dash|max:191|unique:blogs,slug,'.$blog->id,
            'order' => 'numeric|unique:blogs,order,'.$blog->id,
        ]);

        if (request('image')){
            \File::delete(public_path('/images/blogs/'.$blog->image));
        $imageeimage = time() . 'blogs.' .request('image')->getClientOriginalExtension();
        request('image')->move(public_path('images/blogs/'),$imageeimage);
        $blog->image = $imageeimage;

        }
        if (request('viewInSite')=='1'){
            $viewInSite = 1;
        }else {
            $viewInSite = 0;
        }

        $blog->order            = request('order');
        $blog->slug             = request('slug');
        $blog->metaTitle        = request('metaTitle');
        $blog->metaKeywords     = request('metaKeywords');
        $blog->metaDescription  = request('metaDescription');
        $blog->title            = request('title');
        $blog->type  = request('type');
        $blog->Description      = request('Description');
        $blog->imageAlt         = request('imageAlt');
        $blog->imageTitle       = request('imageTitle');
        $blog->shortDescription = request('shortDescription');
        $blog->viewInSite       = $viewInSite;
        $blog->save();

        return redirect('/admin/blog')->with('success', trans('lang.saveb'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        \File::delete(public_path('/images/blogs/'.$blog->image));
        $blog->delete();
        return redirect('/admin/blog/'.$blog->blog_id)->with('success', trans('lang.delb'));
    }
}
