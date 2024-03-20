@extends('layouts.app-user')
@section('main-content')
    <div class="page-banner-section section">
        <div class="page-banner-wrap row row-0 d-flex align-items-center ">

            <!-- Page Banner -->
            <div class="col-lg-4 col-12 order-lg-2 d-flex align-items-center justify-content-center">
                <div class="page-banner">
                    <h1>{{ucfirst($video->title)}}</h1>
                    <p>similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita</p>
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url("/") }}">HOME</a></li>
                            <li><a href="{{url("/video_details/".$video->id)}}">Product Details</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Banner -->
            <div class="col-lg-4 col-md-6 col-12 order-lg-1">
                <div class="banner"><a href="{{ url("#") }}"><img src="{{ asset("/user-assets/images/banner/banner-15.jpg") }}" alt="Banner"></a></div>
            </div>

            <!-- Banner -->
            <div class="col-lg-4 col-md-6 col-12 order-lg-3">
                <div class="banner"><a href="{{ url("#") }}"><img src="{{ asset("/user-assets/images/banner/banner-14.jpg") }}" alt="Banner"></a></div>
            </div>

        </div>
    </div><!-- Page Banner Section End -->

    <div class="product-section section mt-90 mb-90">
        <div class="container">

            <div class="row mb-90">

                <div class="col-lg-6 col-12 mb-50">
                    @if($video->video_url!="")
                        @php
                            $videourl=$video->video_url;
                        @endphp
                    @else
                        @php
                            $videourl='./video/'.$video->video;
                        @endphp
                    @endif
                    <iframe width="100%" height="100%"
                            src="{{$videourl}}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>

                </div>

                <div class="col-lg-6 col-12 mb-50">

                    <!-- Content -->
                    <div class="single-product-content">

                        <!-- Category & Title -->
                        <div class="head-content">

                            <div class="category-title">
                                <span><b>Category :</b> {{ucfirst($video->category_name)}}</span>
                                <br>
                                <span><b>Subcategory :</b> {{ucfirst($video->subcat_name)}}</span>
                                <h5 class="title">{{ucfirst($video->title)}}</h5>
                            </div>
                        </div>
                        <div class="single-product-description mt-4">
                            @php
                                $unserializeheading=unserialize($video->video_detail_heading);
                                 $unserializedescription=unserialize($video->video_detail_description);
                            @endphp
                            @foreach($unserializeheading as $key=>$value)
                                <h4 class="fw-bold">{{ucfirst($value)}}</h4>
                                <ul class="footer-widgets" style="list-style: disc;margin-left: 20px">
                                @foreach($unserializedescription[$key] as $key2=>$value2)
                                        <li>{{ucfirst($value2)}}</li>
                                @endforeach
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>\
            </div>
        </div>
    </div><!-- Single Product Section End -->
@endsection
