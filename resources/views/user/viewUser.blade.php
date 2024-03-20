@extends('layouts.app')
@section('main-content')
    <!-- End Page Header -->
    <!-- Row -->
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="modal fade effect-scale show" id="profileModal" style="display: none; padding-left: 0px;"
                aria-modal="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">User Details</h6><button aria-label="Close" class="btn-close"
                                data-bs-dismiss="modal" type="button"
                                style="border: none;background: none;font-size: 23px;font-weight: bold;"
                                id="close_modal"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body p-4">
                            <div class="table-responsive ">
                                <table class="table row table-borderless" style="text-transform: capitalize;display: flex;">
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td id="full_name">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="country">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="city">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" id="address">
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td id="email">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="state">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="zip_code">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card custom-card">
                <div class="card-header">
                    <h2 class="">Manage Users</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabledata" class="table table-hover table-bordered text-center">
                            <thead>
                                <tr>
                                    <td style="font-size: 12px;">Sr No.</td>
                                    <td style="font-size: 12px;">Full Name</td>
                                    <td style="font-size: 12px;">Email</td>
                                    <td style="font-size: 12px;">Contact No</td>
                                    <td style="font-size: 12px;">Date of Birth</td>
                                    <td style="font-size: 12px;">User Type</td>
                                    <td style="font-size: 12px;">Status </td>
                                    <td>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $num = 1;
                                @endphp
                                @foreach ($user_meta as $meta)
                                    <tr>
                                        <td>{{ $num++ }}</td>
                                        <td>{{ ucfirst($meta->user_name) }}</td>
                                        <td>{{ $meta->email }}</td>
                                        <td>{{ $array[$meta['id']]->contact_no ? $array[$meta['id']]->contact_no : '--' }}
                                        </td>
                                        <td>{{ $array[$meta['id']]->dob ? $array[$meta['id']]->dob : '--' }}</td>

                                        <td>
                                            @if ($meta->Is_admin == 0)
                                                <h5><span
                                                        class="badge bg-primary text-white rounded">{{ 'User' }}</span>
                                                </h5>
                                            @else
                                                <h5>
                                                    <span class="badge badge-info">{{ 'Admin' }}</span>
                                                </h5>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($meta->Is_active == 1)
                                                <div class="col-xxl-2"> <label class="custom-switch form-switch mb-0">
                                                        <input type="checkbox" id="SwitchCheck1" value="{{ $meta->id }}"
                                                            checked class="custom-switch-input" style="cursor: pointer">
                                                        <span class="custom-switch-indicator"></span> <span
                                                            class="custom-switch-description"
                                                            id="meta_status_{{ $meta->id }}">Active</span> </label>
                                                </div>
                                            @else
                                                <div class="col-xxl-2"> <label class="custom-switch form-switch mb-0">
                                                        <input type="checkbox" id="SwitchCheck1" value="{{ $meta->id }}"
                                                            class="custom-switch-input" style="cursor: pointer"> <span
                                                            class="custom-switch-indicator"></span> <span
                                                            class="custom-switch-description"
                                                            id="meta_status_{{ $meta->id }}">In-active</span> </label>
                                                </div>
                                            @endif
                                        </td>
                                        <td name="bstable-actions">
                                            <div class="btn-list">
                                                <button title="Details" type="button" data-detail='{{ $meta->id }}'
                                                    class="btn  btn-sm btn-secondary detail">
                                                    <span class="fas  fa-eye"> </span>
                                                </button>
                                                <a href="{{ './user/'. $meta->id . '/edit' }}" type="button"
                                                    class="btn btn-sm btn-primary" title="Edit">
                                                    <span class="fe fe-edit"></span>
                                                </a>
                                                <button title="Remove" type="button" data-delete='{{ $meta->id }}'
                                                    class="btn  btn-sm btn-danger deleteRecord">
                                                    <span class="fe fe-trash-2"> </span>
                                                </button>

                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
            $(document).on("click", ".deleteRecord", function(stop) {
                stop.preventDefault();
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#e12334",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        var deleteId = $(this).data("delete");
                        var element = this;
                        $.ajax({
                            url: `{{ url('/user/${deleteId}') }}`,
                            method: "DELETE",
                            success: function(response) {
                                if (response.status == 200) {
                                    Swal.fire({
                                        toast: true,
                                        icon: "success",
                                        title: "user Deleted Successfully..!",
                                        animation: false,
                                        position: "top-right",
                                        showConfirmButton: false,
                                        timer: 3000,
                                        timerProgressBar: true,
                                    });
                                    $(element).closest("tr").fadeOut();
                                } else {
                                    Swal.fire({
                                        toast: true,
                                        icon: "error",
                                        title: "user Not Deleted ..!",
                                        animation: false,
                                        position: "top-right",
                                        showConfirmButton: false,
                                        timer: 3000,
                                        timerProgressBar: true,
                                    });
                                }
                            },
                        });
                    }
                })
            })
            $(document).on("click", ".detail", function(stop) {
                stop.preventDefault();
                var detailId = $(this).data("detail");
                $.ajax({
                    url: `{{ url('/user/${detailId}') }}`,
                    method: "GET",
                    success: function(response) {
                        $("#profileModal").modal("show");
                        $("#full_name").empty();
                        $("#email").empty();
                        $("#country").empty();
                        $("#state").empty();
                        $("#city").empty();
                        $("#zip_code").empty();
                        $("#address").empty();
                        $("#full_name").append("<strong>Full Name :</strong>" + " " + response
                            .message
                            .user_name);
                        $("#email").append("<strong>Email :</strong>" + " " + response
                            .message
                            .email);
                        $("#country").append("<strong>Country :</strong>" + " " + response
                            .message2
                            .country);
                        $("#state").append("<strong>State :</strong>" + " " + response
                            .message2
                            .state);
                        $("#city").append("<strong>City :</strong>" + " " + response
                            .message2
                            .city);
                        $("#zip_code").append("<strong>Zip Postal/Code :</strong>" + " " +
                            response
                            .message2
                            .zip_code);
                        $("#address").append("<strong>Address :</strong>" + " " + response
                            .message2
                            .street_address);
                    },
                });
            })
            $(document).on("click", "#close_modal", function(stop) {
                stop.preventDefault();
                $("#profileModal").modal('hide');
            })
            $(document).on("change", "#SwitchCheck1", function(stop) {
                stop.preventDefault();
                var value = $(this).val();
                $.ajax({
                    url: `{{ url('/changeStatus/${value}') }}`,
                    method: "GET",
                    success: function(response) {
                        if (response.message.Is_active == 0) {
                            $("#meta_status_" + response.message.id).empty();
                            $("#meta_status_" + response.message.id).append("Active");
                        } else {
                            $("#meta_status_" + response.message.id).empty();
                            $("#meta_status_" + response.message.id).append("In-Active");
                        }
                    }
                })
            })
        })
    </script>
@endsection
