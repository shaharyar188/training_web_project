@extends('layouts.app-user')
@section('main-content')
    <div class="page-banner-section section">
        <div class="page-banner-wrap row row-0 d-flex align-items-center ">
            <div class="col-lg-4 col-12 order-lg-2 d-flex align-items-center justify-content-center">
                <div class="page-banner">
                    <h1>Contact</h1>
                    <p>similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita</p>
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url("/") }}">HOME</a></li>
                            <li><a href="{{ url("contact_us") }}">Contact</a></li>
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
    <div class="contact-section section mt-90 mb-40">
        <div class="container">
            <div class="row">
                <div class="contact-page-title col mb-40">
                    <h1>Hi, Howdy <br>Let’s Connect us</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-12 mb-50">
                    <ul class="contact-tab-list nav">
                        <li><a class="active" data-bs-toggle="tab" href="{{ url("#contact-address") }}">Contact us</a></li>
                        <li><a data-bs-toggle="tab" href="{{ url("#contact-form-tab") }}">Leave us a message</a></li>
                    </ul>
                </div>
                <div class="col-lg-8 col-12">
                    <div class="tab-content">
                        <div class="tab-pane fade show active row d-flex" id="contact-address">
                            <div class="col-lg-4 col-md-6 col-12 mb-50">
                                <div class="contact-information">
                                    <h4>Address</h4>
                                    <p>19009 33rd ave w suite 203,
                                        Lynnwood, WA 98036, USA</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 mb-50">
                                <div class="contact-information">
                                    <h4>Phone</h4>
                                    <p><a href="{{ url("tel:01234567890") }}">01234 567 890</a><a href="{{ url("tel:01234567891") }}">01234 567 891</a></p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 mb-50">
                                <div class="contact-information">
                                    <h4>Web</h4>
                                    <p><a href="{{ url("mailto:customersupport@fulfillmentteam.net") }}">customersupport@fulfillmentteam.net</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade row d-flex" id="contact-form-tab">
                            <div class="col">
                                <form id="contact_form" class="contact-form mb-50">
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb-25">
                                            <label for="last_name">Name*</label>
                                            <input id="last_name" type="text" name="name" placeholder="Full Name">
                                        </div>
                                        <div class="col-md-6 col-12 mb-25">
                                            <label for="email_address">Email*</label>
                                            <input id="email_address" type="email" name="email" placeholder="Email Address">
                                        </div>
                                        <div class="col-md-6 col-12 mb-25">
                                            <label for="phone_number">Phone</label>
                                            <input id="phone_number" type="text" name="mobile" placeholder="Contact No">
                                        </div>
                                        <div class="col-12 mb-25">
                                            <label for="message">Message*</label>
                                            <textarea id="message" name="message" placeholder="Leave Message"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <input type="submit" class="submit" value="SEND NOW">
                                        </div>
                                    </div>
                                </form>
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
            $(document).on("click", ".submit", function(stop) {
                stop.preventDefault();
                $(this).empty("");
                $(this).append(
                    "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing..."
                );
                var formData = new FormData(contact_form);
                $.ajax({
                    url: "{{ url('/send-mail') }}",
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(response) {
                        $(".submit").empty("");
                        $(".submit").append(
                            "Submit Now"
                        );
                        if (response.message == 200) {
                            $(".text-danger").text("");
                            Swal.fire({
                                toast: true,
                                icon: "success",
                                title: "Thanks for asking. We'll be in touch with you soon.",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                            $("form").trigger("reset");;
                        }
                    },
                    error: function(error) {
                        $(".submit").empty("");
                        $(".submit").append(
                            "Submit Now"
                        );
                        var error = error.responseJSON;
                        $.each(error.errors, function(index, value) {
                            $('#' + index).html(value);
                        });
                    }
                })
            })
        })
    </script>
@endsection
