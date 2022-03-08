<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Featured;
use Illuminate\Http\Request;
use Image;
use File;

class FeaturedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featureds = Featured::orderBy('id','desc')->get();
        return view('admin.featured.index',compact('featureds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.featured.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
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
            $destinationPath    = 'uploads/featured/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }

        $featured = new Featured();
        $featured->title = $request->title;
        $featured->image = $name;
        $status = $featured->save();
        if($status){
            $request->session()->flash('success','Featured Image  was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Featured Image could not be added at this moment.');
        }
        return redirect('/ratnapustakalaya/featureds');
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
        $featured = Featured::find($id);
        return view('admin.featured.edit',compact('featured'));
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
        $featured = Featured::find($id);
        $request->validate([
            'title'=>'sometimes|string',
            'image'=>'sometimes|image',
        ]);

        $image1 = $featured->image;
        if($request->hasFile('image')) {
            File::delete('uploads/featured'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/featured/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $featured->title = $request->title;
        $featured->image = $name;
        $status = $featured->save();
        if($status){
            $request->session()->flash('success','Featured Image was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Featured Image could not be updated at this moment.');
        }
        return redirect('/ratnapustakalaya/featureds');
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
