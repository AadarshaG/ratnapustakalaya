<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Image;
use File;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::all();
        return view('admin.about.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
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
            'description'=>'required|string',
            //'image'=>'required|image',
        ]);

//        if($request->hasFile('image')) {
//            $image              = $request->file('image');
//            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
//                $constraint->aspectRatio();
//            });
//            $name              = time().'.' . $image->getClientOriginalExtension();
//            $destinationPath    = 'uploads/about/';
//            $ImageUpload->save($destinationPath.$name);
//        }else{
//            $name = '';
//        }
        $about = new About();
        $about->title = $request->title;
        $about->slug = \Str::slug($request->title);
        $about->description = $request->description;
        //$about->image = $name;
        $status = $about->save();
        if($status){
            $request->session()->flash('success','About Page was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! About Page could not be added at this moment.');
        }
        return redirect('/ratnapustakalaya/abouts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $about = About::find($id);
        return view('admin.about.show',compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = About::find($id);
        return view('admin.about.edit',compact('about'));
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
        $about = About::find($id);
        $request->validate([
            'title'=>'sometimes|string',
            'description'=>'sometimes|string',
            //'image'=>'sometimes|image',
        ]);

//        $image1 = $about->image;
//        if($request->hasFile('image')) {
//            File::delete('uploads/about'.'/'.$image1);
//            $image             = $request->file('image');
//            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
//                $constraint->aspectRatio();
//            });
//            $name               = time().'.' . $image->getClientOriginalExtension();
//            $destinationPath    = 'uploads/about/';
//            $ImageUpload->save($destinationPath.$name);
//        }else{
//            $name = $image1;
//        }
        $about->title = $request->title;
        $about->slug = \Str::slug($request->title);
        $about->description = $request->description;
        //$about->image = $name;
        $status = $about->save();
        if($status){
            $request->session()->flash('success','About Page was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! About Page could not be updated at this moment.');
        }
        return redirect('/ratnapustakalaya/abouts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::find($id);
       // $image = $about->image;
        $status = $about->delete();
        if($status){
           // \File::delete('uploads/about'.'/'.$image);
            request()->session()->flash('success','About Page deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! About Page could not be deleted at this moment.');
        }
        return redirect('/ratnapustakalaya/abouts');
    }
}
