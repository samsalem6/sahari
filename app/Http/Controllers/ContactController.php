<?php

namespace App\Http\Controllers;

use App\Model\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
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
        $contact = Contact::find(1);
        return view('admin.contacts.index')->with('contact', $contact) ;
    }

    public function front()
    {
        $contact = Contact::find(1);
        return view('contactus')->with('contact', $contact) ;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $contact = Contact::find(1);
        return view('admin.contacts.edit',compact('contact'))->with('contact', $contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        
        $contact = Contact::find(1);
        
        $contact->phone = request('phone');
        $contact->mobile = request('mobile');
        $contact->fax = request('fax');
        $contact->email = request('email');
        $contact->location = request('location');
        $contact->map = request('map');
        $contact->save();

        return redirect('/admin/contacts')->with('success', trans('lang.saveb'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
