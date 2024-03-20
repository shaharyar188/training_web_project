@extends('layouts.app')
@section('main-content')
    <div class="row mt-3">

        <div class="col-lg-12">
            {{--
            <div class="modal fade effect-scale show" id="exampleModalLong" style="display: none; padding-left: 0px;"
                aria-modal="true" role="dialog">

                <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content modal-content-demo">

                        <div class="modal-header">

                            <h6 class="modal-title">FAQs Details</h6>

                            <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"
                                style="border: none;background: none;font-size: 23px;font-weight: bold;" id="close_modal">

                                <span aria-hidden="true">×</span>

                            </button>

                        </div>

                        <div class="modal-body p-4">

                            <div class="row">

                                <div class="col-sm-12 col-md-12">

                                    <div class="card custom-card">

                                        <div class="card-body">

                                            <div aria-multiselectable="true" class="collapse show" id="accordion"
                                                role="tablist">

                                                <div class="card show mb-3">

                                                    <div class="card-header" id="headingOne" role="tab">

                                                        <a aria-controls="collapseOne" aria-expanded="true"
                                                            data-bs-toggle="collapse" href="#collapseOne"
                                                            id="Detail_question">

                                                            Question Detail

                                                        </a>

                                                    </div>

                                                    <div aria-labelledby="headingOne" class="collapse show"
                                                        data-bs-parent="#accordion" id="collapseOne" role="tabpanel">

                                                        <div class="card-body" id="detail_answer"></div>

                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                        <div class="imgAppend"></div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div> --}}

            <!-- Ensure proper closure of the previous div -->

            <div class="card custom-card">

                <div class="card-header">

                    <h2 class="main-content-title tx-24 mg-b-5">Manage Category</h2>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table id="tabledata" class="table table-hover table-bordered">

                            <thead>

                                <tr>

                                    <td style="font-size: 12px;">Sr No</td>

                                    <td style="font-size: 12px;">Category Name</td>

                                    <td style="font-size: 12px;">Category Status</td>

                                    <td style="font-size: 12px;">Actions</td>

                                </tr>

                            </thead>

                            <tbody>
                                @php
                                    $id = 1;
                                @endphp
                                @forelse ($allUser as $cat)
                                    <tr>
                                        <td>{{ $id++ }}</td>
                                        <td>{{ $cat->category_name }}</td>
                                        <td>
                                            <div class="col-xxl-2"> <label class="custom-switch form-switch mb-0">
                                                    <input type="checkbox" id="SwitchCheck1" value="{{ $cat->id }}"
                                                        {{ $cat->category_status == 1 ? 'checked' : '' }}
                                                        class="custom-switch-input" style="cursor: pointer"> <span
                                                        class="custom-switch-indicator"></span> <span
                                                        class="custom-switch-description"
                                                        id="cat_status_{{ $cat->id }}">{{ $cat->category_status == 1 ? 'Active' : 'In-active' }}</span>
                                                </label>
                                            </div>
                                        </td>
                                        <td name="bstable-actions">
                                            <div class="btn-list">
                                                <button type="button" class="btn btn-sm btn-primary" title="Edit"
                                                    id="editRecord" data-edit='{{ $cat->id }}'>
                                                    <span class="fe fe-edit"></span>
                                                </button>
                                                <button title="Remove" type="button" data-delete='{{ $cat->id }}'
                                                    class="btn  btn-sm btn-danger deleteRecord">
                                                    <span class="fe fe-trash-2"> </span>
                                                </button>

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                            <div class="modal" id="modaldemo1">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title">Edit Category</h6><button aria-label="Close"
                                                class="close" data-dismiss="modal" type="button" id="clodeModel"><span
                                                    aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row mt-3 ">
                                                <div class="col-10 mx-auto">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <form id="editForm">
                                                                @method('PUT')
                                                                <label for="">Category Name</label>
                                                                <input type="hidden" name="hidden" id="hidden">
                                                                <input type="text" name="edit_category_name"
                                                                    class="form-control" placeholder="Enter Your Category"
                                                                    id="editCategory">

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn ripple btn-primary" type="button" id="updateData">Update
                                                Category</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

                            url: `{{ url('/category/${deleteId}') }}`,

                            method: "DELETE",

                            success: function(response) {

                                if (response.message == 200) {

                                    Swal.fire({

                                        toast: true,

                                        icon: "success",

                                        title: "Data Deleted Successfully..!",

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

                                        title: "Data Not Deleted ..!",

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
            $(document).on("click", "#editRecord", function(stop) {
                stop.preventDefault
                // $("#modaldemo1").show();
                var editData = $(this).data('edit');
                $.ajax({
                    url: `{{ url('/category/${editData}/edit') }}`,
                    method: "GET",
                    success: function(res) {
                        if (res.message == 200) {
                            $("#modaldemo1").modal('show');
                            $("#hidden").val(res.data.id)
                            $("#editCategory").val(res.data.category_name);
                        }
                    }
                })
            })
            $(document).on("click", "#updateData", function(stop) {
                const button = document.getElementById("updateData");
                button.innerHTML =
                    "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                button.setAttribute("disabled", "disabled");
                setTimeout(function() {
                    button.removeAttribute("disabled");
                    button.innerHTML = "+Update Category";
                }, 500);
                stop.preventDefault
                var editData = new FormData(editForm);
                var id = $("#hidden").val();
                $.ajax({
                    url: `{{ url('/category/${id}') }}`,
                    method: "POST",
                    data: editData,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        if (res.message == 200) {
                            $("#modaldemo1").hide();
                            Swal.fire({
                                toast: true,
                                icon: "success",
                                title: "Category update Successfully..!",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            }).then(() => {
                                // Reload the page after SweetAlert is closed
                                setInterval(() => {
                                    location.reload();
                                }, 500);
                            });
                        }
                    }
                })
            })
            $(document).on("click", "#clodeModel", function() {
                $("#modaldemo1").hide();
            })
            $(document).on("click", "#SwitchCheck1", function() {
                var statusChange = $(this).val();

                $.ajax({
                    url: `{{ url('category/${statusChange}') }}`,
                    method: "GET",
                    success: function(res) {
                        if (res.message == 200) {
                            if (res.status.category_status == 1) {
                                $("#cat_status_" + res.status.id).empty();
                                $("#cat_status_" + res.status.id).append("In-active");

                            } else {
                                $("#cat_status_" + res.status.id).empty();
                                $("#cat_status_" + res.status.id).append("Active");
                            }
                        }
                    }
                })
            })
        })
    </script>
@endsection
