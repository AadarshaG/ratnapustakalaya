<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;
use Image;
use File;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = Social::all();
        return view('admin.social.index',compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.social.create');
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
            'link'=>'required|string',
            'image'=>'required|image',
        ]);

        if($request->hasFile('image')) {
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name              = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/social/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $social = new Social();
        $social->title = $request->title;
        $social->link = $request->link;
        $social->image = $name;
        $status = $social->save();
        if($status){
            $request->session()->flash('success','Social Link Page was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Social Link Page could not be added at this moment.');
        }
        return redirect('/ratnapustakalaya/socials');
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
        $social = Social::find($id);
        return view('admin.social.edit',compact('social'));
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
        $social = Social::find($id);

        $request->validate([
            'title'=>'sometimes|string',
            'link'=>'sometimes|string',
            'image'=>'sometimes|image',
        ]);

        $image1 = $social->image;
        if($request->hasFile('image')) {
            File::delete('uploads/social'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/social/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $social->title = $request->title;
        $social->link = $request->link;
        $social->image = $name;
        $status = $social->save();
        if($status){
            $request->session()->flash('success','Social Link was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Social Link could not be updated at this moment.');
        }
        return redirect('/ratnapustakalaya/socials');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $social = Social::find($id);
        $image = $social->image;
        $status = $social->delete();
        if($status){
            \File::delete('uploads/social'.'/'.$image);
            request()->session()->flash('success','Social Link deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Social Link could not be deleted at this moment.');
        }
        return redirect('/ratnapustakalaya/socials');
    }
}
