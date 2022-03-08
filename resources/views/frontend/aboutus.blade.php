@extends('frontend.layouts.master')

@section('main-content')
    <!-- ABOUT -->
    <section id="about" class="ratna-bg-light">
        <div class="container text-center py-4 py-md-5">
            <h3 class="font-28 font-w-700" id="left-right">{{$about->title}}</h3>

            <div class="px-2 px-md-5 py-2 py-md-4 font-18 font-w-400" style="text-align: justify;">
                {!! $about->description !!}
            </div>
        </div>

    </section>
@endsection
