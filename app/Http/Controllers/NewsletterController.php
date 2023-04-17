<?php

namespace App\Http\Controllers;

use App\Model\Newsletter;
use Illuminate\Http\Request;
use App\Exports\NewsletterExport;
//use Maatwebsite\Excel\Facades\Excel;


class NewsletterController extends Controller
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

    public function index()
    {
        $newsletters = Newsletter::latest()->paginate(20);

        return view('admin.overview.newsletter.index', compact('newsletters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate(request(),[
        //     'email'=>'required|unique:newsletters',
        // ]);

        if (!$request->email) {
            return redirect()->back()->with('error', 'Email Required!');
        }else if(Newsletter::where('email', $request->email)->count()) {
            return redirect()->back()->with('error', 'Email Already Exist.');
        } else {
            $news = new Newsletter;
            $news->email = request('email');
            $news->save();
            return redirect()->back()->with('message', 'Email Registered Successfully.');
        }
    }

    public function export()
    {
        $fileName = 'Newsletter_'.date('Y-m-d-h-i-s').'.xlsx';
        //return Excel::download(new NewsletterExport(), $fileName);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
