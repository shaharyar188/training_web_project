@extends('layouts.app')
@section('main-content')
    <!-- End Page Header -->
    <!-- Row -->
    <div class="row mt-5">
        <div class="col-lg-4 col-md-12">
            <div class="card custom-card">
                <div class="card-body text-center">
                    <div class="main-profile-overview widget-user-image text-center">
                        <div class="main-img-user">
                            <img alt="avatar" src="/assets/img/brand/676-6764065_default-profile-pict.png"
                                style="    border: 2px solid #8760fb;
                                padding: 17px;
">
                        </div>
                    </div>
                    <div class="item-user pro-user">
                        <h4 class="pro-user-username text-dark mt-2 mb-0">{{ Auth::user()->user_name }}</h4>
                        <p class="pro-user-desc text-muted mb-1">Web Developer</p>
                        <p class=" fs-16"> <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a> <a
                                href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a> <a
                                href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a> <a
                                href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a> <a
                                href="javascript:void(0);"><i class="fa fa-star-o text-warning"> </i></a> </p>
                        <div class="contact-info mb-3 fs-16"> <a href="javascript:void(0);"
                                class="contact-icon border text-primary"><i class="fa fa-facebook"></i></a> <a
                                href="javascript:void(0);" class="contact-icon border text-primary"><i
                                    class="fa fa-twitter"></i></a> <a href="javascript:void(0);"
                                class="contact-icon border text-primary"><i class="fa fa-google"></i></a> <a
                                href="javascript:void(0);" class="contact-icon border text-primary"><i
                                    class="fa fa-dribbble"></i></a> </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-lg-8 col-md-12">
            <div class="card custom-card main-content-body-profile">
                <nav class="nav main-nav-line">
                    <a class="nav-link active" data-toggle="tab" href="#tab1over">Profile</a>
                    <a class="nav-link" data-toggle="tab" href="#tab2rev">Edit Profile</a>
                </nav>

                <div class="card-body tab-content h-100">
                    <div class="tab-pane active" id="tab1over">
                        <div class="main-content-label tx-13 mg-b-20">
                            Basic Information
                        </div>
                        <div class="table-responsive ">
                            <table class="table row table-borderless">
                                <tbody class="col-lg-12 col-xl-6 p-0">
                                    <tr>
                                        <td><strong>Full Name :</strong>{{ Auth::user()->user_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email :</strong> {{ Auth::user()->email }}</td>
                                    </tr>

                                </tbody>
                                <tbody class="col-lg-12 col-xl-6 p-0">

                                </tbody>
                            </table>
                        </div>
                        <div class="main-content-label tx-13 mg-b-20"> About </div>
                        <p>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy when an unknown printer took a galley of type and scrambled Lorem Ipsum has been
                            the industry's standard dummy when an unknown printer took a galley of type and scrambled it to
                            make a type specimen book. It has survived .</p>
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit Lorem Ipsum has been the industry's standard
                            dummy when an unknown printer took a galley of type and scrambled in voluptate velit esse cillum
                            dolore eu fugiat nulla pariatur. </p>

                    </div>
                    <div class="tab-pane" id="tab2rev">
                        <div class="card-body">
                            <div class="mb-4 main-content-label">Edit informatiom</div>
                            <form class="form-horizontal" id="profile_update">
                                @method('PUT')
                                <input type="hidden" name="hidden" id="hidden_id" value="{{ Auth::user()->id }}">
                                <div class="row">
                                    <div class="col-md-6"> <label class="form-label">User Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="User Name"
                                            value="{{ Auth::user()->user_name }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="User Email"
                                            value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                                <div class="row mt-2">

                                    <div class="col-md-12">
                                        <label for="">Dob</label>
                                        <input type="date" name="dob" class="form-control" placeholder="Enter DOB"
                                            value="{{ $user_meta->dob }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"> <label class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control"
                                            placeholder="Enter your address" value="{{ $user_meta->street_address }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">City</label>
                                        <input type="text" name="city" class="form-control" placeholder="Enter City"
                                            value="{{ $user_meta->city }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"> <label class="form-label">State</label>
                                        <input type="text" name="state" class="form-control"
                                            placeholder="Enter your State" value="{{ $user_meta->state }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Country</label>
                                        <input type="text" name="country" class="form-control"
                                            placeholder="Enter Your Country" value="{{ $user_meta->country }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"> <label class="form-label">Zip Code</label>
                                        <input type="text" name="zip_code" class="form-control"
                                            placeholder="Enter Your Zip_Code" value="{{ $user_meta->zip_code }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Contact No</label>
                                        <input type="text" name="contact_no" class="form-control"
                                            placeholder="Enter Your Contact" value="{{ $user_meta->contact_no }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12  d-flex justify-content-end">
                                        <button class="btn btn-primary" id="update_id"
                                            style="background-color:#11235A;">Edit Profile</button>
                                    </div>
                                </div>
                            </form>
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
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on("click", "#update_id", function(e) {

                e.preventDefault();

                var formData = new FormData(profile_update);
                var id = $("#hidden_id").val();
                $.ajax({
                    url: `{{ url('/profile/${id}') }}`,
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,

                    success: function(res) {
                        if (res.message == 200) {
                            Swal.fire({
                                toast: true,
                                icon: "success",
                                title: "Profile  Updated Successfully..!",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        } else {
                            Swal.fire({
                                toast: true,
                                icon: "success",
                                title: "Incorrect password. Please try again.",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        }
                    }
                })

            });
        });
    </script>
@endsection
