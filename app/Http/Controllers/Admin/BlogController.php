<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Image;
use File;
use Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('id','desc')->get();
        return view('admin.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
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
            'author'=>'required|string',
            'description'=>'required|string',
            'image'=>'required|image',
        ]);

        if($request->hasFile('image')) {
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name              = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/blog/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->author = $request->author;
        $blog->description = $request->description;
        $blog->image = $name;
        $status = $blog->save();
        if($status){
            $request->session()->flash('success','Blog Page was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Blog Page could not be added at this moment.');
        }
        return redirect('/ratnapustakalaya/blogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.edit',compact('blog'));
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
        $blog = Blog::find($id);
        $request->validate([
            'title'=>'sometimes|string',
            'author'=>'sometimes|string',
            'description'=>'sometimes|string',
            'image'=>'sometimes|image',
        ]);

        $image1 = $blog->image;
        if($request->hasFile('image')) {
            File::delete('uploads/blog'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/blog/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $blog->title = $request->title;
        $blog->slug = \Str::slug($request->title);
        $blog->author = $request->author;
        $blog->description = $request->description;
        $blog->image = $name;
        $status = $blog->save();
        if($status){
            $request->session()->flash('success','Blog Page was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Blog Page could not be updated at this moment.');
        }
        return redirect('/ratnapustakalaya/blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $image = $blog->image;
        $status = $blog->delete();
        if($status){
            \File::delete('uploads/blog'.'/'.$image);
            request()->session()->flash('success','Blog Page deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Blog Page could not be deleted at this moment.');
        }
        return redirect('/ratnapustakalaya/blogs');
    }
}
