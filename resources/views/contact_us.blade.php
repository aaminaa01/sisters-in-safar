
@extends('templates.layout')
@include('templates.flash-message')
@section('scriptsAndLinks')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

@endsection
@section('titleContent')
    <H1 class="font-weight-bold display-3">sistersInسفر</H1>
    <H4 id="tagline">Empowering Pakistani women to travel and explore safely.</H4>
@endsection
@section('content')
    
    <div class="pg-content row">
        <div class="col-5 send-a-msg">
            <h2>Get in touch!</h2>
            <p style="font-weight: lighter;">Have questions or concerns? Want to learn how you can become a part of sistersInSafar? Send us a message:</p>
            <div class="form">
                <form action="/contact_us" method="post">
                    @csrf
                    <div class="input-box">
                        <label for="email-box">Email:</label>
                        <input type="text"id="email-box" placeholder="Email">
                    </div>
                    <div class="input-box message-box">
                        <label for="msg-box">Your message:</label>
                        <textarea type="text" style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;" type="textarea" id="msg-box" placeholder="Message"></textarea>
                    </div>
                    <div class="button">
                        <button class="btn d-flex justify-content-center" type="submit" value="submit" >Send</button>
                    </div>
                </form>

            </div>
        </div>   
        <div class="col-5 socials">
            <h2>Join the community!</h2>
            <p style="color: #151015;">Keep up with all the latest news by following our socials:</p>
            <p>Instagram&nbsp;&nbsp;<a href="">@sistersInSafar</a></p>
            <p>Facebook&nbsp;&nbsp;<a href="">Sisters In Safar</a></p>
            <p>YouTube&nbsp;&nbsp;<a href="">sistersInSafar</a></p>
        </div>
    </div>

    <style>
        .btn {
            background-color: #151015;
            color: #fff;
        }
    </style>
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/homepg_styles.css') }}">

    <link rel="stylesheet" href="{{ asset('css/contact_styles.css') }}">
@endpush
@endsection
