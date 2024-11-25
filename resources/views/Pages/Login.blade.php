@extends('Layouts.Layout-1')
@if (parse_url(url()->current())['host'] == 'vesseltracker.lttcoastalmarine.com' || parse_url(url()->current())['host'] == '192.168.20.252')
    @php session()->put('APP_NAME', 'VESSEL AVAILABILITY') @endphp
    @section('Title', 'Login - ' . session()->get('APP_NAME'))
@elseif (parse_url(url()->current())['host'] == 'seaservice.lttcoastalmarine.com')
    @php session()->put('APP_NAME', 'SEA SERVICE TESTIMONIAL') @endphp
    @section('Title', 'Login - ' . session()->get('APP_NAME'))
@endif

@section('Content')
    <div class="company-logo">
        <img src="{{ asset('Images/LTT -DEPASA Logo.png') }}" alt="">
    </div>
    <div class="loader-2">
        <div class="x">
            @if (parse_url(url()->current())['host'] == 'vesseltracker.lttcoastalmarine.com' || parse_url(url()->current())['host'] == '192.168.20.252')
            <img src="{{ asset('images/loader-2.gif') }}" alt="">
            @elseif (parse_url(url()->current())['host'] == 'seaservice.lttcoastalmarine.com')
            <img src="{{ asset('images/loader-3.gif') }}" alt="">
            @endif
        </div>
        <div>
            <p></p>
            <h2>MARINE SERVICE</h2>
            <h3>software solutions</h3>
        </div>
    </div>
    <div class="Login" style="transition: background-image 4s ease; background-image: url('@if (parse_url(url()->current())['host'] == 'vesseltracker.lttcoastalmarine.com' || parse_url(url()->current())['host'] == '192.168.20.252'){{ asset('images/bg-2.jpg') }}@elseif (parse_url(url()->current())['host'] == 'seaservice.lttcoastalmarine.com'){{ asset('images/bg.jpg') }}@endif'); background-size: cover; background-position: center">
        <div class="inner"> 
            <form class="LoginForm" action="{{ route('Auth') }}" method="POST">
                @csrf
                @if (parse_url(url()->current())['host'] == 'vesseltracker.lttcoastalmarine.com' || parse_url(url()->current())['host'] == '192.168.20.252')
                <h1 style="color: #225f7d">ORI</h1>
                @elseif (parse_url(url()->current())['host'] == 'seaservice.lttcoastalmarine.com')
                <h1>SEA SERVICE <br> TESTIMONIAL</h1>
                @endif
                <h2>Login to your account</h2>
                <p class="error-login error {{ session()->has('Error') ? 'Show' : '' }}">{{ session()->get('Error') }}</p>
                <label for="">Email</label>
                <br>
                <input type="email" placeholder="Enter your email.." name="Email">
                <br>
                <label for="">Password</label>
                <br>
                <input type="password" name="Password">
                <br>
                <button class="LoginButton">Login &#8594;</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('/js/Pages/Login.js') }}"></script>
@endsection
