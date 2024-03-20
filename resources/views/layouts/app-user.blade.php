<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ env('APP_NAME', 'Fulfillment Team') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset("/user-assets/images/favicon.ico") }}">
    <link rel="stylesheet" href="{{ asset("/user-assets/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("/user-assets/css/icon-font.min.css") }}">
    <link rel="stylesheet" href="{{ asset("/user-assets/css/plugins.css") }}">
    <link rel="stylesheet" href="{{ asset("/user-assets/css/style.css") }}">
    <script src="{{ asset("/user-assets/js/vendor/modernizr-2.8.3.min.js") }}"></script>
</head>
<body>
<div class="header-section section">
    <div class="header-top header-top-two header-top-border pt-10 pb-10">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col order-2  order-md-1 mt-10 mb-10 ms-auto">
                    <div class="header-account-links">
                        <a href="{{ url("/login") }}"><i class="icofont icofont-user-alt-7"></i> <span class="d-block">Login</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-two header-sticky">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col mt-15 mb-15">
                    <div class="header-logo">
                        <a href="{{ url("/") }}">
                            <img src="{{ asset("/user-assets/images/logo.png") }}" alt="E&E - Electronics eCommerce Bootstrap4 HTML Template">
                            <img class="theme-dark" src="{{ asset("/user-assets/images/logo-light.png") }}" alt="E&E - Electronics eCommerce Bootstrap4 HTML Template">
                        </a>
                    </div>
                </div>
                <div class="col order-2 order-lg-1 d-none d-lg-block">
                    <div class="main-menu">
                        <nav>
                            <ul>
                                <li><a href="{{ url("/") }}">Home</a></li>
                                <li><a href="{{ url("about_us") }}">About Us</a></li>
                                <li class="menu-item-has-children"><a href="javascript:void(0);">Category</a>
                                    <ul class="sub-menu">
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
                                            <li class="menu-item{{isset($allsubcategory[$category->id])? '-has-children':''}}"><a href="{{url('/category/'.$category->id)}}">{{ucfirst($category->category_name)}}</a>
                                                @if(isset($allsubcategory[$category->id]))
                                                    <ul class="sub-menu">
                                                        @foreach($allsubcategory[$category->id] as $subcategory)
                                                            <li><a href="{{url('/subcategory/'.$subcategory->id)}}">{{ucfirst($subcategory->subcat_name)}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{ url("faqs") }}">FaQs</a></li>
                                <li><a href="{{ url("tutorial") }}">Instruction & Tutorial</a></li>
                                <li><a href="{{ url("contact_us") }}">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col order-lg-2">
                    <div class="row justify-content-between align-items-center">

                        <div class="col">
                            <!-- Header Call Us Start -->
                            <div class="header-call-us">

                                <h4>call us <br> <span><a href="{{ url("tel:01254568987") }}">01254  568  987</a></span></h4>

                            </div><!-- Header Call Us End -->
                        </div>

                    </div>
                </div>

                <!-- Mobile Menu -->
                <div class="mobile-menu order-12 d-block d-lg-none col"></div>

            </div>

        </div>
    </div><!-- Header Top End -->

</div>
@yield('main-content')
<div class="subscribe-section section bg-gray pt-55 pb-55">
    <div class="container">
        <div class="row align-items-center">

            <!-- Mailchimp Subscribe Content Start -->
            <div class="col-lg-6 col-12 mb-15 mt-15">
                <div class="subscribe-content">
                    <h2>SUBSCRIBE <span>OUR NEWSLETTER</span></h2>
                    <h2><span>TO GET LATEST</span> PRODUCT UPDATE</h2>
                </div>
            </div><!-- Mailchimp Subscribe Content End -->


            <!-- Mailchimp Subscribe Form Start -->
            <div class="col-lg-6 col-12 mb-15 mt-15">

                <form id="mc-form" class="mc-form subscribe-form" >
                    <input id="mc-email" type="email" autocomplete="off" placeholder="Enter your email here" />
                    <button id="mc-submit">subscribe</button>
                </form>
                <!-- mailchimp-alerts Start -->
                <div class="mailchimp-alerts text-centre">
                    <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                    <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                    <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer-section section bg-ivory">
    <div class="footer-top-section section pt-90 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12 mb-40">
                    <div class="footer-widget">

                        <h4 class="widget-title">CONTACT INFO</h4>

                        <p class="contact-info">
                            <span>Address</span>
                            19009 33rd ave w suite 203, <br> Lynnwood, WA 98036, USA
                        </p>
                        <p class="contact-info">
                        <p>
                            FulfillmentTeam is a worldwide sales consulting firm specializing in coaching, training, and fulfillment. We assist clients in implementing processes and disciplines to achieve sustained revenue acceleration.
                        </p>
                        </p>
                        <p class="contact-info">
                            <span>Contact Us</span>
                            <a href="{{ url("mailto:customersupport@fulfillmentteam.net") }}">customersupport@fulfillmentteam.net</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12 mb-40">
                    <div class="footer-widget">
                        <h4 class="widget-title">INFORMATION</h4>
                        <ul class="link-widget" style="list-style: disc">
                            <li><a href="{{ url("/") }}">Home</a></li>
                            <li><a href="{{ url("faqs") }}">FAQs</a></li>
                            <li><a href="{{ url("about_us") }}">About Us</a></li>
                            <li><a href="{{ url("contact_us") }}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12 mb-40">
                    <div class="footer-widget">
                        <h4 class="widget-title">INFORMATION</h4>
                        <ul class="link-widget" style="list-style: disc">
                            <li><a href="{{ url("login") }}">Login</a></li>
                            <li><a href="{{ url("tutorial") }}">Instruction & Tutorial</a></li>
                            <li><a href="{{ url("#") }}">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-section section">
        <div class="container">
            <div class="row">
                <div class="col-lg- col-12 d-flex justify-content-center">
                    <div class="footer-copyright"><p>&copy; Copyright © {{date('Y')}} FulfillmentTeam.net. Developed by <a href="http://ibexstack.com/live">ibexstack</a></p></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset("/user-assets/js/vendor/jquery-1.12.4.min.js") }}"></script>
<script src="{{ asset("/user-assets/js/popper.min.js") }}"></script>
<script src="{{ asset("/user-assets/js/bootstrap.min.js") }}"></script>
<script src="{{ asset('/assets/js/sweat@alert.js') }}"></script>
<script src="{{ asset("/user-assets/js/plugins.js") }}"></script>
<script src="{{ asset("/user-assets/js/ajax-mail.js") }}"></script>
<script src="{{ asset("/user-assets/js/main.js") }}"></script>
@yield('script')
</body>
</html>
