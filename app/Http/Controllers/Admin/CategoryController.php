<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::all();
        return view('admin.category.index',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
        ]);


        $category = new Category();
        $category->title = $request->title;
        $status = $category->save();
        if($status){
            $request->session()->flash('success','Member Category was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Member Category could not be added at this moment.');
        }
        return redirect('/ratnapustakalaya/categorys');
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
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
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
        $category = Category::find($id);
        $request->validate([
            'title'=>'sometimes|string',
        ]);

        $category->title = $request->title;
        $status = $category->save();
        if($status){
            $request->session()->flash('success','Member Category was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Member Category could not be updated at this moment.');
        }
        return redirect('/ratnapustakalaya/categorys');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $status = $category->delete();
        if($status){
            request()->session()->flash('success','Member Category deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Member Category could not be deleted at this moment.');
        }
        return redirect('/ratnapustakalaya/categorys');
    }
}
