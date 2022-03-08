@extends('frontend.layouts.master')

@section('main-content')

    <!-- Galery -->
    <section id="gallery" class="ratna-bg-light">
        <div class="container text-center py-4 py-md-5">
            <h3 class="font-28 font-w-700" id="left-right">Gallery</h3>

            @if($gallerys)
            <section class="gallery">
                @foreach($gallerys as $gall)
                <div>
                    <a>
                        <img class="gallery_img" src="{{asset('uploads/gallery/'.$gall->image)}}" alt="">
                    </a>
                </div>
                    @endforeach
            </section>
                {{$gallerys->links()}}
            @endif
        </div>

    </section>
@endsection
