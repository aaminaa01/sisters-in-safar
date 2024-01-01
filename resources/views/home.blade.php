@extends('templates.layout')

@section('titleContent')
    <h1>sistersInسفر</h1>
    <h4 id="tagline">Empowering Pakistani women to choose safe and exciting destinations for outings.</h4>
@endsection

@section('content')
    <div class="pg-content row">
        <div class="about-section col-8">
            <div class="overview">
                <p>Discovering safe and exciting destinations for your outings is a key aspect of memorable travel experiences.</p>
                <p>At sistersInسفر, we are dedicated to assisting Pakistani women in making informed decisions about where to go, ensuring every outing is a delightful and secure experience.</p>
            </div>
            <div class="what-we-do">
                <h2>What do we do?</h2>
                <p>
                    Our platform is a trusted resource for women seeking safe and enjoyable outing destinations:
                    <ul>
                        <li>Curate a list of verified and women-recommended places for outings.</li>
                        <li>Share real-life experiences and tips from fellow female travelers.</li>
                        <li>Provide safety guidelines and travel insights for different locations.</li>
                        <li>Offer a supportive community for exchanging ideas and recommendations.</li>
                    </ul>
                    Join us as we empower Pakistani women to make confident choices for their outings.
                </p>
            </div>

            <div class="anonymous-reviews">
                <h2>Leave Anonymous Reviews</h2>
                <p>
                    Share your experiences with parks and restaurants across Pakistan! Our platform allows users to leave anonymous reviews, contributing valuable insights to the community. Reviews undergo a screening process to ensure authenticity and usefulness. Once approved, they become available for everyone to see and benefit from.
                </p>

                <p>
                    Help us build a comprehensive guide for safe and enjoyable outings. <a href="{{ route('contact_us') }}">Get in touch</a> if you have any questions or suggestions!
                </p>

                <!-- Invitation to Sign In or Sign Up -->
                <p>
                    Ready to start sharing your experiences? <a href="{{ route('login') }}">Sign in</a> or <a href="{{ route('register') }}">sign up</a> now!
                </p>
            </div>
        </div>


        <div class="mission-box col-4">
            <div class="story">
                <h3 style="text-shadow: 2px 2px 6px #6e585e;">Our Story</h3>
                <p>Our journey started with the realization that women deserve a reliable platform to discover safe and enjoyable places for outings. We aim to create a community-driven space that fosters trust and shared knowledge.</p>
            
            </div>
            <div class="mission">
                <h3 style="text-shadow: 2px 2px 6px #6e585e;">Our Mission</h3>
                <p>We are on a mission to empower Pakistani women to confidently decide on outing destinations. By curating valuable insights, fostering community support, and sharing firsthand experiences, we strive to ensure that every outing is a secure and joyful adventure.</p>
            </div>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/homepg_styles.css') }}">
    @endpush
@endsection
