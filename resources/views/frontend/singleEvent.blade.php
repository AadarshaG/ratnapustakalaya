@extends('frontend.layouts.master')

@section('main-content')
    <!-- EVENTS -->
    <section id="event_single" class="ratna-bg-light">
        <div class="container text-center py-4 py-md-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="bg-white shadow">

                        <div class="row text-start p-4">
                            <div class="col-12 fs-2 fw-bold">{{ \Carbon\Carbon::parse($event->created_at)->format('l') }}</div>
                            <div class="col-12 fs-2 fw-bolds">{{ \Carbon\Carbon::parse($event->created_at)->format('d') }}</div>
                            <div class="col-12 fs-4">{{ \Carbon\Carbon::parse($event->created_at)->format('M, Y') }}</div>
                            <div class="col-12 border-top">3:00PM - 5:00PM</div>
                        </div>

                    </div>
                </div>

                <div class="col-md-9">

                    <div class="bg-white p-3 p-md-4">
                        <h1 class="text-start py-2 py-md-5" id="left-right">{!! $event->title !!}</h1>

                        <div style="text-align: justify;">
                            {!! $event->description !!}
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </section>
@endsection
