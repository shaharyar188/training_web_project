@extends('layouts.app-user')
@section('main-content')
    <div class="hero-section section mb-30">
        <div class="container">
            <div class="row">
                <div class="col position-relative">
                    <div class="hero-side-category">
                        <div class="category-toggle-wrap">
                            <button class="category-toggle">Categories <i class="ti-menu"></i></button>
                        </div>
                        <nav class="category-menu">
                            <ul>
                                @php
                                    $allcategory=\Illuminate\Support\Facades\DB::table('categories')->latest()->get();
                                    $allsubcategory=[];
                                    foreach ($allcategory as $category) {
                                        if(\Illuminate\Support\Facades\DB::table('subcategories')->where('main_category',$category->id)->get()->count()>0){
                                             $allsubcategory[$category->id]=\Illuminate\Support\Facades\DB::table('subcategories')->where('main_category',$category->id)->get();
                                        }
                                    }
                                @endphp
                                @foreach($allcategory as $category)
                                    <li class="menu-item{{isset($allsubcategory[$category->id])? '-has-children':''}}"><a href="{{ url("/category/".$category->id) }}">{{ucfirst($category->category_name)}}</a>
                                        @if(isset($allsubcategory[$category->id]))
                                            <ul class="category-mega-menu">
                                                @foreach($allsubcategory[$category->id] as $subcategory)
                                                    <li class="menu-item-has-children">
                                                        <a href="{{url('/subcategory/'.$subcategory->id)}}">{{ucfirst($subcategory->subcat_name)}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </nav>

                    </div><!-- Header Bottom End -->

                    <!-- Hero Slider Start -->
                    <div class="hero-slider hero-slider-two fix">

                        <!-- Hero Item Start -->
                        <div class="hero-item-two">
                            <div class="row align-items-center justify-content-between">

                                <!-- Hero Content -->
                                <div class="hero-content-two col">
                                    <h1>IT’S <br> TRAINING <br> WEB</h1>
                                    <a href="{{ url("/about_us") }}">get it now</a>

                                </div>

                                <!-- Hero Image -->
                                <div class="hero-image-two col">
                                    <img src="{{ asset("/user-assets/images/hero/hero-4.jpg") }}" alt="Hero Image" style="width: 362px;border-radius: 10px">
                                </div>

                            </div>
                        </div><!-- Hero Item End -->

                        <!-- Hero Item Start -->
                        <div class="hero-item-two">
                            <div class="row align-items-center justify-content-between">

                                <!-- Hero Content -->
                                <div class="hero-content-two col">
                                    <h1>IT’S <br> TRAINING <br> WEB</h1>
                                    <a href="{{ url("/about_us") }}">get it now</a>

                                </div>

                                <!-- Hero Image -->
                                <div class="hero-image-two col">
                                    <img src="{{ asset("/user-assets/images/hero/hero-5.jpg") }}" alt="Hero Image" style="width: 362px;border-radius: 10px">
                                </div>

                            </div>
                        </div><!-- Hero Item End -->

                    </div><!-- Hero Slider End -->

                </div>
            </div>
        </div>
    </div>
    <div class="product-section section mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-40">
                    <div class="section-title-one" data-title="FEATURED TRAINING VIDEOS"><h1>FEATURED TRAINING VIDEOS</h1></div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-12 order-lg-2 order-1">
                            <div class="row">
                                @php
                                    $alvideos=\App\Models\upload_vedio::latest()->get();
                                @endphp
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
                                    <div class="col-xl-3 col-md-6 col-12 pb-30 pt-10">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
