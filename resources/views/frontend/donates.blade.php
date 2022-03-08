@extends('frontend.layouts.master')

@section('main-content')
    <!-- payment -->
    <section id="about" class="ratna-bg-light">
        <div class="container text-center py-4 py-md-5">
            <h3 class="font-28 font-w-700" id="left-right">Payment Methods</h3>
            <div>


                <div class="wrap_up" >
                </div>
                @foreach($payments as $pay)
                <div class="main">
                    <div class="account_info">
                        <div>
                            <h5>Pay Via Bank Transfer</h5>
                            <h5>A/C NO: {{$pay->account}}</h5>
                            <h5>A/C Holder's Name: {{$pay->title}}</h5>
                        </div>
                        <div>
                            <img id="khalti_logo" src="{{asset('uploads/payment/'.$pay->image)}}" alt="">
                        </div>
                    </div>
                </div>
                @endforeach
{{--                <div class="mains">>--}}
{{--                    <div class="account_info">--}}
{{--                        <div>--}}
{{--                            <h5>Pay Via Bank Transfer</h5>--}}
{{--                            <h5>A/C NO: 123456</h5>--}}
{{--                            <h5>A/C Holder's Name: Ratna Pustakalaya</h5>--}}
{{--                        </div>--}}
{{--                        <div><img id="esewa_logo" src="http://atmpharmacy.com/public/uploads/all/X7RjffrmSF1j7kqz2IW6UeGnF34AgUJQ5yYT8Mpg.png" alt=""></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <div class="qr_code">
                <div>
                    <h5 id="scan">Scan To Pay</h5>
                    <div><img id="qr" src="{{asset('uploads/qr/'.$qr->image)}}" alt=""></div>
                </div>

            </div>
        </div>


    </section>
@endsection
