<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Enquiry;
use App\Models\Member;
use App\Models\Social;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        $contact = Contact::select('*')->first();
        $links = Social::select('*')->get();
        return view('frontend.contacts',compact('contact','links'));
    }

    public function send(Request $request)
    {
        $request->validate([
           'name'=>'required|string',
           'email'=>'required|string',
           'phone'=>'required|string',
           'messages'=>'required|string',
        ]);
        $enquiry = new Enquiry();
        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->phone = $request->phone;
        $enquiry->messages = $request->messages;
        $status = $enquiry->save();
        if($status){
            $request->session()->flash('success','Your Enquiry has been send successfully.');
        }else{
            $request->session()->flash('error','Sorry! Your enquiry could not send at this moment.');
        }
        return redirect()->back();
    }


    //membership
    public function membership()
    {
        return view('frontend.membership');
    }

    public function membershipForm(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|string',
            'phone'=>'required|string',
        ]);
        $member = new Member();
        $member->name = $request->name;
        $member->email = $request->email;
        $member->phone = $request->phone;
        $status = $member->save();
        if($status){
            $request->session()->flash('success','Your Form has been send successfully.');
        }else{
            $request->session()->flash('error','Sorry! Your form could not send at this moment.');
        }
        return redirect()->back();
    }

    //enquiry messages
    public function enquiry()
    {
        return view('frontend.enquiry');
    }
}
