<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Image;
use File;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallerys = Gallery::orderBy('id','desc')->get();
        return view('admin.gallery.index',compact('gallerys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
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
            $destinationPath    = 'uploads/gallery/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $gallery = new Gallery();
        $gallery->title = $request->title;
        $gallery->image = $name;
        $status = $gallery->save();
        if($status){
            $request->session()->flash('success','Gallery Image was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Gallery Image could not be added at this moment.');
        }
        return redirect('/ratnapustakalaya/gallerys');
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
        $gallery = Gallery::find($id);
        return view('admin.gallery.edit',compact('gallery'));
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
        $gallery = Gallery::find($id);
        $request->validate([
            'title'=>'sometimes|string',
            'image'=>'sometimes|image',
        ]);

        $image1 = $gallery->image;
        if($request->hasFile('image')) {
            File::delete('uploads/gallery'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/gallery/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $gallery->title = $request->title;
        $gallery->image = $name;
        $status = $gallery->save();
        if($status){
            $request->session()->flash('success','Gallery Image was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Gallery Image could not be updated at this moment.');
        }
        return redirect('/ratnapustakalaya/gallerys');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        $image = $gallery->image;
        $status = $gallery->delete();
        if($status){
            \File::delete('uploads/gallery'.'/'.$image);
            request()->session()->flash('success','Gallery Image deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Gallery Image could not be deleted at this moment.');
        }
        return redirect('/ratnapustakalaya/gallerys');
    }
}
