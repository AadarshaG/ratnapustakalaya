<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enquirys = Enquiry::orderBy('id','desc')->get();
        return view('admin.enquiry.index',compact('enquirys'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enquiry = Enquiry::find($id);
        return view('admin.enquiry.show',compact('enquiry'));
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
        $enquiry = Enquiry::find($id);
        $status = $enquiry->delete();
        if($status){
            request()->session()->flash('success','Enquiry deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Enquiry could not be deleted at this moment.');
        }
        return redirect('/ratnapustakalaya/enquirys');
    }

    public function enableEnquiry($id)
    {
        $enquiry = Enquiry::find($id);
        $enquiry->status = 1;
        $enquiry->save();
        return redirect('/ratnapustakalaya/enquirys')->with('success', 'Enquiry  Enabled Successfully');
    }

    public function disableEnquiry($id)
    {
        $enquiry = Enquiry::find($id);
        $enquiry->status = 0;
        $enquiry->save();
        return redirect('/ratnapustakalaya/enquirys')->with('success', 'Enquiry  Disabled Successfully');
    }
}
