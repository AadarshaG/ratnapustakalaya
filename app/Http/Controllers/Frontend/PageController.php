<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Committee;
use App\Models\Gallery;
use App\Models\Payment;
use App\Models\Qr;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $committee = null;
    public function __construct(Committee $committee)
    {
        $this->committee = $committee;
    }

    public function about()
    {
        $about = About::select('*')->first();
        return view('frontend.aboutus',compact('about'));
    }

    public function events()
    {
        $events = Blog::select('*')->latest()->paginate(16);
        return view('frontend.events',compact('events'));
    }

    public function singleEvent($slug)
    {
        $event = Blog::select('*')->where('slug',$slug)->first();
        return view('frontend.singleEvent',compact('event'));
    }

    public function upcoming()
    {
        $events = Blog::select('*')->where('event_date','>', Carbon::now())->get();
        return view('frontend.upcoming',compact('events'));
    }

    public function donate()
    {
        $payments = Payment::select('*')->get();
        $qr = Qr::select('*')->first();
        return view('frontend.donates',compact('payments','qr'));
    }

    //gallery images
    public function gallery()
    {
        $gallerys = Gallery::select('*')->latest()->paginate(16);
        return view('frontend.gallery',compact('gallerys'));
    }
    //committee members
    public function committee(Request $request)
    {
        $category = Category::select('*')->get();
        $honorable = Committee::select('*')->where('category_id',1)->get();
        $members = Committee::select('*')->get();
        $query = $this->committee;
        if ($request->ajax())
        {
            $input = $request->all();
            if(isset($request->checkboxArray)){
                $query = $query->whereIn('category_id', $request->checkboxArray);
            }

            $members = $query->orderBy('id','desc')->paginate(24);
            $htmlData = view('frontend.ajax.members',compact('members'))->render();

            return response()->json(['success'=>true,'data'=>$htmlData]);
        }
        $data = $query->orderBy('id','desc')->paginate(24);
        return view('frontend.committee')->with([
            'category'=> $category,
            'honorable' => $honorable,
            'members' => $data
        ]);
    }
}
