@extends('layouts.app-user')
@section('main-content')
    <div class="page-banner-section section">
        <div class="page-banner-wrap row row-0 d-flex align-items-center ">

            <!-- Page Banner -->
            <div class="col-lg-4 col-12 order-lg-2 d-flex align-items-center justify-content-center">
                <div class="page-banner">
                    <h1>About us</h1>
                    <p>similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita</p>
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url("/") }}">HOME</a></li>
                            <li><a href="{{ url("/about_us") }}">about</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Banner -->
            <div class="col-lg-4 col-md-6 col-12 order-lg-1">
                <div class="banner"><a href="{{ url("/") }}"><img src="{{ asset("/user-assets/images/banner/banner-15.jpg") }}" alt="Banner"></a></div>
            </div>

            <!-- Banner -->
            <div class="col-lg-4 col-md-6 col-12 order-lg-3">
                <div class="banner"><a href="{{ url("/") }}"><img src="{{ asset("/user-assets/images/banner/banner-14.jpg") }}" alt="Banner"></a></div>
            </div>

        </div>
    </div><!-- Page Banner Section End -->

    <!-- About Section Start -->
    <div class="about-section section mt-90 mb-30">
        <div class="container">

            <div class="row row-30 mb-40">

                <!-- About Image -->
                <div class="about-image col-lg-6 mb-50">
                    <img src="{{ asset("/user-assets/images/about/about-1.png") }}" alt="">
                </div>

                <!-- About Content -->
                <div class="about-content col-lg-6">
                    <div class="row">
                        <div class="col-12 mb-50">
                            <h1>COMPANY <span>OVERVIEW</span></h1>
                            <p>
                                Our Fulfillment Team and experience personalized one-on-one coaching that will elevate your professional journey to new heights. Our dedicated team of experts is committed to guiding and supporting you through tailored coaching sessions designed to enhance your skills, optimize productivity, and foster personal growth. Our seasoned coaches provide invaluable insights and strategies customized to your specific needs. Embrace this opportunity to unlock your full potential and achieve unparalleled success with our Fulfillment Team's exceptional one-on-one coaching.
                                Our seasoned trainers provide invaluable insights and strategies customized to your specific needs. Embrace this opportunity to unlock your full potential and achieve unparalleled success with our Fulfillment Team's exceptional one-on-one training.
                            </p>
                        </div>
                        <div class="col-12 mb-50">
                            <h4>WHY US</h4>
                            <p>Our training sessions combine knowledge with hands-on practical exercises, we build stunning websites and robust web applications. Engage in interactive discussions, receive personalized guidance, and access a wealth of resources to enhance your learning. Our online training sessions provide the stepping stones toward realizing your ambitions in the ever-evolving field of web development. Elevate your skills, expand your opportunities, and embrace the limitless possibilities of the digital realm with our specialized training program.</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="about-mission-vission-goal row row-20 mb-40">
                <div class="col-lg-3 col-md-6 col-12 mb-40">
                    <h3>65%</h3>
                    <p>TrainingFulfillment has worked with 65% of the Fortune 500</p>
                </div>
                <div class="col-lg-3 col-md-6 col-12 mb-40">
                    <h3>1000 +</h3>
                    <p>Trained over 1,000 sales professionals worldwide
                    </p>
                </div>  <div class="col-lg-3 col-md-6 col-12 mb-40">
                    <h3>50 countries</h3>
                    <p>Delivered programs in over 50 countries</p>
                </div>  <div class="col-lg-3 col-md-6 col-12 mb-40">
                    <h3>8 years</h3>
                    <p>8 straight years as a top sales training company</p>
                </div>
            </div>

            <div class="row mb-30">
                <div class="about-section-title col-12 mb-50">
                    <h3>WE ARE DIFFERENT</h3>
                    <p>
                        Our clients tell us we are unique for a variety of important reasons including:
                    </p>
                </div>
                <div class="about-feature col-lg-7 col-12">
                    <div class="row">
                        <div class="col-md-6 col-12 mb-30">
                            <ul class="footer-widgets" style="list-style: disc;margin-left: 20px;font-weight: bold;font-size: larger">
                                <li>Holistic Approach</li>
                                <li>Proven Expertise</li>
                                <li>Client-Centric Focus</li>
                                <li>Global Reach</li>
                                <li>Innovative Training</li>
                                <li>Results-Driven</li>
                                <li>Commitment to Lasting Change</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
