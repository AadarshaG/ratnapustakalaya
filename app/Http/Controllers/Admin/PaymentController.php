<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Image;
use File;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all();
        return view('admin.payment.index',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payment.create');
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
            'title'=>'required|string',
            'account'=>'required|string',
            'image'=>'required|image',
        ]);

        if($request->hasFile('image')) {
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name              = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/payment/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $payment = new Payment();
        $payment->title = $request->title;
        $payment->account = $request->account;
        $payment->image = $name;
        $status = $payment->save();
        if($status){
            $request->session()->flash('success','Payment Method was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Payment Method could not be added at this moment.');
        }
        return redirect('/ratnapustakalaya/payments');
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
        $payment = Payment::find($id);
        return view('admin.payment.edit',compact('payment'));
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
        $payment = Payment::find($id);
        $request->validate([
            'title'=>'sometimes|string',
            'account'=>'sometimes|string',
            'image'=>'sometimes|image',
        ]);

        $image1 = $payment->image;
        if($request->hasFile('image')) {
            File::delete('uploads/payment'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/payment/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $payment->title = $request->title;
        $payment->account = $request->account;
        $payment->image = $name;
        $status = $payment->save();
        if($status){
            $request->session()->flash('success','Payment Method was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Payment Method could not be updated at this moment.');
        }
        return redirect('/ratnapustakalaya/payments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::find($id);
        $image = $payment->image;
        $status = $payment->delete();
        if($status){
            \File::delete('uploads/payment'.'/'.$image);
            request()->session()->flash('success','Payment Method deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Payment Method could not be deleted at this moment.');
        }
        return redirect('/ratnapustakalaya/payments');
    }
}
