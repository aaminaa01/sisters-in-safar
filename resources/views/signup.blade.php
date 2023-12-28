<!-- resources/views/signup.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="pg-content">
        <div class="form-content">
            <div class="header">
                <p style="text-align: center;"><h2>Sign up</h2></p>
            </div>
            <form action="#">
                <div class="field input-field">
                    <input type="text" placeholder="Name" class="input">
                </div>
                <div class="field input-field">
                    <input type="email" placeholder="Email" class="input">
                </div>
                <div class="field input-field">
                    <input type="password" placeholder="Password" class="password">
                    <!-- <i class='bx bx-hide eye-icon'></i> -->
                </div>
                <div class="field button-field">
                    <button>Register</button>
                </div>
            </form>
            <div class="form-link">
                <span>Already have an account? <a href="{{ route('login') }}" class="link signup-link">Sign in!</a></span>
            </div>
        </div>
    </div>
@endsection
