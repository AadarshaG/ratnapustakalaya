@extends('frontend.layouts.master')

@section('main-content')
    <section  id="membership" class="py-4 py-md-5 ratna-bg-light">
        <div class="container">

            <div class="bg-white col-md-6 mx-auto rounded-3 p-4">
                @include('admin.layouts.messages')
                <div class="ff-playfair font-28 font-w-700 text-center text-md-start py-2">Become A Member</div>
                <div class="pb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam modi, cum veniam reprehenderit adipisci saepe tenetur autem dolorem eligendi atque explicabo. Adipisci voluptates odit architecto!</div>
                <form action="{{url('membership')}}" method="post">
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

                    <button class="btn btn-danger ratna-bg-red">Submit</button>

                </form>
            </div>
        </div>
    </section>

@endsection
