@extends('Layouts.Layout-1')
@if (parse_url(url()->current())['host'] == 'vesseltracker.lttcoastalmarine.com')
    @php session()->put('APP_NAME', 'VESSEL AVAILABILITY') @endphp
    @section('Title', 'Login - ' . session()->get('APP_NAME'))
@elseif (parse_url(url()->current())['host'] == 'seaservice.lttcoastalmarine.com')
    @php session()->put('APP_NAME', 'SEA SERVICE TESTIMONIAL') @endphp
    @section('Title', 'Login - ' . session()->get('APP_NAME'))
@endif

@section('Content')
    <div class="Login" style="background-image: url('{{ asset('images/bg.jpg') }}'); background-size: cover;">
        <div class="inner"> 
            <form class="LoginForm" action="{{ route('Auth') }}">
                @if (parse_url(url()->current())['host'] == 'vesseltracker.lttcoastalmarine.com')
                <h1>VESSEL <br> AVAILABILITY</h1>
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
