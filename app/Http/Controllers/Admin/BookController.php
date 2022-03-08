<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Image;
use File;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('id','desc')->get();
        return view('admin.book.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.create');
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
            $destinationPath    = 'uploads/book/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }

        $book = new Book();
        $book->title = $request->title;
        $book->image = $name;
        $status = $book->save();
        if($status){
            $request->session()->flash('success','Book  was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Book could not be added at this moment.');
        }
        return redirect('/ratnapustakalaya/books');
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
        $book = Book::find($id);
        return view('admin.book.edit',compact('book'));
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
        $book = Book::find($id);
        $request->validate([
            'title'=>'sometimes|string',
            'image'=>'sometimes|image',
        ]);

        $image1 = $book->image;
        if($request->hasFile('image')) {
            File::delete('uploads/book'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/book/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $book->title = $request->title;
        $book->image = $name;
        $status = $book->save();
        if($status){
            $request->session()->flash('success','Book was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Book could not be updated at this moment.');
        }
        return redirect('/ratnapustakalaya/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $image = $book->image;
        $status = $book->delete();
        if($status){
            \File::delete('uploads/book'.'/'.$image);
            request()->session()->flash('success','Book deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Book could not be deleted at this moment.');
        }
        return redirect('/ratnapustakalaya/books');
    }

    public function enableBook($id)
    {
        $book = Book::find($id);
        $book->status = 1;
        $book->save();
        return redirect('/ratnapustakalaya/books')->with('success', 'Book  Enabled Successfully');
    }

    public function disableBook($id)
    {
        $book = Book::find($id);
        $book->status = 0;
        $book->save();
        return redirect('/ratnapustakalaya/books')->with('success', 'Book  Disabled Successfully');
    }
}
