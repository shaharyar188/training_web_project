@extends('layouts.app-user')
@section('main-content')
    <div class="page-banner-section section">
        <div class="page-banner-wrap row row-0 d-flex align-items-center ">
            <div class="col-lg-4 col-12 order-lg-2 d-flex align-items-center justify-content-center">
                <div class="page-banner">
                    <h1>Faq</h1>
                    <p>similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita</p>
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url("/") }}">HOME</a></li>
                            <li><a href="{{ url("faqs") }}">Faq</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 order-lg-1">
                <div class="banner"><a href="{{ url("/") }}"><img src="{{ asset("/user-assets/images/banner/banner-15.jpg") }}" alt="Banner"></a></div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 order-lg-3">
                <div class="banner"><a href="{{ url("/") }}"><img src="{{ asset("/user-assets/images/banner/banner-14.jpg") }}" alt="Banner"></a></div>
            </div>
        </div>
    </div>
    <div class="faq-section section mt-90 mb-40">
        <div class="container">
            <div class="row row-25">
                <div class="col-lg-12 col-12 mb-50">
                    <div class="faq-wrap">
                        @foreach($allfaqs as $faq)
                            <div class="single-faq">
                                <div class="row">
                                    <div class="col-10">
                                        <h4>{{ucfirst($faq->question)}}</h4>
                                        <p>{{ucfirst($faq->answer)}}</p>
                                    </div>
                                    <div class="col-2">
                                       <img class="img-fluids" style="width: 140px;height: 98px;border: 11px double lightgray;" src="{{asset('./images/'.$faq->faq_image)}}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Faq Section End -->

@endsection
