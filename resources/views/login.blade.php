@extends('templates.layout')
@section('scriptsAndLinks')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

@endsection

@section('titleContent')
    <H1 class="font-weight-bold display-3">sistersInسفر</H1>
    <H4 id="tagline">Empowering Pakistani women to travel and explore safely.</H4>
@endsection

@section('content')
   
  
    <div class="pg-content row">
            <div class="form-content">
                <div class="header">
                    <p style="text-align: center;"><h2>Sign in</h2></p>
                </div>
                <form action="/users/authenticate" method="post" class="text-center">
                @csrf
                    <div class="field input-field">
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                       
                    </div>
                    <div class="field input-field">
                        <input type="password" id="password" name="password" class="form-control" value="{{ old('email') }}" placeholder="Password">
                       
                        <!-- <i class='bx bx-hide eye-icon'></i> -->
                    </div>
                    <div class="field button-field">
                        <button type="submit">Login</button>
                    </div>
                </form>
                <div class="form-link">
                    <span>Don't have an account? <a href="/signup" class="link signup-link">Sign up!</a></span>
                </div>
            </div>
            
    </div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/homepg_styles.css') }}">

    <link rel="stylesheet" href="{{ asset('css/contact_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login_up_styles.css') }}">

@endpush
@endsection