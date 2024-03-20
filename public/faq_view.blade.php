@extends('layouts.app')
@section('main-content')
    <div class="row mt-3">
        <div class="col-lg-12">
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
                                                <div class="card show">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Ensure proper closure of the previous div -->
            <div class="card custom-card">
                <div class="card-header">
                    <h2 class="main-content-title tx-24 mg-b-5">Manage FAQs</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabledata" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <td style="font-size: 12px;">Sr No</td>
                                    <td style="font-size: 12px;">Question</td>
                                    <td style="font-size: 12px;">Answer</td>
                                    <td style="font-size: 12px;">Image</td>
                                    <td style="font-size: 12px;">Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php $num = 1; @endphp
                                @forelse ($faq as $fa)
                                    <tr>
                                        <td>{{ $num++ }}</td>
                                        <td style="text-wrap: balance">{{ ucfirst($fa->question) }}</td>
                                        <td>
                                            <button title="Answer Details" type="button" data-detail='{{ $fa->id }}'
                                                class="btn  btn-sm btn-secondary detail_faq">
                                                <span class="fas  fa-eye"> </span>
                                            </button>
                                        </td>
                                        <td>
                                            <img src="/images/{{ $fa->faq_image }}" width="100px" height="70px"
                                                alt="">
                                        </td>
                                        <td>
                                            <button title="Remove" type="button" data-delete='{{ $fa->id }}'
                                                class="btn  btn-sm btn-danger deleteBtn">
                                                <span class="fe fe-trash-2"> </span>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Data not Found</td>
                                    </tr>
                                @endforelse
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
            $(document).on("click", ".detail_faq", function(e) {
                e.preventDefault();
                var Detail_id = $(this).data('detail');
                $.ajax({
                    url: `{{ url('/faq/${Detail_id}show') }}`,
                    method: "GET",
                    dataType: "JSON",
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        if (res.message == 200) {
                            $("#exampleModalLong").modal('show');
                            $("#Detail_question").empty();
                            $("#detail_answer").empty();
                            $("#Detail_answer").empty();
                            $("#Detail_question").append(
                                "<span class='badge badge-primary mx-3 '>Question </span>" +
                                '<strong style="font-size:14px;    color:#080808">' +
                                res.data.question + '</strong>')
                            $("#detail_answer").append(
                                "<span class='badge badge-primary mx-3'>Answer </span>" +
                                '<span style="font-size:14px; color:#0b0b12;">' +
                                res.data.answer + '</span>')
                        }

                    }
                })
            })
            $(document).on("click", ".deleteBtn", function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault()
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
                            url: `{{ url('/faq/${detailId}') }}`,
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
            $(document).on("click", "#close_modal", function(stop) {
                stop.preventDefault();
                $("#exampleModalLong").modal('hide');
            })
        })
    </script>
@endsection
