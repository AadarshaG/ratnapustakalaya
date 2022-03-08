<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;
use File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id','desc')->get();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            $destinationPath    = 'uploads/slider/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }

        $slider = new SLider();
        $slider->title = $request->title;
        $slider->image = $name;
        $status = $slider->save();
        if($status){
            $request->session()->flash('success','Slider Page was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Slider Page could not be added at this moment.');
        }
        return redirect('/ratnapustakalaya/sliders');
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
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
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
        $slider = Slider::find($id);

        $request->validate([
            'title'=>'sometimes|string',
            'image'=>'sometimes|image',
        ]);

        $image1 = $slider->image;
        if($request->hasFile('image')) {
            File::delete('uploads/slider'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/slider/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $slider->title = $request->title;
        $slider->image = $name;
        $status = $slider->save();
        if($status){
            $request->session()->flash('success','Slider Page was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Slider Page could not be updated at this moment.');
        }
        return redirect('/ratnapustakalaya/sliders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $image = $slider->image;
        $status = $slider->delete();
        if($status){
            \File::delete('uploads/slider'.'/'.$image);
            request()->session()->flash('success','Slider Page deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Slider Page could not be deleted at this moment.');
        }
        return redirect('/ratnapustakalaya/sliders');
    }

    public function enableSLider($id)
    {
        $slider = Slider::find($id);
        $slider->status = 1;
        $slider->save();
        return redirect('/ratnapustakalaya/sliders')->with('success', 'Slider  Enabled Successfully');
    }

    public function disableSLider($id)
    {
        $slider = Slider::find($id);
        $slider->status = 0;
        $slider->save();
        return redirect('/ratnapustakalaya/sliders')->with('success', 'Slider  Disabled Successfully');
    }
}
