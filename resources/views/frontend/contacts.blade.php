@extends('frontend.layouts.master')

@section('main-content')
    <section id="contact" class="py-2 py-md-4 ratna-bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="ff-playfair font-28 font-w-700 text-center text-md-start mt-2 mt-md-5">Shree Ratna Pustakalaya</div>

                    <ul class="list-group text-center text-md-start">

                        <li class="list-group-item border-0 bg-transparent">
                            <span class="me-2"><i class="bi bi-geo-alt"></i></span>
                            <a href="#!" class="link-dark">{{$contact->address}}</a>
                        </li>
                        <li class="list-group-item border-0 bg-transparent">
                            <span class="me-2"><i class="bi bi-telephone-inbound"></i></span>
                            <a href="tel:01-5912347" class="link-dark">{{$contact->phone}}</a>
                        </li>

                        <li class="list-group-item border-0 bg-transparent">
                            <span class="me-2"><i class="bi bi-envelope"></i></span>
                            <a href="mailto:email@mail.com" class="link-dark">{{$contact->email}}</a>
                        </li>
                    </ul>

                    <div class="ff-playfair font-18 font-w-700 text-center text-md-start mt-2 mt-md-5">Socials</div>
                    <ul class="list-group list-group-horizontal">
                        @foreach($links as $link)
                        <li class="list-group-item border-0 mx-auto mx-md-0 bg-transparent">
                            <a href="{{$link->link}}" target="_blank">
                                <img src="{{asset('uploads/social/'.$link->image)}}" class="size-30" alt="">
                            </a>
                        </li>
                        @endforeach
                    </ul>

                    <div class=" rounded-3 my-4 me-0 me-md-5 ">
                        @include('admin.layouts.messages')
                        <div class="ff-playfair font-28 font-w-700 text-center text-md-start py-2">Make an Inquiry</div>
                        <form action="{{url('send')}}" method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" name="name" inputmode="text" class="form-control" id="floatingInput" placeholder="Full Name" value="{{old('name}}">
                                <label for="floatingInput">Full Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" name="email" inputmode="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{old('email}}">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" name="phone" inputmode="tel" class="form-control" id="floatingInput" placeholder="Contact" value="{{old('phone}}">
                                <label for="floatingContact">Contact</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="messages" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" value="{{old('messages}}"></textarea>
                                <label for="floatingTextarea2">Your Message</label>
                            </div>

                            <button class="btn btn-danger ratna-bg-red">Send</button>

                        </form>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="ff-playfair font-28 font-w-700 text-center text-md-start my-2 my-md-5">Our Location</div>

                    <div class="h-100 w-100">
                        <iframe src="{!! $contact->iframe !!}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>



                </div>
            </div>
        </div>
    </section>

@endsection
