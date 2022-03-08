<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Committee;
use Illuminate\Http\Request;
use Image;
use File;

class CommitteeController extends Controller
{
    protected $category = null;
    protected $committee = null;
    public function __construct(Category $category, Committee $committee)
    {
        $this->category = $category;
        $this->committee = $committee;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $committees = $this->committee->getAll();
        return view('admin.committee.index',compact('committees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::select('*')->orderBy('title','asc')->get();
        return view('admin.committee.create',compact('category'));
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
            'category_id'=>'required|exists:categories,id',
            'title'=>'required|string',
            'position'=>'required|string',
            'image'=>'required|image',
        ]);

        if($request->hasFile('image')) {
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name              = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/committee/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $committee = new Committee();
        $committee->category_id = $request->category_id;
        $committee->title = $request->title;
        $committee->position = $request->position;
        $committee->image = $name;
        $status = $committee->save();
        if($status){
            $request->session()->flash('success','Committee Member was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Committee Member could not be added at this moment.');
        }
        return redirect('/ratnapustakalaya/committees');
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
        $committee = Committee::find($id);
        $category = Category::select('*')->orderBy('title','asc')->get();
        return view('admin.committee.edit',compact('committee','category'));
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
        $committee = Committee::find($id);
        $request->validate([
            //'category_id'=>'sometimes|exists:categories,id',
            'title'=>'sometimes|string',
            'position'=>'sometimes|string',
            'image'=>'sometimes|image',
        ]);
        $image1 = $committee->image;
        if($request->hasFile('image')) {
            File::delete('uploads/committee'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/committee/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        //$committee->category_id = $request->category_id;
        $committee->title = $request->title;
        $committee->position = $request->position;
        $committee->image = $name;
        $status = $committee->save();
        if($status){
            $request->session()->flash('success','About Page was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! About Page could not be updated at this moment.');
        }
        return redirect('/ratnapustakalaya/committees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $committee = Committee::find($id);
        $image = $committee->image;
        $status = $committee->delete();
        if($status){
            \File::delete('uploads/committee'.'/'.$image);
            request()->session()->flash('success','Committee Member deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Committee Member could not be deleted at this moment.');
        }
        return redirect('/ratnapustakalaya/committees');
    }
}
