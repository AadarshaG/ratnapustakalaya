<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Shree Ratna Pustakalaya</title>
    <link rel="icon" href="{{asset('assets/frontend/img/calender.png')}}">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!-- SLICK -->
    <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <!-- CUSTOM STYLE -->
    <link rel="stylesheet" href="{{asset('assets/frontend/style/css/style.css')}}">

</head>

<body>

<header class="nav_header">
    <div class="container">
        <div class="d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center align-items-lg-end">
            <h1 class=" fw-bold ff-playfair font-36 py-2 py-lg-4 text-center">
                <a href="{{url('/')}}" class="link-dark text-decoration-none"> Shree Ratna Pustakalaya</a>
            </h1>
            @php
                $social = DB::table('socials')->select('*')->get();
            @endphp
            @if($social)
            <ul class="list-group list-group-horizontal">
                @foreach($social as $soc)
                <li class="list-group-item border-0">
                    <a href="https://facebook.com">
                        <figure class="m-auto size-30">
                            <img src="{{asset('uploads/social/'.$soc->image)}}" alt="">
                        </figure>
                    </a>
                </li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>

    <nav class="navbar navbar-expand-lg ratna-bg-red">
        <div class="container">
            <a class="navbar-brand d-lg-none link-light" href="{{url('/')}}">Home</a>
            <button class="navbar-toggler border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item px-2">
                        <a class="nav-link link-light font-18 ratna-underline {{Request::is('/') ? 'active' : ''}}" aria-current="page" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link link-light font-18 ratna-underline {{Request::is('about-us') ? 'active' : ''}}" href="{{url('about-us')}}">About</a>
                    </li>

                    <li class="nav-item px-2">
                        <a class="nav-link link-light font-18 ratna-underline {{Request::is('events') ? 'active' : ''}}" href="{{url('events')}}">Events</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link link-light font-18 ratna-underline {{Request::is('gallery-images') ? 'active' : ''}}" href="{{url('gallery-images')}}">Gallery</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link link-light font-18 ratna-underline {{Request::is('committee-members') ? 'active' : ''}}" href="{{url('committee-members')}}">Committe</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link link-light font-18 ratna-underline {{Request::is('membership') ? 'active' : ''}}" href="{{url('membership')}}">Become a Member</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link link-light font-18 ratna-underline {{Request::is('contact-us') ? 'active' : ''}}" href="{{url('contact-us')}}">Contact</a>
                    </li>



                </ul>
                <a href="{{url('enquiry')}}"><button class="header-btn">Make an Enquiry</button></a>

            </div>
        </div>
    </nav>
</header>

@yield('main-content')

<footer class="py-2 py-md-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="ff-playfair font-28 font-w-700 text-center text-md-start">Shree Ratna Pustakalaya</div>
                @php
                    $contact = DB::table('contacts')->select('*')->first();
                @endphp
                @if($contact)
                <ul class="list-group text-center text-md-start">

                    <li class="list-group-item border-0">
                        <span class="me-2"><i class="bi bi-geo-alt"></i></span>
                        <a href="#!" class="link-dark">{{$contact->address}}</a>
                    </li>
                    <li class="list-group-item border-0">
                        <span class="me-2"><i class="bi bi-telephone-inbound"></i></span>
                        <a href="tel:01-5912347" class="link-dark">{{$contact->phone}}</a>
                    </li>

                    <li class="list-group-item border-0">
                        <span class="me-2"><i class="bi bi-envelope"></i></span>
                        <a href="mailto:email@mail.com" class="link-dark">{{$contact->email}}</a>
                    </li>
                </ul>
                @endif
            </div>

            <div class="col-md-6">
                <div class="ff-playfair font-18 font-w-700 text-center text-md-start">Socials</div>
                @php
                    $socials = DB::table('socials')->select('*')->get();
                @endphp
                @if($socials)
                <ul class="list-group list-group-horizontal">
                    @foreach($socials as $social)
                    <li class="list-group-item border-0 mx-auto mx-md-0">
                        <a href="{{$social->link}}" target="_blank">
                            <img src="{{asset('uploads/social/'.$social->image)}}" class="size-30" alt="">
                        </a>
                    </li>
                    @endforeach
                </ul>
                @endif

            </div>
        </div>
        <div class="border-top p-2">
            &copy; Ratna Pustakalaya {{date('Y')}}
        </div>
    </div>


</footer>

<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- JQUERY -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- SLICK -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- GSAP -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>

{{--    member filters--}}
    <script>
        $(document).ready(function(){
            $('[name="Category"]').click(function(e){
                checkedArray = Array();
                $('.CategoryCheck:checked').each(function() {
                    checkedArray.push($(this).attr("id"));
                });
                $.ajax({
                    url:"{{route('committeeMember')}}",
                    method:"POST",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{
                        checkboxArray: checkedArray,
                    },
                    success:function(response){
                        $('.member-ajax').html(response.data);
                    }
                });
            });
        })
    </script>


<!-- CUSTOM JS -->
<script src="{{asset('assets/frontend/js/app.js')}}"></script>

</body>

</html>
