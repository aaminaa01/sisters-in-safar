@extends('templates.layout')
@section('scriptsAndLinks')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

@endsection

@section('titleContent')
    <H1 class="font-weight-bold display-3">sistersInسفر</H1>
    <H4 id="tagline">Empowering Pakistani women to travel and explore safely.</H4>
@endsection
@section('content')
<div class="pg-content">
    <div class="form-content">
        <form action="/users/register" method="post">
        <div class="header">
                    <p style="text-align: center;"><h2>Sign up</h2></p>
                </div>
        @csrf
            <div class="field input-field">
                <input type="text" placeholder="Name" id="name" name="name"  value="{{ old('name') }}" class="form-control">
               
            </div>
            <div class="field input-field">
                <input type="text" placeholder="Email" id="email" name="email"  value="{{ old('email') }}" class="form-control">
               
            </div>
            <div class="field input-field">
                <input type="password" placeholder="Password" id="password" name="password"  value="{{ old('password') }}" class="form-control">
              
            </div>
            <div class="field input-field">
                <input type="password" placeholder="Confirm Password" id="password_confirmation" name="password_confirmation"  value="{{ old('password_confirmation') }}" class="form-control">
            </div>
            <div class="field button-field">
                        <button type="submit">Register</button>
            </div>
   
            <div class="form-link">
                <span>Already have an account? <a href="/login" class="link signup-link">Log in!</a></span>
            </div>
             </form>
            
    </div>
</div>
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/homepg_styles.css') }}">

    <link rel="stylesheet" href="{{ asset('css/contact_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login_up_styles.css') }}">

@endpush
@endsection