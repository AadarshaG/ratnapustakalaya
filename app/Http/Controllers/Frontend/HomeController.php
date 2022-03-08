<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\Book;
use App\Models\Featured;
use App\Models\Information;
use App\Models\Slider;
use App\Models\Vlog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::select('*')->where('status',1)->get();
        $featured = Featured::select('*')->first();
        $about = About::select('*')->first();
        $informations = Information::select('*')->get();
        $vlogs = Vlog::select('*')->latest()->paginate(1);
        $books = Book::select('*')->where('status',1)->get();
        $blogs = Blog::select('*')->latest()->paginate(4);
        return view('welcome',compact('sliders','about','blogs','featured','vlogs','books','informations'));
    }
}
