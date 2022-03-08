<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'address'=>'required|string',
            'phone'=>'required|string',
            'email'=>'required|email',
            'iframe'=>'required|string'
        ]);
        $contact = new Contact();
        $contact->address = $request->address;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->iframe = $request->iframe;
        $status = $contact->save();
        if($status){
            $request->session()->flash('success','Contact Info was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Contact Info could not be added at this moment.');
        }
        return redirect('/ratnapustakalaya/contacts');
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
        $contact = Contact::find($id);
        return view('admin.contact.edit',compact('contact'));
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
        $contact = Contact::find($id);

        $request->validate([
            'address'=>'sometimes|string',
            'phone'=>'sometimes|string',
            'email'=>'sometimes|email',
            'iframe'=>'sometimes|string'
        ]);
        $contact->address = $request->address;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->iframe = $request->iframe;
        $status = $contact->save();
        if($status){
            $request->session()->flash('success','Contact Info was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Contact Info could not be updated at this moment.');
        }
        return redirect('/ratnapustakalaya/contacts');
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
