<?php

namespace App\Http\Controllers;

use App\Model\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
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
        $sliders = Slider::orderBy('order', 'desc')->paginate(6);
        return view('admin.sliders.index')->with('sliders', $sliders) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/sliders.create');
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
            // 'description'=>'required|max:150',
            'image' => 'required|mimes:jpg,jpeg,gif,png|max:2048',
            'order' => 'numeric|unique:sliders',
        ]);
            if (request('video')) {
                $this->validate(request(),[
                    'video' => ['required','regex:/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\">]+)/'],
                    ]);
                $headers = get_headers('https://www.youtube.com/oembed?format=json&url=' . request('video'));
                if(is_array($headers) ? preg_match('/^HTTP\\/\\d+\\.\\d+\\s+2\\d\\d\\s+.*$/',$headers[0]) : false){
                } else {
                    return back()->withInput()->withErrors(['video'=> 'The video Not Found']);
                }

                preg_match_all("#(?<=v=|v\/|vi=|vi\/|youtu.be\/)[a-zA-Z0-9_-]{11}#", request('video'), $matches);
                $matches = $matches[0];
            }else{
                $matches = 0;
            }

        $imagee = time() . 'slider.' .request('image')->getClientOriginalExtension();
        request('image')->move(public_path('images/sliders/'),$imagee);


        $slider = new Slider;
        $slider->image = $imagee;
        $slider->order = request('order');
        $slider->type = request('type');
        $slider->video = $matches;
        $slider->title = request('title');
        $slider->description = request('description');
        $slider->link = request('link');
        $slider->save();

        return redirect('/admin/sliders')->with('success', trans('lang.saveb'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        $slider = Slider::find($slider->id);
        return view('admin.sliders.edit',compact('slider'))->with('slider', $slider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $this->validate(request(),[
            'title'=>'required|max:150',
            // 'description'=>'required|max:150',
            'image' => 'mimes:jpg,jpeg,gif,png|max:2048',
            'order'=>'numeric|unique:sliders,order,'.$slider->id,
        ]);

        if (request('video')) {
            $this->validate(request(),[
                'video' => ['required','regex:/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\">]+)/'],
                ]);
            $headers = get_headers('https://www.youtube.com/oembed?format=json&url=' . request('video'));
            if(is_array($headers) ? preg_match('/^HTTP\\/\\d+\\.\\d+\\s+2\\d\\d\\s+.*$/',$headers[0]) : false){
            } else {
                return back()->withInput()->withErrors(['video'=> 'The video Not Found']);
            }

            preg_match_all("#(?<=v=|v\/|vi=|vi\/|youtu.be\/)[a-zA-Z0-9_-]{11}#", request('video'), $matches);
            $matches = $matches[0];
        }else{
            $matches = 0;
        }

        $slider = Slider::find($slider->id);
        if (request('image')){

            \File::delete(public_path('/images/sliders/'.$slider->image));

            $imagee = time() . 'slider.' .request('image')->getClientOriginalExtension();
            request('image')->move(public_path('images/sliders/'),$imagee);
            $slider->image = $imagee;
        }
        $slider->title = request('title');
        $slider->description = request('description');
        $slider->order = request('order');
        $slider->type = request('type');
        $slider->video = $matches[0];
        $slider->link = request('link');
        $slider->save();

        return redirect('/admin/sliders')->with('success', trans('lang.saveb'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider = Slider::find($slider->id);
        \File::delete(public_path('/images/sliders/'.$slider->image));
        $slider->delete();

        return redirect('/admin/sliders')->with('success', trans('lang.delb'));
    }
}
