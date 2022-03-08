@extends('frontend.layouts.master')

@section('main-content')
    <!-- EVENTS -->
    <section id="events" class="ratna-bg-light">
        <div class="container text-center py-4 py-md-5">
            <h3 class="font-28 font-w-700" id="left-right">Events</h3>
            <div>
                <button class="btn btn-danger ratna-bg-red">Upcoming</button>
                <button class="btn btn-outline-danger">This Week</button>
                <button class="btn btn-outline-danger">This Month</button>

            </div>

            <div class="pty-2 pt-md-4">
                @if($events)
                    <div class="row">
                        @foreach($events as $event)
                            <div class="col-6 col-md-3 mb-4">
                                <article class="text-center h-100 ratna-bg-light shadow ">
                                    <a href="{{ url('event/'.$event->slug) }}" class="link-dark">
                                        <figure class="ratna-h-150">
                                            <img class="rounded object-cover" src="{{asset('uploads/blog/'.$event->image)}}" alt="">
                                        </figure>
                                        <div class="text-start px-2 pb-2">
                                            <div class="font-w-400 ratna-two-line">
                                                {!! Str::limit($event->description,100) !!}
                                            </div>
                                            <div class="font-w-500 ">
                                                {{ \Carbon\Carbon::parse($event->created_at)->format('M d, Y') }}
                                            </div>

                                        </div>
                                    </a>
                                </article>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>

    </section>
@endsection
