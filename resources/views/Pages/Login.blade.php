@extends('Layouts.Layout-1')
@section('Title', 'Login - SEA SERVICE TESTIMONIAL')

@section('Content')
    <div class="Login" style="background-image: url('{{ asset('images/bg.jpg') }}');     background-size: cover;">
        <div class="inner"> 
            <h1>SEA SERVICE <br> TESTIMONIAL</h1>
            <h2>Login to your account</h2>
            <label for="">Email</label>
            <br>
            <input type="email" placeholder="Enter your email..">
            <br>
            <label for="">Password</label>
            <br>
            <input type="password">
            <br>
            <button>Login &#8594;</button>
        </div>
    </div>
@endsection
