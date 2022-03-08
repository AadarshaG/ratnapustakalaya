<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Qr;
use Illuminate\Http\Request;
use Image;
use File;

class QrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qrs = Qr::all();
        return view('admin.qr.index',compact('qrs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.qr.create');
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
            'image'=>'required|image',
        ]);

        if($request->hasFile('image')) {
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name              = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/qr/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $qr = new Qr();
        $qr->title = $request->title;
        $qr->image = $name;
        $status = $qr->save();
        if($status){
            $request->session()->flash('success','QR Code was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! QR Code could not be added at this moment.');
        }
        return redirect('/ratnapustakalaya/qrcodes');
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
        $qr = Qr::find($id);
        return view('admin.qr.edit',compact('qr'));
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
        $qr = Qr::find($id);
        $request->validate([
            'title'=>'sometimes|string',
            'image'=>'sometimes|image',
        ]);

        $image1 = $qr->image;
        if($request->hasFile('image')) {
            File::delete('uploads/qr'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/qr/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $qr->title = $request->title;
        $qr->image = $name;
        $status = $qr->save();
        if($status){
            $request->session()->flash('success','QR Code was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! QR Code could not be updated at this moment.');
        }
        return redirect('/ratnapustakalaya/qrcodes');
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
