
@extends('templates.layout')

@section('titleContent')
    <H1>sistersInسفر</H1>
    <H4 id="tagline">Empowering Pakistani women to travel and explore safely.</H4>
@endsection

@section('content')

    <div class="pg-content row">
        <div class="about-section col-8">
            <div class="overview">
                <p>Culture, nature, traditions, and food - Pakistan is a country that holds immense potential for exploration...</p>
                <p>At sistersInسفر, we believe that every woman should have the opportunity to explore the world fearlessly...</p>
            </div>
            <div class="what-we-do">
                <p>
                    <h2>What do we do?</h2>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry...
                    <ul>
                        <li>what we do point one</li>
                        <li>what we do point two</li>
                        <li>what we do point three</li>
                        <li>what we do point four</li>
                    </ul>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry...
                </p>
            </div>
        </div>
        <div class="mission col-4">
            <h3 style="text-shadow: 2px 2px 6px #6e585e;">Our Story</h3>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout...</p>
            <h3 style="text-shadow: 2px 2px 6px #6e585e;">Our Mission</h3>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout...</p>
        </div>
    </div>
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/homepg_styles.css') }}">
@endpush

@endsection
