@extends('Layouts.Layout-1')
@section('Title', 'Login - SEA SERVICE TESTIMONIAL')

@section('Content')
    <div class="Login" style="background-image: url('{{ asset('images/bg.jpg') }}'); background-size: cover;">
        <div class="inner"> 
            <form class="LoginForm" action="{{ route('Auth') }}">
                <h1>SEA SERVICE <br> TESTIMONIAL</h1>
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
