<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;
use Image;
use File;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = Information::all();
        return view('admin.information.index',compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.information.create');
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
            'count'=>'required|string',
            'image'=>'required|image',
        ]);

        if($request->hasFile('image')) {
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name              = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/information/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }

        $information = new Information();
        $information->title = $request->title;
        $information->count = $request->count;
        $information->image = $name;
        $status = $information->save();
        if($status){
            $request->session()->flash('success','Information  was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Information could not be added at this moment.');
        }
        return redirect('/ratnapustakalaya/informations');
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
        $information = Information::find($id);
        return view('admin.information.edit',compact('information'));
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
        $information = Information::find($id);

        $request->validate([
            'title'=>'sometimes|string',
            'count'=>'sometimes|string',
            'image'=>'sometimes|image',
        ]);

        $image1 = $information->image;
        if($request->hasFile('image')) {
            File::delete('uploads/information'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/information/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $information->title = $request->title;
        $information->count = $request->count;
        $information->image = $name;
        $status = $information->save();
        if($status){
            $request->session()->flash('success','Information was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Information could not be updated at this moment.');
        }
        return redirect('/ratnapustakalaya/informations');
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
