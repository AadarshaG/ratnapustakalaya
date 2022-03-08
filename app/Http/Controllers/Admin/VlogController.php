<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vlog;
use Illuminate\Http\Request;

class VlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vlogs = Vlog::orderBy('id','desc')->get();
        return view('admin.vlog.index',compact('vlogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vlog.create');

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
            'link'=>'required|string'
        ]);
        $vlog = new Vlog();
        $vlog->title = $request->title;
        $vlog->link = $request->link;
        $status = $vlog->save();
        if($status){
            $request->session()->flash('success','Vlog Page was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Vlog Page could not be added at this moment.');
        }
        return redirect('/ratnapustakalaya/vlogs');
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
        $vlog = Vlog::find($id);
        return view('admin.vlog.edit',compact('vlog'));
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
        $vlog = Vlog::find($id);
        $request->validate([
            'title'=>'sometimes|string',
            'link'=>'sometimes|string',
        ]);

        $vlog->title = $request->title;
        $vlog->link = $request->link;
        $status = $vlog->save();
        if($status){
            $request->session()->flash('success','Vlog Page was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Vlog Page could not be updated at this moment.');
        }
        return redirect('/ratnapustakalaya/vlogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vlog = Vlog::find($id);
        $status = $vlog->delete();
        if($status){
            request()->session()->flash('success','VLog Page deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! VLog Page could not be deleted at this moment.');
        }
        return redirect('/ratnapustakalaya/vlogs');
    }
}
