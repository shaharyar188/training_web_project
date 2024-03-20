@extends('layouts.app-user')
@section('main-content')
    <div class="page-banner-section section">
        <div class="page-banner-wrap row row-0 d-flex align-items-center ">
            <div class="col-lg-4 col-12 order-lg-2 d-flex align-items-center justify-content-center">
                <div class="page-banner">
                    <h1>{{ucfirst($category->category_name)}}</h1>
                    <p>similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita</p>
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url("/") }}">HOME</a></li>
                            <li><a href="{{ url("/category/".$category->id)}}">{{ucfirst($category->category_name)}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 order-lg-1">
                <div class="banner"><a href="{{ url("#") }}"><img src="{{ asset("/user-assets/images/banner/banner-15.jpg") }}" alt="Banner"></a></div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 order-lg-3">
                <div class="banner"><a href="{{ url("#") }}"><img src="{{ asset("/user-assets/images/banner/banner-14.jpg") }}" alt="Banner"></a></div>
            </div>

        </div>
    </div><!-- Page Banner Section End -->

    <!-- Feature Product Section Start -->
    <div class="product-section section mt-90 mb-40">
        <div class="container">
            <div class="row">

                <div class="col-xl-9 col-lg-8 col-12 order-lg-2 mb-50">

                    <div class="row mb-50">
                        <div class="col">

                            <!-- Shop Top Bar Start -->
                            <div class="shop-top-bar with-sidebar">

                                <!-- Product View Mode -->
                                <div class="product-view-mode">
                                    <a class="active" href="{{ url("#") }}" data-target="grid"><i class="fa fa-th"></i></a>
                                    <a href="{{ url("#") }}" data-target="list"><i class="fa fa-list"></i></a>
                                </div>

                                <!-- Product Showing -->
                                <div class="product-showing">
                                    <p>Showing</p>
                                    <select name="showing" class="nice-select">
                                        <option value="1">8</option>
                                        <option value="2">12</option>
                                        <option value="3">16</option>
                                        <option value="4">20</option>
                                        <option value="5">24</option>
                                    </select>
                                </div>

                                <!-- Product Short -->
                                <div class="product-short">
                                    <p>Short by</p>
                                    <select name="sortby" class="nice-select">
                                        <option value="trending">Trending items</option>
                                        <option value="sales">Best sellers</option>
                                        <option value="rating">Best rated</option>
                                        <option value="date">Newest items</option>
                                        <option value="price-asc">Price: low to high</option>
                                        <option value="price-desc">Price: high to low</option>
                                    </select>
                                </div>

                                <!-- Product Pages -->
                                <div class="product-pages">
                                    <p>Pages 1 of 25</p>
                                </div>

                            </div><!-- Shop Top Bar End -->

                        </div>
                    </div>

                    <!-- Shop Product Wrap Start -->
                    <!-- Shop Product Wrap Start -->
                    <div class="shop-product-wrap grid with-sidebar row">
                        @foreach($alvideos as $video)
                            @if($video->video_url!="")
                                @php
                                    $videourl=$video->video_url;
                                @endphp
                            @else
                                @php
                                    $videourl='./video/'.$video->video;
                                @endphp
                            @endif
                            <div class="col-xl-4 col-md-6 col-12 pb-30 pt-10">
                                <div class="ee-product">
                                    <div class="image">
                                        <a href="{{ url("video_details/") }}" class="img">
                                            <iframe width="100%" height="315"
                                                    src="{{$videourl}}"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    allowfullscreen></iframe>
                                        </a>
                                    </div>
                                    <div class="content">
                                        <div class="category-title">
                                            <h5 class="title"><a href="{{url("/video_details/".$video->id)}}" tabindex="0">{{ucfirst($video->title)}}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row mt-30">
                        <div class="col">

                            <ul class="pagination">
                                <li><a href="{{ url("#") }}"><i class="fa fa-angle-left"></i>Back</a></li>
                                <li><a href="{{ url("#") }}">1</a></li>
                                <li class="active"><a href="{{ url("#") }}">2</a></li>
                                <li><a href="{{ url("#") }}">3</a></li>
                                <li> - - - - - </li>
                                <li><a href="{{ url("#") }}">18</a></li>
                                <li><a href="{{ url("#") }}">18</a></li>
                                <li><a href="{{ url("#") }}">20</a></li>
                                <li><a href="{{ url("#") }}">Next<i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="shop-sidebar-wrap col-xl-3 col-lg-4 col-12 order-lg-1 mb-15">
                    <div class="shop-sidebar mb-35">
                        <h4 class="title">CATEGORIES</h4>
                        <ul class="sidebar-category">
                            <li><a href="{{ url("/category/".$category->id) }}">{{ucfirst($category->category_name)}}</a></li>
                        </ul>
                    </div>
                    <div class="shop-sidebar mb-35">
                        <h4 class="title">SUBCATEGORIES</h4>
                        <ul class="sidebar-category">
                            @foreach($allsubcategory as $subcategory)
                                <li><a href="{{ url("/subcategory/".$subcategory->id) }}">{{ucfirst($subcategory->subcat_name)}}</a></li>
                            @endforeach

                        </ul>

                    </div>


                </div>

            </div>
        </div>
    </div>
@endsection
