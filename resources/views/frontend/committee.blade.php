@extends('frontend.layouts.master')

@section('main-content')
    <!-- Comittee -->
    <div id="committe_main" class="container-fluid ratna-bg-light text-center py-4 py-md-5">
        <h3 class="font-28 font-w-700" id="left-right">Honourable Committee</h3>
        <section id="committe_member">
            @foreach($honorable as $honn)
            <div>
                <img class="committe_img" src="{{asset('uploads/committee/'.$honn->image)}}" alt="">
                <p><span class="committe_name">{!! $honn->title !!}</span></p>
                <p><span class="committe_position">{!! $honn->position !!}</span></p>
            </div>
            @endforeach
        </section>
    </div>

    <section id="committer" class="ratna-bg-light">
        <div class="container text-center py-4 py-md-5">
            <h3 class="font-28 font-w-700" id="left-right">Committee</h3>

            <div class="committe_links ratna-bg-light">
                <ul>
                    @foreach($category as $cat)
                    <li>
                        <input type="checkbox" class="CategoryCheck" name="Category" id="{{$cat->id}}" value="{{$cat->title}}">
                        {{$cat->title}}
                    </li>
                    @endforeach
                </ul>
            </div>

            <section class="committe member-ajax">
                @foreach($members as $mem)
                    <div>
                        <img class="committe_img" src="{{asset('uploads/committee/'.$mem->image)}}" alt="">
                        <p><span class="committe_name">{!! $mem->title !!}</span></p>
                        <p><span class="committe_position">{!! $mem->position !!}</span></p>
                    </div>
                @endforeach
            </section>
        </div>

    </section>
@endsection


