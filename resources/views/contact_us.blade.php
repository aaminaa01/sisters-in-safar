
@extends('templates.layout')
@include('templates.flash-message')
@section('titleContent')
    <H1>sistersInسفر</H1>
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
                        <input type="email" id="email-box" name="sender_email" placeholder="Email">
                    </div>
                    <div class="input-box message-box">
                        <label for="msg-box">Your message:</label>
                        <textarea name="message" style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;" type="textarea" id="msg-box" placeholder="Message"></textarea>
                    </div>
                    <div class="button">
                        <input type="submit" value="Send Now" >
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
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/homepg_styles.css') }}">

    <link rel="stylesheet" href="{{ asset('css/contact_styles.css') }}">
@endpush
@endsection
