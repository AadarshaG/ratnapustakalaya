@extends('frontend.layouts.master')

@section('main-content')

    <section id="slider" class=" ">
        <div id="carousel_slider" class="col-9">
            <div id="carouselExampleCaptions" class="carousel ratna-h-600 slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    @foreach($sliders as $key=>$slider)
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$key}}"  @if($key == 0) class="active" @else class="" @endif aria-current="true" aria-label="Slide 1"></button>
                    @endforeach
                </div>
                <div class="carousel-inner h-100">
                    @foreach($sliders as $key=>$slide)
                    <div  @if($key == 0) class="carousel-item h-100 active" @else class="carousel-item h-100" @endif >
                        <img src="{{asset('uploads/slider/'.$slide->image)}}" class="d-block w-100 object-cover" style="height:300;"  alt="...">
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        @if($featured)
        <div id="carousel_side_img" class="col-3">
            <img src="{{asset('uploads/featured/'.$featured->image)}}" alt="">
        </div>
        @endif

    </section>



    <!-- ABOUT -->
    @if($about)
    <section class="ratna-bg-light">
        <div class="container text-center py-4 py-md-5">
            <h3 class="font-28 font-w-700" >{{$about->title}}</h3>

            <div class="px-2 px-md-5 py-2 py-md-4 font-18 font-w-400">
                {!! Str::limit($about->description,300) !!}
            </div>
            <a href="{{url('about-us')}}"><button class="about">More About</button></a>
        </div>
    </section>
    @endif


    <!-- blog section -->
    @if($vlogs)
    <section class="ratna-bg-light">
        <div class="container text-center py-4 py-md-5">
            <h3 class="font-28 font-w-700" >Vlog</h3>
            @foreach($vlogs as $vlog)
            @php
                // YouTube video url
                $videoURL = "$vlog->link";
                $urlArr = explode("=",$videoURL);
                $urlArrNum = count($urlArr);

                // Youtube video ID
                $youtubeVideoId = $urlArr[$urlArrNum - 1];
                // Generate youtube thumbnail url
                $thumbURL = 'http://img.youtube.com/vi/'.$youtubeVideoId.'/0.jpg';
            @endphp
            <a href="{{$vlog->link}}" target="_blank">
                <iframe width="420" height="500"
                        src="{{$thumbURL}}">
                </iframe>
            </a>
            @endforeach
        </div>
    </section>
    @endif




    <!-- COUNTERS -->
    @if($informations)
    <section class="ratna-bg-red">

        <div class="container py-4 ">
            <div class="row" id="left-right">
                @foreach($informations as $info)
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <article class="text-center h-100 mb-">
                        <figure class="size-75 mx-auto">
                            <img src="{{asset('uploads/information/'.$info->image)}}" alt="">
                        </figure>
                        <div class="font-w-500 text-white">
                            <small>{{$info->count}}+</small>
                            <div>{{$info->title}}</div>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>

    </section>
    @endif


    <!-- highlighted -->
    <div class="container-fluid text-center py-4 py-md-5 ratna-bg-light">
        <h3 class="font-28 font-w-700" >Highlighted Books</h3>
    </div>
    @if($books)
    <div class="container-fluid ratna-bg-light">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <!-- Carousel indicators -->
            <ol class="carousel-indicators">
                @foreach($books as $key=>$book)
                <li data-bs-target="#myCarousel" data-bs-slide-to="{{$key}}" @if($key == 0) class="active" @else class="" @endif></li>
               @endforeach
            </ol>

            <!-- Wrapper for carousel items -->
            <div class="carousel-inner">
                @foreach($books as $key=>$book)
                <div @if($key == 0) class="carousel-item active" @else class="carousel-item" @endif>
                    <img src="{{asset('uploads/book/'.$book->image)}}" class="d-block w-100 object-cover" alt="">
                </div>
                @endforeach
            </div>

            <!-- Carousel controls -->
            <a class="carousel-control-prev" href="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
    @endif


    <!-- EVENTS -->
    @if($blogs)
    <section class="ratna-bg-light">
        <div class="container text-center py-4 py-md-5">
            <h3 class="font-28 font-w-700">Events</h3>

            <div class="pty-2 pt-md-4">

                <div class="row">
                    @foreach($blogs as $blog)
                    <div class="col-6 col-md-3 mb-4">
                        <article class="text-center h-100 ratna-bg-light shadow ">
                            <a href="{{ url('event/'.$blog->slug) }}" class="link-dark">
                                <figure class="ratna-h-150">
                                    <img class="rounded object-cover" src="{{asset('uploads/blog/'.$blog->image)}}" alt="">
                                </figure>
                                <div class="text-start px-2 pb-2">
                                    <div class="font-w-400 ratna-two-line">
                                        {!! Str::limit($blog->description,100) !!}
                                    </div>
                                    <div class="font-w-500 ">
                                        {{ \Carbon\Carbon::parse($blog->created_at)->format('M d, Y') }}
                                    </div>
                                </div>
                            </a>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- FOOTER BANNER -->
    <section id="donate" class="ratna-bg-red">
        <div class="text-white p-4 text-center font-w-500 font-36"> Are you looking to make donation? </div>
        <a href="{{url('donate-now')}}"><button id="donate_btn">Donate now</button></a>

    </section>
@endsection
