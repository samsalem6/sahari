<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Currencies;


class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function currencyLoad(Request $request) {
        session()->put('currency_abbrev', $request->currency_abbrev);
        session()->put('currency_name', $request->currency_name);
        $currency=Currency::where('abbrev', $request->currency_abbrev)->first();

        session()->put('currency_symbol', $currency->symbol);
        session()->put('ex_rate', $currency->ex_rate);
        $response['status']=true;

        return $response;

    }
    public function index()
     {
    //     $currencies = Currency::orderBy('id', 'DESC')->get();
    //     return view('layouts.app', compact('currency'))->with('currencies', $currencies);
    // }
    // public function currency(Request $request) {
    //     if($request->mod == 'true') {
    //         DB::table('currencies')->where('id', $request->id)->update(['status'=>'active']);

    //     }
    //     else {
    //         DB::table('currencies')->where('id', $request->id)->update(['status'=>'inactive']);
    //     }
    //     return response()->json(['msg'=>'Successfuly', 'status'=>true]);
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
    //     $this->validate($request,[
    //         'name'=>'string |required',
    //         'symbol'=>'string|required',
    //         'ex_rate'=>'string|required',
    //         'abbrev'=>'string|required'
    //     ]);
    //     $data=$request->all();
    //     $status=Currency::create($data);
    //     if($status){
    //         return redirect()->route('layouts.app');
    //     }
    //     else {
    //         return back();
    //     }
 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data= Currency::all();
        return dd($data);
        return view('layouts.app', compact('data'));
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
